 
@extends('layout.index')
@section('content')
 
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">THÔNG TIN CÁ NHÂN
                </h1>
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
                            <form class="needs-validation"  action="laphoso" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <ul class="nav  mt-3 mb-4 card-header">
                                        {{-- <a class" data-toggle="tab" href="#home" >Thông Tin Chính</a> --}}
                                        <li class="active"><a class"="" data-toggle="tab" href="#home" class="active show">Thông Tin Chính</a></li>
                                         <li><a data-toggle="tab" href="#menu1" >Thông Tin Liên Hệ</a></li>
                                         <li ><a data-toggle="tab" href="#menu2" >Thông Tin Trình Độ Bằng Cấp</a></li>
                                         <li><a data-toggle="tab" href="#menu3" >Hồ Sơ Đi Kèm</a></li>
                                         <li ><a data-toggle="tab" href="#menu4" >Thông Tin Chức Vụ Tại Công Ty</a></li>
                                         
   
                                       </ul>
                                    <div class="tab-content">
                                        @if (isset($nhanvien) )
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
                                                    {{-- <img src="upload/tintuc/{{$tt->Hinh}}" style="width: 100px;"> --}}
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-md-8">
                                                <div class="form-row mb-3">
                                                <div class="form-group col-md-12">
                                                <label for="validationCustom01">Họ Tên</label>
                                                <label class="form-control mb-3">{{$nhanvien->ho_ten}}</label>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                    <label for="ngaysinh">Ngày Sinh</label>
                                                    <label class="form-control mb-3" >{{date('d-m-Y',strtotime($nhanvien->ngay_sinh))}}</label>
                                                  </div>
                                                  <div class="form-group col-md-6 mb-3">
                                                      <label>Giới tính</label>
                                                      <br>
                                                        <label class="radio-inline mr-5 ml-5 mt-2" >
                                                            @if ($nhanvien->gioi_tinh == 1)
                                                            <input type="radio" name="gioi_tinh" value="1"  checked="" style="display: inline">Nam
                                                        @else
                                                        <input type="radio" name="gioi_tinh" value="0" checked="" style="display: inline">Nữ
                                                        @endif 
                                                        </label>
                                                  </div>
                                               
                                                        <div class="form-group col-md-6">
                                                            <label >Dân tộc</label>
                                                            <label class="form-control " >{{$nhanvien->tbl_dantoc->ten_dan_toc}}</label>
                                                        </div>
                                                        <div class="form-group col-md-6 ">
                                                            <label >Tôn giáo</label>
                                                            <label class="form-control mb-3" >{{$nhanvien->ton_giao}}</label>
                                                        </div>
                                                        
                                                  </div> 
                                                  <div class="form-row mb-3">
                                                    <div class="form-group col-md-4">
                                                      <label>Số Chứng Minh Nhân Dân</label>
                                                      <label class="form-control mb-3" >{{$nhanvien->so_cmnd}}</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="ngaycapcmnd">Ngày Cấp</label>
                                                        <label class="form-control mb-3" >{{date('d-m-Y',strtotime($nhanvien->ngay_cap_cmnd))}}</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="noicapcmnd">Nơi Cấp</label>
                                                        <label class="form-control mb-3" >{{$nhanvien->noi_cap_cmnd}}</label>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                     
                                      
                                        </div>
                                          </div>    
                                          @endif
                                    </div>
                                      


                                    <div id="menu1" class="tab-pane fade">
                                        <h3 style="color: blue;">Thông tin liên hệ cá nhân:</h3>
                                        @foreach ($lienhe as $lh)
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4">
                                              <label for="sdt_ca_nhan">Số Điện Thoại Cá Nhân</label>
                                              <label class="form-control mb-3" >{{$lh->sdt_ca_nhan}}</label>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Số Điện Thoại Nhà</label>
                                                <label class="form-control mb-3" >{{$lh->sdt_nha}}</label>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="email">Email Cá Nhân</label>
                                                <label class="form-control mb-3" >{{$lh->email}}</label>
                                              </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-3"> 
                                                <label >Địa chỉ thường trú</label>
                                                <label class="form-control mb-3" >{{$lh->dia_chi_thuong_tru}}</label>
                                            </div>
                                            <div class="form-group col-md-3"> 
                                                <label >Tỉnh/ Thành phố</label>
                                                <label class="form-control mb-3" >{{$lh->id_tinh_thuong_tru}}</label>
                                            </div>
                                            <div class="form-group col-md-3"> 
                                                <label >Địa chỉ tạm trú</label>
                                                <label class="form-control mb-3" >{{$lh->dia_chi_tam_tru}}</label>
                                            </div>
                                            <div class="form-group col-md-3"> 
                                                <label >Tỉnh/ Thành phố</label>
                                                <label class="form-control mb-3" >{{$lh->id_tinh_tam_tru}}</label>
                                            </div>
                                        </div>
                                       
                                        @endforeach
                                        <h3 style="color: blue;">Thông tin liên hệ gia đình:</h3>
                                        @if (isset($giadinh))
                                        <div class="form-row mb-3">
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Tên Người Thân</label>
                                                <label class="form-control mb-3" >{{$giadinh->ten_nguoi_than}}</label>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Công việc</label>
                                                    <label class="form-control mb-3" >{{$giadinh->cong_viec}}</label>
                                                
                                            </div>
                                            
                                             <div class="form-group col-md-4 mb-3">
                                                <label >Số điện thoại</label>
                                                <label class="form-control mb-3" >{{$giadinh->sdt_di_dong}}</label>
                                              
                                            </div>
                                        </div>
                                        
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Mối Quan Hệ</label>
                                                <label class="form-control mb-3" >{{$giadinh->moi_quan_he}}</label>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Nơi Ở</label>
                                                    <label class="form-control mb-3" >{{$giadinh->dia_chi}}</label>
                                                
                                            </div>
                                            
                                             <div class="form-group col-md-4 mb-3">
                                                <label >Email</label>
                                                <label class="form-control mb-3" >{{$giadinh->email}}</label>
                                               
                                            </div>
                                            
                                        </div>
                                        @else
                                        <h5 class="card-header mb-3 " style="color:red;">Chưa có thông tin gia đình!</h5>
                                    
                                        @endif
                                      </div>


                                 
                                    <div id="menu2" class="tab-pane fade">
                                        @foreach ($trinhdo as $td)
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-2"> 
                                                <label >Bằng Cấp, Trình Độ</label>
                                                <label class="form-control mb-3" >{{$td->muc_trinh_do}}</label>
                                                
                                            </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="sdt_ca_nhan">Nơi Đào Tạo</label>
                                              <label class="form-control mb-3" >{{$td->noi_dao_tao}}</label>
                                            </div>
                                            <div class="form-group col-md-2"> 
                                                <label >Xếp loại</label>
                                                <label class="form-control mb-3" >{{$td->xep_loai}}</label>
                                                
                                            </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label >Năm Tốt Nghiệp</label>
                                                <label class="form-control mb-3" >{{$td->nam_tot_nghiep}}</label>
                                              </div>
                                            
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                                <label >Ngành Đào Tạo</label>
                                                <label class="form-control mb-3" >{{$td->nganh_dao_tao}}</label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Chuyên Ngành</label>
                                                <label class="form-control mb-3" >{{$td->chuyen_nganh}}</label>
                                            </div>
                                            
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-12"> 
                                                <label > Tên các bằng cấp, chứng chỉ khác ( nếu có) </label>
                                                <label class="form-control mb-3" >{{$td->chung_chi_khac}}</label>
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
                                                    <input type="checkbox" name="hoso_id[]" value="{{$dshs->id_hoso}}" data-checkbox="icheckbox_minimal-blue" class="icheck" {{ (in_array($dshs->id_hoso, $ho_so))?"checked":"" }} readonly> {{  $dshs->ten }} </label>
                                                @endforeach
                                            </div>
                                        @endif       
                                            {{-- @endif --}}
                                        
                                        </div>
                                    </div>
                                  </div> 
                                    <div id="menu4" class="tab-pane fade">
                                        
                                        @if(isset($phuluc))
                                        <p style="font-size: 16px;color: black; ">Vị trí làm việc được thay đổi vào ngày: {{date('d-m-Y',strtotime($phuluc->tbl_chitietphuluc->ngay_bat_dau))}}</p>
                                        <p style="font-size: 16px;color: black; " >Thông tin vị trí cũ tại công ty</p>
                                        <div class="form-row mb-3">
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Phòng Ban</label>
                                                <label class="form-control mb-3" >{{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</label>
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Chức Vụ</label>
                                                <label class="form-control mb-3" >{{$nhanvien->tbl_chucvu->ten_chuc_vu}}</label>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label>Tên Nickname</label>
                                                <label class="form-control mb-3" >{{$user->name}}</label>
                                              </div>
                                            
                                        </div>
                                        <p style="font-size: 16px;color: black; " >Thông tin vị trí mới tại công ty</p>
                                        <div class="form-row mb-3">
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Phòng Ban</label>
                                                <label class="form-control mb-3" >{{$phuluc->tbl_chitietphuluc->tbl_chucvu->tbl_phongban->ten_phong_ban}}</label>
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Chức Vụ</label>
                                                <label class="form-control mb-3" >{{$phuluc->tbl_chitietphuluc->tbl_chucvu->ten_chuc_vu}}</label>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label>Tên Nickname</label>
                                                <label class="form-control mb-3" >{{$user->name}}</label>
                                              </div>
                                            
                                        </div>
                                        @else
                                        
                                        
                                        <div class="form-row mb-3">
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Phòng Ban</label>
                                                <label class="form-control mb-3" >{{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</label>
                                            </div>
                                            <div class="form-group col-md-4 mb-3">
                                                <label >Chức Vụ</label>
                                                <label class="form-control mb-3" >{{$nhanvien->tbl_chucvu->ten_chuc_vu}}</label>
                                            </div>
                                            
                                            <div class="form-group col-md-4 mb-3">
                                                <label>Tên Nickname</label>
                                                <label class="form-control mb-3" >{{$user->name}}</label>
                                              </div>
                                            
                                        </div>
                                   
                                        
                                   
                                     @endif   
                                     
                                        
                                    </div>
                                </div>
                                {{-- <a class="btn btn-primary mr-5 " href="{{url('private/suathongtin/'.Auth::user()->id_nhanvien)}}">Sửa đổi thông tin</a> --}}
                            </form>
                            
                        </div>
                        
                    </div>
                    <a class="btn btn-primary mr-5 " href="{{url('private/quanly/suathongtin/'.$nhanvien->id_nhanvien)}}">Sửa đổi thông tin</a>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
    </div>
</div>
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
@endsection
@section('script')
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
    document.getElementById("btn7").onclick = function () {
        document.getElementById("content3").style.display = 'none';
        document.getElementById("btn8").style.display = 'block';
    };

    document.getElementById("btn8").onclick = function () {
        document.getElementById("content3").style.display = 'block';
        document.getElementById("btn8").style.display = 'none';
    };
    document.getElementById("btn9").onclick = function () {
        document.getElementById("content4").style.display = 'none';
        document.getElementById("btn10").style.display = 'block';
    };

    document.getElementById("btn10").onclick = function () {
        document.getElementById("content4").style.display = 'block';
        document.getElementById("btn10").style.display = 'none';
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