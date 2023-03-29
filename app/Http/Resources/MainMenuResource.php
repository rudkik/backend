<?php

namespace App\Http\Resources;

use App\Models\MainMenu;
use Illuminate\Http\Request;

class MainMenuResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var MainMenu $this */
        return [
            'id' => $this->id,
            'title' => $this->getTranslate('title', $request),
            'external_link' => $this->when($this->isExternal === true, $this->external_link),
            'internal_link' => $this->when($this->isExternal === false, $this->internal_link),
            'slug' => $this->slug
        ];
    }
}
