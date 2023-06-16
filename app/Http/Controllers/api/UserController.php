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
use App\Http\Resources\OrderResource;
use App\Http\Resources\UserResource;
use App\Models\Order;
use App\Models\Showing;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if($user = User::where([['phone_number',$request->phone_number],['password',$request->password]])->first()){
            return JSONHelper::response(['token'=>$user->generateToken()]);
        }
        throw new ApiException(401,'Authentication failed.');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated()+['password_hashed'=>Hash::make($request->password)]);
        return JSONHelper::response([
            'user_id'=>$user->id,
            'token'=>$user->generateToken(),
        ],201);
    }

    public function logout(Request $request)
    {
        $request->user()->resetToken();
        return response()->json([
            'data'=>[
                'message'=>'logout',
            ]
        ]);
    }

    public function profile(Request $request)
    {
        return new UserResource($request->user());
    }

    public function orders(FilterRequest $request)
    {
        $orders = $request->user()->orders();
        foreach ($request->validated() as $k=>$v) {
            $orders->where($k,$v);
        }

        return JSONHelper::response([
            'active'=> OrderResource::collection($orders->whereDate('created_at','>=',now())->get()),
            'previous'=> OrderResource::collection($orders->whereDate('created_at','<=',now())->get()),
            //asd
        ]);
    }

    public function checkout(CheckoutRequest $request)
    {
        $price = 0;
        $showing = Showing::find($request->showing_id);

        $order = Order::create([
            'showing_id'=>$request->showing_id,
            'user_id'=>$request->user()->id,
            'price'=>0,
            'status_id'=>1,
        ]);

        foreach ($request->tickets as $ticket){
            if (!$showing->freeSeats()->pluck('id')->contains($ticket['seat_id'])){
                return 0;
            }
            Ticket::create([
                'seat_id'=>$ticket['seat_id'],
                'order_id'=>$order->id,
                'ticket_type_id'=>$ticket['ticket_type_id'],
            ]);

            $ticketType = TicketType::find($ticket['ticket_type_id']);
            $price += $showing->base_price * $ticketType->price_ratio;
        }

        $order->update(['price'=>$price]);

        return new OrderResource($order);
    }

    public function rate(RateFilmRequest $request)
    {
        $user = $request->user();
        if ($user->orders()->with('showing.film')->get()->pluck('showing.film.id')){
        }

    }
}
