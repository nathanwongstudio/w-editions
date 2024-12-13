<?php snippet('header') ?>
<div class="default-content">
    <section class="profile">
        <?php if($page->profilepic()->isNotEmpty()): 
            $src = $page->profilepic()->toFile();
            $figure = false; ?>
            <div class="profilepic">
                <div class="pic-wrapper">
                    <?= snippet('images', compact('src', 'figure')); ?>
                </div>
            </div>
        <?php endif; ?>
        <h1 class="artist-name"><?= $page->title() ?></h1>

        <?php if($page->bio()->isNotEmpty()): ?>
            <section class="container">
                <div class="bio">
                    <?= $page->bio()->toBlocks() ?>
                </div>
            </section>
        <?php endif; ?>
        <section class="container gallery no-scroll">
            <div class="editions">
                <?php if($artworks->isNotEmpty()): ?>
                    <figure class="artworks">
                        <ul class="gallery-items">
                            <?php foreach($artworks as $art): 
                                $src = $art->primaryImg()->toFile();
                                $figure = false;
                                ?>
                                <li class="gallery-item">
                                    <div class="art-image">
                                        <a href="<?= $art->url() ?>" class="image-link">
                                            <?= snippet('images', compact('src', 'figure')) ?>
                                        </a>
                                    </div>
                                    <div class="art-title">
                                        <a href="<?= $art->url() ?>">
                                            <?= $art->title(); ?>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </figure>
                <?php else: ?>
                    <div class="artworks empty">
                        <p class="nothing">There are no collaborations yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        
    </section>
</div>
<?php snippet('footer') ?>