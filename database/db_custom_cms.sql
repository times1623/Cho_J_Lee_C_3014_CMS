-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2019 at 12:52 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_custom_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_available`
--

CREATE TABLE `tbl_available` (
  `available_id` mediumint(8) UNSIGNED NOT NULL,
  `available_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_brand` (
  `brand_id` mediumint(8) UNSIGNED NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Helly'),
(2, 'Asics'),
(3, 'Adidas'),
(4, 'Nike'),
(5, 'Columbia'),
(6, 'North Face');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cats_id` smallint(5) UNSIGNED NOT NULL,
  `cats_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_color` (
  `color_id` mediumint(8) UNSIGNED NOT NULL,
  `color_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_gender` (
  `gender_id` mediumint(8) UNSIGNED NOT NULL,
  `gender_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_price` (
  `price_id` mediumint(8) UNSIGNED NOT NULL,
  `price_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_price`
--

INSERT INTO `tbl_price` (`price_id`, `price_level`) VALUES
(1, 'low'),
(2, 'mid'),
(3, 'high');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `products_id` mediumint(8) UNSIGNED NOT NULL,
  `products_name` varchar(250) NOT NULL,
  `products_desc` text NOT NULL,
  `products_img` varchar(250) NOT NULL,
  `products_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`products_id`, `products_name`, `products_desc`, `products_img`, `products_price`) VALUES
(1, 'Helly Hansen Royan Men\'s Shell Jacket', 'A super lightweight packable raincoat in a sleek and stylish business coat design. Ideal for over a suit or business casual attire, this versatile rain jacket is waterproof, windproof, breathable with fully sealed seams and 2.5 ply HELLY TECH® Performance. The fabric is soft and light and the jacket can easily be packet into a briefcase.', 'helly_white.png', '99.88CAD'),
(2, 'Helly Hansen Men\'s Moss Jacket', 'Inspired by Helly Hansen’s heritage from the city of Moss, comes a line up PU rainwear products that marries traditional design with modern construction and fabrics.', 'helly_yellow.png', '89.99CAD'),
(3, 'Columbia Men\'s Plus Size Watertight II Shell Jacket', 'Top-notch rain protection in an ultralight package—this packable rain jacket features full seam sealing and a microporous Omni-Tech® fabrication that shields you from wet weather while allowing excess heat and vapor to escape during dynamic activity.', 'columbia_red.png', '109.99CAD'),
(4, 'The North Face Men\'s Apex Elevation Insulated Softshell', 'Let the elements roll off your back with this windproof, water-repellent soft-shell hooded jacket that delivers insulated, breathable warmth during active winter endeavors.', 'north_black.png', '149.99CAD'),
(5, 'Helly Hansen Men\'s Belfast 2L Rain Shell Jacket', 'The perfect minimalist rain jacket for an active lifestyle.\r\n\r\n', 'helly_green.png', '149.99CAD'),
(6, 'Nike Men\'s Free RN 5.0 Running Shoes', 'An ideal performer for low-mileage sprints, the Nike Men’s Free RN 5.0 Running Shoe returns to its roots as a running shoe. Lightweight, single layer mesh in the upper provides more stretch to feel like a second skin. Less foam in the midsole means you’re ready to hit the ground running.', 'nike_white.png', '134.99CAD'),
(7, 'ASICS Men\'s GT 2000 6 Running Shoes', 'Less weight, enhanced cushioning, and more energy with every step, the GT-2000™ 6 model delivers optimized performance and high-mileage durability. A widened forefoot accommodates bunions and reduces irritation, while the upper incorporates a better heel-fit to keep you locked down plus improved toe-spring for a smoother transition. The DuoMax® support system and heel-to-toe GEL® cushioning offer protective stability that absorbs shock on any surface. Weight: 10.5. Heel Height: 22mm. Forefoot Height: 12mm.', 'asics_yellow.png', '126.95CAD'),
(8, 'Nike Men\'s Air Zoom Pegasus 35 Shield Running Shoes', 'The Nike Air Zoom Pegasus 35 Shield Men\'s Running Shoe gets remixed to conquer wet, dark routes. A water-repellent upper helps keep your feet dry. Reflective elements combine with an outsole that gives optimal grip on wet surfaces – letting you run in confidence despite the weather.', 'nike_green.png', '122.95CAD'),
(9, 'ASICS Men\'s GT 2000 6 Running Shoes ', 'Less weight, enhanced cushioning, and more energy with every step, the GT-2000™ 6 model delivers optimized performance and high-mileage durability. A widened forefoot accommodates bunions and reduces irritation, while the upper incorporates a better heel-fit to keep you locked down plus improved toe-spring for a smoother transition. The DuoMax® support system and heel-to-toe GEL® cushioning offer protective stability that absorbs shock on any surface.', 'asics_red.png', '89.99CAD'),
(10, 'Adidas Men\'s Asweego CC Running Shoes', 'Stay cool while you train. These running shoes offer relief as your run heats up with an innovative ventilating design. Built with a lightweight mesh upper, they have a TPU window that keeps air circulating. Plush cushioning delivers pillow-soft comfort to every step.', 'adidas_black.png', '169.99CAD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_available`
--

CREATE TABLE `tbl_prod_available` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `available_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_available`
--

INSERT INTO `tbl_prod_available` (`id`, `product_id`, `available_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_brand`
--

CREATE TABLE `tbl_prod_brand` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `brand_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_brand`
--

INSERT INTO `tbl_prod_brand` (`id`, `product_id`, `brand_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 5),
(4, 4, 6),
(5, 5, 1),
(6, 6, 4),
(7, 7, 2),
(8, 8, 4),
(9, 9, 2),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_color`
--

CREATE TABLE `tbl_prod_color` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `color_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_color`
--

INSERT INTO `tbl_prod_color` (`id`, `product_id`, `color_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 5),
(4, 4, 3),
(5, 5, 4),
(6, 6, 2),
(7, 7, 1),
(8, 8, 4),
(9, 9, 5),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_gender`
--

CREATE TABLE `tbl_prod_gender` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `gender_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_gender`
--

INSERT INTO `tbl_prod_gender` (`id`, `product_id`, `gender_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_price`
--

CREATE TABLE `tbl_prod_price` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `price_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_price`
--

INSERT INTO `tbl_prod_price` (`id`, `product_id`, `price_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 2),
(9, 9, 2),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_sale`
--

CREATE TABLE `tbl_prod_sale` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `sale_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_sale`
--

INSERT INTO `tbl_prod_sale` (`id`, `product_id`, `sale_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 1),
(9, 9, 2),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prod_size`
--

CREATE TABLE `tbl_prod_size` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `product_id` mediumint(9) NOT NULL,
  `size_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prod_size`
--

INSERT INTO `tbl_prod_size` (`id`, `product_id`, `size_id`) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 3, 2),
(4, 4, 4),
(5, 5, 2),
(6, 6, 3),
(7, 7, 1),
(8, 8, 3),
(9, 9, 4),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` mediumint(8) UNSIGNED NOT NULL,
  `sale_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_size` (
  `size_id` mediumint(8) UNSIGNED NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`) VALUES
(1, '7'),
(2, '8'),
(3, '9'),
(4, '10'),
(5, '11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_login_time` datetime DEFAULT NULL,
  `user_failed_login` int(3) DEFAULT '0',
  `user_failed_login_time` datetime DEFAULT NULL,
  `user_active` tinyint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_login_time`, `user_failed_login`, `user_failed_login_time`, `user_active`) VALUES
(24, 'admin', 'admin', '$2y$10$w..4e1K8eFGE3acyPsjgvubeXycxSPvTbzem9RsHcYYunZ8bnJtl6', 'admin@test.com', '2019-04-15 16:29:07', '::1', '2019-04-20 16:33:36', 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_available`
--
ALTER TABLE `tbl_available`
  ADD PRIMARY KEY (`available_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cats_id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `tbl_price`
--
ALTER TABLE `tbl_price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `tbl_prod_available`
--
ALTER TABLE `tbl_prod_available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prod_brand`
--
ALTER TABLE `tbl_prod_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prod_color`
--
ALTER TABLE `tbl_prod_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prod_gender`
--
ALTER TABLE `tbl_prod_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prod_price`
--
ALTER TABLE `tbl_prod_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prod_sale`
--
ALTER TABLE `tbl_prod_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prod_size`
--
ALTER TABLE `tbl_prod_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_available`
--
ALTER TABLE `tbl_available`
  MODIFY `available_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cats_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `gender_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_price`
--
ALTER TABLE `tbl_price`
  MODIFY `price_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `products_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_available`
--
ALTER TABLE `tbl_prod_available`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_brand`
--
ALTER TABLE `tbl_prod_brand`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_color`
--
ALTER TABLE `tbl_prod_color`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_gender`
--
ALTER TABLE `tbl_prod_gender`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_price`
--
ALTER TABLE `tbl_prod_price`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_sale`
--
ALTER TABLE `tbl_prod_sale`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prod_size`
--
ALTER TABLE `tbl_prod_size`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
