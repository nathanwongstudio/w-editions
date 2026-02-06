<?php snippet('header');

$list = $page->children()->listed();
$layouts = $page->text()->toLayouts();

?>

<div class="default-content">

    <?php foreach ($layouts as $layout): ?>
        <?= snippet('layouts', compact('layout')); ?>
    <?php endforeach; ?>

    <?php if ($layouts->findBy('role', 'accordion')): ?>
        <?= snippet('accordion-js') ?>
    <?php endif; ?>

    <div class="merch-wrap">

        <div class="merch-collection-grid">
            <?php foreach ($list as $merch): ?>
                <div class="merch-collection-item">
                    <a href="<?= $merch->url() ?>">
                        <div class="merch-collection-item-image">
                            <?= snippet('images', ['src' => $merch->productImage()->toFile()]) ?>
                        </div>
                        <div class="merch-collection-item-info">
                            <div class="merch-collection-item-name">
                                <?= $merch->productName() ?>
                            </div>
                            <div class="merch-collection-item-price">
                                $<?= preg_replace('/\b\.00\b/', '', number_format($merch->productPrice()->toFloat(), 2, '.', '')) ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</div>
<?php snippet('footer') ?>