-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 10:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_teacher`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `short_name`, `institute_name`, `logo`, `date_created`, `date_updated`) VALUES
(1, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'Online Tutor', 'Online Tutor Finder', 'user8-128x128.jpg', '2024-05-15 02:47:30', '2024-05-19 19:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `learn` varchar(255) NOT NULL,
  `charge` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `contact`, `password`, `learn`, `charge`, `image`, `date_created`, `date_updated`) VALUES
(1, 'Sanjit Gorai', 'sanjitgorai@gmail.com', 8967780930, 'e10adc3949ba59abbe56e057f20f883e', 'Web Design', 1500, 'uploads/4b45aafa344035d7431ce0b1bfcaca8f.png', '2024-05-15 08:28:02', '2024-05-19 19:37:41'),
(2, 'Sanjit Gorai', 'sanjitgorai@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e', 'Graphic Design', 1500, 'uploads/4d71628172e1eb446f91ccecb7bf88a7.png', '2024-05-15 08:32:23', '2024-05-19 19:24:02'),
(3, 'Sanjit Gorai', 'sanjitgorai@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e', 'Graphic Design', 1500, 'uploads/4d71628172e1eb446f91ccecb7bf88a7.png', '2024-05-19 17:07:44', '2024-05-19 19:24:02'),
(4, 'Sanjit Gorai', 'sanjitgorai@gmail.com', 0, 'e10adc3949ba59abbe56e057f20f883e', 'Graphic Design', 1500, 'uploads/4d71628172e1eb446f91ccecb7bf88a7.png', '2024-05-19 17:13:30', '2024-05-19 19:24:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
