<?php snippet('header') ?>
<div class="default-content">
    <section class="profile">
        <?php if($page->profilepic()->isNotEmpty()): 
            $src = $page->profilepic()->toFile();
            $figure = false; ?>
            <div class="profilepic">
                <div class="pic-wrapper">
                    <div class="pic-wrapper-header">Image</div>
                    <?= snippet('images', compact('src', 'figure')); ?>
                </div>
            </div>
        <?php endif; ?>
        <section class="section-bio">
            <section class="container">
                <h1 class="artist-name">Bio ʬ <?= $page->title() ?></h1>
                <?php if($page->bio()->isNotEmpty()): ?>
                    <div class="bio">
                        <?= $page->bio()->toBlocks() ?>
                    </div>
                <?php endif; ?>
            </section>
        </section>
        
        <section class="container gallery no-scroll">
            <div class="gallery-header">Artworks w/ <?= $page->title() ?></div>
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
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </figure>
                <?php else: ?>
                    <div class="artworks empty">
                        <p class="nothing">There are no releases from <?= $page->title() ?> yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        
    </section>
</div>
<?php snippet('footer') ?>