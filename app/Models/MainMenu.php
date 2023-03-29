<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class MainMenu extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    protected $fillable = [
        'title',
        'external_link',
        'internal_link',
        'isExternal',
        'slug'
    ];

    protected $translatable = ['title'];
}
