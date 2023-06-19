<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Requests\Showing\FilterRequest;
use App\Http\Resources\SeatResource;
use App\Http\Resources\ShowingResource;
use App\Models\Showing;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowingController extends Controller
{
    public function index(FilterRequest $request)
    {
        $showings = Showing::orderBy('id');
        foreach ($request->validated() as $k => $v) {
            $showings->where($k, $v);
        }
        return ShowingResource::collection(($showings->get()));
    }

    public function popular()
    {
        return Showing::popularLastWeek()->where('date','>',now())->get();
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
