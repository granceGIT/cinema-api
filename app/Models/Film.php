<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public static function upcomming()
    {
        return Film::with([
            'showings'=>function (Builder $query){
            $query->where('date','>=',now());
            },
        ]);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function age_restriction()
    {
        return $this->belongsTo(AgeRestriction::class);
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function showings()
    {
        return $this->hasMany(Showing::class);
    }

}
