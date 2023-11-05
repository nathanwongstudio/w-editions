<nav id="main-nav" role="navigation" aria-label="Main site links">
        <section class="site-title">
            <a href="<?= $site->url()?>" aria-label="click to go to the home page">
                <?= $site->title(); ?>
            </a>
        </section>
        <input type="checkbox" id="x" aria-label="click to toggle the menu" role="button" aria-pressed="false" aria-haspopup="menu"></input>
        <section class="menu">
            <ul class="menu-items" aria-label="list of pages">
                <?php foreach($site->pages()->listed() as $page): ?>
                    <li class="item">
                        <a href="<?=$page->url()?>"><?= $page->title() ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
</nav>