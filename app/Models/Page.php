<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Page extends Model
{
    use HasFactory, Translatable;

    protected $translatable = [
        'title',
        'content',
        'seo_title',
        'seo_description',
        'seo_slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'files' => 'array',
    ];
}
