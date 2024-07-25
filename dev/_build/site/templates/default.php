<?php snippet('header') ?>
<div class="default-content">
<?php foreach($page->text()->toLayouts() as $layout): ?>
    <?= snippet('layouts', compact('layout')); ?>
<?php endforeach; ?>
</div>
<?php snippet('footer') ?>