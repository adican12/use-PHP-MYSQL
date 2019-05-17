-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2019 at 04:22 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catifi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
( 'admin', 'admin@admin.com', '9ae2be73b58b565bce3e47493a56e26a'),
( 'root', 'root@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduser`
--

CREATE TABLE IF NOT EXISTS `deleteduser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `adnotif` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` ( `name`, `email`, `password`, `gender`, `mobile`, `user_type`, `image`, `birthday`, `status`) VALUES
( 'yaronyaron', 'yaronyaron@gmail.com', '1', 'male', '1', 'business_user', '1', '1991-01-01', 1),
( 'adiadi', 'adiadi@gmail.com', '2', 'male', '2', 'business_user', 'asas', '1987-03-04', 1),
( 'yosiyosi', 'yosiyosi@gmail.com', '3', 'male', '3', 'business_user', 'assas', '1945-03-04', 1),
( 'omeromer', 'omeromer@gmail.com', '4', 'famle', '4', 'standard_user', 'assdsas', '1993-02-10', 1),
( 'chenchen', 'chenchen@gmail.com', '5', 'famle', '5', 'standard_user', 'assdsdsas', '1993-03-01', 1),
( 'taltal', 'taltal@gmail.com', '6', 'famle', '6', 'advertiser_user', 'asssddsdsas', '1994-10-11', 1),
( 'ligalligal', 'ligalligal@gmail.com', '11', 'Famle', '11', 'standard_user', 'sdsdds', '1990-02-02', 1),
( 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'business_user', 'sdsds', '1990-09-09', 1),
( 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'businessuser', 'sdsds', '1990-09-09', 1),
( 'daviddavid', 'david@gmail.com', '1234', 'male', '0506876824', 'standard_users', 'ass', '1991-01-04', 1),
( 'guyguy', 'guy@gmail.com', '12345', 'male', '050000324', 'standard_users', 'asdsdss', '1987-04-04', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `ad`(
`adID` INT(11) NOT NULL AUTO_INCREMENT,
`image` TEXT NOT NULL,
`text` VARCHAR(50) NOT NULL,
`price` VARCHAR(50) NOT NULL,
`header` VARCHAR(50) NOT NULL,
PRIMARY KEY(`adId`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `coupon`(
  `couponID`INT(11) NOT NULL AUTO_INCREMENT,
  `id` INT(11) NOT NULL,
  `image` VARCHAR(50) NOT NULL,
  `url` VARCHAR(50) NOT NULL,
  `counter` INT(6) NOT NULL,
  PRIMARY KEY(couponID),
  FOREIGN KEY(id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

CREATE TABLE `business`(
  `businessID`INT(11) NOT NULL AUTO_INCREMENT,
  `arID`INT(11) NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  `couponID`INT(11) NOT NULL,
  PRIMARY KEY(`businessID`),
  FOREIGN KEY (arID) REFERENCES ar(arID) ON DELETE CASCADE
  FOREIGN KEY (couponID) REFERENCES coupon(couponID) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;


CREATE TABLE `ar`(
  `arID`INT(11) NOT NULL AUTO_INCREMENT,
  `arLoctionX`FLOAT(6) NOT NULL,
  `arLoctionY`FLOAT(6) NOT NULL,
  `arPassword` VARCHAR(50) NOT NULL,
  `businessID` INT(11),
  PRIMARY KEY(`arID`),
  FOREIGN KEY (businessID) REFERENCES business(businessID) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;
