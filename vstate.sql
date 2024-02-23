-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2024 at 02:25 AM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vstate`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Marshall Speaker', 1, '2024-02-14 16:54:42', '2024-02-14 16:54:42', NULL),
(2, 'Wi-Fi internet access', 1, '2024-02-14 16:54:49', '2024-02-14 16:54:49', NULL),
(3, 'HD TV with premium cable, BeIN Sports, OSN and Netflix', 1, '2024-02-14 16:54:55', '2024-02-14 16:54:55', NULL),
(4, 'Access to all common pools', 1, '2024-02-14 16:55:01', '2024-02-14 16:55:01', NULL),
(5, 'Refrigerator', 1, '2024-02-14 16:55:07', '2024-02-14 16:55:07', NULL),
(6, 'Full automatic washing machine with dryer', 1, '2024-02-14 16:55:13', '2024-02-14 16:55:13', NULL),
(7, 'Dishwasher', 1, '2024-02-14 16:55:18', '2024-02-14 16:55:18', NULL),
(8, 'Kettle', 1, '2024-02-14 16:55:23', '2024-02-14 16:55:23', NULL),
(9, 'Nespresso Machine', 1, '2024-02-14 16:55:30', '2024-02-14 16:55:30', NULL),
(10, 'Steam iron', 1, '2024-02-14 16:55:35', '2024-02-14 16:55:35', NULL),
(11, 'Ironing board', 1, '2024-02-14 16:55:39', '2024-02-14 16:55:39', NULL),
(12, 'Air Conditioner', 1, '2024-02-14 16:55:45', '2024-02-14 16:55:45', NULL),
(13, 'Microwave oven', 1, '2024-02-14 16:55:51', '2024-02-14 16:55:51', NULL),
(14, 'Bedsheet, Towels and Duvet', 1, '2024-02-14 16:55:56', '2024-02-14 16:55:56', NULL),
(15, 'Common Parking', 1, '2024-02-14 16:56:01', '2024-02-14 16:56:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amenity_real_estate_unit`
--

CREATE TABLE `amenity_real_estate_unit` (
  `real_estate_unit_id` bigint(20) UNSIGNED NOT NULL,
  `amenity_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenity_real_estate_unit`
--

INSERT INTO `amenity_real_estate_unit` (`real_estate_unit_id`, `amenity_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `applications_request_sections`
--

CREATE TABLE `applications_request_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `host` varchar(46) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'audit:created', 1, 'App\\Models\\ProjectType#1', 1, '{\"title\":\"dssd\",\"active\":\"1\",\"updated_at\":\"2024-02-15 22:13:18\",\"created_at\":\"2024-02-15 22:13:18\",\"id\":1,\"image\":null,\"media\":[]}', '127.0.0.1', '2024-02-15 20:13:19', '2024-02-15 20:13:19'),
(2, 'audit:created', 1, 'App\\Models\\BookMeeting#1', NULL, '{\"name\":\"name\",\"phone\":\"eeee\",\"date\":\"2024-02-14 01:38:33\",\"updated_at\":\"2024-02-15 23:38:59\",\"created_at\":\"2024-02-15 23:38:59\",\"id\":1}', '127.0.0.1', '2024-02-15 21:38:59', '2024-02-15 21:38:59'),
(3, 'audit:updated', 1, 'App\\Models\\RealEstateUnit#1', 1, '{\"bua\":\"22\",\"ror\":\"22\",\"roi\":\"22\",\"updated_at\":\"2024-02-16 00:11:01\"}', '127.0.0.1', '2024-02-15 22:11:01', '2024-02-15 22:11:01'),
(4, 'audit:deleted', 2, 'App\\Models\\RealEstateUnit#2', 1, '{\"id\":2,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(5, 'audit:deleted', 3, 'App\\Models\\RealEstateUnit#3', 1, '{\"id\":3,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(6, 'audit:deleted', 4, 'App\\Models\\RealEstateUnit#4', 1, '{\"id\":4,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(7, 'audit:deleted', 5, 'App\\Models\\RealEstateUnit#5', 1, '{\"id\":5,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(8, 'audit:deleted', 6, 'App\\Models\\RealEstateUnit#6', 1, '{\"id\":6,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(9, 'audit:deleted', 7, 'App\\Models\\RealEstateUnit#7', 1, '{\"id\":7,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(10, 'audit:deleted', 8, 'App\\Models\\RealEstateUnit#8', 1, '{\"id\":8,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(11, 'audit:deleted', 9, 'App\\Models\\RealEstateUnit#9', 1, '{\"id\":9,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(12, 'audit:deleted', 10, 'App\\Models\\RealEstateUnit#10', 1, '{\"id\":10,\"title\":\"Reserve Way New Braunfels, Texas\",\"description\":\"<p><strong>Lorem Ipsum<\\/strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":\"published\",\"price\":\"780000\",\"featured\":\"yes\",\"premium\":\"yes\",\"location_link\":\"Qui ut minim est ips\",\"lat\":\"Pariatur Aliquam vo\",\"lang\":\"Consequatur exceptu\",\"number_of_room\":\"3\",\"number_of_floor\":\"3\",\"number_of_bath_room\":\"2\",\"number_of_master_room\":\"1\",\"notes\":\"Reprehenderit volupt\",\"has_garage\":1,\"number_of_garage\":\"1\",\"features\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<\\/p>\",\"address\":\"The standard chunk of Lorem Ipsum used since the 1500s\",\"bua\":null,\"ror\":null,\"roi\":null,\"created_at\":\"2024-02-14 06:14:26\",\"updated_at\":\"2024-02-16 00:11:16\",\"deleted_at\":\"2024-02-16 00:11:16\",\"project_id\":null,\"user_id\":2,\"image\":null,\"images\":[],\"plans\":[],\"image_360\":null,\"images_360\":[],\"media\":[]}', '127.0.0.1', '2024-02-15 22:11:16', '2024-02-15 22:11:16'),
(13, 'audit:created', 3, 'App\\Models\\RealEstateApplication#3', NULL, '{\"email\":\"hany@mail.com\",\"updated_at\":\"2024-02-17 06:46:55\",\"created_at\":\"2024-02-17 06:46:55\",\"id\":3}', '196.157.43.29', '2024-02-17 13:46:55', '2024-02-17 13:46:55'),
(14, 'audit:created', 2, 'App\\Models\\Project#2', 1, '{\"title\":\"Nile business city\",\"active\":\"1\",\"user_id\":\"2\",\"status\":\"active\",\"lat\":null,\"lang\":null,\"location_link\":null,\"description\":\"<p>We are never satisfied with what we have accomplished, but we always strive to achieve the best by unleashing our dreams and aspirations for the future of urban development in Egypt. We focus on improving the quality of life in its social, economic and environmental sense, through the establishment of huge projects based on the genius of design and modern technology; In order to remain prominent and distinguished landmarks at the local and international levels over time for future generations.<\\/p>\",\"addresse\":null,\"city_id\":null,\"featured\":\"active\",\"project_type_id\":\"1\",\"updated_at\":\"2024-02-17 08:20:53\",\"created_at\":\"2024-02-17 08:20:53\",\"id\":2,\"image\":null,\"images\":null,\"attachments\":[],\"brochure\":null,\"video\":[],\"media\":[]}', '196.157.105.94', '2024-02-17 15:20:53', '2024-02-17 15:20:53'),
(15, 'audit:updated', 2, 'App\\Models\\Project#2', 1, '{\"addresse\":\"ddddd dddd ddddd\",\"updated_at\":\"2024-02-17 17:21:41\",\"second_title\":\"ddddddddd\",\"second_description\":\"<p>We are never satisfied with what we have accomplished, but we always strive to achieve the best by unleashing our dreams and aspirations for the future of urban development in Egypt. We focus on improving the quality of life in its social, economic and environmental sense, through the establishment of huge projects based on the genius of design and modern technology; In order to remain prominent and distinguished landmarks at the local and international levels over time for future generations.<\\/p>\",\"plan_description\":\"dddddddddddddddddddddddddddddddddddddddddddddddddd\"}', '197.52.158.36', '2024-02-18 00:21:41', '2024-02-18 00:21:41'),
(16, 'audit:updated', 2, 'App\\Models\\Project#2', 1, '{\"updated_at\":\"2024-02-17 17:24:06\",\"plan_title\":\"ddddddddddddddddddddddd\"}', '197.52.158.36', '2024-02-18 00:24:06', '2024-02-18 00:24:06'),
(17, 'audit:updated', 2, 'App\\Models\\Project#2', 1, '{\"updated_at\":\"2024-02-17 19:43:08\",\"plan_title\":\"Master plan\",\"plan_description\":\"Nile Business City complex is located in the heart of the golden spot the New Administrative capital With a strategic location that is pinpointed in the center of the river and directly on the Mohammed Bin Zayed AxisOne can\\u2019t miss this striking 55-floor business city that is directly situated in the middle of the Downtown district, in the heart of the New Administrative  business community. Only a 20-minute drive from New Cairo, Nile Business city multiple access points through Road 90, Suez and Sokhna roads It is a five-minute drive along the axes of The Grand Mosque, Cathedral, Al Masa hotel and The Presidential Palace.\"}', '196.157.73.131', '2024-02-18 02:43:08', '2024-02-18 02:43:08'),
(18, 'audit:created', 4, 'App\\Models\\RealEstateApplication#4', NULL, '{\"email\":\"cosicyqide@mailinator.com\",\"updated_at\":\"2024-02-18 11:37:42\",\"created_at\":\"2024-02-18 11:37:42\",\"id\":4}', '197.36.240.149', '2024-02-18 18:37:42', '2024-02-18 18:37:42'),
(19, 'audit:created', 1, 'App\\Models\\City#1', 1, '{\"title_ar\":\"ddd\",\"title_en\":\"ddd\",\"country_id\":\"3\",\"updated_at\":\"2024-02-18 12:23:21\",\"created_at\":\"2024-02-18 12:23:21\",\"id\":1,\"image\":null,\"media\":[]}', '197.36.240.149', '2024-02-18 19:23:21', '2024-02-18 19:23:21'),
(20, 'audit:updated', 2, 'App\\Models\\Project#2', 1, '{\"updated_at\":\"2024-02-18 12:23:40\",\"city_id\":\"1\"}', '197.36.240.149', '2024-02-18 19:23:40', '2024-02-18 19:23:40'),
(21, 'audit:updated', 2, 'App\\Models\\Project#2', 1, '{\"updated_at\":\"2024-02-18 12:51:03\",\"second_title\":\"Welcome to Nile Business City\",\"second_description\":\"<p>The tallest skyscraper in the golden point of the New Administrative Capital in the middle of the Green River and the center of the downtown area, with a height of 233 meters and with the widest facade on the northern Bin Zayed Axis, with a width of 200 meters.<\\/p>\"}', '197.36.240.149', '2024-02-18 19:51:03', '2024-02-18 19:51:03'),
(22, 'audit:updated', 1, 'App\\Models\\RealEstateUnit#1', 1, '{\"updated_at\":\"2024-02-19 07:52:09\",\"city_id\":\"1\"}', '197.36.240.149', '2024-02-19 14:52:09', '2024-02-19 14:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `available_for_mortgages`
--

CREATE TABLE `available_for_mortgages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_for_mortgages`
--

INSERT INTO `available_for_mortgages` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'All Financing Options', 1, '2024-02-13 15:21:15', '2024-02-13 15:21:15', NULL),
(2, 'CBE 3% Initiative', 1, '2024-02-13 15:21:22', '2024-02-13 15:21:22', NULL),
(3, 'CBE 8% Initiative', 1, '2024-02-13 15:21:28', '2024-02-13 15:21:28', NULL),
(4, 'Commercial Financing', 1, '2024-02-13 15:21:35', '2024-02-13 15:21:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `available_for_mortgage_real_estate_application`
--

CREATE TABLE `available_for_mortgage_real_estate_application` (
  `real_estate_application_id` bigint(20) UNSIGNED NOT NULL,
  `available_for_mortgage_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_meetings`
--

CREATE TABLE `book_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `meeting_type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_meetings`
--

INSERT INTO `book_meetings` (`id`, `date`, `meeting_type`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `unit_id`, `project_id`) VALUES
(1, '2024-02-14 01:38:33', NULL, 'name', NULL, 'eeee', NULL, '2024-02-15 21:38:59', '2024-02-15 21:38:59', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`, `deleted_at`, `country_id`) VALUES
(1, 'ddd', 'ddd', '2024-02-18 19:23:21', '2024-02-18 19:23:21', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

CREATE TABLE `content_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_category_content_page`
--

CREATE TABLE `content_category_content_page` (
  `content_page_id` bigint(20) UNSIGNED NOT NULL,
  `content_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE `content_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `page_text` longtext DEFAULT NULL,
  `excerpt` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_page_content_tag`
--

CREATE TABLE `content_page_content_tag` (
  `content_page_id` bigint(20) UNSIGNED NOT NULL,
  `content_tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_tags`
--

CREATE TABLE `content_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_code`, `name_en`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Afghanistan', 'af', NULL, NULL, NULL, NULL),
(2, 'Albania', 'al', NULL, NULL, NULL, NULL),
(3, 'Algeria', 'dz', NULL, NULL, NULL, NULL),
(4, 'American Samoa', 'as', NULL, NULL, NULL, NULL),
(5, 'Andorra', 'ad', NULL, NULL, NULL, NULL),
(6, 'Angola', 'ao', NULL, NULL, NULL, NULL),
(7, 'Anguilla', 'ai', NULL, NULL, NULL, NULL),
(8, 'Antarctica', 'aq', NULL, NULL, NULL, NULL),
(9, 'Antigua and Barbuda', 'ag', NULL, NULL, NULL, NULL),
(10, 'Argentina', 'ar', NULL, NULL, NULL, NULL),
(11, 'Armenia', 'am', NULL, NULL, NULL, NULL),
(12, 'Aruba', 'aw', NULL, NULL, NULL, NULL),
(13, 'Australia', 'au', NULL, NULL, NULL, NULL),
(14, 'Austria', 'at', NULL, NULL, NULL, NULL),
(15, 'Azerbaijan', 'az', NULL, NULL, NULL, NULL),
(16, 'Bahamas', 'bs', NULL, NULL, NULL, NULL),
(17, 'Bahrain', 'bh', NULL, NULL, NULL, NULL),
(18, 'Bangladesh', 'bd', NULL, NULL, NULL, NULL),
(19, 'Barbados', 'bb', NULL, NULL, NULL, NULL),
(20, 'Belarus', 'by', NULL, NULL, NULL, NULL),
(21, 'Belgium', 'be', NULL, NULL, NULL, NULL),
(22, 'Belize', 'bz', NULL, NULL, NULL, NULL),
(23, 'Benin', 'bj', NULL, NULL, NULL, NULL),
(24, 'Bermuda', 'bm', NULL, NULL, NULL, NULL),
(25, 'Bhutan', 'bt', NULL, NULL, NULL, NULL),
(26, 'Bolivia', 'bo', NULL, NULL, NULL, NULL),
(27, 'Bosnia and Herzegovina', 'ba', NULL, NULL, NULL, NULL),
(28, 'Botswana', 'bw', NULL, NULL, NULL, NULL),
(29, 'Brazil', 'br', NULL, NULL, NULL, NULL),
(30, 'British Indian Ocean Territory', 'io', NULL, NULL, NULL, NULL),
(31, 'British Virgin Islands', 'vg', NULL, NULL, NULL, NULL),
(32, 'Brunei', 'bn', NULL, NULL, NULL, NULL),
(33, 'Bulgaria', 'bg', NULL, NULL, NULL, NULL),
(34, 'Burkina Faso', 'bf', NULL, NULL, NULL, NULL),
(35, 'Burundi', 'bi', NULL, NULL, NULL, NULL),
(36, 'Cambodia', 'kh', NULL, NULL, NULL, NULL),
(37, 'Cameroon', 'cm', NULL, NULL, NULL, NULL),
(38, 'Canada', 'ca', NULL, NULL, NULL, NULL),
(39, 'Cape Verde', 'cv', NULL, NULL, NULL, NULL),
(40, 'Cayman Islands', 'ky', NULL, NULL, NULL, NULL),
(41, 'Central African Republic', 'cf', NULL, NULL, NULL, NULL),
(42, 'Chad', 'td', NULL, NULL, NULL, NULL),
(43, 'Chile', 'cl', NULL, NULL, NULL, NULL),
(44, 'China', 'cn', NULL, NULL, NULL, NULL),
(45, 'Christmas Island', 'cx', NULL, NULL, NULL, NULL),
(46, 'Cocos Islands', 'cc', NULL, NULL, NULL, NULL),
(47, 'Colombia', 'co', NULL, NULL, NULL, NULL),
(48, 'Comoros', 'km', NULL, NULL, NULL, NULL),
(49, 'Cook Islands', 'ck', NULL, NULL, NULL, NULL),
(50, 'Costa Rica', 'cr', NULL, NULL, NULL, NULL),
(51, 'Croatia', 'hr', NULL, NULL, NULL, NULL),
(52, 'Cuba', 'cu', NULL, NULL, NULL, NULL),
(53, 'Curacao', 'cw', NULL, NULL, NULL, NULL),
(54, 'Cyprus', 'cy', NULL, NULL, NULL, NULL),
(55, 'Czech Republic', 'cz', NULL, NULL, NULL, NULL),
(56, 'Democratic Republic of the Congo', 'cd', NULL, NULL, NULL, NULL),
(57, 'Denmark', 'dk', NULL, NULL, NULL, NULL),
(58, 'Djibouti', 'dj', NULL, NULL, NULL, NULL),
(59, 'Dominica', 'dm', NULL, NULL, NULL, NULL),
(60, 'Dominican Republic', 'do', NULL, NULL, NULL, NULL),
(61, 'East Timor', 'tl', NULL, NULL, NULL, NULL),
(62, 'Ecuador', 'ec', NULL, NULL, NULL, NULL),
(63, 'Egypt', 'eg', NULL, NULL, NULL, NULL),
(64, 'El Salvador', 'sv', NULL, NULL, NULL, NULL),
(65, 'Equatorial Guinea', 'gq', NULL, NULL, NULL, NULL),
(66, 'Eritrea', 'er', NULL, NULL, NULL, NULL),
(67, 'Estonia', 'ee', NULL, NULL, NULL, NULL),
(68, 'Ethiopia', 'et', NULL, NULL, NULL, NULL),
(69, 'Falkland Islands', 'fk', NULL, NULL, NULL, NULL),
(70, 'Faroe Islands', 'fo', NULL, NULL, NULL, NULL),
(71, 'Fiji', 'fj', NULL, NULL, NULL, NULL),
(72, 'Finland', 'fi', NULL, NULL, NULL, NULL),
(73, 'France', 'fr', NULL, NULL, NULL, NULL),
(74, 'French Polynesia', 'pf', NULL, NULL, NULL, NULL),
(75, 'Gabon', 'ga', NULL, NULL, NULL, NULL),
(76, 'Gambia', 'gm', NULL, NULL, NULL, NULL),
(77, 'Georgia', 'ge', NULL, NULL, NULL, NULL),
(78, 'Germany', 'de', NULL, NULL, NULL, NULL),
(79, 'Ghana', 'gh', NULL, NULL, NULL, NULL),
(80, 'Gibraltar', 'gi', NULL, NULL, NULL, NULL),
(81, 'Greece', 'gr', NULL, NULL, NULL, NULL),
(82, 'Greenland', 'gl', NULL, NULL, NULL, NULL),
(83, 'Grenada', 'gd', NULL, NULL, NULL, NULL),
(84, 'Guam', 'gu', NULL, NULL, NULL, NULL),
(85, 'Guatemala', 'gt', NULL, NULL, NULL, NULL),
(86, 'Guernsey', 'gg', NULL, NULL, NULL, NULL),
(87, 'Guinea', 'gn', NULL, NULL, NULL, NULL),
(88, 'Guinea-Bissau', 'gw', NULL, NULL, NULL, NULL),
(89, 'Guyana', 'gy', NULL, NULL, NULL, NULL),
(90, 'Haiti', 'ht', NULL, NULL, NULL, NULL),
(91, 'Honduras', 'hn', NULL, NULL, NULL, NULL),
(92, 'Hong Kong', 'hk', NULL, NULL, NULL, NULL),
(93, 'Hungary', 'hu', NULL, NULL, NULL, NULL),
(94, 'Iceland', 'is', NULL, NULL, NULL, NULL),
(95, 'India', 'in', NULL, NULL, NULL, NULL),
(96, 'Indonesia', 'id', NULL, NULL, NULL, NULL),
(97, 'Iran', 'ir', NULL, NULL, NULL, NULL),
(98, 'Iraq', 'iq', NULL, NULL, NULL, NULL),
(99, 'Ireland', 'ie', NULL, NULL, NULL, NULL),
(100, 'Isle of Man', 'im', NULL, NULL, NULL, NULL),
(101, 'Israel', 'il', NULL, NULL, NULL, NULL),
(102, 'Italy', 'it', NULL, NULL, NULL, NULL),
(103, 'Ivory Coast', 'ci', NULL, NULL, NULL, NULL),
(104, 'Jamaica', 'jm', NULL, NULL, NULL, NULL),
(105, 'Japan', 'jp', NULL, NULL, NULL, NULL),
(106, 'Jersey', 'je', NULL, NULL, NULL, NULL),
(107, 'Jordan', 'jo', NULL, NULL, NULL, NULL),
(108, 'Kazakhstan', 'kz', NULL, NULL, NULL, NULL),
(109, 'Kenya', 'ke', NULL, NULL, NULL, NULL),
(110, 'Kiribati', 'ki', NULL, NULL, NULL, NULL),
(111, 'Kosovo', 'xk', NULL, NULL, NULL, NULL),
(112, 'Kuwait', 'kw', NULL, NULL, NULL, NULL),
(113, 'Kyrgyzstan', 'kg', NULL, NULL, NULL, NULL),
(114, 'Laos', 'la', NULL, NULL, NULL, NULL),
(115, 'Latvia', 'lv', NULL, NULL, NULL, NULL),
(116, 'Lebanon', 'lb', NULL, NULL, NULL, NULL),
(117, 'Lesotho', 'ls', NULL, NULL, NULL, NULL),
(118, 'Liberia', 'lr', NULL, NULL, NULL, NULL),
(119, 'Libya', 'ly', NULL, NULL, NULL, NULL),
(120, 'Liechtenstein', 'li', NULL, NULL, NULL, NULL),
(121, 'Lithuania', 'lt', NULL, NULL, NULL, NULL),
(122, 'Luxembourg', 'lu', NULL, NULL, NULL, NULL),
(123, 'Macau', 'mo', NULL, NULL, NULL, NULL),
(124, 'Macedonia', 'mk', NULL, NULL, NULL, NULL),
(125, 'Madagascar', 'mg', NULL, NULL, NULL, NULL),
(126, 'Malawi', 'mw', NULL, NULL, NULL, NULL),
(127, 'Malaysia', 'my', NULL, NULL, NULL, NULL),
(128, 'Maldives', 'mv', NULL, NULL, NULL, NULL),
(129, 'Mali', 'ml', NULL, NULL, NULL, NULL),
(130, 'Malta', 'mt', NULL, NULL, NULL, NULL),
(131, 'Marshall Islands', 'mh', NULL, NULL, NULL, NULL),
(132, 'Mauritania', 'mr', NULL, NULL, NULL, NULL),
(133, 'Mauritius', 'mu', NULL, NULL, NULL, NULL),
(134, 'Mayotte', 'yt', NULL, NULL, NULL, NULL),
(135, 'Mexico', 'mx', NULL, NULL, NULL, NULL),
(136, 'Micronesia', 'fm', NULL, NULL, NULL, NULL),
(137, 'Moldova', 'md', NULL, NULL, NULL, NULL),
(138, 'Monaco', 'mc', NULL, NULL, NULL, NULL),
(139, 'Mongolia', 'mn', NULL, NULL, NULL, NULL),
(140, 'Montenegro', 'me', NULL, NULL, NULL, NULL),
(141, 'Montserrat', 'ms', NULL, NULL, NULL, NULL),
(142, 'Morocco', 'ma', NULL, NULL, NULL, NULL),
(143, 'Mozambique', 'mz', NULL, NULL, NULL, NULL),
(144, 'Myanmar', 'mm', NULL, NULL, NULL, NULL),
(145, 'Namibia', 'na', NULL, NULL, NULL, NULL),
(146, 'Nauru', 'nr', NULL, NULL, NULL, NULL),
(147, 'Nepal', 'np', NULL, NULL, NULL, NULL),
(148, 'Netherlands', 'nl', NULL, NULL, NULL, NULL),
(149, 'Netherlands Antilles', 'an', NULL, NULL, NULL, NULL),
(150, 'New Caledonia', 'nc', NULL, NULL, NULL, NULL),
(151, 'New Zealand', 'nz', NULL, NULL, NULL, NULL),
(152, 'Nicaragua', 'ni', NULL, NULL, NULL, NULL),
(153, 'Niger', 'ne', NULL, NULL, NULL, NULL),
(154, 'Nigeria', 'ng', NULL, NULL, NULL, NULL),
(155, 'Niue', 'nu', NULL, NULL, NULL, NULL),
(156, 'North Korea', 'kp', NULL, NULL, NULL, NULL),
(157, 'Northern Mariana Islands', 'mp', NULL, NULL, NULL, NULL),
(158, 'Norway', 'no', NULL, NULL, NULL, NULL),
(159, 'Oman', 'om', NULL, NULL, NULL, NULL),
(160, 'Pakistan', 'pk', NULL, NULL, NULL, NULL),
(161, 'Palau', 'pw', NULL, NULL, NULL, NULL),
(162, 'Palestine', 'ps', NULL, NULL, NULL, NULL),
(163, 'Panama', 'pa', NULL, NULL, NULL, NULL),
(164, 'Papua New Guinea', 'pg', NULL, NULL, NULL, NULL),
(165, 'Paraguay', 'py', NULL, NULL, NULL, NULL),
(166, 'Peru', 'pe', NULL, NULL, NULL, NULL),
(167, 'Philippines', 'ph', NULL, NULL, NULL, NULL),
(168, 'Pitcairn', 'pn', NULL, NULL, NULL, NULL),
(169, 'Poland', 'pl', NULL, NULL, NULL, NULL),
(170, 'Portugal', 'pt', NULL, NULL, NULL, NULL),
(171, 'Puerto Rico', 'pr', NULL, NULL, NULL, NULL),
(172, 'Qatar', 'qa', NULL, NULL, NULL, NULL),
(173, 'Republic of the Congo', 'cg', NULL, NULL, NULL, NULL),
(174, 'Reunion', 're', NULL, NULL, NULL, NULL),
(175, 'Romania', 'ro', NULL, NULL, NULL, NULL),
(176, 'Russia', 'ru', NULL, NULL, NULL, NULL),
(177, 'Rwanda', 'rw', NULL, NULL, NULL, NULL),
(178, 'Saint Barthelemy', 'bl', NULL, NULL, NULL, NULL),
(179, 'Saint Helena', 'sh', NULL, NULL, NULL, NULL),
(180, 'Saint Kitts and Nevis', 'kn', NULL, NULL, NULL, NULL),
(181, 'Saint Lucia', 'lc', NULL, NULL, NULL, NULL),
(182, 'Saint Martin', 'mf', NULL, NULL, NULL, NULL),
(183, 'Saint Pierre and Miquelon', 'pm', NULL, NULL, NULL, NULL),
(184, 'Saint Vincent and the Grenadines', 'vc', NULL, NULL, NULL, NULL),
(185, 'Samoa', 'ws', NULL, NULL, NULL, NULL),
(186, 'San Marino', 'sm', NULL, NULL, NULL, NULL),
(187, 'Sao Tome and Principe', 'st', NULL, NULL, NULL, NULL),
(188, 'Saudi Arabia', 'sa', NULL, NULL, NULL, NULL),
(189, 'Senegal', 'sn', NULL, NULL, NULL, NULL),
(190, 'Serbia', 'rs', NULL, NULL, NULL, NULL),
(191, 'Seychelles', 'sc', NULL, NULL, NULL, NULL),
(192, 'Sierra Leone', 'sl', NULL, NULL, NULL, NULL),
(193, 'Singapore', 'sg', NULL, NULL, NULL, NULL),
(194, 'Sint Maarten', 'sx', NULL, NULL, NULL, NULL),
(195, 'Slovakia', 'sk', NULL, NULL, NULL, NULL),
(196, 'Slovenia', 'si', NULL, NULL, NULL, NULL),
(197, 'Solomon Islands', 'sb', NULL, NULL, NULL, NULL),
(198, 'Somalia', 'so', NULL, NULL, NULL, NULL),
(199, 'South Africa', 'za', NULL, NULL, NULL, NULL),
(200, 'South Korea', 'kr', NULL, NULL, NULL, NULL),
(201, 'South Sudan', 'ss', NULL, NULL, NULL, NULL),
(202, 'Spain', 'es', NULL, NULL, NULL, NULL),
(203, 'Sri Lanka', 'lk', NULL, NULL, NULL, NULL),
(204, 'Sudan', 'sd', NULL, NULL, NULL, NULL),
(205, 'Suriname', 'sr', NULL, NULL, NULL, NULL),
(206, 'Svalbard and Jan Mayen', 'sj', NULL, NULL, NULL, NULL),
(207, 'Swaziland', 'sz', NULL, NULL, NULL, NULL),
(208, 'Sweden', 'se', NULL, NULL, NULL, NULL),
(209, 'Switzerland', 'ch', NULL, NULL, NULL, NULL),
(210, 'Syria', 'sy', NULL, NULL, NULL, NULL),
(211, 'Taiwan', 'tw', NULL, NULL, NULL, NULL),
(212, 'Tajikistan', 'tj', NULL, NULL, NULL, NULL),
(213, 'Tanzania', 'tz', NULL, NULL, NULL, NULL),
(214, 'Thailand', 'th', NULL, NULL, NULL, NULL),
(215, 'Togo', 'tg', NULL, NULL, NULL, NULL),
(216, 'Tokelau', 'tk', NULL, NULL, NULL, NULL),
(217, 'Tonga', 'to', NULL, NULL, NULL, NULL),
(218, 'Trinidad and Tobago', 'tt', NULL, NULL, NULL, NULL),
(219, 'Tunisia', 'tn', NULL, NULL, NULL, NULL),
(220, 'Turkey', 'tr', NULL, NULL, NULL, NULL),
(221, 'Turkmenistan', 'tm', NULL, NULL, NULL, NULL),
(222, 'Turks and Caicos Islands', 'tc', NULL, NULL, NULL, NULL),
(223, 'Tuvalu', 'tv', NULL, NULL, NULL, NULL),
(224, 'U.S. Virgin Islands', 'vi', NULL, NULL, NULL, NULL),
(225, 'Uganda', 'ug', NULL, NULL, NULL, NULL),
(226, 'Ukraine', 'ua', NULL, NULL, NULL, NULL),
(227, 'United Arab Emirates', 'ae', NULL, NULL, NULL, NULL),
(228, 'United Kingdom', 'gb', NULL, NULL, NULL, NULL),
(229, 'United States', 'us', NULL, NULL, NULL, NULL),
(230, 'Uruguay', 'uy', NULL, NULL, NULL, NULL),
(231, 'Uzbekistan', 'uz', NULL, NULL, NULL, NULL),
(232, 'Vanuatu', 'vu', NULL, NULL, NULL, NULL),
(233, 'Vatican', 'va', NULL, NULL, NULL, NULL),
(234, 'Venezuela', 've', NULL, NULL, NULL, NULL),
(235, 'Vietnam', 'vn', NULL, NULL, NULL, NULL),
(236, 'Wallis and Futuna', 'wf', NULL, NULL, NULL, NULL),
(237, 'Western Sahara', 'eh', NULL, NULL, NULL, NULL),
(238, 'Yemen', 'ye', NULL, NULL, NULL, NULL),
(239, 'Zambia', 'zm', NULL, NULL, NULL, NULL),
(240, 'Zimbabwe', 'zw', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventjoiningusers`
--

CREATE TABLE `eventjoiningusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `addresse` varchar(255) DEFAULT NULL,
  `location_link` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `published` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `show_first` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventtags`
--

CREATE TABLE `eventtags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventuserstatuses`
--

CREATE TABLE `eventuserstatuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_discussions`
--

CREATE TABLE `event_discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discussion` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `replay_discussion_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_eventtag`
--

CREATE TABLE `event_eventtag` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `eventtag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finish_types`
--

CREATE TABLE `finish_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finish_types`
--

INSERT INTO `finish_types` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Finished', 1, '2024-02-13 15:15:11', '2024-02-13 15:15:11', NULL),
(2, 'Semi finished', 1, '2024-02-13 15:15:21', '2024-02-13 15:15:21', NULL),
(3, 'Core & Shell', 1, '2024-02-13 15:15:37', '2024-02-13 15:15:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finish_type_real_estate_application`
--

CREATE TABLE `finish_type_real_estate_application` (
  `real_estate_application_id` bigint(20) UNSIGNED NOT NULL,
  `finish_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\RealEstateUnit', 1, '83273a5f-7970-468f-aabd-a789e819b767', 'image', '65cc9ad2c0880_itemimage4', '65cc9ad2c0880_itemimage4.png', 'image/png', 'public', 'public', 3780931, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2024-02-14 15:53:12', '2024-02-14 15:53:13'),
(2, 'App\\Models\\RealEstateUnit', 1, '8e5d5173-238c-496f-a197-524d6fb62747', 'images', '65cc9ade0df9f_itemdetailsthumbs1', '65cc9ade0df9f_itemdetailsthumbs1.png', 'image/png', 'public', 'public', 1371054, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2024-02-14 15:53:13', '2024-02-14 15:53:14'),
(3, 'App\\Models\\RealEstateUnit', 1, 'f9153bfa-6f0c-40ca-9fd3-252c543683b9', 'images', '65cc9ae9a9f06_itempreview', '65cc9ae9a9f06_itempreview.png', 'image/png', 'public', 'public', 1371054, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 3, '2024-02-14 15:53:14', '2024-02-14 15:53:15'),
(5, 'App\\Models\\User', 2, 'e6806b85-a67e-4334-8ad2-c5b5aca15054', 'image', '65cc9e5b1c73b_358478215_261084860143918_4185713919728228173_n', '65cc9e5b1c73b_358478215_261084860143918_4185713919728228173_n.jpg', 'image/jpeg', 'public', 'public', 62145, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2024-02-14 16:05:02', '2024-02-14 16:05:02'),
(6, 'App\\Models\\Project', 1, '66fc3382-d49f-42d7-8e06-d194e302193d', 'image', '65cea15f87b95_WhatsApp Image 2023-12-12 at 2.36.39 PM', '65cea15f87b95_WhatsApp-Image-2023-12-12-at-2.36.39-PM.jpeg', 'image/jpeg', 'public', 'public', 115003, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 1, '2024-02-16 04:42:59', '2024-02-16 04:42:59'),
(7, 'App\\Models\\Project', 1, '596ec980-130d-46c3-98cf-9c3ad827f10d', 'images', '65cea168cd0d7_WhatsApp Image 2023-12-12 at 2.36.38 PM (1)', '65cea168cd0d7_WhatsApp-Image-2023-12-12-at-2.36.38-PM-(1).jpeg', 'image/jpeg', 'public', 'public', 102263, '[]', '[]', '{\"thumb\": true, \"preview\": true}', '[]', 2, '2024-02-16 04:42:59', '2024-02-16 04:43:00'),
(8, 'App\\Models\\Project', 1, 'a1eb1053-bcc8-4e16-b6d3-9242783aaf2f', 'attachments', '65cea17ba1fec_TLD Company Profile - Adjusted 18-12 small', '65cea17ba1fec_TLD-Company-Profile---Adjusted-18-12-small.pdf', 'application/pdf', 'public', 'public', 10241753, '[]', '[]', '[]', '[]', 3, '2024-02-16 04:43:00', '2024-02-16 04:43:00'),
(9, 'App\\Models\\Project', 2, 'bcf34b46-4980-4a11-9d3e-3a0e4c636642', 'image', '65d06bf6c13fc_sddefault', '65d06bf6c13fc_sddefault.jpg', 'image/jpeg', 'public', 'public', 10624, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 1, '2024-02-17 15:20:53', '2024-02-17 15:20:53'),
(10, 'App\\Models\\Project', 2, '6651ddc6-59ab-4bf3-a5f2-a5924403f644', 'images', '65d06c250e46c_VIDEOS-Google-Drive_000153.299-1024x576', '65d06c250e46c_VIDEOS-Google-Drive_000153.299-1024x576.jpg', 'image/jpeg', 'public', 'public', 29354, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 2, '2024-02-17 15:20:53', '2024-02-17 15:20:53'),
(21, 'App\\Models\\Project', 2, '10eabc06-438e-459c-9792-f83799ccc331', 'attachments', '65d0eb96537d5_TLD Presentation Template', '65d0eb96537d5_TLD-Presentation-Template.pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'public', 'public', 155339, '[]', '[]', '[]', '[]', 3, '2024-02-18 00:24:06', '2024-02-18 00:24:06'),
(22, 'App\\Models\\Project', 2, '25d92bb9-26a9-48a8-8282-65324165f677', 'plan_image', '65d0eba4987e2_WhatsApp Image 2023-12-12 at 2.36.38 PM', '65d0eba4987e2_WhatsApp-Image-2023-12-12-at-2.36.38-PM.jpeg', 'image/jpeg', 'public', 'public', 117489, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 4, '2024-02-18 00:24:06', '2024-02-18 00:24:06'),
(23, 'App\\Models\\Project', 2, 'ab3ca847-5f42-47c1-841e-4d65f58b42a5', 'construction_updates_images', '65d0eba8a786f_WhatsApp Image 2023-12-12 at 2.36.41 PM (1)', '65d0eba8a786f_WhatsApp-Image-2023-12-12-at-2.36.41-PM-(1).jpeg', 'image/jpeg', 'public', 'public', 178143, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 5, '2024-02-18 00:24:06', '2024-02-18 00:24:07'),
(24, 'App\\Models\\Project', 2, '1ffc5b06-14e4-4061-bc4c-15a27817ae2c', 'construction_updates_images', '65d0eba901984_WhatsApp Image 2023-12-12 at 2.36.41 PM', '65d0eba901984_WhatsApp-Image-2023-12-12-at-2.36.41-PM.jpeg', 'image/jpeg', 'public', 'public', 162516, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 6, '2024-02-18 00:24:07', '2024-02-18 00:24:07'),
(25, 'App\\Models\\Project', 2, '1cc7f37e-1014-41f4-825d-3ab7d76f40d7', 'construction_updates_images', '65d0eba966e8d_WhatsApp Image 2023-12-12 at 2.36.40 PM (1)', '65d0eba966e8d_WhatsApp-Image-2023-12-12-at-2.36.40-PM-(1).jpeg', 'image/jpeg', 'public', 'public', 125100, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 7, '2024-02-18 00:24:07', '2024-02-18 00:24:07'),
(26, 'App\\Models\\Project', 2, 'cf9d00f3-64f0-4ec4-95fe-bc4ca932ca36', 'construction_updates_images', '65d0eba995cab_WhatsApp Image 2023-12-12 at 2.36.40 PM', '65d0eba995cab_WhatsApp-Image-2023-12-12-at-2.36.40-PM.jpeg', 'image/jpeg', 'public', 'public', 124488, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 8, '2024-02-18 00:24:07', '2024-02-18 00:24:07'),
(27, 'App\\Models\\Project', 2, '09b74bc6-9298-4ad6-8411-b30dfb1cc0f2', 'construction_updates_images', '65d0ebaa38e9d_WhatsApp Image 2023-12-12 at 2.36.39 PM', '65d0ebaa38e9d_WhatsApp-Image-2023-12-12-at-2.36.39-PM.jpeg', 'image/jpeg', 'public', 'public', 115003, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 9, '2024-02-18 00:24:07', '2024-02-18 00:24:07'),
(28, 'App\\Models\\Project', 2, '1e098471-5117-481b-a9d3-877dde323062', 'construction_updates_images', '65d0ebaa4377e_WhatsApp Image 2023-12-12 at 2.36.39 PM (1)', '65d0ebaa4377e_WhatsApp-Image-2023-12-12-at-2.36.39-PM-(1).jpeg', 'image/jpeg', 'public', 'public', 159000, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 10, '2024-02-18 00:24:07', '2024-02-18 00:24:07'),
(29, 'App\\Models\\Project', 2, 'b4b770e5-9763-4d8e-aa6c-5e8bee5648ec', 'construction_updates_images', '65d0ebaab25bf_WhatsApp Image 2023-12-12 at 2.36.38 PM (1)', '65d0ebaab25bf_WhatsApp-Image-2023-12-12-at-2.36.38-PM-(1).jpeg', 'image/jpeg', 'public', 'public', 102263, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 11, '2024-02-18 00:24:07', '2024-02-18 00:24:08'),
(30, 'App\\Models\\Project', 2, 'b9a480d9-4d0c-483f-bb72-b8169ee601f3', 'construction_updates_images', '65d0ebaae774b_WhatsApp Image 2023-12-12 at 2.36.38 PM', '65d0ebaae774b_WhatsApp-Image-2023-12-12-at-2.36.38-PM.jpeg', 'image/jpeg', 'public', 'public', 117489, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 12, '2024-02-18 00:24:08', '2024-02-18 00:24:08'),
(31, 'App\\Models\\Project', 2, '5b8b1114-1cb2-4ae6-92e4-e30ca90b60a1', 'construction_updates_images', '65d0ebab8c760_WhatsApp Image 2023-12-12 at 2.36.37 PM', '65d0ebab8c760_WhatsApp-Image-2023-12-12-at-2.36.37-PM.jpeg', 'image/jpeg', 'public', 'public', 156783, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 13, '2024-02-18 00:24:08', '2024-02-18 00:24:08'),
(32, 'App\\Models\\Project', 2, 'ebbc9bb4-bc9d-40e1-b8ff-9830de23cac5', 'images', '65d10cafcef73_sddefault', '65d10cafcef73_sddefault.jpg', 'image/jpeg', 'public', 'public', 10624, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 14, '2024-02-18 02:46:50', '2024-02-18 02:46:51'),
(33, 'App\\Models\\Project', 2, '3b62bec3-458b-4b29-b382-9c652e99c948', 'images', '65d10d252dde7_itemimage3', '65d10d252dde7_itemimage3.png', 'image/png', 'public', 'public', 153170, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 15, '2024-02-18 02:46:51', '2024-02-18 02:46:51'),
(35, 'App\\Models\\Project', 2, '1e7bf159-ee7a-4e15-8093-e8758a61e9c5', 'banners', '65d1f777e08c5_65d06c250e46c_VIDEOS-Google-Drive_000153.299-1024x576', '65d1f777e08c5_65d06c250e46c_VIDEOS-Google-Drive_000153.299-1024x576.jpg', 'image/jpeg', 'public', 'public', 29354, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 17, '2024-02-18 19:26:34', '2024-02-18 19:26:34'),
(36, 'App\\Models\\Project', 2, 'ed76789c-332d-446b-b478-63a7a343b750', 'second_image', '65d1fd3444d2a_itemimage3', '65d1fd3444d2a_itemimage3.png', 'image/png', 'public', 'public', 153170, '[]', '[]', '{\"thumb\":true,\"preview\":true}', '[]', 18, '2024-02-18 19:51:04', '2024-02-18 19:51:04'),
(37, 'App\\Models\\Project', 2, '98ee2b22-0df1-437b-b074-d6a11b031bc1', 'brochure', '65d200409404c_dashboard-isuues', '65d200409404c_dashboard-isuues.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 14443, '[]', '[]', '[]', '[]', 19, '2024-02-18 20:04:07', '2024-02-18 20:04:07');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_02_15_000001_create_audit_logs_table', 1),
(4, '2024_02_15_000002_create_media_table', 1),
(5, '2024_02_15_000003_create_permissions_table', 1),
(6, '2024_02_15_000004_create_roles_table', 1),
(7, '2024_02_15_000005_create_users_table', 1),
(8, '2024_02_15_000006_create_faq_categories_table', 1),
(9, '2024_02_15_000007_create_faq_questions_table', 1),
(10, '2024_02_15_000008_create_settings_table', 1),
(11, '2024_02_15_000009_create_countries_table', 1),
(12, '2024_02_15_000010_create_cities_table', 1),
(13, '2024_02_15_000011_create_regions_table', 1),
(14, '2024_02_15_000012_create_testimonials_table', 1),
(15, '2024_02_15_000013_create_newsletters_table', 1),
(16, '2024_02_15_000014_create_pages_table', 1),
(17, '2024_02_15_000015_create_contactus_table', 1),
(18, '2024_02_15_000016_create_user_alerts_table', 1),
(19, '2024_02_15_000017_create_content_categories_table', 1),
(20, '2024_02_15_000018_create_content_tags_table', 1),
(21, '2024_02_15_000019_create_content_pages_table', 1),
(22, '2024_02_15_000020_create_views_table', 1),
(23, '2024_02_15_000021_create_finish_types_table', 1),
(24, '2024_02_15_000022_create_sliders_table', 1),
(25, '2024_02_15_000023_create_services_table', 1),
(26, '2024_02_15_000024_create_events_table', 1),
(27, '2024_02_15_000025_create_eventtags_table', 1),
(28, '2024_02_15_000026_create_event_categories_table', 1),
(29, '2024_02_15_000027_create_eventuserstatuses_table', 1),
(30, '2024_02_15_000028_create_eventjoiningusers_table', 1),
(31, '2024_02_15_000029_create_event_discussions_table', 1),
(32, '2024_02_15_000030_create_projects_table', 1),
(33, '2024_02_15_000031_create_real_estate_units_table', 1),
(34, '2024_02_15_000032_create_real_estate_applications_table', 1),
(35, '2024_02_15_000033_create_applications_request_sections_table', 1),
(36, '2024_02_15_000034_create_real_estate_types_table', 1),
(37, '2024_02_15_000035_create_payment_methods_table', 1),
(38, '2024_02_15_000036_create_available_for_mortgages_table', 1),
(39, '2024_02_15_000037_create_realstate_purposes_table', 1),
(40, '2024_02_15_000038_create_amenities_table', 1),
(41, '2024_02_15_000039_create_nears_table', 1),
(42, '2024_02_15_000040_create_book_meetings_table', 1),
(43, '2024_02_15_000041_create_likes_table', 1),
(44, '2024_02_15_000042_create_unit_comments_table', 1),
(45, '2024_02_15_000043_create_project_types_table', 1),
(46, '2024_02_15_000044_create_permission_role_pivot_table', 1),
(47, '2024_02_15_000045_create_role_user_pivot_table', 1),
(48, '2024_02_15_000046_create_user_user_alert_pivot_table', 1),
(49, '2024_02_15_000047_create_content_category_content_page_pivot_table', 1),
(50, '2024_02_15_000048_create_content_page_content_tag_pivot_table', 1),
(51, '2024_02_15_000049_create_event_eventtag_pivot_table', 1),
(52, '2024_02_15_000050_create_near_project_pivot_table', 1),
(53, '2024_02_15_000051_create_amenity_real_estate_unit_pivot_table', 1),
(54, '2024_02_15_000052_create_near_real_estate_unit_pivot_table', 1),
(55, '2024_02_15_000053_create_real_estate_unit_realstate_purpose_pivot_table', 1),
(56, '2024_02_15_000054_create_payment_method_real_estate_unit_pivot_table', 1),
(57, '2024_02_15_000055_create_real_estate_type_real_estate_unit_pivot_table', 1),
(58, '2024_02_15_000056_create_available_for_mortgage_real_estate_application_pivot_table', 1),
(59, '2024_02_15_000057_create_payment_method_real_estate_application_pivot_table', 1),
(60, '2024_02_15_000058_create_real_estate_application_real_estate_type_pivot_table', 1),
(61, '2024_02_15_000059_create_real_estate_application_view_pivot_table', 1),
(62, '2024_02_15_000060_create_finish_type_real_estate_application_pivot_table', 1),
(63, '2024_02_15_000061_add_relationship_fields_to_faq_questions_table', 1),
(64, '2024_02_15_000062_add_relationship_fields_to_cities_table', 1),
(65, '2024_02_15_000063_add_relationship_fields_to_regions_table', 1),
(66, '2024_02_15_000064_add_relationship_fields_to_events_table', 1),
(67, '2024_02_15_000065_add_relationship_fields_to_eventjoiningusers_table', 1),
(68, '2024_02_15_000066_add_relationship_fields_to_event_discussions_table', 1),
(69, '2024_02_15_000067_add_relationship_fields_to_projects_table', 1),
(70, '2024_02_15_000068_add_relationship_fields_to_real_estate_units_table', 1),
(71, '2024_02_15_000069_add_relationship_fields_to_real_estate_applications_table', 1),
(72, '2024_02_15_000070_add_relationship_fields_to_book_meetings_table', 1),
(73, '2024_02_15_000071_add_relationship_fields_to_likes_table', 1),
(74, '2024_02_15_000072_add_relationship_fields_to_unit_comments_table', 1),
(75, '2024_02_15_000073_add_verification_fields', 1),
(76, '2024_02_15_000074_add_approval_fields', 1),
(77, '2024_02_15_000075_create_qa_topics_table', 1),
(78, '2024_02_15_000076_create_qa_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nears`
--

CREATE TABLE `nears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nears`
--

INSERT INTO `nears` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HOSPITALS', 1, '2024-02-14 16:07:00', '2024-02-14 16:07:00', NULL),
(2, 'SCHOOLS', 1, '2024-02-14 16:07:13', '2024-02-14 16:07:13', NULL),
(3, 'RESTAURANTS', 1, '2024-02-14 16:07:25', '2024-02-14 16:07:25', NULL),
(4, 'PARKS', 1, '2024-02-14 16:07:35', '2024-02-14 16:07:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `near_project`
--

CREATE TABLE `near_project` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `near_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `near_project`
--

INSERT INTO `near_project` (`project_id`, `near_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `near_real_estate_unit`
--

CREATE TABLE `near_real_estate_unit` (
  `real_estate_unit_id` bigint(20) UNSIGNED NOT NULL,
  `near_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `near_real_estate_unit`
--

INSERT INTO `near_real_estate_unit` (`real_estate_unit_id`, `near_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description_ar` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', 1, '2024-02-14 12:10:40', '2024-02-14 12:10:40', NULL),
(2, 'Online', 1, '2024-02-14 12:10:48', '2024-02-14 12:10:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_real_estate_application`
--

CREATE TABLE `payment_method_real_estate_application` (
  `real_estate_application_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_real_estate_unit`
--

CREATE TABLE `payment_method_real_estate_unit` (
  `real_estate_unit_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method_real_estate_unit`
--

INSERT INTO `payment_method_real_estate_unit` (`real_estate_unit_id`, `payment_method_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'faq_management_access', NULL, NULL, NULL),
(20, 'faq_category_create', NULL, NULL, NULL),
(21, 'faq_category_edit', NULL, NULL, NULL),
(22, 'faq_category_show', NULL, NULL, NULL),
(23, 'faq_category_delete', NULL, NULL, NULL),
(24, 'faq_category_access', NULL, NULL, NULL),
(25, 'faq_question_create', NULL, NULL, NULL),
(26, 'faq_question_edit', NULL, NULL, NULL),
(27, 'faq_question_show', NULL, NULL, NULL),
(28, 'faq_question_delete', NULL, NULL, NULL),
(29, 'faq_question_access', NULL, NULL, NULL),
(30, 'info_access', NULL, NULL, NULL),
(31, 'setting_create', NULL, NULL, NULL),
(32, 'setting_edit', NULL, NULL, NULL),
(33, 'setting_show', NULL, NULL, NULL),
(34, 'setting_delete', NULL, NULL, NULL),
(35, 'setting_access', NULL, NULL, NULL),
(36, 'country_create', NULL, NULL, NULL),
(37, 'country_edit', NULL, NULL, NULL),
(38, 'country_show', NULL, NULL, NULL),
(39, 'country_delete', NULL, NULL, NULL),
(40, 'country_access', NULL, NULL, NULL),
(41, 'city_create', NULL, NULL, NULL),
(42, 'city_edit', NULL, NULL, NULL),
(43, 'city_show', NULL, NULL, NULL),
(44, 'city_delete', NULL, NULL, NULL),
(45, 'city_access', NULL, NULL, NULL),
(46, 'region_create', NULL, NULL, NULL),
(47, 'region_edit', NULL, NULL, NULL),
(48, 'region_show', NULL, NULL, NULL),
(49, 'region_delete', NULL, NULL, NULL),
(50, 'region_access', NULL, NULL, NULL),
(51, 'testimonial_create', NULL, NULL, NULL),
(52, 'testimonial_edit', NULL, NULL, NULL),
(53, 'testimonial_show', NULL, NULL, NULL),
(54, 'testimonial_delete', NULL, NULL, NULL),
(55, 'testimonial_access', NULL, NULL, NULL),
(56, 'newsletter_create', NULL, NULL, NULL),
(57, 'newsletter_edit', NULL, NULL, NULL),
(58, 'newsletter_show', NULL, NULL, NULL),
(59, 'newsletter_delete', NULL, NULL, NULL),
(60, 'newsletter_access', NULL, NULL, NULL),
(61, 'page_create', NULL, NULL, NULL),
(62, 'page_edit', NULL, NULL, NULL),
(63, 'page_show', NULL, NULL, NULL),
(64, 'page_delete', NULL, NULL, NULL),
(65, 'page_access', NULL, NULL, NULL),
(66, 'contactu_create', NULL, NULL, NULL),
(67, 'contactu_edit', NULL, NULL, NULL),
(68, 'contactu_show', NULL, NULL, NULL),
(69, 'contactu_delete', NULL, NULL, NULL),
(70, 'contactu_access', NULL, NULL, NULL),
(71, 'user_alert_create', NULL, NULL, NULL),
(72, 'user_alert_show', NULL, NULL, NULL),
(73, 'user_alert_delete', NULL, NULL, NULL),
(74, 'user_alert_access', NULL, NULL, NULL),
(75, 'content_management_access', NULL, NULL, NULL),
(76, 'content_category_create', NULL, NULL, NULL),
(77, 'content_category_edit', NULL, NULL, NULL),
(78, 'content_category_show', NULL, NULL, NULL),
(79, 'content_category_delete', NULL, NULL, NULL),
(80, 'content_category_access', NULL, NULL, NULL),
(81, 'content_tag_create', NULL, NULL, NULL),
(82, 'content_tag_edit', NULL, NULL, NULL),
(83, 'content_tag_show', NULL, NULL, NULL),
(84, 'content_tag_delete', NULL, NULL, NULL),
(85, 'content_tag_access', NULL, NULL, NULL),
(86, 'content_page_create', NULL, NULL, NULL),
(87, 'content_page_edit', NULL, NULL, NULL),
(88, 'content_page_show', NULL, NULL, NULL),
(89, 'content_page_delete', NULL, NULL, NULL),
(90, 'content_page_access', NULL, NULL, NULL),
(91, 'view_create', NULL, NULL, NULL),
(92, 'view_edit', NULL, NULL, NULL),
(93, 'view_show', NULL, NULL, NULL),
(94, 'view_delete', NULL, NULL, NULL),
(95, 'view_access', NULL, NULL, NULL),
(96, 'finish_type_create', NULL, NULL, NULL),
(97, 'finish_type_edit', NULL, NULL, NULL),
(98, 'finish_type_show', NULL, NULL, NULL),
(99, 'finish_type_delete', NULL, NULL, NULL),
(100, 'finish_type_access', NULL, NULL, NULL),
(101, 'slider_create', NULL, NULL, NULL),
(102, 'slider_edit', NULL, NULL, NULL),
(103, 'slider_show', NULL, NULL, NULL),
(104, 'slider_delete', NULL, NULL, NULL),
(105, 'slider_access', NULL, NULL, NULL),
(106, 'service_create', NULL, NULL, NULL),
(107, 'service_edit', NULL, NULL, NULL),
(108, 'service_show', NULL, NULL, NULL),
(109, 'service_delete', NULL, NULL, NULL),
(110, 'service_access', NULL, NULL, NULL),
(111, 'event_create', NULL, NULL, NULL),
(112, 'event_edit', NULL, NULL, NULL),
(113, 'event_show', NULL, NULL, NULL),
(114, 'event_delete', NULL, NULL, NULL),
(115, 'event_access', NULL, NULL, NULL),
(116, 'event_management_access', NULL, NULL, NULL),
(117, 'eventtag_create', NULL, NULL, NULL),
(118, 'eventtag_edit', NULL, NULL, NULL),
(119, 'eventtag_show', NULL, NULL, NULL),
(120, 'eventtag_delete', NULL, NULL, NULL),
(121, 'eventtag_access', NULL, NULL, NULL),
(122, 'event_category_create', NULL, NULL, NULL),
(123, 'event_category_edit', NULL, NULL, NULL),
(124, 'event_category_show', NULL, NULL, NULL),
(125, 'event_category_delete', NULL, NULL, NULL),
(126, 'event_category_access', NULL, NULL, NULL),
(127, 'eventuserstatus_create', NULL, NULL, NULL),
(128, 'eventuserstatus_edit', NULL, NULL, NULL),
(129, 'eventuserstatus_show', NULL, NULL, NULL),
(130, 'eventuserstatus_delete', NULL, NULL, NULL),
(131, 'eventuserstatus_access', NULL, NULL, NULL),
(132, 'eventjoininguser_create', NULL, NULL, NULL),
(133, 'eventjoininguser_edit', NULL, NULL, NULL),
(134, 'eventjoininguser_show', NULL, NULL, NULL),
(135, 'eventjoininguser_delete', NULL, NULL, NULL),
(136, 'eventjoininguser_access', NULL, NULL, NULL),
(137, 'event_discussion_create', NULL, NULL, NULL),
(138, 'event_discussion_edit', NULL, NULL, NULL),
(139, 'event_discussion_show', NULL, NULL, NULL),
(140, 'event_discussion_delete', NULL, NULL, NULL),
(141, 'event_discussion_access', NULL, NULL, NULL),
(142, 'real_estate_managment_access', NULL, NULL, NULL),
(143, 'project_create', NULL, NULL, NULL),
(144, 'project_edit', NULL, NULL, NULL),
(145, 'project_show', NULL, NULL, NULL),
(146, 'project_delete', NULL, NULL, NULL),
(147, 'project_access', NULL, NULL, NULL),
(148, 'real_estate_unit_create', NULL, NULL, NULL),
(149, 'real_estate_unit_edit', NULL, NULL, NULL),
(150, 'real_estate_unit_show', NULL, NULL, NULL),
(151, 'real_estate_unit_delete', NULL, NULL, NULL),
(152, 'real_estate_unit_access', NULL, NULL, NULL),
(153, 'real_estate_application_create', NULL, NULL, NULL),
(154, 'real_estate_application_edit', NULL, NULL, NULL),
(155, 'real_estate_application_show', NULL, NULL, NULL),
(156, 'real_estate_application_delete', NULL, NULL, NULL),
(157, 'real_estate_application_access', NULL, NULL, NULL),
(158, 'applications_request_section_create', NULL, NULL, NULL),
(159, 'applications_request_section_edit', NULL, NULL, NULL),
(160, 'applications_request_section_show', NULL, NULL, NULL),
(161, 'applications_request_section_delete', NULL, NULL, NULL),
(162, 'applications_request_section_access', NULL, NULL, NULL),
(163, 'real_estate_type_create', NULL, NULL, NULL),
(164, 'real_estate_type_edit', NULL, NULL, NULL),
(165, 'real_estate_type_show', NULL, NULL, NULL),
(166, 'real_estate_type_delete', NULL, NULL, NULL),
(167, 'real_estate_type_access', NULL, NULL, NULL),
(168, 'payment_method_create', NULL, NULL, NULL),
(169, 'payment_method_edit', NULL, NULL, NULL),
(170, 'payment_method_show', NULL, NULL, NULL),
(171, 'payment_method_delete', NULL, NULL, NULL),
(172, 'payment_method_access', NULL, NULL, NULL),
(173, 'available_for_mortgage_create', NULL, NULL, NULL),
(174, 'available_for_mortgage_edit', NULL, NULL, NULL),
(175, 'available_for_mortgage_show', NULL, NULL, NULL),
(176, 'available_for_mortgage_delete', NULL, NULL, NULL),
(177, 'available_for_mortgage_access', NULL, NULL, NULL),
(178, 'realstate_purpose_create', NULL, NULL, NULL),
(179, 'realstate_purpose_edit', NULL, NULL, NULL),
(180, 'realstate_purpose_show', NULL, NULL, NULL),
(181, 'realstate_purpose_delete', NULL, NULL, NULL),
(182, 'realstate_purpose_access', NULL, NULL, NULL),
(183, 'amenity_create', NULL, NULL, NULL),
(184, 'amenity_edit', NULL, NULL, NULL),
(185, 'amenity_show', NULL, NULL, NULL),
(186, 'amenity_delete', NULL, NULL, NULL),
(187, 'amenity_access', NULL, NULL, NULL),
(188, 'near_create', NULL, NULL, NULL),
(189, 'near_edit', NULL, NULL, NULL),
(190, 'near_show', NULL, NULL, NULL),
(191, 'near_delete', NULL, NULL, NULL),
(192, 'near_access', NULL, NULL, NULL),
(193, 'book_meeting_create', NULL, NULL, NULL),
(194, 'book_meeting_edit', NULL, NULL, NULL),
(195, 'book_meeting_show', NULL, NULL, NULL),
(196, 'book_meeting_delete', NULL, NULL, NULL),
(197, 'book_meeting_access', NULL, NULL, NULL),
(198, 'like_create', NULL, NULL, NULL),
(199, 'like_edit', NULL, NULL, NULL),
(200, 'like_show', NULL, NULL, NULL),
(201, 'like_delete', NULL, NULL, NULL),
(202, 'like_access', NULL, NULL, NULL),
(203, 'unit_comment_create', NULL, NULL, NULL),
(204, 'unit_comment_edit', NULL, NULL, NULL),
(205, 'unit_comment_show', NULL, NULL, NULL),
(206, 'unit_comment_delete', NULL, NULL, NULL),
(207, 'unit_comment_access', NULL, NULL, NULL),
(208, 'form_request_access', NULL, NULL, NULL),
(209, 'project_type_create', NULL, NULL, NULL),
(210, 'project_type_edit', NULL, NULL, NULL),
(211, 'project_type_show', NULL, NULL, NULL),
(212, 'project_type_delete', NULL, NULL, NULL),
(213, 'project_type_access', NULL, NULL, NULL),
(214, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 183),
(1, 184),
(1, 185),
(1, 186),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198),
(1, 199),
(1, 200),
(1, 201),
(1, 202),
(1, 203),
(1, 204),
(1, 205),
(1, 206),
(1, 207),
(1, 208),
(1, 209),
(1, 210),
(1, 211),
(1, 212),
(1, 213),
(1, 214),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(2, 136),
(2, 137),
(2, 138),
(2, 139),
(2, 140),
(2, 141),
(2, 142),
(2, 143),
(2, 144),
(2, 145),
(2, 146),
(2, 147),
(2, 148),
(2, 149),
(2, 150),
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 158),
(2, 159),
(2, 160),
(2, 161),
(2, 162),
(2, 163),
(2, 164),
(2, 165),
(2, 166),
(2, 167),
(2, 168),
(2, 169),
(2, 170),
(2, 171),
(2, 172),
(2, 173),
(2, 174),
(2, 175),
(2, 176),
(2, 177),
(2, 178),
(2, 179),
(2, 180),
(2, 181),
(2, 182),
(2, 183),
(2, 184),
(2, 185),
(2, 186),
(2, 187),
(2, 188),
(2, 189),
(2, 190),
(2, 191),
(2, 192),
(2, 193),
(2, 194),
(2, 195),
(2, 196),
(2, 197),
(2, 198),
(2, 199),
(2, 200),
(2, 201),
(2, 202),
(2, 203),
(2, 204),
(2, 205),
(2, 206),
(2, 207),
(2, 208),
(2, 209),
(2, 210),
(2, 211),
(2, 212),
(2, 213),
(2, 214);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `status` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `location_link` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `addresse` varchar(255) DEFAULT NULL,
  `featured` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_title` text DEFAULT NULL,
  `second_title` text DEFAULT NULL,
  `second_description` longtext DEFAULT NULL,
  `plan_description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `active`, `status`, `lat`, `lang`, `location_link`, `description`, `addresse`, `featured`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `city_id`, `project_type_id`, `plan_title`, `second_title`, `second_description`, `plan_description`) VALUES
(2, 'Nile business city', 1, 'active', NULL, NULL, NULL, '<p>We are never satisfied with what we have accomplished, but we always strive to achieve the best by unleashing our dreams and aspirations for the future of urban development in Egypt. We focus on improving the quality of life in its social, economic and environmental sense, through the establishment of huge projects based on the genius of design and modern technology; In order to remain prominent and distinguished landmarks at the local and international levels over time for future generations.</p>', 'ddddd dddd ddddd', 'active', '2024-02-17 15:20:53', '2024-02-18 19:51:03', NULL, 2, 1, 1, 'Master plan', 'Welcome to Nile Business City', '<p>The tallest skyscraper in the golden point of the New Administrative Capital in the middle of the Green River and the center of the downtown area, with a height of 233 meters and with the widest facade on the northern Bin Zayed Axis, with a width of 200 meters.</p>', 'Nile Business City complex is located in the heart of the golden spot the New Administrative capital With a strategic location that is pinpointed in the center of the river and directly on the Mohammed Bin Zayed AxisOne can’t miss this striking 55-floor business city that is directly situated in the middle of the Downtown district, in the heart of the New Administrative  business community. Only a 20-minute drive from New Cairo, Nile Business city multiple access points through Road 90, Suez and Sokhna roads It is a five-minute drive along the axes of The Grand Mosque, Cathedral, Al Masa hotel and The Presidential Palace.');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dssd', 1, '2024-02-15 20:13:18', '2024-02-15 20:13:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qa_messages`
--

CREATE TABLE `qa_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realstate_purposes`
--

CREATE TABLE `realstate_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realstate_purposes`
--

INSERT INTO `realstate_purposes` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sale', 1, '2024-02-13 15:35:00', '2024-02-13 15:35:00', NULL),
(2, 'rent', 1, '2024-02-13 15:35:06', '2024-02-13 15:35:06', NULL),
(3, 'resale', 1, '2024-02-13 15:35:12', '2024-02-13 15:35:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_applications`
--

CREATE TABLE `real_estate_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `addresse` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `max_price` decimal(15,2) DEFAULT NULL,
  `min_price` decimal(15,2) DEFAULT NULL,
  `deliver_year` varchar(255) DEFAULT NULL,
  `number_of_rooms` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `time_of_call` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `purpose_of_request` varchar(255) DEFAULT NULL,
  `min_area` varchar(255) DEFAULT NULL,
  `max_area` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estate_applications`
--

INSERT INTO `real_estate_applications` (`id`, `addresse`, `location`, `max_price`, `min_price`, `deliver_year`, `number_of_rooms`, `floor`, `user_name`, `user_phone`, `notes`, `time_of_call`, `email`, `purpose_of_request`, `min_area`, `max_area`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-13 05:26:02', '2024-02-13 05:26:02', NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', NULL, NULL, NULL, NULL, '2024-02-14 14:59:26', '2024-02-14 14:59:26', NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hany@mail.com', NULL, NULL, NULL, '2024-02-17 13:46:55', '2024-02-17 13:46:55', NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cosicyqide@mailinator.com', NULL, NULL, NULL, '2024-02-18 18:37:42', '2024-02-18 18:37:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_application_real_estate_type`
--

CREATE TABLE `real_estate_application_real_estate_type` (
  `real_estate_application_id` bigint(20) UNSIGNED NOT NULL,
  `real_estate_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_application_view`
--

CREATE TABLE `real_estate_application_view` (
  `real_estate_application_id` bigint(20) UNSIGNED NOT NULL,
  `view_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estate_application_view`
--

INSERT INTO `real_estate_application_view` (`real_estate_application_id`, `view_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_types`
--

CREATE TABLE `real_estate_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estate_types`
--

INSERT INTO `real_estate_types` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Apartments', 1, '2024-02-13 19:53:14', '2024-02-13 19:53:14', NULL),
(2, 'Furnished Apartment', 1, '2024-02-13 19:53:25', '2024-02-13 19:53:25', NULL),
(3, 'Chalets', 1, '2024-02-13 19:53:34', '2024-02-13 19:53:34', NULL),
(4, 'Villas', 1, '2024-02-13 19:53:43', '2024-02-13 19:53:43', NULL),
(5, 'Land', 1, '2024-02-13 19:54:16', '2024-02-13 19:54:16', NULL),
(6, 'Building', 1, '2024-02-13 19:54:24', '2024-02-13 19:54:24', NULL),
(7, 'Commercial', 1, '2024-02-13 19:54:31', '2024-02-13 19:54:31', NULL),
(8, 'Administrative', 1, '2024-02-13 19:54:40', '2024-02-13 19:54:40', NULL),
(9, 'Medical', 1, '2024-02-13 19:54:48', '2024-02-13 19:54:48', NULL),
(10, 'Shared Room', 1, '2024-02-13 19:54:56', '2024-02-13 19:54:56', NULL),
(11, 'Other', 1, '2024-02-13 19:55:04', '2024-02-13 19:55:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_type_real_estate_unit`
--

CREATE TABLE `real_estate_type_real_estate_unit` (
  `real_estate_unit_id` bigint(20) UNSIGNED NOT NULL,
  `real_estate_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estate_type_real_estate_unit`
--

INSERT INTO `real_estate_type_real_estate_unit` (`real_estate_unit_id`, `real_estate_type_id`) VALUES
(1, 1),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_units`
--

CREATE TABLE `real_estate_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `featured` varchar(255) DEFAULT NULL,
  `premium` varchar(255) DEFAULT NULL,
  `location_link` longtext DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `number_of_room` varchar(255) DEFAULT NULL,
  `number_of_floor` varchar(255) DEFAULT NULL,
  `number_of_bath_room` varchar(255) DEFAULT NULL,
  `number_of_master_room` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `has_garage` tinyint(1) DEFAULT 0,
  `number_of_garage` varchar(255) DEFAULT NULL,
  `features` longtext DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `bua` varchar(255) DEFAULT NULL,
  `ror` varchar(255) DEFAULT NULL,
  `roi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estate_units`
--

INSERT INTO `real_estate_units` (`id`, `title`, `description`, `status`, `price`, `featured`, `premium`, `location_link`, `lat`, `lang`, `number_of_room`, `number_of_floor`, `number_of_bath_room`, `number_of_master_room`, `notes`, `has_garage`, `number_of_garage`, `features`, `address`, `bua`, `ror`, `roi`, `created_at`, `updated_at`, `deleted_at`, `project_id`, `user_id`, `city_id`) VALUES
(1, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-13 21:14:26', '2024-02-19 14:52:09', NULL, NULL, 2, 1),
(11, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(12, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(13, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(14, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(15, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(16, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(17, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(18, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(19, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(20, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(21, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(22, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(23, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(24, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(25, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(26, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(27, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(28, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(29, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(30, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(31, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL),
(32, 'Reserve Way New Braunfels, Texas', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'published', '780000', 'yes', 'yes', 'Qui ut minim est ips', 'Pariatur Aliquam vo', 'Consequatur exceptu', '3', '3', '2', '1', 'Reprehenderit volupt', 1, '1', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'The standard chunk of Lorem Ipsum used since the 1500s', '22', '22', '22', '2024-02-14 04:14:26', '2024-02-16 05:11:01', NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_unit_realstate_purpose`
--

CREATE TABLE `real_estate_unit_realstate_purpose` (
  `real_estate_unit_id` bigint(20) UNSIGNED NOT NULL,
  `realstate_purpose_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `real_estate_unit_realstate_purpose`
--

INSERT INTO `real_estate_unit_realstate_purpose` (`real_estate_unit_id`, `realstate_purpose_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `show_in_website` tinyint(1) DEFAULT 0,
  `active` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `show_in_website`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 0, NULL, NULL, NULL, NULL),
(2, 'User', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instgram` varchar(255) DEFAULT NULL,
  `snap` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_comments`
--

CREATE TABLE `unit_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `verified` tinyint(1) DEFAULT 0,
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `device` longtext DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `notifcation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `approved`, `verified`, `verified_at`, `verification_token`, `remember_token`, `phone`, `device`, `device_type`, `active`, `notifcation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$IdJeoQdSuKmff0tDdrlHTO0Ol0FuigPqvgHR81HYmJVt1EhwvkWyK', 1, 1, '2024-01-26 19:08:02', '', NULL, NULL, NULL, '', 0, '', NULL, NULL, NULL),
(2, 'Vstate', 'Vstate@Vstate.com', NULL, '$2y$10$GGiF7xEqDdQxRVV0VDfxi.V5D50dTQDBoklfuu94Tx2D1M53R6BIS', 1, 1, '2024-02-14 11:05:02', NULL, NULL, 223089785, NULL, NULL, 1, NULL, '2024-02-14 16:05:02', '2024-02-14 16:05:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alert_text` varchar(255) NOT NULL,
  `alert_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `title`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Main Street', 1, '2024-02-13 19:55:24', '2024-02-13 19:55:24', NULL),
(2, 'Side Street', 1, '2024-02-13 19:55:37', '2024-02-13 19:55:37', NULL),
(3, 'Corner', 1, '2024-02-13 19:55:47', '2024-02-13 19:55:47', NULL),
(4, 'Back', 1, '2024-02-13 19:55:55', '2024-02-13 19:55:55', NULL),
(5, 'Garden', 1, '2024-02-13 19:56:04', '2024-02-13 19:56:04', NULL),
(6, 'Pool', 1, '2024-02-13 19:56:14', '2024-02-13 19:56:14', NULL),
(7, 'Seaview', 1, '2024-02-13 19:56:22', '2024-02-13 19:56:22', NULL),
(8, 'Nile', 1, '2024-02-13 19:56:30', '2024-02-13 19:56:30', NULL),
(9, 'Golf', 1, '2024-02-13 19:56:40', '2024-02-13 19:56:40', NULL),
(10, 'Plaza', 1, '2024-02-13 19:56:48', '2024-02-13 19:56:48', NULL),
(11, 'Club', 1, '2024-02-13 19:56:55', '2024-02-13 19:56:55', NULL),
(12, 'Lake', 1, '2024-02-13 19:57:03', '2024-02-13 19:57:03', NULL),
(13, 'Other', 1, '2024-02-13 19:57:10', '2024-02-13 19:57:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenity_real_estate_unit`
--
ALTER TABLE `amenity_real_estate_unit`
  ADD KEY `real_estate_unit_id_fk_9469718` (`real_estate_unit_id`),
  ADD KEY `amenity_id_fk_9469718` (`amenity_id`);

--
-- Indexes for table `applications_request_sections`
--
ALTER TABLE `applications_request_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_for_mortgages`
--
ALTER TABLE `available_for_mortgages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_for_mortgage_real_estate_application`
--
ALTER TABLE `available_for_mortgage_real_estate_application`
  ADD KEY `real_estate_application_id_fk_9494515` (`real_estate_application_id`),
  ADD KEY `available_for_mortgage_id_fk_9494515` (`available_for_mortgage_id`);

--
-- Indexes for table `book_meetings`
--
ALTER TABLE `book_meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_9469772` (`user_id`),
  ADD KEY `unit_fk_9469773` (`unit_id`),
  ADD KEY `project_fk_9504208` (`project_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_fk_8900013` (`country_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_categories`
--
ALTER TABLE `content_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_category_content_page`
--
ALTER TABLE `content_category_content_page`
  ADD KEY `content_page_id_fk_8900372` (`content_page_id`),
  ADD KEY `content_category_id_fk_8900372` (`content_category_id`);

--
-- Indexes for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_page_content_tag`
--
ALTER TABLE `content_page_content_tag`
  ADD KEY `content_page_id_fk_8900373` (`content_page_id`),
  ADD KEY `content_tag_id_fk_8900373` (`content_tag_id`);

--
-- Indexes for table `content_tags`
--
ALTER TABLE `content_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventjoiningusers`
--
ALTER TABLE `eventjoiningusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_fk_9441509` (`event_id`),
  ADD KEY `user_fk_9441510` (`user_id`),
  ADD KEY `event_status_fk_9441511` (`event_status_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_fk_9441536` (`created_by_id`),
  ADD KEY `country_fk_9441537` (`country_id`),
  ADD KEY `city_fk_9441538` (`city_id`);

--
-- Indexes for table `eventtags`
--
ALTER TABLE `eventtags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventuserstatuses`
--
ALTER TABLE `eventuserstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_discussions`
--
ALTER TABLE `event_discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_9441540` (`user_id`),
  ADD KEY `event_fk_9441541` (`event_id`),
  ADD KEY `replay_discussion_fk_9441547` (`replay_discussion_id`);

--
-- Indexes for table `event_eventtag`
--
ALTER TABLE `event_eventtag`
  ADD KEY `event_id_fk_9441506` (`event_id`),
  ADD KEY `eventtag_id_fk_9441506` (`eventtag_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_8884666` (`category_id`);

--
-- Indexes for table `finish_types`
--
ALTER TABLE `finish_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finish_type_real_estate_application`
--
ALTER TABLE `finish_type_real_estate_application`
  ADD KEY `real_estate_application_id_fk_9494543` (`real_estate_application_id`),
  ADD KEY `finish_type_id_fk_9494543` (`finish_type_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_9469775` (`user_id`),
  ADD KEY `unit_fk_9469776` (`unit_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nears`
--
ALTER TABLE `nears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `near_project`
--
ALTER TABLE `near_project`
  ADD KEY `project_id_fk_9504206` (`project_id`),
  ADD KEY `near_id_fk_9504206` (`near_id`);

--
-- Indexes for table `near_real_estate_unit`
--
ALTER TABLE `near_real_estate_unit`
  ADD KEY `real_estate_unit_id_fk_9469760` (`real_estate_unit_id`),
  ADD KEY `near_id_fk_9469760` (`near_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method_real_estate_application`
--
ALTER TABLE `payment_method_real_estate_application`
  ADD KEY `real_estate_application_id_fk_9494517` (`real_estate_application_id`),
  ADD KEY `payment_method_id_fk_9494517` (`payment_method_id`);

--
-- Indexes for table `payment_method_real_estate_unit`
--
ALTER TABLE `payment_method_real_estate_unit`
  ADD KEY `real_estate_unit_id_fk_9496855` (`real_estate_unit_id`),
  ADD KEY `payment_method_id_fk_9496855` (`payment_method_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_8871617` (`role_id`),
  ADD KEY `permission_id_fk_8871617` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_9441606` (`user_id`),
  ADD KEY `city_fk_9504205` (`city_id`),
  ADD KEY `project_type_fk_9504216` (`project_type_id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_messages_topic_id_foreign` (`topic_id`),
  ADD KEY `qa_messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `realstate_purposes`
--
ALTER TABLE `realstate_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estate_applications`
--
ALTER TABLE `real_estate_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_9493129` (`user_id`);

--
-- Indexes for table `real_estate_application_real_estate_type`
--
ALTER TABLE `real_estate_application_real_estate_type`
  ADD KEY `real_estate_application_id_fk_9494540` (`real_estate_application_id`),
  ADD KEY `real_estate_type_id_fk_9494540` (`real_estate_type_id`);

--
-- Indexes for table `real_estate_application_view`
--
ALTER TABLE `real_estate_application_view`
  ADD KEY `real_estate_application_id_fk_9494541` (`real_estate_application_id`),
  ADD KEY `view_id_fk_9494541` (`view_id`);

--
-- Indexes for table `real_estate_types`
--
ALTER TABLE `real_estate_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estate_type_real_estate_unit`
--
ALTER TABLE `real_estate_type_real_estate_unit`
  ADD KEY `real_estate_unit_id_fk_9496856` (`real_estate_unit_id`),
  ADD KEY `real_estate_type_id_fk_9496856` (`real_estate_type_id`);

--
-- Indexes for table `real_estate_units`
--
ALTER TABLE `real_estate_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_fk_9441621` (`project_id`),
  ADD KEY `user_fk_9469352` (`user_id`);

--
-- Indexes for table `real_estate_unit_realstate_purpose`
--
ALTER TABLE `real_estate_unit_realstate_purpose`
  ADD KEY `real_estate_unit_id_fk_9496854` (`real_estate_unit_id`),
  ADD KEY `realstate_purpose_id_fk_9496854` (`realstate_purpose_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_fk_8900018` (`city_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_8871626` (`user_id`),
  ADD KEY `role_id_fk_8871626` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_comments`
--
ALTER TABLE `unit_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_9469781` (`user_id`),
  ADD KEY `unit_fk_9469782` (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_8900355` (`user_alert_id`),
  ADD KEY `user_id_fk_8900355` (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `applications_request_sections`
--
ALTER TABLE `applications_request_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `available_for_mortgages`
--
ALTER TABLE `available_for_mortgages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_meetings`
--
ALTER TABLE `book_meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_categories`
--
ALTER TABLE `content_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_pages`
--
ALTER TABLE `content_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_tags`
--
ALTER TABLE `content_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `eventjoiningusers`
--
ALTER TABLE `eventjoiningusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventtags`
--
ALTER TABLE `eventtags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventuserstatuses`
--
ALTER TABLE `eventuserstatuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_discussions`
--
ALTER TABLE `event_discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finish_types`
--
ALTER TABLE `finish_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `nears`
--
ALTER TABLE `nears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qa_messages`
--
ALTER TABLE `qa_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realstate_purposes`
--
ALTER TABLE `realstate_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `real_estate_applications`
--
ALTER TABLE `real_estate_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `real_estate_types`
--
ALTER TABLE `real_estate_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `real_estate_units`
--
ALTER TABLE `real_estate_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_comments`
--
ALTER TABLE `unit_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenity_real_estate_unit`
--
ALTER TABLE `amenity_real_estate_unit`
  ADD CONSTRAINT `amenity_id_fk_9469718` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_unit_id_fk_9469718` FOREIGN KEY (`real_estate_unit_id`) REFERENCES `real_estate_units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `available_for_mortgage_real_estate_application`
--
ALTER TABLE `available_for_mortgage_real_estate_application`
  ADD CONSTRAINT `available_for_mortgage_id_fk_9494515` FOREIGN KEY (`available_for_mortgage_id`) REFERENCES `available_for_mortgages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_application_id_fk_9494515` FOREIGN KEY (`real_estate_application_id`) REFERENCES `real_estate_applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_meetings`
--
ALTER TABLE `book_meetings`
  ADD CONSTRAINT `project_fk_9504208` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `unit_fk_9469773` FOREIGN KEY (`unit_id`) REFERENCES `real_estate_units` (`id`),
  ADD CONSTRAINT `user_fk_9469772` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `country_fk_8900013` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `content_category_content_page`
--
ALTER TABLE `content_category_content_page`
  ADD CONSTRAINT `content_category_id_fk_8900372` FOREIGN KEY (`content_category_id`) REFERENCES `content_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_page_id_fk_8900372` FOREIGN KEY (`content_page_id`) REFERENCES `content_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_page_content_tag`
--
ALTER TABLE `content_page_content_tag`
  ADD CONSTRAINT `content_page_id_fk_8900373` FOREIGN KEY (`content_page_id`) REFERENCES `content_pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_tag_id_fk_8900373` FOREIGN KEY (`content_tag_id`) REFERENCES `content_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `eventjoiningusers`
--
ALTER TABLE `eventjoiningusers`
  ADD CONSTRAINT `event_fk_9441509` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_status_fk_9441511` FOREIGN KEY (`event_status_id`) REFERENCES `eventuserstatuses` (`id`),
  ADD CONSTRAINT `user_fk_9441510` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `city_fk_9441538` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `country_fk_9441537` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `created_by_fk_9441536` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `event_discussions`
--
ALTER TABLE `event_discussions`
  ADD CONSTRAINT `event_fk_9441541` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `replay_discussion_fk_9441547` FOREIGN KEY (`replay_discussion_id`) REFERENCES `event_discussions` (`id`),
  ADD CONSTRAINT `user_fk_9441540` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `event_eventtag`
--
ALTER TABLE `event_eventtag`
  ADD CONSTRAINT `event_id_fk_9441506` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventtag_id_fk_9441506` FOREIGN KEY (`eventtag_id`) REFERENCES `eventtags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD CONSTRAINT `category_fk_8884666` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`);

--
-- Constraints for table `finish_type_real_estate_application`
--
ALTER TABLE `finish_type_real_estate_application`
  ADD CONSTRAINT `finish_type_id_fk_9494543` FOREIGN KEY (`finish_type_id`) REFERENCES `finish_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_application_id_fk_9494543` FOREIGN KEY (`real_estate_application_id`) REFERENCES `real_estate_applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `unit_fk_9469776` FOREIGN KEY (`unit_id`) REFERENCES `real_estate_units` (`id`),
  ADD CONSTRAINT `user_fk_9469775` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `near_project`
--
ALTER TABLE `near_project`
  ADD CONSTRAINT `near_id_fk_9504206` FOREIGN KEY (`near_id`) REFERENCES `nears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_id_fk_9504206` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `near_real_estate_unit`
--
ALTER TABLE `near_real_estate_unit`
  ADD CONSTRAINT `near_id_fk_9469760` FOREIGN KEY (`near_id`) REFERENCES `nears` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_unit_id_fk_9469760` FOREIGN KEY (`real_estate_unit_id`) REFERENCES `real_estate_units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_method_real_estate_application`
--
ALTER TABLE `payment_method_real_estate_application`
  ADD CONSTRAINT `payment_method_id_fk_9494517` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_application_id_fk_9494517` FOREIGN KEY (`real_estate_application_id`) REFERENCES `real_estate_applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_method_real_estate_unit`
--
ALTER TABLE `payment_method_real_estate_unit`
  ADD CONSTRAINT `payment_method_id_fk_9496855` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_unit_id_fk_9496855` FOREIGN KEY (`real_estate_unit_id`) REFERENCES `real_estate_units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_8871617` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_8871617` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `city_fk_9504205` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `project_type_fk_9504216` FOREIGN KEY (`project_type_id`) REFERENCES `project_types` (`id`),
  ADD CONSTRAINT `user_fk_9441606` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `real_estate_applications`
--
ALTER TABLE `real_estate_applications`
  ADD CONSTRAINT `user_fk_9493129` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `real_estate_application_real_estate_type`
--
ALTER TABLE `real_estate_application_real_estate_type`
  ADD CONSTRAINT `real_estate_application_id_fk_9494540` FOREIGN KEY (`real_estate_application_id`) REFERENCES `real_estate_applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_type_id_fk_9494540` FOREIGN KEY (`real_estate_type_id`) REFERENCES `real_estate_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `real_estate_application_view`
--
ALTER TABLE `real_estate_application_view`
  ADD CONSTRAINT `real_estate_application_id_fk_9494541` FOREIGN KEY (`real_estate_application_id`) REFERENCES `real_estate_applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `view_id_fk_9494541` FOREIGN KEY (`view_id`) REFERENCES `views` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `real_estate_type_real_estate_unit`
--
ALTER TABLE `real_estate_type_real_estate_unit`
  ADD CONSTRAINT `real_estate_type_id_fk_9496856` FOREIGN KEY (`real_estate_type_id`) REFERENCES `real_estate_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_unit_id_fk_9496856` FOREIGN KEY (`real_estate_unit_id`) REFERENCES `real_estate_units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `real_estate_units`
--
ALTER TABLE `real_estate_units`
  ADD CONSTRAINT `project_fk_9441621` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `user_fk_9469352` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `real_estate_unit_realstate_purpose`
--
ALTER TABLE `real_estate_unit_realstate_purpose`
  ADD CONSTRAINT `real_estate_unit_id_fk_9496854` FOREIGN KEY (`real_estate_unit_id`) REFERENCES `real_estate_units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `realstate_purpose_id_fk_9496854` FOREIGN KEY (`realstate_purpose_id`) REFERENCES `realstate_purposes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `city_fk_8900018` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_8871626` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_8871626` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit_comments`
--
ALTER TABLE `unit_comments`
  ADD CONSTRAINT `unit_fk_9469782` FOREIGN KEY (`unit_id`) REFERENCES `real_estate_units` (`id`),
  ADD CONSTRAINT `user_fk_9469781` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_8900355` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_8900355` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
