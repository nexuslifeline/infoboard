# SQL Manager 2010 Lite for MySQL 4.6.0.5
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : infoboard


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `infoboard`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `infoboard`;

#
# Structure for the `announcement_viewers` table : 
#

CREATE TABLE `announcement_viewers` (
  `annouce_course_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT '0' COMMENT 'WHICH COURSE IS ALLOWED TO VIEW THIS ANNOUNCEMENT',
  `announce_id` int(11) DEFAULT '0',
  PRIMARY KEY (`annouce_course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `announcements` table : 
#

CREATE TABLE `announcements` (
  `announce_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `announce_description` text,
  `post_shown_date` date DEFAULT '0000-00-00',
  `post_expire_date` date DEFAULT '0000-00-00',
  `post_by_user_id` int(11) DEFAULT '0',
  `modified_date` datetime DEFAULT NULL,
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`announce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `task_distribution_group` table : 
#

CREATE TABLE `task_distribution_group` (
  `distribution_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `main_user_group_id` int(11) DEFAULT '0',
  `department_id` int(11) DEFAULT '0' COMMENT 'WHICH USER GROUP ALLOWED TO RECEIVED TASK',
  PRIMARY KEY (`distribution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `task_viewers` table : 
#

CREATE TABLE `task_viewers` (
  `task_viewer_id` int(20) NOT NULL AUTO_INCREMENT,
  `task_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT '0',
  PRIMARY KEY (`task_viewer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `tasks` table : 
#

CREATE TABLE `tasks` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `task_title` varchar(255) DEFAULT NULL,
  `task_description` text,
  `task_status` varchar(55) DEFAULT NULL,
  `submission_deadline` datetime DEFAULT NULL,
  `is_document_required` bit(1) DEFAULT b'0',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for the `announcement_viewers` table  (LIMIT 0,500)
#

INSERT INTO `announcement_viewers` (`annouce_course_id`, `course_id`, `announce_id`) VALUES 
  (1,1,0),
  (2,2,0);
COMMIT;

#
# Data for the `announcements` table  (LIMIT 0,500)
#

INSERT INTO `announcements` (`announce_id`, `announce_description`, `post_shown_date`, `post_expire_date`, `post_by_user_id`, `modified_date`, `posted_date`, `is_active`, `is_deleted`) VALUES 
  (6,'<span style=\"font-weight: bold;\">no Classes today!</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"line-height: 18.5714px; color: inherit;\">Classes suspended tommorow.</span><span style=\"color: inherit; line-height: 1.42857;\">sdfsdfsd</span><br></div>','0000-00-00','0000-00-00',0,NULL,'2016-05-10 16:57:57',1,0),
  (7,'<span style=\"font-weight: bold;\">no Classes today!</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"line-height: 18.5714px; color: inherit;\">Classes suspended tommorow.</span><span style=\"color: inherit; line-height: 1.42857;\">sdfsdfsd</span><br></div>','0000-00-00','0000-00-00',0,NULL,'2016-05-10 16:58:14',1,0),
  (8,'<span style=\"font-weight: bold;\">no Classes today!</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"line-height: 18.5714px; color: inherit;\">Classes suspended tommorow.</span><span style=\"color: inherit; line-height: 1.42857;\">sdfsdfsd</span><br></div>','0000-00-00','0000-00-00',0,NULL,'2016-05-10 16:58:43',1,0),
  (9,'<span style=\"font-weight: bold;\">no Classes today!</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"line-height: 18.5714px; color: inherit;\">Classes suspended tommorow.</span><span style=\"color: inherit; line-height: 1.42857;\">sdfsdfsd</span><br></div>','0000-00-00','0000-00-00',0,NULL,'2016-05-10 16:59:14',1,0),
  (10,'<span style=\"font-weight: bold;\">no Classes today!</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"line-height: 18.5714px; color: inherit;\">Classes suspended tommorow.</span><span style=\"color: inherit; line-height: 1.42857;\">sdfsdfsd</span><br></div>','0000-00-00','0000-00-00',0,NULL,'2016-05-10 16:59:17',1,0),
  (11,'<span style=\"font-weight: bold;\">no Classes today!</span><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"font-weight: bold;\"><br></span></div><div><span style=\"line-height: 18.5714px; color: inherit;\">Classes suspended tommorow.</span><span style=\"color: inherit; line-height: 1.42857;\">sdfsdfsd</span><br></div>','0000-00-00','0000-00-00',0,NULL,'2016-05-10 17:11:57',1,0);
COMMIT;

#
# Data for the `courses` table  (LIMIT 0,500)
#

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `department_id`, `course_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'BSIT','Bachelor of Science in Information Technology',1,'This course is desig',1,'2016-05-07 07:41:53','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `departments` table  (LIMIT 0,500)
#

INSERT INTO `departments` (`department_id`, `department_title`, `department_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'Computer','This is a sample text\r\n',1,'2016-05-07 06:22:28','0000-00-00 00:00:00'),
  (5,'DITE','<h2><span style=\"font-style: italic;\">sd<span style=\"font-weight: bold;\">sds</span></span></h2>',1,'2016-05-08 07:12:15','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `employees` table  (LIMIT 0,500)
#

INSERT INTO `employees` (`employee_id`, `user_account_id`, `employee_no`, `emp_fname`, `department_id`, `emp_mname`, `emp_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `date_modified`) VALUES 
  (1,2,'asa','DENIS',1,'BAUN','GUTIERREZ','0999999','','','','','','','0000-00-00','','','','',1,'2016-05-08 20:12:47','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `task_distribution_group` table  (LIMIT 0,500)
#

INSERT INTO `task_distribution_group` (`distribution_id`, `main_user_group_id`, `department_id`) VALUES 
  (1,1,1);
COMMIT;

#
# Data for the `user_accounts` table  (LIMIT 0,500)
#

INSERT INTO `user_accounts` (`user_account_id`, `username`, `password`, `email`, `employee_id`, `student_id`, `active`, `user_group_id`, `date_created`, `date_modified`) VALUES 
  (2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','admin',0,0,1,1,'2016-05-08 20:37:58','0000-00-00 00:00:00'),
  (3,'paul','d033e22ae348aeb5660fc2140aec35850c4da997','paul@gmail.com',0,0,1,1,'2016-05-08 20:58:13','0000-00-00 00:00:00');
COMMIT;

#
# Data for the `user_groups` table  (LIMIT 0,500)
#

INSERT INTO `user_groups` (`user_group_id`, `user_group_title`, `user_group_desc`, `active`, `date_created`, `date_modified`) VALUES 
  (1,'ADMINISTRATOR','FULL ACCESS ',1,'2016-05-07 06:50:07','0000-00-00 00:00:00'),
  (2,'DEAN','sds',0,'2016-05-07 07:01:32','0000-00-00 00:00:00'),
  (3,'ds','ds',0,'2016-05-07 07:01:29','0000-00-00 00:00:00');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;