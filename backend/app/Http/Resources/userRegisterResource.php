<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class userRegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'gender' => $this->gender,
            'dateOfBirth' => $this->dateOfBirth,
            'profile' => $this->profile,
            'address' => [
                'houseNumber' => $this->houseNumber,
                'streetNumber' => $this->streetNumber,
                'streetName' => $this->streetName,
                'commune' => $this->commune,
                'district' => $this->district,
                'province' => $this->province,
            ],
        ];
    }
}
