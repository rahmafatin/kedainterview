<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class StaffController extends Controller
{
    //

    public function isStaff(){
        return Auth::user()->user_type_id == 2;
    }
    public function getAllCustomers(){
        //Checking the active user is staff or not
        if(!self::isStaff()){
            return response()->json(['messagge' => 'Unauthorized'],200);
        }
        return response()->json([
            'users'      => User::where('user_type_id', 1)->get(),
            'message'   => 'Success'
        ],200); 
    }

    public function getActiveCustomers(){

        if(!self::isStaff()){
            return response()->json(['messagge' => 'Unauthorized'],200);
        }
        return response()->json([
            'users'     => User::where('user_type_id', 1)->where('deleted_at', NULL)->get(),
            'messages'  => 'Success'
        ],200);
    }


}
