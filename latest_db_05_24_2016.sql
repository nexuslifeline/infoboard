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
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `employees` table : 
#

CREATE TABLE `employees` (
  `employee_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(11) NOT NULL DEFAULT '0',
  `employee_no` varchar(255) DEFAULT '',
  `emp_fname` varchar(255) DEFAULT '',
  `department_id` int(11) NOT NULL,
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
  `active` int(255) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `user_info_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `course_id` int(11) NOT NULL,
  `stud_fname` varchar(255) DEFAULT '',
  `stud_mname` varchar(255) DEFAULT '',
  `stud_lname` varchar(255) DEFAULT '',
  `contact_no` varchar(55) DEFAULT '',
  `house_no` varchar(55) DEFAULT '',
  `street` varchar(255) DEFAULT '',
  `barangay` varchar(255) DEFAULT '',
  `municipality` varchar(255) DEFAULT '',
  `zipcode` int(11) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT '0000-00-00',
  `birthplace` varchar(255) DEFAULT '',
  `nationality` varchar(255) DEFAULT '',
  `gender` varchar(255) DEFAULT '',
  `civil_status` varchar(255) DEFAULT '',
  `active` int(255) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

#
# Structure for the `task_viewers` table : 
#

CREATE TABLE `task_viewers` (
  `task_viewer_id` int(20) NOT NULL AUTO_INCREMENT,
  `task_id` bigint(20) DEFAULT '0',
  `user_account_id` bigint(20) DEFAULT '0',
  `viewer_type` varchar(20) DEFAULT '',
  `date_accomplished` datetime DEFAULT '0000-00-00 00:00:00',
  `is_accomplished` bit(1) DEFAULT b'0',
  PRIMARY KEY (`task_viewer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

#
# Structure for the `user_accounts` table : 
#

CREATE TABLE `user_accounts` (
  `user_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `employee_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `user_group_id` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `user_groups` table : 
#

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_title` varchar(255) NOT NULL DEFAULT '',
  `user_group_desc` varchar(255) NOT NULL DEFAULT '',
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `user_priviledge` table : 
#

CREATE TABLE `user_priviledge` (
  `user_priviledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `alias_id` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_priviledge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

#
# Data for the `announcement_viewers` table  (LIMIT 0,500)
#

INSERT INTO `announcement_viewers` (`announce_deparment_id`, `department_id`, `announce_id`) VALUES 
  (173,1,185),
  (174,5,185),
  (177,1,186),
  (178,6,186);
COMMIT;

#
# Data for the `announcements` table  (LIMIT 0,500)
#

INSERT INTO `announcements` (`announce_id`, `announce_description`, `post_shown_date`, `post_expire_date`, `post_by_user_id`, `modified_date`, `posted_date`, `is_active`, `is_deleted`) VALUES 
  (185,'<span style=\"font-weight: bold;\">sdsdsd</span><div><span style=\"font-weight: bold;\">fdfdfdfdf</span></div>','2016-05-22','2016-05-22',2,NULL,'2016-05-22 10:24:09',1,0),
  (186,'dfdf\n\n                                        ','2016-05-25','2016-05-25',2,NULL,'2016-05-24 18:57:18',1,0);
COMMIT;

#
# Data for the `courses` table  (LIMIT 0,500)
#

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `department_id`, `course_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'BSIT','Bachelor of Science in Information Technology',1,'This course is desig',1,'2016-05-06 16:41:53','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `departments` table  (LIMIT 0,500)
#

INSERT INTO `departments` (`department_id`, `department_title`, `department_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'Computer','This is a sample text\r\n',1,'2016-05-06 15:22:28','0000-00-00 00:00:00'),
  (5,'DITE','<h2><span style=\"font-style: italic;\">sd<span style=\"font-weight: bold;\">sds</span></span></h2>',1,'2016-05-07 16:12:15','0000-00-00 00:00:00'),
  (6,'Depart of Information','This is a sample text',1,'2016-05-13 20:16:04','0000-00-00 00:00:00'),
  (7,'sdsdsds','sdsd<span style=\"font-weight: bold;\">sd</span>',1,'2016-05-13 22:28:36','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `employees` table  (LIMIT 0,500)
#

INSERT INTO `employees` (`employee_id`, `user_account_id`, `employee_no`, `emp_fname`, `department_id`, `emp_mname`, `emp_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `date_modified`) VALUES 
  (1,2,'asa','DENIS',1,'BAUN','GUTIERREZ','0999999','123','123','123','13','123','123','0000-00-00','sd','Filipino','Male','Single',1,'2016-05-22 09:07:22','0000-00-00 00:00:00'),
  (2,5,'adminadmin','adminadmin',1,'adminadmin','adminadmin','adminadmin','adminadmin','adminadmin','adminadmin','adminadmin','adminadmin','adminadmin','0000-00-00','adminadmin','adminadmin','Male','adminadmin',1,'2016-05-22 10:00:29','0000-00-00 00:00:00'),
  (3,6,'axxxxxxxxxxxxxxxxx','axxxxxxxxxxxxxxxxx',1,'axxxxxxxxxxxxxxxxx','axxxxxxxxxxxxxxxxx','axxxxxxxxxxxxxxxxx','','','','','','','0000-00-00','','','Male','',1,'2016-05-22 10:22:43','0000-00-00 00:00:00');
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
# Data for the `students` table  (LIMIT 0,500)
#

INSERT INTO `students` (`student_id`, `user_account_id`, `student_no`, `course_id`, `stud_fname`, `stud_mname`, `stud_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `date_modified`) VALUES 
  (1,4,'090999',1,'Jennifer','Santos','Labuyo','900009','abc','abc','abc','abc',122,'abc','2019-01-01','Mexico','Filipino','Male','Filipino',1,'2016-05-22 09:11:26','0000-00-00 00:00:00'),
  (2,7,'cccccccccccccc',1,'cccccccccccccc','cccccccccccccc','cccccccccccccc','','','','','',0,'','0000-00-00','','','Male','',1,'2016-05-22 10:23:10','0000-00-00 00:00:00');
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
  (45,4,7);
COMMIT;

#
# Data for the `task_viewers` table  (LIMIT 0,500)
#

INSERT INTO `task_viewers` (`task_viewer_id`, `task_id`, `user_account_id`, `viewer_type`, `date_accomplished`, `is_accomplished`) VALUES 
  (172,37,2,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (173,37,5,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (174,37,6,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (175,37,2,'USER_VIEW','0000-00-00 00:00:00',0),
  (177,38,2,'USER_VIEW','0000-00-00 00:00:00',0),
  (178,40,2,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (179,40,5,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (180,40,6,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (181,42,2,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (182,42,5,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (183,42,6,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (184,44,2,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (185,44,5,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (186,44,6,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (187,45,2,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (188,45,5,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (189,45,6,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0);
COMMIT;

#
# Data for the `tasks` table  (LIMIT 0,500)
#

INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_status`, `submission_deadline`, `is_document_required`, `posted_date`, `modified_date`, `is_active`, `is_deleted`) VALUES 
  (37,'task 1','dfdfd','','2014-03-26 00:00:00',0,'2016-05-24 16:28:27',NULL,1,1),
  (38,'task 12','task 2','','2014-03-05 00:00:00',0,'2016-05-24 17:32:06',NULL,1,1),
  (39,'Title','Description','','2016-05-20 00:00:00',0,'2016-05-24 18:12:32',NULL,1,0),
  (40,'f','f','','2016-05-24 00:00:00',0,'2016-05-24 18:13:07',NULL,1,1),
  (41,'aa','aa','','2016-05-24 00:00:00',0,'2016-05-24 18:13:46',NULL,1,1),
  (42,'f','f','','2016-05-24 00:00:00',0,'2016-05-24 18:15:05',NULL,1,1),
  (43,'fsdfsdf','sfdsdf','','2016-05-24 00:00:00',0,'2016-05-24 18:16:10',NULL,1,1),
  (44,'sdf','sdf','','2016-05-24 00:00:00',0,'2016-05-24 18:22:54',NULL,1,0),
  (45,'sdfsdf','sdf','','2016-05-24 00:00:00',0,'2016-05-24 18:25:34',NULL,1,1);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_account_id`, `username`, `password`, `email`, `employee_id`, `student_id`, `active`, `user_group_id`, `date_created`, `date_modified`) VALUES 
  (2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin',0,0,1,1,'2016-05-08 05:37:58','0000-00-00 00:00:00'),
  (3,'paul','d033e22ae348aeb5660fc2140aec35850c4da997','paul@gmail.com',0,0,1,1,'2016-05-08 05:58:13','0000-00-00 00:00:00'),
  (4,'jen','d033e22ae348aeb5660fc2140aec35850c4da997','jen_denz',0,0,1,4,'2016-05-22 09:10:58','0000-00-00 00:00:00'),
  (5,'adminadmin','dd94709528bb1c83d08f3088d4043f4742891f4f','adminadmin',0,0,1,1,'2016-05-22 10:00:29','0000-00-00 00:00:00'),
  (6,'axxxxxxxxxxxxxxxxx','7e87ed14e76d460e4f5b725857de5951d57a9dc4','axxxxxxxxxxxxxxxxx',0,0,1,1,'2016-05-22 10:22:43','0000-00-00 00:00:00'),
  (7,'cccccccccccccc','53f73fe516c9227054ed6853987cf4b8df084fbb','cccccccccccccc',0,0,1,4,'2016-05-22 10:23:10','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group_title`, `user_group_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'ADMINISTRATOR','FULL ACCESS sdsds',1,'2016-05-13 22:28:23','0000-00-00 00:00:00'),
  (2,'DEAN','sds',0,'2016-05-06 16:01:32','0000-00-00 00:00:00'),
  (3,'ds','ds',0,'2016-05-06 16:01:29','0000-00-00 00:00:00'),
  (4,'STUDENT','asdads',1,'2016-05-13 22:27:59','0000-00-00 00:00:00'),
  (5,'dsd','sdsd',1,'2016-05-22 10:23:24','0000-00-00 00:00:00');
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
  (105,4,'6-3','2016-05-22 09:18:37');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;