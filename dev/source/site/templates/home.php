<?php snippet('header') ?>

<div class="iframe-wrapper">
<iframe src="https://player.vimeo.com/video/890057192?title=0&autoplay=1&loop=1&byline=0&portrait=0&speed=0&badge=0&autopause=0&airplay=0&audio_tracks=0&chapters=0&chromecast=0&closed_captions=0&transcript=0&player_id=0&app_id=58479" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" title="video-screen-loop"></iframe>
</div>

<section class="layouts">
    <?php foreach($page->text()->toLayouts() as $layout): ?>
        <?= snippet('layouts', compact('layout')); ?>
    <?php endforeach; ?>
</section>

<?php snippet('footer') ?>