<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_hosonhanvien;
use App\tbl_baohiem;

class BaoHiemController extends Controller
{
    public function getThemBH($id_nhanvien){
        $nhanvien = tbl_hosonhanvien::find($id_nhanvien);
        return view('layout.baohiem.themBH',compact('nhanvien'));
    }

    public function postThemBH(Request $request){
        $nhanvien = tbl_hosonhanvien::find($request->id_nhanvien);
        $baohiem = new tbl_baohiem;
        $baohiem->so_bhyt = $request->so_bhyt;
        $baohiem->ngay_cap_bhyt = $request->ngay_cap_bhyt;
        $baohiem->noi_cap_bhyt = $request->noi_cap_bhyt;
        $baohiem->so_bhxh = $request->so_bhxh;
        $baohiem->ngay_cap_bhxh = $request->ngay_cap_bhxh;
        $baohiem->noi_cap_bhxh = $request->noi_cap_bhxh;
        $baohiem->save();
        $baohiemmoi = tbl_baohiem::orderBy('id_baohiem','desc')->first();
        $nhanvien->id_baohiem = $baohiemmoi->id_baohiem;
        $nhanvien->save();
        return redirect('private/baohiem/danhsach')->with('thongbao','Thêm Thành Công');
    }

    public function getSuaBH($id_baohiem){
        $nhanvien = tbl_hosonhanvien::where('id_baohiem',$id_baohiem)->first();
        return view('layout.baohiem.suaBH',compact('nhanvien'));
    }

    public function postSuaBH(Request $request, $id_baohiem){
        $baohiem = tbl_baohiem::find($id_baohiem);
        $baohiem->so_bhyt = $request->so_bhyt;
        $baohiem->ngay_cap_bhyt = $request->ngay_cap_bhyt;
        $baohiem->so_bhxh = $request->so_bhxh;
        $baohiem->ngay_cap_bhxh = $request->ngay_cap_bhxh;
        $baohiem->save();
        return redirect('private/baohiem/danhsach')->with('thongbao','Cập Nhật Thành Công');
    }

    public function postXoaBH($id_baohiem){
        $baohiem = tbl_baohiem::find($id_baohiem);
        $nhanvien = tbl_hosonhanvien::where('id_baohiem',$id_baohiem)->first();
        $nhanvien->id_baohiem= null;
        $nhanvien->save();
        $baohiem->delete();
        return redirect('private/baohiem/danhsach')->with('thongbao','Xóa Thành Công');
    }

    public function getChiTietBH($id_baohiem){
        $nhanvien = tbl_hosonhanvien::where('id_baohiem',$id_baohiem)->first();
        //$baohiem = tbl_baohiem::find($id_baohiem);
        return view('layout.baohiem.chitietBH',compact('nhanvien'));
    }
}
