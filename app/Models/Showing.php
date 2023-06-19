<?php

namespace App\Models;

use App\Http\JSONHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Showing extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function freeSeats()
    {
        $orderIds = Order::select('id')->where('showing_id',$this->id)->get();
        $ticketSeatIds = Ticket::select('seat_id')->whereIn('order_id',$orderIds)->get();
        return $this->hall->seats()->whereNotIn('id',$ticketSeatIds);
    }

    public function all_seats()
    {
        $freeSeats = $this->freeSeats()->get()->pluck('id');
        return $this->hall->seats->map(function($item) use ($freeSeats) {
            $item->is_occupied=!$freeSeats->contains($item->id);
            return $item;
        });
    }

    public static function popularLastWeek()
    {
        $popularShowings = DB::table('orders')
            ->selectRaw('showing_id, count(tickets.id) as ticket_count')
            ->where('orders.created_at','>',now()->subWeek())
            ->join('tickets','orders.id','=','tickets.order_id')
            ->groupByRaw('showing_id');
        $showings = DB::table('showings')
            ->joinSub($popularShowings,'popular_showings',function(JoinClause $join){
                $join->on('showings.id','=','popular_showings.showing_id');})
            ->orderBy('popular_showings.ticket_count','desc');
        return $showings;
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class,Order::class);
    }
}
