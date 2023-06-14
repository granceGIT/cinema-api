<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = [];

        for ($h=1;$h<=2;$h++){
            for ($i=1;$i<=5;$i++){
                for ($k=1;$k<=18;$k++){
                    $seats[] = [
                        'hall_id'=>$h,
                        'seat_row'=>$i,
                        'seat_number'=>$k,
                        'seat_type_id'=>$i<3 ? 1 : 2,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ];
                }
            }
        }

        DB::table('seats')->insert($seats);
    }
}
