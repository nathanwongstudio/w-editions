<?php if(!$page->isHomePage()): ?>
    <footer class="signed-area">
        <section class="edition">1/1</section>
        <section class="title"><?= $site->title() ?></section>
        <section class="signed">site by <a href="https://itsallwong.com">nathan</a></section>
    </footer>
<?php endif; ?>
</div>
</body>

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

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
    }

    const rotation = getRandomInt(-45, 46);

    var heading = document.querySelector('.header .block-type-heading h1');
    heading.style.setProperty('--rotation', rotation + 'deg');

    document.addEventListener("DOMContentLoaded", function() { // LAZY LOADING JAVASCRIPT
        var lazyImages = document.querySelectorAll('img[loading=lazy]'),
            notLazy = document.querySelectorAll('img:not([loading=lazy])');

        setTimeout(() => {
            for (var img of notLazy) {
                img.parentNode.classList.remove('is-loading');
            }
            
            if ('loading' in HTMLImageElement.prototype) {
        
                for (var img of lazyImages) {
                    if (!img.complete) {
                        img.addEventListener('load', lazyImageLoad, false);
                        img.addEventListener('error', lazyImageError, false);
                    } else {
                        img.parentNode.classList.remove('is-loading');
                    }
                }
                
                function lazyImageLoad(e) {
                    e.currentTarget.parentNode.classList.remove('is-loading');
                }
                
                function lazyImageError(e) {
                    var parent = e.currentTarget.parentNode;
                    parent.classList.remove('is-loading');
                    parent.classList.add('is-empty');
                    setTimeout(function() {
                        parent.classList.add('img-is-empty');
                    }, 60);
                }
        
            } else { // if 'loading' supported, else
                
                    for (var img of lazyImages) {
                        img.classList.remove('is-loading');
                    }

            } // if 'loading' supported
                
        }, '300');

    })();

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


<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js" defer></script>

<style>

.resize-animation-stopper * {
	transition: none !important;
	animation: none !important;
}
</style>

<?= $site->customAnalytics() ?>
</html>