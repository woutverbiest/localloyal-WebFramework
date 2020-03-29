<?php

use Illuminate\Database\Seeder;
use App\Shop;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $shop = [
                'shopname' => 'Slice Of Life',
                'shoptype' => 17,
                'description' => 'A cozy restaurant serving fresh italian pizza.',
                'visible' => true,
                'user_id' => 1,
            ];
    
            Shop::create($shop);
        }
    }
}
