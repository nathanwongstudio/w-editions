<?php snippet('header'); ?>
<div class="default-content">

    <?php foreach ($layouts as $layout): ?>
        <?= snippet('layouts', compact('layout')); ?>
    <?php endforeach; ?>

    <?php if ($layouts->findBy('role', 'accordion')): ?>
        <?= snippet('accordion-js') ?>
    <?php endif; ?>

    <?php if ($layouts->filterBy('type', 'gallery')): ?>
        <?= snippet('modals/overlay', ['modalTitle' => 'Image Gallery', 'modalContent' => '', 'id' => 'gallery-overlay']) ?>
        <?= snippet('inline-gallery-js') ?>
    <?php endif; ?>

</div>
<?php snippet('footer') ?>