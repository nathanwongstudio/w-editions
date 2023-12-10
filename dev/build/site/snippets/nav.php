<nav id="main-nav" role="navigation" aria-label="Main site links">
    <div class="wrapper-nav">
        <input type="checkbox" id="x" class="menu-toggle" aria-label="click to toggle the menu" role="button" aria-pressed="false" aria-haspopup="menu"></input>
        <section class="site-title">
            <a href="<?= $site->url()?>" aria-label="click to go to the home page">
                <?= $site->title(); ?>
                <span class="underlay" aria-hidden="true">
                    <?= $site->title() ?>
                </span>
            </a>
        </section>
        <section class="menu">
            <ul class="menu-items" aria-label="list of pages">
                <?php foreach($site->pages()->listed() as $page): ?>
                    <li class="item <?= ($page->isOpen()) ? 'active' : '' ?>" >
                        <a href="<?=$page->url()?>">
                            <?= $page->title() ?>
                            <span class="underlay" aria-hidden="true">
                                <?= $page->title() ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
</nav>