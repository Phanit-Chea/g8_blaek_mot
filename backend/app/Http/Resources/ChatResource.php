<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Format the created_at attribute
        $createdAt = Carbon::parse($this->created_at);
        $formattedDate = $createdAt->format('d-m-Y');
        $formattedTime = $createdAt->format('H:i');

        return [
            'to_user'=>$this->to_user,
            'from_user' => $this->from_user,
            'description' => $this->description,
            'image' => $this->image,
            'video' => $this->video,
            'active' => $this->active,
            'created_at' => [
                'date' => $formattedDate,
                'time' => $formattedTime,
            ],
        ];
    }
}
