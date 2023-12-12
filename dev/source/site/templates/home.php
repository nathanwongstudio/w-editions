<?php 
$nav = false;
$foot = false;
snippet('header', compact('nav')); ?>

<div class="iframe-wrapper">
<iframe src="https://player.vimeo.com/video/890057192?background=1" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" title="video-screen-loop"></iframe>
</div>

<section class="layouts">
    <?php foreach($page->text()->toLayouts() as $layout): ?>
        <div class="section-wrapper 
            <?= $layout->class() ?> 
            <?= $layout->role() ?>" 
            style="
                    <?=($layout->tickerLength()->isNotEmpty()) ? '--duration:' . $layout->tickerLength() . 's;' : '' ?>
                    <?= ($layout->tickerColor()->isNotEmpty()) ? '--background:' . $layout->tickerColor() . ';' : '' ?>
                    <?= ($layout->tickerTextColor()->isNotEmpty()) ? '--ticker-text:' . $layout->tickerTextColor() . ';' : '' ?>
            ">
            <section class="grid <?= (count($layout->columns()) == 1) ? 'single' : '' ?>" id="layout-<?=$layout->id()?>">
                <?php foreach ($layout->columns() as $column): ?>
                    <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                        <div class="blocks" style="<?= ($layout->tickerDirection()->toBool()) ? 'animation-direction: reverse;' : '' ?>">
                            <?php foreach($column->blocks() as $block): ?>
                                <div class="block block-type-<?=$block->type() ?> <?= ($block->full()->toBool() ? 'full-image-block' : ' ' ) ?>">
                                    <?= $block ?>
                                    <div class="overlay" aria-hidden="true">
                                        <?= $block ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    <?php endforeach; ?>
</section>

<?php snippet('footer', compact('foot')) ?>
