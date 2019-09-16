<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    public function homepage() {
        $user = \Session::get('user');
        return view('pages.homepage', compact('user'));
    }

    public function about() {
        $halaman = 'The Best Fiture';
        $user = \Session::get('user');
        return view('pages.about', compact('halaman','user'));
    }
}
