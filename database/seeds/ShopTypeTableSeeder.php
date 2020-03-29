<?php

use Illuminate\Database\Seeder;
use App\ShopType;

class ShopTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['type'=>'Antique Shop'],
            ['type'=>'Bakery'],
            ['type'=>'Barbershop'],
            ['type'=>'Beauty Salon'],
            ['type'=>'Bookstore'],
            ['type'=>'Boutique'],
            ['type'=>'Butchery'],
            ['type'=>'Café'],
            ['type'=>'Pharmacy'],
            ['type'=>'Convenience Store'],
            ['type'=>'Dry Cleaner'],
            ['type'=>'Garage'],
            ['type'=>'Gift Shop'],
            ['type'=>'Liquor Shop'],
            ['type'=>'Sweet Shop'],
            ['type'=>'Thrift Shop'],
            ['type'=>'Restaurant'],
            ['type'=>'Bio Market'],
            ['type'=>'Supermarket'],
            ['type'=>'Other']
        ];

        foreach($types as $type){
            ShopType::create($type);
        }
    }
}
