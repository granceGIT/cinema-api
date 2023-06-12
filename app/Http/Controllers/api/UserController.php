<?php

namespace App\Http\Controllers\api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if($user = User::where([['phone_number',$request->phone_number],['password',$request->password]])->first()){
            return response()->json([
                'data'=>[
                    'token'=>$user->generateToken(),
                ]
            ]);
        }
        throw new ApiException(401,'Authentication failed.');
    }

    public function logout(Request $request)
    {
        $request->user()->resetToken();
        return response()->json([
            'data'=>[
                'message'=>'logout',
            ]
        ]);
    }
}
