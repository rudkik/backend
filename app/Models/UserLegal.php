<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLegal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'bin',
        'company',
        'company_link',
        'whatsapp_link',
        'telegram_link',
        'about_company'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function handbookCompanyTypes(): BelongsTo
    {
        return $this->belongsTo(HandbookCompanyType::class);
    }
}
