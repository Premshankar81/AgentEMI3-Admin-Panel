-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 02:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` tinyint(4) DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `address_first` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_second` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `user_type`, `mobile`, `country_id`, `state_id`, `city_id`, `branch_code`, `pincode`, `tax_name`, `tax_number`, `cin`, `website`, `currency_symbol`, `time_zone`, `opening_date`, `address_first`, `address_second`, `password`, `status`, `delete_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$oNsQmN01pvIrEwvFVhNUv.dNqVlN36/04p6951ZPGNhqHxulrFCY6', 'active', '0', NULL, '2023-01-24 04:29:41', '2023-01-24 04:29:41'),
(2, 'Guwahati - KV 6287', 'guwahati101@gmail.com', NULL, 'branch', '7788996655', '1', '1', '1', 'GUW', '282002', 'GST', 'KASDASD454545ASDAS', 'KASDAASDASDASDAS', 'google.com', 'Rs', NULL, '2023-01-31', 'No. 6,8- 13,Ground Floor , Shanta Tower, Sanjay Place, Agra', 'No. 6,8- 13,Ground Floor , Shanta Tower, Sanjay Place, Agra', '$2y$10$G3rapdupE0pb1bmty0IYw.lONpDkhdKPlIhf5FJ1ZN0fjP3XaYJFG', 'active', '0', NULL, '2023-01-31 05:59:17', '2023-01-31 05:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `allocate_share_certificates`
--

CREATE TABLE `allocate_share_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `total_shares` double DEFAULT NULL,
  `share_nominal_value` double DEFAULT NULL,
  `total_shares_value` double DEFAULT NULL,
  `pay_mode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `share_certificate_json` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allocate_share_certificates`
--

INSERT INTO `allocate_share_certificates` (`id`, `member_id`, `transfer_date`, `total_shares`, `share_nominal_value`, `total_shares_value`, `pay_mode`, `share_certificate_json`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, '1', '2023-02-22', 10, 10, 100, 'Cash', NULL, 2, 'active', '1', '2023-02-24 00:58:01', '2023-02-24 23:39:55'),
(2, '2', '2023-02-02', 150, 10, 1500, 'Cash', '[{\"no_of_certificates\":\"11\",\"no_of_shares_in_certificates\":\"22\",\"total_certificates_shares\":\"111\"},{\"no_of_certificates\":\"33\",\"no_of_shares_in_certificates\":\"44\",\"total_certificates_shares\":\"222\"}]', 2, 'active', '0', '2023-02-24 23:02:31', '2023-02-26 23:31:39'),
(3, '1', '2023-02-01', 100, 10, 1000, 'Cash', '[{\"no_of_certificates\":\"1\",\"no_of_shares_in_certificates\":\"1\",\"total_certificates_shares\":null}]', 2, 'active', '0', '2023-02-27 11:55:33', '2023-02-27 11:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('common','service','product') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `type`, `image`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'State Bank of India', NULL, NULL, 'state-bank-of-india', NULL, 'active', '0', '2023-03-07 23:43:44', '2023-03-07 23:43:44'),
(2, 'Yes Bank', NULL, NULL, 'n-a', NULL, 'active', '0', '2023-03-07 23:44:54', '2023-03-07 23:45:05'),
(3, 'Bank Of Baroda', NULL, NULL, 'bank-of-baroda', NULL, 'active', '0', '2023-03-07 23:45:20', '2023-03-07 23:45:20'),
(4, 'Center Bank Of India', NULL, NULL, 'center-bank-of-india', NULL, 'active', '0', '2023-03-07 23:45:40', '2023-03-07 23:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `country_id`, `state_id`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Vadodara', '1', '1', 'vadodara', NULL, 'active', '0', '2023-01-31 05:47:36', '2023-01-31 05:47:36'),
(2, 'Ahmedabad', '1', '1', 'ahmedabad', NULL, 'active', '0', '2023-01-31 05:47:53', '2023-01-31 05:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'India', 'india', NULL, 'active', '0', '2023-01-31 05:46:44', '2023-01-31 05:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `director_promoters`
--

CREATE TABLE `director_promoters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prifix_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_Name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadharcard_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ration_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `din` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folio_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `is_director` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_promoters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `director_promoters`
--

INSERT INTO `director_promoters` (`id`, `prifix_name`, `name`, `customer_code`, `customer_id`, `email`, `mobile`, `alternate_mobile`, `gender`, `dob`, `age`, `marital_status`, `relative_relation`, `relative_name`, `mother_Name`, `religion`, `member_cast`, `rating`, `latitude`, `longitude`, `pan`, `aadharcard_no`, `voter_id_no`, `ration_card_no`, `driving_license_no`, `passport_no`, `din`, `folio_number`, `appointment_date`, `joining_date`, `is_director`, `is_promoters`, `created_by`, `status`, `delete_status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mr.', 'Mayur Barot', 'GUW1000001', 'ca23-ea67-44f0-a68e-050c', 'mayur@gmail.com', '98969597', '121212121', 'male', '2023-02-25', '11', 'married', 'Father', 'Kanti Patel', 'Ganga', 'Hindu', 'Hindu', NULL, '4545215.36', '4545215.36', 'ASDASZZV', 'ASDASDASDA', 'AASDASD', 'ASDASDASD', 'ASDASDASD', 'SDASDAS', '123456', NULL, NULL, '2023-02-24', NULL, 'yes', 2, 'active', '0', NULL, NULL, '2023-02-25 00:52:17', '2023-02-25 01:40:34'),
(2, 'ms.', 'asdasd', 'GUW000002', '15e2-11df-45ad-bf8b-20dd', 'a@gmail.com', '2121212122', '212121', 'female', '1990-02-01', '122', 'married', 'Father', 'asdasd', 'asdasdasda', 'sdasdasdasd', 'asdasda', NULL, 'asdas', 'dasda', 'PAN', 'AADHARNo', 'Voter ID No', 'Ration Card No', 'Driving License No', 'Passport No', 'sdasd', NULL, '2023-02-25', '2023-02-23', 'yes', 'yes', 2, 'active', '1', NULL, NULL, '2023-02-25 01:21:33', '2023-02-25 01:25:04'),
(3, 'mrs.', 'Abdul Hakim', 'GUW000003', '7d5a-130c-48ad-afac-1f1c', 'abigstudio@gmail.com', '7002082630', NULL, 'male', '2023-02-23', '12', 'unMarried', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234', '234', '234', '234', '234', '234', NULL, NULL, '2023-02-23', '2023-02-25', 'yes', NULL, 2, 'active', '0', NULL, NULL, '2023-02-25 02:30:57', '2023-02-25 02:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ledger_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balanace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_balance` double DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `ledger_transaction_type` enum('credit','debit') COLLATE utf8mb4_unicode_ci DEFAULT 'debit',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `title`, `ledger_group`, `opening_balanace`, `closing_balance`, `type`, `ledger_transaction_type`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'INDUSIND BANK', '1', '50000', 50000, 1, 'debit', 'n-a', 2, 'active', '0', '2023-02-03 23:39:36', '2023-03-08 00:02:48'),
(2, 'NN 101 Ledger CR', '1', '50000', 50000, 1, 'credit', 'n-a', 2, 'active', '0', '2023-02-03 23:40:00', '2023-03-08 00:02:23'),
(3, 'UTKARSH BANK ACCOUNT', '1', '5000', 5000, 2, 'credit', 'n-a', 2, 'active', '0', '2023-02-03 23:40:23', '2023-03-08 00:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_groups`
--

CREATE TABLE `ledger_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_groups`
--

INSERT INTO `ledger_groups` (`id`, `title`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Bank accounts', 'bank-accounts', NULL, 'active', '0', '2023-01-24 04:31:29', '2023-01-24 04:31:29'),
(2, 'Bank occ a/c', 'bank-occ-a-c', NULL, 'active', '0', '2023-01-24 04:31:39', '2023-01-24 04:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_tpyes`
--

CREATE TABLE `ledger_tpyes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledger_tpyes`
--

INSERT INTO `ledger_tpyes` (`id`, `title`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'System defined', 'system-defined', NULL, 'active', '0', '2023-01-24 04:31:55', '2023-01-24 04:31:55'),
(2, 'User defined', 'user-defined', NULL, 'active', '0', '2023-01-24 04:32:02', '2023-01-24 04:32:02'),
(3, '1', '1', 2, 'active', '1', '2023-02-09 00:01:07', '2023-02-09 00:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_08_17_111200_create_admins_table', 1),
(5, '2022_08_19_062111_create_categories_table', 1),
(6, '2022_09_09_102451_create_system_settings_table', 1),
(7, '2022_12_03_081852_create_sub_categories_table', 1),
(8, '2022_12_03_100548_create_brands_table', 1),
(9, '2022_12_03_104327_create_attributes_table', 1),
(10, '2022_12_03_111403_create_attribute_values_table', 1),
(11, '2023_01_18_115608_create_countries_table', 1),
(12, '2023_01_18_121305_create_states_table', 1),
(13, '2023_01_18_130911_create_cities_table', 1),
(14, '2023_01_20_110708_create_ledgers_table', 1),
(15, '2023_01_20_111205_create_ledger_tpyes_table', 1),
(16, '2023_01_20_115732_create_ledger_groups_table', 1),
(17, '2023_01_20_121100_create_vouchers_table', 1),
(18, '2023_01_24_115442_create_vouchers_details_table', 2),
(19, '2023_02_24_043237_create_transfer_share_certificates_table', 3),
(20, '2023_02_24_062030_create_allocate_share_certificates_table', 4),
(21, '2023_02_25_052717_create_director_promoters_table', 5),
(22, '2023_03_01_171627_create_schemes_table', 6),
(23, '2023_03_03_173207_create_saving_accounts_table', 7),
(24, '2023_03_08_030142_create_transation_histories_table', 8),
(25, '2023_03_08_050530_create_banks_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saving_accounts`
--

CREATE TABLE `saving_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_mo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_unique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joint_customer_id` int(255) DEFAULT NULL,
  `scheme_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_amount` double DEFAULT NULL,
  `available_balance` double DEFAULT NULL,
  `minor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `bank_account_ledger_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saving_accounts`
--

INSERT INTO `saving_accounts` (`id`, `uuid`, `account_no`, `application_mo`, `application_unique`, `application_date`, `customer_id`, `joint_customer_id`, `scheme_id`, `agent_id`, `opening_amount`, `available_balance`, `minor_id`, `Payment_mode`, `bank_name`, `cheque_no`, `cheque_date`, `bank_account_ledger_id`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(2, 'c570-16a7-4a0b-b3fe-133f', '31050367462', 'SAA100000', '100000', '2023-03-08', '2', NULL, '1', NULL, 5000, 5000, '2', NULL, NULL, NULL, NULL, NULL, 2, 'approved', '0', '2023-03-08 00:29:25', '2023-03-08 02:27:01'),
(3, 'd4db-cf2f-485f-891f-201d', NULL, 'SAA100001', '100001', '2023-03-09', '1', 1, '1', NULL, 5000, 5000, '1', NULL, NULL, NULL, NULL, NULL, 2, 'pending', '0', '2023-03-08 12:06:12', '2023-03-08 12:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheme_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_payout` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_rate` double DEFAULT NULL,
  `minimum_balance` double DEFAULT NULL,
  `collector_commission` double DEFAULT NULL,
  `daily_neft_limit` double DEFAULT NULL,
  `scan_pay_limit` double DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `uuid`, `name`, `scheme_code`, `interest_payout`, `interest_rate`, `minimum_balance`, `collector_commission`, `daily_neft_limit`, `scan_pay_limit`, `remarks`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'dd10-de37-457c-be2f-1e2a', 'SARAL SAVING', '885599', 'quarterly', 22, 5000, 2, 2, 3, '4', 2, 'active', '0', '2023-03-01 12:18:47', '2023-03-01 12:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `title`, `country_id`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', '1', 'gujarat', NULL, 'active', '0', '2023-01-31 05:47:24', '2023-01-31 05:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'business_name', 'Loan Management', NULL, NULL),
(2, 'business_tag_line', 'Loan Management', NULL, NULL),
(3, 'business_description', 'Loan Management', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transation_histories`
--

CREATE TABLE `transation_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transation_type` enum('credit','debit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit',
  `transation_date` date DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_ledger_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('pending','completed','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transation_histories`
--

INSERT INTO `transation_histories` (`id`, `type`, `account_id`, `user_type`, `user_id`, `customer_id`, `transation_type`, `transation_date`, `payment_mode`, `bank_id`, `cheque_date`, `cheque_no`, `reference_no`, `bank_account_ledger_id`, `amount`, `remarks`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(3, 'deposit', 2, 'branch', '2', '2', 'credit', '2023-03-08', 'cheque', '3', '2023-03-01', '787878', NULL, '2', 5000, 'Deposit as an opening balance', 2, 'completed', '0', '2023-03-08 00:29:25', '2023-03-08 00:29:25'),
(4, 'withdrawal', 2, 'branch', '2', '2', 'debit', '2023-03-08', 'cash', NULL, NULL, NULL, NULL, NULL, 1000, 'Amount Withdrawal', 2, 'pending', '0', '2023-03-08 12:05:11', '2023-03-08 12:05:11'),
(5, 'deposit', 2, 'branch', '2', '1', 'credit', '2023-03-09', 'cash', NULL, NULL, NULL, NULL, NULL, 5000, 'Deposit as an opening balance', 2, 'pending', '0', '2023-03-08 12:06:12', '2023-03-08 12:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_share_certificates`
--

CREATE TABLE `transfer_share_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `no_of_share` double DEFAULT NULL,
  `face_value` double DEFAULT NULL,
  `total_consideration` double DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_share_certificates`
--

INSERT INTO `transfer_share_certificates` (`id`, `member_id_from`, `member_id`, `transfer_date`, `no_of_share`, `face_value`, `total_consideration`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', '2023-02-24', 50, 10, 500, 2, 'active', '0', '2023-02-24 00:20:54', '2023-02-24 00:20:54'),
(2, NULL, '1', '2023-02-22', 10, 10, 100, 2, 'active', '0', '2023-02-24 03:00:41', '2023-02-24 03:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prifix_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `alternate_mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_cast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadharcard_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ration_card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residense_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stability` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_residence_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_residence_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_occupation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_business` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_address1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_state_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_city_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_pin_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cust_prof_monthly_income` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electric_meterno` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electric_consumer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electric_owner_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electric_relation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electric_last_bill_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_nominee` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_passport` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_aadhaar_card_front` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_aadhaar_card_back` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_pan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_voter_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_driving_license` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_ration_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_passport` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_aadhaar_card_front` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_aadhaar_card_back` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_kyc_voter_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_driving_license` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_ration_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_telephone_bill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_bank_statement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_electricity_bill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_lpg_gas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_trade_license` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_address_other_government_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_passport_photograph` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_signature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `customer_id`, `prifix_name`, `name`, `email`, `email_verified_at`, `mobile`, `gender`, `dob`, `age`, `alternate_mobile`, `customer_code`, `marital_status`, `joining_date`, `agent_id`, `relative_relation`, `relative_name`, `mother_name`, `religion`, `member_cast`, `rating`, `latitude`, `longitude`, `aadharcard_no`, `pan`, `voter_id_no`, `ration_card_no`, `driving_license_no`, `passport_no`, `residense_type`, `stability`, `present_residence_type`, `present_address1`, `present_address2`, `present_ward`, `present_area`, `present_state_id`, `present_city_id`, `present_pin_code`, `permanent_residence_type`, `permanent_address1`, `permanent_address2`, `permanent_ward`, `permanent_area`, `permanent_state_id`, `permanent_city_id`, `permanent_pin_code`, `ifsc_code`, `bank_name`, `bank_address`, `account_type`, `account_no`, `cust_prof_occupation`, `cust_prof_type`, `cust_prof_business`, `cust_prof_address1`, `cust_prof_address2`, `cust_prof_state_id`, `cust_prof_city_id`, `cust_prof_pin_code`, `cust_prof_mobile`, `cust_prof_email`, `cust_prof_monthly_income`, `electric_meterno`, `electric_consumer_id`, `electric_owner_name`, `electric_relation`, `electric_last_bill_date`, `member_nominee`, `kyc_passport`, `kyc_aadhaar_card_front`, `kyc_aadhaar_card_back`, `kyc_pan`, `kyc_voter_card`, `kyc_driving_license`, `kyc_ration_card`, `kyc_address_passport`, `kyc_address_aadhaar_card_front`, `kyc_address_aadhaar_card_back`, `kyc_address_kyc_voter_card`, `kyc_address_driving_license`, `kyc_address_ration_card`, `kyc_address_telephone_bill`, `kyc_address_bank_statement`, `kyc_address_electricity_bill`, `kyc_address_lpg_gas`, `kyc_address_trade_license`, `kyc_address_other_government_id`, `kyc_passport_photograph`, `kyc_signature`, `status`, `delete_status`, `password`, `remember_token`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '990a-4316-46b3-875f-0b8b', 'mr.', 'Nil Patel', 'nil@gmail.com', NULL, '7898654585', 'female', '1990-01-25', 32, '8595654575', 'GUW000001', 'married', '2023-02-01', NULL, 'Spouse', 'Meena Patel', 'Jaya D Patel', 'Hindu', 'Hindu', '4-Star', '78595447858.25', '79898447858.25', '123456785826', 'AZIPDID856', 'V0001110', 'RAtion0212551220', 'DRIVING01230', '787878780', 'resident', '5 year', 'rented', 'A10 Shivam residency', 'Reva party plot', 'Tarsali Bypass', 'Tarsali', '1', '2', '390009', 'owned', 'A10 Shivam residency', 'Reva party plot', 'Tarsali Bypass', 'Tarsali', '1', '1', '390009', '223SDSDS', 'SBI', 'Near Station road', 'saving', '93652895566', 'Job', 'retired', 'Job in IT Company', 'A10 Shiva', 'A10 Shiva', '1', '1', '369963', '9898989898', 'abcd@gmail.com', '250000', '11145236625', 'M012522511`', 'Rock Patel', 'daughter', '2023-02-13', '[{\"nominee_name\":\"Mayur Patel\",\"nominee_relation\":\"father\",\"nominee_dob\":\"2023-02-09\",\"nominee_age\":\"11\",\"nominee_mobile\":\"9898989898\",\"nominee_address\":\"any\",\"nominee_aadhar_no\":\"asdasdasd\",\"nominee_pan\":\"232323\",\"nominee_voter_id\":\"2323\",\"nominee_ration_card\":\"232\"}]', 'IMG_1676871525.png', 'IMG_1676871858.pdf', 'IMG_1676871858.png', 'IMG_1676872971.png', 'IMG_1676872971.png', 'IMG_1676872971.png', 'IMG_1676872971.png', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.pdf', 'IMG_1676873012.png', 'IMG_1676873012.png', 'IMG_1676873012.png', 'IMG_1676873020.png', 'IMG_1676873020.png', 'active', '0', NULL, NULL, '2', '2023-02-09 23:44:50', '2023-02-20 00:33:40'),
(2, '489b-68e6-4ae7-b065-0555', 'mr.', 'Abdul Hakim', 'abistduio@gmail.com', NULL, '7002082630', 'male', '2023-01-31', 12, NULL, 'GUW000002', 'unMarried', '2023-02-09', NULL, NULL, NULL, NULL, NULL, NULL, '5-Star', NULL, NULL, '56956785826', 'AZIPDID523', NULL, NULL, NULL, NULL, 'resident', NULL, 'owned', 'Near Airpor circle', 'Near Taj Hotel', '123', 'Classic Road', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select City', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[{\"nominee_name\":\"Abdul Hakim\",\"nominee_relation\":\"brother_wife\",\"nominee_dob\":\"2023-02-06\",\"nominee_age\":\"21\",\"nominee_mobile\":\"7002082630\",\"nominee_address\":\"Lichubagan\",\"nominee_aadhar_no\":null,\"nominee_pan\":null,\"nominee_voter_id\":null,\"nominee_ration_card\":null}]', 'IMG_1677317905.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '0', NULL, NULL, '2', '2023-02-25 03:23:17', '2023-02-26 22:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_number` double DEFAULT NULL,
  `voucher_date` date DEFAULT NULL,
  `total_credit` double DEFAULT NULL,
  `total_debit` double DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `title`, `voucher_number`, `unique_number`, `voucher_date`, `total_credit`, `total_debit`, `remark`, `slug`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'GUW001-11000', 11000, '2023-02-04', 10000, 10000, NULL, 'n-a', 2, 'active', '0', '2023-02-03 23:44:59', '2023-02-03 23:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers_details`
--

CREATE TABLE `vouchers_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` enum('debit','credit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'debit',
  `debit_ledger_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_ledger_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ledger_account_close_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ledger_account_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `delete_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers_details`
--

INSERT INTO `vouchers_details` (`id`, `voucher_id`, `transaction_type`, `debit_ledger_account_id`, `credit_ledger_account_id`, `ledger_account_close_balance`, `ledger_account_amount`, `created_by`, `status`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'debit', '1', '1', '50000', '10000', 2, 'active', '0', '2023-02-03 23:44:59', '2023-02-03 23:44:59'),
(2, '1', 'credit', '1', '2', '5000', '5000', 2, 'active', '0', '2023-02-03 23:44:59', '2023-02-03 23:44:59'),
(3, '1', 'credit', '1', '3', '5000', '5000', 2, 'active', '0', '2023-02-03 23:44:59', '2023-02-03 23:44:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocate_share_certificates`
--
ALTER TABLE `allocate_share_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_promoters`
--
ALTER TABLE `director_promoters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_groups`
--
ALTER TABLE `ledger_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_tpyes`
--
ALTER TABLE `ledger_tpyes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `saving_accounts`
--
ALTER TABLE `saving_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transation_histories`
--
ALTER TABLE `transation_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_share_certificates`
--
ALTER TABLE `transfer_share_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers_details`
--
ALTER TABLE `vouchers_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allocate_share_certificates`
--
ALTER TABLE `allocate_share_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `director_promoters`
--
ALTER TABLE `director_promoters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ledger_groups`
--
ALTER TABLE `ledger_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ledger_tpyes`
--
ALTER TABLE `ledger_tpyes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `saving_accounts`
--
ALTER TABLE `saving_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transation_histories`
--
ALTER TABLE `transation_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transfer_share_certificates`
--
ALTER TABLE `transfer_share_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vouchers_details`
--
ALTER TABLE `vouchers_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
