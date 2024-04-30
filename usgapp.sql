-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 04:38 PM
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
-- Database: `usgapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `conferencedetails`
--

CREATE TABLE `conferencedetails` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `venu` varchar(255) NOT NULL,
  `url` varchar(50) NOT NULL,
  `hoteladdress` varchar(50) NOT NULL,
  `about` varchar(255) NOT NULL,
  `aboutshort` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `banner` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferencedetails`
--

INSERT INTO `conferencedetails` (`id`, `name`, `email`, `phoneno`, `month`, `dates`, `year`, `venu`, `url`, `hoteladdress`, `about`, `aboutshort`, `price`, `latitude`, `longitude`, `logo`, `banner`, `title`, `token`) VALUES
(1, 'CCE-2024', 'catalysis@uniscigroup.org', '+1-469-854-2280', 'February', '26-28', '2024', 'Boston, MA', 'https://catalysis.unitedscientificgroup.org/', 'Boston Marriott Newton Hotel 2345 Commonwealth Ave', 'About CCE-2024\r\n8th International Conference on Catalysis and Chemical Engineering scheduled at Boston, MA during February 26-28, 2024, is committed to identify current trends, opportunities, and threats to the vitality and success of the chemical industr', '8th International Conference on Catalysis and Chemical Engineering scheduled at Boston, MA during February 26-28, 2024, is committed to identify current trends, opportunities, and threats to the vitality and success of the chemical industry - and prioriti', '399', '', '', 'Image_1706522334705.jpg', 'dental.jpg', 'Catalysis and Chemical Engineering', 'live'),
(2, 'Pharma R&D-2024', 'secretary@pharma-conference.com', '+1-469-854-2280', 'February', '26-28', '2024', 'Boston, MA', 'https://pharma-rnd.com', 'Boston Marriott Newton Hotel 2345 Commonwealth Ave', 'About Pharma R&D-2024\r\nPharma R&D continues the successful series of meetings over the past four years. Over the last year, we have seen pharma innovation advance at an incredible pace to tackle the COVID-19 pandemic. As the need for improved productivity', 'Pharma R&D continues the successful series of meetings over the past four years. Over the last year, we have seen pharma innovation advance at an incredible pace to tackle the COVID-19 pandemic. As the need for improved productivity and efficiency in drug', '499', '000', '000', '', 'ccm-banner.jpg', 'PharmScience Research & Development', 'live'),
(3, 'GEM-2024', 'research@gem-conference.com', '+1-469-854-2280', 'March', '04-08', '2024', 'Los Angeles, CA', 'https://globalenergymeet.com/', 'Four Points by Sheraton Los Angeles International ', 'The purpose of the GEM-2024 conference, which is focused on the field of Energy. The conference aims to bring together experts, researchers, industry leaders, and policymakers to discuss the latest innovations, trends, and solutions in the energy sector.\r', 'The purpose of the GEM-2024 conference, which is focused on the field of Energy. The conference aims to bring together experts, researchers, industry leaders, and policymakers to discuss the latest innovations, trends, and solutions in the energy sector.', '299', '00000', '00000', 'gem_logo.jpg', 'ren-banner.jpg', 'Global Energy Meet', 'upcoming'),
(5, 'Ensure-2024', 'organizer@conference-wastemanagement.com', '+1 617-969-3010', 'March', '11-13', '2024', 'BOSTON, MA', 'https://wasteandrecycling.org/', 'Four Points by Sheraton Boston- Newton 320 Washing', 'ABOUT ENSURE-2024\n1st International Conference on Environmental Sustainability through Waste and Recycling (ENSURE-2023) was held in a Hybrid mode indicates the adaptability and innovation of USG in navigating the challenges posed by the current global s', 'USG United Scientific Group (USG) is a non-profit organization like to extend our warmest congratulations to all the entire organizing committee, speakers, and presenters for the successful 1st International Conference on Environmental Sustainability thro', '499', '216512', '6451651', 'ensure_logo.jpg', 'sun-banner.jpg', 'WASTE AND RECYCLING', 'upcoming'),
(6, 'Nursing Science-2024', 'cne@usgnursingscience.org', '+1-844-395-4102', 'April', '17-19', '2024', 'Los Angeles, CA', 'https://nursing.unitedscientificgroup.org/', 'Four Points by Sheraton Los Angeles International ', 'Nursing Science Conference\r\nUSG-United Scientific Group, A non-profit organization, is glad to announce the \"7th International Conference on Nursing Science & Practice (Nursing Science-2024)\" scheduled for April 17-19, 2024, in Los Angeles, CA. The Nursin', 'USG-United Scientific Group, A non-profit organization, is glad to announce the \"7th International Conference on Nursing Science & Practice (Nursing Science-2024)\" scheduled for April 17-19, 2024, in Los Angeles, CA. The Nursing Science-2024 is a leading ', '399', '216512', '6451651', 'nursing_logo.jpg', 'ccm-banner.jpg', 'Nursing Science & Practice', 'upcoming'),
(13, 'NDS-2024', 'jlfjsalkf', '352143', '413', '64', '2024', '15', '1352', '54', '3514', '1312321', '263', '3321', '1231321', 'nursing_logo.jpg', 'sun-banner.jpg', '', 'next');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_data` longblob DEFAULT NULL,
  `image_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_data`, `image_path`) VALUES
(1, 0x313730353635323037323936332e6a706567, ''),
(2, 0x313730353636303539363038392e6a706567, ''),
(3, 0x313730353636303539363038392e6a706567, ''),
(4, 0x313730353636323333373030342e6a706567, 'uploads/1705662337004.jpeg'),
(5, 0x313730353636323333373030342e6a706567, 'uploads/1705662337004.jpeg'),
(6, 0x313730353635323037323936332e6a706567, 'uploads/1705652072963.jpeg'),
(7, 0x6162632e6a7067, 'abc.jpg'),
(8, 0x313730363136353533323536372e6a706567, '1706165532567.jpeg'),
(9, 0x313730363136353533323536372e6a706567, 'uploads/1706165532567.jpeg'),
(10, 0x313730363136353639343133332e6a706567, 'uploads/1706165694133.jpeg'),
(11, 0x313730363136363739393235372e6a706567, 'uploads/1706166799257.jpeg'),
(12, 0x313730363136373734333938392e6a706567, 'uploads/1706167743989.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `expiration_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `verification_code`, `expiration_timestamp`) VALUES
(64, 'nandu-pc2@outlook.com', '951249', '1712578211'),
(65, 'nandu-pc2@outlook.com', '844639', '1712579054');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `PW` varchar(50) NOT NULL,
  `isAdmin` varchar(10) NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `device_tokens` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `PW`, `isAdmin`, `mobilenumber`, `location`, `profile`, `device_tokens`) VALUES
(1, 'P.Nandu kumar', 'nandu@test.com', '21354e6bbf0f119b3e30b96362877da9', 'false', '+919010307021', 'HYD, TS, IND - 501218', 'Image_1709207099166.jpg', ''),
(2, 'admin', 'admin@test.com', '3929262652cb6594a5c26c97a904a292', 'true', '+9110101010', 'hyd, TS, IND', 'Image_1709207099166.jpg', ''),
(3, 'Nandu', 'nandu', 'c5355873ee78580bedfe6345c759b405', 'false', '9010307021', 'hyd', 'Image_1712577061802_344.jpg', 'expoPushToken');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferencedetails`
--
ALTER TABLE `conferencedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conferencedetails`
--
ALTER TABLE `conferencedetails`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
