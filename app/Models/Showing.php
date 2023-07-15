<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showing extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function freeSeats()
    {
        $showing = $this;
        $ticketSeatIds = Ticket::withWhereHas('order',function (Builder $query) use (&$showing){
            $query->where('showing_id',$showing->id);
        })->get()->pluck('seat_id');
        return $this->hall->seats()->whereNotIn('id',$ticketSeatIds);
    }

    public function all_seats()
    {
        $freeSeats = $this->freeSeats()->get()->pluck('id');
        return $this->hall->seats->map(function ($item) use ($freeSeats) {
            $item->is_occupied = $freeSeats->doesntContain($item->id);
            return $item;
        });
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
        return $this->hasManyThrough(Ticket::class, Order::class);
    }
}
