<?php snippet('header') ?>
<video playsinline autoplay muted loop poster="<?= $kirby->url('assets') ?>/crt.jpg" id="bgvid">
  <source src="<?= $page->bgvid()->toFile()->url() ?>" type="<?= $page->bgvid()->toFile()->mime() ?>">
</video>

<?php foreach($page->text()->toLayouts() as $layout): ?>
    <?= snippet('layouts', compact('layout')); ?>
<?php endforeach; ?>

<?php snippet('footer') ?>