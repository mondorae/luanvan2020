 
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
                    <h2 class="pageheader-title">LỊCH SỬ CHẤM CÔNG THÁNG {{date('m')}} </h2>
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
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="h5 alert alert-success">
                                    {{session('thongbao')}}
                               </div>
                            @elseif(session('thongbaoloi'))
                            <div class="h5 alert alert-warning">
                                {{session('thongbaoloi')}}
                           </div>
                            @endif
                            @if ($ngaynghi == "Saturday" || $ngaynghi == "Sunday" || $ngaynghi == "Holiday" || $ngaynghi == "DayOff")
                            <div class="h1 font-weight-bold text-info">NGÀY NGHỈ</div>
                            @elseif (isset($chamcong->check_in))
                                @if(isset($chamcong->thoi_gian_lam))
                                    <div class="h1 font-weight-bold text-danger">Đã chấm công hôm nay rồi</div>
                                @else
                                    <form action="{{route('checkout')}}" method="post">
                                        {{ csrf_field() }}
                                        <input class="btn btn-outline-danger" type="submit" name="" value="Checkout" />
                                    </form>
                                @endif  
                            @else
                            {{-- @if(date('08:00:00') < date('H:i:s') && date('H:i:s') < date('10:00:00')) --}}
                            <form action="{{route('checkin')}}" method="post">
                                {{ csrf_field() }}
                                <input class="btn btn-outline-primary" type="submit" name="" value="Checkin" />
                            </form>
                            {{-- @else
                            <div class="h2"> Chưa Đến Giờ Điểm Danh </div>
                            <div class="h3"> Cổng điểm danh mở ra từ 8h đến 10h sáng </div>
                            @endif --}}
                            @endif
                            
                            {{-- {{ exec('getmac') }}  lay dia chi mac chua duoc--}}
                     </div>
                </div>
                @if(isset($chamcong->id_tangca) || isset($tangca))
                <div class="text-bold text-danger">Hôm nay có tăng ca mà bạn đã đăng ký</div>
                <a href="{{url('private/chamcong/tangca')}}" class="btn button-green"> Điểm Danh Tăng Ca</a>
                @endif
                
            </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">LỊCH SỬ CHẤM CÔNG</h5>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="data-tables">
                                <thead>
                                   <tr align="center">
                                        <th>Ngày</th>
                                        <th>Giờ Vào</th>
                                        <th>Giờ ra</th>
                                        <th>Thời Gian Làm</th>
                                        <th>Tăng ca</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($lichsu as $ls) 
                                    <tr class="even gradeC" align="center">
                                        <td>
                                        @if(date('d/m',strtotime($ls->check_in)) == date('d/m'))
                                        Hôm nay
                                        @else   
                                            {{date('d/m',strtotime($ls->check_in))}}
                                        @endif
                                        </td>
                                        <td>{{date('H:i:s',strtotime($ls->check_in))}}</td>
                                        <td>
                                        @if(isset($ls->thoi_gian_lam))
                                            {{date('H:i:s',($ls->thoi_gian_lam * 3600) + strtotime($ls->check_in))}} <!-- cong thuc bi sai -->
                                        @else
                                            Đang Làm Việc
                                        @endif
                                        </td>
                                        <td>
                                        @if(isset($ls->thoi_gian_lam))
                                            {{round($ls->thoi_gian_lam,1)}} Tiếng
                                        @endif
                                        </td>
                                        <td>
                                        @if(isset($ls->id_tangca))
                                            Có <a href="{{url('private/chamcong/tangca/chitiet/'.$ls->id_tangca)}}"> (xem chi tiết)</a>
                                        @else
                                            Không có    
                                        @endif
                                        </td>
                                    </tr> 
                                @endforeach
                                </tbody>
                            </table>
                                     <!-- /.row -->
                        </div>
                        <div class="h5 alert alert-info"> Trong tháng {{date('m')}} bạn đã làm được {{round($bangluong->so_gio_lam_viec,1)}} giờ </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection