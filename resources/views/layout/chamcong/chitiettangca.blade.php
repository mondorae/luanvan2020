 
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
                    <h2 class="pageheader-title">Chi Tiết Tăng Ca Ngày {{date('d/m',strtotime($tangca->check_in))}}</h2>
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
                        <h5 class="card-header">Chi Tiết Tăng Ca</h5>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="gio_checkin">Giờ Vào</label>
                                                <div class="form-control" name="gio_checkin">{{date('H:i:s',strtotime($tangca->check_in))}}</div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="gio_checkout">Giờ ra</label>
                                                <div class="form-control" name="gio_checkout">{{date('H:i:s',($tangca->thoi_gian_lam * 3600) + strtotime($tangca->check_in))}}</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ket_qua">Kết Quả</label>
                                                    @if($tangca->ghi_nhan == 0)
                                                    <div class="text-secondary h4" name="ket_qua">Đang Chờ</div>
                                                    @elseif($tang_ca->ghi_nhan == 1)
                                                    <div class="text-success h4" name="ket_qua">Đã Duyệt</div>
                                                    @else
                                                    <div class="text-danger h4" name="ket_qua">Đã Từ Chối</div>
                                                    @endif
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="thoi_gian_lam">Thời Gian Làm</label>
                                                <div class="form-control" name="thoi_gian_lam">{{$tangca->thoi_gian_lam}}</div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="ly_do">Lý Do</label>
                                                <div class="form-control" name="ly_do">{{$tangca->ly_do}}</div>
                                            </div>
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