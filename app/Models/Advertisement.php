<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function files(): HasMany
    {
        return $this->hasMany(AdvertisementFile::class, 'advertisement_id');
    }

    public function handbookCrop(): HasOne
    {
        return $this->hasOne(HandbookCrop::class, 'id', 'handbook_crop_id');
    }

    public static function handbookCityIdRelationship($id) {
        return
            self::where('advertisements.id', '=', $id)
                ->select('advertisements.handbook_city_id', 'handbook_regions.id as handbook_region_id', 'handbook_countries.id as handbook_country_id')
                ->join('handbook_cities', 'advertisements.handbook_city_id', '=', 'handbook_cities.id')
                ->join('handbook_regions', 'handbook_cities.handbook_region_id', '=', 'handbook_regions.id')
                ->join('handbook_countries', 'handbook_regions.handbook_country_id', '=', 'handbook_countries.id')
                ->first();
    }

    public static function handbookCropIdRelationship($id) {
        return
            self::where('advertisements.id', '=', $id)
                ->select('advertisements.handbook_crop_id', 'handbook_crop_categories.id as handbook_crop_category_id')
                ->join('handbook_crops', 'advertisements.handbook_crop_id', '=', 'handbook_crops.id')
                ->join('handbook_crop_categories', 'handbook_crops.handbook_crop_category_id', '=', 'handbook_crop_categories.id')
                ->first();
    }

    public static function boot(): void
    {
        parent::boot();

        self::creating(function(self $advertisement): void {
            $advertisement->slug = self::getUniqueSlug($advertisement->handbook_crop_id);
        });

    }

    public function getUniqueSlug($title): string
    {
        $crop = self::with('handbookCrop')->find($title);
        $cropSlug = $crop->handbookCrop->name;
        $crop->slug = $cropSlug;

        $t = 1;
        while (self::query()->where('slug', $cropSlug.'-'.strval($t))->count() > 0){
            $t++;
        }

        return $cropSlug.'-'.strval($t);
    }
}
