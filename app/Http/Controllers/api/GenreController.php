<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function films(Genre $genre, Request $request)
    {
        return FilmResource::collection($genre->films);
    }
}
