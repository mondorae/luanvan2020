


 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

 <div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
       
        <div class="row">
            <div class="col-lg-12 ">
                <h1>HỢP ĐỒNG
                </h1>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            {{-- @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif --}}
                            <a class="btn btn-info mb-5" href="{{url('private/quyetdinhthoiviec')}}" title="Lập quyết định đuổi việc"> <i class="fa fa-edit"></i> Thêm quyết định mới</a>
                            <table class="table table-striped table-bordered table-hover" id="data-tables">
                                <thead>
                                    <tr align="center">
                                        <th>SỐ HỢP ĐỒNG</th>
                                        <th>LOẠI HỢP ĐỒNG</th>
                                        <th>TÊN NHÂN VIÊN</th>
                                        <th>NGÀY BẮT ĐẦU HỢP ĐỒNG</th>
                                        <th>MỨC LƯƠNG CƠ BẢN</th>
                                        <th>PHỤ CẤP</th>
                                        <th>NGÀY KẾT THÚC HỢP ĐỒNG</th>
                                        <th>NGƯỜI LẬP HỢP ĐỒNG</th>
                                        <th>TRẠNG THÁI</th>                          
                                    </tr>
                                </thead>
                                <tbody><?php $count=1 ?>
                                    @foreach($hopdong as $hd)
                                <tr class="even gradeC" align="center">
                                    <td>{{$hd->id_hopdong}}</td>
                                    <td>{{$hd->tbl_loaihopdong->ten_hop_dong}}</td>
                                    <td>{{$hd->tbl_hosonhanvien->ho_ten}}</td>
                                    <td>{{$hd->ngay_bat_dau_hop_dong}}</td>
                                    <td>{{$hd->muc_luong_chinh}}</td>
                                    <td>{{$hd->phu_cap}}</td>
                                    @if(isset($hopdong->ngay_ket_thuc_hop_dong))
                                                <td>{{date('d-m-Y',strtotime($hopdong->ngay_ket_thuc_hop_dong))}}</td>
                                                @else 
                                                <td>Vô hạn</td>
                                                @endif
                                    <td>{{$hd->nguoi_laphd}}</td>
                                    
                                                 {{-- @if(($phuluc->id_loaiphuluc==3)) --}}
                                               
                                               @if(isset($phuluc->tbl_chitietphuluc->ngay_ket_thuc))
                                               <?php 
                                               $a=(strtotime($phuluc->tbl_chitietphuluc->ngay_ket_thuc)- strtotime(date("Y-m-d")))/(60*60*24*30);
                                               ?>
                                               @if ($a <0) 
                                               <td class="label label-danger">Đã gia hạn: Hết hạn</td>
                                               
                                                    @elseif ($a >0 & $a<2 )
                                                    <td class=" label label-primary">Đã gia hạn: Sắp hết hạn </td>
                                                   @else 
                                               <td class=" label label-success">Đã gia hạn: Còn hạn </td>
                                               @endif
                                              @else
                                              @if(isset($hopdong->ngay_ket_thuc_hop_dong))
                                              <?php 
                                              $a=(strtotime($hopdong->ngay_ket_thuc_hop_dong)- strtotime(date("Y-m-d")))/(60*60*24*30);

                                              ?>
                                             
                                                  @if ($a <0)
                                                  <td class="label label-danger">Hết hạn</td>
                                              
                                                   @elseif ($a >0 & $a<2)
                                                   <td class=" label label-primary">Sắp hết hạn </td>
                                                  @else 
                                                  <td class=" label label-success">Còn hạn </td>
                                                  @endif
                                              @else
                                              
                                              <td class=" label label-success">Còn hạn </td>
                                              @endif
                                              @endif
                                    
                                    {{-- <td><a href="{{url('private/hopdong/'.$hd->id_nhanvien)}}">Xem Chi Tiết</a></td> --}}
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