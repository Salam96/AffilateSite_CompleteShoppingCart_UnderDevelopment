-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 19, 2017 at 03:30 AM
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
(187, 'salam', 'alsharma', '1111-11-07', 'salam@salam.com', 'sdasd', 'dsad', 160, 278),
(219, 'sdasd', 'sdaddsad', '1996-12-12', 'sdad@sdad.com', 'sdadsa', 'sdadsa', 193, 319);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`postcodeID`) REFERENCES `postcodeinfo` (`postcodeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`LoginID`) REFERENCES `login` (`LoginID`) ON DELETE CASCADE ON UPDATE CASCADE;
