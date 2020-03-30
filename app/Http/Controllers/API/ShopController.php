<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Shop;
use Illuminate\support\facades\auth;
use Validator;

class ShopController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::where('user_id',$user->id)->first();

        if($shop == null){

            //TODO ADD ADDRESS TO VALIDATOR 
            $validator = Validator::make($request->all(),[
                'shopname'=>'required',
                'shoptype'=>'required',
                'description'=>'required',
            ]);

            //TODO ALSO GENERATE OPENINGHOURS

            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()],401);
            }
            else{
                $input = $request->all();

                $input['visible']=true;
                $input['user_id']=$user->id;

                $shop = Shop::create($input);

                return response()->json(['success'=>$input],201);
            }
        }
        else{
            return response() -> json(['error','Method not allowed: User already has shop'], 405);
        }
    }

    public function index()
    {
        $user = Auth::user();
        $shop = Shop::where('user_id',$user->id)->first();
        if($shop == null){
            return response() -> json(['error','Not found: User does not have a store'],404);
        }
        else{
            return response() -> json(['success' => $shop],200);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::where('user_id',$user->id)->first();
        if($shop == null){
            return response() -> json(['error','Not found: User does not have a store'],404);
        }
        else{
            $validator = Validator::make($request->all(),[
                'shopname'=>'required',
                'visible'=>'required',
                'shoptype'=>'required',
                'description'=>'required',
            ]);
            //TODO ADD ADDRESS OPTION

            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()], 401);
            }
            else{
                $input = $request->all();
                
                Shop::where('user_id',$user->id)
                    ->update([  'shopname'=>$input['shopname'],
                                'visible'=>$input['visible'],
                                'shoptype'=>$input['shoptype'],
                                'description'=>$input['description'],
                                ]);//TODO update address option

                $updatedshop = Shop::where('user_id',$user->id)->first();//TODO EMEDIATLY SHOW SHOPTYPE IN RESPONSE

                return response()->json(['success', $updatedshop], 200);//TODO CHECK IF RESPONSE CODE IS GOOD 
            }
        }
    }
}
