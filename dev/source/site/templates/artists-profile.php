<?php snippet('header') ?>
<div class="default-content">
    <section class="profile">
        <h1 class="artist-name"><?= $page->title() ?></h1>

        <?php if($page->bio()->isNotEmpty()): ?>
            <section class="container">
                <div class="bio">
                    <?= $page->bio()->toBlocks() ?>
                </div>
            </section>
        <?php endif; ?>
        <section class="container gallery">
            <div class="editions">
                <h4>w/ <?= $page->title() ?></h4>
                <?php if($artworks->isNotEmpty()): ?>
                    <div class="artworks">
                        <?php foreach($artworks as $art): ?>
                            <div class="art">
                                <div class="flex-content">
                                    <a href="<?=$art->url()?>">
                                        <?= $art->primaryImg()->toFile() ?>
                                        <?= $art->title(); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php else: ?>
                    <div class="artworks empty">
                        <p class="nothing">There are no collaborations with <?= $page->title() ?> yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        
    </section>
</div>
<?php snippet('footer') ?>