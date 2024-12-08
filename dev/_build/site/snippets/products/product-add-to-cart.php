<?php 
$width = $page->packageWidth()->toFloat();
$height = $page->packageHeight()->toFloat();
$length = $page->packageLength()->toFloat();
$weight = $page->packageWeight()->toFloat();

$in = array('width' => $width, 'height' => $height, 'length' => $length);
$cm = array_map('toCM', $in);

//convert in to cm
function toCM($in) {
  $float = $in * 2.54;
  return (number_format($float, 0, '.', ''));
}

//convert lbs to gms
function toGs($lb) {
  $float = $lb * 453.59237;
  return (number_format($float, 2, '.', ''));
}

$weightG = toGs($weight);

?>

<button class="snipcart-add-item <?= $class ?>"
  data-item-id="<?= $page->artId() ?>"
  data-item-price="<?= $page->price() ?>"
  data-item-url="<?= Url::path($page->url(), true, false); ?>"
  data-item-description="<?= $page->artId() ?> - <?= $page->ProductDescription() ?>"
  data-item-image="<?= Url::path($page->ProductImage()->toFile()->url(), true, false); ?>"
  data-item-name="<?= $page->title() ?>"

  data-item-max-quantity="<?= $page->maxQty() ?>"

  data-item-weight="<?=$page->packageWeight()?>"

  data-item-width="<?= $cm['width'] ?>"
  data-item-height="<?= $cm['height'] ?>"
  data-item-length="<?= $cm['length'] ?>"

  <?php if($page->framable()) : ?>
  data-item-custom1-name="Frame it for me for $<?= $page->frameCost() ?>"
  data-item-custom1-type="checkbox"
  data-item-custom1-options="true[<?= $page->frameCost() ?>]|false"
  data-item-custom1-value="false"
  <?php endif; ?>

  >
  Add to cart
</button>