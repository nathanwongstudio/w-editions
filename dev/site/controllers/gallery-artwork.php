<?php
use Uniform\Form;

return function($kirby, $pages, $page) {
    // MAKE THE LIST OF ARTISTS READER FRIENDLY
    $artists = [];

    // FRAMING PARAM
    $framing = param('frame');

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

        $widthf = $page->framedPackageWidth()->toFloat();
        $heightf = $page->framedPackageHeight()->toFloat();
        $lengthf = $page->framedPackageLength()->toFloat();
        $weightf = $page->framedPackageWeight()->toFloat();
        $width = $page->packageWidth()->toFloat();
        $height = $page->packageHeight()->toFloat();
        $length = $page->packageLength()->toFloat();
        $weight = $page->packageWeight()->toFloat();

    $in = array('width' => $width, 'height' => $height, 'length' => $length);
    $inF = array('width' => $widthf, 'height' => $heightf, 'length' => $lengthf);

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
    $cmf = array_map('toCM', $inF);
    $weightG = toGs($weight);
    $weightfG = toGs($weightf);

    return [
        'artists' => implode(',', $artists),
        'weightG' => $weightG,
        'weightfG' => $weightfG,
        'cm' => $cm,
        'cmf' => $cmf,
        'framing' => $framing,
    ];

};