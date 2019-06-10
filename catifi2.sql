/*-------------------------------------------------------------*/
/*--------------------NEW DB FOR TEST---------------------------------*/

/* querys to yarden */
/* GET ALL THE STANDARD_USER */
/* SELECT * FROM users WHERE  user_type='standard_user'; */

CREATE DATABASE testDB;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE `ad` (
  `adID` INT(11) AUTO_INCREMENT,
  `description` VARCHAR(255) NOT NULL,
  `price` FLOAT(6) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `advID` INT(11) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `match_per` FLOAT(6) NOT NULL,
  PRIMARY KEY(`adID`),
  FOREIGN KEY(`advID`) REFERENCES users(`user_id`) ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT =1;


INSERT INTO `ad` (`description`,`price`,`title`,`advID`,`image`,`match_per`) VALUES
('Lets learn accounting',120,'Accounting',6,'https://storage.googleapis.com/catifi1/newImages/Accounting.jpg',0),
('Advertising Course',135,'Advertising',15,'https://storage.googleapis.com/catifi1/newImages/Advertising.png',0),
('A tour of the ancient caves',122,'Antique',16,'https://storage.googleapis.com/catifi1/newImages/Antique.jpg',0),
('Grandfathers paintings for purchase',122,'ArtAndCraftSupplies',24,'https://storage.googleapis.com/catifi1/newImages/ArtAndCraftSupplies.jpg',0),
('Baby carriage for sale',500,'Baby-Products',24,'https://storage.googleapis.com/catifi1/newImages/BabyProducts.jpg',0),
('Oils for shower',89,'Bath And Body',25,'https://storage.googleapis.com/catifi1/newImages/BathAndBody.jpg',0),
('New camera lens',230,'Camera And Photographic Supplies',25,'https://storage.googleapis.com/catifi1/newImages/CameraAndPhotographicSupplies.jpg',0),
('A new polo shirt is just for us',147,'Clothing',36,'https://storage.googleapis.com/catifi1/newImages/Clothing.jpg',0),
('New 3D Art',370,'Digital Art',38,'https://storage.googleapis.com/catifi1/newImages/DigitalArt.jpg',0),
("We'll help you write digital content",320,'Digital-Content',40,'https://storage.googleapis.com/catifi1/newImages/DigitalContent.png',0),
("Preparation for matriculation exams",1500,'Educational And Textbooks',43,'https://storage.googleapis.com/catifi1/newImages/EducationalAndTextbooks.jpg',0),
("A new Lord of the Rings movie is screened here",70,'Fiction And Non-fiction',47,'https://storage.googleapis.com/catifi1/newImages/FictionAndNonfiction.png',0),
("The new perfume is now in operation",100,'Fragrances And Perfumes',50,'https://storage.googleapis.com/catifi1/newImages/FragrancesAndPerfumes.jpg',0),
("Folding sofa in operation",210,'Furniture',52,'https://storage.googleapis.com/catifi1/newImages/Furniture.jpg',0),
("Forbes magazine subscription is now cheap",50,'Magazines',55,'https://storage.googleapis.com/catifi1/newImages/Magazines.jpg',0),
("Just now a makeup set",105,'Makeup And Cosmetics',57,'https://storage.googleapis.com/catifi1/newImages/MakeupAndCosmetics.jpg',0),
("Souvenirs from Eilat",105,'Memorabilia',6,'https://storage.googleapis.com/catifi1/newImages/Memorabilia.jpg',0),
("Grand piano for sale",1200,'Music',15,'https://storage.googleapis.com/catifi1/newImages/Music.jpg',0),
("Printing Your Book",130,'Publishing And Printing',16,'https://storage.googleapis.com/catifi1/newImages/PublishingAndPrinting.jpg',0),
("exhibition",130,'Rare And Used Books',24,'https://storage.googleapis.com/catifi1/newImages/RareAndUsedBooks.jpg',0),
("Stress tests for players",80,'Safety And Healt',25,'https://storage.googleapis.com/catifi1/newImages/SafetyAndHealth.jpg',0),
("New fabrics are now in operation",200,'Sewing',36,'https://storage.googleapis.com/catifi1/newImages/SewingNeedleworkAndFabrics.jpg',0),
("Stamp Exhibition",50,'Stamp And Coin',38,'https://storage.googleapis.com/catifi1/newImages/StampAndCoin.jpg',0),
("Today, printing for Shenkar students",50,'Stationary Printing And WritingPaper',40,'https://storage.googleapis.com/catifi1/newImages/StationaryPrintingAndWritingPaper.png',0),
("Exhibition of metals collection",30,'Vintage And Collectibl',40,'https://storage.googleapis.com/catifi1/newImages/VintageAndCollectible.jpg',0);

CREATE TABLE `locations`(
  `locationID` INT(11) NOT NULL AUTO_INCREMENT,
  `lat` FLOAT(6) NOT NULL,
  `lng` FLOAT(6) NOT NULL,
  `info` VARCHAR(256) NOT NULL,
  `userID` INT(11) NOT NULL,
  PRIMARY KEY(locationID),
  FOREIGN KEY(userID) REFERENCES users(user_id) ON UPDATE CASCADE
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `locations` ( `lat`, `lng`, `info`, `userID`) VALUES
(48.175628, 16.4200, 'H - smalle rooms,free wifi', 1),
(31.783412,35.216902,'H - free wifi,Childrens Activities',2),
(31.782438,35.216754,'H - free wifi,Childrens Activities,Air conditioning',3),
(32.072866,34.765616,'H - free wifi,Childrens Activities,Air conditioning,Bar',8),
(32.983082,35.195394,'R - Druze food',13),
(32.050939,34.760524,'R - Cheaper, meat',14),
(32.165313,34.823261,'M - Fashion, restaurants, bars',19),
(45.421611,12.376187,'H - Good location away from the crouds'22,'Hotel Russo Palace'),
(40.68973,-95.788826,'H - Great view',23,'Americas Best Value Inn'),
(34.664684,-120.115036,'H - Loved this Wonderful Boutique Hotel!',33,'Intermezzo'),
(34.664684,-120.115036,'H - Loved this Wonderful Boutique Hotel!',35,'Intermezzo'),
(34.569931,31.680927,'R - Pizza',44,'Pizza Agvania'),
(34.569944,31.668077,'R - Pizza',48,'Pizza Domino'),
(34.570004,31.667669,'R - Excellent coffee and cheap',49,'Cofix'),
(34.570179,31.680931,'R - Excellent coffee And pastries',53,'Roladin'),
(34.570179,31.668081,'R - Best Pizza',1,'Pizza Hut'),
(34.570179,31.683613,'R - Best Coffe',2,'Anona Bistro'),
(34.577431,31.669886,'R - Coffe And breakfasts',3,'Cafe Jow'),
(34.585051,31.656246,'R - Chip Pizza',8,'Pizza Shemesh');
INSERT INTO `locations`(`lat`,`lng`,`info`,`userID`) VALUES
(32.187217,34.792008,'R-Excellent coffee and cheap',13),
(32.164837,34.781041,'R-Coffe And breakfasts',14),
(32.120992,34.773103,'R-restaurants',19),
(32.092712,34.783845,'R-Very Good Food Nice Place',23),
(32.125556,34.792376,'R-Good Food Great View',22),
(31.82981,35.213579,'R-Coffe And breakfasts',28),
(31.835016,35.203752,'R-Coffe And breakfasts',33),
(32.889647,34.986638,'R-Coffe',35),
(32.919405,35.002212,'R-Good Food Great View',48),
(32.135178,34.781334,'H - Loved this Wonderful Boutique Hotel!',49),
(34.141084,34.797801,'H - Great View 5 Stars',53),
(32.134968,34.761612,'H - Good location away from the crouds',1),
(32.139363,34.836722,'H - Good location away from the crouds',2),
(31.815342,35.169466,'H - Good location ,Great View ',3),
(31.835906,35.214997,'H - Good location ,Great View ,Great Food',8),
(32.891758,34.941509,'H - Loved this Wonderful Boutique Hotel!',13),
(32.903532,34.991884,'H - Great View 5 Stars',14),
(32.101797,34.826884,'M - Fashion, restaurants, bars',19),
(32.113282,34.796149,'M - Fashion, restaurants, bars',22),
(32.184225,34.905302,'M - Fashion, restaurants, bars',23),
(32.095107,34.865602,'M - Fashion, restaurants, bars',28),
(32.067370,34.809359,'M - Fashion, restaurants, bars',33),
(31.994869,34.774416,'M - Fashion, restaurants, bars',35);




CREATE TABLE IF NOT EXISTS `business`(
  `businessID`INT(11) NOT NULL AUTO_INCREMENT,
  `category`VARCHAR(250) NOT NULL,
  `locationID`INT(11) NOT NULL,
  `business_name` VARCHAR(250),
   PRIMARY KEY(`businessID`),
   FOREIGN KEY (`locationID`) REFERENCES locations(locationID)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;








CREATE TABLE `campaign`(
  `campaignID`INT(11) NOT NULL AUTO_INCREMENT,
  `campaignName` VARCHAR(50) NOT NULL,
  `adID` INT(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ageMin` INT(6) NOT NULL,
  `ageMax` INT(6) NOT NULL,
  `budget` FLOAT(6) NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  `stratingDate` DATE,
  `endDate` DATE,
  `locationID` INT(11) NOT NULL,
  PRIMARY KEY(campaignID),
  FOREIGN KEY(locationID) REFERENCES locations(locationID) ON UPDATE CASCADE
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `campaign` (`campaignName`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`locationID`) VALUES
("A tour of the ancient caves",9,"male&famle",58,37,87,"Antiques","2024-08-07","2024-12-12",9),
("Digital",4,"male",49,61,190,"Digital art","2019-11-14","2024-02-12",2),
("Store souvenirs",4,"famle",20,26,185,"Memorabilia","2026-02-22","2023-06-12",8),
("A new drug",3,"male",31,63,252,"Safety and health","2018-08-25","2021-12-31",3),
("Bath soaps",5,"famle",16,72,100,"Bath and body","2020-08-29","2026-09-08",6),
("crib",1,"male",24,59,384,"Baby products (other)","2027-04-06","2028-05-18",8),
("Button-down shirts",4,"male",21,59,200,"Clothing","2027-04-12","2020-01-28",6),
("An exhibition of collectible cars",7,"male",18,26,164,"Vintage and collectibles","2021-02-27","2020-01-07",13),
("perfume",9,"famle",29,75,107,"Fragrances and perfumes","2021-08-20","2022-03-10",11),
("makeup set",1,"famle",46,65,195,"Makeup and cosmetics","2023-08-03","2024-10-06",4);
INSERT INTO `campaign` (`campaignName`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`locationID`) VALUES
("New printers",9,"male&famle",54,54,177,"Publishing and printing","2022-12-22","2025-07-21",5),
("Forbes Magazine",8,"male&famle",43,67,397,"Magazines","2018-12-26","2020-09-24 23:38:14",5),
("Teachers are required",4,"male&famle",16,57,170,"Educational and textbooks","2024-06-25","2025-09-19",5),
("How to publish",6,"male&famle",20,25,156,"Advertising","2027-12-07","2020-04-30",2),
("Safety conference on the construction site",8,"male",63,72,121,"Construction","2020-09-12","2023-11-16",3),
("Guitars for sale",1,"male&famle",23,45,195,"Music store (instruments and sheet music)","2021-09-18","2022-07-15",4),
("Sale of old stamps",5,"male&famle",39,62,213,"Clothing","2020-08-05","2023-10-07 14:28:39",8),
("Create site content",2,"famle",32,38,220,"Digital content","2019-03-13","2021-04-10",7),
("Exhibition of paintings",3,"male&famle",20,27,360,"Commercial photography, art, and graphics","2019-07-08","2022-05-14 06:45:56",3),
("New Camera",4,"male&famle",30,32,145,"Commercial photography, art, and graphics","2020-05-25","2023-09-23",1);
INSERT INTO `campaign` (`campaignName`,`adID`,`gender`,`ageMin`,`ageMax`,`budget`,`category`,`stratingDate`,`endDate`,`locationID`) VALUES
("An old comics exhibition",3,"male",28,34,338,"Rare and used books","2020-11-20","2023-04-04",2),
("A tour of the farmers' fields",6,"famle",18,23,279,"Agricultural","2021-05-07","2022-01-10 19:19:21",8),
("Degree in Architecture",8,"male&famle",22,39,338,"Architectural, engineering.","2022-04-30","2028-03-13",6),
("Vegetables straight from the parts",8,"male&famle",62,59,295,"Agricultural","2019-12-10","2021-05-05",6),
("Let's learn how to write digital content",4,"male&famle",39,52,222,"Digital content","2020-11-24","2020-12-12",8),
("Multi-level marketing course",4,"male",31,34,125,"Multi-level marketing","2018-12-02","2026-07-30",3),
("Designer clothes for Children",4,"famle",28,30,226,"Children & clothing","2018-02-19","2019-07-09",7),
("Wholesale sweets",7,"male",23,36,160,"Wholesale","2018-01-28","2019-04-12",6),
("Designer clothes for men",2,"male",26,26,217,"Men & clothing","2019-04-14","2020-01-21",7),
("Order Packing & Shipping Supplies",9,"male",21,67,270,"Shipping and packing","2023-09-18 ","2023-12-28",3);


CREATE TABLE `coupon`(
  `couponID`INT(11) NOT NULL AUTO_INCREMENT,
  `busID` INT(11) NOT NULL,
  `imageURL` VARCHAR(255) NOT NULL,
  `counter` INT(6) NOT NULL,
  `couponName` VARCHAR(255) NOT NULL,
  PRIMARY KEY(couponID),
  FOREIGN KEY(busID) REFERENCES users(userID) ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
INSERT INTO `coupon` (`busID`,`imageURL`,`counter`,`couponName`)
VALUES (1,'https://storage.googleapis.com/catifi1/newImages/Clothing.jpg',3,'Clothing'),
(2,'https://storage.googleapis.com/catifi1/newImages/VintageAndCollectible.jpg',10,'VintageAndCollectible'),
(3,'https://storage.googleapis.com/catifi1/newImages/StampAndCoin.jpg',7,'StampAndCoin'),
(8,'https://storage.googleapis.com/catifi1/newImages/Magazines.jpg',4,'Magazines'),
(13,'https://storage.googleapis.com/catifi1/newImages/Music.jpg',9,'Music'),
(14,'www.test.co.il',2,'Construction'),
(19,'https://storage.googleapis.com/catifi1/newImages/DigitalContent.png',5,'DigitalContent'),
(22,'https://storage.googleapis.com/catifi1/newImages/Advertising.png',9,'Advertising'),
(23,'https://storage.googleapis.com/catifi1/newImages/Accounting.jpg',4,'Accounting'),
(28,'https://storage.googleapis.com/catifi1/newImages/BathAndBody.jpg',13,'BathAndBody'),
(33,'https://storage.googleapis.com/catifi1/newImages/BabyProducts.jpg',22,'BabyProducts'),
(35,'https://storage.googleapis.com/catifi1/newImages/ArtAndCraftSupplies.jpg',3,'Art'),
(44,'https://storage.googleapis.com/catifi1/newImages/CameraAndPhotographicSupplies.jpg',11,'Camera&Photo'),
(48,'https://storage.googleapis.com/catifi1/newImages/Furniture.jpg',6,'Furniture'),
(49,'https://storage.googleapis.com/catifi1/newImages/FictionAndNonfiction.png',6,'FictionAndNonfiction'),
(53,'https://storage.googleapis.com/catifi1/newImages/StationaryPrintingAndWritingPaper.png',6,'StationaryPrintingAndWritingPaper');

CREATE TABLE `ap`(
  `apID`INT(11) NOT NULL AUTO_INCREMENT,
  `apLat`FLOAT(6) NOT NULL,
  `apLng`FLOAT(6) NOT NULL,
  `apPassword` VARCHAR(50) NOT NULL,
  `businessID` INT(11),
  PRIMARY KEY(`arID`),
  FOREIGN KEY (`businessID`) REFERENCES business(businessID) ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
