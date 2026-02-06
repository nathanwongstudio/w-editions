<div class="no-content">
    <h2>Coming Soon.
        <span class="underlay">Coming Soon.</span>
    </h2>
</div>

<style>
    .no-content {
        width: 100%;
        height: calc(100vh - var(--nav-height));
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        border-bottom: 1px solid var(--border-color);
        background: white;
        filter: contrast(50);
        mix-blend-mode: multiply;
    }

    .no-content h2 {
        position: relative;
        font-size: 4em;
        line-height: 1;
        color: transparent;
        text-shadow: 0 0 7px var(--c-cobalt);
        display: inline-block;
        margin: 0;
        padding: 0;
        padding-bottom: 1em;
        mix-blend-mode: multiply;
    }

    .no-content h2 span.underlay {
        position: absolute;
        font-style: italic;
        width: 100%;
        top: 0;
        left: 0;
        z-index: -1;
        text-shadow: 0 0 0.1em var(--c-cinnabar);
    }
</style>