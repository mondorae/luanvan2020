-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 19, 2020 lúc 02:09 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(10) UNSIGNED NOT NULL,
  `idTheLoai` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`id`, `idTheLoai`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bất động sản', 'bat-dong-san', NULL, '2020-08-02 16:28:19'),
(2, 1, 'Du lịch - Vui chơi - Giải trí', 'du-lich-vui-choi-giai-tri', NULL, '2020-05-06 07:05:13'),
(3, 1, 'Công nghệ', 'cong-nghe', NULL, '2020-05-06 07:05:34'),
(4, 1, 'Y tế', 'y-te', NULL, '2020-05-06 07:05:43'),
(5, 1, 'Công nghiệp', 'cong-nghiep', NULL, '2020-05-06 07:07:54'),
(27, 1, 'Giáo dục', 'giao-duc', '2016-06-11 01:43:27', '2020-05-06 07:06:27'),
(31, 1, 'Nông nghiệp', 'nong-nghiep', '2020-04-30 19:03:58', '2020-05-06 07:06:43'),
(32, 1, 'Bán lẽ', 'ban-le', '2020-04-30 19:04:38', '2020-05-06 07:07:46'),
(37, 1, 'Tuyển Dụng', 'tuyen-dung', '2020-08-10 10:49:31', '2020-08-10 10:49:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_anhykien`
--

CREATE TABLE `tbl_anhykien` (
  `id` int(11) NOT NULL,
  `id_luuykien` int(11) NOT NULL,
  `ten_anh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bangluong`
--

CREATE TABLE `tbl_bangluong` (
  `id_bangluong` int(11) NOT NULL,
  `so_gio_lam_viec` double NOT NULL DEFAULT 0,
  `tong_tien_luong` double DEFAULT NULL,
  `luong_thang` date DEFAULT NULL,
  `thue_thu_nhap` int(11) DEFAULT NULL,
  `thue_bao_hiem` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_bangluong`
--

INSERT INTO `tbl_bangluong` (`id_bangluong`, `so_gio_lam_viec`, `tong_tien_luong`, `luong_thang`, `thue_thu_nhap`, `thue_bao_hiem`, `created_at`, `updated_at`, `id_nhanvien`) VALUES
(4, 12.722777777777779, 64241.02132435466, '2020-07-01', 0, 78750, '2020-07-27 08:12:31', '2020-07-31 07:40:35', 'GDGD.Nha.01'),
(7, 196, 64241.02132435466, '2020-06-01', 0, 78750, '2020-07-27 08:12:31', '2020-07-28 10:55:23', 'GDGD.Nha.01'),
(10, 8.126111111111111, NULL, '2020-08-01', NULL, NULL, '2020-08-03 09:32:33', '2020-08-18 05:01:28', 'GDGD.Nha.01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baohiem`
--

CREATE TABLE `tbl_baohiem` (
  `id_baohiem` int(11) NOT NULL,
  `so_bhyt` varchar(50) NOT NULL,
  `ngay_cap_bhyt` date NOT NULL,
  `noi_cap_bhyt` varchar(255) NOT NULL,
  `so_bhxh` varchar(50) NOT NULL,
  `ngay_cap_bhxh` date NOT NULL,
  `noi_cap_bhxh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chamcong`
--

CREATE TABLE `tbl_chamcong` (
  `id_chamcong` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `thoi_gian_lam` double DEFAULT NULL,
  `id_tangca` int(11) DEFAULT NULL,
  `id_bangluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chamcong`
--

INSERT INTO `tbl_chamcong` (`id_chamcong`, `check_in`, `thoi_gian_lam`, `id_tangca`, `id_bangluong`) VALUES
(6, '2020-07-27 09:51:08', 6.016388888888889, NULL, 4),
(14, '2020-07-28 15:29:38', NULL, 4, 4),
(15, '2020-07-29 17:58:59', NULL, NULL, 4),
(16, '2020-07-31 14:40:24', 0.0030555555555555557, NULL, 4),
(17, '2020-08-03 09:15:25', 8.011111111111111, NULL, 10),
(20, '2020-08-10 18:09:44', 0.0005555555555555556, NULL, 10),
(21, '2020-08-14 07:49:37', NULL, NULL, 10),
(22, '2020-08-18 11:55:26', 0.10055555555555555, NULL, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietphuluc`
--

CREATE TABLE `tbl_chitietphuluc` (
  `id` int(11) NOT NULL,
  `noi_dung_khac` longtext DEFAULT NULL,
  `thay_doi_luong` double DEFAULT NULL,
  `id_loaihopdong_moi` int(11) DEFAULT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `id_chucvu_moi` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `id_phucap_moi` int(11) DEFAULT NULL,
  `id_hopdong` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `id_chucvu` varchar(10) NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL,
  `id_phongban` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu`
--

INSERT INTO `tbl_chucvu` (`id_chucvu`, `ten_chuc_vu`, `id_phongban`, `created_at`, `updated_at`) VALUES
('GDGD', 'Giám đốc', 'GD', NULL, '2020-08-13 12:00:52'),
('NVKTTC', 'Nhân Viên KT-TC', 'KTTC', '2020-08-19 08:06:16', '2020-08-19 08:06:16'),
('NVMKT', 'Nhân Viên Maketing', 'MKT', '2020-08-19 08:05:40', '2020-08-19 08:05:40'),
('NVNS', 'Nhân Viên Nhân Sự', 'NS', '2020-08-19 08:04:38', '2020-08-19 08:04:38'),
('PGDPGD', 'Phó Giám Đốc', 'PGD', '2020-08-19 07:53:11', '2020-08-19 07:53:11'),
('QLKTTC', 'Quản Lý KT-TC', 'KTTC', '2020-08-19 08:03:26', '2020-08-19 08:03:26'),
('QLMKT', 'Quản Lý Maketing', 'MKT', '2020-08-19 08:01:29', '2020-08-19 08:02:37'),
('QLNS', 'Quản Lý Nhân Sự', 'NS', '2020-08-19 07:58:00', '2020-08-19 07:59:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu_permission`
--

CREATE TABLE `tbl_chucvu_permission` (
  `id` int(11) NOT NULL,
  `id_chucvu` varchar(10) CHARACTER SET utf8 NOT NULL,
  `id_permission` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chucvu_permission`
--

INSERT INTO `tbl_chucvu_permission` (`id`, `id_chucvu`, `id_permission`, `created_at`, `updated_at`) VALUES
(620, 'NVNS', 11, '2020-08-19 08:04:38', '2020-08-19 08:04:38'),
(621, 'NVNS', 15, '2020-08-19 08:04:38', '2020-08-19 08:04:38'),
(622, 'NVMKT', 3, '2020-08-19 08:05:40', '2020-08-19 08:05:40'),
(623, 'NVMKT', 11, '2020-08-19 08:05:40', '2020-08-19 08:05:40'),
(624, 'NVMKT', 15, '2020-08-19 08:05:40', '2020-08-19 08:05:40'),
(625, 'NVKTTC', 11, '2020-08-19 08:06:16', '2020-08-19 08:06:16'),
(626, 'NVKTTC', 15, '2020-08-19 08:06:16', '2020-08-19 08:06:16'),
(647, 'PGDPGD', 1, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(648, 'PGDPGD', 2, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(649, 'PGDPGD', 3, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(650, 'PGDPGD', 4, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(651, 'PGDPGD', 5, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(652, 'PGDPGD', 6, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(653, 'PGDPGD', 7, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(654, 'PGDPGD', 8, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(655, 'PGDPGD', 9, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(656, 'PGDPGD', 10, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(657, 'PGDPGD', 11, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(658, 'PGDPGD', 12, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(659, 'PGDPGD', 13, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(660, 'PGDPGD', 14, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(661, 'PGDPGD', 15, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(662, 'PGDPGD', 16, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(663, 'PGDPGD', 17, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(664, 'PGDPGD', 18, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(665, 'PGDPGD', 19, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(666, 'PGDPGD', 20, '2020-08-19 08:21:52', '2020-08-19 08:21:52'),
(667, 'QLMKT', 3, '2020-08-19 08:22:03', '2020-08-19 08:22:03'),
(668, 'QLMKT', 4, '2020-08-19 08:22:03', '2020-08-19 08:22:03'),
(669, 'QLMKT', 20, '2020-08-19 08:22:03', '2020-08-19 08:22:03'),
(670, 'QLNS', 9, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(671, 'QLNS', 10, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(672, 'QLNS', 11, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(673, 'QLNS', 12, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(674, 'QLNS', 14, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(675, 'QLNS', 15, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(676, 'QLNS', 16, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(677, 'QLNS', 17, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(678, 'QLNS', 18, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(679, 'QLNS', 19, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(680, 'QLNS', 20, '2020-08-19 08:22:15', '2020-08-19 08:22:15'),
(681, 'QLKTTC', 13, '2020-08-19 08:22:29', '2020-08-19 08:22:29'),
(682, 'QLKTTC', 20, '2020-08-19 08:22:29', '2020-08-19 08:22:29'),
(683, 'GDGD', 1, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(684, 'GDGD', 2, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(685, 'GDGD', 3, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(686, 'GDGD', 4, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(687, 'GDGD', 5, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(688, 'GDGD', 6, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(689, 'GDGD', 7, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(690, 'GDGD', 8, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(691, 'GDGD', 9, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(692, 'GDGD', 10, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(693, 'GDGD', 11, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(694, 'GDGD', 12, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(695, 'GDGD', 13, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(696, 'GDGD', 14, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(697, 'GDGD', 15, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(698, 'GDGD', 16, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(699, 'GDGD', 17, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(700, 'GDGD', 18, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(701, 'GDGD', 19, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(702, 'GDGD', 20, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(703, 'GDGD', 21, '2020-08-19 12:09:12', '2020-08-19 12:09:12'),
(704, 'GDGD', 22, '2020-08-19 12:09:12', '2020-08-19 12:09:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dantoc`
--

CREATE TABLE `tbl_dantoc` (
  `id_dantoc` int(20) NOT NULL,
  `maso_dantoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_dan_toc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dantoc`
--

INSERT INTO `tbl_dantoc` (`id_dantoc`, `maso_dantoc`, `ten_dan_toc`) VALUES
(1, '1', 'Kinh'),
(2, '2', 'Tày'),
(3, '3', 'Thái'),
(4, '4', 'Hoa'),
(5, '5', 'Khơ-me'),
(6, '6', 'Mường'),
(7, '7', 'Nùng'),
(8, '8', 'Hmông'),
(9, '9', 'Dao'),
(10, '10', 'Gia-rai'),
(11, '11', 'Ngái'),
(12, '12', 'Ê-đê'),
(13, '13', 'Ba-na'),
(14, '14', 'Xơ-đăng'),
(15, '15', 'Sán Chay'),
(16, '16', 'Cơ-ho'),
(17, '17', 'Chăm'),
(18, '18', 'Sán Dìu'),
(19, '19', 'Hrê'),
(20, '20', 'Mnông'),
(21, '21', 'Ra-glai'),
(22, '22', 'Xtiêng'),
(23, '23', 'Bru-Vân Kiều'),
(24, '24', 'Thổ'),
(25, '25', 'Giáy'),
(26, '26', 'Cơ-tu'),
(27, '27', 'Gié-Triêng'),
(28, '28', 'Mạ'),
(29, '29', 'Khơ-mú'),
(30, '30', 'Co'),
(31, '31', 'Ta-ôi'),
(32, '32', 'Chơ-ro'),
(33, '33', 'Kháng'),
(34, '34', 'Xinh-mun'),
(35, '35', 'Hà Nhì'),
(36, '36', 'Chu-ru'),
(37, '37', 'Lào'),
(38, '38', 'La Chi'),
(39, '39', 'La Ha'),
(40, '40', 'Phù Lá'),
(41, '41', 'La Hủ'),
(42, '42', 'Lự'),
(43, '43', 'Lô Lô'),
(44, '44', 'Chứt'),
(45, '45', 'Mảng'),
(46, '46', 'Pà Thẻn'),
(47, '47', 'Cơ Lao'),
(48, '48', 'Cống'),
(49, '49', 'Bố Y'),
(50, '50', 'Si La'),
(51, '51', 'Pu Péo'),
(52, '52', 'Brâu'),
(53, '53', 'Ơ Đu'),
(54, '54', 'Rơ-măm'),
(55, '55', 'Người nước ngoài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giadinh`
--

CREATE TABLE `tbl_giadinh` (
  `id_giadinh` int(11) NOT NULL,
  `ten_nguoi_than` varchar(255) NOT NULL,
  `cong_viec` varchar(255) NOT NULL,
  `sdt_di_dong` varchar(15) NOT NULL,
  `moi_quan_he` varchar(50) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giadinh`
--

INSERT INTO `tbl_giadinh` (`id_giadinh`, `ten_nguoi_than`, `cong_viec`, `sdt_di_dong`, `moi_quan_he`, `dia_chi`, `email`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(5, 'Lê Văn A', 'Ngủ', '123456789', 'Bạn', 'Trên', '2admin@gmail.com', 'GDGD.Nha.01', '2020-07-27 06:44:57', '2020-08-19 05:16:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hopdong`
--

CREATE TABLE `tbl_hopdong` (
  `id_hopdong` varchar(255) NOT NULL,
  `id_loaihopdong` int(11) NOT NULL,
  `noi_dung_cv` longtext DEFAULT NULL,
  `ngay_bat_dau_hop_dong` date NOT NULL,
  `muc_luong_chinh` double NOT NULL,
  `phu_cap` double NOT NULL,
  `ngay_ket_thuc_hop_dong` date DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:hợp đồng mới\r\n0:hợp đồng cũ',
  `id_phucap` int(11) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `nguoi_laphd` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hopdong`
--

INSERT INTO `tbl_hopdong` (`id_hopdong`, `id_loaihopdong`, `noi_dung_cv`, `ngay_bat_dau_hop_dong`, `muc_luong_chinh`, `phu_cap`, `ngay_ket_thuc_hop_dong`, `trang_thai`, `id_phucap`, `id_nhanvien`, `nguoi_laphd`, `created_at`, `updated_at`) VALUES
('1-HDLD-ABC', 2, 'Làm', '2020-07-01', 750000, 250000, NULL, 1, 1, 'GDGD.Nha.01', 'Nguyễn Thanh Nhã', '2020-07-27 06:52:25', '2020-07-27 06:52:25'),
('10-HDLD-ABC', 1, NULL, '2020-07-01', 123123, 250000, '2020-11-30', 0, 1, 'GDGD.Nha.01', 'Nhã', '2020-07-30 08:56:13', '2020-07-30 09:08:29'),
('11-HDLD-ABC', 2, NULL, '2020-08-01', 15000000, 3500000, NULL, 1, 35, 'PGDPGD.Nha.2', 'Nguyễn Thanh Nhã', '2020-08-19 08:57:46', '2020-08-19 08:57:46'),
('12-HDLD-ABC', 2, NULL, '2020-08-01', 22000000, 3500000, NULL, 1, 35, 'PGDPGD.Thanh.3', 'Nguyễn Thanh Nhã', '2020-08-19 09:02:58', '2020-08-19 09:02:58'),
('13-HDLD-ABC', 2, NULL, '2020-08-19', 15000000, 2600000, NULL, 1, 36, 'QLNS.Cuong.4', 'Nguyễn Thanh Nhã', '2020-08-19 09:07:54', '2020-08-19 09:07:54'),
('14-HDLD-ABC', 3, NULL, '2020-08-19', 1000000, 2600000, '2020-12-19', 1, 37, 'QLMKT.Dai.5', 'Nguyễn Thanh Nhã', '2020-08-19 09:13:49', '2020-08-19 09:13:49'),
('15-HDLD-ABC', 2, NULL, '2020-08-01', 15000000, 2600000, NULL, 1, 38, 'QLKTTC.Dat.6', 'Nguyễn Thanh Nhã', '2020-08-19 09:21:28', '2020-08-19 09:21:28'),
('16-HDLD-ABC', 3, NULL, '2020-08-01', 10000000, 1800000, '2020-11-20', 1, 39, 'NVNS.A.7', 'Nguyễn Thanh Nhã', '2020-08-19 09:49:43', '2020-08-19 09:49:43'),
('17-HDLD-ABC', 1, NULL, '2020-08-01', 12000000, 1800000, '2020-12-26', 1, 39, 'NVNS.A.8', 'Nguyễn Thanh Nhã', '2020-08-19 09:53:55', '2020-08-19 09:53:55'),
('18-HDLD-ABC', 3, NULL, '2020-08-01', 12000000, 1800000, '2020-08-31', 1, 40, 'NVMKT.T.9', 'Nguyễn Thanh Nhã', '2020-08-19 10:14:21', '2020-08-19 10:14:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoso`
--

CREATE TABLE `tbl_hoso` (
  `id_hoso` int(11) NOT NULL,
  `ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoso`
--

INSERT INTO `tbl_hoso` (`id_hoso`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Phiếu thông tin ứng viên', NULL, NULL),
(2, 'Giảm trừ gia cảnh', NULL, NULL),
(3, 'Sơ yếu lý lịch', NULL, NULL),
(4, 'Đơn xin việc', NULL, NULL),
(5, 'Chứng minh nhân dân', NULL, NULL),
(6, 'Giấy khám sức khỏe', NULL, NULL),
(7, 'Giấy khai sinh', NULL, NULL),
(8, 'Bằng chính (ĐH, CĐ, TC)', NULL, NULL),
(9, 'Chứng chỉ', NULL, NULL),
(10, 'Hộ khẩu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hosonhanvien`
--

CREATE TABLE `tbl_hosonhanvien` (
  `id_nhanvien` varchar(20) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT 0,
  `ngay_sinh` date NOT NULL,
  `id_hoso` text NOT NULL,
  `so_cmnd` varchar(12) NOT NULL,
  `ton_giao` varchar(255) NOT NULL,
  `ngay_cap_cmnd` date NOT NULL,
  `noi_cap_cmnd` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) NOT NULL,
  `id_dantoc` int(11) NOT NULL,
  `tinh_trang` int(11) NOT NULL COMMENT '1: đang lam\r\n2: nghĩ việc',
  `ngay_nghi` int(11) NOT NULL DEFAULT 12,
  `id_baohiem` int(11) DEFAULT NULL,
  `id_chucvu` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hosonhanvien`
--

INSERT INTO `tbl_hosonhanvien` (`id_nhanvien`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `id_hoso`, `so_cmnd`, `ton_giao`, `ngay_cap_cmnd`, `noi_cap_cmnd`, `anh_dai_dien`, `id_dantoc`, `tinh_trang`, `ngay_nghi`, `id_baohiem`, `id_chucvu`, `created_at`, `updated_at`) VALUES
('GDGD.Nha.01', 'Nguyễn Thanh Nhã', 1, '2020-07-01', '1,2,3', '123456', 'không', '2020-02-20', 'krb', 'CW3o_avatar-mat-trang-facebook.jpg', 1, 1, 12, NULL, 'GDGD', NULL, '2020-08-18 15:27:52'),
('NVMKT.T.9', 'Trần Thị T', 0, '2020-08-01', '5,8', '123123', 'không', '2020-08-19', 'ABC', 'usergirl.jpg', 1, 1, 12, NULL, 'NVMKT', '2020-08-19 10:14:00', '2020-08-19 10:14:00'),
('NVNS.A.7', 'Nguyễn Thị A', 0, '2020-08-01', '5,8', '123123123', '123', '2020-08-19', 'TP HCM', 'usergirl.jpg', 1, 1, 12, NULL, 'NVNS', '2020-08-19 09:49:21', '2020-08-19 09:49:21'),
('NVNS.A.8', 'Lê Thị A', 1, '2020-08-01', '7,10', '123', '123', '2020-08-21', '123', 'usermen.jpg', 2, 1, 12, NULL, 'NVNS', '2020-08-19 09:53:34', '2020-08-19 09:53:34'),
('PGDPGD.Nha.2', 'Nguyễn Thanh Nhã', 1, '1998-11-20', '1,3,4,5,7,8,10', '241659768', 'Không', '2016-05-02', 'Dak Lak', 'usermen.jpg', 1, 1, 12, NULL, 'PGDPGD', '2020-08-19 08:40:51', '2020-08-19 09:26:40'),
('PGDPGD.Thanh.3', 'Bùi Đặng Phương Thanh', 1, '1998-06-20', '1,4,5,6,7,8,10', '025677849', 'không', '2013-05-29', 'Công An TPHCM', 'usermen.jpg', 1, 1, 12, NULL, 'PGDPGD', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
('QLKTTC.Dat.6', 'Trương Phạm Quốc ĐẠt', 1, '1998-02-21', '7,8,10', '123456789', 'không', '2020-08-19', 'Quảng Ngãi', 'usermen.jpg', 1, 1, 12, NULL, 'QLKTTC', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
('QLMKT.Dai.5', 'Nguyễn Hoàng Phương Đại', 1, '1996-03-20', '1,4,6,7,8,10', '255255012', 'Đức chúa trời', '2020-08-19', 'Viva cf', 'usermen.jpg', 1, 1, 12, NULL, 'QLMKT', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
('QLNS.Cuong.4', 'Châu Chí Cường', 1, '1998-06-08', '1,3,4,5,6,7,8,10', '301648556', 'Không', '2013-07-15', 'Công an Tỉnh Long An', 'usermen.jpg', 1, 1, 12, NULL, 'QLNS', '2020-08-19 09:07:00', '2020-08-19 09:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `sdt_ca_nhan` varchar(15) NOT NULL,
  `sdt_nha` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi_thuong_tru` varchar(255) NOT NULL,
  `id_tinh_thuong_tru` int(20) NOT NULL,
  `dia_chi_tam_tru` varchar(255) NOT NULL,
  `id_tinh_tam_tru` int(20) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id_lienhe`, `sdt_ca_nhan`, `sdt_nha`, `email`, `dia_chi_thuong_tru`, `id_tinh_thuong_tru`, `dia_chi_tam_tru`, `id_tinh_tam_tru`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(1, '03659989981', '37331121', 'admi1n@gmail.com', 'Dak Lak1', 1, 'TP HCM1', 2, 'GDGD.Nha.01', NULL, '2020-08-19 05:16:27'),
(22, '0365998998', '0365998998', 'thanhnha22081998@gmail.com', 'Krong Bông', 39, '180 Cao Lỗ, Phường 4, Quận 8', 2, 'PGDPGD.Nha.2', '2020-08-19 08:40:51', '2020-08-19 08:40:51'),
(23, '0783488453', '0783488453', 'mondorae2006@gmail.com', 'Quận 1', 2, 'Quận 10', 2, 'PGDPGD.Thanh.3', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
(24, '0355287555', '0355287555', 'dh51603039@student.stu.edu.vn', 'Thủ Thừa', 48, '180 Cao Lỗ, Phường 4, Quận 8', 2, 'QLNS.Cuong.4', '2020-08-19 09:07:00', '2020-08-19 09:07:00'),
(25, '0346300399', '06503888888', 'dh51603039@student.stu.edu.vn', 'Cầu chữ Y', 2, 'Cầu chữ Y', 2, 'QLMKT.Dai.5', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
(26, '123456789', '123456789', 'dh5160584@student.stu.edu.vn', 'đâu đó', 4, '180 Cao Lỗ phường 4 Quận 8', 2, 'QLKTTC.Dat.6', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
(27, '123123', '123123', 'hkannck@gmailc.om', '1234', 2, '123145', 2, 'NVNS.A.7', '2020-08-19 09:49:21', '2020-08-19 09:49:21'),
(28, '123', '123', 'ahananha@gmail.com', '123213', 9, '123123', 9, 'NVNS.A.8', '2020-08-19 09:53:34', '2020-08-19 09:53:34'),
(29, '123123', '123123', 'nahanc@gmail.com', '123123', 16, '123', 12, 'NVMKT.T.9', '2020-08-19 10:14:00', '2020-08-19 10:14:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaihopdong`
--

CREATE TABLE `tbl_loaihopdong` (
  `id_loaihopdong` int(11) NOT NULL,
  `ten_hop_dong` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaihopdong`
--

INSERT INTO `tbl_loaihopdong` (`id_loaihopdong`, `ten_hop_dong`, `created_at`, `updated_at`) VALUES
(1, 'Hợp đồng lao động xác định thời hạn', NULL, NULL),
(2, 'Hợp đồng lao động không xác định thời hạn', NULL, NULL),
(3, 'Hợp đồng lao động thời vụ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaiphuluc`
--

CREATE TABLE `tbl_loaiphuluc` (
  `id` int(11) NOT NULL,
  `ten_phu_luc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaiphuluc`
--

INSERT INTO `tbl_loaiphuluc` (`id`, `ten_phu_luc`, `created_at`, `updated_at`) VALUES
(1, 'Điều chỉnh tiền lương', NULL, NULL),
(2, 'Thay đổi chức vụ', NULL, NULL),
(3, 'Thay đổi, gia hạn hợp đồng', NULL, NULL),
(4, 'Khác', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_luuykien`
--

CREATE TABLE `tbl_luuykien` (
  `id_luuykien` int(11) NOT NULL,
  `ly_do` varchar(255) NOT NULL,
  `nguoi_duyet_1` varchar(50) DEFAULT NULL,
  `chuc_vu_1` varchar(50) DEFAULT NULL,
  `nguoi_duyet_2` varchar(50) DEFAULT NULL,
  `chuc_vu_2` varchar(50) DEFAULT NULL,
  `gia_tri` double DEFAULT NULL,
  `thoi_gian_nghi` int(11) DEFAULT NULL,
  `ngay_bat_dau` date DEFAULT NULL,
  `nguoi_huong` varchar(50) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `ly_do_tu_choi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `id_ykien` int(11) NOT NULL,
  `id_chucvu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_luuykien`
--

INSERT INTO `tbl_luuykien` (`id_luuykien`, `ly_do`, `nguoi_duyet_1`, `chuc_vu_1`, `nguoi_duyet_2`, `chuc_vu_2`, `gia_tri`, `thoi_gian_nghi`, `ngay_bat_dau`, `nguoi_huong`, `trang_thai`, `ly_do_tu_choi`, `created_at`, `updated_at`, `id_nhanvien`, `id_ykien`, `id_chucvu`) VALUES
(47, '102', 'Nguyễn Thanh Nhã', 'Giám đốc', NULL, NULL, NULL, NULL, '3212-12-12', NULL, 1, NULL, '2020-08-13 08:36:22', '2020-08-15 04:48:53', 'GDGD.Nha.01', 102, NULL),
(48, '123', 'Nguyễn Thanh Nhã', 'Giám đốc', NULL, NULL, NULL, NULL, '2020-08-18', NULL, 1, NULL, '2020-08-18 05:02:07', '2020-08-18 05:02:27', 'GDGD.Nha.01', 7, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_mientrugiacanh`
--

CREATE TABLE `tbl_mientrugiacanh` (
  `id_mientrugiacanh` int(11) NOT NULL,
  `so_luong_mien_tru` int(11) NOT NULL,
  `anh_minh_chung` varchar(255) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_mientrugiacanh`
--

INSERT INTO `tbl_mientrugiacanh` (`id_mientrugiacanh`, `so_luong_mien_tru`, `anh_minh_chung`, `id_nhanvien`) VALUES
(1, 2, '', 'GDGD.Nha.01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nghiphep`
--

CREATE TABLE `tbl_nghiphep` (
  `id_nghiphep` int(11) NOT NULL,
  `nguoi_duyet` varchar(100) NOT NULL,
  `so_ngay_nghi` int(11) NOT NULL,
  `tu_ngay` date NOT NULL,
  `den_ngay` date NOT NULL,
  `ly_do_nghi` varchar(250) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nghiviec`
--

CREATE TABLE `tbl_nghiviec` (
  `id_nghiviec` int(11) NOT NULL,
  `ly_do_nghi_viec` varchar(250) NOT NULL,
  `ngay_nghi` date NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `nguoi_quet_dinh` varchar(255) NOT NULL,
  `nguoi_nghi_viec` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ten_hien_thi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`id`, `ten`, `ten_hien_thi`, `created_at`, `updated_at`) VALUES
(1, 'theloai', 'Quản lý thể loại tin tức', NULL, NULL),
(2, 'loaitin', 'Quản lý loại tin tin tức', NULL, NULL),
(3, 'tintuc', 'Quản lý tin tức', NULL, NULL),
(4, 'thongtincongty', 'Quản lý thông tin công ty', NULL, NULL),
(5, 'phongban', 'Quản lý phòng ban', NULL, NULL),
(6, 'chucvu', 'Quản lý chức vụ', NULL, NULL),
(7, 'phucap', 'Quản lý phụ cấp', NULL, NULL),
(8, 'quanlyhopdong', 'Quản lý hợp đồng', NULL, NULL),
(9, 'dsnhanvien', 'Danh sách nhân viên', NULL, NULL),
(10, 'quanlyykien', 'Quản lý ý kiến của nhân viên', NULL, NULL),
(11, 'ykien', 'Đưa ý kiến', NULL, NULL),
(12, 'quanlyloaiykien', 'Quản lý các loại ý kiến của nhân viên', NULL, NULL),
(13, 'quanlyluong', 'Quản lý lương nhân viên', NULL, NULL),
(14, 'thongtinnhanvien', 'Quản lý thông tin nhân viên', NULL, NULL),
(15, 'hopdongcanhan', 'Xem hợp đồng cá nhân', NULL, NULL),
(16, 'laphoso', 'Lập hồ sơ nhân viên', NULL, NULL),
(17, 'laphopdong', 'Quản lý hợp đồng nhân viên', NULL, NULL),
(18, 'lapphuluc', 'Quản lý phụ lục nhân viên', NULL, NULL),
(19, 'lapquyetdinh', 'Quản lý quyết định kỷ luật nhân viên', NULL, NULL),
(20, 'qlnhanvienpb', 'Quản lý nhân viên phòng ban', NULL, NULL),
(21, 'quyenduyetyk', 'Quyền duyệt ý kiến nhân viên', NULL, NULL),
(22, 'xacnhanyk', 'Quyền xác nhân ý kiến nhân viên', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phongban`
--

CREATE TABLE `tbl_phongban` (
  `id_phongban` varchar(10) NOT NULL,
  `ten_phong_ban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phongban`
--

INSERT INTO `tbl_phongban` (`id_phongban`, `ten_phong_ban`, `created_at`, `updated_at`) VALUES
('GD', 'Giám đốc', NULL, NULL),
('KTTC', 'Kế Toán- Tài Chính', '2020-08-19 07:38:44', '2020-08-19 07:38:44'),
('MKT', 'Marketing', '2020-08-19 07:40:54', '2020-08-19 07:40:54'),
('NS', 'Nhân sự', '2020-08-19 07:38:02', '2020-08-19 07:38:02'),
('PGD', 'Phó giám đốc', '2020-08-19 07:33:51', '2020-08-19 07:33:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phucap`
--

CREATE TABLE `tbl_phucap` (
  `id` int(11) NOT NULL,
  `an_trua` double DEFAULT NULL,
  `xang_xe` double DEFAULT NULL,
  `khac` double DEFAULT NULL,
  `tong_tien_phu_cap` double DEFAULT NULL,
  `id_chucvu` varchar(10) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_phucap`
--

INSERT INTO `tbl_phucap` (`id`, `an_trua`, `xang_xe`, `khac`, `tong_tien_phu_cap`, `id_chucvu`, `created_at`, `updated_at`) VALUES
(1, 1500000, 100000, 100000, 1700000, 'GDGD', NULL, '2020-08-19 07:56:09'),
(35, 1500000, 1000000, 1000000, 3500000, 'PGDPGD', '2020-08-19 07:53:11', '2020-08-19 07:55:53'),
(36, 1000000, 800000, 800000, 2600000, 'QLNS', '2020-08-19 07:58:00', '2020-08-19 07:58:52'),
(37, 1000000, 800000, 800000, 2600000, 'QLMKT', '2020-08-19 08:01:29', '2020-08-19 08:01:40'),
(38, 1000000, 800000, 800000, 2600000, 'QLKTTC', '2020-08-19 08:03:26', '2020-08-19 08:03:38'),
(39, 800000, 500000, 500000, 1800000, 'NVNS', '2020-08-19 08:04:38', '2020-08-19 08:04:50'),
(40, 800000, 500000, 500000, 1800000, 'NVMKT', '2020-08-19 08:05:40', '2020-08-19 08:05:50'),
(41, 800000, 500000, 500000, 1800000, 'NVKTTC', '2020-08-19 08:06:16', '2020-08-19 08:06:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phuluc`
--

CREATE TABLE `tbl_phuluc` (
  `id_phuluc` varchar(255) NOT NULL,
  `id_hopdong` varchar(255) NOT NULL,
  `nguoi_lap_phu_luc` varchar(250) NOT NULL,
  `id_loaiphuluc` int(11) NOT NULL,
  `id_chitiet` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quyetdinhthoiviec`
--

CREATE TABLE `tbl_quyetdinhthoiviec` (
  `id` int(11) NOT NULL,
  `noi_dung` longtext NOT NULL,
  `ngay_quyet_dinh` date NOT NULL,
  `ngay_nghi_viec` date NOT NULL,
  `nguoi_lap_quyet_dinh` varchar(255) NOT NULL,
  `loai` int(11) NOT NULL,
  `id_nhanvien` varchar(20) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_quyetdinhthoiviec`
--

INSERT INTO `tbl_quyetdinhthoiviec` (`id`, `noi_dung`, `ngay_quyet_dinh`, `ngay_nghi_viec`, `nguoi_lap_quyet_dinh`, `loai`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(12, 'Không hoàn thành trách nhiệm', '2020-08-01', '2020-08-30', 'Nguyễn Thanh Nhã', 1, 'NVNS.A.8', '2020-08-19 09:54:38', '2020-08-19 09:54:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tangca`
--

CREATE TABLE `tbl_tangca` (
  `id_tangca` int(11) NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `thoi_gian_lam` double DEFAULT NULL,
  `ghi_nhan` int(11) DEFAULT 0,
  `ly_do` varchar(255) DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_tangca`
--

INSERT INTO `tbl_tangca` (`id_tangca`, `check_in`, `thoi_gian_lam`, `ghi_nhan`, `ly_do`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(4, '2020-07-28 15:37:38', 1, 1, NULL, 'GDGD.Nha.01', '2020-07-28 08:07:31', '2020-07-28 09:44:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtinchinh`
--

CREATE TABLE `tbl_thongtinchinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_cong_ty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_dai_dien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuc_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtinchinh`
--

INSERT INTO `tbl_thongtinchinh` (`id`, `ten_cong_ty`, `Hinh`, `dia_chi`, `sdt`, `Fax`, `website`, `nguoi_dai_dien`, `chuc_vu`, `mail`, `created_at`, `updated_at`) VALUES
(8, 'TNHH CÔNG NGHỆ SÀI GÒN', 'jGXb_STU_Logo_Letters.png', '180 Cao lỗ, Phường 4, Quận 8, TP HCM', '0365998998', '123456789', 'https://www.stu.edu.vn', 'Nhã and Thanh', 'Giám đốc', 'ahn.krb1@gmail.com', '2020-08-09 18:04:14', '2020-08-14 04:53:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongtingioithieu`
--

CREATE TABLE `tbl_thongtingioithieu` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongtingioithieu`
--

INSERT INTO `tbl_thongtingioithieu` (`id`, `Ten`, `Hinh`, `NoiDung`, `created_at`, `updated_at`) VALUES
(4, 'Tiêu điểm1', 'Tuyển-tập-hình-nền-4K-dành-cho-máy-tính-đẹp-7.jpg', '<h2 style=\"margin-bottom: 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2020-05-06 16:50:11', '2020-08-17 08:22:49'),
(8, 'abvc', '115777478_743350246492105_4490654208291039648_n.jpg', '<b><i><u>Xin chào:</u></i></b><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div><b><i><u>Tôi tên là Nhã</u></i></b></div></blockquote><div><div><b><i><u><br></u></i></b><div><b><i><u><br></u></i></b><div><b><i><u><br></u></i></b><div><b><i><u><br></u></i></b></div></div></div></div></div>', '2020-08-17 08:00:55', '2020-08-17 08:00:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuecanhan`
--

CREATE TABLE `tbl_thuecanhan` (
  `id_thuecanhan` int(11) NOT NULL,
  `thue_bhxh` double NOT NULL,
  `thue_bhyt` double NOT NULL,
  `thue_bhtn` double NOT NULL,
  `thue_thu_nhap` double NOT NULL,
  `tong_tien_thue` double NOT NULL,
  `id_bangluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tinh`
--

CREATE TABLE `tbl_tinh` (
  `id_tinh` int(20) NOT NULL,
  `maso_tinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_tinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tinh`
--

INSERT INTO `tbl_tinh` (`id_tinh`, `maso_tinh`, `ten_tinh`) VALUES
(1, '1', 'Hà Nội'),
(2, '2', 'TP. Hồ Chí Minh'),
(3, '3', 'Hải Phòng'),
(4, '4', 'Đà Nẵng'),
(5, '5', 'Hà Giang'),
(6, '6', 'Cao Bằng'),
(7, '7', 'Lai Châu'),
(8, '8', 'Lào Cai'),
(9, '9', 'Tuyên Quang'),
(10, '10', 'Lạng Sơn'),
(11, '11', 'Bắc Kạn'),
(12, '12', 'Thái Nguyên'),
(13, '13', 'Yên Bái'),
(14, '14', 'Sơn La'),
(15, '15', 'Phú Thọ'),
(16, '16', 'Vĩnh Phúc'),
(17, '17', 'Quảng Ninh'),
(18, '18', 'Bắc Giang'),
(19, '19', 'Bắc Ninh'),
(20, '21', 'Hải Dương'),
(21, '22', 'Hưng Yên'),
(22, '23', 'Hoà Bình'),
(23, '24', 'Hà Nam'),
(24, '25', 'Nam Định'),
(25, '26', 'Thái Bình'),
(26, '27', 'Ninh Bình'),
(27, '28', 'Thanh Hoá'),
(28, '29', 'Nghệ An'),
(29, '30', 'Hà Tĩnh'),
(30, '31', 'Quảng Bình'),
(31, '32', 'Quảng Trị'),
(32, '33', 'Thừa Thiên -Huế'),
(33, '34', 'Quảng Nam'),
(34, '35', 'Quảng Ngãi'),
(35, '36', 'Kon Tum'),
(36, '37', 'Bình Định'),
(37, '38', 'Gia Lai'),
(38, '39', 'Phú Yên'),
(39, '40', 'Đắk Lắk'),
(40, '41', 'Khánh Hoà'),
(41, '42', 'Lâm Đồng'),
(42, '43', 'Bình Phước'),
(43, '44', 'Bình Dương'),
(44, '45', 'Ninh Thuận'),
(45, '46', 'Tây Ninh'),
(46, '47', 'Bình Thuận'),
(47, '48', 'Đồng Nai'),
(48, '49', 'Long An'),
(49, '50', 'Đồng Tháp'),
(50, '51', 'An Giang'),
(51, '52', 'Bà Rịa-Vũng Tàu'),
(52, '53', 'Tiền Giang'),
(53, '54', 'Kiên Giang'),
(54, '55', 'Cần Thơ'),
(55, '56', 'Bến Tre'),
(56, '57', 'Vĩnh Long'),
(57, '58', 'Trà Vinh'),
(58, '59', 'Sóc Trăng'),
(59, '60', 'Bạc Liêu'),
(60, '61', 'Cà Mau'),
(61, '62', 'Điện Biên'),
(62, '63', 'Đăk Nông'),
(63, '64', 'Hậu Giang'),
(64, '65', 'Cục nhà trường'),
(65, '-1', 'Nơi sinh khác ( các tỉnh củ)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuyendung`
--

CREATE TABLE `tbl_tintuyendung` (
  `id` int(10) UNSIGNED NOT NULL,
  `vi_tri` varchar(10) CHARACTER SET utf8 NOT NULL,
  `muc_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `han_nop` date NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mail_nhan_tin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuyendung`
--

INSERT INTO `tbl_tintuyendung` (`id`, `vi_tri`, `muc_luong`, `han_nop`, `Hinh`, `NoiDung`, `created_at`, `updated_at`, `mail_nhan_tin`) VALUES
(10, 'GDGD', '78tr-8tr', '2020-08-31', 'yWws_115777478_743350246492105_4490654208291039648_n.jpg', '<p><strong>I. BẠN SẼ L&Agrave;M G&Igrave;?</strong></p>\r\n\r\n<ul>\r\n	<li>Chịu tr&aacute;ch nhiệm hoạt động vận h&agrave;nh của cửa h&agrave;ng.</li>\r\n	<li>Quản l&yacute; đội ngũ nh&acirc;n vi&ecirc;n l&agrave;m việc hiệu quả bao gồm hoạt động đ&agrave;o tạo, tuyển dụng, ph&acirc;n c&ocirc;ng c&ocirc;ng việc.</li>\r\n	<li>Đảm bảo hoạt động chăm s&oacute;c kh&aacute;ch h&agrave;ng đ&uacute;ng ti&ecirc;u chuẩn c&ocirc;ng ty đề ra.</li>\r\n	<li>Chịu tr&aacute;ch nhiệm về doanh số b&aacute;n h&agrave;ng của cửa h&agrave;ng.</li>\r\n	<li>B&aacute;o c&aacute;o t&igrave;nh h&igrave;nh hoạt động cửa h&agrave;ng v&agrave; đề xuất những giải ph&aacute;p ph&ugrave; hợp.</li>\r\n	<li>Nhiệm vụ kh&aacute;c được ph&acirc;n c&ocirc;ng bởi cấp tr&ecirc;n.</li>\r\n</ul>\r\n\r\n<p><strong>II. BẠN CẦN G&Igrave;?</strong></p>\r\n\r\n<ul>\r\n	<li>C&oacute; &iacute;t nhất 1 năm kinh nghiệm tại vị tr&iacute; Quản l&iacute; cửa h&agrave;ng tại c&aacute;c&nbsp;<strong>CỬA H&Agrave;NG TIỆN LỢI</strong>.</li>\r\n	<li>Ưu ti&ecirc;n tiếng Anh giao tiếp.</li>\r\n	<li>Nhanh nhẹn, linh hoạt, chủ động trong c&ocirc;ng việc.</li>\r\n	<li>C&oacute; tinh thần tr&aacute;ch nhiệm v&agrave; cầu tiến.</li>\r\n</ul>\r\n\r\n<p><strong>III. THỜI GIAN L&Agrave;M VIỆC CỦA BẠN</strong></p>\r\n\r\n<ul>\r\n	<li>08h00 &ndash; 17h00.</li>\r\n</ul>\r\n\r\n<p><strong>IV. TẠI SAO BẠN N&Ecirc;N L&Agrave;M TẠI VIỆC GS25?</strong></p>\r\n\r\n<ul>\r\n	<li>12 ng&agrave;y ph&eacute;p/năm.</li>\r\n	<li>G&oacute;i bảo hiểm cao cấp của GS25.</li>\r\n	<li>BHXH, BHYT, BHTN đầy đủ.</li>\r\n	<li>Cơ hội thăng tiến r&otilde; r&agrave;ng.</li>\r\n	<li>L&agrave;m việc trong m&ocirc;t trường trẻ, năng động, th&acirc;n thiện.</li>\r\n	<li>Được trang bị kiến thức chuy&ecirc;n nghiệp trong ng&agrave;nh b&aacute;n lẻ.</li>\r\n</ul>', '2020-08-17 10:09:31', '2020-08-17 11:02:08', '123@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trinhdo`
--

CREATE TABLE `tbl_trinhdo` (
  `id_trinhdo` int(11) NOT NULL,
  `muc_trinh_do` varchar(50) NOT NULL,
  `nganh_dao_tao` varchar(50) NOT NULL,
  `noi_dao_tao` varchar(50) NOT NULL,
  `chuyen_nganh` varchar(50) NOT NULL,
  `nam_tot_nghiep` year(4) NOT NULL,
  `xep_loai` varchar(50) NOT NULL,
  `chung_chi_khac` varchar(50) NOT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_trinhdo`
--

INSERT INTO `tbl_trinhdo` (`id_trinhdo`, `muc_trinh_do`, `nganh_dao_tao`, `noi_dao_tao`, `chuyen_nganh`, `nam_tot_nghiep`, `xep_loai`, `chung_chi_khac`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(1, 'Đại học', 'CNTT', 'STU', 'CNTT', 2020, 'Giỏi', 'không', 'GDGD.Nha.01', NULL, '2020-07-27 06:44:57'),
(24, 'Đại học', 'Công Nghệ Thông Tin', 'Công Nghệ Sài Gòn', 'Công Nghệ Thông Tin', 2020, 'Trung Bình Khá', 'không', 'PGDPGD.Nha.2', '2020-08-19 08:40:51', '2020-08-19 08:40:51'),
(25, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ Sài Gòn', 'Công nghệ thông tin', 2020, 'Khá', 'không', 'PGDPGD.Thanh.3', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
(26, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ  Sài Gòn', 'Công nghệ thông tin', 2020, 'Khá', 'không', 'QLNS.Cuong.4', '2020-08-19 09:07:00', '2020-08-19 09:07:00'),
(27, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ Sài Gòn', 'Công nghệ thông tin', 2020, 'Khá', 'Không', 'QLMKT.Dai.5', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
(28, 'Đại học', 'Công nghệ thông tin', 'Công Nghệ Sài Gòn', 'Công nghệ thông tin', 2020, 'Giỏi', 'không', 'QLKTTC.Dat.6', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
(29, 'Đại học', '123123', '123123', '123123', 2020, 'Giỏi', '123213', 'NVNS.A.7', '2020-08-19 09:49:21', '2020-08-19 09:49:21'),
(30, 'Đại học', '123', '12321', '123', 2020, 'Giỏi', '123', 'NVNS.A.8', '2020-08-19 09:53:34', '2020-08-19 09:53:34'),
(31, 'Đại học', '123', '123213', '123', 2020, 'Khá', '123', 'NVMKT.T.9', '2020-08-19 10:14:00', '2020-08-19 10:14:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ykien`
--

CREATE TABLE `tbl_ykien` (
  `id_ykien` int(11) NOT NULL,
  `loai_y_kien` varchar(255) NOT NULL,
  `chi_tiet` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_ykien`
--

INSERT INTO `tbl_ykien` (`id_ykien`, `loai_y_kien`, `chi_tiet`, `created_at`, `updated_at`) VALUES
(1, 'Đề Xuất Nghỉ Phép', '2,4,5', NULL, NULL),
(2, 'Xin Nghỉ Phép Vì Vợ Sắp Sinh', '2,3,5,6', NULL, NULL),
(3, 'Xin Nghỉ Phép Việc Riêng', '2,5,6', NULL, NULL),
(4, 'Xin Nghỉ Phép Vì Lý Do Bệnh Tật', '2,5,6', NULL, NULL),
(5, 'Đề Xuất Ứng Lương', '2,3', NULL, NULL),
(6, 'Đề Xuất Tăng Lương', '2,3', NULL, NULL),
(7, 'Đề Xuất Tăng Ca', '2,5', NULL, NULL),
(8, 'Đề Xuất Chuyển Công Tác', '2', NULL, NULL),
(9, 'Đề Xuất Khen Thưởng', '1,2', NULL, NULL),
(10, 'Đề Xuất Kỷ Luật', '1,2', NULL, NULL),
(11, 'Xin phép nghĩ việc', '2,5,6', '2020-08-13 08:08:10', '2020-08-13 08:08:10'),
(12, 'Đề Xuất Khác', '2', NULL, NULL),
(102, 'Xin phép nghỉ việc 1', '2,5,6', '2020-08-13 08:29:45', '2020-08-13 08:29:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức- Sự kiện', 'tin-tuc-su-kien', NULL, '2020-08-10 10:49:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT 0,
  `SoLuotXem` int(11) DEFAULT NULL,
  `idLoaiTin` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idLoaiTin`, `created_at`, `updated_at`) VALUES
(1, 'VINSMART HỢP TÁC VỚI PININFARINA THIẾT KẾ ĐIỆN THOẠI THÔNG MINH THẾ HỆ MỚI', 'vinsmart-hop-tac-voi-pininfarina-thiet-ke-dien-thoai-thong-minh-the-he-moi', 'không', 'Ngày 4/5/2020, Công ty Nghiên cứu và Sản xuất VinSmart (thuộc Tập đoàn Vingroup) chính thức công bố thỏa thuận hợp tác chiến lược với hãng thiết kế công nghiệp hàng đầu thế giới Pininfarina (Italia). Thỏa thuận hợp tác mở ra kỷ nguyên mới cho dòng sản phẩm VinSmart: thông minh hơn – thời thượng hơn và nhất quán với ngôn ngữ thiết kế quốc tế.\r\n\r\nDự kiến, điện thoại thông minh Vsmart sử dụng ngôn ngữ thiết kế mới sẽ ra mắt thị trường ngay trong năm 2020. Đây sẽ là sự hội tụ của chất lượng và hiệu năng vượt trội từ VinSmart với vẻ đẹp thanh lịch và tinh tế từ Pininfarina.\r\n\r\nNgay sau thỏa thuận, hai bên sẽ cùng xây dựng ngôn ngữ thiết kế đặc trưng cho các dòng điện thoại thông minh thương hiệu Vsmart thế hệ mới, bao gồm hình thức thân vỏ, cách thức hiển thị và ngôn ngữ vận hành.\r\n\r\nCụ thể, các sản phẩm Vsmart mang dấu ấn Pininfarina sẽ có kiểu dáng thời thượng, giao diện màn hình chờ và cách hiển thị lôi cuốn về mặt thị giác. Bên cạnh đó, bao bì sản phẩm, thao tác mở, cách sắp xếp linh kiện bên trong cũng được thiết kế thông minh và nhất quán nhằm đảm bảo người sử dụng có những trải nghiệm hoàn hảo nhất.\r\n\r\nPininfarina là một trong những studio thiết kế hàng đầu thế giới trong lĩnh vực thiết kế công nghiệp và kiến trúc. Hãng đã ghi dấu ấn với hơn 600 dự án được triển khai cùng hàng loạt giải thưởng uy tín và là nhà thiết kế của nhiều siêu phẩm công nghiệp – công nghệ nổi tiếng toàn cầu.\r\n\r\n“Pininfarina là đối tác thiết kế 02 mẫu xe VinFast Lux SUV và VinFast Lux Sedan, góp phần mang lại danh tiếng cho VinFast và Vingroup tại Paris Motor Show 2018. Do đó, chúng tôi kỳ vọng, Pininfarina sẽ lập lại kỳ tích này với VinSmart để cùng ra mắt những sản phẩm điện thoại thông minh, có chất lượng vượt trội cùng vẻ đẹp thời thượng và đẳng cấp quốc tế” - ông Trần Minh Trung, Phó Tổng Giám đốc Công ty Nghiên cứu và Sản xuất VinSmart chia sẻ.\r\n\r\nTrước đó, VinSmart đã hoàn tất thỏa thuận hợp tác với các tên tuổi hàng đầu thế giới như Qualcomm, Google… nhằm đưa các công nghệ mang tính dẫn dắt cùng trải nghiệm tối ưu vào sản phẩm. Với việc hợp tác với Pininfarina – VinSmart tiếp tục khẳng định khát vọng bước ra thế giới bằng những sản phẩm mang vẻ đẹp và đẳng cấp toàn cầu.\r\n\r\nVinSmart hiện có tốc độ phát triển mạnh mẽ, đạt 16,7% thị phần điện thoại thông minh trong nước chỉ sau 15 tháng ra mắt sản phẩm.', 'wVAF_VSM03.jpg', 1, 0, 5, '2020-05-07 01:31:26', '2020-05-07 15:19:01'),
(1009, 'VINHOMES OCEAN PARK ĐƯỢC VINH DANH DỰ ÁN PHỨC HỢP TỐT NHẤT VIỆT NAM TẠI APPA', 'vinhomes-ocean-park-duoc-vinh-danh-du-an-phuc-hop-tot-nhat-viet-nam-tai-appa', 'không', 'Vinhomes Ocean Park đã chinh phục Hội đồng giám khảo quốc tế bởi hệ thống tiện ích đồng bộ và đầy đủ, bao gồm: trường học, bệnh viện, TTTM, Shop/Shophouse,.. Cùng với đó là hàng loạt tiện ích điểm nhấn lần đầu tiên xuất hiện tại Việt Nam như công viên gym với hàng trăm máy tập, công viên BBQ với hàng trăm điểm nướng, hàng chục công viên dưỡng sinh, sân chơi trẻ em,... Đặc biệt, hai tâm điểm của dự án là biển hồ nước mặn 6,1ha và hồ lớn trung tâm 24,5ha đều được trải cát trắng như bãi biển đã thuyết phục hoàn toàn Hội đồng giám khảo bằng tính táo bạo và đột phá trong ý tưởng thiết kế.\r\n\r\nĐại diện Chủ đầu tư, bà Nguyễn Diệu Linh - Phó Chủ tịch Tập đoàn Vingroup, Chủ tịch công ty Cổ phần Vinhomes chia sẻ: “Chúng tôi thực sự vui mừng khi một lần nữa, thêm một dự án bất động sản Vinhomes lại dành hạng xứng đáng tại APPA 2019. Không dừng lại ở một thương hiệu bất sản dẫn dắt thị trường trong nước, Vinhomes trong những năm gần đây liên tục tạo được tiếng vang trên trường quốc tế với nhiều dự án chiến thắng tại các hạng mục giải thưởng danh giá toàn cầu.”\r\n\r\nCùng Vinhomes Ocean Park, Vinhomes Star City, Vinhomes Smart City và Vinhomes Grand Park lần lượt được vinh danh tại các hạng mục giải thưởng Dự án có kiến trúc phức hợp tốt của Việt Nam, Dự án cao tầng tốt của Việt Nam và Dự án cao tầng có thiết kế cảnh quan tốt của Việt Nam.\r\n\r\nGiải thưởng bất động sản Châu Á - Thái Bình Dương APPA thuộc hệ thống giải thưởng bất động sản danh giá và uy tín bậc nhất trên thế giới International Property Awards. Trong nhiều tiêu chí đánh giá, giải thưởng đề cao các tiêu chí về chất lượng cuộc sống cho cư dân. APPA được tổ chức thường niên để vinh danh các chủ đầu tư và dự án xuất sắc trong lĩnh vực phát triển bất động sản.\r\nTrước Vinhomes Ocean Park, nhiều dự án của Vinhomes đã được vinh danh trong hệ thống giải thưởng BĐS danh giá IPA như Vinhomes Metropolis với giải thưởng Tòa nhà cao tầng tốt nhất Châu Á – Thái Bình Dương năm 2017, Landmark 81 với giải thường Tòa nhà cao tầng tốt nhất thế giới năm 2017, Vinhomes Riverside với giải thưởng Khu đô thị tốt nhất thế giới năm 2018.\r\n\r\nChính thức khởi công từ tháng 10/2018, cho tới nay chỉ sau 8 tháng thi công, Vinhomes Ocean Park đã thành hình với các cung đường nội khu rộng lớn rộng 30m, 40m, 50m trải nhựa và hoàn thiện mặt đường chỉn chu. Các tòa căn hộ đã lên đến tầng 13,14 với các khối nhà được hình thành vững chãi. Các công trình trọng điểm trong dự án như Đại học VinUni cũng đang được triển khai thi công nhanh chóng.\r\n\r\nĐặc biệt, chỉ sau gần 70 ngày thi công thần tốc, cảnh quan trung tâm bao gồm hồ điều hòa rộng 24.5ha đã gần như hoàn tất. Bao quanh mặt hồ xanh mát là bờ cát trắng mịn trải dài được kỳ công vận chuyển từ biển Nha Trang, trải qua nhiều công đoạn sàng sảy kỹ càng nhiều lớp để đạt được màu cát trắng tự nhiên như ở biển thật. Hàng trăm gốc dừa được bố trí trồng đan xen quanh hồ để tạo nên cảnh quan thiên nhiên như bãi biển giữa lòng thành phố. Hiện tại, hầu hết các hạng mục cảnh quan điểm nhấn quanh hồ đều đã hoàn thiện, sẵn sàng cho lễ khai trương vào ngày 25/05/2019 với một đêm đại nhạc hội hoành tráng bên hồ dành cho hơn 3000 cư dân Thành phố Biển hồ Vinhomes Ocean Park.', 'p2sf_APPA 1.jpg', 0, 0, 1, '2020-05-07 01:42:26', '2020-05-07 15:22:30'),
(1012, 'VINPEARL CÔNG BỐ CHIẾN LƯỢC MỞ RỘNG THỊ TRƯỜNG QUỐC TẾ VÀ HỢP TÁC HÀNG KHÔNG', 'vinpearl-cong-bo-chien-luoc-mo-rong-thi-truong-quoc-te-va-hop-tac-hang-khong', 'không', 'Ngày 20/02/2020, Công ty CP Vinpearl công bố chiến lược mở rộng thị trường quốc tế tới nhiều quốc gia và khu vực; hợp tác toàn diện với các hãng hàng không nội địa và cung cấp các gói dịch vụ du lịch trọn gói cao cấp. Mục tiêu chiến lược nhằm góp phần thúc đẩy tăng trưởng số lượng du khách trong nước và quốc tế đến với hệ thống Vinpearl nói riêng và Việt Nam nói chung.\r\n\r\nTheo kế hoạch này, Công ty Vinpearl sẽ mở văn phòng đại diện tại các thị trường chiến lược để xúc tiến quảng bá sản phẩm du lịch và phát triển kinh doanh trực tiếp. Các thị trường triển khai đầu tiên của Vinpearl gồm: Nga, Úc, Nhật Bản, Hàn Quốc và Trung Quốc. Các khu vực tiềm năng như Châu Âu, Mỹ, Canada và các nước Đông Nam Á… cũng nằm trong lộ trình đa dạng thị trường du khách và mở rộng tầm ảnh hưởng của thương hiệu Vinpearl tới quốc tế trong năm 2020.\r\n\r\nTrong đó, Vinpearl Travel Nga (thuộc Công ty CP Vinpearl) sẽ chính thức mở bán dịch vụ hàng không – du lịch trọn gói từ Moscow đến Nha Trang (Khánh Hòa, Việt Nam) bắt đầu từ ngày 20/02/2020. Công ty này sẽ tiếp thị tới du khách Nga các dịch vụ du lịch trọn gói cao cấp của Vinpearl tại Việt Nam gồm: chuyến bay, dịch vụ du lịch nghỉ dưỡng - vui chơi giải trí, tham quan và bảo hiểm… Vinpearl cũng lựa chọn kết hợp với các đối tác uy tín nhất để đảm bảo tiêu chuẩn dịch vụ 5 sao quốc tế cho du khách như Vietnam Airlines và Ingosstrakh - một trong những Công ty bảo hiểm lớn nhất tại Nga.\r\n\r\nTrong chiến lược hợp tác toàn diện với các hãng hàng không, Vinpearl triển khai việc liên kết với các hãng hàng không nội địa để mở các chuyến bay cố định trong nước và quốc tế tới các điểm đến có cơ sở nghỉ dưỡng – vui chơi giải trí của Vinpearl tại Nha Trang, Phú Quốc, Đà Nẵng – Nam Hội An.\r\n\r\nTại Việt Nam, Vinpearl đang thỏa thuận triển khai chương trình hợp tác toàn diện với các hãng hàng không để cho ra mắt các gói dịch vụ kỳ nghỉ trọn gói đa dạng nhất thị trường hiện nay. Cụ thể, Vinpearl cùng các đối tác sẽ cung cấp chuỗi dịch vụ chuyến bay – nghỉ dưỡng – vui chơi giải trí nội địa từ các thành phố lớn đến Vinpearl và giữa các điểm đến trong cùng hệ thống tại Nha Trang, Phú Quốc, Đà Nẵng - Nam Hội An… Chiến lược này sẽ mang đến cho du khách những tùy chọn dịch vụ và địa phương phù hợp với mọi nhu cầu - sở thích và chi phí hợp lý.\r\n\r\nRiêng với thị trường Nga, Vinpearl và đối tác Vietnam Airlines sẽ mở 8 đường bay định kỳ, nối liền 4 thành phố Moscow, Vladivostok, Novosibirsk, Ekaterinburg với Nha Trang và Phú Quốc - 2 điểm đến du lịch lớn nhất Việt Nam. Mục tiêu dự kiến đạt tối thiểu 168 chuyến bay/ năm, phục vụ cho hơn 50.000 lượt khách Nga đến Việt Nam với gói dịch vụ du lịch riêng biệt. Chuyến bay đầu tiên bay từ Moscow (Nga) sẽ tới Nha Trang vào ngày 12/3/2020.\r\n\r\nSự chủ động của Vinpearl trong việc đa dạng hóa dịch vụ và sản phẩm; mở rộng thị phần du lịch thế giới, tăng cường liên kết hợp tác để thu hút du khách quốc tế và trong nước sẽ không chỉ gia tăng năng lực cạnh tranh của doanh nghiệp mà còn tiên phong đáp ứng nhu cầu ngày càng cao của thị trường, mang tới dịch vụ trọn gói hoàn hảo và góp phần tạo đà phục hồi - phát triển mạnh mẽ cho ngành du lịch Việt Nam.\r\n\r\nHiện nay, Vinpearl là hệ thống dịch vụ du lịch nghỉ dưỡng – vui chơi giải trí lớn nhất Việt Nam với 45 cơ sở tại 17 tỉnh thành, bao gồm 35 khách sạn với công suất hơn 17.200 phòng khách sạn và biệt thự; 4 khu vui chơi giải trí, 2 công viên bảo tồn và chăm sóc động vật hoang dã, 4 sân golf.../.', 'YJbH_VP Nga 1.jpg', 1, 0, 2, '2020-05-06 17:00:00', '2020-05-07 15:41:59'),
(1013, 'VINGROUP BẮT TAY VÀO SẢN XUẤT MÁY THỞ VÀ MÁY ĐO THÂN NHIỆT', 'vingroup-bat-tay-vao-san-xuat-may-tho-va-may-do-than-nhiet', 'không', 'Hưởng ứng lời kêu gọi của Tổng bí thư, Chủ tịch nước, Thủ tướng Chính phủ kêu gọi toàn dân tham gia ủng hộ phòng chống dịch Covid 19, dưới sự chỉ đạo quyết liệt của Phó Thủ Tướng Trịnh Đình Dũng, ngày 3/4/2020 Tập đoàn Vingroup công bố quyết định triển khai việc sản xuất máy thở các loại (Xâm nhập và Không Xâm nhập) và máy đo thân nhiệt nhằm cung ứng cho thị trường Việt Nam.\r\n\r\n12 giờ trưa ngày 30/3/2020 Lãnh đạo Tập đoàn đã triệu tập phiên họp khẩn cấp và yêu cầu tất cả các Viện nghiên cứu của Tập đoàn dừng hết các việc hàng ngày, tập trung vào tìm kiếm và nghiên cứu các phương án để có thể sản xuất được các loại máy thở. Các đơn vị được giao trọng trách chủ lực là Viện nghiên cứu - thiết kế Ô tô 1, Viện nghiên cứu - thiết kế Ô tô 2, Viện nghiên cứu Thiết bị Di động, Viện nghiên cứu - thiết kế Thiết bị Gia đình Thông minh, Viện nghiên cứu thiết kế Thiết bị Viễn thông, Viện nghiên cứu thiết kế Pin Thông minh, Nhà máy sản xuất Ô tô VinFast và Nhà máy sản xuất các thiết bị điện tử VinSmart, tất cả các Cán bộ Lãnh đạo Tập Đoàn và các ban phòng chuyên môn có trách nhiệm phối hợp, hỗ trợ và được yêu cầu làm việc trực tiếp điện thoại 24/24.\r\n\r\nChỉ sau một ngày đêm các đơn vị đã tìm được rất nhiều đối tác sẵn sàng chia sẻ thiết kế và các thông tin cần thiết để có thể bắt đầu triển khai. Ngay sau đó Vingroup đã ký kết hợp đồng license với hãng Medtronic của Mỹ để được sử dụng thiết kế của họ cho Máy thở Xâm nhập PB 560, đồng thời bắt tay vào nghiên cứu Máy thở Không Xâm nhập dựa theo thiết kế do trường Đại học MIT (Mỹ) chia sẻ cho cộng đồng\r\n\r\nViệc cung ứng được chia thành 2 nhóm: Nhóm các linh kiện có thể mua được trên thị trường và nhóm các linh kiện Vingroup phải tự chế tạo, hoặc hợp tác/hỗ trợ các đối tác chế tạo do công suất sản xuất của họ đã hết. “Vingroup có một lợi thế là có 2 Công ty sản xuất ô tô và thiết bị điện tử, vì vậy chúng tôi có thể chế tạo đồng thời cả các chi tiết lớn, các chi tiết cơ khí và các chi tiêt khó và hiếm hàng tại thời điểm này như các bo mạch điện tử. Chúng tôi cũng có các kỹ sư thiết kế giỏi để có thể chuyển hóa các thiết kế concept, thiết kế 2D do các hãng cung cấp thành các thiết kế chi tiết, đầy đủ theo yêu cầu của các nhà sản xuất”- Bà Lê Thị Thu Thủy- Phó Chủ tịch Tập đoàn Vingroup chia sẻ.\r\n\r\nDự kiến các lô linh kiện của Máy thở Không Xâm nhập đầu tiên sẽ về đến nhà máy sau 2 tuần nữa và sau 4 tuần sẽ có các lô linh kiện của Máy thở Xâm nhập. Một ngày sau khi đủ linh kiện VinFast sẽ cho xuất xưởng các loại máy thở để chuyển Bộ Y Tế, Bộ Khoa học Công nghệ thẩm định và cấp chứng nhận chất lượng trước khi đưa vào sử dụng tại các cơ sở Y tế trên toàn quốc.\r\n\r\nCác máy đo thân nhiệt đã được sản xuất thử nghiệm thành công với chi phí linh kiện chỉ 16 triệu VNĐ, thấp hơn hàng chục lần so với các máy đo thân nhiệt trên thị trường hiện nay. Giá linh kiện dự kiến của các Máy thở Không Xâm nhập khoảng 22 triệu VNĐ, với máy Xâm nhập là 160 triệu VNĐ.\r\n\r\n“Chúng tôi dự kiến sẽ cung cấp các thiết bị này cho Bộ Y Tế Việt Nam với đúng giá thành linh kiện, và không tính tất cả các chi phí vận chuyển, thuế các loại, chi phí nhân công, sản xuất… vào giá thành. Trước mắt, chúng tôi sẽ tặng cho Bộ Y tế 5.000 máy thở Không Xâm nhập để kịp thời phục vụ chống dịch”- Ông Nguyễn Việt Quang Tổng giám đốc Vingroup cho biết. “Ngoài ra với công suất của các nhà máy VinFast, VinSmart có thể sản xuất tới 45.000 Máy thở Không Xâm nhập và 10.000 Máy thở Xâm nhập mỗi tháng, chúng tôi có thể hỗ trợ các nhà sản xuất khác trên Thế giới để gia công thiết bị cho họ, hoặc cung cấp một phần nhu cầu - số lượng cụ thể phụ thuộc vào khả năng cung ứng linh kiện của các đối tác”./.', 'W0YV_san xuat may tho.jpg', 0, 0, 4, '2020-05-06 17:00:00', '2020-05-07 15:43:08'),
(1014, 'VINFAST KHAI TRƯƠNG 18 XƯỞNG DỊCH VỤ TRÊN TOÀN QUỐC', 'vinfast-khai-truong-18-xuong-dich-vu-tren-toan-quoc', 'không', 'Ngày 8/3/2020, Công ty TNHH Sản xuất và Kinh doanh VinFast đồng loạt khai trương 18 xưởng dịch vụ tại chuỗi trung tâm thương mại Vincom trên toàn quốc. Với 41 điểm bảo hành, sửa chữa ô tô tại 30 tỉnh, thành phố, VinFast đã trở thành một trong 5 hãng xe có hệ thống xưởng dịch vụ lớn nhất Việt Nam chỉ sau chưa đầy một năm có mặt trên thị trường.\r\n\r\nTự hào là thương hiệu ô tô duy nhất của người Việt Nam, VinFast luôn xác định mục tiêu trở thành hãng xe chăm sóc khách hàng tốt nhất thị trường. Kiên định với mục tiêu đó, bên cạnh việc nghiên cứu và phát triển ra những dòng sản phẩm đẳng cấp, chất lượng, an toàn, VinFast đã đầu tư nghiêm túc và bài bản để phát triển hệ thống showroom, đại lý và xưởng dịch vụ rộng khắp, nhằm đáp ứng tối đa nhu cầu của khách hàng.\r\n\r\nNằm trong các trung tâm thương mại Vincom, 18 xưởng dịch vụ mới khai trương sẽ được trang bị đầy đủ các máy móc, trang thiết bị kỹ thuật cao tiêu chuẩn châu Âu, như thiết bị cân chỉnh góc đặt bánh xe công nghệ 3D, thiết bị kéo nắn thân vỏ và khung gầm với bộ đo điện tử, máy chẩn đoán lỗi trong hệ thống điện, máy phân tích khí xả, máy đo góc lệch đèn pha, công nghệ sơn gốc nước hiện đại, máy đo màu điện tử…\r\n\r\nTheo kế hoạch, trong năm nay, VinFast sẽ tiếp tục khai trương thêm gần 80 xưởng dịch vụ mới, nâng tổng số lên gần 120 xưởng trên toàn quốc, trở thành hãng xe có hệ thống xưởng dịch vụ lớn nhất và là hãng xe duy nhất có mặt tại tất cả 63 tỉnh, thành phố. Mạng lưới cơ sở rộng khắp của VinFast sẽ đảm bảo mang lại sự thuận tiện tối đa cho khách hàng trong suốt quá trình sử dụng xe.\r\nSong song với việc mở rộng mạng lưới, VinFast cũng chính thức đổi tên khối Dịch vụ Hậu mãi thành khối Chăm sóc Khách hàng, quyết tâm trở thành hãng xe phụng sự khách hàng tốt nhất Việt Nam, với các dịch vụ đẳng cấp và chuyên nghiệp. VinFast chính là hãng xe tiên phong công bố công khai bảng giá phụ tùng trên website để khách hàng tham khảo, chủ động trong việc sửa chữa, thay thế phụ tùng cho xe.\r\n\r\nNhân dịp khai trương 18 xưởng dịch vụ mới, VinFast sẽ triển khai chương trình miễn phí kiểm tra xe và tặng voucher trị giá 300.000 đồng cho 3.000 khách hàng đầu tiên sử dụng dịch vụ bảo dưỡng, sửa chữa trong tháng 3/2020. Quý khách có thể liên hệ hotline 1900.23.23.89 đặt lịch trước để được phục vụ tốt nhất./.\r\nDanh sách 18 xưởng dịch vụ VinFast khai trương ngày 8/3/2020 tại các Trung tâm Thương mại Vincom trên toàn quốc:\r\n\r\n1. Vincom Bắc Ninh\r\n2. Vincom Hạ Long - Quảng Ninh\r\n3. Vincom Sơn La\r\n4. Vincom Plaza Hòa Bình\r\n5. Vincom Hà Tĩnh\r\n6. Vincom Plaza Đồng Hới - Quảng Bình\r\n7. Vincom Mega Mall Thảo Điền - TP.HCM\r\n8. Vincom Plaza Biên Hòa 1 - Đồng Nai\r\n9. Vincom Dĩ An - Bình Dương\r\n10. Vincom Tây Ninh\r\n11. Vincom Long An\r\n12. Vincom Cao Lãnh - Đồng Tháp\r\n13. Vincom Vĩnh Long\r\n14. Vincom Kiên Giang\r\n15. Vincom Cà Mau\r\n16. Vincom Plaza Kon Tum\r\n17. Vincom Plaza Tuy Hòa - Phú Yên\r\n18. Vincom Plaza Thái Nguyên - Khánh Hòa', 'nGbp_XDV1.jpg', 1, 0, 1, '2020-05-06 17:00:00', '2020-05-07 15:45:22'),
(1015, 'MUA NHÀ VINHOMES TẶNG VOUCHER XE VINFAST LÊN TỚI 200 TRIỆU', 'mua-nha-vinhomes-tang-voucher-xe-vinfast-len-toi-200-trieu', 'không', 'Từ ngày 19/02/2020, Vinhomes triển khai chương trình “Nhà sang, xe xịn - đẳng cấp tinh hoa” - tặng voucher mua xe VinFast có giá trị lên đến 200 triệu đồng cho tất cả khách mua nhà Vinhomes. Đây là chương trình tri ân đặc biệt, khẳng định những ưu đãi riêng có của hệ sinh thái Vingroup.\r\n\r\nCụ thể, tất cả các khách mua bất kỳ sản phẩm Vinhomes sẽ được tặng voucher mua xe VINFAST tương ứng: Nhà dưới 2 tỷ được tặng voucher trị giá 70 triệu đồng (áp dụng khi mua xe VinFast Fadil); Nhà từ 2 tỷ đến dưới 3 tỷ đồng được tặng voucher 150 triệu đồng (áp dụng khi mua xe VinFast Lux A2.0); Nhà trên 3 tỷ đồng được tặng voucher 200 triệu đồng (áp dụng khi mua xe VinFast Lux SA2.0).\r\n\r\nTất cả các cư dân Vinhomes được ưu đãi miễn phí gửi xe hàng tháng (tới hết tháng 12/2022) cho tối đa 2 xe máy và 1 ô tô VinFast; các khách hàng khác sở hữu xe VinFast sẽ được miễn phí gửi xe tại hệ thống Vincom hoặc Vinhomes trên toàn quốc trong thời gian tối đa 6 tiếng mỗi ngày (không gửi qua đêm).\r\n\r\nĐặc biệt, khi mua cùng lúc “nhà Vinhomes, ô tô VinFast” từ 19/2/2020 theo chương trình này, khách hàng còn được gói hỗ trợ tài chính ưu việt lên tới 35 năm.\r\n\r\nChương trình khuyến mại đầu xuân “Nhà sang, xe xịn, đẳng cấp tinh hoa” với quy mô chưa từng có tại Việt Nam mở ra cơ hội dễ dàng sở hữu nhà đẹp – xe tốt, đồng thời là sự tri ân tới những người luôn đồng hành, ủng hộ Vinhomes trên hành trình nâng tầm cuộc sống người Việt.\r\n\r\nHiện nay, Vinhomes là thương hiệu bất động sản số 1 Việt Nam. Khách hàng có sự lựa chọn đa dạng sản phẩm nhà ở như biệt thự, căn hộ cao cấp, nhà phố thương mại… tại các dự án có vị trí đắc địa ở nhiều tỉnh thành trên cả nước như: Vinhomes Ocean Park, Vinhomes Smart City, Vinhomes Symphony (Hà Nội); Vinhomes Grand Park (HCM); Vinhomes Star City (Thanh Hoá)…\r\nNổi bật nhất là 03 Đại đô thị: Vinhomes Ocean Park – thành phố biển hồ trong lòng Hà Nội, Vinhomes Smart City – đại đô thị thông minh đẳng cấp quốc tế và Vinhomes Grand Park – thành phố thông minh công viên; tiên phong kiến tạo mô hình Đại đô thị thông minh đầu tiên trên cả nước. Trong năm 2020, ba Đại đô thị thông minh của Vinhomes tiếp tục ra mắt các sản phẩm căn hộ thuộc ba dòng Vinhomes Sapphire – Vinhomes Ruby – Vinhomes Diamond, mang đến lựa chọn đa dạng, phù hợp với mọi tầng lớp khách hàng.\r\n\r\nVới mục tiêu nâng tầm chất lượng sống cho người Việt, mang lại môi trường sống văn minh, đẳng cấp -“Nơi hạnh phúc ngập tràn”, chương trình ưu đãi “Nhà sang, xe xịn - đẳng cấp tinh hoa” tiếp tục khẳng định đặc quyền vượt trội, ưu tiên trải nghiệm các sản phẩm mới trong hệ sinh thái Vingroup dành cho các khách hàng Vinhomes.', 'sG3a_VH - VF 1.jpg', 0, 0, 1, '2020-05-06 17:00:00', '2020-05-07 15:46:18'),
(1016, 'VINGROUP CHÍNH THỨC RA MẮT ĐẠI ĐÔ THỊ THÔNG MINH VINHOMES SMART CITY', 'vingroup-chinh-thuc-ra-mat-dai-do-thi-thong-minh-vinhomes-smart-city', 'không', 'Với mục tiêu bắt kịp xu hướng hiện đại của thế giới, Công ty Cổ phần Vinhomes quyết định nâng cấp dự án Vincity Sportia thành Vinhomes Smart City - Đại đô thị Thông minh năng động. Sau khi nâng cấp, dự án sẽ sở hữu những điểm ưu việt vượt trội về quy hoạch, quy mô, tiện ích và các hệ sinh thái thông minh.\r\n\r\nTrong đó, Vinhomes Smart City sẽ được tổ chức vận hành ứng dụng theo mô hình đô thị thông minh đang rất thành công trên thế giới như Singapore, Songdo của Hàn Quốc, Fujisawa của Nhật Bản, hay một loạt các thành phố thông minh tại các nước Âu Mỹ.\r\n\r\nHệ sinh thái thông minh dựa trên 4 trục cốt lõi, gồm Smart Security (an ninh thông minh), Smart Management (vận hành thông minh), Smart Community (cộng đồng thông minh), Smart Home (căn hộ thông minh – tùy thuộc dòng sản phẩm của Vinhomes).\r\n\r\nCụ thể, Vinhomes Smart City đảm bảo một cuộc sống an ninh - an toàn thông minh với hệ thống camera đa lớp tích hợp trí tuệ nhân tạo tự động nhận diện khuôn mặt, biển số xe, tự động cảnh báo đối tượng lạ trong khu đô thị giúp mang lại cuộc sống an toàn mức cao cho cư dân. Bên cạnh đó, hệ thống thang máy thông minh, PCCC thông minh, giám sát chất lượng không khí, cảnh báo ô nhiễm môi trường và ứng dụng cập nhật tình trạng giao thông thành phố và khu đô thị qua phần mềm trên điện thoại cũng là những tính năng đặc biệt chưa từng có tại các khu đô thị trước đây.\r\nVinhomes Smart City được vận hành thông minh với Trung tâm điều hành tập trung 24/7 ứng dụng trí tuệ nhân tạo, Internet vạn vật (IoT) trong việc giám sát, vận hành toàn bộ đại đô thị một cách chuyên nghiệp, giúp phát hiện và xử lý sự cố nhanh chóng kịp thời. Bên cạnh đó, hạ tầng wifi rộng khắp khu đô thị, hệ thống chuông hình thông minh trong căn hộ, hệ thống đỗ xe thông minh góp phần mang lại sự tiện nghi và tiết kiệm thời gian cho cư dân.\r\n\r\nNgoài ra, dự án cũng hướng đến mục tiêu xây dựng cộng đồng thông minh với ứng dụng Quản trị thông minh cung cấp đầy đủ thông tin dịch vụ, tiện ích trong khu đô thị, cập nhật thường xuyên chất lượng không khí, nhiệt độ, độ ẩm…\r\n\r\nVinhomes Smart City sẽ là một trong những sản phẩm tiên phong của Vinhomes nói riêng và Vingroup nói chung ứng dụng các công nghệ và cung cấp các sản phẩm công nghệ cao cấp tân tiến nhất thị trường cho khách hàng lựa chọn với chi phí hợp lý, chẳng hạn như gói căn hộ thông minh cao cấp sử dụng hệ thống cảm biến và điều khiển thiết bị thông minh bằng giọng nói hoặc smartphone, vòng đeo tay thông minh giúp bảo vệ người thân trong trường hợp có sự cố.\r\n\r\nBên cạnh mô hình đô thị thông minh, Vinhomes Smart City còn sở hữu vị trí đắc địa tại Trung tâm mới của Thủ đô Hà Nội. Dự án tọa lạc trên trục Đại lộ Thăng Long, cách Trung tâm Hội nghị Quốc gia chỉ 7 phút di chuyển, kết nối thuận tiện đến hàng loạt các cơ quan hành chính sự nghiệp, các địa điểm thương mại, văn hóa - thể thao và hệ thống giáo dục phổ thông tới đại học. Trong tương lai, tuyến metro số 5,6,7 đi qua dự án cũng sẽ giúp cho việc kết nối giao thông trở nên dễ dàng và nhanh chóng hơn.\r\n\r\nTrên quy mô lên đến 280ha, dự án sẽ được tích hợp đồng bộ tiện ích \"tất cả trong một” gồm trường học, bệnh viện, siêu thị, trung tâm thương mại, cao ốc văn phòng...  Trong đó điểm nhấn đặc biệt tại Vinhomes Smart City là Công viên thể thao quy mô hàng đầu Đông Nam Á với hàng trăm máy tập gym, sân chơi trẻ em và sân vận động thể thao liên hoàn, chuỗi công viên chủ đề như công viên patin, công viên dã ngoại, công viên xe đạp địa hình, chèo thuyền kayak, đặc biệt là Vườn Nhật đẳng cấp… Tất cả mang đến cho cư dân một lối sống thông minh, sinh thái, khỏe mạnh và cân bằng với thiên nhiên. \r\n\r\nSau khi quy hoạch lại các dòng sản phẩm, Đại đô thị thông minh Vinhomes Smart City cũng sẽ phát triển đầy đủ cả 3 dòng sản phẩm Vinhomes Sapphire, Vinhomes Ruby và Vinhomes Diamond mang lại lựa chọn đa dạng cho khách hàng; đồng thời thu hút đông đảo giới đầu tư trong và ngoài nước./.', '4vXz_Smart city 1.jpg', 1, 0, 1, '2020-05-06 17:00:00', '2020-05-07 15:47:26'),
(1017, 'VINHOMES RIVERSIDE ĐƯỢC VINH DANH LÀ BẤT ĐỘNG SẢN TỐT NHẤT THẾ GIỚI NĂM 2018', 'vinhomes-riverside-duoc-vinh-danh-la-bat-dong-san-tot-nhat-the-gioi-nam-2018', 'không', 'Vượt qua nhiều vòng đánh giá nghiêm ngặt của Hội đồng giám khảo quốc tế International Property Awards (IPA), đại diện của Việt Nam - Vinhomes Riverside do Tập đoàn Vingroup đầu tư đã vinh dự đứng đầu hạng mục “Bất động sản tốt nhất thế giới” (World’s Best Property) năm 2018. Được coi là giải thưởng cao nhất của hệ thống giải thưởng IPA, ngôi vị “Bất động sản tốt nhất thế giới” luôn là đích phấn đấu của các dự án bất động sản trên thế giới.\r\n\r\nTrước đó, Vinhomes Riverside đã lần lượt vượt qua các đối thủ xuất sắc nhất châu lục và thế giới để được vinh danh ở các hạng mục “Khu đô thị tốt nhất Châu Á – Thái Bình Dương” (Asia Pacific’s Best Residential Property), và sau đó là “Khu đô thị tốt nhất Quốc tế” (Best International Residential Property).\r\n\r\nHội đồng giám khảo thế giới bình chọn cho Vinhomes Riverside sau khi đánh giá kỹ lưỡng các điểm ưu việt của hệ sinh thái toàn diện và hơn 100 tiện ích nội khu đa dạng được quy hoạch đồng bộ, khoa học. Đặc biệt, cảnh quan xanh mát với hơn 70ha cây xanh; 12,4ha mặt hồ Harmony và 18,8km kênh đào tại Vinhomes Riverside đã thuyết phục hoàn toàn các chuyên gia bất động sản hàng đầu thế giới.\r\nViệc Vinhomes Riverside liên tiếp giành vị trí số một ở các hạng mục giải thưởng danh giá ở lĩnh vực “Khu đô thị” và đi đến ngôi vị cao nhất của hệ thống IPA là thành tựu mới của bất động sản Việt Nam. Trước đó, chưa từng có dự án Việt Nam nào đạt được giải thưởng “Bất động sản tốt nhất thế giới” - (World’s Best Property).\r\n\r\nBà Nguyễn Diệu Linh – Tổng giám đốc Công ty Vinhomes chia sẻ: “Vinhomes Riverside đạt giải thưởng“Bất động sản tốt nhất thế giới” năm 2018 không chỉ là thành quả và niềm tự hào của Tập đoàn Vingroup. Giải thưởng đã khẳng định tầm vóc và năng lực của ngành bất động sản Việt Nam, cho thấy chúng ta đã sánh ngang, thậm chí vượt trên nhiều dự án bất động sản quốc tế trong việc kiến tạo ra những không gian đáng sống nhất”.\r\nIPA là hệ thống giải thưởng bất động sản danh giá bậc nhất trên thế giới, được công nhận trên toàn cầu và là bảo chứng uy tín của các doanh nghiệp bất động sản. Giải thưởng vinh danh các công trình kiến trúc, thiết kế nội thất, chủ đầu tư/tư vấn/ marketing & website bất động sản, khu đô thị/ thương mại/ nghỉ dưỡng/ sân golf; với tiêu chí chất lượng dịch vụ, phát triển bền vững, tiêu chuẩn sống cao, tính độc đáo và sáng tạo. Đây cũng chính là những tiêu chí hàng đầu mà Tập đoàn Vingroup đề cao khi quy hoạch phát triển khu đô thị Vinhomes Riveside cũng như các dự án bất động sản khác.\r\n\r\nTừ năm 2012 đến nay, các dự án của Vingroup liên tiếp được IPA vinh danh hàng đầu khu vực và thế giới ở các hạng mục khác nhau, từ “Dự án phức hợp tốt nhất”, “Dự án có cảnh quan tốt nhất”, “Tòa nhà cao tầng tốt nhất” đến “Chủ đầu tư TTTM tốt nhất”...\r\n\r\nViệc Vinhomes Riverside được IPA vinh danh ở hạng mục giải thưởng “Bất động sản tốt nhất thế giới” 2018 không chỉ tái khẳng định vị trí nhà phát triển BĐS số 1 Việt Nam của Vingroup mà còn cho thấy các dự án của một Chủ đầu tư Bất động sản đến từ Việt Nam hoàn toàn có thể tự tin chinh phục những đỉnh cao của bất động sản thế giới./.', 'SWwk_IPA_Anh 1.jpg', 1, 0, 1, '2020-05-06 17:00:00', '2020-05-07 15:48:43'),
(1018, 'VINCITY GIA LÂM RA MẮT THE PARK - PHÂN KHU CĂN HỘ ĐẦU TIÊN', 'vincity-gia-lam-ra-mat-the-park-phan-khu-can-ho-dau-tien', 'không', 'Là Phân khu căn hộ đầu tiên được ra mắt, The Park gồm 16 tòa tháp tọa lạc tại các vị trí đắc địa với một mặt nhìn ra kênh đào và Công viên Thể thao trung tâm, một mặt nhìn ra hồ lớn rộng 24,5ha. Như vậy là ngoài các tiện ích chung của cả dự án như biển hồ nước mặn rộng 6,1ha, Công viên Thể thao ngoài trời với 700 máy tập ở khắp nội khu, Công viên BBQ với hơn 100 điểm nướng, thì The Park cũng kề cận hai hệ thống giáo dục của Dự án là Đại học quốc tế VinUni và hệ thống trường học mầm non và liên cấp Vinschool.  \r\nBao quanh và xen kẽ trong phân khu là hàng loạt tiện ích sống chất lượng bao gồm: hồ tiểu cảnh, sân chơi trẻ em và sân chơi vận động, các sân thể thao và sân tập dưỡng sinh thư giãn, hàng trăm máy tập gym miễn phí, các khu BBQ ngoài trời và cảnh quan sinh động.\r\n\r\nCác căn hộ tại The Park có diện tích từ 28m2 đến khoảng 75m2, gồm nhiều loại hình đa dạng, từ căn hộ studio, căn hộ 1-3 phòng ngủ, căn hộ 1-2 phòng ngủ cộng 1… đảm bảo đáp ứng tối đa và chi tiết tới từng nhóm khách hàng. Điểm ưu việt tiếp theo là tuy diện tích không quá lớn song các căn hộ đều có thiết kế thông minh, công năng linh hoạt với tất cả các phòng đều đón sáng và được thông gió tự nhiên.\r\nBên cạnh đó, để góp phần giải quyết vấn đề nhà ở cho người dân, Tập đoàn Vingroup đã công bố chính sách bán hàng ưu việt chưa từng có, được thiết kế riêng cho VinCity. Theo đó, thay vì đóng ngay 30% giá trị căn hộ khi mua theo như thông lệ thị trường, khách hàng mua VinCity sẽ được giãn cách thành 3 giai đoạn, cụ thể, khách hàng chỉ cần đóng 10% đã được ký hợp đồng mua bán; nộp tiếp 10% vào 90 ngày tiếp theo và hoàn thành 10% cuối sau 180 ngày. 70% còn lại khách hàng có thể được ngân hàng Techcombank cho vay vốn và trả góp trong thời gian lên tới 35 năm.\r\n\r\nVới việc giãn tiến độ thanh toán và cho vay 70% trong thời hạn dài nhất Việt Nam, VinCity là lựa chọn tối ưu cho mọi đối tượng khách hàng, đặc biệt là các khách hàng trẻ tuổi, kinh tế đang trong giai đoạn tích lũy nhưng muốn thụ hưởng ngay chất lượng sống hiện đại, đẳng cấp.\r\n\r\n “Về chất lượng sống và tiện ích, VinCity có đẳng cấp tiệm cận với Vinhomes, tuy ở các vị trí hơi xa trung tâm nhưng rất tiềm năng, và có quỹ đất rộng lớn nên có thể xây dựng được các tiện ích vượt trội. Đây sẽ không chỉ là tổ ấm trên cả ước mơ của nhiều người, mà còn là nơi lý tưởng để hội tụ các vị khách thuê nhà, kể cả những khách thuê khó tính nhất. Vì vậy cơ hội tăng trưởng sẽ rất lớn. Đặc biệt, với giải pháp tài chính tốt chưa từng có, khách hàng chỉ cần trả từ 3,9 triệu trở lên mỗi tháng là đã có thể sở hữu căn hộ nội đô, cận biển, kế hồ - tôi tin VinCity Ocean Park sẽ là điểm bùng nổ của thị trường trong thời gian tới” -  bà Trần Thị Minh Đức, Giám đốc Kinh doanh, Công ty CP Vinhomes khẳng định.', 'qu3F_Phối cảnh đại đô thị VinCity Ocean Park.jpg', 1, 0, 1, '2020-05-06 17:00:00', '2020-05-07 15:49:58'),
(1019, 'VINHOMES CÔNG BỐ MÔ HÌNH QUY HOẠCH VINCITY', 'vinhomes-cong-bo-mo-hinh-quy-hoach-vincity', 'không', 'Ngày 28/09/2018, Công ty Cổ phần Vinhomes chính thức công bố quy hoạch dòng sản phẩm VinCity theo mô hình “Đại đô thị đẳng cấp Singapore và hơn thế nữa”. Theo đó, các khu đô thị VinCity thường có quy mô lớn lên đến hàng trăm ha, không xa trung tâm Hà Nội và Tp. HCM, được quy hoạch và phát triển theo mô hình đô thị văn minh, hiện đại của Singapore.\r\n\r\nCác dự án VinCity đều nhất quán ở việc tối ưu hóa chất lượng sống với mật độ xây dựng thấp; ưu tiên không gian cho cảnh quan và công viên cây xanh và hệ thống tiện ích đồng bộ từ giáo dục, y tế, văn phòng, thương mại dịch vụ… đến vui chơi giải trí.\r\nĐặc biệt, bên cạnh mô hình đô thị ưu việt từ Singapore, VinCity còn bổ sung thêm các tiện ích mới, mang tới cho cư dân tương lai những dịch vụ và tiện ích đáp ứng các nhu cầu nâng cao sức khỏe, sảng khoái tinh thần, gắn kết tình thân gia đình, bè bạn. Đó là các Công viên gym (thể dục tập máy) ngoài trời với quy mô lên tới hàng trăm máy tập, xen kẽ không gian xanh; Công viên BBQ với hàng trăm điểm nướng ngoài trời. Đây là không gian lý tưởng cho các hoạt động vui chơi giải trí, rèn luyện thể chất của cư dân tương lai. Các đại đô thị VinCity còn sở hữu hệ thống sân tập thể thao đa dạng gồm sân tennis, sân tập bóng rổ, sân bóng đá, sân cầu lông, bóng chuyền hơi; 60 - 70 sân chơi trẻ em & sân chơi vận động các loại tại chân các tòa nhà ở mỗi dự án và chuỗi các bể bơi phong cách resort...\r\n\r\nCùng với mô hình “Singapore và hơn thế nữa” là hệ thống dịch vụ quản lý đô thị với uy tín, chất lượng đã được khẳng định từ Công ty CP Vinhomes. Một số hạng mục sẽ được Vinhomes tách khỏi phí quản lý và thu phí hợp lý theo nhu cầu sử dụng của từng cá nhân nhằm giảm thiểu chi phí dịch vụ cơ bản và đảm bảo tính công bằng.\r\nMột điểm đột phá nữa là, lần đầu tiên khách hàng sẽ được tiếp cận với một giải pháp tài chính độc đáo, với thời hạn trả góp lên đến 35 năm và phương thức thanh toán linh hoạt – giải pháp tài chính của VinCity được coi là bước tiến mới, giúp đại đa số người dân có thể an cư lạc nghiệp, rút ngắn thời gian chờ đợi tích lũy.\r\n\r\nDự kiến, đại đô thị VinCity đầu tiên là VinCity Ocean Park sẽ ra mắt tại Gia Lâm, Hà Nội, với điểm nhấn là biển hồ nước mặn và hồ lớn trung tâm. Tiếp sau đó, Vinhomes cũng sẽ công bố VinCity Sportia – đô thị hạt nhân với tinh thần thể thao năng động tại Tây Mỗ, Đại Mỗ, Hà Nội và VinCity Grand Park – đô thị công viên tại Quận 9, Tp.HCM./.', 'CLif_Anh 2_VinCity Ocean Park _Phoi canh tong the.jpg', 0, 0, 1, '2020-05-06 17:00:00', '2020-05-07 15:51:42'),
(1020, 'VIETNAM AIRLINES VÀ VINPEARL ĐỀ XUẤT TẶNG 5.000 KỲ NGHỈ TRỌN GÓI TRI ÂN LỰC LƯỢNG Y TẾ TUYẾN ĐẦU', 'vietnam-airlines-va-vinpearl-de-xuat-tang-5-000-ky-nghi-tron-goi-tri-an-luc-luong-y-te-tuyen-dau', 'không', 'Ngày 21/4/2020, Vietnam Airlines và Công ty CP Vinpearl (thuộc Tập đoàn Vingroup) đã đề xuất lên Bộ Y tế chương trình “Tri ân những chiến binh áo trắng”. Theo đó, 5.000 kỳ nghỉ 5 sao trọn gói, bao gồm 10.000 vé máy bay khứ hồi và 10.000 đêm villa, sẽ được hai đơn vị chung tay dành tặng cho đội ngũ y bác sĩ, điều dưỡng, nhân viên y tế trên tuyến đầu chống Covid-19 như một món quà tri ân đặc biệt.\r\n\r\nChương trình tri ân ý nghĩa do Vietnam Airlines và Vinpearl đề xuất sẽ được gửi đến các y bác sĩ, điều dưỡng và nhân viên y tế trực tiếp tham gia điều trị cho các bệnh nhân nhiễm Covid-19 trên tuyến đầu theo danh sách do Bộ Y tế cung cấp. Cụ thể, hai bên sẽ dành tặng các “chiến binh áo trắng” 5.000 kỳ nghỉ trọn gói gồm 1 cặp vé máy bay khứ hồi hành trình nội địa và kỳ nghỉ 3 ngày 2 đêm tại hệ thống nghỉ dưỡng 5 sao dành cho tối đa 4 thành viên trong gia đình ngay sau khi Việt Nam công bố hết dịch trên toàn quốc.\r\n\r\nTrong đó, Vietnam Airlines sẽ đài thọ 10.000 vé máy bay khứ hồi, tương đương 5.000 cặp vé, đồng thời giảm 75% giá vé máy bay cho tối đa 2 người đi cùng mỗi y bác sĩ, điều dưỡng và nhân viên y tế. Vinpearl dành tặng 10.000 đêm villa, tương đương 5.000 chuyến nghỉ dưỡng 3 ngày 2 đêm dành cho 4 thành viên trong gia đình tại các quần thể du lịch nghỉ dưỡng trên toàn hệ thống. Kỳ nghỉ đã bao gồm trọn gói toàn bộ dịch vụ phòng ở, ẩm thực 3 bữa/ngày và vé vui chơi giải trí tại các công viên chủ đề VinWonders và Vinpearl Safari.\r\nChương trình tri ân được áp dụng trên các đường bay nội địa của Vietnam Airlines kết nối với các điểm đến có cơ sở nghỉ dưỡng thuộc hệ thống Vinpearl. Vietnam Airlines và Vinpearl sẽ triển khai chương trình trong 6 tháng kể từ thời điểm Chính phủ Việt Nam tuyên bố hết dịch trên phạm vi cả nước và không muộn hơn ngày 30/6/2021.\r\n\r\nVới các dịch vụ của hai doanh nghiệp hàng đầu trong lĩnh vực hàng không và nghỉ dưỡng tại Việt Nam, những “chiến binh áo trắng” sẽ có cơ hội tận hưởng một “kỳ nghỉ hồi sức” chất lượng nhất sau khoảng thời gian dài chiến đấu kiên cường đầy gian khổ, góp phần giúp Việt Nam chiến thắng đại dịch. Cùng với sự ghi nhận và biết ơn của toàn xã hội, việc dành tặng món quà này là hành động thiết thực để Vietnam Airlines và Vinpearl tri ân lực lượng y tế, đặc biệt là những “chiến sĩ” tuyến đầu trên “mặt trận” phòng, chống dịch Covid-19.\r\n\r\nĐánh giá về sự đồng hành của Vietnam Airlines và Vinpearl đối với lực lượng y tế, Đại diện Bộ Y tế cho biết:“Sự tham gia của các doanh nghiệp như Vietnam Airlines và Vinpearl sẽ tiếp thêm sức mạnh cho đội ngũ nhân viên y tế trong cuộc chiến chống Covid-19. Cùng với sự đồng hành và nỗ lực của cả xã hội, chúng tôi tin tưởng Việt Nam sẽ chiến thắng dịch bệnh”.\r\n\r\nĐây là chương trình hợp tác phi lợi nhuận và có ý nghĩa xã hội với quy mô lớn nhất dành riêng cho lực lượng y tế do Vietnam Airlines và Vinpearl phối hợp thực hiện. Trước đó, Vietnam Airlines và Vinpearl cũng được ghi nhận là những doanh nghiệp có nhiều nỗ lực và hoạt động đóng góp tích cực, chủ động phối hợp chặt chẽ với các cơ quan chức năng trong công cuộc phòng, chống dịch bệnh trên cả nước./.', 'W92M_22.4.jpg', 1, 0, 2, '2020-05-06 17:00:00', '2020-05-07 15:53:01'),
(1021, 'VINGROUP TẶNG THƯỞNG TẤT CẢ VẬN ĐỘNG VIÊN VIỆT NAM GIÀNH HUY CHƯƠNG TẠI SEA GAMES 30', 'vingroup-tang-thuong-tat-ca-van-dong-vien-viet-nam-gianh-huy-chuong-tai-sea-games-30', 'không', '• Mỗi thành viên của Đội tuyển bóng đá nữ được tặng 01 xe máy VinFast Klara S trị giá 39,9 triệu đồng và 20 triệu tiền thưởng; HLV Mai Đức Chung được tặng 01 ô tô VinFast Lux A trị giá 1,35 tỷ đồng \r\n\r\n• Tất cả VĐV Việt Nam giành huy chương Vàng – Bạc – Đồng tại các môn thể thao khác ở SEA Games 30 được tặng thưởng tương ứng 20 triệu – 10 triệu – 5 triệu/huy chương.\r\n\r\n• Tổng giá trị phần thưởng lên tới hơn 5 tỷ đồng. Ngoài ra nếu đội tuyển bóng đá nam giành được thành tích cao, Vingroup sẽ có phần thưởng dành riêng cho đội tuyển. \r\n\r\nNhằm cổ vũ cho tinh thần thể thao và quyết tâm mãnh liệt mang vinh quang về cho tổ quốc của đoàn Thể thao Việt Nam tại SEA Games 30 – ngày 10/12/2019, Tập đoàn Vingroup công bố tặng thưởng cho toàn bộ VĐV đạt thành tích xuất sắc ở tất cả các môn thi đấu. \r\n\r\nTheo đó, các VĐV đạt huy chương Vàng – Bạc – Đồng cá nhân hay tập thể đều được tặng thưởng bằng tiền mặt. Cụ thể, mỗi huy chương Vàng được tặng thưởng 20 triệu đồng, mỗi huy chương bạc được tặng 10 triệu đồng và mỗi huy chương đồng là 5 triệu đồng.\r\n\r\nĐặc biệt, để kịp thời khen ngợi và động viên thành tích Vô địch SEA Games lần thứ 6 của Đội tuyển Bóng đá nữ Quốc gia Việt Nam – Tập đoàn Vingroup sẽ tặng thưởng cho các cô gái vàng mỗi cầu thủ 01 xe máy điện VinFast Klara S trị giá 39,9 triệu đồng và 20 triệu tiền mặt. Riêng HLV Mai Đức Chung được tặng 01 xe VinFast Lux A2.0 phiên bản cao cấp trị giá 1,35 tỷ đồng, nhằm tôn vinh những đóng góp bền bỉ của ông cho bóng đá nữ Việt Nam suốt nhiều năm qua. Dưới sự dẫn dắt của HLV Mai Đức Chung, đội tuyển bóng đá nữ Quốc gia Việt Nam đã 4 lần giành huy chương vàng trong số 6 lần vô địch SEA Games.\r\nSự sẵn sàng vượt khó, quyết tâm mãnh liệt vì màu cờ sắc áo, vì vinh quang cho Việt Nam của các VĐV tại SEA Games 30 cũng chính là tinh thần chủ đạo mà Tập đoàn Vingroup nói chung và thương hiệu VinFast nói riêng đang theo đuổi, đúng như Slogan “Mãnh liệt tinh thần Việt Nam” của hãng.\r\n\r\nÔng Nguyễn Việt Quang, Phó Chủ tịch kiêm Tổng Giám đốc Tập đoàn Vingroup chia sẻ: “Chúng tôi thấu hiểu và trân trọng sự lăn xả, hy sinh và tinh thần cống hiến vì tổ quốc của các VĐV Việt Nam ở tất cả các môn thi đấu. Đó là lý do, Vingroup quyết định động viên toàn bộ VĐV đạt được thành tích tại SEA Games 30 như một sự tri ân và cổ vũ những nỗ lực phi thường của các tuyển thủ. Chúng tôi tin tưởng Vingroup sẽ góp phần truyền cảm hứng để cộng đồng doanh nghiệp cũng như toàn xã hội cùng chung tay cổ vũ, đóng góp cho sự lớn mạnh và toàn diện của thể thao Việt Nam, chứ không chỉ riêng bóng đá nam”. \r\n\r\nTrước đó, Tập đoàn Vingroup đã ký kết Thỏa thuận hợp tác chiến lược với Liên đoàn Bóng đá Việt Nam (VFF) nhằm hỗ trợ phát triển bóng đá Việt Nam trong dài hạn. Trọng tâm hợp tác tập trung vào công tác đào tạo, chuẩn bị lực lượng cho các giải đấu quốc tế từ năm 2019 đến 2024; hướng đến mục tiêu lọt vào vòng chung kết Olympic 2024 và World Cup 2026. Từ 2008 đến nay, PVF của Tập đoàn Vingroup cũng là một trong những Trung tâm Đào tạo Bóng đá trẻ có nhiều đóng góp cho sự phát triển của bóng đá Việt Nam.\r\n\r\n ***VinFast Lux A2.0: dành tặng HLV Mai Đức Chung là phiên bản Cao cấp (Premium), được trang bị động cơ 2.0L I-4 DOHC, công suất tối đa 228 mã lực, mô-men xoắn cực đại 350 Nm, đi kèm hộp số ZF tự động 8 cấp cùng hệ dẫn động cầu sau. Xe được tích hợp một loạt trang bị tiện nghi, đẳng cấp như hệ thống đèn Full LED, la-zăng hợp kim nhôm 19 inch, ghế chỉnh điện 12 hướng, màn hình cảm ứng 10,4 inch cỡ lớn, hệ thống âm thanh 13 loa, hỗ trợ kết nối Wi-Fi, Bluetooth… Giá bán trên thị trường của VinFast Lux A2.0 bản Cao cấp hiện là 1.337.700.000 đồng hoặc 1.348.700.000 đồng (tùy màu da nội thất).\r\nVinFast Klara S: tặng cho các nữ cầu thủ Đội tuyển Bóng đá nữ Việt Nam là phiên bản nâng cấp của mẫu xe máy điện Klara. Xe sở hữu thiết kế phong cách Italy, động cơ điện cao cấp của Bosch có công suất 1.200W, 2 bộ pin lithium-ion cho phép xe đi được quãng đường 140km sau mỗi lần sạc đầy. VinFast Klara S có khả năng chống nước vượt trội theo tiêu chuẩn IP57, đồng thời hỗ trợ kết nối thông minh thông qua ứng dụng di động nhờ được tích hợp eSIM.', '57u1_seagame1.jpg', 1, 0, 2, '2020-05-06 17:00:00', '2020-05-07 15:54:48'),
(1022, 'ĐẠI HỌC VINUNI CHÍNH THỨC KHÁNH THÀNH', 'dai-hoc-vinuni-chinh-thuc-khanh-thanh', 'không', 'Ngày 15/1/2020, Trường Đại học VinUni – đại học tinh hoa và tư thục phi lợi nhuận đầu tiên tại Việt Nam đã chính thức khánh thành tại đại đô thị Vinhomes Ocean Park (Gia Lâm, Hà Nội). Ngay từ hôm nay, các cơ sở vật chất của trường đã sẵn sàng chào đón các sinh viên đầu tiên của niên khóa 2020 - 2021.\r\nVinUni đã được Thủ tướng Chính phủ phê duyệt quyết định thành lập trường đại học VinUni (VinUni) vào ngày 17/12/2019 với tổng đầu tư lên tới 6.500 tỷ đồng từ Tập đoàn Vingroup. Trong đó, 3.500 tỷ chi đầu tư xây dựng cơ sở vật chất và 3.000 tỷ dành để cấp học bổng tài năng, hỗ trợ tài chính cho sinh viên cũng như bù lỗ vận hành cho 10 năm đầu tiên. VinUni theo mô hình đại học tinh hoa, đào tạo và phát triển nhân tài cho tương lai.\r\n\r\nSau 14 tháng triển khai thần tốc, VinUni đã hoàn thiện trên tổng diện tích 23 ha, hệ thống cơ sở vật chất được xây dựng theo các tiêu chuẩn QS 5 sao của Quacquarelli Symonds - tổ chức kiểm định giáo dục hàng đầu thế giới. Kiến trúc trường, cảnh quan và nội thất đều do các công ty thiết kế danh tiếng hàng đầu thế giới đảm nhiệm là Aecom (Mỹ); Westgreen (Canada) và Công ty HBA (Mỹ), nhằm mang đến môi trường học tập khơi gợi sáng tạo, truyền cảm hứng “dám nghĩ lớn” cho sinh viên và giảng viên, nghiên cứu viên.\r\n\r\nToàn bộ ngôi trường mang kiến trúc Gothic, đặc trưng bởi các trục đứng gợi nhắc những cột đá La Mã hướng thẳng lên trời nhằm gửi gắm thông điệp \"Ngôi trường của ánh sáng tri thức\". Biểu tượng Mặt trời lan tỏa tia sáng tri thức được đặt trên đỉnh tháp tòa hiệu bộ có độ cao 108m. Đặc biệt, VinUni sở hữu khuôn viên xanh, thông minh và tiết kiệm năng lượng với tỉ lệ 86% là cây xanh, nhiều vườn trên cao và toàn bộ 1.000 m2 trên mái tòa nhà thí nghiệm là tấm lợp pin mặt trời.\r\n\r\nThiết kế bên ngoài là kiến trúc tân cổ điển tráng lệ và ấn tượng, nhưng nội thất bên trong của VinUni hoàn toàn hiện đại và tiên tiến, với chất lượng cao nhất để phục vụ học thuật. Trường có 9 khối nhà, gồm toà nhà chính, ký túc xá, khu phức hợp thể thao, thư viện, các phòng thí nghiệm và trung tâm mô phỏng… đảm bảo tối ưu trải nghiệm việc giảng dạy và học tập cho quy mô 3.500 sinh viên. Các phòng học, giảng đường đều được thiết kế linh hoạt, nhiều ánh sáng, nhiều không gian mở, nhằm khơi dậy sự hợp tác, sáng tạo của giảng viên và sinh viên. Thư viện kỹ thuật số rộng 4.000m2 với nguồn tài liệu khổng lồ, hoạt động 24/7, là trái tim của đại họ VinUni, là nơi lý tưởng cho việc học nhóm, nghiên cứu và bàn thảo các dự án khởi nghiệp.\r\n\r\nKhông gian sinh hoạt hàng ngày, rèn luyện thể chất, giải trí.. cũng được VinUni đầu tư tương đương các đại học đẳng cấp thế giới. Ký túc xá có diện tích lớn theo mô hình “3 cùng”: cùng học, cùng sống, cùng làm việc; với đầy đủ căng tin, phòng y tế, khu tự học, các cửa hàng tiện ích và không gian thư giãn sau giờ học. Khu liên hợp thể thao có nhà thể thao diện tích 4.000m2, gồm bể bơi trong nhà chuẩn Olympic kích thước 50mx20m, sân bóng, phòng gym và khu thể dục đa năng; sân vận động và khu thể thao ngoài trời.\r\n\r\nCơ sở vật chất hiện đại là tiền đề quan trọng để VinUni thực hiện những phương pháp giáo dục tiên tiến nhất như đào tạo mô phỏng, học bằng thực chứng, học qua trải nghiệm.\r\nMục tiêu của VinUni là trở thành 1 trong 50 trường Đại học trẻ hàng đầu thế giới. Vì vậy, ngay từ khi khởi sự, VinUni đã hợp tác chặt chẽ với hai trường Đại học tinh hoa hàng đầu thế giới là Đại học Cornell và Đại học Pennsylvania. Hai đối tác chiến lược thuộc nhóm Ivy League (Mỹ), thuộc Top 20 Đại học hàng đầu thế giới - Cornell và Penn đã nhanh chóng tham gia toàn diện vào VinUni từ quản trị, phát triển chương trình cho đến tuyển dụng, tuyển sinh và kiểm định chất lượng. Theo đó, sinh viên VinUni sẽ học tập theo các chương trình tiên tiến nhất, được xây dựng với sự xác thực chất lượng của Cornell và Penn, dựa trên các nền tảng chuẩn mực quốc tế tốt nhất, có điều chỉnh để phù hợp với môi trường Việt Nam.\r\n\r\nCơ chế tuyển sinh, đào tạo và đánh giá sinh viên của VinUni tuân thủ theo mô hình đại học tinh hoa trên thế giới, với các chuẩn mực cao của quốc tế. Niên khóa 2020 - 2021, Đại học VinUni sẽ đón khoảng 300 sinh viên thuộc 3 nhóm ngành chính: Kinh doanh Quản trị, Kỹ thuật và Khoa học máy tính, Khoa học sức khỏe. Đây đều là những nhóm ngành có nhu cầu lớn về nguồn nhân lực trình độ cao tại Việt Nam và trên thế giới.\r\n\r\nVinUni đã được Tập đoàn Vingroup tài trợ không hoàn lại 3.000 tỷ cho các hoạt động nghiên cứu, đào tạo và cấp học bổng cho sinh viên tài năng với mức học bổng cao nhất là 100% chi phí đào tạo và sinh hoạt phí. Ngoài ra, liên tục trong 5 niên khóa đầu tiên, tất cả sinh viên sẽ được VinUni hỗ trợ 35% chi phí, tương đương với khoảng US$12.000- US$14.000 trong suốt thời gian học tập tại trường.\r\n\r\n“Với VinUni, tôi tin tưởng rằng, các tài năng Việt Nam sẽ có được môi trường giáo dục, nghiên cứu chất lượng cao nhất mà không cần phải ra nước ngoài tìm kiếm như trước đây. Chúng tôi tự hào về ngôi trường của mình, một ngôi trường tràn đầy cảm hứng học tập, giảng dạy, nghiên cứu và phát triển toàn diện. Chúng tôi đã sẵn sàng chào đón những sinh viên đầu tiên” - Ông Nguyễn Việt Quang - Phó Chủ tịch kiêm Tổng Giám đốc Tập đoàn Vingroup chia sẻ.\r\n\r\nLà trường đại học tư thục hoạt động không vì lợi nhuận của Việt Nam được xây dựng theo các chuẩn mực quốc tế, VinUni có sứ mệnh đào tạo nguồn nhân lực tinh hoa dồi dào, có trình độ cao, kỹ năng tốt, có năng lực hành động và khát vọng cống hiến hết mình. Các nhân tài được đào tạo từ VinUni không chỉ được kỳ vọng phát triển tối đa tiềm năng của bản thân mà còn đóng góp cho sự thịnh vượng của xã hội và tác động tích cực tới nền kinh tế tri thức Việt Nam và toàn cầu./.', 'rojI_VinUni 1.jpg', 1, 0, 27, '2020-05-06 17:00:00', '2020-05-07 15:56:12');
INSERT INTO `tintuc` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idLoaiTin`, `created_at`, `updated_at`) VALUES
(1023, 'VINGROUP TÀI TRỢ 5 TRIỆU ĐÔ LA SINGAPORE CẤP HỌC BỔNG CHO THẠC SĨ, TIẾN SĨ NGƯỜI VIỆT TẠI ĐH CÔNG NGHỆ NANYANG', 'vingroup-tai-tro-5-trieu-do-la-singapore-cap-hoc-bong-cho-thac-si-tien-si-nguoi-viet-tai-dh-cong-nghe-nanyang', 'không', 'Ngày 20/11/2019, Tập đoàn Vingroup và Đại học Công nghệ Nanyang, Singapore (NTU) ký thỏa thuận tài trợ học bổng toàn phần cho tài năng Việt Nam theo học chương trình sau đại học trong các ngành khoa học công nghệ (KHCN) tại NTU. Đây là bước đi quan trọng đầu tiên, đặt nền tảng cho việc hợp tác giữa Vingroup, Dự án Đại học VinUni và NTU trong tương lai.\r\n\r\nTheo thỏa thuận tài trợ giữa Tập đoàn Vingroup và NTU, các ứng viên là người Việt Nam dưới 30 tuổi có nguyện vọng theo học Thạc sĩ và dưới 35 tuổi có nguyện vọng theo học Tiến sĩ ngành KHCN tại NTU sẽ có cơ hội nhận học bổng toàn phần của Vingroup. Học bổng này bao toàn bộ học phí và chi phí sinh hoạt, trị giá khoảng 5 tỷ VNĐ/suất với học bổng Tiến sĩ và 2,5 tỷ VNĐ/suất với học bổng Thạc sĩ. Để được cấp học bổng, các ứng viên cần vượt qua kỳ xét tuyển của NTU, thể hiện khả năng vượt trội về nghiên cứu và mong muốn đóng góp vào quá trình phát triển đất nước.\r\n\r\nSau khi tốt nghiệp, các học viên có thể ở lại làm việc tại Singapore trong vòng hai năm (đối với bậc Tiến sĩ) và một năm (đối với bậc Thạc sĩ), trước khi trở về Việt Nam làm việc, nghiên cứu để đóng góp cho sự phát triển KHCN của đất nước.\r\n\r\n“NTU đã xây dựng thành công danh tiếng vững chắc nhờ sự sáng tạo, đổi mới không ngừng trong KHCN và mối liên kết chặt chẽ với các doanh nghiệp. Việc thành lập Chương trình Học bổng Vingroup tại NTU sẽ trao cơ hội học tập, nghiên cứu ở môi trường giáo dục hàng đầu trên thế giới cho những sinh viên Việt Nam xuất sắc. Tiếp theo thỏa thuận này chúng tôi sẽ tìm hiểu các cơ hội mở rộng hợp tác giữa Vingroup, dự án Đại học VinUniversity và NTU trong các lĩnh vực nghiên cứu, đào tạo và phát triển nguồn nhân lực chuyên gia cho tương lai.” – Bà Lê Mai Lan, Phó Chủ tịch Tập đoàn Vingroup, Chủ tịch Dự án Đại học VinUni chia sẻ.\r\n\r\nNTU là đại học nghiên cứu mang đẳng cấp thế giới với 33.000 sinh viên theo học hệ đại học và sau đại học trong các lĩnh vực kỹ thuật, công nghệ, kinh doanh, khoa học xã hội và khoa học nhân văn. NTU hiện đang đứng thứ 11 trong bảng xếp hạng Quacquarelli Symonds (QS 2019-2020). Từ 2018 tới nay, NTU liên tục là trường đứng đầu trong ngành Khoa học vật liệu, thứ 2 về Khoa học máy tính theo xếp hạng của US News. Đặc biệt, liên tục trong 6 năm gần đây, NTU đứng vị trí đầu bảng trong Top 50 các trường trẻ dưới 50 tuổi.\r\n\r\nTại lễ ký kết, GS. Ling San, Hiệu trưởng NTU phát biểu: “Khoản tài trợ hào phóng của Tập đoàn Vingroup hết sức có giá trị để thu hút và hỗ trợ những ứng viên sau đại học tài năng nhất của Việt Nam tới học tập nghiên cứu tại NTU. Là một trường đại học luôn cam kết tạo mọi điều kiện và cơ hội cho các hoạt động nghiên cứu và đào tạo đẳng cấp thế giới, chúng tôi hết sức vinh dự nhận được sự hỗ trợ này. Chúng tôi hy vọng rằng, tài trợ của Vingroup sẽ truyền cảm hứng để các doanh nghiệp, tổ chức khác cũng thành lập các quỹ học bổng tương tự tại NTU”.\r\n\r\nThỏa thuận tài trợ cho tài năng Việt Nam theo học Thạc sĩ/Tiến sĩ tại NTU nằm trong khuôn khổ Chương trình 1.100 Học bổng KHCN Đào tạo Thạc sĩ/Tiến sĩ Du học Nước ngoài tại các quốc gia phát triển trong giai đoạn 2019 – 2030 của Tập đoàn Vingroup do Dự án Đại học VinUni quản lý. Bên cạnh chương trình này, Vingroup cũng có Chương trình học bổng đào tạo Thạc sĩ/Tiến sĩ tại các đại học trong nước về chuyên ngành KHCN, kỹ thuật hoặc y dược do Quỹ Đổi mới Sáng tạo Vingroup (VinIF) quản lý.', 'PbDs_VinUni - Nanyang.jpg', 0, 0, 27, '2020-05-06 17:00:00', '2020-05-07 15:57:03'),
(1024, 'VINCOM HỖ TRỢ 300 TỶ ĐỒNG CHO ĐỐI TÁC BỊ ẢNH HƯỞNG COVID-19', 'vincom-ho-tro-300-ty-dong-cho-doi-tac-bi-anh-huong-covid-19', 'không', 'Ngày 5/3/2020, Công ty CP Vincom Retail công bố dành 300 tỷ đồng hỗ trợ cho các đối tác thuê mặt bằng trung tâm thương mại trên toàn hệ thống. Không chỉ là sự chia sẻ khó khăn do ảnh hưởng của dịch Covid-19, qua chương trình, Vincom sẽ đồng hành cùng các doanh nghiệp bán lẻ tổ chức chuỗi hoạt động kích cầu mua sắm, góp phần đưa nhịp sống năng động trở lại thị trường.\r\n\r\nChương trình hỗ trợ được áp dụng cho đối tác ở tất cả các ngành hàng đang kinh doanh tại 79 TTTM trên toàn quốc, có hợp đồng thuê giá cố định đang bị ảnh hưởng bởi dịch Covid-19. Tổng mức ngân sách gói hỗ trợ dự kiến lên đến 300 tỷ đồng. Trong đó, phần lớn của gói hỗ trợ sẽ được dành cho việc giảm giá tiền thuê mặt bằng cho đối tác, một phần dành cho việc phát hành các voucher ưu đãi, khuyến mại cho khách hàng tới mua sắm tại Vincom.\r\n\r\nTỷ lệ hỗ trợ chi phí thuê mặt bằng cho các doanh nghiệp được Vincom xem xét, đánh giá theo mức độ bị ảnh hưởng của các vùng và ngành kinh doanh của doanh nghiệp để quyết định. Theo đó, thị trường tại các tỉnh/thành phố du lịch như Nha Trang, Đà Nẵng, Hạ Long, các tỉnh gần biên giới có mức độ ảnh hưởng lớn nhất, tiếp theo là hai đô thị lớn là Hà Nội, thành phố Hồ Chí Minh và các tỉnh thành khác.\r\n\r\nBên cạnh đó, Vincom sẽ phối hợp với các khách thuê tổ chức các chương trình kích cầu mua sắm lớn. Đặc biệt, nhiều hoạt động gia tăng trải nghiệm khách mua sắm như miễn phí gửi xe cho các khách hàng tới xem phim hoặc tới ăn trong các gian hàng ẩm thực trong giờ trưa, tối và ưu đãi đồng giá đưa đón cho khách di chuyển bằng các hãng xe công nghệ… sẽ được Vincom chủ động triển khai.\r\n\r\nNhằm mang lại môi trường mua sắm tiện nghi và an toàn cho khách hàng, Vincom tiếp tục tăng cường các biện pháp phòng dịch như duy trì kiểm soát thân nhiệt người vào TTTM; vệ sinh bề mặt các khu vực công cộng với dung dịch sát khuẩn 2 tiếng/lần; bố trí bảo vệ đeo găng tay, khẩu trang mở cửa và bấm thang máy cho khách... Đây là những biện pháp chủ động đã được Vincom tiên phong triển khai ngay từ những ngày đầu của dịch Covid-19.\r\n\r\nChia sẻ về mục tiêu chương trình, Bà Trần Mai Hoa – Tổng Giám đốc Công ty CP Vincom Retail cho biết: “Vincom luôn đồng hành cùng các khách hàng, đặc biệt trong giai đoạn khó khăn chung của nền kinh tế do ảnh hưởng của đại dịch như hiện nay. Gói hỗ trợ 300 tỷ này sẽ không chỉ giúp các đối tác giảm bớt gánh nặng về chi phí mà còn có thể tập trung nguồn lực, cùng Vincom xây dựng những chương trình ưu đãi hấp dẫn để thu hút khách hàng, góp phần đưa nhịp sống năng động trở lại với người tiêu dùng Việt Nam.”\r\n\r\nHệ thống Vincom hiện nay đã có mặt tại 43 tỉnh thành, sở hữu 1,6 triệu m2 diện tích mặt sàn bán lẻ phủ khắp các phân khúc thị trường. Đối tác đồng hành của Vincom gồm hơn 1.000 thương hiệu bán lẻ nổi tiếng quốc tế và trong nước, bao gồm đầy đủ các ngành hàng từ thời trang, mỹ phẩm, phụ kiện, nội thất… cho tới các dịch vụ như vui chơi giải trí, ẩm thực… Với văn hóa dịch vụ từ trái tim, các TTTM Vincom đã trở thành nơi tiên phong mang tới những trải nghiệm mua sắm mới mẻ, hiện đại, lan tỏa nụ cười và niềm vui tới cộng đồng.', 'trjL_Vincom 5.3.jpg', 0, 0, 32, '2020-05-06 17:00:00', '2020-05-07 15:58:57'),
(1025, '2 NĂM HÀNH TRÌNH SẠCH, TƯƠNG LAI XANH CỦA VINECO112', '2-nam-hanh-trinh-sach-tuong-lai-xanh-cua-vineco112', 'không', 'Ngày 1/10/2015, Công ty VinEco đã1 chính thức ra mắt thị trường mẻ rau sạch đầu tiên, khởi động cho 2 năm “Hành trình sạch – Tương lai xanh” đầy sôi động của Tập đoàn Vingroup trong lĩnh vực nông nghiệp.\r\n\r\nVới quyết tâm và những bước đi thần tốc, chỉ trong vòng 24 tháng, VinEco đã xây dựng và phát triển thành công 14 nông trường quy mô và chuyên nghiệp trên cả nước. Các nông trường được quy hoạch thiết kế một cách khoa học gồm: khu sản suất đồng ruộng, khu nhà kính, khu sơ chế, đóng gói tự động, khu bảo quản. Tổng diện tích sản xuất của VinEco lên đến gần 3000 ha, trong đó đã đưa vào canh tác gần 1.000 ha trên toàn hệ thống.\r\n\r\nBên cạnh việc mở rộng về quy mô sản xuất, các nông trường VinEco còn tiên phong trong việc đưa công nghệ nông nghiệp tiên tiến hàng đầu thế giới vào Việt Nam. Điển hình là công nghệ trồng trọt của Kubota (Nhật Bản), công nghệ tưới nhỏ giọt và tưới phun mưa của Netafim (Israel), công nghệ sản xuất trong nhà màng của TAP, trồng cây thủy canh baằng kĩ thuật màng mỏng dinh dưỡng NFT, công nghệ trồng cây rau mầm Microgreen…Đặc biệt, VinEco cũng vừa hoàn thiện và đưa vào sử dụng nhà máy sản xuất nấm sạch với thiết bị được nhập khẩu 100% theo công nghệ Hàn Quốc tại nông trường VinEco Tam Đảo (Vĩnh Phúc).\r\nSau 2 năm, mỗi tháng VinEco đã cung cấp ra thị trường hàng ngàn tấn nông sản đảm như rau ăn lá, rau ăn quả, rau ăn củ, rau gia vị, trái cây. Trong hơn 200 chủng loại, VinEco có nhiều sản phẩm có quy trình kiểm soát tự động và khép kín hoàn toàn trong nhà kính, nhà màng như nấm, rau mầm và rau thủy canh, dưa lưới, dưa lê, dưa leo baby…\r\n\r\nCùng với việc chủ động tham gia trực tiếp sản xuất, để thực hiện sứ mệnh lan tỏa, góp phần thay đổi tư duy làm nông nghiệp của người Việt, ngày 1/9/2016, Tập đoàn Vingroup đã khởi động Chương trình “Đồng hành, hỗ trợ và thúc đẩy sản xuất nông nghiệp Việt”. Sau 1 năm triển khai, chương trình đã nhận được gần 3.000 đơn đăng ký từ các hộ nông dân trên toàn quốc.', 'iXBY_1710_Anh 1.jpg', 1, 0, 31, '2020-05-06 17:00:00', '2020-08-03 09:58:48'),
(1026, 'VINGROUP HOÀN THÀNH HAI MẪU MÁY THỞ PHỤC VỤ ĐIỀU TRỊ COVID-19', 'vingroup-hoan-thanh-hai-mau-may-tho-phuc-vu-dieu-tri-covid-19', 'không', 'Sau hơn 3 tuần công bố kế hoạch sản xuất máy thở phục vụ điều trị Covid 19, ngày 28/4/2020, Tập đoàn Vingroup đã hoàn tất và chuẩn bị đưa ra thị trường hai mẫu máy thở xâm nhập có tỷ lệ nội địa hóa cao: VFS-410 và VFS-510. Với sự hỗ trợ tích cực của các Bộ, ban ngành, các chuyên gia y tế và hãng Medtronic (Mỹ), VFS-410 và VFS-510 đảm bảo tiêu chuẩn chất lượng quốc tế và giá trị sử dụng lâu dài trong điều trị hậu Covid.\r\n\r\nVSmart VFS-410 và VFS-510 là hai mẫu máy thở xâm nhập “made in Việt Nam” được hoàn thiện và sản xuất toàn bộ từ hệ sinh thái Vingroup. Trong đó, VSmart VFS-410 là bản nâng cấp đặc biệt của phiên bản máy thở đầu tiên VFS-310 do chính các kỹ sư Vingroup phát triển từ ý tưởng thiết kế của Đại học MIT, còn VSmart VFS-510 nhận chuyển giao và cải tiến từ hãng sản xuất máy thở hàng đầu thế giới Medtronic (Mỹ).\r\n\r\nVSmart VFS-410 là máy thở xâm nhập dựa trên công nghệ tạo khí bằng turbin, có tính năng tương đương với các máy thở xâm nhập lưu động cao cấp trên thị trường (chỉ bỏ chế độ CPAP dành cho người tự thở). Từ thiết kế máy thở không xâm nhập đơn giản của nhóm nghiên cứu trường Đại học MIT, VFS-410 đã được các kỹ sư Vingroup cải tiến để trở thành một máy thở xâm nhập với công nghệ tạo khí bằng turbin thay vì bóp bóng tự động nhằm đảm bảo tính chính xác cao. Bên cạnh đó, máy còn được bổ sung cảm biến giám sát và cảnh báo để duy trì nồng độ oxy, áp suất dương cuối kỳ thở ra, đo được nhịp thở bệnh nhân và tự điều chỉnh để đồng bộ với nhịp thở này. Toàn bộ nguyên lý hoạt động, bo mạch, linh kiện cơ khí, phát triển phần mềm và kiểu dáng của VSmart VFS-410 đều được thiết kế, phát triển và sản xuất tại Vingroup, dưới sự tư vấn sát sao của Bộ Y tế, các chuyên gia quốc tế và các bác sỹ Vinmec.\r\n\r\nVSmart VFS-510 là máy thở xâm nhập dựa trên mẫu PB560 của hãng máy thở Medtronic đã được sử dụng phổ biến tại Việt Nam. VFS-510 có ưu điểm nhỏ gọn, đa năng gồm 6 chế độ thở linh hoạt, có thể sử dụng cho bệnh nhân trưởng thành, bệnh nhi; cho người cần hỗ trợ thở xâm nhập hoặc không xâm nhập… đáp ứng đa dạng yêu cầu điều trị theo chỉ định của bác sỹ.\r\n\r\nVì tình trạng khan hiếm vật tư sản xuất máy thở trên toàn thế giới, 70% các cụm linh kiện trong máy, bao gồm cả các cụm linh kiện đặc biệt quan trọng và phức tạp như: quạt thổi khí (blower), các bo mạch (PCBA điều khiển, nguồn,…), bàn phím, màn hình hiển thị, pin, vỏ máy… đều do Vingroup chủ động nghiên cứu khắc phục để tự sản xuất hoặc nội địa hóa. Medtronic cũng đã phối hợp chặt chẽ với Vingroup để hiệu chỉnh lại phần mềm của máy nhằm đảm bảo các tính năng của VFS-510 hoàn toàn tương đương với máy gốc PB560.\r\n\r\nÔng Markus Leitner, Giám đốc Viện Công nghệ Ô tô 1 của Vinfast chia sẻ: “Thật là kỳ tích, chỉ sau hơn 3 tuần bắt tay vào việc nghiên cứu máy thở, từ con số 0, đội ngũ kỹ sư Vinsmart và Vinfast đã thành công trong việc nghiên cứu, cải tiến và làm chủ công nghệ sản xuất máy thở. Có thể nói, chỉ ở Vingroup, chúng tôi mới được tạo điều kiện, tạo động lực cũng như “áp lực” để có thể làm được điều không tưởng này”.\r\n\r\nVới công năng tiêu chuẩn quốc tế - VFS-410 và VFS-510 không chỉ đáp ứng kịp thời cho nhu cầu điều trị dịch Covid 19 trước mắt; mà còn có thể tiếp tục sử dụng trong việc điều trị tích cực (ICU) của các cơ sở y tế, mang lại giá trị và hiệu quả trong dài hạn.\r\nVFS-410 và VFS-510 sẽ tiếp tục được kiểm thử bởi các bệnh viện và các chuyên gia hàng đầu Việt Nam cũng như sẽ được các cấp Hội đồng ngành Y đánh giá để đảm bảo tuân thủ các tiêu chuẩn chất lượng trước khi lưu hành. Dự kiến lô sản phẩm đầu tiên sẽ xuất xưởng vào ngày 15/5/2020.\r\n\r\nPhát biểu tại buổi tiếp nhận hai mẫu máy thở do Vingroup chuyển giao để thẩm định chất lượng, ông Nguyễn Minh Tuấn, Vụ trưởng Vụ Trang thiết bị và Công trình y tế (Bộ Y tế) cho biết, Bộ Y tế đánh giá cao tốc độ và sự quyết tâm của Vingroup và các đơn vị sản xuất khác trong việc thực hiện chỉ đạo của Thủ tướng Chính phủ về sản xuất máy thở. “Đến nay có thể khẳng định bước đầu chúng ta đã làm chủ được công nghệ sản xuất máy thở tại Việt Nam. Bộ Y tế sẽ tiếp tục đồng hành với Vingroup và các nhà sản xuất khác để phát triển sản phẩm, sớm đánh giá để có thể đưa sản phẩm vào sản xuất, đáp ứng nhu cầu của xã hội, phục vụ phòng chống dịch Covid -19” – ông Nguyễn Minh Tuấn nhấn mạnh.\r\n\r\nViệc sản xuất thành công máy thở “made in Vietnam” không chỉ góp phần bình ổn giá thành (máy thở PB560 tại Việt Nam đang có giá trên 250 triệu đồng/máy); mà còn đảm bảo sự chủ động cho Việt Nam trong bối cảnh dịch bệnh Covid 19 diễn biến phức tạp và chưa được khống chế tại nhiều quốc gia. Đây cũng chính là mục tiêu mà Vingroup hướng tới trong kế hoạch sản xuất máy thở phi lợi nhuận phục vụ cộng đồng./.\r\n\r\nThông tin tham khảo:\r\n\r\nMáy thở PB560 hay tên gọi đầy đủ là Puritan Bennett™ 560 đã được Cục quản lý Thực phẩm và dược phẩm Hoa Kỳ FDA cấp chứng chỉ lưu hành tại Mỹ ngày 05/04/2020 tại “Phụ lục B: Máy thở, đầu nối và phụ kiện máy thở” để đáp ứng nhu cầu thị trường trong bối cảnh đại dịch Covid - 19 đang hoành hành.\r\n\r\nPuritan Bennett™ 560 là phiên bản nâng cấp của Puritan Bennett™ 540, thiết bị đã được FDA cấp phép lưu hành tại Mỹ ngày 31/10/2008.', 'Tiq7_VFS 410.jpg', 0, 0, 3, '2020-05-06 17:00:00', '2020-05-07 16:01:33'),
(1031, 'VINHOMES OCEAN PARK ĐƯỢC VINH DANH “DỰ ÁN PHỨC HỢP TỐT NHẤT VIỆT NAM” TẠI APPA1111', 'vinhomes-ocean-park-duoc-vinh-danh-du-an-phuc-hop-tot-nhat-viet-nam-tai-appa1111', NULL, '123213', '', 0, NULL, 1, '2020-08-02 17:41:04', '2020-08-02 17:41:04'),
(1034, '234234', '234234', NULL, '445', 'FLot_WIN_20191213_17_04_16_Pro.jpg', 0, NULL, 1, '2020-08-02 18:11:23', '2020-08-02 18:11:23'),
(1037, 'Tuyển dụng vị trí abc', 'tuyen-dung-vi-tri-abc', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos eaque explicabo ullam autem sed laborum qui minima modi nostrum? Dicta, nulla? Nobis, hic quidem dicta fugit odit molestiae ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum impedit sit eveniet soluta, voluptas ut consectetur nihil dolorem deleniti et libero quia, laborum exercitationem? Porro eos saepe temporibus earum aspernatur?', 'Mt0W_acb.png', 1, NULL, 37, '2020-08-10 10:50:07', '2020-08-17 07:39:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `mac_ip` varchar(20) DEFAULT NULL,
  `id_nhanvien` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `quyen`, `remember_token`, `mac_ip`, `id_nhanvien`, `created_at`, `updated_at`) VALUES
(1, 'Nhã - Thanh', 'admin@gmail.com', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 1, NULL, NULL, 'GDGD.Nha.01', NULL, '2020-08-19 05:24:45'),
(29, 'Nhã Đại Ca', 'PGDPGD.Nha.2@cty.com.vn', '$2y$10$KED8sEVkK.xvSflgRjQMPO4O/XA2HyM96TlggyAoVGJclRuuHzwci', 1, NULL, NULL, 'PGDPGD.Nha.2', '2020-08-19 08:40:51', '2020-08-19 09:26:40'),
(30, 'Thanh Bùi', 'PGDPGD.Thanh.3@cty.com.vn', '$2y$10$WH/25Ap1mZd4fVJZBgwhX.HBW6.y2X0gNxGCm.mmgyQVzp/Ot4Rka', 1, NULL, NULL, 'PGDPGD.Thanh.3', '2020-08-19 09:02:31', '2020-08-19 09:02:31'),
(31, 'Cường CV', 'QLNS.Cuong.4@cty.com.vn', '$2y$10$IyREL0AO5L2X7TO0rbCwwuG2HB2kpnxxiSNcMRJmXEG7l5F9Gmi.m', 1, NULL, NULL, 'QLNS.Cuong.4', '2020-08-19 09:07:00', '2020-08-19 09:07:00'),
(32, 'Kan Nguyễn', 'QLMKT.Dai.5@cty.com.vn', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 1, NULL, NULL, 'QLMKT.Dai.5', '2020-08-19 09:12:27', '2020-08-19 09:12:27'),
(33, 'Đạt 09', 'QLKTTC.Dat.6@cty.com.vn', '$2y$10$2fcnSnZnQ139W17/7InWzuf5lX8rD1ui.ybdoMp0Lgod/GWXDVS5a', 1, NULL, NULL, 'QLKTTC.Dat.6', '2020-08-19 09:21:01', '2020-08-19 09:21:01'),
(34, '123123', 'NVNS.A.7@cty.com.vn', '$2y$10$EaF7cn8KrFg7sI0Tyslknu2cxS7c57.5MrUFpbHsIkmDcy1cXC5Tu', 1, NULL, NULL, 'NVNS.A.7', '2020-08-19 09:49:21', '2020-08-19 09:49:21'),
(35, '123123', 'NVNS.A.8@cty.com.vn', '$2y$10$RPfA4uxykjk.lF.Oa1ZppetAW4JYZQV6ssOpta6EXySh0mKh7xnwW', 1, NULL, NULL, 'NVNS.A.8', '2020-08-19 09:53:34', '2020-08-19 09:53:34'),
(36, 'nânnaa', 'NVMKT.T.9@cty.com.vn', '$2y$10$A78K7pC.gAPo0HzPnFlrseirKoitWye3eaG9cuVTWzPz5.cdupOcO', 1, NULL, NULL, 'NVMKT.T.9', '2020-08-19 10:14:00', '2020-08-19 10:14:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaitin_idtheloai_foreign` (`idTheLoai`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_anhykien`
--
ALTER TABLE `tbl_anhykien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ykien` (`id_luuykien`);

--
-- Chỉ mục cho bảng `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  ADD PRIMARY KEY (`id_bangluong`),
  ADD KEY `id_chamcong` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_baohiem`
--
ALTER TABLE `tbl_baohiem`
  ADD PRIMARY KEY (`id_baohiem`);

--
-- Chỉ mục cho bảng `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  ADD PRIMARY KEY (`id_chamcong`),
  ADD KEY `tbl_chamcong_ibfk_1` (`id_bangluong`),
  ADD KEY `id_tangca` (`id_tangca`);

--
-- Chỉ mục cho bảng `tbl_chitietphuluc`
--
ALTER TABLE `tbl_chitietphuluc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chucvu_moi` (`id_chucvu_moi`),
  ADD KEY `id_phucap_moi` (`id_phucap_moi`),
  ADD KEY `id_hopdong` (`id_hopdong`),
  ADD KEY `id_loaihopdong_moi` (`id_loaihopdong_moi`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`id_chucvu`),
  ADD KEY `id_phongban` (`id_phongban`);

--
-- Chỉ mục cho bảng `tbl_chucvu_permission`
--
ALTER TABLE `tbl_chucvu_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `id_permission` (`id_permission`);

--
-- Chỉ mục cho bảng `tbl_dantoc`
--
ALTER TABLE `tbl_dantoc`
  ADD PRIMARY KEY (`id_dantoc`);

--
-- Chỉ mục cho bảng `tbl_giadinh`
--
ALTER TABLE `tbl_giadinh`
  ADD PRIMARY KEY (`id_giadinh`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD PRIMARY KEY (`id_hopdong`),
  ADD KEY `tbl_hopdong_ibfk_2` (`id_nhanvien`),
  ADD KEY `id_loai_hop_dong` (`id_loaihopdong`),
  ADD KEY `id_phucap` (`id_phucap`);

--
-- Chỉ mục cho bảng `tbl_hoso`
--
ALTER TABLE `tbl_hoso`
  ADD PRIMARY KEY (`id_hoso`);

--
-- Chỉ mục cho bảng `tbl_hosonhanvien`
--
ALTER TABLE `tbl_hosonhanvien`
  ADD PRIMARY KEY (`id_nhanvien`),
  ADD KEY `id_chucvu` (`id_chucvu`),
  ADD KEY `id_dantoc` (`id_dantoc`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`),
  ADD KEY `id_nhanvien` (`id_nhanvien`),
  ADD KEY `id_tinh_tam_tru` (`id_tinh_tam_tru`),
  ADD KEY `id_tinh_thuong_tru` (`id_tinh_thuong_tru`);

--
-- Chỉ mục cho bảng `tbl_loaihopdong`
--
ALTER TABLE `tbl_loaihopdong`
  ADD PRIMARY KEY (`id_loaihopdong`);

--
-- Chỉ mục cho bảng `tbl_loaiphuluc`
--
ALTER TABLE `tbl_loaiphuluc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  ADD PRIMARY KEY (`id_luuykien`),
  ADD KEY `id_nhanvien` (`id_nhanvien`),
  ADD KEY `id_ykien` (`id_ykien`);

--
-- Chỉ mục cho bảng `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  ADD PRIMARY KEY (`id_mientrugiacanh`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_nghiphep`
--
ALTER TABLE `tbl_nghiphep`
  ADD PRIMARY KEY (`id_nghiphep`),
  ADD KEY `tbl_nghiphep_ibfk_1` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_nghiviec`
--
ALTER TABLE `tbl_nghiviec`
  ADD PRIMARY KEY (`id_nghiviec`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_phongban`
--
ALTER TABLE `tbl_phongban`
  ADD PRIMARY KEY (`id_phongban`);

--
-- Chỉ mục cho bảng `tbl_phucap`
--
ALTER TABLE `tbl_phucap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chuvu` (`id_chucvu`);

--
-- Chỉ mục cho bảng `tbl_phuluc`
--
ALTER TABLE `tbl_phuluc`
  ADD PRIMARY KEY (`id_phuluc`),
  ADD KEY `id_hopdong` (`id_hopdong`),
  ADD KEY `id_loaiphuluc` (`id_loaiphuluc`),
  ADD KEY `id_chitiet` (`id_chitiet`);

--
-- Chỉ mục cho bảng `tbl_quyetdinhthoiviec`
--
ALTER TABLE `tbl_quyetdinhthoiviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  ADD PRIMARY KEY (`id_tangca`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_thongtinchinh`
--
ALTER TABLE `tbl_thongtinchinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_thongtingioithieu`
--
ALTER TABLE `tbl_thongtingioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  ADD PRIMARY KEY (`id_thuecanhan`),
  ADD KEY `id_bangluong` (`id_bangluong`);

--
-- Chỉ mục cho bảng `tbl_tinh`
--
ALTER TABLE `tbl_tinh`
  ADD PRIMARY KEY (`id_tinh`);

--
-- Chỉ mục cho bảng `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vi_tri` (`vi_tri`);

--
-- Chỉ mục cho bảng `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  ADD PRIMARY KEY (`id_trinhdo`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `tbl_ykien`
--
ALTER TABLE `tbl_ykien`
  ADD PRIMARY KEY (`id_ykien`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tintuc_idloaitin_foreign` (`idLoaiTin`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_anhykien`
--
ALTER TABLE `tbl_anhykien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  MODIFY `id_bangluong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_baohiem`
--
ALTER TABLE `tbl_baohiem`
  MODIFY `id_baohiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  MODIFY `id_chamcong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietphuluc`
--
ALTER TABLE `tbl_chitietphuluc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_chucvu_permission`
--
ALTER TABLE `tbl_chucvu_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705;

--
-- AUTO_INCREMENT cho bảng `tbl_dantoc`
--
ALTER TABLE `tbl_dantoc`
  MODIFY `id_dantoc` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_giadinh`
--
ALTER TABLE `tbl_giadinh`
  MODIFY `id_giadinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_hoso`
--
ALTER TABLE `tbl_hoso`
  MODIFY `id_hoso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_loaihopdong`
--
ALTER TABLE `tbl_loaihopdong`
  MODIFY `id_loaihopdong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_loaiphuluc`
--
ALTER TABLE `tbl_loaiphuluc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  MODIFY `id_luuykien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  MODIFY `id_mientrugiacanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_nghiphep`
--
ALTER TABLE `tbl_nghiphep`
  MODIFY `id_nghiphep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_nghiviec`
--
ALTER TABLE `tbl_nghiviec`
  MODIFY `id_nghiviec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_phucap`
--
ALTER TABLE `tbl_phucap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_quyetdinhthoiviec`
--
ALTER TABLE `tbl_quyetdinhthoiviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  MODIFY `id_tangca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtinchinh`
--
ALTER TABLE `tbl_thongtinchinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_thongtingioithieu`
--
ALTER TABLE `tbl_thongtingioithieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_thuecanhan`
--
ALTER TABLE `tbl_thuecanhan`
  MODIFY `id_thuecanhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_tinh`
--
ALTER TABLE `tbl_tinh`
  MODIFY `id_tinh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  MODIFY `id_trinhdo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_ykien`
--
ALTER TABLE `tbl_ykien`
  MODIFY `id_ykien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1038;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_idtheloai_foreign` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`);

--
-- Các ràng buộc cho bảng `tbl_anhykien`
--
ALTER TABLE `tbl_anhykien`
  ADD CONSTRAINT `tbl_anhykien_ibfk_1` FOREIGN KEY (`id_luuykien`) REFERENCES `tbl_luuykien` (`id_luuykien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_bangluong`
--
ALTER TABLE `tbl_bangluong`
  ADD CONSTRAINT `tbl_bangluong_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chamcong`
--
ALTER TABLE `tbl_chamcong`
  ADD CONSTRAINT `tbl_chamcong_ibfk_1` FOREIGN KEY (`id_bangluong`) REFERENCES `tbl_bangluong` (`id_bangluong`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chamcong_ibfk_2` FOREIGN KEY (`id_tangca`) REFERENCES `tbl_tangca` (`id_tangca`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chitietphuluc`
--
ALTER TABLE `tbl_chitietphuluc`
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_2` FOREIGN KEY (`id_chucvu_moi`) REFERENCES `tbl_chucvu` (`id_chucvu`),
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_3` FOREIGN KEY (`id_phucap_moi`) REFERENCES `tbl_phucap` (`id`),
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_4` FOREIGN KEY (`id_hopdong`) REFERENCES `tbl_hopdong` (`id_hopdong`),
  ADD CONSTRAINT `tbl_chitietphuluc_ibfk_5` FOREIGN KEY (`id_loaihopdong_moi`) REFERENCES `tbl_loaihopdong` (`id_loaihopdong`);

--
-- Các ràng buộc cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD CONSTRAINT `tbl_chucvu_ibfk_1` FOREIGN KEY (`id_phongban`) REFERENCES `tbl_phongban` (`id_phongban`);

--
-- Các ràng buộc cho bảng `tbl_chucvu_permission`
--
ALTER TABLE `tbl_chucvu_permission`
  ADD CONSTRAINT `tbl_chucvu_permission_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_chucvu_permission_ibfk_2` FOREIGN KEY (`id_permission`) REFERENCES `tbl_permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_giadinh`
--
ALTER TABLE `tbl_giadinh`
  ADD CONSTRAINT `tbl_giadinh_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hopdong`
--
ALTER TABLE `tbl_hopdong`
  ADD CONSTRAINT `tbl_hopdong_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_hopdong_ibfk_2` FOREIGN KEY (`id_loaihopdong`) REFERENCES `tbl_loaihopdong` (`id_loaihopdong`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_hopdong_ibfk_3` FOREIGN KEY (`id_phucap`) REFERENCES `tbl_phucap` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hosonhanvien`
--
ALTER TABLE `tbl_hosonhanvien`
  ADD CONSTRAINT `tbl_hosonhanvien_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD CONSTRAINT `tbl_lienhe_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_lienhe_ibfk_2` FOREIGN KEY (`id_tinh_tam_tru`) REFERENCES `tbl_tinh` (`id_tinh`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_lienhe_ibfk_3` FOREIGN KEY (`id_tinh_thuong_tru`) REFERENCES `tbl_tinh` (`id_tinh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_luuykien`
--
ALTER TABLE `tbl_luuykien`
  ADD CONSTRAINT `tbl_luuykien_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_luuykien_ibfk_2` FOREIGN KEY (`id_ykien`) REFERENCES `tbl_ykien` (`id_ykien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_mientrugiacanh`
--
ALTER TABLE `tbl_mientrugiacanh`
  ADD CONSTRAINT `tbl_mientrugiacanh_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phucap`
--
ALTER TABLE `tbl_phucap`
  ADD CONSTRAINT `tbl_phucap_ibfk_1` FOREIGN KEY (`id_chucvu`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phuluc`
--
ALTER TABLE `tbl_phuluc`
  ADD CONSTRAINT `tbl_phuluc_ibfk_1` FOREIGN KEY (`id_loaiphuluc`) REFERENCES `tbl_loaiphuluc` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_phuluc_ibfk_2` FOREIGN KEY (`id_hopdong`) REFERENCES `tbl_hopdong` (`id_hopdong`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_phuluc_ibfk_3` FOREIGN KEY (`id_chitiet`) REFERENCES `tbl_chitietphuluc` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_quyetdinhthoiviec`
--
ALTER TABLE `tbl_quyetdinhthoiviec`
  ADD CONSTRAINT `tbl_quyetdinhthoiviec_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_tangca`
--
ALTER TABLE `tbl_tangca`
  ADD CONSTRAINT `tbl_tangca_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_tintuyendung`
--
ALTER TABLE `tbl_tintuyendung`
  ADD CONSTRAINT `tbl_tintuyendung_ibfk_1` FOREIGN KEY (`vi_tri`) REFERENCES `tbl_chucvu` (`id_chucvu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_trinhdo`
--
ALTER TABLE `tbl_trinhdo`
  ADD CONSTRAINT `tbl_trinhdo_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`idLoaiTin`) REFERENCES `loaitin` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_nhanvien`) REFERENCES `tbl_hosonhanvien` (`id_nhanvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
