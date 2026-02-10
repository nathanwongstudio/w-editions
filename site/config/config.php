<?php

use Kirby\Cms\Block;
use Kirby\Content\Field;

return [

    // API
    'kql' => [
        'auth' => false
    ],

    'headless' => [
        // 'token' => env('KIRBY_API_KEY'),
        'globalRoutes' => true
    ],

    'blocksResolver' => [
        'files' => [
            'gallery' => ['images'],
            'image' => ['image']
        ],

        'defaultResolvers' => [
            'files' => fn(\Kirby\Cms\File $file) => [
                'url' => $file->url(),
                'width' => $file->width(),
                'height' => $file->height(),
                'srcset' => $file->srcset(),
                'alt' => $file->alt()->value(),
                'id' => $file->uuid()->id(),
                'caption' => $file->caption()->value(),
            ]
        ],
        'resolvers' => [
            'accordion:text' => fn(Field $field, Block $block) =>
            $field->toResolvedBlocks()->toArray(),
            'accordion:headline' => fn(Field $field, Block $block) => $field->value(),
            'bio:artistlink' => function (Field $field, Block $block) {
                $page = $field->toPages()->first();

                return [
                    'image' => [
                        'url' => $page->profilepic()->toFile()->url(),
                        'alt' => $page->profilepic()->toFile()->alt()->value(),
                        'width' => $page->profilepic()->toFile()->width(),
                        'height' => $page->profilepic()->toFile()->height(),
                        'caption' => $page->profilepic()->toFile()->caption()->value(),
                        'srcset' => $page->profilepic()->toFile()->srcset(),
                        'id' => $page->profilepic()->toFile()->uuid()->id(),
                    ],
                    'text' => $page->bio()->toResolvedLayouts()->toArray()
                ];
            },
            'button:buttonlink' => function (Field $field, Block $block) {
                if (page($field)) {
                    return '/' . page($field)->id();
                }
                if ($field->toFile()) {
                    return $field->toFile()->url();
                }
                return $field->value();
            }
        ]
    ],

    'cors' => 'true',

    'paulmorel.fathom-analytics' => [
        'siteId' => 'TCMXSOEX',
        'sharePassword' => 'w/editions212'
    ],

    'mauricerenck.indieConnector' => [
        'sqlitePath' => 'content/.sqlite',
        'stats.enabled' => true,
    ],
    'panel.vue.compiler' => true,

    //COOKIES
    'zephir.cookieconsent' => [
        'cdn' => true,
        'revision' => 1,
        'root' => 'document.body',
        'autoClearCookies' => true, // Only works when the categories have an autoClear array
        'autoShow' => true,
        'hideFromBots' => true,
        'disablePageInteraction' => false,
        'lazyHtmlGeneration' => true,
        'guiOptions' => [
            'consentModal' => [
                'layout' => 'box',
                'position' => 'middle center',
                'flipButtons' => false,
                'equalWeightButtons' => true
            ],
            'preferencesModal' => [
                'layout' => 'box',
                // 'position' => 'left', // only relevant with the "bar" layout
                'flipButtons' => false,
                'equalWeightButtons' => true
            ]
        ],
        'categories' => [
            'necessary' => [
                'enabled' => true,
                'readOnly' => true
            ],
            'measurement' => false,
            'functionality' => false,
            'experience' => false,
            'marketing' => false
        ],
        'language' => [
            'locale' => 'en',
            'direction' => 'ltr'
        ],
        'translations' => [
            'en' => require_once(__DIR__ . '/translations/en.php'),
        ]
    ],

    // 'hashandsalt.kirby-snipcart' => require_once 'snipcart.php',

    'wearejust.meta-tags.default' => function ($page, $site) {
        return [
            'title' => ((!$page->isHomePage()) ? $page->title() . ' ʬ ' : '') . $site->title(),
            'meta' => [
                'description' => (($page->pageDescription()->isNotEmpty()) ? $page->pageDescription() : $site->description())
            ],
            'link' => [
                'canonical' => $page->url(),
                'icon' => [
                    ['href' => url('assets/images/icons/favicon64.png'), 'sizes' => '64x64', 'type' => 'image/png'],
                    ['href' => url('assets/images/icons/favicon120.png'), 'sizes' => '120x120', 'type' => 'image/png'],
                    ['href' => url('assets/images/icons/favicon250.png'), 'sizes' => '250x250', 'type' => 'image/png'],
                ]
            ],
            'og' => [
                'title' => $page->isHomePage()
                    ? $site->title()
                    : $page->title(),
                'type' => 'website',
                'site_name' => $site->title(),
                'url' => $page->url()
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'site' => $site->twitter(),
                'title' => $page->title(),
                'namespace:image' => function ($page, $site) {
                    if ($page->primaryImg()->isNotEmpty()) {
                        $image = $page->primaryImg()->toFile();
                    } else {
                        $image = $site->logo()->toFile();
                    }

                    return [
                        'image' => $image->url(),
                        'alt' => $image->alt()
                    ];
                }
            ],
        ];
    },
    'wearejust.meta-tags.templates' => function ($page, $site) {
        return [
            'gallery-artwork' => [
                'og' => [
                    'title' => $page->title(),
                    'image' => $page->url() . '.png',
                    'type' => 'website',
                    'site_name' => $site->title(),
                    'url' => $page->url()
                ],
                'twitter' => [
                    'card' => 'summary_large_image',
                    'site' => $site->twitter(),
                    'title' => $page->title(),
                    'image' => $page->url() . '.png'
                ]
            ]
        ];
    },

    'smartypants' => true,

    'auth' => [
        'methods' => ['password', 'password-reset']
    ],

    'sitemap.ignore' => ['error'],
    'routes' => require_once 'routes.php',

    'ready' => function () {
        return [

            'anselmh.uniform-turnstile' => [
                'siteKey' => env('TURNSTILE_SITEKEY'),
                'secretKey' => env('TURNSTILE_SECRET'),

            ],

            'email' => require_once 'email.php',
        ];
    },


    'hooks' => [
        'page.create:after' => function (Kirby\Cms\Page $page) {
            if ($page->parent() == 'editions') {
                $count = $page->parent()->counter()->toInt();
                $count++;
                $page->parent()->update(['counter' => $count]);

                if ($page->artist()->isNotEmpty()) {
                    if ($artist = $this->site()->pages()->find('artists/' . $page->artist()->first())) {
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
