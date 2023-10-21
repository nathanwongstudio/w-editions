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
    
    <meta name="description" content="<?= $site->siteDescription() ?>">
    <meta name="keywords" content="<?= $site->keywords() ?>">
    <title><?= ((!$page->isHomePage()) ? $page->title() . '|' : '' ) . $site->title() ?></title>
	<?php

    if(isset($pageTitle)) {
        $pageTitle = $pageTitle;
    } else {
        $pageTitle = false;
    }

	echo css('assets/styles/styles.css');

    // this checks if a template-specific style exists.
    // the name of the template must be 'exact-template-name.css'

    $template = $page->intendedTemplate();
    $turl = 'assets/styles/'.$template.'.css';
    $templateStyle = asset($turl);

    if($templateStyle->exists()) {
        echo css($turl);
    }

	$tagged = false; ?>

    <script>
        document.documentElement.className = 
        document.documentElement.className.replace("no-js","js");
    </script>

</head>
<body class="<?= $page->intendedTemplate() ?>">