 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">THÊM NHÂN VIÊN
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
                            <form name="myform"  class="needs-validation"  action="laphoso" method="POST" enctype="multipart/form-data" onsubmit="return validatehoso()">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <ul class="nav  mt-3 mb-4 card-header">
                                         {{-- <a class" data-toggle="tab" href="#home" >Thông Tin Chính</a> --}}
                                         <li class="active"><a class"="" data-toggle="tab" href="#home" class="active show">Thông Tin Chính</a></li>
                                          <li><a data-toggle="tab" href="#menu1" >Thông Tin Liên Hệ</a></li>
                                          <li><a data-toggle="tab" href="#menu2" >Thông Tin Trình Độ Bằng Cấp</a></li>
                                          <li><a data-toggle="tab" href="#menu3" >Hồ Sơ Đi Kèm</a></li>
                                          <li><a data-toggle="tab" href="#menu4" >Thông Tin Chức Vụ Tại Công Ty</a></li>
    
                                        </ul>
                                        
                                      
                                        <div class="tab-content">
                                          <div id="home" class="tab-pane fade in active" style="opacity: 1">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <label for="validationCustom01">Họ Tên</label>
                                        <input type="text" class="form-control mb-3" id="hoten" name="ho_ten" placeholder="Nhập họ tên" value="" >
                                        <span id="hotenf"></span>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                              <label for="ngaysinh">Ngày Sinh</label>
                                              <input type="date" class="form-control"  id="ngaysinh" name="ngay_sinh" >
                                              <span id="ngaysinhf"></span>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Giới tính</label>
                                                <br>
                                                <label class="radio-inline mr-5 ml-5 mt-2" >
                                                    <input type="radio" name="gioi_tinh" value="1" checked="" style="display: inline">Nam
                                                </label>
                                                <label class="radio-inline mr-5 ml-5 mt-2">
                                                    <input type="radio" name="gioi_tinh" value="0"  style="display: inline">Nữ
                                                </label>
                                                
                                            </div> 
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-6">
                                                <label >Dân tộc</label>
                                                <select id="dantoc" name="dan_toc" class="form-control" style="-webkit-appearance: auto;" >
                                                  <option selected value="" ">Chọn dân tộc</option>
                                                    @foreach($dantoc as $dt)
                                                    <option value="{{$dt->id_dantoc}}">{{$dt->ten_dan_toc}}</option>
                                                     @endforeach
                                                </select>
                                                <span id="dantocf"></span>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label >Tôn giáo</label>
                                                <input type="text" class="form-control" id="tongiao"name="ton_giao" placeholder="Nhập tôn giáo">
                                                <span id="tongiaof"></span>
                                            </div>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="form-group col-md-4">
                                              <label>Số Chứng Minh Nhân Dân</label>
                                              <input type="text" class="form-control" id="socmnd" name="so_cmnd" placeholder="Nhập số CMND">
                                              <span id="socmndf"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ngaycapcmnd">Ngày Cấp</label>
                                                <input type="date" class="form-control"  name="ngay_cap_cmnd" id="ngaycapcmnd">
                                                <span id="ngaycapcmndf"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="noicapcmnd">Nơi Cấp</label>
                                                <input type="text" class="form-control" name="noi_cap_cmnd" placeholder="Nhập địa chỉ nơi cấp CMND" id="noicapcmnd">
                                                <span id="noicapcmndf"></span>
                                            </div>
                                          </div>
                                          </div>
                                            </div>
                                        </div>
                                          <div id="menu1" class="tab-pane fade">
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-4">
                                                  <label for="sdt_ca_nhan">Số Điện Thoại Cá Nhân</label>
                                                  <input type="text" class="form-control" id="sdtcanhan" name="sdt_ca_nhan" placeholder="Nhập số điện thoại cá nhân">
                                                  <span id="sdtcanhanf"></span>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Số Điện Thoại Nhà</label>
                                                    <input type="text" class="form-control" id="sdtnha" name="sdt_nha" placeholder="Nhập số điện thoại nhà">
                                                    <span id="sdtnhaf"></span>
                                                  </div>
                                                  <div class="form-group col-md-4">
                                                    <label for="email">Email Cá Nhân</label>
                                                    <input type="email" class="form-control" id="emailcanhan" name="emailcanhan" placeholder="Nhập email cá nhân">
                                                    <span id="emailcanhanf"></span>
                                                  </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-6"> 
                                                    <label >Địa chỉ thường trú</label>
                                                    <input type="text" class="form-control mb-3" id="diachithuongtru" name="dia_chi_thuong_tru" placeholder="Nhập địa chỉ thường trú" value="" >
                                                    <span id="diachithuongtruf"></span>
                                                </div>
                                                <div class="form-group col-md-6"> 
                                                    <label >Tỉnh/ Thành phố</label>
                                                    <select name="tinh_thuong_tru" class="form-control" style="-webkit-appearance: auto;" id="tinhthuongtru">
                                                    <option selected value="">Chọn tỉnh</option>
                                                    @foreach($tinh as $t)
                                                        <option value="{{$t->id_tinh}}">{{$t->ten_tinh}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="tinhthuongtruf"></span>
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-6"> 
                                                    <label >Địa chỉ tạm trú</label>
                                                    <input type="text" class="form-control mb-3" id="diachitamtru" name="dia_chi_tam_tru" placeholder="Nhập địa chỉ tạm trú" value="" >
                                                    <span id="diachitamtruf"></span>
                                                </div>
                                                <div class="form-group col-md-6"> 
                                                    <label >Tỉnh/ Thành phố</label>
                                                    <select name="tinh_tam_tru" class="form-control" style="-webkit-appearance: auto;" id="tinhtamtru">
                                                    <option selected value="" ">Chọn tỉnh</option>
                                                    @foreach($tinh as $t)
                                                    <option value="{{$t->id_tinh}}">{{$t->ten_tinh}}</option>
                                                @endforeach
                                                    </select>
                                                    <span id="tinhtamtruf"></span>
                                                </div>
                                            </div>
                                          </div>
                                          <div id="menu2" class="tab-pane fade">
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-2"> 
                                                    <label >Bằng Cấp, Trình Độ</label>
                                                    <select name="muc_trinh_do" class="form-control" style="-webkit-appearance: auto;" id="muctrinhdo">
                                                    <option selected value="" ">Chọn trình độ</option>
                                                    <option  value="Đại học" ">Đại Học</option>
                                                    <option  value="Cao đẳng" ">Cao Đẳng</option>
                                                    <option  value="Trung Cấp" ">Trung Cấp</option>
                                                    <option  value="Khác" ">Khác</option>
                                                    
                                                </select>
                                                <span id="muctrinhdof"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="sdt_ca_nhan">Nơi Đào Tạo</label>
                                                  <input type="text" class="form-control" name="noi_dao_tao" placeholder="Nhập nơi đào tạo" id="noidaotao">
                                                  <span id="noidaotaof"></span>
                                                </div>
                                                <div class="form-group col-md-2"> 
                                                    <label >Xếp loại</label>
                                                    <select name="xep_loai" class="form-control" style="-webkit-appearance: auto;" id="xeploai">
                                                    <option selected value="" ">Chọn xếp loại</option>
                                                    <option  value="Giỏi" >Giỏi</option>
                                                    <option  value="Khá">Khá</option>
                                                    <option  value="Trung Bình Khá">Trung Bình Khá</option>
                                                    <option  value="Khác">Khác</option>
                                                    
                                                </select>
                                                <span id="xeploaif"></span>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Năm Tốt Nghiệp</label>
                                                    <input type="number" name="nam_tot_nghiep" id="namtotnghiep" class="form-control text-center" min="2010" max="2020" step="1" value="2020" />
                                                    {{-- <input type="month"  name="nam_tot_nghiep" min="2010-01" value="2018-05">
                                                    <input type="month" class="form-control" name="email_cong_ty" placeholder="Nhập email công ty"> --}}
                                                    <span id="namtotnghiepf"></span>
                                                  </div>
                                                
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-6">
                                                    <label >Ngành Đào Tạo</label>
                                                    <input type="text" class="form-control" id="nganhdaotao" name="nganh_dao_tao" placeholder="Nhập chuyên ngành đào tạo">
                                                    <span id="nganhdaotaof"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label >Chuyên Ngành</label>
                                                    <input type="text" class="form-control" id="chuyennganh" name="chuyen_nganh" placeholder="Nhập chuyên ngành đào tạo">
                                                    <span id="chuyennganhf"></span>
                                                </div>
                                                
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-12"> 
                                                    <label > Tên các bằng cấp, chứng chỉ khác (nếu có)</label>
                                                    <input type="text" class="form-control mb-3" name="chung_chi_khac" placeholder="Nhập bằng cấp, chứng chỉ khác (cách nhau bằng dấu , hoặc dấu , )" value="" >
                                                    
                                                </div>
                                            </div>
                                          </div>
                                          <div id="menu3" class="tab-pane fade">
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-12 mb-3">
                                                    {{-- @if($ds_ho_so->count()>0) --}}
                                                   
                                                        <div class="icheck-inline">
                                                            @foreach($ds_ho_so as $dshs)
                                                            <label class="col-md-3 col-xs-6" style="margin: 0 0 10px 0;">
                                                                <input type="checkbox" name="hoso[]" value="{{$dshs->id_hoso}}" data-checkbox="icheckbox_minimal-blue" > {{ $dshs->ten }} </label>
                                                            @endforeach
                                                        </div>
                                                    {{-- @endif --}}
                                                
                                                </div>
                                            </div>
                                          </div>
                                        
                                        <div id="menu4" class="tab-pane fade">
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-4 mb-3">
                                                    <label >Phòng Ban</label>
                                                    <select name="phong_ban" class="form-control" style="-webkit-appearance: auto;" id="phong_ban">
                                                      <option selected value="">Chọn phòng ban</option>
                                                      @foreach($phongban as $pb)
                                                    <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                                @endforeach
                                                    </select>
                                                    <span id="phong_banf"></span>
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label >Chức Vụ</label>
                                                    <select name="chuc_vu" class="form-control" style="-webkit-appearance: auto;" id="chuc_vu">
                                                      <option selected value="">Chọn chức vụ</option>
                                                      @foreach($chucvu as $cv)
                                                    <option value="{{$cv->id_chucvu}}">{{$cv->ten_chuc_vu}}</option>
                                                @endforeach
                                                    </select>
                                                    <span id="chuc_vuf"></span>
                                                </div>
                                                <div class="form-group col-md-4 mb-3">
                                                    <label>Tên Nickname</label>
                                                    <input type="text" class="form-control" name="name" id="tennickname" placeholder="Nhập tên hoặc biệt danh">
                                                    <span id="tennicknamef"></span>
                                                  </div>
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
                            </form>
                    </div>
                </div>
            </div>
        </div>

                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            
</div>

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
@endsection