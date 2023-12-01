<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
    <!------------------------------------------------

        Website designed and coded by Nathan Wong
                   itsallwong.com

    -------------------------------------------------->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if($page->isHomePage()): ?>
        <meta content="width=device-width, initial-scale=0.375" name="viewport">
    <?php else: ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php endif; ?>

    <?php if($site->favicon()->isNotEmpty()): ?>
        <link rel="shortcut icon" href="<?= $site->favicon()->toFile()->thumb(['width' => 200])->url() ?>" type="image/x-icon">
    <?php endif;?>
    
    <meta name="description" content="<?= $site->siteDescription() ?>">
    <meta name="keywords" content="<?= $site->keywords() ?>">
    <title><?= ((!$page->isHomePage()) ? $page->title() . ' > ' : '' ) . $site->title() ?></title>
	<?php

	echo css('assets/css/styles.css');

    if(isset($pageTitle)) {
        $pageTitle = $pageTitle;
    } else {
        $pageTitle = false;
    }

	$tagged = false;
    ?>

    <?=

	css([
        'assets/css/nav.css',
        '@auto'
    ])

    ?>

    <?=css('assets/css/type-mobile.css', 'screen and (max-width: 50em)') ?>

    <?= js('@auto', ['type'=>'module']) ?>

    <script>
        document.documentElement.className = 
        document.documentElement.className.replace("no-js","js");
    </script>

    <link rel="stylesheet" href="https://use.typekit.net/inc5dxe.css">

    <?= snippet('fathom-analytics-embed'); ?>

    <link
        rel="stylesheet"
        href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
    />

    <style>
        img {
            opacity: 1;
            transition: opacity 300ms ease;
        }

        .is-loading img {
            opacity: 0;
            transition: opacity 300ms ease;
        }
    </style>

    <noscript>
        <style>
            /**
            * Reinstate scrolling for non-JS clients
            */
            .simplebar-content-wrapper {
            scrollbar-width: auto;
            -ms-overflow-style: auto;
            }

            .simplebar-content-wrapper::-webkit-scrollbar,
            .simplebar-hide-scrollbar::-webkit-scrollbar {
            display: initial;
            width: initial;
            height: initial;
            }

            /** ADD IMAGE OPACITY BACK */
            img {
                opacity: 1!important;
            }
        </style>
    </noscript>
</head>
<body class="<?= $page->intendedTemplate() ?>">

<?php if(!$page->isHomePage()): ?>
    <?= snippet('nav') ?>
<?php endif; ?>
<div class="wrapper">