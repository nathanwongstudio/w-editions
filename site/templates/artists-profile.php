<?php snippet('header') ?>
<div class="default-content">
    <section class="profile">
        <?php if ($page->profilepic()->isNotEmpty()):
            $src = $page->profilepic()->toFile();
            $figure = false;
            $imgMinWidth = "50vw" ?>
            <div class="profilepic">
                <div class="pic-wrapper">
                    <div class="modal-header"><span>Image</span><button class="modal-close" disabled></button></div>
                    <div class="modal-body">
                        <?= snippet('images', compact('src', 'figure', 'imgMinWidth')); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <section class="section-bio">
            <section class="container">
                <div class="modal-header">
                    <h1 class="artist-name">Bio ʬ <?= $page->title() ?><button class="modal-close" disabled></button></h1>
                </div>
                <div class="modal-body">
                    <?php if ($page->bio()->isNotEmpty()): ?>
                        <div class="bio">
                            <?= $page->bio()->toBlocks() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </section>

        <section class="container gallery no-scroll">
            <div class="modal-header"><h3><span class="chop-inline"></span> <?= $page->title() ?><button class="modal-close" disabled></button></h3></div>
            <div class="editions modal-body">
                <?php if ($artworks->isNotEmpty()): ?>
                    <figure class="artworks">
                        <ul class="gallery-items">
                            <?php foreach ($artworks as $art):
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