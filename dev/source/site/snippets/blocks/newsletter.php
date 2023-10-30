<h3 class="newsletter-header">
    <?= $block->label()?>
</h3>
<form
  action="https://buttondown.email/api/emails/embed-subscribe/nwongeditions"
  method="post"
  class="embeddable-buttondown-form"
>
<div class="email">
  <input type="email" name="email" id="bd-email" placeholder=" " />
  <div class="cursor"></div>
  <input type="submit" value="Submit" />
</div>
</form>

<script>
    var input = document.getElementById('bd-email');

    input.addEventListener('mouseover', function() {
        input.focus();
    });

</script>
