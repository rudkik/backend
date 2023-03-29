<?php

namespace App\Http\Resources;

use App\Constants\LanguageConstant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function getTranslate(string $field, Request $request)
    {
        return $this->getTranslatedAttribute($field, $request->header('Accept-Language'), LanguageConstant::RU);
    }
}
