$(document).ready(function() {
    var table = $('#data-tables').DataTable({
        lengthChange: false,
        buttons: ['excel', 'pdf']
    });

    table.buttons().container()
        .appendTo('#data-tables_wrapper .col-md-6:eq(0)');
});


$(document).ready(function() { //Datatable
    $('#data-tables1').DataTable();
});

$(document).ready(function() { //Thêm ý kiến theo loại ý kiến
    $("#id_ykien").change(function() {
        $(this).find("option:selected").each(function() {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $(".y-kien").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else {
                $(".y-kien").hide();
            }
        });
    }).change();
});

$(document).ready(function() {
    $("#phong_ban").change(function() {
        var id_phongban = $(this).val();
        $.get("ajax/chucvu/" + id_phongban, function(data) {
            $("#chuc_vu").html(data);
        });
    });
});



CKEDITOR.replace('editor1');


//chucvu
function validatechucvu() {
    var chucvu = document.myform.ten_chuc_vu.value;
    var phongban = document.myform.ten_phong_ban.value;
    var machucvu = document.myform.id_machucvu.value;
    var status = true;
    if (chucvu.length < 1) {
        document.getElementById("chucvu123").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập tên chức vụ</i>";
        status = false;
    } else {
        document.getElementById("chucvu123").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (phongban.length < 1) {
        document.getElementById("phongban123").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn phòng ban</i>";
        status = false;
    } else {
        document.getElementById("phongban123").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (machucvu.length < 1) {
        document.getElementById("machucvu123").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/> <i>Vui lòng nhập mã chức vụ</i>";
        status = false;
    } else {
        document.getElementById("machucvu123").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (status == false) {
        alert('Thông tin bạn nhập vào bị thiếu hoặc bị sai, vui lòng kiểm tra lại!!');
    }

    return status;
}

//phongban
function validatephongban() {
    var phongban = document.myform.ten_phong_ban.value;
    var maphongban = document.myform.id_phongban.value;
    var status = true;
    if (phongban.length < 1) {
        document.getElementById("phongban").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập tên phòng ban</i>";
        status = false;
    } else {
        document.getElementById("phongban").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (maphongban.length < 1) {
        document.getElementById("maphongban").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập mã phòng ban</i>";
        status = false;
    } else {
        document.getElementById("maphongban").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (status == false) {
        alert('Thông tin bạn nhập vào bị thiếu hoặc bị sai, vui lòng kiểm tra lại!!');
    }

    return status;
}



//phucap
function validatephucap() {
    var antrua = document.myform.tien_an_trua.value;
    var xangxe = document.myform.tien_xang.value;
    var khac = document.myform.tien_khac.value;
    var status = true;
    if (antrua.length < 1) {
        document.getElementById("tienantrua").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập tiền ăn trưa</i>";
        status = false;
    } else {
        document.getElementById("tienantrua").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (xangxe.length < 1) {
        document.getElementById("tienxang").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tiền xăng</i>";
        status = false;
    } else {
        document.getElementById("tienxang").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (khac.length < 1) {
        document.getElementById("tienkhac").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tiền khác</i>";
        status = false;
    } else {
        document.getElementById("tienkhac").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (status == false) {
        alert('Thông tin bạn nhập vào bị thiếu hoặc bị sai, vui lòng kiểm tra lại!!');
    }

    return status;
}




//laphosonhanvien
function validatehoso() {

    var hoten = document.myform.hoten.value;
    var ngaysinh = document.myform.ngaysinh.value;
    var dantoc = document.myform.dantoc.value;
    var tongiao = document.myform.tongiao.value;
    var socmnd = document.myform.socmnd.value;
    var ngaycapcmnd = document.myform.ngaycapcmnd.value;
    var noicapcmnd = document.myform.noicapcmnd.value;
    var sdtcanhan = document.myform.sdtcanhan.value;
    var sdtnha = document.myform.sdtnha.value;
    var emailcanhan = document.myform.emailcanhan.value;
    var diachithuongtru = document.myform.diachithuongtru.value;
    var tinhthuongtru = document.myform.tinhthuongtru.value;
    var diachitamtru = document.myform.diachitamtru.value;
    var tinhtamtru = document.myform.tinhtamtru.value;
    var muctrinhdo = document.myform.muctrinhdo.value;
    var noidaotao = document.myform.noidaotao.value;
    var chuyennganh = document.myform.chuyennganh.value;
    var xeploai = document.myform.xeploai.value;
    var namtotnghiep = document.myform.namtotnghiep.value;
    var nganhdaotao = document.myform.nganhdaotao.value;
    var phong_ban = document.myform.phong_ban.value;
    var chuc_vu = document.myform.chuc_vu.value;
    var tennickname = document.myform.tennickname.value;
    var status = true;
    if (hoten.length < 1) {
        document.getElementById("hotenf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập họ tên</i>";
        status = false;
    } else {
        document.getElementById("hotenf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (ngaysinh.length < 1) {
        document.getElementById("ngaysinhf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập ngày sinh</i>";
        status = false;
    } else {
        document.getElementById("ngaysinhf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (dantoc.length < 1) {
        document.getElementById("dantocf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn dân tộc</i>";
        status = false;
    } else {
        document.getElementById("dantocf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (tongiao.length < 1) {
        document.getElementById("tongiaof").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tôn giáo</i>";
        status = false;
    } else {
        document.getElementById("tongiaof").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (socmnd.length < 1) {
        document.getElementById("socmndf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập số cmnd</i>";
        status = false;
    } else {
        document.getElementById("socmndf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (ngaycapcmnd.length < 1) {
        document.getElementById("ngaycapcmndf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập ngày cấp cmnd</i>";
        status = false;
    } else {
        document.getElementById("ngaycapcmndf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (noicapcmnd.length < 1) {
        document.getElementById("noicapcmndf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập nơi cấp cmnd</i>";
        status = false;
    } else {
        document.getElementById("noicapcmndf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (sdtcanhan.length < 1) {
        document.getElementById("sdtcanhanf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập sđt cá nhân</i>";
        status = false;
    } else {
        document.getElementById("sdtcanhanf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (sdtnha.length < 1) {
        document.getElementById("sdtnhaf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập sđt nhà</i>";
        status = false;
    } else {
        document.getElementById("sdtnhaf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (emailcanhan.length < 1) {
        document.getElementById("emailcanhanf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập email cá nhân</i>";
        status = false;
    } else {
        document.getElementById("emailcanhanf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (diachithuongtru.length < 1) {
        document.getElementById("diachithuongtruf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập địa chỉ thường trú</i>";
        status = false;
    } else {
        document.getElementById("diachithuongtruf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (tinhthuongtru.length < 1) {
        document.getElementById("tinhthuongtruf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn tỉnh thường trú</i>";
        status = false;
    } else {
        document.getElementById("tinhthuongtruf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (chuyennganh.length < 1) {
        document.getElementById("chuyennganhf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập chuyên ngành</i>";
        status = false;
    } else {
        document.getElementById("chuyennganhf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }


    if (diachitamtru.length < 1) {
        document.getElementById("diachitamtruf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập địa chỉ tạm trú</i>";
        status = false;
    } else {
        document.getElementById("diachitamtruf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (tinhtamtru.length < 1) {
        document.getElementById("tinhtamtruf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn tỉnh tạm trú</i>";
        status = false;
    } else {
        document.getElementById("tinhtamtruf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (muctrinhdo.length < 1) {
        document.getElementById("muctrinhdof").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng mức trình độ</i>";
        status = false;
    } else {
        document.getElementById("muctrinhdof").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (noidaotao.length < 1) {
        document.getElementById("noidaotaof").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập nơi đào tạo</i>";
        status = false;
    } else {
        document.getElementById("noidaotaof").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (xeploai.length < 1) {
        document.getElementById("xeploaif").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn xếp loại</i>";
        status = false;
    } else {
        document.getElementById("xeploaif").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (namtotnghiep.length < 1) {
        document.getElementById("namtotnghiepf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập năm tốt nghiệp</i>";
        status = false;
    } else {
        document.getElementById("namtotnghiepf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (nganhdaotao.length < 1) {
        document.getElementById("nganhdaotaof").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập ngành đào tạo</i>";
        status = false;
    } else {
        document.getElementById("nganhdaotaof").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (phong_ban.length < 1) {
        document.getElementById("phong_banf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn phòng ban</i>";
        status = false;
    } else {
        document.getElementById("phong_ban").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (chuc_vu.length < 1) {
        document.getElementById("chuc_vuf").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn chức vụ</i>";
        status = false;
    } else {
        document.getElementById("chuc_vuf").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (tennickname.length < 1) {
        document.getElementById("tennicknamef").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("tennicknamef").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }

    if (status == false) {
        alert('Thông tin bạn nhập vào bị thiếu hoặc bị sai, vui lòng kiểm tra lại!!');
    }

    return status;
}