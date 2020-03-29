<?php

use Illuminate\Database\Seeder;
use App\Day;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $days = [
            ['day'=>'Monday'],
            ['day'=>'Tuesday'],
            ['day'=>'Wednesday'],
            ['day'=>'Thursday'],
            ['day'=>'Friday'],
            ['day'=>'Saturday'],
            ['day'=>'Sunday']
        ];

        foreach($days as $day){
            Day::create($day);
        }
    }
}
