<?php

return [
    'debug' => true,
	'paulmorel.fathom-analytics' => [
        'siteId' => 'TCMXSOEX',
        'sharePassword' => 'w/editions212'
    ],
	'wearejust.meta-tags.default' => function ($page, $site) {
        return [
            'title' => ((!$page->isHomePage()) ? $page->title() . ' /// ' : '' ) . $site->title(),
            'meta' => [
                'description' => $site->description()
            ],
            'link' => [
                'canonical' => $page->url(),
                'icon' => [
                  ['href' => url('assets/images/icons/favicon64.png'), 'sizes' => '64x64', 'type' =>'image/png'],
                  ['href' => url('assets/images/icons/favicon120.png'), 'sizes' => '120x120', 'type' =>'image/png'],
                  ['href' => url('assets/images/icons/favicon250.png'), 'sizes' => '250x250', 'type' =>'image/png'],
                ]
            ],
            'og' => [
                'title' => $page->isHomePage()
                    ? $site->title()
                    : $page->title(),
                'type' => 'website',
                'site_name' => $site->title(),
                'url' => $page->url()
            ]
        ];
	},

	'smartypants' => true,

	'auth' => [
		'methods' => ['password', 'password-reset']
	],

	'sitemap.ignore' => ['error'],

	'routes' => require_once 'routes.php',

    'email' => require_once 'email.php',


    'hooks' => [
        'page.create:after' => function (Kirby\Cms\Page $page) {
            if($page->parent() == 'editions') {
                $count = $page->parent()->counter()->toInt();
                $count++;
                $page->parent()->update(['counter'=>$count]);

                if($page->artist()->isNotEmpty()) {
                    if($artist = $this->site()->pages()->find('artists/'. $page->artist()->first())) {
                        $string = $artist->title();
                    } else {
                        $string = $page->artist()->first();
                    }

                    preg_match_all('/\b\w/', $string, $matches);
                    $artistName = implode('', $matches[0]);

                } else {
                    $artistName = '[na]';
                }

                $page->update([
                    'artId' => $artistName . date("y") . '.' . sprintf('%03d', $count),
                    'year' => date("Y")
                ]);
            }
        }
    ]

];

?>
