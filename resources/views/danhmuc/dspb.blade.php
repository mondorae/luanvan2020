 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH PHÒNG BAN</h1>
                    </div>
                   
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if(session('thongbao'))
                                    <div class="alert alert-success ">
                                    {{session('thongbao')}}
                                    </div>
                                @endif
                                @if(session('thatbai'))
                                    <div class="alert alert-danger ">
                                    {{session('thatbai')}}
                                    </div>
                                @endif
                                    <div class="btn-group">
                                        <a class="btn btn-info mb-3" href="{{url('private/phongban/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Mã phòng ban</th>
                                                <th>Tên phòng ban</th>
                                                <th>Tác vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($phongban as $pb) 
                                            <tr class="even gradeC" align="center">
                                                <td>{{$pb->id_phongban}}</td>
                                                <td>{{$pb->ten_phong_ban}}</td>
                                                <td><a class="btn btn-warning" href="{{url('private/phongban/sua/'.$pb->id_phongban)}}"><i class="fa fa-edit mr-2"></i>Sửa</a> 
                                                    <a class="btn btn-danger" href="{{url('private/phongban/xoa/'.$pb->id_phongban)}}"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
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

        <!-- /#page-wrapper -->
@endsection