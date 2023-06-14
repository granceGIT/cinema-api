<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmShowingResource extends JsonResource
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
            'duration'=>$this->duration,
            'country'=>$this->country->name,
            'director'=>"{$this->director->name} {$this->director->surname}",
            'genres'=>$this->genres,
        ];
    }
}
