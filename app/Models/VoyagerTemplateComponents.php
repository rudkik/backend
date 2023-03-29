<?php

namespace App\Models;

use App\Traits\GeometryCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class VoyagerTemplateComponents extends Model implements HasMedia
{
    use HasFactory, GeometryCast, InteractsWithMedia;

    protected $fillable = ['position'];

    protected $spatial = [
        'coordinates',
    ];

    protected $casts = [
        'coordinates' => 'array',
    ];
}
