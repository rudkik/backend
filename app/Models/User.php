<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends \TCG\Voyager\Models\User implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'handbook_country_id',
        'handbook_region_id',
        'own_elevator',
        'user_type',
        'handbook_city_id',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'settings',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value): String {
        return empty($value)
            ? asset(Config::get('voyager.user.default_avatar'))
            : Storage::disk(config('voyager.storage.disk'))->url($value);
    }

    public function setAvatarAttribute($value): void {
        if (!empty($value) && $value !== asset(Config::get('voyager.user.default_avatar'))){
            $this->attributes['avatar'] = $value;
        }
    }

    public function userLegals()
    {
        return $this->hasMany(UserLegal::class);
    }

    public function scopeUserLegal($query)
    {
        return $query->where('user_type', 2);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function handbookCountry(): BelongsTo
    {
        return $this->belongsTo(HandbookCountry::class);
    }

    public function handbookRegion(): BelongsTo
    {
        return $this->belongsTo(HandbookRegion::class);
    }

    public function handbookCity(): BelongsTo
    {
        return $this->belongsTo(HandbookCity::class);
    }

    public function handbookUserActivity(): BelongsTo
    {
        return $this->belongsTo(HandbookUserActivity::class);
    }
}
