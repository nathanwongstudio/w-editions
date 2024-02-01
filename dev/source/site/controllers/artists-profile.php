<?php

return function($page, $site, $kirby) {
    $artworks = page('editions')->children()->listed()->filterBy('artist', $page->slug(), ',');

    return [
        'artworks' => $artworks
    ];
};