-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2021 lúc 04:41 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_cubic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_account`
--

CREATE TABLE `tb_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_account`
--

INSERT INTO `tb_account` (`id`, `username`, `password`) VALUES
(1, 'admin', '4b07340f1c4d044aeb6e42f0e14d697d'),
(2, 'cubic', '4b07340f1c4d044aeb6e42f0e14d697d');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_branch`
--

CREATE TABLE `tb_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `link_image` varchar(1000) DEFAULT NULL,
  `type` bit(50) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_branch`
--

INSERT INTO `tb_branch` (`id`, `name`, `link_image`, `type`) VALUES
(2, 'UTC', '../assets/images/partners/te.png', b'00000000000000000000000000000000000000000000000001'),
(3, 'DG', '../assets/images/branch/06f2dbeb96aa262eacde5e53a92cc9c7.jpg', b'00000000000000000000000000000000000000000000000001'),
(5, 'SCA', '../assets/images/branch/653ebd032db921d2ad96cd143f7a66b5(1).jpg', b'00000000000000000000000000000000000000000000000000'),
(6, 'Vin BRo', '../assets/images/branch/12262_1429042049_mbd2.jpg', b'00000000000000000000000000000000000000000000000000'),
(7, 'ABC', '../assets/images/branch/06f2dbeb96aa262eacde5e53a92cc9c7-1.jpg', b'00000000000000000000000000000000000000000000000000'),
(8, 'CDEF', '../assets/images/branch/653ebd032db921d2ad96cd143f7a66b5-1.jpg', b'00000000000000000000000000000000000000000000000000'),
(9, 'QET', '../assets/images/branch/12262_1429042049_mbd2-1.jpg', b'00000000000000000000000000000000000000000000000000'),
(10, 'MNPQ', '../assets/images/branch/432085_16736240_3031669_eb29f35e_image.jpg', b'00000000000000000000000000000000000000000000000000'),
(11, 'XYZ', '../assets/images/branch/attachment_3295006.jpg', b'00000000000000000000000000000000000000000000000000'),
(12, 'Route', '../assets/images/branch/attachment_64698719-1-e1515600775291.png', b'00000000000000000000000000000000000000000000000001'),
(13, 'Van lang', '../assets/images/branch/06f2dbeb96aa262eacde5e53a92cc9c7-2.jpg', b'00000000000000000000000000000000000000000000000001'),
(14, 'DKJG', '../assets/images/branch/653ebd032db921d2ad96cd143f7a66b5-2.jpg', b'00000000000000000000000000000000000000000000000000'),
(15, 'LKGNN', '../assets/images/branch/12262_1429042049_mbd2-2.jpg', b'00000000000000000000000000000000000000000000000000'),
(16, 'MDGF', '../assets/images/branch/432085_16736240_3031669_eb29f35e_image-1.jpg', b'00000000000000000000000000000000000000000000000001'),
(17, 'HFG', '../assets/images/branch/attachment_3295006-1.jpg', b'00000000000000000000000000000000000000000000000001'),
(18, 'KKKK', '../assets/images/branch/06f2dbeb96aa262eacde5e53a92cc9c7-3.jpg', b'00000000000000000000000000000000000000000000000001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_account` int(11) DEFAULT NULL,
  `news_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_news`
--

INSERT INTO `tb_news` (`id`, `title`, `time`, `content`, `id_type`, `id_account`, `news_image`) VALUES
(3, 'Công trình tỷ đô hoàn thành', '2021-08-24', ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam reiciendis doloribus odit voluptatum quidem laboriosam in quibusdam, autem ipsam, sit, iure similique facere libero quo maxime accusamus. Officia, blanditiis? ', 3, 1, '../assets/images/news/bach-phu-thinh.png'),
(4, 'Công trình khách sạn 5*', '2021-08-16', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam reiciendis doloribus odit voluptatum quidem laboriosam in quibusdam, autem ipsam, sit, iure similique facere libero quo maxime accusamus. Officia, blanditiis?\r\n', 2, 1, '../assets/images/news/hqc-plaza-1379350959(1).jpg'),
(5, '15th Anniversary CUBIC Architects', '2019-10-12', 'On October 24, CUBIC was marking the 15th Anniversary by holding a gala event in the Melia hotel in Hanoi. More than 300 prominent guests representing clients, partners, and friends were present. One short film filled with memories through years opened the ceremony. Mr. Nguyen Tan Van, President of Vietnam Association of Architects, , as well as our three co-founders, Mr. Phan Minh Son, Mr. Nguyen Trung Dung and Mr. Tran Vu Lam, also gave speeches to share their thoughts and vision.', 1, 1, '../assets/images/news/ung_buou_cs2_9cb44d587c39493aa3a9d4c59c4b089d.jpg'),
(7, 'Hospital concept won \"Impress Design\"', '2021-08-02', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque consequuntur unde impedit similique quidem aliquam, sed quas, omnis ex fuga porro cumque vel placeat amet cupiditate est quaerat. Ex, nisi!\r\n', 3, 1, '../assets/images/news/download.jpg'),
(8, 'Hospital concept won \"Impress Design\"', '2021-08-02', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque consequuntur unde impedit similique quidem aliquam, sed quas, omnis ex fuga porro cumque vel placeat amet cupiditate est quaerat. Ex, nisi!\r\n', 3, 1, '../assets/images/news/download.jpg'),
(9, '15th Anniversary CUBIC Architects', '2019-10-12', 'On October 24, CUBIC was marking the 15th Anniversary by holding a gala event in the Melia hotel in Hanoi. More than 300 prominent guests representing clients, partners, and friends were present. One short film filled with memories through years opened the ceremony. Mr. Nguyen Tan Van, President of Vietnam Association of Architects, , as well as our three co-founders, Mr. Phan Minh Son, Mr. Nguyen Trung Dung and Mr. Tran Vu Lam, also gave speeches to share their thoughts and vision.', 1, 1, '../assets/images/news/ung_buou_cs2_9cb44d587c39493aa3a9d4c59c4b089d.jpg'),
(10, 'Hospital concept won \"Impress Design\"', '2021-08-02', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque consequuntur unde impedit similique quidem aliquam, sed quas, omnis ex fuga porro cumque vel placeat amet cupiditate est quaerat. Ex, nisi!\r\n', 3, 1, '../assets/images/news/download.jpg'),
(11, 'Công trình khách sạn 5*', '2021-08-16', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam reiciendis doloribus odit voluptatum quidem laboriosam in quibusdam, autem ipsam, sit, iure similique facere libero quo maxime accusamus. Officia, blanditiis?\r\n', 2, 1, '../assets/images/news/hqc-plaza-1379350959(1).jpg'),
(12, '15th Anniversary CUBIC Architects', '2019-10-12', 'On October 24, CUBIC was marking the 15th Anniversary by holding a gala event in the Melia hotel in Hanoi. More than 300 prominent guests representing clients, partners, and friends were present. One short film filled with memories through years opened the ceremony. Mr. Nguyen Tan Van, President of Vietnam Association of Architects, , as well as our three co-founders, Mr. Phan Minh Son, Mr. Nguyen Trung Dung and Mr. Tran Vu Lam, also gave speeches to share their thoughts and vision.', 1, 1, '../assets/images/news/ung_buou_cs2_9cb44d587c39493aa3a9d4c59c4b089d.jpg'),
(13, 'Công trình tỷ đô hoàn thành', '2021-08-24', ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam reiciendis doloribus odit voluptatum quidem laboriosam in quibusdam, autem ipsam, sit, iure similique facere libero quo maxime accusamus. Officia, blanditiis? ', 3, 1, '../assets/images/news/bach-phu-thinh.png'),
(14, 'Công trình khách sạn 5*', '2021-08-16', '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam aperiam reiciendis doloribus odit voluptatum quidem laboriosam in quibusdam, autem ipsam, sit, iure similique facere libero quo maxime accusamus. Officia, blanditiis?\r\n', 2, 1, '../assets/images/news/hqc-plaza-1379350959(1).jpg'),
(15, '15th Anniversary CUBIC Architects', '2019-10-12', 'On October 24, CUBIC was marking the 15th Anniversary by holding a gala event in the Melia hotel in Hanoi. More than 300 prominent guests representing clients, partners, and friends were present. One short film filled with memories through years opened the ceremony. Mr. Nguyen Tan Van, President of Vietnam Association of Architects, , as well as our three co-founders, Mr. Phan Minh Son, Mr. Nguyen Trung Dung and Mr. Tran Vu Lam, also gave speeches to share their thoughts and vision.', 1, 1, '../assets/images/news/ung_buou_cs2_9cb44d587c39493aa3a9d4c59c4b089d.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_news_type`
--

CREATE TABLE `tb_news_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_news_type`
--

INSERT INTO `tb_news_type` (`id`, `name`) VALUES
(1, 'Award'),
(2, 'Event'),
(3, 'News');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_project`
--

CREATE TABLE `tb_project` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `client` varchar(500) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `scale` varchar(500) DEFAULT NULL,
  `gfa` varchar(500) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_project`
--

INSERT INTO `tb_project` (`id`, `name`, `description`, `address`, `client`, `year`, `scale`, `gfa`, `id_status`) VALUES
(1, 'Dragon palace', '', 'Binh Duong province', 'H.T.C Trading Real Estate.,JSC', '2019 -On', '45 Storeys | 3 Basements', '147.980', 2),
(2, 'DCat Ba Mall', 'abc', 'Cat Ba Island - Hai Phong City', '', '2020 - On ', '8 Storeys | 1 Basements', '8.080', 4),
(14, 'Bệnh viện 111', '', 'Số 1, Tây Sơn', 'BV 111', '2020', '8 tầng', '8000.599', 3),
(17, 'HUE SKY 5*', '', 'An Van Duong urban Area - Hue City', '', '2021', '', '2000', 4),
(18, 'RESIDENNCE BIINH DUONG PROVINCE', '', 'Thu Dau 1 - City', '', '343', '', '20003', 1),
(19, 'Xuan Cau Residen', '', '2/34 Phan Huy Ich - 15 ward', 'quang', '343', '8 tầng', '1997', 5),
(20, 'Khach san VMQ', 'Vip pro nhất hà nội', '1/1 Hồ Gươm Hà Nội', 'quang', '343', '8 tầng', '1997', 5),
(21, 'Hau Au Hotel', '', 'Xuan tao - bac tu -Liem', 'quang', '2021', 'big', '1997', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_project_image`
--

CREATE TABLE `tb_project_image` (
  `id_project` int(11) DEFAULT NULL,
  `link_image` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_project_image`
--

INSERT INTO `tb_project_image` (`id_project`, `link_image`) VALUES
(14, './assets/images/project/hqc-plaza-1379350959.jpg'),
(14, './assets/images/project/images.jpg'),
(2, './assets/images/project/chung-cu-bao-minh-ezland(1).jpg'),
(2, './assets/images/project/chung-cu-lamer-2-2(1).jpg'),
(2, './assets/images/project/cong-truong-xay-dung-can-cau-xay-dung-1024x768(1).jpg'),
(1, './assets/images/project/hqc-plaza-1379350959(1).jpg'),
(17, './assets/images/project/bach-phu-thinh-1.png'),
(17, './assets/images/project/chung-cu-bao-minh-ezland.jpg'),
(17, './assets/images/project/chung-cu-lamer-2-2-1.jpg'),
(17, './assets/images/project/cong-hoa-garden.jpg'),
(18, './assets/images/project/images-1.jpg'),
(18, './assets/images/project/unnamed.jpg'),
(19, './assets/images/project/chung-cu-lamer-2-2-2.jpg'),
(19, './assets/images/project/cong-ty-tu-van-thiet-ke-xay-dung-do-thi-ha-noi-uac.jpg'),
(20, './assets/images/project/chung-cu-bao-minh-ezland-1.jpg'),
(20, './assets/images/project/cong-truong-xay-dung-can-cau-xay-dung-1024x768.jpg'),
(20, './assets/images/project/hqc-plaza-1379350959-1.jpg'),
(21, './assets/images/project/unnamed-1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_project_status`
--

CREATE TABLE `tb_project_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_project_status`
--

INSERT INTO `tb_project_status` (`id`, `name`) VALUES
(1, 'Under construction'),
(2, 'Completed'),
(3, 'Competition'),
(4, 'Design development'),
(5, 'Concept');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_project_type`
--

CREATE TABLE `tb_project_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_project_type`
--

INSERT INTO `tb_project_type` (`id`, `name`) VALUES
(1, 'Master plan'),
(2, 'Mixed use'),
(3, 'Office'),
(4, 'Hotel'),
(8, 'Comercial'),
(9, 'House');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_project_type_rel`
--

CREATE TABLE `tb_project_type_rel` (
  `id_project` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_project_type_rel`
--

INSERT INTO `tb_project_type_rel` (`id_project`, `id_type`) VALUES
(14, 2),
(14, 3),
(2, 3),
(1, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(21, 1),
(21, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'staff',
  `office` varchar(100) DEFAULT NULL,
  `link_image` varchar(1000) DEFAULT NULL,
  `link_cv` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_staff`
--

INSERT INTO `tb_staff` (`id`, `name`, `type`, `office`, `link_image`, `link_cv`) VALUES
(9, 'Vũ Minh Quang', 'founder', 'Chair man', '../assets/images/branch/143256_90223325_2410382045884730_9153501852480831488_o.jpg', NULL),
(10, 'Trần Công Chí', 'founder', 'Designer', '../assets/images/branch/chup-anh-the-tai-han-quoc-tgroup-travel-5.jpg', NULL),
(11, 'Nguyễn Thị Dung', 'founder', 'Chair man', '../assets/images/branch/d4-1.jpg', NULL),
(12, 'Trần Chi Trung', 'expert', 'Director ', '../assets/images/branch/Ảnh-thẻ-vượng.png', NULL),
(13, 'Nguyễn Ánh', 'expert', 'HCMC Branch Director', '../assets/images/branch/61103071_2361422507447925_6222318223514140672_n_1.jpg', NULL),
(14, 'Vũ Thị Hải', 'expert', 'Chief Finance Officer', '../assets/images/branch/ảnh-thẻ-683x1024.jpg', NULL),
(15, 'Ho N.T Phuong', 'staff', 'Director of Business development', '../assets/images/branch/chup-anh-the-lay-lien-da-nang-14-547x800.jpg', NULL),
(16, 'Tran Phuong Anh', 'staff', 'Chief Finance Officer', '../assets/images/branch/chup-anh-the-o-vinh-3.jpg', NULL),
(17, 'Nguyen Van Dong', 'staff', 'Team leader', '../assets/images/branch/dino-studio-anh-vien-cho-be-va-gia-dinh-317623.jpg', NULL),
(18, 'Ngo Duc Thang', 'staff', 'Senior Architect', '../assets/images/branch/download.jpg', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_username` (`username`);

--
-- Chỉ mục cho bảng `tb_branch`
--
ALTER TABLE `tb_branch`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_account` (`id_account`);

--
-- Chỉ mục cho bảng `tb_news_type`
--
ALTER TABLE `tb_news_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_type_key` (`id`,`name`);

--
-- Chỉ mục cho bảng `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- Chỉ mục cho bảng `tb_project_image`
--
ALTER TABLE `tb_project_image`
  ADD KEY `project_image_key` (`id_project`);

--
-- Chỉ mục cho bảng `tb_project_status`
--
ALTER TABLE `tb_project_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_key` (`id`,`name`);

--
-- Chỉ mục cho bảng `tb_project_type`
--
ALTER TABLE `tb_project_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prj_key` (`id`,`name`);

--
-- Chỉ mục cho bảng `tb_project_type_rel`
--
ALTER TABLE `tb_project_type_rel`
  ADD KEY `project_key` (`id_project`),
  ADD KEY `type_key` (`id_type`);

--
-- Chỉ mục cho bảng `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tb_branch`
--
ALTER TABLE `tb_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tb_news_type`
--
ALTER TABLE `tb_news_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tb_project_status`
--
ALTER TABLE `tb_project_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tb_project_type`
--
ALTER TABLE `tb_project_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_news`
--
ALTER TABLE `tb_news`
  ADD CONSTRAINT `tb_news_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `tb_news_type` (`id`),
  ADD CONSTRAINT `tb_news_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `tb_account` (`id`);

--
-- Các ràng buộc cho bảng `tb_project`
--
ALTER TABLE `tb_project`
  ADD CONSTRAINT `tb_project_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_project_status` (`id`);

--
-- Các ràng buộc cho bảng `tb_project_image`
--
ALTER TABLE `tb_project_image`
  ADD CONSTRAINT `project_image_key` FOREIGN KEY (`id_project`) REFERENCES `tb_project` (`id`);

--
-- Các ràng buộc cho bảng `tb_project_type_rel`
--
ALTER TABLE `tb_project_type_rel`
  ADD CONSTRAINT `project_key` FOREIGN KEY (`id_project`) REFERENCES `tb_project` (`id`),
  ADD CONSTRAINT `type_key` FOREIGN KEY (`id_type`) REFERENCES `tb_project_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
