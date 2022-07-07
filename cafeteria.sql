-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 05:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`) VALUES
(1, 'hot drinks'),
(2, 'cold drinks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('processing','out for delivery','done') NOT NULL DEFAULT 'processing',
  `total_price` decimal(8,2) NOT NULL,
  `room_no` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `room_no`, `notes`, `order_date`) VALUES
(2, 2, 'processing', '45.00', 2, 'coffe no suger', '2022-06-29 18:51:55'),
(3, 1, 'done', '20.00', 3, 'no notes', '2022-07-03 18:41:42'),
(4, 2, 'processing', '54.00', 1, '', '2022-07-04 20:44:43'),
(5, 2, 'processing', '54.00', 1, 'notes', '2022-07-04 20:45:16'),
(6, 2, 'processing', '81.00', 1, 'new notes', '2022-07-04 20:49:58'),
(7, 2, 'processing', '37.00', 3, 'new newww notes', '2022-07-04 20:54:09'),
(8, 2, 'processing', '54.00', 4, 'new notes', '2022-07-04 22:08:25'),
(9, 2, 'processing', '44.00', 3, 'hiughuithi', '2022-07-04 22:13:16'),
(10, 2, 'processing', '44.00', 3, 'hiughuithi', '2022-07-04 22:18:41'),
(11, 2, 'processing', '54.00', 3, 'note', '2022-07-04 22:19:17'),
(12, 2, 'processing', '54.00', 3, 'note', '2022-07-04 22:21:46'),
(13, 2, 'processing', '54.00', 3, 'iojiuh', '2022-07-04 22:22:21'),
(14, 2, 'processing', '6.00', 3, 'f', '2022-07-04 22:37:23'),
(15, 2, 'processing', '6.00', 2, 'coffe', '2022-07-04 22:38:10'),
(16, 2, 'processing', '6.00', 2, 'coffe', '2022-07-04 22:42:15'),
(17, 2, 'processing', '13.00', 4, 'coffe and nescafe', '2022-07-04 22:42:41'),
(18, 2, 'processing', '9.00', 4, 'hot choclate', '2022-07-04 22:45:36'),
(19, 2, 'processing', '6.00', 4, 'hot choclate', '2022-07-04 22:45:58'),
(20, 2, 'processing', '6.00', 4, 'hot choclate', '2022-07-04 22:47:02'),
(21, 2, 'processing', '6.00', 4, 'hot choclate', '2022-07-04 22:47:10'),
(22, 2, 'processing', '37.00', 3, 'note', '2022-07-04 22:51:23'),
(23, 2, 'processing', '15.00', 3, 'notehgj', '2022-07-04 22:53:07'),
(24, 2, 'processing', '15.00', 3, 'notehgj', '2022-07-04 22:53:29'),
(25, 2, 'processing', '15.00', 3, 'notehgj', '2022-07-04 22:53:32'),
(26, 2, 'processing', '6.00', 3, 'notehgj', '2022-07-04 22:53:37'),
(27, 2, 'processing', '9.00', 1, '', '2022-07-04 22:55:13'),
(28, 2, 'processing', '10.00', 1, 'kjhk', '2022-07-04 22:55:26'),
(29, 2, 'processing', '22.00', 2, 'hgh', '2022-07-04 23:04:09'),
(30, 2, 'processing', '23.00', 3, 'hhhj', '2022-07-04 23:08:31'),
(31, 2, 'processing', '6.00', 1, 'jh', '2022-07-04 23:09:17'),
(32, 2, 'processing', '6.00', 1, 'hy', '2022-07-04 23:11:29'),
(33, 2, 'processing', '6.00', 2, 'hym', '2022-07-04 23:15:23'),
(34, 2, 'processing', '23.00', 1, 'fhg', '2022-07-04 23:18:28'),
(35, 2, 'processing', '18.00', 1, 'jkhiukj', '2022-07-04 23:20:10'),
(36, 2, 'processing', '90.00', 3, 'new order ', '2022-07-05 13:58:50'),
(37, 2, 'processing', '54.00', 3, 'orderrrrrrr', '2022-07-05 14:15:23'),
(38, 2, 'processing', '47.00', 5, 'jhguydfyghj', '2022-07-05 14:17:08'),
(39, 2, 'processing', '18.00', 5, 'coffe and oil', '2022-07-05 16:09:27'),
(40, 2, 'processing', '27.00', 5, '', '2022-07-05 16:09:40'),
(41, 2, 'processing', '21.00', 5, 'yttttttttttttttttttttttttttttt', '2022-07-05 16:09:56'),
(42, 2, 'processing', '15.00', 5, 'srtyhj', '2022-07-05 16:19:55'),
(43, 3, 'processing', '23.00', 3, 'fghjjhgfd', '2022-07-05 20:33:03'),
(44, 1, 'processing', '18.00', 4, 'nbj', '2022-07-07 08:00:14'),
(45, 3, 'processing', '41.00', 3, 'kjhg', '2022-07-07 08:01:25'),
(46, 3, 'processing', '15.00', 3, ' nv', '2022-07-07 08:02:17'),
(47, 2, 'processing', '13.00', 3, 'kjhgf', '2022-07-07 17:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, NULL, 3, 5),
(2, NULL, 5, 3),
(3, 2, 4, 2),
(4, 2, 5, 5),
(5, 3, 3, 4),
(6, 4, 1, 1),
(7, 4, 2, 1),
(8, 4, 3, 1),
(9, 5, 1, 1),
(10, 5, 2, 1),
(11, 5, 3, 1),
(12, 6, 1, 5),
(13, 6, 5, 1),
(14, 6, 4, 4),
(15, 7, 1, 1),
(16, 7, 2, 1),
(17, 7, 3, 1),
(18, 13, 1, 1),
(19, 13, 2, 1),
(20, 13, 3, 1),
(21, 13, 4, 1),
(22, 13, 5, 1),
(23, 13, NULL, 1),
(24, 13, 6, 1),
(25, 14, 1, 1),
(26, 15, 1, 1),
(27, 16, 1, 1),
(28, 17, 1, 1),
(29, 17, 2, 1),
(30, 27, 4, 1),
(31, 28, 5, 1),
(32, 29, 4, 1),
(33, 29, 1, 1),
(34, 29, 2, 1),
(35, 34, 1, 1),
(36, 34, 2, 1),
(37, 34, 5, 1),
(38, 35, 1, 1),
(39, 35, NULL, 1),
(40, 37, 1, 1),
(41, 37, 4, 1),
(42, 37, NULL, 1),
(43, 37, 2, 1),
(44, 37, 5, 1),
(45, 37, 6, 1),
(46, 37, 3, 1),
(47, 38, 4, 1),
(48, 38, 1, 1),
(49, 38, NULL, 1),
(50, 38, 5, 1),
(51, 38, 3, 1),
(52, 38, 6, 1),
(53, 39, 1, 1),
(54, 39, NULL, 1),
(55, 39, 2, 1),
(56, 39, 4, 1),
(57, 40, 1, 1),
(58, 40, 4, 1),
(59, 40, NULL, 1),
(60, 41, 1, 1),
(61, 41, 5, 1),
(62, 41, 6, 1),
(63, 42, 1, 1),
(64, 42, 4, 1),
(65, 42, NULL, 1),
(66, 43, 1, 1),
(67, 43, 2, 1),
(68, 43, 5, 1),
(69, 44, 1, 1),
(70, 44, 2, 1),
(71, 44, 3, 1),
(72, 45, 1, 1),
(73, 45, 3, 1),
(74, 45, 11, 1),
(75, 46, 5, 1),
(76, 46, 6, 1),
(77, 47, 2, 1),
(78, 47, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `cat_id`) VALUES
(1, 'Coffee', '6.00', '1.jpg', 1),
(2, 'Nescafe', '7.00', '2.jpg', 1),
(3, 'Tea', '5.00', '3.jpg', 1),
(4, 'Hot chocolate', '9.00', '4.jpg', 1),
(5, 'Cola', '10.00', '5.jpg', 2),
(6, 'lemon', '5.00', '6.jpg', 2),
(11, 'icecream', '30.00', 'ice-cream.png', 2),
(12, 'orange', '50.00', 'orange-juice.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `room_no` int(11) NOT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `room_no`, `ext`, `img`) VALUES
(1, 'fatma', 'user1@gmail.com', '123', 1, '6652', '7.jpg'),
(2, 'eman', 'user2@gmail.com', '123456', 2, '2547', '8.jpg'),
(3, 'abdallah', 'user3@gmail.com', '1234', 2, '1200', 'client-7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cats` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
