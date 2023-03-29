<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Traits\Translatable;

class LocationCountry extends Model
{
    use HasFactory, Translatable, PositionTrait;

    protected $translatable = [
        'title',
    ];

    protected $fillable = [
        'position',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function locationCities(): HasMany
    {
        return $this->hasMany(LocationCity::class);
    }
}
