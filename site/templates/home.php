<?php

snippet('header', ['temp' => 'home2']);

$layouts = $page->text()->toLayouts();

?>

<style>
    .moire {
        width: 100%;
        height: 100%;
    }

    .moire::after {
        content: " ";

        width: 500vw;
        animation: 100s ease-in-out 0s infinite both moireRotate;
        transform-origin: center;
        height: 500vw;
        top: 0;
        left: 0;
        transform: translate(-50%, -50%) rotate(0);
        position: absolute;
        display: block;
        background: repeating-linear-gradient(55deg,
                blue,
                blue 2px,
                transparent 2px,
                transparent 4px);
        background-size: 400% 400%;
        z-index: -1;
    }

    @keyframes moireRotate {
        0% {
            /* transform: translate(-50%, -50%) rotate(0); */
            background-position: 0% 0%;
        }

        100% {
            /* transform: translate(-50%, -50%) rotate(300deg); */
            background-position: 187% 0%;
        }
    }
</style>

<div class="hero">
    <div class="container-full">
        <div class="moire"></div>
        <div class="header">
            <h1>
                <span data-text="W/">W/</span><!--  --><span data-text="EDITIONS">EDITIONS</span>
            </h1>
        </div>
    </div>
</div>

<div class="default-content">
    <?php foreach ($layouts as $layout): ?>
        <?= snippet('layouts', compact('layout')); ?>
    <?php endforeach; ?>
</div>

<!-- <script>
    window.addEventListener("load", () => {

        if (document.documentElement.classList.contains('show--consent')) {
            window.addEventListener('cc:onModalHide', () => {
                document.getElementsByClassName("start-out")[0].classList.remove("start-out");
            });
        } else {
            document.getElementsByClassName("start-out")[0].classList.remove("start-out");
        }

    });

    let observerOptions = {
        rootMargin: '0px',
        threshold: 0.8
    }

    var observer = new IntersectionObserver(observerCallback, observerOptions);

    function observerCallback(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view')
            } else {
                entry.target.classList.remove('in-view')
            }
        });
    };

    let target = '.section-wrapper';
    document.querySelectorAll(target).forEach((i) => {
        if (i) {
            observer.observe(i);
        }
    });
</script> -->

<svg class="hidden" viewBox="0 0 1 1" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <clipPath id="squircle" clipPathUnits="objectBoundingBox">
            <path d="M 0,0.5
                C 0,0.0575  0.0575,0  0.5,0
                  0.9425,0  1,0.0575  1,0.5
                  1,0.9425  0.9425,1  0.5,1
                  0.0575,1  0,0.9425  0,0.5"></path>
        </clipPath>
    </defs>
</svg>

<?php snippet('footer') ?>