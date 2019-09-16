<?php

namespace App\Exports;

use App\Gurumodel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    public function view(): View
    {
        $halaman = 'Laporan Guru';
        $user = \Session::get('user');
        return view('guru.guru_pdf', [
            'user' => $user,
            'halaman' => $halaman,
            'guru_list' => Gurumodel::all()
        ]);
    }
}

?>