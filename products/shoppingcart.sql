-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 13, 2017 at 11:09 AM
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
(186, 'sdasdad', 'sam', '1993-12-12', 'sa@sa.com', '2 nicol way', 'dasdasdsdad', 159, 277),
(187, 'salam', 'alsharma', '1111-11-07', 'salam@salam.com', 'sdasd', 'dsad', 160, 278),
(216, 'sasa', 'sasas', '1222-12-12', 'sad@sdad.com', 'sdad', 'sdad', 189, 315),
(218, 'sdasd', 'sdasda', '1996-02-05', 'sda@sda.co', 'sdasdad', 'sdasd', 192, 318),
(219, 'sdasd', 'sdaddsad', '1996-12-12', 'sdad@sdad.com', 'sdadsa', 'sdadsa', 193, 319),
(220, 'sdads', 'sdada', '1996-12-12', 'saddsa@sdad.com', 'sdad', 'sdad', 194, 320);

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
  `Password` varchar(255) NOT NULL,
  `UserType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LoginID`, `UserName`, `Password`, `UserType`) VALUES
(159, 'AlSharma', '22322232', 'Customer'),
(160, 'salam', '123456', 'Admin'),
(189, 'fatin', '212121', 'Customer'),
(192, 'sdasdad', '123456', 'Customer'),
(193, 'sadsd', '123456', 'Customer'),
(194, 'adad', 'sdadadsad33213', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(277, 2222, 'brendale', 'dasdasd'),
(278, 4500, 'brendale', 'cldd'),
(279, 2312, 'sdad', 'dads'),
(280, 2132, 'DSADSD', 'SDASDA'),
(281, 2313, 'scads', 'dada'),
(282, 3444, 'ssss', 'aaae'),
(283, 3444, 'ssss', 'aaae'),
(284, 3444, 'ssss', 'aaae'),
(296, 2313, 'sdadad', 'sdad'),
(297, 2323, 'sdadad', 'sdada'),
(298, 2313, 'sdadad', 'qld'),
(299, 4444, 'fsfsfs', 'dfsf'),
(300, 2332, 'dsadad', 'dadad'),
(301, 2313, 'adad', 'sdada'),
(302, 2222, 'sdad', 'dadad'),
(303, 2121, 'dadad', 'dsadad'),
(305, 2121, 'sasas', 'aadad'),
(306, 2222, 'dadad', 'sdasda'),
(308, 2132, 'dasdad', 'dada'),
(309, 3323, 'sadad', 'sdada'),
(310, 2313, 'sdadas', 'sdasda'),
(311, 2132, 'sdada', 'sdada'),
(312, 2132, 'sdada', 'sdada'),
(313, 2121, 'sdada', 'sadad'),
(314, 2323, 'sdadd', 'sdad'),
(315, 1231, 'asdsad', 'sdadd'),
(316, 2132, 'sdadsasd', 'dsasda'),
(318, 2313, 'sdasd', 'sdada'),
(319, 2132, 'sdad', 'dsadad'),
(320, 2133, 'sdadad', 'dadad');

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
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
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
  MODIFY `postcodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
