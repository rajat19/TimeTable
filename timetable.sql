/*
Navicat MySQL Data Transfer

Source Server         : phpserver
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : timetable

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-09-12 13:47:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `classes`
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `branch` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES ('1', 'CSE', '2', '4', 'CS-1');
INSERT INTO `classes` VALUES ('2', 'CSE', '2', '4', 'CS-2');
INSERT INTO `classes` VALUES ('3', 'CSE', '2', '4', 'CS-3');
INSERT INTO `classes` VALUES ('4', 'CSE', '3', '6', 'CS-1');
INSERT INTO `classes` VALUES ('5', 'CSE', '3', '6', 'CS-2');
INSERT INTO `classes` VALUES ('6', 'CSE', '3', '6', 'CS-3');
INSERT INTO `classes` VALUES ('7', 'CSE', '4', '8', 'CS-1');
INSERT INTO `classes` VALUES ('8', 'CSE', '4', '8', 'CS-2');
INSERT INTO `classes` VALUES ('9', 'CSE', '4', '8', 'CS-3');

-- ----------------------------
-- Table structure for `class_tt`
-- ----------------------------
DROP TABLE IF EXISTS `class_tt`;
CREATE TABLE `class_tt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `slot_no` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class_tt
-- ----------------------------

-- ----------------------------
-- Table structure for `faculties`
-- ----------------------------
DROP TABLE IF EXISTS `faculties`;
CREATE TABLE `faculties` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `monday` int(11) DEFAULT NULL,
  `tuesday` int(11) DEFAULT NULL,
  `wednesday` int(11) DEFAULT NULL,
  `thursday` int(11) DEFAULT NULL,
  `friday` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculties
-- ----------------------------
INSERT INTO `faculties` VALUES ('1', '1', 'Mr. Ajay Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('2', '2', 'Mr. Akhilesh Verma', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('3', '3', 'Mr. Anuj Kumar Dwivedi', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('4', '4', 'Mr. Arun Kumar Yadav', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('5', '5', 'Prof. Brij Mohan Kalra', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('6', '6', 'Mr. Bihari Nath Pandey', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('7', '7', 'Ms. Charu Agrawal', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('8', '8', 'Ms. Deepti Singh', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('9', '9', 'Mr. Deepak Rai', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('10', '10', 'Mr. Dharmendra Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('11', '11', 'Dr. Inderjeet Kaur', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('12', '12', 'Ms. Kirti Seth', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('13', '13', 'Ms. Komal Juneja', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('14', '14', 'Dr. Mamta Bhusry', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('15', '15', 'Ms. Neeti Pahuja', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('16', '16', 'Ms. Nishu Bansal', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('17', '17', 'Ms. Prachi Maheshwari', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('18', '18', 'Dr. Pratima Singh', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('19', '19', 'Ms. Priyanka Sethi', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('20', '20', 'Mr. Rajeev Singh', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('21', '21', 'Ms. Reema Aswani', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('22', '22', 'Dr. Sachin Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('23', '23', 'Mr. Shashank Sahu', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('24', '24', 'Ms. Shiva Tyagi', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('25', '25', 'Ms. Shubhangi Rastogi', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('26', '26', 'Ms. Sonam Gupta', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('27', '27', 'Dr. Sunita Yadav', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('28', '28', 'Ms. Swimpy Pahuja', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('29', '29', 'Mr. Vikas Goel', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('30', '30', 'Mr. Vivek Singh Verma', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('31', '31', 'Mr. Vikas Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('32', '32', 'Dr. Swati Agrawal', 'AS&H', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('33', '33', 'Dr. Sangmitra', 'AS&H', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('34', '34', 'Ms. Sakshi Mittal', 'ECE', null, null, null, null, null);
INSERT INTO `faculties` VALUES ('35', '35', 'Ms. Sakshi Agarwal', 'ECE', null, null, null, null, null);

-- ----------------------------
-- Table structure for `faculty_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `faculty_subjects`;
CREATE TABLE `faculty_subjects` (
  `user_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculty_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `faculty_tt`
-- ----------------------------
DROP TABLE IF EXISTS `faculty_tt`;
CREATE TABLE `faculty_tt` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `slot_no` varchar(255) NOT NULL,
  `class_type` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculty_tt
-- ----------------------------

-- ----------------------------
-- Table structure for `labs`
-- ----------------------------
DROP TABLE IF EXISTS `labs`;
CREATE TABLE `labs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of labs
-- ----------------------------
INSERT INTO `labs` VALUES ('1', 'CSE Lab-1');
INSERT INTO `labs` VALUES ('2', 'CSE Lab-2');
INSERT INTO `labs` VALUES ('3', 'CSE Lab-3');
INSERT INTO `labs` VALUES ('4', 'CSE Lab-4');
INSERT INTO `labs` VALUES ('5', 'CSE Lab-5');
INSERT INTO `labs` VALUES ('6', 'CSE Lab-6');
INSERT INTO `labs` VALUES ('7', 'CSE Lab-7');
INSERT INTO `labs` VALUES ('8', 'CSE Project Lab');

-- ----------------------------
-- Table structure for `lab_tt`
-- ----------------------------
DROP TABLE IF EXISTS `lab_tt`;
CREATE TABLE `lab_tt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `slot_no` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lab_tt
-- ----------------------------

-- ----------------------------
-- Table structure for `slots`
-- ----------------------------
DROP TABLE IF EXISTS `slots`;
CREATE TABLE `slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of slots
-- ----------------------------
INSERT INTO `slots` VALUES ('1', '08:30:00', '09:20:00');
INSERT INTO `slots` VALUES ('2', '09:20:00', '10:10:00');
INSERT INTO `slots` VALUES ('3', '10:10:00', '11:00:00');
INSERT INTO `slots` VALUES ('4', '11:00:00', '11:50:00');
INSERT INTO `slots` VALUES ('5', '11:50:00', '12:40:00');
INSERT INTO `slots` VALUES ('6', '12:40:00', '13:30:00');
INSERT INTO `slots` VALUES ('7', '13:30:00', '14:20:00');
INSERT INTO `slots` VALUES ('8', '14:20:00', '15:10:00');
INSERT INTO `slots` VALUES ('9', '15:10:00', '16:00:00');

-- ----------------------------
-- Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `timetables`
-- ----------------------------
DROP TABLE IF EXISTS `timetables`;
CREATE TABLE `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(255) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `class_type` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetables
-- ----------------------------
INSERT INTO `timetables` VALUES ('1', 'monday', '1', '0', '2', 'B', '1', '16', 'NCS453');
INSERT INTO `timetables` VALUES ('2', 'monday', '1', '0', '2', 'B', '1', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('3', 'monday', '2', '0', '2', 'B', '1', '16', 'NCS453');
INSERT INTO `timetables` VALUES ('4', 'monday', '2', '0', '2', 'B', '1', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('5', 'monday', '0', '0', '2', 'B', '1', '16', 'NCS453');
INSERT INTO `timetables` VALUES ('6', 'monday', '0', '0', '2', 'B', '1', '31', 'NCS453');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Mr. Ajay Kumar', '', '', '', '1');
INSERT INTO `users` VALUES ('2', 'Mr. Akhilesh Verma', '', '', '', '1');
INSERT INTO `users` VALUES ('3', 'Mr. Anuj Kumar Dwivedi', '', '', '', '1');
INSERT INTO `users` VALUES ('4', 'Mr. Arun Kumar Yadav', '', '', '', '1');
INSERT INTO `users` VALUES ('5', 'Prof. B.M. Kalra', '', '', '', '1');
INSERT INTO `users` VALUES ('6', 'Mr. B.N. Pandey', '', '', '', '1');
INSERT INTO `users` VALUES ('7', 'Ms. Charu Agrawal', '', '', '', '1');
INSERT INTO `users` VALUES ('8', 'Ms. Deepti Singh', '', '', '', '1');
INSERT INTO `users` VALUES ('9', 'Mr. Deepak Rai', '', '', '', '1');
INSERT INTO `users` VALUES ('10', 'Mr. Dharmendra Kumar', '', '', '', '1');
INSERT INTO `users` VALUES ('11', 'Dr. Inderjeet Kaur', '', '', '', '1');
INSERT INTO `users` VALUES ('12', 'Ms. Kirti Seth', '', '', '', '1');
INSERT INTO `users` VALUES ('13', 'Ms. Komal Juneja', '', '', '', '1');
INSERT INTO `users` VALUES ('14', 'Dr. Mamta Bhusry', '', '', '', '1');
INSERT INTO `users` VALUES ('15', 'Ms. Neeti Pahuja', '', '', '', '1');
INSERT INTO `users` VALUES ('16', 'Ms. Nishu Bansal', '', '', '', '1');
INSERT INTO `users` VALUES ('17', 'Ms. Prachi Maheshwari', '', '', '', '1');
INSERT INTO `users` VALUES ('18', 'Dr. Pratima Singh', '', '', '', '1');
INSERT INTO `users` VALUES ('19', 'Ms. Priyanka Sethi', '', '', '', '1');
INSERT INTO `users` VALUES ('20', 'Mr. Rajeev Singh', '', '', '', '1');
INSERT INTO `users` VALUES ('21', 'Ms. Reema Aswani', '', '', '', '1');
INSERT INTO `users` VALUES ('22', 'Dr. Sachin Kumar', '', '', '', '1');
INSERT INTO `users` VALUES ('23', 'Mr. Shashank Sahu', '', '', '', '1');
INSERT INTO `users` VALUES ('24', 'Ms. Shiva Tyagi', '', '', '', '1');
INSERT INTO `users` VALUES ('25', 'Ms. Shubhangi Rastogi', '', '', '', '1');
INSERT INTO `users` VALUES ('26', 'Ms. Sonam Gupta', '', '', '', '1');
INSERT INTO `users` VALUES ('27', 'Dr. Sunita Yadav', '', '', '', '1');
INSERT INTO `users` VALUES ('28', 'Ms. Swimpy Pahuja', '', '', '', '1');
INSERT INTO `users` VALUES ('29', 'Mr. Vikas Goel', '', '', '', '1');
INSERT INTO `users` VALUES ('30', 'Mr. Vivek Singh Verma', '', '', '', '1');
INSERT INTO `users` VALUES ('31', 'Mr. Vikas Kumar', '', '', '', '1');
INSERT INTO `users` VALUES ('32', 'Dr. Swati Agrawal', '', '', '', '1');
INSERT INTO `users` VALUES ('33', 'Dr. Sangmitra', '', '', '', '1');
INSERT INTO `users` VALUES ('34', 'Ms. Sakshi Mittal', '', '', '', '1');
INSERT INTO `users` VALUES ('35', 'Ms. Sakshi Agarwal', '', '', '', '1');
INSERT INTO `users` VALUES ('36', 'Admin', '', '', '', '0');
