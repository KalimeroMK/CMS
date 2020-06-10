<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Ad
 *
 * @property int $id
 * @property string $code
 * @property string $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ad extends Model
{

    use ClearsResponseCache;


    protected $fillable = ['code', 'position'];
    protected $table = 'ads';


}
