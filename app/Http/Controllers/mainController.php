<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class mainController extends Controller
{
    function login()
    {
        return view('instagram.login');
    }

    function register()
    {
        return view('instagram.signup');
    }

    function homepage()
    {
        $user_session = ['loggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('instagram.homepage', $user_session);
    }
}
