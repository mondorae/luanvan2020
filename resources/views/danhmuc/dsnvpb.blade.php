 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH NHÂN VIÊN PHÒNG BAN {{Auth::user()->tbl_hosonhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">    
                            <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>Số thứ tự</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Tình trạng</th>
                                <th style="width:230px">Tác vụ</th>
                                <th>Hành động</th>                                 
                            </tr>
                        </thead>
                        <tbody><?php $count=1 ?>
                            @foreach($nhanvien as $nv) 
                            <tr class="even gradeC" align="center">
                                <td>{{$count++}}</td>
                                <td>{{$nv->id_nhanvien}}</td>
                                <td>{{$nv->ho_ten}}</td>
                                <td>{{$nv->tbl_chucvu->ten_chuc_vu}}</td>
                                @if($nv->tinh_trang==1)
                                <td class="label-success" >Đang làm</td>
                                @else
                                <td class="label-danger">Đã nghỉ việc</td>
                                @endif
                                <td>
                                    
                                    <a class="btn btn-primary" href="{{url('private/thongtin/'.$nv->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                    
                                   
                                    <a class="btn btn-warning" href="{{url('private/suathongtin/'.$nv->id_nhanvien)}}" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                   
                                    
                                    <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a>
                                   </td>
                                   <td>
                                    <a class="btn btn-info mb-2" href="{{url('private/hopdong/nhanvien/'.$nv->id_nhanvien)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý hợp đồng</a>
                                   </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>
</div>
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
@endsection