<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Walikelasmodel extends Model
{
    protected $table = "walikelasmigration";

    protected $fillable = [
        'id',
        'id_guru',
        'id_kelas'
    ];
    
    public function gurumigration(){
        return $this->belongsTo('App\Gurumodel','id_guru');
    }
    public function kelasmigration(){
        return $this->belongsTo('App\Kelasmodel','id_kelas');
    }
}
