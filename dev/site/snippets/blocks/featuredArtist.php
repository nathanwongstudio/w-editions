<?php

/** @var \Kirby\Cms\Block $block */ ?>
<a class="feature-link" href="<?= $block->link()->toUrl() ?>">
    <h3 class="top-text"><?= $block->topText() ?></h3>
    <?= snippet('images', ['src' => $block->image()->toFile()]) ?>
    <h3 class="bottom-text"><?= $block->bottomText() ?></h3>

    <span class="go mu-arrow-right"></span>
</a>