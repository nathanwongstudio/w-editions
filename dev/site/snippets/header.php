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

    <link rel="preload" href="https://use.typekit.net/inc5dxe.css" as="style">
    <link rel="preload" href="/assets/css/styles.css" as="style">
    <link rel="preload" href="/assets/css/nav.css" as="style">

    
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

    <?= snippet('cookieconsentCss') ?>

    <?= css('assets/css/microns-min.css') ?>

    <?=css('assets/css/type-mobile.css', 'screen and (max-width: 50em)') ?>

    <?= css('assets/css/overlay.css') ?>

    <?= css('assets/css/nav.css') ?>

    <?=css('@auto') ?>

    <?php if(isset($layouts)) {
        if($layouts->filterBy('type', 'gallery')) {
            echo css('assets/css/images-gallery.css');
        }
    } ?>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <script>
        document.documentElement.className = 
        document.documentElement.className.replace("no-js","js");
    </script>

    <link rel="stylesheet" href="https://use.typekit.net/inc5dxe.css">

    <?= snippet('fathom-analytics-embed'); ?>

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
            display: block;
            position:relative;
            width:auto;
            height: auto;
            max-width: calc(80vh * var(--aspect-ratio));
            /* padding-bottom: var(--aspect-ratio); */
            background-color: var(--c-paper-200);
            max-height:80vh;
        }
    </style>

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

    <?= js('assets/js/main.js', false) ?>

    <?= js('assets/js/accordion.js') ?>
</head>
<body class="<?= $page->intendedTemplate() ?>
             <?= (option('environment') == 'development' ? 'dev' : '' ) ?>
             <?= ($page->intendedTemplate() == "home") ? 'start-out' : '' ?>">

    <?php if(!isset($nav)) {$nav = true;} ?>

    <?= ($nav) ? snippet('nav') : '' ?>

<div class="wrapper">