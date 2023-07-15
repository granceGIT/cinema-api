<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Resources\FilmResource;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        return JSONHelper::response(Genre::all());
    }

    public function films(Genre $genre)
    {
        return FilmResource::collection($genre->films);
    }
}
