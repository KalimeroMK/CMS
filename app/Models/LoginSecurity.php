<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\LoginSecurity
 *
 * @property int         $id
 * @property int         $user_id
 * @property int         $google2fa_enable
 * @property string|null $google2fa_secret
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User   $user
 * @method static Builder|LoginSecurity newModelQuery()
 * @method static Builder|LoginSecurity newQuery()
 * @method static Builder|LoginSecurity query()
 * @method static Builder|LoginSecurity whereCreatedAt($value)
 * @method static Builder|LoginSecurity whereGoogle2faEnable($value)
 * @method static Builder|LoginSecurity whereGoogle2faSecret($value)
 * @method static Builder|LoginSecurity whereId($value)
 * @method static Builder|LoginSecurity whereUpdatedAt($value)
 * @method static Builder|LoginSecurity whereUserId($value)
 * @mixin Eloquent
 */
class LoginSecurity extends Model
{
    use ClearsResponseCache;
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
