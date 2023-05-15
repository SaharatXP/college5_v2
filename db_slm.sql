-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 15, 2023 at 06:44 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_slm`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'TOYOTA'),
(2, 'ISZUZU');

-- --------------------------------------------------------

--
-- Table structure for table `car_sells`
--

CREATE TABLE `car_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_down_amount` double(8,2) NOT NULL,
  `customer_occ_id` int(11) NOT NULL,
  `customer_cs_id` int(11) DEFAULT NULL,
  `customer_source_id` int(11) NOT NULL,
  `cus_type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vehicle_registration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(11) NOT NULL,
  `case_group_id` int(11) NOT NULL,
  `finance_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_sells`
--

INSERT INTO `car_sells` (`id`, `customer_fname`, `customer_lname`, `customer_nickname`, `customer_tel`, `customer_email`, `customer_down_amount`, `customer_occ_id`, `customer_cs_id`, `customer_source_id`, `cus_type_id`, `brand_id`, `vehicle_registration`, `model_id`, `case_group_id`, `finance_id`, `staff_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'สมชาย', 'สมชาย', 'สมชาย', '0646486468', 'somchai@mail.com', 2000.00, 1, 1, 1, 3, 1, '2กก 2222', 1, 11, 1, 1, 'note', '2023-05-04 10:23:08', '2023-05-04 10:23:08'),
(2, 'สมหญิง', 'สมหญิง', 'สมหญิง', '0646486468', 'somying@gmail.com', 5000.00, 2, 1, 3, 1, 1, '1 กก 2566', 1, 4, 1, 1, '+++', '2023-05-03 10:24:24', '2023-05-03 10:24:24'),
(4, 'สมหญิง', 'สมหญิง', 'หญิง', '0646486468', 'somying@mail.com', 500000.00, 1, 2, 2, 1, 2, '1กก2512', 1, 4, 2, 2, 'แถมหมวกกันน็อค', '2023-05-03 17:50:10', '2023-05-03 17:50:10'),
(5, 'as', 'as', 'as', '0899934584', 'bankxx@mail.com', 7.00, 1, 1, 1, 1, 1, '1111', 1, 3, 1, 2, NULL, '2023-05-03 17:57:09', '2023-05-03 17:57:09'),
(6, 'sa', 'sa', 'sa', '0646486468', 'bankxx@mail.com', 50000.00, 2, 1, 1, 1, 1, '1กก2512', 1, 8, 1, 1, 'assasas', '2023-05-02 17:57:26', '2023-05-02 17:57:26'),
(7, 'xxc', 'xxc', '22', '0899934584', 'bankxx@mail.com', 500000.00, 2, 1, 1, 1, 1, '1กก2512', 1, 4, 1, 1, NULL, '2023-05-03 17:57:52', '2023-05-03 17:57:52'),
(8, 'สมหญิง', 'สมหญิง', 'หญิง', '0646486468', 'somying@mail.com', 5000.00, 2, 6, 1, 1, 1, '1กก2513', 1, 3, 1, 2, 'ddd', '2023-05-04 03:41:09', '2023-05-04 03:41:09'),
(9, 'สมหญิง', 'สมหญิง', '22', '0899934584', 'bankxx@mail.com', 60000.00, 2, 6, 4, 1, 2, '1กก1111', 1, 3, 3, 1, '+++++', '2023-05-04 05:20:22', '2023-05-04 05:20:22'),
(10, 'สมหญิง', 'สมหญิง', '22', '0899934584', 'somying@mail.com', 5000.00, 2, 1, 4, 3, 1, '1กก2512', 2, 4, 2, 1, '++++++', '2023-05-13 15:35:03', '2023-05-13 15:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `case_group`
--

CREATE TABLE `case_group` (
  `case_group_id` int(11) NOT NULL,
  `case_group_name` varchar(255) NOT NULL,
  `case_group_level` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_group`
--

INSERT INTO `case_group` (`case_group_id`, `case_group_name`, `case_group_level`, `is_active`) VALUES
(3, '1.1 ปล่อยแล้ว รอเซ็น', 1, 1),
(4, '1.2 ปล่อยแล้ว ยังไม่รับรถ', 1, 1),
(7, '1 ปล่อยแล้ว', 1, 1),
(8, '2.1 ปล่อยเลย', 2, 1),
(9, '3 รอผล', 3, 1),
(10, '4 ตามงาน', 1, 1),
(11, '5 รอเซ็น', 5, 1),
(12, '6 ยกเคส', 6, 1),
(13, '7 รอคืนจอง', 7, 1),
(14, '8 คืนจอง', 8, 1),
(15, '9 ยกเลิก', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `credit_score_type`
--

CREATE TABLE `credit_score_type` (
  `cs_id` int(11) NOT NULL,
  `cs_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_score_type`
--

INSERT INTO `credit_score_type` (`cs_id`, `cs_name`) VALUES
(1, '9'),
(2, '00Q1'),
(3, '00Q2'),
(4, 'AA'),
(5, 'ซื้อสด'),
(6, 'AAA');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_lastname` varchar(255) NOT NULL,
  `customer_source_id` int(11) NOT NULL,
  `cus_nickname` varchar(255) NOT NULL,
  `occ_id` int(11) NOT NULL,
  `cus_have_credit` int(11) NOT NULL,
  `cus_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_source`
--

CREATE TABLE `customer_source` (
  `customer_source_id` int(11) NOT NULL,
  `customer_source_name` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_source`
--

INSERT INTO `customer_source` (`customer_source_id`, `customer_source_name`, `is_active`) VALUES
(1, 'TikTok', 1),
(2, 'Facebook ', 1),
(3, 'หน้าร้าน', 1),
(4, 'Line', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `cus_type_id` int(11) NOT NULL,
  `cus_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`cus_type_id`, `cus_type_name`) VALUES
(3, 'ลูกค้าจอง'),
(4, 'ลูกค้าเก่า\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `finance_id` int(11) NOT NULL,
  `finance_name` varchar(255) NOT NULL,
  `finance_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`finance_id`, `finance_name`, `finance_description`) VALUES
(1, 'ฝากเซ็น AY', ''),
(2, 'ฝากเซ็น CIMB', ''),
(3, 'ฝากเซ็น ISUZU', ''),
(4, 'ฝากเซ็น KKP', '');

-- --------------------------------------------------------

--
-- Table structure for table `finance_type`
--

CREATE TABLE `finance_type` (
  `finance_type_id` int(11) NOT NULL,
  `finance_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance_type`
--

INSERT INTO `finance_type` (`finance_type_id`, `finance_type_name`) VALUES
(1, 'เซ็นต์ที่ร้่าน'),
(2, 'ฝากเซ็นต์');

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2023_05_03_001320_create_car_sells_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_year` varchar(255) NOT NULL,
  `model_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `brand_id`, `model_year`, `model_description`) VALUES
(1, 'D-MAX 2022', 1, '2022', ''),
(2, 'GR Yaris', 2, '2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `occ_id` int(11) NOT NULL,
  `occ_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occ_id`, `occ_name`) VALUES
(1, 'พนักงานประจำ'),
(2, 'เกษตรกร');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_update`
--

CREATE TABLE `pc_update` (
  `pc_update_id` int(11) NOT NULL,
  `pc_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pc_update_description` text NOT NULL,
  `pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `id` int(11) NOT NULL,
  `prefix_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`id`, `prefix_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `prospect_customer`
--

CREATE TABLE `prospect_customer` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(255) NOT NULL,
  `pc_lastname` varchar(255) NOT NULL,
  `pc_social_contact` varchar(255) DEFAULT NULL,
  `sale_id` int(11) NOT NULL,
  `sale_percent_share` int(11) NOT NULL,
  `pc_status` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `vehicle_regis` varchar(255) NOT NULL,
  `update_at` datetime NOT NULL,
  `customer_source_id` int(11) NOT NULL,
  `pc_booking_money` int(11) NOT NULL,
  `pc_salary` int(11) NOT NULL,
  `occ_id` int(11) NOT NULL,
  `pc_credit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `schedule_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `user_id`, `day_id`, `schedule_type_id`) VALUES
(1, 2, 1, 1),
(3, 2, 4, 5),
(4, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_day`
--

CREATE TABLE `schedule_day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_day`
--

INSERT INTO `schedule_day` (`day_id`, `day_name`) VALUES
(1, 'จันทร์'),
(2, 'อังคาร'),
(3, 'พุธ'),
(4, 'พฤหัสบดี'),
(5, 'ศุกร์'),
(6, 'เสาร์'),
(7, 'อาทิตย์');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_type`
--

CREATE TABLE `schedule_type` (
  `schedule_type_id` int(11) NOT NULL,
  `schedule_type_name` varchar(255) NOT NULL,
  `schedule_type_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_type`
--

INSERT INTO `schedule_type` (`schedule_type_id`, `schedule_type_name`, `schedule_type_detail`) VALUES
(1, 'FB', ''),
(2, 'FB POP', ''),
(3, 'LINE', ''),
(4, 'LINE POP', ''),
(5, 'รับเบอร์', ''),
(6, 'รับเบอร์ POP', ''),
(7, 'LIVE เที่ยง', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_type` int(11) NOT NULL,
  `team_head_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_type`, `team_head_id`) VALUES
(1, 'SALE1', 1, 2),
(2, 'SALE2', 1, 2),
(3, 'SALE3', 1, 2),
(4, 'SALE4', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `tm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`tm_id`, `user_id`, `team_id`, `created_at`) VALUES
(1, 2, 1, '2023-04-25 07:59:15'),
(2, 3, 1, '2023-04-25 07:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `team_type`
--

CREATE TABLE `team_type` (
  `tt_id` int(11) NOT NULL,
  `tt_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team_type`
--

INSERT INTO `team_type` (`tt_id`, `tt_name`) VALUES
(1, 'SALE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `u_type_id` int(11) NOT NULL,
  `token` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_type_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `fname`, `lname`, `tel`, `nickname`, `u_type_id`, `token`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bankx', 'bank@mail.com', 'bank', 'bank', '0646486468', 'bank', 3, NULL, NULL, '$2y$10$zAfqZ.281j98ZRFhYH9iyeHr4wQsIujKWp5SpNG3R9rQ4mJ4h1SSO', NULL, '2023-05-03 01:06:36', '2023-05-03 01:06:36'),
(2, 'saharatx', 'saharatx@gmail.com', 'saharatx', 'ptk', '0646486468', 'good', 1, NULL, NULL, '$2y$10$Md4o7cx5xPzNwE0y7/2iGOcbD2TfTktbWVxQw9HkafWX8wqalfH8e', NULL, '2023-05-03 03:09:33', '2023-05-03 03:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `u_type_id` int(11) NOT NULL,
  `u_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`u_type_id`, `u_type_name`) VALUES
(1, 'SALE'),
(2, 'HEAD SALE'),
(3, 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `car_sells`
--
ALTER TABLE `car_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_group`
--
ALTER TABLE `case_group`
  ADD PRIMARY KEY (`case_group_id`);

--
-- Indexes for table `credit_score_type`
--
ALTER TABLE `credit_score_type`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `customer_source`
--
ALTER TABLE `customer_source`
  ADD PRIMARY KEY (`customer_source_id`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`cus_type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`finance_id`);

--
-- Indexes for table `finance_type`
--
ALTER TABLE `finance_type`
  ADD PRIMARY KEY (`finance_type_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occ_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pc_update`
--
ALTER TABLE `pc_update`
  ADD PRIMARY KEY (`pc_update_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospect_customer`
--
ALTER TABLE `prospect_customer`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `schedule_day`
--
ALTER TABLE `schedule_day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `schedule_type`
--
ALTER TABLE `schedule_type`
  ADD PRIMARY KEY (`schedule_type_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`tm_id`);

--
-- Indexes for table `team_type`
--
ALTER TABLE `team_type`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`u_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_sells`
--
ALTER TABLE `car_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `case_group`
--
ALTER TABLE `case_group`
  MODIFY `case_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `credit_score_type`
--
ALTER TABLE `credit_score_type`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_source`
--
ALTER TABLE `customer_source`
  MODIFY `customer_source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `cus_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `finance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `finance_type`
--
ALTER TABLE `finance_type`
  MODIFY `finance_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pc_update`
--
ALTER TABLE `pc_update`
  MODIFY `pc_update_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prospect_customer`
--
ALTER TABLE `prospect_customer`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule_day`
--
ALTER TABLE `schedule_day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule_type`
--
ALTER TABLE `schedule_type`
  MODIFY `schedule_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_type`
--
ALTER TABLE `team_type`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `u_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
