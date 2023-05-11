-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 10, 2023 lúc 03:58 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `queue_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `actions`
--

INSERT INTO `actions` (`id`, `name`, `description`, `group`, `created_at`, `updated_at`) VALUES
(1, 'Update người dùng', 'Cập nhật thông tin người dùng vào hệ thống', '1', NULL, NULL),
(2, 'Thêm bệnh nhân', 'Thêm thông tin bệnh nhân mới vào hệ thống', '2', NULL, NULL),
(3, 'Xóa lịch khám', 'Xóa thông tin lịch khám của bệnh nhân', '3', NULL, NULL),
(4, 'Tạo tài khoản', 'Tạo tài khoản mới cho người dùng', '1', NULL, NULL),
(5, 'Xuất báo cáo', 'Xuất báo cáo thống kê về số liệu trong hệ thống', '2', NULL, NULL),
(6, 'Thêm thuốc mới', 'Thêm thông tin thuốc mới vào hệ thống', '3', NULL, NULL),
(7, 'Cập nhật lịch khám', 'Cập nhật thông tin lịch khám của bệnh nhân', '1', NULL, NULL),
(8, 'Xóa bệnh nhân', 'Xóa thông tin bệnh nhân khỏi hệ thống', '2', NULL, NULL),
(9, 'Cập nhật thông tin thuốc', 'Cập nhật thông tin của thuốc trong hệ thống', '3', NULL, NULL),
(10, 'Xem thông tin bệnh nhân', 'Xem thông tin chi tiết về bệnh nhân', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devices`
--

CREATE TABLE `devices` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_ids` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `devices`
--

INSERT INTO `devices` (`id`, `name`, `username`, `password`, `ip`, `service_ids`, `type`, `online`, `created_at`, `updated_at`) VALUES
('tb01', 'thiết bị 01', 'tb01', 'tb01', '127.0.0.1', 'dv2,', 'Display counter', 1, '2023-05-10 00:49:29', '2023-05-10 01:19:08'),
('tb02', 'thiết bị test', 'tb02', 'tb02', '127.0.0.1', 'dv1,dv2,', 'Kiosk', 1, '2023-05-10 00:51:23', '2023-05-10 00:51:23'),
('tb03', 'Thiết bị trợ giúp người cao tuổi', 'tb03', 'tb03', '127.0.0.1', 'dv1,dv3,', 'Display counter', 1, '2023-05-10 15:32:18', '2023-05-10 15:32:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_users`
--

CREATE TABLE `history_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_users`
--

INSERT INTO `history_users` (`id`, `user_id`, `ip`, `action`, `created_at`, `updated_at`) VALUES
(2, 1, '127.0.0.1', 'Đăng nhập vào hệ thống', '2023-05-10 15:26:20', '2023-05-10 15:26:20'),
(3, 1, '127.0.0.1', 'Đăng xuất khỏi hệ thống', '2023-05-10 15:30:02', '2023-05-10 15:30:02'),
(4, 2, '127.0.0.1', 'Đăng nhập vào hệ thống', '2023-05-10 15:30:08', '2023-05-10 15:30:08'),
(5, 2, '127.0.0.1', 'Thêm mới dịch vụ dv3', '2023-05-10 15:30:53', '2023-05-10 15:30:53'),
(6, 2, '127.0.0.1', 'Cập nhật thông tin dịch vụ dv1', '2023-05-10 15:31:11', '2023-05-10 15:31:11'),
(7, 2, '127.0.0.1', 'Cập nhật thông tin dịch vụ dv2', '2023-05-10 15:31:35', '2023-05-10 15:31:35'),
(8, 2, '127.0.0.1', 'Thêm mới thiết bị tb03', '2023-05-10 15:32:18', '2023-05-10 15:32:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_05_05_050027_create_roles_table', 1),
(3, '2023_05_05_065640_create_users_table', 1),
(4, '2023_05_05_070011_create_tokens_table', 1),
(5, '2023_05_05_070155_create_actions_table', 1),
(6, '2023_05_05_070214_create_history_users_table', 1),
(11, '2023_05_05_070254_create_services_table', 2),
(12, '2023_05_05_070242_create_devices_table', 3),
(16, '2023_05_05_070402_create_tickets_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `action_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `action_ids`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'mô tả admin', '1,4,7,10,2,5,8,3,6,9', 1, '2023-05-08 01:23:31', '2023-05-08 01:23:31'),
(2, 'Giám đốc bệnh viện', 'Giám đốc', '1,4,7,10,5,6,9', 1, '2023-05-08 01:25:09', '2023-05-08 01:25:09'),
(3, 'Nhân Viên Hướng dẫn', 'Nhân Viên Hướng dẫn', '1,4,7,10,2,8', 1, '2023-05-08 02:27:46', '2023-05-08 02:49:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `prefix` int(11) NOT NULL,
  `suffix` int(11) NOT NULL,
  `reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `active`, `prefix`, `suffix`, `reset`, `created_at`, `updated_at`) VALUES
('dv1', 'khám theo yêu cầu', 'khám tổng quát từ a-z', 1, 1, 100, 1, '2023-05-08 09:05:30', '2023-05-10 15:31:11'),
('dv2', 'khám da liễu', 'khám nha khoa', 1, 2, 888, 0, '2023-05-08 09:06:21', '2023-05-10 15:31:35'),
('dv3', 'Khám theo bảo hiểm', 'Khám theo bảo hiểm dịch vụ giá rẻ', 1, 1, 9999, 1, '2023-05-10 15:30:53', '2023-05-10 15:30:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stt` int(11) NOT NULL,
  `name_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_at` timestamp NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `device_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tickets`
--

INSERT INTO `tickets` (`id`, `stt`, `name_user`, `phone`, `email`, `expires_at`, `status`, `device_id`, `service_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'Trần Bình Dương', '0987654321', NULL, '2023-05-10 11:00:00', 0, 'tb02', 'dv1', '2023-05-10 02:37:32', '2023-05-10 02:37:32'),
(3, 2, 'Phạm Tiến Thành Công', '0935281926', NULL, '2023-05-10 11:00:00', 0, 'tb02', 'dv1', '2023-05-10 02:44:54', '2023-05-10 02:44:54'),
(4, 3, 'Phạm Tiến Thành Công', '0987654321', NULL, '2023-05-10 11:00:00', 0, 'tb02', 'dv2', '2023-05-10 09:51:48', '2023-05-10 09:51:48'),
(5, 1, 'Phạm Tiến Thành Công', '0935281926', NULL, '2023-05-10 11:00:00', 0, 'tb01', 'dv2', '2023-05-10 09:52:03', '2023-05-10 09:52:03'),
(6, 4, 'Nguyễn Thị Lan', '09327354312', NULL, '2023-05-10 11:00:00', 1, 'tb02', 'dv1', '2023-05-10 10:12:04', '2023-05-10 10:12:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `phone`, `email`, `password`, `image`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trần Bình Dương', 'tranduong123', '0987654321', 'duong@gmail.com', '123456', 'default.png', 1, 1, '2023-05-08 03:38:08', '2023-05-08 03:58:26'),
(2, 'Phạm Thành Công', 'cong', '09326438221', 'cong@gmail.com', '123456', 'default.png', 3, 1, '2023-05-08 03:47:14', '2023-05-08 03:47:14');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_users`
--
ALTER TABLE `history_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_device_id_foreign` (`device_id`),
  ADD KEY `tickets_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokens_token_unique` (`token`),
  ADD KEY `tokens_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `history_users`
--
ALTER TABLE `history_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `history_users`
--
ALTER TABLE `history_users`
  ADD CONSTRAINT `history_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
