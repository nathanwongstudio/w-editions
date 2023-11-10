<?php snippet('header') ?>
<div class="default-content">

<div class="colors">
    <h1>Colors</h1>
    <div class="chart">
        <!-- BENIBANA -->
        <DIV class="row benibana">
            <div class="color">--c-benibana</div>
            <div class="color c-100"></div>
            <div class="color c-200"></div>
            <div class="color c-300"></div>
            <div class="color c-400"></div>
            <div class="color c-500"></div>
            <div class="color c-600"></div>
            <div class="color c-700"></div>
            <div class="color c-800"></div>
            <div class="color c-900"></div>
        </div>
        <!-- CINNABAR -->
        <DIV class="row cinnabar">
            <div class="color">--c-cinnabar</div>
            <div class="color c-100"></div>
            <div class="color c-200"></div>
            <div class="color c-300"></div>
            <div class="color c-400"></div>
            <div class="color c-500"></div>
            <div class="color c-600"></div>
            <div class="color c-700"></div>
            <div class="color c-800"></div>
            <div class="color c-900"></div>
        </div>
        <!-- COBALT -->
        <DIV class="row cobalt">
            <div class="color">--c-cobalt</div>
            <div class="color c-100"></div>
            <div class="color c-200"></div>
            <div class="color c-300"></div>
            <div class="color c-400"></div>
            <div class="color c-500"></div>
            <div class="color c-600"></div>
            <div class="color c-700"></div>
            <div class="color c-800"></div>
            <div class="color c-900"></div>
        </div>
        <!-- PAPER -->
        <DIV class="row paper">
            <div class="color">--c-paper</div>
            <div class="color c-100"></div>
            <div class="color c-200"></div>
            <div class="color c-300"></div>
            <div class="color c-400"></div>
            <div class="color c-500"></div>
            <div class="color c-600"></div>
            <div class="color c-700"></div>
            <div class="color c-800"></div>
            <div class="color c-900"></div>
        </div>

        <!-- paynes -->
        <DIV class="row paynes">
            <div class="color">--c-paynes</div>
            <div class="color c-100"></div>
            <div class="color c-200"></div>
            <div class="color c-300"></div>
            <div class="color c-400"></div>
            <div class="color c-500"></div>
            <div class="color c-600"></div>
            <div class="color c-700"></div>
            <div class="color c-800"></div>
            <div class="color c-900"></div>
        </div>
        <!-- violet -->
        <DIV class="row violet">
            <div class="color">--c-violet</div>
            <div class="color c-100"></div>
            <div class="color c-200"></div>
            <div class="color c-300"></div>
            <div class="color c-400"></div>
            <div class="color c-500"></div>
            <div class="color c-600"></div>
            <div class="color c-700"></div>
            <div class="color c-800"></div>
            <div class="color c-900"></div>
        </div>
    </div>
</div>

<?php foreach($page->text()->toLayouts() as $layout): ?>
    <div class="section-wrapper">
        <section class="grid" id="layout-<?=$layout->id()?>">
            <?php foreach ($layout->columns() as $column): ?>
                <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                    <div class="blocks">
                        <?php foreach($column->blocks() as $block): ?>
                            <div class="block block-type-<?=$block->type() ?>">
                                <?= $block ?>
                            </div>
                        <?php endforeach ?>
                        </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
<?php endforeach; ?>

</div>
<?php snippet('footer') ?>