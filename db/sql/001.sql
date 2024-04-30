DROP TABLE
IF
	EXISTS `admins`;
CREATE TABLE `admins` (
	`id` INT ( 11 ) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR ( 255 ) NOT NULL,
	`email` VARCHAR ( 255 ) NOT NULL,
	`password` CHAR ( 255 ) NOT NULL,
	`first_name` VARCHAR ( 255 ) DEFAULT NULL,
	`last_name` VARCHAR ( 255 ) DEFAULT NULL,
	`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP (),
	`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP () ON UPDATE CURRENT_TIMESTAMP (),
	PRIMARY KEY ( `id` ),
	UNIQUE KEY `username` ( `username` ),
	UNIQUE KEY `email` ( `email` ) 
);

INSERT INTO `admins` (`username`, `email`, `password`) VALUES ('admin', 'admin@gmail.com', '$2a$10$QaQ29CQZOMVFFQ1pvhLlWuifM60ON9VtUrVUUHZMRcifKQYMXMbCW');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
	`short_link` varchar(255) NOT NULL UNIQUE,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_category_parent` (`parent_id`),
  CONSTRAINT `fk_category_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
);

INSERT INTO `categories` (`title`, `parent_id`, `short_link`, `description`) VALUES ('mive', NULL, 'mive_category', NULL);
INSERT INTO `categories` (`title`, `parent_id`, `short_link`, `description`) VALUES ('sib', 1, 'sib_category', NULL);
INSERT INTO `categories` (`title`, `parent_id`, `short_link`, `description`) VALUES ('moz', 1, 'moz_category', NULL);
INSERT INTO `categories` (`title`, `parent_id`, `short_link`, `description`) VALUES ('sabzi', NULL, 'sabzi_category', NULL);
INSERT INTO `categories` (`title`, `parent_id`, `short_link`, `description`) VALUES ('mive khoshk', NULL, 'mivekhoshk_category', NULL);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `short_link` varchar(255) NOT NULL,
  `rial_price` decimal(20,2) DEFAULT NULL,
  `doller_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(2,2) DEFAULT 0 NOT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `is_special` boolean DEFAULT FALSE NOT NULL,
  `is_active` boolean DEFAULT TRUE NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_product_category_id` (`category_id`),
  CONSTRAINT `fk_product_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
);

ALTER TABLE `products` RENAME COLUMN `description` TO `short_description`;


INSERT INTO `kavian_trade`.`products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (1, 'موز', 'موز میوه خوبیست', `حاجی موزه موووووز`,'moz_khub', 1000000.00, 1.80, 0.00, '1', 'چابهار', 0, 1, 1, '2024-04-22 01:02:42', '2024-04-22 01:02:42');
INSERT INTO `kavian_trade`.`products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (2, 'سیب', 'سیب میوه خوبیست', `حاجی سیبه سیییییب`,'sib_khub', 400000.00, 0.80, 0.00, '1', 'خوی', 0, 1, 2, '2024-04-22 01:22:34', '2024-04-22 01:22:34');
INSERT INTO `kavian_trade`.`products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (3, 'پرتغال', 'پرتغال میوه خوبیست', `حاجی پرتغاله پرتغاااااال`,'por_khub', 800000.00, 1.20, 0.00, '1', 'شمال', 0, 1, 2, '2024-04-22 13:52:08', '2024-04-22 13:52:08');

DROP TABLE IF EXISTS `product_gallery`;
CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_main` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_product_gallery_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

INSERT INTO `kavian_trade`.`product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (1, 1, 'images/productsImages/banana_test_main.png', 1, '2024-04-22 01:04:03', '2024-04-22 01:04:03');
INSERT INTO `kavian_trade`.`product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (2, 1, 'images/productsImages/banana_test_1.png', 0, '2024-04-22 01:04:49', '2024-04-22 01:04:49');
INSERT INTO `kavian_trade`.`product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (3, 1, 'images/productsImages/banana_test_2.png', 0, '2024-04-22 01:05:04', '2024-04-22 01:05:04');

SELECT
	p.title,
	p.description,
	p.short_link,
	p.rial_price,
	p.doller_price,
	p.discount,
	p.grade,
	p.location,
	p.category_id,
	pg.image_url,
	pg.is_main 
FROM
	products AS p
	LEFT JOIN product_gallery AS pg ON p.id = pg.product_id 
WHERE
	`is_active` = 1;
	
	
SELECT
	p.title,
	p.description,
	p.short_link,
	p.rial_price,
	p.doller_price,
	p.discount,
	p.grade,
	p.location,
	p.category_id,
	CONCAT( '[', GROUP_CONCAT( CONCAT( '{ "image_url": "', pg.image_url, '", "is_main": ', pg.is_main, '}' )), ']' ) AS gallery 
FROM
	products AS p
	LEFT JOIN product_gallery AS pg ON p.id = pg.product_id 
GROUP BY
	p.id;