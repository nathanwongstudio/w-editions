<div class="section-wrapper 
            <?= $layout->class() ?> 
            <?= $layout->role() ?>" 
    style="
            <?=($layout->tickerLength()->isNotEmpty()) ? '--duration:' . $layout->tickerLength() . 's;' : '' ?>
            <?= ($layout->tickerColor()->isNotEmpty()) ? '--background:' . $layout->tickerColor() . ';' : '' ?>
            <?= ($layout->tickerTextColor()->isNotEmpty()) ? '--ticker-text:' . $layout->tickerTextColor() . ';' : '' ?>
    ">
    <section class="grid <?= (count($layout->columns()) == 1) ? 'single' : '' ?>" id="layout-<?=$layout->id()?>">
        <?php foreach ($layout->columns() as $column): ?>
            <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                <div class="blocks" style="<?= ($layout->tickerDirection()->toBool()) ? 'animation-direction: reverse;' : '' ?>">
                    <?php foreach($column->blocks() as $block): ?>
                        <div class="block block-type-<?=$block->type() ?> <?= ($block->full()->toBool() ? 'full-image-block' : ' ' ) ?>">
                            <?= $block ?>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>