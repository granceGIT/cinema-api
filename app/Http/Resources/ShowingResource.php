<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowingResource extends JsonResource
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
            'hall'=>$this->hall->name,
            'date'=>$this->date,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'film'=>new FilmResource($this->film),
        ];
    }
}
