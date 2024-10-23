<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    
    <!------------------------------------------------

        Website designed and coded by Nathan Wong
                   itsallwong.com

    -------------------------------------------------->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if($site->favicon()->isNotEmpty()): ?>
        <link rel="shortcut icon" href="<?= $site->favicon()->toFile()->thumb(['width' => 200])->url() ?>" type="image/x-icon">
    <?php endif;?>
    
    <?php echo $page->metaTags() ?>
    
	<?php

	echo css(['assets/css/normal.css', 'assets/css/styles.css']);

    if(isset($pageTitle)) {
        $pageTitle = $pageTitle;
    } else {
        $pageTitle = false;
    }

	$tagged = false;
    ?>
    <?= css('assets/css/microns-min.css') ?>

    <?=css('assets/css/type-mobile.css', 'screen and (max-width: 50em)') ?>

    <?= css('assets/css/nav.css') ?>

    <?=css('@auto') ?>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

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

        figure {
            display:inline-block;
            position: relative;
            padding-bottom:0;
            background-color: none;
        }

        figure.is-loading {
            width: 100%;
            padding-bottom: var(--aspect-ratio);
            background-color: var(--c-paper-200);
            max-height:0;
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

    <?= css('assets/css/snipcart.css') ?>

    <?php if($page->headerCode()->isNotEmpty()): ?>
        <script>
            <?= $page->headerCode() ?>
        </script>
    <?php endif; ?>

    <?php if($page->customCSS()->isNotEmpty()): ?>
        <style>
            <?= $page->customCSS() ?>
        </style>
    <?php endif; ?>
</head>
<body class="<?= $page->intendedTemplate() ?> <?= (option('environment') == 'development' ? 'dev' : '' ) ?>">

    <?php if(!isset($nav)) {$nav = true;} ?>

    <?= ($nav) ? snippet('nav') : '' ?>

<div class="wrapper">