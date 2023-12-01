<?php snippet('header') ?>
<div class="default-content">
    <section class="collection">
        <?php
            $artworks = $page->children()->listed();
            foreach($artworks as $artwork):

                $src = $artwork->primaryImg()->toFile();
        ?>
            <div class="artwork">
                <?= snippet('images', compact('src')) ?>

                <div class="inner-wrapper">
                    <h2 class="artwork-title">
                        <?= $artwork->title(); ?>
                    </h2>
                    
                    <p class="price">$<?= $artwork->price() ?></p>

                    <a class="button" href="<?= $artwork->url() ?>">
                        View Details
                    </a>
                    <p class="artid"><?= $artwork->artId() ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</div>
<?php snippet('footer') ?>