<?php snippet('header');

if($artworks->isNotEmpty()): ?>

    <div class="default-content">
        <div class="collection">
            <ol class="artworks" reversed style="--count: <?= $artworks->count() ?>">
                <?php
                    foreach($artworks as $artwork):

                        $src = $artwork->primaryImg()->toFile();
                ?>
                    <li class="artwork" style="--index: '<?= $artwork->num() ?>'">
                        <a href="<?=$artwork->url()?>" data-id="<?= $artwork->uid() ?>">
                            <div class="left-side">
                                <span class="artwork-artist">
                                    <?php foreach ($artwork->artist()->split() as $artist): 
                                        if($artistPage = $pages->find('artists/'.$artist)):
                                        ?>
                                            <span class="artist text-wrap" data-text="<?= $artistPage->title(); ?>"><?= $artistPage->title(); ?></span>
                                        <?php else: ?>
                                            <span class="artist text-wrap" data-text="<?= $artist ?>"><?= $artist ?></span>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                </span>
                                <span class="artwork-item" data-text="<?=$artwork->title()?>">
                                    <?=$artwork->title()?>
                                </span>
                            </div>
                            <span class="artwork-id">
                                <?= $artwork->artId() ?>
                            </span>

                            <?php
                                if($artwork->publishdate()->isNotEmpty()) {
                                    $today = new Datetime(date('Y-m-d'));
                                    $endDate = new Datetime($artwork->publishdate()->toDate('Y-m-d'));
                                    $diff = $endDate->diff($today);
                                    $datediff = $diff->days;
                                }
                                ?>
                                <?php if($datediff <= 90): ?>
                                    <span class="tag new">Fresh</span>
                                <?php endif; ?>
                                <?php if(!$artwork->available()->toBool()): ?>
                                    <span class="tag sold">Sold Out</span>
                                <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ol>
            <div class="image-box">
                <?php
                    foreach($artworks as $artwork):

                        $src = $artwork->primaryImg()->toFile();
                        $class = $artwork->uid();
                ?>
                    <?= snippet('images', compact('src', 'class')) ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<script>
    var elements = document.querySelectorAll('.artwork a');
    for (e in elements) {
       elements[e].onmouseover = function(t) {
            var id = this.getAttribute('data-id'),
            img = document.querySelector('figure.'+ CSS.escape(id));
            
            document.querySelector('figure.shown')?.classList.remove('shown');
            
            img.classList.add('shown');
       }
       elements[e].onmouseleave = function(t) {
            document.querySelector('figure.shown')?.classList.remove('shown');
       }
    }
</script>
<?php 
else:
    snippet('no-content');
endif;

snippet('footer') ?>