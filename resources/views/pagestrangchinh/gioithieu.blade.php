 @extends('layout1.index')
	 @section('content')
		<section>
			<div class="about">
				<div class="container">
					<ol class="breadcrumb">
						<li><a href="index.html">Trang chủ</a></li>
						<li><a >/</a></li>
						<li><a class="active"> Giới thiệu chung</a></li>
					</ol>
					<!--  <hr> -->
					@foreach ($gioithieu as $gt)
						
					
					<div class="item" style="overflow: auto">
						<h1>{{$gt->Ten}}</h1>
					<p ><img src="upload/gioithieu/{{$gt->Hinh}}" align="left" style="width:50%;padding:12px;height:300px">{!!$gt->NoiDung!!}</p>

					</div>
					<br>
					 <hr>
					 @endforeach
					
				</div>
			</div>
        </section>
     @endsection