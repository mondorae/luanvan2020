 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
     
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 >Phụ cấp</h3>
                        <p>Vị trí: {{$phucap->tbl_chucvu->ten_chuc_vu}} - {{$phucap->tbl_chucvu->tbl_phongban->ten_phong_ban}}</p>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <form name="myform"  class="needs-validation" method="POST" action="{{url('private/phucap/sua/'.$phucap->id_chucvu)}}" onsubmit="return validatephucap()"  novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="ten_chuc_vu">Số tiền ăn trưa</label>
                                            <input type="text" class="form-control" id="tien_an_trua" name="an_trua" placeholder="Tiền ăn trưa" value="{{$phucap->an_trua}}" required>
                                            <span id="tienantrua"></span>
                                        </div> 
                                            <div class="form-group col-md-4">
                                                <label for="ten_chuc_vu">Số tiền xăng xe</label>
                                            <input type="text" class="form-control" id="tien_xang" name="xang_xe" placeholder="Tên xăng" value="{{$phucap->xang_xe}}" required>
                                            <span id="tienxang"></span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="ten_chuc_vu">Số tiền khác(...)</label>
                                            <input type="text" class="form-control" id="tien_khac" name="khac" placeholder="Tiền khác(nếu có).." value="{{$phucap->khac}}" required>
                                            <span id="tienkhac"></span>
                                        </div>
                                        </div>
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