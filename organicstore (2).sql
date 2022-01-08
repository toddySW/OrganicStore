-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2022 lúc 02:39 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `organicstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_detail`
--

CREATE TABLE `oder_detail` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder_detail`
--

INSERT INTO `oder_detail` (`id`, `order_id`, `product_id`, `price`, `number`) VALUES
(1, '0355751191_1', NULL, NULL, NULL),
(2, '0355751191_2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderID` varchar(50) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `createAt` datetime DEFAULT current_timestamp(),
  `updateAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `orderID`, `amount`, `status`, `userID`, `createAt`, `updateAt`) VALUES
(1, '0355751191_1', NULL, NULL, 355751191, '2022-01-07 09:47:54', '2022-01-07 09:47:54'),
(2, '0355751191_2', NULL, NULL, 355751191, '2022-01-07 09:48:41', '2022-01-07 09:48:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `status`, `quantity`) VALUES
(1, 'mango', '../view/img/product/product-6.jpg', 150, NULL, 3),
(2, 'banana', '../view/img/product/product-2.jpg', 50, NULL, 10),
(3, 'guava fruit', '../view/img/product/product-3.jpg', 20, NULL, 15),
(4, 'grape', '../view/img/product/product-4.jpg', 100, NULL, NULL),
(5, 'watermelon', '../view/img/product/product-7.jpg', 40, NULL, NULL),
(6, 'apple', '../view/img/product/product-8.jpg', 60, NULL, NULL),
(8, 'a', '../view/img/product/product-6.jpg', 10, NULL, NULL),
(9, 'a', '../view/img/product/product-6.jpg', 10, NULL, NULL),
(10, 'b', '../view/img/product/product-6.jpg', 10, NULL, NULL),
(11, 't', '../view/img/product/product-6.jpg', 10, NULL, NULL),
(12, 'e', '../view/img/product/product-6.jpg', 10, NULL, NULL),
(13, 'r', '../view/img/product/product-6.jpg', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userpassword` varchar(45) DEFAULT NULL,
  `bio` varchar(45) DEFAULT NULL,
  `userstatus` tinyint(1) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `userpassword`, `bio`, `userstatus`, `create_at`) VALUES
(63, 'cocaaaaa', 'coca@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'coca', NULL, '2021-12-23 16:27:08'),
(68, 'To Lam Bang Duy', 'toduy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'movue \r\nmusic\r\n', NULL, '2021-12-27 16:19:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PRODUCT_ORDETAIL_FK_idx` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD CONSTRAINT `PRODUCT_ORDETAIL_FK` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
