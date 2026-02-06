<?php snippet('header') ?>
<div class="default-content">
    <section class="content">
        <?php foreach ($page->text()->toLayouts() as $layout): ?>
            <?= snippet('layouts', compact('layout')); ?>
        <?php endforeach; ?>
    </section>
    <section class="collection">
            <?php
            $resources = $page->children()->sortBy('date', 'desc');

            foreach ($resources as $resource): ?>

                <article class="resource">
                    <header>
                        <a href="<?= $resource->url() ?>"><h4><?= $resource->title() ?></h4></a>
                        <time><?= $resource->date()->toDate('n/j/Y') ?></time>
                    </header>
                </article>

            <?php endforeach; ?>
    </section>

</div>
<?php snippet('footer') ?>