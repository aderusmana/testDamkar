-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for testdamkar
CREATE DATABASE IF NOT EXISTS `testdamkar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `testdamkar`;

-- Dumping structure for table testdamkar.absensis
CREATE TABLE IF NOT EXISTS `absensis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint unsigned NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('piket-hadir','cadangan-piket','lepas-piket','tidak-hadir') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_absen` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `absensis_anggota_id_foreign` (`anggota_id`),
  CONSTRAINT `absensis_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.absensis: ~5 rows (approximately)
INSERT INTO `absensis` (`id`, `anggota_id`, `keterangan`, `status`, `tanggal_absen`, `created_at`, `updated_at`) VALUES
	(20, 6, NULL, 'cadangan-piket', '2023-07-26', '2023-07-26 04:24:53', '2023-07-26 04:24:53'),
	(21, 7, NULL, 'lepas-piket', '2023-07-26', '2023-07-26 04:24:53', '2023-07-26 04:24:53'),
	(22, 8, NULL, 'piket-hadir', '2023-07-26', '2023-07-26 04:24:53', '2023-07-26 04:24:53'),
	(23, 9, 'IZIN', 'tidak-hadir', '2023-07-26', '2023-07-26 04:24:53', '2023-07-26 04:24:53'),
	(24, 11, NULL, 'piket-hadir', '2023-07-26', '2023-07-26 04:24:53', '2023-07-26 04:24:53');

-- Dumping structure for table testdamkar.anggotas
CREATE TABLE IF NOT EXISTS `anggotas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anggota',
  `jadwal_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anggotas_jadwal_id_foreign` (`jadwal_id`),
  CONSTRAINT `anggotas_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.anggotas: ~5 rows (approximately)
INSERT INTO `anggotas` (`id`, `nama`, `jabatan`, `jadwal_id`, `created_at`, `updated_at`) VALUES
	(6, 'abes', 'anggota', 1, '2023-06-26 07:19:43', '2023-07-26 02:40:15'),
	(7, 'ace', 'anggota', 2, '2023-07-26 07:19:57', '2023-07-26 07:19:58'),
	(8, 'ade', 'anggota', 3, '2023-07-26 07:20:14', '2023-07-26 07:20:15'),
	(9, 'afe', 'anggota', 4, '2023-07-26 07:20:46', '2023-07-26 07:20:46'),
	(11, 'JEK', 'anggota', 3, '2023-07-26 02:33:38', '2023-07-26 02:33:38');

-- Dumping structure for table testdamkar.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table testdamkar.jadwals
CREATE TABLE IF NOT EXISTS `jadwals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_piket` enum('A','B','C','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('piket-hadir','cadangan-piket','lepas-piket','tidak-hadir') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.jadwals: ~4 rows (approximately)
INSERT INTO `jadwals` (`id`, `kode_piket`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'A', 'piket-hadir', '2023-07-26 07:18:46', '2023-07-26 07:18:46'),
	(2, 'B', 'cadangan-piket', '2023-07-26 07:18:54', '2023-07-26 07:18:55'),
	(3, 'C', 'lepas-piket', '2023-07-26 07:19:06', '2023-07-26 07:19:07'),
	(4, 'D', 'tidak-hadir', '2023-07-26 07:19:16', '2023-07-26 07:19:16');

-- Dumping structure for table testdamkar.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_25_165048_create_jadwals_table', 1),
	(6, '2023_07_25_165126_create_anggotas_table', 1),
	(7, '2023_07_25_165144_create_absensis_table', 1),
	(8, '2023_07_26_051944_add_status_to_table_absensi', 2);

-- Dumping structure for table testdamkar.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.password_resets: ~0 rows (approximately)

-- Dumping structure for table testdamkar.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table testdamkar.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Pemimpin Kelompok','Pemimpin Apel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table testdamkar.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Udin', 'udin@gmail.com', 'kelompok', '$2y$10$y0mjIhcJbbd6va5lEIDYK.c1KkCqLRLHh8XLRCor8GEkXfofijJFG', 'Pemimpin Kelompok', NULL, '2023-07-26 05:13:19', '2023-07-26 05:13:20'),
	(2, 'udan', 'udan@gmail.com', 'apel', '$2y$10$y0mjIhcJbbd6va5lEIDYK.c1KkCqLRLHh8XLRCor8GEkXfofijJFG', 'Pemimpin Apel', NULL, '2023-07-26 05:13:51', '2023-07-26 05:13:51');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
