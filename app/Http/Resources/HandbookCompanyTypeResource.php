<?php

namespace App\Http\Resources;

use App\Models\HandbookCompanyType;
use Illuminate\Http\Request;

class HandbookCompanyTypeResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var HandbookCompanyType $this */
        return [
            'id' => $this->id,
            'name' => $this->getTranslate('name', $request),
        ];
    }
}
