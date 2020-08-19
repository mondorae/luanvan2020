<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\tbl_hosonhanvien;
use App\tbl_hopdong;
use App\tbl_giadinh;
use App\tbl_baohiem;
use App\tbl_lienhe;
use App\tbl_tinh;
use App\tbl_trinhdo;
use App\user;
use App\tbl_dantoc;
use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_vitri;
use App\tbl_hoso;
use App\tbl_phuluc;
use App\tbl_chitietphuluc;

class NhanVienController extends Controller
{
    public function getview(){ 
        
        $tongnhanvien=tbl_hosonhanvien::count();
        $nhanviennam =tbl_hosonhanvien::where('gioi_tinh',1)->count();
        $nhanviennu =tbl_hosonhanvien::where('gioi_tinh',0)->count();
        return view('layout.content',['tongnhanvien'=>$tongnhanvien,'nhanviennam'=>$nhanviennam,'nhanviennu'=>$nhanviennu]);
        
    }
    

    public function getDangnhap(){
    	return view('login');
    }
    public function postDangnhap(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('private');
        }
        else{
            return redirect('login')->with('thongbao','Tài khoảng hoặc mật khẩu không đúng, vui lòng đăng nhập lại');
        }
    }
    public function getHoSoNhanVien($id_nhanvien){
        $ds_ho_so = tbl_hoso::all();
        // $user = User::find($id);
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $giadinh=tbl_giadinh::where('id_nhanvien',$id_nhanvien)->first();
        
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $hopdong=tbl_hopdong::where([['id_nhanvien',Auth::user()->id_nhanvien],['trang_thai','1']])->first();
        $phuluc=tbl_phuluc::where([['id_hopdong',$hopdong->id_hopdong],['id_loaiphuluc','2']])->first();
        if(isset($phuluc)){
            return view('pages.hosonhanvien',['nhanvien'=>$nhanvien,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'giadinh'=>$giadinh,'ds_ho_so'=>$ds_ho_so,'user'=>$user,'phuluc'=>$phuluc]);
        
        }
        return view('pages.hosonhanvien',['nhanvien'=>$nhanvien,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'giadinh'=>$giadinh,'ds_ho_so'=>$ds_ho_so,'user'=>$user]);
    }

    public function getSuaHoSoNhanVien($id_nhanvien){
        $ds_ho_so = tbl_hoso::all();
        $dantoc=tbl_dantoc::all();
        $tinh=tbl_tinh::all();
        $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::all();
        $vitri=tbl_vitri::all();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $giadinh=tbl_giadinh::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->get();

        return view('pages.suahoso',['nhanvien'=>$nhanvien,'ds_ho_so'=>$ds_ho_so,'dantoc'=>$dantoc,'tinh'=>$tinh,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'giadinh'=>$giadinh,'phongban'=>$phongban,'chucvu'=>$chucvu,'vitri'=>$vitri,'user'=>$user]);
    }
    
    public function postSuaHoSoNhanVien(Request $request,$id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        
        $giadinh=tbl_giadinh::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->first();        
        

        $nhanvien->ngay_sinh=$request->ngay_sinh;
        $nhanvien->gioi_tinh=$request->gioi_tinh;
        $nhanvien->id_dantoc=$request->dan_toc;
        $nhanvien->ton_giao=$request->ton_giao;
        $nhanvien->so_cmnd=$request->so_cmnd;
        $nhanvien->ngay_cap_cmnd=$request->ngay_cap_cmnd;
        $nhanvien->noi_cap_cmnd=$request->noi_cap_cmnd;
        
        if($request->hasFile('Hinh')){

            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/arvarta/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/arvarta",$Hinh);
            $nhanvien->anh_dai_dien=$Hinh;
        }

        
        $nhanvien->save();
        
 
        
        $lienhe->sdt_ca_nhan=$request->sdt_ca_nhan;
        $lienhe->sdt_nha=$request->sdt_nha;
        $lienhe->email=$request->email_ca_nhan;
       
        // $lienhe->email_cong_ty=$request->email_cong_ty;
        $lienhe->dia_chi_thuong_tru=$request->dia_chi_thuong_tru;
        $lienhe->id_tinh_thuong_tru=$request->tinh_thuong_tru;
        $lienhe->dia_chi_tam_tru=$request->dia_chi_tam_tru;
        $lienhe->id_tinh_tam_tru=$request->tinh_tam_tru;

        $trinhdo->muc_trinh_do=$request->muc_trinh_do;
        $trinhdo->noi_dao_tao=$request->noi_dao_tao;
        $trinhdo->nganh_dao_tao=$request->nganh_dao_tao;
        $trinhdo->chuyen_nganh=$request->chuyen_nganh;
        $trinhdo->nam_tot_nghiep=$request->nam_tot_nghiep;
        $trinhdo->xep_loai=$request->xep_loai;
        $trinhdo->chung_chi_khac=$request->chung_chi_khac;
        
        if(isset($giadinh)){
            $giadinh->ten_nguoi_than=$request->ten_nguoi_than;
            $giadinh->cong_viec=$request->cong_viec;
            $giadinh->sdt_di_dong=$request->sdt_di_dong;
            $giadinh->moi_quan_he=$request->moi_quan_he;
            $giadinh->dia_chi=$request->dia_chi;
            $giadinh->email=$request->emailnguoithan;
            $giadinh->save();
        }
        elseif($request->ten_nguoi_than!=null){
            $giadinh=new tbl_giadinh;
            $giadinh->ten_nguoi_than=$request->ten_nguoi_than;
            $giadinh->cong_viec=$request->cong_viec;
            $giadinh->sdt_di_dong=$request->sdt_di_dong;
            $giadinh->moi_quan_he=$request->moi_quan_he;
            $giadinh->dia_chi=$request->dia_chi;
            $giadinh->email=$request->emailnguoithan;
            $giadinh->id_nhanvien=$nhanvien->id_nhanvien;
            $giadinh->save();
        }
        
        
        $user->name=$request->name;
        
        $user->email=$request->email;
        $user->password=bcrypt($request->password);


        $user->save();

        $trinhdo->save();

        $lienhe->save();
        return redirect('private/thongtin/'.$id_nhanvien);

    }
    public function getDangXuatAdmin(){
        Auth::logout();
         return redirect('login');
    }

    public function getHopDongNhanVien($id){
        $hopdong=tbl_hopdong::where('id_nhanvien','=',$id)->get();
            return view('pages.hopdong',['hopdong'=>$hopdong]);
    }

    // public function getGiaDinh($id){
    //     $giadinh=tbl_giadinh::where('id_nhanvien','=',$id)->get();
    //     return view('pages.giadinh',['giadinh'=>$giadinh]);
    // }

    // public function getBaoHiem($id){
    //     $baohiem=tbl_baohiem::where('id_nhanvien','=',$id)->get();
    //     return view('pages.baohiem',['baohiem'=>$baohiem]);
    // }
}
