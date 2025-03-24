<?php snippet('header');

if($artists->isNotEmpty()): ?>
<div class="default-content">
    <section class="collection">
        <ul class="exclude artists">
            <li class="artist header">
                    <span class="artist-name" data-text="Artists (A-Z)">
                        Artists
                    </span>
            </li>
            <?php 
            foreach ($artists as $artist): ?>

            <li class="artist">
                <a href="<?=$artist->url()?>">
                    <span class="artist-name" data-text="<?=$artist->title()?>">
                        <?=$artist->title()?>
                    </span>
                </a>
            </li>
                    
            <?php endforeach; ?>
        </ul>
    </section>

</div>
<?php 
else:
    snippet('no-content');
endif;
snippet('footer') ?>