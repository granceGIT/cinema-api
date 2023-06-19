<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\FilterRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Contracts\Database\Eloquent\Builder;

class FilmController extends Controller
{
    public function index(FilterRequest $request)
    {
        $films = Film::upcomming();
        if ($request->genres){
            $films->withWhereHas('genres',function(Builder $query) use ($request){
                $query->whereIn('genre_id',$request->genres);
            });
        }
        foreach ($request->validated() as $k=>$v){
            $films->where($k,$v);
        }
        return FilmResource::collection(($films->get()));
    }

    public function show(Film $film)
    {
        return new FilmResource($film);
    }
}
