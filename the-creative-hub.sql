-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 11:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the-creative-hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'vivek027', 'Vivek2705'),
(2, 'krisha024', 'Krisha2410');

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `admin_data_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_num` varchar(15) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_code`) VALUES
(1, 'Mobiles-Computers', 'MC024'),
(2, 'Home-Appliances', 'HA024'),
(3, 'Entertainment-Devices', 'ED024'),
(4, 'Accessories', 'AC024');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_orders`
--

CREATE TABLE `confirm_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirm_orders`
--

INSERT INTO `confirm_orders` (`order_id`, `user_id`, `product_id`, `price`, `main_image`, `order_date`) VALUES
(1, 3, 2, 154900.00, '', '2024-09-29 08:47:58'),
(2, 3, 3, 177900.00, 'uploads/sfold6.png', '2024-09-29 08:51:39'),
(3, 3, 5, 121900.00, 'uploads/sf6.png', '2024-09-29 09:22:57'),
(4, 3, 1, 174900.00, 'uploads/i15p.png', '2024-10-02 06:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(4) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `name`, `address`, `city`, `state`, `pincode`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`, `email`, `mobile_number`) VALUES
(5, 3, 'test', 'a 16 ghanshyam nagar kanbha', 'ahmedabad', 'gujarat', '382430', 'Vivek Prajapati', '1111222233334444', 'May', '2029', '2244', 'test@gmail.com', '8849722448'),
(9, 8, 'Vivek Prajapati', 'A 16 Ghanshyam Nagar SOciety Kanbha ', 'Ahmedabad', 'Gujarat', '382430', '', '', '', '', '', 'vivek0027@gmail.com', '8849721477');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending',
  `main_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `product_id`, `price`, `order_date`, `status`, `main_image`) VALUES
(2, 3, 1, 174900.00, '2024-09-29 04:33:13', 'pending', 'uploads/i15p.png'),
(4, 3, 4, 94000.00, '2024-09-29 04:44:46', 'pending', 'uploads/x14ultra.png'),
(6, 3, 2, 154900.00, '2024-09-29 05:16:08', 'pending', 'uploads/s24u.png'),
(7, 3, 3, 177900.00, '2024-09-29 05:16:08', 'pending', 'uploads/sfold6.png'),
(9, 3, 2, 154900.00, '2024-09-29 05:38:29', 'pending', 'uploads/s24u.png'),
(10, 3, 3, 177900.00, '2024-09-29 05:38:57', 'pending', 'uploads/sfold6.png'),
(12, 3, 2, 154900.00, '2024-09-29 05:42:00', 'pending', 'uploads/s24u.png'),
(13, 3, 2, 154900.00, '2024-09-29 06:37:39', 'pending', 'uploads/s24u.png'),
(14, 3, 2, 154900.00, '2024-09-29 06:38:01', 'pending', 'uploads/s24u.png'),
(15, 3, 2, 154900.00, '2024-10-01 13:06:56', 'pending', 'uploads/s24u.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` double(11,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `sub_image1` varchar(255) DEFAULT NULL,
  `sub_image2` varchar(255) DEFAULT NULL,
  `sub_image3` varchar(255) DEFAULT NULL,
  `sub_image4` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `image_url`, `sub_image1`, `sub_image2`, `sub_image3`, `sub_image4`, `category_id`, `sub_category_id`) VALUES
(1, 'Iphone 15 Pro Max', '1 TB ROM\r\n17.02 cm (6.7 inch) Super Retina XDR Display\r\n48MP + 12MP + 12MP | 12MP Front Camera\r\nA17 Pro Chip, 6 Core Processor Processor', 174900.00, 'uploads/i15p.png', 'uploads/i15p.png', 'uploads/i15p-2.png', 'uploads/i15p-3.png', 'uploads/i15p-4.png', 1, '1'),
(2, 'Samsung s24 Ultra', '12 GB RAM | 512 GB ROM\r\n17.27 cm (6.8 inch) Quad HD+ Display\r\n200MP + 50MP + 12MP + 10MP | 12MP Front Camera\r\n5000 mAh Battery\r\nSnapdragon 8 Gen 3 Processor', 154900.00, 'uploads/s24u.png', 'uploads/s24u.png', 'uploads/s24u-2.png', 'uploads/s24u-3.png', 'uploads/s24u-4.png', 1, '1'),
(3, 'Samsung Fold 6', '12 GB RAM | 512 GB ROM\r\n19.3 cm (7.6 inch) QXGA+ Display\r\n50MP + 12MP + 10MP | 10MP Front Camera\r\n4400 mAh Lithium ion Battery\r\nSnapdragon 8 Gen 3 Processor', 177900.00, 'uploads/sfold6.png', 'uploads/sfold6.png', 'uploads/sfold6-2.png', 'uploads/sfold6-3.png', 'uploads/sfold6-4.png', 1, '1'),
(4, 'Xiaomi 14 Pro', '16 GB RAM | 512 GB ROM\r\n17.09 cm (6.73 inch) Display\r\n50MP + 50MP + 50MP + 50MP | 32MP Front Camera\r\n5000 mAh Battery\r\nSnapdragon 8 Gen 3 Mobile Platform Processor', 94000.00, 'uploads/x14ultra.png', 'uploads/x14ultra.png', 'uploads/x14-2.png', 'uploads/x14-3.png', 'uploads/x14-4.png', 1, '1'),
(5, 'Samsung Flip 6', '\r\n12 GB RAM | 512 GB ROM\r\n17.02 cm (6.7 inch) Full HD+ Display\r\n50MP + 12MP | 10MP Front Camera\r\n4000 mAh Lithium ion Battery\r\nSnapdragon 8 Gen 3 Processor', 121900.00, 'uploads/sf6.png', 'uploads/sf6.png', 'uploads/sf6-1.png', 'uploads/sf6-2.png', 'uploads/sf6-3.png', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `main_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_id`, `sub_category_code`) VALUES
(1, 'Mobile', 1, 'MO024'),
(2, 'Computers', 1, 'CO024'),
(3, 'MicroWave Owen', 2, 'MW024'),
(4, 'Refrigerators', 2, 'RF024'),
(5, 'Air Conditioners', 2, 'AC024'),
(6, 'Washing Machines', 2, 'WM024'),
(7, 'Televisions', 3, 'TV024'),
(8, 'Projectors', 3, 'PJ024'),
(9, 'Speakers', 3, 'SP024'),
(10, 'Head Phones', 3, 'HP024'),
(11, 'Wireless Chargers ', 4, 'WC024'),
(12, 'Mouse', 4, 'MS024'),
(13, 'Power Bank', 4, 'PB024'),
(14, 'Laptop Cooler', 4, 'LC024');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'vivek04', 'Vivek027', 'vivek27005@gmail.com'),
(2, 'vyom027', 'Vivek027', 'vivek@gmail.com'),
(3, 'test', 'Test0027', 'test@gmail.com'),
(5, 'test1', 'Test0024', 'test1@gmail.com'),
(7, 'vivek', 'Vivek027', 'vivek2@gmail.com'),
(8, 'Vivek01', 'Vivek001', 'vivek0027@gmail.com'),
(9, 'Test10', 'Test0010', 'testest@gmaaail.com'),
(11, 'test010', 'test0010', 'test'),
(14, 'test010001', 'Test010', 'test0101@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`admin_data_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `confirm_orders`
--
ALTER TABLE `confirm_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_pending` (`user_id`),
  ADD KEY `fk_product_pending` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `admin_data_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_orders`
--
ALTER TABLE `confirm_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD CONSTRAINT `admin_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confirm_orders`
--
ALTER TABLE `confirm_orders`
  ADD CONSTRAINT `confirm_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `confirm_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD CONSTRAINT `fk_product_pending` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_pending` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
