-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 04:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_admin_dynamo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=active, 0=inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `remember_token`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 'superadmin', '019XXXXXXXX', 'superadmin@example.com', NULL, '$2y$10$i6su5viygQQjhKZvCEW.ZeX9B6vSfR291JlB6LM3M/H4D9mcqGKFm', 'superadmin.png', 1, NULL, NULL, NULL, 1, NULL, '2020-05-10 05:17:46', '2020-05-13 06:06:42'),
(2, 'Admin', NULL, 'admin', '018XXXXXXXX', 'admin@example.com', NULL, '$2y$10$sXhamhwdZ5E7sIWpLn98T.O03djNsXiqS7905Jw35wb0DB0Dnu/q6', 'admin.png', 1, NULL, NULL, NULL, 2, NULL, '2020-05-10 05:17:46', '2020-05-14 23:16:52'),
(3, 'Editor', NULL, 'editor', '01711287849', 'editor@example.com', NULL, '$2y$10$vj7wJ3FeCPtHfYMqZFfFH.O3XiHkI1d5y6Duwm13B1GXTJrlmAw/.', 'editor.png', 1, NULL, NULL, NULL, 3, NULL, '2020-05-10 05:17:46', '2020-05-14 23:13:47'),
(6, 'Maniruzzaman', 'Akash', 'maniruzzamanakash', '01951233084', 'manirujjamanakash@gmail.com', NULL, '$2y$10$ksPAoVR27FAn/KjnGQyWousAcXnIwQxBLO5.u4TIKhluDFMTCh8.y', NULL, 1, NULL, NULL, NULL, 1, NULL, '2020-05-11 07:55:22', '2020-05-12 19:19:07'),
(7, 'Maniruzzaman', 'Akash', 'maniruzzamanakash1', '01951233085', 'manirujjamanakash2@gmail.com', NULL, '$2y$10$eBXJpVQPzMQ6mButl7NireOiz7S7sPSMb8j2iTQNGwJYz1ceK/P3a', NULL, 1, NULL, NULL, 1, 1, NULL, '2020-05-11 08:01:05', '2020-05-12 10:02:59'),
(13, 'Admin Blog Writer', 'Hasan', 'adminblogwriterhasan', '01951233012', 'adminblog@gmail.com', NULL, '$2y$10$PenzAXSm./QoDfBMMqTAyee2BrGj5zxjVTu9Q2XJWbQaqiCBY8XWu', NULL, 0, NULL, NULL, 1, 1, NULL, '2020-05-12 19:19:49', '2020-05-12 19:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `description`, `meta_description`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'This is a simple blog from admin panel', 'this-is-a-simple-blog-from-admin-panel', NULL, '<div>Welcome to our blog <br /></div>', NULL, 1, NULL, 2, NULL, NULL, '2020-05-10 05:17:46', '2020-05-10 05:17:46'),
(2, 'This is a another blog from admin panel', 'this-is-a-another-blog-from-admin-panel', NULL, '<div>Welcome to our blog <br /></div>', NULL, 1, NULL, 6, NULL, NULL, '2020-05-10 05:17:46', '2020-05-10 05:17:46'),
(3, 'First Test Updated', 'first-test-seo-url', 'First Test Updated-1589511137-logo.png', '<p>Simple Blog Description Updated</p>', 'SEO Text Updated', 0, NULL, 1, 1, 1, '2020-05-14 20:48:20', '2020-05-15 09:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null if category is parent, else parent id',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `enable_bg` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>active, 0=>inactive',
  `bg_color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `banner_image`, `logo_image`, `description`, `meta_description`, `parent_category_id`, `status`, `enable_bg`, `bg_color`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Life Style', 'life-style', NULL, NULL, NULL, NULL, 4, 1, 1, '452DEE', NULL, NULL, 1, NULL, '2020-05-10 05:17:46', '2020-05-15 20:28:38'),
(2, 'Fashion', 'fashion', NULL, NULL, NULL, NULL, 4, 1, 0, '#FFFFFF', NULL, NULL, 1, NULL, '2020-05-10 05:17:46', '2020-05-15 20:28:47'),
(3, 'Earning', 'earning', NULL, NULL, NULL, NULL, 2, 0, 0, '#FFFFFF', NULL, NULL, 1, NULL, '2020-05-10 05:17:46', '2020-05-12 21:41:02'),
(4, 'DiasPora', 'category', NULL, NULL, NULL, NULL, NULL, 1, 0, '#FFFFFF', NULL, 1, 1, NULL, '2020-05-12 20:08:12', '2020-05-15 20:20:37'),
(6, 'Sub Category', 'subcategory', NULL, NULL, NULL, NULL, 4, 1, 0, '#FFFFFF', NULL, 1, NULL, NULL, '2020-05-12 20:11:22', '2020-05-12 20:11:22'),
(7, 'Category Real', 'realcategory', NULL, NULL, '<p>Category Real is a dummy category,</p>\r\n<p>Let\'s check this in here..</p>', 'Category Real description is for SEO', 4, 1, 0, '#FFFFFF', NULL, 1, 1, NULL, '2020-05-12 20:34:30', '2020-05-15 20:29:15'),
(8, 'Media', 'image', 'Category Image-1589341187-banner.png', NULL, '<p>Simple Description</p>', 'New SEO tag', NULL, 1, 0, '#FFFFFF', NULL, 1, 1, NULL, '2020-05-12 20:45:45', '2020-05-15 20:31:11'),
(9, 'Austria', 'austria', 'Simple Category-1589338127-banner.jpg', 'Simple Category-1589338127-logo.png', '<p>Descriptino</p>', 'New SEO', 4, 1, 1, '0765EE', NULL, 1, 1, NULL, '2020-05-12 20:48:47', '2020-05-15 20:21:22'),
(10, 'Final Category', 'finalcategory', 'Final Category-1589341024-banner.jpg', 'Test-1589338238-logo.png', '<p>Test</p>', 'Test SEO', 4, 1, 0, '#FFFFFF', NULL, 1, 1, NULL, '2020-05-12 20:50:38', '2020-05-15 20:29:02'),
(11, 'Maniruzzaman Akash', 'maniruzzamanakash', NULL, NULL, NULL, NULL, 4, 1, 1, 'FFFFFF', NULL, 1, 1, NULL, '2020-05-15 05:37:38', '2020-05-15 20:28:54'),
(12, 'Latest News', 'latestnews', NULL, NULL, NULL, NULL, 8, 1, 1, '2915EE', NULL, 1, NULL, NULL, '2020-05-15 20:31:47', '2020-05-15 20:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = not seen by admin, 1 = seen by admin',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(273, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(274, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(275, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(276, '2016_06_01_000004_create_oauth_clients_table', 1),
(277, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(278, '2020_05_01_000000_create_admins_table', 1),
(279, '2020_05_01_0000040_create_settings_table', 1),
(280, '2020_05_01_000010_create_users_table', 1),
(281, '2020_05_01_000020_create_failed_jobs_table', 1),
(282, '2020_05_01_000030_create_password_resets_table', 1),
(283, '2020_05_01_000035_create_permission_tables', 1),
(284, '2020_05_01_000050_create_categories_table', 1),
(285, '2020_05_01_000060_create_pages_table', 1),
(286, '2020_05_01_000070_create_blogs_table', 1),
(287, '2020_05_01_000080_create_contacts_table', 1),
(288, '2020_05_01_000090_create_tracks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 6),
(4, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 13),
(5, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Null if page has no category',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `meta_description`, `image`, `banner_image`, `category_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Albanian Associations in Austria', 'shoqatat', '<div class=\"col-lg-9 col-md-8 col-sm-7\">\r\n<div class=\"teksti\">\r\n<h1><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Albanian Associations in Austria</span></span></h1>\r\n<ul class=\"nav nav-tabs\">\r\n<li class=\"active\"><a href=\"#home\" data-toggle=\"tab\" aria-expanded=\"true\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">associations</span></span></a></li>\r\n<li class=\"\"><a href=\"#menu1\" data-toggle=\"tab\" aria-expanded=\"false\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Vienna</span></span></a></li>\r\n<li class=\"\"><a href=\"#menu2\" data-toggle=\"tab\" aria-expanded=\"false\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Linz</span></span></a></li>\r\n<li class=\"\"><a href=\"#menu3\" data-toggle=\"tab\" aria-expanded=\"false\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Salzburg</span></span></a></li>\r\n<li><a href=\"#menu4\" data-toggle=\"tab\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Graz</span></span></a></li>\r\n<li class=\"\"><a href=\"#menu5\" data-toggle=\"tab\" aria-expanded=\"false\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Other cities</span></span></a></li>\r\n</ul>\r\n<div class=\"tab-content\">\r\n<div id=\"home\" class=\"tab-pane fade active in\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Welcome</span></span></h2>\r\n<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">We have ranked Albanian associations in Austria based on the cities where Albanians are most concentrated and their activities.</span></span></p>\r\n</div>\r\n<div id=\"menu1\" class=\"tab-pane fade\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Albanian Associations in Vienna</span></span></h2>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\"Alexander Moses\"</span></span></h2>\r\n<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">info@moisiu.eu </span></span><br /><a href=\"http://www.moisiu.eu\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.moisiu.eu</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://www.moisiu.eu\" target=\"_blank\" rel=\"noopener\"><img src=\"img/moisiu.png\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\"Albanian Football League\" Austria</span></span></h2>\r\n<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">liga@ligashqiptare.eu </span></span><br /><a href=\"http://ligashqiptare.eu\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.ligashqiptare.eu</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://ligashqiptare.eu\" target=\"_blank\" rel=\"noopener\"><img src=\"img/ligashqiptare.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Kosovarisch &Ouml;sterreichische Gesellschaft</span></span></h2>\r\n<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">info@OeKG-ks.org </span></span><br /><a href=\"http://www.oekg-ks.org\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.oekg-ks.org</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://www.oekg-ks.org\" target=\"_blank\" rel=\"noopener\"><img src=\"img/oekg.png\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">office@iliret.eu </span></span><br /><a href=\"http://www.iliret.eu\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.iliret.eu</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://www.iliret.eu\" target=\"_blank\" rel=\"noopener\"><img src=\"img/iliret.png\" width=\"100%\" /></a></div>\r\n</div>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Cultural Association \"June 12\"</span></span></h2>\r\n<p><br /><a href=\"https://www.facebook.com/Shoqata-Kulturore-12-Qershori-Wien-794154833980344/\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Facebook</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"https://www.facebook.com/Shoqata-Kulturore-12-Qershori-Wien-794154833980344\" target=\"_blank\" rel=\"noopener\"><img src=\"img/12qershori.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Albanian Association Two July</span></span></h2>\r\n<p><br /><a href=\"https://www.facebook.com/shoqatashqiptare.dykorriku\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Facebook</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"https://www.facebook.com/shoqatashqiptare.dykorriku\" target=\"_blank\" rel=\"noopener\"><img src=\"img/2korriku.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n</div>\r\n<div id=\"menu2\" class=\"tab-pane fade\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Associations in Linz</span></span></h2>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\"Bujaria\" Association</span></span></h2>\r\n<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Wienerstr. </span><span style=\"vertical-align: inherit;\">288 </span></span><br /><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">4030 Linz </span></span><br /><a href=\"http://www.bujaria.at\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.bujaria.at</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://www.bujaria.at\" target=\"_blank\" rel=\"noopener\"><img src=\"img/bujaria.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Union Association</span></span></h2>\r\n<p><br /><a href=\"http://www.xhamia-linz.at\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.xhamia-linz.at</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://www.xhamia-linz.at\" target=\"_blank\" rel=\"noopener\"><img src=\"img/bashkimi.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Radio Repentance</span></span></h2>\r\n<p><br /><a href=\"http://www.radio-pendimi.com\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">www.radio-pendimi.com</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"http://www.radio-pendimi.com\" target=\"_blank\" rel=\"noopener\"><img src=\"img/radiopendimi.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n</div>\r\n<div id=\"menu3\" class=\"tab-pane fade\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Albanian Associations in Salzburg</span></span></h2>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n</div>\r\n<div id=\"menu4\" class=\"tab-pane fade\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Albanian Associations in Graz</span></span></h2>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Homeland Association</span></span></h2>\r\n<p><br /><a href=\"https://www.facebook.com/groups/250640496391/about/\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Facebook</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"https://www.facebook.com/groups/250640496391/about/\" target=\"_blank\" rel=\"noopener\"><img src=\"img/atdheu.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n</div>\r\n<div id=\"menu5\" class=\"tab-pane fade\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Albanian associations in other cities</span></span></h2>\r\n<p>&nbsp;</p>\r\n<hr />\r\n<div class=\"row\">\r\n<div class=\"col-sm-4\">\r\n<h2><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Exile Association</span></span></h2>\r\n<p><br /><a href=\"https://www.facebook.com/SH.K.S.Mergimi/\" target=\"_blank\" rel=\"noopener\"><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Facebook</span></span></a></p>\r\n</div>\r\n<div class=\"col-sm-2\"><a href=\"https://www.facebook.com/SH.K.S.Mergimi\" target=\"_blank\" rel=\"noopener\"><img src=\"img/mergimi.jpg\" width=\"100%\" /></a></div>\r\n<div class=\"col-sm-4\">\r\n<h2>&nbsp;</h2>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-sm-2\"><a target=\"_blank\" rel=\"noopener\"><img src=\"img/.jpg\" width=\"100%\" /></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Albanian Associations in Austria\r\nassociations\r\nVienna\r\nLinz\r\nSalzburg\r\nGraz\r\nOther cities\r\nWelcome\r\nWe have ranked Albanian associations in Austria based on the cities where Albanians are most concentrated and their activities.\r\n\r\nAlbanian Associations in Vienna\r\n\"Alexander Moses\"\r\ninfo@moisiu.eu \r\nwww.moisiu.eu\r\n\r\n\r\n\"Albanian Football League\" Austria\r\nliga@ligashqiptare.eu \r\nwww.ligashqiptare.eu\r\n\r\n\r\nKosovarisch Österreichische Gesellschaft\r\ninfo@OeKG-ks.org \r\nwww.oekg-ks.org\r\n\r\n\r\n\r\noffice@iliret.eu \r\nwww.iliret.eu\r\n\r\n\r\nCultural Association \"June 12\"\r\n\r\nFacebook\r\n\r\n\r\nAlbanian Association Two July\r\n\r\nFacebook\r\n\r\n\r\nAssociations in Linz\r\n\r\n\r\n\"Bujaria\" Association\r\nWienerstr. 288 \r\n4030 Linz \r\nwww.bujaria.at\r\n\r\n\r\nUnion Association\r\n\r\nwww.xhamia-linz.at\r\n\r\n\r\nRadio Repentance\r\n\r\nwww.radio-pendimi.com\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAlbanian Associations in Salzburg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAlbanian Associations in Graz\r\n\r\n\r\nHomeland Association\r\n\r\nFacebook\r\n\r\n\r\n\r\n\r\n\r\n\r\nAlbanian associations in other cities\r\n\r\n\r\nExile Association\r\n\r\nFacebook', NULL, NULL, 9, 1, NULL, 6, 1, NULL, '2020-05-10 05:17:46', '2020-05-15 20:38:33'),
(2, 'Contact Us', 'contacts', '<div>Welcome to our contact us page updated</div>', 'Meta Updated', 'Contact Us-1589345574-logo.png', NULL, 2, 0, NULL, 2, 1, 1, '2020-05-10 05:17:46', '2020-05-14 20:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'settings.view', 'settings', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(2, 'settings.edit', 'settings', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(3, 'permission.view', 'permission', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(4, 'permission.create', 'permission', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(5, 'permission.edit', 'permission', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(6, 'permission.delete', 'permission', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(7, 'admin.view', 'admin', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(8, 'admin.create', 'admin', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(9, 'admin.edit', 'admin', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(10, 'admin.delete', 'admin', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(11, 'admin_profile.view', 'admin_profile', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(12, 'admin_profile.edit', 'admin_profile', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(13, 'role.view', 'role', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(14, 'role.create', 'role', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(15, 'role.edit', 'role', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(16, 'role.delete', 'role', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(17, 'user.view', 'user', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(18, 'user.create', 'user', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(19, 'user.edit', 'user', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(20, 'user.delete', 'user', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(21, 'category.view', 'category', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(22, 'category.create', 'category', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(23, 'category.edit', 'category', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(24, 'category.delete', 'category', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(25, 'page.view', 'page', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(26, 'page.create', 'page', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(27, 'page.edit', 'page', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(28, 'page.delete', 'page', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(29, 'blog.view', 'blog', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(30, 'blog.create', 'blog', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(31, 'blog.edit', 'blog', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(32, 'blog.delete', 'blog', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(33, 'slider.view', 'slider', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(34, 'slider.create', 'slider', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(35, 'slider.edit', 'slider', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(36, 'slider.delete', 'slider', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(37, 'tracking.view', 'tracking', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(38, 'tracking.delete', 'tracking', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(39, 'email_notification.view', 'email_notification', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(40, 'email_notification.edit', 'email_notification', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(41, 'email_message.view', 'email_message', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(42, 'email_message.edit', 'email_message', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(43, 'module.view', 'module', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(44, 'module.create', 'module', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(45, 'module.edit', 'module', 'admin', '2020-05-10 05:17:46', '2020-05-10 05:17:46'),
(46, 'module.delete', 'module', 'admin', '2020-05-10 05:17:46', '2020-05-10 05:17:46'),
(47, 'module.toggle', 'module', 'admin', '2020-05-10 05:17:46', '2020-05-10 05:17:46'),
(48, 'dashboard.view', 'dashboard', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(4, 'Editor', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(5, 'Super Admin', 'admin', '2020-05-10 05:17:45', '2020-05-10 05:17:45'),
(10, 'New Role', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5),
(1, 10),
(2, 5),
(2, 10),
(3, 5),
(3, 10),
(4, 5),
(4, 10),
(5, 5),
(5, 10),
(6, 5),
(6, 10),
(7, 5),
(7, 10),
(8, 5),
(8, 10),
(9, 5),
(9, 10),
(10, 5),
(10, 10),
(11, 3),
(11, 4),
(11, 5),
(11, 10),
(12, 3),
(12, 4),
(12, 5),
(12, 10),
(13, 5),
(13, 10),
(14, 5),
(14, 10),
(15, 5),
(15, 10),
(16, 5),
(16, 10),
(17, 5),
(17, 10),
(18, 5),
(18, 10),
(19, 5),
(19, 10),
(20, 5),
(20, 10),
(21, 3),
(21, 4),
(21, 5),
(21, 10),
(22, 3),
(22, 4),
(22, 5),
(22, 10),
(23, 3),
(23, 4),
(23, 5),
(23, 10),
(24, 3),
(24, 5),
(24, 10),
(25, 3),
(25, 4),
(25, 5),
(25, 10),
(26, 3),
(26, 4),
(26, 5),
(26, 10),
(27, 3),
(27, 4),
(27, 5),
(27, 10),
(28, 3),
(28, 5),
(28, 10),
(29, 3),
(29, 5),
(29, 10),
(30, 3),
(30, 4),
(30, 5),
(30, 10),
(31, 3),
(31, 4),
(31, 5),
(31, 10),
(32, 3),
(32, 5),
(32, 10),
(33, 5),
(33, 10),
(34, 5),
(34, 10),
(35, 5),
(35, 10),
(36, 5),
(36, 10),
(37, 5),
(37, 10),
(38, 5),
(38, 10),
(39, 5),
(39, 10),
(40, 5),
(40, 10),
(41, 5),
(41, 10),
(42, 5),
(42, 10),
(43, 5),
(43, 10),
(44, 5),
(44, 10),
(45, 5),
(45, 10),
(46, 5),
(46, 10),
(47, 5),
(47, 10),
(48, 3),
(48, 4),
(48, 5),
(48, 10);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'My Admin Dynamo',
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `site_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_working_day_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_custom_data4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'If there is possible to keep any reference link',
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `description`, `reference_link`, `admin_id`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'maniruzzamanakash', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 07:55:22', '2020-05-11 07:55:22'),
(2, 'maniruzzamanakash1', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 08:01:05', '2020-05-11 08:01:05'),
(3, 'maniruzzamanakash2', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 08:06:29', '2020-05-11 08:06:29'),
(4, 'maniruzzaman2akash', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 08:56:57', '2020-05-11 08:56:57'),
(5, 'maniruzzaman12akash', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 08:59:39', '2020-05-11 08:59:39'),
(6, 'maniruzzama12akash', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 09:02:14', '2020-05-11 09:02:14'),
(7, 'maniruzzama12akash', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-11 16:06:51', '2020-05-11 16:06:51'),
(8, 'maniruzzama12akash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 16:13:14', '2020-05-11 16:13:14'),
(9, 'maniruzzama12akash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 16:13:22', '2020-05-11 16:13:22'),
(10, 'maniruzzama12akash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 16:13:33', '2020-05-11 16:13:33'),
(11, 'maniruzzama12akash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 16:18:06', '2020-05-11 16:18:06'),
(12, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:06:59', '2020-05-11 23:06:59'),
(13, 'editor', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:08:36', '2020-05-11 23:08:36'),
(14, 'editor', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:19:45', '2020-05-11 23:19:45'),
(15, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:38:11', '2020-05-11 23:38:11'),
(16, 'editor', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:41:52', '2020-05-11 23:41:52'),
(17, 'editor', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:42:01', '2020-05-11 23:42:01'),
(18, 'editor', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:42:14', '2020-05-11 23:42:14'),
(19, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-11 23:43:09', '2020-05-11 23:43:09'),
(20, 'maniruzzamanakash1', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 10:02:59', '2020-05-12 10:02:59'),
(21, 'maniruzzama12akash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 10:03:41', '2020-05-12 10:03:41'),
(22, 'maniruzzamanakash', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 19:19:07', '2020-05-12 19:19:07'),
(23, 'adminblogwriterhasan', 'New Admin has been created', NULL, 1, NULL, NULL, '2020-05-12 19:19:49', '2020-05-12 19:19:49'),
(24, 'adminblogwriterhasan', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 19:19:58', '2020-05-12 19:19:58'),
(25, 'adminblogwriterhasan', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 19:20:48', '2020-05-12 19:20:48'),
(26, 'Category', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:08:12', '2020-05-12 20:08:12'),
(27, 'Sub Category', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:09:29', '2020-05-12 20:09:29'),
(28, 'Sub Category', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:11:22', '2020-05-12 20:11:22'),
(29, 'Category Real', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:34:30', '2020-05-12 20:34:30'),
(30, 'Category Image', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:45:45', '2020-05-12 20:45:45'),
(31, 'Simple Category', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:48:47', '2020-05-12 20:48:47'),
(32, 'Test', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-12 20:50:38', '2020-05-12 20:50:38'),
(33, 'simple', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:36:33', '2020-05-12 21:36:33'),
(34, 'finalcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:36:53', '2020-05-12 21:36:53'),
(35, 'finalcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:37:04', '2020-05-12 21:37:04'),
(36, 'finalcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:37:53', '2020-05-12 21:37:53'),
(37, 'finalcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:38:23', '2020-05-12 21:38:23'),
(38, 'earning', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:38:33', '2020-05-12 21:38:33'),
(39, 'simple', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:38:42', '2020-05-12 21:38:42'),
(40, 'image', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:39:31', '2020-05-12 21:39:31'),
(41, 'image', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:39:47', '2020-05-12 21:39:47'),
(42, 'earning', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:41:02', '2020-05-12 21:41:02'),
(43, 'realcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 21:41:27', '2020-05-12 21:41:27'),
(44, 'Test Page', 'New Page has been created', NULL, 1, NULL, NULL, '2020-05-12 22:29:50', '2020-05-12 22:29:50'),
(45, 'Test Page Updated', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 22:45:16', '2020-05-12 22:45:16'),
(46, 'Test Page Updated', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 22:45:25', '2020-05-12 22:45:25'),
(47, 'Test Page Updated', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 22:45:43', '2020-05-12 22:45:43'),
(48, 'Test Page Updated', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 22:45:54', '2020-05-12 22:45:54'),
(49, 'Contact Us', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-12 22:52:54', '2020-05-12 22:52:54'),
(50, 'superadmin', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-13 06:06:42', '2020-05-13 06:06:42'),
(51, 'Admin 2', 'New Role has been created', NULL, 1, NULL, NULL, '2020-05-13 18:59:51', '2020-05-13 18:59:51'),
(52, 'Another Super Admin', 'New Role has been created', NULL, 1, NULL, NULL, '2020-05-13 19:58:42', '2020-05-13 19:58:42'),
(53, 'New Role', 'New Role has been created', NULL, 1, NULL, NULL, '2020-05-13 20:47:14', '2020-05-13 20:47:14'),
(54, 'Another Role', 'New Role has been created', NULL, 1, NULL, NULL, '2020-05-13 20:48:58', '2020-05-13 20:48:58'),
(55, 'Admin 2', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 16:01:31', '2020-05-14 16:01:31'),
(56, 'Admin 2', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 16:01:43', '2020-05-14 16:01:43'),
(57, 'Admin 2', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 16:01:53', '2020-05-14 16:01:53'),
(58, 'Admin 2', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 16:02:04', '2020-05-14 16:02:04'),
(59, 'Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 16:13:47', '2020-05-14 16:13:47'),
(60, 'First Test', 'New Blog has been created', NULL, 1, NULL, NULL, '2020-05-14 20:48:20', '2020-05-14 20:48:20'),
(61, 'First Test Updated', 'Blog has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 20:51:21', '2020-05-14 20:51:21'),
(62, 'First Test Updated', 'Blog has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 20:52:17', '2020-05-14 20:52:17'),
(63, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 21:18:56', '2020-05-14 21:18:56'),
(64, 'Super Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 21:19:56', '2020-05-14 21:19:56'),
(65, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 21:20:42', '2020-05-14 21:20:42'),
(66, 'Admin', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 21:21:01', '2020-05-14 21:21:01'),
(67, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 21:21:22', '2020-05-14 21:21:22'),
(68, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 21:24:55', '2020-05-14 21:24:55'),
(69, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 22:01:42', '2020-05-14 22:01:42'),
(70, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 22:41:04', '2020-05-14 22:41:04'),
(71, 'editor', 'Admin has been updated successfully !!', NULL, 3, NULL, NULL, '2020-05-14 22:56:23', '2020-05-14 22:56:23'),
(72, 'editor', 'Admin has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 23:13:24', '2020-05-14 23:13:24'),
(73, 'editor', 'Admin has been updated successfully !!', NULL, 3, NULL, NULL, '2020-05-14 23:13:47', '2020-05-14 23:13:47'),
(74, 'admin', 'Admin has been updated successfully !!', NULL, 2, NULL, NULL, '2020-05-14 23:16:52', '2020-05-14 23:16:52'),
(75, 'About Us', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-14 23:37:46', '2020-05-14 23:37:46'),
(76, 'Maniruzzaman Akash', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-15 05:37:38', '2020-05-15 05:37:38'),
(77, 'life-style', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 05:43:54', '2020-05-15 05:43:54'),
(78, 'life-style', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 05:44:14', '2020-05-15 05:44:14'),
(79, 'life-style', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 05:44:47', '2020-05-15 05:44:47'),
(80, 'life-style', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 05:44:57', '2020-05-15 05:44:57'),
(81, 'Editor', 'Role has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 06:15:44', '2020-05-15 06:15:44'),
(82, 'First Test Updated', 'Blog has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 06:16:24', '2020-05-15 06:16:24'),
(83, 'First Test Updated', 'Blog has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 09:42:49', '2020-05-15 09:42:49'),
(84, 'category', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:20:37', '2020-05-15 20:20:37'),
(85, 'austria', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:21:22', '2020-05-15 20:21:22'),
(86, 'life-style', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:28:38', '2020-05-15 20:28:38'),
(87, 'fashion', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:28:47', '2020-05-15 20:28:47'),
(88, 'maniruzzamanakash', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:28:54', '2020-05-15 20:28:54'),
(89, 'finalcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:29:02', '2020-05-15 20:29:02'),
(90, 'realcategory', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:29:15', '2020-05-15 20:29:15'),
(91, 'image', 'Category has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:31:11', '2020-05-15 20:31:11'),
(92, 'Latest News', 'New Category has been created', NULL, 1, NULL, NULL, '2020-05-15 20:31:47', '2020-05-15 20:31:47'),
(93, 'About Us', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:36:19', '2020-05-15 20:36:19'),
(94, 'Albanian Associations in Austria', 'Page has been updated successfully !!', NULL, 1, NULL, NULL, '2020-05-15 20:38:33', '2020-05-15 20:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=active, 0=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_created_by_foreign` (`created_by`),
  ADD KEY `admins_updated_by_foreign` (`updated_by`),
  ADD KEY `admins_deleted_by_foreign` (`deleted_by`),
  ADD KEY `admins_first_name_index` (`first_name`),
  ADD KEY `admins_phone_no_index` (`phone_no`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_created_by_foreign` (`created_by`),
  ADD KEY `blogs_updated_by_foreign` (`updated_by`),
  ADD KEY `blogs_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_created_by_foreign` (`created_by`),
  ADD KEY `categories_updated_by_foreign` (`updated_by`),
  ADD KEY `categories_deleted_by_foreign` (`deleted_by`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_updated_by_foreign` (`updated_by`),
  ADD KEY `contacts_deleted_by_foreign` (`deleted_by`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_created_by_foreign` (`created_by`),
  ADD KEY `pages_updated_by_foreign` (`updated_by`),
  ADD KEY `pages_deleted_by_foreign` (`deleted_by`),
  ADD KEY `pages_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracks_deleted_by_foreign` (`deleted_by`),
  ADD KEY `tracks_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`),
  ADD KEY `users_first_name_index` (`first_name`),
  ADD KEY `users_phone_no_index` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tracks_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
