<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Reward;
use App\User;
use Illuminate\support\facades\auth;
use Validator;

class RewardController extends Controller
{
    public function index($shopuuid)
    {
        $shop = Shop::find($shopuuid);
        if($shop==null){
            return response() -> json(['error' => 'Not Found: Shop does not exist'],404);
        }
        elseif($shop->visible == false){
            return response() -> json(['error' => 'Forbidden: This shop is not visible'],403);
        }
        else{
            $rewards = Reward::where('shop_id',$shop->id)->get();
            return response() -> json(['success' => $rewards],200);
        }
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::where('user_id',$user->id)->first();

        //TODO AD AN IF FOR THE AUTH THAT FAILS
        if($shop == null){
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        }
        else{
            $validator = Validator::make($request->all(),[
                'reward_name'=>'required',
                'points' => 'required',
                'description' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()], 401);
            }
            else{
                $input = $request->all();

                $input['shop_id']=$shop->id;

                $reward = Reward::create($input);

                return response()->json(['success' => $reward], 200);
            }
        }
    }

    public function update()
    {
        //TODO
    }

    public function delete()
    {
        //TODO
    }
}
