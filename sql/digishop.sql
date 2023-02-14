-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2022 lúc 09:56 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `digishop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `BRANCH_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `HOTLINE` varchar(15) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `BRAND_ID` int(11) NOT NULL,
  `BRAND_NAME` varchar(50) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`BRAND_ID`, `BRAND_NAME`, `COUNTRY`, `CREATE_AT`, `UPDATE_AT`) VALUES
(1, 'Samsung', 'KR', '2022-12-29 01:24:09', NULL),
(2, 'NOKIA', 'PL', '2022-12-29 03:52:16', NULL),
(3, 'APPLE', 'USA', '2022-12-29 03:55:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `CATEGORY_CODE` int(11) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `NAME`, `DESCRIPTION`, `CATEGORY_CODE`, `CREATE_AT`, `UPDATE_AT`) VALUES
(1, 'PHONE', 'Dien Thoai', 1000, '2022-12-29 01:25:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `description`
--

CREATE TABLE `description` (
  `DESCRIPTION_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `SUMMARY` varchar(500) DEFAULT NULL,
  `CONTENT` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FNAME` varchar(20) DEFAULT NULL,
  `MNAME` varchar(20) DEFAULT NULL,
  `LNAME` varchar(20) DEFAULT NULL,
  `BOD` datetime DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `GALERY_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `THUMBNAIL` varchar(500) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_product`
--

CREATE TABLE `list_product` (
  `LIST_PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `BRANCH_ID` int(11) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logins`
--

CREATE TABLE `logins` (
  `LOGINS_ID` int(11) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `POSITION` varchar(30) NOT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `platform`
--

CREATE TABLE `platform` (
  `OS_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `platform`
--

INSERT INTO `platform` (`OS_ID`, `NAME`, `CREATE_AT`, `UPDATE_AT`) VALUES
(1, 'Andoird', '2022-12-29 01:26:56', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `OS_ID` int(11) DEFAULT NULL,
  `CPU_BRAND` varchar(50) DEFAULT NULL,
  `CPU_NAME` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `SCREEN_TYPE` varchar(50) DEFAULT NULL,
  `SCREEN_SIZE` varchar(50) DEFAULT NULL,
  `BATTERY` varchar(50) DEFAULT NULL,
  `CAMERA` varchar(50) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `DISCOUNT` int(11) DEFAULT NULL,
  `CREATE_AT` datetime DEFAULT NULL,
  `UPDATE_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `NAME`, `CATEGORY_ID`, `OS_ID`, `CPU_BRAND`, `CPU_NAME`, `RAM`, `SCREEN_TYPE`, `SCREEN_SIZE`, `BATTERY`, `CAMERA`, `PRICE`, `DISCOUNT`, `CREATE_AT`, `UPDATE_AT`) VALUES
(1, 'Sam sung Galaxy Z Flip4', 1, 1, 'Snapdragon', '880', '8 GB', 'Amoled', '6.8 INCH', '5000 mA', '24 MP', 23900000, 5, '0000-00-00 00:00:00', NULL),
(2, 'Sam sung Galaxy Z Flip4', 1, 1, 'Snapdragon', '880', '8 GB', 'Amoled', '6.8 INCH', '5000 mA', '24 MP', 23900000, 5, '2022-12-29 01:30:45', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BRANCH_ID`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BRAND_ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Chỉ mục cho bảng `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`DESCRIPTION_ID`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`GALERY_ID`);

--
-- Chỉ mục cho bảng `list_product`
--
ALTER TABLE `list_product`
  ADD PRIMARY KEY (`LIST_PRODUCT_ID`);

--
-- Chỉ mục cho bảng `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`LOGINS_ID`);

--
-- Chỉ mục cho bảng `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`OS_ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `BRAND_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `description`
--
ALTER TABLE `description`
  MODIFY `DESCRIPTION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `GALERY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_product`
--
ALTER TABLE `list_product`
  MODIFY `LIST_PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `logins`
--
ALTER TABLE `logins`
  MODIFY `LOGINS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `platform`
--
ALTER TABLE `platform`
  MODIFY `OS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
