<?php

/** @var \Kirby\Cms\Block $block */
$alt     = $block->alt();
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$link    = $block->link();
$ratio   = $block->ratio()->or('auto');
$src     = null;
$web     = false;
$fullscreen = $block->full()->toBool();
$imgMinWidth = $blockWidth ?? null;
// $column  = null; /** COLUMN WIDTH FROM LAYOUT TAGS IN VW */

if ($block->location() == 'web') {
	$src = $block->src()->esc();
	$web = true;
} elseif ($image = $block->image()->toFile()) {
	$alt = $alt->or($image->alt());
	$src = $image;
}

?>

<?php snippet('images', compact('src', 'link', 'fullscreen', 'imgMinWidth'), slots: true) ?>
		
		<?php slot('caption') ?>
		
			<?= $caption ?>

		<?php endslot() ?>

<?php endsnippet() ?>

