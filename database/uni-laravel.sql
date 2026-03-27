-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2026 at 02:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `subtitle`, `short_description`, `description`, `image`, `image1`, `created_at`, `updated_at`) VALUES
(1, 'Building Pathways to Your Immigration Success', NULL, 'We provide expert guidance, personalized solutions, and transparent processes to help you achieve your immigration goals. Our dedicated team ensures a smooth journey, building pathways to your international success.', '<div class=\"section-title mb-0\"><span class=\"sub-title-2 wow fadeInUp\">Your Travel Made Easy</span>\r\n<h2 class=\"split-text-right split-text-in-right\">Smooth Visa Journey Guaranteed</h2>\r\n</div>\r\n<p class=\"text\">We provide expert guidance for every visa application, ensuring smooth processing, personalized support, and reliable assistance</p>\r\n<p class=\"text\">We provide expert guidance, personalized solutions, and transparent processes to help you achieve your immigration goals. Our dedicated team ensures a smooth journey, building pathways to your international success.</p>\r\n<p class=\"text\">We provide expert guidance, personalized solutions, and transparent processes to help you achieve your immigration goals. Our dedicated team ensures a smooth journey, building pathways to your international success.</p>\r\n<p class=\"text\">We provide expert guidance, personalized solutions, and transparent processes to help you achieve your immigration goals. Our dedicated team ensures a smooth journey, building pathways to your international success.</p>\r\n<p class=\"text\">We provide expert guidance, personalized solutions, and transparent processes to help you achieve your immigration goals. Our dedicated team ensures a smooth journey, building pathways to your international success.</p>\r\n<p class=\"text\">We provide expert guidance, personalized solutions, and transparent processes to help you achieve your immigration goals. Our dedicated team ensures a smooth journey, building pathways to your international success.</p>', '1774591944.jpg', '1774604754.jpg', '2026-03-27 00:12:24', '2026-03-27 03:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `visa_type_id` bigint(20) UNSIGNED NOT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `referrer_name` varchar(255) DEFAULT NULL,
  `referrer_phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `title`, `description`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ATHE Level 3 Diploma in Health and Social Care (60 Credits)', '<div class=\"elementor-element elementor-element-2a4fed38 elementor-widget elementor-widget-text-editor\" data-id=\"2a4fed38\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p dir=\"ltr\"><strong>Introduction</strong></p>\r\n<p dir=\"ltr\">The ATHE Level 3 Diploma in Health and Social Care is a 60-credit qualification that is equivalent to an A Level or Access to HE qualification. It targets learners who aim to pursue a health and social care degree but lack the usual entry qualifications.</p>\r\n<p dir=\"ltr\">The qualification intends to provide learners with a foundation of knowledge and understanding in various topics relevant to the Health and Social Care industry. These topics enable learners to develop practical and theoretical problem-solving skills using Information and Health and Social Care.</p>\r\n<p dir=\"ltr\">The International Access Programme (IAP) comprises a suite of ATHE L3 qualifications, with each qualification carrying a credit value of 60. Learners can choose to study one or more qualifications in the suite.</p>\r\n<p dir=\"ltr\"><strong>Grading Procedure</strong></p>\r\n<p dir=\"ltr\">The grading system for this qualification includes Pass, Merit, and Distinction levels.</p>\r\n<p dir=\"ltr\"><strong>Course Specification</strong></p>\r\n<p dir=\"ltr\">The full course modules are provided below. You can download full brochure from the button below as well.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-781047c eael-table-align-center eael-dt-th-align-left elementor-widget elementor-widget-eael-data-table\" data-id=\"781047c\" data-element_type=\"widget\" data-widget_type=\"eael-data-table.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"eael-data-table-wrapper-781047c\" class=\"eael-data-table-wrap\" data-table_id=\"781047c\" data-custom_responsive=\"false\">\r\n<table id=\"eael-data-table-781047c\" class=\"tablesorter eael-data-table center\">\r\n<thead>\r\n<tr class=\"table-header\">\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Unit Name</span></th>\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Credit</span></th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Structure and Overview of the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">12</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Principles, Values and Regulation in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Human Growth and Development</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">5</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Working in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">15</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Research in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Personal and Professional Development in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">8</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', 'Diploma in Health and Social Care', '1774599394.jpg', 1, '2026-03-27 02:16:34', '2026-03-27 02:16:34'),
(2, 1, 'ATHE Level 4 Diploma in Health and Social Care', '<div class=\"elementor-element elementor-element-2a4fed38 elementor-widget elementor-widget-text-editor\" data-id=\"2a4fed38\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p dir=\"ltr\"><strong>Introduction</strong></p>\r\n<p dir=\"ltr\">The ATHE Level 3 Diploma in Health and Social Care is a 60-credit qualification that is equivalent to an A Level or Access to HE qualification. It targets learners who aim to pursue a health and social care degree but lack the usual entry qualifications.</p>\r\n<p dir=\"ltr\">The qualification intends to provide learners with a foundation of knowledge and understanding in various topics relevant to the Health and Social Care industry. These topics enable learners to develop practical and theoretical problem-solving skills using Information and Health and Social Care.</p>\r\n<p dir=\"ltr\">The International Access Programme (IAP) comprises a suite of ATHE L3 qualifications, with each qualification carrying a credit value of 60. Learners can choose to study one or more qualifications in the suite.</p>\r\n<p dir=\"ltr\"><strong>Grading Procedure</strong></p>\r\n<p dir=\"ltr\">The grading system for this qualification includes Pass, Merit, and Distinction levels.</p>\r\n<p dir=\"ltr\"><strong>Course Specification</strong></p>\r\n<p dir=\"ltr\">The full course modules are provided below. You can download full brochure from the button below as well.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-781047c eael-table-align-center eael-dt-th-align-left elementor-widget elementor-widget-eael-data-table\" data-id=\"781047c\" data-element_type=\"widget\" data-widget_type=\"eael-data-table.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"eael-data-table-wrapper-781047c\" class=\"eael-data-table-wrap\" data-table_id=\"781047c\" data-custom_responsive=\"false\">\r\n<table id=\"eael-data-table-781047c\" class=\"tablesorter eael-data-table center\">\r\n<thead>\r\n<tr class=\"table-header\">\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Unit Name</span></th>\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Credit</span></th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Structure and Overview of the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">12</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Principles, Values and Regulation in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Human Growth and Development</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">5</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Working in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">15</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Research in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Personal and Professional Development in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">8</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', 'ATHE Level 4 Diploma in Health and Social Care', '1774599481.jpg', 1, '2026-03-27 02:18:01', '2026-03-27 02:18:01'),
(3, 2, 'ATHE Level 3 Diploma in Health and Social Care', '<div class=\"elementor-element elementor-element-2a4fed38 elementor-widget elementor-widget-text-editor\" data-id=\"2a4fed38\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p dir=\"ltr\"><strong>Introduction</strong></p>\r\n<p dir=\"ltr\">The ATHE Level 3 Diploma in Health and Social Care is a 60-credit qualification that is equivalent to an A Level or Access to HE qualification. It targets learners who aim to pursue a health and social care degree but lack the usual entry qualifications.</p>\r\n<p dir=\"ltr\">The qualification intends to provide learners with a foundation of knowledge and understanding in various topics relevant to the Health and Social Care industry. These topics enable learners to develop practical and theoretical problem-solving skills using Information and Health and Social Care.</p>\r\n<p dir=\"ltr\">The International Access Programme (IAP) comprises a suite of ATHE L3 qualifications, with each qualification carrying a credit value of 60. Learners can choose to study one or more qualifications in the suite.</p>\r\n<p dir=\"ltr\"><strong>Grading Procedure</strong></p>\r\n<p dir=\"ltr\">The grading system for this qualification includes Pass, Merit, and Distinction levels.</p>\r\n<p dir=\"ltr\"><strong>Course Specification</strong></p>\r\n<p dir=\"ltr\">The full course modules are provided below. You can download full brochure from the button below as well.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-781047c eael-table-align-center eael-dt-th-align-left elementor-widget elementor-widget-eael-data-table\" data-id=\"781047c\" data-element_type=\"widget\" data-widget_type=\"eael-data-table.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"eael-data-table-wrapper-781047c\" class=\"eael-data-table-wrap\" data-table_id=\"781047c\" data-custom_responsive=\"false\">\r\n<table id=\"eael-data-table-781047c\" class=\"tablesorter eael-data-table center\">\r\n<thead>\r\n<tr class=\"table-header\">\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Unit Name</span></th>\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Credit</span></th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Structure and Overview of the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">12</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Principles, Values and Regulation in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Human Growth and Development</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">5</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Working in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">15</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Research in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Personal and Professional Development in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">8</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', 'ATHE Level 3 Diploma in Health and Social Care', '1774599532.jpg', 1, '2026-03-27 02:18:52', '2026-03-27 02:18:52'),
(4, 2, 'ATHE Level 4 Diploma in Health and Social Care', '<div class=\"elementor-element elementor-element-2a4fed38 elementor-widget elementor-widget-text-editor\" data-id=\"2a4fed38\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p dir=\"ltr\"><strong>Introduction</strong></p>\r\n<p dir=\"ltr\">The ATHE Level 3 Diploma in Health and Social Care is a 60-credit qualification that is equivalent to an A Level or Access to HE qualification. It targets learners who aim to pursue a health and social care degree but lack the usual entry qualifications.</p>\r\n<p dir=\"ltr\">The qualification intends to provide learners with a foundation of knowledge and understanding in various topics relevant to the Health and Social Care industry. These topics enable learners to develop practical and theoretical problem-solving skills using Information and Health and Social Care.</p>\r\n<p dir=\"ltr\">The International Access Programme (IAP) comprises a suite of ATHE L3 qualifications, with each qualification carrying a credit value of 60. Learners can choose to study one or more qualifications in the suite.</p>\r\n<p dir=\"ltr\"><strong>Grading Procedure</strong></p>\r\n<p dir=\"ltr\">The grading system for this qualification includes Pass, Merit, and Distinction levels.</p>\r\n<p dir=\"ltr\"><strong>Course Specification</strong></p>\r\n<p dir=\"ltr\">The full course modules are provided below. You can download full brochure from the button below as well.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-781047c eael-table-align-center eael-dt-th-align-left elementor-widget elementor-widget-eael-data-table\" data-id=\"781047c\" data-element_type=\"widget\" data-widget_type=\"eael-data-table.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"eael-data-table-wrapper-781047c\" class=\"eael-data-table-wrap\" data-table_id=\"781047c\" data-custom_responsive=\"false\">\r\n<table id=\"eael-data-table-781047c\" class=\"tablesorter eael-data-table center\">\r\n<thead>\r\n<tr class=\"table-header\">\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Unit Name</span></th>\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Credit</span></th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Structure and Overview of the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">12</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Principles, Values and Regulation in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Human Growth and Development</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">5</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Working in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">15</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Research in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Personal and Professional Development in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">8</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', 'ATHE Level-4 Diploma in Health and Social Care', '1774599610.jpg', 1, '2026-03-27 02:20:10', '2026-03-27 02:20:10'),
(5, 3, 'Diploma in Health and Social Care', '<div class=\"elementor-element elementor-element-2a4fed38 elementor-widget elementor-widget-text-editor\" data-id=\"2a4fed38\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p dir=\"ltr\"><strong>Introduction</strong></p>\r\n<p dir=\"ltr\">The ATHE Level 3 Diploma in Health and Social Care is a 60-credit qualification that is equivalent to an A Level or Access to HE qualification. It targets learners who aim to pursue a health and social care degree but lack the usual entry qualifications.</p>\r\n<p dir=\"ltr\">The qualification intends to provide learners with a foundation of knowledge and understanding in various topics relevant to the Health and Social Care industry. These topics enable learners to develop practical and theoretical problem-solving skills using Information and Health and Social Care.</p>\r\n<p dir=\"ltr\">The International Access Programme (IAP) comprises a suite of ATHE L3 qualifications, with each qualification carrying a credit value of 60. Learners can choose to study one or more qualifications in the suite.</p>\r\n<p dir=\"ltr\"><strong>Grading Procedure</strong></p>\r\n<p dir=\"ltr\">The grading system for this qualification includes Pass, Merit, and Distinction levels.</p>\r\n<p dir=\"ltr\"><strong>Course Specification</strong></p>\r\n<p dir=\"ltr\">The full course modules are provided below. You can download full brochure from the button below as well.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-781047c eael-table-align-center eael-dt-th-align-left elementor-widget elementor-widget-eael-data-table\" data-id=\"781047c\" data-element_type=\"widget\" data-widget_type=\"eael-data-table.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"eael-data-table-wrapper-781047c\" class=\"eael-data-table-wrap\" data-table_id=\"781047c\" data-custom_responsive=\"false\">\r\n<table id=\"eael-data-table-781047c\" class=\"tablesorter eael-data-table center\">\r\n<thead>\r\n<tr class=\"table-header\">\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Unit Name</span></th>\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Credit</span></th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Structure and Overview of the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">12</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Principles, Values and Regulation in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Human Growth and Development</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">5</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Working in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">15</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Research in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Personal and Professional Development in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">8</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '1Diploma in Health and Social Care', '1774599689.jpg', 1, '2026-03-27 02:21:29', '2026-03-27 02:21:29'),
(6, 3, 'Diploma in Health and Social Care', '<div class=\"elementor-element elementor-element-2a4fed38 elementor-widget elementor-widget-text-editor\" data-id=\"2a4fed38\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p dir=\"ltr\"><strong>Introduction</strong></p>\r\n<p dir=\"ltr\">The ATHE Level 3 Diploma in Health and Social Care is a 60-credit qualification that is equivalent to an A Level or Access to HE qualification. It targets learners who aim to pursue a health and social care degree but lack the usual entry qualifications.</p>\r\n<p dir=\"ltr\">The qualification intends to provide learners with a foundation of knowledge and understanding in various topics relevant to the Health and Social Care industry. These topics enable learners to develop practical and theoretical problem-solving skills using Information and Health and Social Care.</p>\r\n<p dir=\"ltr\">The International Access Programme (IAP) comprises a suite of ATHE L3 qualifications, with each qualification carrying a credit value of 60. Learners can choose to study one or more qualifications in the suite.</p>\r\n<p dir=\"ltr\"><strong>Grading Procedure</strong></p>\r\n<p dir=\"ltr\">The grading system for this qualification includes Pass, Merit, and Distinction levels.</p>\r\n<p dir=\"ltr\"><strong>Course Specification</strong></p>\r\n<p dir=\"ltr\">The full course modules are provided below. You can download full brochure from the button below as well.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-781047c eael-table-align-center eael-dt-th-align-left elementor-widget elementor-widget-eael-data-table\" data-id=\"781047c\" data-element_type=\"widget\" data-widget_type=\"eael-data-table.default\">\r\n<div class=\"elementor-widget-container\">\r\n<div id=\"eael-data-table-wrapper-781047c\" class=\"eael-data-table-wrap\" data-table_id=\"781047c\" data-custom_responsive=\"false\">\r\n<table id=\"eael-data-table-781047c\" class=\"tablesorter eael-data-table center\">\r\n<thead>\r\n<tr class=\"table-header\">\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Unit Name</span></th>\r\n<th id=\"\" class=\"\" colspan=\"\"><span class=\"data-table-header-text\">Credit</span></th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Structure and Overview of the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">12</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Principles, Values and Regulation in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Human Growth and Development</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">5</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Working in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">15</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Research in Health and Social Care</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">10</div>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">Personal and Professional Development in the Health and Social Care Sector</div>\r\n</div>\r\n</td>\r\n<td id=\"\" class=\"\" colspan=\"\" rowspan=\"\">\r\n<div class=\"td-content-wrapper\">\r\n<div class=\"td-content\">8</div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '2Diploma in Health and Social Care', '1774599726.jpg', 1, '2026-03-27 02:22:06', '2026-03-27 02:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SFE Funded', '2026-03-27 00:34:35', '2026-03-27 00:35:23'),
(2, 'Self Funded', '2026-03-27 00:35:08', '2026-03-27 00:35:08'),
(3, 'Free', '2026-03-27 00:36:03', '2026-03-27 00:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How long does the student visa process usually take?', '<div>\r\n<div>Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.</div>\r\n</div>', 1, 1, '2026-03-27 02:43:31', '2026-03-27 02:43:31'),
(2, 'Will you guide me in preparing for the visa interview?', '<div>\r\n<div>Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.</div>\r\n</div>', 2, 1, '2026-03-27 02:44:21', '2026-03-27 02:47:02'),
(3, 'Do you assist with scholarship applications as well?', '<div>\r\n<div>Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.</div>\r\n</div>', 3, 1, '2026-03-27 02:45:34', '2026-03-27 02:45:34'),
(4, 'Do you offer post-arrival support for students?', '<div>\r\n<div>Yes, we guide students in identifying suitable scholarships, preparing strong applications, and increasing chances.</div>\r\n</div>', 4, 1, '2026-03-27 02:47:33', '2026-03-27 02:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_06_15_163541_create_sliders_table', 1),
(7, '2025_06_15_164056_create_abouts_table', 1),
(8, '2025_06_15_165022_create_testimonials_table', 1),
(9, '2025_06_15_165930_create_teams_table', 1),
(10, '2025_06_15_170302_create_faqs_table', 1),
(11, '2025_06_15_170634_create_contacts_table', 1),
(12, '2025_06_17_042720_create_permission_tables', 1),
(13, '2025_06_17_053434_create_course_categories_table', 1),
(14, '2025_06_17_053758_create_courses_table', 1),
(15, '2025_06_18_170320_create_visa_types_table', 1),
(16, '2025_06_18_170614_create_applications_table', 1),
(17, '2025_06_20_153438_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_name`, `value`, `created_at`, `updated_at`) VALUES
('CONTACT_ADDRESS', 'Unit 6.1.1 Town Quay Wharf, Abbey Road, Barking, IG11 7BZ', NULL, '2026-03-27 03:16:48'),
('CONTACT_EMAIL', 'asifrafiun@gmail.com', NULL, '2026-03-27 03:16:48'),
('CONTACT_GOOGLE_MAP', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2921.8568138366277!2d-78.79975230000001!3d42.9180607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d30d23b89acc4d%3A0xe10d612b12e87288!2s2267%20Genesee%20St%2C%20Buffalo%2C%20NY%2014211%2C%20USA!5e0!3m2!1sen!2sbd!4v1704691566026!5m2!1sen!2sbd\" width=\"800\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, '2026-03-27 03:16:48'),
('CONTACT_PHONE', '+8801979200300', NULL, '2026-03-27 03:16:48'),
('META_DESCRIPTION', 'Welcome to the official portfolio of Dr. Md Uzir Hossain Uzir — an academic researcher, educator, and professional dedicated to excellence in education and scientific innovation.', NULL, '2025-11-19 03:30:22'),
('META_KEYWORDS', 'Dr. Md Uzir Hossain Uzir, researcher, academic, educator, scientist, portfolio, Bangladesh, education, research work, publications, professional profile', NULL, '2025-11-19 03:30:22'),
('META_TITLE', 'Dr. Md Uzir Hossain Uzir | Researcher, Academic & Educator | Official Portfolio', NULL, '2025-11-19 03:30:22'),
('SETTING_ABOUT_US', '<p style=\"text-align: justify;\">Dr. Md. Uzir Hossain Uzir is a Senior Lecturer-I (Assistant Professor) at Taylor\'s Business School, Taylor\'s University, Malaysia. Previously, he served at Putra Business School, Universiti Putra Malaysia (UPM), and earlier at the Faculty of Economics, Business, and Social Development (FBESD), Universiti Malaysia Terengganu (UMT), Malaysia, as a Senior Lecturer. He began his academic career as a Lecturer at Lincoln University College, Malaysia.</p>\r\n<p style=\"text-align: justify;\"><br>Dr. Uzir obtained his doctoral degree from Putra Business School (PBS), Malaysia the first AACSB-accredited business school in the country where he conducted his PhD research on brand loyalty for electronic home appliances in Bangladesh under the supervision of Prof. Dr. Abu Bakar Abdul Hamid.<br>He has published more than 28 Scopus-indexed articles in high-impact journals, including:</p>\r\n<ul>\r\n<li style=\"font-weight: bold; text-align: justify;\"><strong>International Journal of Consumer Studies (JCR: Q1; IF: 9.00)</strong></li>\r\n</ul>', NULL, '2026-03-27 03:16:48'),
('SETTING_PAGE_BANNER', 'banner_1774590555.jpg', NULL, '2026-03-26 23:49:15'),
('SETTING_SEO_IMAGE', 'image_1762092178.png', NULL, '2025-11-02 02:02:58'),
('SETTING_SITE_ABOUT', 'aboutimage_1761237891.png', NULL, '2025-10-23 04:44:52'),
('SETTING_SITE_DESCRIPTION', '', NULL, NULL),
('SETTING_SITE_FAVICON', 'favicon_1774602844.png', NULL, '2026-03-27 03:14:04'),
('SETTING_SITE_LOGO', 'logo_1774602844.png', NULL, '2026-03-27 03:14:04'),
('SETTING_SOCIAL_FACEBOOK', 'https://www.facebook.com/falcondreamsbd/', NULL, '2026-03-27 03:16:48'),
('SETTING_SOCIAL_INSTAGRAM', 'https://www.facebook.com', NULL, '2026-03-27 03:16:48'),
('SETTING_SOCIAL_LINKEDIN', 'https://www.facebook.com', NULL, '2026-03-27 03:16:48'),
('SETTING_SOCIAL_TWITTER', 'https://www.facebook.com', NULL, '2026-03-27 03:16:48'),
('SETTING_SOCIAL_YOUTUBE', 'https://www.facebook.com', NULL, '2026-03-27 03:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `sort`, `title`, `subtitle`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, '1774591274.jpg', 1, 'From Application to Visa – We’ve Got You Covered', NULL, 1, '<div>\r\n<div>&nbsp;We guide you through every step of the education visa process, from initial application to final approval, ensuring a smooth, hassle-free journey.</div>\r\n</div>', '2026-03-27 00:01:14', '2026-03-27 00:01:14'),
(2, '1774591338.jpg', 2, 'From Application to Visa – We’ve Got You Covered', NULL, 1, '<div>\r\n<div>&nbsp;We guide you through every step of the education visa process, from initial application to final approval, ensuring a smooth, hassle-free journey.</div>\r\n</div>', '2026-03-27 00:02:19', '2026-03-27 00:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `designation` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `slug`, `title`, `message`, `designation`, `image`, `sort`, `status`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'United States of America', 'United States of America', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600334.jpg', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:32:14', '2026-03-27 02:32:14'),
(2, 'United States of America', 'United States of America1', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600391.jpg', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:33:11', '2026-03-27 02:33:11'),
(3, 'United States of America', 'United States of America3', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600504.jpg', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:35:04', '2026-03-27 02:35:04'),
(4, 'United States of America', 'United States of America4', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600567.jpg', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:36:07', '2026-03-27 02:36:07'),
(5, 'United States of America', 'United States of America5', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600612.jpg', 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:36:52', '2026-03-27 02:36:52'),
(6, 'United States of America', 'United States of America6', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600653.jpg', 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:37:33', '2026-03-27 02:37:33'),
(7, 'United States of America', 'United States of America7', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600695.jpg', 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:38:15', '2026-03-27 02:38:15'),
(8, 'United States of America', 'United States of America8', 'United States of America', 'United States of America', '<p>The United States is one of the most popular destinations for international students and immigrants, offering world-class universities, diverse cultural experiences, and countless career opportunities. With top-ranked education systems, advanced research facilities, and a welcoming environment for skilled professionals, the USA is ideal for those seeking growth and global exposure.</p><p class=\"mt-3\">Our consultancy provides complete guidance for study visas, work permits, and permanent residency pathways tailored to your goals.</p><h5>Over the last 35 Years we made an impact that is strong &amp; we have long way to go.</h5><div class=\"tourist-visa-box\"><div class=\"tourist-box style-2\"><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Work Permit</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div><div class=\"tourist-box\"><div class=\"tourist-content\"><h5>Student</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div><div class=\"tourist-content\"><h5>Tourist Visa</h5><p>Broad term that can refer to various aspects of interconnectedness</p></div></div></div><h3 class=\"text\">USA Visa Process</h3><ul class=\"list-item\"><li>Consultation &amp; Eligibility Check &ndash;&nbsp;Our experts review your profile and visa requirements.</li><li>02. Application Preparation &ndash;&nbsp;We help with document collection, form filling, and statement drafting.</li><li>03. Submission &ndash;&nbsp;Visa application is submitted online with required fees.</li><li>04. Interview Guidance &ndash;&nbsp;Get training and mock sessions for embassy interview.</li><li>05. Approval &amp; Travel &ndash; Once approved, we provide travel and pre-departure guidance.</li></ul>', '1774600733.jpg', 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-27 02:38:53', '2026-03-27 02:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `slug`, `title`, `message`, `designation`, `image`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sohel Tanvir', 'Sohel Tanvir', 'Canada', 'Professional and reliable service. They explained each step clearly, prepared my documents, and supported me during the interview. My visa approval came faster than expected.', NULL, '1774606153.jpg', 1, 1, '2026-03-27 04:09:13', '2026-03-27 04:09:13'),
(2, 'Ayesha Rahman', 'Ayesha Rahman', 'UK. United Kingdom', 'The consultancy guided me from start to finish, making my study abroad journey smooth and stress-free. Thanks to their expert support, I secured my visa successfully.', NULL, '1774606231.jpg', 2, 1, '2026-03-27 04:10:31', '2026-03-27 04:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `address`, `image`, `gender`, `city`, `state`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Md. Uzir Hossain Uzir', 'admin@gmail.com', NULL, '$2y$12$VlVbM/f5qVf6Uoi0K87iBOt51ZpjWn13WkY8JzmJikm1OMeY2ELDG', NULL, NULL, '1760716970.jpg', NULL, NULL, NULL, NULL, '2025-08-19 13:03:45', '2025-10-17 04:02:50'),
(2, 'G.M. Zesan', 'rafiun@gmail.com', NULL, '$2y$12$VlVbM/f5qVf6Uoi0K87iBOt51ZpjWn13WkY8JzmJikm1OMeY2ELDG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-19 13:03:45', '2025-08-19 13:03:45'),
(3, 'test', 'test@gmail.com', NULL, '$2y$12$DHFIy2TWVmxYSfFIaxVRWOopmV8gKRbO5srD.NIL52er/s7y/pyDK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-29 06:19:59', '2025-10-29 06:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `visa_types`
--

CREATE TABLE `visa_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visa_types`
--

INSERT INTO `visa_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Student Visa for Canada', '2026-03-27 00:22:57', '2026-03-27 00:22:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_email_unique` (`email`),
  ADD KEY `applications_course_id_foreign` (`course_id`),
  ADD KEY `applications_visa_type_id_foreign` (`visa_type_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_name`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_slug_unique` (`slug`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visa_types`
--
ALTER TABLE `visa_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visa_types_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visa_types`
--
ALTER TABLE `visa_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_visa_type_id_foreign` FOREIGN KEY (`visa_type_id`) REFERENCES `visa_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
