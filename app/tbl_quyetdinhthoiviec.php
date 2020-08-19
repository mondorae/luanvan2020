<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_quyetdinhthoiviec extends Model
{
    protected $table= "tbl_quyetdinhthoiviec";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
    // public function tbl_phongban(){
    //     return $this->hasManyThrough('App\tbl_phongban','App\tbl_chucvu','id_nhanvien','id_chucvu','id_phongban');
    // }

    public function tbl_chucvu(){
        return $this->hasManyThrough('App\tbl_chucvu','App\tbl_hosonhanvien','id','id_nhanvien','id_chucvu');
    }
}
