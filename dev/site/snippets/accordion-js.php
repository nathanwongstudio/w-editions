<?= js('assets/js/accordion.js') ?>

<script>
    window.onload = setTimeout(accordionSet, 5);

    window.onresize = () => {
        setTimeout(accordionSet, 1000);
    }
</script>