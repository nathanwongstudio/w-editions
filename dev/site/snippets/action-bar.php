<div class="action-bar <?= $class = $class ?? '' ?>">
    <div class="action-info">
        <strong><?= $page->title() . " (" . $page->year() . ")" ?></strong> by <?= $artists ?>
    </div>
    <div class="action-cta">
        <?php if ($page->onlineShop()->toBool()):
            $inquire = false;
            $buytext = $buytext ?? "$" . $page->price() . "—" . "Buy"; ?>
            <?= snippet('products/product-add-to-cart', ['class' => 'button inline', 'buttonText' => $buytext]) ?>
        <?php else:
            $inquire = true; ?>
            <div class="button inline inquire">
                <?= "$" . $page->price() ?> — Inquire
            </div>
        <?php endif; ?>
    </div>
</div>