<?php

use Kirby\Uuid\Uuid;

class RssfeedPage extends Page {

    public function children(): Pages
    {
        if ($this->children instanceof Pages) {
            return $this->children;
        }

        $results = [];
        $pages   = [];

        // use the URL of the feed you want to fetch
        $request = Remote::get('https://buttondown.com/weditions/rss');

        // if the request was sucessfully, parse feed as $results
        if ($request->code() === 200) {
            $results = Xml::parse($request->content());
        }
        
        // if we have any results, create the child page props for each result
        if (count($results) > 0) {
            foreach ($results['channel']['item'] as $item) {
                $pages[] = [
                    'slug'     => Str::slug($item['title']),
                    'template' => 'rssfeed-item',
                    'model'    => 'rssfeed-item',
                    'content'  => [
                        'title'       => $item['title'],
                        'date'        => $item['pubDate'] ?? '',
                        'description' => $item['description'] ?? '',
                        'link'        => $item['link'] ?? '',
                        'text'        => $item['description'] ?? '',
                        'uuid'        => Uuid::generate(),
                    ]
                ];
            }
        }

        // create a Pages collection for the child pages
        return $this->children = Pages::factory($pages, $this);

    }

}