<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_phongban;
use App\tbl_chucvu;

class PhongBanController extends Controller
{
    function getThemPB(){
        return view('layout.phongban.themPB');
    }

    public function postThemPB(Request $request){
        $this->validate($request,
        ['ten_phong_ban'=>'unique:tbl_phongban',
        'id_phongban'=>'unique:tbl_phongban',

        ],
        [
            'ten_phong_ban.unique'=>'Tên phòng ban đã tồn tại.',
            'id_phongban.unique'=>'Mã phòng ban tồn tại.',
        ]);
        $phongban = new tbl_phongban;
        $phongban->id_phongban= $request->get('id_phongban');
        $phongban->ten_phong_ban= $request->get('ten_phong_ban');
        $phongban->save();
        return redirect('private/phongban/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSuaPB($id_phongban){
        $phongban=tbl_phongban::where('id_phongban',$id_phongban)->first();
        //$phongban=tbl_phongban::find($id_phongban);
        return view('layout.phongban.suaPB',['phongban'=>$phongban]);
    }

    public function postSuaPB(Request $request, $id_phongban){
        // if($request->ten_chuc_vu!=$chucvu->ten_chuc_vu){
        //     $this->validate($request,
        //         ['ten_chuc_vu'=>'unique:tbl_chucvu',
    
        //         ],
        //         [
        //             'ten_chuc_vu.unique'=>'Tên chức vụ đã tồn tại.',
        //         ]);
        //     }
        $phongban=tbl_phongban::find($id_phongban);
        if($request->ten_phong_ban!=$phongban->ten_phong_ban){
        $this->validate($request,
            ['ten_phong_ban'=>'unique:tbl_phongban',

            ],
            [
                'ten_phong_ban.unique'=>'Tên phòng ban đã tồn tại.',
            ]);
        }
       
        $phongban->ten_phong_ban = $request->get('ten_phong_ban');
        $phongban->save();
        return redirect('private/phongban/sua/'.$phongban->id_phongban)->with('thongbao','Sửa Thành Công');
    }

    public function getXoaPB($id_phongban){
        $phongban=tbl_phongban::find($id_phongban);
        //thêm điều kiện nếu trong phòng ban có chức vụ thì không được xóa
        $chucvu=tbl_chucvu::where('id_phongban',$id_phongban)->get();
       
        if($chucvu==null){
            return redirect('private/phongban/danhsach')->with('thatbai','Không thể xóa, phòng ban đang tồn tại chức vụ!!');
        }

        else
            $phongban->delete();
        return redirect('private/phongban/danhsach')->with('thongbao','Xóa Thành Công!');
    }
}
