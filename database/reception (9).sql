-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2020 at 04:32 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reception`
--

-- --------------------------------------------------------

--
-- Table structure for table `docter`
--

CREATE TABLE `docter` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `doc_type` varchar(50) NOT NULL,
  `doc_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doc_phone` varchar(20) NOT NULL,
  `doc_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docter`
--

INSERT INTO `docter` (`doc_id`, `doc_name`, `doc_type`, `doc_date`, `doc_phone`, `doc_price`) VALUES
(1, 'صديق محمد', 'باطنية', '2020-01-16 07:52:13', '1252', '52'),
(2, 'احمد ادم جمعة', 'اطفال', '2020-01-16 07:52:42', '02120', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `fhs`
--

CREATE TABLE `fhs` (
  `fhs_id` int(11) NOT NULL,
  `fhs_name` varchar(50) NOT NULL,
  `fhs_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fhs`
--

INSERT INTO `fhs` (`fhs_id`, `fhs_name`, `fhs_price`) VALUES
(11, 'mo', '1000'),
(12, 'malaria', '120'),
(13, 'cbc', '200');

-- --------------------------------------------------------

--
-- Table structure for table `fhs_op`
--

CREATE TABLE `fhs_op` (
  `fhs_op_id` int(11) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_phone` varchar(50) NOT NULL,
  `fhs_name` varchar(50) NOT NULL,
  `fhs_price` varchar(50) NOT NULL,
  `fhs_date` varchar(50) NOT NULL,
  `fhs_id` int(50) NOT NULL,
  `pa_id` int(11) NOT NULL,
  `fatora_num` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fhs_op`
--

INSERT INTO `fhs_op` (`fhs_op_id`, `pa_name`, `pa_phone`, `fhs_name`, `fhs_price`, `fhs_date`, `fhs_id`, `pa_id`, `fatora_num`, `date`, `user_id`) VALUES
(317, 'عائشة الطيب الدوم بوش', '0215252', 'cbc', '180', '2020-04-18', 13, 67, 'SD53588867', '2020-04-18 11:09:36', 17),
(318, 'عائشة الطيب الدوم بوش', '0215252', 'malaria', '108', '2020-04-18', 12, 67, 'SD53588867', '2020-04-18 11:09:36', 17),
(320, 'bg', 'hh', 'malaria', '120', '2020-04-18', 12, 64, 'SD280426025', '2020-04-18 11:09:51', 16),
(321, 'عائشة الطيب الدوم بوش', '0215252', 'cbc', '200', '2020-04-19', 13, 67, 'SD62556616', '2020-04-19 12:17:51', 11),
(322, 'عائشة الطيب الدوم بوش', '0215252', 'malaria', '120', '2020-04-19', 12, 67, 'SD62556616', '2020-04-19 12:17:51', 11),
(323, 'عائشة الطيب الدوم بوش', '0215252', 'mo', '1000', '2020-04-19', 11, 67, 'SD62556616', '2020-04-19 12:17:51', 11),
(324, 'اسماعيل ابراهيم عمر', '00', 'cbc', '200', '2020-04-24', 13, 69, 'SD150573730', '2020-04-24 13:16:53', 11),
(325, 'اسماعيل ابراهيم عمر', '00', 'malaria', '120', '2020-04-24', 12, 69, 'SD150573730', '2020-04-24 13:16:53', 11),
(326, 'اسماعيل ابراهيم عمر', '00', 'mo', '1000', '2020-04-24', 11, 69, 'SD150573730', '2020-04-24 13:16:53', 11),
(327, 'بحر الدين ابراهيم عثماان', '22', 'cbc', '200', '2020-04-30', 13, 70, 'SD915527343', '2020-04-30 09:40:39', 11),
(328, 'بحر الدين ابراهيم عثماان', '22', 'malaria', '120', '2020-04-30', 12, 70, 'SD915527343', '2020-04-30 09:40:39', 11),
(329, 'بحر الدين ابراهيم عثماان', '22', 'mo', '1000', '2020-04-30', 11, 70, 'SD915527343', '2020-04-30 09:40:39', 11),
(330, 'بحر الدين ابراهيم عثماان', '22', 'cbc', '180', '2020-05-06', 13, 70, 'SD793518066', '2020-05-06 04:20:48', 11),
(331, 'بحر الدين ابراهيم عثماان', '22', 'malaria', '108', '2020-05-06', 12, 70, 'SD793518066', '2020-05-06 04:20:49', 11),
(332, 'بحر الدين ابراهيم عثماان', '22', 'mo', '900', '2020-05-06', 11, 70, 'SD793518066', '2020-05-06 04:20:49', 11);

-- --------------------------------------------------------

--
-- Table structure for table `fhs_op_temp`
--

CREATE TABLE `fhs_op_temp` (
  `fhs_op_id` int(11) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_phone` varchar(50) NOT NULL,
  `fhs_name` varchar(50) NOT NULL,
  `fhs_price` varchar(50) NOT NULL,
  `fhs_date` varchar(50) NOT NULL,
  `fhs_id` int(50) NOT NULL,
  `pa_id` int(11) NOT NULL,
  `fatora_num` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khorfa`
--

CREATE TABLE `khorfa` (
  `khorfa_id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `khorfa_price` varchar(50) NOT NULL,
  `time_stay` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pa_id` int(11) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_age` int(11) NOT NULL,
  `pa_life` varchar(50) NOT NULL,
  `pa_gender` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khorfa`
--

INSERT INTO `khorfa` (`khorfa_id`, `start_date`, `khorfa_price`, `time_stay`, `date`, `pa_id`, `pa_name`, `pa_age`, `pa_life`, `pa_gender`, `user_id`) VALUES
(55, '2020-04-15', '2120', '20', '2020-04-15 09:46:22', 67, 'عائشة الطيب الدوم بوش', 17, 'قريضة حي البابنوسة', 'انثى', 11),
(56, '2020-04-15', '2000', '2', '2020-04-15 09:49:06', 66, 'سلمى ادم', 20, 'نيالا حي النهضة', 'انثى', 11),
(57, '2020-04-15', '2400', '3', '2020-04-15 11:26:58', 64, 'bg', 0, 'hh', 'ذكر', 11),
(58, '2020-04-21', '100', '2', '2020-04-18 13:04:53', 66, 'سلمى ادم', 20, 'نيالا حي النهضة', 'انثى', 16),
(59, '2020-04-15', '500', '1', '2020-04-18 13:05:33', 65, 'احمد ابراهيم موسى', 21, 'نيالا', 'ذكر', 17),
(60, '2020-04-19', '4', '67', '2020-04-19 12:18:45', 67, 'عائشة الطيب الدوم بوش', 17, 'قريضة حي البابنوسة', 'انثى', 11),
(61, '2020-04-24', '1000', '2', '2020-04-24 13:18:50', 69, 'اسماعيل ابراهيم عمر', 40, 'نيالا حي التكساس', 'ذكر', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mogabla`
--

CREATE TABLE `mogabla` (
  `mog_id` int(11) NOT NULL,
  `doc_price` varchar(50) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_id` varchar(50) NOT NULL,
  `doc_id` varchar(50) NOT NULL,
  `mog_date` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mogabla`
--

INSERT INTO `mogabla` (`mog_id`, `doc_price`, `doc_name`, `pa_name`, `pa_id`, `doc_id`, `mog_date`, `date`, `user_id`) VALUES
(34, '1200', 'احمد ادم جمعة', 'عائشة الطيب الدوم بوش', '67', '2', '2020-04-14', '2020-04-14 09:46:01', 17),
(35, '52', 'صديق محمد', 'سلمى ادم', '66', '1', '2020-04-15', '2020-04-15 09:48:50', 11),
(36, '1200', 'احمد ادم جمعة', 'bg', '64', '2', '2020-04-15', '2020-04-14 10:55:28', 11),
(37, '52', 'صديق محمد', 'احمد ابراهيم موسى', '65', '1', '2020-04-15', '2020-04-15 11:02:43', 17),
(38, '1200', 'احمد ادم جمعة', 'عائشة الطيب الدوم بوش', '67', '2', '2020-04-18', '2020-04-18 13:48:06', 17),
(39, '52', 'صديق محمد', 'سلمى ادم', '66', '1', '2020-04-18', '2020-04-18 13:48:22', 17),
(40, '1200', 'احمد ادم جمعة', 'عائشة الطيب الدوم بوش', '67', '2', '2020-04-19', '2020-04-19 12:18:21', 11),
(41, '0', 'صديق محمد', 'اسماعيل ابراهيم عمر', '69', '1', '2020-04-24', '2020-04-24 13:18:18', 11);

-- --------------------------------------------------------

--
-- Table structure for table `msrof`
--

CREATE TABLE `msrof` (
  `msrof_id` int(11) NOT NULL,
  `msrof_byan` varchar(255) NOT NULL,
  `msrof_price` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `full_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msrof`
--

INSERT INTO `msrof` (`msrof_id`, `msrof_byan`, `msrof_price`, `date`, `full_name`, `user_id`) VALUES
(9, 'bbnn', '2120', '2020-04-18 11:34:40', 'admin', 11),
(11, '444555', '544444', '2020-04-18 11:41:10', 'admin', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mwzf`
--

CREATE TABLE `mwzf` (
  `mwzf_id` int(11) NOT NULL,
  `mwzf_name` varchar(200) NOT NULL,
  `mwzf_job` varchar(200) NOT NULL,
  `mwzf_price` varchar(200) NOT NULL,
  `mwzf_date` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mwzf`
--

INSERT INTO `mwzf` (`mwzf_id`, `mwzf_name`, `mwzf_job`, `mwzf_price`, `mwzf_date`, `date`) VALUES
(2, 'احمد ابراهيم ادم', 'مدخل بيانات', '12000', '2020-01-18', '2020-01-18 06:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `opr`
--

CREATE TABLE `opr` (
  `opr_id` int(11) NOT NULL,
  `opr_name` varchar(52) NOT NULL,
  `opr_price` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opr`
--

INSERT INTO `opr` (`opr_id`, `opr_name`, `opr_price`) VALUES
(7, 'mal', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `opration`
--

CREATE TABLE `opration` (
  `opra_id` int(11) NOT NULL,
  `opr_price` varchar(50) NOT NULL,
  `opr_name` varchar(50) NOT NULL,
  `pa_name` varchar(50) NOT NULL,
  `pa_id` varchar(50) NOT NULL,
  `opr_id` varchar(50) NOT NULL,
  `opr_date` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opration`
--

INSERT INTO `opration` (`opra_id`, `opr_price`, `opr_name`, `pa_name`, `pa_id`, `opr_id`, `opr_date`, `date`, `user_id`) VALUES
(51, '1200', 'mal', 'عائشة الطيب الدوم بوش', '67', '7', '2020-04-15', '2020-04-14 09:46:32', 17),
(52, '1200', 'mal', 'سلمى ادم', '66', '7', '2020-04-15', '2020-04-14 09:49:16', 17),
(53, '1200', 'mal', 'عائشة الطيب الدوم بوش', '67', '7', '2020-04-15', '2020-04-15 12:15:00', 17),
(54, '1200', 'mal', 'bg', '64', '7', '2020-04-22', '2020-04-18 14:15:02', 17),
(55, '1200', 'mal', 'احمد ابراهيم موسى', '65', '7', '2020-04-22', '2020-04-18 14:15:25', 16),
(56, '1200', 'mal', 'عائشة الطيب الدوم بوش', '67', '7', '2020-04-19', '2020-04-19 12:18:58', 11),
(57, '1200', 'mal', 'اسماعيل ابراهيم عمر', '69', '7', '2020-04-24', '2020-04-24 13:19:10', 11);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pa_id` int(11) NOT NULL,
  `pa_name` varchar(30) NOT NULL,
  `pa_age` varchar(20) NOT NULL,
  `pa_phone` varchar(50) NOT NULL,
  `pa_life` varchar(50) NOT NULL,
  `pa_gender` varchar(20) NOT NULL,
  `pa_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pa_id`, `pa_name`, `pa_age`, `pa_phone`, `pa_life`, `pa_gender`, `pa_date`) VALUES
(64, 'bg', 'hh', 'hh', 'hh', 'ذكر', '2020-01-13 16:00:26'),
(65, 'احمد ابراهيم موسى', '21', '125252', 'نيالا', 'ذكر', '2020-01-14 10:42:58'),
(66, 'سلمى ادم', '20', '2152', 'نيالا حي النهضة', 'انثى', '2020-01-14 11:39:54'),
(67, 'عائشة الطيب الدوم بوش', '17', '0215252', 'قريضة حي البابنوسة', 'انثى', '2020-02-16 15:59:14'),
(68, 'محمد ابراهيم', '42', 'U', 'نيالا', 'ذكر', '2020-04-21 11:36:25'),
(69, 'اسماعيل ابراهيم عمر', '40', '00', 'نيالا حي التكساس', 'ذكر', '2020-04-24 13:16:28'),
(70, 'بحر الدين ابراهيم عثماان', '20', '22', 'نيالا حي النهضة', 'ذكر', '2020-04-30 09:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `ratb`
--

CREATE TABLE `ratb` (
  `ratb_id` int(11) NOT NULL,
  `mwzf_name` varchar(80) NOT NULL,
  `mwzf_job` varchar(30) NOT NULL,
  `mwzf_id` varchar(50) NOT NULL,
  `ratb_month` varchar(20) NOT NULL,
  `ratb_alawa` int(50) NOT NULL,
  `ratb_khsm` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ratb_price` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratb`
--

INSERT INTO `ratb` (`ratb_id`, `mwzf_name`, `mwzf_job`, `mwzf_id`, `ratb_month`, `ratb_alawa`, `ratb_khsm`, `date`, `ratb_price`, `user_id`) VALUES
(1, 'احمد ابراهيم ادم', 'مدخل بيانات', '2', '1', 0, 10, '2020-04-24 13:23:46', '12000', 11);

-- --------------------------------------------------------

--
-- Table structure for table `recicle_bin`
--

CREATE TABLE `recicle_bin` (
  `bin_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `bin_item` varchar(200) NOT NULL,
  `bin_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recicle_bin`
--

INSERT INTO `recicle_bin` (`bin_id`, `full_name`, `bin_item`, `bin_price`, `date`) VALUES
(5, 'admin', 'cbc', 200, '2020-01-19 10:27:36'),
(6, 'admin', 'malaria', 120, '2020-01-19 10:27:45'),
(7, 'admin', 'فاتورة فحوصات برقم :SD919860839', 0, '2020-01-19 10:40:53'),
(8, 'admin', 'فاتورة فحوصات برقم :SD422821044', 1000, '2020-01-19 10:41:36'),
(9, 'admin', 'mo', 1000, '2020-01-19 11:00:37'),
(10, 'admin', 'cbc', 200, '2020-02-16 16:19:01'),
(11, 'admin', 'فاتورة فحوصات برقم :SD34942626', 120, '2020-02-16 16:19:05'),
(12, 'admin', 'فاتورة فحوصات برقم :SD463989257', 330, '2020-04-14 14:48:12'),
(13, 'admin', 'فاتورة فحوصات برقم :SD872985927', 1060, '2020-04-14 14:48:16'),
(14, 'admin', 'فاتورة فحوصات برقم :SD889068603', 256, '2020-04-15 04:33:48'),
(15, 'admin', 'فاتورة فحوصات برقم :SD52764892', 464, '2020-04-15 06:27:31'),
(16, 'admin', 'malaria', 96, '2020-04-15 06:47:54'),
(17, 'admin', 'فاتورة فحوصات برقم :SD689117431', 304, '2020-04-15 06:47:59'),
(18, 'admin', 'فاتورة فحوصات برقم :SD19226074', 3512, '2020-04-15 07:22:52'),
(19, 'admin', 'فاتورة فحوصات برقم :SD577453613', 3192, '2020-04-15 07:22:54'),
(20, 'admin', 'فاتورة فحوصات برقم :SD843583892', 1872, '2020-04-15 07:22:57'),
(21, 'admin', 'فاتورة فحوصات برقم :SD298675537', 752, '2020-04-15 07:23:01'),
(22, 'admin', 'فاتورة فحوصات برقم :SD787414550', 432, '2020-04-15 07:23:04'),
(23, 'admin', 'فاتورة فحوصات برقم :SD891082763', 144, '2020-04-15 07:23:08'),
(24, 'admin', 'فاتورة فحوصات برقم :SD845031738', 320, '2020-04-15 07:25:13'),
(25, 'admin', 'فاتورة فحوصات برقم :SD521026611', 320, '2020-04-15 07:26:41'),
(26, 'admin', 'فاتورة فحوصات برقم :SD78948974', 320, '2020-04-15 09:19:03'),
(27, 'admin', 'فاتورة فحوصات برقم :SD200558078', 1320, '2020-04-15 09:44:21'),
(28, 'admin', 'فاتورة فحوصات برقم :SD619598388', 320, '2020-04-18 11:09:18'),
(29, 'admin', 'فاتورة فحوصات برقم :SD177612304', 1320, '2020-04-18 11:09:22'),
(30, 'admin', 'فاتورة فحوصات برقم :SD395965576', 1320, '2020-04-18 11:09:24'),
(31, 'admin', 'فاتورة فحوصات برقم :SD582458496', 1320, '2020-04-18 11:09:28'),
(32, 'admin', 'cbc', 200, '2020-04-18 11:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_slahia` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_name`, `user_password`, `user_slahia`, `user_status`) VALUES
(11, 'admin', 'admin', '123', 1, 1),
(16, 'ibr', 'ibr', '123', 3, 1),
(17, 'احمد محمد', 'ahmed', '123', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docter`
--
ALTER TABLE `docter`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `fhs`
--
ALTER TABLE `fhs`
  ADD PRIMARY KEY (`fhs_id`);

--
-- Indexes for table `fhs_op`
--
ALTER TABLE `fhs_op`
  ADD PRIMARY KEY (`fhs_op_id`);

--
-- Indexes for table `fhs_op_temp`
--
ALTER TABLE `fhs_op_temp`
  ADD PRIMARY KEY (`fhs_op_id`);

--
-- Indexes for table `khorfa`
--
ALTER TABLE `khorfa`
  ADD PRIMARY KEY (`khorfa_id`);

--
-- Indexes for table `mogabla`
--
ALTER TABLE `mogabla`
  ADD PRIMARY KEY (`mog_id`);

--
-- Indexes for table `msrof`
--
ALTER TABLE `msrof`
  ADD PRIMARY KEY (`msrof_id`);

--
-- Indexes for table `mwzf`
--
ALTER TABLE `mwzf`
  ADD PRIMARY KEY (`mwzf_id`);

--
-- Indexes for table `opr`
--
ALTER TABLE `opr`
  ADD PRIMARY KEY (`opr_id`);

--
-- Indexes for table `opration`
--
ALTER TABLE `opration`
  ADD PRIMARY KEY (`opra_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `ratb`
--
ALTER TABLE `ratb`
  ADD PRIMARY KEY (`ratb_id`);

--
-- Indexes for table `recicle_bin`
--
ALTER TABLE `recicle_bin`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docter`
--
ALTER TABLE `docter`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fhs`
--
ALTER TABLE `fhs`
  MODIFY `fhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fhs_op`
--
ALTER TABLE `fhs_op`
  MODIFY `fhs_op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;
--
-- AUTO_INCREMENT for table `fhs_op_temp`
--
ALTER TABLE `fhs_op_temp`
  MODIFY `fhs_op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `khorfa`
--
ALTER TABLE `khorfa`
  MODIFY `khorfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `mogabla`
--
ALTER TABLE `mogabla`
  MODIFY `mog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `msrof`
--
ALTER TABLE `msrof`
  MODIFY `msrof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mwzf`
--
ALTER TABLE `mwzf`
  MODIFY `mwzf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opr`
--
ALTER TABLE `opr`
  MODIFY `opr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `opration`
--
ALTER TABLE `opration`
  MODIFY `opra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `ratb`
--
ALTER TABLE `ratb`
  MODIFY `ratb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recicle_bin`
--
ALTER TABLE `recicle_bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
