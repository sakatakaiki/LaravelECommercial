-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 08:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(3, 'T-Shirts', 'Collection of various stylish T-Shirts.'),
(4, 'Hoodies', 'Comfortable and warm hoodies for all occasion'),
(5, 'Pants', 'Fashionable and trendy pants for casual wear.'),
(6, 'Accessories', 'Various accessories to complete your look.'),
(7, 'Footwear', 'Stylish footwear for every adventure.'),
(8, 'Jeans', 'Stylish jeans for every occasion.'),
(9, 'Socks', 'Comfortable socks in various colors.'),
(10, 'Belts', 'Fashionable belts to enhance your outfit.'),
(11, 'Jackets', 'Trendy jackets for different seasons.'),
(12, 'Bags', 'Versatile bags for everyday use.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_03_06_160525_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `created_at`, `user_id`) VALUES
(1, 'GfsGV1fgE', 'finished', '2024-09-07 02:29:53', 1),
(3, 'GfsGV1fgT', 'finished', '2024-09-07 02:39:16', 1),
(6, 'UQEfB7pNRb', 'finished', '2024-09-27 15:59:19', 16),
(7, 'ARW00ro0dW', 'pending', '2024-09-30 13:55:24', 8),
(8, 'kmv7xYXrwJ', 'pending', '2024-09-30 13:56:11', 4),
(9, 'FaG3MIOacs', 'pending', '2024-09-30 13:57:08', 18);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1066, 5, 13),
(5, 3, 1062, 5, 58),
(7, 6, 1092, 4, 57),
(8, 6, 1075, 2, 41),
(9, 7, 1058, 2, 0.13),
(10, 7, 20, 1, 82.74),
(11, 7, 42, 2, 81.13),
(12, 8, 1049, 1, 13.53),
(13, 8, 1068, 5, 70.44),
(14, 9, 1049, 4, 13.53),
(15, 9, 1036, 3, 83.5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `view` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `thumbnail`, `price`, `quantity`, `category_id`, `created_at`, `view`) VALUES
(4, 'Cartoon Astronauts T-Shirt', 'Cool T-Shirt with cartoon astronauts', 'images/product-images/product-image6-1.jpg', 28, 300, 11, '2024-09-25 17:12:52', 497),
(5, 'Cartoon Cats T-Shirt', 'Fun T-Shirt featuring cartoon cats', 'images/product-images/product-image29.jpg', 26, 252, 12, '2024-09-25 17:12:53', 714),
(6, 'Cartoon Dogs T-Shirt', 'Cute T-Shirt with cartoon dogs', 'images/product-images/product-image30.jpg', 28, 150, 11, '2024-09-25 17:12:54', 181),
(7, 'Cartoon Dinosaurs T-Shirt', 'Colorful T-Shirt with cartoon dinosaurs', 'images/product-images/product-image9.jpg', 29, 350, 4, '2024-09-25 17:12:55', 464),
(8, 'Cartoon Superheroes T-Shirt', 'Superhero themed cartoon T-Shirt', 'images/product-images/product-image6.jpg', 31, 400, 5, '2024-09-25 17:12:56', 775),
(9, 'Cartoon Space T-Shirt', 'T-Shirt with cartoon space themes', 'images/product-images/product-image3.jpg', 27, 150, 8, '2024-09-25 17:12:57', 583),
(10, 'Cartoon Unicorns T-Shirt', 'Magical T-Shirt with cartoon unicorns', 'images/product-images/product-image47.jpg', 32, 180, 12, '2024-09-25 17:12:58', 489),
(11, 'Cartoon Monsters T-Shirt', 'Funny T-Shirt with cartoon monsters', 'images/product-images/product-image23.jpg', 25, 220, 3, '2024-09-25 17:12:59', 597),
(12, 'Cartoon Robots T-Shirt', 'T-Shirt featuring cute cartoon robots', 'images/product-images/product-image27.jpg', 23, 260, 4, '2024-09-25 17:13:00', 518),
(14, 'Cartoon Fairies T-Shirt', 'T-Shirt featuring enchanting cartoon fairies', 'images/product-images/product-image38.jpg', 28, 280, 5, '2024-09-25 17:13:02', 935),
(15, 'Cartoon Animals T-Shirt', 'Adorable T-Shirt with various cartoon animals', 'images/product-images/product-image47.jpg', 24, 350, 8, '2024-09-25 17:13:03', 681),
(16, 'Cartoon Flowers T-Shirt', 'Floral T-Shirt with cartoon flowers', 'images/product-images/product-image21.jpg', 26, 200, 3, '2024-09-25 17:13:04', 499),
(17, 'Cartoon Pirates T-Shirt', 'T-Shirt with cartoon pirates design', 'images/product-images/product-image7-1.jpg', 31, 220, 4, '2024-09-25 17:13:05', 352),
(18, 'Cartoon Knights T-Shirt', 'Medieval themed T-Shirt with cartoon knights', 'images/product-images/product-image45.jpg', 22, 290, 5, '2024-09-25 17:13:06', 164),
(19, 'Cartoon Wizards T-Shirt', 'T-Shirt featuring magical wizards', 'images/product-images/product-image41.jpg', 33, 310, 11, '2024-09-25 17:13:07', 564),
(20, 'Awesome Wooden Bottle', 'Quibusdam cum quae ut autem ut.', 'images/product-images/product-image18.jpg', 82.74, 10, 8, '2024-09-16 21:36:52', 992),
(21, 'Small Wool Plate', 'Facere doloribus ad fugit laborum qui possimus aliquid.', 'images/product-images/product-image18.jpg', 98.19, 13, 9, '2024-09-16 02:33:29', 956),
(22, 'Enormous Aluminum Computer', 'Est eos autem sit.', 'images/product-images/product-image36.jpg', 15.95, 54, 8, '2024-09-23 21:29:46', 391),
(23, 'Heavy Duty Linen Computer', 'Sunt laborum omnis laboriosam at laborum amet qui.', 'images/product-images/product-image25.jpg', 17.55, 100, 4, '2024-09-25 06:56:25', 60),
(24, 'Gorgeous Wool Car', 'Accusantium esse et minima deleniti minima beatae et.', 'images/product-images/product-image16.jpg', 47.76, 91, 6, '2024-09-14 14:01:58', 635),
(25, 'Enormous Silk Watch', 'Repellat totam at velit et quos.', 'images/product-images/product-image4.jpg', 99.73, 9, 3, '2024-09-18 05:01:07', 188),
(26, 'Practical Wool Shirt', 'Enim aut et sit suscipit commodi et et.', 'images/product-images/product-image23.jpg', 82.73, 1, 5, '2024-09-19 18:01:04', 549),
(27, 'Small Rubber Pants', 'Saepe laudantium commodi molestiae.', 'images/product-images/product-image3.jpg', 88.33, 50, 9, '2024-09-23 07:46:32', 231),
(28, 'Incredible Bronze Car', 'Possimus sit voluptatem id ex atque.', 'images/product-images/product-image44.jpg', 49.29, 17, 3, '2024-09-14 19:23:45', 921),
(29, 'Mediocre Iron Lamp', 'Earum error modi sit.', 'images/product-images/product-image10.jpg', 13.71, 45, 5, '2024-09-25 12:26:59', 819),
(30, 'Enormous Aluminum Computer', 'Et quas saepe eveniet odio quo consequatur.', 'images/product-images/product-image20.jpg', 89.68, 62, 4, '2024-09-20 15:40:38', 44),
(31, 'Durable Iron Watch', 'Similique est exercitationem est quibusdam.', 'images/product-images/product-image18.jpg', 25.73, 19, 4, '2024-09-17 07:33:14', 403),
(32, 'Heavy Duty Wool Plate', 'Dolorum molestiae sit non.', 'images/product-images/product-image31.jpg', 52.85, 44, 6, '2024-09-20 22:15:39', 574),
(33, 'Ergonomic Paper Chair', 'Qui et eaque dolores impedit illum.', 'images/product-images/product-image50.jpg', 72.27, 70, 10, '2024-09-23 20:52:52', 467),
(34, 'Heavy Duty Aluminum Gloves', 'Beatae velit quo magni.', 'images/product-images/product-image6.jpg', 6.53, 61, 6, '2024-09-19 15:32:56', 67),
(35, 'Small Silk Coat', 'Soluta ut et impedit nihil atque cum aliquid.', 'images/product-images/product-image32.jpg', 13.08, 6, 6, '2024-09-24 09:45:39', 400),
(36, 'Synergistic Wooden Hat', 'Nulla sequi quasi aut.', 'images/product-images/product-image39.jpg', 33.07, 16, 4, '2024-09-19 07:31:36', 837),
(37, 'Incredible Rubber Knife', 'Nisi sit occaecati.', 'images/product-images/product-image48.jpg', 55.71, 47, 8, '2024-09-24 22:26:36', 101),
(38, 'Fantastic Leather Plate', 'Maiores velit facere autem et suscipit.', 'images/product-images/product-image25.jpg', 72.4, 24, 10, '2024-09-17 14:18:19', 805),
(39, 'Ergonomic Marble Pants', 'Nam nihil numquam eum voluptatem.', 'images/product-images/product-image29.jpg', 27.05, 20, 9, '2024-09-24 12:33:50', 711),
(40, 'Ergonomic Paper Table', 'Sint impedit qui aut amet sapiente ducimus iure.', 'images/product-images/product-image19.jpg', 72.89, 58, 6, '2024-09-18 07:50:36', 388),
(41, 'Aerodynamic Wooden Keyboard', 'Voluptatem et quis ut autem nihil expedita.', 'images/product-images/product-image6.jpg', 0.47, 84, 6, '2024-09-22 03:59:06', 61),
(42, 'Awesome Silk Wallet', 'Ab sint enim.', 'images/product-images/product-image23.jpg', 81.13, 22, 7, '2024-09-24 17:14:57', 541),
(43, 'Aerodynamic Wooden Gloves', 'Omnis mollitia quia fuga a.', 'images/product-images/product-image48.jpg', 22.51, 25, 5, '2024-09-24 18:44:27', 639),
(44, 'Incredible Wooden Wallet', 'Velit consequatur quia.', 'images/product-images/product-image20.jpg', 58.65, 55, 3, '2024-09-23 12:48:02', 543),
(45, 'Rustic Wooden Knife', 'Omnis officiis voluptas possimus asperiores autem ab.', 'images/product-images/product-image6.jpg', 21.63, 64, 9, '2024-09-19 14:39:16', 416),
(46, 'Ergonomic Iron Plate', 'Voluptatem est molestiae.', 'images/product-images/product-image19.jpg', 0.77, 15, 9, '2024-09-21 08:12:06', 842),
(47, 'Rustic Wool Chair', 'Veniam unde earum autem voluptas et.', 'images/product-images/product-image28.jpg', 19.52, 6, 10, '2024-09-16 12:40:02', 878),
(48, 'Sleek Wool Knife', 'Est est eum inventore.', 'images/product-images/product-image30.jpg', 85.69, 43, 10, '2024-09-25 10:16:21', 24),
(49, 'Aerodynamic Granite Knife', 'Omnis dicta dolor.', 'images/product-images/product-image19.jpg', 15.77, 42, 8, '2024-09-20 19:31:31', 17),
(50, 'Lightweight Steel Hat', 'Quos non autem ad molestiae.', 'images/product-images/product-image1.jpg', 3.76, 6, 4, '2024-09-18 13:31:46', 99),
(1020, 'Gorgeous Cotton Gloves', 'Sint id cupiditate rerum.', 'images/product-images/product-image48.jpg', 30.77, 55, 4, '2024-09-23 04:13:50', 938),
(1021, 'Synergistic Iron Bottle', 'Et culpa blanditiis qui delectus.', 'images/product-images/product-image35.jpg', 96.35, 43, 6, '2024-09-19 09:13:56', 559),
(1022, 'Practical Paper Gloves', 'Sed dolores dolorum doloremque qui labore.', 'images/product-images/product-image32.jpg', 54.19, 5, 4, '2024-09-28 01:08:51', 551),
(1023, 'Practical Silk Lamp', 'Officia sunt necessitatibus omnis aut quas facilis.', 'images/product-images/product-image6.jpg', 17.03, 38, 12, '2024-09-19 11:39:55', 154),
(1024, 'Enormous Linen Watch', 'Modi nostrum ut magni voluptates aperiam omnis eum.', 'images/product-images/product-image33.jpg', 6.3, 35, 6, '2024-09-21 12:40:00', 687),
(1025, 'Heavy Duty Concrete Table', 'Quaerat vero dicta.', 'images/product-images/product-image47.jpg', 59.55, 63, 7, '2024-09-27 18:50:07', 700),
(1026, 'Rustic Linen Hat', 'Voluptatem amet facilis sint ipsum aliquam aut.', 'images/product-images/product-image36.jpg', 43.27, 25, 7, '2024-09-25 04:18:11', 329),
(1027, 'Awesome Bronze Car', 'Consequuntur ducimus totam minima atque vitae quaerat possimus.', 'images/product-images/product-image38.jpg', 59.74, 50, 5, '2024-09-25 10:02:22', 850),
(1028, 'Durable Wooden Car', 'In fuga voluptas autem ut omnis quia.', 'images/product-images/product-image31.jpg', 39, 27, 8, '2024-09-19 02:54:04', 863),
(1029, 'Rustic Cotton Bench', 'Rerum eos voluptatem nobis at.', 'images/product-images/product-image42.jpg', 67.65, 3, 10, '2024-09-20 22:12:20', 450),
(1030, 'Mediocre Iron Gloves', 'Est delectus ullam sed enim voluptates alias corporis.', 'images/product-images/product-image14.jpg', 69.98, 51, 3, '2024-09-24 23:11:57', 405),
(1031, 'Synergistic Wool Wallet', 'Facilis nisi est ratione sit voluptatibus dolorem.', 'images/product-images/product-image43.jpg', 61.77, 44, 8, '2024-09-25 12:09:34', 805),
(1032, 'Sleek Iron Coat', 'Vitae aliquam quos aut nobis.', 'images/product-images/product-image25.jpg', 93.86, 100, 9, '2024-09-19 19:09:33', 772),
(1033, 'Intelligent Bronze Plate', 'Architecto eum iste dolore eos rerum dolore magni.', 'images/product-images/product-image43.jpg', 32.65, 78, 3, '2024-09-18 03:37:24', 729),
(1034, 'Fantastic Concrete Wallet', 'Tenetur optio rerum sunt neque exercitationem.', 'images/product-images/product-image39.jpg', 10.35, 61, 8, '2024-09-21 09:40:44', 786),
(1035, 'Intelligent Wool Clock', 'Facere at nihil eaque debitis fugit.', 'images/product-images/product-image17.jpg', 27.87, 79, 5, '2024-09-29 14:09:14', 638),
(1036, 'Incredible Steel Hat', 'Laborum perspiciatis autem voluptates nam est veniam.', 'images/product-images/product-image18.jpg', 83.5, 100, 10, '2024-09-20 12:08:05', 37),
(1037, 'Rustic Bronze Keyboard', 'Aut doloremque dignissimos sint aut quae.', 'images/product-images/product-image37.jpg', 94.86, 83, 4, '2024-09-18 04:59:12', 905),
(1038, 'Rustic Silk Car', 'Ea occaecati est molestias qui.', 'images/product-images/product-image30.jpg', 43.75, 63, 5, '2024-09-23 13:49:37', 191),
(1039, 'Fantastic Plastic Car', 'At provident a ipsam id autem.', 'images/product-images/product-image38.jpg', 29.03, 79, 4, '2024-09-19 10:22:32', 841),
(1040, 'Awesome Silk Pants', 'Sunt adipisci provident et.', 'images/product-images/product-image49.jpg', 63.59, 39, 10, '2024-09-21 00:12:18', 788),
(1041, 'Heavy Duty Plastic Keyboard', 'Illo recusandae excepturi.', 'images/product-images/product-image33.jpg', 11.02, 17, 3, '2024-09-27 21:46:25', 212),
(1042, 'Intelligent Wooden Pants', 'Repellendus velit qui rerum dolores temporibus.', 'images/product-images/product-image17.jpg', 93.03, 85, 4, '2024-09-18 11:04:37', 624),
(1043, 'Small Granite Wallet', 'Vel iusto molestias.', 'images/product-images/product-image37.jpg', 14.82, 73, 6, '2024-09-26 21:35:26', 240),
(1044, 'Awesome Copper Knife', 'Nostrum voluptas id sit quae ut sequi quisquam.', 'images/product-images/product-image32.jpg', 5.72, 41, 4, '2024-09-24 23:20:37', 547),
(1045, 'Mediocre Marble Table', 'Sint dolor hic eum quo suscipit.', 'images/product-images/product-image47.jpg', 38.54, 91, 8, '2024-09-28 03:33:55', 205),
(1046, 'Rustic Steel Keyboard', 'Et facilis velit quas quas et.', 'images/product-images/product-image40.jpg', 81.06, 87, 10, '2024-09-24 19:20:42', 605),
(1047, 'Small Wooden Bottle', 'Et in id velit sit fugiat omnis et.', 'images/product-images/product-image10.jpg', 83.72, 17, 4, '2024-09-19 04:17:40', 468),
(1048, 'Practical Plastic Bag', 'Aut libero sapiente dolorem quod tempora tempora.', 'images/product-images/product-image28.jpg', 99.85, 23, 8, '2024-09-29 05:39:13', 25),
(1049, 'Aerodynamic Plastic Keyboard', 'Sunt blanditiis ut reprehenderit corporis velit.', 'images/product-images/product-image10.jpg', 13.53, 82, 7, '2024-09-29 15:11:28', 746),
(1050, 'Practical Rubber Shoes', 'Voluptas impedit neque sunt.', 'images/product-images/product-image14.jpg', 92.9, 14, 6, '2024-09-21 03:47:26', 997),
(1051, 'Practical Concrete Coat', 'Ab doloremque sapiente molestiae deleniti aliquam voluptas.', 'images/product-images/product-image42.jpg', 42.82, 32, 3, '2024-09-27 22:06:13', 381),
(1052, 'Mediocre Wool Bench', 'Consequatur rem ex.', 'images/product-images/product-image18.jpg', 55.82, 48, 8, '2024-09-23 20:33:37', 696),
(1053, 'Fantastic Iron Plate', 'Perspiciatis et nobis ut.', 'images/product-images/product-image12.jpg', 80.99, 63, 4, '2024-09-19 10:05:55', 237),
(1054, 'Heavy Duty Granite Bottle', 'Temporibus eos est nam itaque.', 'images/product-images/product-image8.jpg', 25.45, 37, 7, '2024-09-21 07:46:01', 779),
(1055, 'Synergistic Leather Bench', 'Quia maiores quibusdam voluptatum vero quaerat.', 'images/product-images/product-image50.jpg', 48.33, 56, 3, '2024-09-28 15:41:11', 292),
(1056, 'Lightweight Iron Bottle', 'Eveniet ut commodi ut expedita rerum eos quis.', 'images/product-images/product-image29.jpg', 16.24, 27, 8, '2024-09-28 04:33:59', 336),
(1057, 'Aerodynamic Linen Chair', 'Praesentium fuga asperiores velit.', 'images/product-images/product-image42.jpg', 19.41, 54, 9, '2024-09-24 04:40:12', 526),
(1058, 'Aerodynamic Steel Clock', 'Eum architecto magni.', 'images/product-images/product-image23.jpg', 0.13, 8, 6, '2024-09-29 09:25:34', 53),
(1059, 'Rustic Marble Plate', 'Officiis consequatur vitae.', 'images/product-images/product-image39.jpg', 23.43, 66, 8, '2024-09-18 12:26:56', 613),
(1060, 'Small Bronze Car', 'Nihil asperiores animi consequuntur labore alias magni.', 'images/product-images/product-image25.jpg', 40.32, 63, 5, '2024-09-23 22:04:03', 454),
(1061, 'Ergonomic Wool Watch', 'Voluptatem molestiae est maxime velit tempore eligendi quidem.', 'images/product-images/product-image10.jpg', 8.82, 31, 5, '2024-09-26 05:02:37', 762),
(1062, 'Small Wooden Gloves', 'Saepe commodi optio nulla temporibus voluptas officiis recusandae.', 'images/product-images/product-image21.jpg', 95.09, 7, 9, '2024-09-26 06:44:50', 41),
(1063, 'Ergonomic Rubber Shirt', 'Corrupti saepe voluptatem sed aliquam.', 'images/product-images/product-image25.jpg', 73.45, 38, 6, '2024-09-27 09:10:20', 687),
(1064, 'Small Steel Clock', 'Quam necessitatibus id neque sed.', 'images/product-images/product-image13.jpg', 26.07, 82, 10, '2024-09-27 01:19:04', 429),
(1065, 'Ergonomic Bronze Lamp', 'Porro hic debitis.', 'images/product-images/product-image39.jpg', 97.13, 37, 3, '2024-09-20 16:17:19', 61),
(1066, 'Aerodynamic Cotton Shoes', 'Qui est doloribus fugit ut earum.', 'images/product-images/product-image6.jpg', 16.73, 41, 8, '2024-09-25 12:20:25', 319),
(1067, 'Durable Aluminum Bottle', 'Aut ea ullam.', 'images/product-images/product-image13.jpg', 8.66, 98, 6, '2024-09-18 17:17:12', 651),
(1068, 'Mediocre Copper Knife', 'Assumenda ratione cum quae est.', 'images/product-images/product-image48.jpg', 70.44, 24, 10, '2024-09-25 18:42:49', 306),
(1069, 'Awesome Aluminum Hat', 'Voluptate rem aut.', 'images/product-images/product-image48.jpg', 85.85, 8, 7, '2024-09-23 10:29:40', 438),
(1070, 'Awesome Silk Chair', 'Rem et enim ut qui et.', 'images/product-images/product-image45.jpg', 28.62, 90, 7, '2024-09-28 10:56:15', 42),
(1071, 'Enormous Bronze Table', 'Vitae omnis ab atque et voluptatem vitae quae.', 'images/product-images/product-image30.jpg', 52.15, 93, 4, '2024-09-25 16:56:01', 791),
(1072, 'Heavy Duty Iron Clock', 'Delectus molestiae tempora ut reprehenderit quas.', 'images/product-images/product-image15.jpg', 68.49, 33, 6, '2024-09-22 10:34:46', 981),
(1073, 'Sleek Copper Bottle', 'Ut magni sunt quasi.', 'images/product-images/product-image37.jpg', 51.11, 74, 9, '2024-09-28 02:35:11', 266),
(1074, 'Sleek Aluminum Bottle', 'Rerum iste illo.', 'images/product-images/product-image37.jpg', 7.67, 15, 10, '2024-09-18 18:49:21', 690),
(1075, 'Practical Bronze Gloves', 'Itaque odio dicta.', 'images/product-images/product-image24.jpg', 65.8, 72, 5, '2024-09-23 07:25:18', 579),
(1076, 'Mediocre Wool Bottle', 'Praesentium consequuntur voluptas est dicta sint.', 'images/product-images/product-image8.jpg', 72.29, 53, 6, '2024-09-18 17:06:06', 243),
(1077, 'Synergistic Iron Computer', 'Doloribus deserunt est officiis ullam nihil.', 'images/product-images/product-image17.jpg', 81.15, 85, 7, '2024-09-21 04:21:31', 648),
(1078, 'Fantastic Leather Gloves', 'Soluta et rerum.', 'images/product-images/product-image13.jpg', 25.27, 15, 7, '2024-09-22 22:10:23', 876),
(1079, 'Enormous Linen Pants', 'Nulla impedit temporibus sed delectus qui repellendus et.', 'images/product-images/product-image11.jpg', 11.57, 89, 3, '2024-09-22 15:16:11', 836),
(1080, 'Practical Aluminum Gloves', 'Incidunt eligendi quos.', 'images/product-images/product-image15.jpg', 53.39, 93, 4, '2024-09-18 01:56:20', 35),
(1081, 'Awesome Steel Clock', 'Iusto magnam nihil architecto eius aut sunt.', 'images/product-images/product-image44.jpg', 17.21, 41, 5, '2024-09-25 20:31:06', 271),
(1082, 'Enormous Rubber Keyboard', 'Quos reiciendis et quisquam nisi.', 'images/product-images/product-image23.jpg', 30.14, 97, 9, '2024-09-27 05:34:07', 862),
(1083, 'Practical Paper Knife', 'Dolor nulla quae numquam quam iusto.', 'images/product-images/product-image32.jpg', 64.08, 53, 6, '2024-09-19 01:33:41', 488),
(1084, 'Aerodynamic Iron Table', 'Ut et sequi natus esse et inventore.', 'images/product-images/product-image43.jpg', 71.28, 29, 10, '2024-09-20 12:15:09', 334),
(1085, 'Gorgeous Linen Clock', 'Dicta nemo odit aut libero corporis accusamus.', 'images/product-images/product-image16.jpg', 10.74, 26, 9, '2024-09-28 10:01:08', 259),
(1086, 'Incredible Concrete Bottle', 'Nihil ea esse qui amet facere illum.', 'images/product-images/product-image2.jpg', 44.71, 60, 10, '2024-09-20 02:39:36', 88),
(1087, 'Small Rubber Bottle', 'Eligendi sed ut voluptatem.', 'images/product-images/product-image12.jpg', 32.59, 52, 4, '2024-09-18 19:18:58', 222),
(1088, 'Intelligent Paper Hat', 'Magni velit delectus ducimus quasi.', 'images/product-images/product-image2.jpg', 55.26, 72, 3, '2024-09-22 02:13:20', 735),
(1089, 'Awesome Rubber Keyboard', 'Quas odio repellendus praesentium.', 'images/product-images/product-image25.jpg', 52.69, 50, 9, '2024-09-21 12:45:23', 650),
(1090, 'Fantastic Bronze Shoes', 'Non dolor libero et perferendis rerum soluta.', 'images/product-images/product-image18.jpg', 51.28, 14, 6, '2024-09-21 05:50:09', 932),
(1091, 'Incredible Aluminum Hat', 'Aut sunt dolorem blanditiis maiores expedita.', 'images/product-images/product-image14.jpg', 30.48, 52, 3, '2024-09-27 12:14:06', 556),
(1092, 'Enormous Iron Clock', 'A sit quidem ipsam eum deleniti.', 'images/product-images/product-image16.jpg', 35.76, 6, 8, '2024-09-26 02:17:12', 943),
(1093, 'Sleek Wooden Shirt', 'Perferendis consequatur nobis et quos tempore reiciendis.', 'images/product-images/product-image36.jpg', 55.03, 18, 5, '2024-09-23 20:09:43', 386),
(1094, 'Synergistic Granite Pants', 'Cum et iusto qui fugit ea.', 'images/product-images/product-image33.jpg', 86.2, 40, 3, '2024-09-19 02:31:42', 511),
(1095, 'Incredible Granite Shoes', 'Et earum dolores error qui.', 'images/product-images/product-image6.jpg', 85.99, 12, 5, '2024-09-25 23:51:54', 270),
(1096, 'Durable Concrete Hat', 'Quidem tempore numquam et et distinctio officiis.', 'images/product-images/product-image32.jpg', 78.75, 93, 3, '2024-09-23 04:33:13', 426),
(1097, 'Lightweight Marble Gloves', 'Ut voluptatum nesciunt voluptas accusamus quo facere nostrum.', 'images/product-images/product-image40.jpg', 79.67, 82, 3, '2024-09-18 04:24:14', 229),
(1098, 'Heavy Duty Granite Bottle', 'Qui dicta quo molestias expedita corporis.', 'images/product-images/product-image2.jpg', 55.35, 60, 6, '2024-09-29 15:08:41', 572),
(1099, 'Synergistic Bronze Wallet', 'Qui porro est quo.', 'images/product-images/product-image41.jpg', 74.6, 25, 6, '2024-09-27 03:49:50', 718),
(1100, 'Aerodynamic Silk Knife', 'Quaerat dolorum et id ea nostrum et.', 'images/product-images/product-image49.jpg', 69.63, 90, 6, '2024-09-21 09:45:26', 8),
(1101, 'Mediocre Iron Bottle', 'Repellat deleniti dicta.', 'images/product-images/product-image20.jpg', 15.6, 20, 3, '2024-09-29 05:12:05', 914),
(1102, 'Rustic Leather Gloves', 'Natus molestiae vel modi dicta doloribus illo.', 'images/product-images/product-image4.jpg', 98.57, 19, 3, '2024-09-19 23:52:22', 563),
(1103, 'Practical Silk Bag', 'Voluptatibus amet repellendus odio atque qui aut dolorum.', 'images/product-images/product-image10.jpg', 20.37, 74, 6, '2024-09-18 17:25:34', 496),
(1104, 'Mediocre Cotton Pants', 'Voluptatum animi nihil occaecati amet quis et nobis.', 'images/product-images/product-image36.jpg', 97.56, 53, 10, '2024-09-23 20:08:27', 114),
(1105, 'Incredible Steel Bottle', 'Est aut est vel.', 'images/product-images/product-image50.jpg', 42.13, 93, 7, '2024-09-22 22:00:31', 656),
(1106, 'Ergonomic Rubber Lamp', 'Totam facilis dolor et.', 'images/product-images/product-image41.jpg', 50.25, 55, 10, '2024-09-26 15:36:02', 803),
(1107, 'Practical Copper Chair', 'Et est qui et.', 'images/product-images/product-image3.jpg', 43.68, 88, 10, '2024-09-22 10:50:02', 793),
(1108, 'Rustic Marble Lamp', 'Ex totam vel.', 'images/product-images/product-image44.jpg', 17.41, 80, 5, '2024-09-22 00:04:59', 975),
(1109, 'Enormous Silk Knife', 'Voluptatem culpa temporibus et.', 'images/product-images/product-image10.jpg', 24.28, 10, 4, '2024-09-18 20:21:23', 836),
(1110, 'Enormous Cotton Lamp', 'Est ut ut dolorem qui dolorum et et.', 'images/product-images/product-image19.jpg', 1.81, 64, 10, '2024-09-24 09:44:57', 392),
(1111, 'Lightweight Wool Bag', 'Rerum id ratione alias quo porro.', 'images/product-images/product-image15.jpg', 73.92, 97, 9, '2024-09-23 17:02:12', 515),
(1112, 'Gorgeous Bronze Chair', 'Nam distinctio qui.', 'images/product-images/product-image17.jpg', 81.64, 94, 3, '2024-09-28 02:22:11', 42),
(1113, 'Ergonomic Concrete Lamp', 'Deserunt dolore in labore accusamus veniam.', 'images/product-images/product-image38.jpg', 97.77, 45, 4, '2024-09-28 08:21:38', 956),
(1114, 'Lightweight Steel Watch', 'Sed et qui quod repellendus et dolorem.', 'images/product-images/product-image37.jpg', 34.48, 97, 11, '2024-09-23 13:02:33', 219),
(1115, 'Sleek Wooden Table', 'Error molestiae eligendi sunt consequatur ex.', 'images/product-images/product-image24.jpg', 99.49, 62, 8, '2024-09-20 23:38:28', 749),
(1116, 'Intelligent Bronze Wallet', 'Et voluptatibus asperiores quidem cumque.', 'images/product-images/product-image7.jpg', 40.09, 40, 9, '2024-09-19 00:50:13', 626),
(1117, 'Incredible Wool Pants', 'Qui inventore est ut quae velit.', 'images/product-images/product-image14.jpg', 73.85, 52, 12, '2024-09-19 21:04:53', 136),
(1118, 'Fantastic Silk Watch', 'Ut eligendi ab cupiditate.', 'images/product-images/product-image46.jpg', 67.16, 71, 8, '2024-09-28 02:08:09', 931),
(1119, 'Ergonomic Concrete Wallet', 'Incidunt et non nobis exercitationem.', 'images/product-images/product-image40.jpg', 50.71, 68, 9, '2024-09-21 23:20:28', 144),
(1120, 'Gorgeous Silk Clock', 'Qui rerum et dolorum deserunt laudantium molestias temporibus.', 'images/product-images/product-image10.jpg', 56.97, 97, 6, '2024-09-18 01:55:28', 800),
(1121, 'Intelligent Silk Coat', 'Quis quas et aperiam optio quaerat.', 'images/product-images/product-image31.jpg', 80.55, 46, 4, '2024-09-28 00:24:56', 66),
(1122, 'Durable Iron Chair', 'Sit quibusdam aut repudiandae odio ad.', 'images/product-images/product-image24.jpg', 4.27, 42, 4, '2024-09-21 20:02:11', 153),
(1123, 'Mediocre Granite Shirt', 'Commodi ut delectus.', 'images/product-images/product-image26.jpg', 60.3, 10, 3, '2024-09-27 16:34:42', 429),
(1124, 'Aerodynamic Linen Knife', 'Aut fugit ut dolores dolorem.', 'images/product-images/product-image8.jpg', 82.75, 56, 3, '2024-09-18 20:06:48', 957),
(1125, 'Aerodynamic Rubber Computer', 'Eum mollitia id reprehenderit possimus nulla autem omnis.', 'images/product-images/product-image10.jpg', 40.82, 29, 5, '2024-09-19 02:16:14', 522),
(1126, 'Practical Wool Knife', 'Dolores distinctio quo doloribus non perferendis.', 'images/product-images/product-image28.jpg', 39.15, 95, 6, '2024-09-18 21:06:36', 998),
(1127, 'Rustic Wool Computer', 'Soluta recusandae ducimus consequatur eligendi consectetur inventore aut.', 'images/product-images/product-image6.jpg', 94.77, 59, 5, '2024-09-26 00:43:41', 795),
(1128, 'Awesome Iron Gloves', 'Incidunt deserunt totam et.', 'images/product-images/product-image49.jpg', 78.24, 67, 5, '2024-09-26 14:07:56', 217),
(1129, 'Gorgeous Leather Pants', 'Consequuntur placeat non accusamus.', 'images/product-images/product-image25.jpg', 13.42, 36, 9, '2024-09-19 00:13:21', 823),
(1130, 'Heavy Duty Paper Pants', 'Tenetur in sunt quidem laudantium hic sapiente.', 'images/product-images/product-image27.jpg', 93.85, 82, 7, '2024-09-29 12:37:45', 571),
(1131, 'Enormous Marble Hat', 'Harum dolorem quas maiores.', 'images/product-images/product-image8.jpg', 6.82, 57, 3, '2024-09-23 00:33:29', 52),
(1132, 'Small Paper Shirt', 'Autem necessitatibus enim rerum nam ratione cumque.', 'images/product-images/product-image10.jpg', 61, 52, 10, '2024-09-26 14:02:54', 260),
(1133, 'Aerodynamic Paper Shoes', 'Ex praesentium officiis asperiores est reiciendis iste tempora.', 'images/product-images/product-image24.jpg', 15.29, 97, 7, '2024-09-27 17:23:56', 276),
(1134, 'Fantastic Steel Gloves', 'Ut earum quaerat.', 'images/product-images/product-image42.jpg', 86.54, 45, 4, '2024-09-29 04:58:58', 823),
(1135, 'Synergistic Iron Chair', 'Dolores nihil autem et explicabo.', 'images/product-images/product-image35.jpg', 74.74, 50, 6, '2024-09-19 21:42:05', 80),
(1136, 'Awesome Bronze Lamp', 'Aut ad quaerat inventore.', 'images/product-images/product-image50.jpg', 66.13, 95, 5, '2024-09-21 08:41:53', 848),
(1137, 'Synergistic Linen Lamp', 'Nisi omnis aut in.', 'images/product-images/product-image44.jpg', 62.13, 79, 3, '2024-09-25 17:07:52', 543),
(1138, 'Mediocre Rubber Shirt', 'Consectetur sit nemo earum modi voluptate nam error.', 'images/product-images/product-image20.jpg', 12.75, 62, 10, '2024-09-19 16:25:20', 580),
(1139, 'Fantastic Rubber Gloves', 'Tenetur pariatur voluptatem neque.', 'images/product-images/product-image19.jpg', 15.83, 49, 7, '2024-09-19 22:19:21', 391),
(1140, 'Small Linen Computer', 'Odit neque cumque expedita.', 'images/product-images/product-image34.jpg', 56.4, 57, 7, '2024-09-28 12:30:17', 964),
(1141, 'Durable Granite Wallet', 'Et porro quibusdam.', 'images/product-images/product-image12.jpg', 97.86, 55, 4, '2024-09-25 22:23:41', 386),
(1142, 'Mediocre Copper Bench', 'Labore laboriosam a.', 'images/product-images/product-image6.jpg', 13.29, 76, 10, '2024-09-26 15:39:41', 841),
(1143, 'Practical Granite Gloves', 'Eum nam consequatur et officia consequatur pariatur.', 'images/product-images/product-image46.jpg', 54.84, 48, 10, '2024-09-28 17:09:53', 747),
(1144, 'Enormous Wooden Coat', 'Officiis id veritatis voluptatem eligendi illum illum.', 'images/product-images/product-image11.jpg', 1.53, 21, 8, '2024-09-25 16:33:46', 505),
(1145, 'Fantastic Wool Pants', 'Qui cum at beatae autem impedit.', 'images/product-images/product-image17.jpg', 15.88, 83, 7, '2024-09-18 11:24:02', 553),
(1146, 'Aerodynamic Wool Table', 'Eius qui eos debitis et ratione minima.', 'images/product-images/product-image2.jpg', 60.58, 33, 6, '2024-09-28 18:15:09', 656),
(1147, 'Practical Wooden Clock', 'Nam aut sed aspernatur.', 'images/product-images/product-image6.jpg', 27.98, 23, 9, '2024-09-28 19:37:33', 48),
(1148, 'Intelligent Iron Chair', 'Dolores quia voluptatem sapiente eaque consequatur et.', 'images/product-images/product-image26.jpg', 39.81, 4, 8, '2024-09-28 14:06:10', 365),
(1149, 'Practical Rubber Coat', 'Numquam consequatur et odit.', 'images/product-images/product-image11.jpg', 90.59, 95, 9, '2024-09-27 09:54:10', 877),
(1150, 'Intelligent Linen Wallet', 'Ipsum non dolorem consectetur sed maxime ullam.', 'images/product-images/product-image25.jpg', 2.98, 74, 9, '2024-09-24 15:53:12', 122),
(1151, 'Heavy Duty Concrete Lamp', 'Ex maxime qui ex deserunt ut ut illum.', 'images/product-images/product-image41.jpg', 46.21, 72, 8, '2024-09-27 12:19:39', 853),
(1152, 'Intelligent Cotton Shirt', 'Iste ipsa sapiente ipsa eos esse in earum.', 'images/product-images/product-image30.jpg', 42.2, 65, 9, '2024-09-22 05:45:49', 824),
(1153, 'Aerodynamic Marble Keyboard', 'Praesentium aperiam minus quas.', 'images/product-images/product-image28.jpg', 67.68, 64, 9, '2024-09-18 09:22:25', 479),
(1155, 'Practical Silk Pants', 'Voluptatibus unde ex nobis culpa alias.', 'images/product-images/product-image15.jpg', 54.66, 86, 7, '2024-09-23 13:36:45', 959),
(1156, 'Lightweight Silk Pants', 'Id aut et facilis quasi libero dolorem nisi.', 'images/product-images/product-image24.jpg', 82.46, 72, 5, '2024-09-28 23:32:05', 118),
(1157, 'Sleek Aluminum Shirt', 'Est non dolores ut vel voluptas alias ut.', 'images/product-images/product-image24.jpg', 97.12, 55, 5, '2024-09-29 03:03:45', 582),
(1158, 'Enormous Steel Shirt', 'Adipisci vel quaerat dolor et.', 'images/product-images/product-image49.jpg', 95.45, 58, 3, '2024-09-19 02:10:30', 118),
(1159, 'Mediocre Iron Bottle', 'Sit facere vel ab autem debitis dolor qui.', 'images/product-images/product-image22.jpg', 6.95, 54, 10, '2024-09-18 11:33:04', 117),
(1160, 'Durable Aluminum Clock', 'Tempora omnis quia sunt aut saepe vel.', 'images/product-images/product-image13.jpg', 76.07, 55, 4, '2024-09-26 23:55:05', 888),
(1161, 'Incredible Copper Pants', 'Eligendi cupiditate rerum autem quasi aliquid dolore mollitia.', 'images/product-images/product-image48.jpg', 46.79, 92, 10, '2024-09-19 02:29:23', 449),
(1162, 'Heavy Duty Bronze Chair', 'Veritatis est veritatis officiis placeat delectus.', 'images/product-images/product-image49.jpg', 97.55, 43, 10, '2024-09-25 22:02:55', 830),
(1163, 'Incredible Granite Bottle', 'Enim sequi praesentium.', 'images/product-images/product-image50.jpg', 28.99, 1, 7, '2024-09-28 03:03:26', 813),
(1164, 'Heavy Duty Bronze Gloves', 'Iusto quia error iste dolorem.', 'images/product-images/product-image3.jpg', 45.71, 1, 11, '2024-09-20 18:43:15', 490),
(1165, 'Practical Aluminum Hat', 'Quibusdam odit et repellat.', 'images/product-images/product-image14.jpg', 40.69, 16, 10, '2024-09-23 12:23:03', 933),
(1166, 'Enormous Cotton Chair', 'Ea aliquid laborum similique et cumque.', 'images/product-images/product-image11.jpg', 12.33, 20, 8, '2024-09-24 05:18:34', 403),
(1167, 'Aerodynamic Iron Bottle', 'Nihil aperiam ab sed incidunt quos corporis et.', 'images/product-images/product-image13.jpg', 83.95, 70, 6, '2024-09-20 00:22:32', 103),
(1168, 'Lightweight Copper Car', 'Ratione vero eos.', 'images/product-images/product-image32.jpg', 66.25, 63, 7, '2024-09-22 02:43:57', 68),
(1169, 'Synergistic Granite Table', 'Sunt odio harum rerum modi non nam aliquid.', 'images/product-images/product-image22.jpg', 74.04, 47, 3, '2024-09-28 14:15:50', 713),
(1170, 'Synergistic Rubber Coat', 'Consectetur cum corrupti eos.', 'images/product-images/product-image11.jpg', 86.79, 66, 5, '2024-09-28 20:15:15', 570),
(1171, 'Fantastic Concrete Lamp', 'Labore eveniet similique quibusdam at aperiam tempora ut.', 'images/product-images/product-image37.jpg', 93.38, 59, 7, '2024-09-18 08:08:35', 344),
(1172, 'Rustic Rubber Bottle', 'Adipisci ducimus vero mollitia quam.', 'images/product-images/product-image5.jpg', 30.92, 53, 6, '2024-09-19 20:14:35', 412),
(1173, 'Intelligent Paper Chair', 'Quaerat perspiciatis quibusdam veritatis odio eos recusandae neque.', 'images/product-images/product-image11.jpg', 27.61, 82, 6, '2024-09-28 10:44:43', 13),
(1174, 'Sleek Linen Bottle', 'Illo pariatur voluptatum reiciendis ipsum quae.', 'images/product-images/product-image41.jpg', 39.3, 64, 3, '2024-09-20 04:39:06', 227),
(1175, 'Awesome Concrete Wallet', 'Illo minima qui dolor ducimus corporis.', 'images/product-images/product-image22.jpg', 0.88, 96, 8, '2024-09-22 11:35:07', 223),
(1176, 'Enormous Linen Coat', 'In ipsam deserunt sit dolorem rerum voluptatem atque.', 'images/product-images/product-image35.jpg', 81.03, 45, 9, '2024-09-21 06:02:02', 329),
(1177, 'Small Steel Shirt', 'Aut consequatur voluptatum possimus in mollitia sit.', 'images/product-images/product-image8.jpg', 61.86, 17, 10, '2024-09-28 20:43:33', 101),
(1178, 'Fantastic Iron Bench', 'Voluptas autem blanditiis vero et neque cumque est.', 'images/product-images/product-image34.jpg', 94.17, 51, 9, '2024-09-18 23:08:32', 804),
(1179, 'Enormous Bronze Watch', 'Voluptas iusto rerum officia doloribus.', 'images/product-images/product-image45.jpg', 60.18, 65, 3, '2024-09-22 04:57:11', 586),
(1180, 'Awesome Plastic Car', 'Repellat ratione accusamus facilis et quia autem.', 'images/product-images/product-image24.jpg', 92.15, 38, 8, '2024-09-19 11:35:29', 809),
(1181, 'Durable Iron Plate', 'Vero expedita labore.', 'images/product-images/product-image35.jpg', 26.34, 69, 9, '2024-09-29 08:14:39', 90),
(1182, 'Intelligent Linen Gloves', 'Repudiandae odio consequatur ut quis expedita aperiam est.', 'images/product-images/product-image1.jpg', 82.42, 68, 6, '2024-09-26 12:24:41', 563),
(1183, 'Gorgeous Iron Car', 'Deserunt et commodi.', 'images/product-images/product-image49.jpg', 50.86, 27, 10, '2024-09-26 19:03:28', 921),
(1184, 'Small Wooden Bench', 'Distinctio omnis nostrum repellendus soluta eos accusantium.', 'images/product-images/product-image42.jpg', 75.74, 77, 3, '2024-09-26 11:35:36', 3),
(1185, 'Awesome Concrete Knife', 'Nesciunt quis aut dolorem molestias omnis impedit.', 'images/product-images/product-image11.jpg', 77.04, 94, 3, '2024-09-27 05:20:02', 496),
(1186, 'Incredible Concrete Chair', 'Nulla harum repellat nihil doloribus aliquid magni.', 'images/product-images/product-image29.jpg', 67.07, 88, 5, '2024-09-25 19:59:15', 583),
(1187, 'Ergonomic Marble Plate', 'Quisquam quos tempore accusantium reprehenderit.', 'images/product-images/product-image11.jpg', 68.82, 3, 7, '2024-09-19 00:38:43', 9),
(1188, 'Lightweight Paper Wallet', 'Voluptatibus praesentium amet.', 'images/product-images/product-image19.jpg', 59.24, 83, 3, '2024-09-18 14:03:13', 277),
(1189, 'Practical Wool Wallet', 'Fugiat dolor repellat id animi rerum aut et.', 'images/product-images/product-image13.jpg', 82.98, 4, 3, '2024-09-28 14:03:22', 792),
(1190, 'Incredible Leather Watch', 'Soluta labore aliquam natus amet quaerat et.', 'images/product-images/product-image6.jpg', 92.9, 82, 3, '2024-09-27 08:18:24', 518),
(1191, 'Durable Plastic Computer', 'Aut et ab.', 'images/product-images/product-image40.jpg', 30.17, 53, 8, '2024-09-25 03:42:55', 666),
(1192, 'Incredible Wooden Car', 'Blanditiis aut sit tempore ipsum.', 'images/product-images/product-image34.jpg', 70.22, 20, 5, '2024-09-21 05:00:22', 845),
(1193, 'Small Plastic Shirt', 'Sequi at suscipit dolorem.', 'images/product-images/product-image47.jpg', 95.52, 73, 4, '2024-09-21 21:13:13', 878),
(1194, 'Intelligent Paper Bag', 'Tempore quis earum sed veritatis saepe et.', 'images/product-images/product-image31.jpg', 51.33, 84, 4, '2024-09-22 19:45:28', 303),
(1195, 'Intelligent Steel Lamp', 'Non corrupti ut earum natus inventore.', 'images/product-images/product-image16.jpg', 47.76, 5, 12, '2024-09-24 08:37:27', 184),
(1196, 'Intelligent Granite Bag', 'Sit blanditiis quo ad ut blanditiis.', 'images/product-images/product-image37.jpg', 32.19, 77, 4, '2024-09-26 09:33:26', 371),
(1197, 'Small Aluminum Knife', 'Ut ullam sit autem.', 'images/product-images/product-image38.jpg', 95.23, 77, 7, '2024-09-29 04:59:02', 475),
(1198, 'Lightweight Cotton Table', 'Quam rem consectetur fuga.', 'images/product-images/product-image25.jpg', 63.95, 61, 5, '2024-09-26 18:06:17', 601),
(1199, 'Aerodynamic Copper Table', 'Corrupti nobis voluptas.', 'images/product-images/product-image13.jpg', 92.4, 12, 6, '2024-09-21 19:01:15', 60),
(1200, 'Lightweight Rubber Shirt', 'Aut placeat quia rerum quos.', 'images/product-images/product-image38.jpg', 24.93, 37, 10, '2024-09-18 21:44:44', 540),
(1201, 'Incredible Paper Keyboard', 'Cumque perspiciatis nulla ut quis illum.', 'images/product-images/product-image1.jpg', 25.99, 19, 3, '2024-09-25 00:30:51', 60),
(1202, 'Durable Linen Bag', 'Delectus in sint occaecati ad numquam et.', 'images/product-images/product-image39.jpg', 51.28, 59, 3, '2024-09-24 02:21:11', 410),
(1203, 'Aerodynamic Plastic Shoes', 'Quia vitae unde nulla aspernatur enim assumenda.', 'images/product-images/product-image42.jpg', 6.08, 38, 9, '2024-09-21 02:43:20', 84),
(1204, 'Gorgeous Steel Pants', 'Sed omnis et sequi doloribus praesentium repellat.', 'images/product-images/product-image41.jpg', 6.3, 74, 8, '2024-09-20 13:23:40', 792),
(1205, 'Mediocre Cotton Chair', 'Assumenda aut doloremque magni nostrum saepe porro.', 'images/product-images/product-image31.jpg', 20.08, 78, 8, '2024-09-20 11:54:15', 127),
(1206, 'Synergistic Wool Car', 'Ut quis velit nesciunt labore sit.', 'images/product-images/product-image32.jpg', 22.32, 14, 5, '2024-09-22 07:48:54', 144),
(1207, 'Intelligent Marble Car', 'A consequatur quaerat non sit quo ut iusto.', 'images/product-images/product-image17.jpg', 75.4, 22, 6, '2024-09-20 01:20:44', 255),
(1208, 'Intelligent Linen Coat', 'Natus harum dolorem similique.', 'images/product-images/product-image36.jpg', 25.92, 45, 10, '2024-09-20 19:52:26', 772),
(1209, 'Aerodynamic Plastic Shoes', 'Ea voluptatem omnis voluptatibus nihil.', 'images/product-images/product-image28.jpg', 73.7, 81, 4, '2024-09-27 13:08:39', 147),
(1210, 'Ergonomic Copper Shirt', 'Dolorem ut maiores quos.', 'images/product-images/product-image31.jpg', 89.86, 27, 8, '2024-09-21 00:04:24', 849),
(1211, 'Intelligent Leather Chair', 'Porro vel vel possimus qui ut.', 'images/product-images/product-image20.jpg', 63.36, 16, 11, '2024-09-26 05:44:19', 773),
(1212, 'Rustic Silk Table', 'Alias eveniet quisquam vel.', 'images/product-images/product-image9.jpg', 95.46, 8, 3, '2024-09-19 11:38:27', 745),
(1213, 'Sleek Aluminum Watch', 'Doloremque non in.', 'images/product-images/product-image32.jpg', 28.8, 66, 9, '2024-09-20 10:57:32', 286),
(1214, 'Intelligent Wool Pants', 'Quidem fuga quo dolores.', 'images/product-images/product-image33.jpg', 85.93, 43, 9, '2024-09-19 23:20:16', 156),
(1215, 'Incredible Granite Knife', 'Deserunt et ad velit nihil sed in.', 'images/product-images/product-image20.jpg', 34.97, 91, 10, '2024-09-24 05:24:32', 567),
(1216, 'Heavy Duty Wooden Plate', 'Non placeat odit.', 'images/product-images/product-image1.jpg', 11.21, 81, 6, '2024-09-26 11:28:25', 939),
(1217, 'Enormous Granite Table', 'Voluptas et cumque porro iusto eveniet non.', 'images/product-images/product-image45.jpg', 75.25, 79, 7, '2024-09-29 14:43:12', 642),
(1218, 'Small Wool Knife', 'Qui delectus est vel reprehenderit nisi.', 'images/product-images/product-image19.jpg', 60.28, 55, 9, '2024-09-29 09:24:03', 758),
(1220, 'Incredible Sharp Bags', 'Aut doloremque dignissimos sint aut quae.', 'images/product-images/product-image12.jpg', 11.02, 100, 12, '2024-09-29 16:15:44', 0),
(1221, 'Small Red Bag', 'sssssssssssssss', 'images/product-images/bags-p-img4.jpg', 20, 500, 12, '2025-03-13 10:59:13', 0),
(1222, 'Medium Black Bag', 'edddddddddddddđ', 'images/product-images/bags-p-img5.jpg', 20, 300, 12, '2025-03-13 11:00:45', 0),
(1223, 'Style Green Sandal', 'saddddddddd', 'images/product-images/home7-product1.jpg', 55, 200, 7, '2025-03-13 11:07:37', 0),
(1224, 'Test Product', 'random description', 'images/product-images/product-image39.jpg', 200, 50, 3, '2025-03-13 23:15:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dodATh089UY9WVfASBkd03uVH8SvwyS04JQXnsHe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkdTT09vd2tKcllkMk5UNEFxbHJlNjRIUWVCSzVEbGdpT3VFM0RPWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jYXRlZ29yaWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741937067);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'abc@gmail.com', 'pass1', 'admin'),
(3, 'gumitvtt@gmail.com', 'gumi123', 'user'),
(4, 'toanoc@gmail.com', '123', 'user'),
(5, 'toanoc2@gmail.com', '12345', 'user'),
(6, 'toanoc3@gmail.com', '12345', 'user'),
(7, 'matvtt@gmail.com', 'gumi123', 'user'),
(8, 'gumi2@gmail.com', '12345', 'user'),
(9, 'gumi3@gmail.com', '12345', 'user'),
(12, 'gumihailua@gmail.com', '12345', 'user'),
(15, 'datoc@gmail.com', '12345', 'user'),
(16, 'datc@gmail.com', '12345', 'user'),
(17, 'datc2@gmail.com', '12345', 'user'),
(18, 'test@gmail.com', '123', 'user'),
(25, 'gumimisa@gmail.com', '123', 'user'),
(29, 'test3@gmail.com', '123', 'user'),
(31, 'test10@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKog2rp4qthbtt2lfyhfo32lsw9` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1225;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FKog2rp4qthbtt2lfyhfo32lsw9` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
