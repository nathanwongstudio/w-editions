<?php snippet('header') ?>
<div class="default-content">
    <div class="artwork">
        <div class="description" data-simplebar data-simplebar-auto-hide="false">

            <h2 class="artists">
                <?php foreach ($page->artist()->split() as $artist): 
                    if($pages->find($artist)):
                    ?>
                        <span class="artist"><a href="<?= $pages->find($artist)->url() ?>"><?= $pages->find($artist)->title(); ?></a></span>
                    <?php else: ?>
                        <span class="artist"><?= $artist ?></span>
                    <?php endif; ?>
                <?php endforeach;?>
            </h2>
            <h1 class="title">
                <?=$page->title() ?>  <span class="year">(<?= $page->year() ?>)</span>
            </h1>
            <div class="availability">
                <span class="<?= ($page->available()->toBool()) ? 'yes' : 'no' ?>">
                </span>
            </div>
            <p class="price">
                $<?= $page->price() ?>
            </p>
            <?php if($page->available()->toBool()) : ?>
                <a href="mailto:hey@w-editions.com" title="Inquire about this piece." class="button">
                    Inquire
                </a>
            <?php else: ?>
            <?php endif; ?>
            <p class="top">
                <?= $page->text()->widont(); ?>
            </p>
            <p class="bottom">
                <?= $page->bottomText()->widont(); ?>
            </p>

            <p class="artid"><?= $page->artId() ?></p>
        </div>
        <div class="image-gallery gallery gallery-scroll" data-simplebar data-simplebar-auto-hide="false">
            <ul class="gallery-items vertical">
                <li class="primary-image">
                    <?= $page->primaryImg()->toFile() ?>
                </li>
                <?php
                    foreach($page->details()->toFiles() as $art): 
                    $src = $art;
                    $figure = false;
                    ?>
                    <li class="gallery-item">
                        <div class="art-image">
                            <?= snippet('images', compact('src')) ?>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<?php snippet('footer') ?>