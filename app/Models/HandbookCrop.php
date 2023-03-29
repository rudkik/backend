<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HandbookCrop extends Model
{
    use HasFactory;

    public function handbookCropCategory(): BelongsTo
    {
        return $this->belongsTo(HandbookCropCategory::class, 'handbook_crop_category_id');
    }

    public function advertisement(): BelongsTo
    {
        return $this->belongsTo(Advertisement::class);
    }
}
