<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedback extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function handbookFeedback(): BelongsTo
    {
        return $this->belongsTo(HandbookFeedback::class);
    }

    public function feedback(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }
}
