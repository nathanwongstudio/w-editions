<?php
/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$ratio   = $block->ratio()->or('auto');
?>
<figure <?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
    <div id="gallery-scroll" data-simplebar data-simplebar-auto-hide="false">
        <ul>
            <?php foreach ($block->images()->toFiles() as $src): 
                $figure = false; ?>
            <li>
            <?= snippet('images', compact('src', 'figure')) ?>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
  <?php if ($caption->isNotEmpty()): ?>
  <figcaption>
    <?= $caption ?>
  </figcaption>
  <?php endif ?>
</figure>

<script>
    
</script>