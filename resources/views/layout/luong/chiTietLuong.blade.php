 
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
                    <h2 class="pageheader-title">CHI TIẾT LƯƠNG</h2>
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
                        <h5 class="card-header">Chi Tiết Lương Tháng {{date('m',strtotime($luong->luong_thang))}} Của {{$luong->tbl_hosonhanvien->ho_ten}}</h5>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="luong_tong">Tổng Lương</label>
                                                <div class="form-control" name="luong_tong">{{number_format($luong->tong_tien_luong)}}</div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="so_gio_lam_viec">Số Giờ Làm Việc Trong Tháng</label>
                                                <div class="form-control" name="so_gio_lam_viec">{{round($luong->so_gio_lam_viec,2)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="">Thời Gian Tăng Ca Trong Tháng</label>
                                                <div class="form-control" name="">{{$tongtangca}}</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Tiền Lương Thêm Tương Ứng</label>
                                                <div class="form-control" name="">{{number_format($tientangca)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="thue_thu_nhap">Thuế Thu Nhập Phải Đóng</label>
                                                <div class="form-control" name="thue_thu_nhap">{{number_format($luong->thue_thu_nhap)}}</div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="thue_bao_hiem">Thuế Bảo Hiểm</label>
                                                <div class="form-control" name="thue_bao_hiem">{{number_format($luong->thue_bao_hiem)}}</div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="luong_thuong">Tiền Thưởng</label>
                                                <div class="form-control" name="luong_thuong">{{number_format($thuong)}}</div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ky_luat">Tiền Phạt</label>
                                                <div class="form-control" name="ky_luat">{{number_format($kyluat)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="luong_nhan">Lương Nhận</label>
                                                <div class="form-control" name="luong_nhan" aria-describedby="helper">
                                                    @if(isset($luong->tong_tien_luong) && isset($luong->thue_thu_nhap))
                                                        {{number_format($luongnhanduoc)}}
                                                    @endif
                                                </div>
                                                <small id="helper" class="text-muted">Cập nhật lần cuối vào : {{date('H:i:s d/m/Y',strtotime($luong->updated_at))}}</small><div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            {{-- <button class="btn btn-primary" onclick="windows.location.href='{{url('gi')}}'">Cập Nhật</button>
                                            <button class="btn btn-default" type="reset">Trở Về</button> --}}
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
    </div>
</div>

@endsection