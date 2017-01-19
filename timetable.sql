/*
Navicat MySQL Data Transfer

Source Server         : phpserver
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : timetable

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-01-19 14:41:36
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
INSERT INTO `attendance` VALUES ('1', '2017-01-07', '17:11:35', 'saturday');
INSERT INTO `attendance` VALUES ('1', '2017-01-17', '22:28:04', 'tuesday');
INSERT INTO `attendance` VALUES ('2', '2016-10-29', '02:27:17', 'saturday');
INSERT INTO `attendance` VALUES ('2', '2016-11-26', '11:32:58', 'saturday');
INSERT INTO `attendance` VALUES ('2', '2016-12-09', '22:39:17', 'friday');
INSERT INTO `attendance` VALUES ('2', '2017-01-17', '22:26:29', 'tuesday');
INSERT INTO `attendance` VALUES ('3', '2016-10-29', '01:18:44', 'saturday');
INSERT INTO `attendance` VALUES ('3', '2017-01-17', '22:26:53', 'tuesday');
INSERT INTO `attendance` VALUES ('4', '2016-10-11', '14:08:32', 'tuesday');
INSERT INTO `attendance` VALUES ('4', '2016-10-21', '15:46:44', 'friday');
INSERT INTO `attendance` VALUES ('4', '2016-10-29', '02:22:01', 'saturday');
INSERT INTO `attendance` VALUES ('4', '2016-12-26', '22:06:19', 'monday');
INSERT INTO `attendance` VALUES ('4', '2017-01-07', '17:11:40', 'saturday');
INSERT INTO `attendance` VALUES ('4', '2017-01-14', '16:54:55', 'saturday');
INSERT INTO `attendance` VALUES ('4', '2017-01-17', '22:27:53', 'tuesday');
INSERT INTO `attendance` VALUES ('5', '2016-10-29', '02:22:09', 'saturday');
INSERT INTO `attendance` VALUES ('5', '2017-01-17', '22:29:14', 'tuesday');
INSERT INTO `attendance` VALUES ('6', '2016-10-11', '13:47:56', 'tuesday');
INSERT INTO `attendance` VALUES ('6', '2016-12-09', '22:39:23', 'friday');
INSERT INTO `attendance` VALUES ('6', '2017-01-03', '02:32:40', 'tuesday');
INSERT INTO `attendance` VALUES ('6', '2017-01-06', '20:32:54', 'friday');
INSERT INTO `attendance` VALUES ('6', '2017-01-07', '17:31:37', 'saturday');
INSERT INTO `attendance` VALUES ('6', '2017-01-17', '22:29:33', 'tuesday');
INSERT INTO `attendance` VALUES ('7', '2016-10-29', '02:27:23', 'saturday');
INSERT INTO `attendance` VALUES ('8', '2016-10-11', '13:48:03', 'tuesday');
INSERT INTO `attendance` VALUES ('8', '2016-10-29', '02:22:14', 'saturday');
INSERT INTO `attendance` VALUES ('9', '2016-10-11', '14:06:37', 'tuesday');
INSERT INTO `attendance` VALUES ('9', '2016-10-21', '15:46:56', 'friday');
INSERT INTO `attendance` VALUES ('9', '2016-10-29', '02:27:26', 'saturday');
INSERT INTO `attendance` VALUES ('9', '2017-01-17', '23:20:25', 'tuesday');
INSERT INTO `attendance` VALUES ('11', '2017-01-07', '17:11:45', 'saturday');
INSERT INTO `attendance` VALUES ('11', '2017-01-17', '22:30:49', 'tuesday');
INSERT INTO `attendance` VALUES ('12', '2016-10-11', '14:08:49', 'tuesday');
INSERT INTO `attendance` VALUES ('12', '2016-10-29', '02:27:29', 'saturday');
INSERT INTO `attendance` VALUES ('15', '2016-10-29', '02:27:32', 'saturday');
INSERT INTO `attendance` VALUES ('15', '2017-01-17', '22:32:11', 'tuesday');
INSERT INTO `attendance` VALUES ('19', '2016-10-11', '14:11:31', 'tuesday');
INSERT INTO `attendance` VALUES ('24', '2017-01-06', '22:42:41', 'friday');
INSERT INTO `attendance` VALUES ('24', '2017-01-07', '18:07:57', 'saturday');
INSERT INTO `attendance` VALUES ('25', '2017-01-17', '22:32:01', 'tuesday');
INSERT INTO `attendance` VALUES ('28', '2017-01-17', '22:32:06', 'tuesday');
INSERT INTO `attendance` VALUES ('36', '2017-01-03', '01:19:39', 'tuesday');

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
  `location` varchar(255) DEFAULT NULL,
  `cr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES ('1', 'CSE', '2', '4', 'CS-1', 'LT-7', null);
INSERT INTO `classes` VALUES ('2', 'CSE', '2', '4', 'CS-2', 'LT-8', null);
INSERT INTO `classes` VALUES ('3', 'CSE', '2', '4', 'CS-3', 'LT-9', null);
INSERT INTO `classes` VALUES ('4', 'CSE', '3', '6', 'CS-1', 'LT-10', null);
INSERT INTO `classes` VALUES ('5', 'CSE', '3', '6', 'CS-2', 'LT-11', null);
INSERT INTO `classes` VALUES ('6', 'CSE', '3', '6', 'CS-3', 'LT-12', null);
INSERT INTO `classes` VALUES ('7', 'CSE', '4', '8', 'CS-1', 'LT-13', '38');
INSERT INTO `classes` VALUES ('8', 'CSE', '4', '8', 'CS-2', 'LT-14', '37');
INSERT INTO `classes` VALUES ('9', 'CSE', '4', '8', 'CS-3', 'LT-15', null);

-- ----------------------------
-- Table structure for `departments`
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', 'ASH', 'Applied Science & Humanities');
INSERT INTO `departments` VALUES ('2', 'CE', 'Civil Engineering');
INSERT INTO `departments` VALUES ('3', 'CSE', 'Computer Science Engineering');
INSERT INTO `departments` VALUES ('4', 'EN', 'Electrical & Electronics Engineering');
INSERT INTO `departments` VALUES ('5', 'ECE', 'Electronics & Communications Engineering');
INSERT INTO `departments` VALUES ('6', 'IT', 'Information Technology');
INSERT INTO `departments` VALUES ('7', 'ME', 'Mechanical Engineering');

-- ----------------------------
-- Table structure for `designations`
-- ----------------------------
DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of designations
-- ----------------------------
INSERT INTO `designations` VALUES ('1', 'Director', '1');
INSERT INTO `designations` VALUES ('2', 'Head of Department', '2');
INSERT INTO `designations` VALUES ('3', 'Professor', '3');
INSERT INTO `designations` VALUES ('4', 'Associate Professor', '4');

-- ----------------------------
-- Table structure for `faculties`
-- ----------------------------
DROP TABLE IF EXISTS `faculties`;
CREATE TABLE `faculties` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation_id` int(1) NOT NULL DEFAULT '4',
  `priority` int(1) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculties
-- ----------------------------
INSERT INTO `faculties` VALUES ('1', '1', 'Mr.', 'Ajay Kumar', 'CSE', '4', '8');
INSERT INTO `faculties` VALUES ('2', '2', 'Mr.', 'Akhilesh Verma', 'CSE', '4', '7');
INSERT INTO `faculties` VALUES ('3', '3', 'Mr.', 'Anuj Kumar Dwivedi', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('4', '4', 'Mr.', 'Arun Kumar Yadav', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('5', '5', 'Prof.', 'Brij Mohan Kalra', 'CSE', '2', '1');
INSERT INTO `faculties` VALUES ('6', '6', 'Mr.', 'Bihari Nath Pandey', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('7', '7', 'Ms.', 'Charu Agrawal', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('8', '8', 'Ms.', 'Deepti Singh', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('9', '9', 'Mr.', 'Deepak Rai', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('10', '10', 'Mr.', 'Dharmendra Kumar', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('11', '11', 'Dr.', 'Inderjeet Kaur', 'CSE', '4', '6');
INSERT INTO `faculties` VALUES ('12', '12', 'Ms.', 'Kirti Seth', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('13', '13', 'Ms.', 'Komal Juneja', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('14', '14', 'Dr.', 'Mamta Bhusry', 'CSE', '3', '4');
INSERT INTO `faculties` VALUES ('15', '15', 'Ms.', 'Neeti Pahuja', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('16', '16', 'Ms.', 'Nishu Bansal', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('17', '17', 'Ms.', 'Prachi Maheshwari', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('18', '18', 'Dr.', 'Pratima Singh', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('19', '19', 'Ms.', 'Priyanka Sethi', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('20', '20', 'Mr.', 'Rajeev Singh', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('21', '21', 'Ms.', 'Reema Aswani', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('22', '22', 'Dr.', 'Sachin Kumar', 'CSE', '3', '2');
INSERT INTO `faculties` VALUES ('23', '23', 'Mr.', 'Shashank Sahu', 'CSE', '4', '5');
INSERT INTO `faculties` VALUES ('24', '24', 'Ms.', 'Shiva Tyagi', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('25', '25', 'Ms.', 'Shubhangi Rastogi', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('26', '26', 'Ms.', 'Sonam Gupta', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('27', '27', 'Dr.', 'Sunita Yadav', 'CSE', '3', '3');
INSERT INTO `faculties` VALUES ('28', '28', 'Ms.', 'Swimpy Pahuja', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('29', '29', 'Mr.', 'Vikas Goel', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('30', '30', 'Mr.', 'Vivek Singh Verma', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('31', '31', 'Mr.', 'Vikas Kumar', 'CSE', '4', '10');
INSERT INTO `faculties` VALUES ('32', '32', 'Dr.', 'Swati Agrawal', 'ASH', '4', '10');
INSERT INTO `faculties` VALUES ('33', '33', 'Dr.', 'Sangmitra', 'ASH', '4', '10');
INSERT INTO `faculties` VALUES ('34', '34', 'Ms.', 'Sakshi Mittal', 'ECE', '4', '10');
INSERT INTO `faculties` VALUES ('35', '35', 'Ms.', 'Sakshi Agarwal', 'ECE', '4', '10');

-- ----------------------------
-- Table structure for `faculty_leave`
-- ----------------------------
DROP TABLE IF EXISTS `faculty_leave`;
CREATE TABLE `faculty_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `leave_date` date DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `grant_date` date DEFAULT NULL,
  `granted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculty_leave
-- ----------------------------
INSERT INTO `faculty_leave` VALUES ('1', '2', '2016-12-13', '2016-12-10', '2016-12-10', '1');
INSERT INTO `faculty_leave` VALUES ('2', '4', '2016-12-29', '2016-12-10', '2016-12-10', '2');
INSERT INTO `faculty_leave` VALUES ('3', '6', '2016-12-29', '2016-12-10', '2016-12-10', '1');
INSERT INTO `faculty_leave` VALUES ('4', '7', '2017-01-01', '2016-12-10', '2016-12-10', '2');
INSERT INTO `faculty_leave` VALUES ('5', '1', '2016-12-15', '2016-12-10', '2016-12-10', '1');
INSERT INTO `faculty_leave` VALUES ('6', '5', '2016-12-15', '2016-12-10', '2016-12-10', '1');
INSERT INTO `faculty_leave` VALUES ('7', '4', '2016-12-30', '2016-12-25', '2016-12-25', '0');
INSERT INTO `faculty_leave` VALUES ('8', '1', '2017-01-03', '2017-01-01', '2017-01-02', '1');
INSERT INTO `faculty_leave` VALUES ('11', '6', '2017-01-09', '2017-01-03', '2017-01-06', '1');
INSERT INTO `faculty_leave` VALUES ('12', '4', '2017-01-11', '2017-01-07', null, '0');
INSERT INTO `faculty_leave` VALUES ('13', '4', '2017-01-19', '2017-01-14', '2017-01-14', '1');

-- ----------------------------
-- Table structure for `faculty_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `faculty_subjects`;
CREATE TABLE `faculty_subjects` (
  `faculty_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculty_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `ip_track`
-- ----------------------------
DROP TABLE IF EXISTS `ip_track`;
CREATE TABLE `ip_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `last_visit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ip_track
-- ----------------------------
INSERT INTO `ip_track` VALUES ('1', '127.0.0.1', '2017-01-03 11:32:54');

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
-- Table structure for `notifications`
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_type` int(11) NOT NULL,
  `usertype` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notified_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('1', '1', '0', '36', '1', '2017-01-01', '23:43:42', 'Mr. Ajay Kumar$$2017-01-03', '0');
INSERT INTO `notifications` VALUES ('3', '6', '1', '1', '36', '2017-01-02', '13:40:17', '1$$2017-01-03', '0');
INSERT INTO `notifications` VALUES ('9', '1', '0', '36', '6', '2017-01-03', '11:27:28', 'Mr. Bihari Nath Pandey$$2017-01-09', '0');
INSERT INTO `notifications` VALUES ('10', '6', '1', '6', '36', '2017-01-06', '21:01:21', '1$$2017-01-09', '0');
INSERT INTO `notifications` VALUES ('11', '5', '1', '24', '36', '2017-01-06', '22:32:31', 'CSE 3rd year CS-2 in LT-11$$08:30:00 to 09:20:00$$2017-01-09$$Mr. Bihari Nath Pandey', '0');
INSERT INTO `notifications` VALUES ('12', '5', '1', '13', '36', '2017-01-06', '22:37:26', 'CSE 3rd year CS-2 in CSE Lab-6$$14:20:00 to 15:10:00$$2017-01-09$$Mr. Bihari Nath Pandey', '0');
INSERT INTO `notifications` VALUES ('13', '5', '1', '6', '36', '2017-01-06', '23:42:47', 'CSE 3rd year CS-2 in CSE Lab-6$$09:20 AM to 10:10 AM$$2017-01-06$$Mr. Deepak Rai', '0');
INSERT INTO `notifications` VALUES ('14', '1', '0', '36', '4', '2017-01-07', '17:45:17', 'Mr. Arun Kumar Yadav$$2017-01-11', '0');
INSERT INTO `notifications` VALUES ('15', '1', '0', '36', '4', '2017-01-14', '16:54:15', 'Mr. Arun Kumar Yadav$$2017-01-19', '0');
INSERT INTO `notifications` VALUES ('16', '6', '1', '4', '36', '2017-01-14', '16:58:32', '1$$2017-01-19', '0');
INSERT INTO `notifications` VALUES ('17', '5', '1', '24', '36', '2017-01-16', '18:57:30', 'CSE 3rd year CS-2 in LT-11$$08:30 AM to 09:20 AM$$2017-01-16$$Mr. Bihari Nath Pandey', '0');
INSERT INTO `notifications` VALUES ('18', '5', '1', '25', '36', '2017-01-16', '19:15:05', 'CSE 3rd year CS-3 in LT-12$$10:10 AM to 11:00 AM$$2017-01-16$$Prof. Brij Mohan Kalra', '0');
INSERT INTO `notifications` VALUES ('32', '2', '0', '36', '0', '2017-01-17', '23:46:53', '24', '0');
INSERT INTO `notifications` VALUES ('33', '5', '1', '4', '36', '2017-01-17', '22:37:09', 'CSE 4th year CS-1 in CSE Lab-5$$08:30 AM to 09:20 AM$$2017-01-17$$Ms. Sonam Gupta', '0');
INSERT INTO `notifications` VALUES ('35', '4', '0', '36', '26', '2017-01-17', '23:19:14', 'Mr. Arun Kumar Yadav$$1$$CSE 4th year CS-1 in CSE Lab-5$$08:30:00 to 09:20:00$$Ms. Sonam Gupta', '0');
INSERT INTO `notifications` VALUES ('36', '2', '0', '36', '0', '2017-01-18', '00:41:20', '35', '0');

-- ----------------------------
-- Table structure for `notification_type`
-- ----------------------------
DROP TABLE IF EXISTS `notification_type`;
CREATE TABLE `notification_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_id` int(11) NOT NULL,
  `meaning` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notification_type
-- ----------------------------
INSERT INTO `notification_type` VALUES ('1', '1', 'Faculty requesting leave', '_FACULTY requested a leave for _DATE');
INSERT INTO `notification_type` VALUES ('2', '2', 'Attendance not marked still', 'Some faculties have still not marked their attendance.');
INSERT INTO `notification_type` VALUES ('3', '3', 'Faculty not reaching class', '_FACULTY had still not reached class _CLASS');
INSERT INTO `notification_type` VALUES ('4', '4', 'Accept/Reject Substitution', '_REPLACEMENT had (accepted/rejected) substitution given for _CLASS _TIME _FACULTY');
INSERT INTO `notification_type` VALUES ('5', '5', 'Substitutions assigned to faculties', 'You have been assigned a substitution for _CLASS during _TIME in replacement to _FACULTY');
INSERT INTO `notification_type` VALUES ('6', '6', 'Status of their leave', 'Your leave had been (granted/rejected) for date _DATE');
INSERT INTO `notification_type` VALUES ('7', '7', 'Substitution assigned in the class', '_FACULTY had been substitued with _REPLACEMENT for duration_TIME');

-- ----------------------------
-- Table structure for `phpjobscheduler`
-- ----------------------------
DROP TABLE IF EXISTS `phpjobscheduler`;
CREATE TABLE `phpjobscheduler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scriptpath` varchar(255) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `time_interval` int(11) DEFAULT NULL,
  `fire_time` int(11) NOT NULL DEFAULT '0',
  `time_last_fired` int(11) DEFAULT NULL,
  `run_only_once` tinyint(1) NOT NULL DEFAULT '0',
  `currently_running` tinyint(1) NOT NULL DEFAULT '0',
  `paused` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fire_time` (`fire_time`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of phpjobscheduler
-- ----------------------------
INSERT INTO `phpjobscheduler` VALUES ('5', 'http://localhost/TimeTable/runner.php', 'Count Absent', '2400', '1484686280', '1484683880', '0', '0', '0');

-- ----------------------------
-- Table structure for `phpjobscheduler_logs`
-- ----------------------------
DROP TABLE IF EXISTS `phpjobscheduler_logs`;
CREATE TABLE `phpjobscheduler_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` int(11) DEFAULT NULL,
  `script` varchar(128) DEFAULT NULL,
  `output` text,
  `execution_time` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of phpjobscheduler_logs
-- ----------------------------
INSERT INTO `phpjobscheduler_logs` VALUES ('1', '1484623036', 'http://localhost/TimeTable/access.php', '', '0.08754 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('2', '1484623278', 'http://localhost/TimeTable/access.php', 'U will be running over and over', '0.01550 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('3', '1484623321', 'http://localhost/TimeTable/access.php', 'U will be running over and over', '0.00168 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('4', '1484623373', 'http://localhost/TimeTable/access.php', 'U will be running over and over', '0.00269 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('5', '1484623434', 'http://localhost/TimeTable/access.php', 'U will be running over and over', '0.00760 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('6', '1484662196', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.11575 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('7', '1484662946', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.00812 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('8', '1484663917', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.01570 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('9', '1484663932', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.00279 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('10', '1484664670', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.12673 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('11', '1484668136', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.00745 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('12', '1484668136', 'http://localhost/TimeTable/phpjs/access.php', '', '0.10761 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('13', '1484670040', 'http://localhost/TimeTable/runner.php', 'U will be running over and over', '0.01602 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('14', '1484670041', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00774 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('15', '1484671697', 'http://localhost/TimeTable/phpjs/access.php', '', '0.01771 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('16', '1484671698', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '0.54755 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('17', '1484671698', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00759 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('18', '1484671698', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '1.40743 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('19', '1484671698', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00694 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('20', '1484671699', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '1.96070 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('21', '1484671699', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00897 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('22', '1484671699', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '2.86542 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('23', '1484671700', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00349 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('24', '1484671700', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '3.50152 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('25', '1484671700', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00759 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('26', '1484671700', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '3.90879 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('27', '1484671700', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00698 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('28', '1484671701', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '4.43155 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('29', '1484671701', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00841 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('30', '1484671701', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '4.89505 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('31', '1484671701', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00766 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('32', '1484671701', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '5.38460 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('33', '1484671701', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00803 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('34', '1484671702', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '6.01008 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('35', '1484671702', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00781 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('36', '1484671702', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '6.69875 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('37', '1484671702', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00703 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('38', '1484671703', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '7.27230 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('39', '1484671703', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00654 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('40', '1484671704', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '8.44749 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('41', '1484671704', 'http://localhost/TimeTable/phpjs/access.php', '', '0.00779 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('42', '1484671916', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '0.07967 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('43', '1484673609', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '0.06571 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('44', '1484677014', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '0.11275 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('45', '1484679671', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '0.08984 seconds via PHP CURL ');
INSERT INTO `phpjobscheduler_logs` VALUES ('46', '1484680280', 'http://localhost/TimeTable/runner.php', '&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n	&lt;title&gt;Time Table Handler&lt;/title&gt;\r\n	&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/fonts.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/materialize.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;fontawe/css/font-awesome.min.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/sweetalert.css&quot;&gt;\r\n	&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/custom.css&quot;&gt;\r\n&lt;/head&gt;\r\n&lt;body&gt;\r\n								&lt;div class=&quot;navbar-fixed&quot;&gt;\r\n				&lt;ul class=&quot;dropdown-content blue-grey darken-3&quot; id=&quot;dropdown_manage&quot;&gt;\r\n			&lt;li&gt;&lt;a href=&quot;mark_attendance.php&quot;&gt;Mark Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;/li&gt;\r\n			&lt;li&gt;&lt;a href=&quot;view_attendance.php&quot;&gt;View Attendance&lt;/a&gt;&lt;/li&gt;\r\n			&lt;li class=&quot;divider&quot;&gt;&lt;', '0.07897 seconds via PHP CURL ');

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
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES ('1', 'NCS401', 'Operating System', '1');
INSERT INTO `subjects` VALUES ('2', 'NCS402', 'Theory of Automata and Formal Languages', '1');
INSERT INTO `subjects` VALUES ('3', 'NCS403', 'Computer Graphics', '1');
INSERT INTO `subjects` VALUES ('4', 'NEC409', 'Introduction to Microprocessor', '1');
INSERT INTO `subjects` VALUES ('5', 'NHU402', 'Industrial Sociology', '1');
INSERT INTO `subjects` VALUES ('6', 'AUC001', 'Human Values and Professional Ethics', '1');
INSERT INTO `subjects` VALUES ('7', 'NCS451', 'Operating System Lab', '0');
INSERT INTO `subjects` VALUES ('8', 'NCS453', 'Computer Graphics Lab', '0');
INSERT INTO `subjects` VALUES ('9', 'NCS455', 'Functional and Logic Programming Lab', '0');
INSERT INTO `subjects` VALUES ('10', 'NEC459', 'Microprocessor Lab', '0');
INSERT INTO `subjects` VALUES ('11', 'NCS601', 'Computer Networks', '1');
INSERT INTO `subjects` VALUES ('12', 'NCS602', 'Software Engineering', '1');
INSERT INTO `subjects` VALUES ('13', 'NCS603', 'Compiler Design', '1');
INSERT INTO `subjects` VALUES ('14', 'NCS069', 'Advance DBMS', '1');
INSERT INTO `subjects` VALUES ('15', 'NCS063', 'Parallel Algorithms', '1');
INSERT INTO `subjects` VALUES ('16', 'NHU601', 'Industrial Management', '1');
INSERT INTO `subjects` VALUES ('17', 'NCS651', 'Computer Networks Lab', '0');
INSERT INTO `subjects` VALUES ('18', 'NCS652', 'Software Engineering Lab', '0');
INSERT INTO `subjects` VALUES ('19', 'NCS653', 'Compiler Design Lab', '0');
INSERT INTO `subjects` VALUES ('20', 'NCS654', 'Seminar', '0');
INSERT INTO `subjects` VALUES ('21', 'ECS801', 'Artificial Intelligence', '1');
INSERT INTO `subjects` VALUES ('22', 'ECS084', 'Cryptography and Network Security', '1');
INSERT INTO `subjects` VALUES ('23', 'ECS087', 'Mobile Computing', '1');
INSERT INTO `subjects` VALUES ('24', 'ECS851', 'Artificial Intelligence Lab', '0');
INSERT INTO `subjects` VALUES ('25', 'ECS852', 'Project', '0');

-- ----------------------------
-- Table structure for `substitutions`
-- ----------------------------
DROP TABLE IF EXISTS `substitutions`;
CREATE TABLE `substitutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `class_type` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `replacement_id` int(11) DEFAULT NULL,
  `accepted` int(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of substitutions
-- ----------------------------
INSERT INTO `substitutions` VALUES ('1', '2016-12-30', 'friday', '1', '4', 'NCS651', '0', '5', '6', '7', '0');
INSERT INTO `substitutions` VALUES ('2', '2016-12-30', 'friday', '4', '6', 'NCS603', '1', '5', '0', '30', '0');
INSERT INTO `substitutions` VALUES ('3', '2016-12-30', 'friday', '5', '6', 'NCS603', '1', '4', '0', '25', '0');
INSERT INTO `substitutions` VALUES ('4', '2017-01-06', 'monday', '5', '11', 'NCS602', '1', '6', '0', '33', '0');
INSERT INTO `substitutions` VALUES ('7', '2017-01-09', 'monday', '1', '6', 'NCS603', '1', '5', '0', '24', '0');
INSERT INTO `substitutions` VALUES ('8', '2017-01-09', 'monday', '8', '6', 'NCS653', '0', '5', '6', '13', '0');
INSERT INTO `substitutions` VALUES ('9', '2017-01-06', 'friday', '2', '9', 'NCS651', '0', '5', '6', '6', '0');
INSERT INTO `substitutions` VALUES ('10', '2017-01-16', 'monday', '1', '6', 'NCS603', '1', '5', '0', '24', '0');
INSERT INTO `substitutions` VALUES ('11', '2017-01-16', 'monday', '3', '5', 'NCS601', '1', '6', '0', '25', '0');
INSERT INTO `substitutions` VALUES ('12', '2017-01-17', 'tuesday', '1', '26', 'ECS851', '0', '7', '5', '4', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=latin1;

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
INSERT INTO `timetables` VALUES ('63', 'tuesday', '1', '0', '7', 'B', '5', '26', '11', 'ECS851');
INSERT INTO `timetables` VALUES ('64', 'tuesday', '2', '0', '7', 'B', '5', '26', '11', 'ECS851');
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
INSERT INTO `timetables` VALUES ('174', 'monday', '1', '1', '7', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('175', 'tuesday', '3', '1', '7', null, null, '4', null, 'ECS087');
INSERT INTO `timetables` VALUES ('176', 'wednesday', '1', '1', '7', null, null, '26', null, 'ECS801');
INSERT INTO `timetables` VALUES ('177', 'wednesday', '2', '1', '7', null, null, '4', null, 'ECS087');
INSERT INTO `timetables` VALUES ('178', 'wednesday', '3', '1', '7', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('179', 'thursday', '1', '1', '7', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('180', 'friday', '3', '1', '7', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('181', 'thursday', '2', '1', '7', null, null, '4', null, 'ECS087');
INSERT INTO `timetables` VALUES ('182', 'thursday', '3', '1', '7', null, null, '4', null, 'ECS087');
INSERT INTO `timetables` VALUES ('183', 'thursday', '4', '1', '7', null, null, '26', null, 'ECS801');
INSERT INTO `timetables` VALUES ('184', 'friday', '2', '1', '7', null, null, '26', null, 'ECS801');
INSERT INTO `timetables` VALUES ('185', 'friday', '1', '1', '7', null, null, '26', null, 'ECS801');
INSERT INTO `timetables` VALUES ('186', 'monday', '1', '1', '8', null, null, '27', null, 'ECS801');
INSERT INTO `timetables` VALUES ('187', 'tuesday', '1', '1', '8', null, null, '27', null, 'ECS801');
INSERT INTO `timetables` VALUES ('188', 'friday', '1', '1', '8', null, null, '27', null, 'ECS801');
INSERT INTO `timetables` VALUES ('189', 'wednesday', '2', '1', '8', null, null, '27', null, 'ECS801');
INSERT INTO `timetables` VALUES ('190', 'monday', '3', '1', '8', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('191', 'tuesday', '2', '1', '8', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('192', 'thursday', '3', '1', '8', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('193', 'friday', '2', '1', '8', null, null, '10', null, 'ECS084');
INSERT INTO `timetables` VALUES ('194', 'monday', '4', '1', '8', null, null, '22', null, 'ECS087');
INSERT INTO `timetables` VALUES ('195', 'thursday', '4', '1', '8', null, null, '22', null, 'ECS087');
INSERT INTO `timetables` VALUES ('196', 'tuesday', '3', '1', '8', null, null, '22', null, 'ECS087');
INSERT INTO `timetables` VALUES ('197', 'wednesday', '1', '1', '8', null, null, '22', null, 'ECS087');
INSERT INTO `timetables` VALUES ('198', 'monday', '2', '1', '1', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('199', 'monday', '8', '1', '1', null, null, '31', null, 'NCS402');
INSERT INTO `timetables` VALUES ('200', 'monday', '9', '1', '1', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('201', 'tuesday', '1', '1', '1', null, null, '32', null, 'NHU402');
INSERT INTO `timetables` VALUES ('202', 'tuesday', '2', '1', '1', null, null, '23', null, 'AUC001');
INSERT INTO `timetables` VALUES ('203', 'tuesday', '8', '1', '1', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('204', 'tuesday', '9', '1', '1', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('205', 'wednesday', '1', '1', '1', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('206', 'wednesday', '2', '1', '1', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('207', 'wednesday', '5', '1', '1', null, null, '31', null, 'NCS402');
INSERT INTO `timetables` VALUES ('208', 'wednesday', '6', '1', '1', null, null, '16', null, 'NCS403');
INSERT INTO `timetables` VALUES ('209', 'thursday', '1', '1', '1', null, null, '16', null, 'NCS403');
INSERT INTO `timetables` VALUES ('210', 'thursday', '2', '1', '1', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('211', 'thursday', '5', '1', '1', null, null, '29', null, 'NCS402');
INSERT INTO `timetables` VALUES ('212', 'thursday', '6', '1', '1', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('213', 'friday', '1', '1', '1', null, null, '16', null, 'NCS403');
INSERT INTO `timetables` VALUES ('214', 'friday', '2', '1', '1', null, null, '31', null, 'NCS402');
INSERT INTO `timetables` VALUES ('215', 'friday', '3', '1', '1', null, null, '32', null, 'NHU402');
INSERT INTO `timetables` VALUES ('216', 'friday', '4', '1', '1', null, null, '31', null, 'NCS402');
INSERT INTO `timetables` VALUES ('217', 'friday', '5', '1', '1', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('218', 'friday', '6', '1', '1', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('219', 'monday', '5', '1', '2', null, null, '35', null, 'NEC409');
INSERT INTO `timetables` VALUES ('220', 'monday', '4', '1', '2', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('221', 'monday', '6', '1', '2', null, null, '16', null, 'NCS403');
INSERT INTO `timetables` VALUES ('222', 'monday', '8', '1', '2', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('223', 'monday', '9', '1', '2', null, null, '32', null, 'NHU402');
INSERT INTO `timetables` VALUES ('224', 'tuesday', '5', '1', '2', null, null, '35', null, 'NEC409');
INSERT INTO `timetables` VALUES ('225', 'tuesday', '6', '1', '2', null, null, '16', null, 'NCS403');
INSERT INTO `timetables` VALUES ('226', 'tuesday', '8', '1', '2', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('227', 'tuesday', '9', '1', '2', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('228', 'wednesday', '1', '1', '2', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('229', 'wednesday', '9', '1', '2', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('230', 'wednesday', '8', '1', '2', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('231', 'wednesday', '2', '1', '2', null, null, '35', null, 'NEC409');
INSERT INTO `timetables` VALUES ('232', 'thursday', '8', '1', '2', null, null, '35', null, 'NEC409');
INSERT INTO `timetables` VALUES ('233', 'thursday', '6', '1', '2', null, null, '32', null, 'NHU402');
INSERT INTO `timetables` VALUES ('234', 'thursday', '5', '1', '2', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('235', 'thursday', '2', '1', '2', null, null, '16', null, 'NCS403');
INSERT INTO `timetables` VALUES ('236', 'thursday', '1', '1', '2', null, null, '30', null, 'AUC001');
INSERT INTO `timetables` VALUES ('237', 'friday', '4', '1', '2', null, null, '30', null, 'AUC001');
INSERT INTO `timetables` VALUES ('238', 'friday', '5', '1', '2', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('239', 'friday', '6', '1', '2', null, null, '21', null, 'NCS401');
INSERT INTO `timetables` VALUES ('240', 'friday', '8', '1', '2', null, null, '35', null, 'NEC409');
INSERT INTO `timetables` VALUES ('241', 'monday', '1', '1', '3', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('242', 'tuesday', '1', '1', '3', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('243', 'monday', '2', '1', '3', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('244', 'monday', '5', '1', '3', null, null, '31', null, 'NCS403');
INSERT INTO `timetables` VALUES ('245', 'monday', '8', '1', '3', null, null, '29', null, 'NCS401');
INSERT INTO `timetables` VALUES ('246', 'tuesday', '2', '1', '3', null, null, '29', null, 'NCS401');
INSERT INTO `timetables` VALUES ('247', 'tuesday', '4', '1', '3', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('248', 'tuesday', '6', '1', '3', null, null, '31', null, 'NCS403');
INSERT INTO `timetables` VALUES ('249', 'wednesday', '5', '1', '3', null, null, '29', null, 'NCS401');
INSERT INTO `timetables` VALUES ('250', 'wednesday', '6', '1', '3', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('251', 'wednesday', '8', '1', '3', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('252', 'wednesday', '9', '1', '3', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('253', 'thursday', '1', '1', '3', null, null, '29', null, 'NCS401');
INSERT INTO `timetables` VALUES ('254', 'thursday', '2', '1', '3', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('255', 'friday', '8', '1', '3', null, null, '34', null, 'NEC409');
INSERT INTO `timetables` VALUES ('256', 'friday', '1', '1', '3', null, null, '31', null, 'NCS403');
INSERT INTO `timetables` VALUES ('257', 'friday', '2', '1', '3', null, null, '1', null, 'NCS402');
INSERT INTO `timetables` VALUES ('258', 'friday', '3', '1', '3', null, null, '29', null, 'NCS401');

-- ----------------------------
-- Table structure for `tt_timetables_copy`
-- ----------------------------
DROP TABLE IF EXISTS `tt_timetables_copy`;
CREATE TABLE `tt_timetables_copy` (
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
-- Records of tt_timetables_copy
-- ----------------------------
INSERT INTO `tt_timetables_copy` VALUES ('1', 'monday', '1', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('2', 'monday', '2', '0', '2', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('3', 'tuesday', '1', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('4', 'tuesday', '2', '0', '2', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('5', 'wednesday', '1', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('6', 'wednesday', '2', '0', '3', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('7', 'tuesday', '8', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('8', 'tuesday', '9', '0', '3', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('9', 'wednesday', '8', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('10', 'wednesday', '9', '0', '1', 'B', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('11', 'thursday', '8', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('12', 'thursday', '9', '0', '1', 'A', '1', '16', '31', 'NCS453');
INSERT INTO `tt_timetables_copy` VALUES ('13', 'monday', '1', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('14', 'monday', '2', '0', '2', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('15', 'tuesday', '1', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('16', 'tuesday', '2', '0', '2', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('17', 'wednesday', '1', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('18', 'wednesday', '2', '0', '3', 'B', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('19', 'tuesday', '8', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('20', 'tuesday', '9', '0', '3', 'A', '2', '7', '10', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('21', 'wednesday', '8', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('22', 'wednesday', '9', '0', '1', 'A', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('23', 'thursday', '8', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('24', 'thursday', '9', '0', '1', 'B', '2', '2', '7', 'NCS455');
INSERT INTO `tt_timetables_copy` VALUES ('25', 'monday', '4', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('26', 'monday', '5', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('27', 'monday', '6', '0', '4', 'A', '2', '23', '25', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('28', 'tuesday', '4', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('29', 'tuesday', '5', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('30', 'tuesday', '6', '0', '4', 'B', '2', '23', '4', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('31', 'wednesday', '4', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('32', 'wednesday', '5', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('33', 'wednesday', '6', '0', '5', 'A', '2', '24', '2', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('34', 'thursday', '4', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('35', 'thursday', '5', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('36', 'thursday', '6', '0', '6', 'B', '2', '11', '23', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('37', 'friday', '4', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('38', 'friday', '5', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('39', 'friday', '6', '0', '6', 'A', '2', '11', '26', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('40', 'friday', '1', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('41', 'friday', '2', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('42', 'friday', '3', '0', '5', 'B', '2', '24', '21', 'NCS652');
INSERT INTO `tt_timetables_copy` VALUES ('43', 'monday', '4', '0', '1', 'A', '4', '21', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('44', 'monday', '5', '0', '1', 'A', '4', '21', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('45', 'monday', '6', '0', '1', 'A', '4', '21', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('46', 'tuesday', '4', '0', '1', 'B', '4', '21', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('47', 'tuesday', '5', '0', '1', 'B', '4', '21', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('48', 'tuesday', '6', '0', '1', 'B', '4', '21', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('49', 'wednesday', '4', '0', '2', 'B', '4', '17', '22', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('50', 'wednesday', '5', '0', '2', 'B', '4', '17', '22', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('51', 'wednesday', '6', '0', '2', 'B', '4', '17', '22', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('52', 'thursday', '4', '0', '3', 'A', '4', '24', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('53', 'thursday', '5', '0', '3', 'A', '4', '24', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('54', 'thursday', '6', '0', '3', 'A', '4', '24', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('55', 'friday', '4', '0', '3', 'B', '4', '24', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('56', 'friday', '5', '0', '3', 'B', '4', '24', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('57', 'friday', '6', '0', '3', 'B', '4', '24', '29', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('58', 'friday', '1', '0', '2', 'A', '4', '17', '22', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('59', 'friday', '2', '0', '2', 'A', '4', '17', '22', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('60', 'friday', '3', '0', '2', 'A', '4', '17', '22', 'NCS451');
INSERT INTO `tt_timetables_copy` VALUES ('61', 'monday', '3', '0', '7', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('62', 'monday', '4', '0', '7', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('63', 'tuesday', '3', '0', '7', 'B', '5', '26', '11', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('64', 'tuesday', '4', '0', '7', 'B', '5', '26', '11', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('65', 'wednesday', '3', '0', '8', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('66', 'wednesday', '4', '0', '8', 'A', '5', '26', '27', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('67', 'thursday', '1', '0', '8', 'B', '5', '26', '27', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('68', 'thursday', '2', '0', '8', 'B', '5', '26', '27', 'ECS851');
INSERT INTO `tt_timetables_copy` VALUES ('69', 'monday', '1', '0', '6', 'A', '6', '12', '15', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('70', 'monday', '2', '0', '6', 'A', '6', '12', '15', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('71', 'tuesday', '1', '0', '6', 'B', '6', '12', '15', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('72', 'tuesday', '2', '0', '6', 'B', '6', '12', '15', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('73', 'wednesday', '1', '0', '4', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('74', 'wednesday', '2', '0', '4', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('75', 'monday', '8', '0', '5', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('76', 'monday', '9', '0', '5', 'A', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('77', 'tuesday', '8', '0', '5', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('78', 'tuesday', '9', '0', '5', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('79', 'thursday', '8', '0', '4', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('80', 'thursday', '9', '0', '4', 'B', '6', '12', '6', 'NCS653');
INSERT INTO `tt_timetables_copy` VALUES ('81', 'monday', '4', '0', '4', 'B', '6', '15', '10', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('82', 'monday', '5', '0', '4', 'B', '6', '15', '10', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('83', 'monday', '6', '0', '4', 'B', '6', '15', '10', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('84', 'tuesday', '4', '0', '4', 'A', '6', '15', '10', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('85', 'tuesday', '5', '0', '4', 'A', '6', '15', '10', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('86', 'tuesday', '6', '0', '4', 'A', '6', '15', '10', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('87', 'wednesday', '4', '0', '5', 'B', '6', '4', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('88', 'wednesday', '5', '0', '5', 'B', '6', '4', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('89', 'wednesday', '6', '0', '5', 'B', '6', '4', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('90', 'thursday', '4', '0', '6', 'A', '6', '17', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('91', 'thursday', '5', '0', '6', 'A', '6', '17', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('92', 'thursday', '6', '0', '6', 'A', '6', '17', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('93', 'friday', '4', '0', '6', 'B', '6', '15', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('94', 'friday', '5', '0', '6', 'B', '6', '15', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('95', 'friday', '6', '0', '6', 'B', '6', '15', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('96', 'friday', '1', '0', '5', 'A', '6', '4', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('97', 'friday', '2', '0', '5', 'A', '6', '4', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('98', 'friday', '3', '0', '5', 'A', '6', '4', '9', 'NCS651');
INSERT INTO `tt_timetables_copy` VALUES ('99', 'monday', '1', '1', '1', null, null, '23', null, 'AUC001');
INSERT INTO `tt_timetables_copy` VALUES ('100', 'monday', '1', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('101', 'monday', '2', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('102', 'monday', '8', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('103', 'monday', '9', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('104', 'tuesday', '1', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('105', 'tuesday', '2', '1', '4', null, null, '32', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('106', 'tuesday', '3', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('107', 'tuesday', '9', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('108', 'tuesday', '8', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('109', 'wednesday', '3', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('110', 'wednesday', '4', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('111', 'wednesday', '5', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('112', 'wednesday', '6', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('113', 'wednesday', '8', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('114', 'wednesday', '9', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('115', 'thursday', '1', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('116', 'thursday', '2', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('117', 'thursday', '4', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('118', 'thursday', '5', '1', '4', null, null, '32', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('119', 'thursday', '6', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('120', 'friday', '6', '1', '4', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('121', 'friday', '1', '1', '4', null, null, '15', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('122', 'friday', '2', '1', '4', null, null, '32', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('123', 'friday', '3', '1', '4', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('124', 'friday', '4', '1', '4', null, null, '23', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('125', 'friday', '5', '1', '4', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('126', 'monday', '1', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('127', 'monday', '2', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('128', 'monday', '3', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('129', 'monday', '4', '1', '5', null, null, '17', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('130', 'monday', '5', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('131', 'tuesday', '5', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('132', 'monday', '6', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('133', 'tuesday', '4', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('134', 'tuesday', '6', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('135', 'wednesday', '9', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('136', 'wednesday', '8', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('137', 'wednesday', '1', '1', '5', null, null, '9', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('138', 'wednesday', '2', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('139', 'wednesday', '3', '1', '5', null, null, '32', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('140', 'thursday', '1', '1', '5', null, null, '32', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('141', 'thursday', '2', '1', '5', null, null, '17', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('142', 'thursday', '8', '1', '5', null, null, '17', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('143', 'thursday', '3', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('144', 'thursday', '6', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('145', 'friday', '5', '1', '5', null, null, '30', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('146', 'thursday', '5', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('147', 'friday', '4', '1', '5', null, null, '6', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('148', 'thursday', '9', '1', '5', null, null, '24', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('149', 'friday', '6', '1', '5', null, null, '32', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('150', 'monday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('151', 'tuesday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('152', 'wednesday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('153', 'thursday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('154', 'friday', '3', '1', '6', null, null, '5', null, 'NCS601');
INSERT INTO `tt_timetables_copy` VALUES ('155', 'friday', '2', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('156', 'friday', '1', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('157', 'thursday', '1', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('158', 'monday', '6', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('159', 'monday', '4', '1', '6', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('160', 'monday', '5', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('161', 'monday', '8', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('162', 'monday', '9', '1', '6', null, null, '33', null, 'NHU601');
INSERT INTO `tt_timetables_copy` VALUES ('163', 'tuesday', '5', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('164', 'wednesday', '4', '1', '6', null, null, '12', null, 'NCS603');
INSERT INTO `tt_timetables_copy` VALUES ('165', 'tuesday', '6', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('166', 'wednesday', '5', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('167', 'thursday', '8', '1', '6', null, null, '11', null, 'NCS602');
INSERT INTO `tt_timetables_copy` VALUES ('168', 'wednesday', '1', '1', '6', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('169', 'thursday', '9', '1', '6', null, null, '14', null, 'NCS069');
INSERT INTO `tt_timetables_copy` VALUES ('170', 'wednesday', '2', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('171', 'thursday', '2', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('172', 'wednesday', '6', '1', '6', null, null, '25', null, 'NCS063');
INSERT INTO `tt_timetables_copy` VALUES ('173', 'wednesday', '8', '1', '6', null, null, '33', null, 'NHU601');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `last_visit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Mr. Ajay Kumar', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('2', 'Mr. Akhilesh Verma', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('3', 'Mr. Anuj Kumar Dwivedi', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('4', 'Mr. Arun Kumar Yadav', '', '', 'cse013', '', 'eb178e008067398cf133ce7be5f752dd', '1', '2017-01-17 22:33:24');
INSERT INTO `users` VALUES ('5', 'Prof. B.M. Kalra', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('6', 'Mr. B.N. Pandey', '', '', 'cse022', '', '6ebaa0faa83a448419aacbfcb0e45bf1', '1', '2017-01-07 18:27:59');
INSERT INTO `users` VALUES ('7', 'Ms. Charu Agrawal', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('8', 'Ms. Deepti Singh', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('9', 'Mr. Deepak Rai', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('10', 'Mr. Dharmendra Kumar', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('11', 'Dr. Inderjeet Kaur', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('12', 'Ms. Kirti Seth', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('13', 'Ms. Komal Juneja', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('14', 'Dr. Mamta Bhusry', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('15', 'Ms. Neeti Pahuja', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('16', 'Ms. Nishu Bansal', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('17', 'Ms. Prachi Maheshwari', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('18', 'Dr. Pratima Singh', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('19', 'Ms. Priyanka Sethi', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('20', 'Mr. Rajeev Singh', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('21', 'Ms. Reema Aswani', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('22', 'Dr. Sachin Kumar', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('23', 'Mr. Shashank Sahu', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('24', 'Ms. Shiva Tyagi', '', '', 'cse055', '', '6ebaa0faa83a448419aacbfcb0e45bf1', '1', '2017-01-07 18:05:47');
INSERT INTO `users` VALUES ('25', 'Ms. Shubhangi Rastogi', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('26', 'Ms. Sonam Gupta', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('27', 'Dr. Sunita Yadav', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('28', 'Ms. Swimpy Pahuja', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('29', 'Mr. Vikas Goel', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('30', 'Mr. Vivek Singh Verma', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('31', 'Mr. Vikas Kumar', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('32', 'Dr. Swati Agrawal', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('33', 'Dr. Sangmitra', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('34', 'Ms. Sakshi Mittal', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('35', 'Ms. Sakshi Agarwal', '', '', '', '', '', '1', null);
INSERT INTO `users` VALUES ('36', 'Admin', '', '', 'admin', '', '6ebaa0faa83a448419aacbfcb0e45bf1', '0', '2017-01-17 22:22:39');
INSERT INTO `users` VALUES ('37', 'Rajat Srivastava', 'm', 'rajatsri94@gmail.com', 'rajatsri19', '9910364830', 'eb178e008067398cf133ce7be5f752dd', '2', '2017-01-07 17:32:07');
INSERT INTO `users` VALUES ('38', 'Komal Gupta', 'f', 'komalgupta131294@gmail.com', 'komal13', '8527584752', '70ed006b64765ea2eaaa6c71ca8ba714', '2', null);
INSERT INTO `users` VALUES ('39', 'Dr. Rajat Kumar Srivastava', 'm', 'srivrajat94@gmail.com', 'rajatfaculty', '9595343458', '6ebaa0faa83a448419aacbfcb0e45bf1', '1', null);
