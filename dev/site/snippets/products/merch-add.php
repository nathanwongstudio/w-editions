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

//convert ozs to gms
function toGs($oz) {
  $float = $oz * 28.35;
  return (number_format($float, 2, '.', ''));
}

$weightG = toGs($weight);

?>

<button class="snipcart-add-item <?= $class ?>"
  data-item-id="<?= $page->productID() ?>"
  data-item-price="<?= $page->productPrice() ?>"
  data-item-url="<?= $page->url() ?>"
  data-item-description="<?= $page->ProductDescription() ?>"
  data-item-image="<?= $page->ProductImage()->toFile()->url() ?>"
  data-item-name="<?= $page->ProductName() ?>"

  data-item-weight="<?=$page->packageWeight()?>"

  data-item-width="<?= $cm['width'] ?>"
  data-item-height="<?= $cm['height'] ?>"
  data-item-length="<?= $cm['length'] ?>"

  <?php if($page->taxCategory()->isNotEmpty()) : ?>
  data-item-custom1-name="TaxJarCategory"
  data-item-custom1-value="<?= $page->taxCategory() ?> "
  data-item-custom1-type="hidden"
  <?php endif; ?>

  data-item-taxable="<?= $page->taxable() ?>"

  >
  Add to cart
</button>