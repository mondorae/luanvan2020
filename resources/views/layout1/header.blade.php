        <div class="header">
                <div class="logo" style="width: 55%;text-align: left;padding-left:80px">
                    
                    <a href="trangchu"><img src="{{url('upload/logo/'.$thongtinchinh->Hinh)}}" style="width: 75px;height: 75px;" class="user-avatar-md rounded-circle mr-2" alt=""><label style="color: black; font-weight: 600;text-transform:uppercase;font-size: 30px">{{$thongtinchinh->ten_cong_ty}}</label></a>
                
                </div>
            {{-- <div  style="width: 30%">
                    
                <a class="navbar-brand"  href="{{url('/')}}" style="color: red; font-weight: 600;text-transform:uppercase;"></a>
            
        </div> --}}
                <div class="navigate" style="margin-top: 25px;width: 45%">
                    <ul>
                        <li class="{{Request::is('gioithieuchung') ? 'active':null}}"><a href="gioithieuchung">GIỚI THIỆU CHUNG</a></li>
                        <li><a href="trangchu">DỰ ÁN</a></li>
                        
                        
                        {{-- <li><a href="#">Công Ty Thành Viên</a></li> --}}
                        <li class="{{Request::is('tintucsukienall') ? 'active':null}}"><a href="tintucsukienall">TIN TỨC SỰ KIỆN</a></li>
                        <li class="{{Request::is('tintuyendung') ? 'active':null}}"><a href="tintuyendung">TUYỂN DỤNG</a></li>
                        <li class="{{Request::is('lienhe') ? 'active':null}}"><a href="lienhe">LIÊN HỆ</a></li>
                        {{-- <ul style="display: inline-grid;">  --}}
                        {{-- @if((Auth::user()))
                        <li class="{{Request::is('nguoidung') ? 'active':null}}"><a href="nguoidung">User: <img src="https://simpleicon.com/wp-content/uploads/user1.png" style="width: 17px;"> {{Auth::user()->name}}</a></li>
                            <li class="{{Request::is('dangxuat') ? 'active':null}}"><a href="dangxuat" style="margin-left: 50px;">Đăng Xuất</a></li>
                       
                        @else
                        <ul style="display: flex;"> 
                        <li class="{{Request::is('dangnhap') ? 'active':null}}"><a href="dangnhap">Đăng Nhập</a></li>
                        <li class="{{Request::is('dangky') ? 'active':null}}"><a href="dangky">Đăng Ký</a></li>
                    </ul>
                        @endif
                    </ul> --}}
                </div>
        </div>