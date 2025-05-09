<?php

switch($glazing) {
  case 1:
    $glazingOption = 'Optium — $' . $page->optiumAdd();
    break;
  case 2:
    $glazingOption = 'None';
    break;
  default:
    $glazingOption = 'UV Plexi';
    break;
}

?>
<button class="snipcart-add-item <?= $class ?>"
  data-item-id="<?= $page->artId() ?>"
  data-item-price="<?= $page->price() ?>"
  data-item-url="<?= Url::current() ?>"
  data-item-description="<?= $page->artId() ?> - <?= $page->ProductDescription() ?>"
  data-item-image="<?= $page->ProductImage()->toFile()->url() ?>"
  data-item-name="<?= $page->title() ?> by <?= $artists ?>"

  data-item-max-quantity="<?= $page->maxQty() ?>"

  data-item-weight="<?= $framing === '1' ? $weightfG : $weightG ?>"

  data-item-width="<?= $framing === '1' ? $cmf['width'] : $cm['width'] ?>"
  data-item-height="<?= $framing === '1' ? $cmf['height'] : $cm['height'] ?>"
  data-item-length="<?= $framing === '1' ? $cmf['length'] : $cm['length'] ?>"

  <?php if ($page->framable()->toBool()) : ?>
  data-item-custom1-name="Frame"
  data-item-custom1-type="readonly"
  data-item-custom1-options="Framed — $<?= $page->frame() ?>[+<?= $page->frame() ?>]|Unframed"
  data-item-custom1-value="<?= $framing === '1' ? 'Framed — $' . $page->frame() : 'Unframed' ?>"

  data-item-custom2-name="Glazing"
  data-item-custom2-type="<?= ($framing === '1') ? 'readonly' : 'hidden' ?>"
  data-item-custom2-options="<?= ($page->optiumAdd()->toFloat() > 0) ? 'Optium — $' . $page->optiumAdd() . '[+' . $page->optiumAdd() .']|' : '' ?>UV Plexi|None"
  data-item-custom2-value="<?= $glazingOption ?>"

  <?php endif; ?>>
  <?= $buttonText = $buttonText ?? "Buy" ?>
</button>