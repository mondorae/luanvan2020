 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

 <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
       
        
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
               




                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h1>DANH SÁCH NHÂN VIÊN BỊ KỶ LUẬT
                                </h1>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                            <a class="btn btn-info mb-5" href="{{url('private/quyetdinhthoiviec')}}" title="Lập quyết định đuổi việc"> <i class="fa fa-edit"></i> Thêm quyết định mới</a>
                            <table class="table table-striped table-bordered table-hover" id="data-tables">
                                <thead>
                                    <tr align="center">
                                        <th>Số thứ tự</th>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Chức vụ</th>
                                        <th style="width: 150.8px;">Nội dung (lý do)</th>
                                        <th>Người lập quyết định</th>
                                        <th>Ngày lập quyết định</th>
                                        <th>Ngày nghĩ việc</th>
                                        <th>Tình trạng</th>
                                        <th style="width: 120.8px;">Tác vụ</th>                              
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    @foreach($quyetdinh as $qd) 
                                    <tr class="even gradeC" align="center">
                                        <td>{{$count++}}</td>
                                        <td>{{$qd->id_nhanvien}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->ho_ten}}</td>
                                        <td>{{$qd->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</td>
                                        <td>{{$qd->noi_dung}}</td>
                                        <td>{{$qd->nguoi_lap_quyet_dinh}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_quyet_dinh))}}</td>
                                        <td>{{date('d-m-Y',strtotime($qd->ngay_nghi_viec))}}</td>
                                        <?php 
                                            $a=(strtotime($qd->ngay_nghi_viec)-strtotime(date("Y-m-d")) )/(60*60*24);

                                            ?>
                                            @if($a>=0)
                                            <td class=" label label-success" >Còn: {{$a}} ngày</td>
                                            @else
                                            <td class=" label label-danger">Hết hạn</td>
                                            @endif
                                        <td><a class="btn btn-primary mb-2" href="{{url('private/quyetdinh/pdf/'.$qd->id_nhanvien)}}">Xuất file pdf</a>
                                            <a class="btn btn-danger" href="{{url('private/quyetdinh/'.$qd->id_nhanvien)}}">Đuổi</a>
                                            <a class="btn btn-danger" href="{{url('private/huyquyetdinh/'.$qd->id_nhanvien)}}">Hủy</a>
                                        </td>                          
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
    </div>
</div>
@endsection