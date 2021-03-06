<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
