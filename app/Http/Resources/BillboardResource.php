<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'movie_id'=> new MovieResource($this->movie),
            'room_id'=> new RoomResource($this->room),
            'star_date'=> $this->star_date,
            'end_date'=> $this->end_date,
        ];
    }
}
