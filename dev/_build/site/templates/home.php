<?php 
$nav = false;
$foot = false;

snippet('header', compact('nav'));

?>

<div class="iframe-wrapper">
<iframe class="bg-vid" src="https://player.vimeo.com/video/890057192?background=1" width="1920" height="1080" frameborder="0" allow="autoplay" title="video-screen-loop"></iframe>
</div>

<section class="layouts">
    <?php foreach($page->text()->toLayouts() as $layout): ?>
        <div class="section-wrapper 
            <?= $layout->class() ?> 
            <?= $layout->role() ?>" 
            id="<?= $layout->layoutId()?>"
            style="<?=($layout->tickerLength()->isNotEmpty()) ? '--duration:' . $layout->tickerLength() . 's;' : '' ?>
                    <?= ($layout->tickerColor()->isNotEmpty()) ? '--background:' . $layout->tickerColor() . ';' : '' ?>
                    <?= ($layout->tickerTextColor()->isNotEmpty()) ? '--ticker-text:' . $layout->tickerTextColor() . ';' : '' ?>
            ">
            <div class="content-wrapper">
                <section class="grid <?= (count($layout->columns()) == 1) ? 'single' : '' ?>">
                    <?php foreach ($layout->columns() as $column): ?>
                        <div class="column col-<?= Str::replace($column->width(), '/', '-') ?>" style="--span:<?= $column->span() ?>">
                            <div class="blocks" style="<?= ($layout->tickerDirection()->toBool()) ? 'animation-direction: reverse;' : '' ?>">
                                <?php foreach($column->blocks() as $block): ?>
                                    <div class="block block-type-<?=$block->type() ?> <?= ($block->full()->toBool() ? 'full-image-block' : ' ' ) ?>">
                                        <?= $block ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>

            </div>
        </div>
    <?php endforeach; ?>
</section>

<script>
    let observerOptions = {
        rootMargin: '0px',
        threshold: 0.8
    }

    var observer = new IntersectionObserver(observerCallback, observerOptions);

    function observerCallback(entries, observer) {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.classList.add('in-view')
            } else {
                entry.target.classList.remove('in-view')
            }
        });
    };

    let target = '.section-wrapper';
    document.querySelectorAll(target).forEach((i) => {
        if (i) {
            observer.observe(i);
        }
    });
</script>

<?php snippet('footer', compact('foot')) ?>
