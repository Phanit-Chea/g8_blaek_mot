<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'from_user' => $this->from_user,
            'to_user' => $this->to_user,
            'description' => $this->description,
            'image' => $this->image,
            'video' => $this->video,
            'active' => $this->active,
            'created_at' => [
                'date' => Carbon::parse($this->created_at)->format('d-m-Y'),
                'time' => Carbon::parse($this->created_at)->format('H:i'),
            ],
        ];
    }
}