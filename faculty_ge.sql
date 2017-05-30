-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 05:29 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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

CREATE TABLE IF NOT EXISTS `activity` (
  `ac_id` int(11) NOT NULL,
  `ac_title` text COLLATE utf8_unicode_ci NOT NULL,
  `ac_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `ac_pict` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `ip_create` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ac_id`, `ac_title`, `ac_detail`, `ac_pict`, `dt_create`, `ip_create`) VALUES
(33, 'tst', 'test test', '20_04_17_08_26_23.jpg,20_04_17_08_25_12.jpg,20_04_17_08_22_13.jpg,20_04_17_08_08_141.jpg,19_04_17_23_45_311.jpg', '2017-05-25 22:24:51', '::1'),
(38, 'ts', 'ok 0', '30_05_17_13_58_53.JPG,30_05_17_10_58_31.jpg,29_05_17_16_40_12.jpg', '2017-05-30 15:09:27', '::1'),
(39, 'tst', 'tst\r<br>   asdfasdf', '29_05_17_16_41_57.jpg', '2017-05-30 09:33:06', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='จัดเก็บเอกสาร';

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `doc_name`, `doc_lastname`, `doc_moneySupport`, `doc_amount`, `doc_publicationWhere`, `doc_researchName`, `doc_abstract`, `doc_outline`, `doc_progress`, `doc_filesuccess`, `dt_create`, `ip_create`) VALUES
(3, 'เต้', 'ไชยวัฒน์', 'ใคร', 1, 'โรงพิมพ์', 'ยังไม่ได้คิด', 'ยังไม่มีs', '230517_165123.PDF', '230517_165007.PDF', '230517_165027.PDF', '2017-05-23 16:51:23', '::1'),
(11, 'ไชยวัฒน์', 'ไชยวัฒน์', 'ไชยวัฒน์', 1, 'ไชยวัฒน์', 'เต้', 'testssss', '170517_144149.PDF', NULL, NULL, '2017-05-17 14:41:49', '::1'),
(15, 'test', 'test', 'test', 1, 'test', 'test', 'tests ', '250517_142658.PDF', '250517_1426581.PDF', '250517_1426582.PDF', '2017-05-25 14:26:58', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL,
  `news_title` text COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `ip_create` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `news_title`, `news_detail`, `dt_create`, `ip_create`, `id_member`) VALUES
(1, 't', '[removed]aler("OK");[removed]\r\n', '2017-05-30 15:08:19', '::1', 1),
(2, 'test', 'test\r\nasdfasdf', '2017-05-30 16:01:32', '::1', 1),
(3, 'ts', '[removed]aler("OK");[removed]\r\n', '2017-05-30 15:08:19', '::1', 1),
(4, 'testsss', 'test\r\nasdfasdf', '2017-05-30 16:01:32', '::1', 1),
(5, 'testsss', 'test\r\nasdfasdf   sssasdf', '2017-05-30 16:01:32', '::1', 1);

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
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
