<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

/**
 * App\Models\Post
 *
 * @property int                                                        $id
 * @property string                                                     $title
 * @property string                                                     $slug
 * @property int                                                        $featured
 * @property string                                                     $type
 * @property int                                                        $author_id
 * @property string                                                     $description
 * @property string                                                     $meta_description
 * @property string                                                     $featured_image
 * @property string                                                     $image_old
 * @property int                                                        $views
 * @property int                                                        $status
 * @property Carbon|null                                                $created_at
 * @property Carbon|null                                                $updated_at
 * @property string                                                     $rating_desc
 * @property-read User                                                  $author
 * @property-read \Kalnoy\Nestedset\Collection|Category[]               $categories
 * @property-read int|null                                              $categories_count
 * @property-read Category                                              $category
 * @property-read string                                                $image_url
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null                                              $notifications_count
 * @property-read Collection|Tag[]                                      $tags
 * @property-read int|null                                              $tags_count
 * @property-read User                                                  $user
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereAuthorId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDescription($value)
 * @method static Builder|Post whereFeatured($value)
 * @method static Builder|Post whereFeaturedImage($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereImageOld($value)
 * @method static Builder|Post whereMetaDescription($value)
 * @method static Builder|Post whereRatingDesc($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereStatus($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereType($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereViews($value)
 * @mixin Eloquent
 */
class Post extends Model implements Feedable
{
    use Notifiable;
    use ClearsResponseCache;
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'link',
        'featured',
        'type',
        'source_id',
        'description',
        'featured_image',
        'views',
        'status',
        'meta_description',
        'video_embed_code',

    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function language(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)->withPivot('title', 'description');
    }

    /**
     * @param $value
     * @return string
     */

    public function getImageUrlAttribute(): ?string
    {
        if (!empty($this->featured_image)) {
            return asset('/uploads/images/posts/medium/'.$this->featured_image);
        }

        if (!empty($this->image_old)) {
            return asset($this->image_old);
        }

        return asset('/uploads/images/posts/medium/rsz_biblija.jpg');
    }

    /**
     * @return array|FeedItem
     */
    public function toFeedItem(): FeedItem
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
     * @return \Illuminate\Support\Collection
     */
    public static function getFeedItems(): \Illuminate\Support\Collection
    {
        return self::orderBy('created_at', 'desc')->limit(50)->get();
    }
}
