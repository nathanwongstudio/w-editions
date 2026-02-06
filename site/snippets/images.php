<?php

if (isset($src)): ?>
    <?php
    /** IMG VARIABLES */
    $link = $src->link() ?? '';
    $title = $src->title()->smartypants() ?? '';
    $alt = $src->alt() ?? '';
    $aspect = round($src->height() / $src->width() * 10000) / 100;
    $class = $class ?? '';
    $lazy = $lazy ?? true;
    $width = $width ?? $src->width();
    $height = $height ?? $src->height();
    $web = $web ?? false;
    $figure = $figure ?? true;
    $fullscreen = $fullscreen ?? false;

    if (isset($imgMinWidth)) {
        if ($imgMinWidth == "full") {
            $sizes = " 
        (min-width: 1800px) 100vw,
        (min-width: 1200px) 100vw,
        (min-width: 900px) 100vw,
        (max-width: 600px) 100vw,
        100vw
        ";
        } else {
            $sizes = " 
        (min-width: 1800px) $imgMinWidth,
        (min-width: 1200px) $imgMinWidth,
        (min-width: 900px) $imgMinWidth,
        (max-width: 600px) 100vw,
        100vw
        ";
        }
    } else {
        $sizes = " 
    (min-width: 1800px) 100vw,
    (min-width: 1200px) 100vw,
    (min-width: 900px) 100vw,
    (max-width: 600px) 100vw,
    100vw
    ";
    }

    ?>


    <figure class="image
                <?= ($fullscreen ? 'fullscreen' : '') ?>
                <?= $class ?? '' ?>
                is-loading"
        style="--aspect-ratio: <?= $aspect ?>%">

        <picture style="--aspect-ratio: <?= $aspect ?>%">

            <?php if ($link->isNotEmpty()): ?>

                <a href="<?= Str::esc($link->toUrl()) ?>">

                <?php endif; ?>

                <?php if ($src->extension() == 'gif') : // GIFS 
                ?>

                    <img src="<?= $src->url(); ?>" />

                <?php elseif ($web): // FROM THE WEB 
                ?>

                    <img src="<?= $src ?>" alt="<?= $alt->esc() ?>">

                <?php else: // NORMAL IMAGE (JPG/PNG) 
                ?>

                    <?php if ($src->srcset('avif')): ?>

                        <source
                            srcset="<?= $src->srcset('avif'); ?>"
                            sizes="<?= $sizes; ?>"
                            type="image/avif">

                    <?php endif; ?>
                    <?php if ($src->srcset('webp')): ?>

                        <source
                            srcset="<?= $src->srcset('webp'); ?>"
                            sizes="<?= $sizes; ?>"
                            type="image/webp">
                    <?php endif; ?>

                    <source
                        srcset="<?= $src->srcset(); ?>"
                        sizes="<?= $sizes; ?>"
                        type="<?= $src->mime(); ?>">
                    <img
                        src="<?= $src->resize(null, null, 95)->url() ?>"

                        title="<?= $title ?? '' ?>"
                        alt="<?= $alt ?? 'this image has no alt text' ?>"
                        class="image <?= $class && $figure ?? '' ?>"

                        <?php if ($lazy && isset($index) && $index > 2): ?>
                        loading="lazy"
                        <?php elseif ($lazy && !isset($index)): ?>
                        loading="lazy"
                        <?php endif; ?>

                        width="<?= $width ?>"
                        height="<?= $height ?>" />

                <?php endif; ?>


                <?php if ($link->isNotEmpty()): ?>

                </a>

            <?php endif; ?>

        </picture>


        <?php if ($caption = $slots->caption()): ?>

            <figcaption>
                <?= $caption ?>
            </figcaption>

        <?php endif; ?>

        <?php if ($figure == true): ?>
    </figure>
<?php endif; ?>

<?php else: ?>
    <picture class="is-loading is-empty" title="no image is available">

    </picture>
<?php endif; ?>