<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
        'laravel_through_key',
    ];

    protected $fillable =[
        'order_id',
        'seat_id',
    ];

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
