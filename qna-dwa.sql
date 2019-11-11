-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 02:49 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qna`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_11_03_124641_create_sections_table', 1),
(5, '2019_11_03_124684_create_questions_table', 1),
(6, '2019_11_03_125755_create_options_table', 1),
(7, '2019_11_03_130000_create_visitors_table', 1),
(8, '2019_11_03_130251_create_answers_table', 1),
(9, '2019_11_03_224746_add_icon_column', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, '<18', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(2, 1, '18-30', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(3, 1, '30-50', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(4, 1, '>50', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(5, 2, 'No education', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(6, 2, 'Primary education', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(7, 2, 'Lower secondary education', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(8, 2, 'Upper secondary education', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(9, 2, 'Post secondary education', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(10, 2, 'Bachelor or equivalent level', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(11, 2, 'Master level or higher', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(12, 3, 'No knowledge', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(13, 3, 'Basic', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(14, 3, 'Intermediate', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(15, 3, 'Advanced', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(16, 5, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(17, 5, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(18, 5, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(19, 15, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(20, 15, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(21, 15, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(22, 25, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(23, 25, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(24, 25, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(25, 35, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(26, 35, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(27, 35, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(28, 45, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(29, 45, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(30, 45, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(31, 55, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(32, 55, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(33, 55, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(34, 65, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(35, 65, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(36, 65, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(37, 75, 'Easy to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(38, 75, 'Not easy, not hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(39, 75, 'Hard to find', '2019-11-04 03:47:13', '2019-11-04 03:47:13');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `before` text COLLATE utf8mb4_unicode_ci,
  `type` enum('text','number','textarea','option','slider') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `section_id`, `question`, `before`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is your age group ?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(2, 1, 'What is your highest level of education ?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(3, 1, 'What is your general knowledge level of digital communication tools?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(4, 2, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(5, 2, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(6, 2, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(7, 2, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(8, 2, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(9, 2, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(10, 2, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(11, 2, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(12, 2, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(13, 2, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(14, 3, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(15, 3, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(16, 3, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(17, 3, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(18, 3, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(19, 3, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(20, 3, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(21, 3, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(22, 3, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(23, 3, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(24, 4, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(25, 4, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(26, 4, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(27, 4, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(28, 4, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(29, 4, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(30, 4, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(31, 4, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(32, 4, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(33, 4, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(34, 5, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(35, 5, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(36, 5, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(37, 5, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(38, 5, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(39, 5, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(40, 5, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(41, 5, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(42, 5, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(43, 5, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(44, 6, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(45, 6, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(46, 6, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(47, 6, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(48, 6, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(49, 6, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(50, 6, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(51, 6, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(52, 6, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(53, 6, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(54, 7, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(55, 7, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(56, 7, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(57, 7, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(58, 7, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(59, 7, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(60, 7, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(61, 7, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(62, 7, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(63, 7, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(64, 8, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(65, 8, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(66, 8, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(67, 8, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(68, 8, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(69, 8, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(70, 8, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(71, 8, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(72, 8, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(73, 8, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(74, 9, 'Where is the water quality risk the highest?', 'Activity Based Question', 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(75, 9, 'How difficult was it to find the answer to this question?', NULL, 'option', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(76, 9, 'What is the value at point X within water quality standards?', NULL, 'text', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(77, 9, 'Obstructive Supportive', 'Please assess the visualisation and indicate how you find regarding', 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(78, 9, 'Complicated Easy', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(79, 9, 'Inefficient Efficient', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(80, 9, 'Confusing Clear', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(81, 9, 'Boring Exciting', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(82, 9, 'Conventional Inventive', NULL, 'slider', '2019-11-04 03:47:13', '2019-11-04 03:47:13'),
(83, 9, 'Please write below if you have any other comments concerning the visualisation shown', NULL, 'textarea', '2019-11-04 03:47:13', '2019-11-04 03:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visual` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `text`, `visual`, `created_at`, `updated_at`, `icon`) VALUES
(1, 'Demographics', NULL, '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'user-friends'),
(2, 'Vertical Bar Chart', 'https://public.tableau.com/views/Waterqualitydatavisualisations/Verticalbarchart?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(3, 'Horizontal Bar Chart', 'https://public.tableau.com/views/Waterqualitydatavisualisations/Horizontalbarchart?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(4, 'Vertical Dot Plot', 'https://public.tableau.com/views/Waterqualitydatavisualisations/Verticaldotplot?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(5, 'Horizontal Dot Plot', 'https://public.tableau.com/views/Waterqualitydatavisualisations/Horizontaldotplot?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(6, 'Matrix Table', 'https://public.tableau.com/views/Waterqualitydatavisualisations/Matrixtable?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(7, 'Box Plot', 'https://public.tableau.com/views/Waterqualitydatavisualisations/BoxPlot?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(8, 'Line Chart', 'https://public.tableau.com/views/Waterqualitydatavisualisations/LineChart?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar'),
(9, 'Small Multiples', 'https://public.tableau.com/views/Waterqualitydatavisualisations/Smallmultiples_1?:display_count=y&:origin=viz_share_link', '2019-11-04 03:47:13', '2019-11-04 03:47:13', 'chart-bar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` enum('Mr','Mrs') COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`),
  ADD KEY `answers_visitor_id_foreign` (`visitor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_section_id_foreign` (`section_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
