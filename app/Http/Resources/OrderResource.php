<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $rate = $request->user()->rates()->wherePivot('film_id',$this->showing->film_id)->first();

        return [
            'id'=>$this->id,
            'tickets_count'=>$this->tickets->count(),
            'price'=>$this->price,
            'status'=>$this->status->name,
            'showing'=>new ShowingResource($this->showing),
            'tickets'=>TicketResource::collection($this->tickets),
            'film_rate'=>$this->when($rate!==null,$rate?->pivot->rate),
        ];
    }


}
