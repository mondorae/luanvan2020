@extends('layout1.index')
@section('content')

<section id="page-detail-news">
			<div class="page-detail-newfeed" style="padding-top: 130px;">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="trangchu">Trang chủ  /    </a></li>
						<li><a href="tintuyendung">Tuyển dụng/    </a></li>
						<li><a class="active">Ứng tuyển</a></li>
					</ol>
					<hr>
					<div class="page-title">
						<p><span class="glyphicon glyphicon-time"></span>Posted on : {{$tuyendung->updated_at}}</p>
						<h2 style="color: Blue;text-transform:uppercase">Vị trí: {{$tuyendung->tbl_chucvu->ten_chuc_vu}}-{{$tuyendung->tbl_chucvu->tbl_phongban->ten_phong_ban}}</h2>
                    </div>
                    <hr>
                    <div class="infor-td" >
                            <p class="desc salary"><span>Lương:</span> <b>{{$tuyendung->muc_luong}}</b> <span>VNĐ</span></p>
                           
                            <p class="desc date"><span>Hạn nộp hồ sơ: </span>{{date('d-m-Y',strtotime($tuyendung->han_nop))}}             </p>
                            <p>Nếu muốn ứng tuyển vị trí này, hãy gửi mail (kèm CV) tới:<a href="mailto:{{$tuyendung->mail_nhan_tin}}"><b>{{$tuyendung->mail_nhan_tin}}</b></a></p>
						
                    </div>
                    <h3 style="text-align: center;color:firebrick">CHI TIẾT TUYỂN DỤNG:</h3>
                    <div class="page-content1">
						
						<p style="margin-top: 15px;margin-bottom: 15px;line-height: 30px;">{!!$tuyendung->NoiDung!!}
							
						</p>
						
                        
					</div>
                    
                    
				</div>
			</div>
</section>

@endsection