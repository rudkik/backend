<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Pion\Support\Eloquent\Position\Traits\PositionTrait;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{
    use HasFactory, Translatable, PositionTrait;

    protected $translatable = [
        'title',
        'content',
        'seo_title',
        'seo_description',
        'seo_slug',
    ];

    protected $fillable = [
        'position',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function handbookNewsTags(): BelongsToMany
    {
        return $this->belongsToMany('App\HandbookNewsTag', 'ref_news_handbook_news_tag')
            ->withTimestamps();
    }

    public static function boot(): void
    {
        parent::boot();

        self::creating(function(self $model): void {
            $model->position = self::max('position') + 1;
        });

        self::deleting(function(self $model): void {
            $items = self::where('position', '>', $model->position)->get();

            foreach ($items as $item) {
                $item->position--;
                $item->save();
            }
        });
    }
}
