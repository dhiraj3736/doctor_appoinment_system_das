-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 06:22 AM
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
-- Database: `odas_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'dhiraj@gmail.com', '432639de2357c9d560a9c3d022d3fc8a', NULL, NULL, 'admin'),
(2, 'kritan@gmail.com', '554b0a0c32d80d1bc6814db945674bf8', NULL, NULL, 'receptionis');

-- --------------------------------------------------------

--
-- Table structure for table `average_rating`
--

CREATE TABLE `average_rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `average_rating` double(2,1) DEFAULT NULL,
  `number_of_reviews` int(11) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `average_rating`
--

INSERT INTO `average_rating` (`id`, `average_rating`, `number_of_reviews`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 4.3, 3, 4, '2024-07-05 23:24:08', '2024-07-18 22:29:59'),
(8, 4.0, 2, 11, '2024-07-05 23:55:46', '2024-07-21 23:53:01'),
(9, 4.0, 1, 19, '2024-07-05 23:59:44', '2024-07-06 00:00:16'),
(10, 3.5, 2, 8, '2024-07-06 00:12:26', '2024-07-06 00:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('female','male','other') DEFAULT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `doctor` varchar(255) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `time` time NOT NULL,
  `number` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `name`, `gender`, `date`, `email`, `address`, `service`, `doctor`, `reason`, `time`, `number`, `created_at`, `updated_at`, `u_id`, `status`, `payment`) VALUES
(1, 'Simran shah', 'female', '2024-04-24', 'simran@gmail.com', 'Bhaisepati', 'Specialist Consultation', 'Dhiraj bikram shah', NULL, '16:30:00', '98968843738', '2024-04-20 03:00:44', '2024-04-20 05:24:55', 57, 2, 1000),
(2, 'Dhiraj bikram shah', 'male', '2024-04-23', 'dhirajbikram@hotmail.com', 'pharping,kathmandu', 'Specialist Consultation', 'Milan aryal', NULL, '06:16:00', '98968843738', '2024-04-20 05:46:46', '2024-04-20 07:03:48', 48, 2, 1000),
(5, 'Dhiraj bikram shah', 'male', '2024-05-22', 'dhirajbikram@hotmail.com', 'Bhaisepati', 'Specialist Consultation', 'Dhiraj bikram shah', NULL, '12:02:00', '98968843736', '2024-05-19 10:27:39', '2024-05-19 10:33:17', 48, 2, 1000),
(6, 'Diksha ghimire', 'female', '2024-05-23', 'diksha@gmail.com', 'ramechap', 'Specialist Consultation', 'Dhiraj bikram shah', NULL, '10:36:00', '98968843736', '2024-05-20 20:06:12', '2024-05-20 20:53:20', 51, 1, NULL),
(7, 'dhiraj', 'male', '2024-06-12', 'dhiraj@gmail.com', 'chhaimale', 'Specialist Consultation', 'Dhiraj bikram shah', NULL, '14:15:00', '9868847646', '2024-06-08 04:55:42', '2024-06-08 04:58:15', 48, 1, NULL),
(8, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', NULL, '01:30:00', '98968843736', '2024-07-07 11:26:55', '2024-07-08 09:45:14', 57, 0, NULL),
(9, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', NULL, '01:30:00', '98968843736', '2024-07-07 11:27:27', '2024-07-07 11:27:27', 57, 0, NULL),
(10, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Sanjeev', NULL, '14:30:00', '98968843736', '2024-07-08 09:24:48', '2024-07-24 00:40:31', 57, 1, NULL),
(11, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', NULL, '02:00:00', '98968843736', '2024-07-09 06:48:29', '2024-07-09 06:48:29', 57, 0, NULL),
(12, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', NULL, '02:00:00', '98968843736', '2024-07-09 06:49:22', '2024-07-09 06:49:22', 57, 0, NULL),
(17, 'Dhiraj Bikram Shah', NULL, '2024-07-12', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'Headache', '02:30:00', '98968843738', '2024-07-11 09:39:17', '2024-07-11 09:39:17', 48, 0, NULL),
(18, 'Dhiraj Bikram Shah', NULL, '2024-07-12', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'headache', '03:00:00', '98968843738', '2024-07-11 09:43:05', '2024-07-11 09:43:05', 48, 2, NULL),
(19, 'Dhiraj Bikram Shah', NULL, '2024-07-15', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'Headache', '02:30:00', '98968843738', '2024-07-12 07:45:23', '2024-07-12 07:45:23', 48, 0, NULL),
(22, 'Dhiraj Bikram Shah', NULL, '2024-07-20', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', 'Specialist Consultation', 'Dhiraj bikram shah', 'taukodhukyo', '02:00:00', '98968843738', '2024-07-12 10:08:11', '2024-07-13 04:20:13', 48, 2, 1000),
(23, 'merian shah', NULL, '2024-07-15', 'merian@gmail.com', 'chhaimale', NULL, 'DR. Diksha', 'tauko Dukhya', '17:49:00', '98968843738', '2024-07-12 10:37:56', '2024-07-13 03:01:26', 63, 1, NULL),
(24, 'Dhiraj Bikram Shah', NULL, '2024-07-23', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', 'Specialist Consultation', 'Dan Bikram  Shah', 'testing', '11:30:00', '98968843738', '2024-07-19 03:51:19', '2024-07-19 03:51:19', 48, 1, NULL),
(25, 'Dhiraj Bikram Shah', NULL, '2024-07-27', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', 'khutta', '10:00:00', '98968843738', '2024-07-23 09:21:41', '2024-07-23 10:39:06', 48, 2, 0),
(26, 'merian shah', NULL, '2024-07-27', 'merian@gmail.com', 'chhaimale', NULL, 'Kritan shah', 'Tauko hukhyo', '14:00:00', '98968843738', '2024-07-25 07:57:34', '2024-07-25 07:57:34', 63, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nmc_no` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `experiance` varchar(255) NOT NULL,
  `price` varchar(50) DEFAULT NULL,
  `fromtime` time NOT NULL,
  `totime` time NOT NULL,
  `service_id` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `name`, `nmc_no`, `specialist`, `qualification`, `experiance`, `price`, `fromtime`, `totime`, `service_id`, `image`, `created_at`, `updated_at`, `description`) VALUES
(4, 'Dhiraj bikram shah', '4488', 'Neurologist', 'mbbs', '3 year', NULL, '01:00:00', '05:00:00', '[\"2\",\"3\",\"10\"]', '1710251147-doctor.jpg', '2024-03-12 08:00:47', '2024-04-01 05:29:04', ''),
(8, 'Milan aryal', '4455', 'Anesthesiologists', 'mbbs,md', '2 year', NULL, '07:00:00', '06:00:00', '[\"14\",\"9\",\"10\"]', '1710331610-doctor.jpg', '2024-03-13 06:21:50', '2024-03-13 06:21:50', ''),
(9, 'Sanjeev', '4455', 'Neurologist', 'mbbs,md', '4455', NULL, '14:00:00', '18:00:00', NULL, '1712125277-doctor.jpg', '2024-03-13 09:03:29', '2024-04-03 00:36:18', ''),
(10, 'DR. Diksha', '4455', 'Anesthesiologists', 'mbbs,md', '4455', NULL, '16:19:00', '18:17:00', NULL, '1711518150-doctor.png', '2024-03-26 23:57:30', '2024-06-22 04:47:20', ''),
(11, 'Kritan shah', '1222', 'Anesthesiologists', 'mbbs,md', '2 year', NULL, '13:00:00', '17:00:00', NULL, '1713160316-doctor.jpg', '2024-04-15 00:06:56', '2024-04-15 00:06:56', ''),
(18, 'hari', '88554', 'gynecologist', 'mbbs,md', '88554', '700', '00:15:00', '16:15:00', '[\"9\",\"10\",\"14\"]', '1719509479-doctor.jfif', '2024-06-27 11:46:20', '2024-07-23 08:21:24', 'hyyy'),
(19, 'juna', '78945', 'gynecologist', 'mbbs,md', '78945', '10', '01:00:00', '16:00:00', '[\"2\",\"9\"]', '1719555013-doctor.jfif', '2024-06-28 00:25:13', '2024-07-23 08:27:10', 'kddkdkk'),
(20, 'Dan Bikram  Shah', '8565', 'dentist', 'BDS', '8565', '10', '08:00:00', '16:00:00', '[\"17\"]', '1720452895-doctor.jfif', '2024-07-08 09:49:55', '2024-07-23 08:26:04', 'qwdwed   2wed'),
(24, 'Alisha shah', '445622', 'Neurologist', 'mbbs,md', '445622', '10', '09:00:00', '13:00:00', '[\"2\",\"3\"]', '1721743687-doctor.jfif', '2024-07-23 08:23:07', '2024-07-23 08:25:44', 'qwdwed');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_report`
--

CREATE TABLE `doctor_report` (
  `r_id` bigint(20) UNSIGNED NOT NULL,
  `report` text NOT NULL,
  `b_id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_report`
--

INSERT INTO `doctor_report` (`r_id`, `report`, `b_id`, `u_id`, `created_at`, `updated_at`) VALUES
(1, 'asdcsiuh aisdh \r\nhiwqfudh', 5, 48, '2024-05-19 21:13:01', '2024-05-19 21:13:01'),
(2, 'kjhewf uihewf iuhwe f', 10, 57, '2024-07-24 00:40:45', '2024-07-24 00:40:45'),
(3, 'hello merian', 23, 63, '2024-07-24 02:13:24', '2024-07-24 02:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_vendor`
--

CREATE TABLE `doctor_vendor` (
  `v_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_vendor`
--

INSERT INTO `doctor_vendor` (`v_id`, `name`, `email`, `Password`, `created_at`, `updated_at`) VALUES
(4, 'Dhiraj bikram shah', 'dhirajbikram@hotmail.com', '432639de2357c9d560a9c3d022d3fc8a', '2024-03-27 04:41:32', '2024-04-01 21:17:40'),
(5, 'Milan aryal', 'milanaryal@gmail.com', '83227a721a3363d2c78381664c78657f', '2024-03-27 04:41:46', '2024-03-27 04:41:46'),
(6, 'Sanjeev', 'sanjeev@gmail.com', '98d34c1758b15b5a359b69c2b08c5767', '2024-03-27 04:42:03', '2024-03-27 04:42:03'),
(8, 'DR. Diksha', 'diksha@gmail.com', '44c4c9bb880e98e432bac9d8ba467366', '2024-03-27 04:43:44', '2024-03-27 04:43:44'),
(9, 'Kritan shah', 'kritan@gmail.com', '554b0a0c32d80d1bc6814db945674bf8', '2024-04-15 00:07:43', '2024-04-15 00:07:43'),
(13, 'Dan Bikram  Shah', 'dan@gmail.com', 'b345736a2d1d12fb73cea42ceaeb0851', '2024-07-08 09:50:35', '2024-07-08 09:50:35');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_25_162135_create_signup_table', 2),
(6, '2024_03_03_133537_create_book_table', 3),
(8, '2024_03_04_060158_add_column_to_book', 4),
(9, '2024_03_10_092308_add_column_to_book', 5),
(10, '2024_03_11_053339_create_service_table', 6),
(11, '2024_03_12_101058_create_doctor_table', 7),
(12, '2024_03_12_140242_add_column_qulification_to_doctor', 8),
(13, '2024_03_12_140922_add_column_qulification_to_doctor', 9),
(14, '2024_03_20_092928_create_doctor_vendor_table', 10),
(16, '2024_03_23_072655_add_vendor_id_to_books_table', 12),
(17, '2024_03_23_082501_add_v_id_to_book_table', 13),
(19, '2024_03_23_050229_create_admin_table', 14),
(20, '2024_03_24_131243_add_column_to_signup', 15),
(21, '2024_03_26_062227_create_notifications_table', 16),
(22, '2024_03_27_052936_add_column_to_doctor', 17),
(23, '2024_03_30_112419_add_column_to_signup', 18),
(24, '2024_03_30_112745_add_profile_photo_to_signup_table', 19),
(25, '2024_04_02_050813_create_doctor_report_table', 20),
(26, '2024_05_20_040420_add_role_to_admin_table', 21),
(27, '2024_05_20_040752_add_role_to_admin', 22),
(28, '2024_05_20_041010_add_role_to_admin_table', 23),
(30, '2024_05_20_041510_add_role_to_admin', 24),
(31, '2024_05_20_042101_add_role_to_admin_table', 25),
(32, '2024_05_20_042356_add_role_to_admin_table', 26),
(33, '2024_05_20_042457_add_role_to_signup_table', 27),
(34, '2024_05_20_042647_add_role_to_users_table', 28),
(35, '2024_06_27_050851_add_image_to_service', 29),
(36, '2024_06_27_051253_add_image_to_service_table', 30),
(37, '2024_07_03_165741_create_table_feedback', 31),
(38, '2024_07_06_041251_create_average_rating_table', 32);

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('037f07ac-7e15-4427-8f46-408ccd8c5421', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('03c018be-9898-4630-8cf5-5b5e5de62b4c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('03d3ed2b-c49a-43be-8810-9e11c2947ae6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('0594ffff-12b6-4136-a443-7b30320e486e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('07189b66-09e9-4193-99a6-c469afbb67af', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('0e3c3aa9-7405-4b52-b874-01bb0084cc26', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"Merian Shah\",\"doctor\":null}', NULL, '2024-05-12 08:26:28', '2024-05-12 08:26:28'),
('0eb6ed25-74f0-4e77-945a-c1e14c72c66a', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"merian shah\"}', NULL, '2024-04-20 07:24:51', '2024-04-20 07:24:51'),
('1104adab-b023-4d66-a84a-1c401f20eedc', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-05-19 10:33:17', '2024-05-19 10:33:17'),
('12358b0a-c7d3-4160-a220-e782b41a7f3c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('13161244-02ca-4ed6-8c1b-aa63e6f6a213', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 63, '{\"b_id\":\"23\",\"doctor\":\"DR. Diksha\"}', '2024-07-25 07:55:13', '2024-07-24 02:13:25', '2024-07-25 07:55:13'),
('13ba82e4-502d-45d4-b508-245f31b5d691', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Sabin Achary\"}', NULL, '2024-07-08 09:53:22', '2024-07-08 09:53:22'),
('156d5f8a-8f16-4078-9c6e-2458608cd385', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('1a4bbb06-8b86-4bb1-b30d-a6d2e6b506a5', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:06:04', '2024-04-20 06:43:35', '2024-04-20 07:06:04'),
('1c0d6dc1-4967-4c1a-bc23-a58f2ff790fa', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":null}', '2024-06-07 08:53:41', '2024-05-19 10:29:49', '2024-06-07 08:53:41'),
('1de00aa0-35f2-4158-bbff-748b24503cd3', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"dhiraj\",\"doctor\":null}', '2024-07-25 02:23:43', '2024-06-08 04:58:15', '2024-07-25 02:23:43'),
('21c5204b-f070-4a01-b350-5613fc969320', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-05-19 10:33:17', '2024-05-19 10:33:17'),
('2a097c16-9257-4057-9151-b25640ecfadd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('2f11585a-c709-4e93-a018-dfaa731cb1d2', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('2fd0055b-7d0a-4c33-b861-d5ea22d3c9aa', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('2fe2a162-f427-4ce4-aaad-a18c52de440a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null}', '2024-05-20 00:38:31', '2024-04-20 07:35:54', '2024-05-20 00:38:31'),
('3398c314-2bb5-4624-a0f2-fc1e9095c4b2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('35d194da-2521-4970-9dd5-b354a73dd6af', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('393b1e92-3a2e-4ad0-b3be-cecf2569a580', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"Merian Shah\",\"doctor\":null}', NULL, '2024-05-19 21:11:30', '2024-05-19 21:11:30'),
('3c811f80-a887-4fec-a491-8ae49d1bd00c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-06-08 05:05:07', '2024-06-08 04:55:42', '2024-06-08 05:05:07'),
('43683a5f-4b04-44ba-8bb4-8db43e3e68ac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('455c1655-0927-4be2-99ed-6e1ab8efe691', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('4853ed1b-bb2b-4b35-8a36-5dc6261045cd', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Juna shah\"}', NULL, '2024-06-13 08:50:38', '2024-06-13 08:50:38'),
('4888add9-2fba-4bc9-9f7f-44ba9ad638e6', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Dan Bikram Shah\"}', NULL, '2024-06-08 01:10:59', '2024-06-08 01:10:59'),
('4c21421b-ebb9-468c-b8ac-c036e7092a64', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"merian shah\"}', '2024-04-20 07:29:02', '2024-04-20 07:24:51', '2024-04-20 07:29:02'),
('4c929d4f-a973-4539-8332-3b47c38d8eb5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('501f91d8-86cf-4bb0-952f-2c0be94406cd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('54786437-9dab-4385-8b78-16384b24415a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('5ab7d4dc-9e66-4ddf-969a-e277515cd1fc', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Alisha shah\"}', NULL, '2024-06-13 05:55:57', '2024-06-13 05:55:57'),
('5bf0409e-9bc6-4197-b254-e91318d57bfe', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 06:57:19', '2024-04-20 06:26:06', '2024-04-20 06:57:19'),
('5f1c8240-2f17-4607-8151-7d66422a8c19', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 57, '{\"name\":\"Simran Shah\",\"doctor\":null}', NULL, '2024-07-24 00:40:33', '2024-07-24 00:40:33'),
('5f50d7bc-05aa-4850-805c-9e4d4fd508de', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('6436ab22-51e0-48d7-8cc8-5678f2c61fe9', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"merian shah\",\"service\":\"General Check-up\"}', NULL, '2024-05-12 08:30:34', '2024-05-12 08:30:34'),
('668772d8-0bcd-4fd5-afc1-f6ab2db8d85c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('69772e59-a4dd-4059-a0bd-f14576578e47', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-07-13 03:11:22', '2024-07-13 03:11:22'),
('6aa2591e-1c39-4f2b-9e85-9256948a3a27', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('6bb26a5c-db19-4435-b9de-5847813624e2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', '2024-07-25 08:14:46', '2024-07-11 08:31:23', '2024-07-25 08:14:46'),
('71be5fec-391f-4f3a-ae97-eb96b2b9ee4d', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:05:57', '2024-04-20 06:26:06', '2024-04-20 07:05:57'),
('72bdd540-8bb0-4af7-a173-5a6744eb4112', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":null}', NULL, '2024-04-20 05:47:20', '2024-04-20 05:47:20'),
('747bdfbb-dede-4356-8a14-b7ae03e8a7ca', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"sankhar\"}', NULL, '2024-06-11 10:41:09', '2024-06-11 10:41:09'),
('78054f0c-bb70-491b-a196-04bd1177433c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('782b5928-2453-4a2c-ba9e-c10510eb94eb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('7afb6f2c-9473-41fd-bc38-6d5e230f756c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('7b4c8572-c270-47ad-b9db-847bffdada1c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('7f1a3fd6-3741-478b-80f7-77f2e61e21ba', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-04-20 06:43:35', '2024-04-20 06:43:35'),
('8066ad1a-72c6-4dac-bfe4-fcb7cfe6e8d2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', '2024-04-20 06:54:26', '2024-04-20 05:46:46', '2024-04-20 06:54:26'),
('821a8a8e-06ad-49c8-8b5f-35aadf021b2a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null}', '2024-07-25 08:37:06', '2024-07-13 03:01:26', '2024-07-25 08:37:06'),
('830d3eb2-8766-4a92-8c7d-85088f5dfd75', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', '2024-07-25 02:23:14', '2024-07-13 03:00:44', '2024-07-25 02:23:14'),
('86bc2f9b-08d4-4023-adbe-130749b87e7c', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:09:52', '2024-04-20 07:03:48', '2024-04-20 07:09:52'),
('86dfdae8-bfc7-4d78-9295-62165766042a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-04-20 07:28:55', '2024-04-20 03:00:44', '2024-04-20 07:28:55'),
('87abcb9f-9a2c-4ab0-8019-673a6425e5dd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('8b7f065b-fb9d-436f-93ca-c4edbf9ce0c3', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('907fca0e-aa0b-4d7a-a00f-43bac97018d1', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-07-13 03:11:22', '2024-07-13 03:11:22'),
('91c6d51a-278e-4a28-be50-120a813e711b', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Dan Bikram Shah\"}', NULL, '2024-06-08 01:10:59', '2024-06-08 01:10:59'),
('93ebb173-955a-4df4-aef6-ceea9ed61abd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('95aed0d1-3b95-4b9a-bcdd-a9c6dd872d11', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('978f2a32-5233-4fd5-9b8f-02f1c056bdf4', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('97c2d0b4-612d-471a-80a6-aecb69903b5a', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"merian shah\",\"service\":\"General Check-up\"}', NULL, '2024-05-12 08:30:34', '2024-05-12 08:30:34'),
('993c8d42-091c-4005-913a-8d1ee72d15ac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('9e4cc391-b422-4990-a73a-b5d40da617ed', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('a0b2fd95-10cb-4107-9baf-018b1b34b625', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('a0d548a7-1da5-4edd-8bae-42c228965044', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Juna shah\"}', NULL, '2024-06-13 08:50:38', '2024-06-13 08:50:38'),
('a5c16c8c-cf71-446b-bf3f-edc222303f7c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('aa2e2200-d8eb-4387-8911-409b3f8f1301', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('ab436c53-e3ea-4bd4-933b-dc3c15bfe261', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('ad63e927-801b-4582-8210-dc550a482ba1', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', '2024-04-20 07:09:42', '2024-04-20 05:46:46', '2024-04-20 07:09:42'),
('ae81a488-926a-4196-8feb-4d2d7c028677', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null}', NULL, '2024-05-19 21:11:40', '2024-05-19 21:11:40'),
('b07a4140-9cbc-43a0-b8a0-599fad624723', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-04-20 07:05:45', '2024-04-20 03:00:44', '2024-04-20 07:05:45'),
('b8bead8a-b16f-46f6-8cdc-bd02abcfd16d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('bb1ecda5-8592-4c00-9084-f814b5a1100a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('bdae4ff3-d1c2-43fc-b57d-a2a2577a980a', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 57, '{\"b_id\":\"10\",\"doctor\":\"Milan aryal\"}', '2024-07-24 01:27:26', '2024-07-24 00:40:46', '2024-07-24 01:27:26'),
('c15d7d42-4fb8-441a-8fbc-52397e2ba499', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Alisha shah\"}', NULL, '2024-06-13 05:55:57', '2024-06-13 05:55:57'),
('c329fac0-a8a2-42b2-8b48-4d1d9916fa98', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"Merian Shah\",\"doctor\":null}', NULL, '2024-05-19 10:22:06', '2024-05-19 10:22:06'),
('c432012d-ea58-42db-af0f-d6cb6a7593c9', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('cb72f2ec-29af-40dd-a0cd-1da844b13ffa', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('d943da6d-cc65-4fb3-9918-acae98849ccf', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 57, '{\"name\":\"Simran Shah\",\"doctor\":null}', NULL, '2024-07-08 09:45:06', '2024-07-08 09:45:06'),
('e3cdf638-84c2-4d80-81bb-0484a3f64e1e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('e507f0fc-f267-4746-9ff4-ce8c38b227de', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('e7ae5022-76d1-44a0-b364-9abefe538d0c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('e8b98af3-fc6e-4717-8df5-41cee9c96034', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 48, '{\"b_id\":\"5\"}', '2024-05-19 21:15:41', '2024-05-19 21:13:02', '2024-05-19 21:15:41'),
('f219b8ea-a496-45ce-9e1a-1db70f7adc6a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', NULL, '2024-07-11 08:31:18', '2024-07-11 08:31:18'),
('f6bf71f7-b14a-4c97-b889-4097404927ed', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:29:06', '2024-04-20 07:03:48', '2024-04-20 07:29:06'),
('f82cdfc7-0a82-4f77-a65f-0a2aad135f08', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Sabin Achary\"}', NULL, '2024-07-08 09:53:22', '2024-07-08 09:53:22'),
('f859dac3-be8c-4172-94f2-a7ab9ddbf98b', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('faa00843-331f-4a0a-8036-f15ed6d1037c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('fdb86674-e14f-48c0-a549-34194e45d942', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"sankhar\"}', NULL, '2024-06-11 10:41:09', '2024-06-11 10:41:09'),
('ff9fb1b0-2331-4ec8-82a9-1eb42604c2eb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 51, '{\"name\":\"Diksha ghimire\",\"doctor\":null}', NULL, '2024-05-20 20:53:20', '2024-05-20 20:53:20');

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
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `service`, `discription`, `price`, `created_at`, `updated_at`, `image`) VALUES
(2, 'General Check-up', 'Routine examination by a general practitioner', '1000', '2024-03-11 02:14:07', '2024-03-11 02:14:07', NULL),
(3, 'Specialist Consultation', 'Consultation with a specialist doctor such as a cardiologist, dermatologist, orthopedist, etc', '1000', '2024-03-11 02:15:08', '2024-03-11 02:15:08', NULL),
(9, 'Anesthesiology And Critical Care', 'The Department of Anesthesiology and Critical Care, Dhulikhel Hospital is dedicated for quality and safe anesthesia delivery. For this, Dhulikhel Hospital has consistently invested on the necessary technology and human resources.', '500', '2024-06-21 05:40:47', '2024-06-21 05:40:47', NULL),
(10, 'Forensic And Medical Toxicology', 'Department of Forensic Medicine & Toxicology in Dhulikhel Hospital was established since the Medical College was started. The Department deals with the medico legal cases presented in Dhulikhel Hospital along with the academic activity.', '500', '2024-06-21 05:41:38', '2024-06-21 05:41:38', NULL),
(14, 'General Check-up', 'hfgjghj', '700', '2024-06-27 00:28:29', '2024-06-27 00:28:29', '1719468809-service.jpg'),
(15, 'Anesthesiology And Critical Care', 'fgdh', '700', '2024-06-27 00:29:47', '2024-06-27 00:29:47', '1719468887-service.jfif'),
(17, 'Dental service', 'Extensive Dental Services with Qualified and Experienced Dentists in Nepal ; Working Hours. Sun - Fri. 9AM - 7PM (5PM on Saturdays) ; Book an Appointment. Book', '600', '2024-07-08 09:47:18', '2024-07-08 09:47:47', '1720452737-service.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` date DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`u_id`, `fullname`, `gender`, `username`, `password`, `address`, `number`, `email`, `created_at`, `updated_at`, `email_verified_at`, `remember_token`, `image`) VALUES
(48, 'Dhiraj Bikram Shah', 'male', 'dhiraj', '432639de2357c9d560a9c3d022d3fc8a', 'Bhaisepati, Lalitpur', '98968843738', 'dhiraj@gmail.com', '2024-03-24 23:50:09', '2024-04-20 05:17:44', '2024-03-25', 'ZDKVyBieMuZqKb6bprK9ofEWXfVV1f8fJR6xT9UD', '1711802622-doctor.jpg'),
(51, 'Diksha Ghimire', 'female', 'diksha', '44c4c9bb880e98e432bac9d8ba467366', 'ramechap', '98968843799', 'diksha@gmail.com', '2024-03-25 04:21:58', '2024-03-31 02:37:58', '2024-03-25', 'ylLP2bToHrGIKDiz3aADvX2A1vrAYevCduyOUBLL', '1711873353-doctor.jpg'),
(52, 'sanjeev dulal', 'male', 'sanjeev', '393e54209e36d7c41be43d44e4ad61ab', 'pharping,kathmandu', '98968843736', 'sanjeev@gmail.com', '2024-03-25 09:54:49', '2024-06-08 02:00:25', '2024-03-25', 'lbIB7meKKDLe3nsV2lroFZwCuh4szg1MEE5g11y8', '1711801433-doctor.jpg'),
(56, 'kriatan shah', 'female', 'kritan', '554b0a0c32d80d1bc6814db945674bf8', 'pharping,kathmandu', '9868846565', 'kritan@gmail.com', '2024-03-26 07:03:35', '2024-03-26 07:03:48', '2024-03-26', 'ZfrU4iXLvCdEsC7HWxT2QhNWngiXPcMTryGk84LZ', NULL),
(57, 'Simran Shah', 'female', 'simran', 'af4e5834b08749e4351722895ad14f5a', 'Bhaisepati', '98968843736', 'simran@gmail.com', '2024-03-26 07:35:40', '2024-04-20 02:59:31', '2024-03-26', 'vZeTICPcn2yOxChdzgUcNDsnDzupNrtnXJMXicuh', '1713602671-doctor.jpg'),
(62, 'sajen', 'male', 'sajan', '62648a5c73dbfda4d05ffb977598da5d', 'pharping,kathmandu', '98968843736', 'sajan@gmail.com', '2024-04-01 00:21:29', '2024-04-01 00:24:45', '2024-04-01', 'bnbW2LqW6QDb2oWISbkC4vBXN9GdgG5pDFt6Eo4H', '1711951785-doctor.jpg'),
(63, 'merian shah', 'female', 'merian', 'eac7ba5d8bc63e395b00e6a6754af287', 'chhaimale', '98968843738', 'merian@gmail.com', '2024-04-20 07:24:51', '2024-04-20 07:34:43', '2024-04-20', 'IzSKWNliWmhxLLXUDsdCC6SaHXSZtrazPwu1nCxZ', '1713619182-doctor.jpg'),
(64, 'Dan Bikram Shah', 'male', 'dan', '0f281d173f0fdfdccccd7e5b8edc21f1', 'chhaimale', '9841804003', 'dan@gmail.com', '2024-06-08 01:10:58', '2024-06-08 01:10:58', NULL, '1BCTS41bFQyyXm1vQi7ZwF6QpPEvtMnHIFilNtn4', NULL),
(65, 'sankhar', 'male', 'sss', '5975c85e8d2756810491f99edfa1cfed', 'Bhaisepati', '9868843736', 'sankhar@gmail.com', '2024-06-11 10:41:08', '2024-06-11 10:41:41', '2024-06-11', '52g56fhxf77fdLsVarpHXl8mkXaMqp1b52jzvqUq', NULL),
(66, 'Alisha shah', 'female', 'Alisha', 'dddf0ac818211584c38514bd95eca175', 'chhaimale', '9865321452', 'alisha@gmail.com', '2024-06-13 05:55:56', '2024-06-13 05:55:56', NULL, 'KhXPL9r7pM6158dOGvtpueiCCfos0CMMLUw6c5eO', NULL),
(111, 'Juna shah', 'female', 'juna', '0eb538dc0de6432f89c982fea915a462', 'chhaimale', '9868843736', 'juna@gmail.com', '2024-06-13 08:50:37', '2024-06-13 08:51:01', '2024-06-13', '9YERpKPdyxRyVAs7EvaNpMGCophq0CmdVm10nCrR', NULL),
(112, 'Sabin Achary', 'male', 'sabin', 'b12a7db8a9df15e19cdce7d30839dfb4', 'Chhaimale', '9865456321', 'sabin@gmail.com', '2024-07-08 09:53:21', '2024-07-08 10:09:32', '2024-07-08', 'Oa4nyYCIeqktqI2gt7vjnUuYsHHLaLTcLUVxuDyc', '1720454072-doctor.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`id`, `user_id`, `doctor_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 63, 8, 4, 'ffffffff', '2024-07-04 00:03:52', '2024-07-04 01:00:56'),
(2, 63, 4, 5, 'dddddd', '2024-07-04 01:01:34', '2024-07-04 01:02:43'),
(3, 48, 4, 4, 'jf', '2024-07-04 01:06:17', '2024-07-18 22:29:58'),
(4, 48, 19, 4, NULL, '2024-07-04 04:22:33', '2024-07-06 00:00:16'),
(5, 48, 11, 3, NULL, '2024-07-05 03:37:17', '2024-07-21 23:53:00'),
(6, 48, 8, 3, NULL, '2024-07-06 00:12:25', '2024-07-06 00:56:21'),
(7, 57, 11, 5, NULL, '2024-07-06 02:09:41', '2024-07-06 03:56:37'),
(8, 57, 4, 4, NULL, '2024-07-06 03:58:28', '2024-07-06 03:58:38'),
(9, 48, 24, 5, NULL, '2024-07-23 09:22:01', '2024-07-23 09:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `average_rating`
--
ALTER TABLE `average_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `average_rating_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `book_u_id_foreign` (`u_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `doctor_report`
--
ALTER TABLE `doctor_report`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `doctor_report_b_id_foreign` (`b_id`),
  ADD KEY `doctor_report_u_id_foreign` (`u_id`);

--
-- Indexes for table `doctor_vendor`
--
ALTER TABLE `doctor_vendor`
  ADD PRIMARY KEY (`v_id`);

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
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_feedback_user_id_foreign` (`user_id`),
  ADD KEY `table_feedback_doctor_id_foreign` (`doctor_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `average_rating`
--
ALTER TABLE `average_rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctor_report`
--
ALTER TABLE `doctor_report`
  MODIFY `r_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_vendor`
--
ALTER TABLE `doctor_vendor`
  MODIFY `v_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `s_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `average_rating`
--
ALTER TABLE `average_rating`
  ADD CONSTRAINT `average_rating_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `signup` (`u_id`);

--
-- Constraints for table `doctor_report`
--
ALTER TABLE `doctor_report`
  ADD CONSTRAINT `doctor_report_b_id_foreign` FOREIGN KEY (`b_id`) REFERENCES `book` (`b_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_report_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `signup` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD CONSTRAINT `table_feedback_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `signup` (`u_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
