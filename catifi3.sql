-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2019 at 02:40 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catifi`
--
use adiDB;
-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

create table if not exists `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'root', 'root@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

create table if not exists`users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `status` int(10) NOT NULL,
  `user_category` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `gender`, `mobile`, `user_type`, `image`, `birthday`, `status`, `user_category`, `location_id`) VALUES
(1, 'yaronyaron', 'yaronyaron@gmail.com', '1', 'male', '1', 'business_user', '1', '1991-01-01', 0, 'Clothing', 0),
(2, 'adiadi', 'adiadi@gmail.com', '2', 'male', '2', 'business_user', 'asas', '1987-03-04', 0, 'Clothing', 0),
(3, 'yosiyosi', 'yosiyosi@gmail.com', '3', 'male', '3', 'business_user', 'assas', '1945-03-04', 0, 'Furniture', 0),
(4, 'omeromer', 'omeromer@gmail.com', '4', 'famle', '4', 'standard_user', 'assdsas', '1993-02-10', 0, 'Clothing', 0),
(5, 'chenchen', 'chenchen@gmail.com', '5', 'famle', '5', 'standard_user', 'assdsdsas', '1993-03-01', 0, 'Furniture', 0),
(6, 'taltal', 'taltal@gmail.com', '6', 'famle', '6', 'advertiser_user', 'asssddsdsas', '1994-10-11', 0, 'Safety and health', 0),
(7, 'ligalligal', 'ligalligal@gmail.com', '11', 'Famle', '11', 'standard_user', 'sdsdds', '1990-02-02', 0, 'Safety and health', 0),
(8, 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'business_user', 'sdsds', '1990-09-09', 0, 'Furniture', 0),
(9, 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'businessuser', 'sdsds', '1990-09-09', 0, 'Safety and health', 0),
(10, 'daviddavid', 'david@gmail.com', '1234', 'male', '0506876824', 'standard_users', 'ass', '1991-01-04', 0, 'Educational and textbooks', 0),
(11, 'guyguy', 'guy@gmail.com', '12345', 'male', '050000324', 'standard_users', 'asdsdss', '1987-04-04', 0, 'Educational and textbooks', 0);
-- --------------------------------------------------------

--
-- Table structure for table `business`
--

create table if not exists `business` (
  `businessID` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  `business_name` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY(`businessID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT = 1;

--
-- Dumping data for table `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `ap`
--

create table if not exists `ap` (
  `apID` int(11) NOT NULL AUTO_INCREMENT, ,
  `apPassword` varchar(50) NOT NULL,
  `businessID` int(11) DEFAULT NULL,
  PRIMARY KEY(`apID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

create table if not exists `coupon` (
  `couponID` int(11) NOT NULL AUTO_INCREMENT,
  `busID` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `counter` int(6) NOT NULL,
  `couponName` varchar(255) NOT NULL,
  PRIMARY KEY(`couponID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `coupon`
--
--
-- Table structure for table `ad`
--
/*---------------BEFRO CHANGES--------------*/
create table if not exists `ad` (
  `adID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `title` varchar(255) NOT NULL,
  `advID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `match_per` float NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*---------------AFTER  CHANGES--------------*/

/*
create table if not exists `ad` (
  `adID` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `title` varchar(255) NOT NULL,
  `advID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `match_per` float NOT NULL,
  PRIMARY KEY(`adID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT = 1;
*/
--
-- Dumping data for table `ad`
--
--
-- Table structure for table `campaign`
--

create table if not exists `campaign` (
  `campaignID` int(11) NOT NULL AUTO_INCREMENT,
  `campaignName` varchar(50) NOT NULL,
  `adID` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ageMin` int(6) NOT NULL,
  `ageMax` int(6) NOT NULL,
  `budget` float NOT NULL,
  `category` varchar(255) NOT NULL,
  `stratingDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `locationID` int(11) NOT NULL,
  PRIMARY KEY(`campaignID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT =1;

INSERT INTO `campaign`(`campaignName`, `adID`, `gender`, `ageMin`, `ageMax`, `budget`, `category`, `stratingDate`, `endDate`, `locationID`) VALUES
('Castro spring',11,'Male',20,40,500,'Clothing','2019-06-03','2019-07-05',1),
('be',2,'Famle',20,60,800,'Safety and health','2019-06-03','2019-07-05',2);

--
--
-- Table structure for table `deleteduser`
--

create table if not exists `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--
 /*------------befor changes----------*/
 /*
create table if not exists `feedback` (
  `feedback_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `adID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
/*---------------after the changes------------------*/
create table if not exists `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `businessID` int(11) NOT NULL
  `user_id` INT(11) NOT NULL,
  `adID` int(11) NOT NULL,
  PRIMARY KEY(`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `feedback`(`description`,`businessID`,`user_id`,`adID`) VALUES
('Great Ad Thanks',0,4,1),
('Thanks for fixing the problem with the advertisement',0,6,1),
('Convenient interface, quick coupon creation',1,2,0),

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

create table if not exists `locations` (
  `locationID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `info` varchar(256) NOT NULL,
  PRIMARY KEY(`locationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT =1;


-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

create table if not exists `notification` (
  `noteid` int(11) NOT NULL,
  `adid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
