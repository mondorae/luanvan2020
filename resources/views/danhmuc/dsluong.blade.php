 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid  dashboard-content">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH LƯƠNG NHÂN VIÊN</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                    <!-- /.col-lg-12 -->
                    <div class="row">
                    <div class="col">
                        <form action="{{url('private/luong/update')}}" method="POST">
                            {{ csrf_field() }}
                            <input class="btn btn-primary btn-lg btn-block" type="submit" name="" value="cập nhật" />
                        </form>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            
                            <div class="card-body">
                    <table class="table table-striped table-bordered" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>LƯƠNG THÁNG</th>
                                <th>HỌ TÊN NHÂN VIÊN</th>
                                <th>SỐ GIỜ LÀM VIỆC</th>
                                <th>LƯƠNG NHẬN</th>
                                <th>CHI TIẾT</th>
                                <th>CẬP NHẬT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($luong as $l) 
                            <tr class="even gradeC" align="center">
                                <th>{{date('m / Y',strtotime($l->luong_thang))}}</th>
                                <td>{{$l->tbl_hosonhanvien->ho_ten}}</td>
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