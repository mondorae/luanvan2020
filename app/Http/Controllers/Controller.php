<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\tbl_thongtinchinh;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct(){
        $thongtinchinh=tbl_thongtinchinh::first();
        view()->share('thongtinchinh',$thongtinchinh);
    	$this->DangNhap();

    }
    function DangNhap(){
    	if(Auth::check()){
            
            view()->share('nhanvien',Auth::User());
            
        }
    }
}
