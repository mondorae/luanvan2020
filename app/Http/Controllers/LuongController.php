<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_bangluong;
use App\tbl_hopdong;
use App\tbl_ykien;
use App\tbl_mientrugiacanh;
use App\tbl_tangca;
use App\tbl_hosonhanvien;
use App\tbl_luuykien;

use Auth;
class LuongController extends Controller
{
    public function getLuong(){
        $luong = tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)->get(); 
        return view('layout.luong.theoDoiLuong',compact('luong'));
    }

    public function updateLuongAll(){
        $thuecanhan = 11000000; //Thuế của bản thân updated 1.7.2020
        $thuemientru = 4400000; //Thuế miễn trừ gia cảnh 1 người updated 1.7.2020
        $sumtangca = 0; //Tổng giờ làm tăng ca trong tháng
        $sumthuong = 0; //Tổng tiền thưởng
        $sumkyluat = 0; //Tổng tiền kỉ luật
        $luongung = 0;  //Tiền ứng lương
        $thuedong = 0;  //thuế phải đóng
        $nhanvien = tbl_hosonhanvien::all();
        foreach($nhanvien as $nv){
            $luongcoban = tbl_hopdong::where('id_nhanvien',$nv->id_nhanvien)
                    ->orderBy('id_nhanvien','DESC')
                    ->first();     //lương cơ bản
            $tangca = tbl_tangca::where('id_nhanvien',$nv->id_nhanvien)             //số giờ tăng ca
                    ->whereMonth('check_in',date('m'))
                    ->where('ghi_nhan',1)
                    ->get();
            foreach($tangca as $tc){                                                //Thời gian tăng ca
                $sumtangca += $tc->thoi_gian_lam; 
            }
            $luuykien = tbl_luuykien::where('id_nhanvien', $nv->id_nhanvien)        //Xét kỉ luật ứng lương thưởng
                    ->whereMonth('ngay_bat_dau',date('m'))
                    ->where('trang_thai',1)
                    ->where(function($q){
                        $q->where('id_ykien',9)
                        ->orwhere('id_ykien',10)
                        ->orwhere('id_ykien',5);
                    })        
                    ->get();
            foreach($luuykien as $lyk){
            if($lyk->id_ykien == 9)
                $sumthuong += $lyk->gia_tri;
            else if($lyk->id_ykien == 10)
                $sumkyluat += $lyk->gia_tri;
            else
                $luongung = $lyk->gia_tri;
            }
            $mientrugiacanh = tbl_mientrugiacanh::where('id_nhanvien',$nv->id_nhanvien)->first();       //trường hợp miễn trừ gia cảnh
            $luong = tbl_bangluong::where('id_nhanvien',$nv->id_nhanvien)                           //lương chính
                    ->where('luong_thang', date('Y-m-1'))        
                    ->orderBy('id_bangluong','desc')                                //note lai
                    ->first();
            if($luong == null) continue;
            $luongtong = ( ($luongcoban->muc_luong_chinh + $luongcoban->phu_cap) / 198 ) * $luong->so_gio_lam_viec;  //1 tháng làm 22 ngày mỗi ngày làm 9 tiếng từ 9h - 18h => 1 tháng làm tổng cộng 198 giờ.
            $luongtong += ($sumtangca*(($luongcoban->muc_luong_chinh / 198)));                  //cộng thêm tiền tăng ca phải tính thuế
            $thuebh = $luongtong * 10.5 / 100;
            if($luongcoban->muc_luong_chinh >= (($thuemientru * $mientrugiacanh->so_luong_mien_tru) + $thuecanhan))
            {
                $mientru = $luongcoban->phucap + ($thuemientru * $mientrugiacanh->so_luong_mien_tru) + $thuecanhan + $thuebh; //11tr la thue cua ban than
                $thunhapchiuthue = $luongtong - $mientru;
            if($thunhapchiuthue <= 5000000){
                $bac = 1;
            $thuedong = (5/100) * $thunhapchiuthue;
            }else if($thunhapchiuthue <= 10000000){
                //echo "thuộc bậc 2";
                $thuedong = (10/100) * $thunhapchiuthue - 250000;
            }else if($thunhapchiuthue <= 18000000){
                //echo "thuộc bậc 3";
                $thuedong = (15/100) * $thunhapchiuthue - 750000;
            }else if($thunhapchiuthue <= 32000000){
                //echo "thuộc bậc 4";
                $thuedong = (20/100) * $thunhapchiuthue - 1650000;
            }else if($thunhapchiuthue <= 52000000){
                //echo "thuộc bậc 5";
                $thuedong = (25/100) * $thunhapchiuthue - 3250000;
            }else if($thunhapchiuthue <= 80000000){
                //echo "thuộc bậc 6";
                $thuedong = (30/100) * $thunhapchiuthue - 5850000;
            }else {
                //echo "thuộc bậc 7";
                $thuedong = (35/100) * $thunhapchiuthue - 9850000;
            }
            }
        $luong->tong_tien_luong = $luongtong;       //Lương tổng không tính lương thưởng và kỉ luật
        $luong->thue_thu_nhap = $thuedong;          //Thuế phải dđóng
        $luong->thue_bao_hiem = $thuebh;            //Thuế bảo hiểm
        $luong->save();
        }
        // echo "Lương Tổng của tháng ".date('m')."là : ".number_format($luongtong);
        // echo "Tiền bảo hiểm phải đóng: ".number_format($thuebh);
        // echo "Thuế phải đóng= ".number_format($thuedong);
        // echo "Tiền nhận được: ".number_format($result);
        return redirect('private/luong/danhsach')->with('thongbao','đã cập nhật lương vào' .date('H:i:s'));
    }

    public function chiTietLuong($id_bangluong){
        $luong = tbl_bangluong::find($id_bangluong);
        $thuong = 0; //Tiền Thưởng
        $kyluat = 0; //tiền kỷ luật
        $tongtangca = 0; //tổng giờ tăng ca
        $khenthuong = tbl_luuykien::whereMonth('updated_at',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where(function($q){
                        $q->where('id_ykien',9)
                        ->orwhere('id_ykien',10);
                    })        
                    ->get();
        foreach($khenthuong as $t){
            if ($t->id_ykien == 9)
                $thuong += $t->gia_tri;
            else
                $kyluat += $t->gia_tri;
        }
        $tangca = tbl_tangca::whereMonth('check_in',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where('ghi_nhan',1)
                    ->get(); 
        foreach($tangca as $tc){
            $tongtangca += $tc->thoi_gian_lam;
        }
        $luongcoban = tbl_hopdong::where('id_nhanvien',$luong->tbl_hosonhanvien->id_nhanvien)
                    ->orderBy('id_hopdong','DESC')
                    ->first();     //lương cơ bản   note lai
        $tientangca = ($luongcoban->muc_luong_chinh / 198)* $tongtangca * 1.5;    //Tăng ca nhân 1.5
        $luongnhanduoc = $luong->tong_tien_luong + $thuong - $kyluat - $luong->thue_thu_nhap - $luong->thue_bao_hiem + (($luongcoban->muc_luong_chinh / 198)* $tongtangca * 1.5);  
        return view('layout.luong.chitietLuong',compact('luong','thuong','kyluat','tongtangca','tientangca','luongnhanduoc'));
    }

}
