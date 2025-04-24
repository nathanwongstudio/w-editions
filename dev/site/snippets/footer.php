<?= !($page->isErrorPage()) ? snippet('cart/cart-checkout-summary') : '' ?>

<?php
if (!isset($foot)) {
    $foot = true;
}

if ($foot): ?>
    <footer class="signed-area">
        <!-- <span class="chop" data-text="W/">W/</span> -->
    </footer>
<?php endif; ?>
</div>


<?= js('@auto', ['type' => 'module']) ?>

<script>
    document.addEventListener('snipcart.ready', () => {

        Snipcart.store.subscribe(() => {
            if (Snipcart.store.getState().cart.items.count === 0) {
                document.getElementById('checkout-button').classList.add('empty');
            } else {
                document.getElementById('checkout-button').classList.remove('empty');
            }
        });
    });
</script>

<script>
    // X NAVIGATOR OPEN/CLOSE MENU JS (FIXED SIZE)
    // use responsivenav.js if you want it to adjust to the size of the menu.
    function navigation() {
        var navX = document.getElementById('x'),
            menu = document.getElementById('main-nav'),
            htmlbody = document.getElementsByTagName("BODY")[0],
            wrapper = document.getElementById('body-wrapper');

        navX.addEventListener('change', (event) => {
            if (navX.checked) {
                menu.classList.add('is-open');
                navX.classList.add('is-active');
                htmlbody.classList.add('nav-active');
                navX.ariaPressed = "true";

            } else {
                menu.classList.remove('is-open');
                navX.classList.remove('is-active');
                htmlbody.classList.remove('nav-active');
                navX.ariaPressed = "false";
            }
        })
    }

    navigation();
</script>

<script>
    window.addEventListener('load', lazyLoader);

    // REMOVE ALL ANIMATIONS
    let resizeTimer;
    window.addEventListener("resize", () => {
        document.body.classList.add("resize-animation-stopper");

        clearTimeout(resizeTimer);

        resizeTimer = setTimeout(() => {
            document.body.classList.remove("resize-animation-stopper");
        }, 400);

    });
</script>

<style>
    .resize-animation-stopper * {
        transition: none !important;
        animation: none !important;
    }
</style>

<?= $site->customAnalytics() ?>

<?= snippet('cart/cart-load') ?>

<?php if ($page->footerCode()->isNotEmpty()): ?>
    <script>
        <?= $page->footerCode() ?>
    </script>
<?php endif; ?>

<?= snippet('cookieconsentJs') ?>

<script>
    function closeModal(target) {
        target.parentElement.parentElement.classList.remove('modal-opened');
    }
</script>

</body>

</html>