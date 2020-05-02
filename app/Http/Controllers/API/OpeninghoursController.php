<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop;
use App\Openinghour;
use App\Day;
use Illuminate\support\Facades\Auth;
use Validator;

class OpeninghoursController extends Controller
{
    public function index($shopuuid)
    {
        $shop = Shop::find($shopuuid);
        $openinghours = Openinghour::where('shop_id', $shopuuid)->orderBy('day_id', 'asc')->get();
        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } elseif ($openinghours == null) {
            return response()->json(['error' => 'Not Found: Openingshours not found'], 404);
        } else {
            foreach ($openinghours as $openinghour) {
                $openinghour['day'] = Day::find($openinghour->day_id)->day;
            }
            return response()->json(['success' => $openinghours], 200);
        }
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();

        if ($shop == null) {
            return response()->json(['error' => 'Not Found: Shop does not exist'], 404);
        } else {
            $validator = Validator::make($request->all(), [
                'day_id' => 'required',
                'from' => 'required',
                'till' => 'required',
                'brake_start' => 'required',
                'brake_end' => 'required',
                'closed' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
                $input = $request->all();

                Openinghour::where('shop_id', $shop->id)
                    ->where('day_id', $input['day_id'])
                    ->update([
                        'from' => $input['from'],
                        'till' => $input['till'],
                        'brake_start' => $input['brake_start'],
                        'brake_end' => $input['brake_end'],
                        'closed' => $input['closed']
                    ]);
                return response()->json(['success' => $input], 200);
            }
        }
    }
}
