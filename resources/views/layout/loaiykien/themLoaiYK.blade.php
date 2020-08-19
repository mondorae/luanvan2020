 
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
                    <h2 class="pageheader-title">Thêm Loại Ý Kiến </h2>
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
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                               </div>
                            @endif
                            <form class="needs-validation" method="POST" action="{{url('private/loaiykien/them')}}"novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                                    Looks good!
                                        </div> -->
                                        <label for="loai_y_kien">Loại Ý Kiến / Đề Xuất</label>
                                        <textarea class="form-control" id="" name="loai_y_kien" placeholder="" value=""></textarea>
                                        <div class="form-group">
                                            <label>Các Điều kiện Kèm Theo Ý Kiến </label><br/>
                                            <input type="checkbox" name="chi_tiet[]" value="1"> Nhân Viên Đề Xuất <br/>
                                            <input type="checkbox" name="chi_tiet[]" value="2"> Lý Do <br/>
                                            <input type="checkbox" name="chi_tiet[]" value="3"> Giá Tiền<br/>
                                            <input type="checkbox" name="chi_tiet[]" value="4"> Số Ngày Nghỉ<br/>
                                            <input type="checkbox" name="chi_tiet[]" value="5"> Ngày Bắt Đầu Nghỉ / Ngày Tăng Ca<br/>
                                            <input type="checkbox" name="chi_tiet[]" value="6"> Nộp Minh Chứng<br/>
                                            
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