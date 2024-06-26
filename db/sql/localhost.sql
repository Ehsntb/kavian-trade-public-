-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2024 at 12:35 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaviantr_websiteDB`
--
DROP DATABASE IF EXISTS `kaviantr_websiteDB`;
CREATE DATABASE IF NOT EXISTS `kaviantr_websiteDB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kaviantr_websiteDB`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$10$QaQ29CQZOMVFFQ1pvhLlWuifM60ON9VtUrVUUHZMRcifKQYMXMbCW', NULL, NULL, '2024-04-21 18:47:08', '2024-04-21 18:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `short_link` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `short_link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'میوه', NULL, 'fruits', 'دسته بندی میوه', '2024-04-25 15:05:38', '2024-04-25 15:05:38'),
(2, 'سیب', 1, 'fruit_mive', 'انواع سیب ها', '2024-04-25 15:07:15', '2024-04-25 15:08:19'),
(3, 'هندوانه', 1, 'fruit_watermelon', 'انواع هندوانه ها', '2024-04-25 15:08:11', '2024-04-25 15:08:11'),
(4, 'صیفی جات', NULL, 'summerCrops', 'دسته بندی صیفی جات', '2024-04-25 15:17:49', '2024-04-25 15:17:49'),
(5, 'گوجه فرنگی', 4, 'summerCrops_tomato', 'انواع گوجه فرنگی ها', '2024-04-25 15:53:55', '2024-04-25 15:53:55'),
(6, 'بادمجان', 4, 'summerCrops_eggplant', 'انواع بادمجان ها', '2024-04-25 15:55:02', '2024-04-25 15:55:02'),
(7, 'سیب زمینی', 4, 'summerCrops_potato', 'انواع سیب زمینی ها', '2024-04-25 15:55:47', '2024-04-25 15:55:47'),
(8, 'پیاز', 4, 'summerCrops_onion', 'انواع پیاز ها', '2024-04-25 15:57:13', '2024-04-25 15:57:13'),
(9, 'کاهو', 4, 'summerCrops_lettuce', 'انواع کدو ها', '2024-04-25 15:58:17', '2024-04-25 15:58:17'),
(10, 'فلفل', 4, 'summerCrops_pepper', 'اتواع فلفل ها', '2024-04-25 15:58:57', '2024-04-25 15:58:57'),
(11, 'گیلاس', 1, 'fruit_cherrygilas', 'انواع گیلاس ها', '2024-04-28 03:33:37', '2024-04-28 03:34:55'),
(12, 'آلبالو', 1, 'fruit_cherryalbalou', 'انواع آلبالو ها', '2024-04-28 03:33:37', '2024-04-28 03:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
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
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `short_description`, `long_description`, `short_link`, `rial_price`, `doller_price`, `discount`, `grade`, `location`, `is_special`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'گوجه فرنگی - کد ۴۱۲۹', 'مناسب کشت در گلخانه و فضای باز بوده و در رتبه بهترین بذر گوجه فرنگی قابل کشت در مناطق ...', 'مناسب کشت در گلخانه و فضای باز بوده و در رتبه بهترین بذر گوجه فرنگی قابل کشت در مناطق مختلف بخصوص جنوب کشور مانند هرمزگان، کرمان و جنوب استان فارس است. همچنین وزن محصول به ۲۲۰ گرم تا ۲۴۰ گرم میباشد و دربرابر بیماری ها بسیار مقاوم است.', 'tomato4129', NULL, NULL, 0.00, NULL, 'جنوب کشور', 0, 1, 5, '2024-04-25 16:27:40', '2024-04-25 16:34:15'),
(2, 'گوجه فرنگی - کد ۸۳۲۰', 'مناسب کشت در فضای باز به شکل گرد بوده و سایز آن بین ۱۴۰ تا ۱۶۰ گرم ...', 'مناسب کشت در فضای باز به شکل گرد بوده و سایز آن بین ۱۴۰ تا ۱۶۰ گرم میباشد در مناطق جنوب کشور و بخصوص در بوشهر یافت و کشت میشود این نوع گوجه فرنگی نسبتا مقاوم به گرما بوده و همچنین پوشش برگی مناسب دارد.', 'tomato8320', NULL, NULL, 0.00, NULL, 'عمدتا بوشهر', 0, 1, 5, '2024-04-25 16:45:46', '2024-04-25 16:45:46'),
(3, 'گوجه فرنگی - متین', 'مناسب کشت در فضای باز به شکل بلوکی تخم مرغی و بین ۱۴۰ تا ۱۶۰ گرم بوده ...', 'مناسب کشت در فضای باز به شکل بلوکی تخم مرغی و بین ۱۴۰ تا ۱۶۰ گرم بوده در گروه محصولات میان رس بوده و از سازگاری بالا به مناطق مختلف آب و هوایی برخوردار میباشد و این گوجه در اکثر مناطق ایران قابل کشت میباشد.', 'tomatomatin', NULL, NULL, 0.00, NULL, 'تمام ایران', 0, 1, 5, '2024-04-25 16:48:38', '2024-04-25 16:48:38'),
(4, 'گوجه فرنگی - بریویو', 'مناسب کشت در فضای باز به شکل بلوکی و وزن متوسط مابین ۱۲۰ تا ۱۳۰ گرم میباشد ...', 'مناسب کشت در فضای باز به شکل بلوکی و وزن متوسط مابین ۱۲۰ تا ۱۳۰ گرم دارای میزان سختی بسیار خوب دارای دوره رسیدگی زودرس بوده و بصورت عمده در شهر شیراز کاشت میشود.', 'tomatoberyouyou', NULL, NULL, 0.00, NULL, 'شیراز', 0, 1, 5, '2024-04-25 17:12:24', '2024-04-25 17:12:24'),
(5, 'پیاز - قرمز', 'پیاز قرمز یا ارغوانی مناسب خام خوری در مناطق گرم کشت میشود ...', 'پیاز قرمز یا ارغوانی مناسب خام خوری در مناطق گرم کشت شد و در شهرستان طارم، ری و آذرشهر به وفور یافت میشود به صورت ۴ فصل در ایران کشته شده در سال حدود ۲ میلیون تن از آن تولید میشود.', 'onionred', NULL, NULL, 0.00, NULL, 'طارم - ری - آذرشهر', 0, 1, 8, '2024-04-25 17:28:49', '2024-04-25 17:28:49'),
(6, 'پیاز - سفید', 'پیاز سفید نوعی از پیاز خشک است که پوست و گوشت آن سفید و مزه آن ملایم و شیرین دارد ...', 'پیاز سفید نوعی از پیاز خشک است که پوست و گوشت آن سفید و مزه آن ملایم و شیرین دارد با توجه به میزان قند این پیاز دوره نگه داری آن در انبار کوتاه است و در شهرستان جیرفت یافت میشود.', 'onionwhite', NULL, NULL, 0.00, NULL, 'جیرفت', 0, 1, 8, '2024-04-25 17:33:31', '2024-04-25 17:33:31'),
(7, 'پیاز - زرد', 'پیاز زرد نوعی از پیاز، با مزه و بوی تند است داخل آن سفید و پوست آن قهوه ای متمایل به زرد ...', 'پیاز زرد نوعی از پیاز، با مزه و بوی تند است داخل آن سفید و پوست آن قهوه ای متمایل به زرد دارد و در سراسر سال قابل کشت و دسترسی است و در استان های آذربایجان شرقی، اصفهان و فارس به صورت عموره یافت میشود.', 'onionyellow', NULL, NULL, 0.00, NULL, 'آذربایجان شرقی - اصفهان - فارس', 0, 1, 8, '2024-04-25 17:36:13', '2024-04-25 17:36:13'),
(8, 'سیب - زرد', 'سیب زرد در مناطق که آب هوای معتدل دارند به عمل می آید  ...', 'سیب زرد در مناطق که آب هوای معتدل دارند به عمل می آید بهترین سیب زرد موجود در ایران سیب زرد لبنانی میباشد این میوه علاوه بر طعم بی نظیر دارای ویتامین B2, C و A و مواد معدنی مانند، آهن، کلسیم و پتاسیم است و برای بیماری فشار خون، نقرس و ... مفید است.', 'appleyellow', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 2, '2024-04-25 21:35:21', '2024-04-25 21:35:21'),
(9, 'سیب - قرمز', 'سیب قرمز در منطقی که آب و هوای نسبتا سردی داشته باشند. به خوبی به عمل می آید  ...', 'سیب قرمز در منطقی که آب و هوای نسبتا سردی داشته باشند. به خوبی به عمل می آید این سیب علاوه بر طعم بی نظیر خواص درمانی نیز دارد در راه کم خونی، چربی سوزی وکاهش کلسترون خون از جمله خواص این میوه میباشد.', 'applered', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 2, '2024-04-25 21:37:52', '2024-04-25 21:37:52'),
(10, 'هندوانه - B32', 'نوعی هندوانه با دوره رسیدگی زودرس بوده و به شکل بیضی میباشد ...', 'هندوانه B32 نوعی هندوانه با دوره رسیدگی زودرس بوده و به شکل بیضی میباشد، این واریته میوه ای به وزن ۱۶ الی ۱۲ کیلو گرم تولید میکنید که برای صادرات مناسب است هم چنین این واريته جهت حمل و نقل طولانی و صادرات به دلیل بوته ان بسیارقوی همراه با پوشش برگی خوبی که دارد برای این امر بسیار مفید است.', 'watermelonb32', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 3, '2024-04-25 21:49:33', '2024-04-27 14:06:26'),
(11, 'هندوانه - بارکا', 'هندوانه باراکا نوعی هندوانه با دوره رسیدگی زودرس و به شکل گرد میباشد ...', 'هندوانه باراکا نوعی هندوانه با دوره رسیدگی زودرس و به شکل گرد میباشد این واریته میوه ای به وزن ۶ الی ۱۲ کیلوگرم را تولید میکند که برای صادرات مناسب است.', 'watermelonbaraka', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 3, '2024-04-25 21:51:34', '2024-04-25 21:51:34'),
(12, 'بادمجان - قلمی', 'دارای فرم قلمی بوده و به رنگ سیاه براق با پوست صاف با نوک باریک ...', 'دارای فرم قلمی بوده و به رنگ سیاه براق با پوست صاف با نوک باریک و گلهای آن بنفش رنگ میباشد. این گیاه در مناطق گرم سیری و نیمه گرم سیری رشد میکند و ارتفاع آن به ۴۰ تا ۱۵۰ سانتی متر میرسد.', 'eggplantghalami', NULL, NULL, 0.00, NULL, 'گرم سیر ایران', 0, 1, 6, '2024-04-25 22:00:36', '2024-04-25 22:00:36'),
(13, 'بادمجان - لامپی', 'بادمجان SV1574 دارای فرم لامپی به رنگ سیاه براق با پوست صاف است ...', 'بادمجان SV1574 دارای فرم لامپی به رنگ سیاه براق با پوست صاف است. در برابر گرما و بیماری های قارچی مقاوم بوده و قابلیت سازگاری با شرایط مختلف آب و هوایی را دارد و مناسب کاشت گلخانه ای و فضای باز میباشد. در سالهای اخیر در استان های کرمان و هرمزگان مورد کاشت قرار گرفته است.', 'eggplantlampi', NULL, NULL, 0.00, NULL, 'کرمان - هرمزگان', 0, 1, 6, '2024-04-25 22:04:03', '2024-04-25 22:04:03'),
(14, 'کاهو - آیسبرگ', 'یک سبزی گرد و با نمک مانند کلم است با این تفاوت که ...', 'یک سبزی گرد و با نمک مانند کلم است با این تفاوت که بافتش مثل کاهو است و برگ های آن ترد است و سرشار از آب و سبزی کم کالری است و سرشار از ویتامین A، ویتامین K و فولات است.', 'lettuceiceberg', NULL, NULL, 0.00, NULL, 'مشخص نشده', 0, 1, 9, '2024-04-25 22:11:56', '2024-04-25 22:11:56'),
(15, 'کاهو - رومانو', 'این سبزی که مناطق کاشت آن دزفول و جهرم میباشد ...', 'این سبزی که مناطق کاشت آن دزفول و جهرم میباشد در میان ایرانی ها به اسم کاهو رسمی یا کاهو معمولی شناخته میشود دارای منابع غنی ویتامین A است.', 'lettuceromaine', NULL, NULL, 0.00, NULL, 'دزفول - جهرم', 0, 1, 9, '2024-04-25 22:16:54', '2024-04-25 22:16:54'),
(16, 'سیب زمینی - جلی', 'نوعی سیب زمینی دیر رس است که از شهریور ماه تا مهر ماه بالغ میشود پوست آن زرد ...', 'نوعی سیب زمینی دیر رس است که از شهریور ماه تا مهر ماه بالغ میشود پوست آن زرد رنگ و گوشت ان زرد روشن است.\nغدد ان از نظر اندازه متوسط و بزرگ و بیضی شکل است ؛ به دلیل مقدار زیاد نشاسته سیب زمینی  جلی پس از پخت شکل ظاهری خود را از دست  میدهد و مناسب برای سرخ کردن میباشد.', 'potatojeli', NULL, NULL, 0.00, NULL, 'ابران', 0, 1, 7, '2024-04-27 14:13:54', '2024-04-27 14:35:03'),
(17, 'سیب زمینی - بامبا', 'نوعی سیب زمینی نیمه دیر رس بوده که رنگ گوشت ان زرد است و شکل ...', 'نوعی سیب زمینی نیمه دیر رس بوده که رنگ گوشت ان زرد است و شکل ظاهری ان تخم مرغی و کشیده است برای مصارف تازه خوری مناسب است  در مناطق کشت بهارانه و اردبیل به وفور یافت میشود.', 'potatobamba', NULL, NULL, 0.00, NULL, 'اردبیل - مناطق کشت بهارانه', 0, 1, 7, '2024-04-27 14:15:56', '2024-04-27 14:15:56'),
(18, 'سیب زمینی - آگریا', 'نوعی سیب زمینی دیر رس بوده و برای مصارف فرنچ فایزر کاربرد دارد ...', 'نوعی سیب زمینی دیر رس بوده و برای مصارف فرنچ فایزر کاربرد دارد و در مناطق کشت بهاره یافت میشود و از لحاظ ظاهری میتوان به اندازه بزرگ و بیضی شکل ان اشاره نمود.', 'potatoagaria', NULL, NULL, 0.00, NULL, 'مناطق کشت بهاره', 0, 1, 7, '2024-04-27 14:18:16', '2024-04-27 14:18:16'),
(19, 'فلفل - دلمه ای', 'رنگارنگ، مغذی و خوشمزه!', 'فلفل دلمه ای، این عضو محبوب خانواده بادمجان‌ها، با رنگ‌های شاد و طعم دلنشینش، نه تنها زینت‌بخش سفره‌هامان است، بلکه خواص بی‌نظیری برای سلامتی به ارمغان می‌آورد.\r\n\r\nاز ویتامین C گرفته تا بتاکاروتن و فیبر، فلفل دلمه ای گنجینه‌ای از مواد مغذی است که به تقویت سیستم ایمنی، سلامت چشم و دستگاه گوارش کمک می‌کند.\r\n\r\nطعم ملایم و شیرین فلفل دلمه ای، آن را به ماده‌ای ایده‌آل برای انواع سالادها، ساندویچ‌ها، خورش‌ها و پخت‌وپزها تبدیل کرده است.\r\n\r\nچه به صورت خام، چه پخته و یا حتی کبابی، فلفل دلمه ای طعمی دلچسب به هر غذایی می‌بخشد و آن را رنگین و زیبا می‌کند.\r\n\r\nبا مصرف فلفل دلمه ای، نه تنها از طعم لذیذ آن لذت می‌برید، بلکه به سلامتی خود نیز سرمایه‌گذاری می‌کنید.\r\n\r\nفلفل دلمه ای، هدیه‌ای خوشمزه و مغذی از طبیعت!', 'pepperbell', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 10, '2024-04-28 03:49:32', '2024-04-28 03:52:28'),
(20, 'فلفل - شمشیری', 'در سمنان، اصفهان و یزد کشت میشود به دو رنگ قرمز و سبز و به دو طعم شیرین و تند ...', 'در سمنان، اصفهان و یزد کشت میشود به دو رنگ قرمز و سبز و به دو طعم شیرین و تند موجود است و برای غذا و مصارف رستورانی کاربرد دارد.', 'peppershamshiri', NULL, NULL, 0.00, NULL, 'سمنان - اصفهان - یزد', 0, 1, 10, '2024-04-28 03:51:33', '2024-04-28 03:51:33'),
(21, 'فلفل - کاپی', 'در هرمزگان و قم کشت میشود و به ...', 'در هرمزگان و قم کشت میشود و به دو رنگ قرمز و سبز وجود دارد و طعم تندی دارد.', 'pepperkapi', NULL, NULL, 0.00, NULL, 'هرمزگان - قم', 0, 1, 10, '2024-04-28 03:53:55', '2024-04-28 03:53:55'),
(22, 'فلفل - قلمی', 'در قم، خوزستان و ورامین کشت میشود در ادویه جات و ترشیجات مصارف دارد و مناسب صادرات به دلیل ...', 'در قم، خوزستان و ورامین کشت میشود در ادویه جات و ترشیجات مصارف دارد و مناسب صادرات به دلیل میزان ماندگاری بالا و همچنین اگر در محل خشک و خنک نگهداری شود حالت خود را حفظ میکند و به رنگ قرمز و سبز موجود است.', 'pepperghalami', NULL, NULL, 0.00, NULL, 'قم - خوزستان - ورامین', 0, 1, 10, '2024-04-28 03:55:19', '2024-04-28 03:55:19'),
(23, 'گیلاس', 'میوه‌ای تابستانی، خوشمزه و پرخاصیت!', 'گیلاس، این میوه‌ی کوچک و دوست‌داشتنی با طعم ترش و شیرین، در فصل گرم تابستان، طراوت و شادابی را به سفره‌هامان هدیه می‌دهد.\r\n\r\nاما گیلاس فقط یک میوه‌ی خوشمزه نیست، بلکه منبع غنی از ویتامین‌ها، مواد معدنی و آنتی‌اکسیدان‌ها نیز می‌باشد.\r\n\r\nویتامین C موجود در گیلاس، سیستم ایمنی بدن را تقویت می‌کند و به مبارزه با بیماری‌ها کمک می‌کند.\r\n\r\nفیبر موجود در این میوه، به هضم غذا و سلامت دستگاه گوارش یاری می‌رساند.\r\n\r\nپتاسیم موجود در گیلاس، فشار خون را تنظیم کرده و از سلامت قلب محافظت می‌کند.\r\n\r\nگیلاس، به دلیل داشتن ملاتونین، خوابی آرام و راحت را به ارمغان می‌آورد.\r\n\r\nعلاوه بر این، گیلاس خاصیت ضد التهابی دارد و می‌تواند به کاهش درد مفاصل و عضلات کمک کند.\r\n\r\nاین میوه‌ی پرخاصیت را می‌توان به صورت تازه، خشک شده، آب‌میوه و یا در انواع دسرها و سالادها مصرف کرد.\r\n\r\nگیلاس، یک انتخاب عالی برای داشتن یک رژیم غذایی سالم و مغذی است.', 'cherrygilas', NULL, NULL, 0.00, NULL, 'ایران', 0, 1, 11, '2024-04-28 03:57:30', '2024-04-28 03:57:30'),
(24, 'آلبالو', 'ترش و شیرین تابستان!', 'آلبالو، این میوه‌ی کوچک و ترش و شیرین، با رنگ قرمز یاقوتی و طعمی بی‌نظیر، یکی از میوه‌های محبوب تابستان است. این میوه بومی آسیای غربی و اروپا است، اما در حال حاضر در سراسر جهان کشت می‌شود.\r\n\r\nآلبالو منبع خوبی از ویتامین‌ها و مواد معدنی از جمله ویتامین C، پتاسیم و فیبر است. همچنین حاوی آنتی‌اکسیدان‌هایی است که از بدن در برابر آسیب سلولی محافظت می‌کند. آلبالو فواید سلامتی زیادی دارد، از جمله:\r\n\r\nکاهش فشار خون: آلبالو به دلیل داشتن پتاسیم بالا می‌تواند به تنظیم فشار خون و کاهش خطر بیماری قلبی کمک کند.\r\nتقویت سیستم ایمنی: ویتامین C موجود در آلبالو به تقویت سیستم ایمنی بدن و کمک به مبارزه با عفونت‌ها کمک می‌کند.\r\nبهبود سلامت گوارش: فیبر موجود در آلبالو به هضم غذا و جلوگیری از یبوست کمک می‌کند.\r\nکاهش التهاب: آنتی‌اکسیدان‌های موجود در آلبالو به کاهش التهاب در بدن کمک می‌کنند که می‌تواند به پیشگیری از بیماری‌های مزمن مانند آرتریت و سرطان کمک کند.\r\nبهبود سلامت پوست: ویتامین C موجود در آلبالو به تولید کلاژن کمک می‌کند که برای سلامت و شادابی پوست ضروری است.\r\nآلبالو را می‌توان به روش‌های مختلفی از جمله تازه، یخ زده، خشک شده و آب‌میوه مصرف کرد. همچنین می‌توان از آنها برای تهیه مربا، کمپوت، ژله و شربت استفاده کرد.\r\n\r\nآلبالو یک میوه خوشمزه و مغذی است که فواید سلامتی زیادی دارد. آنها را به رژیم غذایی خود اضافه کنید تا از مزایای آنها بهره مند شوید.', 'cherryalbalou', NULL, NULL, 0.00, NULL, NULL, 0, 1, 12, '2024-04-28 03:58:48', '2024-04-28 03:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

DROP TABLE IF EXISTS `product_gallery`;
CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_main` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `image_url`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 1, 'tomato_4129_001.jpg', 1, '2024-04-25 16:29:24', '2024-04-25 21:16:52'),
(2, 2, 'tomato_8320_003.jpg', 0, '2024-04-25 21:16:41', '2024-04-25 21:16:41'),
(3, 2, 'tomato_8320_002.jpg', 0, '2024-04-25 21:17:04', '2024-04-25 21:17:10'),
(4, 2, 'tomato_8320_001.jpg', 1, '2024-04-25 21:17:25', '2024-04-25 21:17:25'),
(5, 3, 'tomato_matin_001.jpg', 1, '2024-04-25 21:18:09', '2024-04-25 21:20:17'),
(6, 4, 'tomato_beryouyou_001.jpg', 1, '2024-04-25 21:18:53', '2024-04-25 21:20:14'),
(7, 5, 'onion_red_001.jpg', 1, '2024-04-25 21:19:44', '2024-04-25 21:20:10'),
(8, 5, 'onion_red_002.jpg', 0, '2024-04-25 21:19:52', '2024-04-25 21:19:52'),
(9, 7, 'onion_yellow_001.jpg', 1, '2024-04-25 21:23:25', '2024-04-25 21:23:25'),
(10, 7, 'onion_yellow_002.jpg', 0, '2024-04-25 21:23:36', '2024-04-25 21:23:36'),
(11, 6, 'onion_white_001.jpg', 1, '2024-04-25 21:24:12', '2024-04-25 21:24:12'),
(12, 8, 'apple_yellow_001.jpg', 1, '2024-04-25 21:40:32', '2024-04-25 21:40:32'),
(13, 8, 'apple_yellow_002.jpg', 0, '2024-04-25 21:40:40', '2024-04-25 21:40:40'),
(14, 8, 'apple_yellow_003.jpg', 0, '2024-04-25 21:40:53', '2024-04-25 21:40:53'),
(15, 8, 'apple_yellow_004.jpg', 0, '2024-04-25 21:41:01', '2024-04-25 21:41:01'),
(16, 8, 'apple_yellow_005.jpg', 0, '2024-04-25 21:41:16', '2024-04-25 21:41:16'),
(17, 8, 'apple_yellowred_001.jpg', 0, '2024-04-25 21:41:29', '2024-04-25 21:41:29'),
(18, 9, 'apple_yellowred_001.jpg', 1, '2024-04-25 21:41:44', '2024-04-25 21:41:44'),
(19, 8, 'apple_yellow_006.jpg', 0, '2024-04-25 21:53:06', '2024-04-25 21:53:06'),
(20, 10, 'watermelon_b32_001.jpg', 1, '2024-04-25 21:54:31', '2024-04-25 21:55:43'),
(21, 10, 'watermelon_b32_002.jpg', 0, '2024-04-25 21:54:37', '2024-04-25 21:55:47'),
(22, 10, 'watermelon_b32_003.jpg', 0, '2024-04-25 21:54:44', '2024-04-25 21:56:12'),
(23, 11, 'watermelon_baraka_001.jpg', 1, '2024-04-25 21:56:12', '2024-04-25 21:56:12'),
(24, 12, 'eggplant_ghalami_001.jpg', 1, '2024-04-25 22:05:08', '2024-04-25 22:05:08'),
(25, 12, 'eggplant_ghalami_002.jpg', 0, '2024-04-25 22:05:17', '2024-04-25 22:05:17'),
(26, 13, 'eggplant_lampi_001.jpg', 1, '2024-04-25 22:06:42', '2024-04-25 22:06:42'),
(27, 13, 'eggplant_lampi_002.jpg', 0, '2024-04-25 22:06:49', '2024-04-25 22:06:49'),
(28, 13, 'eggplant_lampi_003.jpg', 0, '2024-04-25 22:06:57', '2024-04-25 22:06:57'),
(29, 14, 'lettuce_iceberg_001.jpg', 1, '2024-04-25 22:16:29', '2024-04-25 22:16:29'),
(30, 15, 'lettuce_romaine_001.jpg', 1, '2024-04-25 22:16:55', '2024-04-25 22:17:00'),
(32, 16, 'potato_all_1.jpg', 0, '2024-04-27 14:31:23', '2024-04-27 14:31:23'),
(33, 16, 'potato_all_2.jpg', 0, '2024-04-27 14:31:34', '2024-04-27 14:31:34'),
(34, 16, 'potato_all_3.jpg', 0, '2024-04-27 14:31:42', '2024-04-27 14:31:42'),
(35, 16, 'potato_all_4.jpg', 0, '2024-04-27 14:31:55', '2024-04-27 14:31:55'),
(36, 16, 'potato_all_5.jpg', 1, '2024-04-27 14:32:06', '2024-04-27 14:32:06'),
(37, 17, 'potato_all_1.jpg', 0, '2024-04-27 14:31:23', '2024-04-27 14:31:23'),
(38, 17, 'potato_all_2.jpg', 0, '2024-04-27 14:31:34', '2024-04-27 14:31:34'),
(39, 17, 'potato_all_3.jpg', 0, '2024-04-27 14:31:42', '2024-04-27 14:31:42'),
(40, 17, 'potato_all_4.jpg', 0, '2024-04-27 14:31:55', '2024-04-27 14:31:55'),
(41, 17, 'potato_all_5.jpg', 1, '2024-04-27 14:32:06', '2024-04-27 14:32:06'),
(42, 18, 'potato_all_1.jpg', 0, '2024-04-27 14:31:23', '2024-04-27 14:31:23'),
(43, 18, 'potato_all_2.jpg', 0, '2024-04-27 14:31:34', '2024-04-27 14:31:34'),
(44, 18, 'potato_all_3.jpg', 0, '2024-04-27 14:31:42', '2024-04-27 14:31:42'),
(45, 18, 'potato_all_4.jpg', 0, '2024-04-27 14:31:55', '2024-04-27 14:31:55'),
(46, 18, 'potato_all_5.jpg', 1, '2024-04-27 14:32:06', '2024-04-27 14:32:06'),
(47, 24, 'cherry_albalou_001.jpg', 1, '2024-04-28 04:00:51', '2024-04-28 04:00:51'),
(48, 24, 'cherry_albalou_002.jpg', 0, '2024-04-28 04:01:52', '2024-04-28 04:01:52'),
(49, 24, 'cherry_albalou_003.jpg', 0, '2024-04-28 04:02:12', '2024-04-28 04:02:12'),
(50, 24, 'cherry_albalou_004.jpg', 0, '2024-04-28 04:02:26', '2024-04-28 04:02:26'),
(51, 23, 'cherry_gilas_001.jpg', 1, '2024-04-28 04:03:05', '2024-04-28 04:03:05'),
(52, 23, 'cherry_gilas_002.jpg', 0, '2024-04-28 04:03:44', '2024-04-28 04:03:44'),
(53, 23, 'cherry_gilas_003.jpg', 0, '2024-04-28 04:03:44', '2024-04-28 04:03:44'),
(54, 23, 'cherry_gilas_004.jpg', 0, '2024-04-28 04:03:44', '2024-04-28 04:03:44'),
(55, 23, 'cherry_gilas_005.jpg', 0, '2024-04-28 04:03:44', '2024-04-28 04:03:44'),
(56, 19, 'pepper_bell_001.jpg', 1, '2024-04-28 04:04:17', '2024-04-28 04:04:17'),
(57, 22, 'pepper_ghalami_001.jpg', 1, '2024-04-28 04:04:37', '2024-04-28 04:04:37'),
(58, 21, 'pepper_kapi_001.jpg', 1, '2024-04-28 04:04:59', '2024-04-28 04:04:59'),
(60, 20, 'pepper_shamshiri_001.jpg', 1, '2024-04-28 04:05:22', '2024-04-28 04:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_parent` (`parent_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category_id` (`category_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_gallery_product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_category_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `fk_product_gallery_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
