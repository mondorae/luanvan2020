@extends('layout.index')
@section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH HỢP ĐỒNG</h1>
                        
                    </div>
                   
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if(session('thongbao'))
                                    <div class="alert alert-success ">
                                    {{session('thongbao')}}
                                    </div>
                                @endif
                                    <!-- /.col-lg-12 -->
                                    <h3>Nhân viên: {{$nhanvien->ho_ten}}</h3>
                                    <a class="btn btn-info mb-5" href="{{url('private/laphopdong/'.$nhanvien->id_nhanvien)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Thêm hợp đồng mới</a>
                                    <h3 style="">Hợp đồng mới nhất (hợp đồng đang sử dụng):</h3>
                                    <table class="table table-striped table-bordered table-hover" >
                                        
                                        <thead>
                                            <tr align="center">
                                                <th>SỐ HỢP ĐỒNG</th>
                                                
                                                <th>NGÀY LẬP HỢP ĐỒNG</th>
                                                
                                                <th>LOẠI HỢP ĐỒNG</th>
                                                <th>NGƯỜI LẬP HỢP ĐỒNG</th>
                                                
                                                 
                                                <th style="width: 210px;">TÁC VỤ</th> 
                                                <th>HÀNH ĐỘNG</th>                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hopdong as $hd)
                                            @if($hd->trang_thai==1)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$hd->id_hopdong}}</td>
                                                

                                                <td>{{date('d-m-Y',strtotime($hd->created_at))}}</td>
                                                
                                                <td>{{$hd->tbl_loaihopdong->ten_hop_dong}}</td>
                                                <td>{{$hd->nguoi_laphd}}</td>
                                                <td>
                                                
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-eye"></i>
                                                        Xem
                                                    </button>
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                          <div class="modal-content" style="padding: 10px;padding-bottom: 40px;">
                                                              <div>
                                                                  <h3>Chi tiết hợp đồng: {{$hd->id_hopdong}}</h3>
                                                                <table class="table table-striped table-bordered table-hover">
                                                                    <thead>
                                                                        <tr align="center">
                            
                                                                            <th>TÊN NHÂN VIÊN</th>
                                                                           
                            
                                                                            <th>NGÀY BẮT ĐẦU HỢP ĐỒNG</th>
                                                                            <th>MỨC LƯƠNG CƠ BẢN</th>
                                                                            <th>PHỤ CẤP</th>
                                                                            <th>NGÀY KẾT THÚC HỢP ĐỒNG</th>
                                                                             <th>TRẠNG THÁI</th>
                                                                            
                                                                            
                                                                            {{-- <th>TÁC VỤ</th>  --}}
                                                                                                     
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                       
                                                                        <tr class="even gradeC" align="center">
                                                                            
                                                                           
                                                                            <td>{{$hd->tbl_hosonhanvien->ho_ten}}</td>
                                                                            
                                                                            <td>{{$hd->ngay_bat_dau_hop_dong}}</td>
                                                                            <td>{{number_format($hd->muc_luong_chinh)}} đ/tháng</td>
                                                                            <td>{{number_format($hd->phu_cap)}} đ/tháng</td>
                                                                            @if(isset($hd->ngay_ket_thuc_hop_dong))
                                                                            <td>{{date('d-m-Y',strtotime($hd->ngay_ket_thuc_hop_dong))}}</td>
                                                                            @else 
                                                                            <td>Vô hạn</td>
                                                                            @endif
                                                                            @if(isset($phuluc))
                                                                             @if(($phuluc->id_loaiphuluc==3))
                                                                           
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
                                                                           @endif
                                                                           @endif
                                                                          @else
                                                                          @if(isset($hd->ngay_ket_thuc_hop_dong))
                                                                          <?php 
                                                                          $a=(strtotime($hd->ngay_ket_thuc_hop_dong)- strtotime(date("Y-m-d")))/(60*60*24*30);
                            
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
                                                                            
                                                                            {{-- <td><a class="btn btn-primary" href="" title="Lập phụ lục"> <i class="fa fa-edit"></i> Lập phụ lục</a></td> --}}
                                                                            {{-- <td>
                                                                                <a class="btn btn-primary" href="{{url('private/laphopdong/pdf/'.$hd->id_hopdong)}}" title="Xuất file pdf"> <i class="fa fa-edit"></i> Xuất file pdf</a>
                                                                                
                                                                <a class="btn btn-warning" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                               
                                                                
                                                                <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a></td></td> --}}
                            
                                                                        </tr>
                                                                       
                                                                    </tbody>
                                                                </table>
                                                             </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    {{-- <a class="btn btn-info mb-2" href="{{url('private/phuluc/'.$hd->id_hopdong)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý phụ lục</a>
                                                    <br> --}}
                                    
                                    <a class="btn btn-warning " href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                   
                                    
                                    <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a></td></td>

                                    <td>
                                        {{-- <a class="btn btn-primary" href="{{url('private/hopdong/'.$hd->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem</a> --}}
                                        <a class="btn btn-primary mb-2" href="{{url('private/laphopdong/pdf/'.$hd->id_hopdong)}}" title="Xuất file pdf"> <i class="fa fa-edit"></i> Xuất file pdf</a>
                        <a class="btn btn-info mb-2" href="{{url('private/phuluc/'.$hd->id_hopdong)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý phụ lục</a>
                        
                                    </td>
                                            </tr>
                                            @endif 
                                            @endforeach
                                        </tbody>
                                        


                                        {{-- hop dong cu --}}


                                    </table>
                                   
                                    
                                   
                                    <h3 class=" mt-5">Các hợp đồng cũ:</h3>
                                    
                                   
                                     
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            
                                            <tr align="center">
                                                <th>SỐ HỢP ĐỒNG</th>
                                                
                                                <th>NGÀY LẬP HỢP ĐỒNG</th>
                                                
                                                <th>LOẠI HỢP ĐỒNG</th>
                                                <th>NỘI DUNG CÔNG VIỆC</th>
                                                <th>NGÀY BẮT ĐẦU HỢP ĐỒNG</th>
                                                <th>LƯƠNG</th>
                                                <th>PHỤ CẤP</th>
                                                <th>NGÀY KẾT THÚC HỢP ĐỒNG</th>
                                                <th>NGƯỜI LẬP HỢP ĐỒNG</th>

                                                
                                                 
                                                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hopdong as $hd)
                                            @if($hd->trang_thai==0)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$hd->id_hopdong}}</td>
                                                

                                                <td>{{date('d-m-Y',strtotime($hd->created_at))}}</td>
                                                
                                                <td>{{$hd->tbl_loaihopdong->ten_hop_dong}}</td>
                                                <td>
                                                    @if(isset($hd->noi_dung_cv))
                                                        {{$hd->noi_dung_cv}}
                                                    @else 
                                                    Theo hợp đồng
                                                    @endif
                                                </td>
                                                <td>{{$hd->ngay_bat_dau_hop_dong}}</td>
                                                <td>{{number_format($hd->muc_luong_chinh)}} đ/tháng</td>
                                                <td>{{number_format($hd->phu_cap)}} đ/tháng</td>
                                                <td>{{$hd->ngay_ket_thuc_hop_dong}}</td>
                                                <td>{{$hd->nguoi_laphd}}</td>
                                                
                                                    {{-- <a class="btn btn-primary " href="{{url('private/chitiethopdong/'.$hd->id_hopdong)}}" title="Xem"> <i class="fa fa-edit"></i> Xem</a> --}}
                                                  
                                    {{-- <a class="btn btn-info mb-2" href="{{url('private/phuluc/'.$hd->id_hopdong)}}" title="Lập phụ lục"> <i class="fa fa-edit"></i> Quản lý phụ lục</a>
                                                    <br> --}}
                                    
                                    {{-- <a class="btn btn-warning " href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                   
                                    
                                    <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a></td> --}}

                                    
                                            </tr>
                                            @endif 
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
