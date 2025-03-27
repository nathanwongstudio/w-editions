<?php

/** @var \Kirby\Cms\Block $block */ ?>
<<?= $level = $block->level()->or('h2') ?> data-text="<?= Str::unhtml($block->text()) ?>">
    <?= $block->text() ?>
</<?= $level ?>>