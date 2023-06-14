<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\FilterService;
use App\Http\Requests\Film\FilterRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(FilterRequest $request)
    {
        $films = Film::upcomming();
        foreach ($request->validated() as $k=>$v){
            $films->where($k,$v);
        }
        return FilmResource::collection(($films->get()));
    }
}
