/*
Navicat MySQL Data Transfer

Source Server         : phpserver
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : timetable

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-10-01 15:54:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tt_classes`
-- ----------------------------
DROP TABLE IF EXISTS `tt_classes`;
CREATE TABLE `tt_classes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `branch` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_classes
-- ----------------------------
INSERT INTO `tt_classes` VALUES ('1', 'CSE', '2', '4', 'CS-1');
INSERT INTO `tt_classes` VALUES ('2', 'CSE', '2', '4', 'CS-2');
INSERT INTO `tt_classes` VALUES ('3', 'CSE', '2', '4', 'CS-3');
INSERT INTO `tt_classes` VALUES ('4', 'CSE', '3', '6', 'CS-1');
INSERT INTO `tt_classes` VALUES ('5', 'CSE', '3', '6', 'CS-2');
INSERT INTO `tt_classes` VALUES ('6', 'CSE', '3', '6', 'CS-3');
INSERT INTO `tt_classes` VALUES ('7', 'CSE', '4', '8', 'CS-1');
INSERT INTO `tt_classes` VALUES ('8', 'CSE', '4', '8', 'CS-2');
INSERT INTO `tt_classes` VALUES ('9', 'CSE', '4', '8', 'CS-3');

-- ----------------------------
-- Table structure for `tt_faculties`
-- ----------------------------
DROP TABLE IF EXISTS `tt_faculties`;
CREATE TABLE `tt_faculties` (
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
-- Records of tt_faculties
-- ----------------------------
INSERT INTO `tt_faculties` VALUES ('1', '1', 'Mr. Ajay Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('2', '2', 'Mr. Akhilesh Verma', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('3', '3', 'Mr. Anuj Kumar Dwivedi', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('4', '4', 'Mr. Arun Kumar Yadav', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('5', '5', 'Prof. Brij Mohan Kalra', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('6', '6', 'Mr. Bihari Nath Pandey', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('7', '7', 'Ms. Charu Agrawal', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('8', '8', 'Ms. Deepti Singh', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('9', '9', 'Mr. Deepak Rai', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('10', '10', 'Mr. Dharmendra Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('11', '11', 'Dr. Inderjeet Kaur', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('12', '12', 'Ms. Kirti Seth', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('13', '13', 'Ms. Komal Juneja', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('14', '14', 'Dr. Mamta Bhusry', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('15', '15', 'Ms. Neeti Pahuja', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('16', '16', 'Ms. Nishu Bansal', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('17', '17', 'Ms. Prachi Maheshwari', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('18', '18', 'Dr. Pratima Singh', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('19', '19', 'Ms. Priyanka Sethi', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('20', '20', 'Mr. Rajeev Singh', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('21', '21', 'Ms. Reema Aswani', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('22', '22', 'Dr. Sachin Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('23', '23', 'Mr. Shashank Sahu', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('24', '24', 'Ms. Shiva Tyagi', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('25', '25', 'Ms. Shubhangi Rastogi', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('26', '26', 'Ms. Sonam Gupta', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('27', '27', 'Dr. Sunita Yadav', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('28', '28', 'Ms. Swimpy Pahuja', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('29', '29', 'Mr. Vikas Goel', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('30', '30', 'Mr. Vivek Singh Verma', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('31', '31', 'Mr. Vikas Kumar', 'CSE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('32', '32', 'Dr. Swati Agrawal', 'AS&H', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('33', '33', 'Dr. Sangmitra', 'AS&H', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('34', '34', 'Ms. Sakshi Mittal', 'ECE', null, null, null, null, null);
INSERT INTO `tt_faculties` VALUES ('35', '35', 'Ms. Sakshi Agarwal', 'ECE', null, null, null, null, null);

-- ----------------------------
-- Table structure for `tt_faculty_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `tt_faculty_subjects`;
CREATE TABLE `tt_faculty_subjects` (
  `user_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_faculty_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `tt_labs`
-- ----------------------------
DROP TABLE IF EXISTS `tt_labs`;
CREATE TABLE `tt_labs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_labs
-- ----------------------------
INSERT INTO `tt_labs` VALUES ('1', 'CSE Lab-1');
INSERT INTO `tt_labs` VALUES ('2', 'CSE Lab-2');
INSERT INTO `tt_labs` VALUES ('3', 'CSE Lab-3');
INSERT INTO `tt_labs` VALUES ('4', 'CSE Lab-4');
INSERT INTO `tt_labs` VALUES ('5', 'CSE Lab-5');
INSERT INTO `tt_labs` VALUES ('6', 'CSE Lab-6');
INSERT INTO `tt_labs` VALUES ('7', 'CSE Lab-7');
INSERT INTO `tt_labs` VALUES ('8', 'CSE Project Lab');

-- ----------------------------
-- Table structure for `tt_slots`
-- ----------------------------
DROP TABLE IF EXISTS `tt_slots`;
CREATE TABLE `tt_slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_slots
-- ----------------------------
INSERT INTO `tt_slots` VALUES ('1', '08:30:00', '09:20:00');
INSERT INTO `tt_slots` VALUES ('2', '09:20:00', '10:10:00');
INSERT INTO `tt_slots` VALUES ('3', '10:10:00', '11:00:00');
INSERT INTO `tt_slots` VALUES ('4', '11:00:00', '11:50:00');
INSERT INTO `tt_slots` VALUES ('5', '11:50:00', '12:40:00');
INSERT INTO `tt_slots` VALUES ('6', '12:40:00', '13:30:00');
INSERT INTO `tt_slots` VALUES ('7', '13:30:00', '14:20:00');
INSERT INTO `tt_slots` VALUES ('8', '14:20:00', '15:10:00');
INSERT INTO `tt_slots` VALUES ('9', '15:10:00', '16:00:00');

-- ----------------------------
-- Table structure for `tt_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `tt_subjects`;
CREATE TABLE `tt_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `tt_timetables`
-- ----------------------------
DROP TABLE IF EXISTS `tt_timetables`;
CREATE TABLE `tt_timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(255) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `class_type` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_id2` int(11) DEFAULT NULL,
  `subject_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_timetables
-- ----------------------------
INSERT INTO `tt_timetables` VALUES ('1', 'monday', '1', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('2', 'monday', '2', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('3', 'tuesday', '1', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('4', 'tuesday', '2', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('5', 'wednesday', '1', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('6', 'wednesday', '2', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('7', 'tuesday', '8', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('8', 'tuesday', '9', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('9', 'wednesday', '8', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('10', 'wednesday', '9', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('11', 'thursday', '8', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('12', 'thursday', '9', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables` VALUES ('13', 'monday', '1', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('14', 'monday', '2', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('15', 'tuesday', '1', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('16', 'tuesday', '2', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('17', 'wednesday', '1', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('18', 'wednesday', '2', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('19', 'tuesday', '8', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('20', 'tuesday', '9', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('21', 'wednesday', '8', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('22', 'wednesday', '9', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('23', 'thursday', '8', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('24', 'thursday', '9', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables` VALUES ('25', 'monday', '4', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('26', 'monday', '5', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('27', 'monday', '6', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('28', 'tuesday', '4', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('29', 'tuesday', '5', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('30', 'tuesday', '6', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('31', 'wednesday', '4', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('32', 'wednesday', '5', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('33', 'wednesday', '6', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('34', 'thursday', '4', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('35', 'thursday', '5', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('36', 'thursday', '6', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('37', 'friday', '4', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('38', 'friday', '5', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('39', 'friday', '6', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('40', 'friday', '1', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('41', 'friday', '2', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `tt_timetables` VALUES ('42', 'friday', '3', '0', '5', 'B', '2', '24', '21', 'NCS652');

-- ----------------------------
-- Table structure for `tt_users`
-- ----------------------------
DROP TABLE IF EXISTS `tt_users`;
CREATE TABLE `tt_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tt_users
-- ----------------------------
INSERT INTO `tt_users` VALUES ('1', 'Mr. Ajay Kumar', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('2', 'Mr. Akhilesh Verma', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('3', 'Mr. Anuj Kumar Dwivedi', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('4', 'Mr. Arun Kumar Yadav', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('5', 'Prof. B.M. Kalra', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('6', 'Mr. B.N. Pandey', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('7', 'Ms. Charu Agrawal', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('8', 'Ms. Deepti Singh', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('9', 'Mr. Deepak Rai', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('10', 'Mr. Dharmendra Kumar', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('11', 'Dr. Inderjeet Kaur', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('12', 'Ms. Kirti Seth', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('13', 'Ms. Komal Juneja', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('14', 'Dr. Mamta Bhusry', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('15', 'Ms. Neeti Pahuja', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('16', 'Ms. Nishu Bansal', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('17', 'Ms. Prachi Maheshwari', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('18', 'Dr. Pratima Singh', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('19', 'Ms. Priyanka Sethi', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('20', 'Mr. Rajeev Singh', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('21', 'Ms. Reema Aswani', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('22', 'Dr. Sachin Kumar', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('23', 'Mr. Shashank Sahu', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('24', 'Ms. Shiva Tyagi', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('25', 'Ms. Shubhangi Rastogi', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('26', 'Ms. Sonam Gupta', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('27', 'Dr. Sunita Yadav', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('28', 'Ms. Swimpy Pahuja', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('29', 'Mr. Vikas Goel', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('30', 'Mr. Vivek Singh Verma', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('31', 'Mr. Vikas Kumar', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('32', 'Dr. Swati Agrawal', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('33', 'Dr. Sangmitra', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('34', 'Ms. Sakshi Mittal', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('35', 'Ms. Sakshi Agarwal', '', '', '', '1');
INSERT INTO `tt_users` VALUES ('36', 'Admin', '', '', '', '0');
