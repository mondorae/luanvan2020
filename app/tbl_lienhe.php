<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_lienhe extends Model
{
    protected $table= "tbl_lienhe";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_hosonhanvien','id_lienhe');
    }
}
