<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelasmodel;
use App\Gurumodel;
use App\Walikelasmodel;
use Excel;
use App\Exports\WalikelasExport;

use PDF;

class walikelascontroller extends Controller
{
    public function walikelasmodel(Request $request){
        $halaman = "Walikelas Model";

        // $kelas_list = Kelasmodel::all();
        // $guru_list = Gurumodel::where('id','=',$kelas_list->id_guru)->get();

        if($request->has('cari')){
            $guru_list = Gurumodel::where('nama_guru','LIKE','%'.$request->cari.'%')->get();
            foreach($guru_list as $guru){
                $walikelas_list = Walikelasmodel::where('id_guru','=',$guru->id)->get();
                $jumlah_walikelas = $walikelas_list->count();
            }
        } else {
            $walikelas_list = Walikelasmodel::all();
            $jumlah_walikelas = Walikelasmodel::count();
        }
        
        $user = \Session::get('user');
        return view('walikelas.indexwalikelas', compact('halaman','walikelas_list','user','jumlah_walikelas'));
    }

    public function cetak_pdf(){
        $halaman = 'Laporan Walikelas';
        $walikelas_list = Walikelasmodel::all();
        $user = \Session::get('user');
        $pdf = PDF::loadview('walikelas.walikelas_pdf', compact('halaman','walikelas_list','user'));
        return $pdf->download('laporan-walikelas_'.date('d-m-Y').'.pdf');
    }

    public function cetak_excel(){
        $nama_file = 'laporan-walikelas_'.date('d-m-Y').'.xlsx';
        return Excel::download(new WalikelasExport, $nama_file);
    }

    public function create(){
        $halaman ='Form Walikelas';
        $user = \Session::get('user');
        $kelas_list = Kelasmodel::all();
        $guru_list = Gurumodel::all();
        return view('walikelas.createwalikelas', compact('halaman','user','kelas_list','guru_list'));
    }

    
    public function store(Request $request) {
        $walikelas = Walikelasmodel::create($request->all());
        return redirect('walikelasmodel');
    }

    public function show($id) {
        $halaman = 'Detail Tampilan';
        $walikelas = Walikelasmodel::findOrFail($id);
        $guru = Gurumodel::where('id','=',$walikelas->id_guru)->get();
        $kelas = Kelasmodel::where('id','=',$walikelas->id_kelas)->get();
        $user = \Session::get('user');
        return view('walikelas.showwalikelas', compact('halaman', 'walikelas', 'user', 'guru', 'kelas'));
    }

    public function edit($id) {
        $halaman = 'Edit Data';
        $walikelas = Walikelasmodel::findOrFail($id);

        $kelas_awal = Kelasmodel::where('id','=',$walikelas->id_kelas)->get();
        $kelas_lain = Kelasmodel::where('id','!=',$walikelas->id_kelas)->get();
        $kelas_list = Kelasmodel::all();

        $guru_awal = Gurumodel::where('id','=',$walikelas->id_guru)->get();
        $guru_lain = Gurumodel::where('id','!=',$walikelas->id_guru)->get();
        $guru_list = Gurumodel::all();

        $user = \Session::get('user');
        return view('walikelas.editwalikelas', compact('halaman', 'walikelas', 'user', 'kelas_list', 'kelas_awal', 'kelas_lain', 'guru_list', 'guru_awal', 'guru_lain'));
    }

    public function update($id, Request $request){
        $walikelas = Walikelasmodel::findOrFail($id);
        
        $walikelas->id = $request->id;
        $walikelas->id_guru = $request->id_guru;
        $walikelas->id_kelas = $request->id_kelas;
        $walikelas->save();

        return redirect('walikelasmodel');
    }

    public function delete($id){
        $walikelas = Walikelasmodel::findOrFail($id);
        $walikelas->delete();
        return redirect('walikelasmodel');
    }
}
