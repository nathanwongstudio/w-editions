<button class="snipcart-add-item <?= $class ?>"
  data-item-id="<?= $page->artId() ?>"
  data-item-price="<?= $page->price() ?>"
  data-item-url="<?=$page->url() ?>"
  data-item-description="<?= $page->artId() ?> - <?= $page->ProductDescription() ?>"
  data-item-image="<?= $page->ProductImage()->toFile()->url() ?>"
  data-item-name="<?= $page->title() ?> by <?= $artists ?>"

  data-item-max-quantity="<?= $page->maxQty() ?>"

  data-item-weight="<?=$weightG?>"

  data-item-width="<?= $cm['width'] ?>"
  data-item-height="<?= $cm['height'] ?>"
  data-item-length="<?= $cm['length'] ?>"

  <?php if($page->framable()->toBool()) : ?>
    <?php if($page->frame()->toFloat() > 0): ?>
      data-item-custom1-name="Frame it for me for $<?= $page->frame()->toFloat() ?> (Additional shipping will be invoiced separately)"
      data-item-custom1-type="checkbox"
      data-item-custom1-options="true[<?= $page->frame()->toFloat() ?>]|false"
      data-item-custom1-value="false"
    <?php else: ?>
      data-item-custom1-name="Frame Option (Additional shipping will be invoiced separately)"
      data-item-custom1-type="dropdown"
      data-item-custom1-options="
        Do not frame[0] |
        Optium UV & Non-Reflective Glazing ($<?= $page->frameOptium()->toFloat() ?>)[+<?= $page->frameOptium()->toFloat() ?>] |
        OP3 UV Glazing ($<?= $page->frameOP3()->toFloat() ?>)[+<?= $page->frameOP3()->toFloat() ?>]"
      data-item-custom1-value="Do not frame"
    <?php endif; ?>
  <?php endif; ?>

  >
  <?= $buttonText = $buttonText ?? "Buy" ?>
</button>