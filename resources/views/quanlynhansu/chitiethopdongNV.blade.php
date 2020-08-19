@extends('layout.index')
@section('content')


        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Chi tiết hợp đồng: {{$hopdong  ->id_hopdong}} </h1>
                       
                    </div>
                   
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">

                                                <th>TÊN NHÂN VIÊN</th>
                                               

                                                <th>NGÀY BẮT ĐẦU HỢP ĐỒNG</th>
                                                <th>MỨC LƯƠNG CƠ BẢN</th>
                                                <th>PHỤ CẤP</th>
                                                <th>NGÀY KẾT THÚC HỢP ĐỒNG</th>
                                                 
                                                
                                                
                                                <th>TÁC VỤ</th> 
                                                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr class="even gradeC" align="center">
                                                
                                               
                                                <td>{{$hopdong->tbl_hosonhanvien->ho_ten}}</td>
                                                
                                                <td>{{$hopdong->ngay_bat_dau_hop_dong}}</td>
                                                <td>{{$hopdong->muc_luong_chinh}}</td>
                                                <td>{{$hopdong->phu_cap}}</td>
                                                
                                                @if(isset($hopdong->ngay_ket_thuc_hop_dong))
                                                                            <td>{{date('d-m-Y',strtotime($hopdong->ngay_ket_thuc_hop_dong))}}</td>
                                                                            @else 
                                                                            <td>Vô hạn</td>
                                                                            @endif
                                                                             {{-- @if(($phuluc->id_loaiphuluc==3)) --}}
                                                                       
                                                {{-- <td><a class="btn btn-primary" href="" title="Lập phụ lục"> <i class="fa fa-edit"></i> Lập phụ lục</a></td> --}}
                                                <td>
                                                    {{-- <a class="btn btn-primary" href="{{url('private/hopdong/'.$hd->id_nhanvien)}}" title="Xem"> <i class="fa fa-eye"></i> Xem</a> --}}
                                                    <a class="btn btn-primary" href="{{url('private/laphopdong/pdf/'.$hopdong->id_hopdong)}}" title="Xuất file pdf"> <i class="fa fa-edit"></i> Xuất file pdf</a>
                                                    
                                    <a class="btn btn-warning" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                   
                                    
                                    <a class="btn btn-danger" href="" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân sự này không?');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a></td></td>

                                            </tr>
                                           
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