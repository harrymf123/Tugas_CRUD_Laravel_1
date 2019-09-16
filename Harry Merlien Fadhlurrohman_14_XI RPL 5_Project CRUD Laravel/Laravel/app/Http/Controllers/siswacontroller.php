<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Siswamodel;
use App\Kelasmodel;
use Excel;
use App\Exports\SiswaExport;

use PDF;

class siswacontroller extends Controller
{
    public function siswa() {
        $halaman = 'Siswa Tauladan';
        $siswa = ['Harry','Andi','Budi','Cindi','Dendi','Reza','Rendy'];
        $usia = ['16','15','17','18','16','17','18'];
        $kelas = ['XI','X','IX','XII','XI','X','XI'];
        $hobi = ['Sepak Bola','Basket','Bulu Tangkis','Boxing','Silat','Voly','E-Sport'];
        $user = \Session::get('user');
        return view('siswa.index', compact('halaman','siswa','usia','kelas','hobi','user'));
    }

    public function siswamodel(Request $request) {
        $halaman = 'Siswa Model';
        if($request->has('cari')){
            $siswa_cek = Siswamodel::where('nama_siswa','LIKE','%'.$request->cari.'%')->get();
            foreach($siswa_cek as $siswa){
                $siswa_list = Siswamodel::where('id','=',$siswa->id)->get();
                $jumlah_siswa = $siswa_list->count();
            }
        }else{
            $siswa_list = Siswamodel::all();
            $jumlah_siswa = Siswamodel::count();
        }
        $user = \Session::get('user');
        return view('siswa.indexmodel', compact('halaman','siswa_list','user','jumlah_siswa'));
    }

    public function cetak_pdf(){
        $halaman = 'Laporan Siswa';
        $siswa_list = Siswamodel::all();
        $user = \Session::get('user');
        $pdf = PDF::loadView('siswa.siswa_pdf', compact('halaman','siswa_list','user'));
        return $pdf->download('laporan-siswa_'.date('d-m-Y').'.pdf');
    }

    public function cetak_excel(){
        $nama_file = 'laporan-siswa_'.date('d-m-Y').'.xlsx';
        return Excel::download(new SiswaExport, $nama_file);
    }

    public function create(){
        $halaman ='Form Siswa';
        $user = \Session::get('user');
        $kelas_list = Kelasmodel::all();
        return view('siswa.create', compact('halaman','user','kelas_list'));
    }

    public function store(Request $request) {
        if( $request->hasFile('image_siswa')){
            $siswa = Siswamodel::create($request->all());

            $file = $request->file('image_siswa');
            $tujuan_upload = 'images_siswa';
            $nama_file = $request->id."_".$file->getClientOriginalName();

            $file->move($tujuan_upload,$nama_file);

            // $request->file('image_siswa')->move('images_siswa/',$request->file('image_siswa')->getClientOriginalName());

            $siswa->image_siswa = $nama_file;
            $siswa->save();
        } else {
            Siswamodel::create($request->all());
        }

        return redirect('siswamodel');
    }

    public function show($id) {
        $halaman = 'Detail Tampilan';
        $siswa = Siswamodel::findOrFail($id);
        $user = \Session::get('user');
        return view('siswa.show', compact('halaman', 'siswa', 'user'));
    }

    public function edit($id) {
        $halaman = 'Edit Data';
        $siswa = Siswamodel::findOrFail($id);
        $kelas_awal = Kelasmodel::where('id','=',$siswa->id_kelas)->get();
        $kelas_lain = Kelasmodel::where('id','!=',$siswa->id_kelas)->get();
        $kelas_list = Kelasmodel::all();
        $user = \Session::get('user');
        return view('siswa.edit', compact('halaman', 'siswa', 'user','kelas_list','kelas_awal','kelas_lain'));
    }

    public function update($id, Request $request){
        //dd($request->all());
        $siswa = Siswamodel::findOrFail($id);

        if( $request->hasFile('image_siswa')){

            // if(isset($_FILES["image_siswa"])){
            //     if(file_exists('images_siswa/'.$siswa->image_siswa)){
            //         unlink('images_siswa/'.$siswa->image_siswa);
            //     }
            // }

            // $request->file('image_siswa')->move('images_siswa/',$request->file('image_siswa')->getClientOriginalName());

            if($siswa->image_siswa != null){
                Storage::delete('images_siswa/'.$siswa->image_siswa);
            } else {
                $siswa->image_siswa = null;
            }

            $file = $request->file('image_siswa');
            $tujuan_upload = 'images_siswa';
            $nama_file = $request->id."_".$file->getClientOriginalName();
            
            $file->move($tujuan_upload,$nama_file);
            
            $siswa->id = $request->id;
            $siswa->nisn = $request->nisn;
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->image_siswa = $nama_file;
            $siswa->save();
        } else {
            $siswa->id = $request->id;
            $siswa->nisn = $request->nisn;
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->image_siswa = $siswa->image_siswa;
            $siswa->save();
        }

        return redirect('detailsiswa'.$siswa->id);
    }

    public function delete($id) {
        $siswa = Siswamodel::findOrFail($id);

        if($siswa->image_siswa != null){
            Storage::delete('images_siswa/'.$siswa->image_siswa);    
            $siswa->delete();
        } else {
            $siswa->delete();
        }

        // if(file_exists('images_siswa/'.$siswa->image_siswa)){
        //     unlink('images_siswa/'.$siswa->image_siswa);
        //     $siswa->delete();
        // } elseif(!file_exists('images_siswa/'.$siswa->image_siswa)) {
        //     $siswa->delete();
        // }

        // https://thoni.wordpress.com/2015/09/21/menghapus-file-dengan-menggunakan-service-filesystem-laravel/
        
        return redirect('siswamodel');
    }
}
