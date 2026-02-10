<?php

$data = [
  'title' => $page->title()->value(),
  'text' => $page->text()->toResolvedLayouts()->toArray()
];

echo \Kirby\Data\Json::encode($data);
