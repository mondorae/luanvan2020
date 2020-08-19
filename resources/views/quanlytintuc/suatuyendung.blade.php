 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Sửa tuyển dụng:  </h2>
                </div>
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
                       

                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao'))
                            <div class="alert alert-success mt-3">
                            {{session('thongbao')}} </div>
                            @endif
                        <div class="card-body">
                           
                        <form class="needs-validation" method="POST" action="{{url('private/tintuc/tuyendung/sua/'.$tuyendung->id)}}" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            
                                            {{-- <div class="form-group col-md-4">
                                                <label>Tên</label>
                                                <input type="text" class="form-control" name="Ten" placeholder="Nhập lĩnh vực kinh doanh" value="{{$linhvuckinhdoanh->Ten}}" />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <p><label>Hình ảnh</label></p>
                                              
                                                <img src="{{url('upload/linhvuc/'.$linhvuckinhdoanh->Hinh)}}"style="width: 400px;">
                                                
                                                <input type="file" name="Hinh" class="form-control mt-3" style="width:400px" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nội dung</label>
                                                <textarea class="form-control" name="NoiDung"rows="10" placeholder="Nhập nội dung lĩnh vực kinh doanh">{{$linhvuckinhdoanh->NoiDung}}</textarea>
                                            </div>
                                        </div> --}}

                                        <div class="form-group col-md-6">
                                            <label>Vị trí</label>
                                            <select name="vi_tri" class="form-control" style="-webkit-appearance: auto;" id="chuc_vu" required>
                                                <option selected value="">Chọn vị trí</option>
                                                @foreach($chucvu as $cv)
                                              <option @if($tuyendung->vi_tri==$cv->id_chucvu) {{"selected"}} @endif value="{{$cv->id_chucvu}}">{{$cv->ten_chuc_vu}} - {{$cv->tbl_phongban->ten_phong_ban}}</option>
                                            @endforeach
                                              </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Hình ảnh kèm theo (nếu có)</label>
                                            @if($tuyendung->Hinh!=null)
                                            <img src="{{url('upload/linhvuc/'.$tuyendung->Hinh)}}"style="width: 100%;height:200px">
                                            @endif
                                            <input type="file" name="Hinh" class="form-control mt-2">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mức lương tuyển dụng</label>
                                                <input type="text" class="form-control" name="muc_luong" placeholder="Từ... đến..." value="{{$tuyendung->muc_luong}}" required/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Hạn nộp hồ sơ</label>
                                            <input type="date" class="form-control" name="han_nop" value="{{$tuyendung->han_nop}} " required>
                                                
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Mail nhận tuyển dụng</label>
                                            <input type="email" class="form-control" name="mail_nhan_tin" value="{{$tuyendung->mail_nhan_tin}}" required>
                                                
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Nội dung</label>
                                                <textarea class="form-control" id="editor1" name="NoiDung" rows="10" placeholder="Nhập nội dung giới thiệu" required>{!!$tuyendung->NoiDung!!}</textarea>
                                        </div>
                                        
                                        
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Sửa</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
            </div>
    </div>
</div>

@endsection