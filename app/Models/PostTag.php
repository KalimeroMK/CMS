<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PostTag
 *
 * @property int $id
 * @property int|null $post_id
 * @property int|null $tag_id
 * @property int $views
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|PostTag newModelQuery()
 * @method static Builder|PostTag newQuery()
 * @method static Builder|PostTag query()
 * @method static Builder|PostTag whereCreatedAt($value)
 * @method static Builder|PostTag whereId($value)
 * @method static Builder|PostTag wherePostId($value)
 * @method static Builder|PostTag whereTagId($value)
 * @method static Builder|PostTag whereUpdatedAt($value)
 * @method static Builder|PostTag whereViews($value)
 * @mixin Eloquent
 */
class PostTag extends Model
{
    use ClearsResponseCache;

    protected $table = 'post_tag';
    protected $fillable = ['post_id', 'tag_id'];
}
