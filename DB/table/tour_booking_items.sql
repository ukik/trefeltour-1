# Host: localhost  (Version 5.7.33)
# Date: 2024-09-02 00:51:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tour_booking_items"
#

CREATE TABLE `tour_booking_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ETSB-uuid',
  `booking_uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ETSB-uuid',
  `booking_id` bigint(20) unsigned DEFAULT NULL,
  `customer_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `price_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'BADASO UI Kolom',
  `get_price` varchar(20) DEFAULT NULL COMMENT 'HPP Dewasa',
  `get_price_child` varchar(20) DEFAULT NULL COMMENT 'HPP Anak (2-6 tahun)',
  `get_discount` varchar(20) DEFAULT NULL COMMENT 'Diskon',
  `get_cashback` varchar(20) DEFAULT NULL COMMENT 'Cashback',
  `get_total_amount` varchar(20) DEFAULT NULL COMMENT 'Subtotal Dewasa',
  `get_total_amount_child` varchar(20) DEFAULT NULL COMMENT 'Subtotal Anak (2-6 tahun)',
  `get_total_amount_tour` varchar(20) DEFAULT NULL COMMENT 'Subtotal Peserta Tour',
  `quantity` int(6) DEFAULT '1',
  `stock` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'BADASO UI Kolom',
  `min_participant` int(3) DEFAULT NULL,
  `date_start` varchar(10) DEFAULT NULL,
  `participant_adult` int(2) DEFAULT '0' COMMENT 'Peserta Dewasa',
  `participant_young` int(2) DEFAULT '0' COMMENT 'Peserta Anak (2-6 tahun)',
  `hotel` varchar(200) DEFAULT NULL,
  `hotel_min_price` int(11) DEFAULT NULL COMMENT 'Harga Kamar Hotel (Terendah)',
  `hotel_max_price` int(11) DEFAULT NULL COMMENT 'Harga Kamar Hotel (Tertinggi)',
  `hotel_avg_price` int(11) DEFAULT NULL COMMENT 'Harga Kamar Hotel (Rata-rata)',
  `room_qty` int(11) DEFAULT NULL COMMENT 'Jumlah Kamar (Dipesan)',
  `room_budget` int(11) DEFAULT NULL COMMENT 'Budget Kamar (Dipesan)',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_table` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'TRMB-uuid',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `full_payment` decimal(20,0) unsigned DEFAULT NULL COMMENT 'Full Payment 100% (Biaya Tour & Kamar Hotel)',
  `dp_payment` decimal(20,0) unsigned DEFAULT NULL COMMENT 'DP Payment 30% (Biaya Tour & Kamar Hotel)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_uuid` (`booking_uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
