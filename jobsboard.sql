-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 27 май 2021 в 19:22
-- Версия на сървъра: 10.4.19-MariaDB
-- Версия на PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `jobsboard`
--

-- --------------------------------------------------------

--
-- Структура на таблица `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `admins`
-- Парола на mario: mario123
--

INSERT INTO `admins` (`id`, `username`, `password_hash`) VALUES
(1, 'mario', '$2y$10$sLIlGtcGj3XfbSbpVdXo2Od6OMQa.EkbBtebme.94Syl9ujlwbnNK');

-- --------------------------------------------------------

--
-- Структура на таблица `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `companies`
--

INSERT INTO `companies` (`id`, `name`, `location`) VALUES
(1, 'DevriX', 'Sofia'),
(2, 'Astea Solutions', 'Sofia'),
(3, 'VMWare', 'Sofia');

-- --------------------------------------------------------

--
-- Структура на таблица `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL DEFAULT 0,
  `jobType` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `companyName`, `salary`, `jobType`, `status`) VALUES
(1, 'Back-end PHP Internship', 'PHP skills needed.', 'DevriX', 800, 'Intern', 'approved'),
(2, 'Front-end React Developer', 'Needed React skills.', 'DevriX', 1300, 'Junior Developer', 'approved'),
(3, 'Java Developer', 'Needed Java skills.', 'VMWare', 1500, 'Senior Developer', 'approved'),
(4, 'C# Intern', '', 'VMWare', 780, 'Intern', 'rejected'),
(5, 'C++ Developer', '', 'Astea Solutions', 3800, 'Senior Developer', 'approved');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `companies`
--
ALTER TABLE `companies`
  ADD UNIQUE KEY `uniqueCompanyId` (`id`);

--
-- Индекси за таблица `offers`
--
ALTER TABLE `offers`
  ADD UNIQUE KEY `offerId` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
