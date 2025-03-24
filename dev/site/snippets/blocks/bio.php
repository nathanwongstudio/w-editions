<?php

/** @var \Kirby\Cms\Block $block */

$artist = $block->artistLink()->toPage();
?>
<?= ($artist->profilepic()->isNotEmpty()) ? $artist->profilepic()->toFile() : '' ?>
<?= $artist->bio()->toBlocks(); ?>



