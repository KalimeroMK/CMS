<?php


namespace App\Helper;

use App\Models\Post;
use FeedItem;
use Illuminate\Support\Collection;
use Spatie\Feed\Feedable;

class NewsItem extends Post implements Feedable
{
    /**
     * @return array|
     */
    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link($this->slug)
            ->author($this->author);
    }

    /**
     * @return Collection
     */
    public static function getFeedItems()
    {
        return NewsItem::orderBy('created_at', 'desc')->limit(50)->get();
    }
}
