<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Openinghour;
use App\Day;

class OpeninghoursController extends Controller
{
    public function index($shopuuid){
        $shop = Shop::find($shopuuid);
        $openinghours = Openinghour::where('shop_id', $shopuuid)->orderBy('day_id','asc')->get();
        if($shop == null){
            return response() -> json(['error' => 'Not Found: Shop does not exist'], 404);
        }
        elseif($openinghours == null){
            return response() -> json(['error' => 'Not Found: Openingshours not found'], 404);
        }
        else{
            foreach($openinghours as $openinghour){
                $openinghour['day'] = Day::find($openinghour->day_id)->day;
            }
            return response() -> json(['success' => $openinghours], 200);
        }
    }

    public function update()
    {
        //TODO
    }
}
