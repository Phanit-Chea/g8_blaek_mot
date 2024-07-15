<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $createdAt = Carbon::parse($this->created_at);
        $formattedDate = $createdAt->format('d-m-Y');
        $formattedTime = $createdAt->format('H:i');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'profile' => $this->profile,
            'dateOfBirth' => $this->dateOfBirth,
            'gender' => $this->gender,
            'address' => $this->address,
            'created_at' => [
                'date' => $formattedDate,
                'time' => $formattedTime,
            ],
        ];
    }
}
