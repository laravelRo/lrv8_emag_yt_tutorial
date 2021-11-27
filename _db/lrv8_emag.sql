-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 05:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrv8_emag`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_17_154934_create_staff_table', 2),
(5, '2021_09_18_134450_add_soft_delete_to_users_table', 3),
(6, '2021_09_29_155648_create_sections_table', 4);

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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'section.jpg',
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `promo` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `slug`, `name`, `description`, `photo`, `icon`, `position`, `active`, `promo`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'r-shoes', 'R-Shoes', 'The right shoes for your needs. Our running shop offers a wide range of neutral shoes, stability shoes, trail shoes, competition shoes, fitness shoes and sneakers.', 'R-Shoes_1634395904.jpg', 'fas fa-shoe-prints', 10, 1, 1, 'Running shoes', 'Running shoes at low prices and high quality', 'running shoes, neutral shoes, stability shoes, trail shoes, competition shoes', '2021-10-14 11:37:36', '2021-10-18 11:42:54'),
(2, 'r-clothes', 'R Clothes', 'New styles for running clothes! For performance and every day runner compression equipement, warm jackets for cold weather and dry vests for summer', 'RClothes_1634371003.jpg', 'fas fa-tshirt', 20, 1, 1, 'Running clothes', 'Running clothes for cold and warm weather, compresion socks in kackets, socks, underweare and more', 'runnig clothes, underwear, hoodies, jackets, shorts, compression', '2021-10-16 04:11:03', '2021-10-18 11:40:44'),
(3, 'r-accesories', 'R-Accesories', 'Accesories for making great your training and competions! Fitness accesories, running watches, towels, Bandages and tapes', 'R-Accesories_1634371024.jpg', 'fas fa-stopwatch', 30, 1, 1, 'Running accesories', 'Running accesories for performance and every day runner: watches, medical, fitness, lighting systems', 'running accesories, running watches, medical, fitness, lighting', '2021-10-16 04:18:39', '2021-10-21 11:02:19'),
(4, 'r-books', 'R-Books', 'Books and documentation for runners! Trainning, anatomy, mental, yoga and more for running', 'R-Books_1634371039.jpg', 'fas fa-book-reader', 40, 1, 0, 'Running books', 'Books and documentation for entuziast runners: science of trainning, anatomy, mental preparation, yoga and more', 'running books, anatomy, yoga, scrience of trainning', '2021-10-16 04:42:24', '2021-10-21 11:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'staff.jpg',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manager',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `phone`, `photo`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'manager', 'manager@emag.com', '$2y$10$/QCjjqEANP0qKhOsDWz4IOVNC9y5T/vgSnCHxIUg2GL7ReaYQ9bbu', NULL, 'staff.jpg', 'manager', NULL, '2021-08-19 11:40:00', '2021-08-19 11:40:00'),
(10, 'Dragulescu Maria', 'staff4@gmail.com', '$2y$10$RZdVs.4iue.CcX3xBHxXXuzarl2ovbzKZNYbvXtBc7QxlDp3E/J6S', '0733 544 263', 'DragulescuMaria_1630852885.jpg', 'editor', NULL, '2021-09-02 12:58:59', '2021-09-15 10:59:13'),
(13, 'Brdean Claudiu', 'staff_brad@gmail.com', '$2y$10$bSpJTCqjgslwR0qQraQvlePArUm2j/GQcM1FcOHx2ufTd29eImXN6', '0888 635 321', 'BrdeanClaudiu_1630851167.jpg', 'asistent', NULL, '2021-09-03 12:27:49', '2021-10-06 13:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'standard',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `type`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Dr. Katlyn Bosco', 'klocko.rudolph@example.net', '2021-09-09 03:22:53', 'premium', '$2y$10$.iVjtj9qFKwBrvRzcRBT3elLeiku1jIFRU4QnKob1K8eHjJZx9aVK', 'ldjgxdEmYn', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(3, 'Dr. Jane Reinger', 'boconnell@example.com', '2020-06-03 06:45:46', 'gold', '$2y$10$vZ1GU19nM0oEd4jWs33oeOZaGbhMK7Q/fjiFZ1da9b0UnIZxup5h2', 'LQSFmtiTUK', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(4, 'Mr. Candelario Herman', 'ahaag@example.net', '2021-09-21 11:35:26', 'standard', '$2y$10$.B/RbfWX6t4FBqaV4VYKquhto5GCXZ99i5uMe23DmrkZfBW7AT09y', 'albWwWMGzh', '2021-09-18 10:50:04', '2021-09-21 11:35:26', NULL),
(5, 'Miss Karolann Krajcik I', 'ellsworth.connelly@example.org', '2020-12-16 18:47:49', 'gold', '$2y$10$A8QCpwwiKfKyYok4X.QOHOkrqQzrDEw08Megrhud3Yk98VtbAUDVu', 'GYvgJqda7X', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(6, 'Rebekah Howe', 'wilfrid82@example.net', NULL, 'standard', '$2y$10$WZcWxvEHy7ljk.dsHOiDrOTti2iQvJxx.Ytg9yswRmBmQPTkYrWc.', 'fZmmwJs8YP', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(8, 'Susanna Ebert', 'shawna.morar@example.net', NULL, 'standard', '$2y$10$N6RzOsZqU.sqmzZLu1JRs.fl0LfrQ7429AvgDtSaibzfKIZNUnV5C', 'KG2Bc7PsUZ', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(9, 'Alfonso Parisian', 'ohara.jessyca@example.net', '2021-05-01 09:29:28', 'standard', '$2y$10$/M.OuebxrgTeVv505q0obOCq5DKrxcuqMQmn0674if4EVZ9D8mb5y', 'e8IQ0F02EvF3a8tZvHrH7RTPYFE6XvQ3eKhk9j0gcSSvLw5RS49yRk09Ad2A', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(10, 'Michale Fritsch', 'bradley.okuneva@example.net', NULL, 'premium', '$2y$10$y6jaJg7jopoTMq1oozguDuAjf8RZ9Rtf1VIkwdO01mhvfWFzCYy3u', 'BhcPy8F83J', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(11, 'Jeremy Rippin', 'torp.lia@example.org', NULL, 'standard', '$2y$10$UH/rAVUPSQt25nkTa8x9pO/3aqu8YeiZ6HMfSEr7M73nUrOxSF7X6', 'yP9ZRfCRSN', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(12, 'Dax White IV', 'gwaters@example.com', NULL, 'gold', '$2y$10$WUik6GiZSaYKb/6XcfSzMengcO8K4eWvRjIzfv9cwdaThvdyGYHZW', 'TbZFvVivtw', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(13, 'Prof. Lafayette Lang', 'ijohnston@example.org', NULL, 'standard', '$2y$10$gHoa6olJvmCJ.dQ9RVLsl.dvIgpuBPcSPcRQNNUtUbgInGeH2hXdO', 'PU0KoEe9J0', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(14, 'Kristofer Robel', 'macy99@example.org', NULL, 'gold', '$2y$10$q4K.KtI/DMjzhfZNi5W/x.S5/gW/5IYOrX4CLuoa61YNULDSDcwOS', 'Hyxoicsgrv', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(15, 'Louvenia Braun DVM', 'veda.quigley@example.com', '2020-09-15 07:40:02', 'gold', '$2y$10$3Szo43tax.zc7PJXVzcwq.NHtWo4sewEki.1jY8j.e6nkdrqqivhO', 'J9hLCG8Caz', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(16, 'Meggie Walter', 'myrna.hessel@example.com', NULL, 'gold', '$2y$10$qgcdkU0XZw/yj5ECwJ06yu9cNMjFFNQ.baGCRINQdD84/An9qVAHi', '1gT0MuWKkD', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(17, 'Mr. Griffin Macejkovic', 'dickens.houston@example.net', NULL, 'standard', '$2y$10$uJGM6/LxF3x7q3uTbiS8ReksYqVxTAPH4tQjRh4zv0v5PNCQVQ3pS', 'FzQ6b6SuTS', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(18, 'Prof. Orrin Tillman', 'vincent.bayer@example.net', '2019-12-07 06:58:25', 'premium', '$2y$10$PgQbF6paylGM9UMEVWdODOgh1tsW5GrUu0CgCT2MJ.kDLJFf18TFG', 'mijwx2525T', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(19, 'Miss Nelda Mertz', 'jtoy@example.net', '2021-09-21 11:32:38', 'gold', '$2y$10$RUig3q3wEMBf34Q3rIlKOuOk7Sxzp3t84e7PK2.ep57bViRC1Ju/.', 'mxfbYRYzoG', '2021-09-18 10:50:04', '2021-09-21 11:32:38', NULL),
(20, 'Armando Fahey', 'ajaskolski@example.org', '2021-09-21 11:26:38', 'gold', '$2y$10$hHLCkJaXsCSkTEhSVteWYeOLbXpgHZ/kyKzA9ha3ZH5GLM381J3Ly', 'eFrXIS26rJ', '2021-09-18 10:50:04', '2021-09-21 11:26:38', NULL),
(21, 'Monserrat Yundt DVM', 'krajcik.jewel@example.net', '2021-09-21 11:34:35', 'standard', '$2y$10$ep5wiLy0NEu2EV4VSpvkEen3aPNIhxYwdPBq5r7pa1sb4.C4gjxa.', 'Ol7iJcQph8', '2021-09-18 10:50:04', '2021-09-21 11:34:35', NULL),
(22, 'Aurore Kassulke', 'uklein@example.net', NULL, 'standard', '$2y$10$AfpXoMB9La5v7OxwlQAv0.F/D2ecAluAnd57Lz0QrQyeo5hXch6Im', 'bXEydBFN7G', '2021-09-18 10:50:04', '2021-09-21 11:46:04', NULL),
(23, 'Mr. Bradley Spencer', 'wmcglynn@example.org', '2021-07-19 20:26:52', 'gold', '$2y$10$YEAzTHaLyqxf5ZPs/xaM2OWC1Jo/meMT.e82P8ktxe7IqQPn5jDzu', 'Cgq1whxFUb', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(24, 'Prof. Lawrence Dooley', 'kunde.lilly@example.com', NULL, 'standard', '$2y$10$U9e6nySuN3M6DaQmRcJ9w.mf/BeeNZG.xvm5mJXPnnBxaqLnkRDsO', 'TUdBMEYnm1', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(25, 'Cathrine Franecki DVM', 'klein.jaylon@example.net', '2021-09-21 11:37:41', 'standard', '$2y$10$ZHircwj8/FkcQMxvP3zLwuWlWqo96/aQCECAGh.6lBOv47yl51Qpu', 'FY6fj8NHcY', '2021-09-18 10:50:04', '2021-09-21 11:37:41', NULL),
(26, 'Lavern Sauer', 'thompson.hannah@example.org', NULL, 'gold', '$2y$10$kZTHwKUAOPODcoTz5f0DyeY7m4fkUj8.5G3xRxZY5JQaF3lCsutHm', 'HbLRK2hBv0', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(27, 'Anna Hoeger', 'troy75@example.net', NULL, 'premium', '$2y$10$uMfmr6J3DxUm1NgYnGK2VuW9vKLlIjX6M4kqdyuuyNYKOhu1rkqG6', 'jEl4s75hlZ', '2021-09-18 10:50:04', '2021-10-21 11:27:22', NULL),
(28, 'Ms. Gloria Denesik', 'hsatterfield@example.com', '2021-03-06 20:16:10', 'premium', '$2y$10$mGU0R3AeSAS3Ijg4BJKL4ulOGIAyNoAQbFTFVLy5PyqeVf7xFQioC', 'TfHMa2RX7Q', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(29, 'Mrs. Pearline Murphy DVM', 'nolan.marlene@example.net', NULL, 'gold', '$2y$10$LxlKZiLfixZ73Vh54Y8lL.y7LQwRJ.nmwfArXUaFXksa1OOSF6N7u', '95n3jUb8Ux', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(30, 'Ms. Sabina Hyatt I', 'lnader@example.com', NULL, 'gold', '$2y$10$iDrbcuTsH/fffg/s5WIPZ.I/hZkwdNNjzoG.eOMeT6QVJeDpR.3W6', 'NfwcdwBuRg', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(31, 'Arne Bahringer', 'marques10@example.net', '2019-09-24 04:21:43', 'premium', '$2y$10$Re66u/3o8gHQWmvyc6..3uJTNrxp2C1XC8AUbB3tAjzX.jpFkPNJ.', '23vxvgjij3', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(32, 'Joel Hilpert', 'rosa.price@example.org', NULL, 'standard', '$2y$10$Kcp1OilEAeqStrRqpTM.x.eopneYvR7.y6P5y6EEyOnO9c6rZRL6.', '004rQyX8lp', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(33, 'Dr. Alyce Shanahan Jr.', 'ngerlach@example.net', '2020-05-17 16:51:26', 'standard', '$2y$10$zrBA8kCtPGDsATnjEc0JOOZVLoxHYHbfT5AIKIFg0P7gEWmxSHd6K', 'PpQfEQeLcn', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(34, 'Prof. Reyes Morar MD', 'kobe45@example.org', '2019-12-12 07:45:37', 'premium', '$2y$10$mxFp.ytowfISkl80aVFtce15HF3aphUqNKlE2/iUlqHY0EX9nHNuS', 'KerHny4Sku', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(35, 'Prof. Remington Schuster Jr.', 'rlang@example.org', NULL, 'gold', '$2y$10$Cy9icBMZH7l0weHPlSDkqucPsDb0Q48FveIm6m49BM6Ss1Plz7JZ2', 'muejqo0GHN', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(36, 'Mr. Furman Glover', 'brenna.hickle@example.net', '2021-09-21 11:34:22', 'standard', '$2y$10$4gI4SQVrALm6itxsNcHF6.7kx3p602QC9LOivTQtRu26Zhyg9q6ee', 'r8l9NIYPfo', '2021-09-18 10:50:04', '2021-09-21 11:34:22', NULL),
(37, 'Eladio Kris', 'beatty.drake@example.net', NULL, 'gold', '$2y$10$d4RbuANavkai5LEzs1jgouyxNcs8uy81iuThHXTeFYzymkmvZ2QlC', 'Fwgpu4hJQd', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(38, 'Russ Gulgowski III', 'payton56@example.net', '2019-10-22 17:33:24', 'premium', '$2y$10$BUw0d1o6F8dM.VmBm2hH5.dgcpwQNiszDkolVHEDjTSYWrdEqsy2u', 'BQ4HUJgzrk', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(39, 'Leanna Kuphal PhD', 'huels.sean@example.net', '2020-06-12 11:39:56', 'premium', '$2y$10$Eucv8bgCJYMrhdmFz.JU.ujqQyyr/7OgI5baZN1jxPRVkfYzBzvFq', '5U5vhUQVCG', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(40, 'Prof. Conrad Rau II', 'melany76@example.com', NULL, 'gold', '$2y$10$HhddEsIQwITjKF5Zi6z8c.eDt7WmevNK.goXXwTRI6l2lmm8Zcj5.', 'cI1SqmnfuD', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(41, 'Ms. Idell Kunze III', 'fohara@example.com', NULL, 'premium', '$2y$10$e0rCH9fKj5Nek.rRLLWngu025Glg1K9zUxgsL.6Ix4/rKfmA0c9na', 'fNmgggomZY', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(42, 'Dr. Jana Fisher', 'fritsch.marty@example.net', NULL, 'standard', '$2y$10$Ndgc.sJkg3eQnjnndEr5E.efKW8MbXzIlSNUw3dzotcZBp/fdT5IS', 'gwwMuwktnQ', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(43, 'Emanuel Schultz', 'rhoda82@example.net', '2019-11-15 06:17:42', 'premium', '$2y$10$0Na7qfFSH3GjPNrdnVDrBOcWxVCpVyjd3TGFrxXPh3ZFkAs8826pW', 'dJbgkqstwq', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(44, 'Dr. Gino Hoeger', 'edeckow@example.net', '2021-08-19 04:45:06', 'standard', '$2y$10$lyNluz34xsaxzqw1H2EKEu3uSM7jhWCkZE6BzSJa/qxgoG1A0c0ma', 'eOSLCyKZwC', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(45, 'Verda Lakin Sr.', 'yshields@example.org', '2020-11-11 16:24:10', 'premium', '$2y$10$r1WDQLyazgXCH94lbSyBweChkROcQ3w25MY2Hg7nyJ.QlnaG/rloW', 'rceZAdpnJd', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(46, 'Gaston Purdy', 'tferry@example.net', '2020-07-18 01:32:08', 'standard', '$2y$10$j.FacTElOCr4rcuTwSNDAuaXIPggZfRCpwmjN4Ggvkx8JGtGM8V4a', 'Twz1iXq8Ll', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(47, 'Miss Elise Weissnat', 'cummerata.lue@example.org', '2021-09-21 11:32:33', 'gold', '$2y$10$/Tg95fRBJBkJzRynsJkAKuwYAD/myDvd8TgD.IV7Xxbfin6aeeDmu', 'EeQuwrlpQL', '2021-09-18 10:50:04', '2021-09-21 11:32:33', NULL),
(48, 'Destiney Sipes', 'wilburn72@example.com', '2020-06-05 15:19:47', 'premium', '$2y$10$Jkg49J6o4.z0E4oVJ/i7QuhIEMtojU1Gb/PrClUprpyzIMTJrYvH6', 'kge0Ob5sC6', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(49, 'Gail Donnelly', 'shettinger@example.net', '2019-10-16 18:30:24', 'gold', '$2y$10$ywdebjnQ/W3CRscY/i2ER.cQD45o.OZYmSu8vVVGkY3h5xF0rrvz2', '5myh43rBY4', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(50, 'Prof. Kaleb Feeney MD', 'marguerite18@example.net', '2020-10-20 20:11:13', 'standard', '$2y$10$LbLbdZ/1T9nqn9OiVdbmAu7Xg7YNkiW0nbMEfEIahrnYpbUdDr6fe', 'tJR3UH17Jd', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(51, 'Arnoldo Auer', 'tyrel96@example.net', '2020-08-26 15:00:00', 'premium', '$2y$10$GY/HstCJGWkK/gLgpUwt/OOJtRC.gJ0T0BJzPhJfIxZ7SndtejIE6', 'IeIhbSWzi2', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(52, 'Fritz Breitenberg', 'oklein@example.com', NULL, 'premium', '$2y$10$eACdVoqNeEixcRFS6Am0yepVcPZZPx4GtLVLBMmK1oTNCaqHUYF2K', 'pUBj7EmDpk', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(53, 'Liana Hoeger', 'dubuque.lorenza@example.com', '2021-02-08 09:46:59', 'premium', '$2y$10$SddQKrDjaPCjlgXvs7nh2u1awZKAxAOxOQAIaANBNQpOSA.3XwlqC', 'rWnCrH9t65', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(55, 'Miss Aubree Klein IV', 'jenkins.dessie@example.org', NULL, 'standard', '$2y$10$/tGbYso8KB87WIsmrAiLJe/zDYAxo5mt/k2yhLYv42RKGVoGfsL26', 'mhwP9ps1q4', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(56, 'Marcelle Kris', 'doris68@example.net', NULL, 'premium', '$2y$10$YQqa.zl/7.T4qoFQCYttdu7i6s/G2JcpIrKHu5ThJxoH1KONBh6rq', 'uDvq6veQy9', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(57, 'Mr. Frank Jakubowski Sr.', 'neha90@example.org', '2021-09-21 11:30:31', 'gold', '$2y$10$3mrcCnfC9wsgQI68kKRX7uD83wZ3G2D8hmcfZEtBXf/Oys9Gxlscy', '3bPOX8HkQO', '2021-09-18 10:50:04', '2021-09-21 11:30:31', NULL),
(58, 'Bridgette Treutel', 'conroy.anthony@example.org', '2020-10-05 15:33:36', 'premium', '$2y$10$oVOrxbSEdYjRoIYS8G6XG.o7XoeHk9BS7HdiDs4Pk4Ah7J8vdS34W', 'lJHwc4lZXh', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(59, 'Meggie Klein', 'lesly.ortiz@example.net', '2019-10-14 22:49:22', 'gold', '$2y$10$JAl9rBKJHxTcA5OK3iUXU.TjYa1tl6cWZMb9FfM7sD9K0hVWcOoce', 'oTWt5Iinyk', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(60, 'Justen Howell', 'rod91@example.org', NULL, 'gold', '$2y$10$HVjW7jIAatq8fnLQxlUmCehRyIKjmQTkiMP7q85RsLSlB/whcsStC', 'hZVQ9uWhRH', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(61, 'Rickie Kohler', 'xkirlin@example.net', '2020-02-20 14:12:56', 'gold', '$2y$10$7OAse8WZTsqdWU6VgxD7aubKEcV9fksJ686iaIfSd7HPChZAXQuBW', 'o0Nw5mi1Y6', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(62, 'Dr. Lacy Gleason', 'qsteuber@example.org', '2021-06-01 13:58:24', 'premium', '$2y$10$BdAyErBO3KZwwS4PkJEaHeeQqJ4viiEMwY3tL6VazI0C4IcQlL9JG', '0BjC9lil2Y', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(63, 'Mya Ullrich V', 'rowan.hintz@example.com', '2020-10-30 13:54:09', 'gold', '$2y$10$00.sVdCYq74cMVc80G9z4uL13PwW6EkkTgxS64e.SmL1qZR3DyYIa', 'VaVV6mNclJ', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(64, 'Therese Larson', 'blick.wilbert@example.net', NULL, 'premium', '$2y$10$1AbGg3Gjg9hS032I2sHXWeMutuSphb.Ksswn2dWVPKF.leLI9H7iW', 'pz44oEM6Hb', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(65, 'Felipe Kovacek', 'zbeier@example.org', '2020-02-19 23:22:39', 'premium', '$2y$10$twQrjyqfCmdwbEBmv6C1ZueNp01JwgdL1yMRBNglBLjSToYiFRGTW', '3jA7CPKd4r', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(66, 'Marty Hill Jr.', 'ihoppe@example.com', '2020-06-21 16:02:03', 'gold', '$2y$10$nnwqlteFmgPe2cVRRcDn9eGgIefjjVJaJVGXmOG0P0Z853JDkyG86', 'CEHJdG8baR', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(67, 'Tavares Skiles Jr.', 'daija.murphy@example.com', NULL, 'gold', '$2y$10$1KI52co1.95NDUJeDlUy7O3G.7vQvsBlnVqCOw4gvUq3/ofqPJvmG', 'PIq70x7yFo', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(68, 'Grady Roberts', 'vhuel@example.org', '2020-02-29 15:47:50', 'standard', '$2y$10$M3ljLCwMjW1fJkzsKepTS.UVXOqkV164LubDSqiHCYy/Q6tKxzFpq', 'XBNfdI3Qp2', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(69, 'Prof. Naomi Brakus Jr.', 'rozella52@example.org', '2020-01-13 04:25:50', 'gold', '$2y$10$K2vTU7pzMerI6SMCe0QrZe7JOQA6kHHVVo4xWt614JFJZz27vTh8.', 'gcKqgi9CEv', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(70, 'Miss Cara Sipes Jr.', 'raul59@example.org', '2020-12-20 05:54:32', 'standard', '$2y$10$MC7elhQZKI9isferYB/dQ.On6GmP/R36FdzVlY6smMxY28MsLxPOq', 'E3AkN9jTQb', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(71, 'Gail Watsica', 'hand.zoila@example.org', '2021-04-29 15:10:56', 'standard', '$2y$10$i5Cp.euvmcg1tgW.2gnUju75gNuVsWyIQj9fBWz85wl8PzupDaVW2', 'K5tT9d0BsM', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(72, 'Jasmin Predovic III', 'schaefer.al@example.com', NULL, 'gold', '$2y$10$yeKPOHFUpJUTucAQ/fQrQ.obg7ZMfk08ffFJOOpUyvihvMdTJy/hi', 'obOIyyinUm', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(73, 'Madisen Dicki Sr.', 'reynolds.jessyca@example.net', '2020-06-16 12:27:39', 'standard', '$2y$10$rPHhMyyP287.EvuQ9oCTw./8VQAtStieHduWUBkt3VnJCtfXv0a.m', '9Vjrqn48CT', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(74, 'Prof. King Volkman', 'kendrick67@example.com', '2020-04-08 11:57:19', 'standard', '$2y$10$E4l/IGDwSa3t7ciLAUFz2uXZI5r2IgvYAxSr3fIKBJX2LOtS62Q/e', 'KjMnJHouBU', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(75, 'Orrin West', 'sedrick.beer@example.org', NULL, 'premium', '$2y$10$PrzO2Efs0f30L/yzwAZuxOiK5iLygXeT6VCDo7VDrRCw30PDg8X.O', 'C4VMvt2pg7', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(76, 'Dr. Felipa Mraz', 'pfeffer.chadrick@example.net', NULL, 'premium', '$2y$10$S35mKcfFmCoHvK6SjrgspeQrdBiUeVmF4YwtUXkzyLNmrT/nItS9i', 'ioe116KMaE', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(77, 'Easton Hermiston', 'hodkiewicz.stacy@example.org', NULL, 'gold', '$2y$10$O0m4ElOjR5UjxZCVo2KS2eYIM2tQf7ADDvyGRPh3ASi17sycVX4Aq', 'MMgfZn6QFg', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(78, 'Gwendolyn Lueilwitz', 'herman.josefina@example.com', NULL, 'standard', '$2y$10$saUCwfHWBtaS80j.vLRHn.Ko7QLCITskQoPvQOHZC3G25ZlzqX8ZW', 'riHti61kfo', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(79, 'Miss Susie Ritchie', 'jamil.beatty@example.net', '2020-12-10 00:44:45', 'premium', '$2y$10$w/k0qfjbWIt3nbuiYXrrVeCl6yNVlDiYy5JiTdywet/LjuY/5PUG2', '1iQnmfAcso', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(80, 'Dr. Vena McLaughlin DVM', 'witting.oswald@example.net', NULL, 'standard', '$2y$10$/4wFPq98kEfXDnV9WAGuzORik7PnDbTTj5Qnf/KxyDdwLUWG9lb0i', 'iMedoJTHzJ', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(81, 'Melba DuBuque', 'rodriguez.heather@example.net', '2020-05-19 10:04:02', 'premium', '$2y$10$366uAgkheU5Q4FbIAidQHO0LHoli0Qgkm2bQTgr5.LewkvuPgRMXW', 'mLOezy2gEh', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(82, 'Lilliana Cremin V', 'aurelie.kuhn@example.net', NULL, 'premium', '$2y$10$bWHWHWpdCW.kcndyXZc9Bez6sksN7HBD2kWNpJFIQp6Ml.4Bv9yAK', 'j8CCN4YxNT', '2021-09-18 10:50:04', '2021-09-21 11:13:17', '2021-09-21 11:13:17'),
(83, 'Major Bayer', 'utillman@example.org', NULL, 'premium', '$2y$10$.LblXpWUtsoM9kNjJ4xN3.7io2xEKbJ8BhwCLnWweYZidNn6/B17q', 'BAvcTKBPoB', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(84, 'Alfreda Medhurst', 'leannon.lyric@example.org', '2020-03-27 15:27:33', 'gold', '$2y$10$9kFdyK1/g3ey7weqwtwWseQghsnWC5a8iHNylw1DYZztWl09p01Ti', '0k0hpwBAHW', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(85, 'Lea Carroll', 'waylon.champlin@example.net', NULL, 'standard', '$2y$10$HOf2B/jpthBjTGY0KqwwmuFn.oqkptquaiHIi/mwiJD0Gy/dUEj9K', 'ehppPowM58', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(86, 'Leonie Purdy', 'bernier.ayla@example.net', NULL, 'gold', '$2y$10$d39WxQkE6rhi58XpXd8.eOO4LURhE5odYCymxPcLn3rxZ.uiOUAUi', 'MghSxzTH3d', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(87, 'Dr. Berniece Quigley', 'harmony.roberts@example.com', '2020-04-19 22:47:25', 'premium', '$2y$10$3.jDdfp3qvh.I9OVxnL5jugNk7J8IS7SoV1A/S12B4wmXt5lTvQQO', 'YY0QnUqzMv', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(88, 'Deron D\'Amore', 'maye.stanton@example.com', NULL, 'premium', '$2y$10$d/YrxJ4SS1dKW8fwCXarOeMUmABCQN34iuWQnTH02pVnufh9Rtie2', 'Si4dwOVQsd', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(89, 'Chaya Welch', 'krowe@example.org', '2021-06-02 08:00:04', 'gold', '$2y$10$zqDwVe6qTXpoVUMzZ2JBsuxK.bNzRywyveCJz4vIXMHQ5qGA/F2He', 'rrgngUAN0E', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(90, 'Tanya Zulauf', 'wdooley@example.com', '2019-11-25 19:41:39', 'gold', '$2y$10$yJ2x9oh8D81Odl.5skNbDeoPnVfHjSO4W4bUiBZ6SN9o.ZQyTaEaO', 'p2jgqgo0BJ', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(91, 'Velva Schneider', 'streich.zaria@example.net', NULL, 'gold', '$2y$10$qEieQn7vDiQSCVFgoWbCN.it1kO5ITJxJ25sgq9HWtUFpb9R0FJb.', 'kSTKGnkAWo', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(92, 'Ernesto McKenzie Sr.', 'stroman.jacques@example.com', NULL, 'standard', '$2y$10$DlqXvVV6UvyRcX.VZG0HJ.wWgrr4Sfq4kkdK7prjGU2l1/r.9mn8C', 'A0eaoUN0Cw', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(93, 'Dr. Lucio Brown', 'willa34@example.org', '2020-05-02 21:53:27', 'gold', '$2y$10$8f48.mdtfXd7INiihzPhU.qvx5GP0EpqoKLf18BRXaPkoEfVnEyNC', 'HH18XNN4sE', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(94, 'Aditya Raynor', 'reinger.bradford@example.org', '2021-02-06 07:09:31', 'gold', '$2y$10$.7p.LOvB/kBZd23cMcPtDOJsmRxM0LiP3ZyFTYFq8WrhL4X7MsLYC', 'Ouc6cMzdTg', '2021-09-18 10:50:04', '2021-09-22 10:45:28', NULL),
(95, 'Austin Streich', 'larkin.wilbert@example.org', '2021-09-21 11:29:17', 'standard', '$2y$10$Lr/huUFP0/tBIbccmppqMOE9Uw4J5jj59b8UxJ940hzVdbsDjE8vC', 'ol7An4uEvy', '2021-09-18 10:50:04', '2021-09-21 11:29:17', NULL),
(96, 'Craig Lueilwitz', 'labadie.andreane@example.net', '2021-09-21 11:29:24', 'premium', '$2y$10$PstkcTHsfw5WGxbl9gdv2.Sg9l4rYtJ1FD9eN4C0FnEyQhjmIjIFq', 'DOZ0muxr0E', '2021-09-18 10:50:04', '2021-09-21 11:29:24', NULL),
(97, 'Sydnie Mills III', 'kilback.gina@example.net', NULL, 'gold', '$2y$10$FfHQCs./aHXdxR69tgdSNenanXiwEsEiqOSzEGZY65hHCe6nj2dPO', '9UJ9s45712', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(98, 'Cielo Dickinson', 'florine.kreiger@example.net', '2020-10-26 21:23:40', 'premium', '$2y$10$Y/56oS/fxXd12Cps5LfF3uWWCwFniHeL/bppQ4olmICOa9YPJ8OYK', 'KRYCaUASKy', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(99, 'Ms. Gladyce Dickens', 'whowe@example.org', NULL, 'premium', '$2y$10$WHUpLomjiBwA/A8neQxhNeiMUdgt4T9TveGLSeuKRRAU.vYnU3cjW', 'KPM7FtBhh2', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(100, 'Jasper Wintheiser II', 'turcotte.jermain@example.org', '2021-06-03 07:53:19', 'standard', '$2y$10$dOEql3zbWnow7tDowj7ZLu8CmDl74iYcqxhgrEl/DA24Eu4.mesUy', '9gjxsxxIdJ', '2021-09-18 10:50:04', '2021-09-18 10:50:04', NULL),
(101, 'test', 'testclient@gmail.com', '2021-09-22 10:36:27', 'standard', '$2y$10$x6OY9MoYK25y6FAki19P/OHqANMWK/ldTY0qNwTc2pDb4NeVR5byG', NULL, '2021-09-22 10:35:37', '2021-09-22 10:37:34', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_slug_unique` (`slug`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
