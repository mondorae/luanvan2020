<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_thongtingioithieu;
use App\tbl_linhvuckinhdoanh;
use App\tbl_thongtinchinh;
use Auth;

class ThongtinController extends Controller
{

    // function __construct(){
        
    //     $thongtinchinh=tbl_thongtinchinh::first();
    //         view()->share('thongtinchinh',$thongtinchinh);
        
    // }
    //gioithieuchung
    public function getDanhSachGioiThieu(){
        
    	$thongtingioithieu=tbl_thongtingioithieu::all();
        return view('quanlythongtin.dsgioithieu',['thongtingioithieu'=>$thongtingioithieu]);
    }
    public function getThemgioithieu(){
       return view('quanlythongtin.themgioithieu');

    }
    public function postThemgioithieu(Request $request){
    	$this->validate($request,
            ['Ten'=>'required','NoiDung'=>'required',
            ],
            ['Ten.required'=>'Bạn chưa nhập tên!!',
                'NoiDung.required'=>'Bạn chưa nhập nội dung!!'
            ]);
        $thongtingioithieu= new tbl_thongtingioithieu;
        $thongtingioithieu->Ten=$request->Ten;
        $thongtingioithieu->NoiDung=$request->NoiDung;

        if($request->hasFile('Hinh')){
        
            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=$name;
            while (file_exists("upload/gioithieu/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/gioithieu",$Hinh);
            $thongtingioithieu->Hinh=$Hinh;
        }
        else{
            $thongtingioithieu->Hinh="";
        }
        $thongtingioithieu->save();
        return redirect('private/thongtin/danhsachgioithieu')->with('thongbao','Thêm thành công');
    }


    public function getSuagioithieu($id){
        $thongtingioithieu=tbl_thongtingioithieu::find($id);
         return view('quanlythongtin.suagioithieu',['thongtingioithieu'=>$thongtingioithieu]);
    	
    }
    public function postSuagioithieu(Request $request,$id){
    	$this->validate($request,
            ['Ten'=>'required','NoiDung'=>'required',
            ],
            ['Ten.required'=>'Bạn chưa nhập tên!!',
                'NoiDung.required'=>'Bạn chưa nhập nội dung!!'
            ]);
        $thongtingioithieu= tbl_thongtingioithieu::find($id);
        $thongtingioithieu->Ten=$request->Ten;
        $thongtingioithieu->NoiDung=$request->NoiDung;


        if($request->hasFile('Hinh')){

            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=$name;
            while (file_exists("upload/gioithieu/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/gioithieu",$Hinh);
            if(isset($thongtingioithieu->Hinh)){
            unlink("upload/gioithieu/".$thongtingioithieu->Hinh);
            }
            $thongtingioithieu->Hinh=$Hinh;
        }


        $thongtingioithieu->save();
        return redirect('private/thongtin/gioithieu/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoagioithieu($id){
    	$thongtingioithieu=tbl_thongtingioithieu::find($id);
        $thongtingioithieu->delete();
        return redirect('private/thongtin/danhsachgioithieu')->with('thongbao','Xóa thành công');
    }   





    



    public function getCongty(){
        $thongtinchinh=tbl_thongtinchinh::first();
        
        return view('quanlythongtin.thongtinchinh',['thongtinchinh'=>$thongtinchinh]);
    }


    public function getSuaCongty(){
        $thongtinchinh=tbl_thongtinchinh::first();
        
        return view('quanlythongtin.suathongtinchinh',['thongtinchinh'=>$thongtinchinh]);
    }



    public function postSuaCongty(Request $request){
        $thongtinchinh= tbl_thongtinchinh::first();
        
        $thongtinchinh->ten_cong_ty=$request->ten_cong_ty;
        $thongtinchinh->dia_chi=$request->dia_chi;
        $thongtinchinh->sdt=$request->sdt;
        $thongtinchinh->Fax=$request->Fax;
        $thongtinchinh->website=$request->website;
        $thongtinchinh->nguoi_dai_dien=$request->nguoi_dai_dien;
        $thongtinchinh->chuc_vu=$request->chuc_vu;
        $thongtinchinh->mail=$request->mail;


        if($request->hasFile('Hinh')){

            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=$name;
            while (file_exists("upload/logo/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/logo",$Hinh);
            if(isset($thongtinchinh->Hinh)){
                unlink("upload/logo/".$thongtinchinh->Hinh);
                }
            $thongtinchinh->Hinh=$Hinh;
        }

        
        $thongtinchinh->save();
        return redirect('private/thongtin/congty')->with('thongbao','Sửa thành công');
    }
    
}
