-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 05:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jersey_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@admin.com|127.0.0.1', 'i:1;', 1766078618),
('laravel-cache-admin@admin.com|127.0.0.1:timer', 'i:1766078618;', 1766078618),
('laravel-cache-arifur@gmail.com|127.0.0.1', 'i:2;', 1766075652),
('laravel-cache-arifur@gmail.com|127.0.0.1:timer', 'i:1766075652;', 1766075652),
('laravel-cache-sifat@email.com|127.0.0.1', 'i:1;', 1765990295),
('laravel-cache-sifat@email.com|127.0.0.1:timer', 'i:1765990295;', 1765990295);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Football Club Jersey', 'football-club-jersey', 'High-quality club jersey featuring a modern fit, durable stitching, and sweat-absorbing material for maximum comfort.', NULL, 1, '2025-12-09 02:58:04', '2025-12-17 10:34:43'),
(2, 'National team Jursey', 'national-team-jursey', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily. Perfect for match days, casual wear, training, or gifting to a true football/cricket fan.', NULL, 1, '2025-12-11 00:55:12', '2025-12-18 09:51:04'),
(3, 'Cricket Jersey', 'cricket-jersey', 'The Cricket jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', NULL, 1, '2025-12-17 10:42:25', '2025-12-17 10:42:25'),
(4, 'Customized Jersey', 'customized-jersey', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', NULL, 1, '2025-12-17 10:42:45', '2025-12-17 10:42:45');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_09_050213_create_categories_table', 1),
(5, '2025_12_09_050214_create_products_table', 1),
(6, '2025_12_09_050215_create_orders_table', 1),
(7, '2025_12_09_050332_create_order_items_table', 1),
(8, '2025_12_09_080151_add_role_to_users_table', 1),
(9, '2025_12_09_095546_create_carts_table', 2),
(10, '2025_12_10_061816_create_orders_table', 3),
(11, '2025_12_10_061841_create_order_items_table', 3),
(12, '2025_12_10_064059_add_transaction_id_to_orders_table', 4),
(13, '2025_12_12_060005_create_product_images_table', 5),
(14, '2025_12_14_045521_create_product_sizes_table', 6),
(15, '2025_12_14_050158_add_size_to_order_items_table', 7),
(16, '2025_12_14_050632_add_size_to_carts_table', 8),
(17, '2025_12_15_100620_create_settings_table', 9),
(18, '2025_12_15_100822_add_note_to_orders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `total_amount`, `status`, `customer_name`, `customer_email`, `customer_phone`, `shipping_address`, `transaction_id`, `note`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 2, 'ORD-1765348517', 3200.00, 'pending', 'Sifat', 'sifat@gmail.com', '01404881212', 'Chunkutia', NULL, NULL, NULL, '2025-12-10 00:35:17', '2025-12-10 00:35:17'),
(2, 2, 'ORD-1765349769', 1600.00, 'completed', 'Sifat islam', 'sifat@gmail.com', '01404881212', 'Kolabagan,Dhaka', 'ghghghghghg42', NULL, 'bkash', '2025-12-10 00:56:09', '2025-12-10 11:16:48'),
(3, 2, 'ORD-1765604005', 990.00, 'completed', 'Sifat', 'sifat@gmail.com', '01404881212', 'Chunkutiagg', 'grfgdgdgfrh', NULL, 'bkash', '2025-12-12 23:33:25', '2025-12-12 23:34:08'),
(4, 2, 'ORD-1765689418', 990.00, 'pending', 'Sifat', 'sifat@gmail.com', '01516564849', 'Narayonganj', 'sdasdwdwdw', NULL, 'bkash', '2025-12-13 23:16:58', '2025-12-13 23:16:58'),
(5, 2, 'ORD-1765711229', 1500.00, 'completed', 'Sifat', 'sifat@gmail.com', '01516564849', 'Narayonganj', 'sdasdwdwdw', NULL, 'bkash', '2025-12-14 05:20:29', '2025-12-14 05:22:07'),
(6, 2, 'ORD-1765731659', 2970.00, 'pending', 'Messi', 'sifat@gmail.com', '017886564847', 'Dhaka', 'sdasdwdwdw', NULL, 'bkash', '2025-12-14 11:00:59', '2025-12-14 11:00:59'),
(7, 2, 'ORD-1765961441', 3600.00, 'pending', 'Ripon', 'ripon@gmail.com', '01404881212', 'Kolabagan,Dhaka', 'kkukuhjhjh8585', 'quick', 'bkash', '2025-12-17 02:50:41', '2025-12-17 02:50:41'),
(8, 2, 'ORD-1765961465', 100.00, 'completed', 'Ripon', 'ripon@gmail.com', '01404881212', 'Kolabagan,Dhaka', 'kkukuhjhjh8585', 'quick', 'bkash', '2025-12-17 02:51:05', '2025-12-17 02:52:12'),
(9, 2, 'ORD-1765992026', 3000.00, 'completed', 'Faruk', 'faruk@gmail.com', '01554881212', 'Khulna', '252dfdgrgrh', 'all size 2 p', 'rocket', '2025-12-17 11:20:26', '2025-12-17 11:21:12'),
(10, 2, 'ORD-1766000280', 1300.00, 'pending', 'Mustafiz', 'mustafiz@gmail.com', '01304881299', 'Chittagong', 'zaghghssghg42', 'xl size', 'nagad', '2025-12-17 13:38:00', '2025-12-17 13:38:00'),
(11, 2, 'ORD-1766001207', 600.00, 'pending', 'Sifat', 'sifat@gmail.com', '01404881212', 'fgfg', 'hghhjuyjtrht', 'fgfgf', 'rocket', '2025-12-17 13:53:27', '2025-12-17 13:53:27'),
(12, 2, 'ORD-1766001277', 100.00, 'completed', 'Sifat', 'bangla8844@gmail.com', '01404881212', 'fgfg', 'hghhjuyjtrht', 'fgfgf', 'rocket', '2025-12-17 13:54:37', '2025-12-17 13:56:05'),
(13, 2, 'ORD-1766002647', 2500.00, 'pending', 'Sifat', 'sifat@gmail.com', '01404881212', 'Chunkutia', 'COD-1766002623410', 'ddgdfgf', 'cod', '2025-12-17 14:17:27', '2025-12-17 14:17:27'),
(14, 2, 'ORD-1766041938', 2200.00, 'pending', 'Sifat', 'sifat@gmail.com', '01404881212', 'Rajshahi', 'COD-1766041933105', 'ggng', 'cod', '2025-12-18 01:12:18', '2025-12-18 01:12:18'),
(15, 3, 'ORD-1766075806', 1900.00, 'completed', 'Messi', 'messi@gmail.com', '01404881212', 'Comilla', 'nghnjg454151bf', 'Give player version', 'bkash', '2025-12-18 10:36:46', '2025-12-18 10:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `size`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 2, NULL, 1, 990.00, '2025-12-12 23:33:25', '2025-12-12 23:33:25'),
(4, 4, 2, NULL, 1, 990.00, '2025-12-13 23:16:58', '2025-12-13 23:16:58'),
(5, 5, 7, 'M', 1, 1500.00, '2025-12-14 05:20:29', '2025-12-14 05:20:29'),
(6, 6, 2, NULL, 3, 990.00, '2025-12-14 11:00:59', '2025-12-14 11:00:59'),
(7, 7, 4, NULL, 2, 1500.00, '2025-12-17 02:50:41', '2025-12-17 02:50:41'),
(8, 7, 3, NULL, 1, 500.00, '2025-12-17 02:50:41', '2025-12-17 02:50:41'),
(9, 9, 13, NULL, 1, 600.00, '2025-12-17 11:20:26', '2025-12-17 11:20:26'),
(10, 9, 14, NULL, 1, 500.00, '2025-12-17 11:20:26', '2025-12-17 11:20:26'),
(11, 9, 3, NULL, 2, 900.00, '2025-12-17 11:20:26', '2025-12-17 11:20:26'),
(12, 10, 13, NULL, 2, 600.00, '2025-12-17 13:38:00', '2025-12-17 13:38:00'),
(13, 11, 14, NULL, 1, 500.00, '2025-12-17 13:53:27', '2025-12-17 13:53:27'),
(14, 13, 4, NULL, 1, 1200.00, '2025-12-17 14:17:27', '2025-12-17 14:17:27'),
(15, 13, 8, NULL, 1, 1200.00, '2025-12-17 14:17:27', '2025-12-17 14:17:27'),
(16, 14, 10, NULL, 1, 1200.00, '2025-12-18 01:12:18', '2025-12-18 01:12:18'),
(17, 14, 9, NULL, 1, 900.00, '2025-12-18 01:12:18', '2025-12-18 01:12:18'),
(18, 15, 4, NULL, 1, 1200.00, '2025-12-18 10:36:46', '2025-12-18 10:36:46'),
(19, 15, 13, NULL, 1, 600.00, '2025-12-18 10:36:46', '2025-12-18 10:36:46');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `size` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `discount_price`, `image`, `stock`, `size`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 2, 'Bangladesh', 'bangladesh', 'Home jersey and away jersey', 1200.00, 990.00, '1765989703.jpg', 47, 'M,L,XL', 1, '2025-12-10 11:29:23', '2025-12-17 10:41:43'),
(3, 2, 'Portugal', 'portugal', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', 1200.00, 900.00, '1765989437.jpg', 97, 'M,L,XL', 1, '2025-12-13 23:28:10', '2025-12-17 11:20:26'),
(4, 1, 'Barcelona', 'barcelona', 'Home', 1500.00, 1200.00, '1765989346.jpg', 96, 'S,M,L,XL', 1, '2025-12-14 05:00:29', '2025-12-18 10:36:46'),
(7, 1, 'Arsenal', 'arsenal', 'Home', 1500.00, NULL, '1765710744.jpg', 100, 'S,M,L,XL', 1, '2025-12-14 05:12:24', '2025-12-17 10:47:04'),
(8, 2, 'Argentina', 'argentina', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', 1500.00, 1200.00, '1765989526.jpg', 46, 'M,L,XL', 1, '2025-12-17 10:38:46', '2025-12-17 14:17:27'),
(9, 2, 'Germany', 'germany', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', 1500.00, 900.00, '1765989598.jpg', 46, 'M,L,XL', 1, '2025-12-17 10:39:58', '2025-12-18 01:12:18'),
(10, 1, 'Real Madrid', 'real-madrid', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', 1500.00, 1200.00, '1765989641.jpg', 46, 'M,L,XL', 1, '2025-12-17 10:40:41', '2025-12-18 01:12:18'),
(13, 3, 'Bangladesh Cricket', 'bangladesh-cricket', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', 800.00, 600.00, '1765990207.jpg', 996, NULL, 1, '2025-12-17 10:50:07', '2025-12-18 10:36:46'),
(14, 4, 'Customized Jersey 1', 'customized-jersey-1', 'The jersey features a modern athletic fit, vibrant team colors, and long-lasting prints that don’t fade easily.', 700.00, 500.00, '1765990396.jpg', 98, 'M,L,XL', 1, '2025-12-17 10:53:16', '2025-12-17 13:53:27'),
(15, 1, 'Chelsea', 'chelsea', 'Home jersey', 1200.00, 500.00, '1766158697.jpg', 100, 'M,L,XL', 1, '2025-12-19 09:38:17', '2025-12-19 09:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 8, '1765989526_6942dc9657572.jpg', '2025-12-17 10:38:46', '2025-12-17 10:38:46'),
(3, 13, '1765990207_6942df3ff4212.jpg', '2025-12-17 10:50:08', '2025-12-17 10:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price_adjustment` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size`, `stock`, `price_adjustment`, `created_at`, `updated_at`) VALUES
(3, 7, 'M', 19, 0.00, '2025-12-17 10:47:04', '2025-12-17 10:47:04'),
(4, 7, 'L', 40, 0.00, '2025-12-17 10:47:04', '2025-12-17 10:47:04');

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

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'shipping_charge', '100', '2025-12-17 01:11:45', '2025-12-17 01:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$iiYcgYax5NAoxYcsNkeDDu4M1YwPZxImPowWS46JWeZGlHwZdh0ba', NULL, '2025-12-09 02:24:20', '2025-12-09 02:24:20'),
(2, 'Sifat', 'sifat@gmail.com', 'customer', NULL, '$2y$12$IVyWt7ysxiQ0abF5Ep93cuIcJB4xvKiv8q0q/jSpQ4/ujL9f/gG.C', NULL, '2025-12-09 09:35:02', '2025-12-09 09:35:02'),
(3, 'Messi', 'messi@gmail.com', 'customer', NULL, '$2y$12$TIzAWn3I.w2vLKi3/JCs4.Ijfw78mbJblII2lOOXQvl3ZY20bLVVW', NULL, '2025-12-18 10:34:19', '2025-12-18 10:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
