<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_tintuyendung extends Model
{
    protected $table= "tbl_tintuyendung";
    public function tbl_chucvu(){
        return $this->hasOne('App\tbl_chucvu','id_chucvu','vi_tri');
    }
}
