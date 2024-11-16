-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 03:12 PM
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
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'vivek027', 'Vivek2705', 'viveklj2705@gmail.com'),
(2, 'krisha024', 'Krisha2410', 'krishalj2410@gmail.com'),
(7, 'admin', 'Admin123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `admin_data_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile_num` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`admin_data_id`, `admin_id`, `firstname`, `lastname`, `mobile_num`, `email`) VALUES
(1, 1, 'Vivek', 'Prajapati', '8849721477', 'viveklj2705@gmail.com'),
(2, 2, 'Krisha', 'Purohit', '8469407881', 'krishalj2410@gmail.com'),
(3, 7, 'admin', 'admin', '1133557799', 'admin@gmail.com');

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
(7, 3, 2, 154900.00, 'uploads/s24u.png', '2024-10-31 05:21:11'),
(8, 3, 3, 177900.00, 'uploads/sfold6.png', '2024-11-15 13:14:12');

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
(5, 3, 'test', 'a 16 ghanshyam nagar kanbha', 'ahmedabad', 'gujarat', '382430', 'Vivek Prajapati', '1111222233334444', 'May', '2029', '2244', 'test@gmail.com', '8849721477');

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
(28, 'Samsung 530 ', '<br />\r\nProduct Dimensions	77D x 79W x 185.5H Centimeters<br />\r\nBrand	Samsung<br />\r\nCapacity	530 litres<br />\r\nConfiguration	Freezer-on-Top<br />\r\nEnergy Star	4 Star', 65500.00, 'uploads/s530.jpg', 'uploads/s530.jpg', 'uploads/s530-2.jpg', 'uploads/s530-3.jpg', 'uploads/s530-4.jpg', 2, '4'),
(29, 'Blue Star Air Conditioner', 'Brand	Blue Star<br />\r\nCapacity	2 Tons<br />\r\nCooling Power	6.1 British Thermal Units<br />\r\nSpecial Feature	Dust Filter<br />\r\nProduct Dimensions	21.5D x 110W x 33.5H Centimeters<br />\r\n', 59000.00, 'uploads/bsac.jpg', 'uploads/bsac.jpg', 'uploads/bsac-2.jpg', 'uploads/bsac-3.jpg', 'uploads/bsac-4.jpg', 2, '5'),
(30, 'Daikin 2.02 Ton', 'rand	Daikin<br />\r\nCapacity	2.02 Tons<br />\r\nCooling Power	7.1 Kilowatts<br />\r\nSpecial Feature	High Ambient Operation upto 52°C, 3D Airflow, Good sleep off timer, PM 2.5 Filter, Self Diagnosis<br />\r\nProduct Dimensions	23.9D x 110W x 31H Centimeters', 55000.00, 'uploads/d2.02.jpg', 'uploads/d2.02.jpg', 'uploads/d2.02-2.jpg', 'uploads/d2.02-3.jpg', 'uploads/d2.02-4.jpg', 2, '5'),
(31, 'Daikin 1.8 Ton', '<br />\r\nBrand	Daikin<br />\r\nCapacity	1.8 Tons<br />\r\nCooling Power	6.2 Kilowatts<br />\r\nSpecial Feature	Inverter Compressor, Turbo cooling, 3D Airflow, Remote Control, Dew Clean Technology, Triple Display, PM 2.5 Filter, Dust Filter, Adjustable, Dehumidifier, Fast Cooling, High Ambient Operation upto 54°C, Auto Clean, Air Purification FilterInverter Compressor, Turbo cooling, 3D Airflow, Remote Control, Dew Clean Technology, Triple Display, PM 2.5 Filter, Dust Filter, Adjustable, Dehumidifier, Fast Cooling, High A… See more<br />\r\nProduct Dimensions	92.5D x 22.9W x 29.8H Centimeters', 68000.00, 'uploads/d1.8.jpg', 'uploads/d1.8.jpg', 'uploads/d1.8-2.jpg', 'uploads/d1.8-3.jpg', 'uploads/d1.8-4.jpg', 2, '5'),
(32, 'Daikin 2.5 ', '<br />\r\nBrand	Daikin<br />\r\nCapacity	2.5 Tons<br />\r\nCooling Power	6.2 Kilowatts<br />\r\nSpecial Feature	Inverter Compressor, ‎3D Airflow, High Ambient Operation upto 54°C, Dew Clean Technology, Triple Display, PM 2.5 Filter, Dust Filter, Air Purification Filter, Auto Clean, Dehumidifier, Fast Cooling<br />\r\nProduct Dimensions	92.5D x 22.9W x 29.8H Centimeters', 75000.00, 'uploads/d2.5.jpg', 'uploads/d2.5.jpg', 'uploads/d2.5-2.jpg', 'uploads/d2.5-3.jpg', 'uploads/d2.5-4.jpg', 2, '5'),
(33, 'Samsung 1 Ton ', '<br />\r\nBrand	Samsung<br />\r\nCapacity	1 Tons<br />\r\nCooling Power	3200 Watts<br />\r\nSpecial Feature	Inverter<br />\r\nEnergy Star	5 Star', 47500.00, 'uploads/s1.jpg', 'uploads/s1.jpg', 'uploads/s1-2.jpg', 'uploads/s1-3.jpg', 'uploads/s1-4.jpg', 2, '5'),
(34, 'Panasonic 1.5 Ton ', '<br />\r\nBrand	Panasonic<br />\r\nCapacity	1.5 Tons<br />\r\nCooling Power	17400 British Thermal Units<br />\r\nSpecial Feature	Smart AC- Wi-fi enabled, MirAie App enabled, work with Alexa and Ok Google, PM 0.1 Filter for air purification, 4 Way Swing &amp; Hidden Display, 7 in1 Convertible with True AI Mode, Voice Control with Alexa and Ok Google<br />\r\nProduct Dimensions	23.5D x 107W x 29H Centimeters', 50000.00, 'uploads/p1.5.jpg', 'uploads/p1.5.jpg', 'uploads/p1.5-2.jpg', 'uploads/p1.5-3.jpg', 'uploads/p1.5-4.jpg', 2, '5'),
(35, 'Panasonic EU', '<br />\r\nBrand	Panasonic<br />\r\nCapacity	1.5 Tons<br />\r\nCooling Power	17400 British Thermal Units<br />\r\nSpecial Feature	Indias 1st Matter Enable AC, 4Way Swing<br />\r\nProduct Dimensions	104D x 28.8W x 84.8H Centimeters', 46000.00, 'uploads/peu.jpg', 'uploads/peu.jpg', 'uploads/peu-2.jpg', 'uploads/peu-3.jpg', 'uploads/peu-4.jpg', 2, '5'),
(36, 'Godrej 2 Ton ', 'Brand	Godrej<br />\r\nCapacity	2 Tons<br />\r\nCooling Power	6.1 Kilowatts<br />\r\nSpecial Feature	5 in 1 Convertible, I-sense technology, Anti freeze, Self clean<br />\r\nProduct Dimensions	23D x 100W x 29.5H Centimeters', 43000.00, 'uploads/g2.jpg', 'uploads/g2.jpg', 'uploads/g2-2.jpg', 'uploads/g2-3.jpg', 'uploads/g2-4.jpg', 2, '5'),
(37, 'LG 1 Ton ', '<br />\r\nBrand	LG<br />\r\nCapacity	1 Tons<br />\r\nCooling Power	3.5 Kilowatts<br />\r\nSpecial Feature	Inverter Compressor, Remote Controlled, Anti Bacterial Filter, Auto Clean, Fast Cooling<br />\r\nProduct Dimensions	18.9D x 83.7W x 30.8H Centimeters', 49000.00, 'uploads/lg1.jpg', 'uploads/lg1.jpg', 'uploads/lg1-2.jpg', 'uploads/lg1-3.jpg', 'uploads/lg1-4.jpg', 2, '5'),
(38, 'LG WashTower 13 Kg /10 Kg ', 'Washer with Dryer<br />\r\n1400 rpm : Higher the spin speed, lower the drying time<br />\r\n5 Star Rating<br />\r\n13 kg', 220000.00, 'uploads/lgwt.jpg', 'uploads/lgwt.jpg', 'uploads/lgwt-2.jpg', 'uploads/lgwt-3.jpg', 'uploads/lgwt-4.jpg', 2, '6'),
(39, 'Samsung 11 kg', '<br />\r\nProduct Dimensions	60D x 60W x 85H Centimeters<br />\r\nBrand	Samsung<br />\r\nCapacity	11 Kilograms<br />\r\nSpecial Feature	Digital Inverter Technology, Hygiene Steam, Spin Speed : 1400 rpm, WiFi Embedded, AI Eco Bubble TechnologyDigital Inverter Technology, Hygiene Steam, Spin Speed : 1400 rpm, WiFi Embedded, AI Eco Bubble Technology<br />\r\nAccess Location	Front Load<br />\r\n', 60000.00, 'uploads/s11.jpg', 'uploads/s11.jpg', 'uploads/s11-2.jpg', 'uploads/s11-3.jpg', 'uploads/s11-4.jpg', 2, '6'),
(40, 'Samsung 9 Kg ', '<br />\r\nCapacity	9 Kilograms<br />\r\nColour	Inox<br />\r\nBrand	Samsung<br />\r\nProduct Dimensions	55D x 60W x 85H Centimeters<br />\r\nSpecial Feature	Child lock, Digital Inverter Technology, StayClean Drawer, Bubble Technology, 2nd Diamond Drum<br />\r\nCycle Options	Tub Clean<br />\r\nControls Type	Remote<br />\r\nMaximum Rotational Speed	1400 RPM<br />\r\nAccess Location	Front Load<br />\r\nItem Weight	65000 Grams', 50000.00, 'uploads/s9.jpg', 'uploads/s9.jpg', 'uploads/s9-2.jpg', 'uploads/s9-3.jpg', 'uploads/s9-4.jpg', 2, '6'),
(41, 'IFB 8 Kg', '<br />\r\nCapacity	8 Kilograms<br />\r\nColour	Mocha / WDR Door<br />\r\nBrand	IFB<br />\r\nProduct Dimensions	60.6D x 59.8W x 87.5H Centimeters<br />\r\nSpecial Feature	Aqua Energie, Wifi and Voice Enabled, 3D Wash Technology, 9 Swirl Powered by AI, 2x Power Steam<br />\r\nCycle Options	Active Steam, Baby Wear, Bedding, Extra Rinse, Cotton<br />\r\nVoltage	220 Volts<br />\r\nControls Type	Push Button<br />\r\nMaximum Rotational Speed	1400 RPM<br />\r\nAccess Location	Front Load', 55000.00, 'uploads/ifb8.jpg', 'uploads/ifb8.jpg', 'uploads/ifb8-2.jpg', 'uploads/ifb8-3.jpg', 'uploads/ifb8-4.jpg', 2, '6'),
(42, 'LG 11 Kg ', '<br />\r\nBrand	LG<br />\r\nCapacity	7 Kilograms<br />\r\nSpecial Feature	Easy to Install, Touch Control<br />\r\nAccess Location	Front Load<br />\r\nFinish Type	Chrome<br />\r\n', 52000.00, 'uploads/lg11.jpg', 'uploads/lg11.jpg', 'uploads/lg11-2.jpg', 'uploads/lg11-3.jpg', 'uploads/lg11-4.jpg', 2, '6'),
(43, 'IFB 10Kg', '<br />\r\nCapacity	10 Kilograms<br />\r\nColour	Silver<br />\r\nBrand	IFB<br />\r\nProduct Dimensions	66.7D x 59.8W x 87.5H Centimeters<br />\r\nSpecial Feature	Oxyjet Technology, Powered by AI, Eco Inverter<br />\r\nCycle Options	Synthetic, Spin, Jeans, Cotton, Normal, Eco, Bedsheet, Daily Wash, Tub Clean, Delicates, Sports Wear, Baby Wear, Curtain, Quick Wash, Wool, RinseSynthetic, Spin, Jeans, Cotton, Normal, Eco, Bedsheet, Daily Wash, Tub Clean, Delicates, Sports Wear, Baby Wear, Curtain, Quick Wash, Wool, Rinse<br />\r\nVoltage	220 Volts<br />\r\nControls Type	Remote<br />\r\nMaximum Rotational Speed	1400 RPM<br />\r\nItem Weight	76000 Grams', 48000.00, 'uploads/ifb10.jpg', 'uploads/ifb10.jpg', 'uploads/ifb10-2.jpg', 'uploads/ifb10-3.jpg', 'uploads/ifb10-4.jpg', 2, '6'),
(44, 'Siemens iQ500', '<br />\r\nProduct Dimensions	59D x 59.8W x 84.8H Centimeters<br />\r\nBrand	SIEMENS<br />\r\nCapacity	8 Kilograms<br />\r\nSpecial Feature	Auto Restart<br />\r\nAccess Location	Front Load', 43000.00, 'uploads/siq.jpg', 'uploads/siq.jpg', 'uploads/siq-2.jpg', 'uploads/siq-3.jpg', 'uploads/siq-4.jpg', 2, '6'),
(45, 'Bosch 9kg ', 'Capacity	9 Kilograms<br />\r\nColour	9kg- Black Grey<br />\r\nBrand	Bosch<br />\r\nProduct Dimensions	58D x 59.8W x 84.8H Centimeters<br />\r\nSpecial Feature	Child Lock, Hygiene Steam, Drum Clean, Delay Start, Inbuilt Heater<br />\r\nCycle Options	Speed Dry, Water Plus, Quick Wash, Heavy Duty, Extra Rinse<br />\r\nVoltage	240 Volts<br />\r\nControls Type	Remote<br />\r\nMaximum Rotational Speed	1400 RPM<br />\r\nAccess Location	Front Load', 40000.00, 'uploads/b9.jpg', 'uploads/b9.jpg', 'uploads/b9-2.jpg', 'uploads/b9-3.jpg', 'uploads/b9-4.jpg', 2, '6'),
(46, 'Samsung 214 cm', 'Screen Size	85 Inches<br />\r\nBrand	Samsung<br />\r\nDisplay Technology	Neo QLED<br />\r\nResolution	8K<br />\r\nRefresh Rate	100 Hz<br />\r\nSpecial Feature	Smart TV Features : Built-in Voice Assistant, Far-Field Voice Interaction | Supported apps: Netflix, Prime Video, YouTube, etc., Screen mirroring, Universal Guide, Media Home, Tap View, Mobile Camera Support, Music Wall, AI Speaker, Easy Setup, App Casting, Wireless DeX, SmartThings, Smart Hub, IoT Sensor, Web Browser<br />\r\nIncluded Components	1N LED TV, 1N Power Cord, 1N Remote Control, 2N Stand-Top, 1N OC,1 User Manual<br />\r\nConnectivity Technology	Bluetooth, Wi-Fi, USB, HDMI<br />\r\nProduct Dimensions	1.5D x 187.7W x 107.2H Centimeters<br />\r\nSupported Internet Services	Netflix, Prime Video, Zee5, SonyLiv, Youtube, Hotstar', 810000.00, 'uploads/s214.png', 'uploads/s214.png', 'uploads/s214-2.jpg', 'uploads/s214-3.jpg', 'uploads/s214-4.jpg', 3, '7'),
(47, 'Sony Bravia 210 cm ', '<br />\r\nScreen Size	83 Inches<br />\r\nBrand	Sony<br />\r\nDisplay Technology	OLED<br />\r\nResolution	4K<br />\r\nRefresh Rate	120 Hz<br />\r\nSpecial Feature	Google TV, Watchlist, Voice Search, Google Play, Chromecast, Netflix, Amazon Prime Video, Additional Features: Apple Airplay, Apple Homekit, AlexaGoogle TV, Watchlist, Voice Search, Google Play, Chromecast, Netflix, Amazon Prime Video, Additional Features: Apple Airplay, Apple Homekit, Alexa<br />\r\nIncluded Components	1 OLED TV, 1 AC Power Cord, 1 Remote Control, 1 Table-Top Stand, 1 User Manual, 2 AAA Batteries<br />\r\nConnectivity Technology	Wi-Fi, USB, Ethernet, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	5.3D x 185W x 106.7H Centimeters', 580000.00, 'uploads/sb210.png', 'uploads/sb210.png', 'uploads/sb210-2.jpg', 'uploads/sb210-3.jpg', 'uploads/sb210-4.jpg', 3, '7'),
(48, 'Sony BRAVIA 9 Series 215 cm ', 'Screen Size	85 Inches<br />\r\nBrand	Sony<br />\r\nDisplay Technology	LED<br />\r\nResolution	4K<br />\r\nRefresh Rate	120 Hz<br />\r\nSpecial Feature	Smart TV Features: Google TV | Watchlist | Google Assistance | Chromecast | Built In Mic | Game menu | ALLM/VRR/eARC (HDMI 2.1 Compatible) | Additional Features: Apple Airplay | Apple Homekit | Alexa | Bravia Cam Compatibility | Gesture Contro (With Cam)<br />\r\nIncluded Components	1 LED TV, 1 Warranty Card, 1 AC Power Cord, 1 Premium Eco Remote, 1 Quick Setup Guide<br />\r\nConnectivity Technology	Wi-Fi, USB, Ethernet, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	4.9D x 188.8W x 108.5H Centimeters', 570000.00, 'uploads/sb9.png', 'uploads/sb9.png', 'uploads/sb9-2.jpg', 'uploads/sb9-3.jpg', 'uploads/sb9-4.jpg', 3, '7'),
(49, 'Hisense 305 cm', '<br />\r\nScreen Size	120 Inches<br />\r\nBrand	Hisense<br />\r\nDisplay Technology	Laser TV<br />\r\nResolution	4K<br />\r\nRefresh Rate	60 Hz<br />\r\nSpecial Feature	‎‎RGB Triple Colour Laser Light Source | 107% Wide Colour Gamut | TUV Eye Protection | ARC supported |VIDAA OS U6, Designed specifically for Televisions: Fast, Simple &amp; Easy, Customizable | Quick Remote | App Store | Netflix | Prime Video | Yupp TV | Hungama | JioCinema &amp; more<br />\r\nIncluded Components	‎1 TV Unit, 1 Remote, 1 Wall Mount Bracket, 2 AAA Battery, 1 User Manual, 1 Warranty Card<br />\r\nConnectivity Technology	Wi-Fi, USB, Ethernet, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	0.04D x 2.7W x 1.53H Meters', 499999.00, 'uploads/h305.jpg', 'uploads/h305.jpg', 'uploads/h305-2.jpg', 'uploads/h305-3.jpg', 'uploads/h305-4.jpg', 3, '7'),
(50, 'TCL 248 cm ', '<br />\r\nScreen Size	98 Inches<br />\r\nBrand	TCL<br />\r\nDisplay Technology	Mini Led<br />\r\nResolution	4K<br />\r\nRefresh Rate	120 Hz<br />\r\nSpecial Feature	QD Mini LED | 500 | Loacl Dimming Zones | 144Hz VRR| AiPQ Processor 3.0 | IMAX Enhanced| HDR 10+ |Dolby Vision-Atmos |Game Master 2.0 |AMD FreeSync Premium ProQD Mini LED | 500 | Loacl Dimming Zones | 144Hz VRR| AiPQ Processor 3.0 | IMAX Enhanced| HDR 10+ |Dolby Vision-Atmos |Game Master 2.0 |AMD FreeSync Premium Pro<br />\r\nIncluded Components	1 N LED TV, 1 N Audio Cable, 1 N Stand, 1 N User Manual, 1 N Warranty Card, 1 N Remote, 2 N Batteries1 N LED TV, 1 N Audio Cable, 1 N Stand, 1 N User Manual, 1 N Warranty Card, 1 N Remote, 2 N Batteries<br />\r\nConnectivity Technology	Wi-Fi, USB, Ethernet, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	0.07D x 2.18W x 1.29H Meters', 449000.00, 'uploads/tcl248.png', 'uploads/tcl248.png', 'uploads/tcl248-2.jpg', 'uploads/tcl248-3.jpg', 'uploads/tcl248-4.jpg', 3, '7'),
(51, 'Hisense 254 cm', 'Screen Size	100 Inches<br />\r\nBrand	Hisense<br />\r\nDisplay Technology	QLED<br />\r\nResolution	4K<br />\r\nRefresh Rate	120 Hz<br />\r\nSpecial Feature	240 High Refresh Rate | Local Dimming Technology with 256 Local Dimming Zone | 2.1 Channel | WiSA Sound | 4K AI upscaling | MEMC | HDR 10+ Adaptive | Dolby Vision IQ | 144Hz Game Mode PRO | AMD FreeSync Premium | Built-in Alexa | Built-in Vidaa Voice | Supported Apps : Netflix, Youtube, Prime Video, Disney+Hotstar, SonyLiv, Hungama, JioCinema, Zee5, Eros Now<br />\r\nIncluded Components	‎1 TV Unit, 1 Remote, 2 Table Stand, 1 User Manual, 1 Warranty Card, 2 Batteries, 1Wall Mount<br />\r\nConnectivity Technology	Bluetooth, Wi-Fi, USB, Ethernet, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	0.1D x 2.24W x 1.29H Meters', 299999.00, 'uploads/h254.png', 'uploads/h254.png', 'uploads/h254-2.jpg', 'uploads/h254-3.jpg', 'uploads/h254-4.jpg', 3, '7'),
(52, 'Sony 189 cm ', '<br />\r\nScreen Size	75 Inches<br />\r\nBrand	Sony<br />\r\nDisplay Technology	LED<br />\r\nResolution	4K<br />\r\nRefresh Rate	120 Hz<br />\r\nSpecial Feature	Smart TV Features: Google TV | Watchlist | Google Assistance | Chromecast | Built In Mic | Game menu | ALLM/VRR/eARC (HDMI 2.1 Compatible) | Additional Features: Apple Airplay | Apple Homekit | Alexa | Bravia Cam Compatibility | Gesture Contro (With Cam)<br />\r\nIncluded Components	1 LED TV, 1 Warranty Card, 1 AC Power Cord, 1 Eco Remote, 1 Quick Setup Guide, 2 AAA Batteries<br />\r\nConnectivity Technology	Wi-Fi, USB, Ethernet, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	5.7D x 166.8W x 96H Centimeters', 264999.00, 'uploads/s189.png', 'uploads/s189.png', 'uploads/s189-2.jpg', 'uploads/s189-3.jpg', 'uploads/s189-4.jpg', 3, '7'),
(53, 'LG 164 cm', '<br />\r\nScreen Size	65 Inches<br />\r\nBrand	LG<br />\r\nDisplay Technology	OLED<br />\r\nResolution	4K<br />\r\nRefresh Rate	120 Hz<br />\r\nSpecial Feature	α7 AI 4K Gen5 Processor with AI Picture Pro, AI Sound Pro &amp; Dynamic Tone Mapping | Pixel Dimming, Perfect Black, 100% Color Fidelity &amp; Color Volume | Dolby Vision IQ, Dolby Atmos, Filmmaker Mode | NVIDIA G-Sync, AMD FreeSync, Game Dashboard &amp; Optimizer, 0.1 Response Time, VRR, ALLM | Eye Comfort Display: Low-Blue Light, Flicker-Free | Amazon Alexa, AI ThinQ, Google Assistant, Works with Apple Airplay<br />\r\nIncluded Components	‎‎‎1 OLED 4K TV, 1 User Manual, 1 Warranty Card, 1 Remote Control, 2 Batteries<br />\r\nConnectivity Technology	Bluetooth, Wi-Fi, USB, HDMI<br />\r\nAspect Ratio	16:9<br />\r\nProduct Dimensions	24.6D x 144.9W x 86.9H Centimeters', 190000.00, 'uploads/lg164.png', 'uploads/lg164.png', 'uploads/lg164-2.jpg', 'uploads/lg164-3.jpg', 'uploads/lg164-4.png', 3, '7'),
(54, 'Formovie Theater Projector ', '<br />\r\nBrand	Formovie<br />\r\nRecommended Uses For Product	Home Cinema<br />\r\nSpecial Feature	Short Throw<br />\r\nConnectivity Technology	Ethernet<br />\r\nDisplay resolution	3840 x 2160', 355000.00, 'uploads/fmt4k.jpg', 'uploads/fmt4k.jpg', 'uploads/fmt4k-2.jpg', 'uploads/fmt4k-3.jpg', 'uploads/fmt4k-4.jpg', 3, '8'),
(55, 'Formovie Cinema Edge', '<br />\r\nBrand	Formovie<br />\r\nRecommended Uses For Product	Home Cinema<br />\r\nSpecial Feature	Short Throw<br />\r\nConnectivity Technology	Wi-Fi, USB, HDMI, 3.5mm Jack<br />\r\nDisplay resolution	3840 x 2160', 295000.00, 'uploads/fce.jpg', 'uploads/fce.jpg', 'uploads/fce-2.jpg', 'uploads/fce-3.jpg', 'uploads/fce-4.jpg', 3, '8'),
(56, 'Viewsonic X1000', '<br />\r\nBrand	ViewSonic<br />\r\nRecommended Uses For Product	Home Cinema<br />\r\nSpecial Feature	Ultra Short Throw<br />\r\nConnectivity Technology	Wi-Fi, USB, HDMI<br />\r\nDisplay resolution	3840 x 2160', 290000.00, 'uploads/vsx.jpg', 'uploads/vsx.jpg', 'uploads/vsx-2.jpg', 'uploads/vsx-3.jpg', 'uploads/vsx-4.jpg', 3, '8'),
(57, 'Optoma HD39', '<br />\r\nBrand	Optoma<br />\r\nRecommended Uses For Product	Home Cinema<br />\r\nSpecial Feature	1.3x Zoom, 4k HDR input, Speakers, Low input lag 8.4ms, 3d-Ready<br />\r\nConnectivity Technology	USB, HDMI, 3.5mm Jack<br />\r\nDisplay resolution	1920 x 1080', 256000.00, 'uploads/ohd.jpg', 'uploads/ohd.jpg', 'uploads/ohd-2.jpg', 'uploads/ohd-3.jpg', 'uploads/ohd-4.jpg', 3, '8'),
(58, 'ViewSonic Lx700', 'Brand	ViewSonic<br />\r\nRecommended Uses For Product	Gaming<br />\r\nSpecial Feature	USB Connectivity, HDMI ConnectivitY<br />\r\nConnectivity Technology	USB, HDMI<br />\r\nDisplay resolution	3840 x 2160', 250000.00, 'uploads/vslx.png', 'uploads/vslx.png', 'uploads/vslx-2.jpg', 'uploads/vslx-3.jpg', 'uploads/vslx-4.jpg', 3, '8'),
(59, 'ViewSonic X1', 'Brand	ViewSonic<br />\r\nRecommended Uses For Product	Education, Home Cinema, Business<br />\r\nSpecial Feature	Built-In Speaker, Auto Focus, Wi-Fi Ready<br />\r\nConnectivity Technology	Bluetooth, Wi-Fi, USB, HDMI<br />\r\nDisplay Resolution Maximum	3840 x 2160 Pixels', 248000.00, 'uploads/vsx1.png', 'uploads/vsx1.png', 'uploads/vsx1-2.png', 'uploads/vsx1-3.png', 'uploads/vsx1-4.png', 3, '8'),
(60, 'WZATCO Bliss', '<br />\r\nBrand	WZATCO<br />\r\nRecommended Uses For Product	Office<br />\r\nSpecial Feature	Portable, Bluetooth, 3d Ready<br />\r\nConnectivity Technology	Bluetooth, Wi-Fi, HDMI<br />\r\nDisplay resolution	3840 x 2160', 248000.00, 'uploads/wb.jpg', 'uploads/wb.jpg', 'uploads/wb-2.jpg', 'uploads/wb-3.jpg', 'uploads/wb-4.jpg', 3, '8'),
(61, 'N1S Ultra', '<br />\r\nBrand	Generic<br />\r\nRecommended Uses For Product	Home Cinema<br />\r\nSpecial Feature	Auto Screen Alignment, Speakers, Short Throw<br />\r\nConnectivity Technology	Wi-Fi<br />\r\nDisplay resolution	3840 x 2160', 240000.00, 'uploads/nu.jpg', 'uploads/nu.jpg', 'uploads/nu-2.jpg', 'uploads/nu-3.jpg', 'uploads/nu-4.jpg', 3, '8'),
(62, 'JMGO O1 Pro', 'Brand	JmGO<br />\r\nRecommended Uses For Product	Tabletop<br />\r\nSpecial Feature	3D Blurays Built-In, Automatic Brightness Adjustment, Ultra Short Throw, Auto Focus &amp; Full Keystone Correction, 4K Projector Supported3D Blurays Built-In, Automatic Brightness Adjustment, Ultra Short Throw, Auto Focus &amp; Full Keystone Correction, 4K Projector Supported<br />\r\nConnectivity Technology	HDMI<br />\r\nDisplay resolution	1920 x 1080', 230000.00, 'uploads/jo.jpg', 'uploads/jo.jpg', 'uploads/jo-2.jpg', 'uploads/jo-3.jpg', 'uploads/jo-4.jpg', 3, '8');

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
(1, 'vivek04', 'Vivek001', 'vivek27005@gmail.com'),
(2, 'vyom027', 'Vivek027', 'vivek@gmail.com'),
(3, 'test027', 'Test0027', 'test@gmail.com'),
(5, 'test1', 'Test0024', 'test1@gmail.com'),
(7, 'vivek', 'Vivek027', 'vivek2@gmail.com'),
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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`admin_data_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `email` (`email`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `admin_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_orders`
--
ALTER TABLE `confirm_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  ADD CONSTRAINT `admin_data_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_data_ibfk_2` FOREIGN KEY (`email`) REFERENCES `admin` (`email`) ON DELETE CASCADE;

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
