<?php

// require_once("/vendor/easypost/autoload.php");

use Kirby\Cms\Response;
use Kirby\Data\Json;

return [
    [
        'pattern' => 'logout',
        'action'  => function () {

            if ($user = kirby()->user()) {
                $user->logout();
            }

            go('/');
        }
    ],
    [
        'pattern' => 'sitemap.xml',
        'action'  => function () {
            $pages = site()->pages()->index()->listed();

            // fetch the pages to ignore from the config settings,
            // if nothing is set, we ignore the error page
            $ignore = kirby()->option('sitemap.ignore', ['error']);

            $content = snippet('sitemap', compact('pages', 'ignore'), true);

            // return response with correct header type
            return new Kirby\Cms\Response($content, 'application/xml');
        }
    ],
    [
        'pattern' => 'sitemap',
        'action'  => function () {
            return go('sitemap.xml', 301);
        }
    ],
    [
        'pattern' => 'index',
        'action' => function () {
            return go('home', 301);
        }
    ],
    [
        'pattern' => 'editions/available',
        'action' => function () {
            return page('editions')->render([
                'available' => true
            ]);
        }
    ],
    [
        'pattern' => 'editions/(:any)',
        'method' => 'POST',
        'action' => function ($page) {

            $form = new \Uniform\Form([
                'name' => [
                    'rules' => ['required', 'min' => 3],
                    'message' => ['Please enter your name', 'Name requires 3 characters minimum'],
                ],
                'email' => [
                    'rules' => ['required', 'email'],
                    'message' => ['Email Address is Required', 'Please enter a valid email address'],
                ],
                'message' => [],
                'artId' => [],
                'title' => [],
                'artist' => [],
            ]);

            // Perform validation and execute guards.
            $form->withoutFlashing()
                ->withoutRedirect()
                ->guard()
                ->turnstileGuard();

            if (!$form->success()) {
                // Return validation errors.
                return Response::json($form->errors(), 400);
            }

            // If validation and guards passed, execute the action.
            $form->emailAction([
                'to' => 'acquire@w-editions.com',
                'from' => 'nobody@server.w-editions.com',
                'subject' => 'New Inquiry from {{name}}',
                'template' => 'inquiry',
            ]);

            if (!$form->success()) {
                // This should not happen and is our fault.
                return Response::json($form->errors(), 500);
            }

            // Return code 200 on success.
            return Response::json([], 200);
        }
    ],
    [
        'pattern' => 'store/rates',
        'method'  => 'POST',
        'action'  => function () {
            // if (is_null($body) or !isset($body['eventName'])) {
            //     // When something goes wrong, return an invalid status code
            //     // such as 400 BadRequest.
            //     header('HTTP/1.1 400 Bad Request');
            //     return;
            // }
            $data = kirby()->request()->data();
            $content = $data['content'];

            $client = new \EasyPost\EasyPostClient('EZTKa298b75cc6b446d2a79bab1dcb7d55c00C4u25DruQzgxRhAeysCJQ');

            $shipments = $content['items'];

            $widths = [];
            $heights = [];
            $lengths = [];
            $weights = [];

            foreach ($shipments as $shipment) {
                $width = floatval(number_format(fdiv($shipment['width'], 2.54), 0));
                $height = floatval(number_format(fdiv($shipment['height'], 2.54), 0));
                $length = floatval(number_format(fdiv($shipment['length'], 2.54), 0));
                $weight = floatval(number_format(fdiv($shipment['weight'], 28.35), 1));

                $widths[] = $width;
                $heights[] = $height;
                $lengths[] = $length;
                $weights[] = $weight;
            }

            function max_attribute_in_array($array)
            {
                return max($array);
            }

            $itemMAX = [
                'width' => max_attribute_in_array($widths),
                'height' => max_attribute_in_array($heights),
                'length' => max_attribute_in_array($lengths),
                'weight' => max_attribute_in_array($weights)
            ];


            $shipment = $client->shipment->create([
                'to_address' => [
                    'name' => $content['shippingAddressName'],
                    'street1' => $content['shippingAddressAddress1'],
                    'street2' => $content['shippingAddressAddress2'],
                    'city' => $content['shippingAddressCity'],
                    'state' => $content['shippingAddressProvince'],
                    'zip' => $content['shippingAddressPostalCode'],
                    'country' => $content['shippingAddressCountry'],
                    'phone' => $content['shippingAddressPhone'],
                    'email' => $content['email']
                ],
                'from_address' => [
                    'name' => 'W Editions',
                    'street1' => '254 Knickerbocker Ave',
                    'street2' => '3L',
                    'city' => 'Brooklyn',
                    'state' => 'NY',
                    'zip' => '11237',
                    'country' => 'US',
                    'phone' => '6262168117',
                    'email' => 'orders@w-editions.com'
                ],
                'parcel' => [
                    'length' => $itemMAX['length'],
                    'width' => $itemMAX['width'],
                    'height' => array_sum($heights),
                    'weight' => $itemMAX['weight']
                ]
            ])['rates'];

            $rates = [];

            function simplifiedCarrier($carrier, $service) {
                switch($carrier) {
                    case "UPSDAP":
                        $carrier = "UPS";
                        $service = implode(' ', preg_split('/(?=(?<![A-Z])[A-Z]|(?<![0-9])[0-9])/', $service));
                        break;
                    case "FedExDefault":
                        $carrier = "FedEx";
                        $service = str_replace('Pm', 'PM', str_replace('Am', 'AM', ucwords(str_replace('fedex', '', str_replace('_', ' ', strtolower($service))))));
                        break;
                    default:
                        $service = implode(' ', preg_split('/(?=(?<![A-Z])[A-Z]|(?<![0-9])[0-9])/', $service));
                        break;
                }

                return ltrim($carrier) . ' — ' . ltrim($service);
            };

            foreach ($shipment as $s) {
                $rates[] = [
                    'cost' => $s['rate'],
                    'description' => simplifiedCarrier($s['carrier'], $s['service']),
                ];
            };



            function compare_rates($a, $b)
            {
                return strnatcmp($a['cost'], $b['cost']);
            }

            usort($rates, 'compare_rates');

            // array_unshift($rates, [
            //     'cost' => '-10',
            //     'description' => 'Frame it! — Get a quote from our custom framing partner for each artwork and receive a separate invoice for framing and shipping.',
            // ]);

            $ratesJson = json_encode(["rates" => $rates]);

            // F::write(kirby()->root('index') . '/data.txt', dump($rates));

            header("Content-type: application/json");
            return Response::Json($ratesJson, 200);

            // return new Response('yaaaayyy');
        }
    ],
    [
        'pattern' => 'store/api',
        'method'  => 'POST',
        'action'  => function () {

            $data = kirby()->request()->data();

            if (is_null($data) or !isset($data['eventName'])) {
                // When something goes wrong, return an invalid status code
                // such as 400 BadRequest.
                header('HTTP/1.1 400 Bad Request');
                return;
            }

            switch ($body['eventName']) {
                case 'order.completed':
                    // This is an order:completed event
                    // do what needs to be done here.
                    break;
            }

            // Return a valid status code such as 200 OK.
            header('HTTP/1.1 200 OK');
        }
    ]
];
