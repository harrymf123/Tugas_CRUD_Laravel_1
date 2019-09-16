<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class templatecontroller extends Controller
{
    public function template(){
        return view('template.hardex');
    }

    public function tempalate(){
        return view('tempardex');
    }
}
