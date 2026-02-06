<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ERROR | W EDITIONS</title>

    <!-- FATHOM ANALYTICS -->
    <?= snippet('fathom-analytics-embed'); ?>
    <style>
        /* 1. Use a more-intuitive box-sizing model */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        /* 2. Remove default margin */
        * {
            margin: 0;
        }

        /* 3. Enable keyword animations */
        @media (prefers-reduced-motion: no-preference) {
            html {
                interpolate-size: allow-keywords;
            }
        }

        body {
            /* 4. Add accessible line-height */
            line-height: 1.5;
            /* 5. Improve text rendering */
            -webkit-font-smoothing: antialiased;
            font-size: 20px;
        }

        /* 6. Improve media defaults */
        img,
        picture,
        video,
        canvas,
        svg {
            display: block;
            max-width: 100%;
        }

        /* 7. Inherit fonts for form controls */
        input,
        button,
        textarea,
        select {
            font: inherit;
        }

        /* 8. Avoid text overflows */
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            overflow-wrap: break-word;
        }

        /* 9. Improve line wrapping */
        p {
            text-wrap: pretty;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            text-wrap: balance;
        }

        /*
  10. Create a root stacking context
*/
        #root,
        #__next {
            isolation: isolate;
        }
    </style>
    <style>
        body {
            background: black;
        }

        .error-content {
            width: 100vw;
            height: 100vh;
            position: relative;
            /* display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center; */
            display: block;
            top: 0;
            left: 0;
            background: repeating-linear-gradient(15deg,
                    blue,
                    blue 1px,
                    transparent 1px,
                    transparent 2px);
            overflow: hidden;

            /* box-shadow: inset 0 0 25vw 2vw rgba(0, 0, 0, 0.7); */
        }

        .error-content::after {
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

        .error-text {
            color: rgba(255, 255, 255, 0.8);
            font-family: verdana;
            font-weight: 100;
            z-index: 99;
            display: block;
            height: auto;
            flex-shrink: 1;
            flex-grow: 0;
            max-width: 100vw;
            padding: 10vw;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            font-family: verdana;
            font-weight: 100;
        }

        p {
            margin-bottom: 1em;
        }

        h1 {
            line-height: 1.5;
        }

        h1.sadface {
            font-size: 4em;
        }
    </style>
</head>

<body>
    <div class="error-content">
        <div class="error-text">
            <h1 class="sadface">:(</h1>
            <h1><?= $page->title() ?></h1>
            <?= $page->text() ?>

        </div>
    </div>
</body>

</html>