<?php

namespace App\Http\Resources;

use App\Models\HandbookCropCategory;
use Illuminate\Http\Request;

class HandbookCropCategoryResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var HandbookCropCategory $this */
        return [
            'id' => $this->id,
            'name'  => $this->name,
        ];
    }
}
