<?php

$data = [
  'title' => $page->title()->value(),
  'text' => $page->text()->value()
];

echo \Kirby\Data\Json::encode($data);
