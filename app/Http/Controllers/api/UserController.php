<?php

namespace App\Http\Controllers\api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\JSONHelper;
use App\Http\Requests\Order\FilterRequest;
use App\Http\Requests\User\CheckoutRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RateFilmRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\FilmResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\UserResource;
use App\Models\Film;
use App\Models\Order;
use App\Models\Seat;
use App\Models\Showing;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if ($user = User::where('phone_number', $request->phone_number)->first()) {
            if (Hash::check($request->password,$user->password)){
                return JSONHelper::response(['token' => $user->generateToken()]);
            }
        }
        throw new ApiException(401, 'Неверные данные');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->except('password') + ['password' => Hash::make($request->password)]);
        return JSONHelper::response([
            'user_id' => $user->id,
            'token' => $user->generateToken(),
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->resetToken();
        return response()->json([
            'data' => [
                'message' => 'logout',
            ]
        ]);
    }

    public function profile(Request $request)
    {
        return new UserResource($request->user());
    }

    public function orders(FilterRequest $request)
    {
        $user = $request->user();
        return JSONHelper::response([
            'active' => OrderResource::collection($user->ordersByShowingDate('>=',now())->get()),
            'previous' => OrderResource::collection($user->ordersByShowingDate('<',now())->orderBy('created_at','desc')->get()),
        ]);
    }

    public function checkout(CheckoutRequest $request)
    {
        $price = 0;
        $showing = Showing::findOrFail($request->showing_id);
        $freeSeats = $showing->freeSeats()->pluck('id');

        DB::beginTransaction();
        try {
            $order = Order::create([
                'showing_id' => $request->showing_id,
                'user_id' => $request->user()->id,
                'price'=>$request->price
            ]);

            foreach ($request->tickets as $ticket) {
                if ($freeSeats->doesntContain($ticket['seat_id'])) {
                    throw new ApiException(400,"Место с кодом {$ticket['seat_id']} не существует в этом зале или занято.");
                }

                Ticket::create([
                    'seat_id' => $ticket['seat_id'],
                    'order_id' => $order->id,
                ]);

                $seatType = Seat::find($ticket['seat_id'])->type;
                $price += $showing->base_price * $seatType->price_ratio;
            }

            $order->update(['price' => $price]);
        }
        catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return new OrderResource($order);
    }

    public function rate(Film $film,RateFilmRequest $request)
    {
        $user = $request->user();
        if ($user->rates->contains($film)){
            $user->rates()->updateExistingPivot($film,['rate'=>$request->rate]);
        }
        else{
            $user->rates()->attach($film->id,['rate'=>$request->rate]);
        }
        return new FilmResource($user->rates()->where('film_id',$film->id)->first());
    }
}
