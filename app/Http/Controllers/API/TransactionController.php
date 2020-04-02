<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Shop;
use App\User;

class TransactionController extends Controller
{
    public function index()
    {
        $shop = Shop::where('user_id', Auth::user()->id)->first();

        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } else {
            $transactions = Transaction::where('shop_id', $shop->id)->get();

            foreach ($transactions as $transaction) {
                $user['name'] = User::find($transaction->user_id)->name;
                $transaction['user'] = $user;
            }

            return response()->json(['success' => $transactions], 200);
        }
    }

    public function statistics()
    {
        $shop = Shop::where('user_id', Auth::user()->id)->first();

        //TODO LIJST MET ALLE KLANTEN


        //HOEVEEL ZE UITGAVEN DEZE MAAND


        //HOEVEEL ZE UITGAVEN VORIGE MAAND


        //HOEVEEL ZE UITGAVEN DIT JAAR


        //HOEVEEL ZE UITGAVEN VORIG JAAR


        //HOEVAAK ZE GEMIDDELD MAAND WEER JE WINKEL BEZOEKEN
    }
}