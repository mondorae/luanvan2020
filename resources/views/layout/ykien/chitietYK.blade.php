 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Chi Tiết Ý Kiến</h2>
                    {{-- <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                            </ol>
                        </nav>
                    </div> --}}
                </div>
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
                        <h5 class="card-header">Chi Tiết Ý Kiến</h5>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="loai_y_kien">Loại Ý Kiến</label>
                                                <span class="form-control" name="loai_y_kien">{{$ykien->tbl_ykien->loai_y_kien}}</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="ngay_them_y_kien">Ngày Tạo Ý Kiến</label>
                                                <span class="form-control" name="ngay_them_y_kien">{{$ykien->created_at}}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ket_qua">Kết Quả</label>
                                                    @if($ykien->trang_thai == 0)
                                                    <div class="text-secondary h4" name="ket_qua">Đang Chờ</div>
                                                    @elseif($ykien->trang_thai == 1)
                                                    <div class="text-warning h4" name="ket_qua">Chờ Giám Đốc Duyệt</div>
                                                    @elseif($ykien->trang_thai == 2)
                                                    <div class="text-success h4" name="ket_qua">Đã Duyệt</div>
                                                    @else
                                                    <div class="text-danger h4" name="ket_qua">Đã Từ Chối</div>
                                                    @endif
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="nguoi_lam_don">Nhân Viên Gửi</label>
                                                <span class="form-control" name="nguoi_lam_don">{{$ykien->tbl_hosonhanvien->ho_ten}}</span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="chuc_vu">Chức Vụ</label>
                                                <span class="form-control" name="chuc_vu">{{$ykien->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="phong_ban">Phòng Ban</label>
                                                <span class="form-control" name="phong_ban">{{$ykien->tbl_hosonhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="ly_do">Lý Do</label>
                                                <span class="form-control" name="ly_do">{{$ykien->ly_do}}</span>
                                            </div>
                                            @if(($ykien->id_ykien == 1 || $ykien->id_ykien == 2 || $ykien->id_ykien == 3 || $ykien->id_ykien == 4) && isset($ykien->thoi_gian_nghi))
                                            <div class="form-group col-md-4">
                                                <label for="thoi_gian_nghi">Thời Gian Nghỉ</label>
                                                <div class="form-control" name="thoi_gian_nghi">{{$ykien->thoi_gian_nghi}}</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ngay_bat_dau">Nghỉ Từ Ngày</label>
                                                <div class="form-control" name="ngay_bat_dau">{{date('d-m-Y',strtotime($ykien->ngay_bat_dau))}}</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="ngay_ket_thuc">Đến Ngày</label>
                                                <div class="form-control" name="ngay_ket_thuc">{{date('d-m-Y', strtotime($ykien->ngay_bat_dau ."+".$ykien->thoi_gian_nghi."days"))}}</div>
                                            </div>
                                            @else
                                            <div class="col-md-12 text-danger">CHƯA BỔ SUNG THÔNG TIN SINH </div>
                                            @endif
                                            @if($ykien->id_ykien == 4)
                                            <div class="form-group col-md-4">
                                                <label for="ngay_bat_dau">Ngày Tăng Ca</label>
                                                <div class="form-control" name="ngay_bat_dau">{{$ykien->ngay_bat_dau}}</div>
                                            </div>
                                            @endif
                                            @if($ykien->id_ykien == 5 || $ykien->id_ykien == 6|| $ykien->id_ykien == 9  || $ykien->id_ykien == 10)
                                                @if(!isset($ykien->gia_tri))
                                                <div class="form-group col-md-4">
                                                    <label for="gia_tri">Giá Trị</label>
                                                    <div class="form-control" name="gia_tri">Đang Cập Nhật</div>
                                                </div>
                                                @else
                                                <div class="form-group col-md-4">
                                                    <label for="gia_tri">Giá Trị</label>
                                                    <div class="form-control" name="gia_tri">{{$ykien->gia_tri}}</div>
                                                </div>
                                                @endif
                                            @endif
                                            @if($ykien->id_ykien == 6 || $ykien->id_ykien == 7 )
                                            <div class="form-group col-md-4">
                                                <label for="nguoi_de_xuat">Nhân Viên Được Đề Xuất</label>
                                                <div class="form-control" name="nguoi_de_xuat">{{$ykien->nguoi_duoc_de_xuat}}</div>
                                            </div>
                                            @endif
                                            
                                            @if($ykien->trang_thai == -1)
                                            <div class="form-group col-md-12">
                                                <label for="ly_do_tu_choi">Lý Do Từ Chối</label>
                                                <div class="form-control " name="ly_do_tu_choi">{{$ykien->ly_do_tu_choi}}</div>
                                            </div>
                                            @endif
                                            <div class="form-group col-md-12">
                                            <div class="form-group col-md-12">
                                                <label for="ly_do_tu_choi">Hình ảnh minh chứng</label>
                                            </div>
                                            @foreach($hinhanh as $anh)
                                            <label class="ml-5">
                                                <a href="{{url('upload/anhminhchung/'.$anh->ten_anh)}}" target="_blank" ><img src="{{url('upload/anhminhchung/'.$anh->ten_anh)}}" style="width: 255px;height: 265px;" class="magnify" ></a>
                                            </label>
                                            
                                            @endforeach
                                            </div>
                                            @if(isset($ykien->nguoi_duyet_1))
                                            <div class="form-group col-md-4">
                                                <label for="nguoi_duyet_1">Người Duyệt</label>
                                                <div class="form-control" name="nguoi_duyet_1">{{$ykien->nguoi_duyet_1}}</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="chuc_vu_1">Chức Vụ</label>
                                                <div class="form-control" name="chuc_vu_1">{{$ykien->chuc_vu_1}}</div>
                                            </div>
                                            @else
                                            <div class="form-group col-md-4">
                                                <label for="nguoi_duyet_1">Người Duyệt</label>
                                                <div class="form-control" name="nguoi_duyet_1">Đang Cập Nhật</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="chuc_vu_1">Chức Vụ</label>
                                                <div class="form-control" name="chuc_vu_1">Đang Cập Nhật</div>
                                            </div>
                                            @endif
                                            @if(isset($ykien->nguoi_duyet_2))
                                            <div class="form-group col-md-4">
                                                <label for="nguoi_duyet_2">Giám Đốc Duyệt</label>
                                                <div class="form-control" name="nguoi_duyet_2">{{$ykien->nguoi_duyet_2}}</div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="chuc_vu_2">Chức Vụ</label>
                                                <div class="form-control" name="chuc_vu_2">{{$ykien->chuc_vu_2}}</div>
                                            </div>
                                            @else
                                            <div class="form-group col-md-4">
                                                <label for="nguoi_duyet_2">Giám Đốc Duyệt</label>
                                                <div class="form-control" name="nguoi_duyet_2">Đang Cập Nhật</div>
                                            </div>
                                            {{-- <div class="form-group col-md-4">
                                                <label for="chuc_vu_2">Chức Vụ</label>
                                                <div class="form-control" name="chuc_vu_2">Đang Cập Nhật</div>
                                            </div> --}}
                                            @endif
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Lưu</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
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
    </div>
</div>

@endsection