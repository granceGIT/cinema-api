<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'showing_id',
        'price',
        'status_id',
        'user_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function showing()
    {
        return $this->belongsTo(Showing::class);
    }
}
