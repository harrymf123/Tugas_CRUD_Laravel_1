<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class loginregistercontroller extends Controller
{
    public function login() {
        $halaman = 'LOGIN USER';
        return view('login.login', compact('halaman'));
    }

    public function registrasi() {
        $halaman = 'REGISTRASI';
        return view('register.register', compact('halaman'));
    }

    public function adduser(Request $request) {
        if($request->password != $request->cpassword){
            \Session::flash('error', 'PASSWORD TIDAK SAMA !');

            return redirect('register');
        }

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ];

        User::create($data);

        \Session::flash('msg', 'REGISTRASI BERHASIL !');

        return redirect('login');
    }

    public function masuk(Request $request){
        $user = User::where('email', $request->email)->first();

        if($user == null) {
            \Session::flash('error', 'EMAIL TIDAK TERDAFTAR !');
            return redirect('login');
        }
        
        if(\Hash::check($request->password, $user->password)) {
            \Session::put('user', $user);
            \Session::flash('psn', 'LOGIN BERHASIL');
            return redirect('homepage');
        }else{
            \Session::flash('error', 'EMAIL ATAU PASSWORD ANDA TIDAK SESUAI !');
            return redirect('login');
        }
    }

    public function logout() {
        \Session::flush();
        return redirect('login');
    }
}
