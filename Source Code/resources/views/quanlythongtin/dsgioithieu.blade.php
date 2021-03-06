 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH GIỚI THIỆU VỀ CÔNG TY:</h1>
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
                                        <a class="btn btn-info mb-3" href="{{url('private/thongtin/gioithieu/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th style="width:1000px">Nội dung</th>
                                                <th>Hình</th>
                                                <th>Tác vụ</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($thongtingioithieu as $ttgt)
                                             <tr class="odd gradeX" align="center">
                                            <td>{{$ttgt->id}}</td>
                                            <td>{{$ttgt->Ten}}</td>
                                             <td>{!!$ttgt->NoiDung!!}</td>
                                            <td><img src="{{url('upload/gioithieu/'.$ttgt->Hinh)}}" style="width: 100px;"></td>
                                            <td><a class="btn btn-warning" href="{{url('private/thongtin/gioithieu/sua/'.$ttgt->id)}}"><i class="fa fa-edit mr-2"></i>Sửa</a>
                                                <a class="btn btn-danger" href="{{url('private/thongtin/gioithieu/xoa/'.$ttgt->id)}}"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
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