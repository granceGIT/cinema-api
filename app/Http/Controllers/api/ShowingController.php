<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Requests\Showing\FilterRequest;
use App\Http\Resources\SeatResource;
use App\Http\Resources\ShowingResource;
use App\Models\Showing;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ShowingController extends Controller
{
    public function index(FilterRequest $request)
    {
//        if($request->search){
//            $showings = Showing::withWhereHas('film',function(Builder $query) use($request){
//                $query->where('name','like',"%{$request->search}%");
//            });
//        }
        $showings = Showing::orderBy('id');
        foreach ($request->validated() as $k => $v) {
            $showings->where($k, $v);
        }
        return ShowingResource::collection(($showings->get()));
    }

    public function freeSeatsCount(Showing $showing)
    {
        return JSONHelper::response(['free_seats' => $showing->freeSeats()->get()->count()]);
    }

    public function seats(Showing $showing)
    {
        return (new ShowingResource($showing))->additional([
            'data' => [
                'seats' => SeatResource::collection($showing->all_seats())
            ]
        ]);
    }
}
