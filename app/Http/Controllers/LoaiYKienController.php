<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_ykien;

class LoaiYKienController extends Controller
{
    public function getThemLoaiYK(){
        return view('layout.loaiykien.themLoaiYK');
    }

    public function postThemLoaiYK(Request $request){
        $loaiykien = new tbl_ykien;
        $loaiykien->loai_y_kien = $request->loai_y_kien;
        $loaiykien->chi_tiet = implode(',',$request->chi_tiet);
        $loaiykien->save();
        return redirect('private/loaiykien/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSuaLoaiYK($id_ykien){
        $loaiykien = tbl_ykien::find($id_ykien);
        return view('layout.loaiykien.suaLoaiYK',compact('loaiykien'));
    }

    public function postSuaLoaiYK(Request $request, $id_ykien){
        $loaiykien = tbl_ykien::find($id_ykien);
        $loaiykien->loai_y_kien = $request->loai_y_kien;
        $loaiykien->save();
        return redirect('private/loaiykien/sua/'.$loaiykien->id)->with('thongbao','Sửa thành công');
    }

    public function getXoaLoaiYK($id_ykien){
        $loaiykien = tbl_ykien::find($id_ykien);
        $loaiykien->delete();
        return redirect('private/loaiykien/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
