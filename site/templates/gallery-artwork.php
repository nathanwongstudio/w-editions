<?php snippet('header');

$layouts = $page->accordionText()->toLayouts();

$inquire = $page->inquireOnly()->toBool();

$inquireMessage = $page->inquiryMessage();

echo $site->schema('Product')
    ->additionalType('VisualArtwork')
    ->category('500044')
    ->name($page->title())
    ->image($page->primaryImg()->toFile()->url())
    ->description($page->artDescription())
    ->url($page->url())
    ->material($page->artMedium())
    ->brand($artists)
    ->height($page->artHeight())
    ->width($page->artWidth())
    ->depth($page->artDepth())
    ->releaseDate($page->year())
    ->sku($page->artId())
    ->manufacturer('W Editions')
    ->publisher('W Editions')
    ->artEdition($page->editionOf())
    ->artform($page->artform())
    ->artworkSurface($page->artSurface())
    ->artist($artists)

    ->offers(
        $site->schema('offer')
            ->name($page->title() . ' by ' . $artists)
            ->price($page->price())
            ->priceCurrency('usd')
            ->availability($page->available()->toBool() ? 'https://schema.org/LimitedAvailability' : 'https://schema.org/OutOfStock')
            ->url($page->url())
    )

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

        <?= snippet('action-bar', ['inquire' => $inquire]) ?>

        <div class="secondary-info">
            <div class="title-card-wrapper">
                <div class="overlay modal-opened" itemscope itemtype="https://schema.org/VisualArtwork">
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
                                <?php if ($page->framable()->toBool() && $inquire): ?>
                                    <p>
                                        <small>Optional frame +$<?= $page->frame() ?>
                                            <br />Add message to inquiry to learn more about framing.</small>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="buttons">
                                <?php if ($page->framable()->toBool() && !$inquire): ?>
                                    <fieldset class="add-on" id="add-ons-fields">
                                        <ul>
                                            <li>
                                                <input type="radio" name="frame" id="unframed" checked>
                                                <label for="unframed">Unframed</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="frame" id="framed" <?= $framing === '1' ? 'checked' : '' ?>>
                                                <label for="framed">Standard Frame — $<?= $page->frame() ?></label>
                                                <ul>
                                                    <li><a href="#framing">See Standard Framing Details</a></li>
                                                    <?php if ($page->optiumAdd()->toFloat() > 0): ?>
                                                        <li><input type="checkbox" name="glazing" id="glazing" <?= $framing === '1' && $glazing === '1' ? 'checked' : '' ?>>
                                                            <label for="glazing">+ Optium Acrylic — $<?= $page->optiumAdd() ?></label>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </fieldset>
                                <?php endif; ?>

                                <?php if ($inquire): ?>
                                    <button class="inquire button" onclick="fathom.trackEvent('inquire button click <?= $page->artId() ?>');">
                                        Inquire
                                    </button>
                                    <div class="addtl-info">
                                        <p><em><?= $inquireMessage->isNotEmpty() ? $inquireMessage : 'This item is available by inquiry only. Kindly send us a message using this form to inquire.' ?></em></p>
                                    </div>
                                <?php else: ?>
                                    <?= snippet('products/product-add-to-cart', ['class' => 'button']) ?>
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

        <?= snippet('action-bar', ['inquire' => $inquire]) ?>
    </div>

</div>


<?= snippet('action-bar', ['class' => 'mobile-only', 'inquire' => $inquire]) ?>

<?= ($inquire) ? snippet('inquire-form') : '' ?>

<!--  ADD PARAMS FOR CART  -->
<script>
    // DETECT THE PARAMETER
    var frame = document.getElementById('add-ons-fields'),
        buttons = document.getElementsByClassName('snipcart-add-item');
    if (frame) {
        var optium = document.getElementById('glazing'),
            unframed = document.getElementById('unframed'),
            inputs = document.querySelectorAll("#add-ons-fields input"),
            vars = {};

        let weight,
            height,
            length,
            width,
            custom1,
            custom2,
            custom2Type;

        frame.addEventListener('change', (event) => {

            if (unframed.checked && optium) {
                optium.checked = false;
            }

            for (let a = 0; a < inputs.length; a++) {

                var key = inputs[a].getAttribute('id');

                if (inputs[a].checked) {
                    vars[key] = 1;
                } else {
                    vars[key] = 0;
                }
            }

            if (vars.glazing === 1) {
                custom2 = 'Optium — $<?= $page->optiumAdd() ?>';
                custom2Type = 'readonly';
            } else {
                custom2 = "UV Plexi";
                custom2Type = 'readonly';

                if (vars.unframed === 1) {
                    custom2 = 'None';
                    custom2Type = 'hidden';
                }
            }

            if (vars.framed === 1) {
                weight = <?= $weightfG ?>;
                height = <?= $cmf['height'] ?>;
                length = <?= $cmf['length'] ?>;
                width = <?= $cmf['width'] ?>;
                custom1 = 'Framed — $<?= $page->frame() ?>';
            } else {
                weight = <?= $weightG ?>;
                height = <?= $cm['height'] ?>;
                length = <?= $cm['length'] ?>;
                width = <?= $cm['width'] ?>;
                custom1 = 'Unframed';
            }

            for (let i = 0; i < buttons.length; i++) {
                // URL
                buttons[i].setAttribute('data-item-url', '<?= url($page->url()) ?>/frame:' + vars.framed + '/glazing:' + vars.glazing);

                // PACKAGE DIMS
                buttons[i].setAttribute('data-item-weight', weight);
                buttons[i].setAttribute('data-item-height', height);
                buttons[i].setAttribute('data-item-length', length);
                buttons[i].setAttribute('data-item-width', width);

                // CUSTOM 1 - FRAME
                buttons[i].setAttribute('data-item-custom1-value', custom1);

                // CUSTOM 2 - GLAZING
                buttons[i].setAttribute('data-item-custom2-value', custom2);
                buttons[i].setAttribute('data-item-custom2-type', custom2Type);
            }
        })
    }
</script>

<?php snippet('footer') ?>