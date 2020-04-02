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
        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } elseif ($shop->visible == false) {
            return response()->json(['error' => 'Forbidden: This shop is not visible'], 403);
        } else {
            $rewards = Reward::where('shop_id', $shop->id)->orderBy('points', 'asc')->get();
            return response()->json(['success' => $rewards], 200);
        }
    }

    public function find($rewarduuid)
    {
        $reward = Reward::find($rewarduuid);
        if ($reward != null) {
            return response()->json(['success' => $reward], 200);
        } else {
            return response()->json(['error' => 'Not Found: Reward does not exist']);
        }
    }

    public function create(Request $request)
    {
        $shop = Shop::where('user_id', Auth::user()->id)->first();

        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } else {
            $validator = Validator::make($request->all(), [
                'reward_name' => 'required',
                'points' => 'required',
                'description' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
                $input = $request->all();
                $input['shop_id'] = $shop->id;

                $reward = Reward::create($input);

                return response()->json(['success' => $reward], 200);
            }
        }
    }

    public function update($rewarduuid, Request $request)
    {
        $shop = Shop::where('user_id', Auth::user()->id)->first();
        $reward = Reward::find($rewarduuid);

        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } elseif ($reward == null) {
            return response()->json(['error' => 'Not Found: Reward does not exist'], 404);
        } elseif ($reward->shop_id != $shop->id) {
            return response()->json(['error' => 'Forbidden: You can not update this reward'], 403);
        } else {
            $validator = Validator::make($request->all(), [
                'reward_name' => 'required',
                'points' => 'required',
                'description' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
                $input = $request->all();

                Reward::where('id', $rewarduuid)
                    ->update([
                        'reward_name' => $input['reward_name'],
                        'points' => $input['points'],
                        'description' => $input['description']
                    ]);

                $updatedReward = Reward::find($rewarduuid);
                return response()->json(['success' => $updatedReward], 200);
            }
        }
    }

    public function delete($rewarduuid)
    {
        $shop = Shop::where('user_id', Auth::user()->id)->first();
        $reward = Reward::find($rewarduuid);

        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } elseif ($reward == null) {
            return response()->json(['error' => 'Not Found: Reward does not exist'], 404);
        } elseif ($reward->shop_id != $shop->id) {
            return response()->json(['error' => 'Forbidden: You can not delete this reward'], 403);
        } else {
            Reward::find($rewarduuid)->delete();
            return response()->json(['success', 'deleted'], 200);
        }
    }
}
