@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

        <!-- /#page-wrapper -->
        <!-- ============================================================== -->


        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH PHỤ CẤP THEO CHỨC VỤ</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="btn-group">
                                        <a class="btn btn-info mb-3" href="{{url('private/phongban/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Vị trí</th>
                                               
                                                <th>Tiền ăn trưa</th>
                                                <th>Tiền xăng</th>
                                                <th>Khác</th>
                                                <th>Tổng tiền phụ cấp</th>
                                                <th>Tác vụ</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($phucap as $pc)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$pc->tbl_chucvu->ten_chuc_vu}} - {{$pc->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>
                                                
                                                <td>{{number_format($pc->an_trua)}} đ/tháng</td>
                                                <td>{{number_format($pc->xang_xe)}} đ/tháng</td>
                                                <td>{{number_format($pc->khac)}} đ/tháng</td>
                                                <td>{{number_format($pc->tong_tien_phu_cap)}} đ/tháng</td>
                                                <td><a class="btn btn-warning" href="{{url('private/phucap/sua/'.$pc->id_chucvu)}}"><i class="fa fa-edit mr-2"></i>Sửa</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection