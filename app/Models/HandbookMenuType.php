<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class HandbookMenuType extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
