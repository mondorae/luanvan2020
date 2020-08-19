
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
                    <h2 class="pageheader-title">Chấm công tăng ca ngày {{date('d/m')}} </h2>
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
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                               </div>
                            @endif
                            @if (isset($tangca->check_in) && date('Y-m-d 00:00:00') != date('Y-m-d H:i:s', strtotime($tangca->check_in)))
                                @if(isset($tangca->thoi_gian_lam))
                                    <div class="h1">Đã chấm công hôm nay rồi</div>
                                @else
                                    <form action="{{route('checkout_tangca')}}" method="post">
                                        {{ csrf_field() }}
                                        <input class="btn btn-outline-danger" type="submit" name="" value="Checkout" />
                                    </form>
                                @endif  
                            @else
                            {{-- @if(date('Y-m-d H:i:s') > date('Y-m-d 18:00:00') && date('Y-m-d H:i:s') < date('Y-m-d 08:00:00',strtotime('+1 days'))) --}}
                            <form action="{{route('checkin_tangca')}}" method="post">
                                {{ csrf_field() }}
                                <input class="btn btn-outline-primary" type="submit" name="" value="Checkin" />
                            </form>
                            {{-- @else
                            <div class="h2"> Chưa Đến Giờ Điểm Danh </div>
                            <div class="h3"> Cổng điểm danh mở ra từ 8h đến 10h sáng </div> --}}
                            {{-- @endif --}}
                            @endif
                            
                            {{-- {{ exec('getmac') }}  lay dia chi mac chua duoc--}}
                     </div>
                </div>
            </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">LỊCH SỬ TĂNG CA</h5>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="data-tables">
                                <thead>
                                   <tr align="center">
                                        <th>Ngày</th>
                                        <th>Giờ Vào</th>
                                        <th>Giờ ra</th>
                                        <th>Thời Gian Làm</th>
                                        <th>Chi Tiết</th>
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
                                        @if(date('H:i:s',strtotime($ls->check_in)) == date('00:00:00'))
                                            <td>Chưa đến ngày</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @else
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
                                            <a href="{{url('private/chamcong/tangca/chitiet/'.$ls->id_tangca)}}"> XEM</a>
                                        </td>
                                        @endif
                                    </tr> 
                                @endforeach
                                </tbody>
                            </table>
                                     <!-- /.row -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection