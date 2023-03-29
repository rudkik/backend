<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HandbookRequest extends Model
{
    use HasFactory, Translatable;

    protected $translatable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function locationCities(): BelongsToMany
    {
        return $this->belongsToMany('LocationCity', 'ref_location_cities_handbook_requests')
            ->withTimestamps();
    }
}
