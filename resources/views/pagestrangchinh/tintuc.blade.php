@extends('layout1.index')
@section('content')

<section id="page-detail-news">
			<div class="page-detail-newfeed" style="padding-top: 130px;">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="trangchu">Trang chủ  /    </a></li>
						<li><a href="tintucsukien">Tin tức  /    </a></li>
						<li><a class="active">{{$tintuc->TieuDe}}</a></li>
					</ol>
					<hr>
					<div class="page-title">
						<p><span class="glyphicon glyphicon-time"></span>Posted on : {{$tintuc->updated_at}}</p>
						<h1>{{$tintuc->TieuDe}}</h1>
					</div>

					<div class="page-content1">
						
						<p style="margin-top: 15px;margin-bottom: 15px;line-height: 30px;"><img src="upload/tintuc/{{$tintuc->Hinh}}" align="left" style="width:50%;padding:12px">{{$tintuc->NoiDung}}
							
						</p>
						

					</div>


					@if((Auth::user()))
					<hr>
					
<h1 class="binhluan"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSXPxt14CiCzY3Q1qiTh1Fi8r7AK9NycesYwGz8I_vpNR_cK-O8&usqp=CAU" style="width: 45px"> Bình luận</h1>
					<div class="well" >
						@if(session('thongbao'))
                        <div class="alert alert-success">
                        {{session('thongbao')}} </div>
                        @endif

						<h4>Viết bình luận của bạn...<span class="glyphicon glyphicon-pencil"></span></h4>
						<form action="comment/{{$tintuc->id}}" method="post" role="form">
							<input type="hidden" name="_token" value="{{csrf_token()}}"/>
							<div class="form-group">
								<textarea class="form-control" name="NoiDung" rows="3"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Gửi</button>
						</form>
					</div>
					@endif
					<hr>
					
					<section id="page-news">
						<div>
							<h1>Tin tức khác</h1>
						</div>
						<div class="page-new">
							<div class="container">
								
								<div class="row">
									@foreach($tinlienquan as $tt)
									<div class="col-md-4 col-sm-4 col-xs-4 fix-card">
										<div class="inner" >
											<a href="tintuc/{{$tt->id}}">
												<div class="page-new-img">
													<img src="upload/tintuc/{{$tt->Hinh}}" alt="">
												</div>
												<div class="page-new-content">
												<div class="desc" >
													<p>Tin {{$tt->loaitin->Ten}}</p>
												</div>
												<div class="title">
													<span class="type-title">{{$tt->TieuDe}}</span>
												</div>
											</div>

											</a>
										</div>
									</div>
									@endforeach
								</div>
								
							</div>
						</div>
					</section>
				</div>
			</div>
</section>

@endsection