<div class="section-wrapper <?= $layout->class() ?> <?= $layout->role() ?>" <?=($layout->tickerLength()->isNotEmpty()) ? 'style="--duration:' . $layout->tickerLength() . 's"' : '' ?>>
    <section class="grid <?= (count($layout->columns()) == 1) ? 'single' : '' ?>" id="layout-<?=$layout->id()?>">
        <?php foreach ($layout->columns() as $column): ?>
            <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                <div class="blocks">
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