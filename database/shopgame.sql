-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2023 lúc 03:42 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 1, 3, '2023-07-18 06:35:18', '2023-07-18 06:35:18'),
(10, 1, 1, '2023-07-29 06:10:22', '2023-07-29 06:10:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(8,2) NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_product`
--

INSERT INTO `cart_product` (`id`, `quantity`, `price`, `cart_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 2, 65.00, 9, 10, '2023-07-18 06:35:18', '2023-07-18 06:35:26'),
(7, 1, 1.00, 10, 9, '2023-07-29 06:24:39', '2023-07-29 06:24:39'),
(9, 1, 1.00, 10, 6, '2023-07-30 05:38:14', '2023-07-30 05:38:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RPG', 'game', '2023-07-11 17:49:19', '2023-07-11 17:49:19'),
(2, 'Action', 'Games that emphasize physical challenges, reflexes, and hand-eye coordination, often involving combat or intense gameplay', '2023-07-11 19:48:23', '2023-07-11 19:48:23'),
(3, 'Adventure', 'Games that involve exploration, puzzle-solving, and narrative-driven experiences', '2023-07-11 19:48:46', '2023-07-11 19:48:46'),
(4, 'Sports', 'Games that simulate or involve various sports activities, including team sports, individual sports, and racing', '2023-07-11 19:49:07', '2023-07-11 19:49:07'),
(5, 'Puzzle', 'Games that challenge players\' problem-solving skills and logical thinking through puzzles or brainteasers', '2023-07-11 19:49:22', '2023-07-11 19:49:22'),
(6, 'Platformer', 'Games that involve controlling a character to navigate platforms, obstacles, and enemies, often in a side-scrolling environment', '2023-07-11 19:49:37', '2023-07-11 19:49:37'),
(7, 'Simulation', 'Games that simulate real-world or fictional activities, such as driving, flying, building cities, managing businesses, or controlling virtual lives', '2023-07-11 19:49:53', '2023-07-11 19:49:53'),
(8, 'Fighting', 'Games that focus on one-on-one or multiplayer combat, usually involving martial arts, special moves, and combos', '2023-07-11 19:50:09', '2023-07-11 19:50:09'),
(9, 'FPS', 'Games that simulate combat from the perspective of the player character, often involving firearms and fast-paced action', '2023-07-11 19:50:30', '2023-07-11 19:50:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 5, 1, NULL, NULL),
(6, 6, 4, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 7, 3, NULL, NULL),
(9, 7, 8, NULL, NULL),
(10, 8, 2, NULL, NULL),
(11, 8, 8, NULL, NULL),
(12, 9, 2, NULL, NULL),
(13, 9, 6, NULL, NULL),
(14, 9, 7, NULL, NULL),
(15, 9, 8, NULL, NULL),
(16, 10, 1, NULL, NULL),
(17, 10, 2, NULL, NULL),
(18, 10, 3, NULL, NULL),
(19, 10, 8, NULL, NULL),
(23, 12, 1, NULL, NULL),
(24, 12, 2, NULL, NULL),
(25, 12, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(13, '1689123329_assassins-creed-1280x720-11786.jpeg', 5, '2023-07-11 17:55:29', '2023-07-11 17:55:29'),
(14, '1689123329_assassins-creed-1280x720-11788.jpeg', 5, '2023-07-11 17:55:29', '2023-07-11 17:55:29'),
(15, '1689123329_assassins-creed-1280x720-11785.jpeg', 5, '2023-07-11 17:55:29', '2023-07-11 17:55:29'),
(16, '1689123329_assassins-creed-1280x720-11790.jpeg', 5, '2023-07-11 17:55:29', '2023-07-11 17:55:29'),
(17, '1689132808_cristiano-ronaldo-1280x720-9595.jpg', 6, '2023-07-11 20:33:28', '2023-07-11 20:33:28'),
(18, '1689132808_fifa-23-paris-saint-germain-kylian-mbappe-french-footballer-1280x720-8720.jpg', 6, '2023-07-11 20:33:28', '2023-07-11 20:33:28'),
(19, '1689132808_trent-alexander-arnold-fifa-22-pc-games-footballer-1280x720-6016.jpg', 6, '2023-07-11 20:33:28', '2023-07-11 20:33:28'),
(20, '1689132866_avatar-frontiers-of-1280x720-11752.jpg', 7, '2023-07-11 20:34:26', '2023-07-11 20:34:26'),
(21, '1689132866_avatar-frontiers-of-1280x720-11765.jpeg', 7, '2023-07-11 20:34:26', '2023-07-11 20:34:26'),
(22, '1689132866_avatar-frontiers-of-1280x720-11772.jpg', 7, '2023-07-11 20:34:26', '2023-07-11 20:34:26'),
(23, '1689132940_marvels-guardians-of-the-galaxy-peter-quill-star-lord-2021-1280x720-6576.jpg', 8, '2023-07-11 20:35:40', '2023-07-11 20:35:40'),
(24, '1689132940_star-lord-marvels-1280x720-11779.jpeg', 8, '2023-07-11 20:35:40', '2023-07-11 20:35:40'),
(25, '1689132940_star-lord-marvels-guardians-of-the-galaxy-pc-games-1280x720-7697.jpg', 8, '2023-07-11 20:35:40', '2023-07-11 20:35:40'),
(26, '1689133021_marvels-spider-man-1280x720-9849.jpg', 9, '2023-07-11 20:37:01', '2023-07-11 20:37:01'),
(27, '1689133021_marvels-spider-man-1280x720-11808.jpeg', 9, '2023-07-11 20:37:01', '2023-07-11 20:37:01'),
(28, '1689133021_marvels-spider-man-1280x720-11811.jpeg', 9, '2023-07-11 20:37:01', '2023-07-11 20:37:01'),
(29, '1689133161_clive-rosfield-1280x720-9681.jpg', 10, '2023-07-11 20:39:21', '2023-07-11 20:39:21'),
(30, '1689133161_clive-rosfield-1280x720-11299.jpg', 10, '2023-07-11 20:39:21', '2023-07-11 20:39:21'),
(31, '1689133161_final-fantasy-xvi-1280x720-11304.jpg', 10, '2023-07-11 20:39:21', '2023-07-11 20:39:21'),
(35, '1690366427_avatar-frontiers-of-1280x720-11752.jpg', 12, '2023-07-26 03:13:47', '2023-07-26 03:13:47'),
(36, '1690366427_avatar-frontiers-of-1280x720-11765.jpeg', 12, '2023-07-26 03:13:47', '2023-07-26 03:13:47'),
(37, '1690366427_avatar-frontiers-of-1280x720-11772.jpg', 12, '2023-07-26 03:13:47', '2023-07-26 03:13:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '2023_06_14_114047_create_role_table', 1),
(33, '2014_10_12_000000_create_users_table', 2),
(34, '2023_06_14_114308_create_publisher_table', 3),
(35, '2023_06_13_181112_create_news_table_product', 4),
(36, '2023_06_13_180950_create_news_table_category', 5),
(37, '2023_06_14_114331_create_category_product_table', 6),
(38, '2023_06_14_114118_create_cart_table', 7),
(39, '2023_06_14_114157_create_cart_product_table', 8),
(40, '2023_06_14_113849_create_image_table', 9),
(41, '2023_06_14_114130_create_order_table', 10),
(42, '2023_06_14_114149_create_order_product_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--
-- Error reading structure for table shopgame.password_resets: #1932 - Table 'shopgame.password_resets' doesn't exist in engine
-- Error reading data for table shopgame.password_resets: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `shopgame`.`password_resets`' at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(22,2) DEFAULT 0.00,
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `publisher_id`, `created_at`, `updated_at`) VALUES
(5, 'assassin creed', 'daaaa', 60.00, 1, '2023-07-11 17:55:29', '2023-07-11 17:55:29'),
(6, 'FIFA', 'game football', 60.00, 2, '2023-07-11 20:33:28', '2023-07-11 20:33:28'),
(7, 'Avarta', 'gameaaa', 60.00, 4, '2023-07-11 20:34:26', '2023-07-11 20:34:26'),
(8, 'star lord', 'game marvel', 60.00, 4, '2023-07-11 20:35:40', '2023-07-11 20:35:40'),
(9, 'spider-man', 'game marvel', 34.00, 4, '2023-07-11 20:37:01', '2023-07-11 20:37:01'),
(10, 'final fantasy 16', 'dffas', 65.00, 4, '2023-07-11 20:39:21', '2023-07-11 20:39:21'),
(12, 'game2', 'new product', 12.00, 2, '2023-07-26 03:13:47', '2023-07-26 03:13:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Ubsoft', 'usa', '2023-07-11 17:49:33', '2023-07-11 17:49:33'),
(2, 'EA', 'USA', '2023-07-11 20:16:56', '2023-07-11 20:16:56'),
(3, 'Microsoft', 'usa', '2023-07-11 20:17:43', '2023-07-11 20:17:43'),
(4, 'Sony', 'japan', '2023-07-11 20:18:00', '2023-07-11 20:18:00'),
(5, 'Nintendo', 'japan', '2023-07-11 20:18:14', '2023-07-11 20:18:14'),
(6, 'Netease', 'china', '2023-07-11 20:18:31', '2023-07-11 20:18:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Seller', NULL, NULL),
(2, 'Customer', NULL, NULL),
(3, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `numberphone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `country`, `numberphone`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'HN', 1234567889, 'datbv2003@gmail.com', NULL, '$2y$10$aLVfUP4c4ROpkFeeur0xtuiE9GRrP3RxPnf4BJ2CRcWx6I0uMzB7S', 3, NULL, NULL, '2023-07-29 07:06:36'),
(3, 'ledat23', 'hn', 123456789, 'user1@gmail.com', NULL, '$2y$10$uosb2m5H.BsJzpRhhbygnO/j4kMGc48smCS3aGY2PffIyTaDiGZme', 2, NULL, NULL, NULL),
(5, 'admin2', 'HN', 123456789, 'email3@gmail.com', NULL, '$2y$10$3YeaSTHawmQ88Y/bCozv1u.Mxnif4AyTswkGemN.MpYqwA7QR4jcG', 1, NULL, NULL, NULL),
(6, 'game3', 'HN', 1234567889, 'user2@gmail.com', NULL, '$2y$10$7.chaYgo1FNR8JBI7ZpFku.JUxWpwfjDGd7l0SexdIer/D6KGyIsO', 2, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_product_id_foreign` (`product_id`),
  ADD KEY `cart_product_cart_id_foreign` (`cart_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_publisher_id_foreign` (`publisher_id`);

--
-- Chỉ mục cho bảng `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
