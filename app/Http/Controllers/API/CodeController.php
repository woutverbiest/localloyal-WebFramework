<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Shop;
use App\Code;
use Validator;

class CodeController extends Controller
{
    public function create(Request $request){
        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();

        if($shop !== null){
        $validator = Validator::make($request->all(),[
            'points' => 'required'
        ]);
        
        if($validator->fails()){
            return response()->json(['error'=> $validator->errors()],401);
        } else {
            $input = $request->all();

            $input['code'] = self::generaterandomcode(16);
            $input['shopid'] = $shop->id;
            $input['used'] = false;

            $code = Code::create($input);

            return response()->json(['success' => $code],201);
        }
    } else {
        return response()->json(['error' => 'User does not have a shop']);
    }

    }

    private function generaterandomcode($length){
        $characters = "012346789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST";
        $randomstring = '';
        for($i = 0; $i < $length; $i++){
            $randomstring .= $characters[rand(0, strlen($characters) -1)];
        }
        return $randomstring;
    }
}
