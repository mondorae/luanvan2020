 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH TIN TUYỂN DỤNG</h1>
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
                                        <a class="btn btn-info mb-3" href="{{url('private/tintuc/tuyendung/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>STT</th>
                                                <th style="width: 130px">Vị trí</th>
                                                <th>Mức lương</th>
                                                <th style="width: 57px">Hạn nộp</th>
                                               
                                                <th >Nội dung</th>
                                                <th style="width: 120px">Tác vụ</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody><?php $count=1 ?>
                                            @foreach($tuyendung as $td)
                                             <tr class="odd gradeX" align="">
                                            <td>{{$count++}}</td>
                                            <td>{{$td->tbl_chucvu->ten_chuc_vu}}-{{$td->tbl_chucvu->tbl_phongban->ten_phong_ban}}
                                            <br>
                                            @if($td->Hinh!=null)
                                            <img src="{{url('upload/linhvuc/'.$td->Hinh)}}" style="width: 100px;height:60px"></td>
                                            @endif
                                            <td>{{$td->muc_luong}}</td>
                                            <td >{{date('d-m-Y',strtotime($td->han_nop))}}</td>
                                            
                                             <td style="display: block;overflow: scroll; height: 195px;">Mail nhận tuyển dụng: {{$td->mail_nhan_tin}}
                                                <br>
                                                Nội dung: {!!$td->NoiDung!!}</td>
                                            
                                            <td><a class="btn btn-warning" href="{{url('private/tintuc/tuyendung/sua/'.$td->id)}}"><i class="fa fa-edit mr-2"></i>Sửa</a>
                                                <a class="btn btn-danger" href="{{url('private/tintuc/tuyendung/xoa/'.$td->id)}}"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
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