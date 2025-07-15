<?php $inquire = $inquire ?? $page->inquireOnly()->toBool(); ?>
<div class="action-bar <?= $class = $class ?? '' ?>">
    <div class="action-info">
        <strong><?= $page->title() . " (" . $page->year() . ")" ?></strong> <span class="chop-inline"></span> <?= $artists ?>
    </div>
    <div class="action-cta">
        <?php if (!$inquire):
            $buytext = $buytext ?? "$" . $page->price() . "—" . "Buy"; ?>
            <?= snippet('products/product-add-to-cart', ['class' => 'button inline', 'buttonText' => $buytext]) ?>
        <?php else: ?>
            <div class="button inline inquire">
                <?= "$" . $page->price() ?> — Inquire
            </div>
        <?php endif; ?>
    </div>
</div>