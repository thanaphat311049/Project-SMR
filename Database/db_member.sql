-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL COMMENT 'รหัสสมาชิก',
  `name` varchar(30) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(30) NOT NULL COMMENT 'นามสกุล',
  `telephone` int(10) NOT NULL COMMENT 'เบอรืโทรศัพท์',
  `medicine` varchar(30) NOT NULL,
  `height` int(30) NOT NULL,
  `weight` int(30) NOT NULL,
  `username` varchar(10) NOT NULL COMMENT 'Username',
  `password` varchar(128) NOT NULL COMMENT 'Password',
  `status` varchar(1) NOT NULL COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `lastname`, `telephone`, `medicine`, `height`, `weight`, `username`, `password`, `status`) VALUES
(1, 'Lattapon', 'Sugeeraphan', 808639147, '', 0, 0, 'LattaponSg', 'c9d7da96379a0000b000d241146eaa745fecba01e7ad80f11039e040b8ff83500fd90aa868f325d9f424c46207a1727336f86a091e062a4e73a1c716682eed4d', '1'),
(2, 'ธนภัทร', 'เพชรรัตน์', 808639147, '', 0, 0, 'Tee', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '0'),
(3, 'ธนภัทร', 'เพชรรัตน์', 808639147, '', 0, 0, 'Tee', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', '0'),
(4, 'ว่าที่ ร.ต.ศุภัคศร', 'เจริญชนม์', 989084686, '', 0, 0, 'tain', '55cff4a9a04f26d8044a905add60fc6a3e4e27e2ef338d1eea9d4bdba9b6d3107402754986b1a2f8603b8b6490967e7337c6a26dd453d7cc5ec4f3243042d849', '0'),
(5, 'ว่า', 'เจริญ', 98908468, '', 0, 0, 'Tain', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '0'),
(6, 'ธนภัทร', 'เพชรรัตน์', 808639147, 'ยาพารา', 175, 60, 'Tee', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
