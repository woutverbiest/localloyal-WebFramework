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
        //FIXME ORDER REWARDS FROM LOW POINTS TO HIGH POINTS
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

    public function update($shopuuid, $rewarduuid, Request $request)
    {
        //TODO CHECK IF USER EXISTS

        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();
        $reward = Reward::find($rewarduuid);

        //TODO check if reward exists, better: change update or create

        if($shop == null){
            return response()->json(['error'=>'Not Found: Shop does not exist'], 404);
        }
        elseif($reward == null){
            return response()->json(['error'=>'Not Found: Reward does not exist'], 404);
        }
        elseif($shop->id != $shopuuid){
            return response()->json(['error'=>'Forbidden: You can not update this reward'],403);
        }
        elseif($reward->shop_id == $shopuuid){
            return response()->json(['error'=>'Forbidden: You can not update this reward'],403);
        }
        else{
            $validator = Validator::make($request->all(),[
                'reward_name'=>'required',
                'points'=>'required',
                'description'=>'required'
            ]);

            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()], 401);
            }
            else{
                $input = $request->all();

                Reward::where('id', $rewarduuid)
                            ->update([
                                'reward_name'=>'required',
                                'points'=>'required',
                                'description'=>'required'
                            ]);

                return response()->json(['success'=>$input], 200);//TODO CHANGE THIS RESPONSE
            }
        }
    }

    public function delete($shopuuid, $rewarduuid)
    {
        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();
        $reward = Reward::find($rewarduuid);

        //TODO CHECK IF USER EXISTS

        if($shop == null){
            return response()->json(['error'=>'Not Found: Shop does not exist'], 404);
        }
        elseif($reward == null){
            return response()->json(['error'=>'Not Found: Reward does not exist'], 404);
        }
        elseif($shop->id != $shopuuid){
            return response()->json(['error'=>'Forbidden: You can not delete this reward'], 403);
        }
        elseif($reward->shop_id == $shopuuid){
            return response()->json(['error'=>'Forbidden: You can not delete this reward'], 403);
        }
        else{
            Reward::find($rewarduuid)->delete();

            return response()->json(['success','deleted'], 200);
        }
    }
}
