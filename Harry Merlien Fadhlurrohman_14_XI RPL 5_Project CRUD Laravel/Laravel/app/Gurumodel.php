<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gurumodel extends Model
{
    protected $table = 'gurumigration';

    protected $fillable = [
        'id',
        'nip',
        'nama_guru',
        'tanggal_lahir',
        'jenis_kelamin',
        'image_guru'
    ];

    public function getImageGuru(){
        if(!$this->image_guru){
            if($this->jenis_kelamin == "L"){
                return asset('images_guru/default1.png');
            } elseif($this->jenis_kelamin == "P")
                return asset('images_guru/default2.png');
        }

        return asset('images_guru/'.$this->image_guru);
    }

    public function walikelasmigration(){
        return $this->hasOne('App\Walikelasmodel','id');
    }
}
