<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{    
    public function login(Request $request){
        
        //Set the validation of requests
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);
        
        //if validation fails it will give response error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $credentials = $request->only('email', 'password');

        if(!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),    
            'token'   => $token   
        ], 200);
    }

    public function register(Request $request){
        //Set the validation of requests
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
            'user_type_id' => 'required|in:1,2',
        ]);
        
        //if validation fails it will give response error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        /**
         * If validation not fails then store user to database
         */
        $user = User::create([
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'user_type_id' => $request->user_type_id

        ]);       

        return response()->json([
            'user'      => $user,
            'message'   => 'Register Success'
        ],200);
    }

    public function logout(){
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out'],200);
    }
}
