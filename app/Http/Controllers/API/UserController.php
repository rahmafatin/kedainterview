<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    //
    public function findUser($id){
        return User::where('id', $id)->first();
    }
}
