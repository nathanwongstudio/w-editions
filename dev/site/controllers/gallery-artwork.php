<?php
use Uniform\Form;

return function($kirby, $pages, $page) {
    // MAKE THE LIST OF ARTISTS READER FRIENDLY
    $artists = [];

    foreach($page->artist()->split() as $artist) {
        if($artistPage = $pages->find('artists/'.$artist)) {
            $artist = $artistPage->title()->value();
        }
        else {
            $artist = $artist;
        }
        array_push($artists, $artist);
    }

    return [
        'artists' => implode(', ', $artists),
    ];
};