-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 06:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `address`, `product_title`, `price`, `quantity`, `image`, `Product_id`, `user_id`) VALUES
(152, '2023-12-01 20:12:53', '2023-12-01 20:12:53', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', 'Puma Cotton Bag', '6', '1', '1697951927.png', '10', '79'),
(154, '2023-12-04 23:15:17', '2023-12-04 23:15:17', 'admin', 'admin@gmail.com', '0934034949', 'admin@gmail.com', 'Good vibes only shirt', '15', '1', '1697951691.png', '2', '1'),
(156, '2023-12-09 02:39:44', '2023-12-09 02:39:44', 'user', 'user@gmail.com', '0944480204', '44street', 'Good vibes only shirt', '15', '1', '1697951691.png', '2', '2'),
(157, '2023-12-12 01:50:36', '2023-12-12 01:50:36', 'duc vo', 'vohongduc000@gmail.com', '0911118111', 'San Francisco, CA', 'Good vibes only shirt', '15', '1', '1697951691.png', '2', '79');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'shirt', '2023-10-14 18:20:33', '2023-10-14 18:20:33'),
(2, 'bag', '2023-10-14 18:20:39', '2023-10-14 18:20:39'),
(4, 'book', '2023-10-14 18:20:52', '2023-10-14 18:20:52'),
(5, 'mobile', '2023-10-14 18:20:57', '2023-10-14 18:20:57'),
(6, 'laptop', '2023-10-14 18:24:57', '2023-10-14 18:24:57'),
(8, 'Cà phê', '2024-08-17 21:23:06', '2024-08-17 21:23:06'),
(9, 'Trà', '2024-08-17 21:23:14', '2024-08-17 21:23:14'),
(10, 'Nước Ép', '2024-08-17 21:23:28', '2024-08-17 21:23:28'),
(11, 'Sinh tố', '2024-08-17 21:23:34', '2024-08-17 21:23:34'),
(12, 'Sữa', '2024-08-17 21:23:38', '2024-08-17 21:23:38'),
(13, 'Nước lon', '2024-08-17 21:23:47', '2024-08-17 21:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `rating`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'duc vo', 'test goodvipes', 4, '79', '2', '2023-11-27 05:10:39', '2023-11-27 05:10:39'),
(2, 'duc vo', 'tét goodvipe 2', 3, '79', '2', '2023-11-27 05:10:58', '2023-11-27 05:10:58'),
(3, 'duc vo', 'tét gôdvipe 3', 4, '79', '2', '2023-11-27 05:11:21', '2023-11-27 05:11:21'),
(4, 'duc vo', 'tét 4 gôdvipe', 2, '79', '2', '2023-11-27 05:12:16', '2023-11-27 05:12:16'),
(5, 'duc vo', 'tét 5 gôdvipe', 3, '79', '2', '2023-11-27 05:28:46', '2023-11-27 05:28:46'),
(6, 'duc vo', 'test long shirt', 3, '79', '1', '2023-11-27 05:35:36', '2023-11-27 05:35:36'),
(7, 'user', 'test goodvip6', 5, '2', '2', '2023-11-28 00:02:46', '2023-11-28 00:02:46'),
(8, 'user', 'testgoodvipe 7', 1, '2', '2', '2023-11-28 00:56:46', '2023-11-28 00:56:46'),
(9, 'user', 'test 8 goodvipe', 5, '2', '2', '2023-11-28 00:57:37', '2023-11-28 00:57:37'),
(10, 'user', 'test 9 goodvipe', 1, '2', '2', '2023-11-28 01:10:45', '2023-11-28 01:10:45'),
(11, 'user', 'sản phẩm như bùi', 5, '2', '2', '2023-11-28 01:31:50', '2023-11-28 01:31:50'),
(12, 'duc vo', 'ves ri guts', 5, '79', '2', '2023-11-28 20:35:23', '2023-11-28 20:35:23'),
(13, 'user', 'test 10 goodvipe', 3, '2', '2', '2023-11-28 22:07:56', '2023-11-28 22:07:56'),
(14, 'user', 'test phone 15', 5, '2', '7', '2023-11-29 00:52:44', '2023-11-29 00:52:44'),
(15, 'duc vo', 'test', 3, '79', '2', '2023-12-31 18:51:34', '2023-12-31 18:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_30_025411_create_sessions_table', 1),
(7, '2023_10_02_082707_create_categories_table', 1),
(8, '2023_10_02_122427_create_products_table', 1),
(9, '2023_10_09_094833_create_carts_table', 1),
(10, '2023_10_10_082058_create_orders_table', 1),
(11, '2023_11_15_035718_create_notifications_table', 2),
(12, '2023_11_22_120613_create_comments_table', 2),
(13, '2023_11_22_120623_create_replies_table', 2),
(14, '2023_11_22_140116_create_replies_table', 3),
(15, '2023_11_22_140145_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`) VALUES
(1, '2023-11-04 07:35:13', '2023-11-04 07:35:13', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(2, '2023-11-04 07:35:33', '2023-11-04 07:35:33', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Dell XPS 15 9520', '1', '2799', '1697951806.png', '6', 'cash on delivery', 'processing'),
(3, '2023-11-04 07:35:33', '2023-11-04 07:35:33', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Apple macbook air 13 m1', '2', '1898', '1697951782.png', '5', 'cash on delivery', 'processing'),
(4, '2023-11-04 07:39:18', '2023-11-04 07:39:18', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Apple macbook air 13 m1', '1', '949', '1697951782.png', '5', 'cash on delivery', 'processing'),
(5, '2023-11-20 07:07:54', '2024-01-04 21:04:26', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'You canceled the order'),
(6, '2023-11-20 08:13:17', '2023-11-23 01:17:54', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Long sleeve white shirt', '1', '25', '1697951656.png', '1', 'Paid', 'delivered'),
(7, '2023-11-20 08:13:17', '2023-11-20 08:13:17', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(8, '2023-11-20 08:16:04', '2023-11-20 08:16:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(9, '2023-11-20 08:21:32', '2023-11-20 08:21:32', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(10, '2023-11-20 08:21:48', '2023-11-20 08:21:48', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(11, '2023-11-20 08:26:04', '2023-11-20 22:54:44', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Apple macbook air 13 m1', '1', '949', '1697951782.png', '5', 'cash on delivery', 'You canceled the order'),
(12, '2023-11-20 08:27:28', '2023-11-20 08:27:28', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Lenovo Legion Slim 5(2023)', '1', '1029', '1697951752.png', '4', 'cash on delivery', 'delivered'),
(13, '2023-11-20 23:47:43', '2023-11-20 23:47:43', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(14, '2023-11-20 23:48:32', '2023-11-20 23:48:32', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(15, '2023-11-20 23:49:31', '2023-11-20 23:49:31', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Apple macbook air 13 m1', '2', '1898', '1697951782.png', '5', 'cash on delivery', 'processing'),
(16, '2023-11-20 23:49:31', '2023-11-20 23:49:31', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(17, '2023-11-20 23:50:15', '2023-11-20 23:50:15', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Long sleeve white shirt', '1', '25', '1697951656.png', '1', 'cash on delivery', 'processing'),
(18, '2023-11-20 23:50:15', '2023-11-20 23:50:15', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Lenovo Legion Slim 5(2023)', '2', '2058', '1697951752.png', '4', 'cash on delivery', 'processing'),
(19, '2023-11-27 05:50:45', '2023-11-27 05:50:45', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(20, '2023-11-27 05:51:58', '2023-11-27 05:51:58', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(21, '2023-11-28 20:44:00', '2023-11-28 20:44:00', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(22, '2023-11-28 20:44:00', '2023-11-28 20:44:00', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(23, '2023-11-28 20:44:00', '2023-11-28 20:44:00', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(24, '2023-11-29 00:53:26', '2023-11-29 00:53:26', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'That Time I Got Reincarnated as a Slime vol.1', '1', '5', '1697951986.png', '13', 'cash on delivery', 'processing'),
(25, '2023-11-29 03:02:04', '2023-11-29 03:02:04', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Lenovo Legion Slim 5(2023)', '1', '1029', '1697951752.png', '4', 'cash on delivery', 'processing'),
(26, '2023-11-29 03:02:04', '2023-11-29 03:02:04', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(27, '2023-11-29 03:02:04', '2023-11-29 03:02:04', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(28, '2023-11-29 03:02:04', '2023-11-29 03:02:04', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Lenovo Legion Slim 5(2023)', '1', '1029', '1697951752.png', '4', 'cash on delivery', 'processing'),
(29, '2023-11-29 03:02:04', '2023-11-29 03:02:04', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(30, '2023-11-29 03:02:04', '2023-11-29 03:02:04', 'user', 'user@gmail.com', '0944480204', '44street', '2', 'Apple iphone 15 pro 128GB', '2', '2100', '1697951837.png', '7', 'cash on delivery', 'processing'),
(31, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(32, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Apple iphone 15 pro 128GB', '1', '1050', '1697951837.png', '7', 'cash on delivery', 'processing'),
(33, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Samsung Galaxy S23 5G 128GB', '1', '559', '1697951878.png', '8', 'cash on delivery', 'processing'),
(34, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Bocchi shirt', '1', '35', '1701160952.png', '16', 'cash on delivery', 'processing'),
(35, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(36, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(37, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Good vibes only shirt', '1', '15', '1697951691.png', '2', 'cash on delivery', 'processing'),
(38, '2023-11-29 03:51:04', '2023-11-29 03:51:04', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing'),
(39, '2023-11-29 03:55:45', '2023-11-29 03:55:45', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Bocchi shirt', '1', '35', '1701160952.png', '16', 'cash on delivery', 'processing'),
(40, '2023-11-29 03:55:45', '2024-01-01 18:35:53', 'duc vo', 'vohongduc000@gmail.com', '123', '1231', '79', 'Apple iphone 15 pro 128GB', '10', '10500', '1697951837.png', '7', 'Paid', 'delivered'),
(41, '2023-12-05 00:09:10', '2023-12-05 00:16:49', 'duc vo', 'vohongduc000@gmail.com', '0911118111', 'San Francisco, CA', '79', 'Exercise for Java Programming (include answers)', '1', '0', '1697952047.png', '15', 'Paid', 'delivered'),
(42, '2024-01-01 18:34:25', '2024-01-01 18:34:25', 'duc vo', 'vohongduc000@gmail.com', '0911118111', 'San Francisco, CA', '79', 'Freedom shirt', '1', '56', '1697951726.png', '3', 'cash on delivery', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, 'Cà phê đen (pha máy)', 'Cà phê hạt (hoặc cà phê bột): Arabica, Robusta, hoặc hỗn hợp. Nước lọc. Đường trắng.', '1723955546.jpg', 'Cà phê', '0', '14', NULL, '2023-10-21 22:14:16', '2024-08-17 21:34:39'),
(2, 'Cà phê sữa(pha máy)', 'Cà phê hạt (hoặc cà phê bột): Arabica, Robusta, hoặc hỗn hợp. Nước lọc. Đường trắng. Sữa tươi', '1723955800.jpg', 'Cà phê', '0', '14', NULL, '2023-10-21 22:14:51', '2024-08-17 21:37:02'),
(3, 'Freedom shirt', 'For trumpcons', '1697951726.png', 'shirt', '44', '100', '56', '2023-10-21 22:15:26', '2024-01-01 18:34:25'),
(4, 'Lenovo Legion Slim 5(2023)', 'Ryzen 5 7640HS – RTX 4060', '1697951752.png', 'laptop', '196', '1349', '1029', '2023-10-21 22:15:52', '2023-11-29 03:02:04'),
(5, 'Apple macbook air 13 m1', 'Apple m1 – 8GB ram', '1697951782.png', 'laptop', '148', '999', '949', '2023-10-21 22:16:22', '2023-11-20 23:49:31'),
(6, 'Dell XPS 15 9520', 'i9 12900k – RTX 3050ti', '1697951806.png', 'laptop', '50', '2999', '2799', '2023-10-21 22:16:47', '2023-10-21 22:16:47'),
(7, 'Apple iphone 15 pro 128GB', 'A17 Pro Bionic – 8GB ram', '1697951837.png', 'shirt', '35', '1100', '1050', '2023-10-21 22:17:17', '2023-12-31 19:29:38'),
(8, 'Samsung Galaxy S23 5G 128GB', 'Snapdragon 8 Gen 2 – 8GB ram', '1697951878.png', 'mobile', '299', '599', '559', '2023-10-21 22:17:58', '2023-11-29 03:51:04'),
(9, 'Asus Zenfone 10', 'Snapdragon 8 Gen 2 – 8GB ram', '1697951907.png', 'mobile', '200', '699', NULL, '2023-10-21 22:18:27', '2023-10-21 22:18:27'),
(10, 'Puma Cotton Bag', 'Cotton Bag for College', '1697951927.png', 'bag', '70', '6', NULL, '2023-10-21 22:18:47', '2023-10-21 22:18:47'),
(11, 'Mafia Deep Blue Bag', 'Lightweight bag for Hikers', '1697951947.png', 'bag', '30', '10', '9', '2023-10-21 22:19:07', '2023-10-21 22:19:07'),
(12, 'Japanese Randoseru School Bag', 'Traditional Japanese School Bags', '1697951968.png', 'bag', '90', '100', '89', '2023-10-21 22:19:28', '2023-10-21 22:19:28'),
(13, 'That Time I Got Reincarnated as a Slime vol.1', 'A Fictional story written by Fuse', '1697951986.png', 'book', '59', '5', NULL, '2023-10-21 22:19:46', '2023-11-29 00:53:26'),
(14, 'The Book of Five Rings', 'Authored by the renowned historical figures Miyamoto Mushashi. The Book of Five Rings offers profound insights into the art of confrontation, victory, and leadership.', '1697952012.png', 'book', '60', '5', NULL, '2023-10-21 22:20:12', '2023-10-21 22:20:12'),
(15, 'Exercise for Java Programming (include answers)', '“For the student who wants to make VKU a high-class university of the Central Region.” – Huynh Cong Phap', '1697952047.png', 'book', '999', '0', NULL, '2023-10-21 22:20:47', '2023-12-05 00:09:10'),
(16, 'Bocchi shirt', 'The first public illustration by Aki Hamaji shines! A full-color T-shirt by Hitori Goto, also known as \"Bocchi-chan\"', '1701160952.png', 'shirt', '98', '36', '35', '2023-11-28 01:42:32', '2023-11-29 03:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment_id` varchar(255) DEFAULT NULL,
  `reply` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'duc vo', NULL, 'test reply', '79', '2', '2023-11-22 08:22:59', '2023-11-22 08:22:59'),
(3, 'duc vo', '2', 'test reply 2nd', '79', '2', '2023-11-22 08:24:51', '2023-11-22 08:24:51'),
(4, 'duc vo', '1', 'test reply first test', '79', '2', '2023-11-22 08:25:24', '2023-11-22 08:25:24'),
(5, 'duc vo', '3', 'test reply freedom', '79', '3', '2023-11-22 08:25:54', '2023-11-22 08:25:54'),
(6, 'duc vo', '3', 'test reply 2nd', '79', '3', '2023-11-22 08:30:38', '2023-11-22 08:30:38'),
(7, 'user', '2', 'test user 2nd test comment', '2', '2', '2023-11-22 08:39:24', '2023-11-22 08:39:24'),
(8, 'duc vo', '1', 'tét tét', '79', '2', '2023-11-23 02:42:35', '2023-11-23 02:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wfK23dGmthOV7f7e18E5xJStsTw6nPa04fN4ebdk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDVIb1RTZVFPWmJZWllKZVc2TUZ1UU00Tll2ZmFHWW41VW1IZ2RwSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93X3Byb2R1Y3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1723955822);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `usertype`, `phone`, `address`, `birthday`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1', '0934034949', 'admin@gmail.com', '', 'admin@gmail.com', '2023-11-01 05:31:25', '$2y$10$iXpQiSsdL/J.EDbEMERsiOav.ISTFbbCgG6R52e/TMXtnYSAMWFWO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-14 18:16:27', '2023-10-14 18:16:27'),
(79, 'duc vo', '0', '0911118111', 'San Francisco, CA', '2004-01-05', 'vohongduc000@gmail.com', '2023-11-15 20:34:54', '$2y$10$/4ZfcY9G9lDSU1TucDw.nulWuN9.F/7Sd/cuLkH51Wpv7YAQCZ1fG', NULL, NULL, NULL, NULL, NULL, '79.gif', '2023-11-15 20:30:47', '2023-12-31 18:50:58'),
(82, 'admin', '1', '123123', '16 tho nhi ki', NULL, 'admin1@gmail.com', '2024-07-16 22:42:18', '$2y$10$BMwTKJFO.YA6T7fBxFy5oeLTATNyUmmQin331L3jlWzFstQUSA43m', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-16 22:39:30', '2024-07-16 22:42:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
