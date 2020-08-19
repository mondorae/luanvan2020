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
                    <h2 class="pageheader-title">CHI TIẾT BẢO HIỂM</h2>
                    {{-- <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                            </ol>
                        </nav>
                    </div> --}}
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
                            {{-- @if(count($errors)>0)
                            <div class="alert alert-danger">A
                                @foreach($errors->all() as $err)
                                {{$err}}<br>
                                @endforeach
                            </div>
                            @endif --}}
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <form name="myform" class="needs-validation" method="POST" action="{{url('private/baohiem/them/'.$nhanvien->id_nhanvien)}}" novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="id_nhanvien">Mã Nhân Viên</label>
                                                <span class="form-control md-3">{{$nhanvien->id_nhanvien}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nhan_vien">Nhân Viên</label>
                                                <span class="form-control">{{$nhanvien->ho_ten}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="chuc_vu">Chức Vụ</label>
                                                <span class="form-control">{{$nhanvien->tbl_chucvu->ten_chuc_vu}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="phong_ban">Phòng Ban</label>
                                                <span class="form-control">{{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="so_bhyt">Số Bảo Hiểm Y Tế</label>
                                                <span class="form-control">{{$nhanvien->tbl_baohiem->so_bhyt}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ngay_cap_bhyt">Ngày Cấp</label>
                                                <div class="form-control mb-3">{{date('d-m-Y',strtotime($nhanvien->tbl_baohiem->ngay_cap_bhyt))}}</div>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="noi_cap_bhyt">Nơi Cấp</label>
                                                <span class="form-control">{{$nhanvien->tbl_baohiem->noi_cap_bhyt}}</span>
                                            </div> 
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="so_bhxh">Số Bảo Hiểm Xã Hội</label>
                                                <span class="form-control">{{$nhanvien->tbl_baohiem->so_bhxh}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ngay_cap_bhxh">Ngày Cấp</label>
                                                <span class="form-control"> {{date('d-m-Y',strtotime($nhanvien->tbl_baohiem->ngay_cap_bhxh))}}</span>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="noi_cap_bhxh">Nơi Cấp</label>
                                                <span class="form-control">{{$nhanvien->tbl_baohiem->noi_cap_bhxh}}</span>
                                            </div> 
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <a class="btn btn-outline-primary" href="{{url('private/baohiem/sua/'.$nhanvien->id_baohiem)}}">Sửa</a>
                                            {{-- <button class="btn btn-default" type="reset">Reset</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
    </div>
</div>

@endsection>