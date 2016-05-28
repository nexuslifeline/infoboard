# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : infoboard2


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `infoboard2`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `infoboard2`;

#
# Structure for the `announcement_viewers` table : 
#

CREATE TABLE `announcement_viewers` (
  `announce_deparment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) DEFAULT '0' COMMENT 'WHICH COURSE IS ALLOWED TO VIEW THIS ANNOUNCEMENT',
  `announce_id` int(11) DEFAULT '0',
  PRIMARY KEY (`announce_deparment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;

#
# Structure for the `announcements` table : 
#

CREATE TABLE `announcements` (
  `announce_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `announce_description` longtext,
  `post_shown_date` date DEFAULT '0000-00-00',
  `post_expire_date` date DEFAULT '0000-00-00',
  `post_by_user_id` int(11) DEFAULT '0',
  `modified_date` datetime DEFAULT NULL,
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`announce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

#
# Structure for the `courses` table : 
#

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) DEFAULT '',
  `course_title` varchar(255) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `course_desc` varchar(255) DEFAULT '',
  `active` int(255) DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_code` (`course_code`),
  UNIQUE KEY `course_code_2` (`course_code`),
  UNIQUE KEY `course_code_3` (`course_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `departments` table : 
#

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_title` varchar(255) NOT NULL,
  `department_desc` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `employees` table : 
#

CREATE TABLE `employees` (
  `employee_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(11) DEFAULT '0',
  `employee_no` varchar(255) DEFAULT '',
  `emp_fname` varchar(255) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `emp_mname` varchar(255) DEFAULT '',
  `emp_lname` varchar(255) DEFAULT '',
  `contact_no` varchar(55) DEFAULT '',
  `house_no` varchar(20) DEFAULT '',
  `street` varchar(255) DEFAULT '',
  `barangay` varchar(255) DEFAULT '',
  `municipality` varchar(255) DEFAULT '',
  `zipcode` varchar(20) DEFAULT '',
  `province` varchar(255) DEFAULT '',
  `birthdate` date DEFAULT '0000-00-00',
  `birthplace` varchar(255) DEFAULT '',
  `nationality` varchar(255) DEFAULT '',
  `gender` varchar(255) DEFAULT '',
  `civil_status` varchar(255) DEFAULT '',
  `active` int(255) DEFAULT '1',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `user_info_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Structure for the `link_table` table : 
#

CREATE TABLE `link_table` (
  `link_table_id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `alias_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_modified` date NOT NULL,
  PRIMARY KEY (`link_table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Structure for the `students` table : 
#

CREATE TABLE `students` (
  `student_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(11) NOT NULL,
  `student_no` varchar(255) DEFAULT '',
  `course_id` int(11) DEFAULT '0',
  `stud_fname` varchar(255) DEFAULT '',
  `stud_mname` varchar(255) DEFAULT '',
  `stud_lname` varchar(255) DEFAULT '',
  `contact_no` varchar(55) DEFAULT '',
  `house_no` varchar(55) DEFAULT '',
  `street` varchar(255) DEFAULT '',
  `barangay` varchar(255) DEFAULT '',
  `municipality` varchar(255) DEFAULT '',
  `zipcode` varchar(20) DEFAULT '',
  `province` varchar(255) DEFAULT '',
  `birthdate` varchar(20) DEFAULT '0000-00-00',
  `birthplace` varchar(255) DEFAULT '',
  `nationality` varchar(255) DEFAULT '',
  `gender` varchar(255) DEFAULT '',
  `civil_status` varchar(255) DEFAULT '',
  `active` int(255) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `user_info_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `task_distribution_group` table : 
#

CREATE TABLE `task_distribution_group` (
  `distribution_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `main_user_group_id` int(11) DEFAULT '0',
  `department_id` int(11) DEFAULT '0' COMMENT 'WHICH USER GROUP ALLOWED TO RECEIVED TASK',
  PRIMARY KEY (`distribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

#
# Structure for the `task_viewers` table : 
#

CREATE TABLE `task_viewers` (
  `task_viewer_id` int(20) NOT NULL AUTO_INCREMENT,
  `task_id` bigint(20) DEFAULT '0',
  `user_account_id` bigint(20) DEFAULT '0',
  `viewer_type` varchar(20) DEFAULT '',
  `date_accomplished` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `is_accomplished` bit(1) DEFAULT b'0',
  PRIMARY KEY (`task_viewer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=latin1;

#
# Structure for the `tasks` table : 
#

CREATE TABLE `tasks` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `task_title` varchar(255) DEFAULT '',
  `task_description` text,
  `task_status` varchar(55) DEFAULT '',
  `submission_deadline` datetime DEFAULT NULL,
  `is_document_required` bit(1) DEFAULT b'0',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

#
# Structure for the `user_accounts` table : 
#

CREATE TABLE `user_accounts` (
  `user_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '',
  `password` varchar(400) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `employee_id` int(11) DEFAULT '0',
  `student_id` int(11) DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `user_group_id` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

#
# Structure for the `user_groups` table : 
#

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_title` varchar(255) NOT NULL DEFAULT '',
  `user_group_desc` varchar(255) NOT NULL DEFAULT '',
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `user_priviledge` table : 
#

CREATE TABLE `user_priviledge` (
  `user_priviledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `alias_id` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_priviledge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

#
# Data for the `announcement_viewers` table  (LIMIT 0,500)
#

INSERT INTO `announcement_viewers` (`announce_deparment_id`, `department_id`, `announce_id`) VALUES 
  (226,1,208),
  (230,1,209),
  (231,1,210);
COMMIT;

#
# Data for the `announcements` table  (LIMIT 0,500)
#

INSERT INTO `announcements` (`announce_id`, `announce_description`, `post_shown_date`, `post_expire_date`, `post_by_user_id`, `modified_date`, `posted_date`, `is_active`, `is_deleted`) VALUES 
  (208,'<h1>Hello Paul Christian Rueda!\n\n                                        </h1>','2016-05-01','2016-05-27',2,NULL,'2016-05-26 22:49:57',1,0),
  (209,'<img src=\"images/announcements/Desert.jpg\" style=\"width: 200px;\">dfdfd\n\n                                        ','2016-05-01','2016-05-28',2,NULL,'2016-05-27 21:48:58',1,0),
  (210,'<img src=\"images/announcements/Tulips.jpg\" style=\"width: 200px;\">\n\n                                        ','2016-05-01','2016-05-28',2,NULL,'2016-05-27 21:59:41',1,0);
COMMIT;

#
# Data for the `courses` table  (LIMIT 0,500)
#

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `department_id`, `course_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'BSIT','Bachelor of Science in Information Technology',1,'This course is desig',1,'2016-05-06 16:41:53','0000-00-00 00:00:00'),
  (2,'fx','fx',1,'fx',1,'2016-05-25 05:54:24','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `departments` table  (LIMIT 0,500)
#

INSERT INTO `departments` (`department_id`, `department_title`, `department_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'Engineering Department','This is a sample text\n',1,'2016-05-26 22:54:06','0000-00-00 00:00:00'),
  (9,'Computer Studies Department','',1,'2016-05-26 22:54:21','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `employees` table  (LIMIT 0,500)
#

INSERT INTO `employees` (`employee_id`, `user_account_id`, `employee_no`, `emp_fname`, `department_id`, `emp_mname`, `emp_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `date_modified`) VALUES 
  (1,2,'1200','ADMIN',1,'BAUN','ADMIN','09123456789','123','123','123','13','123','123','0000-00-00','sd','Filipino','Male','Single',1,'2016-05-26 22:53:33','0000-00-00 00:00:00'),
  (12,25,'dean1_engineering','dean1_engineering',1,'dean1_engineering','dean1_engineering','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (13,26,'faculty1_engineering','faculty1_engineering',1,'faculty1_engineering','faculty1_engineering','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (14,28,'faculty2_engineering','faculty2_engineering',1,'faculty2_engineering','faculty2_engineering','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `link_table` table  (LIMIT 0,500)
#

INSERT INTO `link_table` (`link_table_id`, `link`, `alias_id`, `description`, `active`, `date_created`, `date_modified`) VALUES 
  (3,'Dashboard','1','Dashboard',1,'0000-00-00 00:00:00','0000-00-00'),
  (4,'Announcement','2-1','Announcement',1,'0000-00-00 00:00:00','0000-00-00'),
  (5,'Task','2-2','Task',1,'0000-00-00 00:00:00','0000-00-00'),
  (6,'User Management','3-1','User Management',1,'0000-00-00 00:00:00','0000-00-00'),
  (7,'User Group Management','3-2','User Group Management',1,'0000-00-00 00:00:00','0000-00-00'),
  (8,'Department Management','4-1','Department Management',1,'0000-00-00 00:00:00','0000-00-00'),
  (9,'Course Management','4-2','Course Management',1,'0000-00-00 00:00:00','0000-00-00'),
  (10,'User Group Setting','6-1','User Group Setting',1,'0000-00-00 00:00:00','0000-00-00'),
  (11,'User Profile','6-2','User Profile',1,'0000-00-00 00:00:00','0000-00-00'),
  (12,'System Setting','6-3','System Setting',1,'0000-00-00 00:00:00','0000-00-00');
COMMIT;

#
# Data for the `task_distribution_group` table  (LIMIT 0,500)
#

INSERT INTO `task_distribution_group` (`distribution_id`, `main_user_group_id`, `department_id`) VALUES 
  (38,1,1),
  (39,1,5),
  (40,1,6),
  (41,1,7),
  (42,4,1),
  (43,4,5),
  (44,4,6),
  (45,4,7),
  (46,2,1);
COMMIT;

#
# Data for the `task_viewers` table  (LIMIT 0,500)
#

INSERT INTO `task_viewers` (`task_viewer_id`, `task_id`, `user_account_id`, `viewer_type`, `date_accomplished`, `is_accomplished`) VALUES 
  (230,53,2,'USER_VIEW','0000-00-00 00:00:00',0),
  (231,54,2,'USER_VIEW','2016-05-27 21:49:52',1),
  (232,55,2,'USER_VIEW','0000-00-00 00:00:00',0);
COMMIT;

#
# Data for the `tasks` table  (LIMIT 0,500)
#

INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_status`, `submission_deadline`, `is_document_required`, `posted_date`, `modified_date`, `is_active`, `is_deleted`) VALUES 
  (53,'Task 1','Task 1','','2016-05-26 00:00:00',0,'2016-05-26 22:50:36',NULL,1,0),
  (54,'ggg','gggggg','','2016-05-27 00:00:00',0,'2016-05-27 21:49:29',NULL,1,0),
  (55,'dd','ddd','','2016-05-27 00:00:00',0,'2016-05-27 22:00:19',NULL,1,0);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_account_id`, `username`, `password`, `email`, `employee_id`, `student_id`, `active`, `user_group_id`, `date_created`, `date_modified`) VALUES 
  (2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin',0,0,1,1,'2016-05-08 05:37:58','0000-00-00 00:00:00'),
  (25,'dean1_engineering','1','dean1_engineering',0,0,1,2,'0000-00-00 00:00:00','2016-05-27 09:12:25'),
  (26,'faculty1_engineering','356a192b7913b04c54574d18c28d46e6395428ab','faculty1_engineering',0,0,1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (28,'faculty2_engineering','356a192b7913b04c54574d18c28d46e6395428ab','faculty2_engineering',0,0,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group_title`, `user_group_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'ADMINISTRATOR','FULL ACCESS',1,'2016-05-13 22:28:23','2016-05-26 22:54:43'),
  (2,'DEAN','DEAN',1,'2016-05-06 16:01:32','2016-05-27 09:08:19'),
  (3,'FACULTY MEMBER','FACULTY MEMBER',1,'2016-05-06 16:01:29','2016-05-27 09:07:13'),
  (4,'STUDENT','LIMITED ACCESS',1,'2016-05-13 22:27:59','2016-05-26 22:55:24');
COMMIT;

#
# Data for the `user_priviledge` table  (LIMIT 0,500)
#

INSERT INTO `user_priviledge` (`user_priviledge_id`, `user_group_id`, `alias_id`, `date_created`) VALUES 
  (86,1,'1','2016-05-22 09:04:22'),
  (87,1,'2-1','2016-05-22 09:04:22'),
  (88,1,'2-2','2016-05-22 09:04:22'),
  (89,1,'3-1','2016-05-22 09:04:22'),
  (90,1,'3-2','2016-05-22 09:04:22'),
  (91,1,'4-1','2016-05-22 09:04:22'),
  (92,1,'4-2','2016-05-22 09:04:22'),
  (93,1,'6-1','2016-05-22 09:04:22'),
  (94,1,'6-2','2016-05-22 09:04:22'),
  (95,1,'6-3','2016-05-22 09:04:22'),
  (96,4,'1','2016-05-22 09:18:37'),
  (97,4,'2-1','2016-05-22 09:18:37'),
  (98,4,'2-2','2016-05-22 09:18:37'),
  (99,4,'3-1','2016-05-22 09:18:37'),
  (100,4,'3-2','2016-05-22 09:18:37'),
  (101,4,'4-1','2016-05-22 09:18:37'),
  (102,4,'4-2','2016-05-22 09:18:37'),
  (103,4,'6-1','2016-05-22 09:18:37'),
  (104,4,'6-2','2016-05-22 09:18:37'),
  (105,4,'6-3','2016-05-22 09:18:37'),
  (106,2,'1','2016-05-27 09:09:32'),
  (107,2,'2-1','2016-05-27 09:09:32'),
  (108,2,'2-2','2016-05-27 09:09:32');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;