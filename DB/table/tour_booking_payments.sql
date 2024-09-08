# Host: localhost  (Version 5.7.33)
# Date: 2024-09-02 00:51:35
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tour_booking_payments"
#

CREATE TABLE `tour_booking_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(50) DEFAULT NULL,
  `booking_id` int(11) unsigned DEFAULT NULL,
  `booking_uuid` varchar(50) DEFAULT NULL,
  `booking_item_id` int(11) unsigned DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `customer_id` bigint(20) unsigned DEFAULT NULL,
  `quantity_sum` int(5) DEFAULT NULL,
  `coupon` int(11) DEFAULT '0',
  `dibayar` varchar(50) NOT NULL DEFAULT '' COMMENT 'full_payment,dp_payment',
  `dibayar_percent` varchar(50) NOT NULL DEFAULT '' COMMENT 'prosentase pembayaran',
  `status` enum('unpaid','authorize','capture','settlement','deny','pending','cancel','refund','partial_refund','chargeback','partial_chargeback','expire','failure') DEFAULT NULL COMMENT 'unpaid,authorize,capture,settlement,deny,pending,cancel,refund,partial_refund,chargeback,partial_chargeback,expire,failure',
  `first_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `snap_token` varchar(50) DEFAULT NULL,
  `payload` text COMMENT 'MIDTRANS Payment Notification URL*',
  `transaction_time` varchar(50) DEFAULT NULL,
  `transaction_status` enum('unpaid','authorize','capture','settlement','deny','pending','cancel','refund','partial_refund','chargeback','partial_chargeback','expire','failure') DEFAULT NULL COMMENT 'unpaid,authorize,capture,settlement,deny,pending,cancel,refund,partial_refund,chargeback,partial_chargeback,expire,failure',
  `transaction_id` varchar(50) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `status_code` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `gross_amount` decimal(20,0) DEFAULT NULL,
  `fraud_status` varchar(50) DEFAULT NULL,
  `code_table` varchar(50) DEFAULT NULL COMMENT 'TRMB-uuid',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
