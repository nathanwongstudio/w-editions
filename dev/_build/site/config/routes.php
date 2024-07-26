<?php
return [
    [
        'pattern' => 'logout',
        'action'  => function() {

            if ($user = kirby()->user()) {
                $user->logout();
            }

            go('/');

        }
    ],
    [
        'pattern' => 'sitemap.xml',
        'action'  => function() {
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
        'action'  => function() {
            return go('sitemap.xml', 301);
        }
    ],
    [
        'pattern' => 'index',
        'action' => function() {
            return go('home', 301);
        }
    ],
    [
        'pattern' => 'editions/available',
        'action' => function() {
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
                'message' => [
                    'rules' => ['required'],
                    'message' => 'Please enter a message',
                ],
                'artId' =>[],
                'title' =>[],
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
    ]
];

?>