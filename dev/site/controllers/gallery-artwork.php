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

    // CONVERT IN TO CM and OZS TO GMS

    $width = $page->packageWidth()->toFloat();
    $height = $page->packageHeight()->toFloat();
    $length = $page->packageLength()->toFloat();
    $weight = $page->packageWeight()->toFloat();

    $in = array('width' => $width, 'height' => $height, 'length' => $length);
    //convert in to cm
    function toCM($in) {
        $float = $in * 2.54;
        return (number_format($float, 0, '.', ''));
    }
    
    //convert ozs to gms
    function toGs($oz) {
        $float = $oz * 28.35;
        return (number_format($float, 2, '.', ''));
    }
    
    $cm = array_map('toCM', $in);
    $weightG = toGs($weight);

    return [
        'artists' => implode(',', $artists),
        'weightG' => $weightG,
        'cm' => $cm
    ];

};