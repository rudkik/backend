<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class HandbookFeedback extends Model
{
    use HasFactory, Translatable;

    protected $translatable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
