<?php snippet('header') ?>
<div class="default-content">
<?php foreach($page->text()->toLayouts() as $layout): ?>
    <div class="section-wrapper">
        <section class="grid" id="layout-<?=$layout->id()?>">
            <?php foreach ($layout->columns() as $column): ?>
                <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                    <div class="blocks">
                        <?php foreach($column->blocks() as $block): ?>
                            <div class="block block-type-<?=$block->type() ?>">
                                <?= $block ?>
                            </div>
                        <?php endforeach ?>
                        </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
<?php endforeach; ?>
</div>
<?php snippet('footer') ?>