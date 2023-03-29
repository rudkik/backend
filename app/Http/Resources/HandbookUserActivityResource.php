<?php

namespace App\Http\Resources;

use App\Models\HandbookUserActivity;
use Illuminate\Http\Request;

class HandbookUserActivityResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var HandbookUserActivity $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
