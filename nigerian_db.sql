-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 03:48 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nigerian_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`) VALUES
(32, 'a', '$2y$10$DJkckvPi28er.LYu2ePk6eAHKwkQUCmSXGCkVSwsNEC1jh171IlA6'),
(33, 'b', '$2y$10$M7FkkbiEhCy801AKyNLBKO9TAGWIphJq22B56.UOLSdKcypOGSwGC'),
(34, 'c', '$2y$10$zzXUQKUDkSOmOlyqcfT71.m0X1y9m.DGlGlMX7bLcsSDt/Tt0ALkK'),
(35, 'd', '$2y$10$D1Ada59rT163UouJLDpiL.sRMldKW1f.2hVrK7bRp6NBIQW4Vsmjq'),
(36, 'e', '$2y$10$54GH.Nhh7lU4xApWX.P2XuUWQhy/Q3cFG64lqbXnhZwAxO/9OICBO'),
(37, 'mykelkym', '$2y$10$qXfuIQCz3.Zaqj6QtCeFbOyoysz/gk1nN76vLO7EKEYOLoPkJoe2S');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contributions_tbl`
--

CREATE TABLE `employee_contributions_tbl` (
  `id` int(10) NOT NULL,
  `sss` float NOT NULL,
  `pagibig` float NOT NULL,
  `philhealth` float NOT NULL,
  `employee_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_contributions_tbl`
--

INSERT INTO `employee_contributions_tbl` (`id`, `sss`, `pagibig`, `philhealth`, `employee_id`) VALUES
(40, 234, 23, 234, 'n-21f12'),
(41, 234, 244, 233, 'n-edcad');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details_tbl`
--

CREATE TABLE `employee_details_tbl` (
  `id` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `account_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details_tbl`
--

INSERT INTO `employee_details_tbl` (`id`, `firstname`, `lastname`, `designation`, `birthday`, `age`, `gender`, `address`, `contact`, `admin_id`, `account_created`) VALUES
('n-21f12', 'manelyn', 'asd', 'trainee', '2021-02-16', '27', 'Male', 'prk 18 mintal davao city', '09560894302', '33', '2021-02-05 16:24:19'),
('n-edcad', 'leonil', 'omayan', 'admin', '2021-02-01', '27', 'Male', 'prk 18 mintal davao city', '09560894302', '32', '2021-02-07 16:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payroll_summary_tbl`
--

CREATE TABLE `employee_payroll_summary_tbl` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `total_earnings` float NOT NULL,
  `total_deductions` float NOT NULL,
  `net_pay` float NOT NULL,
  `payroll_period_id` float NOT NULL,
  `total_overtime` float NOT NULL,
  `total_late` float NOT NULL,
  `basic_pay` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_payroll_summary_tbl`
--

INSERT INTO `employee_payroll_summary_tbl` (`id`, `employee_id`, `total_earnings`, `total_deductions`, `net_pay`, `payroll_period_id`, `total_overtime`, `total_late`, `basic_pay`) VALUES
(62, 'n-21f12', 51864, 163.7, 51700.3, 142, 6483, 6483, 51864),
(63, 'n-edcad', 28922800, 218.7, 28922600, 1, 19218.8, 156.25, 28903800),
(64, 'n-edcad', 39062300, 218.7, 39062100, 2, 36093.8, 0, 39026200),
(65, 'n-edcad', 15476200, 218.7, 15476000, 3, 48750, 0, 15427500),
(66, 'n-edcad', 6465160, 218.7, 6464940, 4, 50156.2, 0, 6415000),
(67, 'n-edcad', 15392800, 218.7, 15392600, 5, 312.5, 0, 15392500);

-- --------------------------------------------------------

--
-- Table structure for table `leave_history_tbl`
--

CREATE TABLE `leave_history_tbl` (
  `id` int(11) NOT NULL,
  `leave_id` varchar(11) NOT NULL,
  `employee_id` varchar(11) NOT NULL,
  `start_leave` varchar(10) NOT NULL,
  `end_leave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `start_leave` varchar(10) DEFAULT NULL,
  `end_leave` varchar(10) DEFAULT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `employee_id`, `start_leave`, `end_leave`, `status`) VALUES
(25, 'n-21f12', NULL, NULL, ''),
(26, 'n-edcad', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `overall_salary_paid_tbl`
--

CREATE TABLE `overall_salary_paid_tbl` (
  `id` int(10) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `overall_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_period_tbl`
--

CREATE TABLE `payroll_period_tbl` (
  `id` int(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `from_day` varchar(10) NOT NULL,
  `to_day` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `total_pay` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_period_tbl`
--

INSERT INTO `payroll_period_tbl` (`id`, `month`, `from_day`, `to_day`, `year`, `admin_id`, `total_pay`) VALUES
(1, 'February', '1', '15', '2021', '32', 28922594),
(2, 'February', '16', '30', '2021', '32', 39062124),
(3, 'March', '1', '15', '2021', '32', 15476031),
(4, 'March', '16', '30', '2021', '32', 6464938),
(5, 'April', '1', '15', '2021', '32', 15392594);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_processing_tbl`
--

CREATE TABLE `payroll_processing_tbl` (
  `id` int(10) NOT NULL,
  `payroll_period_id` varchar(10) NOT NULL,
  `payroll_setup` tinyint(1) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `admin_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_processing_tbl`
--

INSERT INTO `payroll_processing_tbl` (`id`, `payroll_period_id`, `payroll_setup`, `employee_id`, `firstname`, `lastname`, `admin_id`) VALUES
(198, '140', 0, 'n-21f12', 'manelyn', 'asd', '33'),
(199, '141', 0, 'n-21f12', 'manelyn', 'asd', '33'),
(200, '142', 1, 'n-21f12', 'manelyn', 'asd', '33'),
(201, '1', 1, 'n-edcad', 'leonil', 'omayan', '32'),
(202, '2', 1, 'n-edcad', 'leonil', 'omayan', '32'),
(203, '3', 1, 'n-edcad', 'leonil', 'omayan', '32'),
(204, '4', 1, 'n-edcad', 'leonil', 'omayan', '32'),
(205, '5', 1, 'n-edcad', 'leonil', 'omayan', '32');

-- --------------------------------------------------------

--
-- Table structure for table `salary_rate_tbl`
--

CREATE TABLE `salary_rate_tbl` (
  `id` int(10) NOT NULL,
  `salary_rate_basis` varchar(50) NOT NULL,
  `salary_rate_peso` float NOT NULL,
  `employee_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_rate_tbl`
--

INSERT INTO `salary_rate_tbl` (`id`, `salary_rate_basis`, `salary_rate_peso`, `employee_id`) VALUES
(43, 'daily', 4322, 'n-21f12'),
(44, 'daily', 1250, 'n-edcad');

-- --------------------------------------------------------

--
-- Table structure for table `time_attendance_tbl`
--

CREATE TABLE `time_attendance_tbl` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  `days_present` float NOT NULL,
  `overtime` float NOT NULL,
  `late_undertime` float NOT NULL,
  `payroll_period_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_attendance_tbl`
--

INSERT INTO `time_attendance_tbl` (`id`, `employee_id`, `days_present`, `overtime`, `late_undertime`, `payroll_period_id`) VALUES
(93, 'n-21f12', 12, 12, 12, '142'),
(94, 'n-edcad', 23123, 123, 1, '1'),
(95, 'n-edcad', 31221, 231, 0, '2'),
(96, 'n-edcad', 12342, 312, 0, '3'),
(97, 'n-edcad', 5132, 321, 0, '4'),
(98, 'n-edcad', 1231, 2, 0, '5');

-- --------------------------------------------------------

--
-- Table structure for table `year_tbl`
--

CREATE TABLE `year_tbl` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `selected` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_tbl`
--

INSERT INTO `year_tbl` (`id`, `admin_id`, `year`, `selected`) VALUES
(1, '32', '2021', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_contributions_tbl`
--
ALTER TABLE `employee_contributions_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details_tbl`
--
ALTER TABLE `employee_details_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_payroll_summary_tbl`
--
ALTER TABLE `employee_payroll_summary_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_history_tbl`
--
ALTER TABLE `leave_history_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overall_salary_paid_tbl`
--
ALTER TABLE `overall_salary_paid_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_period_tbl`
--
ALTER TABLE `payroll_period_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_processing_tbl`
--
ALTER TABLE `payroll_processing_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_rate_tbl`
--
ALTER TABLE `salary_rate_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_attendance_tbl`
--
ALTER TABLE `time_attendance_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_tbl`
--
ALTER TABLE `year_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `employee_contributions_tbl`
--
ALTER TABLE `employee_contributions_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_payroll_summary_tbl`
--
ALTER TABLE `employee_payroll_summary_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `leave_history_tbl`
--
ALTER TABLE `leave_history_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `overall_salary_paid_tbl`
--
ALTER TABLE `overall_salary_paid_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_period_tbl`
--
ALTER TABLE `payroll_period_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payroll_processing_tbl`
--
ALTER TABLE `payroll_processing_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `salary_rate_tbl`
--
ALTER TABLE `salary_rate_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `time_attendance_tbl`
--
ALTER TABLE `time_attendance_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `year_tbl`
--
ALTER TABLE `year_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
