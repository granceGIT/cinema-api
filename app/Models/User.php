<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone_number',
        'password',
        'password_hashed',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function generateToken()
    {
        $this->update(['api_token'=>Hash::make(Str::random())]);
        return $this->api_token;
    }

    public function resetToken()
    {
        return $this->update(['api_token'=>null]);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ordersByShowingDate($operator,$date)
    {
        return $this->orders()->withWhereHas('showing', function (Builder $query) use ($operator,$date) {
            $query->where('date', $operator, $date);
        });
    }

    public function rates()
    {
        return $this->belongsToMany(Film::class,'film_rating')->withPivot('rate');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
