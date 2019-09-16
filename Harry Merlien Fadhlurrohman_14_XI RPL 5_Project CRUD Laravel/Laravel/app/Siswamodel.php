<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswamodel extends Model
{
    protected $table = 'siswamigration';

    protected $fillable = [
        'id',
        'nisn',
        'nama_siswa',
        'id_kelas',
        'tanggal_lahir',
        'jenis_kelamin',
        'image_siswa'
    ];

    public function kelasmigration(){
        return $this->belongsTo('App\Kelasmodel','id_kelas');
        // return $this->belongsTo(Kelasmodel::class);
    }

    public function getImageSiswa(){
        if(!$this->image_siswa){
            if($this->jenis_kelamin == "L"){
                return asset('images_siswa/default1.png');
            } elseif($this->jenis_kelamin == "P")
                return asset('images_siswa/default2.png');
        }

        return asset('images_siswa/'.$this->image_siswa);
    }
}
