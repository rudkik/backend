<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Traits\Translatable;

class LocationCity extends Model
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

    public function locationCountry(): BelongsTo
    {
        return $this->belongsTo(LocationCountry::class);
    }
}
