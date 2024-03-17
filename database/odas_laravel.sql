-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 04:51 PM
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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('female','male','other') NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `name`, `gender`, `date`, `email`, `address`, `service`, `doctor`, `time`, `number`, `created_at`, `updated_at`, `u_id`, `status`) VALUES
(2, 'Hari acharya', 'male', '2024-03-19', 'hari@gmail.com', 'chhaimale', 'General Check-up', 'Milan Bikram Shah', '12:30 - 1:00', '9868846565', '2024-03-04 00:45:06', '2024-03-13 00:35:57', 5, 1),
(4, 'Dhiraj', 'male', '2024-03-06', 'dhiraj@gmail.com', 'Bhaisepati', 'audi', 'volvo', '12:30 - 1:00', '9868843736', '2024-03-04 04:12:34', '2024-03-10 06:34:09', 6, 0),
(5, 'Dhiraj bikram shah', 'male', '2024-03-06', 'dhirajbikram@hotmail.com', 'chhaimale', 'saab', 'mercedes', '12:30 - 1:00', '9868846565', '2024-03-04 06:18:03', '2024-03-10 05:25:23', 6, 1),
(6, 'milan', 'male', '2024-03-14', 'milan@gmail.com', 'Bhaisepati', 'Specialist Consultation', 'mercedes', '12:30 - 1:00', '9868846565', '2024-03-11 04:36:57', '2024-03-11 04:40:06', 5, 1),
(7, 'Dhiraj Bikram Shah', 'male', '2024-03-14', 'dhirajbikram@hotmail.com', 'Bhaisepati', 'General Check-up', 'saab', '12:30 - 1:00', '9865323232', '2024-03-12 09:37:10', '2024-03-12 09:37:32', 2, 1);

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
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `name`, `nmc_no`, `specialist`, `qualification`, `experiance`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Dhiraj bikram shah', '4455', 'Neurologist', 'mbbs', '4 year', '1710251147-doctor.jpg', '2024-03-12 08:00:47', '2024-03-13 06:25:23'),
(6, 'Milan Bikram Shah', '4562', 'Neurologist', 'mbbs,md', '4 year', '1710312227-doctor.jpg', '2024-03-13 00:58:48', '2024-03-13 00:58:48'),
(8, 'Milan aryal', '4455', 'Anesthesiologists', 'mbbs,md', '2 year', '1710331610-doctor.jpg', '2024-03-13 06:21:50', '2024-03-13 06:21:50'),
(9, 'Sanjeev', '4455', 'Neurologist', 'mbbs,md', '3 year', '1710341309-doctor.jpg', '2024-03-13 09:03:29', '2024-03-13 09:03:29');

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
(13, '2024_03_12_140922_add_column_qulification_to_doctor', 9);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `service`, `discription`, `price`, `created_at`, `updated_at`) VALUES
(2, 'General Check-up', 'Routine examination by a general practitioner', '700', '2024-03-11 02:14:07', '2024-03-11 02:14:07'),
(3, 'Specialist Consultation', 'Consultation with a specialist doctor such as a cardiologist, dermatologist, orthopedist, etc', '1000', '2024-03-11 02:15:08', '2024-03-11 02:15:08'),
(4, 'jap', 'kjahd', '2500', '2024-03-11 02:31:21', '2024-03-12 09:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`u_id`, `fullname`, `gender`, `username`, `password`, `address`, `number`, `email`, `created_at`, `updated_at`) VALUES
(2, 'Milan', 'male', 'milan', '83227a721a3363d2c78381664c78657f', 'chhaimale', '9868846565', 'milan@gmail.com', '2024-02-26 09:46:36', '2024-02-26 09:46:36'),
(5, 'hari', 'male', 'hari', 'a9bcf1e4d7b95a22e2975c812d938889', 'chhaimale', '9868843736', 'hari@gmail.com', '2024-03-03 00:13:24', '2024-03-03 00:13:24'),
(6, 'Dhiraj Bikram Shah', 'male', 'dhiraj', '432639de2357c9d560a9c3d022d3fc8a', 'Bhaisepati', '9868843736', 'dhiraj@gmail.com', '2024-03-04 04:11:13', '2024-03-04 04:11:13'),
(8, 'Dhiraj Bikram Shah', 'male', 'dhiraj', '432639de2357c9d560a9c3d022d3fc8a', 'Bhaisepati', '9868843736', 'dhiraj@gmail.com', '2024-03-16 20:47:57', '2024-03-16 20:47:57');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `s_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `signup` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
