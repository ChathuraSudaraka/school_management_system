-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.32-0ubuntu0.22.04.2 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sms
CREATE DATABASE IF NOT EXISTS `sms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sms`;

-- Dumping structure for table sms.activites_catogaries
CREATE TABLE IF NOT EXISTS `activites_catogaries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.activites_catogaries: ~2 rows (approximately)
INSERT INTO `activites_catogaries` (`id`, `name`) VALUES
	(1, 'Sports'),
	(2, 'Commity');

-- Dumping structure for table sms.admin_login
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.admin_login: ~1 rows (approximately)
INSERT INTO `admin_login` (`id`, `nic`, `password`, `name`) VALUES
	(1, '200515403527', 'xyz', 'Tharindu Nimesh');

-- Dumping structure for table sms.al_marks
CREATE TABLE IF NOT EXISTS `al_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bucket_1` int NOT NULL,
  `bucket_2` int NOT NULL,
  `bucket_3` int NOT NULL,
  `general_english` int NOT NULL,
  `general_knowledge` int NOT NULL,
  `git` int NOT NULL,
  `total` int NOT NULL,
  `term` varchar(5) NOT NULL,
  `student_details_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kid_marks_student_details1_idx` (`student_details_id`),
  CONSTRAINT `fk_kid_marks_student_details11` FOREIGN KEY (`student_details_id`) REFERENCES `student_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.al_marks: ~1 rows (approximately)
INSERT INTO `al_marks` (`id`, `bucket_1`, `bucket_2`, `bucket_3`, `general_english`, `general_knowledge`, `git`, `total`, `term`, `student_details_id`) VALUES
	(1, 76, 45, 67, 67, 35, 67, 356, '2', 1);

-- Dumping structure for table sms.al_subject
CREATE TABLE IF NOT EXISTS `al_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.al_subject: ~3 rows (approximately)
INSERT INTO `al_subject` (`id`, `name`) VALUES
	(1, 'ICT'),
	(2, 'ET'),
	(3, 'SFT');

-- Dumping structure for table sms.al_subject_has_student
CREATE TABLE IF NOT EXISTS `al_subject_has_student` (
  `student_index_number` int NOT NULL,
  `bucket_1` int NOT NULL,
  `bucket_2` int NOT NULL,
  `bucket_3` int NOT NULL,
  PRIMARY KEY (`student_index_number`),
  KEY `fk_al_subject_has_student_student1_idx` (`student_index_number`),
  KEY `fk_al_subject_has_student_al_subject1_idx` (`bucket_1`),
  KEY `fk_al_subject_has_student_al_subject2_idx` (`bucket_2`),
  KEY `fk_al_subject_has_student_al_subject3_idx` (`bucket_3`),
  CONSTRAINT `fk_al_subject_has_student_al_subject1` FOREIGN KEY (`bucket_1`) REFERENCES `al_subject` (`id`),
  CONSTRAINT `fk_al_subject_has_student_al_subject2` FOREIGN KEY (`bucket_2`) REFERENCES `al_subject` (`id`),
  CONSTRAINT `fk_al_subject_has_student_al_subject3` FOREIGN KEY (`bucket_3`) REFERENCES `al_subject` (`id`),
  CONSTRAINT `fk_al_subject_has_student_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.al_subject_has_student: ~0 rows (approximately)
INSERT INTO `al_subject_has_student` (`student_index_number`, `bucket_1`, `bucket_2`, `bucket_3`) VALUES
	(23056, 2, 1, 3);

-- Dumping structure for table sms.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `class` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `heading` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `path` varchar(40) NOT NULL,
  `teacher_nic` varchar(12) NOT NULL,
  `subject` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__teacher` (`teacher_nic`),
  KEY `code` (`code`),
  CONSTRAINT `FK__teacher` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.assignments: ~2 rows (approximately)
INSERT INTO `assignments` (`id`, `grade`, `class`, `heading`, `code`, `description`, `start`, `end`, `path`, `teacher_nic`, `subject`) VALUES
	(3, '3', 'F', 'This is a testing assignemnt', '123', 'this is a tesiting assignment for test is this feature working correctly', '2023-01-10', '2023-01-17', '63bc7d6ba945e.pdf', '703491502v', 'History'),
	(4, '6', 'F', 'this is a testing assignment', '#123#', 'bla bla bla', '2023-01-16', '2023-01-23', '63c4d502afe97.pdf', '703491502v', 'SInhala');

-- Dumping structure for table sms.beauty_subject
CREATE TABLE IF NOT EXISTS `beauty_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.beauty_subject: ~0 rows (approximately)
INSERT INTO `beauty_subject` (`id`, `name`) VALUES
	(1, 'ART');

-- Dumping structure for table sms.beauty_subject_has_student
CREATE TABLE IF NOT EXISTS `beauty_subject_has_student` (
  `student_index_number` int NOT NULL,
  `beauty_subject_id` int DEFAULT NULL,
  PRIMARY KEY (`student_index_number`),
  KEY `fk_beauty_subject_has_student_student1_idx` (`student_index_number`),
  KEY `fk_beauty_subject_has_student_beauty_subject1_idx` (`beauty_subject_id`),
  CONSTRAINT `fk_beauty_subject_has_student_beauty_subject1` FOREIGN KEY (`beauty_subject_id`) REFERENCES `beauty_subject` (`id`),
  CONSTRAINT `fk_beauty_subject_has_student_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.beauty_subject_has_student: ~0 rows (approximately)
INSERT INTO `beauty_subject_has_student` (`student_index_number`, `beauty_subject_id`) VALUES
	(23056, 1);

-- Dumping structure for table sms.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL,
  `title_id` int NOT NULL,
  `author_id` int NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_books_book_titles` (`title_id`),
  KEY `FK_books_book_authors` (`author_id`),
  CONSTRAINT `FK_books_book_authors` FOREIGN KEY (`author_id`) REFERENCES `book_authors` (`id`),
  CONSTRAINT `FK_books_book_titles` FOREIGN KEY (`title_id`) REFERENCES `book_titles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.books: ~4 rows (approximately)
INSERT INTO `books` (`id`, `title_id`, `author_id`, `status`) VALUES
	(121, 1, 1, '0'),
	(122, 1, 1, '1'),
	(213, 5, 3, '1'),
	(214, 4, 2, '1'),
	(234, 2, 2, '1');

-- Dumping structure for table sms.book_authors
CREATE TABLE IF NOT EXISTS `book_authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.book_authors: ~2 rows (approximately)
INSERT INTO `book_authors` (`id`, `name`) VALUES
	(1, 'T.B. Ilangarathna'),
	(2, 'martin wicramasinghe'),
	(3, 'tharindu'),
	(4, 'Sachith Prasan');

-- Dumping structure for table sms.book_titles
CREATE TABLE IF NOT EXISTS `book_titles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `count` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.book_titles: ~6 rows (approximately)
INSERT INTO `book_titles` (`id`, `name`, `count`) VALUES
	(1, 'Aba Yaaluwo', 37),
	(2, 'Madolduwa', 54),
	(3, 'vfvyu', 0),
	(4, 'vdwvdvs', 0),
	(5, 'famous five', 81),
	(6, 'new title', 0);

-- Dumping structure for table sms.class_teacher
CREATE TABLE IF NOT EXISTS `class_teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `grade` varchar(3) NOT NULL,
  `class` varchar(3) NOT NULL,
  `teacher_nic` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_class_teacher_teacher1_idx` (`teacher_nic`),
  CONSTRAINT `fk_class_teacher_teacher1` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.class_teacher: ~2 rows (approximately)
INSERT INTO `class_teacher` (`id`, `year`, `grade`, `class`, `teacher_nic`) VALUES
	(3, '2023', '3', 'F', '200505334290'),
	(5, '2024', '7', 'B', '200515403527'),
	(7, '2023', '6', 'F', '703491502v');

-- Dumping structure for table sms.coaches
CREATE TABLE IF NOT EXISTS `coaches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.coaches: ~1 rows (approximately)
INSERT INTO `coaches` (`id`, `name`, `mobile`, `nic`, `password`) VALUES
	(1, 'Tharindu Nimesh', '701189971', '200515403527', 'Mercy@2005');

-- Dumping structure for table sms.coaches_has_sports
CREATE TABLE IF NOT EXISTS `coaches_has_sports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coach_id` int NOT NULL,
  `sport_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__coaches` (`coach_id`),
  KEY `FK__sports` (`sport_id`),
  CONSTRAINT `FK__coaches` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`),
  CONSTRAINT `FK__sports` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.coaches_has_sports: ~1 rows (approximately)
INSERT INTO `coaches_has_sports` (`id`, `coach_id`, `sport_id`) VALUES
	(1, 1, 1);

-- Dumping structure for table sms.day
CREATE TABLE IF NOT EXISTS `day` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.day: ~5 rows (approximately)
INSERT INTO `day` (`id`, `name`) VALUES
	(1, 'Monday'),
	(2, 'Tuesday'),
	(3, 'Wednesday'),
	(4, 'Thursday'),
	(5, 'Friday');

-- Dumping structure for table sms.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.gender: ~2 rows (approximately)
INSERT INTO `gender` (`gender_id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table sms.job_roles
CREATE TABLE IF NOT EXISTS `job_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.job_roles: ~8 rows (approximately)
INSERT INTO `job_roles` (`id`, `name`) VALUES
	(1, 'Administrative staff'),
	(2, 'Finance staff'),
	(3, 'Facilities staff'),
	(4, 'IT staff'),
	(5, 'Human resources staff'),
	(6, 'Marketing and communications staff'),
	(7, 'Security staff'),
	(8, 'Catering and food service staff'),
	(9, 'Transportation staff');

-- Dumping structure for table sms.kid_marks
CREATE TABLE IF NOT EXISTS `kid_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sinhala` int NOT NULL,
  `maths` int NOT NULL,
  `english` int NOT NULL,
  `buddhism` int NOT NULL,
  `environment` int NOT NULL,
  `tamil` int NOT NULL,
  `total` int NOT NULL,
  `term` varchar(5) NOT NULL,
  `student_details_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kid_marks_student_details1_idx` (`student_details_id`),
  CONSTRAINT `fk_kid_marks_student_details1` FOREIGN KEY (`student_details_id`) REFERENCES `student_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.kid_marks: ~0 rows (approximately)
INSERT INTO `kid_marks` (`id`, `sinhala`, `maths`, `english`, `buddhism`, `environment`, `tamil`, `total`, `term`, `student_details_id`) VALUES
	(100, 12, 12, 12, 12, 12, 12, 72, '1', 3);

-- Dumping structure for table sms.lib_login
CREATE TABLE IF NOT EXISTS `lib_login` (
  `nic` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.lib_login: ~0 rows (approximately)
INSERT INTO `lib_login` (`nic`, `password`) VALUES
	('200515403527', 'abc');

-- Dumping structure for table sms.middle_marks
CREATE TABLE IF NOT EXISTS `middle_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sinhala` int NOT NULL,
  `maths` int NOT NULL,
  `english` int NOT NULL,
  `buddhism` int NOT NULL,
  `science` int NOT NULL,
  `tamil` int NOT NULL,
  `history` int NOT NULL,
  `geography` int NOT NULL,
  `health` int NOT NULL,
  `civics` int NOT NULL,
  `art` int NOT NULL,
  `pts` int NOT NULL,
  `total` int NOT NULL,
  `term` varchar(5) NOT NULL,
  `student_details_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kid_marks_student_details1_idx` (`student_details_id`),
  CONSTRAINT `fk_kid_marks_student_details10` FOREIGN KEY (`student_details_id`) REFERENCES `student_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.middle_marks: ~3 rows (approximately)
INSERT INTO `middle_marks` (`id`, `sinhala`, `maths`, `english`, `buddhism`, `science`, `tamil`, `history`, `geography`, `health`, `civics`, `art`, `pts`, `total`, `term`, `student_details_id`) VALUES
	(1, 67, 45, 87, 89, 45, 67, 56, 87, 56, 87, 67, 79, 1300, '1', 1),
	(2, 65, 57, 45, 66, 34, 77, 87, 98, 9, 67, 87, 4, 1200, '1', 4),
	(3, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 1080, '2', 22),
	(5, 43, 54, 76, 76, 12, 65, 98, 45, 45, 76, 43, 23, 656, '2', 4);

-- Dumping structure for table sms.mistake
CREATE TABLE IF NOT EXISTS `mistake` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mistake` text NOT NULL,
  `level` varchar(1) NOT NULL,
  `date` date NOT NULL,
  `teacher` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `teacher_role` int NOT NULL COMMENT 'teacher mean by 0 and admin mean by 1 ',
  `index_number` int NOT NULL,
  `details_number` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__student` (`details_number`) USING BTREE,
  KEY `FK_mistake_student` (`index_number`),
  CONSTRAINT `FK_mistake_student` FOREIGN KEY (`index_number`) REFERENCES `student` (`index_number`),
  CONSTRAINT `FK_mistake_student_details` FOREIGN KEY (`details_number`) REFERENCES `student_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.mistake: ~4 rows (approximately)
INSERT INTO `mistake` (`id`, `mistake`, `level`, `date`, `teacher`, `teacher_role`, `index_number`, `details_number`) VALUES
	(1, 'nikan', '3', '2023-03-28', '200515403527', 1, 23456, 4),
	(5, 'kill a one', '4', '2023-03-28', '200515403527', 1, 23056, 1),
	(6, 'he has some Illegal works on school', '3', '2023-03-31', '200515403527', 1, 23456, 4),
	(7, 'he has some Illegal works on school', '3', '2023-03-31', '200515403527', 1, 23456, 4);

-- Dumping structure for table sms.nationality
CREATE TABLE IF NOT EXISTS `nationality` (
  `nationality_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.nationality: ~4 rows (approximately)
INSERT INTO `nationality` (`nationality_id`, `name`) VALUES
	(1, 'Sinhalese'),
	(2, 'Tamil'),
	(3, 'Burgher'),
	(4, 'Moor');

-- Dumping structure for table sms.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `header` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.news: ~2 rows (approximately)
INSERT INTO `news` (`id`, `header`, `description`, `image`) VALUES
	('08889', 'This is a news', 'This is a testing news for test', '63bb042a038fa.jpg'),
	('ihgew8gy', 'tharindu nimesh', 'news by tharindu', '63ba003a2a21d.webp');

-- Dumping structure for table sms.news_grades
CREATE TABLE IF NOT EXISTS `news_grades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `news_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `grade` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_grades_news` (`news_id`),
  CONSTRAINT `FK_news_grades_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.news_grades: ~26 rows (approximately)
INSERT INTO `news_grades` (`id`, `news_id`, `grade`) VALUES
	(53, 'ihgew8gy', 1),
	(54, 'ihgew8gy', 2),
	(55, 'ihgew8gy', 3),
	(56, 'ihgew8gy', 4),
	(57, 'ihgew8gy', 5),
	(58, 'ihgew8gy', 6),
	(59, 'ihgew8gy', 7),
	(60, 'ihgew8gy', 8),
	(61, 'ihgew8gy', 11),
	(62, 'ihgew8gy', 10),
	(63, 'ihgew8gy', 11),
	(64, 'ihgew8gy', 12),
	(65, 'ihgew8gy', 13),
	(66, '08889', 1),
	(67, '08889', 2),
	(68, '08889', 3),
	(69, '08889', 4),
	(70, '08889', 5),
	(71, '08889', 6),
	(72, '08889', 7),
	(73, '08889', 8),
	(74, '08889', 11),
	(75, '08889', 10),
	(76, '08889', 11),
	(77, '08889', 12),
	(78, '08889', 13);

-- Dumping structure for table sms.non_academic_staff
CREATE TABLE IF NOT EXISTS `non_academic_staff` (
  `nic` varchar(12) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `mobile` varchar(10) NOT NULL DEFAULT '',
  `role` int NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`nic`),
  KEY `FK_non_academic_staff_job_roles` (`role`),
  CONSTRAINT `FK_non_academic_staff_job_roles` FOREIGN KEY (`role`) REFERENCES `job_roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.non_academic_staff: ~1 rows (approximately)
INSERT INTO `non_academic_staff` (`nic`, `name`, `mobile`, `role`, `start_date`, `end_date`) VALUES
	('200515403527', 'Tharindu Nimesh', '0701189971', 1, '2017-02-11', NULL);

-- Dumping structure for table sms.ol_marks
CREATE TABLE IF NOT EXISTS `ol_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sinhala` int NOT NULL,
  `maths` int NOT NULL,
  `english` int NOT NULL,
  `buddhism` int NOT NULL,
  `science` int NOT NULL,
  `history` int NOT NULL,
  `bucket_1` int NOT NULL,
  `bucket_2` int NOT NULL,
  `bucket_3` int NOT NULL,
  `total` int NOT NULL,
  `term` varchar(5) NOT NULL,
  `student_details_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kid_marks_student_details1_idx` (`student_details_id`),
  CONSTRAINT `fk_kid_marks_student_details100` FOREIGN KEY (`student_details_id`) REFERENCES `student_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.ol_marks: ~1 rows (approximately)
INSERT INTO `ol_marks` (`id`, `sinhala`, `maths`, `english`, `buddhism`, `science`, `history`, `bucket_1`, `bucket_2`, `bucket_3`, `total`, `term`, `student_details_id`) VALUES
	(1, 65, 45, 76, 87, 34, 89, 67, 98, 56, 678, '1', 1);

-- Dumping structure for table sms.ol_subject
CREATE TABLE IF NOT EXISTS `ol_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.ol_subject: ~3 rows (approximately)
INSERT INTO `ol_subject` (`id`, `name`) VALUES
	(1, 'Commerce'),
	(2, 'ART'),
	(3, 'ICT');

-- Dumping structure for table sms.ol_subject_has_student
CREATE TABLE IF NOT EXISTS `ol_subject_has_student` (
  `student_index_number` int NOT NULL,
  `bucket_1` int NOT NULL,
  `bucket_2` int NOT NULL,
  `bucket_3` int NOT NULL,
  PRIMARY KEY (`student_index_number`),
  KEY `fk_ol_subject_has_student_student1_idx` (`student_index_number`),
  KEY `fk_ol_subject_has_student_ol_subject1_idx` (`bucket_1`),
  KEY `fk_ol_subject_has_student_ol_subject2_idx` (`bucket_2`),
  KEY `fk_ol_subject_has_student_ol_subject3_idx` (`bucket_3`),
  CONSTRAINT `fk_ol_subject_has_student_ol_subject1` FOREIGN KEY (`bucket_1`) REFERENCES `ol_subject` (`id`),
  CONSTRAINT `fk_ol_subject_has_student_ol_subject2` FOREIGN KEY (`bucket_2`) REFERENCES `ol_subject` (`id`),
  CONSTRAINT `fk_ol_subject_has_student_ol_subject3` FOREIGN KEY (`bucket_3`) REFERENCES `ol_subject` (`id`),
  CONSTRAINT `fk_ol_subject_has_student_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.ol_subject_has_student: ~0 rows (approximately)
INSERT INTO `ol_subject_has_student` (`student_index_number`, `bucket_1`, `bucket_2`, `bucket_3`) VALUES
	(23056, 1, 2, 3);

-- Dumping structure for table sms.prefect
CREATE TABLE IF NOT EXISTS `prefect` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `description` text,
  `student_index_number` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prefect_student1_idx` (`student_index_number`),
  CONSTRAINT `fk_prefect_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.prefect: ~0 rows (approximately)

-- Dumping structure for table sms.principle
CREATE TABLE IF NOT EXISTS `principle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `teacher_nic` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vice_principle_teacher1_idx` (`teacher_nic`),
  CONSTRAINT `fk_vice_principle_teacher10` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.principle: ~0 rows (approximately)

-- Dumping structure for table sms.religion
CREATE TABLE IF NOT EXISTS `religion` (
  `religion_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`religion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.religion: ~4 rows (approximately)
INSERT INTO `religion` (`religion_id`, `name`) VALUES
	(1, 'Buddhist'),
	(2, 'Catholic'),
	(3, 'Hindu'),
	(4, 'Islam');

-- Dumping structure for table sms.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `message` text NOT NULL,
  `index_number` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_requests_student` (`index_number`),
  CONSTRAINT `FK_requests_student` FOREIGN KEY (`index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.requests: ~2 rows (approximately)

-- Dumping structure for table sms.section_heads
CREATE TABLE IF NOT EXISTS `section_heads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `appoinment` date NOT NULL,
  `resignation` date DEFAULT NULL,
  `section_head_nic` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_section_heads_teacher1_idx` (`section_head_nic`),
  CONSTRAINT `fk_section_heads_teacher1` FOREIGN KEY (`section_head_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.section_heads: ~2 rows (approximately)
INSERT INTO `section_heads` (`id`, `section`, `appoinment`, `resignation`, `section_head_nic`) VALUES
	(5, '3', '2023-03-30', NULL, '703491502v'),
	(6, '5', '2023-03-30', NULL, '200515403527');

-- Dumping structure for table sms.sports
CREATE TABLE IF NOT EXISTS `sports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sports_activites_catogaries` (`category_id`),
  CONSTRAINT `FK_sports_activites_catogaries` FOREIGN KEY (`category_id`) REFERENCES `activites_catogaries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.sports: ~0 rows (approximately)
INSERT INTO `sports` (`id`, `name`, `category_id`, `description`) VALUES
	(1, 'Cricket', 1, 'The International Cricket Council is the global governing body of cricket. It was founded as the Imperial Cricket Conference in 1909 by representatives from Australia, England and South Africa. It was renamed as the International Cricket Conference in 1965, and took up its current name in 1987. ');

-- Dumping structure for table sms.student
CREATE TABLE IF NOT EXISTS `student` (
  `index_number` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `initial_name` varchar(80) NOT NULL,
  `date_of_birth` date NOT NULL,
  `scholarship` varchar(3) NOT NULL,
  `enroll_year` year NOT NULL,
  `encroll_class` varchar(4) NOT NULL,
  `mother_name` varchar(80) NOT NULL,
  `mother_nic` varchar(12) NOT NULL,
  `mother_number` varchar(10) NOT NULL,
  `mother_job` varchar(20) DEFAULT NULL,
  `mother_job_address` varchar(45) DEFAULT NULL,
  `mother_email` varchar(30) DEFAULT NULL,
  `father_name` varchar(80) NOT NULL,
  `father_nic` varchar(12) NOT NULL,
  `father_number` varchar(10) NOT NULL,
  `father_job` varchar(20) DEFAULT NULL,
  `father_job_address` varchar(45) DEFAULT NULL,
  `father_email` varchar(30) DEFAULT NULL,
  `guardian_name` varchar(80) DEFAULT NULL,
  `guardian_nic` varchar(12) DEFAULT NULL,
  `guardian_number` varchar(10) DEFAULT NULL,
  `guardian_job` varchar(20) DEFAULT NULL,
  `guardian_job_address` varchar(45) DEFAULT NULL,
  `guardian_email` varchar(30) DEFAULT NULL,
  `emergency_number` varchar(10) NOT NULL,
  `emergency_email` varchar(60) NOT NULL,
  `address` varchar(45) NOT NULL,
  `current_grade` varchar(5) DEFAULT NULL,
  `current_class` varchar(5) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `distance` double NOT NULL DEFAULT '0',
  `nationality_id` int NOT NULL,
  `religion_id` int NOT NULL,
  `travel_id` int NOT NULL,
  `gender_id` int NOT NULL,
  `path` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'default.png',
  `date_of_resignation` date DEFAULT NULL,
  `previous_school` text,
  `score` int NOT NULL DEFAULT '100',
  PRIMARY KEY (`index_number`),
  KEY `fk_student_nationality_idx` (`nationality_id`),
  KEY `fk_student_religion1_idx` (`religion_id`),
  KEY `fk_student_travel_method1_idx` (`travel_id`),
  KEY `fk_student_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_student_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`),
  CONSTRAINT `fk_student_nationality` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`nationality_id`),
  CONSTRAINT `fk_student_religion1` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`religion_id`),
  CONSTRAINT `fk_student_travel_method1` FOREIGN KEY (`travel_id`) REFERENCES `travel_method` (`travel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.student: ~10 rows (approximately)
INSERT INTO `student` (`index_number`, `full_name`, `initial_name`, `date_of_birth`, `scholarship`, `enroll_year`, `encroll_class`, `mother_name`, `mother_nic`, `mother_number`, `mother_job`, `mother_job_address`, `mother_email`, `father_name`, `father_nic`, `father_number`, `father_job`, `father_job_address`, `father_email`, `guardian_name`, `guardian_nic`, `guardian_number`, `guardian_job`, `guardian_job_address`, `guardian_email`, `emergency_number`, `emergency_email`, `address`, `current_grade`, `current_class`, `password`, `distance`, `nationality_id`, `religion_id`, `travel_id`, `gender_id`, `path`, `date_of_resignation`, `previous_school`, `score`) VALUES
	(22830, 'iluppalla gamage lisath methsadu darmappriya', 'I.G.lisath methsadu darmappriya', '2005-07-01', 'No', '2011', '1', 'T.H.K.Chamila Dilhani', '7612345678v', '776600654', '', '', 'chamiladilhani76@gmail.com', 'I.G.Sampath Dharmappriya', '123456789v', '756320700', 'abroad', '', 'shampathdarmappriya@gmail.com', '', '', '', '', '', '', '776600654', 'chamiladilhani@gmail.com', '86/27A,Heritagecity,Gonawala,Kalaniya', '', '', 'Lisath@2005', 7, 1, 1, 1, 1, '63c5154122dc8.png', NULL, NULL, 100),
	(23046, 'Sahan', 'a.b. Sahan', '2022-12-27', 'no', '2022', '1', 'sahan', 'vsev', '23453246', NULL, NULL, NULL, 'xyz', '3464637g', '2343564', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0677535343', 'thsaea@gbszb.nuy', '3w56/dsvbfg,reth', '3', 'F', 'xyz', 12, 1, 1, 3, 1, 'default.png', NULL, NULL, 100),
	(23055, 'sahan', 'sas', '2022-12-31', 'no', '2022', '2', 'fvfg', 'gsgs', '3254453', NULL, NULL, NULL, 'dfghtr', '3455yt56', '234435321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6435234552', '5423413231vfdgsd', 'fwet.rey34', '6', 'F', '3543', 0, 3, 1, 1, 2, '63c2e0920e839.png', NULL, NULL, 100),
	(23056, 'Nallaperuma Thanthrige Tharindu Nimesh Dewinda', 'N.T. Tharindu Nimesh ', '2005-06-02', 'no', '2011', '1', 'efgrew', 'efertg', '45642323', NULL, NULL, '', 'Dewasiri', '703491502v', '645634234', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '6435234552', 'tharindunimesh.abc@gmail.com', '693/3, Gonawala, Kelaniya', '3', 'F', 'Mercy@2005', 8, 1, 1, 1, 1, 'default.png', '2023-03-22', '', 35),
	(23086, 'sahan', 'sas', '2022-12-31', 'no', '2022', '2', 'fvfg', 'gsgs', '3254453', NULL, NULL, NULL, 'dfghtr', '3455yt56', '234435321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6435234552', '5423413231vfdgsd', 'fwet.rey34', '3', 'D', '3543', 0, 3, 1, 1, 1, 'default.png', NULL, NULL, 100),
	(23456, 'Sachith Prasan', 'Sachith Prasan', '2023-01-10', '', '2023', 'D', 'bether rwgvwr', '432354365', '771112223', '', '', '', 'wev ervbr', '77111777', '771112223', '', '', '', '', '', '', '', '', '', '771112223', 'tharindunimesg@gmail.com', '12/02/2005', '', '', 'Mercy@2005', 43, 1, 1, 1, 1, '63c2dcf9365f4.png', NULL, NULL, 79),
	(34098, 'Tharindu Nimesh', 'NT Tharindu Nimesh', '2023-01-05', '', '2022', '10', 'Deepika Disna', '769034013v', '718572241', '', '', '', 'Deawasiri', '703491502v', '718572241', '', '', '', '', '', '', '', '', '', '718572241', 'tharindunimesg@gmail.com', '693,3 Gonawala Kelnia', '', '', 'Mercy@2005', 65, 1, 1, 1, 1, 'default.png', NULL, NULL, 100),
	(123123, 'Tharindu Nimesh', 'Tharindu NImesh', '2023-01-09', '', '2010', 'D', 'rege5w4g', 'awefe3gw3', '3452323', 'dfgagea', 'wegage', 'awefgaw', 'ageawrag', 'ageaegrea', '4532341', 'fxycfugc', 'beshtsth', 'srhserh', '', '', '', '', '', '', '64535423', 'blabla#123.vwe', '12/02/2005', '', '', '123123', 56, 1, 1, 1, 1, 'default.png', NULL, NULL, 100),
	(656565, 'Chathura Sudaraka', 'fyfif jblugv', '2023-01-09', '', '2023', 'D', 'cgjctc yhgvyh', '767676979', '771112223', '', '', '', 'cgjctc yhgvyh', '767676979', '771112223', '', '', '', '', '', '', '', '', '', '771112223', 'tharindunimesg@gmail.com', '12/02/2005', '', '', 'Mercy@2005', 34, 1, 2, 2, 1, '63c2e0920e839.png', NULL, NULL, 100),
	(656566, 'Dilini Tharaka', 'Dilini Tharaka', '2023-03-06', 'No', '2011', '1', 'Disna Kumari', '7678013008v', '711735046', '', '', 'disnakumari@gmail.com', 'Dewasiri', '703491502v', '718572241', '', '', 'ntdewasiri@gmail.com', '', '', '', '', '', '', '718572241', 'ntdewasiri@gmail.com', '693/3, Gonawala, Kelniya.', '', '', 'Mercy@2005', 4, 1, 1, 1, 1, 'default.png', NULL, '', 100);

-- Dumping structure for table sms.student_attendance
CREATE TABLE IF NOT EXISTS `student_attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(5) NOT NULL,
  `student_index_number` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attendance_student1_idx` (`student_index_number`),
  CONSTRAINT `fk_attendance_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.student_attendance: ~24 rows (approximately)
INSERT INTO `student_attendance` (`id`, `date`, `status`, `student_index_number`) VALUES
	(13, '2023-01-03', 'false', 23056),
	(14, '2023-01-03', 'false', 23046),
	(15, '2023-01-04', 'true', 23056),
	(16, '2023-01-04', 'true', 23046),
	(17, '2023-01-05', 'false', 23056),
	(18, '2023-01-05', 'true', 23046),
	(19, '2023-01-06', 'true', 23046),
	(23, '2023-01-06', 'false', 23056),
	(24, '2023-01-07', 'true', 23055),
	(25, '2023-01-07', 'false', 23056),
	(27, '2023-01-08', 'false', 23056),
	(29, '2023-01-08', 'true', 23055),
	(38, '2023-01-15', 'true', 23055),
	(39, '2023-01-15', 'true', 23055),
	(40, '2023-01-16', 'true', 23055),
	(41, '2023-01-17', 'true', 23055),
	(42, '2023-02-26', 'true', 23056),
	(43, '2023-02-26', 'false', 23456),
	(44, '2023-02-27', 'false', 23056),
	(45, '2023-02-27', 'true', 23456),
	(67, '2023-03-29', 'false', 23456),
	(68, '2023-03-29', 'false', 22830),
	(69, '2023-03-29', 'true', 23056),
	(70, '2023-03-29', 'true', 23055);

-- Dumping structure for table sms.student_borrow_books
CREATE TABLE IF NOT EXISTS `student_borrow_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_index` int NOT NULL,
  `book_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_borrow_books_student` (`student_index`),
  KEY `FK_borrow_books_books` (`book_id`),
  CONSTRAINT `FK_borrow_books_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_borrow_books_student` FOREIGN KEY (`student_index`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.student_borrow_books: ~2 rows (approximately)
INSERT INTO `student_borrow_books` (`id`, `student_index`, `book_id`, `start_date`, `end_date`, `status`) VALUES
	(2, 23456, 121, '2023-03-05', '2023-03-19', '1'),
	(3, 23056, 121, '2023-03-05', '2023-03-19', '1'),
	(4, 23056, 213, '2023-03-05', '2023-03-19', '1');

-- Dumping structure for table sms.student_details
CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `grade` varchar(5) NOT NULL,
  `class` varchar(5) NOT NULL,
  `service_payment` varchar(5) NOT NULL DEFAULT 'No',
  `student_index_number` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_details_student1_idx` (`student_index_number`),
  CONSTRAINT `fk_student_details_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.student_details: ~7 rows (approximately)
INSERT INTO `student_details` (`id`, `year`, `grade`, `class`, `service_payment`, `student_index_number`) VALUES
	(1, '2023', '6', 'F', 'yes', 23056),
	(2, '2022', '2', 'D', 'No', 23046),
	(3, '2023', '3', 'F', 'yes', 23055),
	(4, '2023', '6', 'F', 'No', 23456),
	(6, '2025', '5', 'D', 'No', 23056),
	(7, '2026', '8', 'F', 'no', 23056),
	(8, '2024', '4', 'F', 'no', 23055),
	(22, '2023', '6', 'F', 'No', 22830);

-- Dumping structure for table sms.student_has_sport
CREATE TABLE IF NOT EXISTS `student_has_sport` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `student_index_number` int NOT NULL,
  `sports_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sports_has_student_student1_idx` (`student_index_number`),
  KEY `fk_sports_has_student_sports1_idx` (`sports_id`),
  CONSTRAINT `fk_sports_has_student_sports1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`),
  CONSTRAINT `fk_sports_has_student_student1` FOREIGN KEY (`student_index_number`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.student_has_sport: ~0 rows (approximately)

-- Dumping structure for table sms.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.subject: ~4 rows (approximately)
INSERT INTO `subject` (`id`, `name`) VALUES
	(1, 'SInhala'),
	(2, 'English'),
	(3, 'Maths'),
	(4, 'History');

-- Dumping structure for table sms.submitted
CREATE TABLE IF NOT EXISTS `submitted` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(40) NOT NULL,
  `code` varchar(20) NOT NULL,
  `student_index` int NOT NULL,
  `time` datetime NOT NULL,
  `marks` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_submitted_student` (`student_index`),
  KEY `FK_submitted_assignments` (`code`),
  CONSTRAINT `FK_submitted_assignments` FOREIGN KEY (`code`) REFERENCES `assignments` (`code`),
  CONSTRAINT `FK_submitted_student` FOREIGN KEY (`student_index`) REFERENCES `student` (`index_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.submitted: ~3 rows (approximately)
INSERT INTO `submitted` (`id`, `path`, `code`, `student_index`, `time`, `marks`) VALUES
	(2, '63bc91081a946.pdf', '123', 23086, '2023-01-10 03:41:20', 76),
	(4, '63bc9d4dd30ca.pdf', '123', 23056, '2023-01-10 04:33:41', 56),
	(5, '63c4d52daffd6.pdf', '#123#', 23056, '2023-01-16 05:40:13', 10);

-- Dumping structure for table sms.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `nic` varchar(12) NOT NULL,
  `full_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `qualification` text,
  `contact_number` varchar(9) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nationality_id` int NOT NULL,
  `religion_id` int NOT NULL,
  `gender_gender_id` int NOT NULL,
  `date_of_resignation` date DEFAULT NULL,
  PRIMARY KEY (`nic`),
  KEY `fk_teacher_nationality1_idx` (`nationality_id`),
  KEY `fk_teacher_religion1_idx` (`religion_id`),
  KEY `fk_teacher_gender1_idx` (`gender_gender_id`),
  CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_gender_id`) REFERENCES `gender` (`gender_id`),
  CONSTRAINT `fk_teacher_nationality1` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`nationality_id`),
  CONSTRAINT `fk_teacher_religion1` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`religion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.teacher: ~6 rows (approximately)
INSERT INTO `teacher` (`nic`, `full_name`, `address`, `first_name`, `last_name`, `qualification`, `contact_number`, `date_of_birth`, `email`, `password`, `nationality_id`, `religion_id`, `gender_gender_id`, `date_of_resignation`) VALUES
	('11223344', 'NT Dilini Tharaka', '693/3, Gonawala, Kelniya', 'Dilini', 'Tharaka', 'Bsc In Computer Science', '783757766', NULL, 'dilinitharaka.abc@gmail.com', 'Sachiya@19999', 1, 1, 1, NULL),
	('200505334290', 'sanoj Madura', '693/3, Gonawala, Kelniya.', 'Sanoj ', 'Madura', 'Msc In Software Enginnering', '711735057', NULL, 'sachithprasan123@gmail.com', 'Sachiya@19999', 2, 1, 1, NULL),
	('200512345612', 'Sachith Prasan', '213/5, Gonawala, Kelniya.', 'Sachith ', 'Prasan', 'Msc In Software Enginnering', '701199917', '2005-04-18', 'tharindunimesh.abc@gmail.com', 'Sachiya@2000', 1, 1, 1, '2023-03-28'),
	('200515403527', 'Tharindu Nimesh', '693/3, Gonawala, Kelniya.', 'Tharindu', 'Nimesh', 'Phd In Computer Enginnering', '701189971', '1999-11-05', 'tharindunimesh.abc@gmail.com', 'Sachiya@19999', 1, 1, 1, NULL),
	('3276473v', 'Sahan', '693/3, Gonawala, Kelniya.', 'Sahan', 'Perera', 'Msc In Software Enginnering', '711735057', '2005-01-05', 'sachithprasan123@gmail.com', 'Sachiya@19999', 1, 1, 1, NULL),
	('703491502v', 'Nimal', '693/3, Gonawala, Kelniya.', 'Nimal', 'Jayaweera', 'Msc In Software Enginnering', '711735057', '2222-12-22', 'sachithprasan123@gmail.com', 'Mercy@2005', 1, 1, 1, '2023-03-28');

-- Dumping structure for table sms.teacher_attendance
CREATE TABLE IF NOT EXISTS `teacher_attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(5) NOT NULL,
  `teacher_nic` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_attendance_teacher1_idx` (`teacher_nic`),
  CONSTRAINT `fk_teacher_attendance_teacher1` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.teacher_attendance: ~0 rows (approximately)

-- Dumping structure for table sms.teacher_borrow_books
CREATE TABLE IF NOT EXISTS `teacher_borrow_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_nic` varchar(12) NOT NULL,
  `book_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_teacher_borrow_books_teacher` (`teacher_nic`),
  KEY `FK_teacher_borrow_books_books` (`book_id`),
  CONSTRAINT `FK_teacher_borrow_books_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_teacher_borrow_books_teacher` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.teacher_borrow_books: ~0 rows (approximately)
INSERT INTO `teacher_borrow_books` (`id`, `teacher_nic`, `book_id`, `start_date`, `end_date`, `status`) VALUES
	(1, '703491502v', 121, '2023-03-05', '2023-03-19', '0');

-- Dumping structure for table sms.teacher_has_subject
CREATE TABLE IF NOT EXISTS `teacher_has_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_nic` varchar(12) NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teacher_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_teacher_has_subject_teacher1_idx` (`teacher_nic`),
  CONSTRAINT `fk_teacher_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  CONSTRAINT `fk_teacher_has_subject_teacher1` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.teacher_has_subject: ~14 rows (approximately)
INSERT INTO `teacher_has_subject` (`id`, `teacher_nic`, `subject_id`) VALUES
	(1, '703491502v', 4),
	(2, '703491502v', 3),
	(3, '3276473v', 2),
	(4, '3276473v', 4),
	(5, '703491502v', 1),
	(6, '703491502v', 2),
	(7, '703491502v', 3),
	(8, '200505334290', 1),
	(9, '200505334290', 2),
	(10, '200505334290', 3),
	(11, '200505334290', 4),
	(15, '703491502v', 1),
	(16, '703491502v', 2),
	(17, '703491502v', 3);

-- Dumping structure for table sms.time_table
CREATE TABLE IF NOT EXISTS `time_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(5) NOT NULL,
  `class` varchar(5) NOT NULL,
  `period_1` int NOT NULL,
  `period_2` int NOT NULL,
  `period_3` int NOT NULL,
  `period_4` int NOT NULL,
  `period_5` int NOT NULL,
  `period_6` int NOT NULL,
  `period_7` int NOT NULL,
  `period_8` int NOT NULL,
  `day_id` int DEFAULT NULL,
  `year` year NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_time_table_teacher_has_subject1_idx` (`period_1`),
  KEY `fk_time_table_teacher_has_subject2_idx` (`period_2`),
  KEY `fk_time_table_teacher_has_subject3_idx` (`period_3`),
  KEY `fk_time_table_teacher_has_subject4_idx` (`period_4`),
  KEY `fk_time_table_teacher_has_subject5_idx` (`period_5`),
  KEY `fk_time_table_teacher_has_subject6_idx` (`period_6`),
  KEY `fk_time_table_teacher_has_subject7_idx` (`period_7`),
  KEY `fk_time_table_teacher_has_subject8_idx` (`period_8`),
  KEY `FK_time_table_day` (`day_id`),
  CONSTRAINT `FK_time_table_day` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject1` FOREIGN KEY (`period_1`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject2` FOREIGN KEY (`period_2`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject3` FOREIGN KEY (`period_3`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject4` FOREIGN KEY (`period_4`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject5` FOREIGN KEY (`period_5`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject6` FOREIGN KEY (`period_6`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject7` FOREIGN KEY (`period_7`) REFERENCES `teacher_has_subject` (`id`),
  CONSTRAINT `fk_time_table_teacher_has_subject8` FOREIGN KEY (`period_8`) REFERENCES `teacher_has_subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.time_table: ~0 rows (approximately)
INSERT INTO `time_table` (`id`, `grade`, `class`, `period_1`, `period_2`, `period_3`, `period_4`, `period_5`, `period_6`, `period_7`, `period_8`, `day_id`, `year`) VALUES
	(1, '6', 'f', 1, 4, 4, 3, 1, 5, 2, 3, 1, '2023');

-- Dumping structure for table sms.travel_method
CREATE TABLE IF NOT EXISTS `travel_method` (
  `travel_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`travel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.travel_method: ~3 rows (approximately)
INSERT INTO `travel_method` (`travel_id`, `name`) VALUES
	(1, 'Bus'),
	(2, 'School Van'),
	(3, 'Personal Vehicle');

-- Dumping structure for table sms.vice_principle
CREATE TABLE IF NOT EXISTS `vice_principle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `year` year NOT NULL,
  `teacher_nic` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vice_principle_teacher1_idx` (`teacher_nic`),
  CONSTRAINT `fk_vice_principle_teacher1` FOREIGN KEY (`teacher_nic`) REFERENCES `teacher` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sms.vice_principle: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
