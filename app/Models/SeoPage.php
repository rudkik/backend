<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class SeoPage extends Model
{
    use HasFactory, Translatable;

    protected $translatable = [
        'title',
        'description',
        'keywords',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
