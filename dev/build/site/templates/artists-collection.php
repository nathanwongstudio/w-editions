<?php snippet('header') ?>
<div class="default-content">
    <section class="collection">
        <ul class="exclude artists">
            <?php 
            foreach ($artists as $artist): ?>

            <li class="artist">
                <a href="<?=$artist->url()?>"><?=$artist->title()?></a>
            </li>
                    
            <?php endforeach; ?>
        </ul>
    </section>

</div>
<?php snippet('footer') ?>