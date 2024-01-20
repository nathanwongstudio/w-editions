<?php

return [
    'debug' => true,
	'paulmorel.fathom-analytics' => [
        'siteId' => 'TCMXSOEX',
        'sharePassword' => 'w/editions212'
    ],
	'wearejust.meta-tags.default' => function ($page, $site) {
        return [
            'title' => ((!$page->isHomePage()) ? $page->title() . ' ❀ ' : '' ) . $site->title(),
            'meta' => [
                'description' => $site->description()
            ],
            'link' => [
                'canonical' => $page->url()
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
	
	'thathoff.git-content.displayErrors' => false,

	'smartypants' => true,

	'auth' => [
		'methods' => ['password', 'password-reset']
	],

	'sitemap.ignore' => ['error'],

	'routes' => require_once 'routes.php',

    'hooks' => [
        'page.create:after' => function (Kirby\Cms\Page $page) {
            if($page->parent() == 'editions') {
                $count = $page->parent()->counter()->toInt();
                $count++;
                $page->parent()->update(['counter'=>$count]);
                $page->update([
                    'artId' => (strtoupper($page->artist()->first()) ?? '') . '-' . date("Y") . '.' . sprintf('%03d', $count),
                    'year' => date("Y")
                ]);
            }
        }
    ]

];

?>
