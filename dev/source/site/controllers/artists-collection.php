<?php

return function($page, $site, $kirby) {

    // GET ALL THE ARTIST NAMES
    $artists = $page->children()->listed();



    // MAP A NEW ORDER BY SEPARATING LAST NAME AND PUTTING IT FIRST, ETC
    $artists = $artists->map(function($name) {
        $parts = explode(' ', $name->title());
        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(' ', $parts);
        } else {
            $firstname = $name->title();
            $lastname = '';
        }
        $kirby = kirby();
        $kirby->impersonate('kirby');

        $name->update(['sortName' => $lastname . ' ' . $firstname]);
        return $name;
    });

    $artists = $artists->sortBy('sortName');

    return [
        'artists' => $artists
    ];
};