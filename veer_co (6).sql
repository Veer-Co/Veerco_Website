-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2023 at 02:10 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veer_co`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locationName` varchar(185) COLLATE utf8_unicode_ci DEFAULT NULL,
  `townName` varchar(185) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(185) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(185) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(185) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ankit Raj', 'veerco@gmail.com', NULL, '$2y$10$jWkXxNdzzc5P.vWkcbCvg.3NdhObredEMVv4ASvwEVLEnQ3nvtlq6', 'V3mQdBFQPwGlYGwuOOqQzkkTGKLoeo8G5okN860FiqK15YXQ3aJIcZVy2OBt', '2022-07-29 07:53:25', '2022-07-29 07:53:25'),
(2, 'Jitendra Kumar', 'jk@veerco.com', NULL, '$2y$10$VeAZvNMbsSft7jopKm9MAOb4i2v4L.2Y4RMoG/Zsa8MbiMZGVwjom', NULL, '2022-07-29 08:18:26', '2022-07-29 08:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `bought_together_products`
--

DROP TABLE IF EXISTS `bought_together_products`;
CREATE TABLE IF NOT EXISTS `bought_together_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bought_selling` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_slug`, `brand`, `brand_image`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'cumi-2', 'CUMI', 'brand_img-1675090126.jpg', 1, '2023-01-30 14:48:46', '2023-01-30 14:48:46'),
(2, 'rr-2', 'RR', 'brand_img-1675090149.jpg', 1, '2023-01-30 14:49:09', '2023-01-30 14:49:09'),
(3, 'recoil-2', 'RECOIL', 'brand_img-1675090178.png', 1, '2023-01-30 14:49:38', '2023-01-30 14:49:38'),
(4, 'crown-blades', 'CROWN BLADES', 'brand_img-1675090249.jpg', 1, '2023-01-30 14:50:49', '2023-01-30 14:50:49'),
(5, '3m-2', '3M', 'brand_img-1675090265.png', 1, '2023-01-30 14:51:05', '2023-01-30 14:51:05'),
(6, 'united-overseas-bolts', 'UNITED OVERSEAS BOLTS', 'brand_img-1675090306.png', 1, '2023-01-30 14:51:46', '2023-01-30 14:51:46'),
(7, 'superlon-2', 'SUPERLON', 'brand_img-1675090324.jpg', 1, '2023-01-30 14:52:04', '2023-01-30 14:52:04'),
(8, 'wesaf-2', 'WESAF', 'brand_img-1675090342.png', 1, '2023-01-30 14:52:22', '2023-01-30 14:52:22'),
(9, 'bosch-2', 'BOSCH', 'brand_img-1676536404.png', 1, '2023-02-16 21:03:24', '2023-02-16 21:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT '123456',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `category_slug`, `category_image`, `category_status`, `created_at`, `updated_at`) VALUES
(2, 'Electrical Toolkit', 'electrical-toolkit', 'category_img-1675088118.jpg', 1, '2023-01-30 14:15:18', '2023-01-30 14:15:18'),
(3, 'Mechanical Tools', 'mechanical-tools', 'category_img-1675088193.jpg', 1, '2023-01-30 14:16:33', '2023-01-30 14:16:33'),
(5, 'Carpenter', 'carpenter-2', 'category_img-1675088471.jpg', 1, '2023-01-30 14:21:11', '2023-01-30 14:21:11'),
(6, 'Abrasives', 'abrasives-2', 'category_img-1675089372.jpg', 1, '2023-01-30 14:36:12', '2023-01-30 14:36:12'),
(7, 'HVAC', 'hvac-2', 'category_img-1675089843.jpg', 1, '2023-01-30 14:44:03', '2023-01-30 14:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `cross_selling_products`
--

DROP TABLE IF EXISTS `cross_selling_products`;
CREATE TABLE IF NOT EXISTS `cross_selling_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_cross_selling` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 8),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_29_121937_create_admins_table', 2),
(25, '2022_08_27_154636_create_subcategories_table', 7),
(49, '2022_09_05_141541_create_related_products_table', 17),
(35, '2022_09_05_093513_create_products_table', 11),
(34, '2022_09_05_093646_create_product_images_table', 10),
(26, '2022_08_28_161744_create_brands_table', 7),
(24, '2022_07_29_143132_create_categories_table', 7),
(32, '2022_09_20_100724_create_addresses_table', 9),
(37, '2022_10_11_032345_create_carts_table', 12),
(40, '2022_10_15_174440_create_orders_table', 14),
(39, '2022_10_15_175035_create_order_items_table', 13),
(41, '2022_10_18_184502_create_taxes_table', 15),
(45, '2022_10_22_103210_create_promocodes_table', 16),
(46, '2022_10_22_104024_create_promocode_releted_products_table', 16),
(47, '2022_10_22_104325_create_promocode_releted_customers_table', 16),
(50, '2022_10_24_135831_create_cross_selling_products_table', 17),
(51, '2022_10_24_140056_create_up_selling_products_table', 17),
(52, '2022_10_25_084353_create_bought_together_products_table', 18),
(53, '2022_11_01_131008_create_product_reviews_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` double(20,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `payment_mode` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrp` double(20,2) NOT NULL,
  `price` double(20,2) NOT NULL,
  `sku` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_number` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hsn` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_top_product` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `todays_deal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_featured` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` double DEFAULT NULL COMMENT 'Shipping Product Weight',
  `length` double DEFAULT NULL COMMENT 'Shipping Product Length',
  `wide` double DEFAULT NULL COMMENT 'Shipping Product wide',
  `height` double DEFAULT NULL COMMENT 'Shipping Product height',
  `stock_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_house` tinyint(4) DEFAULT NULL COMMENT 'With storehouse management',
  `quantity` bigint(20) UNSIGNED DEFAULT NULL,
  `isCheckout` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Allow customer checkout when this product out of stock. 1 = allowed, 0 = not allowed',
  `est_shipping_days` bigint(20) DEFAULT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `overview` text COLLATE utf8_unicode_ci,
  `seo_title` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_schema` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_slug`, `product_name`, `category_id`, `subcategory_id`, `brand_id`, `mrp`, `price`, `sku`, `model_number`, `hsn`, `is_top_product`, `todays_deal`, `is_featured`, `weight`, `length`, `wide`, `height`, `stock_status`, `store_house`, `quantity`, `isCheckout`, `est_shipping_days`, `tax_id`, `short_description`, `description`, `overview`, `seo_title`, `seo_description`, `seo_keywords`, `seo_schema`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'P00001', 'high-quality-construction-and-durability-metube-58', 'High-Quality Construction and Durability - Metube 5/8', 'mechanical-tools', 'None', NULL, 8000.00, 7593.00, 'ME58', NULL, NULL, 'on', NULL, 'on', 1.2, 1200, 100, 400, 'in_stock', NULL, 0, NULL, 10, 1, '<p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices.</p>', '<h4>Versatility and Wide Range of Applications&nbsp;</h4><p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices. Whether you\'re a hobbyist or a professional, the Metube 5/8 has something to offer.</p><h4>Easy Installation and User-Friendly Design</h4><p>We understand that installing electronic components can be a hassle, but with the Metube 5/8, it doesn\'t have to be. Our product is designed with the user in mind, and installation is as easy as 1-2-3. The simple design allows for quick and hassle-free installation, so you can get back to using your device in no time. Plus, the compact size makes it easy to fit into tight spaces, so you don\'t have to worry about making significant modifications to your device.</p>', '<h4>High-Quality Construction and Durability</h4><p>Are you tired of electronic components that fail to withstand regular use? Look no further than the Metube 5/8. Our product is made from the highest quality materials to ensure maximum durability and longevity. The aluminum casing protects the internal components from damage and ensures the product\'s resilience in the face of various environmental factors. With the Metube 5/8, you can be confident that you\'re purchasing an electronic component that will serve you well for years to come.</p><p>&nbsp;</p>', NULL, NULL, NULL, NULL, '8.jpg', '2023-02-17 03:18:31', '2023-02-17 03:18:31'),
(2, 'P00002', 'Efficient Energy Management with Eaton', 'Efficient Energy Management with Eaton', 'mechanical-tools', NULL, NULL, 4500.00, 3500.00, 'EA12', NULL, NULL, NULL, NULL, NULL, 1.2, 1200, 100, 400, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>Designed with durability in mind, the Eaton power management device is built to withstand even the toughest conditions. With high-quality components and reliable engineering, this device offers long-term performance and stability, giving you peace of mind for years to come. Choose Eaton for your power management needs and experience the difference for yourself.</p>', '<p>Not only does the Eaton power management device keep your electronics safe, but it also helps you save on energy costs. With energy-efficient power management technology, this device reduces wasted energy and lowers your electricity bills. Plus, its sleek design and easy installation make it a practical addition to any home or office.</p>', '<p>Protect your valuable electronics from power surges, spikes, and other electrical disturbances with the Eaton power management device. With advanced surge protection, this device provides reliable power management to your home or office, ensuring your equipment stays safe and operational. Say goodbye to the frustration of losing important data and hardware due to electrical damage – invest in the Eaton power management device today.</p>', NULL, NULL, NULL, NULL, 'Efficient Energy Management with Eaton.jpg', '2023-02-17 05:31:34', '2023-02-17 05:56:24'),
(3, 'P00003', 'five-star-aluminium-blind-rivets', 'Five Star Aluminium blind rivets', 'mechanical-tools', 'None', NULL, 900.00, 725.00, 'ALU234', NULL, NULL, NULL, NULL, 'on', 1.2, 1200, 100, 400, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>In addition to their strength, longevity, and ease of use, Five Star Aluminium blind rivets are also incredibly affordable. With competitive pricing and a high value-to-cost ratio, these fasteners are a cost-effective solution for any project. Whether you need a few fasteners for a small DIY job or bulk quantities for a large-scale construction project, Five Star Aluminium blind rivets offer unbeatable value.</p>', '<p>Not only are Five Star Aluminium blind rivets strong and long-lasting, but they are also incredibly easy to use. With simple installation and minimal tool requirements, these fasteners can be used by anyone, from DIY enthusiasts to professional contractors. And with a wide range of sizes and styles available, Five Star Aluminium blind rivets are versatile enough to be used in a variety of applications.</p>', '<p>Five Star Aluminium blind rivets are also incredibly affordable. With competitive pricing and a high value-to-cost ratio, these fasteners are a cost-effective solution for any project. Whether you need a few fasteners for a small DIY job or bulk quantities for a large-scale construction project, Five Star Aluminium blind rivets offer unbeatable value.</p>', NULL, NULL, NULL, NULL, 'Five Star Aluminium blind rivets.jpg', '2023-02-17 05:36:34', '2023-02-17 05:36:34'),
(4, 'P00004', 'Bosch GSB 500', 'Bosch GSB 500', 'mechanical-tools', NULL, 'bosch-2', 4200.00, 3800.00, 'GSB500', NULL, NULL, 'on', NULL, NULL, 1.2, 1200, 100, 400, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>The drill features a comfortable and ergonomic grip that reduces hand fatigue and allows for extended use without discomfort. The keyless chuck design also makes it easy to switch out drill bits, saving you time and hassle on the job.</p>', '<p>The Bosch GSB 500 is built to last, with a durable and rugged design that can withstand heavy use on the job site. With a high-quality construction and premium materials, this power drill is made to be reliable and long-lasting, ensuring that it will be your go-to tool for years to come.</p>', '<p>The Bosch GSB 500 is a powerful and versatile power drill that can handle any job with ease. Equipped with a robust 500W motor, this drill delivers high torque power to help you work efficiently and get the job done quickly. Whether you\'re drilling through metal, wood, or plastic, the Bosch GSB 500 is the perfect tool for the job.</p>', NULL, NULL, NULL, NULL, 'Bosch GSB 500.jpg', '2023-02-17 05:40:27', '2023-02-17 05:52:08'),
(5, 'P00005', 'high-quality-construction-and-durability-metube-59', 'High-Quality Construction and Durability - Metube 5/8', 'mechanical-tools', 'None', NULL, 8000.00, 7593.00, 'ME58', NULL, NULL, 'on', NULL, 'on', 1.2, 1200, 100, 400, 'in_stock', NULL, NULL, NULL, NULL, 1, '<p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices.</p>', '<h4>Versatility and Wide Range of Applications&nbsp;</h4><p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices. Whether you\'re a hobbyist or a professional, the Metube 5/8 has something to offer.</p><h4>Easy Installation and User-Friendly Design</h4><p>We understand that installing electronic components can be a hassle, but with the Metube 5/8, it doesn\'t have to be. Our product is designed with the user in mind, and installation is as easy as 1-2-3. The simple design allows for quick and hassle-free installation, so you can get back to using your device in no time. Plus, the compact size makes it easy to fit into tight spaces, so you don\'t have to worry about making significant modifications to your device.</p>', '<h4>High-Quality Construction and Durability</h4><p>Are you tired of electronic components that fail to withstand regular use? Look no further than the Metube 5/8. Our product is made from the highest quality materials to ensure maximum durability and longevity. The aluminum casing protects the internal components from damage and ensures the product\'s resilience in the face of various environmental factors. With the Metube 5/8, you can be confident that you\'re purchasing an electronic component that will serve you well for years to come.</p><p>&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, '2023-03-27 18:15:58', '2023-03-27 18:15:58'),
(6, 'P00006', 'high-quality-construction-and-durability-metube-60', 'High-Quality Construction and Durability - Metube 5/8', 'mechanical-tools', 'None', NULL, 8000.00, 7593.00, 'ME58', NULL, NULL, 'on', NULL, 'on', 1.2, 1200, 100, 400, 'in_stock', NULL, NULL, 0, NULL, 1, '<p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices.</p>', '<h4>Versatility and Wide Range of Applications&nbsp;</h4><p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices. Whether you\'re a hobbyist or a professional, the Metube 5/8 has something to offer.</p><h4>Easy Installation and User-Friendly Design</h4><p>We understand that installing electronic components can be a hassle, but with the Metube 5/8, it doesn\'t have to be. Our product is designed with the user in mind, and installation is as easy as 1-2-3. The simple design allows for quick and hassle-free installation, so you can get back to using your device in no time. Plus, the compact size makes it easy to fit into tight spaces, so you don\'t have to worry about making significant modifications to your device.</p>', '<h4>High-Quality Construction and Durability</h4><p>Are you tired of electronic components that fail to withstand regular use? Look no further than the Metube 5/8. Our product is made from the highest quality materials to ensure maximum durability and longevity. The aluminum casing protects the internal components from damage and ensures the product\'s resilience in the face of various environmental factors. With the Metube 5/8, you can be confident that you\'re purchasing an electronic component that will serve you well for years to come.</p><p>&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, '2023-03-27 18:19:58', '2023-03-27 18:19:58'),
(7, 'P00007', 'high-quality-construction-and-durability-metube-61', 'High-Quality Construction and Durability - Metube 5/8', 'mechanical-tools', 'None', NULL, 85000.00, 75093.00, 'ME58', NULL, NULL, 'on', NULL, 'on', 1.2, 1200, 100, 400, 'in_stock', NULL, NULL, 0, NULL, 1, '<p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices.</p>', '<h4>Versatility and Wide Range of Applications&nbsp;</h4><p>The Metube 5/8 is an incredibly versatile electronic component that can be used in a wide range of applications. From industrial automation to consumer electronics, our product can handle it all. The 5/8-inch diameter and precision engineering make it ideal for various machine parts, while its electronic properties make it suitable for use in circuit boards and other electronic devices. Whether you\'re a hobbyist or a professional, the Metube 5/8 has something to offer.</p><h4>Easy Installation and User-Friendly Design</h4><p>We understand that installing electronic components can be a hassle, but with the Metube 5/8, it doesn\'t have to be. Our product is designed with the user in mind, and installation is as easy as 1-2-3. The simple design allows for quick and hassle-free installation, so you can get back to using your device in no time. Plus, the compact size makes it easy to fit into tight spaces, so you don\'t have to worry about making significant modifications to your device.</p>', '<h4>High-Quality Construction and Durability</h4><p>Are you tired of electronic components that fail to withstand regular use? Look no further than the Metube 5/8. Our product is made from the highest quality materials to ensure maximum durability and longevity. The aluminum casing protects the internal components from damage and ensures the product\'s resilience in the face of various environmental factors. With the Metube 5/8, you can be confident that you\'re purchasing an electronic component that will serve you well for years to come.</p><p>&nbsp;</p>', NULL, NULL, NULL, NULL, NULL, '2023-03-27 18:22:35', '2023-03-27 18:22:35'),
(8, 'P00008', 'automatic-air-vent-valve-with-body-dia-34mm', 'Automatic Air Vent Valve with body dia 34mm', 'mechanical-tools', 'None', 'cumi-2', 5036.00, 3274.00, 'SKU-85635', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, 1, '<p>slkdfn</p>', '<p>sdlknl</p>', '<p>asd</p>', NULL, NULL, NULL, NULL, 'Automatic Air Vent Valve with body dia 34mm.jpg', '2023-03-28 16:32:11', '2023-03-28 16:32:11'),
(9, 'P00009', 'automatic-air-vent-valve-with-body-dia-64mm', 'Automatic Air Vent Valve with body dia 64mm', 'electrical-toolkit', 'None', NULL, 5036.00, 3274.00, 'SKU-85635', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>kjfn</p>', '<p>kldnf</p>', '<p>kvjcbnk</p>', NULL, NULL, NULL, NULL, 'Automatic Air Vent Valve with body dia 64mm.jpg', '2023-03-28 16:34:12', '2023-03-28 16:34:12'),
(10, 'P00010', 'automatic-air-vent-valve-with-body-dia-86mm', 'Automatic Air Vent Valve with body dia 86mm', 'electrical-toolkit', 'None', NULL, 5036.00, 3274.00, 'SKU-85636', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>ldkn</p>', '<p>sldkfn</p>', '<p>kjsdfnk</p>', NULL, NULL, NULL, NULL, 'Automatic Air Vent Valve with body dia 86mm.jpg', '2023-03-28 16:47:31', '2023-03-28 16:47:31'),
(11, 'P00011', 'automatic-air-vent-valve-with-body-dia-84mm', 'Automatic Air Vent Valve with body dia 84mm', 'mechanical-tools', 'None', NULL, 5036.00, 3274.00, 'SKU-85637', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>kdfng</p>', '<p>kdnk</p>', '<p>djfkbg</p>', NULL, NULL, NULL, NULL, '1680024132.jpg', '2023-03-28 17:22:12', '2023-03-28 17:22:12'),
(12, 'P00012', '3-ways-ball-valve', '3 ways ball Valve', 'mechanical-tools', 'None', NULL, 5036.00, 3274.00, 'SKU-85638', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>lfbmldb</p>', '<p>lvbldv</p>', '<p>klgbnlkgb</p>', NULL, NULL, NULL, NULL, '1680024245.jpg', '2023-03-28 17:24:05', '2023-03-28 17:24:05'),
(13, 'P00013', '3-ways-ball-valve-jk', '3 ways ball Valve jk', 'electrical-toolkit', 'None', NULL, 5454.00, 4565.00, 'SKU-85639', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>kbnkdf</p>', '<p>lfkgn</p>', '<p>kerjgj</p>', NULL, NULL, NULL, NULL, '1680024432.jpg', '2023-03-28 17:27:12', '2023-03-28 17:27:12'),
(14, 'P00014', '3-ways-ball-valve-ankit', '3 ways ball Valve ankit', 'mechanical-tools', 'None', NULL, 5036.00, 3274.00, 'SKU-85636', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>dflkng</p>', '<p>fkdnvkj</p>', '<p>dfkjgnkjg</p>', NULL, NULL, NULL, NULL, '1680024540.jpg', '2023-03-28 17:29:01', '2023-03-28 17:29:01'),
(15, 'P00015', 'automatic-air-vent-valve-with-body-dia-jk', 'Automatic Air Vent Valve with body dia jk', 'carpenter-2', 'None', NULL, 5036.00, 3274.00, 'SKU-85635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>dfnk</p>', '<p>dfknfkfd</p>', '<p>kjdfgk</p>', NULL, NULL, NULL, NULL, '1680024628.jpg', '2023-03-28 17:30:28', '2023-03-28 17:30:28'),
(16, 'P00016', 'automatic-air-vent-valve-with-body-dia-34mm-2', 'Automatic Air Vent Valve with body dia 34mm', 'mechanical-tools', 'None', NULL, 5036.00, 3274.00, 'SKU-85635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>dlfgl</p>', '<p>dklfgndfgn</p>', '<p>dkngkdjng</p>', NULL, NULL, NULL, NULL, 'Automatic Air Vent Valve with body dia 34mm.1680024810.jpg', '2023-03-28 17:33:30', '2023-03-28 17:33:30'),
(17, 'P00017', 'automatic-air-vent-valve-with-body-di', 'Automatic Air Vent Valve with body di', 'electrical-toolkit', 'None', NULL, 495.00, 322.00, 'SKU-85636', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'in_stock', NULL, 0, NULL, NULL, NULL, '<p>jbjbh</p>', '<p>hjvhvv</p>', '<p>hgvhhvhg</p>', NULL, NULL, NULL, NULL, 'Automatic Air Vent Valve with body di1680101156.jpg', '2023-03-29 14:45:57', '2023-03-29 14:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_img_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spi` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_img_id`, `product_image`, `spi`, `created_at`, `updated_at`) VALUES
(1, 'P00001', '8-11676558911.jpg', 1, '2023-02-17 03:18:31', NULL),
(6, 'P00002', 'Efficient Energy Management with Eaton-11676568384.jpg', 1, '2023-02-17 05:56:24', NULL),
(3, 'P00003', 'Five Star Aluminium blind rivets-11676567194.jpg', 1, '2023-02-17 05:36:34', NULL),
(5, 'P00004', 'Bosch GSB 500-11676568128.jpg', 1, '2023-02-17 05:52:08', NULL),
(7, 'P00008', 'Automatic Air Vent Valve with body dia 34mm-11680021131.jpg', 1, '2023-03-28 16:32:11', NULL),
(8, 'P00009', 'Automatic Air Vent Valve with body dia 64mm-11680021252.jpg', 1, '2023-03-28 16:34:12', NULL),
(9, 'P00010', 'Automatic Air Vent Valve with body dia 86mm-11680022051.jpg', 1, '2023-03-28 16:47:31', NULL),
(10, 'P00011', 'Automatic Air Vent Valve with body dia 84mm-11680024132.jpg', 1, '2023-03-28 17:22:12', NULL),
(11, 'P00012', '3 ways ball Valve-11680024245.jpg', 1, '2023-03-28 17:24:05', NULL),
(12, 'P00013', '3 ways ball Valve jk-11680024432.jpg', 1, '2023-03-28 17:27:12', NULL),
(13, 'P00014', '3 ways ball Valve ankit-11680024541.jpg', 1, '2023-03-28 17:29:01', NULL),
(14, 'P00015', 'Automatic Air Vent Valve with body dia jk-11680024628.jpg', 1, '2023-03-28 17:30:28', NULL),
(15, 'P00016', 'Automatic Air Vent Valve with body dia 34mm-11680024810.jpg', 1, '2023-03-28 17:33:30', NULL),
(16, 'P00017', 'Automatic Air Vent Valve with body di168010115735593.jpg', 1, '2023-03-29 14:45:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `review_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

DROP TABLE IF EXISTS `promocodes`;
CREATE TABLE IF NOT EXISTS `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promocode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_type` varchar(91) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(91) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apply_for` varchar(91) COLLATE utf8_unicode_ci NOT NULL,
  `order_amount` varchar(91) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocode_releted_customers`
--

DROP TABLE IF EXISTS `promocode_releted_customers`;
CREATE TABLE IF NOT EXISTS `promocode_releted_customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promocode_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocode_releted_products`
--

DROP TABLE IF EXISTS `promocode_releted_products`;
CREATE TABLE IF NOT EXISTS `promocode_releted_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promocode_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_products`
--

DROP TABLE IF EXISTS `related_products`;
CREATE TABLE IF NOT EXISTS `related_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_related` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategory_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `tax_percentage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_name`, `tax_percentage`, `tax_status`, `created_at`, `updated_at`) VALUES
(1, 'GST', '18', 0, '2023-01-31 08:02:57', '2023-01-31 08:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `up_selling_products`
--

DROP TABLE IF EXISTS `up_selling_products`;
CREATE TABLE IF NOT EXISTS `up_selling_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_up_selling` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mobile_unique` (`mobile`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
