-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 05:42 PM
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
-- Database: `qlsv_tranthevu`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_students`
--

CREATE TABLE `table_students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `hometown` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_students`
--

INSERT INTO `table_students` (`id`, `fullname`, `dob`, `gender`, `hometown`, `level`, `group`) VALUES
(1, 'Trần Thế Vũ', '2005-12-11', 1, 'Hà Nội', 3, 2),
(2, 'Lê Văn Nam', '2005-12-12', 1, 'Hà Nội', 3, 2),
(3, 'Nguyễn Duy Minh', '2005-12-13', 1, 'Hà Nội', 3, 2),
(4, 'Lê Bá Hoàng', '2005-12-14', 1, 'Hà Nội', 3, 2),
(5, 'Nguyễn Quang Thành', '2005-12-15', 1, 'Hà Nội', 3, 2),
(6, 'Nguyễn Phúc Lộc', '2005-12-16', 1, 'Hà Nội', 3, 2),
(7, 'Đặng Thành Vinh', '2005-12-17', 1, 'Hà Nội', 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
