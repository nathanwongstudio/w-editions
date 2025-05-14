<?php
$parent = $page->parent();
snippet('header'); ?>

<div class="default-content">
    <div class="section-wrapper header">
        <section class="grid single">
            <div class="column col-1-1" style="--span:12">
                <div class="blocks">
                    <div class="block block-type-heading">

                        <h1><?= $page->title() ?></h1>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="section-wrapper">
        <section class="grid single">
            <div class="column col-1-1" style="--span:12">
                <div class="blocks">
                    <div class="block block-type-text">
                        <?= $page->text() ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
<?php snippet('footer') ?>