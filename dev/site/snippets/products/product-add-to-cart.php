<button class="snipcart-add-item <?= $class ?>"
  data-item-id="<?= $page->artId() ?>"
  data-item-price="<?= $page->price() ?>"
  data-item-url="<?= Url::path($page->url(), true, false); ?>"
  data-item-description="<?= $page->artId() ?> - <?= $page->ProductDescription() ?>"
  data-item-image="<?= Url::path($page->ProductImage()->toFile()->url(), true, false); ?>"
  data-item-name="<?= $page->title() ?>"
  data-item-max-quantity="<?= $page->maxQty() ?>"
  data-item-weight="<?=$page->packageWeight()?>"
  data-item-width="<?=$page->packageWidth()?>"
  data-item-height="<?=$page->packageHeight()?>"
  data-item-length="<?=$page->packageLength()?>"
  >
  Add to cart
</button>