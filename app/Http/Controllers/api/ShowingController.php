<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Requests\Showing\FilterRequest;
use App\Http\Resources\SeatResource;
use App\Http\Resources\SeatTypeResource;
use App\Http\Resources\ShowingResource;
use App\Models\SeatType;
use App\Models\Showing;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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

    public function freeSeatsCount(Showing $showing)
    {
        return JSONHelper::response(['free_seats' => $showing->freeSeats()->get()->count()]);
    }

    public function seats(Showing $showing)
    {
        return (new ShowingResource($showing))->additional([
            'data' => [
                'seats' => SeatResource::collection($showing->all_seats()),
                'seat_info'=> SeatTypeResource::collection(SeatType::all())
            ]
        ]);
    }

    public function closest(Request $request)
    {
        $limit = $request->limit ?? 3;
        return ShowingResource::collection(Showing::closest()->limit($limit)->get());
    }
}
