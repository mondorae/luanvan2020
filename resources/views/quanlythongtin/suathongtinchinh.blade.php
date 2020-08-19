 
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
                                    <form class="needs-validation"  action="{{url('private/thongtin/congty/sua')}}" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <div  class="tab-pane fade in active show" >
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                      <div class="form-row mb-3">
                                        
                                          <div class="form-group col-md-8">
                                              <div class="form-row mb-3">
                                              <div class="form-group col-md-12">
                                              <label for="validationCustom01">Tên công ty</label>
                                              <input type="text" class="form-control mb-3" name="ten_cong_ty" placeholder="" value="{{$thongtinchinh->ten_cong_ty}} " required>
                                                </div>

                                                <div class="form-group col-md-6">
                                                  <label for="ngaysinh">Địa chỉ</label>
                                                  <input type="text" class="form-control mb-3" name="dia_chi" placeholder="" value="{{$thongtinchinh->dia_chi}}" required>

                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label>Số điện thoại</label>
                                                    <br>
                                                    <input type="text" class="form-control mb-3" name="sdt" placeholder="" value="{{$thongtinchinh->sdt}}" required>
                                                </div>
                                             
                                                      <div class="form-group col-md-4">
                                                          <label>Fax</label>
                                                          <input type="text" class="form-control mb-3" name="Fax" placeholder="" value="{{$thongtinchinh->Fax}}" required>
                                                      </div>
                                                      <div class="form-group col-md-4 ">
                                                          <label>Website</label>
                                                          <input type="text" class="form-control mb-3" name="website" placeholder="" value="{{$thongtinchinh->website}}" required>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                        <label for="noicapcmnd">Email</label>
                                                        <input type="text" class="form-control mb-3" name="mail" placeholder="" value="{{$thongtinchinh->mail}}" required>
                                                      </div>
                                                      
                                                </div> 
                                                <div class="form-row mb-3">
                                                  <div class="form-group col-md-6">
                                                    <label>Người đại diện</label>
                                                    <input type="text" class="form-control mb-3" name="nguoi_dai_dien" placeholder="" value="{{$thongtinchinh->nguoi_dai_dien}}" required>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                      <label for="ngaycapcmnd">Chức vụ</label>
                                                      <input type="text" class="form-control mb-3" name="chuc_vu" placeholder="" value="{{$thongtinchinh->chuc_vu}}" required>
                                                  </div>
                                                 
                                                </div>
                                              </div>
                                                
                                          <div class="form-group col-md-3 ml-4 text-center">
                                            <div>
                                            <label>Ảnh - Logo Công ty</label>
                                            </div>
                                            <div>
                                             <img src="{{url('upload/logo/'.$thongtinchinh->Hinh)}}" style="width: 255px;height: 265px;">
                                             <input type="file" name="Hinh" class="form-control mt-3" style="width:250px" >
                                              </div>
                                        </div>

                                          </div>
                                   
                                    
                                      </div>
                                        </div>    
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                        <button class="btn btn-primary mr-5" type="submit"><i class="fa fa-save mr-2"></i>Lưu</button>
                                        <button type="reset" class="btn btn-primary"><i class="fas fa-sync-alt mr-2"></i>Làm mới</button>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- /#page-wrapper -->
@endsection