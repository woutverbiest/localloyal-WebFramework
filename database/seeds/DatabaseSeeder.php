<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(ShopTypeTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(OpeninghoursTableSeeder::class);
        $this->call(RewardsTableSeeder::class);
        //$this->call(TransactionTableSeeder::class);
        $this->call(UserShopTableSeeder::class);
    }
}
