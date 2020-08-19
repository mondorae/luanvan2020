<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\tbl_dantoc;
use App\tbl_tinh;
use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_hosonhanvien;
use App\tbl_vitri;
use App\tbl_lienhe;
use App\tbl_trinhdo;
use App\User;
use App\tbl_hopdong;
use App\tbl_loaihopdong;
use App\tbl_luuykien;
use App\tbl_hoso;
use App\tbl_phucap;
use App\tbl_phuluc;
use App\tbl_giadinh;
use App\tbl_loaiphuluc;
use App\tbl_chitietphuluc;
use App\tbl_quyetdinhthoiviec;
use PDF;

class QLNhansuController extends Controller
{


     public function getThemnhanvien(){
        $dantoc=tbl_dantoc::all();
        $tinh=tbl_tinh::all();
        $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::all();
        $ds_ho_so = tbl_hoso::all();
        return view('quanlynhansu.laphosoNV',['dantoc'=>$dantoc,'tinh'=>$tinh,'phongban'=>$phongban,'chucvu'=>$chucvu,'ds_ho_so'=>$ds_ho_so]);
        
    }
    public function postThemnhanvien(Request $request){
        $demhoso=tbl_hosonhanvien::latest()->first();
        
        $arrName = explode(".", $demhoso->id_nhanvien);      
        $so = array_pop($arrName)+1;
        
        $hosonhanvien= new tbl_hosonhanvien;
        
        $hosonhanvien->ho_ten=$request->ho_ten;
        $hosonhanvien->ngay_sinh=$request->ngay_sinh;
        $hosonhanvien->gioi_tinh=$request->gioi_tinh;
        
        $hosonhanvien->id_dantoc=$request->dan_toc;
        $hosonhanvien->ton_giao=$request->ton_giao;
        $hosonhanvien->so_cmnd=$request->so_cmnd;
        $hosonhanvien->ngay_cap_cmnd=$request->ngay_cap_cmnd;
        $hosonhanvien->noi_cap_cmnd=$request->noi_cap_cmnd;
        if( $hosonhanvien->gioi_tinh==1){
        $hosonhanvien->anh_dai_dien="usermen.jpg";
        }
        if( $hosonhanvien->gioi_tinh==0){
            $hosonhanvien->anh_dai_dien="usergirl.jpg";
            }
        
        $hosonhanvien->id_hoso=implode(",",$request->hoso);
        $hosonhanvien->tinh_trang=1;
        $hosonhanvien->id_chucvu=$request->chuc_vu;


        $hoten=changeTitle($request->ho_ten);
        
        $arrName = explode("-", $hoten);
        $ten = array_pop($arrName);
        $tenhoa=ucfirst(strtolower($ten));
        $hosonhanvien->id_nhanvien=$hosonhanvien->id_chucvu.'.'.$tenhoa.'.'.$so;
        $hosonhanvien->save();  
        
        
        $lienhe= new tbl_lienhe;
        $lienhe->sdt_ca_nhan=$request->sdt_ca_nhan;
        $lienhe->sdt_nha=$request->sdt_nha;
        $lienhe->email=$request->emailcanhan;
        
        $lienhe->dia_chi_thuong_tru=$request->dia_chi_thuong_tru;
        $lienhe->id_tinh_thuong_tru=$request->tinh_thuong_tru;
        $lienhe->dia_chi_tam_tru=$request->dia_chi_tam_tru;
        $lienhe->id_tinh_tam_tru=$request->tinh_tam_tru;
        $lienhe->id_nhanvien=$hosonhanvien->id_nhanvien;

        $trinhdo=new tbl_trinhdo;
        $trinhdo->muc_trinh_do=$request->muc_trinh_do;
        $trinhdo->noi_dao_tao=$request->noi_dao_tao;
        $trinhdo->nganh_dao_tao=$request->nganh_dao_tao;
        $trinhdo->chuyen_nganh=$request->chuyen_nganh;
        $trinhdo->nam_tot_nghiep=$request->nam_tot_nghiep;
        $trinhdo->xep_loai=$request->xep_loai;
        $trinhdo->chung_chi_khac=$request->chung_chi_khac;
        $trinhdo->id_nhanvien=$hosonhanvien->id_nhanvien;


        $user= new User;
        $user->name=$request->name;
        $user->email=$hosonhanvien->id_nhanvien."@cty.com.vn";
        $pass=str_random(6);
        $user->password=bcrypt($pass);
        $user->id_nhanvien=$hosonhanvien->id_nhanvien;
        $user->save();

        $trinhdo->save();

        $lienhe->save();
        $data=array(
            'email' => $user->email,
            'password'=> $pass,
        );
        
        Mail::to($request->emailcanhan)->send(new SendMail($data));


        
        return redirect('private/laphopdong/'.$hosonhanvien->id_nhanvien)->with('thongbao','Bạn lập hố sơ thông tin nhân viên thành công, xin tiếp tục với lập hợp đồng lao động');
    
   
    }
    public function getHoSoNhanVien($id_nhanvien){
        $ds_ho_so = tbl_hoso::all();
        // $user = User::find($id);
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $giadinh=tbl_giadinh::where('id_nhanvien',$id_nhanvien)->first();
        
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $hopdong=tbl_hopdong::where([['id_nhanvien',$id_nhanvien],['trang_thai','1']])->first();
        if($hopdong==null){
            return redirect('private/laphopdong/'.$id_nhanvien)->with('thongbao','Hồ sơ nhân viên chưa có hợp đồng, xin tiếp tục với lập hợp đồng lao động');
        }
        
        $phuluc=tbl_phuluc::where([['id_hopdong',$hopdong->id_hopdong],['id_loaiphuluc','2']])->first();
        if(isset($phuluc)){
            return view('quanlynhansu.hosonhanvien',['nhanvien'=>$nhanvien,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'giadinh'=>$giadinh,'ds_ho_so'=>$ds_ho_so,'user'=>$user,'phuluc'=>$phuluc]);
        
        }
        return view('quanlynhansu.hosonhanvien',['nhanvien'=>$nhanvien,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'giadinh'=>$giadinh,'ds_ho_so'=>$ds_ho_so,'user'=>$user]);
    }
    public function getSuaHoSoNhanVien($id_nhanvien){
        $ds_ho_so = tbl_hoso::all();
        $dantoc=tbl_dantoc::all();
        $tinh=tbl_tinh::all();
        $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::all();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $giadinh=tbl_giadinh::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->get();

        return view('quanlynhansu.suahosoNV',['nhanvien'=>$nhanvien,'ds_ho_so'=>$ds_ho_so,'dantoc'=>$dantoc,'tinh'=>$tinh,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'giadinh'=>$giadinh,'phongban'=>$phongban,'chucvu'=>$chucvu,'user'=>$user]);
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
        $nhanvien->id_hoso=implode(",",$request->hoso);
        
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
        $nhanvien->id_chucvu=$request->chuc_vu;


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
            $giadinh->email=$request->email;
            $giadinh->save();
        }
        elseif($request->ten_nguoi_than!=null){
            $giadinh=new tbl_giadinh;
            $giadinh->ten_nguoi_than=$request->ten_nguoi_than;
            $giadinh->cong_viec=$request->cong_viec;
            $giadinh->sdt_di_dong=$request->sdt_di_dong;
            $giadinh->moi_quan_he=$request->moi_quan_he;
            $giadinh->dia_chi=$request->dia_chi;
            $giadinh->email=$request->email;
            $giadinh->id_nhanvien=$nhanvien->id_nhanvien;
            $giadinh->save();
        }
        
        
        $user->name=$request->name;
        
        $user->email=$request->email;
        $user->password=bcrypt($request->password);


        $user->save();

        $trinhdo->save();

        $lienhe->save();
        return redirect('private/quanly/thongtin/'.$id_nhanvien)->with('thongbao','Sửa thông tin thành công');

    }

    public function getXoaNhanvien($id_nhanvien){
        try{
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $giadinh=tbl_giadinh::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        $hopdong=tbl_hopdong::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        
        
        foreach($hopdong as $hd){
            $phuluc=tbl_phuluc::where('id_hopdong',$hd->id_hopdong)->get();
            
            
            
        if($phuluc!=null){
            foreach($phuluc as $pl){
                
                $chitiet=tbl_chitietphuluc::where('id',$pl->id_chitiet)->first();
                
                
                $deletephuluc=tbl_phuluc::where('id_phuluc',$pl->id_phuluc)->first();
                
                $chitiet->delete();
                $deletephuluc->delete();
            }
        }
        
        $deletehopdong=tbl_hopdong::where('id_hopdong',$hd->id_hopdong)->first();


        $deletehopdong->delete();
        
        
        }
       
        $user->delete();
        $trinhdo->delete();
        $lienhe->delete();
        if(isset($giadinh)){
        $giadinh->delete();
        }

        $nhanvien->delete();
        return redirect('private/nhanvien/danhsach')->with('thongbao','Xóa Thành Công!');
    }
        catch (Exception $e) {
            echo "Message: " . $e->getMessage();
            
        }
    }

    public function getLaphopdong($id_nhanvien){
        
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $loaihd=tbl_loaihopdong::all();
        $hopdong=tbl_hopdong::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        // $demphuluc=tbl_phuluc::count()+1;
        // $price =tbl_hopdong::where('id_loaihopdong',1)->count();
        // var_dump($price);
        // exit;
        $phucap=tbl_phucap::where('id_chucvu',$nhanvien->id_chucvu)->first();
        return view('quanlynhansu.laphopdongNV',['nhanvien'=>$nhanvien,'hopdong'=>$hopdong,'phucap'=>$phucap,'loaihd'=>$loaihd]);
    }
    public function postLaphopdong(Request $request,$id_nhanvien){
        $demhopdong=tbl_hopdong::latest()->first();
        
        $arrName = explode("-", $demhopdong->id_hopdong);    
        
        $so = $arrName[0]+1;
       
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $hopdong=tbl_hopdong::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        foreach($hopdong as $hopdong){
            if(isset($hopdong)){
            $hopdong->trang_thai=0;
             $hopdong->save();
        }
        
    }

        $phucap=tbl_phucap::where('id_chucvu',$nhanvien->id_chucvu)->first();
        $hopdong=new tbl_hopdong;
        $hopdong->id_hopdong=$so .'-HDLD-ABC';
        $hopdong->id_loaihopdong=$request->ten_hop_dong;
        $hopdong->ngay_bat_dau_hop_dong=$request->ngay_bat_dau_hop_dong;
        $hopdong->muc_luong_chinh=$request->muc_luong_chinh;
        $hopdong->id_phucap=$phucap->id;
        $hopdong->phu_cap=$phucap->tong_tien_phu_cap;
        $hopdong->ngay_ket_thuc_hop_dong=$request->ngay_ket_thuc_hop_dong;
        $hopdong->trang_thai=1;
        $hopdong->id_nhanvien=$nhanvien->id_nhanvien;
        $hopdong->nguoi_laphd=Auth::user()->tbl_hosonhanvien->ho_ten;
        $hopdong->save();
        return redirect('private/hopdong/nhanvien/'.$id_nhanvien)->with('thongbao','Lập hợp đồng thành công!!');

    }



    public function getPDFhopdong($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $lienhequanly=Auth::user()->tbl_hosonhanvien->id_nhanvien;
        $lienheql=tbl_lienhe::where('id_nhanvien',$lienhequanly)->first();
        $lienheql->id_tinh_thuong_tru;
        $lienhenv=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        $lienhenv->id_tinh_thuong_tru;

        
        
        $data['nhanvien']=$nhanvien;
        $data['hopdong']=$hopdong;
        $data['lienheql']=$lienheql;
        $data['lienhenv']=$lienhenv;
        
        
        $pdf = PDF::loadView('quanlynhansu.pdfhopdong', $data);
        return $pdf->stream('hopdongNV.pdf');
        
    }
    
    public function getChitiethopdong($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $phuluc1=tbl_phuluc::where('id_hopdong',$id_hopdong)->first();
        if(isset($phuluc1)){
        $phuluc=tbl_phuluc::where('id_loaiphuluc',$phuluc1->id_loaiphuluc)->first();
        
        // dd($phuluc);
        return view('quanlynhansu.chitiethopdongNV',['hopdong'=>$hopdong,'phuluc'=>$phuluc]);
        }
        else
        
        return view('quanlynhansu.chitiethopdongNV',['hopdong'=>$hopdong]);

    }

    public function getPhulucNV($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();

        
        $phuluc=tbl_phuluc::where('id_hopdong',$id_hopdong)->get();   
        return view('quanlynhansu.phulucNV',['hopdong'=>$hopdong,'phuluc'=>$phuluc]);
    }
    public function getchitietPhulucNV($id_hopdong,$id_phuluc){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $phuluc=tbl_phuluc::where('id_phuluc',$id_phuluc)->first();
        $chitiet=tbl_chitietphuluc::where('id',$phuluc->id_chitiet)->first();
        
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        return view('quanlynhansu.chitietphulucNV',['hopdong'=>$hopdong,'phuluc'=>$phuluc,'chitiet'=>$chitiet,'nhanvien'=>$nhanvien]);
    }
    public function getlapPhulucNV($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $phuluc=tbl_phuluc::where('id_hopdong',$id_hopdong)->get();
        $loaipl=tbl_loaiphuluc::all();
        $loaihd=tbl_loaihopdong::all();
        $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::all();
        $phucap=tbl_phucap::all();
        return view('quanlynhansu.lapphulucNV',['hopdong'=>$hopdong,'loaipl'=>$loaipl,'nhanvien'=>$nhanvien,'phongban'=>$phongban,'chucvu'=>$chucvu,'phucap'=>$phucap,'loaihd'=>$loaihd]);
        
    }
    public function postlapPhulucNV(Request $request, $id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $demphuluc=tbl_phuluc::count()+1;
        $phuluc=new tbl_phuluc;
        $phuluc->id_phuluc=$demphuluc.'_HĐLĐ-ABC';
        $phuluc->id_hopdong=$id_hopdong;
        $phuluc->nguoi_lap_phu_luc=Auth::user()->tbl_hosonhanvien->ho_ten;
        $phuluc->id_loaiphuluc=$request->ten_hop_dong;
        
        $chitiet=new tbl_chitietphuluc;
        $chitiet->noi_dung_khac=$request->noi_dung_khac;
        $chitiet->thay_doi_luong=$request->thay_doi_luong;
        $chitiet->id_chucvu_moi=$request->chuc_vu_moi;
        
        $phucap=tbl_phucap::where('id_chucvu',$chitiet->id_chucvu_moi)->first();
        if(isset($phucap)){
        $chitiet->id_phucap_moi=$phucap->id;
        }
        else
        $chitiet->id_phucap_moi=null;
        $chitiet->id_loaihopdong_moi=$request->hop_dong_moi;
        $chitiet->ngay_bat_dau=$request->ngay_bat_dau;
        if(isset($request->ngay_ket_thuc)){
        $chitiet->ngay_ket_thuc=$request->ngay_ket_thuc;
        }
        else{
        $chitiet->ngay_ket_thuc=$hopdong->ngay_ket_thuc_hop_dong;
        }
        $chitiet->id_hopdong=$id_hopdong;
        $chitiet->save();
        $phuluc->id_chitiet=$chitiet->id;
        $phuluc->save();
        return redirect('private/chitietphuluc/'.$id_hopdong.'/'.$phuluc->id_phuluc)->with('thongbao','Thêm Thành Công');
        
    }
    public function getPDFphuluc($id_phuluc){
        $phuluc=tbl_phuluc::where('id_phuluc',$id_phuluc)->first();
        $chitiet=tbl_chitietphuluc::where('id',$phuluc->id_chitiet)->first();
        $hopdong=tbl_hopdong::where('id_hopdong',$phuluc->id_hopdong)->first();


        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $lienhequanly=Auth::user()->tbl_hosonhanvien->id_nhanvien;
        $lienheql=tbl_lienhe::where('id_nhanvien',$lienhequanly)->first();
        $lienheql->id_tinh_thuong_tru;
        $lienhenv=tbl_lienhe::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $lienhenv->id_tinh_thuong_tru;

        
        
        
        
        
        
        $data['lienheql']=$lienheql;
        $data['lienhenv']=$lienhenv;
        $data['nhanvien']=$nhanvien;
        $data['hopdong']=$hopdong;
        $data['phuluc']=$phuluc;
        $data['chitiet']=$chitiet;
        $pdf = PDF::loadView('quanlynhansu.pdfphuluc', $data);
        return $pdf->stream('phulucNV.pdf');
    }
    

    public function getDSquyetdinh(){
        $quyetdinh=tbl_quyetdinhthoiviec::all();
        return view('quanlynhansu.danhsachquyetdinh',['quyetdinh'=>$quyetdinh]);
    }

   




    public function  getThoiviec(){
        $nhanvien=tbl_hosonhanvien::where('tinh_trang',1)->get();
        return view('quanlynhansu.quyetdinhthoiviec',['nhanvien'=>$nhanvien]);
    }
    public function  getThoiviecNV($id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        return view('quanlynhansu.quyetdinhthoiviecNV',['nhanvien'=>$nhanvien]);
    }
    public function  postThoiviecNV(Request $request,$id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $user = Auth::user();
        $quyetdinh=new tbl_quyetdinhthoiviec;
        $quyetdinh->noi_dung=$request->noi_dung;
        $quyetdinh->ngay_quyet_dinh=$request->ngay_quyet_dinh;
        $quyetdinh->ngay_nghi_viec=$request->ngay_nghi_viec;
        $quyetdinh->loai=1;
        $quyetdinh->nguoi_lap_quyet_dinh=$user->tbl_hosonhanvien->ho_ten;
        $quyetdinh->id_nhanvien=$id_nhanvien;
        $quyetdinh->save();
        return redirect('private/quyetdinh/pdf/'.$id_nhanvien);
    }
    public function getPDFquyetdinh($id_nhanvien){
        $quyetdinh=tbl_quyetdinhthoiviec::where('id_nhanvien',$id_nhanvien)->first();

        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $data['quyetdinh']=$quyetdinh;
        $data['nhanvien']=$nhanvien;
        $pdf = PDF::loadView('quanlynhansu.pdfquyetdinh', $data);
        return $pdf->stream('quyetdinhNV.pdf');

    }
    public function getquyetdinh($id_nhanvien){
        $quyetdinh=tbl_quyetdinhthoiviec::where('id_nhanvien',$id_nhanvien)->first();
        $quyetdinh->delete();
        $nv_tinhtrang=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        
        $nv_tinhtrang->tinh_trang=2;
        $taikhoan=User::where('id_nhanvien',$id_nhanvien)->first();
        $taikhoan->quyen=0;
        $taikhoan->save();
        $nv_tinhtrang->save();
        return redirect('private/nhanvien/2');
    }
    public function huyquyetdinh($id_nhanvien){
        $quyetdinh=tbl_quyetdinhthoiviec::where('id_nhanvien',$id_nhanvien)->first();
        $quyetdinh->delete();
        
        return redirect('private/danhsachquyetdinh');
    }
}
