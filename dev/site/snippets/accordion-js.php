<script>
    var init;

    var acc;

    window.addEventListener('load', (event) => {
        var accImgs = document.querySelectorAll(".accordion img");

        if ("loading" in HTMLImageElement.prototype) {
            for (let ii = 0; ii < accImgs.length; ii++) {
                accImgs[ii].addEventListener("load", (event) => {
                    clearTimeout(acc);
                    acc = setTimeout(accordionMeasure, 100);
                });
            }
        }
    });

    window.addEventListener('resize', (event) => {
        clearTimeout(acc);
        acc = setTimeout(accordionMeasure, 100);
    });
</script>