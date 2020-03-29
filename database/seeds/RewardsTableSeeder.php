<?php

use Illuminate\Database\Seeder;
use App\Reward;

class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rewards = [
            [
                'shop_id' => 1,
                'reward_name' => 'Free Drink',
                'points' => 15,
                'description' => 'You can choose a free sode from the menu!'
            ],
            [
                'shop_id' => 1,
                'reward_name' => '5€ discount',
                'points' => 30,
                'description' => '5€ discount off'
            ],
            [
                'shop_id' => 1,
                'reward_name' => 'Free Medium Pizza',
                'points' => 90,
                'description' => 'You can choose a free medium pizza with any topping.'
            ],
            [
                'shop_id' => 1,
                'reward_name' => 'Free Meal',
                'points' => 160,
                'description' => 'You can have a meal for free. (appetizer, pizza, dessert & a soda)'
            ]
        ];

        foreach($rewards as $reward){
            Reward::create($reward);
        }
    }
}
