function lazyLoader() {
    // LAZY LOADING JAVASCRIPT
    var lazyImages = document.querySelectorAll("img[loading=lazy]");
    var allImages = document.querySelectorAll("img");

    var lazyLoad;

    clearTimeout(lazyLoad);

    lazyLoad = setTimeout(() => {
        for (var i of allImages) {
            if (i.loading != "lazy" && i.closest(".is-loading")) {
                i.closest(".is-loading").classList.remove("is-loading");
            }
        }

        if ("loading" in HTMLImageElement.prototype) {
            for (var img of lazyImages) {
                if (!img.complete) {
                    img.addEventListener("load", lazyImageLoad, false);
                    img.addEventListener("error", lazyImageError, false);
                } else {
                    img.closest(".is-loading").classList.remove("is-loading");
                }
            }

            function lazyImageLoad(e) {
                if(e.currentTarget.closest(".is-loading") !== null){
                        e.currentTarget
                        .closest(".is-loading")
                        .classList.remove("is-loading");
                }
            }

            function lazyImageError(e) {
                var parent = e.currentTarget.closest(".is-loading");
                parent.classList.remove("is-loading");
                parent.classList.add("is-empty");
                setTimeout(function () {
                    parent.classList.add("img-is-empty");
                }, 60);
            }
        } else {
            // if 'loading' supported, else

            for (var img of lazyImages) {
                img.classList.remove("is-loading");
            }
        } // if 'loading' supported
    }, "300");

}