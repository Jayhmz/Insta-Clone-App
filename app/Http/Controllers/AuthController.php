<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //


    public function Register(Request $req)
    {
        $model = new User();

        $model->fullname = $req->fullname;
        $model->username = $req->username;
        $model->phone = $req->phone;
        $model->email = $req->email;
        $model->password = hash::make($req->password);

        $req->validate([
            'fullname' => 'required',
            'username' => 'required',
            'phone' => 'required|max:12',
            'email' => 'required|email|unique:users',
            'password' => 'required | min:5'
        ]);
        $save = $model->save();
        if ($save) {
            return redirect('instagram/login')->with('success', 'user ' . $model->username . ' is created successfully, pls log in.');
        } else {
            return back()->with('error', 'there was an error creating your account, sign up again');
        }
    }

    public function Login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
           return  redirect()->intended(route('instagram.homepage',auth()->user()));
        }else{
            return back()->with('error', 'credentials does not match our records');
        }

       // $userInfo = User::where('username', '=', $request->username)->first();
        // if (!$userInfo) {
        //     return back()->with('error', 'User not recognized, sign up instead');
        // } else {
        //     //check password
        //     if (hash::check($request->userPassword, $userInfo->password)) {
        //         $request->session()->put('LoggedUser', $userInfo->id);
        //         return redirect('instagram');
        //     } else {
        //         return back()->with('error', 'Incorrect user password');
        //     }
        // }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('instagram.login');
    }
}
