-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2019 at 07:01 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_custom_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_available`
--

DROP TABLE IF EXISTS `tbl_available`;
CREATE TABLE IF NOT EXISTS `tbl_available` (
  `available_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `available_name` varchar(50) NOT NULL,
  PRIMARY KEY (`available_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_available`
--

INSERT INTO `tbl_available` (`available_id`, `available_name`) VALUES
(1, 'available'),
(2, 'non-available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Helly'),
(2, 'Asics'),
(3, 'Adidas'),
(4, 'Nike'),
(5, 'Columbia'),
(6, 'North Face'),
(7, 'New Balance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cats_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cats_name` varchar(150) NOT NULL,
  PRIMARY KEY (`cats_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cats_id`, `cats_name`) VALUES
(1, 'gender'),
(2, 'color'),
(3, 'size'),
(4, 'brand'),
(5, 'price'),
(6, 'available'),
(7, 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
CREATE TABLE IF NOT EXISTS `tbl_color` (
  `color_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`) VALUES
(1, 'yellow'),
(2, 'white'),
(3, 'black'),
(4, 'green'),
(5, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

DROP TABLE IF EXISTS `tbl_gender`;
CREATE TABLE IF NOT EXISTS `tbl_gender` (
  `gender_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(50) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`gender_id`, `gender_name`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price`
--

DROP TABLE IF EXISTS `tbl_price`;
CREATE TABLE IF NOT EXISTS `tbl_price` (
  `price_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price_level` varchar(50) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_price`
--

INSERT INTO `tbl_price` (`price_id`, `price_level`) VALUES
(1, '0~49'),
(2, '50~99'),
(3, '100~');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `products_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_name` varchar(250) NOT NULL,
  `products_desc` text NOT NULL,
  `products_img` varchar(250) NOT NULL,
  `products_price` varchar(200) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`products_id`, `products_name`, `products_desc`, `products_img`, `products_price`) VALUES
(2, 'Helly Hansen Men\'s Moss Jacket', 'Inspired by Helly Hansen’s heritage from the city of Moss, comes a line up PU rainwear products that marries traditional design with modern construction and fabrics.', 'helly_yellow.png', '89.99CAD'),
(3, 'Columbia Men\'s Plus Size Watertight II Shell Jacket', 'Top-notch rain protection in an ultralight package—this packable rain jacket features full seam sealing and a microporous Omni-Tech® fabrication that shields you from wet weather while allowing excess heat and vapor to escape during dynamic activity.', 'columbia_red.png', '109.99CAD'),
(4, 'The North Face Men\'s Apex Elevation Insulated Softshell', 'Let the elements roll off your back with this windproof, water-repellent soft-shell hooded jacket that delivers insulated, breathable warmth during active winter endeavors.', 'north_black.png', '149.99CAD'),
(5, 'Helly Hansen Men\'s Belfast 2L Rain Shell Jacket', 'The perfect minimalist rain jacket for an active lifestyle.\r\n\r\n', 'helly_green.png', '149.99CAD'),
(6, 'Nike Men\'s Free RN 5.0 Running Shoes', 'An ideal performer for low-mileage sprints, the Nike Men’s Free RN 5.0 Running Shoe returns to its roots as a running shoe. Lightweight, single layer mesh in the upper provides more stretch to feel like a second skin. Less foam in the midsole means you’re ready to hit the ground running.', 'nike_white.png', '134.99CAD'),
(7, 'ASICS Men\'s GT 2000 6 Running Shoes', 'Less weight, enhanced cushioning, and more energy with every step, the GT-2000™ 6 model delivers optimized performance and high-mileage durability. A widened forefoot accommodates bunions and reduces irritation, while the upper incorporates a better heel-fit to keep you locked down plus improved toe-spring for a smoother transition. The DuoMax® support system and heel-to-toe GEL® cushioning offer protective stability that absorbs shock on any surface. Weight: 10.5. Heel Height: 22mm. Forefoot Height: 12mm.', 'asics_yellow.png', '126.95CAD'),
(8, 'Nike Men\'s Air Zoom Pegasus 35 Shield Running Shoes', 'The Nike Air Zoom Pegasus 35 Shield Men\'s Running Shoe gets remixed to conquer wet, dark routes. A water-repellent upper helps keep your feet dry. Reflective elements combine with an outsole that gives optimal grip on wet surfaces – letting you run in confidence despite the weather.', 'nike_green.png', '122.95CAD'),
(9, 'ASICS Men\'s GT 2000 6 Running Shoes ', 'Less weight, enhanced cushioning, and more energy with every step, the GT-2000™ 6 model delivers optimized performance and high-mileage durability. A widened forefoot accommodates bunions and reduces irritation, while the upper incorporates a better heel-fit to keep you locked down plus improved toe-spring for a smoother transition. The DuoMax® support system and heel-to-toe GEL® cushioning offer protective stability that absorbs shock on any surface.', 'asics_red.png', '89.99CAD'),
(10, 'Adidas Men\'s Asweego CC Running Shoes', 'Stay cool while you train. These running shoes offer relief as your run heats up with an innovative ventilating design. Built with a lightweight mesh upper, they have a TPU window that keeps air circulating. Plush cushioning delivers pillow-soft comfort to every step.', 'adidas_black.png', '169.99CAD'),
(11, 'Nike Sportswear Women\'s Woven Jacket', 'The Nike Sportswear Women’s Woven Jacket is designed with a large hood and mesh lining to help you stay dry and comfortable in style.', 'nike_w_jacket.png', '80CAD'),
(12, 'Columbia Women\'s Arcadia II 2L Shell Jacket', 'You’ll be prepared for wet conditions with this shell jacket by Columbia. With an adjustable hood and drawcord waist, rain and cold are kept at bay for optimal warmth. Zippered hand pockets keep essentials safe and protected, and when the weather improves, fold this jacket down and store it in an area as small as a hand pocket.', 'columbia_y_jacket.png', '99.99CAD'),
(13, 'Columbia Women\'s Plus Size Arcadia II 2L Shell Jacket', 'Waterproof, breathable and packable, this rainy-day-MVP women’s jacket is built to shield you from rain out on the trail and then stow away into a corner of your pack when the sun returns. An Omni-Tech® membrane combines with full seam sealing and a soft mesh lining to keep you dry and comfortable both on the exterior and interior.', 'columbia_r._jacket.png', '109.99CAD'),
(14, 'Helly Hansen Women\'s Halifax Crew Hooded Jacket', 'Stay dry and warm on wet or windy days in the Helly Hansen Halifax women\'s hooded jacket. With breathable waterproofing and windproofing, this smart jacket features full seam sealing to prevent warm air escape. The water repellant finish provides an added barrier of protection, complemented by the durable 2-ply construction.', 'helly_g_jacket.png', '94.98CAD'),
(15, 'Helly Hansen Women\'s Seven J Shell Jacket', 'You\'ll keep warm and dry in this outdoor rainwear jacket with plenty of features to keep the wet weather at bay. Adjustable cuffs and a bottom hem cinch cord provide plenty of comfort. A full coverage hood and front storm flap will keep water away whether you\'re out hiking on the trail or camping.', 'helly_b_jacket.png', '119.99CAD'),
(16, 'Nike Women\'s Air Zoom Structure 22 Running Shoes', 'The Nike Women’s Air Zoom Structure 22 Running Shoe looks fast and feels secure. Engineered mesh, a heel overlay and dynamic support throughout the midfoot all work together to provide a smooth, stable ride.', 'nike_r_shoe.png', '164.99CAD'),
(17, 'New Balance Women\'s Lazr V2 Running Shoes ', 'The New Balance Women’s Lazr V2 Running Shoe is an everyday running shoe that features a sleek design with a balance of cushioning and responsiveness. Updated for an improved fit, the Lazr Hypoknit v2 secures the foot in place while also offering a softer, more sock-like feel. The data specific laser engravings in the Fresh Foam midsole provide localized softness and support, and the dynamic fit of the redesigned upper secures the foot in place with plush comfort. Whether on the road or running errands around town, the Lazr Hypoknit is guaranteed to get you there looking good and feeling great.', 'newb_b_shoe.png', '124.99CAD'),
(18, 'ASICS Women\'s GEL Exalt 4 Running Shoes ', 'Endorsed by the American Podiatric Medical Association, the ASICS  Women\'s GEL Exalt 4 Running Shoes utilizes advanced midsole materials and rearfoot GEL® cushioning to deliver optimal comfort, responsive bounceback and all-day support in a lightweight package.', 'asics_g_shoe.png', '89.99CAD'),
(19, 'ASICS Women\'s GEL Cumulus 19 Running Shoes', 'Featuring our Convergence GEL® technology and Rearfoot GEL® technology cushioning system, the ASICS Women\'s GEL Cumulus 19 Running Shoes delivers superior comfort and shock dissipation, while enhancing foot function for a smooth ride. The GEL-Cumulus® 19 model also sports a contemporized upper to signal the latest generation.', 'asics_w_shoe.png', '89.99CAD'),
(20, 'New Balance Women\'s W890V7 Running Shoes', 'Youll find yourself reaching for the New Balance 890v7 over and over again. This go-to trainer for serious runners features responsive technology and a gusseted tongue to help offer a snug midfoot fit. Its minimal design makes it the perfect for both daily trainings or trips to the gym.', 'newb_g_shoe.png', '149.99CAD'),
(21, 'Columbia Boys\' Rain-Zilla Rain Jacket', 'Put your little, puddle-stomping monster into a Rain-Zilla jacket and tell him a little rain is good for him, because it is. The microfleece lining and waterproof fabric will keep him warm, dry and ready to roll.', 'col_b_kid_jacket.png', '31.88CAD'),
(22, 'Columbia Boys\' Rain-Zilla Jacket', 'Perfect for keeping him comfortable and protected in wet weather, this jacket features waterproof fabric, an adjustable hood, and soft microfleece lining.', 'col_g_kid_jacket.png', '64.99CAD'),
(23, 'Columbia Boys\' Endless Explorer Fleece Lined Rain Jacket', 'Make sure your endless explorer is ready for summer squalls. Crafted of a critically seam-sealed waterproof fabric and lined with cozy fleece, this lightweight jacket will ensure he’s ready for whatever Mother Nature has in store. Adjustable storm hood, elastic cuffs, articulated elbows, and chin guard deliver added comfort and protection, while reflective details boost nighttime visibility.', 'col_bl_kid_jacket.png', '58.97CAD'),
(24, 'Nike Sportswear Boys\' HD Windrunner Jacket', 'With water-repellent ripstop fabric and a shaped hood, the Boys’ Nike Sportswear Windrunner Jacket delivers lightweight coverage from the elements. The full-zip design is lined for comfort and includes a back vent for breathability.', 'nike_w_kid_jacket.png', '80.00CAD'),
(25, 'Nike Boys\' Sportswear Windrunner GFX Jacket', 'Nike Sportswear Windrunner Boys\' Graphic Jacket\r\nWith water-repellent fabric and a hood that zips to the chin, the Nike Sportswear Windrunner Boys\' Graphic Jacket delivers lightweight coverage from the elements. It\'s lined for comfort and includes zippered pockets for secure storage.', 'nike_r_kid_jacket.png', '80.00CAD'),
(26, 'Adidas Kids\' Superstar Foundation Grade School Shoes', 'Have your little one looking Old School cool in the adidas Kids\' Superstar Foundation Grade School Casual Shoes - White/Black, a grade school kids\' sized version of the legendary basketball shoe from the 1970s. Full-grain leather uppers provide flexibility and a luxurious fit, while a rubber shell toe limits wear for lasting durability.', 'adidas_w_kid_shoe.png', '84.99CAD'),
(27, 'Adidas Girls\' Superstar Grade School Casual Shoes ', 'Inspired by the original Superstar from the 1970s but reinvented in a modern colourway that appeals to grade school girls’ tastes, the adidas Girls’ Superstar Grade School Casual Shoes - White/Pink has a retro design she’ll love to show off. And because the toes of the full-grain leather sneakers are protected with rubber shells, she’ll be able to step out and make an Old School style statement again and again.', 'adidas_r_kid_shoe.png', '62.97CAD'),
(28, 'Adidas Kids\' Superstar C Preschool Shoes', 'A small take on a big style. These kids\' kicks scale down the clean lines and effortless style of the famed adidas Superstar shoes. They\'re made of smooth leather with a mesh lining for breathable comfort. Optional elastic laces make this pair easy to slip on and off.', 'adidas_wh_kid_shoe.png', '44.97CAD'),
(29, 'Adidas Kids\' Superstar Foundation Grade School Shoes', 'Have your little one looking Old School cool in the adidas Kids\' Superstar Foundation Grade School Casual Shoes - White/Black, a grade school kids\' sized version of the legendary basketball shoe from the 1970s. Full-grain leather uppers provide flexibility and a luxurious fit, while a rubber shell toe limits wear for lasting durability.', 'adidas_b_kid_shoe.png', '84.99CAD'),
(30, 'Adidas Girls\' Superstar Shoes', 'Turn your street style up a notch in these juniors\' shoes. An iridescent heel patch and 3-Stripes add a fun touch of shine to these iconic \'70s trainers. The classic shell toe and rubber cupsole complete the look.', 'adidas_wh_kid_girl_shoe.png', '89.99CAD'),
(31, 'Adidas Kids\' Predator 18.3 Firm Ground Outdoor Soccer Cleats ', 'Your creativity is dominating. Now prove it. Pull the strings and control the outcome of the game. You choose who, when and where, you dictate what happens next. Master control with Predator. These juniors’ soccer cleats have a synthetic upper that’s anatomically designed to lock down your feet as you lock onto goal. Hybrid stud tips let you move with instinct on firm ground.', 'kid_soccer_r.png', '66.97CAD'),
(32, 'Adidas Kids\' Predator 18.3 Firm Ground Outdoor Soccer Cleats', 'Your creativity is dominating. Now prove it. Pull the strings and control the outcome of the game. You choose who, when and where, you dictate what happens next. Master control with Predator. These juniors’ soccer cleats have a synthetic upper that’s anatomically designed to lock down your feet as you lock onto goal. Hybrid stud tips let you move with instinct on firm ground.', 'kid_soccer_g.png', '64.97CAD'),
(33, 'Nike Boys\' Grade School Phantom VSN Academy DF Firm Ground Shoes', 'The Nike Boys’ Grade School Phantom VSN Academy Dynamic Fit Firm Ground Shoe brings the fierce precision of street play to the pitch. A foot-hugging bootie is concealed in a synthetic outer layer to create a boot for the finishers, the providers and the battlers of tomorrow’s game.', 'nike_soccer_b.png', '79.99CAD'),
(34, 'Adidas Kids\' Nemeziz Messi 17.4 Firm Ground Outdoor Soccer Cleats', 'Sew the defense. Find space where you do not have it. Go ahead when you think you\'re going to retreat. Improvise when you think you\'re going to quit. Turn instinct into action and skeptics into witnesses. Get out in the front with Nemeziz in the foot. This kids\' boot shoe features Agility Touch Skin for quick movements on any set. The FG soldering was developed for explosive acceleration in solid surface, artificial grass and hard surface fields.', 'adidas_soccer_w.png', '34.97CAD'),
(35, 'Adidas Kids\' X 16.4 FG Outdoor Soccer Cleats', 'Give your young star the ability to move at faster speeds without compromising control with the adidas Kids\' X 16.4 FG Outdoor Soccer Cleats - Red/Black. These ultra light grade school kids\' soccer boots are optimized for play on all types of outdoor surfaces and feature Chaos Feel uppers that will give him a better sense of the ball.', 'adidas_soccer_r.png', '34.88CAD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_available`
--

DROP TABLE IF EXISTS `tbl_prod_available`;
CREATE TABLE IF NOT EXISTS `tbl_prod_available` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `available_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_available`
--

INSERT INTO `tbl_prod_available` (`id`, `products_id`, `available_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 2),
(14, 14, 1),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 18, 1),
(19, 19, 1),
(20, 20, 2),
(21, 21, 1),
(22, 22, 1),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 2),
(30, 30, 1),
(31, 31, 2),
(32, 32, 2),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_brand`
--

DROP TABLE IF EXISTS `tbl_prod_brand`;
CREATE TABLE IF NOT EXISTS `tbl_prod_brand` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `brand_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_brand`
--

INSERT INTO `tbl_prod_brand` (`id`, `products_id`, `brand_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 5),
(4, 4, 6),
(5, 5, 1),
(6, 6, 4),
(7, 7, 2),
(8, 8, 4),
(9, 9, 2),
(10, 10, 3),
(11, 11, 4),
(12, 12, 5),
(13, 13, 5),
(14, 14, 1),
(15, 15, 1),
(16, 16, 4),
(17, 17, 7),
(18, 18, 3),
(19, 19, 3),
(20, 20, 7),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 4),
(25, 25, 4),
(26, 26, 3),
(27, 27, 3),
(28, 28, 3),
(29, 29, 3),
(30, 30, 3),
(31, 31, 3),
(32, 32, 3),
(33, 33, 4),
(34, 34, 3),
(35, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_color`
--

DROP TABLE IF EXISTS `tbl_prod_color`;
CREATE TABLE IF NOT EXISTS `tbl_prod_color` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `color_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_color`
--

INSERT INTO `tbl_prod_color` (`id`, `products_id`, `color_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 5),
(4, 4, 3),
(5, 5, 4),
(6, 6, 2),
(7, 7, 1),
(8, 8, 4),
(9, 9, 5),
(10, 10, 3),
(11, 11, 2),
(12, 12, 1),
(13, 13, 5),
(14, 14, 4),
(15, 15, 3),
(16, 16, 5),
(17, 17, 3),
(18, 18, 4),
(19, 19, 2),
(20, 20, 4),
(21, 21, 3),
(22, 22, 4),
(23, 23, 3),
(24, 24, 2),
(25, 25, 1),
(26, 26, 2),
(27, 27, 5),
(28, 28, 2),
(29, 29, 3),
(30, 30, 2),
(31, 31, 5),
(32, 32, 4),
(33, 33, 3),
(34, 34, 2),
(35, 35, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_gender`
--

DROP TABLE IF EXISTS `tbl_prod_gender`;
CREATE TABLE IF NOT EXISTS `tbl_prod_gender` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `gender_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_gender`
--

INSERT INTO `tbl_prod_gender` (`id`, `products_id`, `gender_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 18, 2),
(19, 19, 2),
(20, 20, 2),
(21, 21, 3),
(22, 22, 3),
(23, 23, 3),
(24, 24, 3),
(25, 25, 3),
(26, 26, 3),
(27, 27, 3),
(28, 28, 3),
(29, 29, 3),
(30, 30, 3),
(31, 31, 3),
(32, 32, 3),
(33, 33, 3),
(34, 34, 3),
(35, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_price`
--

DROP TABLE IF EXISTS `tbl_prod_price`;
CREATE TABLE IF NOT EXISTS `tbl_prod_price` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `price_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_price`
--

INSERT INTO `tbl_prod_price` (`id`, `products_id`, `price_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 2),
(10, 10, 3),
(11, 11, 2),
(12, 12, 3),
(13, 13, 3),
(14, 14, 2),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3),
(18, 18, 2),
(19, 19, 2),
(20, 20, 3),
(21, 21, 1),
(22, 22, 2),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 28, 1),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2),
(34, 34, 1),
(35, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_sale`
--

DROP TABLE IF EXISTS `tbl_prod_sale`;
CREATE TABLE IF NOT EXISTS `tbl_prod_sale` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `sale_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_sale`
--

INSERT INTO `tbl_prod_sale` (`id`, `products_id`, `sale_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 1),
(9, 9, 2),
(10, 10, 1),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 1),
(17, 17, 2),
(18, 18, 1),
(19, 19, 1),
(20, 20, 2),
(21, 21, 2),
(22, 22, 2),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 1),
(27, 27, 2),
(28, 28, 2),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 1),
(33, 33, 2),
(34, 34, 2),
(35, 35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_size`
--

DROP TABLE IF EXISTS `tbl_prod_size`;
CREATE TABLE IF NOT EXISTS `tbl_prod_size` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` mediumint(9) NOT NULL,
  `size_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_size`
--

INSERT INTO `tbl_prod_size` (`id`, `products_id`, `size_id`) VALUES
(1, 1, 7),
(2, 2, 9),
(3, 3, 8),
(4, 4, 7),
(5, 5, 10),
(6, 6, 3),
(7, 7, 1),
(8, 8, 3),
(9, 9, 4),
(10, 10, 3),
(11, 11, 7),
(13, 12, 7),
(15, 13, 8),
(16, 14, 7),
(18, 15, 7),
(21, 16, 3),
(22, 17, 2),
(24, 18, 3),
(26, 19, 2),
(27, 20, 3),
(29, 21, 6),
(30, 22, 7),
(31, 23, 7),
(32, 24, 6),
(33, 25, 8),
(35, 26, 2),
(36, 27, 3),
(38, 28, 4),
(39, 29, 3),
(40, 30, 4),
(42, 31, 2),
(43, 32, 4),
(45, 33, 3),
(46, 34, 4),
(47, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

DROP TABLE IF EXISTS `tbl_sale`;
CREATE TABLE IF NOT EXISTS `tbl_sale` (
  `sale_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `sale_name`) VALUES
(1, 'onsale'),
(2, 'nonsale');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

DROP TABLE IF EXISTS `tbl_size`;
CREATE TABLE IF NOT EXISTS `tbl_size` (
  `size_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_name` varchar(50) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`) VALUES
(1, '7'),
(2, '8'),
(3, '9'),
(4, '10'),
(5, '11'),
(6, 'S'),
(7, 'M'),
(8, 'X'),
(9, 'XL'),
(10, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_lock` varchar(50) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_lock`) VALUES
(24, 'admin', 'admin', '$2y$10$OYlRwSS3148zjJeOEYHHFOlYOLpD26422mV2tpBgErsVIRliEyEbi', 'admin@admin', '2019-04-21 07:00:52', '::1', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
