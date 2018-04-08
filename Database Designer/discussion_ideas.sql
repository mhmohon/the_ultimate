/*
MySQL Data Transfer
Source Host: localhost
Source Database: discussion_ideas
Target Host: localhost
Target Database: discussion_ideas
Date: 4/8/2018 7:37:51 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for attachment
-- ----------------------------
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `attachment_id` varchar(59) NOT NULL,
  `attachment_details` varchar(89) DEFAULT NULL,
  `idea_id` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`attachment_id`),
  KEY `fk9` (`idea_id`),
  CONSTRAINT `fk9` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` varchar(77) NOT NULL,
  `comment_description` varchar(120) DEFAULT NULL,
  `author_name` varchar(88) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `idea_id` varchar(65) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk10` (`user_id`),
  KEY `fk11` (`idea_id`),
  CONSTRAINT `fk10` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk11` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` varchar(100) NOT NULL,
  `department_name` varchar(90) DEFAULT NULL,
  `discription` varchar(150) DEFAULT NULL,
  `department_status` int(15) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for idea
-- ----------------------------
DROP TABLE IF EXISTS `idea`;
CREATE TABLE `idea` (
  `idea_id` varchar(65) NOT NULL,
  `idea_title` varchar(96) DEFAULT NULL,
  `idea_description` varchar(250) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `final_closure_date` datetime DEFAULT NULL,
  `topic_status` int(15) DEFAULT NULL,
  `topic_id` varchar(70) DEFAULT NULL,
  `student_id` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idea_id`),
  KEY `fk7` (`topic_id`),
  KEY `fk8` (`student_id`),
  CONSTRAINT `fk7` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk8` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for reaction
-- ----------------------------
DROP TABLE IF EXISTS `reaction`;
CREATE TABLE `reaction` (
  `reaction_id` varchar(84) NOT NULL,
  `reaction_type` varchar(69) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `idea_id` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`reaction_id`),
  KEY `fk12` (`user_id`),
  KEY `fk13` (`idea_id`),
  CONSTRAINT `fk12` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk13` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`idea_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` varchar(69) NOT NULL,
  `staff_first_name` varchar(100) DEFAULT NULL,
  `staff_last_name` varchar(100) DEFAULT NULL,
  `staf_address` varchar(120) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `staff_type_id` varchar(82) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `department_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `fk1` (`staff_type_id`),
  KEY `fk2` (`user_id`),
  KEY `fk3` (`department_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for staff_type
-- ----------------------------
DROP TABLE IF EXISTS `staff_type`;
CREATE TABLE `staff_type` (
  `staff_type_id` varchar(82) NOT NULL,
  `staff_type_name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`staff_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` varchar(80) NOT NULL,
  `student_first_name` varchar(120) DEFAULT NULL,
  `student_last_name` varchar(120) DEFAULT NULL,
  `student_address` varchar(150) DEFAULT NULL,
  `contact_number` varchar(40) DEFAULT NULL,
  `student_gender` varchar(35) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `department_id` varchar(82) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `fk4` (`user_id`),
  KEY `fk5` (`department_id`),
  CONSTRAINT `fk4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk5` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for topic
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `topic_id` varchar(70) NOT NULL,
  `topic_title` varchar(80) DEFAULT NULL,
  `topic_description` varchar(150) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `final_closuer_date` datetime DEFAULT NULL,
  `topic_status` int(15) DEFAULT NULL,
  `staff_id` varchar(69) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `fk6` (`staff_id`),
  CONSTRAINT `fk6` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `user_email` varchar(70) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `user_role` varchar(80) DEFAULT NULL,
  `user_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
