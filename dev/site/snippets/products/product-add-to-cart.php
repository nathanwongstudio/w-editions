<button class="snipcart-add-item <?= $class ?>"
  data-item-id="<?= $page->artId() ?>"
  data-item-price="<?= $page->price() ?>"
  data-item-url="<?= url($page->url(), ['params' => ['frame' => ($framing = $framing ?? '0')]]) ?>"
  data-item-description="<?= $page->artId() ?> - <?= $page->ProductDescription() ?>"
  data-item-image="<?= $page->ProductImage()->toFile()->url() ?>"
  data-item-name="<?= $page->title() ?> by <?= $artists ?>"

  data-item-max-quantity="<?= $page->maxQty() ?>"

  data-item-weight="<?= $framing === '1' ? $weightfG : $weightG ?>"

  data-item-width="<?= $framing === '1' ? $cmf['width'] : $cm['width'] ?>"
  data-item-height="<?= $framing === '1' ? $cmf['height'] : $cm['height'] ?>"
  data-item-length="<?= $framing === '1' ? $cmf['length'] : $cm['length'] ?>"

  <?php if ($page->framable()->toBool()) : ?>
    data-item-custom1-name="Add a Frame ($<?=$page->frame() ?>)"
    data-item-custom1-type="readonly"
    data-item-custom1-options="Framed[+<?=$page->frame() ?>]|Unframed"
    data-item-custom1-value="<?= $framing === '1' ? 'Framed' : 'Unframed' ?>"
  <?php endif; ?>
  >
  <?= $buttonText = $buttonText ?? "Buy" ?>
</button>