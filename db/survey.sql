-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 09:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_company_type`
--

CREATE TABLE `db_company_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL COMMENT 'pass loged in user data in json',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_company_type`
--

INSERT INTO `db_company_type` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Client', '2023-06-18 08:07:48', '2023-06-18 08:08:14', '', '', '1'),
(2, 'Vendor', '2023-06-18 08:07:48', '2023-06-18 08:08:18', '', '', '1'),
(3, 'Internal Company', '2023-06-29 15:22:17', '2023-06-29 15:22:17', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `db_contact`
--

CREATE TABLE `db_contact` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `display_name` varchar(250) DEFAULT NULL,
  `company_type_id` varchar(50) DEFAULT NULL,
  `contact_group_id` int(11) DEFAULT NULL,
  `person_name` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` text DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `complition_link` varchar(100) NOT NULL,
  `disqualify_link` varchar(100) NOT NULL,
  `quota_full_link` varchar(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `updated_by` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_contact`
--

INSERT INTO `db_contact` (`id`, `company_name`, `display_name`, `company_type_id`, `contact_group_id`, `person_name`, `position`, `email`, `phone`, `address`, `country_id`, `complition_link`, `disqualify_link`, `quota_full_link`, `notes`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 'Test', 'Test', '[\"3\"]', 1, 'Abhijeet Singh', 'Sales Executive', 'test@gmail.com', '1234567890', 'test', 1, '', '', '', '', '1', '', '', '2023-06-24 15:30:47', '2023-06-29 15:29:11'),
(10, 'Internal Company', 'test', '[\"2\",\"3\"]', 2, 'test', 'test', 'test@gmail.com', '84656465', 'test', 1, '#', '#', '#', '', '1', '', '', '2023-07-02 07:09:36', '2023-07-16 06:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `db_contact_group`
--

CREATE TABLE `db_contact_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_contact_group`
--

INSERT INTO `db_contact_group` (`id`, `name`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Panel Provider', NULL, NULL, '1', '2023-06-18 08:08:58', '2023-06-18 08:09:07'),
(2, 'Survey Internal', NULL, NULL, '1', '2023-06-18 08:08:58', '2023-06-18 08:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `db_country`
--

CREATE TABLE `db_country` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_country`
--

INSERT INTO `db_country` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IN', 'India', '1', '2023-06-18 08:09:36', '2023-06-18 08:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `db_login`
--

CREATE TABLE `db_login` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_login`
--

INSERT INTO `db_login` (`id`, `type`, `name`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin', 'admin', '1', '2023-06-18 09:01:40', '2023-06-28 14:48:08'),
(2, 'sales', 'Sales', 'sales@gmail.com', '1234', '1', '2023-06-28 14:45:31', '2023-06-28 14:48:12'),
(3, 'manager', 'Manager', 'manager@gmail.com', '1234', '1', '2023-06-28 14:45:31', '2023-06-28 14:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `db_logs`
--

CREATE TABLE `db_logs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_logs`
--

INSERT INTO `db_logs` (`id`, `title`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Admin Login', 'Admin logged in at 18-06-2023 03:23:48 PM ', '', '', '2023-06-18 09:53:48', '2023-06-18 09:53:48'),
(3, 'Admin Login', 'Admin logged in at 18-06-2023 03:24:58 PM ', '', '', '2023-06-18 09:54:58', '2023-06-18 09:54:58'),
(4, 'Admin Login', 'Admin logged in at 21-06-2023 06:25:43 PM ', '', '', '2023-06-21 12:55:43', '2023-06-21 12:55:43'),
(5, 'Admin Login', 'Admin logged in at 22-06-2023 09:12:14 PM ', '', '', '2023-06-22 15:42:14', '2023-06-22 15:42:14'),
(6, 'Admin Login', 'Admin logged in at 24-06-2023 07:38:41 PM ', '', '', '2023-06-24 14:08:41', '2023-06-24 14:08:41'),
(7, 'Admin Login', 'Admin logged in at 24-06-2023 08:58:58 PM ', '', '', '2023-06-24 15:28:58', '2023-06-24 15:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `db_project`
--

CREATE TABLE `db_project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_status_id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `manager_name` varchar(100) NOT NULL,
  `no_of_complete` int(11) NOT NULL,
  `ir` varchar(100) NOT NULL,
  `loi` varchar(100) NOT NULL,
  `country` int(11) NOT NULL,
  `cpi_cpc` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `survey_link` text DEFAULT NULL COMMENT 'with vendor_id parameter',
  `code` varchar(100) NOT NULL,
  `quoates` text DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_project`
--

INSERT INTO `db_project` (`id`, `project_name`, `project_status_id`, `client`, `contact`, `sales`, `manager_name`, `no_of_complete`, `ir`, `loi`, `country`, `cpi_cpc`, `project_type`, `survey_link`, `code`, `quoates`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Project Test', 1, 8, 8, 2, '3', 10, '10', '25', 1, 'test', 'test', 'http://braininfotech.com/test-survey?id={{RESP_ID}}', '', 'sadfasdf123', '', '', '2023-07-02 07:15:29', '2023-07-02 07:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `db_project_keys`
--

CREATE TABLE `db_project_keys` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_project_status`
--

CREATE TABLE `db_project_status` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_project_status`
--

INSERT INTO `db_project_status` (`id`, `title`, `color`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Running', 'success', '1', '', '', '2023-06-18 15:42:52', '2023-07-16 06:08:05'),
(2, 'Testing', '', '1', '', '', '2023-06-18 15:43:04', '2023-07-16 06:12:00'),
(3, 'Complete', '', '1', '', '', '2023-06-18 15:43:17', '2023-06-18 15:43:17'),
(4, 'Quota Full', '', '1', '', '', '2023-06-18 15:43:27', '2023-06-18 15:43:27'),
(5, 'Hold', 'warning', '1', '', '', '2023-07-16 06:06:51', '2023-07-16 06:08:09'),
(6, 'Closed', 'danger', '1', '', '', '2023-07-16 06:06:51', '2023-07-16 06:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `db_project_vendor`
--

CREATE TABLE `db_project_vendor` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `vendor_contact` varchar(100) NOT NULL,
  `cpc_cpi` varchar(100) NOT NULL,
  `req_complete` int(11) NOT NULL,
  `complete_link` text DEFAULT NULL,
  `terminate_link` text DEFAULT NULL,
  `quota_full_link` text DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `note` text DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_project_vendor`
--

INSERT INTO `db_project_vendor` (`id`, `project_id`, `vendor`, `vendor_contact`, `cpc_cpi`, `req_complete`, `complete_link`, `terminate_link`, `quota_full_link`, `status`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '10', '10', '10', 21, 'asdf', 'asdf', 'asdf', 'test', 'afsd', '', '', '2023-07-02 10:59:03', '2023-07-02 10:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `db_response`
--

CREATE TABLE `db_response` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `panlist_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_response`
--

INSERT INTO `db_response` (`id`, `project_id`, `ip_address`, `panlist_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, '::1', '10', 'Redirected', '2023-07-16 07:39:27', '2023-07-16 07:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `db_settings`
--

CREATE TABLE `db_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_state`
--

CREATE TABLE `db_state` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `zone_id` varchar(250) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_unique_links`
--

CREATE TABLE `db_unique_links` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_zone`
--

CREATE TABLE `db_zone` (
  `id` int(11) NOT NULL,
  `zone` varchar(250) NOT NULL,
  `country_id` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_company_type`
--
ALTER TABLE `db_company_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_contact`
--
ALTER TABLE `db_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_contact_group`
--
ALTER TABLE `db_contact_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_country`
--
ALTER TABLE `db_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_login`
--
ALTER TABLE `db_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `db_logs`
--
ALTER TABLE `db_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_project`
--
ALTER TABLE `db_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_project_keys`
--
ALTER TABLE `db_project_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_project_status`
--
ALTER TABLE `db_project_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_project_vendor`
--
ALTER TABLE `db_project_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_response`
--
ALTER TABLE `db_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_settings`
--
ALTER TABLE `db_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_state`
--
ALTER TABLE `db_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_unique_links`
--
ALTER TABLE `db_unique_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_zone`
--
ALTER TABLE `db_zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_company_type`
--
ALTER TABLE `db_company_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_contact`
--
ALTER TABLE `db_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `db_contact_group`
--
ALTER TABLE `db_contact_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_country`
--
ALTER TABLE `db_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_login`
--
ALTER TABLE `db_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_logs`
--
ALTER TABLE `db_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_project`
--
ALTER TABLE `db_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_project_keys`
--
ALTER TABLE `db_project_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_project_status`
--
ALTER TABLE `db_project_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_project_vendor`
--
ALTER TABLE `db_project_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_response`
--
ALTER TABLE `db_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_settings`
--
ALTER TABLE `db_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_state`
--
ALTER TABLE `db_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_unique_links`
--
ALTER TABLE `db_unique_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_zone`
--
ALTER TABLE `db_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
