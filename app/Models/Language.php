<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Language
 *
 * @property int         $id
 * @property string      $name
 * @property string      $country
 * @property int|null    $iso
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Language newModelQuery()
 * @method static Builder|Language newQuery()
 * @method static Builder|Language query()
 * @method static Builder|Language whereCountry($value)
 * @method static Builder|Language whereCreatedAt($value)
 * @method static Builder|Language whereId($value)
 * @method static Builder|Language whereIso($value)
 * @method static Builder|Language whereName($value)
 * @method static Builder|Language whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Language extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'iso', 'country'];

    /**
     * @return BelongsToMany
     */
    public function post(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withPivot('name', 'description');
    }

    /**
     * @return BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withPivot('title');
    }
}
