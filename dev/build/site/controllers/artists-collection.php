<?php

return function($page, $site, $kirby) {
    $artists = $page->children()->listed();

    return [
        'artists'=>$artists
    ];
}
?>