<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Gurumodel;
use Excel;
use App\Exports\GuruExport;

use PDF;

class gurucontroller extends Controller
{
    public function gurumodel(Request $request) {
        $halaman = 'Guru Model';
        if($request->has('cari')){
            $guru_cek = Gurumodel::where('nama_guru','LIKE','%'.$request->cari.'%')->get();
            foreach($guru_cek as $guru){
                $guru_list = Gurumodel::where('id','=',$guru->id)->get();
                $jumlah_guru = $guru_list->count();
            }
        } else {
            $guru_list = Gurumodel::all();
            $jumlah_guru = Gurumodel::count();
        }
        
        $user = \Session::get('user');
        return view('guru.indexguru', compact('halaman','guru_list','user','jumlah_guru'));
    }

    public function cetak_pdf(){
        $halaman = 'Laporan Guru';
        $guru_list = Gurumodel::all();
        $user = \Session::get('user');
        $pdf = PDF::loadview('guru.guru_pdf', compact('halaman','guru_list','user'));
        return $pdf->download('laporan-guru_'.date('d-m-Y').'.pdf');
    }

    public function cetak_excel(){
        $nama_file = 'laporan-guru_'.date('d-m-Y').'.xlsx';
        return Excel::download(new GuruExport, $nama_file);
    }

    public function create(){
        $halaman ='Form Guru';
        $user = \Session::get('user');
        return view('guru.createguru', compact('halaman','user'));
    }

    public function store(Request $request) {
        if( $request->hasFile('image_guru')){
            $guru = Gurumodel::create($request->all());

            $file = $request->file('image_guru');
            $tujuan_upload = 'images_guru';
            $nama_file = $request->id."_".$file->getClientOriginalName();
            
            $file->move($tujuan_upload,$nama_file);
            
            $guru->image_guru = $nama_file;
            $guru->save();
        } else {
            Siswamodel::create($request->all());
        }

        return redirect('gurumodel');
    }
    
    public function show($id) {
        $halaman = 'Detail Tampilan';
        $guru = Gurumodel::findOrFail($id);
        $user = \Session::get('user');
        return view('guru.showguru', compact('halaman', 'guru', 'user'));
    }

    public function edit($id) {
        $halaman = 'Edit Data';
        $guru = Gurumodel::findOrFail($id);
        $user = \Session::get('user');
        return view('guru.editguru', compact('halaman', 'guru', 'user'));
    }

    public function update($id, Request $request){
        $guru = Gurumodel::findOrFail($id);

        if( $request->hasFile('image_guru')){
            if($guru->image_guru != null){
                Storage::delete('images_guru/'.$guru->image_guru);
            } else {
                $guru->image_guru = null;
            }

            $file = $request->file('image_guru');
            $tujuan_upload = 'images_guru';
            $nama_file = $request->id."_".$file->getClientOriginalName();
            
            $file->move($tujuan_upload,$nama_file);
            
            // $request->file('image_guru')->move('images_guru/',$request->file('image_guru')->getClientOriginalName());
            
            $guru->id = $request->id;
            $guru->nip = $request->nip;
            $guru->nama_guru = $request->nama_guru;
            $guru->tanggal_lahir = $request->tanggal_lahir;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->image_guru = $nama_file;
            $guru->save();
        } else {
            $guru->id = $request->id;
            $guru->nip = $request->nip;
            $guru->nama_guru = $request->nama_guru;
            $guru->tanggal_lahir = $request->tanggal_lahir;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->image_guru = $guru->image_guru;
            $guru->save();
        }

        return redirect('detailguru'.$guru->id);
    }

    public function delete($id) {
        $guru = Gurumodel::findOrFail($id);

        if($guru->image_guru != null){
            Storage::delete('images_guru/'.$guru->image_guru);
            $guru->delete();
        } else {
            $guru->delete();
        }

        return redirect('gurumodel');
    }
}
