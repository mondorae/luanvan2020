 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid  dashboard-content">
                    <div class="col-lg-12">
                        <h1 class="page-header">LỊCH SỬ LƯƠNG NHÂN VIÊN</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                    <table class="table table-striped table-bordered" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>LƯƠNG THÁNG</th>
                                <th>LƯƠNG NHẬN</th>
                                <th>SỐ GIỜ LÀM VIỆC</th>
                                <th>CHI TIẾT</th>
                                <th>CẬP NHẬT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($luong as $l) 
                            <tr class="even gradeC" align="center">
                                <th>{{date('m / Y',strtotime($l->luong_thang))}}</th>
                                <td>{{round($l->so_gio_lam_viec,1)}}</td>
                                <td>
                                    @if(isset($l->tong_tien_luong) && isset($l->thue_thu_nhap))
                                        {{number_format(($l->tong_tien_luong - $l->thue_thu_nhap))}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{url('private/luong/chitiet/'.$l->id_bangluong)}}">Xem Chi Tiết</a>
                                </td>
                                <td>
                                    {{date('H:i d-m-Y',strtotime($l->updated_at))}}
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                <!-- /.row -->
            </div>
                        </div>
                    </div>
                </div>
                   
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection