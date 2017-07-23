-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2017 at 05:49 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farsheec_moon`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT '0',
  `subject` text,
  `profile` varchar(255) DEFAULT NULL,
  `summary` text,
  `prove` text,
  `pcomment` text,
  `money` varchar(255) DEFAULT NULL,
  `raj` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `usd` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `apply` text,
  `reaction` text,
  `bcomment` text,
  `modified` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `user_id`, `m_id`, `subject`, `profile`, `summary`, `prove`, `pcomment`, `money`, `raj`, `currency`, `usd`, `vat`, `budget`, `apply`, `reaction`, `bcomment`, `modified`, `created`) VALUES
(1, 6, 4, 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 1499844741, 1499844741),
(2, 8, 4, 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', 1499885497, 1499885497),
(4, 8, 6, 'বিদুৎ উন্নয়ন বিদুৎ উন্নয়ন বিদুৎ উন্নয়ন বিদুৎ উন্নয়ন বিদুৎ উন্নয়ন বিদুৎ উন্নয়ন বিদুৎ উন্নয়ন বিদুৎ উন্নয়নবিদুৎ উন্নয়ন বিদুৎ উন্নয়নবিদুৎ উন্নয়ন', 'মুন ', 'safasfasdf', 'asfdfasfdasdfasf', 'asdfasfdaf', 'asdfafasdfa', '10000', 'asdfasdfas', 'asdfasdfas', 'asfdfasf', 'asdfdfasdfasd', 'asfdaasdfas', 'afsdfadsdfasdfasdf', 'afsdfasdfadsfadsfsadf', 1499926597, 1499926597),
(5, 8, 5, 'new issue', 'moon, 11101122, DGM, BD', 'new issuenew issuenew issuenew issuenew issuenew issue', 'new issuenew issuenew issuenew issue', 'new issuenew issuenew issuenew issuenew issue', 'new issuenew issuenew issuenew issue', 'new issuenew issuenew issuenew issue', 'new issuenew issuenew issue', 'new issuenew issuenew issue', 'new issuenew issuenew issue', 'new issuenew issuenew issue', NULL, NULL, NULL, 1500634943, 1500634943);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL,
  `modify_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `aid`, `caption`, `image`, `user_id`, `create_date`, `modify_date`) VALUES
(1, 1, 'test2', 'ui/file/648x864_1573698873175352.jpg', 6, 1500796197, 1500797837),
(2, 5, '101', 'ui/file/1000x558_1573704500398114.png', 8, 1500801563, 1500801563),
(3, 1, 'test3', 'ui/file/648x864_1573711429503127.jpg', 6, 1500808171, 1500808171),
(4, 1, 'test4', 'ui/file/648x864_1573721744728898.jpg', 6, 1500818009, 1500818009);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `sarok` int(11) DEFAULT NULL,
  `board` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `detail` text,
  `list` varchar(255) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `sarok`, `board`, `date`, `time`, `user_id`, `name`, `rank`, `dept`, `detail`, `list`, `modified`, `created`) VALUES
(4, 45, 86, '2017-07-01', '13:45:00', 5, 'rafik', 'socib', 'montronaloy', 'fsdfsdfds', '1,2', 1500124047, 1500124047),
(5, 1225444, 2122, '2017-07-21', '17:10:00', 5, 'Moontasirul Islam', 'afsfasfsfs', 'sadfasfsf', '<p>asfasfasf fasfsafsadfsa a fsafsa fsafsadfsafsadfas a fasfsadfsa asfasfsas</p>\r\n', '5', 1500635235, 1500635235),
(6, 1000, 101, '2017-07-24', '10:30:00', 5, 'moontasirul,', 'DG', 'dhaka', '<p>need to proper action..</p>\r\n', '4', 1500749616, 1500749616);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `board` varchar(255) DEFAULT NULL,
  `sub_no` varchar(255) DEFAULT NULL,
  `subject` text,
  `summary` text,
  `meeting` text,
  `decesion` text,
  `user_id` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `modified` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `board`, `sub_no`, `subject`, `summary`, `meeting`, `decesion`, `user_id`, `publish`, `modified`, `created`) VALUES
(1, '1 & 1st July, 2017', '1', 'demo', 'demo', 'hoy nai', 'dekha jhak', 6, 1, 1499925021, 1499925021),
(2, '1 & 1st July, 2017', '2', 'বোর্ড সভার আলোচনা', 'বোর্ড সভার আলোচনা', '', '', 8, 0, 1499926674, 1499926674),
(3, '2122 & 21st July, 2017', '5', '<p>new issue</p>\r\n', 'new issuenew issuenew issuenew issuenew issuenew issue', '', '', 8, 1, 1500748873, 1500748873);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_type` int(11) DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `identity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `user_rememberme_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attemps',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_registration_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_registration_ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`, `user_type`, `user_active`, `name`, `identity`, `dept`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`, `user_rememberme_token`, `user_failed_logins`, `user_last_failed_login`, `user_registration_datetime`, `user_registration_ip`) VALUES
(1, 'admin', '$2y$10$nMWwxeNHGRc7EPVDGkCxWuSimzx4CBAlZviQyNhHmwb7coUQGwQpS', 'twister@twister.com', 1, 1, NULL, NULL, NULL, '75866491c974e0a27045a4f4f322109a70b9dc79', NULL, NULL, NULL, 0, NULL, '2016-04-19 18:23:40', '::1'),
(6, 'salman16', '$2y$10$Lb2JV9RMmNgkK2H8VN80metLMQl7mSBmvtX7vwb2iZEqAHkZJpKd.', 'salman@gmail.com', 3, 1, 'farshee', '222-35', 'montronaloy', 'b420f3ea4bba3ab497593cfa77869cc27539fd47', NULL, NULL, NULL, 0, NULL, '2017-07-09 13:50:17', '::1'),
(5, 'farshee16', '$2y$10$bASPcCC85MPsav/M.D07pu8JB1KLWYXRcWDJ9Uc/QUZdp0KZ2NnMi', 'farshee@gmail.com', 2, 1, 'salman khan', '222-45', 'shonshod', '391312ba84bf76c088fc01c4e28541c6686f314b', NULL, NULL, NULL, 0, NULL, '2017-07-08 12:36:42', '::1'),
(8, 'montasir17', '$2y$10$LcUxNn8Hd0eS2SLg.4g2p.e9.i70oq0hf0LqhVdf2t9wS9lRmAaWi', 'moon@gmail.com', 3, 1, 'moon', '222-36', 'ministry', '35439af0b37ba6a97906dcce41a1edab6dbcabc2', NULL, NULL, NULL, 0, NULL, '2017-07-09 18:33:16', '45.114.232.14'),
(9, 'moon01', '$2y$10$Bem1iFEynjv1sGgvXWCrUOMK44Z.E23dGJacbLnj4FF129dINAusK', 'moon01@gmail.com', 3, 1, NULL, NULL, NULL, 'a8df75131020194eb8c2a93063bea550f8f652ef', NULL, NULL, NULL, 0, NULL, '2017-07-16 16:23:59', '103.25.250.79');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
