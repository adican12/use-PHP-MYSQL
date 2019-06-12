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

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `adID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `title` varchar(255) NOT NULL,
  `advID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `match_per` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`adID`, `description`, `price`, `title`, `advID`, `image`, `match_per`) VALUES
(51, 'Lets learn accounting', 120, 'Accounting', 6, 'https://storage.googleapis.com/catifi2/newImages/Accounting.jpg', 0),
(52, 'Advertising Course', 135, 'Advertising', 15, 'https://storage.googleapis.com/catifi2/newImages/Advertising.png', 0),
(53, 'A tour of the ancient caves', 122, 'Antique', 16, 'https://storage.googleapis.com/catifi2/newImages/Antique.jpg', 0),
(54, 'Grandfathers paintings for purchase', 122, 'ArtAndCraftSupplies', 24, 'https://storage.googleapis.com/catifi2/newImages/ArtAndCraftSupplies.jpg', 0),
(55, 'Baby carriage for sale', 500, 'Baby-Products', 24, 'https://storage.googleapis.com/catifi2/newImages/BabyProducts.jpg', 0),
(56, 'Oils for shower', 89, 'Bath And Body', 25, 'https://storage.googleapis.com/catifi2/newImages/BathAndBody.jpg', 0),
(57, 'New camera lens', 230, 'Camera And Photographic Supplies', 25, 'https://storage.googleapis.com/catifi2/newImages/CameraAndPhotographicSupplies.jpg', 0),
(58, 'A new polo shirt is just for us', 147, 'Clothing', 36, 'https://storage.googleapis.com/catifi2/newImages/Clothing.jpg', 0),
(59, 'New 3D Art', 370, 'Digital Art', 38, 'https://storage.googleapis.com/catifi2/newImages/DigitalArt.jpg', 0),
(60, 'We\'ll help you write digital content', 320, 'Digital-Content', 40, 'https://storage.googleapis.com/catifi2/newImages/DigitalContent.png', 0),
(61, 'Preparation for matriculation exams', 1500, 'Educational And Textbooks', 43, 'https://storage.googleapis.com/catifi2/newImages/EducationalAndTextbooks.jpg', 0),
(62, 'A new Lord of the Rings movie is screened here', 70, 'Fiction And Non-fiction', 47, 'https://storage.googleapis.com/catifi2/newImages/FictionAndNonfiction.png', 0),
(63, 'The new perfume is now in operation', 100, 'Fragrances And Perfumes', 50, 'https://storage.googleapis.com/catifi2/newImages/FragrancesAndPerfumes.jpg', 0),
(64, 'Souvenirs from Eilat', 105, 'Memorabilia', 6, 'https://storage.googleapis.com/catifi2/newImages/Memorabilia.jpg', 0),
(65, 'Grand piano for sale', 1200, 'Music', 15, 'https://storage.googleapis.com/catifi2/newImages/Music.jpg', 0),
(66, 'Printing Your Book', 130, 'Publishing And Printing', 16, 'https://storage.googleapis.com/catifi2/newImages/PublishingAndPrinting.jpg', 0),
(67, 'exhibition', 130, 'Rare And Used Books', 24, 'https://storage.googleapis.com/catifi2/newImages/RareAndUsedBooks.jpg', 0),
(68, 'Stress tests for players', 80, 'Safety And Healt', 25, 'https://storage.googleapis.com/catifi2/newImages/SafetyAndHealth.jpg', 0),
(69, 'New fabrics are now in operation', 200, 'Sewing', 36, 'https://storage.googleapis.com/catifi2/newImages/SewingNeedleworkAndFabrics.jpg', 0),
(70, 'Stamp Exhibition', 50, 'Stamp And Coin', 38, 'https://storage.googleapis.com/catifi2/newImages/StampAndCoin.jpg', 0),
(71, 'Today, printing for Shenkar students', 50, 'Stationary Printing And WritingPaper', 40, 'https://storage.googleapis.com/catifi2/newImages/StationaryPrintingAndWritingPaper.png', 0),
(72, 'Exhibition of metals collection', 30, 'Vintage And Collectibl', 40, 'https://storage.googleapis.com/catifi2/newImages/VintageAndCollectible.jpg', 0);

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
(1, 'root', 'root@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ap`
--

CREATE TABLE `ap` (
  `apID` int(11) NOT NULL,
  `apPassword` varchar(50) NOT NULL,
  `businessID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap`
--

INSERT INTO `ap` (`apID`, `apPassword`, `businessID`) VALUES
(1, 'catifipassword', 18),
(2, 'catifipassword', 17),
(3, 'catifipassword', 16),
(4, 'catifipassword', 15),
(5, 'catifipassword', 14),
(6, 'catifipassword', 13),
(7, 'catifipassword', 12),
(8, 'catifipassword', 11),
(9, 'catifipassword', 10),
(10, 'catifipassword', 9),
(11, 'catifipassword', 8),
(12, 'catifipassword', 7),
(13, 'catifipassword', 6),
(14, 'catifipassword', 5),
(15, 'catifipassword', 4),
(16, 'catifipassword', 3),
(17, 'catifipassword', 1),
(18, 'catifipassword', 2),
(19, 'catifipassword', 19),
(20, 'catifipassword', 20),
(21, 'catifipassword', 21);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `businessID` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `locationID` int(11) NOT NULL,
  `business_name` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`businessID`, `category`, `locationID`, `business_name`, `user_id`) VALUES
(1, 'Restaurant', 2, 'Bieta coffe', 0),
(2, 'Restaurant', 3, 'TOTO', 0),
(3, 'Restaurant', 4, 'AMORA MIA', 0),
(4, 'Restaurant', 5, 'RESTAURANT', 0),
(5, 'Restaurant', 6, 'MODREN', 0),
(6, 'Restaurant', 7, 'MAHNA-YHEDA', 0),
(7, 'Restaurant', 8, 'VIVINO', 0),
(8, 'Restaurant', 9, 'THE-PROT-24', 0),
(9, 'Mall', 10, 'Azrieli Ayalon Mall', 0),
(10, 'Mall', 11, 'Ofer Mall', 0),
(11, 'Mall', 12, 'Arim Mall Kfar Saba', 0),
(12, 'Mall', 13, 'Ofer Shopping Center', 0),
(13, 'Mall', 14, 'The Givatayim Azrieli Mall', 0),
(14, 'Mall', 15, 'the Golden Mall', 0),
(15, 'Hotel', 16, 'grand beach', 0),
(16, 'Hotel', 17, 'Dan Hotel', 0),
(17, 'Hotel', 18, 'Lendore Botik', 0),
(18, 'Hotel', 19, 'rimonim Hotel', 0),
(19, 'Hotel', 20, 'aiibi', 0),
(20, 'Hotel', 21, 'lenord', 0),
(21, 'Hotel', 22, 'beway', 0);

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaignID` int(11) NOT NULL,
  `campaignName` varchar(50) NOT NULL,
  `adID` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ageMin` int(6) NOT NULL,
  `ageMax` int(6) NOT NULL,
  `budget` float NOT NULL,
  `category` varchar(50) NOT NULL,
  `stratingDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaignID`, `campaignName`, `adID`, `gender`, `ageMin`, `ageMax`, `budget`, `category`, `stratingDate`, `endDate`, `locationID`) VALUES
(1, 'A tour of the ancient caves', 9, 'male&famle', 58, 37, 87, 'Antiques', '2024-08-07', '2024-12-12', 9),
(2, 'Digital', 4, 'male', 49, 61, 190, 'Digital art', '2019-11-14', '2024-02-12', 2),
(3, 'Store souvenirs', 4, 'famle', 20, 26, 185, 'Memorabilia', '2026-02-22', '2023-06-12', 8),
(4, 'A new drug', 3, 'male', 31, 63, 252, 'Safety and health', '2018-08-25', '2021-12-31', 3),
(5, 'Bath soaps', 5, 'famle', 16, 72, 100, 'Bath and body', '2020-08-29', '2026-09-08', 6),
(6, 'crib', 1, 'male', 24, 59, 384, 'Baby products (other)', '2027-04-06', '2028-05-18', 8),
(7, 'Button-down shirts', 4, 'male', 21, 59, 200, 'Clothing', '2027-04-12', '2020-01-28', 6),
(8, 'An exhibition of collectible cars', 7, 'male', 18, 26, 164, 'Vintage and collectibles', '2021-02-27', '2020-01-07', 13),
(9, 'perfume', 9, 'famle', 29, 75, 107, 'Fragrances and perfumes', '2021-08-20', '2022-03-10', 11),
(10, 'makeup set', 1, 'famle', 46, 65, 195, 'Makeup and cosmetics', '2023-08-03', '2024-10-06', 4),
(11, 'New printers', 9, 'male&famle', 54, 54, 177, 'Publishing and printing', '2022-12-22', '2025-07-21', 5),
(12, 'Forbes Magazine', 8, 'male&famle', 43, 67, 397, 'Magazines', '2018-12-26', '2020-09-24', 5),
(13, 'Teachers are required', 4, 'male&famle', 16, 57, 170, 'Educational and textbooks', '2024-06-25', '2025-09-19', 5),
(14, 'How to publish', 6, 'male&famle', 20, 25, 156, 'Advertising', '2027-12-07', '2020-04-30', 2),
(15, 'Safety conference on the construction site', 8, 'male', 63, 72, 121, 'Construction', '2020-09-12', '2023-11-16', 3),
(16, 'Guitars for sale', 1, 'male&famle', 23, 45, 195, 'Music store (instruments and sheet music)', '2021-09-18', '2022-07-15', 4),
(17, 'Sale of old stamps', 5, 'male&famle', 39, 62, 213, 'Clothing', '2020-08-05', '2023-10-07', 8),
(18, 'Create site content', 2, 'famle', 32, 38, 220, 'Digital content', '2019-03-13', '2021-04-10', 7),
(19, 'Exhibition of paintings', 3, 'male&famle', 20, 27, 360, 'Commercial photography, art, and graphics', '2019-07-08', '2022-05-14', 3),
(20, 'New Camera', 4, 'male&famle', 30, 32, 145, 'Commercial photography, art, and graphics', '2020-05-25', '2023-09-23', 1),
(21, 'An old comics exhibition', 3, 'male', 28, 34, 338, 'Rare and used books', '2020-11-20', '2023-04-04', 2),
(22, 'A tour of the farmers\' fields', 6, 'famle', 18, 23, 279, 'Agricultural', '2021-05-07', '2022-01-10', 8),
(23, 'Degree in Architecture', 8, 'male&famle', 22, 39, 338, 'Architectural, engineering.', '2022-04-30', '2028-03-13', 6),
(24, 'Vegetables straight from the parts', 8, 'male&famle', 62, 59, 295, 'Agricultural', '2019-12-10', '2021-05-05', 6),
(25, 'Let\'s learn how to write digital content', 4, 'male&famle', 39, 52, 222, 'Digital content', '2020-11-24', '2020-12-12', 8),
(26, 'Multi-level marketing course', 4, 'male', 31, 34, 125, 'Multi-level marketing', '2018-12-02', '2026-07-30', 3),
(27, 'Designer clothes for Children', 4, 'famle', 28, 30, 226, 'Children & clothing', '2018-02-19', '2019-07-09', 7),
(28, 'Wholesale sweets', 7, 'male', 23, 36, 160, 'Wholesale', '2018-01-28', '2019-04-12', 6),
(29, 'Designer clothes for men', 2, 'male', 26, 26, 217, 'Men & clothing', '2019-04-14', '2020-01-21', 7),
(30, 'Order Packing & Shipping Supplies', 9, 'male', 21, 67, 270, 'Shipping and packing', '2023-09-18', '2023-12-28', 3);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `couponID` int(11) NOT NULL,
  `busID` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `counter` int(6) NOT NULL,
  `couponName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`couponID`, `busID`, `imageURL`, `counter`, `couponName`) VALUES
(1, 1, 'https://storage.googleapis.com/catifi2/newImages/Clothing.jpg', 3, 'Clothing'),
(2, 2, 'https://storage.googleapis.com/catifi2/newImages/VintageAndCollectible.jpg', 10, 'VintageAndCollectible'),
(3, 3, 'https://storage.googleapis.com/catifi2/newImages/StampAndCoin.jpg', 7, 'StampAndCoin'),
(4, 8, 'https://storage.googleapis.com/catifi2/newImages/Magazines.jpg', 4, 'Magazines'),
(5, 13, 'https://storage.googleapis.com/catifi2/newImages/Music.jpg', 9, 'Music'),
(6, 19, 'https://storage.googleapis.com/catifi2/newImages/DigitalContent.png', 5, 'DigitalContent'),
(7, 22, 'https://storage.googleapis.com/catifi2/newImages/Advertising.png', 9, 'Advertising'),
(8, 23, 'https://storage.googleapis.com/catifi2/newImages/Accounting.jpg', 4, 'Accounting'),
(9, 28, 'https://storage.googleapis.com/catifi2/newImages/BathAndBody.jpg', 13, 'BathAndBody'),
(10, 33, 'https://storage.googleapis.com/catifi2/newImages/BabyProducts.jpg', 22, 'BabyProducts'),
(11, 35, 'https://storage.googleapis.com/catifi2/newImages/ArtAndCraftSupplies.jpg', 3, 'Art'),
(12, 44, 'https://storage.googleapis.com/catifi2/newImages/CameraAndPhotographicSupplies.jpg', 11, 'Camera&Photo'),
(13, 48, 'https://storage.googleapis.com/catifi2/newImages/Furniture.jpg', 6, 'Furniture'),
(14, 49, 'https://storage.googleapis.com/catifi2/newImages/FictionAndNonfiction.png', 6, 'FictionAndNonfiction'),
(15, 3, 'https://storage.googleapis.com/catifi2/newImages/StationaryPrintingAndWritingPaper.png', 6, 'StationaryPrintingAndWritingPaper'),
(16, 1, 'www.someting.co.il', 5, 'TEST'),
(17, 1, 'www.someting.co.il', 5, 'TEST');

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
  `feedback_id` int(11) NOT NULL,
  `ad_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationID` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `info` varchar(256) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationID`, `lat`, `lng`, `info`, `userID`) VALUES
(1, 48.1756, 16.42, 'H - smalle rooms,free wifi', 1),
(2, 31.7834, 35.2169, 'H - free wifi,Childrens Activities', 2),
(3, 31.7824, 35.2168, 'H - free wifi,Childrens Activities,Air conditioning', 3),
(4, 32.0729, 34.7656, 'H - free wifi,Childrens Activities,Air conditioning,Bar', 8),
(5, 32.9831, 35.1954, 'R - Druze food', 13),
(6, 32.0509, 34.7605, 'R - Cheaper, meat', 14),
(7, 32.1653, 34.8233, 'M - Fashion, restaurants, bars', 19),
(8, 45.4216, 12.3762, 'H - Good location away from the crouds', 22),
(9, 40.6897, -95.7888, 'H - Great view', 23),
(10, 34.6647, -120.115, 'H - Loved this Wonderful Boutique Hotel!', 33),
(11, 34.6647, -120.115, 'H - Loved this Wonderful Boutique Hotel!', 35),
(12, 34.5699, 31.6809, 'R - Pizza', 44),
(13, 34.5699, 31.6681, 'R - Pizza', 48),
(14, 34.57, 31.6677, 'R - Excellent coffee and cheap', 49),
(15, 32.1872, 34.792, 'R-Excellent coffee and cheap', 13),
(16, 32.1648, 34.781, 'R-Coffe And breakfasts', 14),
(17, 32.121, 34.7731, 'R-restaurants', 19),
(18, 32.0927, 34.7838, 'R-Very Good Food Nice Place', 23),
(19, 32.1256, 34.7924, 'R-Good Food Great View', 22),
(20, 31.8298, 35.2136, 'R-Coffe And breakfasts', 28),
(21, 31.835, 35.2038, 'R-Coffe And breakfasts', 33),
(22, 32.8896, 34.9866, 'R-Coffe', 35),
(23, 32.9194, 35.0022, 'R-Good Food Great View', 48),
(24, 32.1352, 34.7813, 'H - Loved this Wonderful Boutique Hotel!', 49),
(25, 32.135, 34.7616, 'H - Good location away from the crouds', 1),
(26, 32.1394, 34.8367, 'H - Good location away from the crouds', 2),
(27, 31.8153, 35.1695, 'H - Good location ,Great View ', 3),
(28, 31.8359, 35.215, 'H - Good location ,Great View ,Great Food', 8),
(29, 32.8918, 34.9415, 'H - Loved this Wonderful Boutique Hotel!', 13),
(30, 32.9035, 34.9919, 'H - Great View 5 Stars', 14),
(31, 32.1018, 34.8269, 'M - Fashion, restaurants, bars', 19),
(32, 32.1133, 34.7962, 'M - Fashion, restaurants, bars', 22),
(33, 32.1842, 34.9053, 'M - Fashion, restaurants, bars', 23),
(34, 32.0951, 34.8656, 'M - Fashion, restaurants, bars', 28),
(35, 32.0674, 34.8094, 'M - Fashion, restaurants, bars', 33),
(36, 31.9949, 34.7744, 'M - Fashion, restaurants, bars', 35);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noteid` int(11) NOT NULL,
  `adid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
(1, 'yaronyaron', 'yaronyaron@gmail.com', '1', 'male', '1', 'business_user', '1', '1991-01-01', 1, 'Clothing', 0),
(2, 'adiadi', 'adiadi@gmail.com', '2', 'male', '2', 'business_user', 'asas', '1987-03-04', 1, 'Clothing', 0),
(3, 'yosiyosi', 'yosiyosi@gmail.com', '3', 'male', '3', 'business_user', 'assas', '1945-03-04', 1, 'Furniture', 0),
(4, 'omeromer', 'omeromer@gmail.com', '4', 'famle', '4', 'standard_user', 'assdsas', '1993-02-10', 1, 'Clothing', 0),
(5, 'chenchen', 'chenchen@gmail.com', '5', 'famle', '5', 'standard_user', 'assdsdsas', '1993-03-01', 1, 'Furniture', 0),
(6, 'taltal', 'taltal@gmail.com', '6', 'famle', '6', 'advertiser_user', 'asssddsdsas', '1994-10-11', 1, 'Safety and health', 0),
(7, 'ligalligal', 'ligalligal@gmail.com', '11', 'Famle', '11', 'standard_user', 'sdsdds', '1990-02-02', 1, 'Safety and health', 0),
(8, 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'business_user', 'sdsds', '1990-09-09', 1, 'Furniture', 0),
(9, 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'businessuser', 'sdsds', '1990-09-09', 1, 'Safety and health', 0),
(10, 'daviddavid', 'david@gmail.com', '1234', 'male', '0506876824', 'standard_users', 'ass', '1991-01-04', 1, 'Educational and textbooks', 0),
(11, 'guyguy', 'guy@gmail.com', '12345', 'male', '050000324', 'standard_users', 'asdsdss', '1987-04-04', 1, 'Educational and textbooks', 0),
(12, 'Travis Chase', 'adipiscingMauris@Praesentluctus.org', '1640041508699', 'male', '0399 215 6394', 'standard_users', '11', '1988-02-27', 1, 'Vintage and collectibles', 0),
(13, 'Allistair Pruitt', 'etnunc@fermentumconvallisligula.org', '1686041', 'famle', '01843104919', 'business_user', '12', '1993-02-12', 0, 'Clothing', 0),
(14, 'Kermit Simon', 'Crasdictum@ascelerisque.org', '1628043099399', 'male', '01160482874', 'business_user', '13', '1995-05-14', 0, 'Furniture', 0),
(15, 'Sylvester Gilliam', 'tempus@Nulla.org', '1683102126899', 'male', '0172006889', 'advertiser_user', '14', '1985-06-15', 1, 'Baby products (other)', 0),
(16, 'Clark Carroll', 'nec@rutrumurnanec.org', '1696040705899', 'male', '0276429 6348', 'advertiser_user', '15', '1977-05-03', 1, 'Safety and health', 0),
(17, 'Ivan Berger', 'sapiengravidanon@vitae.org', '1681032307999', 'male', '0898 336 8809', 'standard_users', '16', '2002-06-16', 0, 'Bath and body', 0),
(18, 'Asher Thornton', 'ultrices@erat.net', '1663102563799', 'male', '0500045418', 'standard_users', '17', '1987-03-24', 1, 'Fragrances and perfumes', 0),
(19, 'Wang Emerson', 'aliquam@ametultriciessem.edu', '1689082687699', 'famle', '01346496219', 'business_user', '18', '1995-05-19', 0, 'Makeup and cosmetics', 0),
(20, 'Price Case', 'lorem@gmail.con', '1649081051999', 'famle', '01473993236', 'standard_users', '19', '1997-02-20', 0, 'Audio books', 0),
(21, 'Emerson Webb', 'Emerson Webb@erat.net', '1611062179799', 'male', '08352592362', 'standard_users', '20', '1996-04-23', 1, 'Digital content', 0),
(22, 'Troy Kirby', 'odio@Cras.com', '1631061626699', 'famle', '08454640', 'standard_users', '21', '1993-12-25', 1, 'Educational and textbooks', 0),
(23, 'Logan Campbell', 'Fusce@mienimcondimentum.net', '1642022598599', 'male', '08004774407', 'standard_users', '23', '2004-09-07', 0, 'Magazines', 0),
(24, 'Wallace Reed', 'vestibulum@Integer.com', '1631090948799', 'famle', '7641017030', 'business_user', '24', '1998-07-12', 1, 'Publishing and printing', 0),
(25, 'Bevis Bernard', 'nascetur@Aliquamauctor.com', '1667031824099', 'famle', '800206937', 'standard_users', '25', '2013-08-20', 0, 'Rare and used books', 0),
(26, 'Stephen Holmes', 'Duis@aliquet.edu', '1658030603399', 'male', '500087225', 'business_user', '26', '1976-01-14', 1, 'Accounting', 0),
(27, 'Channing Mercer', 'libero@libero.com', '1620122232999', 'male', '02166184917', 'advertiser_user', '27', '1996-05-20', 1, 'Advertising', 0),
(28, 'Ivan Vance', 'porttitor@loremloremluctus.com', '1674030943399', 'male', '7064366825', 'standard_users', '28', '1990-09-21', 1, 'Agricultural', 0),
(29, 'Fitzgerald Huffman', 'urna@quislectus.com', '1638122135199', 'famle', '164498048', 'advertiser_user', '29', '2001-10-03', 0, 'Architectural, engineering, and surveying services', 0),
(30, 'Xander Mcdowell', 'quis@luctuslobortis.edu', '1640112449199', 'famle', '8786515875', 'standard_users', '30', '2005-05-03', 0, 'Chemicals and allied products', 0),
(31, 'Norman Griffith', 'ornare@orciPhasellus.com', '1658060219199', 'male', '8009943620', 'advertiser_user', '31', '1991-06-06', 1, 'Commercial photography, art, and graphics.', 0),
(32, 'Reed Rocha', 'dui@rhoncusid.com', '6021919912122', 'famle', '08001111', 'standard_users', '32', '2003-11-04', 0, 'Construction', 0),
(33, 'Aristotle Day', 'nibh@egestasrhoncusProin.com', '1625021854099', 'famle', '07028836641', 'standard_users', '33', '1993-04-02', 1, 'Consulting services', 0),
(34, 'Lyle Rasmussen', 'imperdiet@luctussit.com', '1604062528399', 'famle', '1978476685', 'advertiser_user', '34', '2005-11-06', 0, 'Educational services', 0),
(35, 'Amir Hardy', 'Suspendisse@Aeneangravidanunc.co', '1623020878199', 'male', '169776176', 'business_user', '35', '1993-12-13', 0, 'Equipment rentals and leasing services', 0),
(36, 'Keegan Marks', 'interdum@etrisusQuisque.net', '1672020547899', 'male', '1357875209', 'standard_users', '36', '1986-05-14', 1, 'Equipment repair services', 0),
(37, 'Kane Prince', 'Sed@sedhendrerit.edu', '1615040756999', 'male', '8001111', 'standard_users', '37', '1981-09-23', 1, 'Hiring services', 0),
(38, 'Bruce Lancaster', 'Mauris@Maecenasmalesuada.org', '1699101363399', 'male', '7086052852', 'advertiser_user', '38', '1984-01-07', 1, 'Industrial and manufacturing supplies', 0),
(39, 'Axel Rodriguez', 'Integer@odioapurus.com', '1687050169399', 'famle', '169773257', 'business_user', '39', '1983-12-05', 1, 'Mailing lists', 0),
(40, 'Chaim Leon', 'eget@esttempor.com', '1674030352299', 'male', '050666932', 'business_user', '40', '1987-03-04', 1, 'Marketing', 0),
(41, 'Nasim Hutchinson', 'ligula@scelerisquescelerisque.com', '1617103035999', 'male', '7624582648', 'advertiser_user', '41', '1993-02-20', 1, 'Multi-level marketing', 0),
(42, 'Adrian Scott', 'adipiscing@Curabiturconsequatlectus.net', '1611120516099', 'famle', '1458273036', 'standard_users', '42', '2003-05-24', 1, 'Office and commercial furniture', 0),
(43, 'Herrod Browning', 'Fusce@scelerisquenequeNullam.com', '1687092563499', 'male', '2827792186', 'advertiser_user', '43', '1992-04-23', 1, 'Office supplies and equipment', 0),
(44, 'Todd Jimenez', 'liquet@atfringillapurus.co', '1606062875599', 'male', '5539690072', 'business_user', '44', '2003-11-04', 1, 'Publishing and printing', 0),
(45, 'Hamilton Coope', 'facilisi@velit.co', '1616122564699', 'male', '8404743864', 'standard_users', '45', '1987-06-20', 1, 'Quick copy and reproduction services', 0),
(46, 'Drake Dorsey', 'Fusce@Sedegetlacus.org', '1660062267999', 'male', '1191513456', 'advertiser_user', '46', '1985-01-13', 0, 'Shipping and packing', 0),
(47, 'Jameson Haley', 'nonummy@disparturient.org', '1642121754399', 'male', '7624124650', 'business_user', '47', '1976-01-08', 0, 'Stenographic and secretarial support services', 0),
(48, 'Boris Cotton', 'consectetuer@faucibusleoin.com', '1689091394799', 'male', '7035162673', 'advertiser_user', '48', '1979-02-04', 1, 'Wholesale', 0),
(49, 'Bruno Pena', 'metus@Nullatincidunt.co.uk', '1637734992329', 'male', '8006529614', 'standard_users', '49', '1973-12-15', 0, 'Children & clothing', 0),
(50, 'Harding Warren', 'est@euismodet.edu', '1606023048399', 'famle', '1445739536', 'business_user', '50', '1974-08-03', 1, 'Men & clothing', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`adID`),
  ADD KEY `advID` (`advID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap`
--
ALTER TABLE `ap`
  ADD PRIMARY KEY (`apID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`businessID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaignID`),
  ADD KEY `locationID` (`locationID`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`couponID`),
  ADD KEY `busID` (`busID`);

--
-- Indexes for table `deleteduser`
--
ALTER TABLE `deleteduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noteid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `adID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ap`
--
ALTER TABLE `ap`
  MODIFY `apID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `businessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `couponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `deleteduser`
--
ALTER TABLE `deleteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`advID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ap`
--
ALTER TABLE `ap`
  ADD CONSTRAINT `ap_ibfk_1` FOREIGN KEY (`businessID`) REFERENCES `business` (`businessID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `locations` (`locationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `locations` (`locationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`busID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`noteid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
