<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_phucap;


class PhucapController extends Controller
{

    public function getSuaPC($id){
        $phucap =tbl_phucap::where('id_chucvu',$id)->first();
        return view('layout.phucap.suaPC',compact('phucap'));
    }

    public function postSuaPC(Request $request, $id){
        $phucap=tbl_phucap::where('id_chucvu',$id)->first();
        $phucap->an_trua = $request->an_trua;
        $phucap->xang_xe = $request->xang_xe;
        // $phucap->trach_nhiem = $request->trach_nhiem;
        $phucap->khac=$request->khac;
        $phucap->tong_tien_phu_cap=$request->khac+$request->an_trua+$request->xang_xe+$request->trach_nhiem;
        $phucap->save();
        return redirect('private/phucap/danhsach')->with('thongbao','Thành Công');
    }

    // public function getXoaPC($id){
    //     $phucap=tbl_phucap::find($id);
    //     //thêm điều kiện nếu trong phòng ban có chức vụ thì không được xóa
    //     $phucap->delete();
    //     return redirect('private/phucap/danhsach')->with('thongbao','Xóa Thành Công');
    // }
}
