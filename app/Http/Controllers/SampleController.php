<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(){
        return response(['message' => 'masuukk yeaey'],200);
    }
}
