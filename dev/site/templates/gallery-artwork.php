<?php snippet('header') ?>
<div class="default-content">
    <div <?= ($page->shopifyProductLink()->isNotEmpty()) ? 'data-product="'.$page->shopifyProductLink()->toPage()->shopifyID().'"' : '' ?>></div>
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
                        $<?= ($page->shopifyProduct()->toBool()) ? $page->shopifyProductLink()->toPage()->shopifyPrice() : $page->price() ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="sticker-box">
            <div class="sticker-wrapper contrast-text">

            <!-- AVAILABILITY STICKER -->
                <?php if($page->shopifyProduct()->toBool()) {

                    if($page->shopifyProductLink()->toPage()->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() == 0) {
                        $kirby = kirby();
                        $result = $kirby->impersonate('kirby', function () use($page) {
                            $page->update([
                                'available' => false
                            ]);
                            return false;
                        });
                    } elseif($page->shopifyProductLink()->toPage()->shopifyVariants()->toStructure()->first()->inventory_quantity()->toInt() >= 1) {
                        $kirby = kirby();
                        $result = $kirby->impersonate('kirby', function () use($page) {
                            $page->update([
                                'available' => true
                            ]);
                            return false;
                        });
                    } 

                }
                ?>
                <?php if(($page->available()->toBool() && $page->shopifyProduct()->toBool()) || !($page->shopifyProduct()->toBool()) ): ?>
                <div class="sticker availability tag <?= ($page->available()->toBool()) ? 'new' : 'sold' ?>">
                    <?= ($page->available()->toBool()) ? 'Available' : 'Sold Out' ?>
                </div>
                <?php endif; ?>

                <!-- INQUIRE STICKER -->
                <?php if($page->shopifyProduct()->toBool()): ?>
                    <div id="product-component-<?= $page->shopifyProductLink()->toPage()->shopifyID() ?>">
                        
                    </div>
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
            <div class="text-block bottom">
                <?= $page->bottomText()->widont(); ?>
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
</div>

<?= ($page->available()->toBool() && !($page->shopifyProduct()->toBool())) ? snippet('inquire-form') : '' ?>

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