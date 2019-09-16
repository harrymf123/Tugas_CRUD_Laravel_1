<?php

namespace App\Exports;

use App\Kelasmodel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KelasExport implements FromView
{
    public function view(): View
    {
        $halaman = 'Laporan Kelas';
        $user = \Session::get('user');
        return view('kelas.kelas_pdf', [
            'user' => $user,
            'halaman' => $halaman,
            'kelas_list' => Kelasmodel::all()
        ]);
    }
}

?>