-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2019 at 01:03 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phyramid2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_description`, `cat_status`, `created_at`, `updated_at`) VALUES
(1, 'ELECTRIC ITEMS', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dummeys`
--

DROP TABLE IF EXISTS `dummeys`;
CREATE TABLE IF NOT EXISTS `dummeys` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dummey_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dummeys`
--

INSERT INTO `dummeys` (`id`, `dummey_name`, `placement_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '123456789V_PL1_A', 1, 1, NULL, NULL),
(2, '123456789V_PL1_B', 1, 1, NULL, NULL),
(3, '123456789V_PL1_C', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dummey_pvs`
--

DROP TABLE IF EXISTS `dummey_pvs`;
CREATE TABLE IF NOT EXISTS `dummey_pvs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orders_product_id` int(11) NOT NULL,
  `dummey_id` int(11) NOT NULL,
  `pv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dummey_pvs`
--

INSERT INTO `dummey_pvs` (`id`, `orders_product_id`, `dummey_id`, `pv`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '10', '2019-02-01 15:03:30', '2019-02-01 15:03:30'),
(2, 8, 3, '10', '2019-02-01 15:03:30', '2019-02-01 15:03:30'),
(3, 9, 1, '25', '2019-02-01 15:03:30', '2019-02-01 15:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(126, '2014_10_12_000000_create_users_table', 2),
(127, '2014_10_12_100000_create_password_resets_table', 2),
(128, '2019_01_30_023319_create_products_table', 2),
(129, '2019_01_30_025725_create_categories_table', 2),
(130, '2019_01_31_061115_create_dummeys_table', 2),
(131, '2019_01_31_071126_create_orders_table', 2),
(132, '2019_02_01_145850_create_dummey_pvs_table', 2),
(110, '2019_02_01_150219_create_temp_dummey_pvs_table', 1),
(133, '2019_02_01_151633_create_temp_dummey_pvs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-02-01 09:53:02', '2019-02-01 09:53:02'),
(2, 1, '2019-02-01 15:02:09', '2019-02-01 15:02:09'),
(3, 1, '2019-02-01 15:03:30', '2019-02-01 15:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
CREATE TABLE IF NOT EXISTS `orders_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  `pv_value` double NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_product`
--

INSERT INTO `orders_product` (`id`, `orders_id`, `product_id`, `qty`, `total`, `pv_value`, `image`) VALUES
(1, 4, 6, '5', '75000', 45, 'ip118635_00.jpg'),
(2, 1, 1, '1', '1500', 20, 'kettle.jpg'),
(3, 2, 1, '1', '1500', 20, 'kettle.jpg'),
(4, 1, 1, '1', '1500', 20, 'kettle.jpg'),
(5, 2, 1, '1', '1500', 20, 'kettle.jpg'),
(6, 1, 1, '1', '1500', 20, 'kettle.jpg'),
(7, 2, 1, '1', '1500', 20, 'kettle.jpg'),
(8, 3, 1, '1', '1500', 20, 'kettle.jpg'),
(9, 3, 3, '1', '2500', 25, '01-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_pv_value` double NOT NULL,
  `product_status` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_pv_value`, `product_status`, `cat_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'ELECTRIC KETTLE 2', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1500, 20, 1, 1, 'kettle.jpg', NULL, NULL),
(2, 'BARA IRON 2', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1200, 15, 1, 1, 'download.jpg', NULL, NULL),
(3, 'visil ketle', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2500, 25, 1, 1, '01-500x500.jpg', NULL, NULL),
(4, 'NIKAL RICE COOKER', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5500, 35, 1, 1, 'item_L_7878671_6972648.jpg', NULL, NULL),
(5, 'Blender', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3500, 25, 1, 1, 'images.jpg', NULL, NULL),
(6, 'ELECTRIC OVEN', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 15000, 45, 1, 1, 'ip118635_00.jpg', NULL, NULL),
(7, 'FRIGE 02 2D', 'Lorem Ipsum is simply dummy text of the printing  publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 65000, 55, 1, 1, 'LG-GS-X6011NS-Refrigerator-300x300.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_dummey_pvs`
--

DROP TABLE IF EXISTS `temp_dummey_pvs`;
CREATE TABLE IF NOT EXISTS `temp_dummey_pvs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dummey_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pv_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_benifit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_benifit_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_nic_unique` (`user_nic`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_nic`, `name`, `user_address`, `user_gender`, `user_dob`, `user_contact_1`, `user_contact_2`, `user_bank_name`, `user_bank_branch`, `user_account_no`, `user_benifit_name`, `user_benifit_address`, `user_pv`, `user_status`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789V', 'Admin', '', '', '', '123456789V', '', '', '', '', '', '', '', '1', '', '$2y$10$2hbBlate3/7TtvLqQWjgj.tJE6M1bDRQzygjw0fKovknQ/O2ZO4J2', 'Jg2ZCKhuDQcGGGVCHfN44SdExmwGtZfdz9QsE4lv4Ejj2lki4kYQllVdmJ9R', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
