<?php snippet('header') ?>
    <?php foreach ($page->text()->toBlocks() as $block): 
        if ($block->type() == 'image'):
            if($block->full()): ?>
                <section id="<?= $block->id() ?>" class="full-width-image block block-type-<?= $block->type() ?>">
                    <?= $block ?>
                </section>
    <?php
            endif;
        else: ?>

        <section id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
            <div class="content">
                <?= $block ?>
            </div>
        </section>
    <?php 
        endif;
    endforeach ?>
<?php snippet('footer') ?>