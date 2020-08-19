<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_chucvu;
use App\tbl_phongban;
use App\tbl_phucap;
use App\tbl_permissions;
use App\tbl_chucvu_permission;
use App\tbl_chitietphuluc;
use App\tbl_hosonhanvien;
class ChucVuController extends Controller
{
    public function getThemCV(){
        $phongban = tbl_phongban::all();
        $permissions=tbl_permissions::all();
        return view('layout.chucvu.themCV',compact('phongban','permissions'));
    }

    public function postThemCV(Request $request){
        $this->validate($request,
            ['ten_chuc_vu'=>'unique:tbl_chucvu',

            ],
            [
                'ten_chuc_vu.unique'=>'Tên chức vụ đã tồn tại.',
            ]);
        $chucvu = new tbl_chucvu;
        $chucvu->id_chucvu = $request->get('id_chucvu').$request->get('id_phongban');
        $chucvu->ten_chuc_vu = $request->get('ten_chuc_vu');
        $chucvu->id_phongban = $request->get('id_phongban');
        //lưu phụ cấp mới dựa vào chức vụ
        $phucap = new tbl_phucap;
        $phucap->id_chucvu = $chucvu->id_chucvu ;
        $chucvu->save();
        $phucap->save();
        if(isset($request->permission)){
        $permissions=$request->permission;
        foreach($permissions as $permissionID){
            $cv_permission=new tbl_chucvu_permission;
            $cv_permission->id_chucvu=$chucvu->id_chucvu;
            $cv_permission->id_permission =(int)$permissionID;

            $cv_permission->save();
        }
    }


       
        
        
        return redirect('private/phucap/sua/'.$chucvu->id_chucvu)->with('thongbao','Thêm chức vụ thành công, mời bạn tiếp tục với nhập phụ cấp theo chức vụ!!!');
    }

    public function getSuaCV($id_chucvu){
        
        $chucvu=tbl_chucvu::find($id_chucvu);
        $permissions=tbl_permissions::all();
        $phongban = tbl_phongban::all();
        $cv_permission=tbl_chucvu_permission::where('id_chucvu',$id_chucvu)->pluck('id_permission');
        return view('layout.chucvu.suaCV',compact('chucvu','permissions','cv_permission','phongban'));
    }

    public function postSuaCV(Request $request, $id_chucvu){
        $chucvu=tbl_chucvu::find($id_chucvu);
        if($request->ten_chuc_vu!=$chucvu->ten_chuc_vu){
        $this->validate($request,
            ['ten_chuc_vu'=>'unique:tbl_chucvu',

            ],
            [
                'ten_chuc_vu.unique'=>'Tên chức vụ đã tồn tại.',
            ]);
        }
        
        // $chucvu->id_chucvu = $chucvu->id_phongban.$request->get('id_chucvu');
        $chucvu->ten_chuc_vu = $request->get('ten_chuc_vu');
        $chucvu->save();
        if(tbl_chucvu_permission::where('id_chucvu',$id_chucvu)->exists()){

            tbl_chucvu_permission::where('id_chucvu',$id_chucvu)->delete();
        }
        
        $permissions=$request->permission;
        foreach($permissions as $permissionID){
           $cv_permission=new tbl_chucvu_permission;
            $cv_permission->id_chucvu=$chucvu->id_chucvu;
            $cv_permission->id_permission =(int)$permissionID;

            $cv_permission->save();
        }
        
        return redirect('private/chucvu/sua/'.$chucvu->id_chucvu)->with('thongbao','Sửa Thành Công');
    }

    public function getXoaCV($id_chucvu){
        
        $chucvu=tbl_chucvu::find($id_chucvu);
        $phucap =tbl_phucap::where('id_chucvu',$id_chucvu)->get();
        $chitiet=tbl_chitietphuluc::where('id_chucvu_moi',$id_chucvu)->get();
        $nhanvien=tbl_hosonhanvien::where('id_chucvu',$id_chucvu)->get();
        if($nhanvien==null){
            return redirect('private/chucvu/danhsach')->with('thatbai','Không thể xóa, chức vụ đang tồn tại trong chức vụ của mỗi nhân viên!!');
        }
        if($phucap==null){
            return redirect('private/chucvu/danhsach')->with('thatbai','Không thể xóa, chức vụ đang tồn tại phụ cấp!!');
        }
        if($chitiet==null){
            return redirect('private/chucvu/danhsach')->with('thatbai','Không thể xóa, chức vụ đang tồn tại trong phụ lục thay đổi chức vụ!!');
        }
        
        if(tbl_chucvu_permission::where('id_chucvu',$id_chucvu)->exists()){

            tbl_chucvu_permission::where('id_chucvu',$id_chucvu)->delete();
        }
        //thêm điều kiện nếu trong phòng ban có chức vụ thì không được xóa----có cả phụ cấp!!
        $chucvu->delete();
        return redirect('private/chucvu/danhsach')->with('thanhcong','Xóa Thành Công');
    }
}
