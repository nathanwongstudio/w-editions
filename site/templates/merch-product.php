<?php snippet('header');

//default image

$src = $page->productImage()->toFile();

?>
<div class="default-content">

    <div class="merch-wrap">
        <div class="merch-description-wrapper">
            <a href="<?= $page->parent()->url() ?>" class="button reverse inline">More Merch</a>
            <div class="merch-description">
                <div class="merch-description-header">
                    <?= $page->productId(); ?>
                </div>
                <div class="merch-description-body">
                    <h1><?= $page->productName(); ?></h1>
                    <div class="text">
                        <?= $page->productDescriptionLong()->toHtml(); ?>
                    </div>
                </div>
                <div class="merch-footer">
                    <div class="merch-price">
                        <span class="price button disabled">
                            $<?= preg_replace('/\b\.00\b/', '', number_format($page->productPrice()->toFloat(), 2, '.', '')) ?>
                        </span>
                    </div>
                    <div class="merch-button">
                        <?= snippet('products/merch-add', ['class' => 'button']) ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="merch-image-wrapper">
            <div class="merch-images">
                <div class="merch-images-header">
                    Images
                </div>
                <div class="merch-images-body">
                    <?= snippet('images', compact('src')) ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php snippet('footer') ?>