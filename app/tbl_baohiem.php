<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_baohiem extends Model
{
    protected $table= "tbl_baohiem";
    protected $primaryKey = 'id_baohiem';
    public function tbl_hosonhanvien(){
        return $this->hasOne('App\tbl_hosonhanvien');
    }


}
