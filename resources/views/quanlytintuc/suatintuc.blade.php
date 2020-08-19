 
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
                    <h2 class="pageheader-title">Sửa Tin Tức: <small>{{$tintuc->Ten}}</small> </h2>
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
                           
                        <form class="needs-validation" method="POST" action="{{url('private/tintuc/sua/'.$tintuc->id)}}" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-12">
                                                <label>Thể loại</label>
                                                <select class="form-control" name="TheLoai" style="-webkit-appearance: auto;" required>
                                                    @foreach($theloai as $tl)
                                                    <option 
                                                    @if($tintuc->loaitin->theloai->id==$tl->id)
                                                    {{"selected"}}
                                                    @endif
                                                    value="{{$tl->id}}">{{$tl->Ten}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Loại tin</label>
                                                <select class="form-control" name="LoaiTin" style="-webkit-appearance: auto;" required>
                                                    @foreach($loaitin as $lt)
                                                    <option 
                                                    @if($tintuc->loaitin->id==$lt->id)
                                                    {{"selected"}}
                                                    @endif 
                                                    value="{{$lt->id}}">{{$lt->Ten}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tiêu đề</label>
                                                <input class="form-control" name="TieuDe" rows="5" placeholder="Hãy nhập tiêu đề"  value="{{$tintuc->TieuDe}}" required />
                                            </div>
                                           
                                            <div class="form-group col-md-12">
                                                <label>Nội dung</label>
                                                    <textarea class="form-control" name="NoiDung"rows="15" required>{{$tintuc->NoiDung}}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <p><label>Hình ảnh</label></p>
                                              
                                                <img src="{{url('upload/tintuc/'.$tintuc->Hinh)}}"style="width: 400px;">
                                                
                                                <input type="file" name="Hinh" class="form-control mt-3" style="width:250px" >
                                            </div>
                                             <div class="form-group mt-5">
                                                <label>Nổi bật</label>
                                                <br>
                                                <label class="radio-inline mr-5 ml-5 mt-2" >
                                               
                                                <input type="radio" name="NotBat" value="1" style="display: inline"
                                                @if($tintuc->NoiBat==1) 
                                                    {{"checked"}}
                                                @endif>Có
                                            </label>
                                                 <label class="radio-inline mr-5 ml-5 mt-2">
                                                    <input type="radio" name="NotBat" value="0" style="display: inline" @if($tintuc->NoiBat==0) 
                                                    {{"checked"}}
                                                @endif>Không
                                                </label>
                                                
                
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