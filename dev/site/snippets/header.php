<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <!------------------------------------------------

        Website designed and coded by Nathan Wong
                   itsallwong.com

    -------------------------------------------------->

    <!-- INITIAL META DATA -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FAVICON -->
    <?php if ($site->favicon()->isNotEmpty()): ?>
        <link rel="shortcut icon" href="<?= $site->favicon()->toFile()->thumb(['width' => 200])->url() ?>" type="image/x-icon">
    <?php endif; ?>

    <!-- WEB MENTIONS -->
    <?php snippet('webmention-endpoint'); ?>

    <!-- PRELOAD STYLES -->
    <link rel="preload" href="https://use.typekit.net/inc5dxe.css" as="style">
    <link rel="preload" href="/assets/css/styles.css" as="style">
    <link rel="preload" href="/assets/css/nav.css" as="style">

    <!-- META TAGS FOR SOCIALS AND OPEN GRAPH -->
    <?php echo $page->metaTags() ?>

    <!-- NORMALIZE CSS AND STANDARD CSS STYLES -->
    <?php

    echo css(['assets/css/normal.css', 'assets/css/styles.css']);

    if (isset($pageTitle)) {
        $pageTitle = $pageTitle;
    } else {
        $pageTitle = false;
    }

    $tagged = false;
    ?>

    <!-- OTHER CSS FOR THE PAGE -->
    <?= snippet('cookieconsentCss') ?>

    <?= css('assets/css/microns-min.css') ?>

    <?= css('assets/css/type-mobile.css', 'screen and (max-width: 50em)') ?>

    <?= css('assets/css/overlay.css') ?>

    <?= css('assets/css/nav.css') ?>
    
    <!-- AUTO CSS FOR TEMPLATES -->
    <?= css('@auto') ?>

    <!-- LAYOUT SPECIFIC CSS -->
    <?php if (isset($layouts)) {
        if ($layouts->filterBy('type', 'gallery')) {
            echo css('assets/css/images-gallery.css');
        }
    } ?>

    <!-- START SCRIPTS -->
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <!-- WHEN JS IS AVAILABLE, ACTIVATE IT -->
    <script>
        document.documentElement.className =
            document.documentElement.className.replace("no-js", "js");
    </script>

    <!-- TYPEKIT CSS -->
    <link rel="stylesheet" href="https://use.typekit.net/inc5dxe.css">

    <!-- FATHOM ANALYTICS -->
    <?= snippet('fathom-analytics-embed'); ?>

    <!-- LAZY IMAGE STYLING PRE DOCUMENT FULL LOAD -->
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
            display: inline-block;
            position: relative;
            background-color: none;
            width: fit-content;
            height: fit-content;
        }

        figure.is-loading {
            background-color: var(--c-paper-200);
        }

        .no-js .is-loading img {
            opacity:1;
        }

        .no-js figure.is-loading {
            background-color:transparent;
        }
    </style>

    <!-- SNIPCART STYLES -->
    <?= css('assets/css/snipcart.css') ?>

    <!-- CUSTOM HEADER JAVASCRIPT -->
    <?php if ($page->headerCode()->isNotEmpty()): ?>
        <script>
            <?= $page->headerCode() ?>
        </script>
    <?php endif; ?>

    <!-- CUSTOM HEADER CSS -->
    <?php if ($page->customCSS()->isNotEmpty()): ?>
        <style>
            <?= $page->customCSS() ?>
        </style>
    <?php endif; ?>

    <!-- MAIN JS FILES -->
    <?= js('assets/js/main.js', false) ?>

    <?= js('assets/js/accordion.js') ?>
</head>

<body class="<?= $temp = $temp ?? $page->intendedTemplate() ?>
             <?= (option('environment') == 'development' ? 'dev' : '') ?>
             <?= ($page->intendedTemplate() == "home") ? 'start-out' : '' ?>">

    <?php if (!isset($nav)) {
        $nav = true;
    } ?>

    <div class="overlay js-overlay">
        <div class="modal-header">
            <h3>Activate Javascript, Pretty Please</h3>
            <button class="modal-close" disabled></button>
        </div>
        <div class="modal-body">
            <div class="modal-text">
                Hi, this website uses like a lot of Javascript, so please allow us to use javascript to ensure you can actually use the website!
            </div>
        </div>
    </div>

    <?= ($nav) ? snippet('nav') : '' ?>

    <div class="wrapper">