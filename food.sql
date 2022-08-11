-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 09:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(20) NOT NULL,
  `food_image` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `age_limit` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `calories` varchar(50) NOT NULL,
  `expiry_date` varchar(50) NOT NULL,
  `contact_info` varchar(200) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `reward_points` varchar(100) DEFAULT '0',
  `related_food` varchar(200) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(20) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_image`, `category`, `description`, `quantity`, `age_limit`, `type`, `calories`, `expiry_date`, `contact_info`, `location`, `reward_points`, `related_food`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 'VegAdult1.1653640082.jpg', 'Child', 'Healthy Fresh Red Apple for Healthy Snacks', '6', '00', 'Veg', '55', '2022-06-03', '9811002233', 'bhaktapur', '4', 'orange', '17', 1, '2022-05-26 11:32:12', '2022-05-27 14:23:02'),
(5, 'NonvegAdult1.1653642335.png', 'Adult', 'Well Packet Frozen Fish. Have a special Dinner!', '1', '60', 'Nonveg', '55', '2022-06-01', '987654234', 'Near Teaching Hospital', '4', 'fresh fish', '18', 1, '2022-05-27 08:50:35', '2022-05-27 14:35:35'),
(6, 'VegAdult1.1653642743.jpg', 'Adult', 'I love this tropicana but you can have it :)', '1', '35', 'Veg', '90', '2022-06-16', '987654234', 'Near Teaching Hospital', '6', 'juice', '18', 0, '2022-05-27 08:57:23', '2022-05-28 15:57:08'),
(7, 'VegChild1.1653644329.jpg', 'Child', 'Tasty Biscuit for you', '2', '15', 'Veg', '40', '2022-07-29', '9846789876', 'Near Teaching Hospital', '1', 'cookies', '18', 1, '2022-05-27 09:23:49', '2022-05-27 15:09:35'),
(8, 'VegAdult3.1653644725.jpg', 'Adult', 'Fresh Squash Pickle', '3', '50', 'Veg', '100', '2022-09-01', '9846789876', 'Near Teaching Hospital', '1', 'pickle', '18', 1, '2022-05-27 09:30:25', '2022-05-28 20:38:54'),
(9, 'VegAdult10.1653645107.png', 'Adult', 'Freshly made selroti\r\nspecially for non diabetic patients', '10', '43', 'Veg', '1024', '2022-06-04', '984678987', 'Near Teaching Hospital', '60', 'sukkha roti', '18', 1, '2022-05-27 09:36:47', '2022-05-27 15:21:47'),
(11, 'VegChild6.1653645309.webp', 'Child', 'Biscuit', '6', '40', 'Veg', '456', '2022-06-05', '9846789876', 'cbhj', '5', 'Bread', '18', 1, '2022-05-27 09:40:09', '2022-05-28 16:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `from_id` varchar(100) DEFAULT NULL,
  `to_id` varchar(100) DEFAULT NULL,
  `from_name` varchar(200) DEFAULT NULL,
  `to_name` varchar(200) DEFAULT NULL,
  `food_id` varchar(200) DEFAULT NULL,
  `message` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `today_date` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `from_name`, `to_name`, `food_id`, `message`, `today_date`, `created_at`, `updated_at`) VALUES
(15, '18', '17', 'Bibek', 'Muna KC', '3', 'hi', '27-05-2022', '2022-05-27 14:46:11', '2022-05-27 14:46:11'),
(16, '18', '18', 'Bibek', 'Bibek', '6', 'hi', '27-05-2022', '2022-05-27 14:51:22', '2022-05-27 14:51:22'),
(17, '17', '18', 'Muna KC', 'Bibek', '11', 'hello', '28-05-2022', '2022-05-28 20:19:56', '2022-05-28 20:19:56'),
(18, '18', '17', 'Bibek', 'Muna KC', '11', 'hi', '28-05-2022', '2022-05-28 20:21:09', '2022-05-28 20:21:09'),
(19, '18', '17', 'Bibek', 'Muna KC', '12', 'i want  this food', '28-05-2022', '2022-05-28 20:28:54', '2022-05-28 20:28:54'),
(20, '18', '17', 'Bibek', 'Muna KC', '3', 'heelo', '28-05-2022', '2022-05-28 20:54:59', '2022-05-28 20:54:59'),
(21, '17', '18', 'Muna KC', 'Bibek', '3', 'hi', '28-05-2022', '2022-05-28 20:56:34', '2022-05-28 20:56:34'),
(22, '18', '17', 'Bibek', 'Muna KC', '3', 'hi', '28-05-2022', '2022-05-28 20:57:58', '2022-05-28 20:57:58'),
(23, '17', '18', 'Muna KC', 'Bibek', '9', 'hi', '29-05-2022', '2022-05-29 00:58:52', '2022-05-29 00:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(20) NOT NULL,
  `notification` varchar(1000) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `to_id` varchar(20) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `status`, `to_id`, `url`, `created_at`, `updated_at`) VALUES
(2507298, 'You have successfully Verified. Please Login to Continue!', NULL, '17', '/login', '2022-05-28 07:17:12', '2022-05-28 13:02:12'),
(2507299, 'You have successfully Verified. Please Login to Continue!', NULL, '18', '/login', '2022-05-28 07:17:24', '2022-05-28 13:02:24'),
(2507300, 'You have successfully Verified. Please Login to Continue!', NULL, '17', '/login', '2022-05-28 07:17:36', '2022-05-28 13:02:36'),
(2507301, 'You have successfully Verified. Please Login to Continue!', NULL, '18', '/login', '2022-05-28 07:46:27', '2022-05-28 13:31:27'),
(2507302, 'You have new message from Muna KC.', NULL, '18', '/view-messages/11/18/17', '2022-05-28 14:34:56', '2022-05-28 20:19:56'),
(2507303, 'You have new message from Bibek.', NULL, '17', '/view-messages/11/17/18', '2022-05-28 14:36:09', '2022-05-28 20:21:09'),
(2507304, 'You have new message from Bibek.', NULL, '17', '/view-messages/12/17/18', '2022-05-28 14:43:54', '2022-05-28 20:28:54'),
(2507305, 'You have new message from Bibek.', NULL, '17', '/view-messages/3/17/18', '2022-05-28 15:09:59', '2022-05-28 20:54:59'),
(2507306, 'You have new message from Muna KC.', NULL, '18', '/view-messages/3/18/17', '2022-05-28 15:11:34', '2022-05-28 20:56:34'),
(2507307, 'You have new message from Bibek.', NULL, '17', '/view-messages/3/17/18', '2022-05-28 15:12:58', '2022-05-28 20:57:58'),
(2507308, 'You have successfully Verified. Please Login to Continue!', NULL, '17', '/login', '2022-05-28 18:44:45', '2022-05-29 00:29:45'),
(2507309, 'You have new message from Muna KC.', NULL, '18', '/view-messages/9/18/17', '2022-05-28 19:13:52', '2022-05-29 00:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `food_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 3, 17, 'Accepted', '2022-05-28 14:18:34', '2022-05-28 20:03:34'),
(22, 12, 17, 'Accepted', '2022-05-28 14:47:23', '2022-05-28 20:32:23'),
(29, 3, 18, NULL, '2022-05-28 15:09:48', '2022-05-28 20:54:48'),
(30, 3, 17, 'Accepted', '2022-05-28 15:11:43', '2022-05-28 20:56:43'),
(31, 3, 17, 'Accepted', '2022-05-28 15:11:46', '2022-05-28 20:56:46'),
(32, 3, 18, 'Accepted', '2022-05-28 15:13:08', '2022-05-28 20:58:08'),
(33, 9, 17, NULL, '2022-05-28 19:13:11', '2022-05-29 00:58:11'),
(34, 9, 17, 'Accepted', '2022-05-28 19:21:16', '2022-05-29 01:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(20) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `userid` int(20) NOT NULL,
  `foodid` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `review`, `userid`, `foodid`, `created_at`, `updated_at`) VALUES
(2, '3', 'nice one', 17, 11, '2022-05-27 16:39:09', '2022-05-27 22:24:09'),
(3, '2', 'dherai ramro xa', 18, 12, '2022-05-28 14:43:25', '2022-05-28 20:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(20) DEFAULT NULL,
  `otp_verified` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `status` int(20) NOT NULL DEFAULT 0,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `user_photo`, `email_verified_at`, `city`, `password`, `remember_token`, `otp`, `otp_verified`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '8888888888', 'default.jpg', NULL, 'ktm', '0e7517141fb53f21ee439b355b5a1d0a', NULL, NULL, 'no', 1, 'admin', NULL, '2022-05-25 23:40:04'),
(17, 'Muna KC', 'kc.muna2018@gmail.com', '999999', 'Muna KC.1653736004.JPEG', NULL, 'kathmanduu', NULL, NULL, NULL, 'yes', 1, 'user', '2022-05-26 11:14:40', '2022-05-28 18:44:45'),
(18, 'Bibek', 'sthabibek789@gmail.com', '9810001322', 'default.jpg', NULL, 'Maharajgunj', NULL, NULL, NULL, 'yes', 1, 'user', '2022-05-27 06:11:43', '2022-05-28 07:46:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2507310;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
