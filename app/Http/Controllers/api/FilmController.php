<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\FilterRequest;
use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use App\Http\Resources\FilmShowingsResource;
use App\Http\Resources\ShowingResource;
use App\Models\Film;
use App\Models\Showing;
use Illuminate\Contracts\Database\Eloquent\Builder;

class FilmController extends Controller
{
    public function index(FilterRequest $request)
    {
        $films = Film::upcoming();
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
            $films->where('name', 'like', "%{$request->search}%");
        }
        foreach ($request->validated() as $k=>$v){
            $films->where($k,$v);
        }
        if ($request->limit){
            $films = $films->paginate($request->limit)->withPath($request->url() . "?limit={$request->limit}");
        }
        else{
            $films = $films->get();
        }

        return new FilmCollection($films);
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

    public function showings(Film $film)
    {
        $showings = $film->upcomingShowings()->get();
        return FilmShowingsResource::collection($showings);
    }
}
