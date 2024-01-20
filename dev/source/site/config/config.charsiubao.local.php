<?php

return [
	'thathoff.git-content.displayErrors' => true,

	'debug' => true,

	'cache' => [
		'pages' => [
			'active' => false,
		]
	],

	'thumbs' => [
		'srcsets' => [
		  'default' => [
			'250w' => ['width' => 250, 'quality' => 90],
			'500w' => ['width' => 500, 'quality' => 90],
			'600w' => ['width' => 600, 'quality' => 90],
			'800w' => ['width' => 800, 'quality' => 90],
			'1024w' => ['width' => 1024, 'quality' => 90],
			'1440w' => ['width' => 1440, 'quality' => 90],
			'2048w' => ['width' => 2048, 'quality' => 90]
		  ]
	  ],
	],
];

?>
