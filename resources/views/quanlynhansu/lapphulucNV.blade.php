 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-lg-12 ">
                <h1>LẬP PHỤ LỤC
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
                            @if(session('thongbao'))
                            <div class="alert alert-success">
                            {{session('thongbao')}}
                            </div>
                            @endif
                            <form class="needs-validation"  action="{{url('private/lapphuluc/'.$hopdong->id_hopdong)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                           
                                            <div class="form-row mb-3">
                                                <div class="form-group col-md-4">
                                                    <label >Loại phụ lục</label>
                                                    <select id="ten_hop_dong" name="ten_hop_dong" class="form-control" style="-webkit-appearance: auto;" required>
                                                        <option selected value="" required> Chọn Loại phụ lục</option>
                                                        @foreach($loaipl as $lpl)
                                                            <option value="{{$lpl->id}}">{{$lpl->ten_phu_luc}}</option>
                                                            @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="output">
                                                <div class="show luong" id="luong">
                                            <div class="form-row mb-3 "  >
                                                <div class="form-group col-md-12">
                                                <div class="form-row ">
                                                <div class="form-group col-md-3">
                                                    <label>Mức lương cũ (đơn vị VNĐ)</label>
                                                    <label class="form-control ">{{number_format($hopdong->muc_luong_chinh)}}</label>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Nhập mức lương mới (đơn vị VNĐ)</label>
                                                    <input type="text" class="form-control" name="thay_doi_luong" required>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="show chucvu" id="chucvu">
                                            <div class="form-row mb-3 ">
                                                <div  class="form-group col-md-6 mt-3">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Phòng ban cũ</label>
                                                            <label class="form-control ">{{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</label>
                                                            
                                                        </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Chức vụ cũ</label>
                                                        <label class="form-control ">{{$nhanvien->tbl_chucvu->ten_chuc_vu}}</label>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-md-2 mt-3 text-center">
                                                        <label>Phụ cấp với chức vụ cũ:  </label>
                                                    </div>
                                                    <div class="form-group col-md-3 mt-3">
                                                        <div class="form-row mb-3">
                                                        <div class="form-group col-md">
                                                        <p class=" ml-4 mb-4">Ăn trưa: {{$hopdong->tbl_phucap->an_trua}}</p>
                                                        <p class="ml-4 mb-4">Xăng xe: {{$hopdong->tbl_phucap->xang_xe}}</p>
                                                        <p class="ml-4 mb-4">Khác: {{$hopdong->tbl_phucap->khac}}</p>
                                                        <div class="gach" style="background-color: red;
                                                        width: 300px;
                                                        height: 2px;"></div>
                                                        <p class="ml-3 mt-4">Tổng tiền: {{$hopdong->tbl_phucap->tong_tien_phu_cap}}</p>
                                                        
                                                        </div>
                                                        {{-- <div class="form-group col-md-3">
                                                        <label type="text" class="form-control text-center" name="muc_luong_chinh"></label>
                                                        <label type="text" class="form-control text-center" name="muc_luong_chinh"></label>
                                                        <label type="text" class="form-control text-center" name="muc_luong_chinh"></label>
                                                        <label type="text" class="form-control text-center" name="muc_luong_chinh"></label>
                                                        <label type="text" class="form-control text-center mt-5" name="muc_luong_chinh"></label>
                                                            </div> --}}
                                                        </div>
                                                    
                                                    
                                                   
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="form-row mb-3" >
                                                <div class="form-group col-md-6 mt-3">
                                                    
                                                    <div class="form-row  ">
                                                    <div class="form-group col-md-6">
                                                        <label>Phòng ban mới</label>
                                                        <select name="phong_ban" class="form-control" style="-webkit-appearance: auto;" id="phong_ban_moi" required>
                                                            <option selected value="" >Chọn phòng ban</option>
                                                            @foreach($phongban as $pb)
                                                          <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                                      @endforeach
                                                          </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Chức vụ mới</label>
                                                        <select name="chuc_vu_moi" class="form-control" style="-webkit-appearance: auto;" id="chuc_vu_moi" required>
                                                            <option selected value="" required>Chọn chức vụ</option>
                                                            @foreach($chucvu as $cv)
                                                          <option value="{{$cv->id_chucvu}}">{{$cv->ten_chuc_vu}}</option>
                                                      @endforeach
                                                          </select>
                                                    </div>
                                                    </div>
                                                
                                                  {{-- <label >Mức lương chính</label>
                                                  <input type="text" class="form-control" name="muc_luong_chinh" placeholder="Nhập mức lương chính( lương cơ bản)"> --}}
                                                </div>
                                                <div class="form-group col-md-2 mt-3 text-center">
                                                    <label>Phụ cấp với chức vụ mới:  </label>
                                                </div>
                                                <div class="form-group col-md-3 mt-3" >
                                                    <div class="form-row mb-3">
                                                    <div class="form-group col-md" id="phu_cap_moi">
                                                    <p class=" ml-4 mb-4">Ăn trưa</p>
                                                    <p class="ml-4 mb-4">Xăng xe</p>
                                                    
                                                    <p class="ml-4 mb-4">Khác</p>
                                                    <div class="gach" style="background-color: red;
                                                    width: 150px;
                                                    height: 2px;"></div>
                                                    <p class="ml-3 mt-4">Tổng tiền</p>
                                                    
                                                    </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    </div>
                                                    </div>
                                                    <div class="show giahan" id="giahan">
                                                        <div class="form-row mb-3">
                                                            @if($hopdong->id_loaihopdong==2)
                                                                <div class="form-group col-md-6">
                                                                    <label>Là nhân viên có hợp đồng không thời hạn, không thể gia hạn!!</label>
                                                                    
                                                                  </div>
                                                            
                                                            @else
                                                            
                                                        <div class="form-group col-md-4">
                                                            <label>Loại hợp đồng lao động cũ</label>
                                                            <label class="form-control ">{{$hopdong->tbl_loaihopdong->ten_hop_dong}}</label>
                                                          </div>
                                                          <div class="form-group col-md-4">
                                                            <label>Ngày bắt đầu hợp đồng cũ</label>
                                                            <label class="form-control ">{{$hopdong->ngay_bat_dau_hop_dong}}</label>
                                                          </div>
                                                          <div class="form-group col-md-4">
                                                              <label>Ngày kết thúc hợp đồng cũ</label>
                                                              <label class="form-control ">{{$hopdong->ngay_ket_thuc_hop_dong}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-row mb-3">
                                                                 
                                                        <div class="form-group col-md-4">
                                                            <label>Loại hợp đồng lao động mới</label>
                                                            <select name="hop_dong_moi" class="form-control" style="-webkit-appearance: auto;">
                                                                
                                                                @foreach($loaihd as $lhd)
                                                                    <option value="{{$lhd->id}}">{{$lhd->ten_hop_dong}}</option>
                                                                    @endforeach
                                                        </select>
                                                          </div>
                                                            @endif
                                                    </div>
                                                    </div>
                                                <div class="show khac" id="khac">
                                                        <div class="form-row mb-3">
                                                            <label>Nội dung thay đổi</label>
                                                            <textarea class="form-control" name="noi_dung_khac" placeholder="Nhập nội dung bạn muốn thay đổi" value=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="show ngay" id="ngay">
                                                <div class="form-row mb-3">
                                                    <div class="form-group col-md-3">
                                                        <label>Ngày bắt đầu hiệu lực</label>
                                                        <input type="date" class="form-control" name="ngay_bat_dau" required>
                                                      </div>
                                                      <div class="form-group col-md-3">
                                                          <label>Ngày kết thúc (nếu có)</label>
                                                          <input type="date" class="form-control" name="ngay_ket_thuc">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
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
            $("#phong_ban_moi").change(function(){
                
                var id_phongban=$(this).val();
                
                
                $.get("../ajax/chucvu_moi/"+id_phongban,function(data){
                    
                    $("#chuc_vu_moi").html(data);
                });
            });
            
        });

        $(document).ready(function(){
            $("#chuc_vu_moi").change(function(){
                
                var id_chucvu=$(this).val();
                $.get("../ajax/phucap_moi/"+id_chucvu,function(data){
                    
                    $("#phu_cap_moi").html(data);
                });
            });
            
        });

$('#ten_hop_dong').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "1") {
    $('#luong').show();
    $('#chucvu').hide();
    $('#giahan').hide();
    $('#khac').hide();
    $('#ngay').show();
  } 
  else if (this.value == "2") {
    $('#luong').hide();
    $('#chucvu').show();
    $('#giahan').hide();
    $('#khac').hide();
    $('#ngay').show();
  }
  else if (this.value == "3") {
    $('#luong').hide();
    $('#chucvu').hide();
    $('#giahan').show();
    $('#khac').hide();
    $('#ngay').show();
  }
  else  if (this.value == "4") {
  $('#luong').hide();
  $('#chucvu').hide();
    $('#giahan').hide();
  $('#khac').show();
  $('#ngay').show();
  }
  else   {
    $('#luong').hide();
  $('#chucvu').hide();
    $('#giahan').hide();
  $('#khac').hide();
  $('#ngay').hide();
        }

});
    </script>   
@endsection