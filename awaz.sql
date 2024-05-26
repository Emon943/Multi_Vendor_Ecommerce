-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 06:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `user` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product`, `user`) VALUES
(6, 2, '60-E3-27-1E-63-B1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `img` mediumtext NOT NULL,
  `icon` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `icon`, `status`) VALUES
(1, 'Books', 'books.jpg', 'book', 1),
(2, 'Electronics', 'tv.jpg', 'tv', 1),
(3, 'Fashion/Clothing', 'fashion.jpg', 'shopping-bag', 1),
(4, 'Home Appliances', 'Home-Electronics-Appliances-2.jpg', 'home', 1),
(5, 'Gadget/utility ', 'pendrive.jpg', 'truck', 1),
(6, 'Gift Item', 'item_gift.jpg', 'gift', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` bigint(20) NOT NULL,
  `product` int(11) NOT NULL,
  `invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `product`, `invoice`) VALUES
(1, 2, 3),
(2, 1, 3),
(3, 2, 3),
(4, 1, 3),
(5, 2, 4),
(6, 2, 5),
(7, 2, 6),
(8, 2, 6),
(9, 3, 6),
(10, 3, 6),
(11, 3, 6),
(12, 1, 7),
(13, 3, 8),
(14, 3, 8),
(15, 1, 9),
(16, 3, 9),
(17, 1, 9),
(18, 2, 10),
(19, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `fav_ad`
--

CREATE TABLE `fav_ad` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fav_ad`
--

INSERT INTO `fav_ad` (`id`, `p_id`, `u_id`) VALUES
(6, 2, 1),
(7, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `product` mediumtext NOT NULL,
  `amt` float NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `price` double NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `product` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `payment` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `ref` varchar(250) NOT NULL,
  `tx_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `user`, `price`, `email`, `mobile`, `address`, `product`, `comment`, `payment`, `status`, `ref`, `tx_id`) VALUES
(3, '2016-12-18 17:31:24', 1, 1698, 'ramsitech2016@gmail.com', '+8801927555912', 'Agargaon, Dhaka-1207', 4, 'Black color', 'Cash on Delivery', 0, '', ''),
(4, '2016-12-20 18:09:41', 2, 450, 'tanvircse10@gmail.com', '01918346262', '', 1, '', 'Cash on Delivery', 2, '', ''),
(5, '2017-01-03 13:12:02', 0, 450, 'user@gmail.com', '01918346262', 'Mirpur, Dhaka1207', 1, 'kisuna', 'Cash on Delivery', 0, '', ''),
(6, '2017-01-19 23:25:15', 6, 60900, 'motiur943@gmail.com', '01722243723', '', 5, '', 'Cash on Delivery', 0, '', ''),
(7, '2017-02-23 19:18:49', 6, 399, 'motiur943@gmail.com', '01722243723', '5/A,sheker-tech,', 1, 'test comment', 'Cash on Delivery', 0, '', ''),
(8, '2017-02-23 19:39:57', 1, 40000, 'ramsitech2016@gmail.com', '+8801979955603', 'gfhr', 2, 'gtrtgr', 'Cash on Delivery', 0, '', ''),
(9, '2017-02-26 23:41:57', 6, 20798, 'motiur943@gmail.com', '01722243723', 'à¦¬à§à¦¦à¦—à¦¬à¦—', 3, 'à¦«à¦—à¦¦à§à¦—', 'Cash on Delivery', 0, '', ''),
(10, '2017-03-09 06:43:08', 6, 450, 'motiur943@gmail.com', '01722243723', 'ffgfg', 1, '', 'Cash on Delivery', 0, '', ''),
(11, '2018-05-14 22:52:46', 6, 399, 'motiur943@gmail.com', '01722243723', 'csds', 1, 'dsds', 'Cash on Delivery', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `loc`
--

CREATE TABLE `loc` (
  `id` int(11) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loc`
--

INSERT INTO `loc` (`id`, `city`) VALUES
(1, 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(250) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `date`, `ip`, `user`) VALUES
(1, '2016-11-23 17:35:08', '::1', 1),
(2, '2016-11-26 11:15:02', '::1', 1),
(3, '2016-11-26 11:31:32', '::1', 1),
(4, '2016-11-26 17:04:10', '::1', 1),
(5, '2016-11-27 16:58:08', '::1', 1),
(6, '2016-11-30 12:12:00', '::1', 1),
(7, '2016-12-01 12:18:07', '::1', 1),
(8, '2016-12-03 16:33:43', '::1', 1),
(9, '2016-12-03 18:25:06', '::1', 1),
(10, '2016-12-04 10:53:28', '::1', 1),
(11, '2016-12-04 18:35:31', '::1', 1),
(12, '2016-12-04 18:43:28', '::1', 1),
(13, '2016-12-05 11:16:53', '::1', 1),
(14, '2016-12-06 17:38:23', '::1', 1),
(15, '2016-12-06 18:03:43', '::1', 1),
(16, '2016-12-07 17:43:20', '::1', 1),
(17, '2016-12-07 18:44:46', '::1', 1),
(18, '2016-12-08 11:49:41', '::1', 1),
(19, '2016-12-08 17:54:50', '::1', 1),
(20, '2016-12-08 18:30:49', '::1', 1),
(21, '2016-12-08 18:32:55', '::1', 1),
(22, '2016-12-10 17:15:42', '::1', 1),
(23, '2016-12-17 16:24:06', '::1', 1),
(24, '2016-12-18 10:41:11', '::1', 1),
(25, '2016-12-18 17:16:52', '::1', 1),
(26, '2016-12-19 10:58:50', '::1', 1),
(27, '2016-12-19 14:24:13', '::1', 2),
(28, '2016-12-19 14:38:04', '::1', 2),
(29, '2016-12-19 14:38:42', '::1', 2),
(30, '2016-12-19 16:09:26', '::1', 1),
(31, '2016-12-19 16:09:34', '::1', 2),
(32, '2016-12-19 16:09:47', '::1', 3),
(33, '2016-12-19 16:11:26', '::1', 1),
(34, '2016-12-19 16:11:35', '::1', 3),
(35, '2016-12-19 16:12:01', '::1', 3),
(36, '2016-12-19 18:53:39', '::1', 5),
(37, '2016-12-19 18:55:12', '::1', 3),
(38, '2016-12-20 10:57:03', '::1', 3),
(39, '2016-12-20 11:47:50', '::1', 1),
(40, '2016-12-20 11:51:14', '::1', 2),
(41, '2016-12-20 11:52:04', '::1', 2),
(42, '2016-12-20 11:52:28', '::1', 2),
(43, '2016-12-20 11:55:17', '::1', 2),
(44, '2016-12-20 14:06:42', '::1', 1),
(45, '2016-12-20 14:55:02', '::1', 3),
(46, '2016-12-20 15:34:11', '::1', 1),
(47, '2016-12-20 15:38:39', '::1', 1),
(48, '2016-12-20 15:44:57', '::1', 2),
(49, '2016-12-20 15:48:13', '::1', 2),
(50, '2016-12-20 15:54:32', '::1', 3),
(51, '2016-12-20 18:08:19', '::1', 3),
(52, '2016-12-20 18:08:56', '::1', 2),
(53, '2016-12-20 18:11:51', '::1', 3),
(54, '2016-12-20 18:17:16', '::1', 3),
(55, '2016-12-20 18:44:19', '::1', 3),
(56, '2016-12-20 19:09:21', '::1', 3),
(57, '2016-12-21 11:22:01', '::1', 1),
(58, '2016-12-21 11:25:01', '::1', 3),
(59, '2016-12-21 14:17:43', '::1', 1),
(60, '2016-12-21 16:07:29', '::1', 1),
(61, '2016-12-21 17:09:56', '::1', 1),
(62, '2016-12-21 18:24:47', '::1', 3),
(63, '2016-12-21 18:28:05', '::1', 3),
(64, '2016-12-21 18:49:11', '::1', 2),
(65, '2016-12-21 18:51:37', '::1', 1),
(66, '2016-12-22 13:27:08', '::1', 1),
(67, '2016-12-22 15:58:56', '::1', 1),
(68, '2016-12-22 16:01:25', '::1', 2),
(69, '2016-12-22 16:13:46', '::1', 1),
(70, '2016-12-22 16:50:13', '::1', 2),
(71, '2016-12-22 16:51:09', '::1', 1),
(72, '2017-01-03 12:16:31', '::1', 3),
(73, '2017-01-10 23:12:28', '::1', 2),
(74, '2017-01-10 23:17:00', '::1', 2),
(75, '2017-01-19 22:54:17', '::1', 0),
(76, '2017-01-19 22:57:54', '::1', 3),
(77, '2017-01-19 23:02:00', '::1', 1),
(78, '2017-01-19 23:24:56', '::1', 6),
(79, '2017-02-23 19:17:17', '::1', 6),
(80, '2017-02-23 19:22:32', '::1', 6),
(81, '2017-02-23 19:28:25', '::1', 1),
(82, '2017-02-26 23:29:45', '::1', 6),
(83, '2017-02-26 23:47:25', '::1', 3),
(84, '2017-03-09 06:42:40', '::1', 6),
(85, '2018-05-14 22:52:09', '::1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `name`, `cover`, `status`, `location`) VALUES
(1, 'Bashundhora City', 'Bashundhora City.jpg', 1, 'Panthapath, Dhaka 1215, Bangladesh'),
(2, 'Jamuna Feature Park', 'Jamuna Feature Park.JPG', 1, 'KA-244, Kuril, Progoti Shoroni, Baridhara, Dhaka'),
(3, 'Dhaka New Market', 'Dhaka New Market.jpg', 1, ''),
(4, 'Rapa Plaza', 'Rapa Plaza.jpg', 1, 'Dhanmondi 27, Dhaka-1205, Bangladesh'),
(5, 'Prince Plaza', 'Prince Plaza.jpg', 1, 'Dhanmondi 27, Dhaka-1205, Bangladesh'),
(6, 'Open Market', 'open_market.PNG', 1, 'Allover the country'),
(7, 'Shah Ali Plaza, Mirpur', 'shah_ali_plaza.jpg', 1, 'Mirpur-10, Dhaka-1216'),
(8, 'Mirpur Benaroshi Palli', 'benaroshi-polli.jpg', 1, 'Original Mirpur-10, Dhaka-1216');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `msg` longtext NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `p_id`, `mail`, `name`, `contact`, `msg`, `u_id`, `date`) VALUES
(1, 2, 'tanvircse10@gmail.com', 'Tanvir', '01918346262', 'prff', 1, '2016-12-06 17:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `s_cat` int(11) NOT NULL,
  `loc` int(11) NOT NULL,
  `short_des` longtext NOT NULL,
  `brand` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `img1` mediumtext NOT NULL,
  `img2` mediumtext NOT NULL,
  `img3` mediumtext NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `s_cat`, `loc`, `short_des`, `brand`, `price`, `user`, `date`, `status`, `img1`, `img2`, `img3`, `view`) VALUES
(1, 'Kleem Body Spray', 21, 12, 'This is currently available in dhanmondi only.\r\n<h4>Specification</h4>\r\n<table class="table table-condensed">\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>: Body Spray</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>: Alcohol</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Condition</td>\r\n			<td>: New</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>: 50g</td>\r\n		</tr>\r\n</table>\r\n									\r\nExtra details going here', 'Kleem', 399, 1, '2016-11-30 15:08:20', 0, 'Kleem Body Spray-1222234347.jpeg', 'Kleem Body Spray1-71752961.jpeg', 'Kleem Body Spray-754485519.jpeg', 4),
(2, 'Mens Casual T-shirt', 11, 12, 'This is currently available in dhanmondi only.\r\n<h4>Specification</h4>\r\n<table class="table table-condensed">\r\n		<tr>\r\n			<td>Material</td>\r\n			<td>: Body Spray</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>: Alcohol</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Condition</td>\r\n			<td>: New</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>: 50g</td>\r\n		</tr>\r\n</table>\r\n									\r\nExtra details going here', 'Dorjibari', 450, 1, '2016-11-30 17:12:50', 1, 'Mens Casual T-shirt-1057554056.jpeg', 'Mens Casual T-shirt-178728452.jpeg', 'Mens Casual T-shirt-1305327538.jpeg', 4),
(3, 'test', 5, 2, 'this a testing', 'Dell', 20000, 1, '2017-01-19 23:05:27', 0, 'test-777980538.jpeg', 'test-571990323.jpeg', 'test-569623609.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `rev` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `cat` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`id`, `name`, `icon`, `cat`, `status`) VALUES
(1, 'Educational Book', 'graduation-cap', 1, 1),
(2, 'Entertainment Book', 'film', 1, 1),
(3, 'TV', 'tv', 2, 1),
(4, 'Computer(PC)', 'desktop', 2, 1),
(5, 'Laptop', 'laptop', 2, 1),
(6, 'Mobile Phone/Smart Phone', 'mobile', 2, 1),
(7, 'Camera', 'camera', 2, 1),
(8, 'Speaker/Sound System', 'microphone', 2, 1),
(9, 'Tablet', 'tablet', 2, 1),
(10, 'Headphone/Earphone', 'headphones', 2, 1),
(11, 'Men''s Clothing', 'male', 3, 1),
(12, 'Female''s Clothing', 'female', 3, 1),
(13, 'Kids Fashion', 'odnoklassniki', 3, 1),
(14, 'Refrigerator', 'building', 4, 1),
(15, 'Furniture', 'wheelchair', 4, 1),
(16, 'AC', 'hdd-o', 4, 1),
(17, 'Sanitary/Bathroom Accessories', 'bed', 4, 1),
(18, 'Kitchen Accessories', 'coffee', 4, 1),
(19, 'E-book', 'file-pdf-o', 1, 1),
(20, 'Kids book', 'puzzle-piece', 1, 1),
(21, 'Men''s Accessories ', 'mars', 3, 1),
(22, 'Women''s Accessories ', 'venus', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `s_loc`
--

CREATE TABLE `s_loc` (
  `id` int(11) NOT NULL,
  `area` varchar(250) NOT NULL,
  `city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_loc`
--

INSERT INTO `s_loc` (`id`, `area`, `city`) VALUES
(1, 'Agargaon', 1),
(2, 'Azimpur', 1),
(3, 'Adabor', 1),
(4, 'Banani', 1),
(5, 'Badda', 1),
(6, 'Banasree', 1),
(7, 'Banglamotor', 1),
(8, 'Bangshal', 1),
(9, 'Basundhara', 1),
(10, 'Baridhara', 1),
(11, 'Cantonment', 1),
(12, 'Dhanmondi', 1),
(13, 'Demra', 1),
(14, 'Dohar', 1),
(15, 'Elephant Road', 1),
(16, 'Gandaria', 1),
(17, 'Gulshan', 1),
(18, 'Hazaribagh', 1),
(19, 'Jatrabari', 1),
(20, 'Kafrul', 1),
(21, 'Kamrangirchar', 1),
(22, 'Kolabagan', 1),
(23, 'Kawranbazar', 1),
(24, 'Khilgaon', 1),
(25, 'Khilkhet', 1),
(26, 'Kotowali', 1),
(27, 'Lalbag', 1),
(28, 'Malibag', 1),
(29, 'Mohammadpur', 1),
(30, 'Mirpur', 1),
(31, 'Mogbazar', 1),
(32, 'Mohakhali', 1),
(33, 'Motijheel', 1),
(34, 'Nawabganj', 1),
(35, 'New Market', 1),
(36, 'Pallabi', 1),
(37, 'Paltan', 1),
(38, 'Purbachal', 1),
(39, 'Ramna', 1),
(40, 'Rampura', 1),
(41, 'Sabujbag', 1),
(42, 'Shajahanpur', 1),
(43, 'Savar', 1),
(44, 'Sutrapur', 1),
(45, 'Tejgaon', 1),
(46, 'Uttarkhan', 1),
(47, 'Uttara', 1),
(48, 'Wari', 1),
(49, 'Monipur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `visit` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `short_des` longtext NOT NULL,
  `loc` int(11) NOT NULL,
  `pro` mediumtext NOT NULL,
  `cover` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `company` varchar(250) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `market` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `type`, `short_des`, `loc`, `pro`, `cover`, `date`, `email`, `mobile`, `company`, `pass`, `status`, `market`) VALUES
(0, 'Flying User', 0, '', 1, '', '', '2017-01-03 12:54:51', 'demo@gmail.com', '00000000', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(1, 'RAMS ITECH', 1, 'Welcome to awwazz store, this is the personal store of Awwazz.com. Here we offers one-stop source for the shopping products of awwazz. We want to bring e-commerce, to empower local entrepreneurs by helping them take their business online and to make shopping easy and accessible to everyone.', 12, 'e_quicker.png', 'awaz_banner.jpg', '2016-11-23 16:33:22', 'ramsitech2016@gmail.com', '+8801979955603', 'AWWAZZ', 'e10adc3949ba59abbe56e057f20f883e', 1, 6),
(3, 'Ramsitech(Master ID)', 2, '', 1, '', '', '2016-12-19 16:07:36', 'admin@gmail.com', '+8801927555913', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(5, 'Shabuz Khan', 1, 'It''s a clothing oriented Brand which is ensure optimistic and standard quality and remain constant to fulfill customer satisfaction.', 30, 'Shabuz Khan-329724831.jpeg', 'Shabuz Khan-1261995148.jpeg', '2016-12-19 18:47:38', 'shabuz23@gmail.com', '01960705305', 'ASH POLO HOUSE', '04a94f5691be447416258343a0f2b681', 1, 2),
(6, 'Motiur', 0, '', 8, '', '', '2017-01-19 23:24:39', 'motiur943@gmail.com', '01722243723', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(7, 'Motiur', 0, '', 4, '', '', '2017-01-19 23:28:13', 'novelty@gmail.com', '01722243723', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav_ad`
--
ALTER TABLE `fav_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loc`
--
ALTER TABLE `loc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_loc`
--
ALTER TABLE `s_loc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `fav_ad`
--
ALTER TABLE `fav_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loc`
--
ALTER TABLE `loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `s_loc`
--
ALTER TABLE `s_loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `traffic`
--
ALTER TABLE `traffic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
