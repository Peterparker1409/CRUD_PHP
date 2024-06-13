-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2024 lúc 10:43 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phpdasar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `siswa`
--

CREATE TABLE `siswa` (
  `id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `sex` enum('Nam','Nữ') NOT NULL,
  `major` enum('Kỹ thuật mạng truy cập','Kỹ thuật máy tính và mạng','Đa phương tiện','Kỹ thuật phần mềm','Kỹ Thuật Mạng','Kỹ Thuật Máy Tính và Mạng','Đa Phương Tiện','Kỹ Sư Phần Mềm') NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `siswa`
--

INSERT INTO `siswa` (`id`, `name`, `hometown`, `age`, `sex`, `major`, `email`, `image`, `address`) VALUES
('123', '31231', '123123', '1232-02-12', 'Nam', 'Kỹ thuật máy tính và mạng', 'khoabph99@gmail.com', '666aabbeb8f39.png', 'đội 9 , thôn hà châu ,xã hoàng hanh , tp hưng yên , tỉnh hưng yên'),
('210301', 'Minh Anh', 'Hà Nội', '2001-06-03', 'Nam', '', 'khoa123@gmail.com', '60433ff651b20.png', 'Số nhà 7'),
('210302', 'Trang Hương', 'Hưng Yên', '2003-01-23', 'Nữ', '', 'tranghuong@gmail.com', '604340becfb49.png', 'Tòa nhà A'),
('210303', 'Dương Minh', 'Hà Nội', '2000-04-22', 'Nam', 'Đa phương tiện', 'duongminh@gmail.com', '604342d27f34b.png', 'Đường Nguyễn Chí Thanh'),
('210304', 'Peter Quang', 'Hà Nội', '2003-07-05', 'Nữ', '', 'peterquang@gmail.com', '604343274043b.png', 'Số 10 Ngõ 5 Đào Tấn'),
('210305', 'Anh Hoàng', 'Thái Bình', '2005-06-15', 'Nữ', '', 'anhhoang@gmail.com', '6043437e9dd54.png', 'Tập đoàn FPT'),
('210307', 'Hùng Nam', 'Hà Nội', '2001-02-08', 'Nam', '', 'hungnam@gmail.com', '6043441cd4d96.png', 'Phòng 301, Tòa nhà A1'),
('210308', 'Đạt Tùng', 'Bắc Giang', '2003-02-08', 'Nam', '', 'dattung@gmail.com', '60434474053e7.png', 'Khu phố 6, Thị trấn Đình Bảng'),
('210309', 'Marlee Ertelt', 'Kapunduk', '2005-12-06', 'Nam', 'Đa phương tiện', 'mertelt8@webnode.com', '604344cee38d6.png', '0330 Ngõ Shasta'),
('210310', 'Haroun Mathiasen', 'Tambakbaya', '2000-01-21', 'Nữ', 'Kỹ thuật mạng truy cập', 'hmathiasen9@tuttocitta.it', '6043451f48ae3.png', '652 Nơi Heath'),
('210311', 'Sylvan Mizzi', 'Kayes', '2000-10-14', 'Nữ', 'Kỹ thuật phần mềm', 'smizzia@joomla.org', '6043456c9fc89.png', '87142 Đường Scofield'),
('210312', 'Mirna Duffill', 'Patao', '2000-07-15', 'Nữ', 'Kỹ thuật máy tính và mạng', 'mduffill@pbs.org', '604345bd3abd1.png', '812 Đường Hallows'),
('210313', 'Sherlock Frackiewicz', 'Moate', '2004-01-31', 'Nam', 'Đa phương tiện', 'sfrackiewiczc@uiuc.edu', '604346173ee94.png', '37998 Ngõ Pankratz'),
('210314', 'Yolande Arne', 'Mpraeso', '2003-04-06', 'Nữ', 'Kỹ thuật mạng truy cập', 'yarned@youku.com', '6043464ca2b46.png', '2 Vòng tròn Union'),
('210316', 'Vương Tuấn', 'Nam Định', '2000-08-12', 'Nam', '', 'tuandeptraivl@gmail.com', '6043469155dc3.png', '8 Tòa án Texas'),
('210319', 'Thùy Trang', 'Phú Thọ', '2001-01-14', 'Nữ', '', 'trangthuyltp@gmail.com', '6043469155dc3.png', '8 Tòa án Texas'),
('23412312', 'anh', 'anh', '1999-12-12', 'Nam', 'Kỹ Thuật Mạng', 'khoabph99@gmail.com', '666a9095b2b3b.png', 'anh'),
('43412312', 'linh', 'hà nam', '2002-09-14', 'Nữ', 'Đa phương tiện', 'khoabph99@gmail.com', '666a8e87dd630.jpg', 'cầu giấya'),
('435123', 'hằng cute', 'Bắc giang', '1999-05-13', 'Nữ', 'Kỹ thuật máy tính và mạng', 'khoabph99@gmail.com', '666a959c855fb.png', 'Địa chỉ trụ sở: Phòng 802, Tầng 8, Toà nhà 315 Trường Chinh, Phường Khương Mai, Quận Thanh Xuân, Thành phố Hà Nội, Việt Nam1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'khoa', 'khoa123'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'nghiadz', '202cb962ac59075b964b07152d234b70'),
(4, 'manh', '202cb962ac59075b964b07152d234b70'),
(5, 'cao', '202cb962ac59075b964b07152d234b70');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
