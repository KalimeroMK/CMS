<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $avatar
 * @property string $birthday
 * @property string $bio
 * @property string $gender
 * @property string $mobile_no
 * @property string $country
 * @property string $timezone
 * @property string $reset_password_code
 * @property string $reset_requested_on
 * @property int $activated
 * @property string $activation_code
 * @property string $activated_at
 * @property string $fb_url
 * @property string $fb_page_url
 * @property string $website_url
 * @property string $twitter_url
 * @property string $google_plus_url
 * @property-read Post $ProductList
 * @property-read Collection|Post[] $author
 * @property-read int|null $author_count
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereActivated($value)
 * @method static Builder|User whereActivatedAt($value)
 * @method static Builder|User whereActivationCode($value)
 * @method static Builder|User whereAvatar($value)
 * @method static Builder|User whereBio($value)
 * @method static Builder|User whereBirthday($value)
 * @method static Builder|User whereCountry($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereFbPageUrl($value)
 * @method static Builder|User whereFbUrl($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereGooglePlusUrl($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereMobileNo($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereResetPasswordCode($value)
 * @method static Builder|User whereResetRequestedOn($value)
 * @method static Builder|User whereSlug($value)
 * @method static Builder|User whereTimezone($value)
 * @method static Builder|User whereTwitterUrl($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereWebsiteUrl($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasRoles;

    use ClearsResponseCache;

    const TYPE_ADMIN = "admin";
    const TYPE_CUSTOMER = "customer";
    const TYPE_PUBLISHER = "publisher";
    const TYPE_AUTHOR = "author";
    const GENDER_MALE = "male";
    const GENDER_FEMALE = "female";
    protected $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'avatar',
        'birthday',
        'bio',
        'gender',
        'mobile_no',
        'country',
        'reset_password_code',
        'reset_requested_on',
        'activated',
        'activation_code',
        'activated_at',
        'fb_url',
        'fb_page_url',
        'website_url',
        'twitter_url',
        'google_plus_url'
    ];


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->remember_token;
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * @return HasMany
     */
    public function author()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function ProductList()
    {
        return $this->belongsTo(Post::class, 'id', 'author_id')->orderBy('updated_at', 'desc');
    }

    /**
     * @return HasOne
     */
    public function loginSecurity()
    {
        return $this->hasOne(LoginSecurity::class);
    }
}
