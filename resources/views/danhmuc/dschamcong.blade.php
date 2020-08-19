 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid  dashboard-content">
                <div class="col-lg-12">
                    <h1 class="page-header">DANH SÁCH CHẤM CÔNG THÁNG {{date('m')}}</h1>
                </div>
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                    <!-- /.col-lg-12 -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="data-tables">
                                    <thead>
                                       <tr align="center">
                                            <th>Ngày</th>
                                            <th>Nhân Viên</th>
                                            <th>Giờ Vào</th>
                                            <th>Giờ ra</th>
                                            <th>Tăng ca</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($chamcong as $cc) 
                                        <tr class="even gradeC" align="center">
                                            <td>{{date('d/m',strtotime($cc->check_in))}}</td>
                                            <td>{{$cc->tbl_bangluong->tbl_hosonhanvien->ho_ten}}</td>
                                            <td>{{date('H:i:s',strtotime($cc->check_in))}}</td>
                                            <td>
                                            @if(isset($cc->thoi_gian_lam))
                                                {{date('H:i:s',($cc->thoi_gian_lam * 3600) + strtotime($cc->check_in))}} <!-- cong thuc bi sai -->
                                            @else
                                                Đang Làm Việc
                                            @endif
                                            </td>
                                            <td>
                                            @if(isset($cc->id_tangca))
                                                Có tăng ca <a href="{{url('private/chamcong/tangca/chitiet/'.$cc->id_tangca)}}"> (xem lý do)</a>
                                            @else
                                                Không có    
                                            @endif
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