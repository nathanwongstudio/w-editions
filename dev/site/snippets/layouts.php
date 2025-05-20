<div class="section-wrapper 
            <?= $layout->class() ?> 
            <?= $layout->role() ?>
            <?php if ($layout->next()) {
                echo ($layout->role() == 'accordion' && $layout->next()->role() != 'accordion') ? 'last' : '';
            } else {
                echo 'last';
            } ?>
             <?php if ($layout->next()) {
                    echo ($layout->role() == 'ticker' && $layout->next()->role() != 'ticker') ? 'last' : '';
                } else {
                    echo 'last';
                } ?>"
    id="<?= $layout->layoutId() ?>"
    style=" <?= ($layout->tickerLength()->isNotEmpty()) ? '--duration:' . $layout->tickerLength() . 's;' : '' ?>
            <?= ($layout->tickerColor()->isNotEmpty()) ? '--background:' . $layout->tickerColor() . ';' : '' ?>
            <?= ($layout->tickerTextColor()->isNotEmpty()) ? '--ticker-text:' . $layout->tickerTextColor() . ';' : '' ?>
            <?= ($layout->role() == 'ticker') ? 'margin:0;' : '' ?>
            <?= ($layout->featureBG()->isNotEmpty()) ? '--features-bg:' . $layout->featureBG() . ';' : '' ?>
            <?= ($layout->featureTC()->isNotEmpty()) ? '--contrast-text-color:' . $layout->featureTC() . ';' : '' ?>
            <?= ($layout->featureTC()->isNotEmpty()) ? '--features-text-color:' . $layout->featureTC() . ';' : '' ?>
            <?= ($layout->accordionBG()->isNotEmpty()) ? '--accordion-bg:' . $layout->accordionBG() . ';' : '' ?>
            <?= ($layout->accordionTC()->isNotEmpty()) ? '--contrast-text-color:' . $layout->accordionTC() . ';' : '' ?>
            <?= ($layout->accordionTC()->isNotEmpty()) ? '--accordion-text-color:' . $layout->accordionTC() . ';' : '' ?>
    "
    >
    <section
        class="grid
        <?= (count($layout->columns()) == 1) ? 'single' : '' ?>
        <?= ($layout->openDefault()->toBool()) ? 'active' : '' ?>">
        <?php foreach ($layout->columns() as $column): ?>
            <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                <div class="blocks" style="<?= ($layout->tickerDirection()->toBool()) ? 'animation-direction: reverse;' : '' ?>">
                    <?php if ($layout->role() == 'ticker') : ?>
                        <?= str_repeat($column->blocks()->toHtml(), 11) ?>
                    <?php else: ?>
                        <?php foreach ($column->blocks() as $block):
                            $blockWidth = $column->span() / 0.12 . 'vw';
                            ?>
                            <div class="block block-type-<?= $block->type() ?> <?= ($block->full()->toBool() ? 'full-image-block' : ' ') ?>"  <?= $layout->role() == 'accordion' && $block->isFirst() ? 'tabindex="0" aria-label="Click to open accordion menu for ' . $block->text() . '"' : '' ?>>
                                <?php snippet('blocks/' . $block->type(), [
                                    'block' => $block,
                                    'blockWidth' => $blockWidth
                                ]) ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>