-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 12:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`name`, `email`, `password`, `gender`, `image`) VALUES
('ahmed', 'ahmed@gmail.com', '$2y$10$v8eXZClRrSOrjecjuezZCe1BmdCtGx4rPDK5nNKXE67uYN9wZNkXW', 'male', 'uploads/71ou9ky.jpg'),
('ahmeddahalan', 'ahmeddahahalan@d', '$2y$10$ZRqNTpks2hgjODdgrszkVOMWn1gbgk8IV5TvuhVtfiaJcGbRDXFbq', 'male', 'uploads/zed.jpg'),
('hala', 'hala@hala', '$2y$10$WpQjPILtr9PrshnuYC788eRZpJ1ObjSszB2ZA/C.cRxVUMBF3vVIe', 'female', 'uploads/Capture.PNG'),
('ismail', 'ismail@gmail.com', '$2y$10$8YG9Vim7I0eji/LXdh0oRueRa2L3meKvG3lbluxvyvBjYXqRxF7FG', 'male', 'uploads/96.PNG'),
('katarina', 'kata@hotmail.com', '$2y$10$skgpn0yApQuZJTuWFiYQhuJanOtJP..myME3xqxSDMkzcyVwHz2pu', 'female', 'uploads/55.PNG'),
('lolo', 'loloa2@yahoo.com', '$2y$10$.jmDXdxUj9Sr1//6aSqsW.CmhPe487GGAn/Ok2nsFAELTn8wekboi', 'female', 'uploads/jhin.jpg'),
('mohamed', 'mohamed@gmail.com', '$2y$10$hjBlhBJst9P64.JCv0k3AOV0FbECgIM/oa6MbMMYChF661qR20ZEW', 'male', 'uploads/911feaeca072aa3bc453cbfb15eee9a7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
