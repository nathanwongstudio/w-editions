<?php

use Kirby\Toolkit\A;

$data = [
  'title' => $page->title()->value(),
  'id' => $page->id(),
  'uuid' => $page->uuid()->id(),
  'url' => $page->url(),
  'text' => $page->text()->value(),
  'artist' => A::map($page->artist()->split(), function ($artist) {
    return [
      'title' => page($artist)->title()->value(),
      'id' => page($artist)->id(),
      'uuid' => page($artist)->uuid()->id(),
      'birth' => page($artist)->birth()->value(),
      'death' => page($artist)->death()->value(),
    ];
  }),
  'primaryImg' => array([
    'url' => $page->primaryImg()->toFile()->url(),
    'alt' => $page->primaryImg()->toFile()->alt()->value(),
    'width' => $page->primaryImg()->toFile()->width(),
    'height' => $page->primaryImg()->toFile()->height(),
    'caption' => $page->primaryImg()->toFile()->caption()->value(),
    'srcset' => $page->primaryImg()->toFile()->srcset(),
    'id' => $page->primaryImg()->toFile()->uuid()->id(),
  ]),
  'images' => array_values($page->details()->toFiles()->toArray(function ($image) {
    return [
      'url' => $image->url(),
      'alt' => $image->alt()->value(),
      'width' => $image->width(),
      'height' => $image->height(),
      'caption' => $image->caption()->value(),
      'srcset' => $image->srcset(),
      'id' => $image->uuid()->id(),
    ];
  })),
  'published' => $page->publishedate()->toDate('Y-m-d'),
  'artId' => $page->artId()->value(),
  'editionYear' => $page->year()->value(),
  'price' => $page->price()->value(),
  'available' => $page->available()->value(),
  'editionOf' => $page->editionOf()->value(),
  'proofs' => $page->proofs()->value(),
  'proofDetails' => $page->proofdetails()->value(),
  'printmakers' => $page->printmakers()->value(),
  'publisher' => $page->publisher()->value(),
  'chops' => $page->chops()->value(),
  'copyright' => $page->copyright()->value(),
  'medium' => $page->artMedium()->value(),
  'format' => $page->artForm()->value(),
  'surface' => $page->artSurface()->value(),
  'height' => $page->artHeight()->value(),
  'width' => $page->artWidth()->value(),
  'depth' => $page->artDepth()->value(),
  'description' => $page->artDescription()->value(),
  'accordions' => $page->accordionText()->toResolvedLayouts()->toArray(),
  'stickers' => $page->stickers()->toStructure(),
];

echo \Kirby\Data\Json::encode($data);
