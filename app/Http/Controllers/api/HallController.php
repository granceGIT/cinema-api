<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Resources\FilmResource;
use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        return JSONHelper::response(Hall::all());
    }

    public function films(Hall $hall, Request $request)
    {
        return FilmResource::collection($hall->films);
    }
}
