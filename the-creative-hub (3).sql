-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 09:48 AM
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
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_num` varchar(15) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`first_name`, `last_name`, `email`, `mobile_num`, `admin_id`) VALUES
('Vivek', 'Prajapati', 'vivek@gmail.com', '8849721477', 1),
('Krisha', 'Purohit', 'krisha24@gmail.com', '8469407881', 2);

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
(2, 3, 3, 177900.00, 'uploads/sfold6.png', '2024-09-29 08:51:39'),
(4, 3, 1, 174900.00, 'uploads/i15p.png', '2024-10-02 06:14:42'),
(5, 3, 1, 174900.00, 'uploads/i15p.png', '2024-10-17 14:04:39'),
(6, 3, 4, 94000.00, 'uploads/x14ultra.png', '2024-10-17 14:05:30'),
(7, 3, 2, 154900.00, 'uploads/s24u.png', '2024-10-31 05:21:11');

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
(5, 3, 'test', 'a 16 ghanshyam nagar kanbha', 'ahmedabad', 'gujarat', '382430', 'Vivek Prajapati', '1111222233334444', 'May', '2029', '2244', 'test@gmail.com', '8849721477'),
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
(7, 3, 3, 177900.00, '2024-09-29 05:16:08', 'pending', 'uploads/sfold6.png'),
(9, 3, 2, 154900.00, '2024-09-29 05:38:29', 'pending', 'uploads/s24u.png'),
(10, 3, 3, 177900.00, '2024-09-29 05:38:57', 'pending', 'uploads/sfold6.png'),
(13, 3, 2, 154900.00, '2024-09-29 06:37:39', 'pending', 'uploads/s24u.png'),
(16, 3, 9, 389990.00, '2024-10-17 13:52:25', 'pending', 'uploads/msit.png'),
(17, 3, 1, 174900.00, '2024-10-22 04:30:32', 'pending', 'uploads/i15p.png');

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
(1, 'Iphone 15 Pro Max', '1 TB ROM<br />\r\n17.02 cm (6.7 inch) Super Retina XDR Display<br />\r\n48MP + 12MP + 12MP | 12MP Front Camera<br />\r\nA17 Pro Chip, 6 Core Processor Processor', 174900.00, 'uploads/i15p.png', 'uploads/i15p.png', 'uploads/i15p-2.png', 'uploads/i15p-3.png', 'uploads/i15p-4.png', 1, '1'),
(2, 'Samsung s24 Ultra', '12 GB RAM | 512 GB ROM\r\n17.27 cm (6.8 inch) Quad HD+ Display\r\n200MP + 50MP + 12MP + 10MP | 12MP Front Camera\r\n5000 mAh Battery\r\nSnapdragon 8 Gen 3 Processor', 154900.00, 'uploads/s24u.png', 'uploads/s24u.png', 'uploads/s24u-2.png', 'uploads/s24u-3.png', 'uploads/s24u-4.png', 1, '1'),
(3, 'Samsung Fold 6', '12 GB RAM | 512 GB ROM\r\n19.3 cm (7.6 inch) QXGA+ Display\r\n50MP + 12MP + 10MP | 10MP Front Camera\r\n4400 mAh Lithium ion Battery\r\nSnapdragon 8 Gen 3 Processor', 177900.00, 'uploads/sfold6.png', 'uploads/sfold6.png', 'uploads/sfold6-2.png', 'uploads/sfold6-3.png', 'uploads/sfold6-4.png', 1, '0'),
(4, 'Xiaomi 14 Pro', '16 GB RAM | 512 GB ROM\r\n17.09 cm (6.73 inch) Display\r\n50MP + 50MP + 50MP + 50MP | 32MP Front Camera\r\n5000 mAh Battery\r\nSnapdragon 8 Gen 3 Mobile Platform Processor', 94000.00, 'uploads/x14ultra.png', 'uploads/x14ultra.png', 'uploads/x14-2.png', 'uploads/x14-3.png', 'uploads/x14-4.png', 1, '1'),
(5, 'Samsung Flip 6', '12 GB RAM | 512 GB ROM\r\n17.02 cm (6.7 inch) Full HD+ Display\r\n50MP + 12MP | 10MP Front Camera\r\n4000 mAh Lithium ion Battery\r\nSnapdragon 8 Gen 3 Processor', 121999.00, 'uploads/sf6.png', 'uploads/sf6.png', 'uploads/sf6-1.png', 'uploads/sf6-2.png', 'uploads/sf6-3.png', 1, '1'),
(6, 'Samusung Fold 6', '12 GB RAM | 512 GB ROM\r\n19.3 cm (7.6 inch) QXGA+ Display\r\n50MP + 12MP + 10MP | 10MP Front Camera\r\n4400 mAh Lithium ion Battery\r\nSnapdragon 8 Gen 3 Processor', 176999.00, 'uploads/sfold6.png', 'uploads/sfold6.png', 'uploads/sfold6-2.png', 'uploads/sfold6-3.png', 'uploads/sfold6-4.png', 1, '1'),
(7, 'ASUS Zenbook Duo', '14 Inch Full HD, OLED 16:10 aspect ratio, 0.2ms response time, 60Hz refresh rate, 400nits, 500nits HDR peak brightness, 100% DCI-P3 color gamut, 1,000,000:1, VESA CERTIFIED Display HDR True Black 500, 1.07 billion colors, PANTONE Validated, Glossy display, 70% less harmful blue light\r\nLight Laptop without Optical Disk Drive', 239990.00, 'uploads/asus-rog.png', 'uploads/asus-rog.png', 'uploads/a16-2.png', 'uploads/a16-3.png', 'uploads/a16-4.png', 1, '2'),
(8, 'Apple MacBook Air M3', 'Stylish & Portable Thin and Light Laptop\r\n13 Inch Liquid Retina display, LED-backlit Display with IPS Technology, Native Resolution at 224 pixels per inch, 500 nits Brightness\r\nLight Laptop without Optical Disk Drive', 145490.00, 'uploads/m15-1.png', 'uploads/m15-1.png', 'uploads/m15-2.png', 'uploads/m15-3.png', 'uploads/m15-4.png', 1, '2'),
(9, 'MSI Titan 18HX', '8 Inch UHD+ MiniLED, 120Hz, 100% DCI-P3 (Typ.), IPS-Level panel\r\nLight Laptop without Optical Disk Drive', 389990.00, 'uploads/msit.png', 'uploads/msit.png', 'uploads/msit-2.png', 'uploads/msit-3.png', 'uploads/msit-4.png', 1, '2'),
(10, 'Iphone 16 Pro Max', '512 GB ROM\r\n17.53 cm (6.9 inch) Super Retina XDR Display\r\n48MP + 48MP + 12MP | 12MP Front Camera\r\nA18 Pro Chip, 6 Core Processor ', 164900.00, 'uploads/i16pm.png', 'uploads/i16pm.png', 'uploads/i16pm-2.png', 'uploads/i16pm-3.png', 'uploads/i16pm-4.png', 1, '1'),
(11, 'Google Pixel 9 Pro Fold', '16 GB RAM | 256 GB ROM\r\n16.0 cm (6.3 inch) Display\r\n48MP + 10.5MP + 10.8MP | 10MP Front Camera\r\n4650 mAh Battery\r\nGoogle Tensor G4 Processor', 172999.00, 'uploads/gp9.jpg', 'uploads/gp9.jpg', 'uploads/gp9-2.jpg', 'uploads/gp9-3.jpg', 'uploads/gp9-4.jpg', 1, '1'),
(12, 'vivo X Fold3 Pro ', '16 GB RAM | 512 GB ROM\r\n16.59 cm (6.53 inch) Display\r\n50MP + 50MP + 64MP | 32MP Front Camera\r\n5700 mAh Battery\r\n8 Gen 3 Mobile Platform Processor', 159999.00, 'uploads/vxf3.png', 'uploads/vxf3.png', 'uploads/vxf3-2.png', 'uploads/vxf3-3.png', 'uploads/vxf3-4.png', 1, '1'),
(14, 'Apple iPhone 16 ', '512 GB ROM\r\n15.49 cm (6.1 inch) Super Retina XDR Display\r\n48MP + 12MP | 12MP Front Camera\r\nA18 Chip, 6 Core Processor Processor', 109900.00, 'uploads/i16.png', 'uploads/i16.png', 'uploads/i16-2.png', 'uploads/i16-3.png', 'uploads/i16-4.png', 1, '1'),
(15, 'Dell Alienware x16 ', 'Brand	Dell&lt;br /&gt;<br />\r\nModel Name	Alienware x16&lt;br /&gt;<br />\r\nScreen Size	16 Inches&lt;br /&gt;<br />\r\nColour	Lunar Silver&lt;br /&gt;<br />\r\nHard Disk Size	2 TB&lt;br /&gt;<br />\r\nCPU Model	Core i9&lt;br /&gt;<br />\r\nRAM Memory Installed Size	32 GB&lt;br /&gt;<br />\r\nOperating System	Windows 11 Home&lt;br /&gt;<br />\r\nGraphics Card Description	Dedicated&lt;br /&gt;<br />\r\nCPU Speed	4.1 GHz', 454490.00, 'uploads/dax16.png', 'uploads/dax16.png', 'uploads/dax16-2.jpg', 'uploads/dax16-3.jpg', 'uploads/dax16-4.jpg', 1, '2'),
(16, 'HP ZBook Studio', 'Brand	HP&lt;br /&gt;<br />\r\nModel Name	HP ZBook Studio G9&lt;br /&gt;<br />\r\nScreen Size	40.6 Centimetres&lt;br /&gt;<br />\r\nColour	silver&lt;br /&gt;<br />\r\nCPU Model	Core i9&lt;br /&gt;<br />\r\nRAM Memory Installed Size	32 GB&lt;br /&gt;<br />\r\nOperating System	Windows 11 Home&lt;br /&gt;<br />\r\nSpecial Feature	Spill resistant, Fingerprint Reader, WUXGA, Anti-glare Display, Backlit&lt;br /&gt;<br />\r\nGraphics Card Description	Dedicated&lt;br /&gt;<br />\r\nCPU Speed	5 GHz', 379793.00, 'uploads/hzbs.png', 'uploads/hzbs.png', 'uploads/hzbs-2.jpg', 'uploads/hzbs-3.jpg', 'uploads/hzbs-4.jpg', 1, '2'),
(17, 'ASUS ROG Strix SCAR 16', 'Brand	ASUS<br />\r\nModel Name	ROG Strix SCAR 16<br />\r\nScreen Size	40.64 Centimetres<br />\r\nColour	Black<br />\r\nHard Disk Size	2 TB<br />\r\nCPU Model	Core i9<br />\r\nRAM Memory Installed Size	32 GB<br />\r\nOperating System	Windows 11 Home<br />\r\nSpecial Feature	Backlit Keyboard, Anti Glare Coating', 340000.00, 'uploads/arss16.png', 'uploads/arss16.png', 'uploads/arss16-2.jpg', 'uploads/arss16-3.jpg', 'uploads/arss16-4.jpg', 1, '2'),
(18, 'Dell XPS 9720 ', '<br />\r\nBrand	Dell<br />\r\nModel Name	XPS 9720<br />\r\nScreen Size	17 Inches<br />\r\nColour	Platinum Silver<br />\r\nHard Disk Size	1 TB<br />\r\nCPU Model	Core i9<br />\r\nRAM Memory Installed Size	32 GB<br />\r\nOperating System	Windows 11 Home<br />\r\nSpecial Feature	Backlit Keyboard', 331500.00, 'uploads/dxps.png', 'uploads/dxps.png', 'uploads/dxps-2.jpg', 'uploads/dxps-3.jpg', 'uploads/dxps-4.jpg', 1, '2'),
(19, 'HP Omen Gaming Laptop', 'Brand	HP<br />\r\nModel Name	17-ck2004TX<br />\r\nScreen Size	43.9 Centimetres<br />\r\nColour	Shadow Black<br />\r\nHard Disk Size	1 TB<br />\r\nCPU Model	Core i9<br />\r\nRAM Memory Installed Size	32 GB<br />\r\nOperating System	Windows 11 Home<br />\r\nSpecial Feature	Low Blue Light, QHD, Micro-Edge Display, Anti-Glare, Built in Alexa', 299000.00, 'uploads/hog.png', 'uploads/hog.png', 'uploads/hog-2.png', 'uploads/hog-3.png', 'uploads/hog-4.png', 1, '2'),
(20, 'ASUSROG Zephyrus G16', 'Brand	ASUS<br />\r\nModel Name	ROG Zephyrus G16<br />\r\nScreen Size	16 Inches<br />\r\nColour	Platinum White<br />\r\nCPU Model	Ryzen 9<br />\r\nRAM Memory Installed Size	32 GB<br />\r\nOperating System	Windows 11 Home<br />\r\nSpecial Feature	Backlit Chiclet Keyboard Single Light with Copilot key, ROG Nebula Display, AI<br />\r\nGraphics Co-processor	NVIDIA GeForce RTX 4070', 261000.00, 'uploads/azg16.png', 'uploads/azg16.png', 'uploads/azg16-2.jpg', 'uploads/azg16-3.jpg', 'uploads/azg16-4.jpg', 1, '2'),
(21, 'Samsung 635L', '<br />\r\nProduct Dimensions	71.6D x 91.2W x 178H Centimeters<br />\r\nBrand	Samsung<br />\r\nCapacity	635 litres<br />\r\nConfiguration	Freezer-on-Top<br />\r\nEnergy Star	5 star rating', 161200.00, 'uploads/s635l.jpg', 'uploads/s635l.jpg', 'uploads/s635l-2.jpg', 'uploads/s635l-3.jpg', 'uploads/s635l-4.jpg', 2, '4'),
(22, ' Haier 712 L', '<br />\r\nProduct Dimensions	73.8D x 90.8W x 190H Centimeters<br />\r\nBrand	Haier<br />\r\nCapacity	712 litres<br />\r\nConfiguration	French Door, Side-by-Side<br />\r\nEnergy Star	4 Star', 89000.00, 'uploads/h712.jpg', 'uploads/h712.jpg', 'uploads/h712-2.jpg', 'uploads/h712-3.jpg', 'uploads/h712-4.jpg', 2, '4'),
(23, 'Samsung 633', 'Product Dimensions	71.6D x 91.2W x 178H Centimeters<br />\r\nBrand	Samsung<br />\r\nCapacity	633 litres<br />\r\nConfiguration	Freezer-on-Top<br />\r\nEnergy Star	4.5 Star', 110000.00, 'uploads/s633.jpg', 'uploads/s633.jpg', 'uploads/s633-2.jpg', 'uploads/s633-3.jpg', 'uploads/s633-4.jpg', 2, '4'),
(24, 'LG 630', 'Side by Side Frost Free Refrigerator<br />\r\nfreezer capacity: 214 L | Fridge capacity: 416 L<br />\r\nRating: 3.5 Star<br />\r\nwarranty: 1 year ', 114500.00, 'uploads/lg630.jpg', 'uploads/lg630.jpg', 'uploads/lg630-2.jpg', 'uploads/lg630-3.jpg', 'uploads/lg630-4.jpg', 2, '4'),
(25, 'LG 688', '<br />\r\nProduct Dimensions	74.3D x 91.3W x 179H Centimeters<br />\r\nBrand	LG<br />\r\nCapacity	688 litres<br />\r\nConfiguration	Side-by-Side<br />\r\nEnergy Star	5 star rating', 105000.00, 'uploads/lg688.jpg', 'uploads/lg688.jpg', 'uploads/lg688-2.jpg', 'uploads/lg688-3.jpg', 'uploads/lg688-4.jpg', 2, '4'),
(26, 'Haier 598', '<br />\r\nProduct Dimensions	69.7D x 90.5W x 177.5H Centimeters<br />\r\nBrand	Haier<br />\r\nCapacity	598 litres<br />\r\nConfiguration	Side-by-Side<br />\r\nColour	Grey Onyx Glass', 99990.00, 'uploads/h598.jpg', 'uploads/h598.jpg', 'uploads/h598-2.jpg', 'uploads/h598-3.jpg', 'uploads/h598-4.jpg', 2, '4'),
(27, 'GPLUS 528L', '<br />\r\nProduct Dimensions	75D x 89.3W x 193H Centimeters<br />\r\nBrand	GPLUS<br />\r\nCapacity	528 litres<br />\r\nConfiguration	Bottom Frezzer<br />\r\nEnergy Star	5 Star', 86499.00, 'uploads/g528.jpg', 'uploads/g528.jpg', 'uploads/g528-2.jpg', 'uploads/g528-3.jpg', 'uploads/g528-4.jpg', 2, '4'),
(28, 'Samsung 530 ', '<br />\r\nProduct Dimensions	77D x 79W x 185.5H Centimeters<br />\r\nBrand	Samsung<br />\r\nCapacity	530 litres<br />\r\nConfiguration	Freezer-on-Top<br />\r\nEnergy Star	4 Star', 65500.00, 'uploads/s530.jpg', 'uploads/s530.jpg', 'uploads/s530-2.jpg', 'uploads/s530-3.jpg', 'uploads/s530-4.jpg', 2, '4');

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
(1, 'Mobiles', 1, 'MO024'),
(2, 'Computers', 1, 'CO024'),
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
(3, 'test027', 'Test0027', 'test@gmail.com'),
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
  ADD KEY `user_id` (`admin_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_orders`
--
ALTER TABLE `confirm_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  ADD CONSTRAINT `admin_data_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_data_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

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