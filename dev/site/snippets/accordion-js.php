<script>
    window.addEventListener('load', accordionSet);

    var acc;
    window.addEventListener('resize', (event) => {
        clearTimeout(acc);
        acc = setTimeout(accordionMeasure, 100);
    });
</script>