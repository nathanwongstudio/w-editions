<?php if(isset($src)): ?>
<?php
/** IMG VARIABLES */
$link = $src->link();
$title = $src->title()->smartypants();
$alt = $src->alt();
$aspect = $src->height() / $src->width();


if(isset($width)) {
    $height = round($width * $aspect);
} else {
    $height = null;
}

// if($column) {
//     $imgMinWidth = $column;
// }

if(!isset($web)) {
    $web = false;
}
if(!isset($figure)) {
    $figure = true;
}
if(!isset($fullscreen)) {
    $fullscreen = false;
}

if(isset($imgMinWidth)) {
    if($imgMinWidth=="full") {
        $sizes = " 
        (min-width: 1800px) 100vw,
        (min-width: 1200px) 100vw,
        (min-width: 900px) 80vw,
        (max-width: 600px) 80vw,
        100vw
        ";
    } else {
        $sizes = " 
        (min-width: 1800px) $imgMinWidth,
        (min-width: 1200px) $imgMinWidth,
        (min-width: 900px) $imgMinWidth,
        (max-width: 600px) 80vw,
        80vw
        ";
    }
} else {
    $sizes = " 
    (min-width: 1800px) 100vw,
    (min-width: 1200px) 100vw,
    (min-width: 900px) 80vw,
    (max-width: 600px) 80vw,
    80vw
    ";
}
    
?>


<?php if($figure == true): ?>
<figure class="image <?= ($fullscreen ? 'fullscreen' : '') ?>">
<?php endif; ?>

    <picture class="is-loading" style="--aspect-ratio: <?= $src->width() ?>/<?= $src->height() ?>">

        <?php if($link->isNotEmpty()): ?>

            <a href="<?= Str::esc($link->toUrl()) ?>">

        <?php endif; ?>

        <?php if($src->extension() == 'gif') : // GIFS ?>
            
            <img src="<?=$src->url(); ?>" />

        <?php elseif($web): // FROM THE WEB ?>
            
            <img src="<?= $src ?>" alt="<?= $alt->esc() ?>">

        <?php else: // NORMAL IMAGE (JPG/PNG) ?>

            <source
                srcset="<?= $src->srcset('avif'); ?>"
                sizes="<?= $sizes; ?>"
                type="image/avif"
            >
            <source
                srcset="<?= $src->srcset('webp'); ?>"
                sizes="<?= $sizes; ?>"
                type="image/webp"
            >
            <source
                srcset="<?= $src->srcset(); ?>"
                sizes="<?= $sizes; ?>"
                type="<?= $src->mime(); ?>"
            >
            <img
                src="<?= $src->resize(null, null, 95)->url() ?>"

                title="<?= $title ?? '' ?>"
                alt="<?= $alt ?? 'this image has no alt text' ?>"
                class="image <?= $class ?? '' ?>"

                <?php if(isset($index) && $index > 2): ?>
                    loading="lazy"
                <?php elseif(!isset($index)): ?>
                    loading="lazy"
                <?php endif; ?>

                width="<?= $width ?? $src->width(); ?>"
                height="<?= $height ?? $src->height(); ?>"
            />
        
        <?php endif; ?>


        <?php if($link->isNotEmpty()): ?>

            </a>

        <?php endif; ?>

    </picture>


    <?php if($caption = $slots->caption()): ?>

        <figcaption>
            <?= $caption ?>
        </figcaption>

    <?php endif; ?>

<?php if($figure == true): ?>
</figure>
<?php endif; ?>

<?php else: ?>
	<picture class="is-loading is-empty" title="no image is available">

	</picture>
<?php  endif; ?>