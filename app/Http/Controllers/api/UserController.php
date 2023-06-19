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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if ($user = User::where([['phone_number', $request->phone_number], ['password', $request->password]])->first()) {
            return JSONHelper::response(['token' => $user->generateToken()]);
        }
        throw new ApiException(401, 'Authentication failed.');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated() + ['password_hashed' => Hash::make($request->password)]);
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
            'previous' => OrderResource::collection($user->ordersByShowingDate('<',now())->get()),
        ]);
    }

    public function checkout(CheckoutRequest $request)
    {
        $price = 0;
        $showing = Showing::find($request->showing_id);
        $freeSeats = $showing->freeSeats()->pluck('id');

        foreach ($request->tickets as $ticket) {
            if (!$freeSeats->contains($ticket['seat_id'])) {
                throw new ApiException(409,"Seat {$ticket['seat_id']} is occupied.");
            }
        }

        $order = Order::create([
            'showing_id' => $request->showing_id,
            'user_id' => $request->user()->id,
            'price' => 0,
        ]);

        foreach ($request->tickets as $ticket) {
            Ticket::create([
                'seat_id' => $ticket['seat_id'],
                'order_id' => $order->id,
                'ticket_type_id' => $ticket['ticket_type_id'],
            ]);
            $ticketType = TicketType::find($ticket['ticket_type_id']);
            $price += $showing->base_price * $ticketType->price_ratio;
        }

        $order->update(['price' => $price]);

        return new OrderResource($order);
    }


    //showing_id в таблице tickets позволил бы установить unique на два поля, по которым можно было бы определить свободно ли место
    //что значительно упростило бы работу
    public function checkoutTransaction(CheckoutRequest $request)
    {
        $price = 0;
        $showing = Showing::findOrFail($request->showing_id);
        $freeSeats = $showing->freeSeats()->pluck('id');

        DB::beginTransaction();
        try {
            $order = Order::create([
                'showing_id' => $request->showing_id,
                'user_id' => $request->user()->id,
            ]);

            foreach ($request->tickets as $ticket) {
                if ($freeSeats->doesntContain($ticket['seat_id'])) {
                    throw new ApiException(409,"Seat {$ticket['seat_id']} is occupied.");
                }

                Ticket::create([
                    'seat_id' => $ticket['seat_id'],
                    'order_id' => $order->id,
                    'ticket_type_id' => $ticket['ticket_type_id'],
                ]);

                $ticketType = TicketType::find($ticket['ticket_type_id']);
                $price += $showing->base_price * $ticketType->price_ratio;
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

    public function rate(RateFilmRequest $request)
    {
        $user = $request->user();
        if ($user->orders()->with('showing.film')->get()->pluck('showing.film.id')) {
        }

    }
}
