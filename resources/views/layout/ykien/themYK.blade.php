 
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
                    <h2 class="pageheader-title">Thêm Ý Kiến </h2>
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
                        <h5 class="card-header">Thêm Ý Kiến</h5>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <form class="needs-validation" method="POST" action="{{url('private/ykien/them')}}"novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <label >Loại Ý Kiến</label>
                                        <select name="id_ykien" id="id_ykien" class="form-control" style="-webkit-appearance: auto;">
                                            <option selected> Chọn Loại Ý Kiến</option>
                                                @foreach($loaiykien as $lyk)
                                                    <option value="{{$lyk->id_ykien}}">{{$lyk->loai_y_kien}}</option>
                                                @endforeach
                                        </select>
                                        <!-- Số 1 -->
                                        <label for="nguoi_de_xuat" class="y-kien {{$chucnang[1]}}" >Người được đề xuất</label>
                                        <input type="text" class="form-control y-kien 9 10{{$chucnang[1]}}" name="nguoi_de_xuat" >
                                        <label for="truong_hop" class="y-kien 3">Các Loại Nghỉ Phép Riêng</label>
                                        <select name="truong_hop" id="truong_hop" class="form-control col-md-3 y-kien 3" style="-webkit-appearance: auto;">
                                            <option selected> --Chọn--</option>
                                                    <option value="1">Kết Hôn</option>
                                                    <option value="2">Con Cái Kết Hôn</option>
                                                    <option value="3">Người Thân Mất</option>
                                        </select>
                                        <div class="text-muted y-kien 3">*Người Thân Mất* được tính theo pháp luật gồm: Bố đẻ, mẹ đẻ, bố vợ, mẹ vợ hoặc bố chồng, mẹ chồng, vợ hoặc chồng, con</div>
                                        <!-- Số 2 -->
                                        <label for="ly_do" class="y-kien {{$chucnang[2]}}">Nội dung (lý do)</label>
                                        <textarea class="form-control y-kien {{$chucnang[2]}}" name="ly_do" placeholder=""></textarea>
                                        <!-- Số 3 -->
                                        <label for="gia_tri" class="y-kien {{$chucnang[3]}}" >Số tiền</label>
                                        <input type="text" class="form-control y-kien {{$chucnang[3]}}" name="gia_tri" placeholder="Giá trị" value="" >
                                        <label for="phong_ban" class="y-kien 8">Chọn Phòng Ban Mong Muốn</label>
                                        <select name="phong_ban" id="phong_ban" class="form-control y-kien 8" style="-webkit-appearance: auto;">
                                            <option value="0"selected>--Phòng-- </option>
                                            @foreach($phongban as $pb)
                                                    <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <select name="chuc_vu" id="chuc_vu" class="form-control y-kien 8" style="-webkit-appearance: auto;">
                                            <option selected> Chọn Chức Vụ</option>
                                            {{-- @foreach($phongban as $pb)
                                                    <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                            @endforeach
                                        </select> --}}
                                        <!-- số 4 -->
                                        <label for="thoi_gian_nghi" class="y-kien {{$chucnang[4]}}" >Thời gian nghỉ (ngày)</label>
                                        <input type="text" class="form-control y-kien {{$chucnang[4]}}" name="thoi_gian_nghi" placeholder="Ngày" >
                                        <!-- số 5 -->
                                        <label for="ngay_bat_dau" class="y-kien {{$chucnang[5]}}" >Bắt đầu từ ngày / Ngày tăng ca</label>

                                        {{-- <label for="ngay_bat_dau" class="y-kien 7" >Ngày tăng ca</label> --}}
                                        <input type="date" class="form-control y-kien {{$chucnang[5]}}" name="ngay_bat_dau" >
                                        <!-- Số 6 -->
                                        <label for="nop_minh_chung" class="y-kien {{$chucnang[6]}}">Nộp Minh Chứng (Hình Ảnh)</label>
                                        <input type="file" class="form-control y-kien {{$chucnang[6]}}" name="nop_minh_chung" accept="image/png, image/jpeg, image/jpg">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Lưu</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                            <a class="btn btn-outline-danger" href="javascript:history.back()">Hủy</a>
                                        </label>
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
</div>
@endsection