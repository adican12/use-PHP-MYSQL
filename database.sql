-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 05:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `armentum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '9ae2be73b58b565bce3e47493a56e26a');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `adnotif` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  FOREIGN KEY (id) REFERENCES users(id)  ON UPDATE CASCADE
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `birthday` DATE,
  `status` int(10) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users`(`name`,`email`,`password`,`gender`,`moblie`,`user_type`,`image`,`birthday`,`status`);

INSERT INTO `users` VALUES('Wade Hope','WadeHope378@extex.org',999516934,'Male','4-511-031-6588','standard_users','aaaaa','2000-08-19',1);
INSERT INTO`users` VALUES('Rosalyn Lucas','RosalynLucas2177@typill.biz',465250861,'Female','4-471-404-5140','standard_users','aaaa','1995-09-28',1);
INSERT INTO `users` VALUES('Marigold Norburn','MarigoldNorburn8769@muall.tech',456184138,'Female','4-117-727-2662','standard_users','aaaa','1985-07-10',1);
INSERT INTO`users` VALUES('Iris Reynolds','IrisReynolds1824@fuliss.net',487127790,'Female','1-455-738-6817','standard_users','aaaa','1978-10-01',1);
INSERT INTO`users` VALUES('Maxwell Hall','MaxwellHall7231@bungar.biz',535110457,'Male','2-153-785-6478','standard_users','aaaa','1993-10-13',1);
INSERT INTO `users` VALUES('Caleb Robertson','CalebRobertson3342@dionrab.com',450586886,'Male','0-165-728-8276','business_user','aaaa','1992-05-10',1);
INSERT INTO `users` VALUES('Eden Roth','EdenRoth950@gembat.biz',759014147,'Female','8-764-486-1565','business_user','aaaa','1994-10-04',1);
INSERT INTO `users` VALUES('Carl White','CarlWhite7576@corti.com',1054481074,'Male','3-136-218-3854','standard_users','aaaa','1974-12-21',1);
INSERT INTO `users` VALUES('Chanelle Wade','ChanelleWade3216@famism.biz',1625229569,'Female','1-125-637-6414','advertiser_user','aaaa','1992-03-20',1);
INSERT INTO `users` VALUES('Cadence Malone','CadenceMalone2824@liret.org',668425611,'Female','5-117-365-6147','advertiser_user','aaaa','1995-04-10',1);
INSERT INTO`users` VALUES('Alice Robinson','Alice_Robinson5384@liret.org',-1878554145,'Female','4-231-273-7602','standard_users','aaaa','1983-11-22',1);
INSERT INTO `users` VALUES('Ronald Niles','RonaldNiles1146@deavo.com',5390391,'Male','0-157-300-6647','standard_users','aaaa','1979-10-20',1);
INSERT INTO `users` VALUES('Alice Gallacher','AliceGallacher4001@gmail.com',694987080,'Female','0-662-254-4133',,'standard_users''aaaa','1978-01-23',1);
INSERT INTO `users` VALUES('Lillian Quinn','LillianQuinn7303@famism.biz',1438660143,'Female','2-344-475-2253','standard_users','aaaa','1989-03-03',1);
INSERT INTO`users` VALUES('Anne Ingham','AnneIngham1690@liret.org',1401817239,'Female','7-161-583-0554','standard_users','aaaa','1985-11-09',1);
INSERT INTO `users` VALUES('David Weldon','DavidWeldon8278@naiker.biz',1960574613,'Male','0-816-325-2704','standard_users','aaaa','1992-10-19',1);
INSERT INTO `users` VALUES('Brad Griffiths','BradGriffiths9286@liret.org',3299235,'Male','7-846-273-4343','standard_users','aaaa','1967-05-15',1);
INSERT INTO `users` VALUES('Benjamin Coleman','BenjaminColeman4815@joiniaa.com',561293346,'Male','5-574-073-1776','standard_users','aaaa','188-01-17',1);
INSERT INTO `users` VALUES('Angela Thompson','AngelaThompson8415@joiniaa.com',655270230,'Female','4-318-330-7650','business_user','aaaa','1992-05-02',1);
INSERT INTO `users` VALUES('Enoch Roman','EnochRoman338@gembat.biz',690956420,'Male','3-766-600-6526','advertiser_user','aaaa','1984-01-01',1);
-- Indexes for dumped tables
--
CREATE TABLE `ad`(
`id` INT(11) NOT NULL AUTO_INCREMENT,
`image` TEXT NOT NULL,
`text` VARCHAR(50) NOT NULL,
`price` VARCHAR(50) NOT NULL,
`header` VARCHAR(50) NOT NULL,
PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleteduser`
--
ALTER TABLE `deleteduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deleteduser`
--
ALTER TABLE `deleteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
