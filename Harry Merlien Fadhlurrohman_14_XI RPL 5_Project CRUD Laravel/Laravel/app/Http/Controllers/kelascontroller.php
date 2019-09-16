<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Kelasmodel;
use App\Siswamodel;
use Excel;
use App\Exports\KelasExport;

use PDF;

class kelascontroller extends Controller
{
    public function kelasmodel(Request $request){
        $halaman = 'Kelas Model';
        if($request->has('cari')){
            $kelas_cek = Kelasmodel::where('nama_kelas','LIKE','%'.$request->cari.'%')->get();
            foreach($kelas_cek as $kelas){
                $kelas_list = Kelasmodel::where('id','=',$kelas->id)->get();
                $jumlah_kelas = $kelas_list->count();
            }
        } else {
            $kelas_list = Kelasmodel::all();
            $jumlah_kelas = Kelasmodel::count();
        }
        
        $user = \Session::get('user');
        return view('kelas.indexkelas', compact('halaman','kelas_list','user','jumlah_kelas')); 
    }

    public function cetak_pdf(){
        $halaman = 'Laporan Kelas';
        $kelas_list = Kelasmodel::all();
        $user = \Session::get('user');
        $pdf = PDF::loadview('kelas.kelas_pdf', compact('halaman','kelas_list','user'));
        return $pdf->download('laporan-kelas_'.date('d-m-Y').'.pdf');
    }

    public function cetak_excel(){
        $nama_file = 'laporan-kelas_'.date('d-m-Y').'.xlsx';
        return Excel::download(new KelasExport, $nama_file);
    }

    public function create(){
        $halaman ='Form Kelas';
        $user = \Session::get('user');
        return view('kelas.createkelas', compact('halaman','user'));
    }

    public function store(Request $request) {
        if( $request->hasFile('image_kelas')){
            $kelas = Kelasmodel::create($request->all());
            $siswakelas = Siswamodel::where('id_kelas','=',$kelas->id)->get();

            $file = $request->file('image_kelas');
            $nama_file = $request->id."_".$file->getClientOriginalName();
            $tujuan_upload = 'images_kelas';

            $file->move($tujuan_upload,$nama_file);
            
            $kelas->image_kelas = $nama_file;
            $kelas->save();
        } else {
            Kelasmodel::create($request->all());
        }

        return redirect('kelasmodel');
    }
    
    public function show($id) {
        $halaman = 'Detail Tampilan';
        $kelas = Kelasmodel::findOrFail($id);
        $siswakelas = Siswamodel::where('id_kelas','=',$kelas->id)->get();
        $jumlah_siswakelas = $siswakelas->count();
        $user = \Session::get('user');
        return view('kelas.showkelas', compact('halaman', 'kelas', 'user','siswakelas','jumlah_siswakelas'));
    }

    public function edit($id) {
        $halaman = 'Edit Data';
        $kelas = Kelasmodel::findOrFail($id);
        $user = \Session::get('user');
        return view('kelas.editkelas', compact('halaman', 'kelas', 'user'));
    }

    public function update($id, Request $request){
        $kelas = Kelasmodel::findOrFail($id);

        if( $request->hasFile('image_kelas')){
            if($kelas->image_kelas != null){
                Storage::delete('images_kelas/'.$kelas->image_kelas);
            } else {
                $kelas->image_kelas = null;
            }

            $file = $request->file('image_kelas');
            $nama_file = $request->id."_".$file->getClientOriginalName();
            $tujuan_upload = 'images_kelas';

            $file->move($tujuan_upload,$nama_file);
            
            $kelas->id = $request->id;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->image_kelas = $nama_file;
            $kelas->save();
        } else {
            $kelas->id = $request->id;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->image_kelas = $kelas->image_kelas;
            $kelas->save();
        }
        
        return redirect('kelasmodel');
    }

    public function delete($id) {
        $kelas = Kelasmodel::findOrFail($id);
        $siswakelas = Siswamodel::where('id_kelas','=',$kelas->id)->get();
        
        if($kelas->image_kelas != null){
            Storage::delete('images_kelas/'.$kelas->image_kelas);
            // $kelas->post()->whereId($id)->delete();
            // $siswakelas->id_kelas = null;
            // $siswakelas->save();
            $kelas->delete();
        } else {
            // $siswakelas->id_kelas = null;
            // $siswakelas->save();
            $kelas->delete();
        }

        return redirect('kelasmodel');
    }
}
