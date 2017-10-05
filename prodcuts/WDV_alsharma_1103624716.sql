-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 29, 2017 at 03:34 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `PostCodeInfoID` int(10) NOT NULL,
  `PostCode` varchar(255) NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `State` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(10) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `LoginID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `CategoryID` int(11) NOT NULL,
  `Label` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`CategoryID`, `Label`) VALUES
(1, 'Tech'),
(2, 'Acces');

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
(169, 'Andy2122222', 'dan', '1996-12-10', 'sadsa@sda.com', 'tafe', 'netengine', 142, 260),
(171, 'salam', 'bahja', '0000-00-00', 'sdad@as.com', 'dasdsad', 'dads', 144, 262),
(172, 'salam', 'sdad', '0000-00-00', 'sda@sda.com', 'dadsad', 'dasdada', 145, 263),
(175, 'fadi', 'dsad', '1996-12-10', 'salamemad11@yahoo.com', 'dsadsad', 'sdads', 148, 266),
(176, 'sdasd', 'sdasda', '1996-12-10', 'sda@sda.co', 'sdasdad', 'sdasd', 149, 267),
(177, 'sdasad', 'sadsad', '1996-12-10', 'sdad@sdda.com', 'dasd', 'sdad', 150, 268);

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
(142, 'andy', 1, 'Customer'),
(144, 'dads', 132321, 'Customer'),
(145, 'dadsad', 1, 'Customer'),
(148, 'fadi94', 22322232, 'Admin'),
(149, 'sdad', 0, 'Customer'),
(150, 'sdadadad', 0, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `date` date NOT NULL,
  `total_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `date`, `total_price`) VALUES
(443, 44, '2017-06-09', 32222);

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
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`Items_ID`, `ProductsID`, `quantity`, `price`, `OrderID`) VALUES
(1111, 22222, 0, 222, 0);

--
-- Triggers `order_items`
--
DELIMITER $$
CREATE TRIGGER `QUANTITY_LIMIT` BEFORE INSERT ON `order_items` FOR EACH ROW BEGIN
	DECLARE msg VARCHAR(255);
    	IF NEW.quantity > 5 THEN
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
(260, 23123, 'sadsad', 'sdads'),
(262, 31231, 'dads', 'sdadasd'),
(263, 1234, 'dad', 'das'),
(266, 12, 'dsa', 'dasd'),
(267, 2313, 'sdasd', 'sdada'),
(268, 2122, 'sdadad', 'Sadsad');

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
  `Description` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Brand`, `Model`, `Quantity`, `Price`, `Image`, `Description`, `CategoryID`) VALUES
(8, 'dasdasdasd', 'daoud', '2018', 4, 3, 'http://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/1068.png&w=288&h=288', 'sdadsas', 1),
(9, 'dadadsa', 'sdas', 'dead', 2, 23, 'http://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/359.png&w=288&h=288', 'weqeqe', 2),
(12, 'ffff', 'sdasd', '231', 2, 322, 'http://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/360.png&w=288&h=288', 'weqeqwe', 1),
(13, 'ewre', 'ewrew', '3', 3, 3242, 'http://a.espncdn.com/combiner/i?img=/i/teamlogos/soccer/500/367.png&w=288&h=288', 'dsadada', 2);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `PRODUCT_LIMIT` BEFORE INSERT ON `product` FOR EACH ROW BEGIN
DECLARE msg VARCHAR(255); IF NEW.quantity > 5 THEN SET msg := 'Error: you cannot order more than five products of this item.'; 
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
  `order.orderID` int(10) NOT NULL,
  `customer.CustomerID` int(10) NOT NULL,
  `order.total_price` int(10) NOT NULL,
  `order.date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesrecords`
--

INSERT INTO `salesrecords` (`order.orderID`, `customer.CustomerID`, `order.total_price`, `order.date`) VALUES
(22, 22, 200, '2017-06-14'),
(22, 22, 200, '2017-06-14');

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
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`PostCodeInfoID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `LoginID` (`LoginID`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`CategoryID`);

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
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `postcodeinfo`
--
ALTER TABLE `postcodeinfo`
  ADD PRIMARY KEY (`postcodeID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

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
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `postcodeinfo`
--
ALTER TABLE `postcodeinfo`
  MODIFY `postcodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
