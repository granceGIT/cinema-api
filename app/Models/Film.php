<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class Film extends Model
{
    use HasFactory;

    public static function upcoming()
    {
        return Film::withWhereHas(
            'showings', function (Builder $query) {
            $query->where('date', '>', today())
                ->orWhere(function ($q) {
                    $q->where('date', today())
                        ->where('start_time', ">=", now()->format("H:i:s"));
                });
        });
    }

    public static function popularBetweenDate($startDate, $endDate = new \DateTime())
    {
        $popular = DB::table('orders')
            ->selectRaw('showing_id, count(tickets.id) as tickets_count')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->join('tickets', 'orders.id', '=', 'tickets.order_id')
            ->groupBy('showing_id');
        return DB::table('showings')
            ->joinSub($popular, 'popular', function (JoinClause $join) {
                $join->on('showings.id', '=', 'popular.showing_id');
            })
            ->selectRaw('sum(popular.tickets_count) as tickets,films.*')
            ->groupBy('film_id')
            ->orderBy('tickets', 'desc')
            ->join('films', 'films.id', '=', 'film_id');
    }

    public function upcomingShowings()
    {
        return $this->showings()
            ->where('date', '>=', now())
            ->orWhere(function ($query) {
                $query->where('date', today()->toDate())
                    ->where('start_time', '>=', now())
                    ->where('film_id', $this->id);
            })
            ->orderBy('date')
            ->orderBy('start_time');
    }

    public function rating()
    {
        return $this->ratings->pluck('pivot.rate')->avg();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class)->withPivot('role');
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

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'film_rating')->withPivot('rate');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->orderBy('is_primary', 'desc');
    }
}
