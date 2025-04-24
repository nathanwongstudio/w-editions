<?php snippet('header');

$layouts = $page->accordionText()->toLayouts();

?>

<div class="default-content">
    <div class="artwork">
        <div class="primary-image">
            <?= snippet('images', ['src' => $page->primaryImg()->toFile(), 'lazy' => false]) ?>
        </div>

        <div class="sticker-box">
            <div class="sticker-wrapper contrast-text">

                <!-- OTHER STICKERS -->
                <?php if ($page->stickers()): ?>
                    <?php foreach ($page->stickers()->toStructure() as $sticker): ?>
                        <div class="tag sticker"><?= $sticker->stickerLabel() ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- AVAILABILITY STICKER -->
                <?php if ($page->available()->toBool()): ?>
                    <div class="sticker availability tag <?= ($page->available()->toBool()) ? 'new' : 'sold' ?>">
                        <?= ($page->available()->toBool()) ? 'Available' : 'Sold Out' ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?= snippet('action-bar') ?>

        <div class="secondary-info">
            <div class="title-card-wrapper">
                <div class="overlay modal-opened">
                    <div class="modal-header">
                        <h3>Info</h3><button class="modal-close" disabled></button>
                    </div>
                    <div class="title-card modal-body">
                        <h2 class="title-card-header artists">
                            <?= $artists ?>
                        </h2>
                        <h1 class="title">
                            <?= $page->title() ?> <span class="year">(<?= $page->year() ?>)</span>
                        </h1>
                        <div class="title-card-footer">
                            <div class="price">
                                $<?= $page->price() ?>
                            </div>

                            <div class="buttons">
                                <?php if($page->framable()->toBool() && $page->onlineShop()->toBool()):?>
                                    <fieldset>
                                        <input type="checkbox" name="frame" id="frame" <?= $framing === '1' ? 'checked' : '' ?>>
                                        <label for="frame">Add a frame for $<?=$page->frame() ?></label>
                                    </fieldset>
                                <?php endif; ?>
                                <?php if ($page->onlineShop()->toBool()):
                                    $inquire = false; ?>
                                    <?= snippet('products/product-add-to-cart', ['class' => 'button']) ?>
                                <?php else:
                                    $inquire = true; ?>
                                    <div class="inquire button">
                                        Inquire
                                    </div>
                                    <div class="addtl-info">
                                        <p><em>Submit an inquiry to be notified by email when presale begins.</em></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="description">
                            <div class="text-block top">
                                <?= $page->text() ?>
                            </div>

                            <p class="artid">
                                <?= $page->artId() ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="image-gallery overlay modal-opened">
                <div class="modal-header">
                    <h3>Additional Images</h3><button class="modal-close" disabled></button>
                </div>
                <ul class="gallery-items modal-body">
                    <?php
                    foreach ($page->details()->toFiles() as $art):
                        $src = $art;
                        $figure = false;
                    ?>
                        <li class="gallery-item">
                            <div class="art-image">
                                <?= snippet('images', compact('src')) ?>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="text-block bottom">
        <?php foreach ($layouts as $layout): ?>
            <?= snippet('layouts', compact('layout')); ?>
        <?php endforeach; ?>

        <?php if ($layouts->findBy('role', 'accordion')): ?>
            <?= snippet('accordion-js') ?>
        <?php endif; ?>

        <?= snippet('action-bar') ?>
    </div>

</div>


<?= snippet('action-bar', ['class' => 'mobile-only']) ?>

<?= ($inquire) ? snippet('inquire-form') : '' ?>

<!--  ADD PARAMS FOR CART  -->
<script>
    // DETECT THE PARAMETER
    var frame = document.getElementById('frame'),
        buttons = document.getElementsByClassName('snipcart-add-item');
    if(frame) {
        frame.addEventListener('change', (event) => {
            for (let i = 0; i < buttons.length; i++) {
                if(frame.checked) {
                    buttons[i].setAttribute('data-item-custom1-value', 'Framed');
                    buttons[i].setAttribute('data-item-url', '<?= url($page->url(), ['params' => ['frame' => '1']])?>');
                    buttons[i].setAttribute('data-item-weight','<?= $weightfG ?>');
                    buttons[i].setAttribute('data-item-height','<?= $cmf['height'] ?>');
                    buttons[i].setAttribute('data-item-length','<?= $cmf['length'] ?>');
                    buttons[i].setAttribute('data-item-width','<?= $cmf['width'] ?>');
                }
                else {
                    buttons[i].setAttribute('data-item-custom1-value', 'Unframed');
                    buttons[i].setAttribute('data-item-url', '<?= url($page->url(), ['params' => ['frame' => '0']])?>');
                    buttons[i].setAttribute('data-item-weight','<?= $weightG ?>');
                    buttons[i].setAttribute('data-item-height','<?= $cm['height'] ?>');
                    buttons[i].setAttribute('data-item-length','<?= $cm['length'] ?>');
                    buttons[i].setAttribute('data-item-width','<?= $cm['width'] ?>');
                }
            }
        })
    }

</script>

<?php snippet('footer') ?>