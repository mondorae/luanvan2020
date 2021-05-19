<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\tbl_chucvu;
use App\tbl_chucvu_permission;
use App\tbl_permissions;
use App\tbl_hopdong;
use App\tbl_phuluc;
use App\tbl_chitietphuluc;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {   
                $hopdong=tbl_hopdong::where([['id_nhanvien',Auth::user()->id_nhanvien],['trang_thai','1']])->first();
                // if(tbl_phuluc::where('id_hopdong',$hopdong->id_hopdong)){
                    $phuluc=tbl_phuluc::where([['id_hopdong',$hopdong->id_hopdong],['id_loaiphuluc','2']])->first();
                    
                    if($phuluc!=null){
                    $chitiet=tbl_chitietphuluc::where('id',$phuluc->id_chitiet)->first();
                    $congviec=tbl_chucvu_permission::where('id_chucvu',$chitiet->id_chucvu_moi)->get()->pluck('id_permission');
                    }
                    else{
                        $congviec=tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->get()->pluck('id_permission');
                        }
                
               
                
                
                $check=tbl_permissions::where('ten',$permission)->value('id');
               
                
                if($congviec->contains($check)){
                    return $next($request);
                }
                
        return abort(401);
    }
}