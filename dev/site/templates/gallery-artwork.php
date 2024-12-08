<?php snippet('header');

$layouts = $page->accordionText()->toLayouts();

?>
<div class="default-content">
    <div class="artwork">
        <div class="primary-image">
                <?= $page->primaryImg()->toFile() ?>
        </div>

        <div class="title-card-wrapper">
            <div class="title-card">
                <h2 class="artists">
                    <?php foreach ($page->artist()->split() as $artist):
                        if($artistPage = $pages->find('artists/'.$artist)):
                        ?>
                            <span class="artist text-wrap"><a href="<?= $artistPage->url() ?>"><?= $artistPage->title(); ?></a></span>
                        <?php else: ?>
                            <span class="artist text-wrap"><?= $artist ?></span>
                        <?php endif; ?>
                    <?php endforeach;?>
                </h2>
                <h1 class="title">
                    <span class="text-wrap"><?=$page->title() ?>  <span class="year">(<?= $page->year() ?>)</span></span>
                </h1>
                <div class="price">
                    <span class="text-wrap">
                        $<?= $page->price() ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="sticker-box">
            <div class="sticker-wrapper contrast-text">

            <!-- AVAILABILITY STICKER -->
                <?php if($page->available()->toBool()): ?>
                <div class="sticker availability tag <?= ($page->available()->toBool()) ? 'new' : 'sold' ?>">
                    <?= ($page->available()->toBool()) ? 'Available' : 'Sold Out' ?>
                </div>
                <?php endif; ?>

                <!-- INQUIRE STICKER -->
                <?php if($page->onlineShop()->toBool()): ?>
                    <?= snippet('products/product-add-to-cart', ['class' => 'tag push sticker']) ?>
                <?php else: ?>
                        <?php if($page->available()->toBool()) : ?>
                            <div id="inquire" class="tag push sticker">
                                Inquire
                            </div>
                        <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="description">
            <div class="text-block top">
                <?= $page->text()->widont(); ?>
            </div>

            <p class="artid">
                <?= $page->artId() ?>
            </p>
        </div>
        <div class="image-gallery">
            <ul class="gallery-items">
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
    <div class="text-block bottom">
        <?php foreach($layouts as $layout): ?>
            <?= snippet('layouts', compact('layout')); ?>
        <?php endforeach; ?>

        <?php if($layouts->findBy('role', 'accordion')): ?>
            <?= snippet('accordion-js') ?>
        <?php endif; ?>
    </div>
</div>

<?= ($page->available()->toBool() && !($page->onlineShop()->toBool())) ? snippet('inquire-form') : '' ?>

<script>

    var textBlock = document.querySelectorAll('.text-block p');

    textBlock.forEach(element => {

        var html = element.innerHTML,
            firstNode = element.firstChild,
            span = document.createElement('span');
        
            span.innerHTML = html;

            element.replaceChild(span, firstNode);
    });
        

</script>

<?php snippet('footer') ?>