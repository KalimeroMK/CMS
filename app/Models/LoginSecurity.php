<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginSecurity extends Model
{
    use ClearsResponseCache;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
