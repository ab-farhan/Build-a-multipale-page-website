-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 08:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rabbil_web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '1234', NULL, NULL),
(2, '1', '1', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_phone`, `contact_email`, `contact_msg`, `created_at`, `updated_at`) VALUES
(1, 'Abu Bokkor Farhan', '01868362878', 'farhanbokkor@gmail.com', 'qqqqqqqqqqqqqqqqqq', '2021-07-24 06:08:37', NULL),
(4, 'Abu Bokkor Farhan', '01868362878', 'farhanbokkor@gmail.com', 'aa', '2021-07-24 07:04:09', NULL),
(5, 'Abu Bokkor Farhan', '01868362878', 'farhanbokkor@gmail.com', 'tt', '2021-07-24 07:04:26', NULL),
(15, 'Abu Bokkor Farhan', '01868362878', 'farhanbokkor@gmail.com', 'contacty', '2021-07-25 12:14:16', NULL),
(16, 'Abu Bokkor Farhan', '01868362878', 'farhanbokkor@gmail.com', 'dd', '2021-07-26 09:07:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_sort_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_long_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_total_enroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_total_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_sort_des`, `course_long_des`, `course_fee`, `course_total_enroll`, `course_total_class`, `course_link`, `course_img`, `created_at`, `updated_at`) VALUES
(3, 'লারাভেল এবং প্রোজেক্ট', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', 'long', 'কোর্স ফ্রি : ১০০০/-', 'মোট শিক্ষার্থী : ২০০ জন', 'মোট  ক্লাস : ১৫০ টি', '#', 'admin/images/android.jpg', NULL, '2021-07-20 02:38:26'),
(4, 'লারাভেল এবং প্রোজেক্ট 4', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/- ', 'মোট শিক্ষার্থী : ২০০ জন ', 'মোট  ক্লাস : ১৫০ টি ', '#', 'admin/images/react.jpg', NULL, NULL),
(5, 'লারাভেল এবং প্রোজেক্ট 5', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/- ', 'মোট শিক্ষার্থী : ২০০ জন ', 'মোট  ক্লাস : ১৫০ টি ', '#', 'admin/images/laravel.jpg', NULL, NULL),
(6, 'লারাভেল এবং প্রোজেক্ট 6', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/- ', 'মোট শিক্ষার্থী : ২০০ জন ', 'মোট  ক্লাস : ১৫০ টি ', '#', 'admin/images/android.jpg', NULL, NULL),
(7, 'লারাভেল এবং প্রোজেক্ট 7', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/- ', 'মোট শিক্ষার্থী : ২০০ জন ', 'মোট  ক্লাস : ১৫০ টি ', '#', 'admin/images/laravel.jpg', NULL, NULL),
(8, 'লারাভেল এবং প্রোজেক্ট 8', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/- ', 'মোট শিক্ষার্থী : ২০০ জন ', 'মোট  ক্লাস : ১৫০ টি ', '#', 'admin/images/react.jpg', NULL, NULL),
(9, 'লারাভেল এবং প্রোজেক্ট 9', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/- ', 'মোট শিক্ষার্থী : ২০০ জন ', 'মোট  ক্লাস : ১৫০ টি ', '#', 'admin/images/laravel.jpg', NULL, NULL),
(10, 'লারাভেল এবং প্রোজেক্ট 10', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/', 'মোট শিক্ষার্থী : ২০০ জন', 'মোট  ক্লাস : ১৫০ টি', '#', 'admin/images/react.jpg', NULL, '2021-07-20 01:30:31'),
(23, 'লারাভেল এবং প্রোজেক্ট 11', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/-', 'মোট ক্লাস : ১৫০ টি', 'মোট শিক্ষার্থী : ২০০ জন', '##', 'website/images/custom.svg', '2021-07-20 02:29:58', '2021-07-25 11:08:09'),
(24, 'লারাভেল এবং প্রোজেক্ট 12', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/-', 'মোট ক্লাস : ১৫০ টি', 'মোট শিক্ষার্থী : ২০০ জন', '##', 'website/images/graphic.svg', '2021-07-20 02:30:20', '2021-07-25 11:08:01'),
(25, 'লারাভেল এবং প্রোজেক্ট 13', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/-', 'মোট ক্লাস : ১৫০ টি', 'মোট শিক্ষার্থী : ২০০ জন', '##', 'website/images/knowledge.svg', '2021-07-20 02:30:26', '2021-07-25 11:06:16'),
(26, 'লারাভেল এবং প্রোজেক্ট 14', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, 'কোর্স ফ্রি : ১০০০/-', 'মোট ক্লাস : ১৫০ টি', 'মোট শিক্ষার্থী : ২০০ জন', '##', 'website/images/code.svg', '2021-07-20 02:30:30', '2021-07-25 11:06:03');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imgLocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `imgLocation`, `created_at`, `updated_at`) VALUES
(52, 'http://127.0.0.1:8000/storage/dFeNxgo9qv0nOvCEF951hm9yCSuruVeHKF8pDZik.jpg', '2021-07-28 18:07:05', NULL),
(54, 'http://127.0.0.1:8000/storage/mmHSxXwKGcyLpo9u5GPh3kfuE7qAZgpZoa9hAACq.png', '2021-07-28 18:07:18', NULL),
(55, 'http://127.0.0.1:8000/storage/AZbQOhj4nQObaSSSVkBY6XWdEfPTMqahCfrF7g1m.jpg', '2021-07-28 18:07:29', NULL),
(57, 'http://127.0.0.1:8000/storage/EicgvUqCbTAT6hEcoK34FCvRGB3nYGvesvaq9uDS.jpg', '2021-07-29 17:06:28', NULL),
(58, 'http://127.0.0.1:8000/storage/nmssRnTSigkbBRngcN3JnQB1hQ4ZLn9FkpAJZeEr.webp', '2021-07-29 17:06:38', NULL),
(61, 'http://127.0.0.1:8000/storage/IYjRVGkLxaioNvVyElkdfqI0548c3GstE6MnI8g3.jpg', '2021-07-29 17:06:58', NULL),
(65, 'http://127.0.0.1:8000/storage/eP0gGG2yUi8rz8Cv699RvNrExufm23hkBfiyrv5r.jpg', '2021-07-29 17:17:22', NULL),
(66, 'http://127.0.0.1:8000/storage/s2BURRv1e2qnwPaAOyb1PFH2UdRvEF1Ta2oLDrz6.jpg', '2021-07-29 17:17:28', NULL),
(67, 'http://127.0.0.1:8000/storage/zWQeYrJGsR00VNpUmiXEgmFmd2YxB8O65OI4DtPh.jpg', '2021-07-29 17:17:37', NULL),
(69, 'http://127.0.0.1:8000/storage/U3YK12bAMmJIoB1gWydEVcUJz3CZ334fibM8MaEV.png', '2021-07-29 17:17:49', NULL),
(72, 'http://127.0.0.1:8000/storage/PT5C35IZ7fX7PP8LlPvaeO74H9Ma6JCiSO3yqsQU.jpg', '2021-07-29 17:18:07', NULL),
(74, 'http://127.0.0.1:8000/storage/QNSUlJevCi3e4VEAV6BB6MrsmCvD2IurrzRaK4UK.png', '2021-07-29 17:19:10', NULL),
(75, 'http://127.0.0.1:8000/storage/FbbeVigoPjVkXImZKT20NmizmlzvSpUQuea76K4O.png', '2021-07-29 17:19:17', NULL),
(76, 'http://127.0.0.1:8000/storage/q1uhwOdPuzjJmrNuHkMfq0ba60mV8yuenfPbhBEh.jpg', '2021-07-29 17:19:24', NULL);

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
(4, '2021_07_15_113133_vistor_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 3),
(8, '2019_08_19_000000_create_failed_jobs_table', 3),
(9, '2021_07_15_202913_services', 3),
(11, '2021_07_18_061028_create_courses_table', 4),
(13, '2021_07_20_092057_create_projects_table', 5),
(14, '2021_07_24_103717_create_contacts_table', 6),
(15, '2021_07_24_202430_create_reviews_table', 7),
(17, '2014_10_12_000000_create_users_table', 9),
(18, '2021_07_25_195034_create_admins_table', 10),
(19, '2021_07_26_111657_create_galleries_table', 11);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_sort_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_long_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_sort_des`, `project_long_des`, `project_link`, `project_img`, `created_at`, `updated_at`) VALUES
(1, 'প্রজেক্ট 1', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(2, 'প্রজেক্ট 2', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(3, 'প্রজেক্ট 3', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(4, 'প্রজেক্ট 4', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(5, 'প্রজেক্ট 5', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(6, 'প্রজেক্ট 6', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(8, 'প্রজেক্ট 7', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL),
(9, 'প্রজেক্ট 8', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি', NULL, '#', 'images/poject.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `des`, `img`, `created_at`, `updated_at`) VALUES
(1, 'বিল গেটস', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'images/bill.jpg', NULL, NULL),
(2, 'Abu Bokkor', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'images/bill.jpg', NULL, NULL),
(3, 'AB Farhan', 'মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা', 'images/bill.jpg', NULL, '2021-07-24 17:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_sort_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_long_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_sort_des`, `service_long_des`, `service_img`, `created_at`, `updated_at`) VALUES
(1, 'আইটি কোর্স 1', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/knowledge.svg', NULL, NULL),
(2, 'সোর্স কোড 2', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/code.svg', NULL, '2021-07-19 08:48:59'),
(3, 'ইন্টারফেস 3', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/graphic.svg', NULL, '2021-07-17 07:00:49'),
(52, 'ইন্টারফেস 4', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/custom.svg', NULL, '2021-07-17 07:00:49'),
(58, 'ইন্টারফেস 50', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/code.svg', '2021-07-17 12:20:06', '2021-07-20 02:18:34'),
(61, 'ইন্টারফেস 6', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/custom.svg', '2021-07-20 02:25:47', NULL),
(62, 'ইন্টারফেস 7', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/code.svg', '2021-07-20 02:26:03', NULL),
(63, 'ইন্টারফেস 8', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/knowledge.svg', '2021-07-20 02:26:48', NULL),
(64, 'ইন্টারফেস 9', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/graphic.svg', '2021-07-20 02:27:09', NULL),
(66, 'ইন্টারফেস 11', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/knowledge.svg', '2021-07-20 02:27:37', NULL),
(67, 'ইন্টারফেস 11', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', NULL, 'images/graphic.svg', '2021-07-20 02:27:45', NULL);

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
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', '2021-07-20 05:20:27', NULL),
(2, '127.0.0.1', '2021-07-20 06:05:50', NULL),
(3, '127.0.0.1', '2021-07-20 06:06:06', NULL),
(4, '127.0.0.1', '2021-07-20 06:06:25', NULL),
(5, '127.0.0.1', '2021-07-20 06:07:18', NULL),
(6, '127.0.0.1', '2021-07-20 06:07:19', NULL),
(7, '127.0.0.1', '2021-07-20 06:07:25', NULL),
(8, '127.0.0.1', '2021-07-20 06:07:25', NULL),
(9, '127.0.0.1', '2021-07-20 06:07:44', NULL),
(10, '127.0.0.1', '2021-07-20 06:12:01', NULL),
(11, '127.0.0.1', '2021-07-20 06:12:12', NULL),
(12, '127.0.0.1', '2021-07-20 06:12:20', NULL),
(13, '127.0.0.1', '2021-07-20 15:00:47', NULL),
(14, '127.0.0.1', '2021-07-20 15:02:38', NULL),
(15, '127.0.0.1', '2021-07-23 13:21:38', NULL),
(16, '127.0.0.1', '2021-07-24 04:12:03', NULL),
(17, '127.0.0.1', '2021-07-24 04:40:23', NULL),
(18, '127.0.0.1', '2021-07-24 04:46:44', NULL),
(19, '127.0.0.1', '2021-07-24 04:50:36', NULL),
(20, '127.0.0.1', '2021-07-24 04:54:58', NULL),
(21, '127.0.0.1', '2021-07-24 04:55:08', NULL),
(22, '127.0.0.1', '2021-07-24 04:55:56', NULL),
(23, '127.0.0.1', '2021-07-24 04:56:04', NULL),
(24, '127.0.0.1', '2021-07-24 04:57:52', NULL),
(25, '127.0.0.1', '2021-07-24 04:58:19', NULL),
(26, '127.0.0.1', '2021-07-24 04:58:31', NULL),
(27, '127.0.0.1', '2021-07-24 05:00:59', NULL),
(28, '127.0.0.1', '2021-07-24 05:02:23', NULL),
(29, '127.0.0.1', '2021-07-24 05:03:02', NULL),
(30, '127.0.0.1', '2021-07-24 05:04:22', NULL),
(31, '127.0.0.1', '2021-07-24 05:04:38', NULL),
(32, '127.0.0.1', '2021-07-24 05:05:26', NULL),
(33, '127.0.0.1', '2021-07-24 05:06:35', NULL),
(34, '127.0.0.1', '2021-07-24 05:07:48', NULL),
(35, '127.0.0.1', '2021-07-24 05:08:27', NULL),
(36, '127.0.0.1', '2021-07-24 05:08:56', NULL),
(37, '127.0.0.1', '2021-07-24 05:09:30', NULL),
(38, '127.0.0.1', '2021-07-24 05:09:47', NULL),
(39, '127.0.0.1', '2021-07-24 05:10:09', NULL),
(40, '127.0.0.1', '2021-07-24 05:11:05', NULL),
(41, '127.0.0.1', '2021-07-24 05:12:13', NULL),
(42, '127.0.0.1', '2021-07-24 05:12:32', NULL),
(43, '127.0.0.1', '2021-07-24 05:13:03', NULL),
(44, '127.0.0.1', '2021-07-24 05:18:17', NULL),
(45, '127.0.0.1', '2021-07-24 06:08:23', NULL),
(46, '127.0.0.1', '2021-07-24 06:25:43', NULL),
(47, '127.0.0.1', '2021-07-24 06:25:54', NULL),
(48, '127.0.0.1', '2021-07-24 06:26:01', NULL),
(49, '127.0.0.1', '2021-07-24 06:26:17', NULL),
(50, '127.0.0.1', '2021-07-24 06:27:26', NULL),
(51, '127.0.0.1', '2021-07-24 06:27:37', NULL),
(52, '127.0.0.1', '2021-07-24 06:27:56', NULL),
(53, '127.0.0.1', '2021-07-24 06:28:29', NULL),
(54, '127.0.0.1', '2021-07-24 06:29:51', NULL),
(55, '127.0.0.1', '2021-07-24 06:30:04', NULL),
(56, '127.0.0.1', '2021-07-24 06:30:21', NULL),
(57, '127.0.0.1', '2021-07-24 06:36:45', NULL),
(58, '127.0.0.1', '2021-07-24 06:38:00', NULL),
(59, '127.0.0.1', '2021-07-24 06:38:22', NULL),
(60, '127.0.0.1', '2021-07-24 06:38:46', NULL),
(61, '127.0.0.1', '2021-07-24 06:39:21', NULL),
(62, '127.0.0.1', '2021-07-24 06:39:41', NULL),
(63, '127.0.0.1', '2021-07-24 06:41:07', NULL),
(64, '127.0.0.1', '2021-07-24 06:41:31', NULL),
(65, '127.0.0.1', '2021-07-24 06:43:36', NULL),
(66, '127.0.0.1', '2021-07-24 06:43:48', NULL),
(67, '127.0.0.1', '2021-07-24 06:44:01', NULL),
(68, '127.0.0.1', '2021-07-24 06:44:37', NULL),
(69, '127.0.0.1', '2021-07-24 06:44:53', NULL),
(70, '127.0.0.1', '2021-07-24 06:45:04', NULL),
(71, '127.0.0.1', '2021-07-24 06:45:25', NULL),
(72, '127.0.0.1', '2021-07-24 06:45:52', NULL),
(73, '127.0.0.1', '2021-07-24 06:46:00', NULL),
(74, '127.0.0.1', '2021-07-24 06:46:35', NULL),
(75, '127.0.0.1', '2021-07-24 06:47:01', NULL),
(76, '127.0.0.1', '2021-07-24 06:47:17', NULL),
(77, '127.0.0.1', '2021-07-24 06:47:45', NULL),
(78, '127.0.0.1', '2021-07-24 06:48:26', NULL),
(79, '127.0.0.1', '2021-07-24 06:48:43', NULL),
(80, '127.0.0.1', '2021-07-24 06:49:05', NULL),
(81, '127.0.0.1', '2021-07-24 06:49:16', NULL),
(82, '127.0.0.1', '2021-07-24 06:49:24', NULL),
(83, '127.0.0.1', '2021-07-24 06:49:34', NULL),
(84, '127.0.0.1', '2021-07-24 06:50:24', NULL),
(85, '127.0.0.1', '2021-07-24 06:50:48', NULL),
(86, '127.0.0.1', '2021-07-24 06:53:05', NULL),
(87, '127.0.0.1', '2021-07-24 06:54:40', NULL),
(88, '127.0.0.1', '2021-07-24 06:55:09', NULL),
(89, '127.0.0.1', '2021-07-24 06:55:49', NULL),
(90, '127.0.0.1', '2021-07-24 06:56:10', NULL),
(91, '127.0.0.1', '2021-07-24 07:02:30', NULL),
(92, '127.0.0.1', '2021-07-24 07:03:24', NULL),
(93, '127.0.0.1', '2021-07-24 07:04:03', NULL),
(94, '127.0.0.1', '2021-07-24 07:04:20', NULL),
(95, '127.0.0.1', '2021-07-24 07:05:24', NULL),
(96, '127.0.0.1', '2021-07-24 07:05:46', NULL),
(97, '127.0.0.1', '2021-07-24 07:05:56', NULL),
(98, '127.0.0.1', '2021-07-24 07:06:53', NULL),
(99, '127.0.0.1', '2021-07-24 07:07:26', NULL),
(100, '127.0.0.1', '2021-07-24 07:08:01', NULL),
(101, '127.0.0.1', '2021-07-24 07:08:23', NULL),
(102, '127.0.0.1', '2021-07-24 07:09:34', NULL),
(103, '127.0.0.1', '2021-07-24 07:09:42', NULL),
(104, '127.0.0.1', '2021-07-24 07:10:20', NULL),
(105, '127.0.0.1', '2021-07-24 12:46:21', NULL),
(106, '127.0.0.1', '2021-07-24 14:52:27', NULL),
(107, '127.0.0.1', '2021-07-24 15:02:21', NULL),
(108, '127.0.0.1', '2021-07-24 15:02:46', NULL),
(109, '127.0.0.1', '2021-07-24 17:19:22', NULL),
(110, '127.0.0.1', '2021-07-25 09:16:39', NULL),
(111, '127.0.0.1', '2021-07-25 09:43:59', NULL),
(112, '127.0.0.1', '2021-07-25 09:45:26', NULL),
(113, '127.0.0.1', '2021-07-25 09:45:33', NULL),
(114, '127.0.0.1', '2021-07-25 09:50:06', NULL),
(115, '127.0.0.1', '2021-07-25 09:50:09', NULL),
(116, '127.0.0.1', '2021-07-25 09:55:30', NULL),
(117, '127.0.0.1', '2021-07-25 10:12:40', NULL),
(118, '127.0.0.1', '2021-07-25 10:15:43', NULL),
(119, '127.0.0.1', '2021-07-25 12:12:39', NULL),
(120, '127.0.0.1', '2021-07-25 12:13:42', NULL),
(121, '127.0.0.1', '2021-07-25 12:29:20', NULL),
(122, '127.0.0.1', '2021-07-26 06:39:37', NULL),
(123, '127.0.0.1', '2021-07-26 08:57:54', NULL),
(124, '127.0.0.1', '2021-07-26 09:06:51', NULL),
(125, '127.0.0.1', '2021-07-26 09:07:03', NULL),
(126, '127.0.0.1', '2021-07-27 08:35:57', NULL),
(127, '127.0.0.1', '2021-07-28 14:36:01', NULL),
(128, '127.0.0.1', '2021-07-29 08:41:47', NULL),
(129, '127.0.0.1', '2021-07-29 16:03:56', NULL),
(130, '127.0.0.1', '2021-07-29 16:03:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
