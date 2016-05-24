-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 12:56 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announce_id` bigint(20) NOT NULL,
  `announce_description` longtext,
  `post_shown_date` date DEFAULT '0000-00-00',
  `post_expire_date` date DEFAULT '0000-00-00',
  `post_by_user_id` int(11) DEFAULT '0',
  `modified_date` datetime DEFAULT NULL,
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announce_id`, `announce_description`, `post_shown_date`, `post_expire_date`, `post_by_user_id`, `modified_date`, `posted_date`, `is_active`, `is_deleted`) VALUES
(185, '<span style="font-weight: bold;">sdsdsd</span><div><span style="font-weight: bold;">fdfdfdfdf</span></div>', '2016-05-22', '2016-05-22', 2, NULL, '2016-05-22 17:24:09', b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_viewers`
--

CREATE TABLE `announcement_viewers` (
  `announce_deparment_id` bigint(20) NOT NULL,
  `department_id` int(11) DEFAULT '0' COMMENT 'WHICH COURSE IS ALLOWED TO VIEW THIS ANNOUNCEMENT',
  `announce_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement_viewers`
--

INSERT INTO `announcement_viewers` (`announce_deparment_id`, `department_id`, `announce_id`) VALUES
(173, 1, 185),
(174, 5, 185);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT '',
  `course_title` varchar(255) DEFAULT '',
  `department_id` int(11) DEFAULT '0',
  `course_desc` varchar(255) DEFAULT '',
  `active` int(255) DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `department_id`, `course_desc`, `active`, `date_created`, `date_modified`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 1, 'This course is desig', 1, '2016-05-06 23:41:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_title` varchar(255) NOT NULL,
  `department_desc` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_title`, `department_desc`, `active`, `date_created`, `date_modified`) VALUES
(1, 'Computer', 'This is a sample text\r\n', 1, '2016-05-06 22:22:28', '0000-00-00 00:00:00'),
(5, 'DITE', '<h2><span style="font-style: italic;">sd<span style="font-weight: bold;">sds</span></span></h2>', 1, '2016-05-07 23:12:15', '0000-00-00 00:00:00'),
(6, 'Depart of Information', 'This is a sample text', 1, '2016-05-14 03:16:04', '0000-00-00 00:00:00'),
(7, 'sdsdsds', 'sdsd<span style="font-weight: bold;">sd</span>', 1, '2016-05-14 05:28:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(255) NOT NULL,
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
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `user_account_id`, `employee_no`, `emp_fname`, `department_id`, `emp_mname`, `emp_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `date_modified`) VALUES
(1, 2, 'asa', 'DENIS', 1, 'BAUN', 'GUTIERREZ', '0999999', '123', '123', '123', '13', '123', '123', '0000-00-00', 'sd', 'Filipino', 'Male', 'Single', 1, '2016-05-22 16:07:22', '0000-00-00 00:00:00'),
(2, 5, 'adminadmin', 'adminadmin', 1, 'adminadmin', 'adminadmin', 'adminadmin', 'adminadmin', 'adminadmin', 'adminadmin', 'adminadmin', 'adminadmin', 'adminadmin', '0000-00-00', 'adminadmin', 'adminadmin', 'Male', 'adminadmin', 1, '2016-05-22 17:00:29', '0000-00-00 00:00:00'),
(3, 6, 'axxxxxxxxxxxxxxxxx', 'axxxxxxxxxxxxxxxxx', 1, 'axxxxxxxxxxxxxxxxx', 'axxxxxxxxxxxxxxxxx', 'axxxxxxxxxxxxxxxxx', '', '', '', '', '', '', '0000-00-00', '', '', 'Male', '', 1, '2016-05-22 17:22:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `link_table`
--

CREATE TABLE `link_table` (
  `link_table_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `alias_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_table`
--

INSERT INTO `link_table` (`link_table_id`, `link`, `alias_id`, `description`, `active`, `date_created`, `date_modified`) VALUES
(3, 'Dashboard', '1', 'Dashboard', 1, '0000-00-00 00:00:00', '0000-00-00'),
(4, 'Announcement', '2-1', 'Announcement', 1, '0000-00-00 00:00:00', '0000-00-00'),
(5, 'Task', '2-2', 'Task', 1, '0000-00-00 00:00:00', '0000-00-00'),
(6, 'User Management', '3-1', 'User Management', 1, '0000-00-00 00:00:00', '0000-00-00'),
(7, 'User Group Management', '3-2', 'User Group Management', 1, '0000-00-00 00:00:00', '0000-00-00'),
(8, 'Department Management', '4-1', 'Department Management', 1, '0000-00-00 00:00:00', '0000-00-00'),
(9, 'Course Management', '4-2', 'Course Management', 1, '0000-00-00 00:00:00', '0000-00-00'),
(10, 'User Group Setting', '6-1', 'User Group Setting', 1, '0000-00-00 00:00:00', '0000-00-00'),
(11, 'User Profile', '6-2', 'User Profile', 1, '0000-00-00 00:00:00', '0000-00-00'),
(12, 'System Setting', '6-3', 'System Setting', 1, '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(255) NOT NULL,
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
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_account_id`, `student_no`, `course_id`, `stud_fname`, `stud_mname`, `stud_lname`, `contact_no`, `house_no`, `street`, `barangay`, `municipality`, `zipcode`, `province`, `birthdate`, `birthplace`, `nationality`, `gender`, `civil_status`, `active`, `date_created`, `date_modified`) VALUES
(1, 4, '090999', 1, 'Jennifer', 'Santos', 'Labuyo', '900009', 'abc', 'abc', 'abc', 'abc', 122, 'abc', '2019-01-01', 'Mexico', 'Filipino', 'Male', 'Filipino', 1, '2016-05-22 16:11:26', '0000-00-00 00:00:00'),
(2, 7, 'cccccccccccccc', 1, 'cccccccccccccc', 'cccccccccccccc', 'cccccccccccccc', '', '', '', '', '', 0, '', '0000-00-00', '', '', 'Male', '', 1, '2016-05-22 17:23:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` bigint(20) NOT NULL,
  `task_title` varchar(255) DEFAULT NULL,
  `task_description` text,
  `task_status` varchar(55) DEFAULT NULL,
  `submission_deadline` datetime DEFAULT NULL,
  `is_document_required` bit(1) DEFAULT b'0',
  `posted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_distribution_group`
--

CREATE TABLE `task_distribution_group` (
  `distribution_id` bigint(20) NOT NULL,
  `main_user_group_id` int(11) DEFAULT '0',
  `department_id` int(11) DEFAULT '0' COMMENT 'WHICH USER GROUP ALLOWED TO RECEIVED TASK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_distribution_group`
--

INSERT INTO `task_distribution_group` (`distribution_id`, `main_user_group_id`, `department_id`) VALUES
(38, 1, 1),
(39, 1, 5),
(40, 1, 6),
(41, 1, 7),
(42, 4, 1),
(43, 4, 5),
(44, 4, 6),
(45, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `task_viewers`
--

CREATE TABLE `task_viewers` (
  `task_viewer_id` int(20) NOT NULL,
  `task_id` bigint(20) DEFAULT '0',
  `user_account_id` bigint(20) DEFAULT '0',
  `date_accomplished` datetime DEFAULT '0000-00-00 00:00:00',
  `is_accomplished` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `employee_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `user_group_id` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_account_id`, `username`, `password`, `email`, `employee_id`, `student_id`, `active`, `user_group_id`, `date_created`, `date_modified`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 0, 0, 1, 1, '2016-05-08 12:37:58', '0000-00-00 00:00:00'),
(3, 'paul', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'paul@gmail.com', 0, 0, 1, 1, '2016-05-08 12:58:13', '0000-00-00 00:00:00'),
(4, 'jen', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'jen_denz', 0, 0, 1, 4, '2016-05-22 16:10:58', '0000-00-00 00:00:00'),
(5, 'adminadmin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'adminadmin', 0, 0, 1, 1, '2016-05-22 17:00:29', '0000-00-00 00:00:00'),
(6, 'axxxxxxxxxxxxxxxxx', '7e87ed14e76d460e4f5b725857de5951d57a9dc4', 'axxxxxxxxxxxxxxxxx', 0, 0, 1, 1, '2016-05-22 17:22:43', '0000-00-00 00:00:00'),
(7, 'cccccccccccccc', '53f73fe516c9227054ed6853987cf4b8df084fbb', 'cccccccccccccc', 0, 0, 1, 4, '2016-05-22 17:23:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `user_group_id` int(11) NOT NULL,
  `user_group_title` varchar(255) NOT NULL DEFAULT '',
  `user_group_desc` varchar(255) NOT NULL DEFAULT '',
  `active` int(11) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`user_group_id`, `user_group_title`, `user_group_desc`, `active`, `date_created`, `date_modified`) VALUES
(1, 'ADMINISTRATOR', 'FULL ACCESS sdsds', 1, '2016-05-14 05:28:23', '0000-00-00 00:00:00'),
(2, 'DEAN', 'sds', 0, '2016-05-06 23:01:32', '0000-00-00 00:00:00'),
(3, 'ds', 'ds', 0, '2016-05-06 23:01:29', '0000-00-00 00:00:00'),
(4, 'STUDENT', 'asdads', 1, '2016-05-14 05:27:59', '0000-00-00 00:00:00'),
(5, 'dsd', 'sdsd', 1, '2016-05-22 17:23:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_priviledge`
--

CREATE TABLE `user_priviledge` (
  `user_priviledge_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `alias_id` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_priviledge`
--

INSERT INTO `user_priviledge` (`user_priviledge_id`, `user_group_id`, `alias_id`, `date_created`) VALUES
(86, 1, '1', '2016-05-22 16:04:22'),
(87, 1, '2-1', '2016-05-22 16:04:22'),
(88, 1, '2-2', '2016-05-22 16:04:22'),
(89, 1, '3-1', '2016-05-22 16:04:22'),
(90, 1, '3-2', '2016-05-22 16:04:22'),
(91, 1, '4-1', '2016-05-22 16:04:22'),
(92, 1, '4-2', '2016-05-22 16:04:22'),
(93, 1, '6-1', '2016-05-22 16:04:22'),
(94, 1, '6-2', '2016-05-22 16:04:22'),
(95, 1, '6-3', '2016-05-22 16:04:22'),
(96, 4, '1', '2016-05-22 16:18:37'),
(97, 4, '2-1', '2016-05-22 16:18:37'),
(98, 4, '2-2', '2016-05-22 16:18:37'),
(99, 4, '3-1', '2016-05-22 16:18:37'),
(100, 4, '3-2', '2016-05-22 16:18:37'),
(101, 4, '4-1', '2016-05-22 16:18:37'),
(102, 4, '4-2', '2016-05-22 16:18:37'),
(103, 4, '6-1', '2016-05-22 16:18:37'),
(104, 4, '6-2', '2016-05-22 16:18:37'),
(105, 4, '6-3', '2016-05-22 16:18:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `announcement_viewers`
--
ALTER TABLE `announcement_viewers`
  ADD PRIMARY KEY (`announce_deparment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD UNIQUE KEY `course_code_2` (`course_code`),
  ADD UNIQUE KEY `course_code_3` (`course_code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `user_info_id` (`employee_id`);

--
-- Indexes for table `link_table`
--
ALTER TABLE `link_table`
  ADD PRIMARY KEY (`link_table_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `user_info_id` (`student_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_distribution_group`
--
ALTER TABLE `task_distribution_group`
  ADD PRIMARY KEY (`distribution_id`);

--
-- Indexes for table `task_viewers`
--
ALTER TABLE `task_viewers`
  ADD PRIMARY KEY (`task_viewer_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_account_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`user_group_id`);

--
-- Indexes for table `user_priviledge`
--
ALTER TABLE `user_priviledge`
  ADD PRIMARY KEY (`user_priviledge_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announce_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `announcement_viewers`
--
ALTER TABLE `announcement_viewers`
  MODIFY `announce_deparment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `link_table`
--
ALTER TABLE `link_table`
  MODIFY `link_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_distribution_group`
--
ALTER TABLE `task_distribution_group`
  MODIFY `distribution_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `task_viewers`
--
ALTER TABLE `task_viewers`
  MODIFY `task_viewer_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_priviledge`
--
ALTER TABLE `user_priviledge`
  MODIFY `user_priviledge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
