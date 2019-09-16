<?php

namespace App\Exports;

use App\Walikelasmodel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WalikelasExport implements FromView
{
    public function view(): View
    {
        $halaman = 'Laporan Walikelas';
        $user = \Session::get('user');
        return view('walikelas.walikelas_pdf', [
            'user' => $user,
            'halaman' => $halaman,
            'walikelas_list' => Walikelasmodel::all()
        ]);
    }
}

?>