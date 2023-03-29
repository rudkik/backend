<?php

namespace App\Models;

use App\Traits\GeometryCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Traits\Translatable;

class Contact extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
