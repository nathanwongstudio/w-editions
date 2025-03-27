<?php

/** @var \Kirby\Cms\Block $block */ ?>
<a class="button go" href="<?= $block->buttonLink()->toUrl() ?>"><?= $block->buttonText() ?></a>