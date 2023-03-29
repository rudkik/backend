<?php

namespace App\Http\Resources;

use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Supply $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
