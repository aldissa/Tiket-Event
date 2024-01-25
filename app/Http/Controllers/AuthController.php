<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginform()
    {
        return view('Auth/login');
    }

    public function regisform()
    {
        return view('Auth/regis');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('message', 'Invalid field');
        }

        if(!Auth::attempt($request->only(['email', 'password']))){

            return redirect()->back()->with('message', 'Username atau Password salah!');
        }

        $user = Auth::user();
        if ($user->role === 'admin'){
            return redirect()->route('admin');
        } else {
            return redirect()->route('home');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        if (auth()->check()) {
            Auth::logout();
        }
        return redirect()->route('home');
    }

    public function regis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->input('password'));
        $user->role = 'customer';

        $user->save();

        return redirect()->route('loginform');
    }
}    
