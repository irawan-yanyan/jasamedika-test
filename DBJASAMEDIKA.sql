/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.8-MariaDB : Database - dbjasamedika
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbjasamedika` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbjasamedika`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(11,'2019_12_05_091023_create_participants_table',8),
(12,'2019_12_05_091908_create_table_participants',9),
(13,'2019_12_05_092223_create__participants',10),
(15,'2019_12_19_081744_create_model_user_guses_table',11),
(16,'2020_01_28_062551_buat_tabel_kelurahan',12),
(17,'2020_01_28_153211_buat_tabel_pasien',13);

/*Table structure for table `model_user_guses` */

DROP TABLE IF EXISTS `model_user_guses`;

CREATE TABLE `model_user_guses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nami` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_user_guses` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('rianwp@gmail.com','$2y$10$97dh5If56GGXk.utkJsz3.DgrkNy41jr4DARN9KYKi9Xq03BPDvJe','2019-12-04 10:26:01'),
('shelly@gmail.com','$2y$10$q0HkW8ulTjCjrvy1We4CEOlzEEqWUVVfLyRQZokUhyfT7fBfDGVBq','2020-01-28 05:43:32');

/*Table structure for table `tbkelurahan` */

DROP TABLE IF EXISTS `tbkelurahan`;

CREATE TABLE `tbkelurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelurahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbkelurahan` */

insert  into `tbkelurahan`(`id`,`nama_kelurahan`,`nama_kecamatan`,`nama_kota`,`user_id`) values 
(1,'ciseureuh','regol','bandung',6),
(3,'sukatani1','plered2','purwakarta4',6),
(6,'cibiru hilir 3 pilar','cileunyi','bandung',6),
(7,'ancol','regol','bandung',6),
(12,'ciroyom','andir','bandung',6),
(13,'dangdeur','pasir jaya','sumedang',6),
(14,'ujung tandus','tandus','banten',6),
(15,'dahan jambu','kuncup','bali',6),
(16,'cipinang','cipinang mjuara','jakarta timur',6),
(17,'baranang siang','cikopo','cikampek',6),
(18,'jatiwaringin','pondok lapa','jakarta timur',6),
(19,'kebon gedang','cibangkong','bandung',6);

/*Table structure for table `tbpasien` */

DROP TABLE IF EXISTS `tbpasien`;

CREATE TABLE `tbpasien` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_pasien` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtrw` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin_pasien` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cetak_kartu` tinyint(1) DEFAULT NULL,
  `tanggallahir_pasien` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `genid_pasien` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbpasien` */

insert  into `tbpasien`(`id`,`nama_pasien`,`alamat_pasien`,`telp_pasien`,`rtrw`,`jeniskelamin_pasien`,`cetak_kartu`,`tanggallahir_pasien`,`user_id`,`kelurahan_id`,`genid_pasien`) values 
(4,'dini noviani','jl.riung bandung','0877545447','09/09','Wanita',NULL,'1979-01-16',8,15,'2001000004'),
(5,'sapta','jl.lampung','897978676','09/09','Pria',NULL,'1978-01-07',6,15,'2001000005'),
(7,'yuliyanti','jl.cimahi bandung 6','022-676678','02/09','Wanita',NULL,'1978-01-07',8,13,'2001000007'),
(8,'milya rosalina','jl. tubagus ismail','022-676678','09/09','Wanita',NULL,'1999-01-10',6,14,'2001000008'),
(9,'rismawan senja putra','jl. cimahi','022-8998877','09/02','Pria',NULL,'2020-01-09',6,12,'2001000009'),
(11,'santi susilawati','jalan abdi negara no 10','022-986446','09/03','Wanita',NULL,'1979-01-11',8,3,'2001000011'),
(12,'yeni suryani','babakan priangan 7','022-8909889','09/01','Wanita',NULL,'1989-01-07',8,13,'2001000012'),
(13,'Berry Prima','jl. Jakarta bandung','022-7413434','09/03','Pria',NULL,'1978-01-24',8,3,'2001000013'),
(14,'wikana pramulya','jl.teluk buyung kaler no.70 ndg','022-6343434','08/03','Pria',NULL,'1978-01-23',8,6,'2001000014'),
(15,'dadan ramdan','jl.lembang bdg','022-7213343','09/01','Pria',NULL,'1977-01-04',8,12,'2001000015'),
(16,'ucok','jl. tubagus 24','022-565555','07/07','Pria',NULL,'1972-01-28',6,12,'2001000016');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`jabatan`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(6,'yan yan irawan','rianwp@gmail.com','admin',NULL,'$2y$10$LAeeMCjw5kouW.SkYgDVNuN.93/fGhHM9WzN3tL88FYKan468Zu5q',NULL,'2019-12-07 01:55:59','2019-12-07 01:55:59'),
(7,'agus hermawan','agushermawan@gmail.com','operator',NULL,'$2y$10$eJV8cHaGRbo/arUpplD6M.BVCA0AKd7ImSgdyFySuHcAtMHMNtPUG',NULL,'2020-01-28 04:00:45','2020-01-28 04:00:45'),
(8,'shelly alfarinas','shelly@gmail.com','operator',NULL,'$2y$10$ubkCMge4HvrR3VKEMriQtuH2Xd/HA60tmZ2TTHAa/4eG71rWxEqk6',NULL,'2020-01-28 05:03:06','2020-01-28 05:03:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
