<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Theloai;
use App\LoaiTin;
use App\Slide;
use App\TinTuc;
use App\User;
use App\tbl_thongtinchinh;
use App\tbl_thongtingioithieu;
use App\tbl_tintuyendung;
class PageController extends Controller
{ 
    //
    function __construct(){
        $thongtinchinh=tbl_thongtinchinh::first();
        view()->share('thongtinchinh',$thongtinchinh);
        $theloai=Theloai::all();
        view()->share('theloai',$theloai);

        if(Auth::check()){
            view()->share('nguoidung',Auth::user());
        }
    }
    function tintucsukienall(){
        $tintuc= TinTuc::paginate(6);
        return view('pagestrangchinh.tintucsukienall',['tintuc'=>$tintuc]);
    }
    function tintucsukien($id){
    	$loaitin=LoaiTin::find($id);
        $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(6);
    	return view('pagestrangchinh.tintucsukien',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    function trangchu(){
    // $slide= Slide::all();
    $tintuc= TinTuc::all();
    return view('pagestrangchinh.trangchu',['tintuc'=>$tintuc]);
    // 
}
    function tintuc($id){
        $tintuc= TinTuc::find($id);
        $tinlienquan= TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(3)->get();
        return view('pagestrangchinh.tintuc',['tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan]);
    }
    function getDangnhap(){
        return view('page.dangnhap');
    }
    function postDangnhap(Request $request){
             $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
            
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập Password',
        ]);
         if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('trangchu');
        }
        else{
            return redirect('dangnhap')->with('thongbao','Email hoặc mật khẩu không đúng, vui lòng đăng nhập lại');
        }
    }
    function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }

    function getNguoiDung(){
        $user=Auth::user();
        return view('page.nguoidung',['nguoidung'=>$user]);
    }
    function postNguoiDung(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng quá ngắn'

        ]);
        $user=Auth::user();
        $user->name=$request->name;
        if($request->changePassword=="on"){
            $this->validate($request,[
            'password'=>'required|min:3|max:35',
            'passwordAgain'=>'required|same:password'
        ],[
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu quá dài',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại không đúng'

        ]);
            $user->password=bcrypt($request->password);
        }
        $user->save();
        return redirect('nguoidung')->with('thongbao','Sửa thành công');
    }
    function getDangky(){
        return view('page.dangky');
    }
    function postDangky(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:35',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng quá ngắn',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu quá ngắn',
            'password.max'=>'Mật khẩu quá dài',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại không đúng'

        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->quyen=0;
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng ký thành công');
    }
    function getLienhe(){
        return view('pagestrangchinh.lienhe');
    }
    function getGioithieuchung(){
        $gioithieu=tbl_thongtingioithieu::all();
        return view('pagestrangchinh.gioithieu',['gioithieu'=>$gioithieu]);
    }
    function getTuyendung(){
        $tuyendung=tbl_tintuyendung::all();
        return view('pagestrangchinh.tintuyendung',['tuyendung'=>$tuyendung]);
    }
    function getTinTuyendung($id){
        $tuyendung= tbl_tintuyendung::find($id);
        return view('pagestrangchinh.tuyendung',['tuyendung'=>$tuyendung]);
    }
}

