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
        return [
            'id'=>$this->id,
            'tickets_count'=>$this->tickets->count(),
            'tickets_children_count'=>$this->tickets()->where('ticket_type_id',2)->get()->count(),
            'price'=>$this->price,
            'status'=>$this->status->name,
            'showing'=>new ShowingResource($this->showing),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }


}
