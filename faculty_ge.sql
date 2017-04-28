-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 02:19 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ac_id`, `ac_title`, `ac_detail`, `ac_pict`, `dt_create`, `ip_create`) VALUES
(33, 'tst', 'test test', '20_04_17_08_26_23.jpg,20_04_17_08_25_12.jpg,20_04_17_08_22_13.jpg,20_04_17_08_08_141.jpg,19_04_17_23_45_311.jpg', '2017-04-20 08:26:23', '::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='จัดเก็บเอกสาร';

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `doc_name`, `doc_lastname`, `doc_moneySupport`, `doc_amount`, `doc_publicationWhere`, `doc_researchName`, `doc_abstract`, `doc_outline`, `doc_progress`, `doc_filesuccess`, `dt_create`, `ip_create`) VALUES
(1, 'test', 'test', 'test', 1, 'test', 'test', 'test', '28_04_17_09_03_30.pdf', NULL, NULL, '2017-04-28 09:03:30', '::1'),
(2, 'test', 'test', 'test', 1, 'test', 'test', 'test', '280417090404.pdf', NULL, NULL, '2017-04-28 09:04:04', '::1'),
(3, 'เต้', 'ไชยวัฒน์', 'ใคร', 1, 'โรงพิมพ์', 'ยังไม่ได้คิด', 'ยังไม่มี', '280417_141620.pdf', NULL, NULL, '2017-04-28 14:16:20', '::1'),
(6, 'เต้', 'ไชยวัฒน์', 'ใคร', 1, 'โรงพิมพ์', 'ยังไม่ได้คิด', 'ยังไม่มี', '280417_141735.pdf', NULL, NULL, '2017-04-28 14:17:35', '::1');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
