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
/*UPADETE 30/5 CHANE ADMIN only 1 admin*/
INSERT INTO `admin` (`username`, `email`, `password`) VALUES
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
  PRIMARY KEY `id` (`id`)
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
  `user_category` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` ( `name`, `email`, `password`, `gender`, `mobile`, `user_type`, `image`, `birthday`, `status`,`user_category`) VALUES
( 'yaronyaron', 'yaronyaron@gmail.com', '1', 'male', '1', 'business_user', '1', '1991-01-01', 1,'Clothing'),
( 'adiadi', 'adiadi@gmail.com', '2', 'male', '2', 'business_user', 'asas', '1987-03-04', 1,'Clothing'),
( 'yosiyosi', 'yosiyosi@gmail.com', '3', 'male', '3', 'business_user', 'assas', '1945-03-04', 1,'Furniture'),
( 'omeromer', 'omeromer@gmail.com', '4', 'famle', '4', 'standard_user', 'assdsas', '1993-02-10', 1,'Clothing'),
( 'chenchen', 'chenchen@gmail.com', '5', 'famle', '5', 'standard_user', 'assdsdsas', '1993-03-01', 1,'Furniture'),
( 'taltal', 'taltal@gmail.com', '6', 'famle', '6', 'advertiser_user', 'asssddsdsas', '1994-10-11', 1,'Safety and health'),
( 'ligalligal', 'ligalligal@gmail.com', '11', 'Famle', '11', 'standard_user', 'sdsdds', '1990-02-02', 1,'Safety and health'),
( 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'business_user', 'sdsds', '1990-09-09', 1,'Furniture'),
( 'moshemoshe', 'moshe@gmail.com', '12', 'male', '0506666666', 'businessuser', 'sdsds', '1990-09-09', 1,'Safety and health'),
( 'daviddavid', 'david@gmail.com', '1234', 'male', '0506876824', 'standard_users', 'ass', '1991-01-04', 1,'Educational and textbooks'),
( 'guyguy', 'guy@gmail.com', '12345', 'male', '050000324', 'standard_users', 'asdsdss', '1987-04-04', 1,'Educational and textbooks'),
('Travis Chase','adipiscingMauris@Praesentluctus.org','1640041508699','male','0399 215 6394','standard_users','11','1988-2-27',1,'Vintage and collectibles'),
('Allistair Pruitt','etnunc@fermentumconvallisligula.org','1686041','famle','01843104919','business_user','12','1993-2-12',0,'Clothing'),
('Kermit Simon','Crasdictum@ascelerisque.org','1628043099399','male','01160482874','business_user','13','1995-5-14',0,'Furniture'),
('Sylvester Gilliam','tempus@Nulla.org','1683102126899','male','0172006889','advertiser_user','14','1985-6-15',1,'Baby products (other)'),
('Clark Carroll','nec@rutrumurnanec.org','1696040705899','male','0276429 6348','advertiser_user','15','1977-5-3',1,'Safety and health'),
('Ivan Berger','sapiengravidanon@vitae.org','1681032307999','male','0898 336 8809','standard_users','16','2002-6-16',0,'Bath and body'),
('Asher Thornton','ultrices@erat.net','1663102563799','male','0500045418','standard_users','17','1987-3-24',1,'Fragrances and perfumes'),
('Wang Emerson','aliquam@ametultriciessem.edu','1689082687699','famle','01346496219','business_user','18','1995-5-19',0,'Makeup and cosmetics'),
('Price Case','lorem@gmail.con','1649081051999','famle','01473993236','standard_users','19','1997-2-20',0,'Audio books'),
('Emerson Webb','Emerson Webb@erat.net','1611062179799','male','08352592362','standard_users','20','1996-4-23',1,'Digital content'),
('Troy Kirby','odio@Cras.com','1631061626699','famle','08454640','standard_users','21','1993-12-25',1,'Educational and textbooks'),
('Logan Campbell','Fusce@mienimcondimentum.net','1642022598599','male','08004774407','standard_users','23','2004-9-7',0,'Magazines'),
('Wallace Reed','vestibulum@Integer.com','1631090948799','famle','7641017030','business_user','24','1998-7-12',1,'Publishing and printing'),
('Bevis Bernard','nascetur@Aliquamauctor.com','1667031824099','famle','800206937','standard_users','25','2013-8-20',0,'Rare and used books'),
('Stephen Holmes','Duis@aliquet.edu','1658030603399','male','500087225','business_user','26','1976-1-14',1,'Accounting'),
('Channing Mercer','libero@libero.com','1620122232999','male','02166184917','advertiser_user','27','1996-5-20',1,'Advertising'),
('Ivan Vance','porttitor@loremloremluctus.com','1674030943399','male','7064366825','standard_users','28','1990-9-21',1,'Agricultural'),
('Fitzgerald Huffman','urna@quislectus.com','1638122135199','famle','164498048','advertiser_user','29','2001-10-03',0,'Architectural, engineering, and surveying services'),
('Xander Mcdowell','quis@luctuslobortis.edu','1640112449199','famle','8786515875','standard_users','30','2005-5-03',0,'Chemicals and allied products'),
('Norman Griffith','ornare@orciPhasellus.com','1658060219199','male','8009943620','advertiser_user','31','1991-6-6',1,'Commercial photography, art, and graphics.'),
('Reed Rocha','dui@rhoncusid.com','6021919912122','famle','08001111','standard_users','32','2003-11-4',0,'Construction');
('Aristotle Day','nibh@egestasrhoncusProin.com','1625021854099','famle','07028836641','080011','standard_users','33','1993-4-2',1,'Consulting services'),
('Lyle Rasmussen','imperdiet@luctussit.com','1604062528399','famle','1978476685','advertiser_user','34','2005-11-6',0,'Educational services'),
('Amir Hardy','Suspendisse@Aeneangravidanunc.co','1623020878199','male','169776176','business_user','35','1993-12-13',0,'Equipment rentals and leasing services'),
('Keegan Marks','interdum@etrisusQuisque.net','1672020547899','male','1357875209','standard_users','36','1986-5-14',1,'Equipment repair services'),
('Kane Prince','Sed@sedhendrerit.edu','1615040756999','male','8001111','standard_users','37','1981-9-23',1,'Hiring services'),
('Bruce Lancaster','Mauris@Maecenasmalesuada.org','1699101363399','male','7086052852','advertiser_user','38','1984-1-7',1,'Industrial and manufacturing supplies'),
('Axel Rodriguez','Integer@odioapurus.com','1687050169399','famle','169773257','business_user','39','1983-12-5',1,'Mailing lists'),
('Chaim Leon','eget@esttempor.com','1674030352299','male','050666932','business_user','40','1987-3-4',1,'Marketing'),
('Nasim Hutchinson','ligula@scelerisquescelerisque.com','1617103035999','male','7624582648','advertiser_user','41','1993-2-20',1,'Multi-level marketing'),
('Adrian Scott','adipiscing@Curabiturconsequatlectus.net','1611120516099','famle','1458273036','standard_users','42','2003-5-24',1,'Office and commercial furniture'),
('Herrod Browning','Fusce@scelerisquenequeNullam.com','1687092563499','male','2827792186','advertiser_user','43','1992-4-23',1,'Office supplies and equipment'),
('Todd Jimenez','liquet@atfringillapurus.co','1606062875599','male','5539690072','business_user','44','2003-11-4',1,'Publishing and printing'),
('Hamilton Coope','facilisi@velit.co','1616122564699','male','8404743864','standard_users','45','1987-6-20',1,'Quick copy and reproduction services'),
('Drake Dorsey','Fusce@Sedegetlacus.org','1660062267999','male','1191513456','advertiser_user','46','1985-1-13',0,'Shipping and packing'),
('Jameson Haley','nonummy@disparturient.org','1642121754399','male','7624124650','business_user','47','1976-1-8',0,'Stenographic and secretarial support services'),
('Boris Cotton','consectetuer@faucibusleoin.com','1689091394799','male','7035162673','advertiser_user','48','1979-2-4',1,'Wholesale'),
('Bruno Pena','metus@Nullatincidunt.co.uk','1637734992329','male','8006529614','standard_users','49','1973-12-15',0,'Children & clothing'),
('Harding Warren','est@euismodet.edu','1606023048399','famle','1445739536','business_user','50','1974-8-3',1,'Men & clothing');
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
`text` VARCHAR(50) NOT NULL,
`price` VARCHAR(50) NOT NULL,
`header` VARCHAR(50) NOT NULL,
`user_id` INT(11) NOT NULL,
`image`  BLOB NOT NULL,
PRIMARY KEY(`adId`),
FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT =1;

-- ALTER TABLE `ad`
--   ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


/*LOAD_FILE its function to insret image to DB */

INSERT INTO `ad`(`text`,`price`,`header`,`id`,`image`) VALUES
('antique  is an item perceived as having value',10333,'The beautiful antique is now for sale',1,LOAD_FILE('newImages/Antique.jpg'));



CREATE TABLE `coupon`(
  `couponID`INT(11) NOT NULL AUTO_INCREMENT,
  `id` INT(11) NOT NULL,
  `image` BLOB NOT NULL,
  `url` VARCHAR(50) NOT NULL,
  `counter` INT(6) NOT NULL,
  `couponName` VARCHAR(255) NOT NULL,
  PRIMARY KEY(couponID),
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/* Max limit show */

-- CREATE TABLE `business`(
--   `businessID`INT(11) NOT NULL AUTO_INCREMENT,
--   `arID`INT(11) NOT NULL,
--   `category` VARCHAR(50) NOT NULL,
--   `couponID`INT(11) NOT NULL,
--   PRIMARY KEY(`businessID`),
--
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT= ;


CREATE TABLE `ap`(
  `arID`INT(11) NOT NULL AUTO_INCREMENT,
  `arLoctionX`FLOAT(6) NOT NULL,
  `arLoctionY`FLOAT(6) NOT NULL,
  `arPassword` VARCHAR(50) NOT NULL,
  `businessID` INT(11),
  PRIMARY KEY(`arID`),
  FOREIGN KEY (businessID) REFERENCES business(businessID) ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `campaign`(
  `campaignID`INT(11) NOT NULL AUTO_INCREMENT,
  `campaignName` VARCHAR(50) NOT NULL,
  `id` INT(11) NOT NULL,
  `adID` INT(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ageMin` INT(6) NOT NULL,
  `ageMax` INT(6) NOT NULL,
  `budget` FLOAT(6) NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  `stratingDate` DATE,
  `endDate` DATE,
  `location_id` INT(11) NOT NULL,
  PRIMARY KEY(campaignID),
  FOREIGN KEY(id) REFERENCES users(id) ON DELETE CASCADE
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `campaign` (`campaignName`,`id`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`location_id`) VALUES
("A tour of the ancient caves",3,9,"male&famle",58,37,87,"Antiques","2024-08-07","2024-12-12",9),
("Digital",2,4,"male",49,61,190,"Digital art","2019-11-14","2024-02-12",2),
("Store souvenirs",6,4,"famle",20,26,185,"Memorabilia","2026-02-22","2023-06-12",8),
("A new drug",1,3,"male",31,63,252,"Safety and health","2018-08-25","2021-12-31",3),
("Bath soaps",7,5,"famle",16,72,100,"Bath and body","2020-08-29","2026-09-08",6),
("crib",6,1,"male",24,59,384,"Baby products (other)","2027-04-06","2028-05-18",8),
("Button-down shirts",6,4,"male",21,59,200,"Clothing","2027-04-12","2020-01-28",6),
("An exhibition of collectible cars",3,7,"male",18,26,164,"Vintage and collectibles","2021-02-27","2020-01-07",13),
("perfume",8,9,"famle",29,75,107,"Fragrances and perfumes","2021-08-20","2022-03-10",11),
("makeup set",8,1,"famle",46,65,195,"Makeup and cosmetics","2023-08-03","2024-10-06",4);
INSERT INTO `campaign` (`campaignName`,`id`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`location_id`) VALUES
("New printers",7,9,"male&famle",54,54,177,"Publishing and printing","2022-12-22","2025-07-21",5),
("Forbes Magazine",9,8,"male&famle",43,67,397,"Magazines","2018-12-26","2020-09-24 23:38:14",5),
("Teachers are required",4,4,"male&famle",16,57,170,"Educational and textbooks","2024-06-25","2025-09-19",5),
("How to publish",7,6,"male&famle",20,25,156,"Advertising","2027-12-07","2020-04-30",2),
("Safety conference on the construction site",3,8,"male",63,72,121,"Construction","2020-09-12","2023-11-16",3),
("Guitars for sale",9,1,"male&famle",23,45,195,"Music store (instruments and sheet music)","2021-09-18","2022-07-15",4),
("Sale of old stamps",9,5,"male&famle",39,62,213,"Clothing","2020-08-05","2023-10-07 14:28:39",8),
("Create site content",3,2,"famle",32,38,220,"Digital content","2019-03-13","2021-04-10",7),
("Exhibition of paintings",4,3,"male&famle",20,27,360,"Commercial photography, art, and graphics","2019-07-08","2022-05-14 06:45:56",3),
("New Camera",9,4,"male&famle",30,32,145,"Commercial photography, art, and graphics","2020-05-25","2023-09-23",1);
INSERT INTO `campaign` (`campaignName`,`id`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`location_id`) VALUES
("An old comics exhibition",9,3,"male",28,34,338,"Rare and used books","2020-11-20","2023-04-04",2),
("A tour of the farmers' fields",6,6,"famle",18,23,279,"Agricultural","2021-05-07","2022-01-10 19:19:21",8),
("Degree in Architecture",15,8,"male&famle",22,39,338,"Architectural, engineering, and surveying services.","2022-04-30","2028-03-13",6),
("Vegetables straight from the parts",37,8,"male&famle",62,59,295,"Agricultural","2019-12-10","2021-05-05",6),
("Let's learn how to write digital content",24,4,"male&famle",39,52,222,"Digital content","2020-11-24","2020-12-12",8),
("Multi-level marketing course",35,4,"male",31,34,125,"Multi-level marketing","2018-12-02","2026-07-30",3),
("Designer clothes for Children",33,4,"famle",28,30,226,"Children & clothing","2018-02-19","2019-07-09",7),
("Wholesale sweets",21,7,"male",23,36,160,"Wholesale","2018-01-28","2019-04-12",6),
("Designer clothes for men",16,2,"male",26,26,217,"Men & clothing","2019-04-14","2020-01-21",7),
("Order Packing & Shipping Supplies",17,9,"male",21,67,270,"Shipping and packing","2023-09-18 ","2023-12-28",3);




CREATE TABLE `locations`(
  `location_id` INT(11) NOT NULL AUTO_INCREMENT,
  `lat` FLOAT(6) NOT NULL,
  `lng` FLOAT(6) NOT NULL,
  `info` VARCHAR(256) NOT NULL,
  `id` INT(11) NOT NULL,
  `name` VARCHAR(256),
  PRIMARY KEY(location_id),
  FOREIGN KEY(id) REFERENCES users(id) ON DELETE CASCADE
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;




INSERT INTO `locations` ( `lat`, `lng`, `info`, `id`, `name`) VALUES
(48.175628, 16.4200, 'H - smalle rooms,free wifi', 1, 'jafa-Hotel'),
(31.783412,35.216902,'H - free wifi,Childrens Activities',2,'Bells-Hotel'),
(31.782438,35.216754,'H - free wifi,Childrens Activities,Air conditioning',3,'City Center-Hotel'),
(32.072866,34.765616,'H - free wifi,Childrens Activities,Air conditioning,Bar',4,'Bal basic-Hotel'),
(32.983082,35.195394,'R - Druze food',5,'completely'),
(32.050939,34.760524,'R - Cheaper, meat',6,'Vigosha'),
(32.165313,34.823261,'M - Fashion, restaurants, bars',7,'Seven Star Mall'),
(45.421611,12.376187,'H - Good location away from the crouds',8,'Hotel Russo Palace'),
(40.68973,-95.788826,'H - Great view',9,'Americas Best Value Inn'),
(34.664684,-120.115036,'H - Loved this Wonderful Boutique Hotel!',10,'Intermezzo'),
(34.664684,-120.115036,'H - Loved this Wonderful Boutique Hotel!',11,'Intermezzo'),
(34.569931,31.680927,'R - Pizza',12,'Pizza Agvania'),
(34.569944,31.668077,'R - Pizza',13,'Pizza Domino'),
(34.570004,31.667669,'R - Excellent coffee and cheap',14,'Cofix'),
(34.570179,31.680931,'R - Excellent coffee And pastries',15,'Roladin'),
(34.570179,31.668081,'R - Best Pizza',16,'Pizza Hut'),
(34.570179,31.683613,'R - Best Coffe',17,'Anona Bistro'),
(34.577431,31.669886,'R - Coffe And breakfasts',18,'Cafe Jow'),
(34.585051,31.656246,'R - Chip Pizza',19,'Pizza Shemesh');
INSERT INTO `locations`(`lat`,`lng`,`info`,`id`,`name`) VALUES
(32.187217,34.792008,'R-Excellent coffee and cheap',20,'Beta Coffee'),
(32.164837,34.781041,'R-Coffe And breakfasts',21,'Hustco'),
(32.120992,34.773103,'R-restaurants',22,'TOTO'),
(32.092712,34.783845,'R-Very Good Food Nice Place',23,'AMORA MIA'),
(32.125556,34.792376,'R-Good Food Great View',24,'THE RESTAURANT'),
(31.82981,35.213579,'R-Coffe And breakfasts',25,'MODREN'),
(31.835016,35.203752,'R-Coffe And breakfasts',26,'MAHNA-YHEDA'),
(32.889647,34.986638,'R-Coffe',27,'VIVINO'),
(32.919405,35.002212,'R-Good Food Great View',28,'THE-PROT-24'),
(32.135178,34.781334,'H - Loved this Wonderful Boutique Hotel!',29,'Grand-Beach'),
(34.141084,34.797801,'H - Great View 5 Stars',30,'Crowne Plaza Hotel'),
(32.134968,34.761612,'H - Good location away from the crouds',31,'Dan-Hotel'),
(32.139363,34.836722,'H - Good location away from the crouds',32,'Leonardo Boutique Hotel'),
(31.815342,35.169466,'H - Good location ,Great View ',33,'The Rimonim Hotel'),
(31.835906,35.214997,'H - Good location ,Great View ,Great Food',34,'The ABB Hotel'),
(32.891758,34.941509,'H - Loved this Wonderful Boutique Hotel!',35,'Leonardo Boutique Hotel'),
(32.903532,34.991884,'H - Great View 5 Stars',36,'Beway Hotel'),
(32.101797,34.826884,'M - Fashion, restaurants, bars',37,'Azrieli Ayalon Mall'),
(32.113282,34.796149,'M - Fashion, restaurants, bars',38,'Ofer Mall'),
(32.184225,34.905302,'M - Fashion, restaurants, bars',39,'Arim Mall Kfar Saba'),
(32.095107,34.865602,'M - Fashion, restaurants, bars',40,'Ofer Shopping Center'),
(32.067370,34.809359,'M - Fashion, restaurants, bars',41,'The Givatayim Azrieli Mall'),
(31.994869,34.774416,'M - Fashion, restaurants, bars',42,'The Golden Mall');





DROP TABLE IF EXISTS `business`;

CREATE TABLE IF NOT EXISTS `business`(
  `businessID`INT(11) NOT NULL AUTO_INCREMENT,
  `category`VARCHAR(250) NOT NULL,
  `couponID` INT(11) NOT NULL,
  `business_name` VARCHAR(250),
  `bus_latitude` FLOAT(6) NOT NULL,
  `bus_longitude` FLOAT(6)NOT NULL,
   PRIMARY KEY(`businessID`),
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

CREATE TABLE `br` (
  `br` INT(11) AUTO_INCREMENT,
  `counter` INT(11) NOT NULL,
  `couponID` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY(br)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;


/*--------------example images*/
CREATE TABLE `images` (
  `image_id` INT(11) AUTO_INCREMENT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `image_test` TEXT NOT NULL,
  PRIMARY KEY(image_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;
