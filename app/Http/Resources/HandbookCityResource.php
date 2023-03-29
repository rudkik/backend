<?php

namespace App\Http\Resources;

use App\Models\HandbookCity;
use App\Models\HandbookRegion;
use Illuminate\Http\Request;

class HandbookCityResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var HandbookCity $this */
        return [
            'id' => $this->id,
            'name'  => $this->getTranslate('name', $request),
            'handbook_region' => new HandbookRegionResource($this->handbookRegion),
        ];
    }
}
