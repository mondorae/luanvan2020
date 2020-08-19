 
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
                    <h2 class="pageheader-title">Thêm Tin Tức: </h2>
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

                       
                            
                        <div class="card-body">
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
                        <form class="needs-validation" method="POST" action="{{url('private/tintuc/them')}}"  enctype="multipart/form-data" >
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
                                                    <option value="">Chọn thể loại</option>
                                                    @foreach($theloai as $tl)
                                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Loại tin</label>
                                                <select class="form-control" name="LoaiTin" style="-webkit-appearance: auto;" required>
                                                    <option value="">Chọn loại tin</option>
                                                    @foreach($loaitin as $lt)
                                                    <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tiêu đề</label>
                                                <input class="form-control" name="TieuDe" rows="5" placeholder="Hãy nhập tiêu đề"  required />
                                            </div>
                                           
                                            <div class="form-group col-md-12">
                                                <label>Nội dung</label>
                                                    <textarea class="form-control" name="NoiDung" rows="15" required></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="Hinh" class="form-control">
                                            </div>
                                             <div class="form-group ml-3">
                                               
                                                <label>Nổi bật</label>
                                                <br>
                                                <label class="radio-inline mr-5 ml-5 mt-2" >
                                                    <input type="radio" name="NoiBat" value="1" checked="" style="display: inline">Có
                                                </label>
                                                <label class="radio-inline mr-5 ml-5 mt-2">
                                                    <input type="radio" name="NoiBat" value="0"  style="display: inline">Không
                                                </label>
                                             </div>
                                            </div>
                                        
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Thêm</button>
                                            <button class="btn btn-default" type="reset">Làm mới</button>
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