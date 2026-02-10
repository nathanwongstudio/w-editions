<?php

$data = [
  'title' => $page->title()->value(),
  'text' => $page->text()->value(),
  'children' => $page->children()->listed()->map(function ($child) {
    return [
      'title' => $child->title()->value(),
      'text' => $child->text()->value(),
      'url' => $child->url(),
      'primaryImg' => $child->primaryImg()->toFile() ? $child->primaryImg()->toFile()->url() : null,
      'primaryImgAlt' => $child->primaryImg()->alt()->value(),
      'images' => $child->details()->toFiles()->map(function ($file) {
        return [
          'url' => $file->url(),
          'alt' => $file->alt()->value()
        ];
      }),
      'published' => $child->publishedate()->toDate('Y-m-d'),
      'artId' => $child->artId()->value(),
      'editionYear' => $child->year()->value(),
      'artist' => $child->artist()->array(),
      'price' => $child->price()->value(),
      'available' => $child->available()->value(),
      'editionOf' => $child->editionOf()->value(),
      'artMedium' => $child->artMedium()->value(),
      'artForm' => $child->artForm()->value(),
      'artSurface' => $child->artSurface()->value(),
      'artHeight' => $child->artHeight()->value(),
      'artWidth' => $child->artWidth()->value(),
      'artDepth' => $child->artDepth()->value(),
      'artDescription' => $child->artDescription()->value(),
      'accordions' => $child->accordionText()->toResolvedLayouts(),
      'stickers' => $child->stickers()->toStructure(),
      'text' => $child->text()->value(),

    ];
  }),

];

echo \Kirby\Data\Json::encode($data);
