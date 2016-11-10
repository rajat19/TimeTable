/*
Navicat MySQL Data Transfer

Source Server         : phpserver
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : timetable

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-11-10 16:04:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `attendance`
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `faculty_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `day` varchar(255) NOT NULL,
  PRIMARY KEY (`faculty_id`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of attendance
-- ----------------------------
INSERT INTO `attendance` VALUES ('1', '2016-10-11', '13:47:44', 'tuesday');
INSERT INTO `attendance` VALUES ('1', '2016-10-29', '02:21:51', 'saturday');
INSERT INTO `attendance` VALUES ('2', '2016-10-29', '02:27:17', 'saturday');
INSERT INTO `attendance` VALUES ('3', '2016-10-29', '01:18:44', 'saturday');
INSERT INTO `attendance` VALUES ('4', '2016-10-11', '14:08:32', 'tuesday');
INSERT INTO `attendance` VALUES ('4', '2016-10-21', '15:46:44', 'friday');
INSERT INTO `attendance` VALUES ('4', '2016-10-29', '02:22:01', 'saturday');
INSERT INTO `attendance` VALUES ('5', '2016-10-29', '02:22:09', 'saturday');
INSERT INTO `attendance` VALUES ('6', '2016-10-11', '13:47:56', 'tuesday');
INSERT INTO `attendance` VALUES ('7', '2016-10-29', '02:27:23', 'saturday');
INSERT INTO `attendance` VALUES ('8', '2016-10-11', '13:48:03', 'tuesday');
INSERT INTO `attendance` VALUES ('8', '2016-10-29', '02:22:14', 'saturday');
INSERT INTO `attendance` VALUES ('9', '2016-10-11', '14:06:37', 'tuesday');
INSERT INTO `attendance` VALUES ('9', '2016-10-21', '15:46:56', 'friday');
INSERT INTO `attendance` VALUES ('9', '2016-10-29', '02:27:26', 'saturday');
INSERT INTO `attendance` VALUES ('12', '2016-10-11', '14:08:49', 'tuesday');
INSERT INTO `attendance` VALUES ('12', '2016-10-29', '02:27:29', 'saturday');
INSERT INTO `attendance` VALUES ('15', '2016-10-29', '02:27:32', 'saturday');
INSERT INTO `attendance` VALUES ('19', '2016-10-11', '14:11:31', 'tuesday');

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
  `faculty_id2` int(11) DEFAULT NULL,
  `subject_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of timetables
-- ----------------------------
INSERT INTO `timetables` VALUES ('1', 'monday', '1', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('2', 'monday', '2', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('3', 'tuesday', '1', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('4', 'tuesday', '2', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('5', 'wednesday', '1', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('6', 'wednesday', '2', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('7', 'tuesday', '8', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('8', 'tuesday', '9', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('9', 'wednesday', '8', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('10', 'wednesday', '9', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('11', 'thursday', '8', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('12', 'thursday', '9', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetables` VALUES ('13', 'monday', '1', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('14', 'monday', '2', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('15', 'tuesday', '1', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('16', 'tuesday', '2', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('17', 'wednesday', '1', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `timetables` VALUES ('18', 'wednesday', '2', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `timetables` VALUES ('19', 'tuesday', '8', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `timetables` VALUES ('20', 'tuesday', '9', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `timetables` VALUES ('21', 'wednesday', '8', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('22', 'wednesday', '9', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('23', 'thursday', '8', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('24', 'thursday', '9', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetables` VALUES ('25', 'monday', '4', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `timetables` VALUES ('26', 'monday', '5', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `timetables` VALUES ('27', 'monday', '6', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `timetables` VALUES ('28', 'tuesday', '4', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `timetables` VALUES ('29', 'tuesday', '5', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `timetables` VALUES ('30', 'tuesday', '6', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `timetables` VALUES ('31', 'wednesday', '4', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `timetables` VALUES ('32', 'wednesday', '5', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `timetables` VALUES ('33', 'wednesday', '6', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `timetables` VALUES ('34', 'thursday', '4', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `timetables` VALUES ('35', 'thursday', '5', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `timetables` VALUES ('36', 'thursday', '6', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `timetables` VALUES ('37', 'friday', '4', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `timetables` VALUES ('38', 'friday', '5', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `timetables` VALUES ('39', 'friday', '6', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `timetables` VALUES ('40', 'friday', '1', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `timetables` VALUES ('41', 'friday', '2', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `timetables` VALUES ('42', 'friday', '3', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `timetables` VALUES ('43', 'monday', '4', '0', '1', 'A', '4', '21', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('44', 'monday', '5', '0', '1', 'A', '4', '21', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('45', 'monday', '6', '0', '1', 'A', '4', '21', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('46', 'tuesday', '4', '0', '1', 'B', '4', '21', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('47', 'tuesday', '5', '0', '1', 'B', '4', '21', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('48', 'tuesday', '6', '0', '1', 'B', '4', '21', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('49', 'wednesday', '4', '0', '2', 'B', '4', '17', '22', 'NCS451');
INSERT INTO `timetables` VALUES ('50', 'wednesday', '5', '0', '2', 'B', '4', '17', '22', 'NCS451');
INSERT INTO `timetables` VALUES ('51', 'wednesday', '6', '0', '2', 'B', '4', '17', '22', 'NCS451');
INSERT INTO `timetables` VALUES ('52', 'thursday', '4', '0', '3', 'A', '4', '24', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('53', 'thursday', '5', '0', '3', 'A', '4', '24', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('54', 'thursday', '6', '0', '3', 'A', '4', '24', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('55', 'friday', '4', '0', '3', 'B', '4', '24', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('56', 'friday', '5', '0', '3', 'B', '4', '24', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('57', 'friday', '6', '0', '3', 'B', '4', '24', '29', 'NCS451');
INSERT INTO `timetables` VALUES ('58', 'friday', '1', '0', '2', 'A', '4', '17', '22', 'NCS451');
INSERT INTO `timetables` VALUES ('59', 'friday', '2', '0', '2', 'A', '4', '17', '22', 'NCS451');
INSERT INTO `timetables` VALUES ('60', 'friday', '3', '0', '2', 'A', '4', '17', '22', 'NCS451');
INSERT INTO `timetables` VALUES ('61', 'monday', '3', '0', '7', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `timetables` VALUES ('62', 'monday', '4', '0', '7', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `timetables` VALUES ('63', 'tuesday', '3', '0', '7', 'B', '5', '26', '11', 'ECS851');
INSERT INTO `timetables` VALUES ('64', 'tuesday', '4', '0', '7', 'B', '5', '26', '11', 'ECS851');
INSERT INTO `timetables` VALUES ('65', 'wednesday', '3', '0', '8', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `timetables` VALUES ('66', 'wednesday', '4', '0', '8', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `timetables` VALUES ('67', 'thursday', '1', '0', '8', 'B', '5', '26', '27', 'ECS851');
INSERT INTO `timetables` VALUES ('68', 'thursday', '2', '0', '8', 'B', '5', '26', '27', 'ECS851');
INSERT INTO `timetables` VALUES ('69', 'monday', '1', '0', '6', 'A', '6', '12', '15', 'NCS653');
INSERT INTO `timetables` VALUES ('70', 'monday', '2', '0', '6', 'A', '6', '12', '15', 'NCS653');
INSERT INTO `timetables` VALUES ('71', 'tuesday', '1', '0', '6', 'B', '6', '12', '15', 'NCS653');
INSERT INTO `timetables` VALUES ('72', 'tuesday', '2', '0', '6', 'B', '6', '12', '15', 'NCS653');
INSERT INTO `timetables` VALUES ('73', 'wednesday', '1', '0', '4', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('74', 'wednesday', '2', '0', '4', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('75', 'monday', '8', '0', '5', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('76', 'monday', '9', '0', '5', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('77', 'tuesday', '8', '0', '5', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('78', 'tuesday', '9', '0', '5', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('79', 'thursday', '8', '0', '4', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('80', 'thursday', '9', '0', '4', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `timetables` VALUES ('81', 'monday', '4', '0', '4', 'B', '6', '15', '10', 'NCS651');
INSERT INTO `timetables` VALUES ('82', 'monday', '5', '0', '4', 'B', '6', '15', '10', 'NCS651');
INSERT INTO `timetables` VALUES ('83', 'monday', '6', '0', '4', 'B', '6', '15', '10', 'NCS651');
INSERT INTO `timetables` VALUES ('84', 'tuesday', '4', '0', '4', 'A', '6', '15', '10', 'NCS651');
INSERT INTO `timetables` VALUES ('85', 'tuesday', '5', '0', '4', 'A', '6', '15', '10', 'NCS651');
INSERT INTO `timetables` VALUES ('86', 'tuesday', '6', '0', '4', 'A', '6', '15', '10', 'NCS651');
INSERT INTO `timetables` VALUES ('87', 'wednesday', '4', '0', '5', 'B', '6', '4', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('88', 'wednesday', '5', '0', '5', 'B', '6', '4', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('89', 'wednesday', '6', '0', '5', 'B', '6', '4', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('90', 'thursday', '4', '0', '6', 'A', '6', '17', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('91', 'thursday', '5', '0', '6', 'A', '6', '17', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('92', 'thursday', '6', '0', '6', 'A', '6', '17', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('93', 'friday', '4', '0', '6', 'B', '6', '15', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('94', 'friday', '5', '0', '6', 'B', '6', '15', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('95', 'friday', '6', '0', '6', 'B', '6', '15', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('96', 'friday', '1', '0', '5', 'A', '6', '4', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('97', 'friday', '2', '0', '5', 'A', '6', '4', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('98', 'friday', '3', '0', '5', 'A', '6', '4', '9', 'NCS651');
INSERT INTO `timetables` VALUES ('99', 'monday', '1', '1', '1', null, null, '23', null, 'AUC001');
INSERT INTO `timetables` VALUES ('100', 'monday', '1', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('101', 'monday', '2', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('102', 'monday', '8', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `timetables` VALUES ('103', 'monday', '9', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('104', 'tuesday', '1', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `timetables` VALUES ('105', 'tuesday', '2', '1', '4', null, null, '32', null, 'NHU601');
INSERT INTO `timetables` VALUES ('106', 'tuesday', '3', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('107', 'tuesday', '9', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `timetables` VALUES ('108', 'tuesday', '8', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('109', 'wednesday', '3', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `timetables` VALUES ('110', 'wednesday', '4', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `timetables` VALUES ('111', 'wednesday', '5', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('112', 'wednesday', '6', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `timetables` VALUES ('113', 'wednesday', '8', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('114', 'wednesday', '9', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('115', 'thursday', '1', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `timetables` VALUES ('116', 'thursday', '2', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `timetables` VALUES ('117', 'thursday', '4', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('118', 'thursday', '5', '1', '4', null, null, '32', null, 'NHU601');
INSERT INTO `timetables` VALUES ('119', 'thursday', '6', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('120', 'friday', '6', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('121', 'friday', '1', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `timetables` VALUES ('122', 'friday', '2', '1', '4', null, null, '32', null, 'NHU601');
INSERT INTO `timetables` VALUES ('123', 'friday', '3', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('124', 'friday', '4', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `timetables` VALUES ('125', 'friday', '5', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('126', 'monday', '1', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('127', 'monday', '2', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `timetables` VALUES ('128', 'monday', '3', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `timetables` VALUES ('129', 'monday', '4', '1', '5', null, null, '17', null, 'NCS069');
INSERT INTO `timetables` VALUES ('130', 'monday', '5', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `timetables` VALUES ('131', 'tuesday', '5', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `timetables` VALUES ('132', 'monday', '6', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `timetables` VALUES ('133', 'tuesday', '4', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `timetables` VALUES ('134', 'tuesday', '6', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('135', 'wednesday', '9', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('136', 'wednesday', '8', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `timetables` VALUES ('137', 'wednesday', '1', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `timetables` VALUES ('138', 'wednesday', '2', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `timetables` VALUES ('139', 'wednesday', '3', '1', '5', null, null, '32', null, 'NHU601');
INSERT INTO `timetables` VALUES ('140', 'thursday', '1', '1', '5', null, null, '32', null, 'NHU601');
INSERT INTO `timetables` VALUES ('141', 'thursday', '2', '1', '5', null, null, '17', null, 'NCS069');
INSERT INTO `timetables` VALUES ('142', 'thursday', '8', '1', '5', null, null, '17', null, 'NCS069');
INSERT INTO `timetables` VALUES ('143', 'thursday', '3', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `timetables` VALUES ('144', 'thursday', '6', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `timetables` VALUES ('145', 'friday', '5', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `timetables` VALUES ('146', 'thursday', '5', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('147', 'friday', '4', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `timetables` VALUES ('148', 'thursday', '9', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `timetables` VALUES ('149', 'friday', '6', '1', '5', null, null, '32', null, 'NHU601');
INSERT INTO `timetables` VALUES ('150', 'monday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `timetables` VALUES ('151', 'tuesday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `timetables` VALUES ('152', 'wednesday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `timetables` VALUES ('153', 'thursday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `timetables` VALUES ('154', 'friday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `timetables` VALUES ('155', 'friday', '2', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `timetables` VALUES ('156', 'friday', '1', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `timetables` VALUES ('157', 'thursday', '1', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `timetables` VALUES ('158', 'monday', '6', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `timetables` VALUES ('159', 'monday', '4', '1', '6', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('160', 'monday', '5', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `timetables` VALUES ('161', 'monday', '8', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('162', 'monday', '9', '1', '6', null, null, '33', null, 'NHU601');
INSERT INTO `timetables` VALUES ('163', 'tuesday', '5', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `timetables` VALUES ('164', 'wednesday', '4', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `timetables` VALUES ('165', 'tuesday', '6', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `timetables` VALUES ('166', 'wednesday', '5', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `timetables` VALUES ('167', 'thursday', '8', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `timetables` VALUES ('168', 'wednesday', '1', '1', '6', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('169', 'thursday', '9', '1', '6', null, null, '14', null, 'NCS069');
INSERT INTO `timetables` VALUES ('170', 'wednesday', '2', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('171', 'thursday', '2', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('172', 'wednesday', '6', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `timetables` VALUES ('173', 'wednesday', '8', '1', '6', null, null, '33', null, 'NHU601');

-- ----------------------------
-- Table structure for `timetablesx`
-- ----------------------------
DROP TABLE IF EXISTS `timetablesx`;
CREATE TABLE `timetablesx` (
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
-- Records of timetablesx
-- ----------------------------
INSERT INTO `timetablesx` VALUES ('1', 'monday', '1', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('2', 'monday', '2', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('3', 'tuesday', '1', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('4', 'tuesday', '2', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('5', 'wednesday', '1', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('6', 'wednesday', '2', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('7', 'tuesday', '8', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('8', 'tuesday', '9', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('9', 'wednesday', '8', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('10', 'wednesday', '9', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('11', 'thursday', '8', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('12', 'thursday', '9', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `timetablesx` VALUES ('13', 'monday', '1', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('14', 'monday', '2', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('15', 'tuesday', '1', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('16', 'tuesday', '2', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('17', 'wednesday', '1', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `timetablesx` VALUES ('18', 'wednesday', '2', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `timetablesx` VALUES ('19', 'tuesday', '8', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `timetablesx` VALUES ('20', 'tuesday', '9', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `timetablesx` VALUES ('21', 'wednesday', '8', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('22', 'wednesday', '9', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('23', 'thursday', '8', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('24', 'thursday', '9', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `timetablesx` VALUES ('25', 'monday', '4', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `timetablesx` VALUES ('26', 'monday', '5', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `timetablesx` VALUES ('27', 'monday', '6', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `timetablesx` VALUES ('28', 'tuesday', '4', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `timetablesx` VALUES ('29', 'tuesday', '5', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `timetablesx` VALUES ('30', 'tuesday', '6', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `timetablesx` VALUES ('31', 'wednesday', '4', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `timetablesx` VALUES ('32', 'wednesday', '5', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `timetablesx` VALUES ('33', 'wednesday', '6', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `timetablesx` VALUES ('34', 'thursday', '4', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `timetablesx` VALUES ('35', 'thursday', '5', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `timetablesx` VALUES ('36', 'thursday', '6', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `timetablesx` VALUES ('37', 'friday', '4', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `timetablesx` VALUES ('38', 'friday', '5', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `timetablesx` VALUES ('39', 'friday', '6', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `timetablesx` VALUES ('40', 'friday', '1', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `timetablesx` VALUES ('41', 'friday', '2', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `timetablesx` VALUES ('42', 'friday', '3', '0', '5', 'B', '2', '24', '21', 'NCS652');

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
