<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property int $post_id
 * @property string $image
 * @property int $priority
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Gallery newModelQuery()
 * @method static Builder|Gallery newQuery()
 * @method static Builder|Gallery query()
 * @method static Builder|Gallery whereCreatedAt($value)
 * @method static Builder|Gallery whereId($value)
 * @method static Builder|Gallery whereImage($value)
 * @method static Builder|Gallery wherePostId($value)
 * @method static Builder|Gallery wherePriority($value)
 * @method static Builder|Gallery whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Gallery extends Model
{
    use ClearsResponseCache;

    protected $table = 'image_gallery';
    protected $fillable = ['post_id', 'image'];

    public function getGalleryUrlAttribute($value)
    {
        if (!empty($this->image)) {
            return $galleryUrl = asset('/uploads/images/gallery/' . $this->image);
        } else {
            return "no image";
        }
    }
}
