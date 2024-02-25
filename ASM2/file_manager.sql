-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 25, 2024 lúc 12:22 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `file_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `download_count` int(11) DEFAULT 0,
  `is_recycle` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_extension`, `file_path`, `file_size`, `created_at`, `updated_at`, `download_count`, `is_recycle`, `user_id`) VALUES
(16, 'PHP2 Tổng hợp các bài lab cho thêm.docx', '', '', 96935, '2024-02-22 04:30:33', '2024-02-22 04:30:33', 0, 0, NULL),
(46, 'Doc2.docx', '', '', 26521, '2024-02-24 22:10:42', '2024-02-25 00:15:27', 0, 0, 1),
(50, 'file_manager.png', '', '', 24097, '2024-02-24 22:22:06', '2024-02-24 22:22:06', 0, 1, 1),
(52, 'Kythuatso.docx', '', '', 688511, '2024-02-25 01:44:02', '2024-02-25 01:44:02', 0, 0, 1),
(53, 'vinhlhpc06526_ASM2.txt', '', '', 160, '2024-02-25 01:44:13', '2024-02-25 01:44:13', 0, 0, 1),
(54, 'vinhlhpc06526_Lab_3.rar', '', '', 21794, '2024-02-25 01:44:24', '2024-02-25 01:44:24', 0, 0, 1),
(56, '.sql', '', '', 9285, '2024-02-25 01:54:54', '2024-02-25 01:55:25', 1, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `gender` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `phone`, `role`, `gender`, `email`, `created_at`) VALUES
(1, 'Lê Hùng Vĩnh', 'vinhlh', '24e7416c1bede29fd4810d748104266c', '0789656877', 'user', 0, 'vinh123@gmail.com', '2024-02-01 02:07:51'),
(2, '', 'admin', 'admin123', '', 'user', 0, 'admin@gmail.com', '2024-02-02 15:12:01'),
(3, '', 'vinhvinh', 'vinhvinh123', '', 'user', 0, 'vinhvinh@gmail.com', '2024-02-02 15:13:01'),
(4, '', 'khanh', 'khanh123@', '', 'user', 0, 'khanh123@gmail.com', '2024-02-02 16:52:04'),
(5, '', 'vinh', 'thanh@123', '', 'user', 0, 'lehungvinh210621@gmail.com', '2024-02-02 16:58:10'),
(6, '', 'vinh', 'vinh123@', '', 'user', 0, 'abc@gmail.com', '2024-02-02 17:35:37'),
(7, '', 'hoane', '86ee334f95a8ae3c0f885284f7bd3985', '', 'user', 0, 'hoa123@gmail.com', '2024-02-04 22:34:37'),
(8, '', 'vinh123', '24e7416c1bede29fd4810d748104266c', '', 'user', 0, 'lehungvinh@gmail.com', '2024-02-21 10:25:27'),
(9, '', 'vinh1234', '24e7416c1bede29fd4810d748104266c', '', 'user', 0, 'lehungvinh1234@gmail.com', '2024-02-25 08:53:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
