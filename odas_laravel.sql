-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 03:10 PM
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
(1, 3.5, 2, 20, '2024-08-10 00:20:42', '2024-08-10 00:20:48'),
(2, 3.7, 3, 11, '2024-08-10 01:32:14', '2024-09-18 21:52:51'),
(3, 3.5, 2, 10, '2024-08-10 01:34:10', '2024-08-10 01:34:10'),
(4, 4.0, 4, 4, '2024-08-10 01:36:20', '2024-08-22 09:20:30'),
(5, 3.0, 3, 8, '2024-08-10 04:52:46', '2024-09-23 20:35:45'),
(6, 3.0, 1, 25, '2024-08-10 04:55:59', '2024-08-10 05:05:43'),
(7, 3.3, 3, 24, '2024-08-10 05:05:56', '2024-09-22 06:16:25'),
(8, 2.5, 2, 18, '2024-08-10 05:22:43', '2024-08-10 05:22:49'),
(9, 2.5, 2, 19, '2024-08-10 05:23:12', '2024-08-10 05:23:12'),
(10, 3.3, 3, 9, '2024-09-08 10:00:26', '2024-09-08 10:00:26');

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
  `address` varchar(255) DEFAULT NULL,
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
(10, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Sanjeev', NULL, '14:30:00', '98968843736', '2024-07-08 09:24:48', '2024-07-27 02:55:47', 57, 1, NULL),
(11, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', NULL, '02:00:00', '98968843736', '2024-07-09 06:48:29', '2024-07-09 06:48:29', 57, 0, NULL),
(12, 'Simran Shah', NULL, '2024-07-10', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', NULL, '02:00:00', '98968843736', '2024-07-09 06:49:22', '2024-07-09 06:49:22', 57, 0, NULL),
(17, 'Dhiraj Bikram Shah', NULL, '2024-07-12', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'Headache', '02:30:00', '98968843738', '2024-07-11 09:39:17', '2024-07-11 09:39:17', 48, 0, NULL),
(18, 'Dhiraj Bikram Shah', NULL, '2024-07-12', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'headache', '03:00:00', '98968843738', '2024-07-11 09:43:05', '2024-07-11 09:43:05', 48, 2, NULL),
(19, 'Dhiraj Bikram Shah', NULL, '2024-07-15', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'Headache', '02:30:00', '98968843738', '2024-07-12 07:45:23', '2024-07-12 07:45:23', 48, 0, NULL),
(22, 'Dhiraj Bikram Shah', NULL, '2024-07-20', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', 'Specialist Consultation', 'Dhiraj bikram shah', 'taukodhukyo', '02:00:00', '98968843738', '2024-07-12 10:08:11', '2024-07-13 04:20:13', 48, 2, 1000),
(23, 'merian shah', NULL, '2024-07-15', 'merian@gmail.com', 'chhaimale', NULL, 'DR. Diksha', 'tauko Dukhya', '17:49:00', '98968843738', '2024-07-12 10:37:56', '2024-07-13 03:01:26', 63, 1, NULL),
(24, 'Dhiraj Bikram Shah', NULL, '2024-07-23', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', 'Specialist Consultation', 'Dan Bikram  Shah', 'testing', '11:30:00', '98968843738', '2024-07-19 03:51:19', '2024-07-19 03:51:19', 48, 1, NULL),
(25, 'Dhiraj Bikram Shah', NULL, '2024-07-27', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', 'khutta', '10:00:00', '98968843738', '2024-07-23 09:21:41', '2024-07-23 10:39:06', 48, 2, 0),
(26, 'merian shah', NULL, '2024-07-27', 'merian@gmail.com', 'chhaimale', NULL, 'Kritan shah', 'Tauko hukhyo', '14:00:00', '98968843738', '2024-07-25 07:57:34', '2024-07-25 07:57:34', 63, 0, NULL),
(27, 'Dhiraj Bikram Shah', NULL, '2024-08-02', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Kritan shah', 'dcdfvc', '13:30:00', '98968843738', '2024-07-25 22:44:29', '2024-07-27 02:16:35', 48, 2, 10),
(28, 'Simran Shah', NULL, '2024-08-06', 'simran@gmail.com', 'Bhaisepati', NULL, 'Dhiraj bikram shah', 'wferfer', '02:00:00', '98968843736', '2024-07-27 02:58:49', '2024-07-27 03:10:57', 57, 2, 10),
(29, 'Dhiraj Bikram Shah', NULL, '2024-08-02', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'juna', 'jkwdcn', '04:30:00', '98968843738', '2024-07-27 08:16:59', '2024-07-27 08:21:14', 48, 2, 10),
(30, 'Dhiraj Bikram Shah', NULL, '2024-08-15', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'tauko dukhyo', '02:00:00', '98968843738', '2024-08-01 05:02:44', '2024-08-02 08:56:44', 48, 2, 10),
(31, 'Dhiraj Bikram Shah', NULL, '2024-08-06', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Kritan shah', 'tauko dukhya', '14:30:00', '98968843738', '2024-08-02 08:54:06', '2024-08-02 08:55:50', 48, 1, NULL),
(32, 'merian shah', 'female', '2024-08-07', 'merian@gmail.com', 'ramechap', '', 'Milan aryal', NULL, '16:14:00', '98968843736', '2024-08-03 00:41:25', '2024-08-24 04:34:10', 63, 1, NULL),
(33, 'Dhiraj Bikram Shah', NULL, '2024-08-05', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Kritan shah', 'rrr', '13:30:00', '98968843738', '2024-08-03 18:59:57', '2024-08-03 18:59:57', 48, 0, NULL),
(34, 'Dhiraj Bikram Shah', NULL, '2024-08-02', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Kritan shah', 'regrt', '14:00:00', '98968843738', '2024-08-03 19:00:16', '2024-08-03 19:00:16', 48, 0, NULL),
(35, 'Dhiraj Bikram Shah', NULL, '2024-08-07', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Sanjeev', 'tauko dukhyo', '15:00:00', '98968843738', '2024-08-03 19:08:04', '2024-08-03 19:13:32', 48, 2, 10),
(36, 'Dhiraj Bikram Shah', NULL, '2024-08-06', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'kalu panday', 'headace', '11:00:00', '98968843738', '2024-08-03 20:10:44', '2024-08-15 00:17:06', 48, 1, NULL),
(37, 'Dhiraj Bikram Shah', NULL, '2024-08-08', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Sanjeev', 'headace', '15:30:00', '98968843738', '2024-08-03 20:12:29', '2024-08-03 20:24:12', 48, 2, 10),
(38, 'Dhiraj Bikram Shah', NULL, '2024-08-14', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Sanjeev', 'head', '15:00:00', '98968843738', '2024-08-03 20:30:20', '2024-08-03 20:31:28', 48, 2, 10),
(39, 'Dhiraj Bikram Shah', NULL, '2024-08-07', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Kritan shah', 'uguh', '13:30:00', '98968843738', '2024-08-03 21:02:18', '2024-08-03 21:02:18', 48, 0, NULL),
(40, 'Dhiraj Bikram Shah', NULL, '2024-08-14', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'hari', 'tauko dukhya', '03:45:00', '98968843738', '2024-08-10 12:49:03', '2024-08-10 12:49:03', 48, 0, NULL),
(41, 'Dhiraj Bikram Shah', NULL, '2024-08-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'ssss', '01:30:00', '98968843738', '2024-08-11 02:46:08', '2024-08-11 02:46:08', 48, 0, NULL),
(42, 'Dhiraj Bikram Shah', NULL, '2024-08-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', NULL, '02:00:00', '98968843738', '2024-08-11 04:35:47', '2024-08-11 04:35:47', 48, 0, NULL),
(43, 'Dhiraj Bikram Shah', NULL, '2024-08-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', NULL, '02:30:00', '98968843738', '2024-08-11 04:35:52', '2024-08-11 04:35:52', 48, 0, NULL),
(45, 'Dhiraj Bikram Shah', NULL, '2024-08-14', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'jwsjw', '01:30:00', '98968843738', '2024-08-13 01:53:51', '2024-08-13 01:53:51', 48, 0, NULL),
(48, 'Dhiraj Bikram Shah', NULL, '2024-08-16', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'dddd', '08:00:00', '98968843738', '2024-08-14 04:04:26', '2024-08-14 09:43:53', 48, 2, 7000),
(50, 'Dhiraj Bikram Shah', NULL, '2024-08-16', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', 'Specialist Consultation', 'kalu panday', 'ssss', '10:30:00', '98968843738', '2024-08-14 08:59:30', '2024-08-15 00:17:13', 48, 1, NULL),
(52, 'merian shah', NULL, '2024-08-15', 'merian@gmail.com', 'chhaimale', NULL, 'Dhiraj bikram shah', 'jewhfweh', '02:30:00', '98968843738', '2024-08-14 23:05:29', '2024-08-14 23:05:29', 63, 0, NULL),
(53, 'merian shah', NULL, '2024-08-17', 'merian@gmail.com', 'chhaimale', NULL, 'Dhiraj bikram shah', NULL, '02:00:00', '98968843738', '2024-08-14 23:07:49', '2024-08-14 23:07:49', 63, 0, NULL),
(54, 'merian shah', NULL, '2024-08-19', 'merian@gmail.com', 'chhaimale', NULL, 'Kritan shah', 'fdv', '14:00:00', '98968843738', '2024-08-14 23:09:43', '2024-08-14 23:13:14', 63, 1, NULL),
(56, 'merian shah', NULL, '2024-08-16', 'merian@gmail.com', 'chhaimale', '', 'kalu panday', 'sax', '11:00:00', '98968843738', '2024-08-15 00:11:25', '2024-08-15 02:19:46', 63, 2, 1000),
(57, 'Dhiraj Bikram Shah', NULL, '2024-08-18', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'ssxasxasxas', '08:00:00', '98968843738', '2024-08-15 11:25:00', '2024-08-15 11:25:00', 48, 0, NULL),
(58, 'Dhiraj Bikram Shah', NULL, '2024-08-27', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', NULL, '08:30:00', '98968843738', '2024-08-21 23:18:30', '2024-08-24 04:34:04', 48, 1, NULL),
(59, 'Dhiraj Bikram Shah', NULL, '2024-08-26', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', 'hhguhb', '10:00:00', '98968843738', '2024-08-22 00:58:15', '2024-08-22 00:58:15', 48, 0, NULL),
(60, 'Dhiraj Bikram Shah', NULL, '2024-08-23', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'jhbdscbu dywc 7wygc aw yg w', '01:30:00', '98968843738', '2024-08-22 09:15:28', '2024-08-22 09:15:28', 48, 0, NULL),
(61, 'Dhiraj Bikram Shah', NULL, '2024-09-04', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'ytjytyur', '02:00:00', '98968843738', '2024-08-24 00:59:57', '2024-08-24 04:35:42', 48, 2, 10000),
(62, 'Dhiraj Bikram Shah', NULL, '2024-08-27', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'headace', '08:00:00', '98968843738', '2024-08-24 20:00:32', '2024-08-24 20:05:30', 48, 2, 70000),
(63, 'Dhiraj Bikram Shah', NULL, '2024-09-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Dhiraj bikram shah', 'hfh', '02:00:00', '98968843738', '2024-09-06 05:29:48', '2024-09-06 05:32:48', 48, 1, NULL),
(64, 'Dhiraj Bikram Shah', NULL, '2024-09-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'lkjdfkjkkj', '08:00:00', '98968843738', '2024-09-06 05:37:13', '2024-09-06 05:37:13', 48, 0, NULL),
(65, 'Dhiraj Bikram Shah', NULL, '2024-09-10', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', NULL, '10:00:00', '98968843738', '2024-09-08 10:06:02', '2024-09-08 10:06:02', 48, 0, NULL),
(66, 'Ramu Yadav', NULL, '2024-09-10', 'ramu@gmail.com', NULL, NULL, 'Alisha shah', 'aaaaa', '10:30:00', '9868745678', '2024-09-08 10:09:06', '2024-09-08 10:09:06', 118, 0, NULL),
(68, 'Ramu Yadav', NULL, '2024-09-20', 'ramu@gmail.com', NULL, NULL, 'Milan aryal', 'ttttt', '08:30:00', '9868745678', '2024-09-18 21:43:09', '2024-09-18 21:43:09', 118, 0, NULL),
(70, 'Kinjal shah', NULL, '2024-09-25', 'kinjal@gmail.com', 'pharping,kathmandu', NULL, 'Alisha shah', 'kjndcwjnc', '11:30:00', '98968843738', '2024-09-20 00:16:02', '2024-09-20 00:20:07', 122, 2, 1000),
(71, 'Kinjal shah', NULL, '2024-09-26', 'kinjal@gmail.com', 'pharping,kathmandu', NULL, 'DR. Diksha', 'kuasb', '16:49:00', '98968843738', '2024-09-20 00:50:28', '2024-09-20 01:16:38', 122, 2, 10),
(72, 'ramu', NULL, '2024-09-25', 'ramubebi@gmail.com', 'haha', NULL, 'Dhiraj bikram shah', 'sdsdsdsdsd', '02:00:00', '9874563210', '2024-09-20 07:27:33', '2024-09-23 20:38:30', 159, 1, NULL),
(73, 'ramu', NULL, '2024-09-25', 'ramubebi@gmail.com', 'haha', NULL, 'Kritan shah', 'wfdwedw', '14:00:00', '9874563210', '2024-09-20 07:29:37', '2024-09-20 07:31:26', 159, 1, NULL),
(74, 'ramu', NULL, '2024-09-24', 'ramubebi@gmail.com', 'haha', NULL, 'DR. Diksha', 'dfvfdvfd', '16:49:00', '9874563210', '2024-09-21 03:04:55', '2024-09-21 03:04:55', 159, 0, NULL),
(75, 'Dhiraj Shah', NULL, '2024-09-26', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'jhbsdjhxbs', '08:00:00', '9868843736', '2024-09-22 06:10:20', '2024-09-22 06:17:59', 48, 1, NULL),
(76, 'Dhiraj Shah', NULL, '2024-09-26', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'kuhsafd', '07:30:00', '9868843736', '2024-09-23 20:36:37', '2024-09-23 20:36:37', 48, 0, NULL),
(77, 'Dhiraj Shah', NULL, '2024-10-25', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', 'kjdshfishd', '10:00:00', '9868843736', '2024-10-17 09:42:10', '2024-10-17 09:48:58', 48, 2, 10),
(78, 'Dhiraj Shah', NULL, '2024-10-25', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Kritan shah', 'fdvdfvfdv', '14:00:00', '9868843736', '2024-10-17 09:51:24', '2024-10-17 09:54:08', 48, 2, 100),
(79, 'Dhiraj Shah', NULL, '2024-11-01', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', 'jhbdsjwe', '10:00:00', '9868843736', '2024-10-29 08:27:04', '2024-10-29 08:39:35', 48, 2, 10),
(80, 'Dhiraj Shah', NULL, '2024-11-02', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'lknsdaa', '08:30:00', '9868843736', '2024-10-29 08:34:38', '2024-10-29 08:37:40', 48, 2, 700),
(81, 'Dhiraj Shah', NULL, '2024-11-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Milan aryal', 'sdds', '08:00:00', '9868843736', '2024-11-10 07:27:52', '2024-11-10 07:27:52', 48, 0, NULL),
(82, 'Dhiraj Shah', NULL, '2024-11-13', 'dhiraj@gmail.com', 'Bhaisepati, Lalitpur', NULL, 'Alisha shah', 'wefewf', '10:00:00', '9868843736', '2024-11-10 08:00:30', '2024-11-10 08:00:30', 48, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commenttable`
--

CREATE TABLE `commenttable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commenttable`
--

INSERT INTO `commenttable` (`id`, `user_id`, `doctor_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 48, 8, 'be very good mood', '2024-08-10 04:53:20', '2024-08-10 04:53:20'),
(2, 48, 25, 'GGG', '2024-08-10 04:56:08', '2024-08-10 04:56:08'),
(3, 48, 20, 'good', '2024-08-10 05:06:30', '2024-08-10 05:06:30'),
(4, 48, 25, 'very good doctor', '2024-08-10 05:19:33', '2024-08-10 05:19:33'),
(5, 48, 25, 'good', '2024-08-10 06:00:43', '2024-08-10 06:00:43'),
(6, 48, 25, 'good', '2024-08-10 06:07:28', '2024-08-10 06:07:28'),
(7, 48, 4, 'vrey very good doctor', '2024-08-10 11:10:36', '2024-08-10 11:10:36'),
(8, 63, 4, 'kjnasdckj', '2024-08-10 11:12:48', '2024-08-10 11:12:48'),
(9, 63, 9, 'good', '2024-08-11 10:13:19', '2024-08-11 10:13:19'),
(10, 48, 4, 'hahah', '2024-08-12 10:02:56', '2024-08-12 10:02:56'),
(11, 63, 8, 'good doctor', '2024-08-22 09:34:11', '2024-08-22 09:34:11'),
(12, 48, 4, 'sdcsdc', '2024-08-24 04:05:28', '2024-08-24 04:05:28'),
(13, 48, 8, 'good', '2024-08-24 19:59:50', '2024-08-24 19:59:50'),
(14, 118, 9, 'dddd', '2024-09-08 10:00:45', '2024-09-08 10:00:45'),
(15, 48, 8, 'uyguyg', '2024-09-17 08:10:03', '2024-09-17 08:10:03'),
(16, 122, 24, 'good doctor', '2024-09-20 00:14:46', '2024-09-20 00:14:46'),
(17, 48, 8, 'jwenf', '2024-11-10 07:27:31', '2024-11-10 07:27:31');

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
(4, 'Dhiraj bikram shah', '4488', 'Neurologist', 'mbbs', '3 year', '100', '01:00:00', '05:00:00', '[\"2\",\"3\",\"10\"]', '1710251147-doctor.jpg', '2024-03-12 08:00:47', '2024-04-01 05:29:04', ''),
(8, 'Milan aryal', '4455', 'Anesthesiologists', 'mbbs,md', '2 year', '700', '07:00:00', '13:00:00', '[\"14\",\"9\",\"10\"]', '1710331610-doctor.jpg', '2024-03-13 06:21:50', '2024-03-13 06:21:50', ''),
(9, 'Sanjeev', '4455', 'Neurologist', 'mbbs,md', '4455', '10', '14:00:00', '18:00:00', NULL, '1712125277-doctor.jpg', '2024-03-13 09:03:29', '2024-04-03 00:36:18', ''),
(10, 'DR. Diksha', '4455', 'Anesthesiologists', 'mbbs,md', '4455', '10', '16:19:00', '18:17:00', NULL, '1711518150-doctor.png', '2024-03-26 23:57:30', '2024-06-22 04:47:20', ''),
(11, 'Kritan shah', '1222', 'Anesthesiologists', 'mbbs,md', '2 year', '100', '13:00:00', '17:00:00', NULL, '1713160316-doctor.jpg', '2024-04-15 00:06:56', '2024-04-15 00:06:56', ''),
(18, 'hari', '88554', 'gynecologist', 'mbbs,md', '88554', '700', '00:15:00', '16:15:00', '[\"9\",\"10\",\"14\"]', '1719509479-doctor.jfif', '2024-06-27 11:46:20', '2024-07-23 08:21:24', 'hyyy'),
(19, 'juna', '78945', 'gynecologist', 'mbbs,md', '78945', '10', '01:00:00', '16:00:00', '[\"2\",\"9\"]', '1719555013-doctor.jfif', '2024-06-28 00:25:13', '2024-07-23 08:27:10', 'kddkdkk'),
(20, 'Dan Bikram  Shah', '8565', 'dentist', 'BDS', '8565', '10', '08:00:00', '16:00:00', '[\"17\"]', '1720452895-doctor.jfif', '2024-07-08 09:49:55', '2024-07-23 08:26:04', 'qwdwed   2wed'),
(24, 'Alisha shah', '445622', 'Neurologist', 'mbbs,md', '445622', '10', '09:00:00', '13:00:00', '[\"2\",\"3\"]', '1721743687-doctor.jfif', '2024-07-23 08:23:07', '2024-07-23 08:25:44', 'qwdwed'),
(25, 'kalu panday', '778899', 'Anesthe', 'mbbs,md', '4 year', '10', '10:00:00', '15:00:00', '[\"2\",\"3\",\"9\"]', '1722732514-doctor.png', '2024-08-03 19:03:35', '2024-08-03 19:03:35', 'skjadhks');

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
(3, 'hello merian', 23, 63, '2024-07-24 02:13:24', '2024-07-24 02:13:24'),
(4, 'uhef iuhew ioiuhweqf pieuf \r\nieuwyf', 30, 48, '2024-08-15 03:06:48', '2024-08-15 03:06:48');

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
(13, 'Dan Bikram  Shah', 'dan@gmail.com', 'b345736a2d1d12fb73cea42ceaeb0851', '2024-07-08 09:50:35', '2024-07-08 09:50:35'),
(14, 'juna', 'juna@gmail.com', '09a4b07cc37f30fb0538a6057c2e51a3', '2024-07-27 08:20:11', '2024-07-27 08:20:11'),
(15, 'kalu panday', 'sanjeev@gmail.com', '6c13efcf464c253cdf76c749a0e9a572', '2024-08-03 19:04:48', '2024-08-03 19:04:48'),
(16, 'kalu panday', 'kalu@gmail.com', '0ea11d2b39a5ebe46e1d5c126d5fb8ba', '2024-08-15 00:12:41', '2024-08-15 00:12:41');

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
(39, '2024_07_06_041251_create_average_rating_table', 32),
(40, '2024_08_10_102413_comment', 33),
(41, '2024_08_10_102742_create_comment_table', 34);

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
('0017ba9c-3f85-46cc-a281-849872d45c5e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('0040e618-4c9a-4db0-ad3e-506cad3d870c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('005c3227-35a5-4107-81ef-6a0cde994bd5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('00637dd9-9831-4dc8-aed1-ac68cbe4e1a2', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('030b4a9e-173f-40e0-bfdb-ec53925742a9', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('031ad89f-e618-4bbb-bfbe-7151b4db3042', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Nayaran Bikram Shah\"}', NULL, '2024-09-20 05:46:46', '2024-09-20 05:46:46'),
('033ad67c-c01a-4f63-8484-b9160069a2a1', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('037f07ac-7e15-4427-8f46-408ccd8c5421', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('0390853c-027c-4676-bc0c-6493e4da9917', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('03c018be-9898-4630-8cf5-5b5e5de62b4c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('03c384c1-91ad-4688-b6ed-5e7e3eb0aaed', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('03d3ed2b-c49a-43be-8810-9e11c2947ae6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('04275fef-47dc-4cb3-8b5a-cd629a32c0a0', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"63\"}', '2024-09-22 06:10:59', '2024-09-06 05:32:48', '2024-09-22 06:10:59'),
('04d1d450-94cd-4776-aab4-7c99f400dab5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:49', '2024-08-14 23:07:49'),
('0594ffff-12b6-4136-a443-7b30320e486e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('06285619-95da-4ca8-b4cb-ab76a8de2449', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('07189b66-09e9-4193-99a6-c469afbb67af', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('079c29d9-2d30-4c3c-a3b9-f50d5ce45e4a', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\"}', NULL, '2024-09-20 01:16:39', '2024-09-20 01:16:39'),
('080068d1-778e-45c5-b11c-13380a8abcef', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('08bbfa2e-a26e-439d-b780-7bd7319679f9', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"DHIRAJ\"}', NULL, '2024-09-20 06:58:54', '2024-09-20 06:58:54'),
('091565b6-3526-4c21-b42f-60161c8b9fc0', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('096f03d6-2209-41d5-98dc-74dbde4c92dd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('099ad199-c972-4fa6-98b9-f6e68363a56d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('0a47f938-743a-4f0c-b788-ed13802ffe90', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"58\"}', NULL, '2024-08-24 04:34:04', '2024-08-24 04:34:04'),
('0aa4dd12-5aa8-446d-8722-6c511aca6637', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Juna shah\"}', NULL, '2024-09-20 07:40:33', '2024-09-20 07:40:33'),
('0c146145-4393-4afa-8048-e6c5f44bcd17', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('0c8e9589-c389-4a56-8246-9f93ae6deb48', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('0cb0bbc2-aff6-4898-a363-62fa346b2280', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('0cfb10f5-7304-457b-a5b7-0d2317a49b08', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('0d58b943-0342-4832-97a6-3de2376ad278', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('0dd176e8-d97e-4c3f-a709-d065731bfa50', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('0e3c3aa9-7405-4b52-b874-01bb0084cc26', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"Merian Shah\",\"doctor\":null}', NULL, '2024-05-12 08:26:28', '2024-05-12 08:26:28'),
('0e8dd472-f280-44a0-950c-2a1fa46c9e5f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('0eb6ed25-74f0-4e77-945a-c1e14c72c66a', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"merian shah\"}', NULL, '2024-04-20 07:24:51', '2024-04-20 07:24:51'),
('0eec12ec-b89d-4a61-bb6d-73174c433144', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('0f686809-5a08-4287-88d8-5f262e5c9d3d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('106f92cb-e426-4afc-b48f-7585c8452839', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:26', '2024-08-03 00:41:26'),
('1104adab-b023-4d66-a84a-1c401f20eedc', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-05-19 10:33:17', '2024-05-19 10:33:17'),
('110e5aa0-a7a5-45e8-8afd-38a1b8b57add', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('11c32a37-eb7c-43d2-b89a-057152269c0c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('12358b0a-c7d3-4160-a220-e782b41a7f3c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('13161244-02ca-4ed6-8c1b-aa63e6f6a213', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 63, '{\"b_id\":\"23\",\"doctor\":\"DR. Diksha\"}', '2024-07-25 07:55:13', '2024-07-24 02:13:25', '2024-07-25 07:55:13'),
('133532c8-4ac0-43a2-9463-53d728726440', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan\"}', NULL, '2024-09-20 04:30:51', '2024-09-20 04:30:51'),
('13357683-cabe-46f7-be63-6a1fc957cd8b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('13ba82e4-502d-45d4-b508-245f31b5d691', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Sabin Achary\"}', NULL, '2024-07-08 09:53:22', '2024-07-08 09:53:22'),
('146ed811-7282-41e6-b89c-effecd60c267', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Kinjal shah\"}', NULL, '2024-09-20 00:12:35', '2024-09-20 00:12:35'),
('15191242-c203-413d-9a59-287c20c5e228', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('156d5f8a-8f16-4078-9c6e-2458608cd385', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('15a5b812-299d-4361-b6e3-46232b11eebd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('16bf1aac-6856-4b55-be51-a2f68fbf49f6', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('17a79dd0-4a40-43dd-9bf1-629dc7cf3a27', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('17d8f04b-13d5-41aa-ade7-5c5573fe68dd', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan\"}', NULL, '2024-09-20 04:30:51', '2024-09-20 04:30:51'),
('1805853c-4424-4530-a683-5d085060eb30', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('196d7e62-8cd0-41d0-b648-1efa5b0026ae', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('19ab7b7b-c2fa-439c-b475-f8dea8828c67', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:32:46', '2024-09-20 05:32:46'),
('1a36cdd7-2880-4e65-aaa5-df26a28cd0ca', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Kinjal shah\",\"doctor\":\"Kinjal shah\"}', NULL, '2024-09-20 01:08:40', '2024-09-20 01:08:40'),
('1a4bbb06-8b86-4bb1-b30d-a6d2e6b506a5', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:06:04', '2024-04-20 06:43:35', '2024-04-20 07:06:04'),
('1a56f97e-085a-4953-bcf3-fe1d3b21afe0', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"29\"}', '2024-07-27 08:22:12', '2024-07-27 08:20:27', '2024-07-27 08:22:12'),
('1a93fe0f-0852-4b6b-a336-c0efbf15bedb', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('1aae317c-7870-4b8d-aea6-48da9025ff5e', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"ramu\"}', NULL, '2024-09-20 07:22:44', '2024-09-20 07:22:44'),
('1ae1221c-c1a1-4f4c-a577-5f87f0ebfb11', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 02:42:36', '2024-09-20 02:42:36'),
('1ae57108-1263-4762-bf6c-d8d08a13976c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('1b0b90ac-4e60-4fc5-a1cb-61842f77596d', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"48\"}', '2024-08-14 08:58:29', '2024-08-14 08:58:07', '2024-08-14 08:58:29'),
('1bbbcdf5-264b-4424-84c1-0fad6dd2c567', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('1c0d6dc1-4967-4c1a-bc23-a58f2ff790fa', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":null}', '2024-06-07 08:53:41', '2024-05-19 10:29:49', '2024-06-07 08:53:41'),
('1c0f4072-35f7-4af7-a125-f2942ffa8777', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('1c963891-9b4f-4865-a184-012129cd26cb', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\"}', NULL, '2024-10-29 08:39:35', '2024-10-29 08:39:35'),
('1d5cb89e-718a-4fec-8962-392d0abea67b', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\"}', NULL, '2024-10-17 09:48:58', '2024-10-17 09:48:58'),
('1ddbfc7a-4a5e-4405-ba30-b619a7fe3d77', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('1de00aa0-35f2-4158-bbff-748b24503cd3', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"dhiraj\",\"doctor\":null}', '2024-07-25 02:23:43', '2024-06-08 04:58:15', '2024-07-25 02:23:43'),
('1e2714c9-1885-4ab1-bded-dfa6e1d5e083', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:54:38', '2024-09-20 06:54:38'),
('1e4655cd-0daf-4e74-b3cf-d3eb67ecc322', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('1eba0884-03c5-434d-964f-527c7624dac0', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('1ed68852-b4b3-4ea9-8abf-b5979581af2b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('1f4fe94f-a513-470f-9141-14ea3ee6d7a9', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:27', '2024-08-03 00:41:27'),
('1fa12ab1-0408-44db-917a-28dd4a1b4127', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('1ff690ae-7109-44aa-aa3b-0dd92f589eec', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 122, '{\"name\":\"Kinjal shah\",\"doctor\":null,\"b_id\":\"70\"}', '2024-09-20 00:20:26', '2024-09-20 00:17:48', '2024-09-20 00:20:26'),
('2019a03e-dbee-4c04-b7ae-1836ee9895bc', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:42:44', '2024-09-20 05:42:44'),
('209356c2-4c0f-4d39-8d9a-e18a827f8ca3', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('2099aa5e-2143-470d-b451-7337e1cd8090', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('20f9a3aa-96c2-4f68-869c-bbee1b46b2e0', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('211a8e9a-48fa-492e-9718-b39ac5c8b274', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('215f804a-29b0-46dc-8b6f-7eded65122d7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('2164cbac-d23a-4c79-ae63-c40a249f1012', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:32:40', '2024-09-20 05:32:40'),
('217c4257-a9b4-4e8d-8f52-9230a0197bac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:26', '2024-08-03 00:41:26'),
('21c5204b-f070-4a01-b350-5613fc969320', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-05-19 10:33:17', '2024-05-19 10:33:17'),
('229c130e-3b0e-4cdc-b243-9883e5eb76e1', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('234964fa-edfb-4194-a54a-fab4e23b8f9c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('23eb32a1-92c3-4244-932a-3e953d283709', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('2457b1db-be10-4e0c-aa12-014b9d06d01c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:49', '2024-08-14 23:07:49'),
('27852e90-c9e1-43ec-9083-32901d7fd1a8', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:06:01', '2024-09-20 05:06:01'),
('2990b793-81fc-4f2e-a8d3-bc549e8df196', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('2a097c16-9257-4057-9151-b25640ecfadd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('2a94cfbf-92de-4a92-b040-0df0ee9dab51', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 122, '{\"name\":\"Kinjal shah\",\"doctor\":null,\"b_id\":\"71\"}', '2024-09-20 01:15:48', '2024-09-20 01:15:29', '2024-09-20 01:15:48'),
('2c4aaf57-ddc6-4191-937a-72ecab259c45', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('2dbaa728-e936-4cd4-ad13-814b50598433', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('2e2adb3e-b21e-4cd9-a897-783e840465d7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('2e6faddb-f415-4f27-99c0-58b6cc1f32fa', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('2e809ef2-99e4-4c81-a70e-618dec2b112f', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":null}', NULL, '2024-08-24 04:35:42', '2024-08-24 04:35:42'),
('2f11585a-c709-4e93-a018-dfaa731cb1d2', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('2f74dd89-01e9-4a9b-b331-333bfdbe2c09', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('2f7ea3d4-2f5f-4190-903b-b6b59423bdd5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('2fb515f3-2d52-433b-b4b9-50d925f48552', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('2fd0055b-7d0a-4c33-b861-d5ea22d3c9aa', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('2fe2a162-f427-4ce4-aaad-a18c52de440a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null}', '2024-05-20 00:38:31', '2024-04-20 07:35:54', '2024-05-20 00:38:31'),
('313b7bc8-f220-44c6-a5b1-e72475c4e127', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Kiran Bikram Shah\"}', NULL, '2024-09-20 04:59:02', '2024-09-20 04:59:02'),
('31828b71-70d8-49cd-8fe8-30523838cef0', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:55:28', '2024-09-20 06:55:28'),
('31865b06-648b-4b9b-abd2-69c38cf0afd6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('3191b070-07bd-48aa-9358-035365dd1803', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:07:44', '2024-09-20 03:07:44'),
('3212b507-6de9-4211-8bc6-7131e4c71ba3', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:26', '2024-08-03 00:41:26'),
('3398c314-2bb5-4624-a0f2-fc1e9095c4b2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('34a6cb65-b1c9-467d-8807-a83ceb94ba3a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('34e13fd7-e1ee-4e13-96b4-5932e597bbb7', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:42:44', '2024-09-20 05:42:44'),
('34fcaa47-10de-45e3-8f08-149b8dc87ea6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('350e03fb-654f-4749-9433-fc0aa5b1f7ca', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('3541e05d-aef0-436d-a65e-e8bd3e641bdc', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"kiran\"}', NULL, '2024-09-20 07:17:49', '2024-09-20 07:17:49'),
('35925086-140c-402a-9d03-370d28d58fe8', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('35d194da-2521-4970-9dd5-b354a73dd6af', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('362b1d18-8b20-4338-bc18-385b004c16cd', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('363fbe0c-8536-4f1c-a0e1-90ab3954fd01', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('36be772a-4832-437e-80c8-0d45040b69ef', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('3732b0b3-a0d9-4773-b6ae-ce3e2deb3d7b', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', '2024-09-20 00:21:00', '2024-09-17 08:08:19', '2024-09-20 00:21:00'),
('3756a4f1-790c-4384-8898-be44d34e1f16', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('378809a7-2163-4be5-8834-691133fcc008', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('37b8babc-3117-4ea5-9ebe-1375c0487118', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('38a755e5-7caf-42c4-95fb-c034fa03a232', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:21', '2024-09-20 04:22:21'),
('392f7419-cee2-45b2-8146-a1dce21e251b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('393b1e92-3a2e-4ad0-b3be-cecf2569a580', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"Merian Shah\",\"doctor\":null}', NULL, '2024-05-19 21:11:30', '2024-05-19 21:11:30'),
('39c05f4b-a5bc-40cc-b554-3012f954824c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('3a2eaed0-fa8b-406b-a528-c0df606694a6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('3add4c42-5265-4174-8102-16cacdf71ec7', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"kiran\"}', NULL, '2024-09-20 04:55:46', '2024-09-20 04:55:46'),
('3afec2bd-860f-4133-806e-97f713a6a3b6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('3b0c83ac-797e-4dc5-9284-d4c29d2e01cc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('3b470f58-6a25-41c5-bab5-7e5205e5f980', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('3bb83f38-6f17-4af8-ac25-6132e2b0481f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('3c3fa580-f8b2-4ded-930a-3d1c1ee62f9d', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('3c811f80-a887-4fec-a491-8ae49d1bd00c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-06-08 05:05:07', '2024-06-08 04:55:42', '2024-06-08 05:05:07'),
('3c8ef6c9-68e9-4caf-aab1-df0f9c236bec', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('3d369ad3-a368-4c3a-ac4a-eb6857b6628c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('3d98fb0d-3aeb-448a-ae40-914300ff7f4f', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('3dd5ceda-9e6a-4bfb-82d5-a3397891c70d', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:28', '2024-09-20 04:22:28'),
('3ea4d02c-9747-4162-9cb7-36138408978b', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 02:42:36', '2024-09-20 02:42:36'),
('3f8fc824-750d-451c-b4e0-53c6d3156766', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('3fa4ceae-ea50-439d-87ef-1b5fb5faf20e', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('3fcb9b1c-7df4-4415-9c4a-19b992937980', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('40d31ff5-d8b9-413d-ae7b-8a4503ac1358', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('40da5f09-d474-4389-aa59-6984c5766efe', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan\"}', NULL, '2024-09-20 04:30:45', '2024-09-20 04:30:45'),
('40e5447e-863a-4c76-8595-7a4d85f3e66f', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('41fb383c-ccb0-4398-af9e-2aef5c188dea', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('420bc721-26d7-4c69-84d2-1132039e74ad', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('4308caf3-fe96-455a-8e7d-0a8ebe9d2800', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Kiran Bikram Shah\"}', NULL, '2024-09-20 04:59:02', '2024-09-20 04:59:02'),
('43683a5f-4b04-44ba-8bb4-8db43e3e68ac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('442cbc5c-48bf-4b31-84ea-b03e22d7e307', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('447a37f2-633b-4f68-85ca-4ddcb4dede1a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('45212ea4-d0dc-4af2-8953-deb906a53f8d', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"vibak\"}', NULL, '2024-09-20 04:43:07', '2024-09-20 04:43:07'),
('455c1655-0927-4be2-99ed-6e1ab8efe691', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('462fa27f-41ef-43c3-81f4-8564479ee449', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Kinjal shah\"}', '2024-09-20 00:54:43', '2024-09-20 00:12:35', '2024-09-20 00:54:43'),
('46bab822-1e5b-4c92-89d1-bc6f39099e86', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('47314d6d-7391-49fe-a461-732f399f6629', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Juna shah\"}', NULL, '2024-09-20 07:44:10', '2024-09-20 07:44:10'),
('475a866b-c3a1-454c-9815-11db6a2b9cdc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('477ac39d-c439-43d8-ac95-81a6e8f8f4a5', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', '2024-09-20 00:54:52', '2024-09-20 00:15:09', '2024-09-20 00:54:52'),
('480a554b-c778-472f-9be9-f4fd8b999125', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('4853ed1b-bb2b-4b35-8a36-5dc6261045cd', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Juna shah\"}', NULL, '2024-06-13 08:50:38', '2024-06-13 08:50:38'),
('4888add9-2fba-4bc9-9f7f-44ba9ad638e6', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Dan Bikram Shah\"}', NULL, '2024-06-08 01:10:59', '2024-06-08 01:10:59'),
('49621b66-130e-4ba1-bde3-548d010d3457', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('4967c958-03d0-47c6-a6eb-10a0b2103337', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('4a0e7052-29f3-4646-83e2-c5f59d1c3bc0', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('4a3f8d5a-9bef-4034-a4e5-e30b0ccc629f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('4b31b505-72a8-48ba-a9db-2f0259853cdc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('4c21421b-ebb9-468c-b8ac-c036e7092a64', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"merian shah\"}', '2024-04-20 07:29:02', '2024-04-20 07:24:51', '2024-04-20 07:29:02'),
('4c929d4f-a973-4539-8332-3b47c38d8eb5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('4d4dbc11-3244-4fc2-8524-5c904aa1aa58', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('4daa7459-f20d-414f-b20e-9463de0f88cc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('4dcc8877-2aa4-4155-9b24-065ec24b55fd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('4ee3802a-cd79-4022-baf6-231b8e98fddd', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Shah\",\"doctor\":null,\"b_id\":\"80\"}', '2024-11-10 07:28:38', '2024-10-29 08:35:41', '2024-11-10 07:28:38'),
('501f91d8-86cf-4bb0-952f-2c0be94406cd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('512d9517-ed9b-448d-a589-5b4ac89ed9de', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('5262bd00-c901-4f70-b690-490c7ec61848', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('5433d785-a67b-470c-9813-bc2a6e591e23', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('54786437-9dab-4385-8b78-16384b24415a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('54bbc812-d80f-4e97-a39d-9d96e7ca241f', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"tata\"}', NULL, '2024-09-20 05:01:35', '2024-09-20 05:01:35'),
('55b496bc-1332-4af5-aee7-92ac16740b7f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('55f5f396-5e2f-40f4-8542-78334ff6919c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('567bac49-b57a-4721-b589-98449caac968', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('56fbfbd7-aff7-4c3c-90be-90d666be12c0', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Shah\",\"doctor\":null,\"b_id\":\"75\"}', '2024-09-22 06:18:40', '2024-09-22 06:18:01', '2024-09-22 06:18:40'),
('579a4c3e-86e3-4ce4-afbc-9c575d9b2616', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('579f48e4-c8d5-4a9b-8ed1-83d9e45d9202', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('57b68564-f478-4d16-9293-8f93a5fdfc93', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('58b3f425-10cc-430c-a7a1-9ec6b381b7c8', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\"}', NULL, '2024-10-17 09:48:58', '2024-10-17 09:48:58'),
('59baec67-5183-4617-90a2-27ff4d4a2376', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:28:47', '2024-09-20 04:28:47'),
('5a2808fd-93db-41ee-bac3-3532ff3b10d3', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('5ab7d4dc-9e66-4ddf-969a-e277515cd1fc', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Alisha shah\"}', NULL, '2024-06-13 05:55:57', '2024-06-13 05:55:57'),
('5bf0409e-9bc6-4197-b254-e91318d57bfe', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 06:57:19', '2024-04-20 06:26:06', '2024-04-20 06:57:19'),
('5bf125df-8bd6-4e51-ba62-07aa9273eaf9', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('5c85591d-f9ed-4b4f-9850-5dc93ff6eb6a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('5c86da98-6123-4f48-9b4c-9e936ce2c014', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('5d1bb249-3939-4c8c-96b4-3a8dd977e1dd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('5d305ccc-1bf6-43a4-9f46-96f8d9566367', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('5dba5875-58a6-4d22-9b92-46004df6fc81', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:27', '2024-08-03 00:41:27'),
('5de115b7-480f-4762-84db-4e7ba31f35f9', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:47', '2024-09-20 04:22:47'),
('5e8dfccf-d7ef-4716-9dfd-4b9dbd36c52c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('5e9840de-78eb-4f25-8331-473e064ea224', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 159, '{\"name\":\"ramu\",\"doctor\":null,\"b_id\":\"73\"}', NULL, '2024-09-20 07:31:26', '2024-09-20 07:31:26'),
('5f1c8240-2f17-4607-8151-7d66422a8c19', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 57, '{\"name\":\"Simran Shah\",\"doctor\":null}', '2024-07-27 03:06:16', '2024-07-24 00:40:33', '2024-07-27 03:06:16'),
('5f476a67-934c-4cc4-bd12-a8f0b7610f0d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('5f50d7bc-05aa-4850-805c-9e4d4fd508de', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('5fa489c3-8ea5-48b9-a971-907bac185521', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:50', '2024-08-14 23:07:50'),
('601ccbda-8154-4ce3-8716-5305f9e200e0', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:53', '2024-09-20 04:22:53'),
('6135335d-c686-49ad-ba39-cf64b1da0856', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Kinjak shah\"}', '2024-09-20 00:55:05', '2024-09-19 23:43:38', '2024-09-20 00:55:05'),
('61aff48a-12cf-4a3c-93d6-330575279438', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('62047800-2305-460a-8f5b-c0599c664df5', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('62629c5a-c800-437c-bd40-75e190279f6e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('6272e0fa-bac1-4cb3-9de7-5a80bccc4d8e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('62913cee-3920-40c2-9bb3-4b8c2d6c0a7b', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"36\"}', '2024-08-17 00:41:58', '2024-08-15 00:17:06', '2024-08-17 00:41:58'),
('63792eb3-c936-49b1-ae8a-14c87af909e5', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"naraya\"}', NULL, '2024-09-20 03:23:37', '2024-09-20 03:23:37');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('641cd7df-7a8c-4124-a28f-bb5fbd0e582b', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:07:44', '2024-09-20 03:07:44'),
('6436ab22-51e0-48d7-8cc8-5678f2c61fe9', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"merian shah\",\"service\":\"General Check-up\"}', NULL, '2024-05-12 08:30:34', '2024-05-12 08:30:34'),
('648b6cf3-2efe-4091-a27f-ffcb7f9054f2', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"tata\"}', NULL, '2024-09-20 05:01:35', '2024-09-20 05:01:35'),
('64a28e7d-4716-4513-98ab-2bd39a843968', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('64c1276f-a256-4f93-bd3b-70dd2a71f604', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:21', '2024-09-20 04:22:21'),
('64f53e86-3a1a-43da-a7db-fdf6700fd297', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"50\"}', '2024-08-15 02:41:14', '2024-08-15 00:17:13', '2024-08-15 02:41:14'),
('64fb9023-08d6-4968-bcad-45511a607f5c', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"naraya\"}', NULL, '2024-09-20 03:23:31', '2024-09-20 03:23:31'),
('653b5769-3af0-41ec-ad1e-1434808b16fb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('65c1e9b2-35d7-4ea5-9fa8-d636e475e2a9', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:30:57', '2024-09-20 05:30:57'),
('668772d8-0bcd-4fd5-afc1-f6ab2db8d85c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('66d7d40d-42a6-4644-860e-ebd827d53464', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('6960eb1f-f8a2-4ab4-8ec5-586fd709ccac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('69772e59-a4dd-4059-a0bd-f14576578e47', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-07-13 03:11:22', '2024-07-13 03:11:22'),
('6a901f4a-9ffd-440e-b87c-df42caae6ea5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('6a9e7135-fad3-4562-9045-6eed1a874dd2', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('6aa2591e-1c39-4f2b-9e85-9256948a3a27', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('6ab90314-738b-4908-b393-294dc6269255', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('6aff8f5a-0128-43b5-b62b-ab04a7f4f848', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:50', '2024-08-14 23:07:50'),
('6b2a83f1-0db4-4d44-92e1-765984ef017d', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 57, '{\"name\":\"Simran Shah\",\"doctor\":null,\"b_id\":\"28\"}', '2024-07-27 03:05:59', '2024-07-27 03:00:08', '2024-07-27 03:05:59'),
('6b8b7c6e-ef50-4a7a-b56c-cb361b59a9b9', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"kiran\"}', NULL, '2024-09-20 04:55:46', '2024-09-20 04:55:46'),
('6bb26a5c-db19-4435-b9de-5847813624e2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', '2024-07-25 08:14:46', '2024-07-11 08:31:23', '2024-07-25 08:14:46'),
('6bee71cb-a953-4ad6-ad30-7ab6990f9990', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('6bf6fd7e-fbbb-4267-874c-db025bf9e520', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('6def391d-877b-4079-ab2b-3a2160bce881', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:26', '2024-08-03 00:41:26'),
('6df79333-bf87-462e-a638-81dfd686695e', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', '2024-09-20 00:17:43', '2024-09-20 00:16:02', '2024-09-20 00:17:43'),
('6e52982f-bae4-4f09-89e4-0dafdb57dc9d', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('6ea99df9-db59-4a01-9a8a-6eee3a8105b7', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":null}', NULL, '2024-08-24 20:05:30', '2024-08-24 20:05:30'),
('6ef756ba-737f-494a-8c26-de8486e99dff', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('6f9bbc4a-c041-41da-897e-407fb424bb1e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('707ba2c1-5058-40b1-871d-50e74a2f9487', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('712f925f-ccc3-4247-b7d0-facc48a13393', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('71627a3b-fa82-4f01-aea0-3d27c6c5c0c5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('719f203b-b9e4-4ec1-a6a1-acf41169200b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('71a87e5c-6ad0-4782-a787-92b090f89198', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"merian shah\",\"service\":\"\"}', NULL, '2024-08-15 02:19:48', '2024-08-15 02:19:48'),
('71be5fec-391f-4f3a-ae97-eb96b2b9ee4d', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:05:57', '2024-04-20 06:26:06', '2024-04-20 07:05:57'),
('71fc0e3f-cf26-45a8-bb20-1f183d34220d', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Kinjal shah\",\"doctor\":\"Kinjal shah\"}', NULL, '2024-09-20 01:08:40', '2024-09-20 01:08:40'),
('728773f2-bc5e-4b5f-a6de-f9108d2df258', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('728bf057-1dd1-4f3a-8c16-f3df48d9befb', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('728dfa84-9c23-4a84-b196-aff4617eec7e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('72acf58a-808e-4756-9b0e-89c7b26674b7', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('72bdd540-8bb0-4af7-a173-5a6744eb4112', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":null}', NULL, '2024-04-20 05:47:20', '2024-04-20 05:47:20'),
('72feaf3b-61df-436d-902c-2d8f34945eca', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('734a260b-a5a3-4f3b-99aa-a42efaeb3352', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('7358baf8-c5fd-4b59-8ea9-d1e780ae1567', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('740b0219-63ae-4d08-921a-a712c7f30c38', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('747bdfbb-dede-4356-8a14-b7ae03e8a7ca', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"sankhar\"}', NULL, '2024-06-11 10:41:09', '2024-06-11 10:41:09'),
('751c85c6-af62-4ef7-b306-61a69bc56c97', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"naraya\"}', NULL, '2024-09-20 03:25:13', '2024-09-20 03:25:13'),
('75470c8a-6b9c-4c56-9a95-c65d6173e8f5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('75dec8cd-f780-4914-994d-18552995d8ec', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 57, '{\"name\":\"Simran Shah\",\"doctor\":null,\"b_id\":\"10\"}', NULL, '2024-07-27 02:55:47', '2024-07-27 02:55:47'),
('76358a0d-a257-46c6-bf1d-f44a05ab1995', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('77264271-9017-4b80-bb4d-49291289bdac', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:28:47', '2024-09-20 04:28:47'),
('78054f0c-bb70-491b-a196-04bd1177433c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('782b5928-2453-4a2c-ba9e-c10510eb94eb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('78cfc1de-cc18-4ea5-9bdc-3a189fd5c1a3', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('79ad3382-e9b3-44a6-a76f-6e28acc1b3e7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('7a46a5b4-0590-4ef1-929f-052c476b9cba', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('7a47c297-1a5e-4745-8314-0263c51f10a3', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"merian shah\",\"service\":\"\"}', NULL, '2024-08-15 02:19:48', '2024-08-15 02:19:48'),
('7a9ca783-796f-4569-a2b9-877c5d9aeaf8', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:49', '2024-08-14 23:07:49'),
('7aa15091-8cc4-4499-8d1b-ed0cdaab77f4', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('7acdfa74-cf96-4376-b5b5-b4216ab7eda0', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('7afb6f2c-9473-41fd-bc38-6d5e230f756c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('7b4c8572-c270-47ad-b9db-847bffdada1c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('7b4e0eaf-a505-4aa5-b7ce-d0210d4984ac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('7b630fd2-d0ea-41f1-b513-bdc9de0bc439', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('7b68676f-ae7e-4fb1-a03f-9ed441bf3168', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('7bf6f292-3117-4f81-aade-63649deda4af', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('7c3970dc-120c-410c-872d-28c6c8981574', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('7c5823b8-e157-449e-bffc-cf6cce2c9b4f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('7c8639b8-eff7-4045-8d46-edf4b47fc786', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('7cb8dd03-7af4-4c0c-ba24-3059699fd2f9', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('7d090dfa-56ef-40e3-a120-36e1bc237337', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Kinjal shah\",\"doctor\":null}', NULL, '2024-09-20 00:52:28', '2024-09-20 00:52:28'),
('7da96643-36c1-4a20-a0aa-48e2ac6ee95a', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Nayaran Bikram Shah\"}', NULL, '2024-09-20 05:46:46', '2024-09-20 05:46:46'),
('7dcee8bd-17ad-45d8-bac0-67e9fae1c826', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('7e8205f9-3c90-4ff0-9a34-d3ce39fcdfdd', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', '2024-09-20 07:31:22', '2024-09-20 07:27:33', '2024-09-20 07:31:22'),
('7e873449-7527-47af-bfe5-6d19577c9c07', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('7ed7358c-c426-4fa2-88a9-2796229d2571', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('7f1a3fd6-3741-478b-80f7-77f2e61e21ba', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-04-20 06:43:35', '2024-04-20 06:43:35'),
('7f37f504-afed-4f30-80eb-afae0ae97bde', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:55:06', '2024-09-20 06:55:06'),
('7f60bd16-aa6b-4cbf-875d-d69aab6abe60', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('7feedef9-a165-4f92-b1c3-0a6345a79c88', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('7ff853b0-e2b6-42e8-8aca-72336fe9567e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('8059cf53-cc7a-4404-b1f3-b6adabc103af', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('8066ad1a-72c6-4dac-bfe4-fcb7cfe6e8d2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', '2024-04-20 06:54:26', '2024-04-20 05:46:46', '2024-04-20 06:54:26'),
('8094f222-fbd3-453e-884f-c19f8a717d6e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', '2024-08-14 23:13:09', '2024-08-14 23:09:43', '2024-08-14 23:13:09'),
('80bea87d-e47a-4864-b305-3ea6cd270cd7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('81263a68-a4da-4df2-9aea-8e1d46125d54', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('812d3ed4-fbf6-4a6b-85f8-f5b62d2fb1bc', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('813ff54e-de40-4740-8ba6-258208d1eaef', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:32:40', '2024-09-20 05:32:40'),
('821a8a8e-06ad-49c8-8b5f-35aadf021b2a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null}', '2024-07-25 08:37:06', '2024-07-13 03:01:26', '2024-07-25 08:37:06'),
('8280876f-bba5-4d41-8464-f9fdd02528c8', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('830d3eb2-8766-4a92-8c7d-85088f5dfd75', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', '2024-07-25 02:23:14', '2024-07-13 03:00:44', '2024-07-25 02:23:14'),
('834a148c-5171-4e8a-9c45-397cafaf5ed5', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:47', '2024-09-20 04:22:47'),
('83769a38-5ea4-450f-b335-bd171ff3e1db', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:44:21', '2024-09-20 06:44:21'),
('84e167d6-56a2-47ad-b220-df9ea7eb0c96', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:50', '2024-08-14 23:07:50'),
('85cb0fa9-6583-4e57-be02-0facc65f533e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('863ae9a0-42d4-4606-bac8-a4040b06e25c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('8641ba97-5eed-4890-83d9-aed887a75e0e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('86bc2f9b-08d4-4023-adbe-130749b87e7c', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:09:52', '2024-04-20 07:03:48', '2024-04-20 07:09:52'),
('86dfdae8-bfc7-4d78-9295-62165766042a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-04-20 07:28:55', '2024-04-20 03:00:44', '2024-04-20 07:28:55'),
('86fda08a-c49f-4eb3-88fa-026badec7a13', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('871de1c0-75c1-4708-acd1-3d2bbc8e3234', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('87a04745-9d09-4804-9278-afd4689fa37f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('87abcb9f-9a2c-4ab0-8019-673a6425e5dd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('88d222a5-2502-453c-9112-9a2307622689', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('89602e4e-6468-4b45-b4f1-daf1c57605c7', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:16:26', '2024-09-20 06:16:26'),
('89cf0f12-fd53-4ade-a4ff-86ba1da4cca2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('8b714ea2-3f71-4841-841b-2362e1c5aa30', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('8b7f065b-fb9d-436f-93ca-c4edbf9ce0c3', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('8bfce430-8ae1-4d80-bc20-04f08e2a644f', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('8ce97c4d-6fc7-4e6a-b64f-8927fa750b5f', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 122, '{\"name\":\"Kinjal shah\",\"doctor\":null,\"b_id\":\"71\"}', '2024-09-20 00:51:13', '2024-09-20 00:50:54', '2024-09-20 00:51:13'),
('8dcc8464-5b94-486b-aeb9-f5ba979351bc', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('8df9fc01-fbd8-4551-b0b5-c5369d31a5ed', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Kinjal shah\"}', NULL, '2024-09-20 00:09:43', '2024-09-20 00:09:43'),
('8e5cb125-87c9-41e3-9d67-d31c806328b5', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"DHIRAJ\"}', NULL, '2024-09-20 06:58:54', '2024-09-20 06:58:54'),
('8f20e91e-5b74-4612-867e-6dc356823257', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('90128094-cc5a-4481-9a6b-76212c284157', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('9063aec6-4abd-4297-b887-2c947d5b0a04', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('907fca0e-aa0b-4d7a-a00f-43bac97018d1', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":\"Specialist Consultation\"}', NULL, '2024-07-13 03:11:22', '2024-07-13 03:11:22'),
('909f16e0-59ca-433d-8ff2-b71557594093', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('915ac060-5d6b-457b-b595-525829757217', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('9175c9a9-bd3d-4338-bc1b-b9f8cbad24e2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('91c6d51a-278e-4a28-be50-120a813e711b', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Dan Bikram Shah\"}', NULL, '2024-06-08 01:10:59', '2024-06-08 01:10:59'),
('922688c0-f00a-49dc-8f80-ff1a748e8244', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":null}', NULL, '2024-08-24 04:35:42', '2024-08-24 04:35:42'),
('93ebb173-955a-4df4-aef6-ceea9ed61abd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('93f976d0-b33e-4e2d-a37c-227ab6d3cb25', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('94ac3459-0c8b-4243-a7bc-52eae9c5ae34', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:54:50', '2024-09-20 06:54:50'),
('95aed0d1-3b95-4b9a-bcdd-a9c6dd872d11', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('96575cb6-a91d-4bbf-a8c9-26dd9ba1715c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('97094ec3-d956-43f3-b918-8ca0b401e8f4', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Juna shah\"}', NULL, '2024-09-20 07:40:33', '2024-09-20 07:40:33'),
('978f2a32-5233-4fd5-9b8f-02f1c056bdf4', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Merian Shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 07:33:17', '2024-04-20 07:33:17'),
('97c2d0b4-612d-471a-80a6-aecb69903b5a', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"merian shah\",\"service\":\"General Check-up\"}', NULL, '2024-05-12 08:30:34', '2024-05-12 08:30:34'),
('993c8d42-091c-4005-913a-8d1ee72d15ac', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('99f875a4-59e7-469c-8257-a05457deb0bc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('9a334d6b-7be0-40e0-b885-1dc3dac725fa', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('9a985541-195f-4031-bdab-d8ccf59c8683', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('9b35a769-ea86-440c-82cb-e4de41028f30', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('9baed9ce-7324-4d84-81a4-0c598f691123', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('9cddbc32-1f97-49a9-98f0-023fd2b5cf57', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('9e18b2b4-d5ad-48a0-94d1-7f9ee68f7e91', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:50', '2024-08-14 23:07:50'),
('9e1ae033-1723-4050-8c1e-97c5ccfeee2d', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', '2024-07-27 08:21:57', '2024-07-25 22:46:01', '2024-07-27 08:21:57'),
('9e4cc391-b422-4990-a73a-b5d40da617ed', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('9e5f4b2f-50f6-4c8d-952e-abab521673d3', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:54:50', '2024-09-20 06:54:50'),
('9f0ea18b-827d-43dd-9b38-bf27a2063f81', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('9ff74624-fb88-4588-bd4e-41c24a726694', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('a018745d-324d-4a46-82ab-4db7a3dac5c1', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('a0b2fd95-10cb-4107-9baf-018b1b34b625', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('a0d548a7-1da5-4edd-8bae-42c228965044', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Juna shah\"}', NULL, '2024-06-13 08:50:38', '2024-06-13 08:50:38'),
('a1094664-53f6-4c84-9fac-599bbc9b9d27', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:30:57', '2024-09-20 05:30:57'),
('a206dcdb-ec2f-4305-adbf-a9563930faaa', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":null}', NULL, '2024-08-14 09:43:53', '2024-08-14 09:43:53'),
('a292c913-0f45-4f29-89b7-216a6c7b48b7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('a38aa39b-81bb-4143-ae86-6806cf19e0cb', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('a3b6e1d1-3525-43fe-8b3a-42fd6837d0a8', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('a41c25e7-d960-46b2-8fa8-186033ed9ab4', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\"}', NULL, '2024-10-29 08:39:35', '2024-10-29 08:39:35'),
('a5c16c8c-cf71-446b-bf3f-edc222303f7c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('a5f784ed-23b6-4189-97bf-867d14783252', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('a6d8f457-4f90-4586-b725-092f806902f1', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('a7310a44-131c-4d5b-a289-640726fde595', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 05:16:22', '2024-09-20 05:16:22'),
('a7f04997-f322-43a6-ae75-bb20d3a1a930', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 48, '{\"b_id\":\"30\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-08-15 10:42:22', '2024-08-15 03:06:48', '2024-08-15 10:42:22'),
('a901356a-5ed3-40fe-ba02-155e03dfb6ce', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('aa2e2200-d8eb-4387-8911-409b3f8f1301', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('aa3c7434-63af-4633-8a67-5ecac3eaf0b1', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Kinjal shah\",\"service\":null}', NULL, '2024-09-20 00:20:07', '2024-09-20 00:20:07'),
('aa4e8476-687c-4e1f-b934-5f05b071761e', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('aa6ffd45-0da7-430c-acba-f0232fb3aa3d', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:55:06', '2024-09-20 06:55:06'),
('aaf71610-9fa8-4c28-81a8-392bc752703a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null,\"b_id\":\"32\"}', '2024-08-24 19:52:02', '2024-08-24 04:34:10', '2024-08-24 19:52:02'),
('ab436c53-e3ea-4bd4-933b-dc3c15bfe261', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('abfba8ac-b2ec-4b71-8d4a-b4a312438a66', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Shah\",\"doctor\":null,\"b_id\":\"77\"}', '2024-10-17 09:44:21', '2024-10-17 09:43:40', '2024-10-17 09:44:21'),
('ad63e927-801b-4582-8210-dc550a482ba1', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', '2024-04-20 07:09:42', '2024-04-20 05:46:46', '2024-04-20 07:09:42'),
('adbc061e-3051-4dd5-a685-2502972324da', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', '2024-09-20 00:48:54', '2024-09-20 00:15:09', '2024-09-20 00:48:54'),
('ae81a488-926a-4196-8feb-4d2d7c028677', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null}', '2024-07-27 02:27:02', '2024-05-19 21:11:40', '2024-07-27 02:27:02'),
('af49c1f8-bf5c-40e2-96fe-21c7df7b0cfc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('b0024d3d-57dc-48ad-88d4-301354496010', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('b00c418f-744a-4eb6-98e1-4162ae17c00e', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:15:55', '2024-09-20 03:15:55'),
('b05ac2f6-f9d0-45d2-a07b-dff74d47bb9e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('b07a4140-9cbc-43a0-b8a0-599fad624723', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', '2024-04-20 07:05:45', '2024-04-20 03:00:44', '2024-04-20 07:05:45'),
('b08a21df-eec4-437c-9484-ad8a554c0da5', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('b0da4da1-a3b4-42c1-a0e3-16f6a11d7597', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-17 09:42:11', '2024-10-17 09:42:11'),
('b1a4c67c-1bf6-4293-adf4-a05ca8d13c82', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('b249d774-d40f-43ce-bee6-1a86ec63b549', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('b2bd5db4-0086-4de0-b6b0-27f4e52676b8', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"29\"}', '2024-08-15 02:36:23', '2024-07-27 08:18:43', '2024-08-15 02:36:23'),
('b42a3b1d-5786-40a0-8331-cc2fd7b43da3', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('b4887791-870f-490d-99ff-dc659bbbdcf4', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"naraya\"}', NULL, '2024-09-20 03:25:13', '2024-09-20 03:25:13'),
('b4c19bb1-d538-4124-856f-b10240180e71', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Kinjal shah\",\"doctor\":null}', NULL, '2024-09-20 00:52:28', '2024-09-20 00:52:28'),
('b598520d-b58c-48c5-a962-b8caf93f7584', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('b69b76be-a0ed-406a-8f4a-959df6dbc71a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('b6b84cc7-a7d5-4ca7-a942-d337978f9314', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('b7b55c0c-bd7e-4148-86ec-b33b2dab4f8d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('b80201fe-012e-4ad0-ba16-614caa64014f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('b872199a-ba46-4969-94db-df918b0946d0', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('b8bead8a-b16f-46f6-8cdc-bd02abcfd16d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('b8c83c65-9f4f-40b7-8eaa-c32de95da74a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('b8d27977-3ed9-40cd-91c9-aac063fa0e0c', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:06:01', '2024-09-20 05:06:01'),
('b8d79dff-0ed1-4b92-87c4-cadfa8b3cae5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('b9437662-7b84-4581-84cd-bd8aac59dfbb', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Kinjal shah\",\"service\":null}', NULL, '2024-09-20 00:20:07', '2024-09-20 00:20:07'),
('b9b428b0-b35a-4e18-9fa8-2921630e8a8e', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:15:49', '2024-09-20 03:15:49'),
('bb1ecda5-8592-4c00-9084-f814b5a1100a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Diksha ghimire\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-20 20:06:13', '2024-05-20 20:06:13'),
('bd5810d2-69b9-4dcc-a1da-d6991ccfc1b2', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('bdae4ff3-d1c2-43fc-b57d-a2a2577a980a', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 57, '{\"b_id\":\"10\",\"doctor\":\"Milan aryal\"}', '2024-07-24 01:27:26', '2024-07-24 00:40:46', '2024-07-24 01:27:26'),
('be088c7c-e124-489d-8996-a90c8fd840e7', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:07:38', '2024-09-20 03:07:38'),
('bf3e85ae-5ead-4f1f-9b6b-babea1510554', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('bfa4bbb4-e916-43b1-89f0-cedd867f825a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('bfb48577-e797-4b9e-8f33-e06f76defa4b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('bfd3d625-5328-43d7-af5f-9897c2df8945', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"61\"}', NULL, '2024-08-24 01:05:25', '2024-08-24 01:05:25'),
('c06b6d64-90c6-4a16-bdc0-58054f9e8021', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('c15d7d42-4fb8-441a-8fbc-52397e2ba499', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Alisha shah\"}', NULL, '2024-06-13 05:55:57', '2024-06-13 05:55:57'),
('c212fbe0-c661-47d7-a4aa-3dab182f50c5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:27', '2024-08-03 00:41:27'),
('c26b3b48-c41d-42a4-aabc-4f1f06b37123', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:26', '2024-08-03 00:41:26'),
('c322909e-e0a8-489f-88d7-f12c11ef1c29', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Kinjal shah\"}', NULL, '2024-09-20 00:09:43', '2024-09-20 00:09:43'),
('c329fac0-a8a2-42b2-8b48-4d1d9916fa98', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"Merian Shah\",\"doctor\":null}', NULL, '2024-05-19 10:22:06', '2024-05-19 10:22:06'),
('c34a8c82-47f9-45d5-92b0-c09d6295a827', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Shah\",\"doctor\":null,\"b_id\":\"78\"}', NULL, '2024-10-17 09:51:54', '2024-10-17 09:51:54'),
('c3958fea-e272-4072-83e2-3272d816ae3b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('c3a87c2a-e286-40c9-8c0b-8afd2275c90c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('c40e907b-bbea-4388-b361-018f9b2c8693', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan\"}', NULL, '2024-09-20 04:30:45', '2024-09-20 04:30:45'),
('c432012d-ea58-42db-af0f-d6cb6a7593c9', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 07:34:03', '2024-04-20 07:34:03'),
('c4ecf3fd-7744-4e5c-b3b7-ac5231f54778', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Sanjeev\",\"b_id\":null}', NULL, '2024-08-13 05:21:04', '2024-08-13 05:21:04'),
('c533877d-cc0e-483d-8e90-6b4585cb539d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('c5772b12-974c-4a19-9435-26e7774f290f', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:44:21', '2024-09-20 06:44:21');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('c5dac76f-4902-436f-9125-c7db1dd03fe2', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('c61b5fc2-9259-4411-9ff1-63e16f0ca022', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:53:51', '2024-08-13 01:53:51'),
('c65830ce-a33e-429c-b87a-02e9988d6071', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:15:09', '2024-09-20 00:15:09'),
('c7925adc-8538-4562-bc15-339493d3271e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('c7d3e9c6-998d-4403-ab49-1ce36ec1c395', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('c80591fb-352f-4f55-8b60-c6cf67f2a0c7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('c828d563-d71a-433c-8d76-24e5c8fce7dd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('c952cc67-0a99-4218-9db4-1994003efbff', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"chor\"}', NULL, '2024-09-20 05:32:46', '2024-09-20 05:32:46'),
('ca2f3956-c59a-4aa6-89b6-caf0758d3366', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('cb12ee41-1a02-4ae2-b6fe-31237b157723', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-15 00:11:25', '2024-08-15 00:11:25'),
('cb2e721b-4480-4d31-a77e-8f76a0e516fb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('cb72f2ec-29af-40dd-a0cd-1da844b13ffa', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Simran shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-04-20 03:00:44', '2024-04-20 03:00:44'),
('cb89d706-7fcb-48d8-a161-c962aaa5e4cc', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('cbe10e73-f504-4089-ab83-7a82540a481a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('cc0a3fda-0afe-4d13-994d-7b676f9304ce', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('cc802e8e-5d56-4667-be2f-2d0bf2d0959f', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('cea22bf8-4628-41fe-b58f-280ee48b1c36', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:54:38', '2024-09-20 06:54:38'),
('cec1afa8-32f8-49ea-8315-907ba1dc3fec', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('cf527133-b515-4c92-bc28-0d595c15f231', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Kinjal shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-20 00:16:02', '2024-09-20 00:16:02'),
('cf7b0c81-6ede-4183-bdcf-d063da4fc7a8', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-17 08:08:19', '2024-09-17 08:08:19'),
('cfd5d148-5b60-4b8d-8757-94491595a9fe', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:55:28', '2024-09-20 06:55:28'),
('d04d585f-156c-4871-a8a8-93e7d2542160', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:15:55', '2024-09-20 03:15:55'),
('d21e219e-5d17-4301-b3a1-78f88f7538df', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('d34ec3c1-b4cf-4fb0-a0ab-f6ed965e6b03', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('d356278f-83f2-456b-ad89-77c95f415982', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('d3a4f17f-a25c-42a9-bbac-11a0a4eb16b6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:49', '2024-08-14 23:07:49'),
('d4ad9077-be58-4869-8499-3c7afa17d756', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"50\"}', '2024-08-15 02:33:05', '2024-08-15 00:16:41', '2024-08-15 02:33:05'),
('d6144681-8ddf-411e-be62-8d6cf1e01915', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('d62282f7-f44e-4ab8-b4ef-57161371a7e0', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"vibak\"}', NULL, '2024-09-20 04:43:07', '2024-09-20 04:43:07'),
('d717bf5b-6f3a-4d7c-a4d5-373243e66336', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('d761ffc6-5ba2-407e-b790-b5346654e883', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', '2024-09-20 00:50:49', '2024-09-20 00:50:28', '2024-09-20 00:50:49'),
('d7868a47-809a-4cd8-8d05-d2f0e3dac863', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('d90e089e-d6be-4ed2-a653-41a3d908bbf6', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-06 05:29:52', '2024-09-06 05:29:52'),
('d943da6d-cc65-4fb3-9918-acae98849ccf', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 57, '{\"name\":\"Simran Shah\",\"doctor\":null}', NULL, '2024-07-08 09:45:06', '2024-07-08 09:45:06'),
('d9b3afad-17b4-4033-b48f-2469bf5cce37', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('da226b1a-66b8-413c-bb07-9a7a690e0584', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-14 08:23:08', '2024-08-14 08:23:08'),
('da7e9fd5-1b4a-47b5-9091-3a9a3c5bdf64', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:07:38', '2024-09-20 03:07:38'),
('dae1f55d-66ec-42f8-b536-a6ba7cb99d67', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:50', '2024-08-14 23:07:50'),
('db09d736-4587-4691-830d-5dd7761223e3', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-03 00:41:27', '2024-08-03 00:41:27'),
('dcc8766b-ee88-4827-a39a-2c8ff3a11746', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"ramu\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-09-20 07:27:33', '2024-09-20 07:27:33'),
('dcefb653-d639-4061-9a72-53b3a2a6bd92', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-11-10 07:27:55', '2024-11-10 07:27:55'),
('dcf9c102-8355-49cc-9b5e-1fd40588792e', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Shah\",\"doctor\":null,\"b_id\":\"79\"}', NULL, '2024-10-29 08:35:45', '2024-10-29 08:35:45'),
('dd7272ec-e873-432c-b87e-e4f991564443', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\",\"b_id\":null}', NULL, '2024-09-20 00:50:28', '2024-09-20 00:50:28'),
('dd76f957-17de-4215-ae6b-df177d0ab5c5', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 08:59:31', '2024-08-14 08:59:31'),
('de3bab8d-c084-4b6e-9852-133d192a1e75', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:07:50', '2024-08-14 23:07:50'),
('df502bcc-e6d6-4276-a1ee-b0407e416105', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 15, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('df62834e-a8b0-4af2-a185-869889ad52b7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 4, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-13 06:32:37', '2024-08-13 06:32:37'),
('dfca8dd3-4e16-4cd6-aaf4-04a029cfd789', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 2, '{\"user_name\":\"Kinjal shah\",\"doctor\":\"DR. Diksha\"}', NULL, '2024-09-20 01:16:39', '2024-09-20 01:16:39'),
('e0962328-5eba-4204-bb13-46caf52e61c1', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null,\"b_id\":\"56\"}', NULL, '2024-08-15 00:12:58', '2024-08-15 00:12:58'),
('e0b8eced-e67f-4c36-83cf-f8e1c2567669', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:28:54', '2024-09-20 04:28:54'),
('e1814d61-e721-4092-a868-86e76230a08a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 63, '{\"name\":\"merian shah\",\"doctor\":null,\"b_id\":\"54\"}', '2024-08-24 19:52:08', '2024-08-14 23:13:14', '2024-08-24 19:52:08'),
('e1f10c0e-e2f4-4e96-8c09-45c4e7fe8394', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"kiran\"}', NULL, '2024-09-20 07:17:49', '2024-09-20 07:17:49'),
('e221c692-ee0d-415b-89ea-5be3a1127eb1', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('e225006e-28d5-4db5-98e0-24d1fd6a9028', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('e2327b24-46e0-4c20-bbbc-bcc898270e2e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('e2afda3f-b78e-414e-a2a2-50ab70629b3b', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('e2e0d6fa-4d59-456f-9650-effd0ba36f73', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"vibak\"}', NULL, '2024-09-20 04:43:00', '2024-09-20 04:43:00'),
('e34a27cc-ec58-44da-93df-858bf764e20d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('e35671eb-c1a4-415b-a589-55e08814442a', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('e3cdf638-84c2-4d80-81bb-0484a3f64e1e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('e4771d3a-e580-4b4c-a8f3-d6bb32bc500a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"62\"}', '2024-08-24 20:06:36', '2024-08-24 20:01:16', '2024-08-24 20:06:36'),
('e480013f-806d-478a-bd76-17cf517d7569', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-09-23 20:36:39', '2024-09-23 20:36:39'),
('e48a2a38-baae-4c81-94a2-3a52e3ca6850', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-08-22 00:58:15', '2024-08-22 00:58:15'),
('e507f0fc-f267-4746-9ff4-ce8c38b227de', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('e515026c-47d2-4991-8926-8e24713bbdb7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-24 20:00:34', '2024-08-24 20:00:34'),
('e56c41ec-ddc6-4d54-a313-4f90187343ef', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:27', '2024-09-20 04:22:27'),
('e5d0d62a-13e9-4636-8b44-1917e25ee6ff', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:28:54', '2024-09-20 04:28:54'),
('e6179ca3-39fe-411e-b0b4-05d2e643fe5e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"merian shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 23:22:35', '2024-08-14 23:22:35'),
('e6778224-b937-4780-a01e-95d80eccf1e7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('e71c1a60-5a8a-49d2-8bab-c8db541a9a33', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":null}', NULL, '2024-08-14 09:43:53', '2024-08-14 09:43:53'),
('e7ae5022-76d1-44a0-b364-9abefe538d0c', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-05-19 10:27:39', '2024-05-19 10:27:39'),
('e8b98af3-fc6e-4717-8df5-41cee9c96034', 'App\\Notifications\\reportNotification', 'App\\Models\\model_signup', 48, '{\"b_id\":\"5\"}', '2024-05-19 21:15:41', '2024-05-19 21:13:02', '2024-05-19 21:15:41'),
('e9018fa1-c538-4471-a663-a74884986ce5', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-14 23:05:29', '2024-08-14 23:05:29'),
('e915712f-38f1-45b0-a702-013ea3ecb62d', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Juna shah\"}', NULL, '2024-09-20 07:44:10', '2024-09-20 07:44:10'),
('e9984402-4a53-4f3e-be3b-4243aa5618ee', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-10-29 08:27:06', '2024-10-29 08:27:06'),
('e9fd6f1e-5e8d-4e3b-a0ef-a4b3d2bc1ab7', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-15 11:25:01', '2024-08-15 11:25:01'),
('ea03f7a3-6436-43e7-93bb-387d65b80526', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('ead4a21d-1027-42d8-bbe3-39831c6f1346', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 06:16:27', '2024-09-20 06:16:27'),
('eb160167-edf0-4799-9c90-98d1bafafcc1', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"merian shah\",\"doctor\":\"Kritan shah\",\"b_id\":null}', NULL, '2024-08-14 23:09:43', '2024-08-14 23:09:43'),
('eb33777b-ff54-49e0-8c54-307c28332cf8', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj Bikram Shah\",\"service\":null}', NULL, '2024-08-24 20:05:30', '2024-08-24 20:05:30'),
('eb4c8109-8747-4049-b3fe-20031a0b930c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 14, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('eb638e0f-a3ed-49f8-be99-3ba51f280097', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 2, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('ecbd1001-abe2-4e96-a838-8c6a17ee978e', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 122, '{\"name\":\"Kinjal shah\",\"doctor\":null,\"b_id\":\"71\"}', '2024-09-20 01:07:35', '2024-09-20 01:07:17', '2024-09-20 01:07:35'),
('ed7fa88e-7fca-4c58-8443-ea1020434c0d', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"vibak\"}', NULL, '2024-09-20 04:43:00', '2024-09-20 04:43:00'),
('eed980a8-e83d-4d6f-8a38-b63be460f498', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"ramu\"}', NULL, '2024-09-20 07:22:44', '2024-09-20 07:22:44'),
('f101fbfe-9ac6-4a8c-ba0e-a230382b26dc', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('f1226374-f7b5-4320-855f-6b2e08a369fb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"37\"}', '2024-08-03 20:21:52', '2024-08-03 20:14:30', '2024-08-03 20:21:52'),
('f15d6468-9a3e-4170-bdf6-b5265f7efb78', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"naraya\"}', NULL, '2024-09-20 03:23:31', '2024-09-20 03:23:31'),
('f18d4ff1-48e1-4f94-801e-ddaaf7eb34f2', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Alisha shah\",\"b_id\":null}', NULL, '2024-09-08 10:06:04', '2024-09-08 10:06:04'),
('f219b8ea-a496-45ce-9e1a-1db70f7adc6a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null}', NULL, '2024-07-11 08:31:18', '2024-07-11 08:31:18'),
('f28f66c7-fbf6-4b79-bb8d-e2a0b3193035', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"naraya\"}', NULL, '2024-09-20 03:23:37', '2024-09-20 03:23:37'),
('f31efe13-ed3c-4900-9007-93c43bb241f3', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"30\"}', '2024-08-02 08:55:19', '2024-08-01 05:22:47', '2024-08-02 08:55:19'),
('f3c2304b-d9a6-43ce-9075-70ee6ac68ca8', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('f409b333-582a-4751-b7db-e9cf677e046d', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan Bikram Shah\"}', NULL, '2024-09-20 03:15:49', '2024-09-20 03:15:49'),
('f4dba177-2cde-470f-ad36-33506180988a', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"merian shah\",\"doctor\":\"kalu panday\",\"b_id\":null}', NULL, '2024-08-14 22:15:19', '2024-08-14 22:15:19'),
('f5875f3a-96d1-437a-bdfa-82e3259ec669', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"35\"}', '2024-08-03 19:10:01', '2024-08-03 19:08:59', '2024-08-03 19:10:01'),
('f67b61a6-cbc6-4931-bf40-c2aec197192d', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 159, '{\"name\":\"ramu\",\"doctor\":null,\"b_id\":\"72\"}', NULL, '2024-09-23 20:38:30', '2024-09-23 20:38:30'),
('f695e3d1-76a5-4ade-a70e-1b1f34edcd03', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Narayan shah\"}', NULL, '2024-09-20 04:22:53', '2024-09-20 04:22:53'),
('f696df5e-d1da-435e-8209-5490d1672c6d', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 9, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-14 04:04:27', '2024-08-14 04:04:27'),
('f6bf71f7-b14a-4c97-b889-4097404927ed', 'App\\Notifications\\paymentNotification', 'App\\Models\\model_admin', 1, '{\"user_name\":\"Dhiraj bikram shah\",\"service\":\"Specialist Consultation\"}', '2024-04-20 07:29:06', '2024-04-20 07:03:48', '2024-04-20 07:29:06'),
('f73ad835-cf97-4609-a248-84389349cb73', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('f7e51506-534d-46f8-a7df-b2141046229c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 16, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('f82cdfc7-0a82-4f77-a65f-0a2aad135f08', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"Sabin Achary\"}', NULL, '2024-07-08 09:53:22', '2024-07-08 09:53:22'),
('f859dac3-be8c-4172-94f2-a7ab9ddbf98b', 'App\\Notifications\\Booknotification', 'App\\Models\\model_admin', 1, '{\"name\":\"dhiraj\",\"doctor\":\"Dhiraj bikram shah\"}', NULL, '2024-06-08 04:55:42', '2024-06-08 04:55:42'),
('faa00843-331f-4a0a-8036-f15ed6d1037c', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 6, '{\"name\":\"Dhiraj bikram shah\",\"doctor\":\"Milan aryal\"}', NULL, '2024-04-20 05:46:46', '2024-04-20 05:46:46'),
('fc54bb22-513b-47e8-b634-f5b07a789bf2', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"dhiraj\"}', NULL, '2024-09-20 05:16:22', '2024-09-20 05:16:22'),
('fc8303c0-c9fb-4ed5-b83e-ed858f5a89c2', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 2, '{\"customer\":\"Kinjak shah\"}', NULL, '2024-09-19 23:43:38', '2024-09-19 23:43:38'),
('fd60c8b7-dd50-468d-aafd-30d180df218f', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 48, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":null,\"b_id\":\"38\"}', '2024-08-03 20:30:58', '2024-08-03 20:30:37', '2024-08-03 20:30:58'),
('fdb86674-e14f-48c0-a549-34194e45d942', 'App\\Notifications\\registerNotification', 'App\\Models\\model_admin', 1, '{\"customer\":\"sankhar\"}', NULL, '2024-06-11 10:41:09', '2024-06-11 10:41:09'),
('fe0ece02-8a98-4bc5-9de1-e89de4a24cbd', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 8, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Milan aryal\",\"b_id\":null}', NULL, '2024-08-21 23:18:31', '2024-08-21 23:18:31'),
('fe38b0fd-ab75-49d7-ac4c-19c785472252', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 5, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-22 09:15:30', '2024-08-22 09:15:30'),
('ff401752-6cb8-432b-a24a-339f25f7f45e', 'App\\Notifications\\Booknotification', 'App\\Models\\doctor_v_model', 13, '{\"name\":\"Dhiraj Bikram Shah\",\"doctor\":\"Dhiraj bikram shah\",\"b_id\":null}', NULL, '2024-08-13 01:46:12', '2024-08-13 01:46:12'),
('ff9fb1b0-2331-4ec8-82a9-1eb42604c2eb', 'App\\Notifications\\Booknotification', 'App\\Models\\model_signup', 51, '{\"name\":\"Diksha ghimire\",\"doctor\":null}', '2024-08-15 03:01:51', '2024-05-20 20:53:20', '2024-08-15 03:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ram@gmail.com', 'r3dPFfYTMKi6uRVXMyTQly1PS2GTFktwcZETrLHCQlIAOMDf7alY1q3DtWOr63qG', '2024-09-08 09:41:26');

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
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `service`, `discription`, `price`, `created_at`, `updated_at`, `image`) VALUES
(2, 'General Check-up', 'The Check-up or general health test includes all the basic laboratory tests and a doctor\'s opinion to broadly know the state of your health and thus be able to timely detect important diseases such as hypertension, cancer, or diabetes, among others.', '1000', '2024-03-11 02:14:07', '2024-08-15 08:20:24', '1723730723-service.jpg'),
(3, 'Specialist Consultation', 'A specialist consultation can be a meeting between a doctor and a patient. It can also be a meeting or discussion that takes place between a patient\'s various healthcare providers.', '1000', '2024-03-11 02:15:08', '2024-08-15 08:23:45', '1723730925-service.jpeg'),
(9, 'Anesthesiology And Critical Care', 'The Department of Anesthesiology and Critical Care, Dhulikhel Hospital is dedicated for quality and safe anesthesia delivery. For this, Dhulikhel Hospital has consistently invested on the necessary technology and human resources.', '500', '2024-06-21 05:40:47', '2024-08-15 08:24:48', '1723730988-service.jpeg'),
(10, 'Forensic And Medical Toxicology', 'Department of Forensic Medicine & Toxicology in Dhulikhel Hospital was established since the Medical College was started. The Department deals with the medico legal cases presented in Dhulikhel Hospital along with the academic activity.', '500', '2024-06-21 05:41:38', '2024-08-15 08:26:28', '1723731088-service.jpeg'),
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
(48, 'Dhiraj Shah', 'male', 'dhiraj', '2d0191f0e0017203cd16465878ca6646', 'Bhaisepati, Lalitpur', '9868843736', 'dhiraj@gmail.com', '2024-03-24 23:50:09', '2024-09-22 05:53:13', '2024-03-25', 'ZDKVyBieMuZqKb6bprK9ofEWXfVV1f8fJR6xT9UD', '1726929845-doctor.jpg'),
(51, 'Diksha Ghimire', 'female', 'diksha', '44c4c9bb880e98e432bac9d8ba467366', 'ramechap', '98968843799', 'diksha@gmail.com', '2024-03-25 04:21:58', '2024-03-31 02:37:58', '2024-03-25', 'ylLP2bToHrGIKDiz3aADvX2A1vrAYevCduyOUBLL', '1711873353-doctor.jpg'),
(52, 'sanjeev dulal', 'male', 'sanjeev', 'cb4b23c321b3b1b4e6e78e10030fbd0f', 'pharping,kathmandu', '98968843736', 'sanjeev@gmail.com', '2024-03-25 09:54:49', '2024-09-08 06:18:59', '2024-03-25', 'lbIB7meKKDLe3nsV2lroFZwCuh4szg1MEE5g11y8', '1711801433-doctor.jpg'),
(56, 'kriatan shah', 'female', 'kritan', '554b0a0c32d80d1bc6814db945674bf8', 'pharping,kathmandu', '9868846565', 'kritan@gmail.com', '2024-03-26 07:03:35', '2024-03-26 07:03:48', '2024-03-26', 'ZfrU4iXLvCdEsC7HWxT2QhNWngiXPcMTryGk84LZ', NULL),
(57, 'Simran Shah', 'female', 'simran', 'af4e5834b08749e4351722895ad14f5a', 'Bhaisepati', '98968843736', 'simran@gmail.com', '2024-03-26 07:35:40', '2024-04-20 02:59:31', '2024-03-26', 'vZeTICPcn2yOxChdzgUcNDsnDzupNrtnXJMXicuh', '1713602671-doctor.jpg'),
(62, 'sajen', 'male', 'sajan', '62648a5c73dbfda4d05ffb977598da5d', 'pharping,kathmandu', '98968843736', 'sajan@gmail.com', '2024-04-01 00:21:29', '2024-04-01 00:24:45', '2024-04-01', 'bnbW2LqW6QDb2oWISbkC4vBXN9GdgG5pDFt6Eo4H', '1711951785-doctor.jpg'),
(63, 'merian shah', 'female', 'merian', '73f87c00bca7644d41f28ec20ce5cb69', 'chhaimale', '98968843736', 'merian@gmail.com', '2024-04-20 07:24:51', '2024-09-22 05:56:36', '2024-04-20', 'IzSKWNliWmhxLLXUDsdCC6SaHXSZtrazPwu1nCxZ', '1727005296-doctor.jpg'),
(64, 'Dan Bikram Shah', 'male', 'dan', '0f281d173f0fdfdccccd7e5b8edc21f1', 'chhaimale', '9841804003', 'dan@gmail.com', '2024-06-08 01:10:58', '2024-06-08 01:10:58', NULL, '1BCTS41bFQyyXm1vQi7ZwF6QpPEvtMnHIFilNtn4', NULL),
(65, 'sankhar', 'male', 'sss', '5975c85e8d2756810491f99edfa1cfed', 'Bhaisepati', '9868843736', 'sankhar@gmail.com', '2024-06-11 10:41:08', '2024-06-11 10:41:41', '2024-06-11', '52g56fhxf77fdLsVarpHXl8mkXaMqp1b52jzvqUq', NULL),
(66, 'Alisha shah', 'female', 'Alisha', 'dddf0ac818211584c38514bd95eca175', 'chhaimale', '9865321452', 'alisha@gmail.com', '2024-06-13 05:55:56', '2024-06-13 05:55:56', NULL, 'KhXPL9r7pM6158dOGvtpueiCCfos0CMMLUw6c5eO', NULL),
(111, 'Juna shah', 'female', 'juna', '0eb538dc0de6432f89c982fea915a462', 'chhaimale', '9868843736', 'juna@gmail.com', '2024-06-13 08:50:37', '2024-06-13 08:51:01', '2024-06-13', '9YERpKPdyxRyVAs7EvaNpMGCophq0CmdVm10nCrR', NULL),
(112, 'Sabin Achary', 'male', 'sabin', 'b12a7db8a9df15e19cdce7d30839dfb4', 'Chhaimale', '9865456321', 'sabin@gmail.com', '2024-07-08 09:53:21', '2024-07-08 10:09:32', '2024-07-08', 'Oa4nyYCIeqktqI2gt7vjnUuYsHHLaLTcLUVxuDyc', '1720454072-doctor.jfif'),
(113, 'Hari Acharya', NULL, NULL, '0769e56eb5d72039f01530d705e971da', NULL, '9865321245', 'hari@gmail.com', '2024-08-01 05:11:17', '2024-08-01 05:11:17', NULL, '4aDBxmCFtTdoYv73N1nNqI1LQdHXLzweQnJyimsd', NULL),
(114, 'kritan', NULL, NULL, '554b0a0c32d80d1bc6814db945674bf8', NULL, '9865656545', 'kritan@gmail.com', '2024-08-03 04:40:02', '2024-08-03 04:40:02', NULL, 'oqpbzJPdQ1v6xeDUXgMsclaF1yyVKbgiJ9hGtuzi', NULL),
(115, 'ram', NULL, NULL, 'b197fad67ca009b0e9f51d46a384bb49', NULL, '9865457896', 'ram@gmail.com', '2024-09-08 07:53:34', '2024-09-08 09:35:12', NULL, 'bwelrR9jEXhulyGULrgHdkiQDhXSDGNlp1599KpR', NULL),
(118, 'Ramu Yadav', NULL, NULL, '0a92f156f1c64ec9f8231b90da83e6eb', NULL, '9868745678', 'ramu@gmail.com', '2024-09-08 09:53:58', '2024-09-08 09:53:58', NULL, 'NCyIl0TUTfClAyB0Bj54wFwnY7KTtTkeIrOW34P1', NULL),
(122, 'Kinjal shah', NULL, NULL, '3cf5626399c349ed98a35e2b18faf7b6', 'pharping,kathmandu', '98968843738', 'kinjal@gmail.com', '2024-09-20 00:12:35', '2024-09-20 00:12:53', '2024-09-20', '1XaHL0IeHIHQsyJ5JD3bqmDhYi3fvcZf3RNzALJg', NULL),
(150, 'Nayaran Bikram Shah', NULL, NULL, 'a886a283649b012aecbdb013efd99098', 'Chhaimale', '9874563132', 'narayan@gmail.com', '2024-09-20 05:46:46', '2024-09-20 05:46:46', NULL, 'kV5OrqqakKm23YjMFUPFQnjbbyCbflGNBCD27VGd', NULL),
(157, 'DHIRAJ', NULL, NULL, '57c425770283c91a2db12514253e8c5b', 'chhaimale', '9874562145', 'dhirajsaha@gmail.com', '2024-09-20 06:58:54', '2024-09-20 07:00:45', '2024-09-20', 'rkO7O9DuVInbpNm6Lio5lNUHJW4T7PtEBGUL4G9M', NULL),
(158, 'kiran', NULL, NULL, 'cfca875af8f6742c515863628cf0bd35', 'chhaimale', '9874587455', 'kiran@gmail.com', '2024-09-20 07:17:49', '2024-09-20 07:21:33', '2024-09-20', '0yRZ345zKm3wxacZ7dWmOjY54WojjTwNt6jNAWph', NULL),
(159, 'ramu', NULL, NULL, '1e1f0f2e23567aa7da2eba900756af02', 'haha', '9874563210', 'ramubebi@gmail.com', '2024-09-20 07:22:44', '2024-09-20 07:23:28', '2024-09-20', '7QzjRJVi1LvVOLVrF75zl8a2UwfgL1wN9eLtwXaZ', NULL),
(161, 'Juna shah', NULL, NULL, '84d873c0abdfee61dbe45a8cdf4c85de', 'chhaimale', '98968843738', 'junaj@gmail.com', '2024-09-20 07:44:10', '2024-09-20 07:44:26', '2024-09-20', 'ssX04MZLurdXhmpWfYRQjqarkNEGZ7JTv08GACmQ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`id`, `user_id`, `doctor_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 63, 8, 4, '2024-07-04 00:03:52', '2024-07-04 01:00:56'),
(2, 63, 4, 4, '2024-07-04 01:01:34', '2024-08-11 08:27:17'),
(3, 48, 4, 5, '2024-07-04 01:06:17', '2024-08-22 09:20:30'),
(4, 48, 19, 3, '2024-07-04 04:22:33', '2024-08-10 05:23:12'),
(5, 48, 11, 3, '2024-07-05 03:37:17', '2024-09-18 21:52:50'),
(6, 48, 8, 4, '2024-07-06 00:12:25', '2024-09-23 20:35:45'),
(7, 57, 11, 5, '2024-07-06 02:09:41', '2024-07-06 03:56:37'),
(8, 57, 4, 4, '2024-07-06 03:58:28', '2024-07-06 03:58:38'),
(9, 48, 24, 5, '2024-07-23 09:22:01', '2024-09-22 06:16:24'),
(10, 63, 24, 3, '2024-08-01 23:32:49', '2024-08-01 23:32:49'),
(11, 63, 9, 2, '2024-08-01 23:34:38', '2024-08-01 23:43:52'),
(12, 63, 20, 3, '2024-08-01 23:35:11', '2024-08-01 23:35:47'),
(13, 63, 10, 2, '2024-08-01 23:37:34', '2024-08-01 23:41:53'),
(14, 63, 18, 1, '2024-08-01 23:43:22', '2024-09-22 00:55:38'),
(15, 63, 19, 2, '2024-08-01 23:44:09', '2024-08-01 23:44:09'),
(16, 48, 10, 5, '2024-08-01 23:47:57', '2024-08-10 05:22:16'),
(17, 48, 18, 4, '2024-08-01 23:52:34', '2024-08-10 05:22:49'),
(18, 48, 20, 4, '2024-08-01 23:55:54', '2024-08-10 05:22:29'),
(19, 48, 9, 4, '2024-08-02 00:02:03', '2024-08-03 04:49:03'),
(20, 48, 25, 5, '2024-08-03 20:09:09', '2024-08-10 06:12:16'),
(21, 48, 4, 3, '2024-08-10 01:14:27', '2024-08-10 01:14:27'),
(22, 48, 11, 3, '2024-08-10 01:15:25', '2024-08-10 01:15:25'),
(23, 118, 9, 4, '2024-09-08 10:00:25', '2024-09-08 10:00:25'),
(24, 118, 8, 1, '2024-09-18 21:43:26', '2024-09-18 21:43:53'),
(25, 122, 24, 2, '2024-09-20 00:14:34', '2024-09-20 00:14:34');

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
-- Indexes for table `commenttable`
--
ALTER TABLE `commenttable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commenttable_user_id_foreign` (`user_id`),
  ADD KEY `commenttable_doctor_id_foreign` (`doctor_id`);

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
  MODIFY `b_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `commenttable`
--
ALTER TABLE `commenttable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doctor_report`
--
ALTER TABLE `doctor_report`
  MODIFY `r_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_vendor`
--
ALTER TABLE `doctor_vendor`
  MODIFY `v_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `s_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- Constraints for table `commenttable`
--
ALTER TABLE `commenttable`
  ADD CONSTRAINT `commenttable_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commenttable_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `signup` (`u_id`) ON DELETE CASCADE;

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
