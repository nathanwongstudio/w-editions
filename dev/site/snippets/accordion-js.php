<script>
    window.addEventListener('DOMContentLoaded', accordionSet);

    var acc;
    window.addEventListener('resize', (event) => {
        clearTimeout(acc);
        acc = setTimeout(accordionMeasure, 100);
    });

</script>