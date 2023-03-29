<?php

namespace App\Http\Resources;

use App\Constants\UserTypeConstant;

use App\Models\User;
use Illuminate\Http\Request;

class UserResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return object
     */
    public function toArray($request): object
    {
        /** @var User $this */
        if ($this->user_type == UserTypeConstant::INDIVIDUAL) {
            return new UserIndividualResource($this);
        }
        if ($this->user_type == UserTypeConstant::LEGAL_ENTITY) {
            return new UserLegalEntityResource($this);
        }
    }
}
