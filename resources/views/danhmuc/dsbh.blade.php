@extends('layout.index')
@section('content')
 
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH NHÂN VIÊN</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover mt-4" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Họ Tên Nhân Viên</th>
                                                <th>Phòng Ban</th>
                                                <th>Chức Vụ</th>
                                                <th>Tác vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nhanvien as $nv)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$nv->ho_ten}}</td>
                                                <td>{{$nv->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>
                                                <td>{{$nv->tbl_chucvu->ten_chuc_vu}}</td>
                                                @if(isset($nv->id_baohiem))
                                                <td>
                                                    <a class="btn btn-primary" href="{{url('private/baohiem/chitiet/'.$nv->id_baohiem)}}">Chi Tiết</a>
                                                    <a class="btn btn-warning" href="{{url('private/baohiem/sua/'.$nv->id_baohiem)}}"><i class="fa fa-edit mr-2"></i>Sửa</a>
                                                    <a class="btn btn-danger" href="{{url('private/baohiem/xoa/'.$nv->id_baohiem)}}"><i class="fa fa-trash mr-2"></i>Xóa</a>
                                                </td>
                                                @else
                                                <td>
                                                    <a class="btn btn-warning" href="{{url('private/baohiem/them/'.$nv->id_nhanvien)}}"><i class="fa fa-edit mr-2"></i>Bổ Sung</a>
                                                </td>
                                                @endif
                                                {{-- <td><a class="btn btn-primary" href="{{url('private/chucvu/sua/'.$nv->id_chucvu)}}"><i class="fa fa-edit"></i>Quản lý quyền</a></td> --}}
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