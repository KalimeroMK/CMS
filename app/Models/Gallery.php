<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property int $post_id
 * @property string $image
 * @property int $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Gallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gallery extends Model
{
    use ClearsResponseCache;

    protected $table = 'image_gallery';

}
