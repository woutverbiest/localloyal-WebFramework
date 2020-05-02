<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop;
use Illuminate\support\facades\auth;
use Validator;
use App\ShopType;

class ShopController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();

        if ($shop == null) {

            $validator = Validator::make($request->all(), [
                'shopname' => 'required',
                'shoptype' => 'required',
                'description' => 'required',
                'phonenumber' => 'required',
                'street' => 'required',
                'city' => 'required',
                'number' => 'required',
                'zip' => 'required',
            ]);

            //TODO ALSO GENERATE OPENINGHOURS (maybe event????)

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
                $input = $request->all();

                $input['visible'] = true;
                $input['user_id'] = $user->id;

                $shop = Shop::create($input);

                return response()->json(['success' => $shop], 201);
            }
        } else {
            return response()->json(['error' => 'Method not allowed: User already has shop'], 405);
        }
    }

    public function index()
    {
        $shops = Shop::all();

        foreach ($shops as $shop) {
            $shop->shoptype = self::getshoptype($shop->shoptype);
        }
        return response()->json(['success' => $shops], 200);
    }

    private function getshopbyid($uuid)
    {
        $shop = Shop::find($uuid);
        return $shop;
    }

    private function getshoptype($id)
    {
        $shoptype = ShopType::find($id);
        return $shoptype;
    }

    public function myshop()
    {
        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();

        if ($shop != null) {
            $shop->shoptype = self::getshoptype($shop->shoptype);
            return response()->json(['success' => $shop], 200);
        } else {
            return response()->json(['error' => 'Not found: Shop does not exist'], 404);
        }
    }

    public function find($uuid)
    {
        $shop = self::getshopbyid($uuid);

        if ($shop != null) {
            $shop->shoptype = self::getshoptype($shop->shoptype);
            return response()->json(['success' => $shop], 200);
        } else {
            return response()->json(['error' => 'Not found: Shop does not exist'], 404);
        }
    }

    public function update(Request $request)
    {
        $shop = self::getshopbyid(Shop::where('user_id', Auth::user()->id)->first()->id);

        if ($shop == null) {
            return response()->json(['error' => 'Not found: User does not have a store'], 404);
        } else {
            $validator = Validator::make($request->all(), [
                'shopname' => 'required',
                'visible' => 'required',
                'shoptype' => 'required',
                'description' => 'required',
                'phonenumber' => 'required',
                'street' => 'required',
                'city' => 'required',
                'number' => 'required',
                'zip' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
                $input = $request->all();

                Shop::where('user_id', $user->id)
                    ->update([
                        'shopname' => $input['shopname'],
                        'visible' => $input['visible'],
                        'shoptype' => $input['shoptype'],
                        'description' => $input['description'],
                        'phonenumber' => $input['phonenumber'],
                        'street' => $input['street'],
                        'city' => $input['city'],
                        'number' => $input['number'],
                        'zip' => $input['zip']
                    ]);

                $updatedshop = Shop::where('user_id', $user->id)->first();
                $updatedshop->shoptype = self::getshoptype($shop->shoptype);

                return response()->json(['success' => $updatedshop], 200);
            }
        }
    }

    public function types(){
        $shoptypes = ShopType::all();
        return response()->json(['success' => $shoptypes], 200);
    }
}
