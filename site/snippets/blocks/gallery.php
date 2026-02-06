<?php

/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$ratio   = $block->ratio()->or('auto');
?>
<figure <?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
  <div class="gallery-scroll">
    <input data-block="<?= $block->id() ?>" type="checkbox" id="open-gallery-<?= $block->id() ?>" class="open-gallery-toggle" name="open-gallery">
    <ul>
      <?php foreach ($block->images()->toFiles() as $src):
        $figure = false; ?>
        <li>
          <?= snippet('images', compact('src', 'figure')) ?>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
  <figcaption>
    <div class="captext">
      <?php if ($caption->isNotEmpty()): ?>
        <?= $caption ?>
      <?php endif ?>
    </div>

    <div class="gallery-buttons">
      <label class="open-gallery button" for="open-gallery-<?= $block->id() ?>">Open Image Gallery</label>
    </div>

  </figcaption>
</figure>