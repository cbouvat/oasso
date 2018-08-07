<?php

namespace App\Http\Controllers;


class UserController extends Controller
{

    public function index(){

//        $user = Auth::user();

        return view('userInformations');

    }
}
