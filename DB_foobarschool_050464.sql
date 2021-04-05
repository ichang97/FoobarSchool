-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2021 at 08:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foobarschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` char(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `class_name`, `room_no`) VALUES
(1, 'ป.1', '1'),
(2, 'ป.1', '2'),
(3, 'ป.2', '1'),
(4, 'ป.2', '2'),
(5, 'ป.2', '3'),
(6, 'ป.6', '1'),
(7, 'ป.6', '2'),
(8, 'ป.6', '3');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2021_04_03_034138_create_students_table', 1),
(17, '2021_04_03_034656_create_subjects_table', 1),
(18, '2021_04_03_034921_create_classrooms_table', 1),
(19, '2021_04_03_035220_create_student_courses_table', 1),
(20, '2021_04_03_035313_create_student_scores_table', 1),
(21, '2021_04_04_131744_add_subject_code', 2),
(22, '2021_04_04_152635_edit_student_scores_table', 3),
(23, '2021_04_04_153042_drop_in_student_scores', 4);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `code`, `classroom_id`, `created_at`, `updated_at`) VALUES
(2, 'ปีเตอร์', 'ณ บางขวาง', '202104032', 7, '2021-04-03 06:09:42', '2021-04-05 06:27:19'),
(5, 'ค่อม', 'ชวนชื่น', '202104035', 2, '2021-04-03 06:26:54', '2021-04-04 05:26:23'),
(7, 'Mark', 'Kenmuay', '202104047', 2, '2021-04-04 05:01:53', '2021-04-04 05:01:53'),
(8, 'แมว', 'เหมียว', '202104044', 6, '2021-04-04 08:22:22', '2021-04-04 08:22:22'),
(9, 'มวย', 'เหมียว', '202104045', 7, '2021-04-04 08:22:41', '2021-04-04 08:22:41'),
(10, 'เคน หมวย', 'เหมียว', '202104046', 7, '2021-04-04 08:22:55', '2021-04-05 06:27:32'),
(11, 'รวย', 'แซ่หลี', '202104047', 8, '2021-04-04 08:23:14', '2021-04-04 08:23:14'),
(12, 'ฮวด', 'แซ่หลี', '202104048', 8, '2021-04-04 08:23:32', '2021-04-04 08:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(2, 2, 8, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(3, 2, 10, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(4, 2, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(5, 2, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(6, 2, 12, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(7, 2, 11, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(8, 5, 5, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(9, 5, 9, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(10, 5, 10, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(11, 5, 1, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(12, 5, 6, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(13, 5, 11, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(14, 5, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(15, 7, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(16, 7, 4, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(17, 7, 1, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(18, 7, 12, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(19, 7, 5, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(20, 7, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(21, 7, 6, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(22, 8, 5, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(23, 8, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(24, 8, 3, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(25, 8, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(26, 8, 8, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(27, 8, 1, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(28, 8, 10, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(29, 9, 10, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(30, 9, 4, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(31, 9, 8, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(32, 9, 1, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(33, 9, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(34, 9, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(35, 9, 6, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(36, 10, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(37, 10, 8, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(38, 10, 6, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(39, 10, 9, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(40, 10, 3, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(41, 10, 1, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(42, 10, 5, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(43, 11, 8, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(44, 11, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(45, 11, 9, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(46, 11, 5, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(47, 11, 3, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(48, 11, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(49, 11, 11, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(50, 12, 8, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(51, 12, 7, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(52, 12, 6, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(53, 12, 12, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(54, 12, 1, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(55, 12, 4, '2021-04-05 05:47:15', '2021-04-05 05:47:15'),
(56, 12, 2, '2021-04-05 05:47:15', '2021-04-05 05:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_scores`
--

CREATE TABLE `student_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `score` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_code` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`) VALUES
(1, 'A001', 'ภาษาไทยเพื่อการสื่อสาร'),
(2, 'A002', 'คณิตศาสตร์สถิติ'),
(3, 'A003', 'จิตวิทยาเบื้องต้น'),
(4, 'B001', 'สุขศึกษาและพลศึกษา'),
(5, 'B002', 'เพศศึกษา'),
(6, 'C001', 'การงานอาชีพและเทคโนโลยี'),
(7, 'D001', 'สังคมศึกษา'),
(8, 'D002', 'ประวัติศาสตร์ไทยและต่างประเทศ'),
(9, 'S001', 'วิทยาศาสตร์เพื่อการดำรงชีวิต'),
(10, 'S002', 'ดาราศาสตร์'),
(11, 'E001', 'English for communication 1'),
(12, 'E002', 'English for communication 2');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MarkAyinomoto', 'mark@mail.com', NULL, '$2y$10$J.c3g2Zje6oy3iPQyX8rce6i3.MaHy8iVbf7InAygGFin3qgP9hG.', NULL, '2021-04-05 03:29:30', '2021-04-05 03:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_id_index` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id_index` (`id`),
  ADD KEY `students_classroom_id_index` (`classroom_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_courses_id_index` (`id`),
  ADD KEY `student_courses_student_id_index` (`student_id`),
  ADD KEY `student_courses_subject_id_index` (`subject_id`);

--
-- Indexes for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_scores_id_index` (`id`),
  ADD KEY `student_scores_course_id_index` (`course_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_id_index` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `student_scores`
--
ALTER TABLE `student_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
