<?php

return function ($page, $available) {

    $artworks = $page->children()->listed()->flip();

    if ($available) {
        $artworks = $artworks->filterBy('available', $available);
    }

    return [
        'artworks' => $artworks
    ];

};
?>