<?php

namespace App\Http\Resources;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactResource extends BaseResource
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
            'email' => $this->email,
            'instagram_link' => $this->instagram_link,
            'telegram_link' => $this->telegram_link,
            'whatsapp_link' => $this->whatsapp_link,
            'signature' => $this->signature
        ];
    }
}
