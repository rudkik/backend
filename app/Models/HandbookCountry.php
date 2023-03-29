<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HandbookCountry extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name'];

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function handbookRegions(): HasMany
    {
        return $this->hasMany(HandbookRegion::class);
    }
}
