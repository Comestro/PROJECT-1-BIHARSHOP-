-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2024 at 07:34 PM
-- Server version: 8.0.39-cll-lve
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biharshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `phone`, `alt_phone`, `address_type`, `landmark`, `street`, `area`, `address_line`, `city`, `state`, `postal_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Rahul ', '7004672817', NULL, 'Home', 'purnia', NULL, 'purnia', 'Madhubani, purnia', 'purnia', 'Bihar', '854327', 0, '2024-10-05 00:37:00', '2024-10-05 00:37:00'),
(2, 3, 'Rahul ', '7004672817', NULL, 'Home', 'purnia', NULL, 'purnia', 'Madhubani, purnia', 'purnia', 'Bihar', '854327', 0, '2024-10-05 00:37:00', '2024-10-05 00:37:00'),
(3, 3, 'Fttf', '1246577989', NULL, 'Home', 'fggf', NULL, 'vgvh', 'sdxfc', 'cfcg', 'Bihar', '565764', 0, '2024-10-05 00:38:10', '2024-10-05 00:38:10'),
(4, 3, 'Fttf', '1246577989', NULL, 'Home', 'fggf', NULL, 'vgvh', 'sdxfc', 'cfcg', 'Bihar', '565764', 0, '2024-10-05 00:38:10', '2024-10-05 00:38:10'),
(5, 24, 'ROni', '912852135', '9128528958', 'Home', 'khushkibagh', NULL, 'khushkibagh', 'khushkibagh', 'Purnea', 'Bihar', '854305', 0, '2024-10-16 06:13:34', '2024-10-16 06:13:34'),
(6, 9, 'Cade Crosby', '+1 (412) 751-7527', '+1 (629) 945-6812', 'Work', 'Laudantium iste ali', NULL, 'Nostrud recusandae ', 'Aut nisi est consec', 'Dicta optio sapient', 'Bihar', '64', 0, '2024-10-24 09:47:55', '2024-10-24 09:47:55'),
(7, 6, 'Gahshhs', '8340790118', '7755556777888', 'Work', 'Jzksk', NULL, 'Kekeo', 'Dkdkdod', 'Wjjejej', 'Bihar', '854301', 0, '2024-10-30 01:13:16', '2024-10-30 01:13:16'),
(8, 6, 'Gahshhs', '8340790118', '7755556777888', 'Work', 'Jzksk', NULL, 'Kekeo', 'Dkdkdod', 'Wjjejej', 'Bihar', '854301', 0, '2024-10-30 01:13:16', '2024-10-30 01:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0ade7c2cf97f75d009975f4d720d1fa6c19f4897', 'i:4;', 1730114225),
('0ade7c2cf97f75d009975f4d720d1fa6c19f4897:timer', 'i:1730114225;', 1730114225),
('4d134bc072212ace2df385dae143139da74ec0ef', 'i:2;', 1729078929),
('4d134bc072212ace2df385dae143139da74ec0ef:timer', 'i:1729078929;', 1729078929),
('7b52009b64fd0a2a49e6d8a939753077792b0554', 'i:2;', 1728197698),
('7b52009b64fd0a2a49e6d8a939753077792b0554:timer', 'i:1728197698;', 1728197698),
('f6e1126cedebf23e1463aee73f9df08783640400', 'i:2;', 1729078854),
('f6e1126cedebf23e1463aee73f9df08783640400:timer', 'i:1729078854;', 1729078854);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_category_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `name`, `image`, `cat_description`, `cat_slug`, `status`, `created_at`, `updated_at`) VALUES
(9, NULL, 'Fashion', 'C1728105021.png', 'testing', 'fashion', 1, '2024-10-04 23:40:21', '2024-10-04 23:40:21'),
(10, NULL, 'Footwear', 'C1728107695.jpeg', 'testing', 'footwear', 1, '2024-10-05 00:24:55', '2024-10-05 00:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` enum('percentage','fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(8,2) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_user`
--

CREATE TABLE `coupon_user` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `caption`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'a', 'IMG1730113900.jpeg', 1, '2024-10-28 05:41:40', '2024-10-28 05:41:40'),
(6, '2', 'IMG1730113918.jpeg', 1, '2024-10-28 05:41:58', '2024-10-28 05:41:58'),
(7, '3', 'IMG1730113933.jpeg', 1, '2024-10-28 05:42:13', '2024-10-28 05:42:13'),
(8, '4', 'IMG1730113945.jpeg', 1, '2024-10-28 05:42:25', '2024-10-28 05:42:25'),
(9, '5', 'IMG1730113961.jpeg', 1, '2024-10-28 05:42:41', '2024-10-28 05:42:41'),
(10, '6', 'IMG1730113972.jpeg', 1, '2024-10-28 05:42:52', '2024-10-28 05:42:52'),
(11, '8', 'IMG1730113986.jpeg', 1, '2024-10-28 05:43:06', '2024-10-28 05:43:06'),
(12, '9', 'IMG1730114002.jpeg', 1, '2024-10-28 05:43:22', '2024-10-28 05:43:22'),
(13, '10', 'IMG1730114019.jpeg', 1, '2024-10-28 05:43:39', '2024-10-28 05:43:39'),
(14, '11', 'IMG1730114032.jpeg', 1, '2024-10-28 05:43:52', '2024-10-28 05:43:52'),
(15, '12', 'IMG1730114045.jpeg', 1, '2024-10-28 05:44:05', '2024-10-28 05:44:05'),
(16, '13', 'IMG1730114063.jpeg', 1, '2024-10-28 05:44:23', '2024-10-28 05:44:23'),
(17, '14', 'IMG1730114078.jpeg', 1, '2024-10-28 05:44:38', '2024-10-28 05:44:38'),
(18, '15', 'IMG1730114091.jpeg', 1, '2024-10-28 05:44:51', '2024-10-28 05:44:51'),
(19, '14', 'IMG1730114105.jpeg', 1, '2024-10-28 05:45:05', '2024-10-28 05:45:05'),
(20, '4', 'IMG1730114119.jpeg', 1, '2024-10-28 05:45:19', '2024-10-28 05:45:19'),
(21, 'ef', 'IMG1730114135.jpeg', 1, '2024-10-28 05:45:35', '2024-10-28 05:45:35'),
(22, 'm m', 'IMG1730114145.jpeg', 1, '2024-10-28 05:45:45', '2024-10-28 05:45:45'),
(23, 'plp', 'IMG1730114156.jpeg', 1, '2024-10-28 05:45:56', '2024-10-28 05:45:56'),
(24, 'kn', 'IMG1730114167.jpeg', 1, '2024-10-28 05:46:07', '2024-10-28 05:46:07'),
(25, 'mk', 'IMG1730114181.jpeg', 1, '2024-10-28 05:46:21', '2024-10-28 05:46:21'),
(26, 'km', 'IMG1730114196.jpeg', 1, '2024-10-28 05:46:36', '2024-10-28 05:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint UNSIGNED NOT NULL,
  `referal_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isPaid` tinyint(1) NOT NULL DEFAULT '0',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `referal_id`, `membership_id`, `user_id`, `token`, `name`, `date_of_birth`, `nationality`, `marital_status`, `religion`, `father_name`, `mother_name`, `home_address`, `city`, `pincode`, `state`, `mobile`, `whatsapp`, `email`, `nominee_name`, `nominee_relation`, `bank_name`, `branch_name`, `account_no`, `ifsc`, `pancard`, `aadhar_card`, `image`, `isPaid`, `payment_status`, `isVerified`, `status`, `created_at`, `updated_at`) VALUES
(36, NULL, NULL, 25, 'lp0c0JYzLpmz0ePTkpvWVY8C8i7tQlxXnIiulIf2', 'saurav', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '789456123', NULL, 'saurav@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, '2024-10-16 06:08:38', '2024-10-16 06:08:39'),
(37, 'Nulla commodi Nam ea', '37', 24, '43yyCFmRyLiNIS2MgINFpTtlPJ2PbQSXcVVA36He', 'Colton Browning', '1979-01-12', 'Indian', 'single', 'Sikh', 'Carlos Brennan', 'Kyle Norton', 'Ab non quis adipisci', 'Et aliquid vel repre', '44', 'Arunachal Pradesh', '+1 (277) 449-7861', '+1 (551) 844-2262', 'xexubyhaci@mailinator.com', 'Martin Evans', 'Et rerum tempora dol', 'Rina Wagner', 'Clementine Wynn', '9', 'Eaque voluptatem en', 'Nulla voluptate omni', 'Id doloremque minim', NULL, 1, 'captured', 0, 0, '2024-10-16 06:11:20', '2024-10-16 06:12:07'),
(38, NULL, NULL, 27, 'VqXjPrX3oFrdX4K3jRM3RGdQ823RyQVSWbVcTWyC', 'Raja Alvarez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+1 (991) 984-7811', NULL, 'dawywumik@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, '2024-10-26 03:21:37', '2024-10-26 03:21:37'),
(39, NULL, NULL, 28, 'M03SAn7QP9ruSBeo4bOfkfFdQSw6UQqfiWlgicjI', 'Amethyst Glass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+1 (569) 719-3076', NULL, 'lukisequ@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, '2024-10-26 11:39:25', '2024-10-26 11:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `membership_payments`
--

CREATE TABLE `membership_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `membership_id` bigint UNSIGNED DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_vpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `international_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `membership_payments`
--

INSERT INTO `membership_payments` (`id`, `membership_id`, `amount`, `currency`, `receipt_no`, `payment_id`, `transaction_fee`, `transaction_id`, `transaction_date`, `payment_card_id`, `method`, `wallet`, `bank`, `payment_date`, `payment_vpa`, `ip_address`, `international_payment`, `error_reason`, `error_code`, `error_description`, `payment_status`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(12, 37, 250.00, 'INR', '172907892724', 'pay_P9hF1X54rImNrb', '25000', '1729078927152416', '2024-10-16 11:42:07', NULL, 'upi', NULL, NULL, '2024-10-16 11:42:07', '9128528958@apl', '152.59.169.117', '0', NULL, NULL, NULL, 'captured', '1', NULL, '2024-10-16 06:12:07', '2024-10-16 06:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '0001_01_01_000000_create_users_table', 1),
(20, '0001_01_01_000001_create_cache_table', 1),
(21, '0001_01_01_000002_create_jobs_table', 1),
(22, '2024_09_07_190519_create_admins_table', 1),
(23, '2024_09_08_054754_create_categories_table', 1),
(24, '2024_09_08_060505_create_products_table', 1),
(25, '2024_09_08_075405_create_coupons_table', 1),
(26, '2024_09_08_084842_create_addresses_table', 1),
(27, '2024_09_08_160943_create_orders_table', 1),
(28, '2024_09_08_180211_create_product_images_table', 1),
(29, '2024_09_14_045105_create_products_highlights_table', 1),
(30, '2024_09_14_045418_create_reviews_table', 1),
(31, '2024_09_14_102822_create_wishlists_table', 1),
(32, '2024_09_15_030144_create_product_variant_models_table', 1),
(33, '2024_09_15_150500_create_coupon_user_table', 1),
(34, '2024_09_15_160231_create_payments_table', 1),
(35, '2024_09_15_165838_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address_id` bigint UNSIGNED DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOrdered` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('pending','processing','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_amount` decimal(15,2) DEFAULT NULL,
  `shipping_charge` decimal(15,2) DEFAULT NULL,
  `payment_status` enum('paid','unpaid','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `order_number`, `isOrdered`, `status`, `total_amount`, `shipping_charge`, `payment_status`, `payment_method`, `tracking_number`, `coupon_code`, `created_at`, `updated_at`) VALUES
(1, 17, NULL, 'OD9965', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-09-30 01:19:21', '2024-09-30 01:19:21'),
(2, 3, 1, 'OD9288', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-05 00:34:35', '2024-10-05 00:38:35'),
(3, 6, 8, 'OD3153', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-05 04:43:06', '2024-10-30 01:19:59'),
(4, 25, NULL, 'OD1403', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-16 06:09:13', '2024-10-16 06:09:13'),
(5, 24, 5, 'OD6557', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-16 06:12:39', '2024-10-16 06:13:41'),
(6, 9, 6, 'OD6349', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-17 00:49:25', '2024-10-24 09:48:03'),
(7, 12, NULL, 'OD2379', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-20 03:52:24', '2024-10-20 03:52:24'),
(8, 1, NULL, 'OD7341', 0, 'pending', NULL, NULL, 'unpaid', NULL, NULL, NULL, '2024-10-29 10:57:30', '2024-10-29 10:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `color_variant_id` bigint UNSIGNED DEFAULT NULL,
  `size_variant_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `color_variant_id`, `size_variant_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL, 22, 1, '2024-10-05 00:34:40', '2024-10-05 00:34:40'),
(4, 5, NULL, NULL, 21, 5, '2024-10-16 06:12:43', '2024-10-16 06:12:43'),
(5, 6, NULL, NULL, 21, 2, '2024-10-17 00:49:31', '2024-10-24 09:47:38'),
(6, 8, NULL, NULL, 22, 1, '2024-10-29 10:57:34', '2024-10-29 10:57:34'),
(7, 3, NULL, NULL, 23, 1, '2024-10-30 01:11:38', '2024-10-30 01:11:38'),
(8, 3, NULL, NULL, 21, 1, '2024-10-30 01:28:47', '2024-10-30 01:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_vpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `international_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `discount_price`, `quantity`, `sku`, `image`, `category_id`, `brand`, `status`, `created_at`, `updated_at`) VALUES
(21, 'Kurta pant set with dupatta set kurta', 'kurta-pant-set-with-dupatta-set-kurta', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728105371.jpg', 9, NULL, 1, '2024-10-04 23:43:57', '2024-10-16 06:03:04'),
(22, 'Attractive Trendy Cotton Printed Kurti pant with dupatta set', 'attractive-trendy-cotton-printed-kurti-pant-with-dupatta-set', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728105787.jpg', 9, NULL, 1, '2024-10-04 23:52:04', '2024-10-04 23:55:54'),
(23, 'Rangrez Creation Women Cotton Kurti Pant Duptta Set', 'rangrez-creation-women-cotton-kurti-pant-duptta-set', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728106182.jpg', 9, NULL, 1, '2024-10-04 23:58:22', '2024-10-04 23:59:54'),
(24, 'Women Embroidery cotton Kurti', 'women-embroidery-cotton-kurti', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728106423.jpg', 9, NULL, 1, '2024-10-05 00:02:34', '2024-10-05 00:03:51'),
(25, 'Women Kurta and dupatta Set Cotton Rayon Blend', 'women-kurta-and-dupatta-set-cotton-rayon-blend', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728106529.jpg', 9, NULL, 1, '2024-10-05 00:04:45', '2024-10-05 00:05:36'),
(26, 'TVIRAA(( Rayon + ALIYA CUT+ EMBROIDERY)', 'tviraa-rayon-aliya-cut-embroidery', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728106629.jpg', 9, NULL, 1, '2024-10-05 00:06:14', '2024-10-05 00:07:17'),
(27, 'Women Art silk kurta dupatta set', 'women-art-silk-kurta-dupatta-set', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728106739.jpg', 9, NULL, 1, '2024-10-05 00:08:18', '2024-10-05 00:09:06'),
(28, 'Roman silk readymade pant style suit', 'roman-silk-readymade-pant-style-suit', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728106839.jpg', 9, NULL, 1, '2024-10-05 00:09:55', '2024-10-05 00:10:44'),
(29, 'Rangreza Ethnic Floral Embroidered Kurti', 'rangreza-ethnic-floral-embroidered-kurti', NULL, 3999.00, 2499.00, NULL, NULL, 'p1728107035.jpg', 9, NULL, 1, '2024-10-05 00:12:44', '2024-10-05 00:22:26'),
(30, 'MUTAQINOTI Men\'s Rosewood Brogue Style Loafer Luxury Leather Formal Shoes 8 UK(MQVXTARW) Loafers For Men (Red,8)', 'mutaqinoti-mens-rosewood-brogue-style-loafer-luxury-leather-formal-shoes-8-ukmqvxtarw-loafers-for-men-red8', NULL, 2999.00, 1999.00, NULL, NULL, 'p1728107788.jpg', 10, NULL, 1, '2024-10-05 00:25:41', '2024-10-05 00:26:34'),
(32, 'ALBERTO FERMANI Lases Formals shoes Unique Fashion', 'alberto-fermani-lases-formals-shoes-unique-fashion', NULL, 2999.00, 1999.00, NULL, NULL, 'p1728108202.jpg', 10, NULL, 1, '2024-10-05 00:32:33', '2024-10-05 00:33:27'),
(33, 'testing', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, 1, '2024-10-06 01:23:29', '2024-10-06 01:24:18'),
(34, 'top and jeans ', 'top-and-jeans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-10-14 04:03:34', '2024-10-14 04:03:34'),
(35, 'dfgh', 'dfgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-10-18 06:07:47', '2024-10-18 06:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `products_highlights`
--

CREATE TABLE `products_highlights` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `highlights` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_models`
--

CREATE TABLE `product_variant_models` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `variant_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_models`
--

INSERT INTO `product_variant_models` (`id`, `product_id`, `variant_type`, `variant_value`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(24, 35, 'size', 'xl', 5648.00, 5, '2024-10-18 06:08:05', '2024-10-18 06:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 5, NULL, '2024-10-06 00:30:07', '2024-10-06 00:30:07'),
(2, 30, 12, 5, NULL, '2024-10-06 01:20:47', '2024-10-06 01:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0i0jq5PMX7MgYMuHm2GMGo2WpdBIAFFC2CfmXB3o', NULL, '40.77.167.70', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSDJSM2duTGt5WUUwUUtYeUxBZGN4dWlTVnpVNHk1RFFTSHR3cTgwMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzk6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vcHJvZHVjdC9mYXNoaW9uL2t1cnRhLXBhbnQtc2V0LXdpdGgtZHVwYXR0YS1zZXQta3VydGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730635659),
('2bysLbDbp1uGIHoQeb5xPGcgLl9ajS1MwKcc5spX', NULL, '52.167.144.191', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDFodmJWQlFzNHJJZ1gwSlRCNHdMWGcyWFo5MWFVT2l2Yk9mSU5kTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vY2FydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730641555),
('5H6leJESKGMbZ2uAc88YCvAIHwSLXJk4q3ioc528', NULL, '103.251.59.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoick51NnJVVzkxeWhJRm9BQXJFbXVmSm5JbUJYRFBZRHA3TXZ0bk4zQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vdXNlci9teS1vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730621551),
('6xW9sDhIel0i2SaxHVaWF0eqxvPsqyZkLXyBrufZ', NULL, '40.77.167.5', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicktkS1BGQ21sT1U2MEZ0bEEzb1JsaUxLZDBHM0U0aGtnVFc0ajdYTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9iaWhhcnNob3AuY29tL291ci10ZWFtIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730604329),
('7KFCOtkMpaRDEIq8TUXFtVUoZRIU5iMvNxBTjuSM', NULL, '40.77.167.5', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ053a2JVUnlBUTB6MEZtR0dMelJFUXBzdVFUUzBTZ1gwcFM3SjRuZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTc6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3Byb2R1Y3QvZmFzaGlvbi9hdHRyYWN0aXZlLXRyZW5keS1jb3R0b24tcHJpbnRlZC1rdXJ0aS1wYW50LXdpdGgtZHVwYXR0YS1zZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604331),
('aZR9RlMpFkKFspCrFU9XJauULZtWiZDN4CUAQhkK', NULL, '152.58.186.143', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianRkUlNGYzVBMVBBVEV3b2o5aDVtM09veFdNSGMzdThLcGh5QWRRbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vYmloYXJzaG9wLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730602511),
('CLaoBxc38wYMgee5uix4m2YY8AdrNAxvglbVUFKO', NULL, '159.65.157.156', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclBFUnI1VW5sMng3eERsQU9PeEJxemowR0FoTVRCbUpvY2FCRTN2WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9iaWhhcnNob3AuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730638392),
('cXREkZMia6WiBdu89YTrGSGPhAMpFCWXhYX61WK6', NULL, '40.77.167.5', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUEtsQlBZdFZXdFpKRFpvdkl1NUVBRDBsYzVkMU9lWm50NE93WTBOViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9iaWhhcnNob3AuY29tL2NhdGVnb3J5L2Zhc2hpb24vOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730604332),
('E2MA2SQpvfyRLEHudROzI3hjR7YeQRaRKLY3fhCH', NULL, '52.167.144.216', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamt2Z1diaDBlSG5kUmczVnltekRDc2dmRFlaQVBjcWNqbnVmeHhFOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9iaWhhcnNob3AuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730604141),
('FOUrD3wl4Nw6FpBo0MDIxFRaRKOcDVK3Ckaixr2w', NULL, '52.167.144.216', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWtFdzhmSTFERkhYMFJ3TGJlNWVyQmJ1SlRTUzFuQ0t1R2RXN1JkNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3JlZnVuZC1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604334),
('IhJ8f5TJoCzwidorWg4yUeGlJwsd3po5jNgd9cI0', NULL, '49.37.8.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajVtald2Z2syS3RPYVp4Zm8xOTJMUHpmVno5QzhSbFN1VHBIdnphSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vdXNlci9teS1vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730618270),
('iJdwRGdGrWWQCF5c12pAwSGPUaiK7GuFOqgaNLSJ', NULL, '152.58.183.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0ZxVmNtcEN0dURqMndHN2FmVXk1V2JhVEtxRHozYXE4czJ6ZDA1bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vdXNlci9teS1vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730618866),
('kWvF4S6kscydf7WMtVJ3bx7N3bLTwA7gzvFdGGEa', NULL, '52.167.144.222', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWVOYUtlV2dDSzRDam94UE14c1p0R2thQmJ2N0k1TTBNclhjeWFYViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vcHVibGljLWxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730639011),
('ldgFDoh7IerwYBGdD54cwrkp7bXqsIrzItubuaG1', NULL, '52.167.144.139', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGlDd1VNV0dYdm9Xa3FVTVA5VUZ5a1hEMzNqY1l5aEp6emRRTkswSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYmloYXJzaG9wLmNvbS9tZW1iZXJzaGlwLXNpZ251cCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730608065),
('lSyr0gSANjrgTmdKnvK96zuMHgvXdgz1OJTTPynA', NULL, '52.167.144.212', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHBWczFScWJWTnV0OVdQQmQzY2FsRHF6b21tWGlQcHVEb1VRek9YciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730628606),
('m0gH7keLZ3A4C6kUqHWQzOeXjR3233iko6i5NHQr', NULL, '52.167.144.216', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR25OYUJacXFEQURSazVoRTNhaW9DWHY2SUJGQUVJeFk4VHJvVERrYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9iaWhhcnNob3AuY29tL2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604335),
('MGqwGzB1AyGZlNTVkOQJJc2HxuiPZTpJy9D7FoAz', NULL, '40.77.167.5', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3dHaEx4RmF1blljUjFVekdTU0dyQWlsRkpENW9EZTNER1FlRmpVRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3Rlcm1zLWNvbmRpdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604348),
('MRGvkeYm5Ya6ObLzvX8rzQuouoyRBKxRaNGf5sJ8', NULL, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkd5dElGUndSTDFhSXJ0MzVpbzBXNldRYnhoUHAwS2YwaGwwMWtXUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9iaWhhcnNob3AuY29tL2Fib3V0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730604337),
('OuMHa4kSs3b2HqBbxrrDjFOF0mI6YZQFp6r41Nh8', NULL, '40.77.167.5', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHN6U2R3dVBtQWtqSnVCQkN5dDNhOUd3TG9QRVlwTzFtajlURWxFWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3Byb2R1Y3QvZmFzaGlvbi9rdXJ0YS1wYW50LXNldC13aXRoLWR1cGF0dGEtc2V0LWt1cnRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730604333),
('PgXfkVKZnGmBeiwMPemKFZ5SEbv2GJQN9nCM9zT2', NULL, '40.77.167.5', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlBwYWc3VUlmRnFSSXN5NGRzZWkwWFE4Yk93ZzBLY3k0QmhmZFJGcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9iaWhhcnNob3AuY29tL2dhbGxlcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604328),
('qDYe6VKD06nSj7xcamUhKTWMuMT2XnUkVlhrshqD', NULL, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclpPdVBtMERvVDUzWG1XanEweUxVWGRHSUU2dWYwc3BkRFJOY202dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3Byb2R1Y3QvZmFzaGlvbi93b21lbi1lbWJyb2lkZXJ5LWNvdHRvbi1rdXJ0aSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730604340),
('QyAKVEV45FadqAW9r42VcQvX4xnqfGwifvNc2e64', NULL, '152.58.186.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3VWS1Y1eDdiU2hTem90OTNMMEF6aE1jdGkwU0ZNOUh3SkU3Wkl4UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vYmloYXJzaG9wLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730615358),
('RbBez4vs2iT0XDfq4feRSRCiOFp0QPpvnR90ndUg', NULL, '43.134.141.244', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmR1cEFpOHc3NmpPZ1ZQOUdJdDQ5VE9KN2R3VWtBbkVtRWxhSk1kYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly93d3cuYmloYXJzaG9wLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730616657),
('rgM4HKLALTr4nYo01YZuzZrj5oJDinujB8hRVYLo', NULL, '52.167.144.216', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFJMaENPeTFUUUVHUlJUd1YyZ1lSRURDbDBiV0poRzRySXlEMGF6aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vYmloYXJzaG9wLmNvbS9wcm9kdWN0L2Zvb3R3ZWFyL211dGFxaW5vdGktbWVucy1yb3Nld29vZC1icm9ndWUtc3R5bGUtbG9hZmVyLWx1eHVyeS1sZWF0aGVyLWZvcm1hbC1zaG9lcy04LXVrbXF2eHRhcnctbG9hZmVycy1mb3ItbWVuLXJlZDgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604361),
('RNvO5Bzsys8a0ZCniqXKdGBjmsOSaVVV7C67jefD', NULL, '52.167.144.216', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmcwNzR5SWhwWEpmbGdmQWVMNEtZc3A3TVo4cndJYW1JYVF2a3JzcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODg6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3Byb2R1Y3QvZmFzaGlvbi9yYW5ncmV6LWNyZWF0aW9uLXdvbWVuLWNvdHRvbi1rdXJ0aS1wYW50LWR1cHR0YS1zZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730604336),
('SEf8ljfHry1OwlwtTbSZLxJgqbZeYNVv1XGkBnkh', NULL, '15.204.182.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSktPNldWU1YzSVVxMzVtRGQxbENmdXRlbEtZUGNWUnFWeFJqM3hhdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vYmloYXJzaG9wLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730598111),
('U7cGvsvnOWbcVOA38MuuwZSeTiljuC8ddQ3dML1m', NULL, '192.178.8.38', 'Mozilla/5.0 (Linux; Android 7.0; SM-G930V Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjdTODV3THU4QWxTeDA3Ym9hM2dwaHVDVVFrblkzUFNCVUVFMzB2ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vYmloYXJzaG9wLmNvbS9nYWxsZXJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730602394),
('UDyUYZrGCTr6sASvNGxqDJYfyMGazy4LRz8FaOvy', NULL, '192.178.8.37', 'Mozilla/5.0 (Linux; Android 7.0; SM-G930V Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGtXMENIdjV3UURoQ0N4a0hOM1RsTm5vaEk3eER4VEtJZGYzYWlvbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vYmloYXJzaG9wLmNvbS9nYWxsZXJ5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730602394),
('Ukj7T8gcSZ80tr2q5yiGkacmPTlX01ia7eQx8iUn', NULL, '15.204.182.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV01RWGR3UFljZUhNYm5ZR3VjQnF6N2lHWlk3VTNOTHczVDJXWjB4VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730601324),
('VQIHZyRUfn9C2A743fnlaRP76QyjlKYtu2JacAwY', NULL, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkoyazN2OWFrYkJ3a3MxZlBiYWRpNnVaUmZxZ1UwQ3NTVFQ1Q0hXZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3ByaXZhY3ktcG9saWN5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730604339),
('Wgje2IqmTS5jnCkmBDSzuCQsDDEybpcy7hz97F3y', NULL, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGlsdjA0TjZQTEFVcEdSZmpvTkZJeFFiS1R5RzNxUjFxTU9NeGd5ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3B1YmxpYy1sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730604338),
('wrhWdcuUJDwwP8gMZwbTwTmztzFLHoq6Jjk6NxHM', NULL, '52.167.144.172', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFBXUFBKRDZxZkFBMXk1aVBFQmpmNUY3cTNNQ0lhcmNvR1k4dDNIbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vb3VyLXRlYW0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730642650),
('xRvXRdzbTD8XtyB1mSKujJoA725BZ0CXsIVXs6Z7', NULL, '45.131.193.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:114.0) Gecko/20100101 Firefox/114.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVZsNVV3YjA0ajlRSzRZenFrRThNbHhmQjhoUUE5OWdpQ2ptUnd5WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9iaWhhcnNob3AuY29tL3Rlcm1zLWNvbmRpdGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730627372),
('yqLMkV1rHBc4VpLpn0zBHoQKZ0xaYuyG0v0JQ0MJ', NULL, '52.167.144.216', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXVCMVpMRzc0OTUxQlhiTjZzUzZXaEtZcUxpTzM2YjVuQ1NKM0lOdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9iaWhhcnNob3AuY29tL2NhdGVnb3J5L2Zvb3R3ZWFyLzEwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730604333),
('yZ6vFXOZ0IWZGokEAb1QHfzc8gWaHYnbHzGHH3of', NULL, '106.77.178.18', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWJVU0JwS1BON3JMY0lqcjg5eFRQSlNFbERKYjFVTVpTdk9vREpQcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vYmloYXJzaG9wLmNvbS9vdXItdGVhbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730609873),
('ZFbdNS5yFWnbr5vzvfokAjbohPLp2eT2UbYyPaC2', NULL, '159.65.157.156', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzROMkFIVnQyaUtETElCYlJwTGJVakZGUnZaaWdVMk5wQkxWemlGRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vYmloYXJzaG9wLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1730638393),
('zKR5wes1C9drmWkAolAq535a9rJRQZ73oRQFnqXs', NULL, '40.77.167.68', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTdkY2hROHZEQVZQSWJpZGJ3dUFUbENjb1J3Z1cxYXNnNXIyTFFlOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LmJpaGFyc2hvcC5jb20vYWJvdXQtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730639112);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sadique Hussain (Shaan)', 'sadique.hussain96@gmail.com', NULL, '$2y$12$7qESIPaJqdG5YF4UpjLGJ.Al6/ScpGg18/N/yoSaqgsAfG5FLmrl2', 'https://lh3.googleusercontent.com/a/ACg8ocLAwF8RpUt9EIRlQi5pOd2Gm-AF3JfE3XpicF3vzxdUDhiT4CGr7A=s96-c', 1, NULL, '2024-09-20 07:56:31', '2024-09-20 07:56:31'),
(2, 'Sam', 'sam@gmail.com', NULL, '$2y$12$RdZaO72/nTWY0/OtYlaEcOzAqJhS6gjhN0k./Jd9Q9L1swz//ERya', NULL, 1, NULL, '2024-09-20 08:13:45', '2024-09-20 08:13:45'),
(3, 'ROYAL GAMERS', 'luckyrahul2903@gmail.com', NULL, '$2y$12$KjH6hBNWBNOL4np8znyiluoHHXPsLIsckE3Q1NASC12eelfpkGe6S', 'https://lh3.googleusercontent.com/a/ACg8ocKgRvrZedmuC-tdOm6pwlIZqHU3PchP-sjwRADQLRuMPuRNCJo=s96-c', 1, NULL, '2024-09-20 08:21:21', '2024-09-20 08:21:21'),
(4, 'Saurav.57', 'kumarsaurav17742@gmail.com', NULL, '$2y$12$XNesyxFM7/DxupDE8ZNUP.sjQDAn.Tp4/pFoWkqodlw1/8Mzf0i.O', 'https://lh3.googleusercontent.com/a/ACg8ocKDTH9bdzkBWPxTL-5Lawr_prfZ4wdiF611U8rOJ7fh9JgB403h=s96-c', 1, NULL, '2024-09-20 08:34:22', '2024-09-20 08:34:22'),
(5, 'Comestro', 'comestrotechlabs@gmail.com', NULL, '$2y$12$J717SqKbb55kEMURjtLDy.wajmEbTltNnYsL00JXGu9g9muLoQUYe', 'https://lh3.googleusercontent.com/a/ACg8ocJrzhiBBr27Q4FAU9b9A8xJHUa8bbWDDw8svYJ3WrMneElOFw=s96-c', 1, NULL, '2024-09-20 22:40:12', '2024-09-20 22:40:12'),
(6, 'Saum', 'samcool3203@gmail.com', NULL, '$2y$12$kt7i8.7ONJQaaaTCiWYRbOB8Qk4l/oGcWuEJmMVpCLZjxxlfIhYWe', 'https://lh3.googleusercontent.com/a/ACg8ocL8k7aVIlt-ALiskteqvOZSZCA2lGX9jcb5yc24HTNoOoT1gw=s96-c', 0, NULL, '2024-09-20 22:50:08', '2024-09-20 22:50:08'),
(7, 'Saurav Kumar', 'sauravkumar52778@gmail.com', NULL, '$2y$12$5MUjPRgPTIE9mpHpXnMk0e5FlXmdh8lAf95TfBitxXfRxnBDBGtQu', 'https://lh3.googleusercontent.com/a/ACg8ocLU377sMIAKQurXycIAUp2Yh-zREH-m5BfcsufIoG5Pv-Y1WFct=s96-c', 0, NULL, '2024-09-21 04:51:37', '2024-09-21 04:51:37'),
(8, 'aizen', 'somummmehta123@gmail.com', NULL, '$2y$12$95VHlKqqJAIQV06eOvvzHuPT97Ux9Uq5tu0qE130PKEm5EBpUJS7q', NULL, 0, NULL, '2024-09-22 08:33:46', '2024-09-22 21:03:20'),
(9, 'Roni Saha', 'ronitsaha836@gmail.com', NULL, '$2y$12$Lr92rsD9HaFv8JVb1nihU.8FlN4.g6IMlngGuNZOle2rrJOIalZee', 'https://lh3.googleusercontent.com/a/ACg8ocIHWae4qYaLHrix56-xejZaNopnhH4RBy_rPTrOG-LxoKNWAVVj3g=s96-c', 1, NULL, '2024-09-22 10:54:50', '2024-09-22 10:54:50'),
(10, 'Roronoa Zoro', 'rzoro9734@gmail.com', NULL, '$2y$12$dFGcH.mEcvxS1vYOTg5SEOmygD.cT8.E6BSbpQEAJ7rHb2FEz6tWK', 'https://lh3.googleusercontent.com/a/ACg8ocJmxkdw5DZi7PYOwhq6wtxvM0p4JZaWacSWZTqXMWeYn5gxZQ=s96-c', 0, NULL, '2024-09-22 11:43:44', '2024-09-22 11:43:44'),
(11, 'Sarita', 'saritaakumari4@gmail.com', NULL, '$2y$12$hWrE7EY2mu4hLYKGog3/Quxpv0aSTAqd8T8Wyp7XVPiAJ5nwuP0Iu', NULL, 0, NULL, '2024-09-22 14:32:12', '2024-09-22 14:32:12'),
(12, 'sarita kumari', 'saritaakumari24@gmail.com', NULL, '$2y$12$g/TsRp6DMBREh9Vzb8QRR.GF1V9GYsitsQHWExdEa5XskER/qHcLq', 'https://lh3.googleusercontent.com/a/ACg8ocIG2hSbinDmxMXPakOTkvqNB6JDqtJjpi9MhbZ2ZDiDEnoPyA=s96-c', 1, NULL, '2024-09-22 23:11:28', '2024-09-22 23:11:28'),
(13, 'Sam Cool', 'samyanand667@gmail.com', NULL, '$2y$12$lJTGMuO51SVKAnsHryYR9ePNTVnW2DKJu/jPS3xbkETGDfogkH6Ua', 'https://lh3.googleusercontent.com/a/ACg8ocKXOdynHO-wNnK6FrzhGgWXAluSwxInRetX5KjAAQtdEGDwMg=s96-c', 0, NULL, '2024-09-27 04:02:31', '2024-09-27 04:02:31'),
(14, 'Saumy Anand', 'saumyanand42@gmail.com', NULL, '$2y$12$evoHC8vZqJTNRsBj1ra6zugDuz8FEqKqVta/kudisXyVeTXY560Ky', 'https://lh3.googleusercontent.com/a/ACg8ocLmrNGAAxc6yh5f4BLqLAr-g07pNiOdeKLyK3E-0rGIUYiPFw=s96-c', 1, NULL, '2024-09-28 09:29:24', '2024-09-28 09:29:24'),
(15, 'Rahul kumar', 'rk854327@gmail.com', NULL, '$2y$12$zXl0OmydlmjrqArDLGTrGOQxpM4JL1IZgy7TaMAnKAiBDihGkz8LG', 'https://lh3.googleusercontent.com/a/ACg8ocLGr4DwSwE89iAL-6CJGbltgnR51UbMaohSGZ9iHpfKi1euV0qR=s96-c', 0, NULL, '2024-09-29 02:16:35', '2024-09-29 02:16:35'),
(16, 'Puja Kumari', 'pujakumari11th2003@gmail.com', NULL, '$2y$12$BaSdj3q1SbFMEcdBlBaXPeqBtk6.GHRr00HmpRlnC.CYwAE5P26A.', 'https://lh3.googleusercontent.com/a/ACg8ocKrcvVtg7M69F20IYlHgj4RJyUtDtVR8hUENkBeJfue5TscAbPV9A=s96-c', 1, NULL, '2024-09-30 00:48:47', '2024-09-30 00:48:47'),
(17, 'gorav soni', 'goravsoni007@gmail.com', NULL, '$2y$12$qrf2X9cSKeAYu1XFg3Nuy.0.h3a3CaAktgg0q/kHVne9fn39x9DVW', NULL, 1, NULL, '2024-09-30 00:50:31', '2024-09-30 00:50:31'),
(18, 'zoRiQLWSzfxEBIe', 'kumbu84@yahoo.com', NULL, '$2y$12$hn3JKUM6a7LnMbTrUGWzD..MUDutEgrZdV0RmqzKzZuZQgdspQRk6', NULL, 0, NULL, '2024-09-30 20:24:44', '2024-09-30 20:24:44'),
(19, 'HZxJMeeajUsQC', 'dfrazier794@gmail.com', NULL, '$2y$12$sK0rlmC02aHk.SflfdSXXO9XK3uShFOMzfy66pWYqURC5RdWmCSai', NULL, 0, NULL, '2024-10-05 13:11:20', '2024-10-05 13:11:20'),
(20, 'kdxIONARk', 'dean_robert8932@yahoo.com', NULL, '$2y$12$RD/oQCoiR3cUmk/MuH.0YuFW.aIcXMX7bv7Nutayi3pewIDUknt1u', NULL, 0, NULL, '2024-10-11 01:41:49', '2024-10-11 01:41:49'),
(21, 'Sana Sana khan', 'sanakhan7542071437@gmail.com', NULL, '$2y$12$iyKVlyDv3dEC130GyvfbKeR.vDSRKJxA5sj3XqP0nXHzWJWUjXbs6', 'https://lh3.googleusercontent.com/a/ACg8ocI5qGsBo71Tj4D4FZV02-igeqlQKCsaUOk7tyZDdgTzGGzfOe4=s96-c', 0, NULL, '2024-10-11 15:27:10', '2024-10-11 15:27:10'),
(22, 'RAHUL KUMAR BHARTI', 'rahulbhartirp4@gmail.com', NULL, '$2y$12$1ezZFMJeq2Zk4HNA3qxdv.w.BlG9dHGnCdODYg/aYF0JUXfveOrRy', NULL, 0, NULL, '2024-10-13 11:44:50', '2024-10-13 11:44:50'),
(23, 'Roni', 'roni@gmail.com', NULL, '$2y$12$FkowwrjjZebWo73RTM9nYe12vzVMZ2nzHYAlwYgAhlsnyJ.t7aMYa', NULL, 0, NULL, '2024-10-15 23:40:52', '2024-10-15 23:40:52'),
(24, 'roni', 'roni1@gmail.com', NULL, '$2y$12$hqBKHsGfQumGedo7/FXCSeoxAy6tq/NjHvRrS0NquoY4hRk1phRKi', NULL, 0, NULL, '2024-10-16 06:07:28', '2024-10-16 06:07:28'),
(25, 'saurav', 'saurav@gmail.com', NULL, '$2y$12$4shgi6b3j69MZNs8ZsQ5WOCs53jAz9B4u0ki/9GDcQk/iY6nInuRO', NULL, 0, NULL, '2024-10-16 06:08:39', '2024-10-16 06:08:39'),
(26, 'nikita', 'n@demo.com', NULL, '$2y$12$ZBJK1IrTujNSeRacmiG5yOKXApmjN//gRNuleT57v5wFma.JIWdii', NULL, 0, NULL, '2024-10-25 02:21:50', '2024-10-25 02:21:50'),
(27, 'Raja Alvarez', 'dawywumik@mailinator.com', NULL, '$2y$12$ucJ27bWv/P1TnapFKrUElOVLbhsusszKBUbK6..di3lp6hlHeMY1e', NULL, 0, NULL, '2024-10-26 03:21:37', '2024-10-26 03:21:37'),
(28, 'Amethyst Glass', 'lukisequ@mailinator.com', NULL, '$2y$12$FzKlqsTI4LEojwRK7BQ8oeULkhGFVVCZe1kTPOi0XDFblt4T2tya2', NULL, 0, NULL, '2024-10-26 11:39:25', '2024-10-26 11:39:25'),
(29, 'Signe Mayo', 'vaqa@mailinator.com', NULL, '$2y$12$qvHPAZNtEOma.6E0/JIzdO/F0oxsR8fgAl7OkTD8utXuFLhmaz9OK', NULL, 0, NULL, '2024-10-26 11:39:52', '2024-10-26 11:39:52'),
(30, 'Adilsteel& Glasses', 'adilsteelglasses@gmail.com', NULL, '$2y$12$SYzTY6.cPJzeJmE07qx38u9Lx4h0cycVPuGQaXUWJukStRgTO04pm', 'https://lh3.googleusercontent.com/a/ACg8ocJyGy-ebOQjpbNp2sbWw8t-eUcfIqOeW0LA2s_uEhaaZeJ9LQ=s96-c', 0, NULL, '2024-10-27 01:31:42', '2024-10-27 01:31:42'),
(31, 'khobabe (Gorav)', 'khobabe007@gmail.com', NULL, '$2y$12$lvxUld0XOH7qX5KhCJ1NpO3K3kfOycSydXAJllW91EBbPSivwqTsO', 'https://lh3.googleusercontent.com/a/ACg8ocI-3u67xdRh7sgz08wR1HeXjmGyy-6eTphBjorSL2YFU0-4eLEBbg=s96-c', 0, NULL, '2024-10-27 07:27:24', '2024-10-27 07:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cat_slug_unique` (`cat_slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_user_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `memberships_user_id_foreign` (`user_id`);

--
-- Indexes for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_payments_membership_id_foreign` (`membership_id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_color_variant_id_foreign` (`color_variant_id`),
  ADD KEY `order_items_size_variant_id_foreign` (`size_variant_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_highlights`
--
ALTER TABLE `products_highlights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_highlights_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variant_models`
--
ALTER TABLE `product_variant_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_models_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

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
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_user`
--
ALTER TABLE `coupon_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `membership_payments`
--
ALTER TABLE `membership_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products_highlights`
--
ALTER TABLE `products_highlights`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variant_models`
--
ALTER TABLE `product_variant_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD CONSTRAINT `coupon_user_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `membership_payments`
--
ALTER TABLE `membership_payments`
  ADD CONSTRAINT `membership_payments_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_color_variant_id_foreign` FOREIGN KEY (`color_variant_id`) REFERENCES `product_variant_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_size_variant_id_foreign` FOREIGN KEY (`size_variant_id`) REFERENCES `product_variant_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_highlights`
--
ALTER TABLE `products_highlights`
  ADD CONSTRAINT `products_highlights_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variant_models`
--
ALTER TABLE `product_variant_models`
  ADD CONSTRAINT `product_variant_models_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
