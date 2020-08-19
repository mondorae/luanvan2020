<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_ykien;
use App\tbl_luuykien;
use App\tbl_tangca;
use App\tbl_phongban;
use App\tbl_hosonhanvien;
use App\tbl_anhykien;
use Auth;
class YKienController extends Controller
{
    public function getDSYKCaNhan(){
        $ykien = tbl_luuykien::where('id_nhanvien',Auth::user()->id_nhanvien)->get();
        return view('layout.ykien.theodoiYK',compact('ykien'));
    }

    public function getChiTietYK($id_luuykien){
        $ykien = tbl_luuykien::find($id_luuykien);
        $nguoilamdon = tbl_hosonhanvien::find($ykien->id_nhanvien);
        $hinhanh=tbl_anhykien::where('id_luuykien',$id_luuykien)->get();
        return view('layout.ykien.chitietYK',compact('ykien', 'nguoilamdon','hinhanh'));    
    }

    // public function getDuyetYK($id){           
    //     $ykien = tbl_luuykien::find($id);
    //     $ykien->trang_thai=1;
    //     $ykien->nguoi_duyet_1= Auth::user()->ho_ten;    
    //     $ykien->save();
    //     return redirect('private/ykien/danhsach')->with('thongbao','Duyệt Thành Công');
    // }

    public function postDuyetYK($id, $id_luuykien, Request $request){           
        if($id == 1){
            $ykien = tbl_luuykien::find($id_luuykien);
            $giolamviec = 9;
            if($ykien->trang_thai == 0){                //trưởng bộ phận duyệt
                $ykien->trang_thai = 1;
                $ykien->nguoi_duyet_1= Auth::user()->tbl_hosonhanvien->ho_ten;
                $ykien->chuc_vu_1 = Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu;
                $ykien->save();
                return redirect('private/ykien/danhsach')->with('thongbao','Duyệt Thành Công');
            }
            if($ykien->trang_thai == 1){                //giám đốc duyệt
                $ykien->trang_thai = 2;
                $ykien->nguoi_duyet_2 = Auth::user()->tbl_hosonhanvien->ho_ten;
                // $ykien->chuc_vu_2 = Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu;  
                
                if($ykien->id_ykien == 9 || $ykien->id_ykien == 10)     //khen thuong & ki luat
                {
                    $ykien->gia_tri == $request->gia_tri;
                    $dexuat = tbl_hosonhanvien::where('ho_ten','like',$request->nguoi_de_xuat)->first();
                    $ykien = tbl_luuykien::find($id_luuykien);
                    $ykien->nguoi_huong = $dexuat->ho_ten;
                    $ykien->chuc_vu_2 = $dexuat->tbl_chucvu->tbl_phongban->ten_phong_ban."-".$dexuat->tbl_chucvu->ten_chuc_vu;
                    $ykien->save();
                }
                if($ykien->id_ykien == 7)                               //Tăng ca 
                {
                    $tangca = tbl_tangca::where('id_nhanvien', $ykien->id_nhanvien)
                        ->where('check_in','like', date('Y-m-d',strtotime($ykien->ngay_bat_dau)).'%')
                        ->first();
                    $tangca->ghi_nhan = 1;
                    $tangca->save();
                }
                if($ykien->id_ykien == 1 || $ykien->id_ykien == 2 || $ykien->id_ykien == 3 || $ykien->id_ykien == 4){
                    $nhanvien = tbl_hosonhanien::find($ykien->id_nhanvien);
                    $bangluon = tbl_bangluong::find($ykien->id_nhanvien);
                    if($ykien->id_ykien == 1){      //nếu xin nghỉ bình thường thì ngày nghỉ phép năm sẽ bị trừ còn nghỉ đặc biệt thì không
                        $nhanvien->ngay_nghi -= $ykien->thoi_gian_nghi;
                    }
                    $bangluong->tong_tien_luong += ($ykien->thoi_gian_nghi*$giolamviec);
                    $bangluong->save();
                    $nhanvien->save();
                }
                if($ykien->id_ykien == 11){          //Nghỉ việc
                    $ykien = tbl_luuykien::find($id_luuykien);   
                    $nhanvien=tbl_hosonhanvien::find($ykien->id_nhanvien);
                    $quyetdinh=new tbl_quyetdinhthoiviec;
                    $quyetdinh->loai = 2;
                    $quyetdinh->noi_dung = $ykien->ly_do;
                    $quyetdinh->ngay_quyet_dinh = date('Y-m-d H:i:s');
                    $quyetdinh->ngay_nghi_viec = $ykien->ngay_bat_dau;
                    $quyetdinh->nguoi_lap_quyet_dinh = Auth::user()->tbl_hosonhanvien->ho_ten;
                    $quyetdinh->id_nhanvien = $ykien->id_nhanvien;
                    $quyetdinh->save();
                }
                $ykien->save();
                return redirect('private/ykien/danhsach')->with('thongbao','Đã Duyệt');
            }  
        }else{
            $ykien = tbl_luuykien::find($id_luuykien);
            $ykien->gia_tri = $request->gia_tri;
            $ykien->ly_do_tu_choi = $request->ly_do_tu_choi;
            if($ykien->trang_thai == 1){        //Giam Doc duyet
                $ykien->nguoi_duyet_2 = Auth::user()->tbl_hosonhanvien->ho_ten;
            }
            else{           //Truong Phong Duyet
                $ykien->nguoi_duyet_1= Auth::user()->tbl_hosonhanvien->ho_ten;
                $ykien->chuc_vu_1 = Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu;
            }
            if($ykien->id_ykien == 7){
                $tangca = tbl_tangca::where('id_nhanvien', $ykien->id_nhanvien)
                        ->where('check_in','like', date('Y-m-d',strtotime($ykien->ngay_bat_dau)).'%')
                        ->first();
                    $tangca->ghi_nhan = -1;
                    $tangca->save();
            }
            $ykien->trang_thai = -1;
            $ykien->save();
            return redirect('private/ykien/danhsach')->with('thongbao','Đã Từ Chối');
        }
        
    }

    public function getThemYK(){
        $loaiykien = tbl_ykien::all();
        $phongban = tbl_phongban::all();
        $chucnang = array();
        foreach($loaiykien as $lyk){
            $strToArr = explode(',',$lyk->chi_tiet);
                for($i=0;$i<count($strToArr);$i++){
                if($strToArr[$i] != null){
                    //echo $strToArr[$i]."sdadas day la i ".$i."</br>";
                    //$chucnang[$j] = $chucnang[$j]." ".$strToArr[$i];
                    if(!isset($chucnang[$strToArr[$i]])){
                        $chucnang[$strToArr[$i]]=" ".$lyk->id_ykien;
                        }else
                            $chucnang[$strToArr[$i]] = $chucnang[$strToArr[$i]]." ".$lyk->id_ykien;
                    }
                }
        }   
        // foreach($thu as $t){
        //     //echo "</br>".$t->chi_tiet;
        //     $array_ne = explode(',',$t->chi_tiet);
        //     for($i=0;$i<count($array_ne);$i++){
        //         // echo "</br>".$array_ne[$i];
        //         if($array_ne[$i] != null){
        //             echo "ý kiến số ".$dem." có nội dung ".$array_ne[$i]."</br>";
        //         }else echo "ý kiến số ".$dem." không có nội dung ".$i."</br>";
        //     }$dem++;
        // }
        return view('layout.ykien.themYK',compact('loaiykien','phongban','chucnang'));
    }

    public function postThemYK(Request $request){
        $user = Auth::user();
        $ykien = new tbl_luuykien;
        // if($request->id_ykien == 1){        //Nghỉ phép
        //     $ykien->id_ykien = $request->id_ykien;
        //     $ykien->ly_do = $request->ly_do; 
        //     $ykien->thoi_gian_nghi = $request->thoi_gian_nghi;
        //     $ykien->ngay_bat_dau = $request->ngay_bat_dau;
        //     $ykien->id_nhanvien = $user->id_nhanvien;
        // }
        if($request->id_ykien == 2){        //Vợ Sinh Con  db 1
            $ykien->id_ykien = $request->id_ykien;
            $ykien->id_nhanvien = $user->id_nhanvien;
            $ykien->ly_do = $request->ly_do; 
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
        }
        else if($request->id_ykien == 3){        //Nghỉ việc riêng db 2
            $ykien->id_ykien = $request->id_ykien;
            $ykien->id_nhanvien = $user->id_nhanvien;
            $ykien->ly_do = $request->ly_do; 
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
            if($request->truong_hop == 1 || $request->truong_hop == 3){          //Kết hôn || Bố đẻ mẹ đẻ, Bố vợ, mẹ vợ hoặc bố chồng, mẹ chồng, vợ, chồng, con chết
                $ykien->thoi_gian_nghi = 3;
            }else if($request->truong_hop == 2) {   //Con kết hôn
                $ykien->thoi_gian_nghi = 1;
            }
            // $ykien->minh_chung = 
        }
        else if($request->id_ykien == 4){        //Bệnh Tật db 3
            $ykien->id_ykien = $request->id_ykien;
            $ykien->id_nhanvien = $user->id_nhanvien;
            $ykien->ly_do = $request->ly_do; 
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
            if($request->truong_hop_benh == 1){      //Bệnh ngắn hạn
                $ykien->thoi_gian_nghi = 30;          //nếu đi làm lại thì phải chỉnh sửa lại
            }else {
                $ykien->thoi_gian_nghi = 180;
            }
            // $ykien->minh_chung = 
        }
        else if($request->id_ykien == 5){        //Ứng lương db 4
            $ykien->id_ykien = $request->id_ykien;
            $ykien->ly_do = $request->ly_do;
            $ykien->gia_tri = $request->gia_tri;    //Xét lương tháng không được quá 50% lương trong tháng
            $ykien->id_nhanvien = $user->id_nhanvien;
        }
        // if($request->id_ykien == 6){        //Tăng lương
        //     $ykien->id_ykien = $request->id_ykien;
        //     $ykien->ly_do = $request->ly_do;
        //     //$ykien->gia_tri = $request->gia_tri;
        //     $ykien->id_nhanvien = $user->id_nhanvien;
        // }
        else if($request->id_ykien == 7){        //Tăng ca db 5
            $ykien->id_ykien = $request->id_ykien;
            $ykien->ly_do = $request->ly_do;
            $ykien->id_nhanvien = $user->id_nhanvien;
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
            //Tạo dữ liệu tăng ca cho nhân viên
            $tangca = new tbl_tangca;
            $tangca->id_nhanvien = $user->id_nhanvien;
            $tangca->check_in = $request->ngay_bat_dau;     //ngày mở form điểm danh
            $tangca->ly_do = $request->ly_do;
            $tangca->save();
        }
        else if($request->id_ykien == 8){        //Chuyển Công tác db 6
            $ykien->id_ykien = $request->id_ykien;
            $ykien->id_chucvu = $request->chuc_vu;
            $ykien->id_phongban = $request->phong_ban;
            $ykien->ly_do = $request->ly_do;
            //chưa có ý tưởng
        }
        // if($request->id_ykien == 9){        //Khen thưởng
        //     $ykien->id_ykien = $request->id_ykien;
        //     $ykien->ly_do = $request->ly_do;
        //     $ykien->nguoi_huong = $request->nguoi_huong;
        //     $ykien->id_nhanvien = $user->id_nhanvien;
        // }
        // if($request->id_ykien == 10){        //Kỉ luật
        //     $ykien->id_ykien = $request->id_ykien;
        //     $ykien->ly_do = $request->ly_do;
        //     $ykien->nguoi_huong = $request->nguoi_huong;
        //     $ykien->id_nhanvien = $user->id_nhanvien;
        // }
        // if($request->id_ykien == 11){        //Khác
        //     $ykien->id_ykien = $request->id_ykien;
        //     $ykien->ly_do = $request->ly_do;
        //     $ykien->id_nhanvien = $user->id_nhanvien;
        // }
        else if($request->id_ykien == 11){      //nghỉ việc db 7
            $ykien->id_ykien = $request->id_ykien;
            $ykien->ly_do = $request->ly_do;
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
        }
        else{
            $ykien->id_ykien = $request->id_ykien;
            $ykien->nguoi_huong = $request->nguoi_huong;
            $ykien->ly_do = $request->id_ykien;
            $ykien->gia_tri = $request->gia_tri;
            $ykien->thoi_gian_nghi = $request->thoi_gian_nghi;
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
            $ykien->id_nhanvien=$user->id_nhanvien;
            $ykien->nop_minh_chung = $request->nop_minh_chung; //Nộp minh chứng bổ sung sau
        }
        $ykien->save();
        return redirect('private/ykien/them')->with('thongbao','Đã Gửi Ý Kiến');
        // $ykien->id_ykien = $request->id_ykien;
        // $ykien->ly_do = $request->ly_do;
        // $ykien->id_nhanvien = $user->id_nhanvien;
        // $ykien->nguoi_dua_y_kien = $user->tbl_hosonhanvien->ho_ten;
        // $ykien->save();
        // return redirect('private/ykien/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSuaYK($id_luuykien){
        $ykien = tbl_luuykien::find($id_luuykien);
        return view('layout.ykien.suaYK',compact('ykien'));
    }

    public function postSuaYK(Request $request, $id_luuykien){  //Chỉ sửa các ý kiến phải bổ sung còn lại thì không được sửa
        $ykien = tbl_luuykien::find($id_luuykien);
        $ykien->ly_do = $request->ly_do;
        if($ykien->id_ykien == 2){
            if($request->truong_hop == 1){              //Sinh Thường 1 con                                  Đống trường hợp này bổ sung sau khi sinh đẻ => cập nhật sau cùng bằng chứng
                $ykien->thoi_gian_nghi = 5;
            }
            else if($request->truong_hop == 2){         //Phải phẫu thuật hoặc sinh con dưới 32 tuần tuổi
                $ykien->thoi_gian_nghi = 7;
            }
            else if($request->truong_hop == 3){         //Sinh đôi
                $ykien->thoi_gian_nghi = 10;
            }
            else if($request->truong_hop == 4){         //Sinh ba
                $ykien->thoi_gian_nghi = 11;
            }
            else if($request->truong_hop == 5){         //Sinh tư
                $ykien->thoi_gian_nghi = 12;
            }
            else if($request->truong_hop == 6){         //Sinh năm trở lên
                $ykien->thoi_gian_nghi = 13;
            }
            else if($request->truong_hop == 7){         //Sinh đôi phải phẫu thuật
                $ykien->thoi_gian_nghi = 14;
            }
            //$ykien->thoi_gian_nghi = $request->thoi_gian_nghi_them;
            $ykien->truong_hop = $request->truong_hop;  //thuộc loại nào
            //$ykien->minh_chung = $request->minh_chung; //nay la upload bo sung files 
        }
        else if($ykien->id_ykien == 3){             //Loại nghỉ nào
            //$ykien->truong_hop = $request->truong_hop;
            $ykien->ngay_bat_dau = $request->ngay_bat_dau;
        }
       // $ykien->updated_at = $ykien->created_at;
        $ykien->save();
        return redirect('private/ykien/danhsach/theodoi')->with('thongbao','Sửa Thành Công');
    }

    public function getXoaYK($id_luuykien){
        $ykien=tbl_luuykien::find($id_luuykien);
        if($ykien->id_ykien == 7){
            $tangca = tbl_tangca::where('id_nhanvien', $ykien->id_nhanvien)
                        ->where('check_in','like', date('Y-m-d',strtotime($ykien->ngay_bat_dau)).'%')
                        ->first();
            $chamcong = tbl_chamcong::where('id_tangca',$tangca->id_tangca)->first();
            $chamcong->id_tangca = null;
            $chamcong->save();
            $tangca->delete();   
        }
        $ykien->delete();
        return redirect('private/ykien/danhsach')->with('thongbao','Xóa Thành Công');
    }



    public function testtime(){
        // $thu = tbl_ykien::all();
        // $dem = 0;
        // foreach($thu as $t){
        //     //echo "</br>".$t->chi_tiet;
        //     $array_ne = explode(',',$t->chi_tiet);
        //     for($i=0;$i<count($array_ne);$i++){
        //         // echo "</br>".$array_ne[$i];
        //         if($array_ne[$i] != null){
        //             echo "ý kiến số ".$dem." có nội dung ".$array_ne[$i]."</br>";
        //         }else echo "ý kiến số ".$dem." không có nội dung ".$i."</br>";
        //     }$dem++;
        // }
        // $test = getMACAddr();
        // echo $test;
        // echo "cho Dat";
        //echo "day la ngay ".date("Y-m-d H:i:s");
        //$ngay = tbl_ykien::find(8);
        //echo date('d-m-Y', strtotime("1998-06-20"));
        // $time = getdate();
        // print_r($time);
        // $ykien=tbl_luuykien::find(5);
        // $timestamp = strtotime($ykien->created_at);
        //echo date("m-d-Y", $timestamp);
        // $result = time()-strtotime($ykien->created_at);
        // echo "time:".time();
        // echo "strtotime: ".strtotime($ykien->created_at)."\n";
        //date("H:i:s","19:00:05");
        // $num1 = strtotime("19:30:00"); echo "soo 1".$num1;
        // $num2 = strtotime("20:30:00"); echo "so 2".$num2;
        // $result = time() - $num1;
        // time();
        // echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$result/60;
        // echo "gio hien tai: ".date('H:i:s');
        // echo "gio theo time()".time();exit; 
        // echo "...........................".$times."....................................";
        // echo strtotime($ykien->updated_at);
        // echo ( strtotime($ykien->updated_at) - strtotime($ykien->created_at) ) / 60;
        //echo date('h-m-s',$ykien);
        // if($ykien->trangthai == 0 && ((($times-strtotime($ykien->create_ad))/60)<30))
        // {
        //     echo "chưa lố";
        // }
        // else echo "lố rồi brpp"
        //;
        // $luuykien = tbl_luuykien::where('id_nhanvien', Auth::user()->id_nhanvien)
        // ->whereMonth('ngay_bat_dau',date('m'))
        // ->where('trang_thai',1)
        // ->where(function($q){
        //     $q->where('id_ykien',9)
        //     ->orwhere('id_ykien',10)
        //     ->orwhere('id_ykien',5);
        // })        
        // ->get();
        // foreach($luuykien as $lyk)
        // {
        //     echo "</br> Mã Nhân viên:".$lyk->id_nhanvien;
        //     echo "</br> Trạng Thái:".$lyk->trang_thai;
        //     echo "</br> Loại ý kiến:".$lyk->tbl_ykien->loai_y_kien;
        // }
        // $ykien = tbl_luuykien::find(34);
        // $tangca = tbl_tangca::where('id_nhanvien', $ykien->id_nhanvien)
        //                 ->where('check_in','like', date('Y-m-d',strtotime($ykien->ngay_bat_dau)).'%')
        //                 ->first(); var_dump($tangca);
        //     echo date('Y-m-d',strtotime($ykien->ngay_bat_dau));
        //     echo $ykien->id_nhanvien;
    }
    //     $phongban ="DVC99";
    //     if($phongban[strlen($phongban)-1]<9)
    //         $phongban[strlen($phongban)-1] = $phongban[strlen($phongban)-1]+1;
    //     else {
    //         if($phongban[strlen($phongban)-2]<9){
    //             $phongban[strlen($phongban)-2] = $phongban[strlen($phongban)-2]+1;
    //             $phongban[strlen($phongban)-1]=0; 
    //         }
    //         else{
    //             $phongban[strlen($phongban)-3] = $phongban[strlen($phongban)-3] + 1;
    //             $phongban[strlen($phongban)-2]=0;
    //             $phongban[strlen($phongban)-1]=0; 
    //         }
    //     }
    //      echo $phongban;
    // }
}
