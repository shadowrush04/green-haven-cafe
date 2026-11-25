-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_green_haven_cafe
CREATE DATABASE IF NOT EXISTS `db_green_haven_cafe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_green_haven_cafe`;

-- Dumping structure for table db_green_haven_cafe.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.cache: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.jobs: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.job_batches: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kategoris_nama_kategori_unique` (`nama_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.kategoris: ~4 rows (approximately)
INSERT INTO `kategoris` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'Espresso Based', 'Minuman kopi berbasis espresso panas maupun dingin yang cocok untuk pecinta kopi.', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(2, 'Non-Coffee', 'Minuman cokelat, matcha, dan minuman segar lain nya.', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(3, 'Pastry & Snack', 'Makanan ringan pendamping kopi.', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(4, 'Foods', 'Makanan Berat yang sangat lezat dan berkualiatas.', '2026-11-24 07:46:20', '2026-11-24 07:46:20');

-- Dumping structure for table db_green_haven_cafe.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint unsigned NOT NULL,
  `kode_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `status` enum('tersedia','habis') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_kode_menu_unique` (`kode_menu`),
  KEY `menus_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `menus_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.menus: ~9 rows (approximately)
INSERT INTO `menus` (`id`, `kategori_id`, `kode_menu`, `nama_menu`, `harga`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'MN-001', 'Caffe Latte', 25000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(2, 1, 'MN-002', 'Iced Americano', 20000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(3, 2, 'MN-003', 'Matcha Latte', 28000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(4, 2, 'MN-004', 'Fresh Lime Squash', 20000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(5, 3, 'MN-005', 'Butter Croissant', 22000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(6, 3, 'MN-006', 'French Fries', 18000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(7, 3, 'MN-007', 'Cheese Cake', 22000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(8, 4, 'MN-008', 'Nasi Goreng', 25000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(9, 3, 'MN-009', 'Chicken Rice Bowl', 22000, 'tersedia', '2026-11-24 07:46:20', '2026-11-24 07:46:20');

-- Dumping structure for table db_green_haven_cafe.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_11_24_101501_create_kategoris_table', 1),
	(5, '2026_11_24_101510_create_menus_table', 1),
	(6, '2026_11_24_101518_create_pesanans_table', 1);

-- Dumping structure for table db_green_haven_cafe.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.pesanans
CREATE TABLE IF NOT EXISTS `pesanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `menu_id` bigint unsigned NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_meja` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` int NOT NULL,
  `status_pesanan` enum('diproses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pesanans_user_id_foreign` (`user_id`),
  KEY `pesanans_menu_id_foreign` (`menu_id`),
  CONSTRAINT `pesanans_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.pesanans: ~2 rows (approximately)
INSERT INTO `pesanans` (`id`, `user_id`, `menu_id`, `nama_pelanggan`, `nomor_meja`, `jumlah`, `total_harga`, `status_pesanan`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 'Albany', 4, 2, 50000, 'diproses', '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(2, 1, 2, 'Yusya', 7, 1, 20000, 'selesai', '2026-11-24 07:46:20', '2026-11-24 07:46:20');

-- Dumping structure for table db_green_haven_cafe.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.sessions: ~0 rows (approximately)

-- Dumping structure for table db_green_haven_cafe.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','kasir') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kasir',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_green_haven_cafe.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Cafe', 'adminHavenCafe@cafe.com', NULL, '$2y$12$nyOwE9as5tFTA303yri9teU0h9QW1rEiyO3nIBRv0ckZpKnQs7F0m', 'admin', NULL, '2026-11-24 07:46:20', '2026-11-24 07:46:20'),
	(2, 'Kasir Shift 1', 'kasircafeS1@cafe.com', NULL, '$2y$12$on.ScTAGXZCTUfdexSM2GuQLRxeii4LCvzW1tDcg0atxq/RfAtDia', 'kasir', NULL, '2026-11-24 07:46:20', '2026-11-24 07:46:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
