<?php

namespace App\Http\Resources;

use App\Constants\UserTypeConstant;
use App\Models\HandbookUserActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserIndividualResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var User $this */
        return [
            'id' => $this->id,
            'name' => $this->first_name,
            'surname' => $this->last_name,
            'email' => $this->email,
            'avatar' => Storage::disk(config('voyager.storage.disk'))->url($this->avatar),
            'phone' => $this->phone_number,
            'is_confirm' => $this->is_confirm,
            'country' => new HandbookCountryResource($this->handbookCountry),
            'region' => new HandbookRegionResource($this->handbookRegion),
            'settlement' => new HandbookCityResource($this->handbookCity),
            'elevator' => $this->own_elevator,
            'type' => UserTypeConstant::getUserTypeApi($this->user_type),
            'activity' => new HandbookUserActivityResource($this->handbookUserActivity),
        ];
    }
}
