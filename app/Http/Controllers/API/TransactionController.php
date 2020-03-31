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
        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();
        
        //TODO add validation if user exists
        if($shop == null){
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        }
        else{
            $transactions = Transaction::where('shop_id', $shop->id)->get();
            
            foreach($transactions as $transaction){
                $username['name'] = User::find($transaction->user_id)->name;
                $transaction['user'] = $username;
            }

            return response()->json(['success' => $transactions], 200);
        }
    }
}