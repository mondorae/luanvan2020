<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hợp đồng nhân viên</title>
    <style>
    body {
        font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>
<body>
    <p style="text-align: center;">Tên đơn vị:Công ty {{$thongtinchinh->ten_cong_ty}} <b style="margin-left: 10%;font-size: 25px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></p>
    <p style="text-align: center;">Số:{{$hopdong->id_hopdong}}	<u style="margin-left: 31%;">Độc lập - Tự do - Hạnh phúc </u></p>
    @if ($hopdong->id_loaihopdong==1)
    <p style="text-align: center;font-size: 30px"><b>HỢP ĐỒNG LAO ĐỘNG XÁC ĐỊNH THỜI HẠN</b></p>
    @elseif ($hopdong->id_loaihopdong==2) 
    <p style="text-align: center;font-size: 30px"><b>HỢP ĐỒNG LAO ĐỘNG KHÔNG XÁC ĐỊNH THỜI HẠN</b></p>
    @else 
    <p style="text-align: center;font-size: 30px"><b>HỢP ĐỒNG LAO ĐỘNG THỜI VỤ</b></p>
    @endif
    <p>Hôm nay, ngày {{date('d')}} tháng {{date('m')}} năm {{date('y')}}. Tại: Công ty {{$thongtinchinh->ten_cong_ty}} </p>
    <b style="font-size: 25px">NGƯỜI SỬ DỤNG LAO ĐỘNG (BÊN A):</b>
    <p>Đại diện Ông/Bà: {{Auth::user()->tbl_hosonhanvien->ho_ten}}</p>
    <p>Chức vụ:{{Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</p>
    @if (isset($lienheql))
    <p>Địa chỉ:{{$lienheql->dia_chi_thuong_tru}}</p>
   
    
    <p>Điện thoại:{{$lienheql->sdt_ca_nhan}}</p>
    @endif
    <p>Mã số thuế: abcxyz......</p>
    <b style="font-size: 25px">NGƯỜI LAO ĐỘNG (BÊN B): </b>
    @if (isset($nhanvien))
    <p>Ông/Bà:{{$nhanvien->ho_ten}}</p>
    <?php
    $namsinh=date('d-m-Y',strtotime($nhanvien->ngay_sinh));
    ?>
    <p>Ngày sinh: {{$namsinh}}</p>
    <p>Nghề nghiệp: {{$nhanvien->tbl_chucvu->ten_chuc_vu}} {{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}</p>
    @if (isset($lienhenv))
    <p>Địa chỉ thường trú: {{$lienhenv->dia_chi_thuong_tru}}</p>
    <p>Số CMND: {{$nhanvien->so_cmnd}}</p>
    
    @endif
    <p><i>Cùng thỏa thuận ký kết Hợp đồng lao động (HĐLĐ) và cam kết làm đúng những điều khoản sau đây:</i></p>
    <b style="font-size: 25px">Điều 1: Điều khoản chung</b>
    @if (isset($hopdong))
    <p>Loại Hợp đồng lao động: {{$hopdong->tbl_loaihopdong->ten_hop_dong}}</p>
    @if ($hopdong->id_loaihopdong==1)
    <p>Thời điểm bắt đầu từ: ngày {{date('d',strtotime($hopdong->ngay_bat_dau_hop_dong))}} tháng {{date('m',strtotime($hopdong->ngay_bat_dau_hop_dong))}} năm {{date('Y',strtotime($hopdong->ngay_bat_dau_hop_dong))}} đến ngày {{date('d',strtotime($hopdong->ngay_ket_thuc_hop_dong))}} tháng {{date('m',strtotime($hopdong->ngay_ket_thuc_hop_dong))}} năm {{date('Y',strtotime($hopdong->ngay_ket_thuc_hop_dong))}}</p>
    @elseif ($hopdong->id_loaihopdong==2) 
    <p>Thời điểm bắt đầu từ: ngày {{date('d',strtotime($hopdong->ngay_bat_dau_hop_dong))}} tháng {{date('m',strtotime($hopdong->ngay_bat_dau_hop_dong))}} năm {{date('Y',strtotime($hopdong->ngay_bat_dau_hop_dong))}}.</p>
    @else
    <p>Thời gian làm việc (dưới 12 tháng): </p>
    <p>Từ ngày {{date('d',strtotime($hopdong->ngay_bat_dau_hop_dong))}} tháng {{date('m',strtotime($hopdong->ngay_bat_dau_hop_dong))}} năm {{date('Y',strtotime($hopdong->ngay_bat_dau_hop_dong))}} đến ngày {{date('d',strtotime($hopdong->ngay_ket_thuc_hop_dong))}} tháng {{date('m',strtotime($hopdong->ngay_ket_thuc_hop_dong))}} năm {{date('Y',strtotime($hopdong->ngay_ket_thuc_hop_dong))}}</p>
    @endif

    <p>Địa điểm làm việc: {{$thongtinchinh->dia_chi}}</p>
    
    <p>Bộ phận công tác: Phòng {{$nhanvien->tbl_chucvu->tbl_phongban->ten_phong_ban}}. Chức danh chuyên môn (vị trí công tác): {{$nhanvien->tbl_chucvu->ten_chuc_vu}}.</p>
    @if ($hopdong->id_loaihopdong==3)
    <p>Công việc phải làm:{{$hopdong->noi_dung_cv}}</p>
    @else
    <p>Nhiệm vụ công việc như sau:</p>
    <p>- Thực hiện công việc theo đúng chức danh chuyên môn của mình dưới sự quản lý, điều hành của Ban Giám đốc (và các cá nhân được bổ nhiệm hoặc ủy quyền phụ trách).</p>
    <p>- Phối hợp cùng với các bộ phận, phòng ban khác trong Công ty để phát huy tối đa hiệu quả công việc.</p>
    <p>- Hoàn thành những công việc khác tùy thuộc theo yêu cầu kinh doanh của Công ty và theo quyết định của Ban Giám đốc (và các cá nhân được bổ nhiệm hoặc ủy quyền phụ trách).</p>
    @endif
    <b style="font-size: 25px">Điều 2: Chế độ làm việc</b>
    <p>Thời gian làm việc: Full-time</p>
    
    <p>Từ ngày thứ 2 đến sáng ngày thứ 6:</p>
    <p>- Từ : 8h00 – 6h00 (đã bao gồm nghĩ trưa)</p>
    <p>Thiết bị và công cụ làm việc sẽ được Công ty cấp phát tùy theo nhu cầu của công việc.</p>
    <p>Điều kiện an toàn và vệ sinh lao động tại nơi làm việc theo quy định của pháp luật hiện hành.</p>
    <b style="font-size: 25px">Điều 3: Nghĩa vụ và quyền lợi của người lao động</b>
    @if ($hopdong->id_loaihopdong==3)
    <p>Quyền lợi</p>

<p>a) Phương tiện đi lại làm việc: Tự cấp</p>

<p>b) Mức lương chính hoặc tiền công:{{$hopdong->muc_luong_chinh}} đ/tháng (đã bao gồm BHXH, BHYT).</p>

<p>c) Hình thức trả lương: Bằng tiền mặt hay chuyển khoản</p>

<p>d) Phụ cấp:{{$hopdong->phu_cap}} </p>

<p>e) Được trả lương: vào ngày 1 hằng tháng</p>

<p>f) Tiền thưởng : Theo tình hình tài chính của công ty.</p>

<p>g) Chế độ nâng lương: Tùy theo thể hiện công việc của từng người.</p>

<p>h) Chế độ nghỉ ngơi (nghỉ hàng tuần, phép năm, lễ tết…): Mỗi tháng được nghỉ 04 ngày.</p>


<p>Nghĩa vụ</p>

<p>a) Hoàn thành những công việc đã cam kết trong hợp đồng lao động.</p>

<p>b) Chấp hành lệnh điều hành sản xuất – kinh doanh, nội quy kỷ luật lao động, an toàn lao động.</p>

<p>c) Bồi thường vi phạm và vật chất:…</p>
@else
    <p>Nghĩa vụ</p>
    <p>a) Thực hiện công việc với sự tận tâm, tận lực, đảm bảo hoàn thành công việc với hiệu quả cao nhất theo sự phân công, điều hành (bằng văn bản hoặc bằng miệng) của Ban Giám đốc trong Công ty (và các cá nhân được Ban Giám đốc bổ nhiệm hoặc ủy quyền phụ trách).</p>
    <p>b) Hoàn thành công việc được giao và sẵn sàng chấp nhận mọi sự điều động khi có yêu cầu</p>
    <p>c) Nắm rõ và chấp hành nghiêm túc kỷ luật lao động, an toàn lao động, vệ sinh lao động, PCCC, văn hóa công ty, nội quy lao động và các chủ trương, chính sách của Công ty.</p>
    <p>d) Bồi thường vi phạm và vật chất theo quy chế, nội quy của Công ty và pháp luật Nhà nước quy định.</p>
    <p>e) Tham dự đầy đủ, nhiệt tình các buổi huấn luyện, đào tạo, hội thảo do Bộ phận hoặc Công ty tổ chức.</p>
    <p>f) Thực hiện đúng cam kết trong HĐLĐ và các thỏa thuận bằng văn bản khác với Công ty.</p>
    <p>g) Đóng các loại bảo hiểm, các khoản thuế.... đầy đủ theo quy định của pháp luật.</p>
    <p>h) Chế độ đào tạo: Theo quy định của Công ty và yêu cầu công việc. Trong trường hợp CBNV được cử đi đào tạo thì nhân viên phải hoàn thành khoá học đúng thời hạn, phải cam kết sẽ phục vụ lâu dài cho Công ty sau khi kết thúc khoá học và được hưởng nguyên lương, các quyền lợi khác được hưởng như người đi làm.</p>
    <p>i) Nếu sau khi kết thúc khóa đào tạo mà nhân viên không tiếp tục hợp tác với Công ty thì nhân viên phải hoàn trả lại 100% phí đào tạo và các khoản chế độ đã được nhận trong thời gian đào tạo.</p>
    Quyền lợi
    <p>a) Tiền lương và phụ cấp:</p>
    <p>- Mức lương chính: {{$hopdong->muc_luong_chinh}} đ/tháng.</p>
    <p>- Phụ cấp trách nhiệm: {{$hopdong->phu_cap}} đ/tháng</p>
    <p>- Phụ cấp hiệu suất công việc: Theo đánh giá của quản lý.</p>
    <p>- Lương hiệu quả: Theo quy định của phòng ban, công ty.</p>
    <p>- Công tác phí: Tùy từng vị trí, người lao động được hưởng theo quy định của công ty.</p>
    <p>- Hình thức trả lương: Chuyển khoản vào ngày 1 hằng tháng.</p>
    <p>b) Các quyền lợi khác:</p>
    <p>- Khen thưởng: Người lao động được khuyến khích bằng vật chất và tinh thần khi có thành tích trong công tác hoặc theo quy định của công ty.</p>
    <p>- Chế độ nâng lương: Theo quy định của Nhà nước và quy chế tiền lương của Công ty. Người lao động hoàn thành tốt nhiệm vụ được giao, không vi phạm kỷ luật và/hoặc không trong thời gian xử lý kỷ luật lao động và đủ điều kiện về thời gian theo quy chế lương thì được xét nâng lương.</p>
    <p>- Chế độ nghỉ: Theo quy định chung của Nhà nước</p>
    <p>+ Nghỉ hàng tuần: 2 ngày (Thứ 7 và ngày Chủ nhật).</p>
    <p>+ Nghỉ hàng năm: Những nhân viên được ký Hợp đồng chính thức và có thâm niên công tác 12 tháng thì sẽ được nghỉ phép năm có hưởng lương (01 ngày phép/01 tháng, 12 ngày phép/01 năm). Nhân viên có thâm niên làm việc dưới 12 tháng thì thời gian nghỉ hằng năm được tính theo tỷ lệ tương ứng với số thời gian làm việc.</p>
    <p>+ Nghỉ ngày Lễ: Các ngày nghỉ Lễ pháp định. Các ngày nghỉ lễ nếu trùng với ngày Chủ nhật thì sẽ được nghỉ bù vào ngày trước hoặc ngày kế tiếp tùy theo tình hình cụ thể mà Ban lãnh đạo Công ty sẽ chỉ đạo trực tiếp.</p>
    <p>+ Nhận tiền mừng của công ty khi Kết hôn.</p>
    <p>+ Sắp xếp đi du lịch cùng công ty.</p>
    <p>- Chế độ Bảo hiểm xã hội theo quy định của nhà nước.</p>
    <p>- Nhận lại sổ bảo hiểm trong trường hợp chấm dứt HĐLĐ với công ty.</p>
    <p>- Các chế độ được hưởng: Người lao động được hưởng các chế độ ngừng việc, trợ cấp thôi việc hoặc bồi thường theo quy định của Pháp luật hiện hành.</p>
    <p>- Thỏa thuận khác: Công ty được quyền chấm dứt HĐLĐ trước thời hạn đối với Người lao động có kết quả đánh giá hiệu suất công việc dưới mức quy định trong 03 tháng liên tục.</p>
    @endif
    @endif
    @endif
    <b style="font-size: 25px">Điều 4: Nghĩa vụ và quyền hạn của người sử dụng lao động</b>
    <p>1.	Nghĩa vụ</p>
    <p>Thực hiện đầy đủ những điều kiện cần thiết đã cam kết trong Hợp đồng lao động để người lao động đạt hiệu quả công việc cao. Bảo đảm việc làm cho người lao động theo Hợp đồng đã ký.</p>
    <p>Thanh toán đầy đủ, đúng thời hạn các chế độ và quyền lợi cho người lao động theo Hợp đồng lao động.
    <p>Chốt sổ bảo hiểm và giao lại cho người lao động.</p>
    <p>2.	Quyền hạn</p>
    <p>a) Điều hành người lao động hoàn thành công việc theo Hợp đồng (bố trí, điều chuyển công việc cho người lao động theo đúng chức năng chuyên môn).</p>
    <p>b) Có quyền chuyển tạm thời lao động, ngừng việc, thay đổi, tạm thời chấm dứt Hợp đồng lao động và áp dụng các biện pháp kỷ luật theo quy định của Pháp luật hiện hành và theo nội quy của Công ty trong thời gian hợp đồng còn giá trị.</p>
    <p>c) Tạm hoãn, chấm dứt Hợp đồng, kỷ luật người lao động theo đúng quy định của Pháp luật, và nội quy lao động của Công ty.</p>
    <p>d) Có quyền đòi bồi thường, khiếu nại với cơ quan liên đới để bảo vệ quyền lợi của mình nếu người lao động vi phạm Pháp luật hay các điều khoản của hợp đồng này.</p>
    <b style="font-size: 25px">Điều 5: Đơn phương chấm dứt hợp đồng</b>
    @if ($hopdong->id_loaihopdong==3)
    <p>Chấm dứt trong trường hợp hết hợp đồng;</p>

    <p>Chấm dứt trước khi thời hạn;</p>

    <p>Đơn phương chấm dứt hợp đồng.</p>
    @else
    <p>1. Người sử dụng lao động</p>
    <p>a) Theo quy định tại điều 38 Bộ luật Lao động 2012 thì người sử dụng lao động có quyền đơn phương chấm dứt hợp đồng lao động trong những trường hợp sau đây:</p>
    <p>b) Người lao động thường xuyên không hoàn thành công việc theo hợp đồng.</p>
    <p>c) Người lao động bị xử lý kỷ luật sa thải theo quy định tại điều 85 của Bộ luật Lao động.</p>
    <p>d) Người lao động làm theo hợp đồng lao động không xác định thời hạn ốm đau đã điều trị 12 tháng liền, người lao động làm theo hợp đồng lao động xác định thời hạn ốm đau đã điều trị 06 tháng liền và người lao động làm theo hợp đồng lao động dưới 01 năm ốm đau đã điều trị quá nửa thời hạn hợp đồng, mà khả năng lao động chưa hồi phục. Khi sức khoẻ của người lao động bình phục, thì được xem xét để giao kết tiếp hợp đồng lao động.</p>
    <p>e) Do thiên tai, hỏa hoạn, hoặc những lý do bất khả kháng khác mà người sử dụng lao động đã tìm mọi biện pháp khắc phục nhưng vẫn buộc phải thu hẹp sản xuất, giảm chỗ làm việc.</p>
    <p>f) Doanh nghiệp, cơ quan, tổ chức chấm dứt hoạt động.</p>
    <p>g) Người lao động vi phạm kỷ luật mức sa thải.</p>
    <p>i) Người lao động có hành vi gây thiệt hại nghiêm trọng về tài sản và lợi ích của Công ty.</p>
    <p>k) Người lao động đang thi hành kỷ luật mức chuyển công tác mà tái phạm.</p>
    <p>l) Người lao động tự ý bỏ việc 5 ngày/1 tháng và 20 ngày/1 năm.</p>
    <p>m) Người lao động vi phạm Pháp luật Nhà nước.</p>
    <p>Khi đơn phương chấm dứt hợp đồng lao động người sử dụng lao động phải báo cho người lao động biết trước:
    @if ($hopdong->id_loaihopdong==1)      
    <p><i style="margin-left: 15px">Ít nhất 30 ngày đối với hợp đồng lao động xác định thời hạn;</i></p>
    <i style="margin-left: 15px">Ít nhất 03 ngày làm việc đối với trường hợp quy định điểm d khoản 1 Điều này.</i>
    <p>Trong thời hạn 07 ngày, kể từ ngày chấm dứt Hợp đồng lao động, hai bên có trách nhiệm thanh toán đầy đủ các khoản có liên quan đến quyền lợi của mỗi bên,công ty tiến hành chốt sổ bảo hiểm và giao lại cho người lao động, trường hợp đặc biệt, có thể kéo dài nhưng không quá 30 ngày.</p>
    <p>Trong trường hợp doanh nghiệp bị phá sản thì các khoản có liên quan đến quyền lợi của người lao động được thanh toán theo quy định của Luật Phá sản doanh nghiệp.</p>
    <p>2.	Người lao động</p>
    <p><i>Khi người lao động đơn phương chấm dứt Hợp đồng lao động trước thời hạn phải tuân thủ theo Điều 37 Bộ luật Lao động 2012 và phải dựa trên các căn cứ sau:</i></p>
    <p>Không được bố trí theo đúng công việc, địa điểm làm việc hoặc không được bảo đảm các điều kiện làm việc đã thỏa thuận trong hợp đồng.</p>
    <p>Không được trả công đầy đủ hoặc trả công không đúng thời hạn đã thoả thuận trong hợp đồng.</p>
    <p>Bị ngược đãi, bị cưỡng bức lao động.</p>
    <p>Bản thân hoặc gia đình thật sự có hoàn cảnh khó khăn không thể tiếp tục thực hiện hợp đồng</p>
    <p>Được bầu làm nhiệm vụ chuyên trách ở các cơ quan dân cử hoặc được bổ nhiệm giữ chức vụ trong bộ máy Nhà nước.</p>
    <p>Người lao động nữ có thai phải nghỉ việc theo chỉ định của thầy thuốc.</p>
    <p>Người lao động bị ốm đau, tai nạn đã điều trị 03 tháng liền mà khả năng lao động chưa được hồi phục.</p>
    <p>Ngoài những căn cứ trên, người lao động còn phải đảm bảo thời hạn báo trước như sau:</p>
    <p>- Đối với các trường hợp quy định tại các điểm a, b, c và g: ít nhất 03 ngày;</p>
    <p>- Đối với các trường hợp quy định tại điểm d và điểm đ: ít nhất 30 ngày;</p>
    <p>- Đối với trường hợp quy định tại điểm e: theo thời hạn quy định tại Điều 112 của BLLĐ</p>
    <p>- Đối với các lý do khác, người lao động phải đảm bảo thông báo trước ít nhất 30 ngày.</p>
    <p>k) Ngoài những căn cứ trên, người lao động còn phải đảm bảo thời hạn báo trước theo quy định. Người lao động có ý định thôi việc vì các lý do khác thì phải thông báo bằng văn bản cho đại diện của Công ty là Phòng Hành chính Nhân sự biết trước ít nhất là 15 ngày.</p>
   
    @else 
    <i>Ít nhất 30 ngày</i></p>
    <p>Trong thời hạn 07 ngày, kể từ ngày chấm dứt Hợp đồng lao động, hai bên có trách nhiệm thanh toán đầy đủ các khoản có liên quan đến quyền lợi của mỗi bên,công ty tiến hành chốt sổ bảo hiểm và giao lại cho người lao động, trường hợp đặc biệt, có thể kéo dài nhưng không quá 30 ngày.</p>
<p>Trong trường hợp doanh nghiệp bị phá sản thì các khoản có liên quan đến quyền lợi của người lao động được thanh toán theo quy định của Luật Phá sản doanh nghiệp.</p>
<p>2.	Người lao động</p>
<p>Người lao động làm việc theo hợp đồng lao động không xác định thời hạn có quyền đơn phương chấm dứt hợp đồng lao động, nhưng phải báo cho người sử dụng lao động biết trước ít nhất 45 ngày.</p>
   
    @endif
    

 <b style="font-size: 25px">Điều 6: Những thỏa thuận khác</b>
    Trong quá trình thực hiện hợp đồng nếu một bên có nhu cầu thay đổi nội dung trong hợp đồng phải báo cho bên kia trước ít nhất 03 ngày và ký kết bản Phụ lục hợp đồng theo quy định của Pháp luật. Trong thời gian tiến hành thỏa thuận hai bên vẫn tuân theo hợp đồng lao động đã ký kết.
    Người lao động đọc kỹ, hiểu rõ và cam kết thực hiện các điều khoản và quy định ghi tại Hợp đồng lao động.
    @endif
    <b style="font-size: 25px">Điều 7: Điều khoản thi hành</b>
    <p>Những vấn đề về lao động không ghi trong Hợp đồng lao động này thì áp dụng theo quy định của Thỏa ước tập thể, nội quy lao động và Pháp luật lao động.</p>
    <p>Khi hai bên ký kết Phụ lục hợp đồng lao động thì nội dung của Phụ lục hợp đồng lao động cũng có giá trị như các nội dung của bản hợp đồng này.</p>
    <p>Hợp đồng này được lập thành 02 (hai) bản có giá trị như nhau, Hành chính nhân sự giữ 01 (một) bản, Người lao động giữ 01 (một) bản và có hiệu lực kể từ ngày {{date('d',strtotime($hopdong->ngay_bat_dau_hop_dong))}} tháng {{date('m',strtotime($hopdong->ngay_bat_dau_hop_dong))}} năm {{date('Y',strtotime($hopdong->ngay_bat_dau_hop_dong))}}</p>
    <p>Hợp đồng được lập tại: Công ty {{$thongtinchinh->ten_cong_ty}}</p>
    <br>
                                  
                                             
    <p style="text-align: center;">NGƯỜI LAO ĐỘNG <span style="margin-left: 22%">NGƯỜI SỬ DỤNG LAO ĐỘNG</span></p>
    <p style="text-align: center;">(Ký, ghi rõ họ tên) <span style="margin-left: 28%;">(Ký, ghi rõ họ tên) </span></p>
</body>
</html>