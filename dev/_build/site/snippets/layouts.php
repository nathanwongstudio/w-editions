<div class="section-wrapper 
            <?= $layout->class() ?> 
            <?= $layout->role() ?>
            <?= ($layout->role() == 'accordion' && $layout->next()->role() != 'accordion') ? 'last' : '' ?>"
    id="<?= $layout->layoutId() ?>"
    style=" <?=($layout->tickerLength()->isNotEmpty()) ? '--duration:' . $layout->tickerLength() . 's;' : '' ?>
            <?= ($layout->tickerColor()->isNotEmpty()) ? '--background:' . $layout->tickerColor() . ';' : '' ?>
            <?= ($layout->tickerTextColor()->isNotEmpty()) ? '--ticker-text:' . $layout->tickerTextColor() . ';' : '' ?>
            <?= ($layout->role() == 'ticker') ? 'margin:0;' : '' ?>
            <?= ($layout->featureBG()->isNotEmpty()) ? '--features-bg:' . $layout->featureBG() . ';' : '' ?>
            <?= ($layout->featureTC()->isNotEmpty()) ? '--contrast-text-color:' . $layout->featureTC() . ';' : '' ?>
            <?= ($layout->featureTC()->isNotEmpty()) ? '--features-text-color:' . $layout->featureTC() . ';' : '' ?>
            <?= ($layout->accordionBG()->isNotEmpty()) ? '--accordion-bg:' . $layout->accordionBG() . ';' : '' ?>
            <?= ($layout->accordionTC()->isNotEmpty()) ? '--contrast-text-color:' . $layout->accordionTC() . ';' : '' ?>
            <?= ($layout->accordionTC()->isNotEmpty()) ? '--accordion-text-color:' . $layout->accordionTC() . ';' : '' ?>
    ">
    <section    class="grid <?= (count($layout->columns()) == 1) ? 'single' : '' ?>">
        <?php foreach ($layout->columns() as $column): ?>
            <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                <div class="blocks" style="<?= ($layout->tickerDirection()->toBool()) ? 'animation-direction: reverse;' : '' ?>">
                    <?php if($layout->role() == 'ticker') : ?>
                        <?= str_repeat($column->blocks()->toHtml(), 11) ?>
                    <?php else: ?>
                        <?php foreach($column->blocks() as $block): ?>
                            <div class="block block-type-<?=$block->type() ?> <?= ($block->full()->toBool() ? 'full-image-block' : ' ' ) ?>">
                                <?= $block ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>