 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        {{-- @if(isset($hopdong))
        <div class="row">
            <div class="col-lg-12 ">
                <h1>LẬP HỢP ĐỒNG
                </h1>
                @if (isset($nhanvien) )
                <h4 style="margin-left:3% ">Bạn đã lập hợp đồng cho: {{$nhanvien->ho_ten}} thành công!!</h4>
                <a class="btn btn-primary mr-5 " href="{{url('private/laphopdong/pdf/'.$nhanvien->id_nhanvien)}}">Xuất file PDF!!</a>
                @endif
            </div>
        </div>
        @else --}}
        <div class="row">
            <div class="col-lg-12 ">
                <h1>LẬP HỢP ĐỒNG
                </h1>
                @if (isset($nhanvien) )
                <h4 style="margin-left:3% ">{{$nhanvien->tbl_chucvu->ten_chuc_vu}}: {{$nhanvien->ho_ten}}</h4>
                @endif
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
                            @if(session('thongbao'))
                            <div class="alert alert-success">
                            {{session('thongbao')}}
                            </div>
                            @endif
                           
                            <form class="needs-validation"  action="{{url('private/laphopdong/'.$nhanvien->id_nhanvien)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                           
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-6">
                                                    <label >Loại hợp đồng</label>
                                                    
                                                    <select id="ten_hop_dong" name="ten_hop_dong" class="form-control" style="-webkit-appearance: auto;" required>
                                                        <option  value="0"> Chọn Loại Hợp Đồng</option>
                                                        @foreach($loaihd as $lhd)
                                                            <option value="{{$lhd->id_loaihopdong}}">{{$lhd->ten_hop_dong}}</option>
                                                            @endforeach
                                                    </select>
                                                    
                                                   
                                                </div>
                                                
                                                <div class="form-group col-md-3 show time" id="time">
                                                  <label>Ngày bắt đầu hợp đồng</label>
                                                  <input type="date" class="form-control" name="ngay_bat_dau_hop_dong" required>
                                                </div>
                                              
                                                <div class="form-group col-md-3 show ketthuc" id="ketthuc">
                                                    <label>Ngày kết thúc hợp đồng</label>
                                                    <input type="date" class="form-control" name="ngay_ket_thuc_hop_dong">
                                                  </div>
                                                
                                               
                                            </div>
                                           
                                            <div class="form-row mb-3 show ndthoivu" id="ndthoivu">
                                                
                                                <div class="form-group col-md-12">
                                                    <label >Nội dung công việc thời vụ:</label>
                                                    
                                                    <textarea class="form-control" id="noi_dung" name="noi_dung_cv" placeholder="Nhập nội dung" ></textarea>
                                                </div>
                                                
                                               
                                            
                                            </div>
                                            <div class="show luong" id="luong">
                                            <div class="form-row mb-3 ">
                                                <div class="form-group col-md-6 mt-3">
                                                  <label >Mức lương chính</label>
                                                  <input type="text" class="form-control" name="muc_luong_chinh" placeholder="Nhập mức lương chính( lương cơ bản)" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label >Phụ cấp với chức vụ: {{$nhanvien->tbl_chucvu->ten_chuc_vu}} </label>
                                                    <div class="form-row mb-3">
                                                    <div class="form-group col-md-3">
                                                    <p class=" ml-4 mb-4">Ăn trưa</p>
                                                    <p class="ml-4 mb-4">Xăng xe</p>
                                                    <p class="ml-4 mb-4">Khác</p>
                                                    <div class="gach" style="background-color: red;
                                                    width: 300px;
                                                    height: 2px;"></div>
                                                    <p class="ml-4 mt-4">Tổng tiền</p>
                                                    
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                    <label type="text" class="form-control text-center" name="muc_luong_chinh">{{($phucap->an_trua)}}đ/tháng</label>
                                                    <label type="text" class="form-control text-center" name="muc_luong_chinh">{{($phucap->xang_xe)}}đ/tháng</label>
                                                    <label type="text" class="form-control text-center" name="muc_luong_chinh">{{($phucap->khac)}}đ/tháng</label>
                                                    <label type="text" class="form-control text-center mt-5" name="muc_luong_chinh">{{($phucap->tong_tien_phu_cap)}}đ/tháng</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @endif --}}
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                            <button class="btn btn-primary mr-5" type="submit">Thêm</button>
                                            <button type="reset" class="btn btn-primary">Làm mới</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
            {{-- @endif --}}
    </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#phong_ban").change(function(){
                var id_phongban=$(this).val();
                $.get("ajax/chucvu/"+id_phongban,function(data){
                    $("#chuc_vu").html(data);
                });
            });
        });
    
    $('#ten_hop_dong').on('change', function() {
         
        if(this.value == "1") {
            $('#time').show();
          $('#ketthuc').show();
          $('#luong').show();
          $('#ndthoivu').hide();
          $('#dem1').show();
          $('#dem2').hide();
          $('#dem3').hide();

        } 
        else if (this.value == "2") {
            $('#time').show();
          $('#ketthuc').hide();
          $('#luong').show();
          $('#ndthoivu').hide();
          $('#dem1').hide();
          $('#dem2').show();
          $('#dem3').hide();
        }
        else if (this.value == "3") {
            $('#time').show();
          $('#ketthuc').show();
          $('#luong').show();
          $('#ndthoivu').show();
          $('#dem1').hide();
          $('#dem2').hide();
          $('#dem3').show();
        }
        else   {
            $('#time').hide();
          $('#ketthuc').hide();
          $('#luong').hide();
          $('#ndthoivu').hide();
          $('#dem1').hide();
          $('#dem2').hide();
          $('#dem3').hide();
        }
      
      });
    </script>   
@endsection