<?php snippet('header') ?>
<div class="default-content">
    <section class="content">
        <?php foreach($page->text()->toLayouts() as $layout): ?>
            <?= snippet('layouts', compact('layout')); ?>
        <?php endforeach; ?>
    </section>
    <section class="collection">
        <ul class="exclude resources">
            <?php 
            $resources = $page->children()->listed();

            foreach ($resources as $resource): ?>

            <li class="resource">
                <a href="<?=$resource->url()?>"><?=$resource->title()?></a>
            </li>
                    
            <?php endforeach; ?>
        </ul>
    </section>

</div>
<?php snippet('footer') ?>