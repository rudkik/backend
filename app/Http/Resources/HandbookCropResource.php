<?php

namespace App\Http\Resources;



use App\Models\HandbookCropCategory;
use Illuminate\Http\Request;

class HandbookCropResource extends BaseResource
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
            'handbook_crop_category' => new HandbookCropCategoryResource($this->handbookCropCategory),
        ];
    }
}
