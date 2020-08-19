<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\tbl_chucvu;
use App\tbl_chucvu_permission;
use App\tbl_permissions;


class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($permission);
        if(Auth::check()){
            $user= Auth::user();
            if($user->quyen==1){
                // // $quyen=tbl_chucvu::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->pluck('id_chucvu')->toArray();
                
                // $congviec=tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->get()->pluck('id')->unique();
                // // dd($congviec);
                // // exit;

                // //lay ra ma man hinh tuong ung de phan quyen
                // $check=tbl_permissions::where('ten',$permission)->value('id');
                // dd($check);
                return $next($request);
            }
            else
                return redirect('login');
        }
        else
        return redirect('login');
            
            
    }
}
