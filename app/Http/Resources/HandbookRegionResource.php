<?php

namespace App\Http\Resources;

use App\Models\HandbookCountry;
use App\Models\HandbookRegion;
use Illuminate\Http\Request;

class HandbookRegionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var HandbookRegion $this */
        return [
            'id' => $this->id,
            'name'  => $this->getTranslate('name', $request),
            'handbook_country' => new HandbookCountryResource($this->handbookCountry),
        ];
    }
}
