<?php

/** @var \Kirby\Cms\Block $block */

$artist = $block->artistLink()->toPage();
?>
<div class="bio-wrapper">
    <div class="bio-text">
        <?= $artist->bio()->toBlocks(); ?>
    </div>

    <div class="bio-profile">
        <?php
        if ($artist->profilepic()->isNotEmpty()) {

            $src = $artist->profilepic()->toFile();

            snippet('images', ['src' => $src, 'imgMinWidth' => '40vw']);
        }
        ?>
    </div>
</div>
<div class="bio-clearfix"> </div>