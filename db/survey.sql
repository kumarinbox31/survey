-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 05:35 AM
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
-- Table structure for table `db_contact`
--

CREATE TABLE `db_contact` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `display_name` varchar(250) DEFAULT NULL,
  `c_type` enum('Client','Vendor') DEFAULT NULL,
  `contact_group` enum('Survey int','Panel provider') DEFAULT NULL,
  `person_name` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` text DEFAULT NULL,
  `country` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_by` varchar(250) NOT NULL,
  `updated_by` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `db_login`
--

CREATE TABLE `db_login` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `db_project`
--

CREATE TABLE `db_project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_status` varchar(100) NOT NULL,
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
  `survay_link` text DEFAULT NULL COMMENT 'with vendor_id parameter',
  `code` varchar(100) NOT NULL,
  `quoates` text DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `db_project_vendor`
--

CREATE TABLE `db_project_vendor` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `vendor_contact` varchar(100) NOT NULL,
  `cpc_cpi` varchar(100) NOT NULL,
  `req_complete` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `note` text DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_response`
--

CREATE TABLE `db_response` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_code` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `vendor_id` varchar(100) NOT NULL,
  `panlist_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `db_contact`
--
ALTER TABLE `db_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_login`
--
ALTER TABLE `db_login`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `db_contact`
--
ALTER TABLE `db_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_login`
--
ALTER TABLE `db_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_logs`
--
ALTER TABLE `db_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_project`
--
ALTER TABLE `db_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_project_keys`
--
ALTER TABLE `db_project_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_project_vendor`
--
ALTER TABLE `db_project_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_response`
--
ALTER TABLE `db_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
