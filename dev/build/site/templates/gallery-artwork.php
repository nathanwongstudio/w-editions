<?php snippet('header') ?>
<div class="default-content">
    <div class="artwork">
        <div class="primary-image">
                <?= $page->primaryImg()->toFile() ?>
        </div>
        <div class="title-card">
            <h2 class="artists">
                <?php foreach ($page->artist()->split() as $artist): 
                    if($pages->find($artist)):
                    ?>
                        <span class="artist text-wrap"><a href="<?= $pages->find($artist)->url() ?>"><?= $pages->find($artist)->title(); ?></a></span>
                    <?php else: ?>
                        <span class="artist text-wrap"><?= $artist ?></span>
                    <?php endif; ?>
                <?php endforeach;?>
            </h2>
            <h1 class="title">
                <span class="text-wrap"><?=$page->title() ?>  <span class="year">(<?= $page->year() ?>)</span></span>
            </h1>
            <p class="price">
                $<?= $page->price() ?>
            </p>
        </div>

        <div class="sticker-box">
            <div class="sticker-wrapper contrast-text">
                    <div class="sticker availability tag <?= ($page->available()->toBool()) ? 'new' : 'sold' ?>">
                        <?= ($page->available()->toBool()) ? 'Available' : 'Sold Out' ?>
                    </div>

                <?php if($page->available()->toBool()) : ?>
                    <div class="tag push sticker">
                        <a href="mailto:hey@w-editions.com?subject=I want to buy '<?= $page->title() ?>' (<?= $page->artId() ?>)." title="Inquire about this piece.">
                            Inquire
                        </a>
                    </div>
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