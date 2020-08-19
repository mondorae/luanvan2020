<!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Quản lý</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column" style="overflow-y: scroll;">
                            <li class="nav-divider text-center">
                                Menu
                            </li>
                            
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Quản lý danh mục<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/phongban/danhsach')}}">Danh sách phòng ban</a>
                                        </li>
                                        <li class="nav-item">   
                                            <a class="nav-link" href="{{url('private/chucvu/danhsach')}}">Danh sách chức vụ</a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Danh sách nhân viên</a>
                                            <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{url('private/nhanvien/danhsach')}}">Tất cả nhân viên</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{url('private/nhanvien/1')}}">Nhân viên đang làm</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{url('private/nhanvien/2')}}">Nhân viên nghĩ việc</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/hopdong/danhsach')}}">Danh sách hợp đồng</a>
                                        </li>
                                        <li class="nav-item">   
                                            <a class="nav-link" href="{{url('private/chamcong/danhsach')}}">Danh sách chấm công</a>
                                        </li>
                                        <li class="nav-item">   
                                            <a class="nav-link" href="{{url('private/loaiykien/danhsach')}}">Danh sách loại ý kiến</a>
                                        </li>
                                        <li class="nav-item">   
                                            <a class="nav-link" href="{{url('private/phucap/danhsach')}}">Bảng phụ cấp</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Thống kê</a>
                                            <div id="submenu-1-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="#">Nhân viên</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Quản lý nhân sự</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/laphoso')}}">Lập hồ sơ nhân viên</a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/danhsachquyetdinh')}}">Quyết định kỷ luật nhân viên</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/danhsachnvpb')}}">Quản lý nhân viên phòng ban</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Các ý kiến, đề xuất</a>
                                            <div id="submenu-11" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                <li class="nav-item"><a class="nav-link"  href="{{url('private/ykien/danhsach')}}"> Tất cả ý kiến </a></li>
                                                    @foreach ($ykien as $yk)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{url('private/ykien/danhsach/loai/'.$yk->id_ykien)}}">{{$yk->loai_y_kien}}</a>
                                                    </li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Hồ sơ nhân viên</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/thongtin/'.Auth::user()->id_nhanvien)}}">Thông tin cá nhân</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/'.Auth::user()->id_nhanvien.'/hopdong')}}">Hợp đồng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/NSNV001/baohiem')}}">Bảo hiểm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/luong')}}">Lương & Thuế</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/chamcong')}}">Chấm công</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-yk" aria-controls="submenu-yk">Ý Kiến / Đề xuất</a>
                                            <div id="submenu-yk" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{url('private/ykien/danhsach/theodoi')}}">Theo dõi ý kiến</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{url('private/ykien/them')}}">Gửi ý kiến!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Quản lý lương</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="pages/form-elements.html">Quản lý công</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/luong/danhsach')}}">Lương nhân viên</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/multiselect.html">Danh sách lương </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-file"></i>Quản lý tin tức- tuyển dụng</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <label>Tuyển dụng</label>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/tintuc/danhsachtuyendung')}}">Quản lý tuyển dụng</a>
                                        </li>
                                        <label>Tin tức</label>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/theloai/danhsach')}}">Thể loại tin tức</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/loaitin/danhsach')}}">Loại tin tin tức</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/tintuc/danhsach')}}">Tin tức</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pages </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/blank-page.html">Blank Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/blank-page-header.html">Blank Page Header</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/login.html">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/404-page.html">404 page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/sign-up.html">Sign up Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/forgot-password.html">Forgot Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/pricing.html">Pricing Tables</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/timeline.html">Timeline</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/calendar.html">Calendar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/sortable-nestable-lists.html">Sortable/Nestable List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/widgets.html">Widgets</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/media-object.html">Media Objects</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/cropper-image.html">Cropper</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/color-picker.html">Color Picker</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>  --}}
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Quản lý khác <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/thongtin/congty')}}">Thông tin công ty</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('private/thongtin/danhsachgioithieu')}}">Thông tin giới thiệu về công ty</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Icons</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-fontawesome.html">FontAwesome Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-material.html">Material Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-simple-lineicon.html">Simpleline Icon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-themify.html">Themify Icon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-flag.html">Flag Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/icon-weather.html">Weather Icon</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/map-google.html">Google Maps</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/map-vector.html">Vector Maps</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Level 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                            <div id="submenu-11" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Level 1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Level 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Level 3</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li>--}}
                            <li style="text-align: center"> <a  href="{{url('private/')}}">  <img src="{{url('upload/logo/'.$thongtinchinh->Hinh)}}" style="margin-top: 40px;width: 70px;height: 70px;" class=""></a></li>
                            <li  style="text-align: center"><a class="navbar-brand" href="{{url('private/')}}" style="color: #71748d;font-size: 15px;">{{$thongtinchinh->ten_cong_ty}}</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->