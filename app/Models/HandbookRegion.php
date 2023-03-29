<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HandbookRegion extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function handbookCountry(): BelongsTo
    {
        return $this->belongsTo(HandbookCountry::class);
    }

}
