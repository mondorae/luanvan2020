 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH NHÂN VIÊN KỶ LUẬT</h1>
                    </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Ngày Quyết Định</th>
                                                <th>Họ Tên Nhân Viên</th>
                                                <th>Phòng Ban / Chức Vụ</th>
                                                <th>Người Đề Xuất</th>
                                                <th>Người Duyệt</th>
                                                <th>Số Tiền</th>
                                                <th>Lý Do</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($kyluat as $kl) 
                                            <tr class="even gradeC" align="center">
                                                <td>{{$kl->updated_at}}</td>
                                                <td>{{$kl->nguoi_huong}}</td>
                                                <td>{{$kl->chuc_vu_2}}</td>
                                                <td>{{$kl->tbl->hosonhanvien->ho_ten}}</td>
                                                <td>{{$kl->nguoi_duyet_2}}</td>
                                                <td>{{$kl->gia_tri}}</td>
                                                <td>{{$kl->ly_do}}</td>
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