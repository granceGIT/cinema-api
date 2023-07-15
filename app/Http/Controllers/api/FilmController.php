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
            $films->whereHas('genres',function(Builder $query) use ($request){
                $query->whereIn('genre_id',$request->genres);
            });
        }
        if ($request->dates){
            $films->whereHas('showings',function(Builder $query) use ($request){
                $query->whereIn('date',$request->dates);
            });
        }
        if ($request->search) {
            $films = $films->where('name', 'like', "%{$request->search}%");
        }
        foreach ($request->validated() as $k=>$v){
            $films->where($k,$v);
        }
        return FilmResource::collection(($films->get()));
    }

    public function popular()
    {
        $popularLastWeek = Film::popularBetweenDate(now()->subWeek())->get()->toArray();
        $films = Film::hydrate($popularLastWeek);
        return FilmResource::collection($films);
    }

    public function latest()
    {
        return new FilmResource(Film::latest()->first());
    }

    public function show(Film $film)
    {
        return new FilmResource($film);
    }
}
