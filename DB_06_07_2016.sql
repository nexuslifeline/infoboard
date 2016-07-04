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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

#
# Structure for the `announcements` table : 
#

CREATE TABLE `announcements` (
  `announce_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `announce_description` longtext,
  `post_shown_date` date DEFAULT '0000-00-00',
  `post_expire_date` date DEFAULT '0000-00-00',
  `post_by_user_id` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  `modified_date` datetime DEFAULT NULL,
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`announce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

#
# Structure for the `attachments` table : 
#

CREATE TABLE `attachments` (
  `attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `announce_id` int(11) DEFAULT '0',
  `attachment_directory` varchar(300) DEFAULT '',
  `file_name` varchar(255) DEFAULT '',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`attachment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

#
# Structure for the `comments` table : 
#

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `comments` longtext,
  `user_account_id` int(11) DEFAULT '0',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
  `user_profile` text,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `user_info_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Structure for the `file_archives` table : 
#

CREATE TABLE `file_archives` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_directory` varchar(455) DEFAULT NULL,
  `file_name` varchar(155) DEFAULT NULL,
  `task_id` int(11) DEFAULT '0',
  `user_account_id` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
# Structure for the `post_categories` table : 
#

CREATE TABLE `post_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `students` table : 
#

CREATE TABLE `students` (
  `student_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_account_id` int(11) DEFAULT '0',
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
  `active` int(255) DEFAULT '1',
  `user_profile` text,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `user_info_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `task_distribution_group` table : 
#

CREATE TABLE `task_distribution_group` (
  `distribution_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `main_user_group_id` int(11) DEFAULT '0',
  `department_id` int(11) DEFAULT '0' COMMENT 'WHICH USER GROUP ALLOWED TO RECEIVED TASK',
  PRIMARY KEY (`distribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

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
  `posted_by_user` int(11) NOT NULL DEFAULT '0',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_completed` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `user_priviledge` table : 
#

CREATE TABLE `user_priviledge` (
  `user_priviledge_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `alias_id` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_priviledge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

#
# Data for the `announcement_viewers` table  (LIMIT 0,500)
#

INSERT INTO `announcement_viewers` (`announce_deparment_id`, `department_id`, `announce_id`) VALUES 
  (43,1,40),
  (44,1,41),
  (45,1,42),
  (46,1,43),
  (47,1,44),
  (48,1,45),
  (49,1,46),
  (50,1,47),
  (51,1,48),
  (52,1,49),
  (53,1,50);
COMMIT;

#
# Data for the `announcements` table  (LIMIT 0,500)
#

INSERT INTO `announcements` (`announce_id`, `announce_description`, `post_shown_date`, `post_expire_date`, `post_by_user_id`, `category_id`, `modified_date`, `posted_date`, `is_active`, `is_deleted`) VALUES 
  (40,'dfdf\n\n                                        ','2016-06-01','2016-06-07',2,2,NULL,'2016-06-07 04:08:31',1,0),
  (41,'aaa\n\n                                        ','2016-06-01','2016-06-07',2,2,NULL,'2016-06-07 04:09:35',1,0),
  (42,'fx\n\n                                        ','2016-06-01','2016-06-07',2,2,NULL,'2016-06-07 04:10:03',1,0),
  (43,'fx\n\n                                        ','2016-06-01','2016-06-07',2,2,NULL,'2016-06-07 04:11:06',1,0),
  (44,'gggggg','2016-06-01','2016-06-07',2,2,NULL,'2016-06-07 04:11:32',1,0),
  (45,'dsfsdf','2016-06-01','2016-06-07',2,2,NULL,'2016-06-07 04:12:06',1,0),
  (46,'aaa\n\n                                        ','2016-06-01','2016-06-07',2,1,NULL,'2016-06-07 04:12:56',1,0),
  (47,'hhhhhhhhhhhhhhhhh','2016-06-01','2016-06-07',2,1,NULL,'2016-06-07 04:13:12',1,0),
  (48,'dfdfdf\n\n                                        ','2016-06-01','2016-06-07',2,1,NULL,'2016-06-07 04:15:09',1,0),
  (49,'fg','2016-06-01','2016-06-07',2,1,NULL,'2016-06-07 04:15:23',1,0),
  (50,'hhhhhhhhhhhhh','2016-06-01','2016-06-07',2,3,NULL,'2016-06-07 04:16:04',1,0);
COMMIT;

#
# Data for the `attachments` table  (LIMIT 0,500)
#

INSERT INTO `attachments` (`attachment_id`, `announce_id`, `attachment_directory`, `file_name`, `posted_date`) VALUES 
  (55,43,'images/attachments/5756abba78627.jpg','Chrysanthemum.jpg','2016-06-07 04:11:06'),
  (56,43,'images/attachments/5756abba78a0f.jpg','Desert.jpg','2016-06-07 04:11:06'),
  (57,44,'images/attachments/5756abdf77ecb.jpg','Hydrangeas.jpg','2016-06-07 04:11:32'),
  (58,45,'images/attachments/5756ac005019a.jpg','Desert.jpg','2016-06-07 04:12:06'),
  (59,46,'images/attachments/5756ac2b011b3.jpg','Hydrangeas.jpg','2016-06-07 04:12:56'),
  (60,47,'images/attachments/5756ac45a9729.jpg','Chrysanthemum.jpg','2016-06-07 04:13:12'),
  (61,48,'images/attachments/5756acb70aa14.jpg','Chrysanthemum.jpg','2016-06-07 04:15:09'),
  (62,49,'images/attachments/5756acc7d2926.jpg','Chrysanthemum.jpg','2016-06-07 04:15:24'),
  (63,49,'images/attachments/5756acc7d2d0e.jpg','Desert.jpg','2016-06-07 04:15:24'),
  (64,49,'images/attachments/5756acc7d30f6.jpg','Lighthouse.jpg','2016-06-07 04:15:24'),
  (65,49,'images/attachments/5756acc7d30f6.jpg','Penguins.jpg','2016-06-07 04:15:24'),
  (66,50,'images/attachments/5756acef7a422.jpg','Chrysanthemum.jpg','2016-06-07 04:16:04'),
  (67,50,'images/attachments/5756acef7a80a.jpg','Desert.jpg','2016-06-07 04:16:04'),
  (68,50,'images/attachments/5756acef7abf2.jpg','Hydrangeas.jpg','2016-06-07 04:16:04'),
  (69,50,'images/attachments/5756acef7afda.jpg','Jellyfish.jpg','2016-06-07 04:16:04'),
  (70,50,'images/attachments/5756acef7b3c2.jpg','Lighthouse.jpg','2016-06-07 04:16:04'),
  (71,50,'images/attachments/5756acef7b3c2.jpg','Penguins.jpg','2016-06-07 04:16:04'),
  (72,50,'images/attachments/5756acef7b7aa.jpg','Tulips.jpg','2016-06-07 04:16:04');
COMMIT;

#
# Data for the `comments` table  (LIMIT 0,500)
#

INSERT INTO `comments` (`comment_id`, `task_id`, `comments`, `user_account_id`, `posted_date`, `is_active`, `is_deleted`) VALUES 
  (1,1,'hi\n\n                                    ',26,'2016-06-02 01:07:32',1,0),
  (2,1,'o hello',2,'2016-06-02 01:07:41',1,0),
  (3,1,'<img src=\"images/announcements/Hydrangeas.jpg\" style=\"width: 157.659px; height: 118.367px;\">\n\n                                    ',2,'2016-06-04 08:05:53',1,0),
  (4,1,'hello\n\n                                    ',2,'2016-06-04 09:50:33',1,0),
  (5,4,'hhhii',2,'2016-06-06 06:37:31',1,0),
  (6,4,'hello\n\n                                    ',26,'2016-06-06 06:37:47',1,0),
  (7,4,'hi\n\n                                    ',2,'2016-06-06 20:06:20',1,0),
  (8,4,'hello',2,'2016-06-06 20:06:32',1,0);
COMMIT;

#
# Data for the `courses` table  (LIMIT 0,500)
#

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `department_id`, `course_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'BSIT','Bachelor of Science in Information Technology',1,'This course is desig',1,'2016-05-06 01:41:53','0000-00-00 00:00:00'),
  (2,'fx','fx',1,'fx',1,'2016-05-24 14:54:24','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `departments` table  (LIMIT 0,500)
#

INSERT INTO `departments` (`department_id`, `department_title`, `department_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'Engineering Department','This is a sample text\n',1,'2016-05-26 07:54:06','0000-00-00 00:00:00'),
  (9,'Computer Studies Department','',1,'2016-05-26 07:54:21','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `employees` table  (LIMIT 0,500)
#

INSERT INTO `employees` (`employee_id`, `user_account_id`, `employee_no`, `emp_fname`, `department_id`, `emp_mname`, `emp_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `user_profile`, `date_modified`) VALUES 
  (1,2,'1200','Jose',1,'Mercado','Rizal','09123456789','','','','','','','0000-00-00','sd','Filipino','Male','Single',1,'2016-05-26 22:53:33','images/users/cb19e62886b9a3d2036fb9f81cf4b500.jpg','0000-00-00 00:00:00'),
  (12,25,'dean1_engineering','dean1_engineering',2,'dean1_engineering','dean1_engineering','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00'),
  (13,26,'faculty1_engineering','faculty1_engineering',1,'faculty1_engineering','faculty1_engineering','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00'),
  (14,28,'faculty2_engineering','faculty2_engineering',1,'faculty2_engineering','faculty2_engineering','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00'),
  (15,29,'123456789','faculty1_computer',9,'faculty1_computer','faculty1_computer','faculty1_computer','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00','','0000-00-00 00:00:00'),
  (16,49,'1','g1',1,'g1','g1','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00'),
  (17,50,'a','ad',1,'ab','ac','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00'),
  (18,51,'a','ab',1,'ac','ad','','','','','','','','0000-00-00','','','Male','',1,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00');
COMMIT;

#
# Data for the `file_archives` table  (LIMIT 0,500)
#

INSERT INTO `file_archives` (`file_id`, `file_directory`, `file_name`, `task_id`, `user_account_id`, `is_active`, `is_deleted`, `posted_date`) VALUES 
  (1,'images/files/574fe8f9ecfa3.pdf','Microsoft Visual Basic.pdf',1,2,1,0,'2016-06-02 01:06:17'),
  (2,'images/files/5752ed177e2ae.ini','desktop.ini',1,2,1,0,'2016-06-04 08:00:39'),
  (3,'images/files/5752edc290ea0.jpg','Lighthouse.jpg',1,2,1,0,'2016-06-04 08:03:30'),
  (4,'images/files/57557cc4c678c.jpg','Desert.jpg',4,26,1,0,'2016-06-06 06:38:12'),
  (5,'images/files/57567a4a9f8ce.pdf','Reflections Of A Man.pdf',1,2,1,0,'2016-06-07 00:39:54'),
  (6,'images/files/57567e9b416f4.zip','System Back up 2016.zip',1,2,1,0,'2016-06-07 00:58:19');
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
# Data for the `post_categories` table  (LIMIT 0,500)
#

INSERT INTO `post_categories` (`category_id`, `category`) VALUES 
  (1,'Announcements'),
  (2,'Events'),
  (3,'News');
COMMIT;

#
# Data for the `students` table  (LIMIT 0,500)
#

INSERT INTO `students` (`student_id`, `user_account_id`, `student_no`, `course_id`, `stud_fname`, `stud_mname`, `stud_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `user_profile`, `date_created`, `date_modified`) VALUES 
  (5,47,'10001',1,'Paul Christian','Bontia','Rueda','09357467601','','','','','','','0000-00-00','','','Female','',1,NULL,'0000-00-00 00:00:00','2016-06-01 21:39:08');
COMMIT;

#
# Data for the `task_distribution_group` table  (LIMIT 0,500)
#

INSERT INTO `task_distribution_group` (`distribution_id`, `main_user_group_id`, `department_id`) VALUES 
  (42,4,1),
  (43,4,5),
  (44,4,6),
  (45,4,7),
  (46,2,1),
  (47,1,1),
  (48,1,9);
COMMIT;

#
# Data for the `task_viewers` table  (LIMIT 0,500)
#

INSERT INTO `task_viewers` (`task_viewer_id`, `task_id`, `user_account_id`, `viewer_type`, `date_accomplished`, `is_accomplished`) VALUES 
  (15,3,26,'USER_VIEW','2016-06-07 00:42:06',1),
  (16,4,2,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (17,4,26,'DEPARTMENT_VIEW','2016-06-07 00:42:13',0),
  (18,4,28,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (19,4,49,'DEPARTMENT_VIEW','0000-00-00 00:00:00',0),
  (20,4,50,'DEPARTMENT_VIEW','2016-06-07 00:42:17',0),
  (21,4,51,'DEPARTMENT_VIEW','2016-06-07 00:42:22',1),
  (23,1,2,'DEPARTMENT_VIEW','2016-06-06 21:37:13',1),
  (24,1,26,'DEPARTMENT_VIEW','2016-06-07 00:42:29',0),
  (25,1,28,'DEPARTMENT_VIEW','2016-06-06 21:49:06',1),
  (26,1,49,'DEPARTMENT_VIEW','2016-06-06 21:51:15',1),
  (27,1,50,'DEPARTMENT_VIEW','2016-06-06 21:55:29',0),
  (28,1,51,'DEPARTMENT_VIEW','2016-06-06 21:53:07',0);
COMMIT;

#
# Data for the `tasks` table  (LIMIT 0,500)
#

INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_status`, `submission_deadline`, `is_document_required`, `posted_by_user`, `posted_date`, `modified_date`, `is_completed`, `is_active`, `is_deleted`) VALUES 
  (1,'task 1','Please submit grades on or before June 6, 2016. Please cooperate. Thank you.','','2016-06-15 00:00:00',0,2,'2016-06-01 23:03:58',NULL,1,1,0),
  (2,'task 2','task 2','','2016-06-10 00:00:00',0,2,'2016-06-02 01:08:41',NULL,1,1,0),
  (3,'task 3','task 3','','2016-06-02 00:00:00',0,2,'2016-06-02 01:08:56',NULL,0,1,0),
  (4,'jjj','jjj','','2016-06-06 00:00:00',0,2,'2016-06-06 06:36:59',NULL,0,1,0);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_account_id`, `username`, `password`, `email`, `employee_id`, `student_id`, `active`, `user_group_id`, `date_created`, `date_modified`) VALUES 
  (2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin',0,0,1,1,'2016-05-08 05:37:58','2016-06-01 11:21:27'),
  (25,'dean1_engineering','d033e22ae348aeb5660fc2140aec35850c4da997','dean1_engineering',0,0,1,2,'0000-00-00 00:00:00','2016-05-28 05:48:39'),
  (26,'faculty1_engineering','356a192b7913b04c54574d18c28d46e6395428ab','faculty1_engineering',0,0,1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (28,'faculty2_engineering','356a192b7913b04c54574d18c28d46e6395428ab','faculty2_engineering',0,0,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (29,'faculty1_computer','356a192b7913b04c54574d18c28d46e6395428ab','faculty1_computer',0,0,1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (47,'paul','356a192b7913b04c54574d18c28d46e6395428ab','paul',0,0,1,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (49,'g1','356a192b7913b04c54574d18c28d46e6395428ab','g1',0,0,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (50,'a','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','a',0,0,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (51,'aaa','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','abcd',0,0,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group_title`, `user_group_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'ADMINISTRATOR','FULL ACCESS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'DEAN','DEAN',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (3,'FACULTY MEMBER','FACULTY MEMBER',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (4,'STUDENT','LIMITED ACCESS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_priviledge` table  (LIMIT 0,500)
#

INSERT INTO `user_priviledge` (`user_priviledge_id`, `user_group_id`, `alias_id`, `date_created`) VALUES 
  (96,4,'1','2016-05-21 18:18:37'),
  (97,4,'2-1','2016-05-21 18:18:37'),
  (98,4,'2-2','2016-05-21 18:18:37'),
  (99,4,'3-1','2016-05-21 18:18:37'),
  (100,4,'3-2','2016-05-21 18:18:37'),
  (101,4,'4-1','2016-05-21 18:18:37'),
  (102,4,'4-2','2016-05-21 18:18:37'),
  (103,4,'6-1','2016-05-21 18:18:37'),
  (104,4,'6-2','2016-05-21 18:18:37'),
  (105,4,'6-3','2016-05-21 18:18:37'),
  (119,2,'1','2016-05-28 08:14:21'),
  (120,2,'2-1','2016-05-28 08:14:21'),
  (121,2,'2-2','2016-05-28 08:14:21'),
  (122,2,'3-1','2016-05-28 08:14:21'),
  (123,2,'3-2','2016-05-28 08:14:21'),
  (124,2,'4-1','2016-05-28 08:14:21'),
  (125,2,'4-2','2016-05-28 08:14:21'),
  (137,1,'1','2016-05-28 08:29:51'),
  (138,1,'2-1','2016-05-28 08:29:51'),
  (139,1,'2-2','2016-05-28 08:29:51'),
  (140,1,'3-1','2016-05-28 08:29:51'),
  (141,1,'3-2','2016-05-28 08:29:51'),
  (142,1,'4-1','2016-05-28 08:29:51'),
  (143,1,'4-2','2016-05-28 08:29:51'),
  (144,1,'6-1','2016-05-28 08:29:51'),
  (145,1,'6-2','2016-05-28 08:29:51'),
  (146,1,'6-3','2016-05-28 08:29:51'),
  (147,3,'1','2016-06-01 23:01:51'),
  (148,3,'6-2','2016-06-01 23:01:51');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;