-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2021 lúc 11:56 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hack`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `stk` text NOT NULL,
  `name` text NOT NULL,
  `bank_name` text NOT NULL,
  `chi_nhanh` text NOT NULL,
  `logo` text,
  `ghichu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank_auto`
--

CREATE TABLE `bank_auto` (
  `id` int(11) NOT NULL,
  `tid` varchar(64) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci,
  `amount` int(11) DEFAULT '0',
  `cusum_balance` int(11) DEFAULT '0',
  `time` datetime DEFAULT NULL,
  `bank_sub_acc_id` varchar(64) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(64) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `block_callback`
--

CREATE TABLE `block_callback` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `reason` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_vietnamese_ci,
  `time` datetime DEFAULT NULL,
  `thoigian` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card_auto`
--

CREATE TABLE `card_auto` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `loaithe` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `menhgia` int(11) DEFAULT NULL,
  `thucnhan` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `capnhat` datetime DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_vietnamese_ci,
  `server` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `seri` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `callback` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `request_id` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyentien`
--

CREATE TABLE `chuyentien` (
  `id` int(11) NOT NULL,
  `nguoinhan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `nguoichuyen` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sotien` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ck_card_auto`
--

CREATE TABLE `ck_card_auto` (
  `id` int(11) NOT NULL,
  `loaithe` varchar(255) DEFAULT NULL,
  `menhgia` int(11) DEFAULT NULL,
  `ck` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ck_card_auto`
--

INSERT INTO `ck_card_auto` (`id`, `loaithe`, `menhgia`, `ck`) VALUES
(1, 'VIETTEL', 10000, 18),
(2, 'VIETTEL', 20000, 18),
(3, 'VIETTEL', 30000, 18),
(4, 'VIETTEL', 50000, 18),
(5, 'VIETTEL', 100000, 18),
(6, 'VIETTEL', 200000, 18),
(7, 'VIETTEL', 300000, 18),
(8, 'VIETTEL', 500000, 18),
(9, 'VIETTEL', 1000000, 18),
(10, 'VINAPHONE', 10000, 22),
(11, 'VINAPHONE', 20000, 22),
(12, 'VINAPHONE', 30000, 22),
(13, 'VINAPHONE', 50000, 22),
(14, 'VINAPHONE', 100000, 22),
(15, 'VINAPHONE', 200000, 22),
(16, 'VINAPHONE', 300000, 22),
(17, 'VINAPHONE', 500000, 22),
(18, 'VINAPHONE', 1000000, 22),
(19, 'MOBIFONE', 10000, 25),
(20, 'MOBIFONE', 20000, 25),
(21, 'MOBIFONE', 30000, 25),
(22, 'MOBIFONE', 50000, 25),
(23, 'MOBIFONE', 100000, 25),
(24, 'MOBIFONE', 200000, 25),
(25, 'MOBIFONE', 300000, 25),
(26, 'MOBIFONE', 500000, 25),
(27, 'MOBIFONE', 1000000, 25),
(28, 'ZING', 10000, 20),
(29, 'ZING', 20000, 20),
(30, 'ZING', 30000, 20),
(31, 'ZING', 50000, 17),
(32, 'ZING', 100000, 17),
(33, 'ZING', 200000, 17),
(34, 'ZING', 300000, 17),
(35, 'ZING', 500000, 17),
(36, 'ZING', 1000000, 17),
(37, 'VNMOBI', 10000, 20),
(38, 'VNMOBI', 20000, 20),
(39, 'VNMOBI', 30000, 20),
(40, 'VNMOBI', 50000, 17),
(41, 'VNMOBI', 100000, 17),
(42, 'VNMOBI', 200000, 17),
(43, 'VNMOBI', 300000, 17),
(44, 'VNMOBI', 500000, 17),
(45, 'VNMOBI', 1000000, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongtien`
--

CREATE TABLE `dongtien` (
  `id` int(11) NOT NULL,
  `sotientruoc` int(11) DEFAULT NULL,
  `sotienthaydoi` int(11) DEFAULT NULL,
  `sotiensau` int(11) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `noidung` text COLLATE utf8_vietnamese_ci,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listbank`
--

CREATE TABLE `listbank` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sotaikhoan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `chutaikhoan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `nganhang` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `chinhanh` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithe`
--

CREATE TABLE `loaithe` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ck` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `loaithe`
--

INSERT INTO `loaithe` (`id`, `type`, `ck`, `status`) VALUES
(1, 'VIETTEL', 19, 1),
(2, 'VINAPHONE', 21, 1),
(3, 'MOBIFONE', 27, 1),
(4, 'GATE', 32, 1),
(5, 'ZING', 20, 1),
(6, 'VNMOBI', 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo`
--

CREATE TABLE `momo` (
  `id` int(11) NOT NULL,
  `request_id` varchar(64) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `tranId` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci,
  `partnerId` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci,
  `partnerName` text CHARACTER SET utf16 COLLATE utf16_vietnamese_ci,
  `amount` text CHARACTER SET utf32 COLLATE utf32_vietnamese_ci,
  `comment` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `time` datetime DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci DEFAULT NULL,
  `status` varchar(32) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT 'xuly'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muathe`
--

CREATE TABLE `muathe` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Telco` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Serial` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `PinCode` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Trace` int(11) DEFAULT NULL,
  `gettime` datetime DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(1, 'tenweb', ''),
(2, 'mota', 'THÀNH BÚ CẶC CARD|Hệ thống đổi thẻ cào sang tiền mặt phí tốt nhất thị trường - tự động xử lý thẻ trong vài giây!'),
(3, 'tukhoa', 'CHÓ THÀNH, doi the, trum the, đổi thẻ cào sang tiền mặt, doi the sieu nhanh, the sieu re, doi the nhanh, doi the cao sang tien mat, card CHÓ THÀNH, card exchange, tst, tsr, tsn, doicardnhanh, doi thẻ cào, trum the cào, đổi thẻ giá rẻ, mua thẻ cào giá rẻ, mua thẻ cào, card online, card giá rẻ'),
(4, 'logo', ''),
(5, 'email', ''),
(6, 'pass_email', ''),
(11, 'noidung_naptien', 'NAPTIEN_'),
(12, 'thongbao', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px;\"><span style=\"font-weight: 700;\">Ưu tiên thẻ Vina,Zing, Vietnammobi đến hết tháng. Viettel và Zing cần điền đúng SERI</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px;\">- Sai mệnh giá -50%. Hướng dẫn tích hợp API gạch thẻ tự động cho Shop: </p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px;\">- VNC nghiêm cấm sử dụng <span style=\"font-weight: 700;\">thẻ cào trộm cắp, lừa đảo</span>. Nếu phát hiện khóa vv</p>'),
(13, 'anhbia', ''),
(14, 'favicon', ''),
(17, 'baotri', 'ON'),
(18, 'chinhsach', ''),
(27, 'min_ruttien', ''),
(28, 'ck_con', '3'),
(29, 'phi_chuyentien', '1000'),
(30, 'status_chuyentien', 'ON'),
(31, 'hotline', ''),
(32, 'facebook', ''),
(33, 'theme_color', '#0073F1'),
(34, 'modal_thongbao', ''),
(35, 'tk_banthe247', ''),
(36, 'mk_banthe247', ''),
(37, 'status_muathe', 'ON'),
(38, 'status_napdt', 'OFF'),
(39, 'ck_500', '2'),
(40, 'partner_id', ''),
(41, 'partner_key', ''),
(42, 'api_bank', ''),
(43, 'status_napbank', 'ON'),
(44, 'status_demo', 'OFF'),
(45, 'api_momo', ''),
(46, 'email_admin', ''),
(47, 'check_time_cron_pay_momo', '1629441432'),
(48, 'check_time_cron_momo', '0'),
(49, 'display_carousel', 'ON'),
(50, 'phi_rut_tien', '0'),
(51, 'script_live_chat', ''),
(52, 'token_momo', ''),
(53, 'password_momo', ''),
(54, 'security_banthe247', ''),
(55, 'dieu_khoan', ''),
(56, 'status_blog', 'OFF'),
(57, 'status_ref', 'ON'),
(58, 'ck_ref', '1'),
(59, 'luuy_ref', '<ul>\r\n    <li>Những tài khoản được hệ thống xác định là tài khoản sao chép của các tài\r\n        khoản khác sẽ không được dùng để tính hoa hồng.</li>\r\n    <li>Hoa hồng chỉ được tính khi bạn bè của bạn thực hiện đổi thẻ thành công.</li>\r\n    <li>Việc xác định xem ai là người giới thiệu của một người dùng phụ thuộc hoàn\r\n        toàn vào link giới thiệu. Nếu một người dùng nhấp vào nhiều link ref khác\r\n        nhau thì chỉ có link ref cuối cùng họ nhấp vào trước khi tạo tài khoản là có\r\n        hiệu lực.</li>\r\n    <li>Chúng tôi sẽ từ chối trả hoa hồng khi phát hiện bạn cố tình sao chép tài\r\n        khoản để giảm chiết khấu thẻ.</li>\r\n</ul>'),
(60, 'status_trumthe', 'ON'),
(61, 'status_cardvip', 'OFF'),
(62, 'api_cardvip', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ruttien`
--

CREATE TABLE `ruttien` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `magd` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sotien` int(11) DEFAULT NULL,
  `nganhang` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sotaikhoan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `chutaikhoan` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `chinhanh` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `capnhat` datetime DEFAULT NULL,
  `ghichu` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `loai` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `transaction` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` varchar(0) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `gettime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_muathe`
--

CREATE TABLE `type_muathe` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `type_muathe`
--

INSERT INTO `type_muathe` (`id`, `type`, `name`) VALUES
(1, 'ZING', 'Zing'),
(2, 'VTT', 'Viettel'),
(3, 'VNP', 'Vinaphone'),
(4, 'GAR', 'Garena'),
(5, 'VNM', 'Vietnammobie'),
(6, 'VMS', 'Mobifone'),
(7, 'VTC', 'Vcoin'),
(8, 'FPT', 'Fpt Gate'),
(9, 'DBM', 'Mobi Data');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `level` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `banned` int(11) NOT NULL DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ref_click` int(11) DEFAULT '0',
  `reason_banned` text COLLATE utf8_vietnamese_ci,
  `agency` int(11) DEFAULT '0',
  `otp` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `used_money` int(11) NOT NULL DEFAULT '0',
  `total_money` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `block_callback`
--
ALTER TABLE `block_callback`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `card_auto`
--
ALTER TABLE `card_auto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `chuyentien`
--
ALTER TABLE `chuyentien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `ck_card_auto`
--
ALTER TABLE `ck_card_auto`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `listbank`
--
ALTER TABLE `listbank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `loaithe`
--
ALTER TABLE `loaithe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `muathe`
--
ALTER TABLE `muathe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `type_muathe`
--
ALTER TABLE `type_muathe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bank_auto`
--
ALTER TABLE `bank_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `block_callback`
--
ALTER TABLE `block_callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `card_auto`
--
ALTER TABLE `card_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chuyentien`
--
ALTER TABLE `chuyentien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ck_card_auto`
--
ALTER TABLE `ck_card_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `listbank`
--
ALTER TABLE `listbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaithe`
--
ALTER TABLE `loaithe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `momo`
--
ALTER TABLE `momo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muathe`
--
ALTER TABLE `muathe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `type_muathe`
--
ALTER TABLE `type_muathe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
