-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.29 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for medifind
CREATE DATABASE IF NOT EXISTS `medifind` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `medifind`;

-- Dumping structure for table medifind.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.admin: ~1 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`) VALUES
	('supunsulakshana2001@gmail.com', 'Supun', 'Sulakshana', '646a1bd72479a');

-- Dumping structure for table medifind.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.brand: ~5 rows (approximately)
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Iron Mesh'),
	(2, 'FDA'),
	(3, 'DC01'),
	(4, 'Dayang'),
	(5, 'MEI');

-- Dumping structure for table medifind.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.cart: ~4 rows (approximately)
INSERT INTO `cart` (`id`, `qty`, `product_id`, `user_email`) VALUES
	(28, 2, 2, 'supunsulakshana2001@gmail.com'),
	(29, 1, 7, 'senuja2010@gmail.com'),
	(30, 1, 10, 'senuja2010@gmail.com'),
	(31, 1, 20, 'senuja2010@gmail.com');

-- Dumping structure for table medifind.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.category: ~5 rows (approximately)
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Wheel Chairs'),
	(2, 'Hospital beds'),
	(3, 'Hospital funiture'),
	(4, 'Trolleys'),
	(5, 'Commode Chairs');

-- Dumping structure for table medifind.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.city: ~4 rows (approximately)
INSERT INTO `city` (`id`, `name`, `district_id`) VALUES
	(1, 'kegalla', 1),
	(2, 'Gampaha', 5),
	(3, 'colombo', 3),
	(4, 'kaluthara', 4);

-- Dumping structure for table medifind.colour
CREATE TABLE IF NOT EXISTS `colour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.colour: ~8 rows (approximately)
INSERT INTO `colour` (`id`, `name`) VALUES
	(1, 'black'),
	(2, 'red'),
	(3, 'yellow'),
	(4, 'white'),
	(5, 'blue'),
	(6, 'brown'),
	(7, 'gray'),
	(8, 'Silver');

-- Dumping structure for table medifind.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.condition: ~2 rows (approximately)
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Brand New'),
	(2, 'Used');

-- Dumping structure for table medifind.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.district: ~6 rows (approximately)
INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Kegalle', 1),
	(2, 'Ratnapura', 1),
	(3, 'Colombo', 2),
	(4, 'Kalthuara', 2),
	(5, 'Gampaha', 2),
	(6, 'Galle', 4);

-- Dumping structure for table medifind.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.gender: ~2 rows (approximately)
INSERT INTO `gender` (`id`, `gender_name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table medifind.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.images: ~15 rows (approximately)
INSERT INTO `images` (`code`, `product_id`) VALUES
	('resource/productImg/Eld1.jpg', 1),
	('resource/productImg/Eld2.jpg', 2),
	('resource/productImg/sp1.jpg', 3),
	('resource/productImg/sp2.jpg', 4),
	('resource//productImg//Hospital Nursing Patient Bed _0_63933c396f47a.png', 7),
	('resource//productImg//COMMODE HOSPITAL BED_0_63936bb2ddf16.jpeg', 8),
	('resource//productImg//Multi function Electric Hospital beds_0_63936d5699d74.jpeg', 9),
	('resource//productImg//Hospital Patient Bed_0_63936efc95e01.png', 10),
	('resource//productImg//Silver Stainless Steel Hospital Dressing Trolley_0_639371fe0b00a.jpeg', 13),
	('resource//productImg//Hospital Bed Side Locker_0_6393733816365.jpeg', 14),
	('resource//productImg//Hospital Bed Side Screen_0_639373aa677a2.jpeg', 15),
	('resource//productImg//Stretcher On Trolley_0_639374b29f0fb.jpeg', 16),
	('resource//productImg//Self-propelled wheelchair_0_63f50dcf1812b.png', 17),
	('resource//productImg//Self-propelled wheelchair_1_63f50dcf320a9.png', 17),
	('resource//productImg//Instrument Trolley_0_63f3a76fae96b.jpeg', 20);

-- Dumping structure for table medifind.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `sellers_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_sellers1_idx` (`sellers_id`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_sellers1` FOREIGN KEY (`sellers_id`) REFERENCES `sellers` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.invoice: ~7 rows (approximately)
INSERT INTO `invoice` (`id`, `order_id`, `date`, `total`, `qty`, `status`, `user_email`, `product_id`, `sellers_id`) VALUES
	(1, '63f513152afb9', '2023-02-22', 6620, 1, 0, 'supunsulakshana2001@gmail.com', 2, 10),
	(2, '63f6394fb95a6', '2023-02-22', 46300, 1, 0, 'supunjavains@gmail.com', 4, 10),
	(3, '63f64feb52ea0', '2023-02-22', 46300, 1, 0, 'supunsulakshana2001@gmail.com', 4, 10),
	(4, '63f747b6c94ff', '2023-02-23', 20400, 1, 0, 'senuja2010@gmail.com', 20, 12),
	(5, '63ff014d37314', '2023-03-01', 11000, 1, 0, 'Isuru@gmail.com', 14, 10),
	(6, '6414642216eae', '2023-03-17', 46300, 1, 0, 'senuja2010@gmail.com', 4, 10),
	(7, '64149a08eaafb', '2023-03-17', 20300, 1, 0, 'Isuru@gmail.com', 20, 12);

-- Dumping structure for table medifind.livestatus
CREATE TABLE IF NOT EXISTS `livestatus` (
  `live_status` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`live_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.livestatus: ~2 rows (approximately)
INSERT INTO `livestatus` (`live_status`, `name`) VALUES
	(1, 'Unblock'),
	(2, 'Block');

-- Dumping structure for table medifind.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.model: ~6 rows (approximately)
INSERT INTO `model` (`id`, `name`) VALUES
	(1, 'Sport wheel Chair'),
	(2, 'Electric Wheel Chair'),
	(3, 'Hospital Wheel Chair'),
	(4, 'Hospital bed'),
	(5, 'Trolley'),
	(6, 'Cubeds');

-- Dumping structure for table medifind.model_has_brand
CREATE TABLE IF NOT EXISTS `model_has_brand` (
  `model_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_model_has_brand_brand1_idx` (`brand_id`),
  KEY `fk_model_has_brand_model1_idx` (`model_id`),
  CONSTRAINT `fk_model_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_model_has_brand_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.model_has_brand: ~12 rows (approximately)
INSERT INTO `model_has_brand` (`model_id`, `brand_id`, `id`) VALUES
	(2, 4, 1),
	(1, 4, 2),
	(3, 4, 3),
	(3, 2, 4),
	(4, 4, 6),
	(3, 3, 7),
	(4, 3, 8),
	(4, 1, 9),
	(5, 5, 10),
	(6, 4, 11),
	(6, 2, 12),
	(5, 3, 13);

-- Dumping structure for table medifind.oparetor_imge
CREATE TABLE IF NOT EXISTS `oparetor_imge` (
  `op_id` int NOT NULL AUTO_INCREMENT,
  `opre_imgepath` varchar(100) DEFAULT NULL,
  `opertor_oid` int NOT NULL,
  PRIMARY KEY (`op_id`),
  KEY `fk_oparetor_imge_opertor1_idx` (`opertor_oid`),
  CONSTRAINT `fk_oparetor_imge_opertor1` FOREIGN KEY (`opertor_oid`) REFERENCES `opertor` (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.oparetor_imge: ~0 rows (approximately)

-- Dumping structure for table medifind.opertor
CREATE TABLE IF NOT EXISTS `opertor` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `userStatus_user_id` int NOT NULL,
  `liveStatus_kive_status` int NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `fk_opertor_userStatus1_idx` (`userStatus_user_id`),
  KEY `fk_opertor_liveStatus1_idx` (`liveStatus_kive_status`),
  CONSTRAINT `fk_opertor_liveStatus1` FOREIGN KEY (`liveStatus_kive_status`) REFERENCES `livestatus` (`live_status`),
  CONSTRAINT `fk_opertor_userStatus1` FOREIGN KEY (`userStatus_user_id`) REFERENCES `userstatus` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.opertor: ~3 rows (approximately)
INSERT INTO `opertor` (`oid`, `fname`, `lname`, `user_name`, `password`, `email`, `mobile`, `date`, `userStatus_user_id`, `liveStatus_kive_status`) VALUES
	(6, 'Thimira', 'Sathsara', 'thimiya', '13126', NULL, NULL, NULL, 1, 1),
	(7, 'Kosala', 'Chaturanga', 'kosala541', '123456', NULL, NULL, NULL, 2, 1),
	(8, 'pathum', 'rekshan', 'pathum11', '1234567', NULL, NULL, '2023-05-24 03:40:33', 2, 1);

-- Dumping structure for table medifind.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `colour_id` int NOT NULL,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `discription` text,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_model_has_brand1_idx` (`model_has_brand_id`),
  KEY `fk_product_colour1_idx` (`colour_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_colour1` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_model_has_brand1` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.product: ~14 rows (approximately)
INSERT INTO `product` (`id`, `category_id`, `model_has_brand_id`, `colour_id`, `price`, `qty`, `title`, `discription`, `condition_id`, `status_id`, `user_email`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`) VALUES
	(1, 1, 1, 1, 600000, 4, 'Ultra Light Weight Travel Electric Wheelchair', 'The Dayang Medical steel all terrain wheelchair electric DY01108L is an durable and fold-able wheelchair which despite its low price compared with same range products from other factories, has a range of features making it the smart options when looking for safety mobility electric wheelchair.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-11-25 23:43:13', 1000, 1200),
	(2, 1, 1, 1, 6500, 4, 'Compact Electric  Wheelchair', 'The Dayang Medical Smart Light Weight Foldable Electric Wheelchair DY01120 is an durable and fold-able wheelchair which despite its low price compared with same range products from other factories, has a range of features making it the smart options when looking for safety mobility electric wheelchair.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-11-25 23:47:37', 100, 120),
	(3, 1, 2, 2, 500000, 5, 'Super Light Aluminum Sport Wheelchair ', 'Guangdong Dayang Medical Technology Co.,Ltd owns hundred of machines and over dozens of producing line, working staff over 500, warehouse with the load around 300 pcs containers orders. Monthly supply order is around 150-200 pcs containers.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-11-25 23:52:47', 1500, 1700),
	(4, 1, 2, 2, 45000, 3, 'Aluminium Basketball Or Tennis Wheelchair', 'Guangdong Dayang Medical Technology Co.,Ltd owns hundred of machines and over dozens of producing line, working staff over 500, warehouse with the load around 300 pcs containers orders. Monthly supply order is around 150-200 pcs containers.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-11-25 23:57:23', 1000, 1300),
	(7, 2, 6, 1, 12000, 5, 'Hospital Nursing Patient Bed ', 'Hospital Nursing Patient Bed - China Hospital Bed and Medical Bed\r\nVisit\r\n', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 19:16:33', 500, 600),
	(8, 2, 9, 1, 285000, 3, 'COMMODE HOSPITAL BED', 'COMMODE HOSPITAL BED WITH MATTRESS\r\nVisit\r\nRs285,000.00 LKR', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 22:39:06', 500, 600),
	(9, 2, 8, 1, 2000000, 4, 'Multi function Electric Hospital beds', 'Back lifting patients can sit up and do some daily life activities easily, reducing the burden of nursing for both patients and nurses..\r\nLeg up and foot down stretches patients feet, promotes circulation of leg core, preventing varicose veins and easily for daily leg care..', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 22:46:06', 1000, 1500),
	(10, 2, 8, 7, 50000, 5, 'Hospital Patient Bed', 'suitable for Home Patient, Homecare bed and Nursing.\r\nHome Care Hospital Patient Beds\r\nWhy should we use a hospital bed?\r\n* Improve patient blood circulation & prevents pressure sores or bedsores\r\n* Reduces breathing difficulties by relieving pressure on patient chest\r\n* Prevents patient from accidentally falling off', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 22:53:08', 1000, 1500),
	(13, 3, 10, 8, 8000, 7, 'Silver Stainless Steel Hospital Dressing Trolley', 'Approximately 760mm x 510mm x 900mm ( Lx W x H)\r\n\r\n2. Stainless steel frame.\r\n\r\n3. Stainless steel top and bottom shelves with guard rails on all sides.\r\n\r\n4. Has a provision for holding the bowl and bucket on the top and bottom respectively.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 23:05:57', 500, 600),
	(14, 3, 11, 8, 10000, 7, 'Hospital Bed Side Locker', 'Box size - 43cm (17") x 28cm (11") x H - 33cm (13")\r\n Locker made from machine pressed CRC MS sheets.\r\n Sides having one box enclosed on three sides.\r\n Pressed top with raised edges.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 23:11:11', 1000, 1200),
	(15, 3, 12, 5, 3000, 5, 'Hospital Bed Side Screen', 'hree-section frame made from 3/4" 1.22mm (18 SWG) thick pipe, which it makes rigid Hospital Equipment.\r\n Frame mounted on 6 swivel casters 50mm Ø.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 23:13:06', 500, 600),
	(16, 3, 13, 4, 10000, 6, 'Stretcher On Trolley', 'X-Ray Translucent non breakable composite top, which is removable like stretcher top.\r\n Useful to receive trauma patient.\r\n Can be used as operating table.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-09 23:17:30', 500, 600),
	(17, 1, 2, 3, 800000, 3, 'Self-propelled wheelchair', 'The Ergo Live (KM-9000) is a self-propelled wheelchair, designed to provide comfort and superior handling. Its main feature is the adjustable rear axle position, which can optimize the stability, control, and maneuverability of the wheelchair. The Ergo Live is also available with several different options and is equipped with several adjustable features to meet the requirements of the user.', 1, 1, 'supunsulakshana2001@gmail.com', '2022-12-10 11:12:36', 1500, 2000),
	(20, 4, 10, 4, 20000, 4, 'Instrument Trolley', 'This trolley is used to carry the equipment needed for treatment near the patient.', 1, 1, 'supunjavains@gmail.com', '2023-02-20 22:31:35', 300, 400);

-- Dumping structure for table medifind.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_Image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_Image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.profile_image: ~3 rows (approximately)
INSERT INTO `profile_image` (`path`, `user_email`) VALUES
	('resource/profile_img/Isuru_6388e6c9165b0.jpg', 'Isuru@gmail.com'),
	('resource/profile_img/Supun_63f3816d10c53.jpg', 'supunjavains@gmail.com'),
	('resource/profile_img/ Supun_63e1e99e9c3d2.jpg', 'supunsulakshana2001@gmail.com');

-- Dumping structure for table medifind.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.province: ~5 rows (approximately)
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'sabaragamwa'),
	(2, 'western'),
	(3, 'Centrel'),
	(4, 'Southern'),
	(5, 'Eastern');

-- Dumping structure for table medifind.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  KEY `fk_recent_product1_idx` (`product_id`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.recent: ~40 rows (approximately)
INSERT INTO `recent` (`id`, `user_email`, `product_id`) VALUES
	(1, 'supunsulakshana2001@gmail.com', 4),
	(2, 'supunsulakshana2001@gmail.com', 4),
	(3, 'supunsulakshana2001@gmail.com', 2),
	(4, 'supunsulakshana2001@gmail.com', 3),
	(5, 'supunsulakshana2001@gmail.com', 17),
	(6, 'supunsulakshana2001@gmail.com', 4),
	(7, 'supunsulakshana2001@gmail.com', 4),
	(8, 'supunsulakshana2001@gmail.com', 17),
	(9, 'supunsulakshana2001@gmail.com', 4),
	(10, 'supunsulakshana2001@gmail.com', 3),
	(11, 'supunsulakshana2001@gmail.com', 2),
	(12, 'supunsulakshana2001@gmail.com', 14),
	(13, 'supunsulakshana2001@gmail.com', 7),
	(14, 'supunsulakshana2001@gmail.com', 4),
	(15, 'supunsulakshana2001@gmail.com', 10),
	(16, 'supunsulakshana2001@gmail.com', 14),
	(17, 'supunsulakshana2001@gmail.com', 4),
	(18, 'supunsulakshana2001@gmail.com', 8),
	(19, 'supunsulakshana2001@gmail.com', 17),
	(20, 'supunsulakshana2001@gmail.com', 17),
	(21, 'supunsulakshana2001@gmail.com', 13),
	(22, 'supunsulakshana2001@gmail.com', 9),
	(23, 'supunsulakshana2001@gmail.com', 2),
	(24, 'supunsulakshana2001@gmail.com', 13),
	(25, 'supunsulakshana2001@gmail.com', 14),
	(26, 'supunsulakshana2001@gmail.com', 7),
	(27, 'supunsulakshana2001@gmail.com', 3),
	(28, 'supunsulakshana2001@gmail.com', 4),
	(29, 'supunsulakshana2001@gmail.com', 7),
	(30, 'supunsulakshana2001@gmail.com', 3),
	(31, 'supunsulakshana2001@gmail.com', 4),
	(32, 'supunsulakshana2001@gmail.com', 17),
	(33, 'supunsulakshana2001@gmail.com', 17),
	(34, 'supunsulakshana2001@gmail.com', 4),
	(35, 'supunsulakshana2001@gmail.com', 9),
	(36, 'supunsulakshana2001@gmail.com', 8),
	(37, 'supunsulakshana2001@gmail.com', 3),
	(38, 'supunsulakshana2001@gmail.com', 17),
	(39, 'supunsulakshana2001@gmail.com', 3),
	(40, 'supunsulakshana2001@gmail.com', 4);

-- Dumping structure for table medifind.sellers
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `br_code` varchar(45) DEFAULT NULL,
  `localtion` varchar(100) DEFAULT NULL,
  `seller_status_id` int NOT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sellers_user1_idx` (`user_email`),
  KEY `fk_sellers_seller_status1_idx` (`seller_status_id`),
  CONSTRAINT `fk_sellers_seller_status1` FOREIGN KEY (`seller_status_id`) REFERENCES `seller_status` (`id`),
  CONSTRAINT `fk_sellers_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.sellers: ~2 rows (approximately)
INSERT INTO `sellers` (`id`, `user_email`, `store_name`, `br_code`, `localtion`, `seller_status_id`, `verification_code`) VALUES
	(10, 'supunsulakshana2001@gmail.com', 'qwerw', 'f123235436', 'ssfdsaddazc', 1, '63e7adebafec9'),
	(12, 'supunjavains@gmail.com', 'LakshanStore', '1234523456', 'sfdgdvzasfz', 1, '63f4a2417d0f6');

-- Dumping structure for table medifind.seller_status
CREATE TABLE IF NOT EXISTS `seller_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.seller_status: ~2 rows (approximately)
INSERT INTO `seller_status` (`id`, `name`) VALUES
	(1, 'active Account'),
	(2, 'Deactive Account');

-- Dumping structure for table medifind.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.status: ~2 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');

-- Dumping structure for table medifind.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `verification_code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.user: ~4 rows (approximately)
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `join_date`, `verification_code`, `status`, `gender_id`) VALUES
	('Isuru@gmail.com', ' Isuru', ' Savindya', 'isuru123', '0719707674', '2022-11-09 18:17:17', NULL, 1, 1),
	('senuja2010@gmail.com', 'Senuja', 'Sasvindu', 'senuja1234', '0771821039', '2022-11-09 18:18:46', NULL, 1, 1),
	('supunjavains@gmail.com', 'Supun', 'Lakshan', 'supunl1234', '0771336735', '2023-02-20 18:45:13', NULL, 1, 1),
	('supunsulakshana2001@gmail.com', ' Supun', ' Sulakshana', '12345', '0716029210', '2022-11-09 18:15:14', '64156dd75307b', 1, 1);

-- Dumping structure for table medifind.userstatus
CREATE TABLE IF NOT EXISTS `userstatus` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.userstatus: ~2 rows (approximately)
INSERT INTO `userstatus` (`user_id`, `name`) VALUES
	(1, 'Admin'),
	(2, 'Opretor');

-- Dumping structure for table medifind.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `city_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_has_user_user1_idx` (`user_email`),
  KEY `fk_city_has_user_city1_idx` (`city_id`),
  CONSTRAINT `fk_city_has_user_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_city_has_user_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.user_has_address: ~4 rows (approximately)
INSERT INTO `user_has_address` (`city_id`, `user_email`, `id`, `line1`, `line2`, `postal_code`) VALUES
	(1, 'supunsulakshana2001@gmail.com', 1, ' kagalla  kotiyakubura', ' Ampe Kotiyakubura', '71370'),
	(1, 'supunjavains@gmail.com', 3, 'Ampe KotiaKubra', 'Kagalla para', '12345'),
	(1, 'senuja2010@gmail.com', 4, 'E 190/4 Ampe Kotiyakubura', 'kagalla Kurnagoda', '0987'),
	(3, 'Isuru@gmail.com', 5, 'colombo Rathmalana', '122/4 Rathmalana', '2314');

-- Dumping structure for table medifind.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table medifind.watchlist: ~4 rows (approximately)
INSERT INTO `watchlist` (`id`, `product_id`, `user_email`) VALUES
	(6, 7, 'senuja2010@gmail.com'),
	(11, 2, 'supunsulakshana2001@gmail.com'),
	(12, 17, 'supunsulakshana2001@gmail.com'),
	(13, 3, 'supunsulakshana2001@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
