<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'seat_row'=>$this->seat_row,
            'seat_number'=>$this->seat_number,
            'seat_type'=>$this->type->name,
            'is_occupied'=>$this->is_occupied,
            'price_ratio'=>$this->type->price_ratio,
        ];
    }
}
