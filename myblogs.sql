-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 07:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`post_id`, `post_title`, `post_content`, `u_id`) VALUES
(5, 'sample', 'sample123', 0),
(7, 'sds', 'sdas', 0),
(9, 'sdfsf', 'sdfdsf', 0),
(10, 'sdfdsf', 'sfdsfs', 0),
(11, 'sdfsdf', 'sfdsf', 0),
(12, 'sfdsfdsf', 'sdfsdf', 0),
(13, 'sfdsf', 'sdfdsf', 0),
(14, 'sfdsfsf', 'sdfsf', 0),
(15, 'from user juana', 'content from user juana', 4),
(16, 'From rey user', 'content ni rey', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'June Rey', 'Palabrica', 'junereypalabrica@gmail.com', '123'),
(2, 'Juan', 'Dela cruz', 'juan@gmail.com', '1234'),
(3, 'asda', 'sdasda', 'werwer@', '123'),
(4, 'Juana', 'Dela cruza', 'juana@gmail.com', '$2y$10$cCs4aGAIZrNyVnsqDDk/7OWc5q42peJK89Bj7BM03CeiX/VuN/tku'),
(5, 'Jun', 'Rey', 'rey@gmail.com', '$2y$10$t2AMaz1ruifcy.HiKrj5Putb/sPNZRZi8pQRrNqIJSKWIZhqPDxK2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
