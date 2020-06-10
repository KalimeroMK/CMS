<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;


/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $slug
 * @property string $link
 * @property int $featured
 * @property string $type
 * @property int $category_id
 * @property int $source_id
 * @property string $description
 * @property string $meta_description
 * @property string $featured_image
 * @property string $image_old
 * @property int $views
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $show_in_mega_menu
 * @property string $render_type
 * @property string $video_embed_code
 * @property int $image_parallax
 * @property int $video_parallax
 * @property int $rating_box
 * @property int $show_featured_image_in_post
 * @property int $show_author_box
 * @property int $show_author_socials
 * @property int $dont_show_author_publisher
 * @property int $show_post_source
 * @property string $rating_desc
 * @property-read User $author
 * @property-read Category $category
 * @property-read string $image_local
 * @property-read string $image_url
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Source $source
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read User $user
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereAuthorId($value)
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDescription($value)
 * @method static Builder|Post whereDontShowAuthorPublisher($value)
 * @method static Builder|Post whereFeatured($value)
 * @method static Builder|Post whereFeaturedImage($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereImageOld($value)
 * @method static Builder|Post whereImageParallax($value)
 * @method static Builder|Post whereLink($value)
 * @method static Builder|Post whereMetaDescription($value)
 * @method static Builder|Post whereRatingBox($value)
 * @method static Builder|Post whereRatingDesc($value)
 * @method static Builder|Post whereRenderType($value)
 * @method static Builder|Post whereShowAuthorBox($value)
 * @method static Builder|Post whereShowAuthorSocials($value)
 * @method static Builder|Post whereShowFeaturedImageInPost($value)
 * @method static Builder|Post whereShowInMegaMenu($value)
 * @method static Builder|Post whereShowPostSource($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereSourceId($value)
 * @method static Builder|Post whereStatus($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereType($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereVideoEmbedCode($value)
 * @method static Builder|Post whereVideoParallax($value)
 * @method static Builder|Post whereViews($value)
 * @mixin Eloquent
 */
class Post extends Model
{
    use Notifiable;
    use ClearsResponseCache;

    protected $table = 'posts';
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'link',
        'featured',
        'category_id',
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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @param $value
     * @return string
     */

    public function getImageUrlAttribute($value)
    {
        if (!empty($this->featured_image)) {
            return $imageUrl = asset('/uploads/images/posts/medium/' . $this->featured_image);
        } elseif (!empty($this->image_old)) {
            return $imageUrl = asset($this->image_old);
        } else {
            return $imageUrl = asset('/uploads/images/posts/medium/rsz_biblija.jpg');
        }
    }


}
