<?php snippet('header');

//default image

$src = $page->productImage()->toFile();

?>
<div class="default-content">

<div class="merch-wrap">
    <div class="merch--description">
        <h1><?= $page->productName(); ?></h1>
        <div class="merch--price">
            $<?= $page->productPrice(); ?>
        </div>
        <div class="text">
            <?= $page->productDescription(); ?>
        </div>
        <?= snippet('products/merch-add', ['class'=>'button']) ?>
    </div>
    <div class="merch--images">
        <?= snippet('images', compact('src')) ?>
    </div>
</div>

</div>
<?php snippet('footer') ?>