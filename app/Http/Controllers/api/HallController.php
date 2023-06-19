<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Resources\FilmResource;
use App\Models\Hall;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HallController extends Controller
{
    public function index()
    {
        return JSONHelper::response(Hall::with(['images'=>function(Builder $query){
            $query->limit(1);
        }]));
    }

    public function films(Hall $hall)
    {
        return FilmResource::collection($hall->films);
    }
}
