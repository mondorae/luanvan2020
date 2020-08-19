         <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top ">
                
                <a  href="{{url('private/')}}">  <img src="{{url('upload/logo/'.$thongtinchinh->Hinh)}}" style="width: 70px;height: 70px;" class=""></a>
              
                <a class="navbar-brand" href="{{url('private/')}}" style="color: #71748d;">{{$thongtinchinh->ten_cong_ty}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <h1 style="color: red;margin-left: 25% ;font-weight: 600">TRANG QUẢN LÝ</h1>
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        @if(Auth::user()) 
                        <li class="nav-item dropdown nav-user">
                             @if(isset(Auth::user()->tbl_hosonhanvien->anh_dai_dien))
                               <img src="{{url('upload/arvarta/'.Auth::user()->tbl_hosonhanvien->anh_dai_dien)}}" style="width: 40px;height: 40px; margin-bottom: -35px;" class="user-avatar-md rounded-circle"></a>
                               
                                @endif
                                
                            <a class="nav-link mt-2" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-bottom: -16px;"><label class="mt-2">Xin chào: {{Auth::user()->name}} <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRxodeFc7B2-LXYj_N1D0AruabctGqK4jLQQQ&usqp=CAU" style="height: 18px;"> </label></a>
                           
                               
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2" style="border: 2px solid #a9a9a9;min-width: 245px;text-align: center;">
                               
                                <a class="dropdown-item" href="{{url('private/thongtin/'.Auth::user()->id_nhanvien)}}"><img src="https://w1.pngwave.com/png/778/394/440/business-seo-elements-icon-businessman-icon-info-icon-people-icon-logo-label-png-clip-art.png " style="height: 20px; width: 20px;margin-right: 5px">Quản lý thông tin</a>
                                <a class="dropdown-item" href="{{url('logout')}}"><img src="https://cdn1.iconfinder.com/data/icons/essentials-pack/96/logout_close_sign_out_exit_access-512.png " style="height: 20px; width: 20px;margin-right: 5px">Đăng xuất</a>
                            </div>
                        </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->


        @include('layout.menu')