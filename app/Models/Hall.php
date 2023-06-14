<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function films()
    {
        return $this->hasManyThrough(Film::class,Showing::class,'id','id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
