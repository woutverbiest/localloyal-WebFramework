<?php

use Illuminate\Database\Seeder;
use App\UserShop;

class UserShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usershops = [
            [
                'user_id'=>2,
                'shop_id'=>1,
                'points'=>34,
                'favorite'=>false
            ],
            [
                'user_id'=>3,
                'shop_id'=>1,
                'points'=>62,
                'favorite'=>true
            ]
        ];

        foreach($usershops as $usershop){
            UserShop::create($usershop);
        }
    }
}
