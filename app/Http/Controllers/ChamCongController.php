<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\tbl_chamcong;
use App\tbl_hosonhanvien;
use App\tbl_bangluong;
use App\tbl_tangca;
use App\tbl_luuykien;
class ChamCongController extends Controller
{
    public function getChamCong(){
        // $cac=tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)
        //         ->where('luong_thang',date('Y-m-1'))->exists(); var_dump($cac);exit;
        if( !tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)->where('luong_thang',date('Y-m-1'))->exists())
        {
                $newbl = new tbl_bangluong;
                $newbl->luong_thang = date("Y-m-1");
                $newbl->id_nhanvien = Auth::user()->id_nhanvien;
                $newbl->save();
        }
        $bangluong = tbl_bangluong::whereMonth('luong_thang',date('m'))
                ->where('id_nhanvien',Auth::user()->id_nhanvien)
                ->first();
        $lichsu = tbl_chamcong::where('id_bangluong',$bangluong->id_bangluong)->get();
        $chamcong = tbl_chamcong::where('id_bangluong',$bangluong->id_bangluong)
                ->where('check_in','like', date('Y-m-d').'%')
                ->first();
               //var_dump($chamcong); exit;
        $tangca = tbl_tangca::where('id_nhanvien',Auth::User()->id_nhanvien)
               ->where('check_in',date('Y-m-d'))
               ->first();
        $ngaynghi = getNgayNghi();
        
        return view('layout.chamcong.frmchamcong', compact('lichsu','chamcong','bangluong','ngaynghi','tangca'));
    }

    public function checkin(){
        // $checkin = new tbl_chamcong;
        // $checkin->ngay_cham_cong = date("Y-m-d");
        // $checkin->check_in = date("H:i");
        // $checkin->id_nhanvien = Auth::user()->id_nhanvien;
        // $checkin->save();
        // return redirect('private/chamcong')->with('thongbao','Đã checkin');

        // $bangluong = tbl_bangluong::where('id_nhanvien',Auth::User()->id_nhanvien)
        //         ->whereMonth('luong_thang', date('m'))
        //         ->first();
        // $checkin = new tbl_chamcong;
        // $checkin->ngay_cham_cong = date("Y-m-d");
        // $checkin->check_in = date("H:i");
        // $checkin->id_bangluong = $bangluong->id_bangluong;
        // $checkin->save();
        // return redirect('private/chamcong')->with('thongbao','Đã checkin');
        $mac = getMACAddr();
        if($mac != Auth::user()->mac_ip){
                return redirect('private/chamcong')->with('thongbaoloi','Bạn Đang Đăng Nhập Vào Máy Khác Không Thuộc Hệ Thống Nên Không Được Checkin');
        }else{
        $bangluong = tbl_bangluong::where('id_nhanvien',Auth::User()->id_nhanvien)
                ->whereMonth('luong_thang', date('m'))
                ->first();
        $tangca = tbl_tangca::where('id_nhanvien',Auth::User()->id_nhanvien)
                ->where('check_in',date('Y-m-d'))
                ->first();
        $checkin = new tbl_chamcong;
        if(isset($tangca)){
                $checkin->id_tangca = $tangca->id_tangca;
        }
        $checkin->check_in = date('Y-m-d H:i:s');
        $checkin->id_bangluong = $bangluong->id_bangluong;
        $checkin->save();
        return redirect('private/chamcong')->with('thongbao','Đã checkin');
        }
    }

    public function checkout(){
        $bangluong = tbl_bangluong::where('id_nhanvien',Auth::User()->id_nhanvien)
                ->whereMonth('luong_thang', date('m'))
                ->first();
        $checkout = tbl_chamcong::where('id_bangluong',$bangluong->id_bangluong)
                ->where('check_in','like', date('Y-m-d').'%')
                ->first();
        //$nhanvien = tbl_hosonhanvien::where('id_nhanvien',Auth::user()->id_nhanvien)->first();
        $checkout->thoi_gian_lam = (strtotime(date('Y-m-d H:i:s')) - strtotime($checkout->check_in)) / 3600;
        //$hour = (strtotime($checkout->check_out) - strtotime($checkout->check_in) ) / 3600;
        $min = ($checkout->thoi_gian_lam-intval($checkout->thoi_gian_lam))*60;
        $checkout->tbl_bangluong->so_gio_lam_viec += $checkout->thoi_gian_lam;
        $checkout->save();
        $checkout->tbl_bangluong->save();
        return redirect('private/chamcong')->with('thongbao','Đã checkout. hôm nay bạn đã làm được '.intval($checkout->thoi_gian_lam).' tiếng '.intval($min)." phút");
    }

    public function getTangCa(){
        if(!tbl_luuykien::where('id_ykien',7)
                ->where('ngay_bat_dau',date('Y-m-d'))
                ->exists())
                return redirect('private/chamcong')->with('thongbao','Không Có Tăng Ca Hôm Nay');
        $tangca = tbl_tangca::where('id_nhanvien',Auth::user()->id_nhanvien)
                ->orderBy('id_tangca','DESC')
                ->first();
        $lichsu = tbl_tangca::where('id_nhanvien',Auth::user()->id_nhanvien)->get();
        return view('layout.chamcong.frmtangca',compact('tangca','lichsu'));
    }
    
    public function checkinTangCa(){
        $tangca = tbl_tangca::where('id_nhanvien',Auth::User()->id_nhanvien)
                ->where('check_in',date('Y-m-d'))
                ->orderBy('id_tangca','DESC')
                ->first();
        $tangca->check_in = date('Y-m-d H:i:s');
        $tangca->save();
        return redirect('private/chamcong/tangca')->with('thongbao','Đã checkin');
    }

    public function checkoutTangCa(){
        $tangca = tbl_tangca::where('id_nhanvien',Auth::User()->id_nhanvien)
                ->where('check_in','like', date('Y-m-d').'%')
                ->orderBy('id_tangca','DESC')
                ->first();
        $tangca->thoi_gian_lam = (strtotime(date('Y-m-d H:i:s')) - strtotime($tangca->check_in)) / 3600;
        $min = ($tangca->thoi_gian_lam-intval($tangca->thoi_gian_lam))*60;
        $tangca->save();
        return redirect('private/chamcong/tangca')->with('thongbao','Đã checkout. Hôm nay bạn đã tăng ca được '.intval($tangca->thoi_gian_lam).' tiếng '.intval($min)." phút");       
    }

    public function getChiTietTangCa($id_tangca){
        $tangca = tbl_tangca::where('id_tangca',$id_tangca)->first();
        return view('layout.chamcong.chitietTangCa',compact('tangca'));
    }
}