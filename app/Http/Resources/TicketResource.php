<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "order_id" => 1,
            "seat_id" => $this->seat_id,
            "seat_row" => $this->seat->seat_row,
            "seat_number" => $this->seat->seat_number,
            "ticket_type_id" => $this->type->name,
        ];
    }
}
