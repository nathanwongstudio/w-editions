<?php

return function($page, $site, $kirby) {

    if(page('editions')->exists() && page('editions')->isListed()) {
        $artworks = page('editions')->children()->listed()->filterBy('artist', $page->slug(), ',');
    } else {
        $artworks = [];
    }

    return [
        'artworks' => $artworks
    ];
};