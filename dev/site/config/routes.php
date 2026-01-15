<?php

use Kirby\Cms\Response;
use Kirby\Data\Json;
use Kirby\Data\Yaml;

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
        'pattern' => '/editions/25-001',
        'action' => function () {
            go(site()->page('editions')->children()->filterBy('artId', 'LerN25.01')->first()->url(), 301);
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
        'pattern' => 'inquire/(:all)',
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
                'from' => env('MAILGUN_EMAIL'),
                'subject' => 'New Inquiry from {{name}}',
                'template' => 'inquiry',
            ]);

            $kirby = kirby();
            $kirby->impersonate('kirby');
            date_default_timezone_set('America/New_York');

            $name = $form->data('name');
            $email = $form->data('email');
            $message = $form->data('message');
            $errors = $form->errors();
            $success = $form->success();
            $date = date("Y-m-d H:i:s");

            $artwork = page("editions")->children()->filter('artId', $page)->first();

            $submissions = $artwork->submittedInquiries()->yaml();

            $newSubmission = [
                'inquiryDate' => $date,
                'inquiryName' => $name,
                'inquiryEmail' => $email,
                'inquiryMessage' => $message,
                'inquiryStatus' => $success ? 'sent' : $errors
            ];

            array_unshift($submissions, $newSubmission);

            $artwork->update([
                'submittedInquiries' => Yaml::encode($submissions)
            ]);

            if (!$form->success()) {
                // This should not happen and is our fault.
                return Response::json($form->errors(), 500);
            }

            // Return code 200 on success.
            return Response::json(['message' => 'Your inquiry was submitted successfully, we will reach out to you as soon as possible.'], 200);
        }
    ],
];
