 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">THÔNG TIN CÁ NHÂN
                </h1>
            <h3>Nhân viên: {{$nhanvien->ho_ten}}</h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
     
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            @if(session('thongbao'))
                            <div class="alert alert-success ">
                            {{session('thongbao')}}
                            </div>
                        @endif
                            <form class="needs-validation"  action="{{url('private/quanly/suathongtin/'.$nhanvien->id_nhanvien)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <ul class="nav  mt-3 mb-4 card-header">
                                        {{-- <a class" data-toggle="tab" href="#home" >Thông Tin Chính</a> --}}
                                        <li class="active"><a class"="" data-toggle="tab" href="#home" class="active show">Thông Tin Chính</a></li>
                                         <li><a data-toggle="tab" href="#menu1" >Thông Tin Liên Hệ</a></li>
                                         <li ><a data-toggle="tab" href="#menu2" >Thông Tin Trình Độ Bằng Cấp</a></li>
                                         <li><a data-toggle="tab" href="#menu3" >Hồ Sơ Đi Kèm</a></li>
                                         <li><a data-toggle="tab" href="#menu4" >Thông Tin Tài Khoảng Tại Công Ty</a></li>
                                         
   
                                       </ul>


                                       <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active" style="opacity: 1">
                                          <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="form-row mb-3">
                                                    
                                                    <div class="form-group col-md-3 ml-4">
                                                        <div >
                                                        <label>Ảnh đại diện</label>
                                                        </div>
                                                        <div >
                                                            @if(isset($nhanvien->anh_dai_dien))
                                                            <img src="{{url('upload/arvarta/'.$nhanvien->anh_dai_dien)}}" style="width: 255px;height: 265px;">
                                                            @else
                                                        <img src="{{url('admin_asset/assets/images/avatar-1.jpg')}}" style="width:250px">
                                                        @endif
                                                        <input type="file" name="Hinh" class="form-control mt-3" style="width:250px" >
                                                        </div>
                                                    </div>
        
                                                    <div class="form-group col-md-8">
                                                        <div class="form-row mb-3">
                                                        <div class="form-group col-md-12">
                                                        <label for="validationCustom01">Họ Tên</label>
                                               
                                                <input type="text" class="form-control mb-3" name="ho_ten" placeholder="" value="{{$nhanvien->ho_ten}}" readonly="" >
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="ngaysinh">Ngày Sinh</label>
                                                            <input type="date" class="form-control" name="ngay_sinh" value="{{$nhanvien->ngay_sinh}}" required>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label>Giới tính</label>
                                                            <br>
                                                            <label class="radio-inline mr-5 ml-5 mt-2" >
                                                            <input type="radio" name="gioi_tinh" value="1"  style="display: inline"  @if($nhanvien->gioi_tinh == 1)  {{"checked"}} @endif>Nam
                                                             </label>
                                                             <label class="radio-inline mr-5 ml-5 mt-2">
                                                            <input type="radio" name="gioi_tinh" value="0"  style="display: inline" @if($nhanvien->gioi_tinh == 0)  {{"checked"}}@endif>Nữ
                                                            </label>
                                              
                                          </div> 
                                      
                                      <div class="form-group col-md-6">
                                        <label >Dân tộc</label>
                                              <select name="dan_toc" class="form-control" style="-webkit-appearance: auto;">
                                                @foreach($dantoc as $dt)
                                                <option @if($nhanvien->id_dantoc==$dt->id_dantoc) {{"selected"}} @endif value="{{$dt->id_dantoc}}">{{$dt->ten_dan_toc}}</option>
                                                 @endforeach
                                            </select>
                                          </div>
                                          <div class="form-group col-md-6 ">
                                            <label >Tôn giáo</label>
                                              <input type="text" class="form-control" name="ton_giao" placeholder="Nhập tôn giáo" value="{{$nhanvien->ton_giao}}" required>
                                          </div>
                                      </div>
                                      <div class="form-row mb-3">
                                          <div class="form-group col-md-4">
                                            <label>Số Chứng Minh Nhân Dân</label>
                                            <input type="text" class="form-control" name="so_cmnd" placeholder="Nhập số CMND" value="{{$nhanvien->so_cmnd}}" required>
                                          </div>
                                          <div class="form-group col-md-4">
                                              <label for="ngaycapcmnd">Ngày Cấp</label>
                                              <input type="date" class="form-control" name="ngay_cap_cmnd" value="{{$nhanvien->ngay_cap_cmnd}}" required>
                                          </div>
                                          <div class="form-group col-md-4">
                                              <label for="noicapcmnd">Nơi Cấp</label>
                                              <input type="text" class="form-control" name="noi_cap_cmnd" placeholder="Nhập địa chỉ nơi cấp CMND" value="{{$nhanvien->noi_cap_cmnd}}" required>
                                          </div>
                                        </div>
                                        </div>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      <div id="menu1" class="tab-pane fade">
                                        <h3 style="color: blue;">Thông tin liên hệ cá nhân:</h3>
                                        @foreach ($lienhe as $lh)
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4">
                                              <label for="sdt_ca_nhan">Số Điện Thoại Cá Nhân</label>
                                              <input type="text" class="form-control" name="sdt_ca_nhan" placeholder="Nhập số điện thoại cá nhân" value="{{$lh->sdt_ca_nhan}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Số Điện Thoại Nhà</label>
                                                <input type="text" class="form-control" name="sdt_nha" placeholder="Nhập số điện thoại nhà" value="{{$lh->sdt_nha}}" required>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="email_ca_nhan">Email Cá Nhân</label>
                                                <input type="email" class="form-control" name="email_ca_nhan" placeholder="Nhập email cá nhân" value="{{$lh->email}}" required>
                                              </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-3"> 
                                                <label >Địa chỉ thường trú</label>
                                                <input type="text" class="form-control mb-3" name="dia_chi_thuong_tru" placeholder="Nhập địa chỉ thường trú" value="{{$lh->dia_chi_thuong_tru}}" required >
                                            </div>
                                            <div class="form-group col-md-3"> 
                                                <label >Tỉnh/ Thành phố</label>
                                                <select name="tinh_thuong_tru" class="form-control" style="-webkit-appearance: auto;"required>
                                                    @foreach($tinh as $t)
                                                        <option  @if($lh->id_tinh_thuong_tru==$t->id_tinh) {{"selected"}} @endif value="{{$t->id_tinh}}">{{$t->ten_tinh}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3"> 
                                                <label >Địa chỉ tạm trú</label>
                                                <input type="text" class="form-control mb-3" name="dia_chi_tam_tru" placeholder="Nhập địa chỉ tạm trú" value="{{$lh->dia_chi_tam_tru}}" required>
                                            </div>
                                            <div class="form-group col-md-3"> 
                                                <label >Tỉnh/ Thành phố</label>
                                                <select name="tinh_tam_tru" class="form-control" style="-webkit-appearance: auto;" required>
                                                    @foreach($tinh as $t)
                                                    <option  @if($lh->id_tinh_tam_tru==$t->id_tinh) {{"selected"}} @endif value="{{$t->id_tinh}}">{{$t->ten_tinh}}</option>
                                                @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        @endforeach
                                        <h3 style="color: blue;">Thông tin liên hệ gia đình:</h3>
                                      
                                     
                                       @if($giadinh!=null)
                                        <div class="form-row mb-3">
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Tên Người Thân</label>
                                                <input type="text" class="form-control" name="ten_nguoi_than" placeholder="Nhập tên người thân" value="{{$giadinh->ten_nguoi_than}}" required>
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Công việc</label>
                                                <input type="text" class="form-control" name="cong_viec" placeholder="Nhập công việc người thân" value="{{$giadinh->cong_viec}}" required>
                                                
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Số điện thoại</label>
                                                <input type="text" class="form-control" name="sdt_di_dong" placeholder="Nhập số điện thoại người thân" value="{{$giadinh->sdt_di_dong}}" required>
                                              
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Mối Quan Hệ</label>
                                                <input type="text" class="form-control" name="moi_quan_he" placeholder="Nhập mối quan hệ với người thân" value="{{$giadinh->moi_quan_he}}" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Nơi Ở</label>
                                                <input type="text" class="form-control" name="dia_chi" placeholder="Nhập nơi ở hiện tại của người thân" value="{{$giadinh->dia_chi}}" required>
                                                
                                            </div>
                                            
                                             <div class="form-group col-md-4 mb-3">
                                                <label >Email</label>
                                                <input type="text" class="form-control" name="emailnguoithan" placeholder="Nhập email của người thân" value="{{$giadinh->email}}" required>
                                               
                                            </div>
                                            
                                        </div>
                                        @else
                                        <div class="form-row mb-3">
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Tên Người Thân</label>
                                                <input type="text" class="form-control" name="ten_nguoi_than" placeholder="Nhập tên người thân" value="" >
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Công việc</label>
                                                <input type="text" class="form-control" name="cong_viec" placeholder="Nhập công việc người thân" value="" >
                                                
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Số điện thoại</label>
                                                <input type="text" class="form-control" name="sdt_di_dong" placeholder="Nhập số điện thoại người thân" value="" >
                                              
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Mối Quan Hệ</label>
                                                <input type="text" class="form-control" name="moi_quan_he" placeholder="Nhập mối quan hệ với người thân" value="" >
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Nơi Ở</label>
                                                <input type="text" class="form-control" name="dia_chi" placeholder="Nhập nơi ở hiện tại của người thân" value="">
                                                
                                            </div>
                                            
                                             <div class="form-group col-md-4 mb-3">
                                                <label >Email</label>
                                                <input type="text" class="form-control" name="emailnguoithan" placeholder="Nhập email của người thân" value="" >
                                               
                                            </div>
                                            
                                        </div>
                                       @endif
                                        
                                            
                                        </div>
                                        
                                     
                                      <div id="menu2" class="tab-pane fade">
                                        @foreach ($trinhdo as $td)
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-2"> 
                                                <label >Bằng Cấp, Trình Độ</label>
                                                <select name="muc_trinh_do" class="form-control" style="-webkit-appearance: auto;" required>
                                                    <option  @if($td->muc_trinh_do=="Đại học") {{"selected"}} @endif value="Đại học" ">Đại Học</option>
                                                    <option @if($td->muc_trinh_do=="Cao đẳng") {{"selected"}} @endif  value="Cao đẳng" ">Cao Đẳng</option>
                                                    <option  @if($td->muc_trinh_do=="Trung Cấp") {{"selected"}} @endif value="Trung Cấp" ">Trung Cấp</option>
                                                    <option @if($td->muc_trinh_do=="Khác") {{"selected"}} @endif  value="Khác" ">Khác</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="sdt_ca_nhan">Nơi Đào Tạo</label>
                                              <input type="text" class="form-control" name="noi_dao_tao" placeholder="Nhập nơi đào tạo" value="{{$td->noi_dao_tao}}" required>
                                            </div>
                                            <div class="form-group col-md-2"> 
                                                <label >Xếp loại</label>
                                                <select name="xep_loai" class="form-control" style="-webkit-appearance: auto;" required>
                                                    <option  @if($td->xep_loai=="Giỏi") {{"selected"}} @endif value="Giỏi" >Giỏi</option>
                                                    <option  @if($td->xep_loai=="Khá") {{"selected"}} @endif value="Khá">Khá</option>
                                                    <option  @if($td->xep_loai=="Trung Bình Khá") {{"selected"}} @endif value="Trung Bình Khá">Trung Bình Khá</option>
                                                    <option  @if($td->xep_loai=="Khác") {{"selected"}} @endif value="Khác">Khác</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label >Năm Tốt Nghiệp</label>
                                                <input type="number" name="nam_tot_nghiep" class="form-control text-center" min="2010" max="2020" step="1" value="{{$td->nam_tot_nghiep}}" required />
                                              </div>
                                            
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                                <label >Ngành Đào Tạo</label>
                                                <input type="text" class="form-control" name="nganh_dao_tao" placeholder="Nhập chuyên ngành đào tạo" value="{{$td->nganh_dao_tao}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Chuyên Ngành</label>
                                                <input type="text" class="form-control" name="chuyen_nganh" placeholder="Nhập chuyên ngành đào tạo" value="{{$td->chuyen_nganh}}" required>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-12"> 
                                                <label > Tên các bằng cấp, chứng chỉ khác ( nếu có) </label>
                                                <input type="text" class="form-control mb-3" name="chung_chi_khac" placeholder="Nhập bằng cấp, chứng chỉ khác (cách nhau bằng dấu , hoặc dấu , )" value="{{$td->chung_chi_khac}}" >
                                            </div>
                                        </div> 
                                        @endforeach
                                      </div>
                                   
                                      <div id="menu3" class="tab-pane fade">
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-12 mb-3">
                                                {{-- @if($ds_ho_so->count()>0) --}}
                                               
                                                @if(!empty($nhanvien->id_hoso))
                                                @php
                                                    $ho_so = explode(',', $nhanvien->id_hoso);
                                                @endphp
                                                <div class="icheck-inline">
                                                    @foreach($ds_ho_so as $dshs)
                                                    <label class="col-md-3 col-xs-6" style="margin: 0 0 10px 0;">
                                                        <input type="checkbox" name="hoso[]" value="{{$dshs->id_hoso}}" data-checkbox="icheckbox_minimal-blue" class="icheck" {{ (in_array($dshs->id_hoso, $ho_so))?"checked":"" }} > {{  $dshs->ten }} </label>
                                                    @endforeach
                                                </div>
                                            @endif       
                                                {{-- @endif --}}
                                            
                                            </div>
                                        </div>
                                      </div> 

                                      <div id="menu4" class="tab-pane fade">
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6 mb-3">
                                                <label >Phòng Ban</label>
                                                <select name="phong_ban" class="form-control" style="-webkit-appearance: auto;" id="phong_ban" required>
                                                  <option selected value="">Chọn phòng ban</option>
                                                  @foreach($phongban as $pb)
                                                <option  @if($nhanvien->tbl_chucvu->id_phongban==$pb->id_phongban) {{"selected"}} @endif  value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                            @endforeach
                                                </select>
                                                <span id="phong_banf"></span>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label >Chức Vụ</label>
                                                <select name="chuc_vu" class="form-control" style="-webkit-appearance: auto;" id="chuc_vu" required>
                                                  <option selected value="">Chọn chức vụ</option>
                                                  @foreach($chucvu as $cv)
                                                <option @if($nhanvien->id_chucvu==$cv->id_chucvu) {{"selected"}} @endif value="{{$cv->id_chucvu}}">{{$cv->ten_chuc_vu}}</option>
                                            @endforeach
                                                </select>
                                                <span id="chuc_vuf"></span>
                                            </div>
                                                @foreach ($user as $user)
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Tên Người Dùng</label>
                                                {{-- <label class="form-control mb-3" >{{$nhanvien->id_chucvu}}</label> --}}
                                                <input type="text" class="form-control mb-3" name="name" placeholder="Nhập tên người dùng" value="{{$user->name}}" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Email Công Ty (Tài khoản)</label>
                                                    {{-- <label class="form-control mb-3" >{{$nhanvien->tbl_chucvu->ten_chuc_vu}}</label> --}}
                                            <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{$user->email}}" readonly="">
                                                
                                            </div>
                                            
                                             <div class="form-group col-md-4 mb-3">
                                                <label>PassWord</label>
                                                {{-- <label class="form-control mb-3" >{{$nhanvien->tbl_vitri->ten_vi_tri}}</label> --}}
                                             <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" value="{{$user->password}}" required>
                                            @endforeach
                                            
                                        </div>
                                       
                                    </div>
                                    </div>
                                   
                        
                                  
                           

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                        <button class="btn btn-primary mr-5" type="submit"><i class="fa fa-save mr-2"></i>Lưu</button>
                                        <button type="reset" class="btn btn-primary"><i class="fas fa-sync-alt mr-2"></i>Làm mới</button>
                                    </div>
                                </div>
                                       </div>
                                    
                                </div>
                            </div>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#phong_ban").change(function(){
                var id_phongban=$(this).val();
                $.get("ajax/chucvu/"+id_phongban,function(data){
                    $("#chuc_vu").html(data);
                });
            });
        });
    </script>   
    <script language="javascript">

        document.getElementById("btn1").onclick = function () {
            document.getElementById("content").style.display = 'none';
            document.getElementById("btn2").style.display = 'block';
        };
    
        document.getElementById("btn2").onclick = function () {
            document.getElementById("content").style.display = 'block';
            document.getElementById("btn2").style.display = 'none';
        };
        document.getElementById("btn3").onclick = function () {
            document.getElementById("content1").style.display = 'none';
            document.getElementById("btn4").style.display = 'block';
        };
    
        document.getElementById("btn4").onclick = function () {
            document.getElementById("content1").style.display = 'block';
            document.getElementById("btn4").style.display = 'none';
        };
        document.getElementById("btn5").onclick = function () {
            document.getElementById("content2").style.display = 'none';
            document.getElementById("btn6").style.display = 'block';
        };
    
        document.getElementById("btn6").onclick = function () {
            document.getElementById("content2").style.display = 'block';
            document.getElementById("btn6").style.display = 'none';
        };
        // document.getElementById("btn7").onclick = function () {
        //     document.getElementById("content3").style.display = 'none';
        //     document.getElementById("btn8").style.display = 'block';
        // };
    
        // document.getElementById("btn8").onclick = function () {
        //     document.getElementById("content3").style.display = 'block';
        //     document.getElementById("btn8").style.display = 'none';
        // };
        document.getElementById("btn9").onclick = function () {
            document.getElementById("content4").style.display = 'none';
            document.getElementById("btn10").style.display = 'block';
        };
    
        document.getElementById("btn10").onclick = function () {
            document.getElementById("content4").style.display = 'block';
            document.getElementById("btn10").style.display = 'none';
        };
        document.getElementById("btn13").onclick = function () {
            document.getElementById("content5").style.display = 'none';
            document.getElementById("btn14").style.display = 'block';
        };
    
        document.getElementById("btn14").onclick = function () {
            document.getElementById("content5").style.display = 'block';
            document.getElementById("btn14").style.display = 'none';
        };
    

        document.getElementById("btn11").onclick = function () {
        document.getElementById("content8").style.display = 'none';
        document.getElementById("btn12").style.display = 'block';
    };
    document.getElementById("btn12").onclick = function () {
        document.getElementById("content8").style.display = 'block';
        document.getElementById("btn12").style.display = 'none';
    };
    </script>
@endsection