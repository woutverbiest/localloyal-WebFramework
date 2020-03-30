<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use Carbon\Carbon;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'user_id'=>2,
                'shop_id'=>1,
                'points'=>21,
                'spend_on_reward'=>false,
                'added_on'=>Carbon::now()
            ],
            [
                'user_id'=>3,
                'shop_id'=>1,
                'points'=>37,
                'spend_on_reward'=>false,
                'added_on'=>Carbon::now()
            ],
            [
                'user_id'=>2,
                'shop_id'=>1,
                'points'=>3,
                'spend_on_reward'=>false,
                'added_on'=>Carbon::now()
            ],
            [
                'user_id'=>3,
                'shop_id'=>1,
                'points'=>185,
                'spend_on_reward'=>false,
                'added_on'=>Carbon::now()
            ],
            [
                'user_id'=>2,
                'shop_id'=>1,
                'points'=>10,
                'spend_on_reward'=>false,
                'added_on'=>Carbon::now()
            ],
            [
                'user_id'=>3,
                'shop_id'=>1,
                'points'=>160,
                'spend_on_reward'=>true,
                'added_on'=>Carbon::now()
            ]
        ];

        foreach($transactions as $transaction){
            Transaction::create($transaction);
        }
    }
}
