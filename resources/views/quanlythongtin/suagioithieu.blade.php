 
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
                    <h2 class="pageheader-title">Sửa: <small>{{$thongtingioithieu->Ten}}</small> </h2>
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
                           
                        <form class="needs-validation" method="POST" action="{{url('private/thongtin/gioithieu/sua/'.$thongtingioithieu->id)}}" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            
                                            <div class="form-group col-md-4">
                                                <label>Tên</label>
                                                <input type="text" class="form-control" name="Ten" placeholder="Nhập tên loại tin" value="{{$thongtingioithieu->Ten}}" required/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <p><label>Hình ảnh</label></p>
                                              
                                                <img src="{{url('upload/gioithieu/'.$thongtingioithieu->Hinh)}}"style="width: 400px;">
                                                
                                                <input type="file" name="Hinh" class="form-control mt-3" style="width:400px" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Nội dung</label>
                                                <textarea class="form-control" id="editor1" name="NoiDung"rows="10" required>{{$thongtingioithieu->NoiDung}}</textarea>
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
