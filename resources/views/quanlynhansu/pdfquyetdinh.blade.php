<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quyết định kỷ luật</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            }
        </style>
</head>
<body>

    <p style="text-align: center;">Tên đơn vị:Công ty {{$thongtinchinh->ten_cong_ty}} <b style="margin-left: 10%;font-size: 25px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></p>
    <p style="text-align: center;">Số: {{$quyetdinh->id}}/QĐKL	<u style="margin-left: 31%;">Độc lập - Tự do - Hạnh phúc </u></p>
    <br>
    <br>
<p style="text-align: center;font-size: 30px"><b>QUYẾT ĐỊNH XỬ LÝ KỶ LUẬT LAO ĐỘNG</b></p>


<p style="text-align: center;">Về việc: Sa thải Ông/Bà  {{$nhanvien->ho_ten}} </p>
<br>
<i>-   Căn cứ qui định tại Bộ Luật lao động nước CHXHCN Việt Nam và các văn bản hướng dẫn thi hành.</i>
<br>
<i>-   Căn cứ Nội quy lao động và các qui định của Công ty {{$thongtinchinh->ten_cong_ty}}</i>
<br>
<?php
    $ngayky=date('d-m-Y',strtotime($quyetdinh->created_at));
?>
<i>-   Căn cứ kết quả phiên họp xử lý kỷ luật lao động Ông/Bà {{$nhanvien->ho_ten}}, ngày {{$ngayky}}</i>
<br>
<br>
<p style="text-align: center;font-size: 30px; text-transform:uppercase"><b>TỔNG GIÁM ĐỐC CÔNG TY {{$thongtinchinh->ten_cong_ty}}</b></p>

<p style="text-align: center;font-size: 30px; text-transform:uppercase"><b>QUYẾT ĐỊNH</b></p>
<br>
<br>
<b style="font-size: 25px">Điều 1: Sai phạm và hình thức kỷ luật Ông/Bà {{$nhanvien->ho_ten}} </b>


<p>Ông/Bà Nguyễn Văn/Thị A hiện đang công tác và giữ chức vụ: {{$nhanvien->tbl_chucvu->ten_chuc_vu}} tại công ty {{$thongtinchinh->ten_cong_ty}}</p>
<p>Theo kết quả phiên họp xử lý kỷ luật lao động ngày {{$ngayky}}, Công ty {{$thongtinchinh->ten_cong_ty}} kết luận trong thời gian làm việc tại công ty, Ông/Bà {{$nhanvien->ho_ten}} đã có những sai phạm sau đây:</p>
<p>{{$quyetdinh->noi_dung}}</p>
<p>Do vậy, công ty {{$thongtinchinh->ten_cong_ty}} quyết định áp dụng hình thức kỷ luật sa thải đối với Ông/Bà {{$nhanvien->ho_ten}}</p>
<b style="font-size: 25px">Điều 2: Hiệu lực của quyết định  </b>

<p>Quyết định này có hiệu lực kể từ ngày ký.</p>
<?php
    $ngaynghi=date('d-m-Y',strtotime($quyetdinh->ngay_nghi_viec));
?>
<p>Mọi quyền lợi, nghĩa vụ có liên quan của Ông/Bà {{$nhanvien->ho_ten}} được công ty giải quyết đến hết ngày {{$ngaynghi}}.</p>
<p>Ông/Bà {{$nhanvien->ho_ten}} có trách nhiệm bàn giao công việc, giấy tờ sổ sách cho công ty, hoàn trả lại công ty những tài sản mà công ty giao cho ông sử dụng làm việc trước đây.</p>
<p>Ông/Bà {{$nhanvien->ho_ten}} và các bộ phận liên quan có trách nhiệm thi hành theo quyết định này, thực hiện và hoàn tất các thủ tục hành chính, pháp lý theo đúng qui định của pháp luật.</p>
<p style="text-align: center;font-size: 30px; text-transform:uppercase"><b>CÔNG TY {{$thongtinchinh->ten_cong_ty}}</b></p>
<p style="text-align: center;font-size: 30px; text-transform:uppercase"><b>TỔNG GIÁM ĐỐC</b></p>
<i style="text-align: center">(Ký, đóng dấu)</i>
</body>
</html>

