<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App/Http/Requests;

class UsersController extends Controller
{
    //用户登陆控制器
    public function create() {
        return view('users.create');
    }
}
