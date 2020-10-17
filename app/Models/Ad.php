<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Ad
 *
 * @property int $id
 * @property string $code
 * @property string $position
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Ad newModelQuery()
 * @method static Builder|Ad newQuery()
 * @method static Builder|Ad query()
 * @method static Builder|Ad whereCode($value)
 * @method static Builder|Ad whereCreatedAt($value)
 * @method static Builder|Ad whereId($value)
 * @method static Builder|Ad wherePosition($value)
 * @method static Builder|Ad whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Ad extends Model
{
    use ClearsResponseCache;

    protected $fillable = ['code', 'position'];
    protected $table = 'ads';
}
