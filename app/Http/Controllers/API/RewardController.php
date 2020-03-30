<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Reward;

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

    public function create()
    {
        //TODO
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
