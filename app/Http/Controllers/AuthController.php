<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function _login(Request $request){
        // Session::flash('email',$request->email);

        // $request->validate ([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // $infologin = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];
        // if(Auth::attempt($infologin)) {
        //     return redirect('dasboard')->with('success','Berhasil Login');
        // } else {
        //     return redirect('sesi')->with('success','Username dan Password Tidak Sesuai');
        // }
        // {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if(Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');

    }
}
