<?php

namespace App\Http\Resources;

use App\Models\UserLegal;
use Illuminate\Http\Request;

class UserLegalResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var UserLegal $this */
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'company' => $this->company,
            'site' => $this->company_website,
            'about' => $this->about_company,
            'whatsapp' => $this->whatsapp,
            'telegram' => $this->telegram,
            'company_type' => new HandbookCompanyTypeResource($this->handbookCompanyTypes),
        ];
    }
}
