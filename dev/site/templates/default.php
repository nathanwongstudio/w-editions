<?php snippet('header');

$layouts = $page->text()->toLayouts();

?>
<div class="default-content">

    <?php foreach($layouts as $layout): ?>
        <?= snippet('layouts', compact('layout')); ?>
    <?php endforeach; ?>

    <?php if($layouts->findBy('role', 'accordion')): ?>
        <?= snippet('accordion-js') ?>
    <?php endif; ?>

</div>
<?php snippet('footer') ?>