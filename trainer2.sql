-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2024 at 03:42 PM
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
-- Database: `online_teacher_trainer`
--

-- --------------------------------------------------------

--
-- Table structure for table `trainer2`
--

CREATE TABLE `trainer2` (
  `trainer_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL CHECK (`email` like '%_@__%.__%'),
  `phone_number` int(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `qualification_level` varchar(20) NOT NULL CHECK (`qualification_level` in ('Bachelor','Master','Doctorate')),
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer2`
--

INSERT INTO `trainer2` (`trainer_id`, `fname`, `lname`, `email`, `phone_number`, `country`, `subject`, `qualification_level`, `password`) VALUES
(1, 'Vehan', 'Rajintha', 'IT23646360@my.sliit.lk', 713910417, 'Sri Lanka kpp', 'ewefe', 'Master', '$2y$10$IYbIPoPYu/HQiJz.sUtwgO/q.4Q9GkfMCT1SrDqTwz2ji1yYZhd8C'),
(2, 'Vehan', 'Rajintha', 'IT23646360@my.sliit.lk', 713910417, 'Sri Lanka kpp', '123', 'Bachelor', '$2y$10$kzr5Z4ePxBo3wlWJK055aej9WP8hTNiw3DGN.6cy47LIAzNzlWzZu'),
(3, 'Vehan', 'Rajintha', 'IT23646360@my.sliit.lk', 713910417, 'Sri Lanka kpp', 'ewefe', 'Master', '$2y$10$1vq5uEZ0OtzQyo9eR/b.9e5Dl7/yPV8H.jUPqvDoOPS75fnF3AMOe'),
(4, 'kehan', 'weerasekera', 'kehan123@gmail.com', 98765443, 'srilanka', 'ihjioijh', 'Bachelor', '$2y$10$qCSSG7BgSrRr8rO948.h5u/CjOOLyssnXhOHZyb2lDcT1/lvEqTjO'),
(5, 'Kehan', 'Weerasekara', 'kehan@gmail.com', 123456, '123456', 'bhblb', 'Bachelor', '$2y$10$y8ETtWU7XecomEYn9h/i..x04yJPU3QfKSJf3yc4nka17znk0k5P2'),
(6, 'kehan', 'hansaja', 'kehan@gmail.com', 123456, 'srilmnks', 'jnknknkj', 'Bachelor', '$2y$10$9CGovCTV5uDZHs8ZUct0X.nmE3Put8Q4qQMkH2CH9VlbvYhQOHUYW'),
(7, 'kehan', 'hansaja', 'kehan123@gmail.com', 1234456, 'bblkbl', 'vkjbl', 'Bachelor', '$2y$10$1ywaVmUNlZ4JgcW6aA5yIeoOTClmjhBAX6eMdq0kjxI8FCMyG4xjC'),
(9, 'kehan', 'weerasekara', '123@gmail.com', 12345, 'nknini', 'm nmnk', 'Bachelor', '$2y$10$Vb9KUlJ38ode25ia2hkbHO7qFw9kM2tdr75K2Ez/zgjdXj4P6iQWy'),
(10, 'kehan', 'weerasekara', '123@gmail.com', 12345, 'nknini', 'vjhvvkbl', 'Bachelor', '$2y$10$H913q7I27ZBDeKzLRghBFO5gqtaz7EBnuEXGR8bmsKahM6cbO4KgK'),
(11, 'nvkv,mb', ' mnv,v', '1234@gmail.com', 12345567, 'vmvm ', 'cvlvlv', 'Bachelor', '$2y$10$WLF.iUiW7tdzGuG/mMtmOe79vcL.PcWL25vzBje3OXMMouDgB8DE2'),
(12, 'hvhjglbbjkbk', 'v jvj,', '12345@gmail.com', 123456778, 'bjhgkl', 'nvkhv.', 'Bachelor', '$2y$10$85gkJTGcSrzPFC8vPBmn5ucU4f8A6tceLE73fD.lDiJC7qUI71jRe'),
(13, 'tduyfilgil;', 'bncvjmv,', '123456@gmail.com', 1234567998, 'vjvlv', 'dfdfkvk', 'Bachelor', '$2y$10$f9W8ms3WHENkfgH697wfiebnao9YHcGsXJGhtw2HkGiHbjejFy71u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trainer2`
--
ALTER TABLE `trainer2`
  ADD PRIMARY KEY (`trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trainer2`
--
ALTER TABLE `trainer2`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
