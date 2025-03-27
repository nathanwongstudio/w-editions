<?php
$canvas = imagecreatetruecolor(1200, 628);
$backgroundColor = imagecolorallocate($canvas, 255, 255, 255); // white
$textColor       = imagecolorallocate($canvas, 0, 0, 255);
$fontFile        = './assets/fonts/HelveticaLTStd-Blk.otf';
$secondfontFile        = './assets/fonts/HelveticaLTStd-Roman.otf';

$title  = $page->title()->toString();
$title  = wordwrap($title, 17); // default value for third parameter $break = "\n"

$artists = [];

foreach ($page->artist()->split() as $artist):
    if ($artistPage = $pages->find('artists/' . $artist)) {
        $artists[] = $artistPage->title();
    } else {
        $artists[] = $artist;
    }
endforeach;

$artists = implode(', ', $artists);

$artists = wordwrap($artists, 30);

$backgroundFile = './assets/images/backgrounds/newsprint.jpg';
$bg = imagecreatefromjpeg($backgroundFile);



$path = $page->primaryImg()->toFile()->resize(700, 450)->url();
$artworkFile = file_get_contents($path);

$artwork = imagecreatefromstring($artworkFile);

imagecopyresampled($canvas, $bg, 0, 0, 0, 0, 1200, 628, imagesx($bg), imagesy($bg));

//center image

$destX = (int)(1200 / 2) - (int)(imagesx($artwork) / 2);
$destY = (int)(628 / 2) - (int)(imagesy($artwork) / 2);

imagecopyresampled($canvas, $artwork, $destX, $destY, 0, 0, imagesx($artwork), imagesy($artwork), imagesx($artwork), imagesy($artwork));


imagefttext($canvas, 85, 0, 20, 120, $textColor, $fontFile, $title);

imagefttext($canvas, 70, 0, 20, 600, $textColor, $secondfontFile, $artists);

imagepng($canvas);

imagedestroy($canvas);
