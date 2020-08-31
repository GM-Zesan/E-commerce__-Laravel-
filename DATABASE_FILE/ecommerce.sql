-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 04:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brands_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brands_name`, `created_at`, `updated_at`) VALUES
(1, 'Polo', '2020-07-25 10:17:19', '2020-07-25 10:17:19'),
(2, 'Easy', '2020-07-25 10:17:35', '2020-07-25 10:17:35'),
(3, 'Adidas', '2020-07-25 10:18:17', '2020-07-25 10:18:17'),
(4, 'Nike', '2020-07-25 10:18:23', '2020-07-25 10:41:17'),
(5, 'Marvel', '2020-07-25 10:18:30', '2020-07-25 10:18:30'),
(6, 'One-Point', '2020-07-25 10:18:39', '2020-08-04 20:13:57'),
(7, 'Top-man', '2020-07-25 10:18:47', '2020-08-04 20:12:36'),
(12, 'Eagle', '2020-08-24 08:46:39', '2020-08-24 08:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `categories_slug`, `created_at`, `updated_at`) VALUES
(1, 'Physics', 'Science', '2020-06-30 16:37:13', '2020-07-25 09:09:34'),
(2, 'Laptop', 'Computer', '2020-06-30 17:19:22', '2020-07-24 10:35:22'),
(3, 'Laravel', 'Php Fremwork', '2020-06-30 17:28:23', NULL),
(4, 'Bootstrap', 'Css Fremwork', '2020-06-30 17:29:33', NULL),
(5, 'Food', 'Onek Moja', '2020-06-30 17:31:43', NULL),
(6, 'Apple', 'Brand', '2020-06-30 17:33:42', '2020-07-12 08:16:07'),
(9, 'Javascript', 'Programming Language', '2020-07-03 11:36:18', '2020-07-12 08:17:14'),
(10, 'Meme', 'Screenshot Group', '2020-07-12 12:39:20', '2020-07-19 09:57:20'),
(37, 'Isko', 'Ashik', '2020-07-19 09:56:17', '2020-07-19 09:56:17'),
(40, 'gxhg', 'grj', '2020-07-26 10:37:09', '2020-07-26 10:37:09'),
(41, 'Zeasn', 'scdd', '2020-07-28 04:06:03', '2020-07-28 04:06:03'),
(42, 'dfcdfvgv', 'gvfbfgbf', '2020-07-28 04:06:49', '2020-07-28 04:06:49'),
(43, 'efvrcfv', 'df vf', '2020-07-28 04:14:09', '2020-07-28 04:14:09'),
(44, 'Shirt', 'dfvjds vhj', '2020-07-28 04:15:39', '2020-07-29 10:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colors_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `colors_name`, `created_at`, `updated_at`) VALUES
(2, 'White', '2020-07-25 11:19:18', '2020-07-25 11:23:32'),
(3, 'Red', '2020-07-25 11:19:51', '2020-07-25 11:19:51'),
(4, 'Gray', '2020-07-25 11:19:56', '2020-07-25 11:19:56'),
(5, 'Black', '2020-07-25 11:19:59', '2020-07-25 11:19:59'),
(6, 'Pink', '2020-07-25 11:20:03', '2020-07-25 11:20:03'),
(7, 'Blue', '2020-07-25 11:20:06', '2020-07-25 11:20:06'),
(8, 'Purple', '2020-07-25 11:20:11', '2020-07-25 11:20:11'),
(9, 'Yellow', '2020-07-25 11:20:24', '2020-07-25 11:33:51'),
(10, 'Indigo', '2020-07-28 04:26:47', '2020-07-28 04:26:47'),
(11, 'Orange', '2020-08-24 08:47:19', '2020-08-24 08:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_06_30_162048_create_categories_table', 1),
(2, '2020_06_30_162655_create_posts_table', 2),
(3, '2014_10_12_000000_create_users_table', 3),
(4, '2014_10_12_100000_create_password_resets_table', 3),
(5, '2019_08_19_000000_create_failed_jobs_table', 3),
(6, '2020_07_25_155324_create_brands_table', 4),
(7, '2020_07_25_164844_create_colors_table', 5),
(8, '2020_07_26_082136_create_sizes_table', 6),
(9, '2020_07_26_091230_create_products_table', 7),
(10, '2020_07_26_091347_create_product_sizes_table', 7),
(11, '2020_07_26_091414_create_product_colors_table', 7),
(12, '2020_07_26_091453_create_product_sub_images_table', 7),
(13, '2020_07_29_170707_create_sliders_table', 8),
(14, '2020_08_16_142732_create_shippings_table', 9),
(15, '2020_08_16_142958_create_payments_table', 9),
(16, '2020_08_16_143018_create_orders_table', 9),
(17, '2020_08_16_143121_create_order_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending and 1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `payment_id`, `order_no`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 4, 5, 1, 64882, 1, '2020-08-18 22:25:00', '2020-08-29 10:18:10'),
(3, 7, 4, 6, 2, 2448, 1, '2020-08-18 22:31:22', '2020-08-29 10:19:04'),
(4, 6, 5, 7, 3, 66706, 0, '2020-08-21 09:08:10', '2020-08-21 09:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 13, 7, 4, 2, '2020-08-18 22:25:00', '2020-08-18 22:25:00'),
(2, 3, 11, 4, 5, 2, '2020-08-18 22:31:22', '2020-08-18 22:31:22'),
(3, 4, 13, 7, 5, 2, '2020-08-21 09:08:10', '2020-08-21 09:08:10'),
(4, 4, 9, 3, 5, 4, '2020-08-21 09:08:10', '2020-08-21 09:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gmzesan7767@gmail.com', '$2y$10$AynNPuzZj24KE.xl8xgpH.30daH/pnS9DQgn0kcgkR1A/3j9REGDm', '2020-08-08 11:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `transaction_no`, `mobile`, `created_at`, `updated_at`) VALUES
(5, 'cash_on_delivery', NULL, NULL, '2020-08-18 22:25:00', '2020-08-18 22:25:00'),
(6, 'cash_on_delivery', NULL, NULL, '2020-08-18 22:31:22', '2020-08-18 22:31:22'),
(7, 'cash_on_delivery', NULL, NULL, '2020-08-21 09:08:09', '2020-08-21 09:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posts_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoriesId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posts_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `posts_title`, `slug`, `categoriesId`, `image`, `posts_details`, `created_at`, `updated_at`) VALUES
(1, 'Science Fiction', NULL, '1', 'public/image/1672912884232312.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo officia eaque eligendi nulla vel ipsam, velit hic est blanditiis magni ut repudiandae quos voluptates aliquam! Deleniti incidunt distinctio ducimus nobis.Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo officia eaque eligendi nulla vel ipsam, velit hic est blanditiis magni ut repudiandae quos voluptates aliquam! Deleniti incidunt distinctio ducimus nobis.', NULL, '2020-07-22 04:34:11'),
(2, 'Php fremwork', NULL, '3', 'public/image/1670946746699756.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur soluta amet saepe accusantium at ea, reprehenderit ipsa assumenda facilis! Ab, quae. Tenetur nam voluptatum aliquid molestiae veritatis alias, vitae voluptas.', NULL, NULL),
(5, 'Hp Pavilion', NULL, '2', 'public/image/1671218693076985.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, ab asperiores? Corrupti voluptates itaque esse voluptatem illo? Temporibus, fuga, nemo quisquam quos corrupti earum, similique numquam blanditiis laudantium nesciunt illum?', '2020-07-03 17:45:44', NULL),
(8, 'Screenshot', NULL, '10', 'public/image/1673109985322466.jpg', 'Hi ,This is a group of Facebook..', '2020-07-12 12:27:46', '2020-07-24 08:47:01'),
(9, 'Chicken 🍗 Biriyani', NULL, '5', 'public/image/1672037142869701.jpg', 'So Tasty .. I love it..', '2020-07-12 12:34:39', '2020-07-19 10:02:04'),
(10, 'Funnn', NULL, '10', 'public/image/1673370442379897.jpg', 'dfgbg', '2020-07-12 12:43:00', '2020-07-27 05:46:52'),
(12, 'dscdfc', NULL, '4', NULL, '<p>dfdf</p>', '2020-07-28 04:31:27', '2020-07-28 04:31:27'),
(13, 'Title of A', 'title-of-a', '44', 'public/image/1673574741323213.jpg', '<p>jsdhbjbjc</p>', '2020-07-29 11:54:07', '2020-07-29 11:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `products_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_price` double NOT NULL,
  `products_short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_long_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `brands_id`, `products_name`, `slug`, `products_price`, `products_short_desc`, `products_long_desc`, `products_image`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Education', 'education', 75666, 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '<p><span style=\"color: rgb(136, 136, 136); font-family: Poppins-Regular; font-size: 14px;\">Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat, purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.</span><br></p>', 'public/backend/image/1673662388835002.jpg', '2020-07-26 10:19:20', '2020-07-30 11:07:14'),
(4, 5, 1, 'Biriyani', 'biriyani', 34552, 'fugdjkdf', '<p>dfjhbkjfbvf</p>', 'public/backend/image/1673662416221125.jpg', '2020-07-26 10:46:39', '2020-07-30 11:07:40'),
(9, 3, 3, 'Any Kind of Jacket', 'any-kind-of-jacket', 456, 'gfbvnd', '<p>asdfg hjj</p>', 'public/backend/image/1673662470441310.jpg', '2020-07-28 04:09:16', '2020-07-30 11:08:32'),
(10, 2, 7, 'Fashion', 'fashion', 212, 'Disko Dibani...', '<p>Parti show..</p>', 'public/backend/image/1673662498181157.jpg', '2020-07-29 10:09:11', '2020-08-07 20:54:26'),
(11, 1, 4, 'Shoe Store', 'shoe-store', 1224, 'Shoe Store', '<p>One of the biggest Shoe store..</p>', 'public/backend/image/1673662516290926.jpg', '2020-07-29 10:28:32', '2020-08-07 20:55:49'),
(12, 4, 5, 'Hi', 'hi', 1230000, 'Hi I Am Model', '<p>Hi I Am Model<br></p>', 'public/backend/image/1673662538866750.jpg', '2020-07-29 10:34:06', '2020-08-07 20:53:37'),
(13, 44, 6, 'Shirt', 'shirt', 32441, 'Nice Shirt..', '<p>Awasome &gt;&gt;For You..</p>', 'public/backend/image/1673662566532089.jpg', '2020-07-29 10:53:30', '2020-07-30 11:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `colors_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `products_id`, `colors_id`, `created_at`, `updated_at`) VALUES
(14, 1, 3, '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(15, 1, 4, '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(16, 1, 5, '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(26, 6, 6, '2020-07-27 05:26:34', '2020-07-27 05:26:34'),
(35, 5, 3, '2020-07-27 05:43:20', '2020-07-27 05:43:20'),
(36, 5, 9, '2020-07-27 05:43:20', '2020-07-27 05:43:20'),
(37, 3, 2, '2020-07-27 05:43:37', '2020-07-27 05:43:37'),
(38, 3, 6, '2020-07-27 05:43:37', '2020-07-27 05:43:37'),
(39, 7, 4, '2020-07-27 06:09:57', '2020-07-27 06:09:57'),
(80, 13, 4, '2020-07-30 11:10:04', '2020-07-30 11:10:04'),
(81, 13, 5, '2020-07-30 11:10:04', '2020-07-30 11:10:04'),
(82, 13, 7, '2020-07-30 11:10:04', '2020-07-30 11:10:04'),
(84, 4, 4, '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(85, 4, 8, '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(94, 12, 4, '2020-08-07 20:57:10', '2020-08-07 20:57:10'),
(97, 9, 3, '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(98, 9, 7, '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(99, 11, 2, '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(100, 11, 4, '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(101, 10, 5, '2020-08-07 21:01:02', '2020-08-07 21:01:02'),
(102, 2, 2, '2020-08-24 08:48:19', '2020-08-24 08:48:19'),
(103, 2, 3, '2020-08-24 08:48:19', '2020-08-24 08:48:19'),
(104, 2, 5, '2020-08-24 08:48:19', '2020-08-24 08:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `sizes_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `products_id`, `sizes_id`, `created_at`, `updated_at`) VALUES
(14, 1, 4, '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(15, 1, 5, '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(16, 1, 6, '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(26, 6, 4, '2020-07-27 05:26:34', '2020-07-27 05:26:34'),
(35, 5, 4, '2020-07-27 05:43:20', '2020-07-27 05:43:20'),
(36, 5, 8, '2020-07-27 05:43:20', '2020-07-27 05:43:20'),
(37, 3, 6, '2020-07-27 05:43:37', '2020-07-27 05:43:37'),
(38, 3, 8, '2020-07-27 05:43:37', '2020-07-27 05:43:37'),
(39, 7, 4, '2020-07-27 06:09:57', '2020-07-27 06:09:57'),
(80, 13, 4, '2020-07-30 11:10:04', '2020-07-30 11:10:04'),
(81, 13, 5, '2020-07-30 11:10:04', '2020-07-30 11:10:04'),
(82, 13, 6, '2020-07-30 11:10:04', '2020-07-30 11:10:04'),
(84, 4, 2, '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(85, 4, 5, '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(94, 12, 5, '2020-08-07 20:57:10', '2020-08-07 20:57:10'),
(97, 9, 4, '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(98, 9, 5, '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(99, 11, 5, '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(100, 11, 7, '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(101, 10, 5, '2020-08-07 21:01:02', '2020-08-07 21:01:02'),
(102, 2, 2, '2020-08-24 08:48:19', '2020-08-24 08:48:19'),
(103, 2, 5, '2020-08-24 08:48:19', '2020-08-24 08:48:19'),
(104, 2, 7, '2020-08-24 08:48:19', '2020-08-24 08:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `products_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(8, 1, 'public/backend/subimage/1673368417779025.png', '2020-07-27 05:14:41', '2020-07-27 05:14:41'),
(9, 1, 'public/backend/subimage/1673368417938836.png', '2020-07-27 05:14:42', '2020-07-27 05:14:42'),
(13, 5, 'public/backend/subimage/1673369764658057.jpg', '2020-07-27 05:36:06', '2020-07-27 05:36:06'),
(14, 5, 'public/backend/subimage/1673369764660728.jpg', '2020-07-27 05:36:06', '2020-07-27 05:36:06'),
(15, 5, 'public/backend/subimage/1673369764662733.jpg', '2020-07-27 05:36:06', '2020-07-27 05:36:06'),
(16, 2, 'public/backend/subimage/1673372928236897.jpg', '2020-07-27 06:26:23', '2020-07-27 06:26:23'),
(17, 2, 'public/backend/subimage/1673372928266157.jpg', '2020-07-27 06:26:23', '2020-07-27 06:26:23'),
(18, 2, 'public/backend/subimage/1673372928268248.jpg', '2020-07-27 06:26:23', '2020-07-27 06:26:23'),
(23, 13, 'public/backend/subimage/1673570928070335.jpg', '2020-07-29 10:53:30', '2020-07-29 10:53:30'),
(24, 13, 'public/backend/subimage/1673570928074009.jpg', '2020-07-29 10:53:30', '2020-07-29 10:53:30'),
(25, 13, 'public/backend/subimage/1673570928076432.jpg', '2020-07-29 10:53:30', '2020-07-29 10:53:30'),
(26, 4, 'public/backend/subimage/1674179389056651.jpg', '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(27, 4, 'public/backend/subimage/1674179389127419.jpg', '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(28, 4, 'public/backend/subimage/1674179389129952.jpg', '2020-08-05 04:04:44', '2020-08-05 04:04:44'),
(29, 12, 'public/backend/subimage/1674424279395942.png', '2020-08-07 20:57:10', '2020-08-07 20:57:10'),
(30, 12, 'public/backend/subimage/1674424279423983.png', '2020-08-07 20:57:10', '2020-08-07 20:57:10'),
(31, 12, 'public/backend/subimage/1674424279427067.png', '2020-08-07 20:57:10', '2020-08-07 20:57:10'),
(36, 9, 'public/backend/subimage/1674424407543912.jpg', '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(37, 9, 'public/backend/subimage/1674424407548712.png', '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(38, 9, 'public/backend/subimage/1674424407550757.jpg', '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(39, 9, 'public/backend/subimage/1674424407552504.png', '2020-08-07 20:59:12', '2020-08-07 20:59:12'),
(40, 11, 'public/backend/subimage/1674424445482503.png', '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(41, 11, 'public/backend/subimage/1674424445848162.png', '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(42, 11, 'public/backend/subimage/1674424445854963.png', '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(43, 11, 'public/backend/subimage/1674424445860469.png', '2020-08-07 20:59:48', '2020-08-07 20:59:48'),
(44, 10, 'public/backend/subimage/1674424523061978.png', '2020-08-07 21:01:02', '2020-08-07 21:01:02'),
(45, 10, 'public/backend/subimage/1674424523064862.png', '2020-08-07 21:01:02', '2020-08-07 21:01:02'),
(46, 10, 'public/backend/subimage/1674424523067509.png', '2020-08-07 21:01:02', '2020-08-07 21:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `name`, `email`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 6, 'Abir Hasan', 'abir@gmail.com', '01982678765', 'Uttara sector9, Dhaka', '2020-08-16 09:42:33', '2020-08-16 09:42:33'),
(2, 6, 'Hasan', 'mdh33262@gmail.com', '01987654322', 'Gazipur,Dhaka.', '2020-08-17 02:14:04', '2020-08-17 02:14:04'),
(3, 6, 'Hasan', 'hasan@gmail.com', '01876542123', 'Gazipur,Dhaka.', '2020-08-17 09:34:20', '2020-08-17 09:34:20'),
(4, 6, 'Nasim', 'nasim@gmail.com', '01987654323', 'Barisal', '2020-08-18 21:09:50', '2020-08-18 21:09:50'),
(5, 6, 'Boss', 'boss@gmail.com', '01570597756', 'Tarki,Barisal', '2020-08-21 07:54:54', '2020-08-21 07:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sizes_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `sizes_name`, `created_at`, `updated_at`) VALUES
(2, 'S', '2020-07-26 02:49:50', '2020-07-26 02:53:49'),
(4, 'M', '2020-07-26 02:53:00', '2020-07-26 02:54:00'),
(5, 'L', '2020-07-26 02:54:12', '2020-07-26 02:54:12'),
(6, 'XL', '2020-07-26 02:54:21', '2020-07-26 02:54:21'),
(7, 'XXL', '2020-07-26 02:54:30', '2020-07-26 02:54:30'),
(8, 'XXXL', '2020-07-26 02:55:00', '2020-07-26 02:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sliders_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sliders_first_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sliders_second_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `sliders_image`, `sliders_first_title`, `sliders_second_title`, `created_at`, `updated_at`) VALUES
(1, 'public/backend/slider/1673576636446247.jpg', 'Woman Collection 2020', 'New Season', '2020-07-29 11:51:30', '2020-07-29 12:24:15'),
(2, 'public/backend/slider/1673574912245998.jpg', 'Men Collection 2020', 'New Season', '2020-07-29 11:56:50', '2020-07-29 11:56:50'),
(3, 'public/backend/slider/1673574982455080.jpg', 'New arrival Item 2020', 'T-Shirt $ Jeans', '2020-07-29 11:57:57', '2020-07-29 12:24:51'),
(5, 'public/backend/slider/1673577872274309.jpg', 'New arrival Item Men2020', 'Jacket & Coats', '2020-07-29 12:01:59', '2020-07-29 12:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `role`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Zesan', 'gmzesan7767@gmail.com', 'admin', NULL, '$2y$10$DZj1/U6K.ZrCU.ykFPUUeuojGjjkrDlXB5.7NnYxJLtjrk4GCUV6S', '01869434332', NULL, NULL, NULL, NULL, 1, 'jA0Wl6oWOx7mUtdRAvSaEGe82Zcav0M0xKC9AZB7XKaGxjk4IeNcCIEmkFyz', '2020-07-24 04:49:31', '2020-07-24 04:49:31'),
(6, 'customer', 'MD. Hasan', 'mdh33262@gmail.com', NULL, NULL, '$2y$10$u6K58FJbVvf6b0Dt4VlKgOuZMGmcFEqs3rAwXUgGsdvmxm/sshpXe', '01770597767', 'Torki-bandar, Barisal', 'Male', 'public/image/user/1675920165094967.jpg', '6257', 1, NULL, '2020-08-10 09:09:57', '2020-08-24 09:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_products_name_unique` (`products_name`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
