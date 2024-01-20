<?php

return [
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
	
	'thathoff.git-content.displayErrors' => true,

	'debug' => true,

	'cache' => [
		'pages' => [
			'active' => false,
		]
	],

	'thumbs' => [
	//   'driver' => 'im',
	  'interlace' => true,
	  
	  'srcsets' => [
		'default' => [
		  '250w' => ['width' => 250, 'quality' => 90],
		  '500w' => ['width' => 500, 'quality' => 90],
		  '600w' => ['width' => 600, 'quality' => 90],
		  '800w' => ['width' => 800, 'quality' => 90],
		  '1024w' => ['width' => 1024, 'quality' => 90],
		  '1440w' => ['width' => 1440, 'quality' => 90],
		  '2048w' => ['width' => 2048, 'quality' => 90]
		],
  
		// 'avif' => [
		//   '250w' => ['width' => 250, 'quality' => 90, 'format' => 'avif'],
		//   '500w' => ['width' => 500, 'quality' => 90, 'format' => 'avif'],
		//   '600w' => ['width' => 600, 'quality' => 90, 'format' => 'avif'],
		//   '800w' => ['width' => 800, 'quality' => 90, 'format' => 'avif'],
		//   '1024w' => ['width' => 1024, 'quality' => 90, 'format' => 'avif'],
		//   '1440w' => ['width' => 1440, 'quality' => 90, 'format' => 'avif'],
		//   '2048w' => ['width' => 2048, 'quality' => 90, 'format' => 'avif']
		// ],
  
		// 'webp' => [
		//   '250w' => ['width' => 250, 'quality' => 90, 'format' => 'webp'],
		//   '500w' => ['width' => 500, 'quality' => 90, 'format' => 'webp'],
		//   '600w' => ['width' => 600, 'quality' => 90, 'format' => 'webp'],
		//   '800w' => ['width' => 800, 'quality' => 90, 'format' => 'webp'],
		//   '1024w' => ['width' => 1024, 'quality' => 90, 'format' => 'webp'],
		//   '1440w' => ['width' => 1440, 'quality' => 90, 'format' => 'webp'],
		//   '2048w' => ['width' => 2048, 'quality' => 90, 'format' => 'webp']
		// ]
	  ]
	],

	'smartypants' => true,

	'auth' => [
		'methods' => ['password', 'password-reset']
	],

	'sitemap.ignore' => ['error'],

	require_once 'routes.php'
];

?>
