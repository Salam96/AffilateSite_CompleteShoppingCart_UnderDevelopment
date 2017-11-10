-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 10, 2017 at 03:37 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(10) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `addressone` varchar(25) NOT NULL,
  `addresstwo` varchar(25) NOT NULL,
  `LoginID` int(10) NOT NULL,
  `postcodeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `DateOfBirth`, `email`, `addressone`, `addresstwo`, `LoginID`, `postcodeID`) VALUES
(171, 'salam', 'bahja', '0000-00-00', 'sdad@as.com', 'dasdsad', 'dads', 144, 262),
(183, 'sandy', 'antar', '1993-12-20', 'sandy@sandy.com', 'sdasda', 'sfsafsafsadasd', 156, 274),
(184, 'fadu', 'sdasd', '0000-00-00', 'sdasda@sdad.com', 'dada', 'dsadad', 157, 275),
(185, 'FADI', 'BAHJA', '1008-12-10', 'fadi@fadi.com', '2 nicol way', 'brendale', 158, 276),
(186, 'sdasdad', 'sdasd', '1994-12-12', 'sa@sa.com', 'sdasd', 'dasdasd', 159, 277),
(187, 'salam', 'alsharma', '0000-00-00', 'salam@salam.com', 'sdasd', 'dsad', 160, 278),
(192, 'ali', 'ali', '1994-11-30', 'zx@sa.com', 'sdad', 'sdad', 145, 266);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `DOB_LIMIT` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
  DECLARE msg VARCHAR(255);
      IF NEW.DateOfBirth > curdate() - INTERVAL 18 year THEN
          SET msg := 'You must be 18 year-old or older in order to create an account';
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
        END IF;     
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(10) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` int(10) NOT NULL,
  `UserType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `UserName`, `Password`, `UserType`) VALUES
(144, 'dads', 132321, 'Customer'),
(145, 'dadsad', 1, 'Customer'),
(148, 'fadi94', 22322232, 'Admin'),
(152, 'dadsad', 2113213, 'Customer'),
(153, 'sdad', 22322232, 'Customer'),
(155, 'ali', 22322232, 'Customer'),
(156, 'sandy', 123456, 'Customer'),
(157, 'user', 123456, 'Customer'),
(158, 'fadi', 22322232, 'Customer'),
(159, 'AlSharma', 22322232, 'Customer'),
(160, 'salam', 123456, 'Customer'),
(168, 'admin', 213231, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `date`) VALUES
(538, 183, '2017-10-20 07:55:44'),
(539, 183, '2017-10-20 09:14:51'),
(540, 183, '2017-10-20 09:15:59'),
(541, 185, '2017-10-20 10:17:09'),
(542, 185, '2017-10-20 12:54:47'),
(543, 185, '2017-10-20 13:02:16'),
(544, 185, '2017-10-20 13:05:14'),
(545, 185, '2017-10-20 13:09:20'),
(546, 185, '2017-10-20 13:45:00'),
(547, 186, '2017-10-20 14:10:35'),
(548, 186, '2017-10-20 14:33:00'),
(549, 186, '2017-10-20 14:37:20'),
(550, 186, '2017-10-22 10:44:08'),
(551, 183, '2017-10-23 01:38:14'),
(552, 183, '2017-10-23 01:38:32'),
(553, 187, '2017-10-24 08:56:00'),
(554, 187, '2017-10-24 08:56:20'),
(555, 187, '2017-10-24 14:00:43'),
(556, 186, '2017-10-25 05:43:31'),
(557, 186, '2017-10-25 05:43:49'),
(558, 186, '2017-10-30 06:47:36'),
(559, 186, '2017-11-06 01:37:45'),
(560, 186, '2017-11-06 01:53:38'),
(561, 186, '2017-11-06 03:29:04'),
(562, 186, '2017-11-06 03:35:33'),
(563, 186, '2017-11-06 03:51:59'),
(564, 186, '2017-11-06 03:58:23'),
(565, 186, '2017-11-06 04:26:43'),
(566, 186, '2017-11-06 04:31:20'),
(567, 186, '2017-11-06 04:35:13'),
(568, 186, '2017-11-06 04:38:29'),
(569, 186, '2017-11-06 04:38:34'),
(570, 186, '2017-11-06 05:11:16'),
(571, 186, '2017-11-06 05:14:16'),
(572, 186, '2017-11-06 05:17:45'),
(573, 186, '2017-11-06 12:16:33'),
(574, 186, '2017-11-06 13:02:51'),
(575, 186, '2017-11-06 13:09:11'),
(576, 186, '2017-11-06 13:12:19'),
(577, 186, '2017-11-06 13:59:38'),
(578, 186, '2017-11-06 14:17:46'),
(579, 186, '2017-11-06 14:48:09'),
(580, 186, '2017-11-06 14:50:29'),
(581, 186, '2017-11-06 14:53:32'),
(582, 186, '2017-11-06 14:59:15'),
(583, 186, '2017-11-06 15:10:28'),
(584, 186, '2017-11-06 15:22:47'),
(585, 186, '2017-11-06 15:35:19'),
(586, 186, '2017-11-06 15:39:44'),
(587, 186, '2017-11-07 03:01:40'),
(588, 186, '2017-11-07 03:03:13'),
(589, 186, '2017-11-07 03:06:51'),
(590, 186, '2017-11-07 03:14:45'),
(591, 186, '2017-11-07 03:15:13'),
(592, 186, '2017-11-07 03:15:24'),
(593, 186, '2017-11-07 03:36:07'),
(594, 186, '2017-11-07 03:36:45'),
(595, 186, '2017-11-07 03:41:42'),
(596, 186, '2017-11-07 03:45:13'),
(597, 186, '2017-11-07 03:49:26'),
(598, 186, '2017-11-07 03:50:14'),
(599, 186, '2017-11-07 03:54:06'),
(600, 186, '2017-11-08 02:31:18'),
(601, 186, '2017-11-09 04:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Items_ID` int(10) NOT NULL,
  `ProductsID` int(10) NOT NULL,
  `quantity` int(1) NOT NULL,
  `price` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `order_items`
--
DELIMITER $$
CREATE TRIGGER `QUANTITY_LIMIT` BEFORE INSERT ON `order_items` FOR EACH ROW BEGIN
  DECLARE msg VARCHAR(255);
      IF NEW.quantity > 20 THEN
          SET msg := 'Error: YOU CANNOT ORDER MORE THAN 5 ITEMS OF THIS PRODUCTS.';
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
        END IF;     
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `postcodeinfo`
--

CREATE TABLE `postcodeinfo` (
  `postcodeID` int(11) NOT NULL,
  `postcode` int(25) NOT NULL,
  `suburb` varchar(10) NOT NULL,
  `state` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcodeinfo`
--

INSERT INTO `postcodeinfo` (`postcodeID`, `postcode`, `suburb`, `state`) VALUES
(262, 31231, 'dads', 'sdadasd'),
(263, 1234, 'dad', 'das'),
(266, 12, 'dsa', 'dasd'),
(268, 2122, 'sdadad', 'Sadsad'),
(269, 2312, 'SDASDAD', 'SDASDA'),
(270, 2312, 'dadad', 'sdada'),
(271, 1312, 'dadasd', 'dadsad'),
(273, 4500, 'dooo', 'ssss'),
(274, 4500, 'brendale', 'qldd'),
(275, 1234, 'addad', 'dsadas'),
(276, 4500, 'Brendale', 'qldd'),
(277, 4500, 'daddasd', 'dasdasd'),
(278, 4500, 'brendale', 'cldd'),
(279, 2312, 'sdad', 'dads'),
(280, 2132, 'DSADSD', 'SDASDA'),
(281, 2313, 'scads', 'dada'),
(282, 3444, 'ssss', 'aaae'),
(283, 3444, 'ssss', 'aaae'),
(284, 3444, 'ssss', 'aaae'),
(296, 2313, 'sdadad', 'sdad');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(30) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Brand`, `Model`, `Quantity`, `Price`, `Image`, `Description`) VALUES
(20, 'Watch', 'Audemars Piguet', '2017', 2, 392, 'Audemars-Piguet.jpg', 'Founded in 1875 by Jules-Louis Audemars and Edward-Auguste Piguet, Audemars Piguet produces 36,000 of their prestigious timepieces a year. In fact, Tiffany &amp; Co and Bulgari use this brand’s movements. This luxury watch brand is also noted for creating'),
(21, 'Hand watch', 'Rolex.', '2016', 9, 2999, 'rolex.jpg', 'Rolex SA is a Swiss luxury watchmaker. The company and its subsidiary Montres Tudor SA design, manufacture, distribute and service wristwatches sold under the Rolex and Tudor brands. Founded by Hans Wilsdorf and Alfred Davis in London, Englan');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `PRODUCT_LIMIT` BEFORE INSERT ON `product` FOR EACH ROW BEGIN
DECLARE msg VARCHAR(255); IF NEW.quantity > 10 THEN SET msg := 'Error: you cannot order more than five products of this item.'; 
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg; 
END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salesrecords`
--

CREATE TABLE `salesrecords` (
  `SalesID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesrecords`
--

INSERT INTO `salesrecords` (`SalesID`, `CustomerID`, `date`) VALUES
(4, 183, '2017-10-20 04:34:15'),
(5, 183, '2017-10-20 04:34:16'),
(6, 183, '2017-10-20 04:34:18'),
(7, 183, '2017-10-20 04:34:30'),
(8, 183, '2017-10-20 04:34:31'),
(9, 183, '2017-10-20 04:34:31'),
(10, 183, '2017-10-20 04:34:31'),
(11, 183, '2017-10-20 04:34:36'),
(12, 183, '2017-10-20 04:34:42'),
(13, 183, '2017-10-20 04:34:43'),
(14, 183, '2017-10-20 04:34:43'),
(15, 183, '2017-10-20 04:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `ShoppingcartID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `SizeID` int(10) NOT NULL,
  `ImageID` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`ShoppingcartID`, `ProductID`, `SizeID`, `ImageID`, `Quantity`) VALUES
(3, 3, 4, 5, 0),
(4, 6, 8, 9, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `POSTCODE INDEX` (`postcodeID`),
  ADD KEY `LoginID` (`LoginID`),
  ADD KEY `postcodeID` (`postcodeID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Customer_ID` (`CustomerID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Items_ID`),
  ADD KEY `ProductsID` (`ProductsID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `OrderID_2` (`OrderID`),
  ADD KEY `ProductsID_2` (`ProductsID`);

--
-- Indexes for table `postcodeinfo`
--
ALTER TABLE `postcodeinfo`
  ADD PRIMARY KEY (`postcodeID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `salesrecords`
--
ALTER TABLE `salesrecords`
  ADD PRIMARY KEY (`SalesID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`ShoppingcartID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `ProductID_2` (`ProductID`),
  ADD KEY `SizeID` (`SizeID`),
  ADD KEY `ImageID` (`ImageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Items_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1205;
--
-- AUTO_INCREMENT for table `postcodeinfo`
--
ALTER TABLE `postcodeinfo`
  MODIFY `postcodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `salesrecords`
--
ALTER TABLE `salesrecords`
  MODIFY `SalesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`postcodeID`) REFERENCES `postcodeinfo` (`postcodeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`LoginID`) REFERENCES `login` (`LoginID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`ProductsID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesrecords`
--
ALTER TABLE `salesrecords`
  ADD CONSTRAINT `salesrecords_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
