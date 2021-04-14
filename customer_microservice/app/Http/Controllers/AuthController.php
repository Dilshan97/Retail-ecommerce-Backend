<?php

namespace App\Http\Controllers;

use App\Http\Resources\Auth\AuthResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|string',
            'username' => 'required|unique:users|string',
            'password' => 'required'
        ]);

        $customer = new User();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->username = $request->username;
        $customer->password = Hash::make($request->password);

        if ($customer->save()) {
            return response()->json([
                'user' => new AuthResource($customer),
                'status_code' => 201
            ], 201);
        } else {
            return response()->json([
                'message' => 'cannot create customer',
                'status_code' => 500
            ], 500);
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'invalid_credentials',
                'status_code' => 401
            ], 401);
        }

        $customer = $request->user();


        if ($customer) {
            $tokenData = $customer->createToken('My Token');
            $token = $tokenData->token;

            if ($token->save()) {
                return response()->json([
                    'user' => new AuthResource($customer),
                    'accessToken' => $tokenData->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::parse($tokenData->token->expires_at)->toDayDateTimeString(),
                    'status_code' => 200
                ], 200);
            } else {
                return response()->json([
                    'message' => 'common_error',
                    'status_code' => 500
                ], 500);
            }
        }
    }


}
