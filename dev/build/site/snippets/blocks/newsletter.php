<h3 class="newsletter-header">
    <?= $block->label()?>
</h3>
<form
  action="https://buttondown.email/api/emails/embed-subscribe/weditions"
  method="post"
  class="embeddable-buttondown-form"
  id="buttondown"
>
<div class="email">
  <fieldset>
  <input type="email" name="email" id="bd-email" placeholder=" " class="empty" />
  <div class="cursor"></div>
  <input type="submit" value="Submit" />
  </fieldset>
  <div class="bd-error"></div>
</div>
</form>

<script>
    var input = document.getElementById('bd-email');

    input.addEventListener('mouseover', function() {
        input.focus();
    });

    input.addEventListener('change', function() {
      if(input.value == "") {
        input.classList.add('empty');
      } else {
        input.classList.remove('empty');
      }
    });

</script>
