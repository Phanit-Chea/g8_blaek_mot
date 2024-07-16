<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'to_user'=>$this->to_user,
            'from_user' => $this->from_user,
            'description' => $this->description,
            'image' => $this->image,
            'video' => $this->video,
        ];
    }
}
