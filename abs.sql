-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 06:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `vehicle_no` varchar(255) DEFAULT NULL,
  `ambulance_size` enum('small','medium','large') DEFAULT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `status` enum('available','busy') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_id` bigint(20) DEFAULT NULL,
  `hospital_id` bigint(20) DEFAULT NULL,
  `profile` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulances`
--

INSERT INTO `ambulances` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `vehicle_no`, `ambulance_size`, `current_location`, `status`, `created_at`, `updated_at`, `vehicle_id`, `hospital_id`, `profile`) VALUES
(1, 'Driver 1', 'test1@driver.com', NULL, '$2y$10$MBWnhqhyBen6ZNjYTWVR0uZxhYa28JLhqG5pvkqdYIOJZKYDKnzxO', NULL, NULL, NULL, NULL, 'available', '2024-02-06 19:08:04', '2024-02-06 20:38:01', 1, 1, 'https://th.bing.com/th/id/R.8ede72ded472602a157562e0d4304581?rik=YWTgRXcmSn2dkQ&pid=ImgRaw&r=0');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `time` time NOT NULL,
  `message` text NOT NULL,
  `is_emergency` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('pending','accepted','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vehicle_id`, `hospital_id`, `fromdate`, `todate`, `time`, `message`, `is_emergency`, `status`, `created_at`, `updated_at`, `price`) VALUES
(28, 2, 1, 1, '2024-02-08', '2024-02-08', '11:35:00', 'yuug', 0, 'pending', '2024-02-06 20:35:38', '2024-02-06 20:35:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_bookings`
--

CREATE TABLE `emergency_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `hospital_id` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT '''pending''',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ambulance_id` bigint(10) DEFAULT NULL,
  `progress` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_bookings`
--

INSERT INTO `emergency_bookings` (`id`, `name`, `mobile`, `latitude`, `longitude`, `hospital_id`, `status`, `created_at`, `updated_at`, `ambulance_id`, `progress`) VALUES
(79, 'Test User 1', '353532324', 6.764483, 80.685602, '1', 'accepted', '2023-10-24 18:53:02', '2024-02-06 19:17:57', 1, 3);

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
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `services_offered` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `email`, `password`, `location`, `contact_number`, `capacity`, `services_offered`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `longitude`, `latitude`, `profile`) VALUES
(1, 'Test Hospital 1', 'test1@hospital.com', '$2y$10$8n0uVn9IdsZl1LqANxCjK.TIeZ9Dh7UOxRO.mhHQ4cgTijYkUkIbq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-18 22:38:24', '2023-10-18 22:38:24', 79.843900, 6.935000, 'https://th.bing.com/th/id/R.9bc7533fa0eb047dce9d1a5e8c3a78db?rik=ugvBlYqKJTnObA&pid=ImgRaw&r=0'),
(2, 'Test Hospital 3', 'test2@hospital.com', '$2y$10$JdUsTK1FTmrP/CNMenGc7es7cigkBXpZq7L/rC5uXnh9c5ShCkouy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-22 00:21:55', '2023-10-22 00:21:55', 79.843900, 7.935000, NULL),
(3, 'Test Hospital 4', 'test4@hospital.com', '$2y$10$JdUsTK1FTmrP/CNMenGc7es7cigkBXpZq7L/rC5uXnh9c5ShCkouy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-22 00:21:55', '2023-10-22 00:21:55', 79.843900, 8.935000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(5, '2023_05_15_034550_create_vehicles_table', 1),
(6, '2023_05_15_190146_create_admins_table', 1),
(7, '2023_05_15_194211_create_ambulances_table', 1),
(8, '2023_05_15_194211_create_hospitals_table', 1),
(9, '2023_05_15_204734_create_jobs_table', 1),
(10, '2023_09_06_024223_create_bookings_table', 1),
(11, '2023_09_26_034603_create_emergency_bookings_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `contact_number`, `address`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `profile`) VALUES
(1, 'ravindudharmaraja00@gmail.com', '$2y$10$MbdJOCyKtC028uEVrqu7e.o4tVO19i9GiXT7jjMPfSFCJAyVJuHJW', 'Ravindu Dharmaraja', '+10787379991', 'dsfdsffs', NULL, 'yNuV82f1ocWnneIp4Rvh3W0jiKF3qAy4Vh3IOz4apQgB52UYQ0V9JmFxfWlA', '2023-10-18 22:35:32', '2023-10-18 22:35:32', NULL),
(2, 'test9@user.com', '$2y$10$GWsfIeUswYcKGmAXLt2.x.qNAsc/WhnXHRi35gicWASbmyiv6tS0i', 'SL Hardwar', '645654464', '343', NULL, NULL, '2024-02-06 19:26:42', '2024-02-06 19:26:42', 'https://th.bing.com/th/id/R.8ede72ded472602a157562e0d4304581?rik=YWTgRXcmSn2dkQ&pid=ImgRaw&r=0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `price` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `plate_number` int(11) NOT NULL,
  `fuel` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `seatingcapacity` int(11) DEFAULT NULL,
  `airconditioner` int(11) DEFAULT NULL,
  `powerdoorlocks` int(11) DEFAULT NULL,
  `antilockbrakingsystem` int(11) DEFAULT NULL,
  `brakeassist` int(11) DEFAULT NULL,
  `powersteering` int(11) DEFAULT NULL,
  `driverairbag` int(11) DEFAULT NULL,
  `passengerairbag` int(11) DEFAULT NULL,
  `powerwindows` int(11) DEFAULT NULL,
  `cdplayer` int(11) DEFAULT NULL,
  `centrallocking` int(11) DEFAULT NULL,
  `crashsensor` int(11) DEFAULT NULL,
  `leatherseats` int(11) DEFAULT NULL,
  `regdate` varchar(255) DEFAULT NULL,
  `updationdate` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL,
  `status` enum('available','busy') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `hospital_id`, `title`, `brand`, `overview`, `price`, `year`, `plate_number`, `fuel`, `capacity`, `image1`, `image2`, `image3`, `image4`, `seatingcapacity`, `airconditioner`, `powerdoorlocks`, `antilockbrakingsystem`, `brakeassist`, `powersteering`, `driverairbag`, `passengerairbag`, `powerwindows`, `cdplayer`, `centrallocking`, `crashsensor`, `leatherseats`, `regdate`, `updationdate`, `updated_at`, `created_at`, `status`) VALUES
(1, 1, 'Ambulance 1', 'Audi', 'testtesttest test test testtesttest testtesttesttest test testtest test test test testvtesttest', 100, NULL, 0, 'Petrol', 5, 'http://127.0.0.1:8000/Vehicles/1707279057_image1.webp', NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2024-02-07 04:42:48', '2023-10-19 04:37:28', 'available'),
(2, 2, 'ambulanve 1', 'Dodge', 'sfsdfs sfsfs sdf f ssfsfsf ssfs', 300, NULL, 4444, 'Bio Gas', 9, 'http://127.0.0.1:8000/Vehicles/1707279057_image1.webp', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, NULL, NULL, '2024-02-07 04:43:33', '2023-10-22 05:52:42', NULL),
(3, 2, 'fffff', 'BMW', 'fffff ffff ffff', 444, NULL, 444, 'Desel', 4, 'http://127.0.0.1:8000/Vehicles/1707279057_image1.webp', NULL, NULL, NULL, NULL, 1, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, NULL, NULL, '2024-02-07 04:43:36', '2023-10-23 07:00:01', NULL),
(4, 1, 'Ambulance 9', 'Dodge', 'sdfs sdfsfsfsf', 300, NULL, 3435, 'Petrol', 5, 'http://127.0.0.1:8000/Vehicles/1707279057_image1.webp', 'http://127.0.0.1:8000/Vehicles/1707279057_image2.webp', 'http://127.0.0.1:8000/Vehicles/1707279057_image3.webp', NULL, NULL, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, NULL, NULL, '2024-02-06 19:40:57', '2024-02-07 01:10:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ambulances_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `bookings_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `emergency_bookings`
--
ALTER TABLE `emergency_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hospitals_email_unique` (`email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ambulances`
--
ALTER TABLE `ambulances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `emergency_bookings`
--
ALTER TABLE `emergency_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
