/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : kavian_trade

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 25/04/2024 22:47:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
BEGIN;
INSERT INTO `admins` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES (1, 'admin', 'admin@gmail.com', '$2a$10$QaQ29CQZOMVFFQ1pvhLlWuifM60ON9VtUrVUUHZMRcifKQYMXMbCW', NULL, NULL, '2024-04-21 18:47:08', '2024-04-21 18:47:08');
COMMIT;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `short_link` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_category_parent` (`parent_id`),
  CONSTRAINT `fk_category_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (1, 'میوه', NULL, 'fruits', 'دسته بندی میوه', '2024-04-25 15:05:38', '2024-04-25 15:05:38');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (2, 'سیب', 1, 'fruit_mive', 'انواع سیب ها', '2024-04-25 15:07:15', '2024-04-25 15:08:19');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (3, 'هندوانه', 1, 'fruit_watermelon', 'انواع هندوانه ها', '2024-04-25 15:08:11', '2024-04-25 15:08:11');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (4, 'صیفی جات', NULL, 'summerCrops', 'دسته بندی صیفی جات', '2024-04-25 15:17:49', '2024-04-25 15:17:49');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (5, 'گوجه فرنگی', 4, 'summerCrops_tomato', 'انواع گوجه فرنگی ها', '2024-04-25 15:53:55', '2024-04-25 15:53:55');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (6, 'بادمجان', 4, 'summerCrops_eggplant', 'انواع بادمجان ها', '2024-04-25 15:55:02', '2024-04-25 15:55:02');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (7, 'سیب زمینی', 4, 'summerCrops_potato', 'انواع سیب زمینی ها', '2024-04-25 15:55:47', '2024-04-25 15:55:47');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (8, 'پیاز', 4, 'summerCrops_onion', 'انواع پیاز ها', '2024-04-25 15:57:13', '2024-04-25 15:57:13');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (9, 'کاهو', 4, 'summerCrops_lettuce', 'انواع کدو ها', '2024-04-25 15:58:17', '2024-04-25 15:58:17');
INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES (10, 'فلفل', 4, 'summerCrops_pepper', 'اتواع فلفل ها', '2024-04-25 15:58:57', '2024-04-25 15:58:57');
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `short_link` varchar(255) NOT NULL,
  `rial_price` decimal(20,2) DEFAULT NULL,
  `doller_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(2,2) NOT NULL DEFAULT 0.00,
  `grade` varchar(2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `is_special` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_product_category_id` (`category_id`),
  CONSTRAINT `fk_product_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (1, 'گوجه فرنگی - کد ۴۱۲۹', 'مناسب کشت در گلخانه و فضای باز بوده و در رتبه بهترین بذر گوجه فرنگی قابل کشت در مناطق ...', 'مناسب کشت در گلخانه و فضای باز بوده و در رتبه بهترین بذر گوجه فرنگی قابل کشت در مناطق مختلف بخصوص جنوب کشور مانند هرمزگان، کرمان و جنوب استان فارس است. همچنین وزن محصول به ۲۲۰ گرم تا ۲۴۰ گرم میباشد و دربرابر بیماری ها بسیار مقاوم است.', 'tomato4129', NULL, NULL, 0.00, NULL, 'جنوب کشور', 0, 1, 5, '2024-04-25 16:27:40', '2024-04-25 16:34:15');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (2, 'گوجه فرنگی - کد ۸۳۲۰', 'مناسب کشت در فضای باز به شکل گرد بوده و سایز آن بین ۱۴۰ تا ۱۶۰ گرم ...', 'مناسب کشت در فضای باز به شکل گرد بوده و سایز آن بین ۱۴۰ تا ۱۶۰ گرم میباشد در مناطق جنوب کشور و بخصوص در بوشهر یافت و کشت میشود این نوع گوجه فرنگی نسبتا مقاوم به گرما بوده و همچنین پوشش برگی مناسب دارد.', 'tomato8320', NULL, NULL, 0.00, NULL, 'عمدتا بوشهر', 0, 1, 5, '2024-04-25 16:45:46', '2024-04-25 16:45:46');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (3, 'گوجه فرنگی - متین', 'مناسب کشت در فضای باز به شکل بلوکی تخم مرغی و بین ۱۴۰ تا ۱۶۰ گرم بوده ...', 'مناسب کشت در فضای باز به شکل بلوکی تخم مرغی و بین ۱۴۰ تا ۱۶۰ گرم بوده در گروه محصولات میان رس بوده و از سازگاری بالا به مناطق مختلف آب و هوایی برخوردار میباشد و این گوجه در اکثر مناطق ایران قابل کشت میباشد.', 'tomatomatin', NULL, NULL, 0.00, NULL, 'تمام ایران', 0, 1, 5, '2024-04-25 16:48:38', '2024-04-25 16:48:38');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (4, 'گوجه فرنگی - بریویو', 'مناسب کشت در فضای باز به شکل بلوکی و وزن متوسط مابین ۱۲۰ تا ۱۳۰ گرم میباشد ...', 'مناسب کشت در فضای باز به شکل بلوکی و وزن متوسط مابین ۱۲۰ تا ۱۳۰ گرم دارای میزان سختی بسیار خوب دارای دوره رسیدگی زودرس بوده و بصورت عمده در شهر شیراز کاشت میشود.', 'tomatoberyouyou', NULL, NULL, 0.00, NULL, 'شیراز', 0, 1, 5, '2024-04-25 17:12:24', '2024-04-25 17:12:24');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (5, 'پیاز - قرمز', 'پیاز قرمز یا ارغوانی مناسب خام خوری در مناطق گرم کشت میشود ...', 'پیاز قرمز یا ارغوانی مناسب خام خوری در مناطق گرم کشت شد و در شهرستان طارم، ری و آذرشهر به وفور یافت میشود به صورت ۴ فصل در ایران کشته شده در سال حدود ۲ میلیون تن از آن تولید میشود.', 'onionred', NULL, NULL, 0.00, NULL, 'طارم - ری - آذرشهر', 0, 1, 8, '2024-04-25 17:28:49', '2024-04-25 17:28:49');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (6, 'پیاز - سفید', 'پیاز سفید نوعی از پیاز خشک است که پوست و گوشت آن سفید و مزه آن ملایم و شیرین دارد ...', 'پیاز سفید نوعی از پیاز خشک است که پوست و گوشت آن سفید و مزه آن ملایم و شیرین دارد با توجه به میزان قند این پیاز دوره نگه داری آن در انبار کوتاه است و در شهرستان جیرفت یافت میشود.', 'onionwhite', NULL, NULL, 0.00, NULL, 'جیرفت', 0, 1, 8, '2024-04-25 17:33:31', '2024-04-25 17:33:31');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (7, 'پیاز - زرد', 'پیاز زرد نوعی از پیاز، با مزه و بوی تند است داخل آن سفید و پوست آن قهوه ای متمایل به زرد ...', 'پیاز زرد نوعی از پیاز، با مزه و بوی تند است داخل آن سفید و پوست آن قهوه ای متمایل به زرد دارد و در سراسر سال قابل کشت و دسترسی است و در استان های آذربایجان شرقی، اصفهان و فارس به صورت عموره یافت میشود.', 'onionyellow', NULL, NULL, 0.00, NULL, 'آذربایجان شرقی - اصفهان - فارس', 0, 1, 8, '2024-04-25 17:36:13', '2024-04-25 17:36:13');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (8, 'سیب - زرد', 'سیب زرد در مناطق که آب هوای معتدل دارند به عمل می آید  ...', 'سیب زرد در مناطق که آب هوای معتدل دارند به عمل می آید بهترین سیب زرد موجود در ایران سیب زرد لبنانی میباشد این میوه علاوه بر طعم بی نظیر دارای ویتامین B2, C و A و مواد معدنی مانند، آهن، کلسیم و پتاسیم است و برای بیماری فشار خون، نقرس و ... مفید است.', 'appleyellow', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 2, '2024-04-25 21:35:21', '2024-04-25 21:35:21');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (9, 'سیب - قرمز', 'سیب قرمز در منطقی که آب و هوای نسبتا سردی داشته باشند. به خوبی به عمل می آید  ...', 'سیب قرمز در منطقی که آب و هوای نسبتا سردی داشته باشند. به خوبی به عمل می آید این سیب علاوه بر طعم بی نظیر خواص درمانی نیز دارد در راه کم خونی، چربی سوزی وکاهش کلسترون خون از جمله خواص این میوه میباشد.', 'applered', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 2, '2024-04-25 21:37:52', '2024-04-25 21:37:52');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (10, 'هندوانه - B32', 'نوعی هندوانه با دوره رسیدگی زودرس بوده و به شکل بیضی میباشد ...', 'هندوانه B32 نوعی هندوانه با دوره رسیدگی زودرس بوده و به شکل بیضی میباشد، این واریته میوه ای به وزن ۱۶ الی ۱۲ کیلو گرم تولید میکنید که برای صادرات مناسب است هم چنین این داريته جهت حمل و نقل طولانی و صادرات به دلیل بوته ان بسیارقوی همراه با پوشش برگی خوبی که دارد برای این امر بسیار مفید است.', 'watermelonb32', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 3, '2024-04-25 21:49:33', '2024-04-25 21:49:33');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (11, 'هندوانه - بارکا', 'هندوانه باراکا نوعی هندوانه با دوره رسیدگی زودرس و به شکل گرد میباشد ...', 'هندوانه باراکا نوعی هندوانه با دوره رسیدگی زودرس و به شکل گرد میباشد این واریته میوه ای به وزن ۶ الی ۱۲ کیلوگرم را تولید میکند که برای صادرات مناسب است.', 'watermelonbaraka', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 3, '2024-04-25 21:51:34', '2024-04-25 21:51:34');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (12, 'بادمجان - قلمی', 'دارای فرم قلمی بوده و به رنگ سیاه براق با پوست صاف با نوک باریک ...', 'دارای فرم قلمی بوده و به رنگ سیاه براق با پوست صاف با نوک باریک و گلهای آن بنفش رنگ میباشد. این گیاه در مناطق گرم سیری و نیمه گرم سیری رشد میکند و ارتفاع آن به ۴۰ تا ۱۵۰ سانتی متر میرسد.', 'eggplantghalami', NULL, NULL, 0.00, NULL, 'گرم سیر ایران', 0, 1, 6, '2024-04-25 22:00:36', '2024-04-25 22:00:36');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (13, 'بادمجان - لامپی', 'بادمجان SV1574 دارای فرم لامپی به رنگ سیاه براق با پوست صاف است ...', 'بادمجان SV1574 دارای فرم لامپی به رنگ سیاه براق با پوست صاف است. در برابر گرما و بیماری های قارچی مقاوم بوده و قابلیت سازگاری با شرایط مختلف آب و هوایی را دارد و مناسب کاشت گلخانه ای و فضای باز میباشد. در سالهای اخیر در استان های کرمان و هرمزگان مورد کاشت قرار گرفته است.', 'eggplantlampi', NULL, NULL, 0.00, NULL, 'کرمان - هرمزگان', 0, 1, 6, '2024-04-25 22:04:03', '2024-04-25 22:04:03');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (14, 'کاهو - آیسبرگ', 'یک سبزی گرد و با نمک مانند کلم است با این تفاوت که ...', 'یک سبزی گرد و با نمک مانند کلم است با این تفاوت که بافتش مثل کاهو است و برگ های آن ترد است و سرشار از آب و سبزی کم کالری است و سرشار از ویتامین A، ویتامین K و فولات است.', 'lettuceiceberg', NULL, NULL, 0.00, NULL, 'مشخص نشده', 0, 1, 9, '2024-04-25 22:11:56', '2024-04-25 22:11:56');
INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES (15, 'کاهو - رومانو', 'این سبزی که مناطق کاشت آن دزفول و جهرم میباشد ...', 'این سبزی که مناطق کاشت آن دزفول و جهرم میباشد در میان ایرانی ها به اسم کاهو رسمی یا کاهو معمولی شناخته میشود دارای منابع غنی ویتامین A است.', 'lettuceromaine', NULL, NULL, 0.00, NULL, 'دزفول - جهرم', 0, 1, 9, '2024-04-25 22:16:54', '2024-04-25 22:16:54');
COMMIT;

-- ----------------------------
-- Table structure for product_gallery
-- ----------------------------
DROP TABLE IF EXISTS `product_gallery`;
CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_main` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_product_gallery_product_id` (`product_id`),
  CONSTRAINT `fk_product_gallery_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of product_gallery
-- ----------------------------
BEGIN;
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (1, 1, 'tomato_4129_001.jpg', 1, '2024-04-25 16:29:24', '2024-04-25 21:16:52');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (2, 2, 'tomato_8320_003.jpg', 0, '2024-04-25 21:16:41', '2024-04-25 21:16:41');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (3, 2, 'tomato_8320_002.jpg', 0, '2024-04-25 21:17:04', '2024-04-25 21:17:10');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (4, 2, 'tomato_8320_001.jpg', 1, '2024-04-25 21:17:25', '2024-04-25 21:17:25');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (5, 3, 'tomato_matin_001.jpg', 1, '2024-04-25 21:18:09', '2024-04-25 21:20:17');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (6, 4, 'tomato_beryouyou_001.jpg', 1, '2024-04-25 21:18:53', '2024-04-25 21:20:14');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (7, 5, 'onion_red_001.jpg', 1, '2024-04-25 21:19:44', '2024-04-25 21:20:10');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (8, 5, 'onion_red_002.jpg', 0, '2024-04-25 21:19:52', '2024-04-25 21:19:52');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (9, 7, 'onion_yellow_001.jpg', 1, '2024-04-25 21:23:25', '2024-04-25 21:23:25');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (10, 7, 'onion_yellow_002.jpg', 0, '2024-04-25 21:23:36', '2024-04-25 21:23:36');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (11, 6, 'onion_white_001.jpg', 1, '2024-04-25 21:24:12', '2024-04-25 21:24:12');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (12, 8, 'apple_yellow_001.jpg', 1, '2024-04-25 21:40:32', '2024-04-25 21:40:32');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (13, 8, 'apple_yellow_002.jpg', 0, '2024-04-25 21:40:40', '2024-04-25 21:40:40');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (14, 8, 'apple_yellow_003.jpg', 0, '2024-04-25 21:40:53', '2024-04-25 21:40:53');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (15, 8, 'apple_yellow_004.jpg', 0, '2024-04-25 21:41:01', '2024-04-25 21:41:01');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (16, 8, 'apple_yellow_005.jpg', 0, '2024-04-25 21:41:16', '2024-04-25 21:41:16');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (17, 8, 'apple_yellowred_001.jpg', 0, '2024-04-25 21:41:29', '2024-04-25 21:41:29');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (18, 9, 'apple_yellowred_001.jpg', 1, '2024-04-25 21:41:44', '2024-04-25 21:41:44');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (19, 8, 'apple_yellow_006.jpg', 0, '2024-04-25 21:53:06', '2024-04-25 21:53:06');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (20, 10, 'watermelon_b32_001.jpg', 1, '2024-04-25 21:54:31', '2024-04-25 21:55:43');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (21, 10, 'watermelon_b32_002.jpg', 0, '2024-04-25 21:54:37', '2024-04-25 21:55:47');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (22, 10, 'watermelon_b32_003.jpg', 0, '2024-04-25 21:54:44', '2024-04-25 21:56:12');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (23, 11, 'watermelon_baraka_001.jpg', 1, '2024-04-25 21:56:12', '2024-04-25 21:56:12');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (24, 12, 'eggplant_ghalami_001.jpg', 1, '2024-04-25 22:05:08', '2024-04-25 22:05:08');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (25, 12, 'eggplant_ghalami_002.jpg', 0, '2024-04-25 22:05:17', '2024-04-25 22:05:17');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (26, 13, 'eggplant_lampi_001.jpg', 1, '2024-04-25 22:06:42', '2024-04-25 22:06:42');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (27, 13, 'eggplant_lampi_002.jpg', 0, '2024-04-25 22:06:49', '2024-04-25 22:06:49');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (28, 13, 'eggplant_lampi_003.jpg', 0, '2024-04-25 22:06:57', '2024-04-25 22:06:57');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (29, 14, 'lettuce_iceberg_001.jpg', 1, '2024-04-25 22:16:29', '2024-04-25 22:16:29');
INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES (30, 15, 'lettuce_romaine_001.jpg', 1, '2024-04-25 22:16:55', '2024-04-25 22:17:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
