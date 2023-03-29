<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use TCG\Voyager\Traits\Translatable;

class HandbookNewsTag extends Model
{
    use HasFactory, Translatable;

    protected $translatable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany('App\News', 'ref_news_handbook_news_tag')
            ->withTimestamps();
    }
}
