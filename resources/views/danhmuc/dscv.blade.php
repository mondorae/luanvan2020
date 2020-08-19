@extends('layout.index')
@section('content')
 
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH CHỨC VỤ</h1>
                    </div>
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if(session('thatbai'))
                                <div class="alert alert-danger">
                                {{session('thatbai')}}
                                </div>
                            @endif
                            @if(session('thanhcong'))
                            <div class="alert alert-success">
                            {{session('thanhcong')}}
                            </div>
                        @endif
                                    <div class="btn-group">
                                        <a class="btn btn-info mb-3" href="{{url('private/chucvu/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover mt-4" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Mã chức vụ</th>
                                                <th>Tên chức vụ</th>
                                                <th>Thuộc phòng ban</th>
                                                <th>Thuộc quyền</th>
                                                <th>Tác vụ</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($chucvu as $cv)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$cv->id_chucvu}}</td>
                                                <td>{{$cv->ten_chuc_vu}}</td>
                                                <td>{{$cv->tbl_phongban->ten_phong_ban}}</td>
                                                <td>{{$cv->ten_chuc_vu}} - {{$cv->tbl_phongban->ten_phong_ban}}</td>
                                                <td>
                                                    <a class="btn btn-warning" href="{{url('private/chucvu/sua/'.$cv->id_chucvu)}}"><i class="fa fa-edit mr-2"></i>Sửa</a> 
                                                    <a class="btn btn-danger" href="{{url('private/chucvu/xoa/'.$cv->id_chucvu)}}"onclick="return confirm('Bạn có chắc chắn muốn xóa chức vụ này không?');" title="Xóa"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
                                                {{-- <td><a class="btn btn-primary" href="{{url('private/chucvu/sua/'.$cv->id_chucvu)}}"><i class="fa fa-edit"></i>Quản lý quyền</a></td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="btn-group mt-4" >
                                        <a class="btn btn-info mb-3" href="{{url('private/phucap/danhsach')}}"><i class="fa fa-plus mr-2"></i>Quản lý phụ cấp của chức vụ</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection