-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 09:10 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `year` int(4) NOT NULL,
  `rating` varchar(1555) NOT NULL,
  `runtime` varchar(15) NOT NULL,
  `language` varchar(15) NOT NULL,
  `imagePath` varchar(155) NOT NULL,
  `isRequested` int(2) NOT NULL DEFAULT 0,
  `isAccepted` int(2) NOT NULL DEFAULT 0,
  `720pMagnet` varchar(255) NOT NULL,
  `1080pMagnet` varchar(255) NOT NULL,
  `comment_status` int(2) NOT NULL DEFAULT 0,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `year`, `rating`, `runtime`, `language`, `imagePath`, `isRequested`, `isAccepted`, `720pMagnet`, `1080pMagnet`, `comment_status`, `user_fk`) VALUES
(1, 'Conni and the Cat', 2020, '6.1', '76', 'de', 'https://yts.mx/assets/images/movies/conni_and_the_cat_2020/medium-cover.jpg', 0, 1, '', '', 1, 2),
(2, 'The King', 2000, '3.2', '0', 'en', 'https://yts.mx/assets/images/movies/the_kings_guard_2000/medium-cover.jpg', 0, 1, '', '', 1, 2),
(3, 'Messenger of Wrath', 2017, '5.4', '125', 'en', 'https://yts.mx/assets/images/movies/messenger_of_wrath_2017/medium-cover.jpg', 1, 0, '', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `access_level` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `access_level`) VALUES
(1, 'administrator', 'admin@gmail.com', '12345', 1),
(2, 'strahinja', 'strahinja@gmail.com', '12345', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
