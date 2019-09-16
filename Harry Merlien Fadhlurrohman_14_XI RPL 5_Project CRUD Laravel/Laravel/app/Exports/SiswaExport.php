<?php

namespace App\Exports;

use App\Siswamodel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
    public function view(): View
    {
        $halaman = 'Laporan Siswa';
        $user = \Session::get('user');
        return view('siswa.siswa_pdf', [
            'user' => $user,
            'halaman' => $halaman,
            'siswa_list' => Siswamodel::all()
        ]);
    }
}

?>