<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_chucvu extends Model
{
    protected $table= "tbl_chucvu";
    public function tbl_phongban(){
        return $this->belongsTo('App\tbl_phongban','id_phongban','id_phongban');
    }
    public function tbl_hosonhanvien(){
        return $this->hasMany('App\tbl_hosonhanvien','id_chucvu','id_hosonhanvien');
    }
}
