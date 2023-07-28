<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'name'=>$this->name,
            'release_date'=>$this->release_date,
            'duration'=>$this->duration,
            'description'=>$this->description,
            'rating'=>$this->rating(),
            'min_price'=>$this->upcomingShowings()->min('base_price'),
            'director'=>"{$this->director->name} {$this->director->surname}",
            'country'=>$this->country->name,
            'age_restriction'=>$this->age_restriction->age,
            'genres'=>$this->genres,
            'actors'=>ActorResource::collection($this->actors),
            'images'=>$this->images,
        ];
    }


}
