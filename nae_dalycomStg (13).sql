-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2024 at 08:36 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nae_dalycomStg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `main_id` int(11) NOT NULL DEFAULT 0,
  `pay_with_company_account` int(11) NOT NULL DEFAULT 0,
  `track` int(11) NOT NULL DEFAULT 0,
  `pay_count` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `main_id`, `pay_with_company_account`, `track`, `pay_count`, `company_id`, `created_at`, `updated_at`) VALUES
(40, 2, 2, 0, 1, 0, 0, '2024-04-04 09:52:42', '2024-04-04 11:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL DEFAULT 0,
  `qty` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_invisible` int(11) NOT NULL DEFAULT 0,
  `cart_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `service_id`, `qty`, `discount`, `discount_invisible`, `cart_id`, `created_at`, `updated_at`) VALUES
(3, 27, 1.00, 0.00, 0, 2, '2024-03-30 19:19:25', '2024-03-30 19:19:25'),
(4, 27, 1.00, 0.00, 0, 3, '2024-03-30 19:41:09', '2024-03-30 19:41:09'),
(50, 47, 1.00, 0.00, 0, 40, '2024-04-04 09:52:42', '2024-04-04 09:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_type` int(11) NOT NULL DEFAULT 0 COMMENT '1=>card,0=>service',
  `main` int(11) NOT NULL DEFAULT 0,
  `category_childs` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `department_id` int(11) NOT NULL DEFAULT 0,
  `government_price` double(8,2) NOT NULL DEFAULT 0.00,
  `printing_price` double(8,2) NOT NULL DEFAULT 0.00,
  `total` double(8,2) NOT NULL DEFAULT 0.00,
  `visible` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 1000,
  `image` text DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `category_type`, `main`, `category_childs`, `is_active`, `department_id`, `government_price`, `printing_price`, `total`, `visible`, `order`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(27, 'dddddddddd', 0, 1, '[\"27\"]', 1, 1, 233.00, 333.00, 566.00, 1, 1, NULL, 1, '2024-03-30 17:35:53', '2024-03-30 17:35:53'),
(28, 'efe', 0, 1, '[\"28\"]', 1, 1, 3.00, 3.00, 6.00, 1, 2, NULL, 1, '2024-03-30 17:36:00', '2024-03-30 17:36:00'),
(29, 'gyjhj', 0, 1, '[\"29\"]', 1, 1, 9.00, 9.00, 18.00, 1, 3, NULL, 1, '2024-03-30 17:36:11', '2024-03-30 17:36:11'),
(30, 'قسم فرعى', 1, 0, '[\"30\"]', 1, 2, 0.00, 0.00, 0.00, 1, 4, NULL, 2, '2024-03-30 17:36:25', '2024-03-30 17:36:25'),
(31, 'dd', 0, 1, '[\"30\",\"31\"]', 1, 30, 33.00, 33.00, 66.00, 1, 5, NULL, 2, '2024-03-30 17:36:34', '2024-03-30 17:36:34'),
(32, 'bbbbbb', 1, 0, '[\"32\"]', 1, 3, 0.00, 0.00, 0.00, 1, 6, NULL, 3, '2024-03-30 17:36:56', '2024-03-30 17:36:56'),
(33, 'mmmmmmmm', 1, 0, '[\"32\",\"33\"]', 1, 32, 0.00, 0.00, 0.00, 1, 7, NULL, 3, '2024-03-30 17:37:04', '2024-03-30 17:37:04'),
(34, 'klili', 0, 1, '[\"32\",\"33\",\"34\"]', 1, 33, 4.00, 4.00, 8.00, 1, 8, NULL, 3, '2024-03-30 17:37:18', '2024-03-30 17:37:18'),
(35, 'للوافدين و المقيمين', 1, 0, '[\"35\"]', 1, 7, 0.00, 0.00, 0.00, 1, 9, '1711909826istockphoto-1003398652-612x612.jpg', 7, '2024-03-31 18:30:26', '2024-03-31 18:30:26'),
(36, 'للمواطنين', 1, 0, '[\"36\"]', 1, 7, 0.00, 0.00, 0.00, 1, 10, '1711909837istockphoto-1179825208-612x612.jpg', 7, '2024-03-31 18:30:37', '2024-03-31 18:30:37'),
(37, 'للمواطنين تست', 1, 0, '[\"37\"]', 1, 7, 0.00, 0.00, 0.00, 1, 11, '1711909859istockphoto-510469242-612x612.jpg', 7, '2024-03-31 18:30:59', '2024-03-31 18:30:59'),
(38, '2 سنة', 0, 1, '[\"35\",\"38\"]', 1, 35, 2.00, 2.00, 4.00, 1, 12, NULL, 7, '2024-03-31 18:31:16', '2024-03-31 18:31:16'),
(39, '3 سنة', 0, 1, '[\"35\",\"39\"]', 1, 35, 3.00, 3.00, 6.00, 1, 13, NULL, 7, '2024-03-31 18:31:35', '2024-03-31 18:31:35'),
(40, '5 سنه', 0, 1, '[\"35\",\"40\"]', 1, 35, 5.00, 5.00, 10.00, 1, 14, NULL, 7, '2024-03-31 18:31:45', '2024-03-31 18:31:45'),
(41, '17 سنه', 0, 1, '[\"35\",\"41\"]', 1, 35, 5.00, 5.00, 10.00, 1, 15, NULL, 7, '2024-03-31 18:31:57', '2024-03-31 18:31:57'),
(42, '5 سنوات', 0, 1, '[\"36\",\"42\"]', 1, 36, 5.00, 5.00, 10.00, 1, 16, NULL, 7, '2024-03-31 18:32:20', '2024-03-31 18:32:20'),
(43, '10 سنوات', 0, 1, '[\"36\",\"43\"]', 1, 36, 5.00, 5.00, 10.00, 1, 17, NULL, 7, '2024-03-31 18:32:33', '2024-03-31 18:32:33'),
(44, 'خدمه تست 1', 0, 1, '[\"37\",\"44\"]', 1, 37, 22.00, 22.00, 44.00, 1, 18, NULL, 7, '2024-03-31 18:32:49', '2024-03-31 18:32:49'),
(45, 'خدمه تست 2', 0, 1, '[\"37\",\"45\"]', 1, 37, 5.00, 5.00, 10.00, 1, 19, NULL, 7, '2024-03-31 18:32:59', '2024-03-31 18:32:59'),
(46, 'عاجل', 0, 1, '[\"46\"]', 1, 8, 22.00, 21.00, 43.00, 0, 20, NULL, 8, '2024-03-31 18:33:28', '2024-04-03 22:03:46'),
(47, 'تعميم على مكفول', 0, 1, '[\"47\"]', 1, 8, 8.00, 8.00, 16.00, 1, 21, NULL, 8, '2024-03-31 18:33:41', '2024-03-31 18:33:41'),
(48, 'تعديل وضع قطاع حكومي', 0, 1, '[\"48\"]', 1, 8, 22.00, 11.00, 33.00, 1, 22, NULL, 8, '2024-03-31 18:33:58', '2024-03-31 18:33:58'),
(49, 'تعديل وضع', 0, 1, '[\"49\"]', 1, 8, 9.00, 9.00, 18.00, 1, 23, NULL, 8, '2024-03-31 18:34:09', '2024-03-31 18:34:09'),
(50, 'الغاء اقامة', 1, 0, '[\"50\"]', 1, 9, 0.00, 0.00, 0.00, 1, 24, '1711910090istockphoto-1138429558-612x612.jpg', 9, '2024-03-31 18:34:50', '2024-03-31 18:34:50'),
(51, 'الغاء اقامة  تست', 1, 0, '[\"51\"]', 1, 9, 0.00, 0.00, 0.00, 1, 25, '1711910101istockphoto-1003398652-612x612.jpg', 9, '2024-03-31 18:35:01', '2024-03-31 18:35:01'),
(52, 'شركات', 0, 1, '[\"50\",\"52\"]', 1, 50, 22.00, 33.00, 55.00, 1, 26, NULL, 9, '2024-03-31 18:35:18', '2024-03-31 18:35:18'),
(53, 'عائلة', 0, 1, '[\"50\",\"53\"]', 1, 50, 233.00, 3.00, 236.00, 1, 27, NULL, 9, '2024-03-31 18:35:27', '2024-03-31 18:35:27'),
(54, 'بيانات اقامة', 1, 0, '[\"51\",\"54\"]', 1, 51, 0.00, 0.00, 0.00, 1, 28, '1711910159istockphoto-473511946-612x612.jpg', 9, '2024-03-31 18:35:59', '2024-03-31 18:35:59'),
(55, 'تست11', 0, 1, '[\"51\",\"54\",\"55\"]', 1, 54, 22.00, 2.00, 24.00, 1, 29, NULL, 9, '2024-03-31 18:36:15', '2024-03-31 18:36:15'),
(56, 'تامين الراتب', 0, 1, '[\"56\"]', 1, 10, 2.00, 22.00, 24.00, 1, 30, NULL, 10, '2024-03-31 18:37:06', '2024-03-31 18:37:06'),
(57, 'سداد رسوم كاتب العدل', 0, 1, '[\"57\"]', 1, 10, 2.00, 3.00, 5.00, 1, 31, NULL, 10, '2024-03-31 18:37:17', '2024-03-31 18:37:17'),
(58, 'حجز موعد كاتب العدل', 0, 1, '[\"58\"]', 1, 10, 11.00, 22.00, 33.00, 1, 32, NULL, 10, '2024-03-31 18:37:26', '2024-03-31 18:37:26'),
(59, 'طلب شهادة دفاع المدني', 0, 1, '[\"59\"]', 1, 10, 7.00, 8.00, 15.00, 1, 33, NULL, 10, '2024-03-31 18:37:37', '2024-03-31 18:37:37'),
(60, 'تح ملف كفيل مقيم - جوازات', 0, 1, '[\"60\"]', 1, 11, 2.00, 1.00, 3.00, 1, 34, NULL, 11, '2024-03-31 18:38:08', '2024-03-31 18:38:08'),
(61, 'ي تشانيل - الغاء', 0, 1, '[\"61\"]', 1, 11, 22.00, 11.00, 33.00, 1, 35, NULL, 11, '2024-03-31 18:38:19', '2024-03-31 18:38:19'),
(62, 'رفع تعميم', 0, 1, '[\"62\"]', 1, 11, 4.00, 5.00, 9.00, 1, 36, NULL, 11, '2024-03-31 18:38:30', '2024-03-31 18:38:30'),
(63, 'المخالفات المرورية(', 0, 1, '[\"63\"]', 1, 11, 6.00, 6.00, 12.00, 1, 37, NULL, 11, '2024-03-31 18:38:40', '2024-03-31 18:38:40'),
(64, 'استلام معاملة تصريح عمل الكتروني مواطن', 0, 1, '[\"64\"]', 1, 12, 2.00, 2.00, 4.00, 1, 38, NULL, 12, '2024-03-31 18:39:06', '2024-03-31 18:39:06'),
(65, 'لأشخاص-تعديل بيانات الشخص', 0, 1, '[\"65\"]', 1, 12, 44.00, 5.00, 49.00, 1, 39, NULL, 12, '2024-03-31 18:39:24', '2024-03-31 18:39:24'),
(66, 'الإلغاء-إلغاء كفالة-إلغاء كفالة عامل امراض معدية', 0, 1, '[\"66\"]', 1, 12, 2.00, 3.00, 5.00, 1, 40, NULL, 12, '2024-03-31 18:39:32', '2024-03-31 18:39:32'),
(67, 'معاملات اخرى', 0, 1, '[\"67\"]', 1, 13, 3.00, 4.00, 7.00, 1, 41, NULL, 13, '2024-03-31 18:39:54', '2024-03-31 18:39:54'),
(68, 'طلب ضمان - شهادة راتب', 0, 1, '[\"68\"]', 1, 13, 3.00, 4.00, 7.00, 1, 42, NULL, 13, '2024-03-31 18:40:05', '2024-03-31 18:40:05'),
(69, 'امين الانقطاع عن العم', 0, 1, '[\"69\"]', 1, 13, 33.00, 33.00, 66.00, 1, 43, NULL, 13, '2024-03-31 18:40:15', '2024-03-31 18:40:15'),
(70, 'اقامة + هوية - الدفع من بطاقة العميل', 0, 1, '[\"70\"]', 1, 13, 33.00, 22.00, 55.00, 1, 44, NULL, 13, '2024-03-31 18:40:25', '2024-03-31 18:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `employee` int(11) NOT NULL DEFAULT 0,
  `visible` int(11) NOT NULL DEFAULT 1,
  `name` text DEFAULT NULL,
  `name_ar` text DEFAULT NULL,
  `identifier_key` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `max_debt` double(8,2) NOT NULL DEFAULT 0.00,
  `cash_account` double(8,2) DEFAULT NULL,
  `delegate_phone` varchar(255) DEFAULT NULL,
  `delegate_name` varchar(255) DEFAULT NULL,
  `printing_fees` double(8,2) NOT NULL DEFAULT 0.00,
  `tax_number` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `employee`, `visible`, `name`, `name_ar`, `identifier_key`, `email`, `phone`, `max_debt`, `cash_account`, `delegate_phone`, `delegate_name`, `printing_fees`, `tax_number`, `notes`, `created_at`, `updated_at`) VALUES
(2, 2, 0, 0, 'safa company', 'شركة الصفا', 'WgHTeLZKdX', 'test@test1.com', '22223333', 33.00, NULL, '121', 'على', 33.00, '21312', 'ملاحظات', '2024-03-31 18:41:51', '2024-04-03 07:14:57'),
(4, 2, 0, 0, 'gohra company', 'شركة جوهرة', 'WgHTeLfKvv', 'test@test1.com11', '2222333311', 33.00, NULL, '121', 'ماهر', 33.00, '21312', 'ملاحظات', '2024-03-31 18:41:51', '2024-04-03 07:14:49'),
(5, 2, 0, 0, 'haram company', 'شركة الحرم', 'WgddeLfKvv', 'test@test1.com12', '22223333112', 33.00, NULL, '121', 'سعيد', 33.00, '21312', 'ملاحظات', '2024-03-31 18:41:51', '2024-04-03 07:38:44'),
(6, 2, 0, 0, 'safwa company', 'شركة الصفوة ', 'Wgd tteLfKvv', 'test@test1.com13', '222233331123', 33.00, NULL, '121', 'سعيد', 33.00, '21312', 'ملاحظات', '2024-03-31 18:41:51', '2024-04-03 07:14:53'),
(7, 2, 0, 0, 'safar company', 'شركة صفر', 'WgdhheLfKvv', 'test@test1.com14', '222233331123', 33.00, NULL, '121', 'سعيد', 33.00, '21312', 'ملاحظات', '2024-03-31 18:41:51', '2024-04-03 07:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `company_transactions`
--

CREATE TABLE `company_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `main_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `user_name` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `order_from` varchar(255) DEFAULT NULL,
  `side_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_transactions`
--

INSERT INTO `company_transactions` (`id`, `company_id`, `user_id`, `main_id`, `status`, `amount`, `user_name`, `notes`, `order_from`, `side_name`, `created_at`, `updated_at`) VALUES
(8, 1, 2, 2, 2, 222.00, '111', 'esfsdf', '122', 'dwdw', '2024-03-31 11:01:29', '2024-03-31 11:18:51'),
(9, 2, 23, 2, 1, 222.00, 'dsfsd', 'fedfs', 'sdse', '333', '2024-04-01 07:18:27', '2024-04-01 07:18:27'),
(10, 4, 25, 2, 1, 333.00, 'dfs', 'sdf', 'sdfsdf', 'rsf', '2024-04-01 07:39:35', '2024-04-01 07:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `reference` text DEFAULT NULL,
  `supply_company` text DEFAULT NULL,
  `supply_company_phone` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `amount_without_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `supply_company_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `tax` double(8,2) NOT NULL DEFAULT 0.00,
  `total_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `user_id`, `reference`, `supply_company`, `supply_company_phone`, `notes`, `amount_without_tax`, `supply_company_tax`, `tax`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'Et magni cumque aute', 2, '1002', 'Kane Strickland Traders', '58', 'Doloremque et magnam', 34.00, 78.00, 76.00, 93.00, '2024-04-03 14:13:15', '2024-04-03 14:13:15'),
(2, 'سبسيب', 2, '1002', '33', '33', '33', 33.00, 33.00, 33.00, 33.00, '2024-04-03 14:52:01', '2024-04-03 14:52:01');

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
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tax` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `image` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1000,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `name`, `tax`, `image`, `order`, `user_id`, `visible`, `created_at`, `updated_at`) VALUES
(7, 'الهوية', 30.00, '1711909290istockphoto-178447404-612x612.jpg', 1, 24, 1, '2024-03-31 18:21:30', '2024-04-01 07:23:38'),
(8, 'معاملات الخدم', 12.00, '1711909309istockphoto-473511946-612x612.jpg', 2, 2, 1, '2024-03-31 18:21:49', '2024-03-31 18:21:49'),
(9, 'الجوازات', 13.00, '1711909728istockphoto-510469242-612x612.jpg', 3, 2, 1, '2024-03-31 18:28:48', '2024-03-31 18:28:48'),
(10, 'الضمان الصحى', 14.00, '1711909747istockphoto-1001120918-612x612.jpg', 4, 2, 1, '2024-03-31 18:29:07', '2024-03-31 18:29:07'),
(11, 'وزارة الداخلية', 15.00, '1711909763istockphoto-1003398652-612x612.jpg', 5, 2, 1, '2024-03-31 18:29:23', '2024-03-31 18:37:55'),
(12, 'تسهيل', 15.00, '1711909777istockphoto-1138429558-612x612.jpg', 6, 2, 1, '2024-03-31 18:29:37', '2024-03-31 18:29:37'),
(13, 'معاملات اخرى', 17.00, '1711909794istockphoto-950216224-612x612.jpg', 7, 2, 1, '2024-03-31 18:29:54', '2024-03-31 18:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `manage_invoices`
--

CREATE TABLE `manage_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_tax_number` varchar(255) DEFAULT NULL,
  `client_title` varchar(255) DEFAULT NULL,
  `client_company_name` varchar(255) DEFAULT NULL,
  `company_identifier` varchar(255) DEFAULT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `delegate_phone` varchar(255) DEFAULT NULL,
  `delegate_email` varchar(255) DEFAULT NULL,
  `delegate_tax_number` varchar(255) DEFAULT NULL,
  `services_title` varchar(255) DEFAULT NULL,
  `service_title` varchar(255) DEFAULT NULL,
  `service_unit` varchar(255) DEFAULT NULL,
  `service_count` varchar(255) DEFAULT NULL,
  `printing_fees` varchar(255) DEFAULT NULL,
  `government_fees` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `all_total_price` varchar(255) DEFAULT NULL,
  `total_discount` varchar(255) DEFAULT NULL,
  `dirham` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `total_paid` varchar(255) DEFAULT NULL,
  `notice` varchar(255) DEFAULT NULL,
  `total_printing_fees` varchar(255) DEFAULT NULL,
  `remaining_debt_amount` varchar(255) DEFAULT NULL,
  `total_government_fees` varchar(255) DEFAULT NULL,
  `company_title_en` varchar(255) DEFAULT NULL,
  `company_name_en` varchar(255) DEFAULT NULL,
  `company_phone_en` varchar(255) DEFAULT NULL,
  `company_email_en` varchar(255) DEFAULT NULL,
  `company_tax_number_en` varchar(255) DEFAULT NULL,
  `client_title_en` varchar(255) DEFAULT NULL,
  `client_company_name_en` varchar(255) DEFAULT NULL,
  `company_identifier_en` varchar(255) DEFAULT NULL,
  `client_phone_en` varchar(255) DEFAULT NULL,
  `delegate_phone_en` varchar(255) DEFAULT NULL,
  `delegate_email_en` varchar(255) DEFAULT NULL,
  `delegate_tax_number_en` varchar(255) DEFAULT NULL,
  `services_title_en` varchar(255) DEFAULT NULL,
  `service_title_en` varchar(255) DEFAULT NULL,
  `service_unit_en` varchar(255) DEFAULT NULL,
  `service_count_en` varchar(255) DEFAULT NULL,
  `printing_fees_en` varchar(255) DEFAULT NULL,
  `government_fees_en` varchar(255) DEFAULT NULL,
  `discount_en` varchar(255) DEFAULT NULL,
  `total_price_en` varchar(255) DEFAULT NULL,
  `all_total_price_en` varchar(255) DEFAULT NULL,
  `total_discount_en` varchar(255) DEFAULT NULL,
  `dirham_en` varchar(255) DEFAULT NULL,
  `tax_en` varchar(255) DEFAULT NULL,
  `unit_price_en` varchar(255) DEFAULT NULL,
  `total_paid_en` varchar(255) DEFAULT NULL,
  `notice_en` varchar(255) DEFAULT NULL,
  `total_printing_fees_en` varchar(255) DEFAULT NULL,
  `remaining_debt_amount_en` varchar(255) DEFAULT NULL,
  `total_government_fees_en` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_invoices`
--

INSERT INTO `manage_invoices` (`id`, `company_title`, `company_name`, `company_phone`, `company_email`, `company_tax_number`, `client_title`, `client_company_name`, `company_identifier`, `client_phone`, `delegate_phone`, `delegate_email`, `delegate_tax_number`, `services_title`, `service_title`, `service_unit`, `service_count`, `printing_fees`, `government_fees`, `discount`, `total_price`, `all_total_price`, `total_discount`, `dirham`, `tax`, `unit_price`, `total_paid`, `notice`, `total_printing_fees`, `remaining_debt_amount`, `total_government_fees`, `company_title_en`, `company_name_en`, `company_phone_en`, `company_email_en`, `company_tax_number_en`, `client_title_en`, `client_company_name_en`, `company_identifier_en`, `client_phone_en`, `delegate_phone_en`, `delegate_email_en`, `delegate_tax_number_en`, `services_title_en`, `service_title_en`, `service_unit_en`, `service_count_en`, `printing_fees_en`, `government_fees_en`, `discount_en`, `total_price_en`, `all_total_price_en`, `total_discount_en`, `dirham_en`, `tax_en`, `unit_price_en`, `total_paid_en`, `notice_en`, `total_printing_fees_en`, `remaining_debt_amount_en`, `total_government_fees_en`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'اسم الشركة', 'الشركة', 'الهاتف', 'البريد الالكتروني', 'لرقم الضريب', 'العميل', 'اسم الشركة', 'المعرف', 'الهاتف', 'هاتف المندوب', 'البريد الالكتروني للمندوب', 'الرقم الضريبي', 'الخدمات', NULL, 'الخدمة', 'العدد', 'رسوم طباعة', 'رسوم حكومية', 'خصم', 'الثمن الاجمالى', 'المبلغ الاجمالي', 'اجمالي الخصم', 'درهم', 'الضريبية', 'سعر الوحدة', 'المبلغ المدفوع نقداً', 'ملحوظة', 'اجمالي رسوم الطباعة', 'مبلغ الدين المتبقي', 'اجمالي الرسوم الحكومية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-04-04 09:46:49', '2024-04-04 09:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `membership_permissions`
--

CREATE TABLE `membership_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `membership_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_permissions`
--

INSERT INTO `membership_permissions` (`id`, `permission_id`, `membership_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(2, 2, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(3, 3, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(4, 4, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(5, 5, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(6, 6, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(7, 7, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(8, 8, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(9, 9, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(10, 10, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(11, 11, 1, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(12, 1, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(13, 2, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(14, 3, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(15, 4, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(16, 5, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(17, 6, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(18, 7, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(19, 8, 2, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(20, 9, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(21, 10, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(22, 11, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(23, 12, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(24, 13, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(25, 14, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(26, 15, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(27, 16, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(28, 17, 2, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(29, 1, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(30, 2, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(31, 3, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(32, 4, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(33, 5, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(34, 6, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(35, 7, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(36, 8, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(37, 9, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(38, 10, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(39, 11, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(40, 12, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(41, 13, 3, '2024-03-30 11:36:20', '2024-03-30 11:36:20'),
(42, 14, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(43, 15, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(44, 16, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(45, 17, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(46, 18, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(47, 19, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(48, 20, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(49, 21, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(50, 22, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21'),
(51, 23, 3, '2024-03-30 11:36:21', '2024-03-30 11:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `member_ships`
--

CREATE TABLE `member_ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_ships`
--

INSERT INTO `member_ships` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'basic', '2024-03-30 11:36:17', '2024-03-30 11:36:17'),
(2, 'standard', '2024-03-30 11:36:17', '2024-03-30 11:36:17'),
(3, 'premium', '2024-03-30 11:36:17', '2024-03-30 11:36:17');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_02_06_164629_create_permissions_tables', 1),
(3, '2024_03_04_075743_create_membership_table', 1),
(4, '2024_03_04_075750_create_membership_permissions_table', 1),
(5, '2024_03_04_075751_create_role_permissions_table', 1),
(6, '2024_03_08_215026_create_main_categories_table', 1),
(7, '2024_07_18_100631_create_payment_type_table', 1),
(8, '2024_07_18_100632_create_cart_items_table', 1),
(9, '2024_07_18_100632_create_cart_table', 1),
(10, '2024_07_18_100632_create_categories_table', 1),
(11, '2024_07_18_100632_create_order_services_table', 1),
(12, '2024_07_18_100632_create_orders_table', 1),
(13, '2024_07_18_100637_create_companies_table', 1),
(14, '2024_07_18_100638_create_company_transactions_table', 1),
(15, '2024_07_18_100641_create_manage_invoices_table', 1),
(16, '2024_08_19_000000_create_failed_jobs_table', 1),
(17, '2024_10_12_000000_create_users_table', 1),
(18, '2024_10_12_100000_create_password_reset_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_order_id` text NOT NULL DEFAULT '0',
  `order_type` int(11) NOT NULL DEFAULT 0 COMMENT '1=>user,2=>company',
  `tax_number` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `main_id` int(11) NOT NULL DEFAULT 0,
  `order_main` int(11) NOT NULL DEFAULT 0,
  `order_current_main` int(11) NOT NULL DEFAULT 0,
  `total_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `subtotal` double(8,2) NOT NULL DEFAULT 0.00,
  `total_discount` double(8,2) NOT NULL DEFAULT 0.00,
  `total_discount_invisible` double(8,2) NOT NULL DEFAULT 0.00,
  `total_paid` double(8,2) DEFAULT NULL,
  `total_remain` double(8,2) NOT NULL,
  `all_paid` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `unique_order_id`, `order_type`, `tax_number`, `user_name`, `user_id`, `main_id`, `order_main`, `order_current_main`, `total_tax`, `subtotal`, `total_discount`, `total_discount_invisible`, `total_paid`, `total_remain`, `all_paid`, `company_id`, `notes`, `created_at`, `updated_at`) VALUES
(29, 'w-29', 2, NULL, NULL, 2, 2, 29, 0, 2.00, 22.00, 0.00, 0.00, 0.00, 0.00, 1, 2, NULL, '2024-03-31 19:24:03', '2024-03-31 19:24:03'),
(30, 'om-30', 1, NULL, NULL, 2, 2, 30, 0, 1.00, 11.00, 0.00, 0.00, 0.00, 0.00, 1, 0, NULL, '2024-03-31 21:10:05', '2024-03-31 21:10:05'),
(31, 'om-31', 1, NULL, NULL, 23, 2, 31, 0, 1.00, 11.00, 0.00, 0.00, 0.00, 0.00, 1, 0, NULL, '2024-04-01 07:18:47', '2024-04-01 07:18:47'),
(32, 'om-32', 1, NULL, NULL, 2, 2, 32, 0, 1.00, 11.00, 0.00, 0.00, 0.00, 0.00, 1, 0, NULL, '2024-04-01 07:21:40', '2024-04-01 07:21:40'),
(33, 'om-33', 1, NULL, NULL, 25, 2, 33, 0, 5.16, 48.16, 0.00, 0.00, 0.00, 0.00, 1, 0, NULL, '2024-04-01 07:40:59', '2024-04-01 07:40:59'),
(34, 'om-34', 1, NULL, NULL, 2, 2, 34, 0, 5.16, 48.16, 0.00, 0.00, 0.00, 0.00, 1, 0, NULL, '2024-04-03 07:11:21', '2024-04-03 07:11:21'),
(35, 'dalycom-35', 1, NULL, NULL, 2, 0, 34, 34, 5.16, 48.16, 0.00, 0.00, 0.00, 0.00, 0, 0, NULL, '2024-04-03 07:12:20', '2024-04-03 07:12:20'),
(36, 'dalycom-36', 1, NULL, NULL, 2, 0, 34, 35, 5.16, 48.16, 0.00, 0.00, 0.00, 0.00, 0, 0, NULL, '2024-04-03 07:13:05', '2024-04-03 07:13:05'),
(37, 'om-37', 1, NULL, NULL, 2, 2, 37, 0, 1.92, 17.92, 0.00, 0.00, 0.00, 0.00, 1, 0, NULL, '2024-04-04 09:38:57', '2024-04-04 09:38:57'),
(38, 'om-38', 1, '2222222', 'اسم العميل', 2, 2, 38, 0, 5.88, 54.88, 0.00, 0.00, 0.00, 0.00, 1, 0, 'ملحوظه', '2024-04-04 09:51:30', '2024-04-04 09:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_services`
--

CREATE TABLE `order_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `service_id` int(11) NOT NULL DEFAULT 0,
  `qty` double(8,2) NOT NULL DEFAULT 0.00,
  `government_price` double(8,2) NOT NULL DEFAULT 0.00,
  `printing_price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount_invisible` double(8,2) NOT NULL DEFAULT 0.00,
  `tax` double(8,2) NOT NULL DEFAULT 0.00,
  `total_without_tax` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_services`
--

INSERT INTO `order_services` (`id`, `order_id`, `service_id`, `qty`, `government_price`, `printing_price`, `discount`, `discount_invisible`, `tax`, `total_without_tax`, `created_at`, `updated_at`) VALUES
(47, 29, 42, 1.00, 5.00, 5.00, 0.00, 0.00, 10.00, 10.00, '2024-03-31 19:24:03', '2024-03-31 19:24:03'),
(48, 29, 42, 1.00, 5.00, 5.00, 0.00, 0.00, 10.00, 10.00, '2024-03-31 19:24:03', '2024-03-31 19:24:03'),
(49, 30, 42, 1.00, 5.00, 5.00, 0.00, 0.00, 10.00, 10.00, '2024-03-31 21:10:05', '2024-03-31 21:10:05'),
(50, 31, 42, 1.00, 5.00, 5.00, 0.00, 0.00, 10.00, 10.00, '2024-04-01 07:18:47', '2024-04-01 07:18:47'),
(51, 32, 42, 1.00, 5.00, 5.00, 0.00, 0.00, 10.00, 10.00, '2024-04-01 07:21:40', '2024-04-01 07:21:40'),
(52, 33, 46, 1.00, 22.00, 21.00, 0.00, 0.00, 12.00, 43.00, '2024-04-01 07:40:59', '2024-04-01 07:40:59'),
(53, 34, 46, 1.00, 22.00, 21.00, 0.00, 0.00, 12.00, 43.00, '2024-04-03 07:11:21', '2024-04-03 07:11:21'),
(54, 35, 46, 1.00, 22.00, 21.00, 8.00, 0.00, 12.00, 43.00, '2024-04-03 07:12:20', '2024-04-03 07:12:20'),
(55, 36, 46, 1.00, 22.00, 21.00, 10.00, 0.00, 12.00, 43.00, '2024-04-03 07:13:05', '2024-04-03 07:13:05'),
(56, 37, 47, 1.00, 8.00, 8.00, 0.00, 0.00, 12.00, 16.00, '2024-04-04 09:38:57', '2024-04-04 09:38:57'),
(57, 38, 47, 1.00, 8.00, 8.00, 0.00, 0.00, 12.00, 16.00, '2024-04-04 09:51:30', '2024-04-04 09:51:30'),
(58, 38, 48, 1.00, 22.00, 11.00, 0.00, 0.00, 12.00, 33.00, '2024-04-04 09:51:30', '2024-04-04 09:51:30');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `main_id` int(11) NOT NULL DEFAULT 0,
  `payment_type_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `user_name` text DEFAULT NULL,
  `reference` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `invoice_type` text DEFAULT NULL,
  `order_from` varchar(255) DEFAULT NULL,
  `side_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `employee_id`, `user_id`, `main_id`, `payment_type_id`, `status`, `amount`, `user_name`, `reference`, `notes`, `invoice_type`, `order_from`, `side_name`, `created_at`, `updated_at`) VALUES
(1, 21, 2, 2, 1, 2, 1.00, '3', '1000', 'ملاحظات', 'فاتورة', '4', '2', '2024-04-03 17:59:49', '2024-04-03 18:33:32'),
(2, 21, 2, 2, 1, 0, 8.00, 'hukite', '1001', 'At fugiat quo delen', 'فاتورة', 'Culpa autem impedit', 'Tamekah Hicks', '2024-04-03 18:33:44', '2024-04-03 18:33:44'),
(3, 23, 2, 2, 1, 2, 17.00, 'mijosom', '1002', 'Enim dolores rerum e', 'فاتورة', 'Velit cupidatat lore', 'Vivien Hess', '2024-04-03 18:34:36', '2024-04-03 18:34:39'),
(4, 21, 2, 2, 1, 1, 333.00, 'efsdf', '1003', 'dsfsdf', 'فاتورة', 'sdff', 'fbfbf', '2024-04-03 19:54:33', '2024-04-03 19:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `category` text DEFAULT NULL,
  `order_data` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `name`, `name_ar`, `category`, `order_data`, `created_at`, `updated_at`) VALUES
(1, 'PROFIL', 'PROFIL', 'البيانات الشخصية', 'الاعدادات', 6, '2024-03-30 11:36:17', '2024-03-30 11:36:17'),
(2, 'SETTINGS_General', 'SETTINGS_General', 'الاعدادت العامة', 'الاعدادات', 6, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(3, 'SETTINGS_Payment_Type', 'SETTINGS_Payment_Type', 'تعديل نوع الدفع ', 'الاعدادات', 6, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(4, 'SETTINGS_Edit_Inoice', 'SETTINGS_Edit_Inoice', 'تعديل الفاتورة ', 'الاعدادات', 6, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(5, 'SETTINGS_Department', 'SETTINGS_Department', 'اقسام الخدمات ', 'الاعدادات', 6, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(6, 'Edit_Tax_Services', 'Edit_Tax_Services', 'تعديل الخدمات الضريبية', 'الاعدادات', 6, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(7, 'Edit_Permissions', 'Edit_Permissions', 'تعديل الصلاحيات ', 'الاعدادات', 6, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(8, 'Add_User', 'Add_User', 'أضف  مستخدم ', 'المستخدمين', 2, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(9, 'Edit_User', 'Edit_User', 'تعديل  مستخدم ', 'المستخدمين', 2, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(10, 'View_User', 'View_User', 'اظهار  مستخدم ', 'المستخدمين', 2, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(11, 'Add_Payment_Expenses', 'Add_Payment_Expenses', 'أضف مصاريف الدفع  ', 'المدفوعات', 0, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(12, 'Dashboard_User', 'Dashboard_User', '  انشاء فاتورة للمستخدم  ', 'انشاء فاتورة', 1, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(13, 'Dashboard_Company', 'Dashboard_Company', 'انشاء فاتورة للشركة  ', 'انشاء فاتورة', 1, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(14, 'Invoice_View_Mine', 'Invoice_View_Mine', 'اظهار  فواتيرى   ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(15, 'Invoice_View_All', 'Invoice_View_All', 'اظهار  جميع الفواتير   ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(16, 'Invoice_government_fees', 'Invoice_government_fees', 'الرسوم الحكومية الفاتورة ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(17, 'Invoice_printing_fees', 'Invoice_printing_fees', 'رسوم طباعة الفاتورة ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(18, 'Invoice_priniting_client', 'Invoice_priniting_client', '   طباعة الفاتورة للعميل  ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(19, 'Invoice_taxes', 'Invoice_taxes', 'ضرائب الفاتورة  ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(20, 'Invoice_discount', 'Invoice_discount', 'خصم الفاتورة  ', 'الفواتير', 4, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(21, 'View_Company', 'View_Company', '  اظهار شركة   ', 'شركات', 3, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(22, 'Edit_Company', 'Edit_Company', '  تعديل شركة ', 'شركات', 3, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(23, 'Delete_Company', 'Delete_Company', 'حذف شركة ', 'شركات', 3, '2024-03-30 11:36:18', '2024-03-30 11:36:18'),
(24, 'Add_Balance_Company', 'Add_Balance_Company', 'اضافة رصيد للشركات ', 'شركات', 3, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(25, 'Add_Tax_Services', 'Add_Tax_Services', 'اضافة الخدمات ', 'الاعدادات', 6, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(26, 'Delete_Tax_Services', 'Delete_Tax_Services', 'حذف الخدمات ', 'الاعدادات', 6, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(27, 'View_Balance_Company', 'View_Balance_Company', 'اظهار رصيد للشركات ', 'شركات', 3, '2024-03-30 11:36:19', '2024-03-30 11:36:19'),
(28, 'Accept_Balance_Company', 'Accept_Balance_Company', 'قبول اضافة رصيد شركة ', 'شركات', 3, '2024-03-30 11:36:19', '2024-03-30 11:36:19');

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
-- Table structure for table `receipt_amount`
--

CREATE TABLE `receipt_amount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL DEFAULT '0',
  `reference` text DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `notes` text NOT NULL DEFAULT '0',
  `amount_received` double(8,2) NOT NULL DEFAULT 0.00,
  `amount_remain` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_amount`
--

INSERT INTO `receipt_amount` (`id`, `title`, `reference`, `user_id`, `order_id`, `price`, `notes`, `amount_received`, `amount_remain`, `created_at`, `updated_at`) VALUES
(4, 'Asperiores enim dese', '1001', 2, 35, 174.00, 'Maiores anim excepte', 73.00, 27.00, '2024-04-03 13:11:43', '2024-04-03 13:11:43'),
(5, 'waeew', '1002', 2, 32, 222.00, 'dfsf', 33.00, 44.00, '2024-04-03 17:05:14', '2024-04-03 17:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `main_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `permission_id`, `role_id`, `user_id`, `main_id`, `created_at`, `updated_at`) VALUES
(413, 1, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(414, 2, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(415, 3, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(416, 4, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(417, 5, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(418, 6, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(419, 7, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(420, 25, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(421, 26, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(422, 8, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(423, 9, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(424, 10, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(425, 11, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(426, 12, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(427, 13, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(428, 14, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(429, 15, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(430, 16, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(431, 17, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(432, 18, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(433, 19, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(434, 20, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(435, 21, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(436, 22, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(437, 23, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(438, 24, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(439, 27, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(440, 28, 1, 2, 2, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(558, 1, 1, 1, 1, '2024-03-31 17:43:23', '2024-03-31 17:43:23'),
(559, 24, 2, 2, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(560, 27, 2, 2, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(561, 14, 2, 2, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(562, 15, 2, 2, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(563, 1, 2, 2, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(564, 24, 2, 4, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(565, 27, 2, 4, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(566, 14, 2, 4, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(567, 15, 2, 4, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(568, 1, 2, 4, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(569, 24, 2, 6, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(570, 27, 2, 6, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(571, 14, 2, 6, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(572, 15, 2, 6, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(573, 1, 2, 6, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(574, 24, 2, 9, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(575, 27, 2, 9, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(576, 14, 2, 9, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(577, 15, 2, 9, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(578, 1, 2, 9, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(579, 24, 2, 12, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(580, 27, 2, 12, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(581, 14, 2, 12, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(582, 15, 2, 12, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(583, 1, 2, 12, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(584, 24, 2, 14, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(585, 27, 2, 14, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(586, 14, 2, 14, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(587, 15, 2, 14, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(588, 1, 2, 14, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(589, 24, 2, 17, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(590, 27, 2, 17, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(591, 14, 2, 17, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(592, 15, 2, 17, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(593, 1, 2, 17, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(594, 24, 2, 21, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(595, 27, 2, 21, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(596, 14, 2, 21, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(597, 15, 2, 21, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(598, 1, 2, 21, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(599, 24, 2, 23, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(600, 27, 2, 23, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(601, 14, 2, 23, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(602, 15, 2, 23, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(603, 1, 2, 23, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(604, 24, 2, 25, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(605, 27, 2, 25, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(606, 14, 2, 25, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(607, 15, 2, 25, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(608, 1, 2, 25, 2, '2024-04-01 22:12:39', '2024-04-01 22:12:39'),
(609, 12, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(610, 13, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(611, 24, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(612, 27, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(613, 14, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(614, 15, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(615, 20, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(616, 1, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(617, 5, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(618, 6, 3, 2, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(619, 12, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(620, 13, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(621, 24, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(622, 27, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(623, 14, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(624, 15, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(625, 20, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(626, 1, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(627, 5, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(628, 6, 3, 5, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(629, 12, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(630, 13, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(631, 24, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(632, 27, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(633, 14, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(634, 15, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(635, 20, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(636, 1, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(637, 5, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(638, 6, 3, 13, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(639, 12, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(640, 13, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(641, 24, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(642, 27, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(643, 14, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(644, 15, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(645, 20, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(646, 1, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(647, 5, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(648, 6, 3, 15, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(649, 12, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(650, 13, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(651, 24, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(652, 27, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(653, 14, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(654, 15, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(655, 20, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(656, 1, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(657, 5, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(658, 6, 3, 18, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(659, 12, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(660, 13, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(661, 24, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(662, 27, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(663, 14, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(664, 15, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(665, 20, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(666, 1, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(667, 5, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(668, 6, 3, 22, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(669, 12, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(670, 13, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(671, 24, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(672, 27, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(673, 14, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(674, 15, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(675, 20, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(676, 1, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(677, 5, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10'),
(678, 6, 3, 24, 2, '2024-04-01 22:13:10', '2024-04-01 22:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_image` text DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_title` text DEFAULT NULL,
  `company_tax_number` text DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `membership_id` int(11) NOT NULL DEFAULT 1,
  `owner_id` int(11) NOT NULL DEFAULT 0,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `account_type` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `color` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'isAdmin',
  `bank_name` text DEFAULT NULL,
  `bank_number` text DEFAULT NULL,
  `send_to_details` text DEFAULT NULL,
  `bank_name_en` text DEFAULT NULL,
  `send_to_details_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `phone`, `email`, `password`, `company_name`, `company_image`, `company_phone`, `company_email`, `company_title`, `company_tax_number`, `remember_token`, `membership_id`, `owner_id`, `employee_id`, `account_type`, `is_active`, `color`, `created_at`, `updated_at`, `role`, `bank_name`, `bank_number`, `send_to_details`, `bank_name_en`, `send_to_details_en`) VALUES
(1, 'admin', NULL, '0122888888', 'test@gmail.com', '$2y$12$H4deWDKcuFvR34wQ2DApne2ISU651ji8L0z4bf.eFRPtwEWitXlYi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, '2024-03-30 11:36:17', '2024-03-31 17:29:36', 'isSuperAdmin', NULL, NULL, NULL, NULL, NULL),
(2, 'المدير', NULL, '05055555555', 'support@dalycomputing.com', '$2y$12$JJZ7yhyjlTrieFuAp51/Cu/mu9ooeisA5UraI887zsLtK4zPw8uCC', 'تست لخدمات الطباعة', NULL, '111', 'a@s.c', 'بنك ابو ظبى', '12', NULL, 1, 0, 0, 0, 1, 1, '2024-03-30 11:39:44', '2024-04-04 09:52:12', 'isAdmin', 'اسم البنك', '2222222222222', 'تفاصيل التحويل الى فى الفاتورة', 'سم البنك EN', 'تفاصيل التحويل الى فى الفاتورة EN'),
(21, 'employee', NULL, NULL, 'employee@employee.com', '$2y$12$QLVH/thuECMNEgVHQ8eSYuQN951e7imyh9o7jGUc3KKdPZspiS.iK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 2, 1, 0, '2024-03-31 18:48:46', '2024-03-31 18:48:46', 'isUser', NULL, NULL, NULL, NULL, NULL),
(22, 'test', NULL, NULL, 'cashier@cashier.com', '$2y$12$Wk9Xui4lj1F9Uyd5L0hoq.YOiCPwDrjWZB7cr9WqEOHk36WxKs.hK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 3, 1, 0, '2024-03-31 18:49:08', '2024-03-31 18:49:08', 'isUser', NULL, NULL, NULL, NULL, NULL),
(23, 'test', NULL, NULL, 'test@employee.com', '$2y$12$0AkRedh0VCJj5F6qcQcXd.Z/O0GcRoteFBZSMBJKM9IVUs/6IJJqm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 2, 1, 0, '2024-04-01 07:16:29', '2024-04-01 07:16:29', 'isUser', NULL, NULL, NULL, NULL, NULL),
(24, 'fefde', NULL, NULL, 'test@cashier.com', '$2y$12$2NO5UsU6kw/GH6JnPCgEfuKagQ5bBNwQd8H.kF9EsR96D1OLchJB2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 3, 1, 0, '2024-04-01 07:16:51', '2024-04-01 07:16:51', 'isUser', NULL, NULL, NULL, NULL, NULL),
(25, 'test', NULL, NULL, 'test@employeeTest.com', '$2y$12$Zcy3B2CxNdx.SASxlRF2Ze2iD7mS4e9B/lJk4Sq0VBHOJ1TuGr.Au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 2, 1, 0, '2024-04-01 07:38:04', '2024-04-01 07:38:04', 'isUser', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_identifier_key_unique` (`identifier_key`) USING HASH;

--
-- Indexes for table `company_transactions`
--
ALTER TABLE `company_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_invoices`
--
ALTER TABLE `manage_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_permissions`
--
ALTER TABLE `membership_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_ships`
--
ALTER TABLE `member_ships`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_services`
--
ALTER TABLE `order_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `receipt_amount`
--
ALTER TABLE `receipt_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_company_phone_unique` (`company_phone`),
  ADD UNIQUE KEY `users_company_email_unique` (`company_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_transactions`
--
ALTER TABLE `company_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `manage_invoices`
--
ALTER TABLE `manage_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membership_permissions`
--
ALTER TABLE `membership_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `member_ships`
--
ALTER TABLE `member_ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_services`
--
ALTER TABLE `order_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_amount`
--
ALTER TABLE `receipt_amount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=679;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
