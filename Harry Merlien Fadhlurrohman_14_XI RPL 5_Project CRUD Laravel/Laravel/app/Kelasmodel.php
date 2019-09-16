<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelasmodel extends Model
{
    protected $table = "kelasmigration";

    protected $fillable = [
        'id',
        'nama_kelas',
        'image_kelas'
    ];

    public function siswamigration(){
        return $this->hasMany('App\Siswamodel','id');
        // return $this->hasMany(Siswamodel::class);
    }

    public function walikelasmigration(){
        return $this->hasOne('App\Walikelasmodel','id');
    }

    public function getImageKelas(){
        if(!$this->image_kelas){
            return asset('images_kelas/defaultkelas.jpg');
        }

        return asset('images_kelas/'.$this->image_kelas);
    }
}
