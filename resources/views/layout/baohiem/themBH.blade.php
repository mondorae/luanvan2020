 
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
                    <h2 class="pageheader-title">THÊM THÔNG TIN BẢO HIỂM</h2>
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
                            <div class="alert alert-danger">
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
                                                <input type="text" class="form-control" name="id_nhanvien" value="{{$nhanvien->id_nhanvien}}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="nhan_vien">Nhân Viên</label>
                                                <input type="text" class="form-control" name="nhan_vien" value="{{$nhanvien->ho_ten}}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="chuc_vu">Chức Vụ</label>
                                                <input type="text" class="form-control" name="chuc_vu" value="{{$nhanvien->tbl_chucvu->ten_chuc_vu}}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="phong_ban">Phòng Ban</label>
                                                <input type="text" class="form-control" name="phong_ban" value="{{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="so_bhyt">Số Bảo Hiểm Y Tế</label>
                                                <input type="text" class="form-control" name="so_bhyt" placeholder="Số Bảo Hiểm Y Tế" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ngay_cap_bhyt">Ngày Cấp</label>
                                            <input type="date" class="form-control" name="ngay_cap_bhyt" required>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="noi_cap_bhyt">Nơi Cấp</label>
                                            <input type="text" class="form-control" name="noi_cap_bhyt" placeholder="Nơi Cấp Bảo Hiểm Y Tế"required>
                                            </div> 
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="so_bhxh">Số Bảo Hiểm Xã Hội</label>
                                                <input type="text" class="form-control" name="so_bhxh" placeholder="Số Bảo Hiểm Xã Hội" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ngay_cap_bhxh">Ngày Cấp</label>
                                            <input type="date" class="form-control" name="ngay_cap_bhxh" required>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label for="noi_cap_bhxh">Nơi Cấp</label>
                                            <input type="text" class="form-control" name="noi_cap_bhxh" placeholder="Nơi Cấp Bảo Hiểm Xã Hội"required>
                                            </div> 
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Lưu</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
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

@endsection