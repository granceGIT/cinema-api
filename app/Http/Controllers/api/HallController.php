<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Resources\FilmResource;
use App\Models\Hall;

class HallController extends Controller
{
    public function index()
    {
        return JSONHelper::response(Hall::with('images')->get());
    }

    public function films(Hall $hall)
    {
        return FilmResource::collection($hall->films);
    }
}
