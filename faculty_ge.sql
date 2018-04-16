-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 09:59 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_name` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `account_lastname` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `account_user` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_pass` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `account_status` enum('user','admin') COLLATE utf8_unicode_ci NOT NULL,
  `account_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  `ip_create` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `account_lastname`, `account_user`, `account_pass`, `account_status`, `account_email`, `dt_create`, `dt_update`, `ip_create`) VALUES
(1, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'admin', 'admin@myhost.com', '2017-09-25 11:16:25', '2017-09-25 11:16:25', '::1'),
(2, 'te', 'te', 'te', '569ef72642be0fadd711d6a468d68ee1', 'user', '', '2017-09-25 12:20:23', '2017-09-25 12:20:23', '::1');

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
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `link_id` int(11) NOT NULL,
  `link_name` text COLLATE utf8_unicode_ci NOT NULL,
  `link_url` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_create` datetime NOT NULL,
  `ip_create` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`link_id`, `link_name`, `link_url`, `dt_create`, `ip_create`, `create_by`) VALUES
(1, 'สถาบันวิจัย มรภ.อุดรธานี', 'http://rdi.udru.ac.th/', '2018-04-16 21:21:26', '::1', 1),
(2, 'สถาบันวิจัยแห่งชาติ', 'http://www.nrct.go.th/', '2018-04-16 21:54:07', '::1', 1),
(3, 'สำนักงานคณะกรรมการการอุดรศึกษา', 'http://www.mua.go.th/', '2018-04-16 21:57:18', '::1', 1);

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
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

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
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
