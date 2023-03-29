<?php

namespace App\Http\Resources;

use App\Models\Contact;
use Illuminate\Http\Request;

class AnalyticResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var Contact $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
        ];
    }
}
