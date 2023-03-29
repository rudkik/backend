<?php

namespace App\Http\Resources;

use App\Models\HandbookCountry;
use Illuminate\Http\Request;

class HandbookCountryResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var HandbookCountry $this */
        return [
            'id' => $this->id,
            'name' => $this->getTranslate('name', $request),
        ];
    }
}
