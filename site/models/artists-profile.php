<?php

use Kirby\Cms\Page;

class artistsProfilePage extends Page
{
  public function getWorks()
  {
    return page('editions')->childrenAndDrafts()->filter(fn($work) => $work->artist()->toPages()->has($this));
  }
}
