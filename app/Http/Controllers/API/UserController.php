<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('localloyal')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised: Email or password is incorrect'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        } else {
            $input = $request->all();

            $input['password'] = bcrypt($input['password']);

            $user = User::create($input);

            $success['token'] = $user->createToken('localloyal')->accessToken;
            $success['name'] = $user->name;

            return response()->json(['success' => $success], 200);
        }
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function find($uuid)
    {
        $user = User::find($uuid);

        if ($user == null) {
            return response()->json(['error' => 'Not Found: User does not exist'], 404);
        } else {
            return response()->json(['success' => ['name' => $user->name]], 200);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        } else {
            $input = $request->all();

            User::where('id', $user->id)
                ->update([
                    'name' => $input['name'],
                    'email' => $input['email']
                ]);

            $updateduser = User::find($user->id);
            return response()->json(['success' => $updateduser], 200);
        }
    }

    public function updatepassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        } else {
            $input = $request->all();

            $input['password'] = bcrypt($input['password']);

            User::where('id', $user->id)
                ->update([
                    'password' => $input['password']
                ]);

            $updateduser = User::find($user->id);
            return response()->json(['success' => $updateduser], 200);
        }
    }
}

