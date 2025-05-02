<?php 
$parent = $page->parent();
snippet('header', ['parent'=> $parent]); ?>
<?php if ($parent): ?>
    <nav id="sub-nav" class="subpages">
        <ul class="sub-nav-links">
            <li><a href="<?= $page->parent()->url() ?>"><?= $page->parent()->title() ?>:</a></li>
            <?php
            foreach ($page->parent()->children()->listed() as $child):
            ?>
                <li class="<?= ($child->isActive()) ? 'active' : ''?>">
                    <a href="<?= $child->url() ?>"><?= $child->title() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
<?php endif; ?>

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