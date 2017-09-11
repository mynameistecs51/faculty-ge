-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2017 at 10:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty_ge`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `ac_id` int(11) NOT NULL,
  `ac_title` text COLLATE utf8_unicode_ci NOT NULL,
  `ac_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `ac_pict` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `ip_create` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ac_id`, `ac_title`, `ac_detail`, `ac_pict`, `dt_create`, `ip_create`) VALUES
(2, 'test', 'test', '300817_155340_0.jpg,230817_101247_0.jpg,230817_101247_1.jpg', '2017-08-30 15:53:40', '::1'),
(54, 'tet', 'tet', '230817_131726_0.jpg,230817_131639_0.jpg', '2017-08-23 13:17:26', '::1'),
(55, 't', 't', '300817_155359_0.jpg,300817_155359_1.jpg,300817_155359_2.jpg', '2017-08-30 15:53:59', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อนักวิจัย',
  `doc_lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อสกุลนักวิจัย',
  `doc_moneySupport` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รับทุนจาก',
  `doc_amount` int(11) NOT NULL DEFAULT '0' COMMENT 'จำนวนเงิน',
  `doc_publicationWhere` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'งานวิจัยได้ตีพิมพ์ที่',
  `doc_researchName` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่องานวิจัย',
  `doc_abstract` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'บทคัดย่อ',
  `doc_outline` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'เค้าโครงงานวิจัย',
  `doc_progress` text COLLATE utf8_unicode_ci COMMENT 'ความก้าวหน้า(3บท)',
  `doc_filesuccess` text COLLATE utf8_unicode_ci COMMENT 'รูปเล่ม',
  `dt_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'วันที่สร้าง',
  `ip_create` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'ip ที่สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='จัดเก็บเอกสาร';

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id_fund` int(11) NOT NULL,
  `fund_title` text COLLATE utf8_unicode_ci NOT NULL,
  `fund_source` text COLLATE utf8_unicode_ci NOT NULL,
  `fund_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `id_member` int(11) NOT NULL,
  `ip_create` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fund`
--

INSERT INTO `fund` (`id_fund`, `fund_title`, `fund_source`, `fund_detail`, `id_member`, `ip_create`, `dt_create`, `dt_update`) VALUES
(1, 'test scource', 'source', 'test source', 1, '::1', '2017-09-10 23:05:12', '2017-09-10 23:05:12'),
(2, 'test2', 'test2', 'test2', 1, '::1', '2017-09-10 23:06:18', '2017-09-10 23:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `news_title` text COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `ip_create` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `news_title`, `news_detail`, `dt_create`, `ip_create`, `id_member`) VALUES
(4, 'test', 'test    test', '2017-09-10 21:39:11', '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id_fund`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id_fund` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
