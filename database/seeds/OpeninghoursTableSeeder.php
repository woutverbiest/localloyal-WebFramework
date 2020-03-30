<?php

use Illuminate\Database\Seeder;
use App\OpeningHour;

class OpeninghoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $openinghours = [
            [
                'shop_id'=>1,
                'day_id'=>1,
                'from'=>'11:30',
                'till'=>'22:00',
                'brake_start'=>'14:00',
                'brake_end'=>'18:00',
                'closed'=>false
            ],
            [
                'shop_id'=>1,
                'day_id'=>2,
                'from'=>'11:30',
                'till'=>'22:00',
                'brake_start'=>'14:00',
                'brake_end'=>'18:00',
                'closed'=>false
            ],
            [
                'shop_id'=>1,
                'day_id'=>3,
                'from'=>'00:00',
                'till'=>'00:00',
                'brake_start'=>'00:00',
                'brake_end'=>'00:00',
                'closed'=>true
            ],
            [
                'shop_id'=>1,
                'day_id'=>4,
                'from'=>'00:00',
                'till'=>'00:00',
                'brake_start'=>'00:00',
                'brake_end'=>'00:00',
                'closed'=>true
            ],
            [
                'shop_id'=>1,
                'day_id'=>5,
                'from'=>'11:30',
                'till'=>'23:00',
                'brake_start'=>'14:00',
                'brake_end'=>'18:00',
                'closed'=>false
            ],
            [
                'shop_id'=>1,
                'day_id'=>6,
                'from'=>'11:30',
                'till'=>'23:00',
                'brake_start'=>'15:00',
                'brake_end'=>'18:00',
                'closed'=>false
            ],
            [
                'shop_id'=>1,
                'day_id'=>7,
                'from'=>'11:30',
                'till'=>'16:00',
                'brake_start'=>'00:00',
                'brake_end'=>'00:00',
                'closed'=>false
            ],
        ];

        foreach($openinghours as $openinghour){
            Openinghour::create($openinghour);
        }
    }
}
