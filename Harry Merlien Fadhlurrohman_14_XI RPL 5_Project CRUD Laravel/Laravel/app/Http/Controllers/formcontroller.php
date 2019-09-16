<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formcontroller extends Controller
{
    public function registrasi(){
        return view('form.registrasi');
    }
}
