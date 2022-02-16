<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        {
            $credentials = $request->validate([
                'name' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if(Auth::user()->role == 'admin'){
                    return redirect()->route('a.home');
                }else if(Auth::user()->role == 'kasir'){
                    return redirect()->route('k.home');
                }else if(Auth::user()->role == 'owner'){
                    return redirect()->route('o.home');
                }
                return redirect()->intended('home')->with('loginBerhasil', 'Login Berhasil');
            }
            return redirect('/login')->with('loginError', 'Login Gagal');

        }
    }
     
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
