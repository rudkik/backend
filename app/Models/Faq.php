<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Traits\Translatable;

class Faq extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
