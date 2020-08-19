 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">THÔNG TIN CÔNG TY</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div  class="tab-pane fade in active show" >
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                      <div class="form-row mb-3">
                                        
                                          <div class="form-group col-md-8">
                                              <div class="form-row mb-3">
                                              <div class="form-group col-md-12">
                                              <label for="validationCustom01">Tên công ty</label>
                                              <label class="form-control mb-3">{{$thongtinchinh->ten_cong_ty}}</label>
                                                </div>

                                                <div class="form-group col-md-6">
                                                  <label for="ngaysinh">Địa chỉ</label>
                                                  <label class="form-control mb-3">{{$thongtinchinh->dia_chi}}</label>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label>Số điện thoại</label>
                                                    <br>
                                                    <label class="form-control mb-3">{{$thongtinchinh->sdt}}</label>
                                                </div>
                                             
                                                      <div class="form-group col-md-4">
                                                          <label>Fax</label>
                                                          <label class="form-control ">{{$thongtinchinh->Fax}}</label>
                                                      </div>
                                                      <div class="form-group col-md-4 ">
                                                          <label>Website</label>
                                                          <label class="form-control mb-3">{{$thongtinchinh->website}}</label>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                        <label for="noicapcmnd">Email</label>
                                                        <label class="form-control mb-3">{{$thongtinchinh->mail}}</label>
                                                      </div>
                                                      
                                                </div> 
                                                <div class="form-row mb-3">
                                                  <div class="form-group col-md-6">
                                                    <label>Người đại diện</label>
                                                    <label class="form-control mb-3">{{$thongtinchinh->nguoi_dai_dien}}</label>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                      <label for="ngaycapcmnd">Chức vụ</label>
                                                      <label class="form-control mb-3">{{$thongtinchinh->chuc_vu}}</label>
                                                  </div>
                                                 
                                                </div>
                                              </div>
                                                
                                          <div class="form-group col-md-3 ml-4 text-center">
                                            <div>
                                            <label>Ảnh - Logo Công ty</label>
                                            </div>
                                            <div>
                                             <img src="{{url('upload/logo/'.$thongtinchinh->Hinh)}}" style="width: 255px;height: 265px;">
                                              </div>
                                        </div>

                                          </div>
                                   
                                    
                                      </div>
                                        </div>    
                                    </div>
                                   <a class="btn btn-primary mr-5 " href="{{url('private/thongtin/congty/sua')}}">Sửa đổi thông tin</a>
                                </div>
                                
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- /#page-wrapper -->
@endsection