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
            'director'=>"{$this->director->name} {$this->director->surname}",
            'age_restriction'=>$this->age_restriction->age,
            'genres'=>$this->genres,
            'actors'=>$this->actors,
            'showings'=>ShowingFilmResource::collection($this->showings),
        ];
    }
}
