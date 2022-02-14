-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 03:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mams2`
--

-- --------------------------------------------------------

--
-- Table structure for table `amc`
--

CREATE TABLE `amc` (
  `amc_id` int(11) NOT NULL,
  `amc_name` varchar(255) NOT NULL,
  `amc_website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amc`
--

INSERT INTO `amc` (`amc_id`, `amc_name`, `amc_website`) VALUES
(1, 'No AMC', 'N/A'),
(2, 'Mercury', 'mercury network');

-- --------------------------------------------------------

--
-- Table structure for table `appraiser`
--

CREATE TABLE `appraiser` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `app_email` varchar(100) NOT NULL,
  `app_title` varchar(100) NOT NULL,
  `app_license` varchar(100) NOT NULL,
  `app_phone` varchar(100) NOT NULL,
  `app_home` varchar(100) NOT NULL,
  `app_fax` varchar(100) NOT NULL,
  `app_pager` varchar(100) NOT NULL,
  `app_number` varchar(100) DEFAULT NULL,
  `app_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appraiser`
--

INSERT INTO `appraiser` (`app_id`, `app_name`, `app_email`, `app_title`, `app_license`, `app_phone`, `app_home`, `app_fax`, `app_pager`, `app_number`, `app_active`) VALUES
(1, 'Kim Palmer', 'kimpalmer77@comcsat.net', 'Appraiser', '4001005370', '5712217176', '', '', '', '', 'checked'),
(2, 'Despina Gellios', 'dgellios@comcast.net', 'Appraiser', '4001007861', '7039320048', '', '', '', '', 'checked'),
(3, 'Jamie Lechner', 'lechnerjamie@gmail.com', 'Appraiser', '4001012940', '7033951302', '', '', '', '', 'checked'),
(4, 'Karen Scott', 'kscott@gmail.com', 'Appraiser', '4001005', '5551112222', '', '', '', '', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_addon`
--

CREATE TABLE `assignment_addon` (
  `ao_id` int(11) NOT NULL,
  `ao_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_addon`
--

INSERT INTO `assignment_addon` (`ao_id`, `ao_name`) VALUES
(1, 'ADU'),
(2, 'Operating Income Statement'),
(3, 'REO Addendum'),
(4, 'Rent Comparable Schedule');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_types`
--

CREATE TABLE `assignment_types` (
  `at_id` int(11) NOT NULL,
  `at_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_types`
--

INSERT INTO `assignment_types` (`at_id`, `at_name`) VALUES
(8, 'Purchase '),
(9, 'Refinance '),
(10, 'REO '),
(11, 'PMI Release '),
(12, 'Estate Purposes '),
(13, 'Field Review '),
(14, 'Desk Review '),
(15, 'Recert '),
(16, 'Trip Fee '),
(17, 'Reinspection ');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_country_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_country_id`, `city_name`) VALUES
(1, 1, 'New York City, NY'),
(3, 1, 'Los Angeles, CA'),
(4, 5, 'Chicago, IL'),
(420, 0, 'New City 641'),
(421, 0, 'Haymarket'),
(422, 0, 'Chantilly'),
(423, 0, 'Aldie'),
(424, 0, 'Gainesville');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cl_id` int(11) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `cl_folder_name` varchar(50) NOT NULL,
  `cl_contact` varchar(255) DEFAULT NULL,
  `cl_address` varchar(100) DEFAULT NULL,
  `cl_address2` varchar(100) DEFAULT NULL,
  `cl_city` varchar(100) DEFAULT NULL,
  `cl_state` varchar(100) DEFAULT NULL,
  `cl_zipcode` varchar(100) DEFAULT NULL,
  `cl_phone` varchar(100) DEFAULT NULL,
  `cl_fax` varchar(100) DEFAULT NULL,
  `cl_type` varchar(100) DEFAULT NULL,
  `cl_amc` varchar(100) DEFAULT NULL,
  `cl_amc_id` int(50) DEFAULT NULL,
  `cl_amc_website` varchar(50) DEFAULT NULL,
  `cl_email` varchar(100) DEFAULT NULL,
  `cl_website` varchar(255) DEFAULT NULL,
  `cl_email2` varchar(255) DEFAULT NULL,
  `cl_ins` varchar(5000) DEFAULT NULL,
  `cl_file` varchar(500) DEFAULT NULL,
  `cl_active` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cl_id`, `cl_name`, `cl_folder_name`, `cl_contact`, `cl_address`, `cl_address2`, `cl_city`, `cl_state`, `cl_zipcode`, `cl_phone`, `cl_fax`, `cl_type`, `cl_amc`, `cl_amc_id`, `cl_amc_website`, `cl_email`, `cl_website`, `cl_email2`, `cl_ins`, `cl_file`, `cl_active`) VALUES
(1, 'VA', 'VA', '', 'N/A', '', 'test city', NULL, '', '', '', NULL, NULL, 1, '', '', '', '', 'FHA inspection, no 1004mc required.  ', '', 'checked'),
(2, 'Caliber Home Loans', 'Caliber Home Loans', '', '1525 South Beltline Rd', '', 'old city', NULL, '75019', '', '', NULL, NULL, 0, '', '', 'AppraisalPort', '', '', '', 'checked'),
(3, 'Intercoastal Mortgage, LLC', 'Intercoastal Mortgage, LLC', '', '4100 Monument Corner Dr', '', 'test cit', NULL, '22030', '', '', NULL, NULL, 1, '', '', 'https://intercoastalmortgage.aim-port.com/vendor.php', '', '', '', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_state` varchar(100) NOT NULL,
  `company_zip` varchar(100) NOT NULL,
  `company_phone` varchar(100) NOT NULL,
  `company_fax` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_web` varchar(100) NOT NULL,
  `company_statement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(5, 'Cook'),
(6, 'DuPage '),
(7, 'Will '),
(8, 'Manassas Park City');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `loan_id` int(11) NOT NULL,
  `loan_name` varchar(255) NOT NULL,
  `loan_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`loan_id`, `loan_name`, `loan_desc`) VALUES
(2, 'FHA', 'FHA Inspection Required'),
(3, 'Conventional', 'Comment if utilities on and operaional'),
(4, 'VHDA-FHA', 'FHA Inspection, Comment if any unfinished areas and cost to complete'),
(5, 'VHDA-Conventional', 'FHA Inspection, Comment if any unfinished areas and cost to complete'),
(6, 'USDA', 'FHA Inspection, comment if land can be subdivided'),
(7, 'VA', 'Similar to FHA inspection, no 1004mc required'),
(8, 'FHA-203K', 'FHA subject to completion of work to be done'),
(9, 'Private', 'Use old form'),
(10, 'xx', 'x'),
(11, 'xx', 'x'),
(12, '1025 Multi Family', 'See notes if operating income statement is required'),
(13, 'Draw Inspection', 'x'),
(14, 'Rent Schedule', 'x'),
(15, 'Operating Income Statement', 'x'),
(16, 'Rent Schedule/Operating Income Statement', 'x'),
(17, 'Desktop Valuation', 'DVR'),
(18, '2075 Driveby', 'x'),
(19, 'Field Review 2000', 'x'),
(20, 'Desk Review', 'x'),
(21, 'Update of Value', '1004D form'),
(22, 'Trip Fee', 'x'),
(23, 'Final Inspection', '1004D form');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `notes` varchar(5000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `hide_client` varchar(255) NOT NULL,
  `hide_appraiser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `order_id`, `user_id`, `subject`, `notes`, `date`, `hide_client`, `hide_appraiser`) VALUES
(1, 'MRQ-72770', 2, 'VA', 'Similar to FHA inspection, no 1004mc required ', '2022/01/28 10:57:32am', 'off', 'off'),
(2, 'MRQ-72770', 2, 'Client Special Instruction', 'FHA inspection, no 1004mc required.  ', '2022/01/28 10:57:32am', 'off', 'off'),
(3, 'MRQ-72770', 2, 'Status', 'Sent email to borrower to schedule/testing....', '2022/01/28 11:12:33am', 'off', 'off'),
(4, 'MRQ-72770', 2, 'testing', 'hide from appraiser', '2022/01/28 11:13:15am', 'off', 'on'),
(5, 'MRQ-72771', 3, 'Conventional', 'Comment if utilities on and operaional ', '2022/02/08 12:43:15pm', 'off', 'on'),
(6, 'MRQ-72771', 3, 'Client Special Instruction', 'FHA inspection, no 1004mc required.  ', '2022/01/31 04:24:27pm', 'off', 'off'),
(7, 'MRQ-72878', 3, 'Conventional', 'Comment if utilities on and operaional ', '2022/02/01 09:30:36am', 'off', 'off'),
(8, 'MRQ-72878', 3, 'Client Special Instruction', '', '2022/02/01 09:30:36am', 'off', 'off'),
(9, 'MRQ-72883', 2, 'FHA', 'FHA Inspection Required ', '2022/02/01 10:43:24am', 'off', 'off'),
(10, 'MRQ-72883', 2, 'Client Special Instruction', '', '2022/02/01 10:43:24am', 'off', 'off'),
(11, 'MRQ-72884', 3, 'Client Special Instruction', '', '04/02/2022 05:03:29am', 'off', 'off'),
(12, 'MRQ-72771', 3, 'New Subject', 'New Notes update', '2022/02/08 12:55:56pm', 'off', 'on'),
(13, 'MRQ-72884', 3, 'Client Special Instruction', '', '02/08/2022 02:03:03pm', 'off', 'off'),
(14, 'MRQ-72885', 3, 'Client Special Instruction', '', '02/14/2022 01:41:13pm', 'off', 'off'),
(15, 'MRQ-72886', 3, 'Client Special Instruction', 'FHA inspection, no 1004mc required.  ', '02/14/2022 01:41:47pm', 'off', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_number` varchar(50) NOT NULL,
  `order_address` varchar(100) DEFAULT NULL,
  `order_type_id` varchar(100) DEFAULT NULL,
  `order_loan_number` varchar(100) DEFAULT NULL,
  `order_city` varchar(100) DEFAULT NULL,
  `order_assignment_id` varchar(100) DEFAULT NULL,
  `order_assignment_id2` varchar(100) DEFAULT NULL,
  `order_assignment_id3` varchar(100) DEFAULT NULL,
  `order_case_number` varchar(100) DEFAULT NULL,
  `order_state` varchar(100) DEFAULT NULL,
  `order_status_id` varchar(100) DEFAULT NULL,
  `order_client_id` varchar(100) DEFAULT NULL,
  `order_client_id2` varchar(100) DEFAULT NULL,
  `order_amc` varchar(100) DEFAULT NULL,
  `order_zipcode` varchar(100) DEFAULT NULL,
  `order_action` varchar(100) DEFAULT NULL,
  `order_date` varchar(100) DEFAULT NULL,
  `order_borrower` varchar(100) DEFAULT NULL,
  `order_co_borrower` varchar(100) DEFAULT NULL,
  `order_duedate` varchar(100) DEFAULT NULL,
  `order_entry` varchar(100) DEFAULT NULL,
  `order_appointmentdate` varchar(100) DEFAULT '',
  `order_appraiser_id` varchar(100) DEFAULT NULL,
  `order_appraiser_id2` varchar(100) DEFAULT NULL,
  `order_appraiser_email` varchar(100) DEFAULT NULL,
  `order_appraiser_email2` varchar(100) DEFAULT NULL,
  `order_appointment_time` varchar(100) DEFAULT NULL,
  `order_phone` varchar(100) DEFAULT NULL,
  `order_phone2` varchar(100) DEFAULT NULL,
  `order_phone3` varchar(100) DEFAULT NULL,
  `order_completedate` varchar(100) DEFAULT NULL,
  `order_paymentmethod` varchar(100) DEFAULT NULL,
  `order_purchase` varchar(100) DEFAULT NULL,
  `order_revenue` varchar(100) DEFAULT NULL,
  `order_expense` varchar(100) DEFAULT NULL,
  `order_website` varchar(100) DEFAULT NULL,
  `order_instruction` varchar(5000) DEFAULT NULL,
  `order_loan_type` varchar(255) NOT NULL,
  `order_assignment_addon` varchar(255) NOT NULL,
  `order_borrower_phone1` varchar(255) NOT NULL,
  `order_borrower_phone2` varchar(255) NOT NULL,
  `order_borrower_phone3` varchar(255) NOT NULL,
  `order_borrower_email` varchar(255) NOT NULL,
  `order_borrower_email2` varchar(50) NOT NULL,
  `order_sub_app_expense` varchar(255) NOT NULL,
  `order_v_client` varchar(50) DEFAULT NULL,
  `order_v_appraiser` varchar(50) DEFAULT NULL,
  `order_file` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_number`, `order_address`, `order_type_id`, `order_loan_number`, `order_city`, `order_assignment_id`, `order_assignment_id2`, `order_assignment_id3`, `order_case_number`, `order_state`, `order_status_id`, `order_client_id`, `order_client_id2`, `order_amc`, `order_zipcode`, `order_action`, `order_date`, `order_borrower`, `order_co_borrower`, `order_duedate`, `order_entry`, `order_appointmentdate`, `order_appraiser_id`, `order_appraiser_id2`, `order_appraiser_email`, `order_appraiser_email2`, `order_appointment_time`, `order_phone`, `order_phone2`, `order_phone3`, `order_completedate`, `order_paymentmethod`, `order_purchase`, `order_revenue`, `order_expense`, `order_website`, `order_instruction`, `order_loan_type`, `order_assignment_addon`, `order_borrower_phone1`, `order_borrower_phone2`, `order_borrower_phone3`, `order_borrower_email`, `order_borrower_email2`, `order_sub_app_expense`, `order_v_client`, `order_v_appraiser`, `order_file`) VALUES
('MRQ-72770', '15100 SKY VALLEY DR', '6', '34253', '420', '9', NULL, NULL, '72-72-6-1216406', NULL, '13', '1', NULL, NULL, '20169', 'Yes', '2022/11/11', 'TYRONE BURNETT', '', '02/23/2022', 'TYRONE', '11/13/2022', '1', '', 'kimpalmer77@comcsat.net', NULL, '--', NULL, NULL, NULL, '11/11/2022', 'Bill Client', '', '600', '0', NULL, 'LOANDEPOT.COM, LLC 26642 TOWN CENTRE DR, FOOTHILL RANCH, CA 92610 NO AAPP', '7', '4', '5714849651', '', '', '', '', '', NULL, NULL, ''),
('MRQ-72771', '123 Main', '6', '', '422', '8', NULL, NULL, '548-1234567', NULL, '14', '1', NULL, NULL, '20169', 'No', '2022/01/11', 'John Smith', '', '08/24/2022', 'Agent', '01/11/2022', '1', '', 'kimpalmer77@comcsat.net', NULL, '--', NULL, NULL, NULL, '11/11/2022', 'Bill Client', '123450', '500', '300', NULL, '', '3', '2', '', '', '', '', '', '', NULL, NULL, ''),
('MRQ-72878', '4570 PERCH BRANCH WAY', '6', '4535', '421', '9', NULL, NULL, '123123123', NULL, '6', '2', NULL, NULL, '22193', 'No', '2022/11/12', 'NORA CORTES', '', '02/24/2022', 'NORA', '01/11/2022', '1', '', 'kimpalmer77@comcsat.net', NULL, '--', NULL, NULL, NULL, '11/11/2022', 'Bill Client', '', '525', '250', NULL, 'RUSH', '3', '', '5713305762', '', '', 'NORA@NORA.COM', 'NORA@NORA.COM', '', NULL, NULL, ''),
('MRQ-72883', '75 SPOON SQ', '6', '', '422', '8', NULL, NULL, '5443436926', NULL, '8', '3', NULL, NULL, '22030', 'No', '2022/11/01', 'MICHELLE SMOOT', '', '02/08/2022', 'AGENT', '01/11/2022', '4', '', 'kscott@gmail.com', NULL, '--', NULL, NULL, NULL, '11/11/2022', 'Bill Client', '250000', '550', '250', NULL, '', '2', '', '', '', '', '', '', '', NULL, NULL, ''),
('MRQ-72884', 'qwe', '6', '352345345', '4', '10', NULL, NULL, '', NULL, '6', '2', NULL, NULL, '23123', 'No', '2022/02/08', 'dfsdfa', '', '02/18/2022', 'qw', '02/14/2022', '1', '', 'kimpalmer77@comcsat.net', NULL, '--', NULL, NULL, NULL, NULL, 'Bill Client', '', '200', '100', NULL, '', '3', '', '', '', '', '', '', '', NULL, NULL, ''),
('MRQ-72885', 'fsdfasdf', '6', '4333344', '422', '13', NULL, NULL, '', NULL, '6', '2', NULL, NULL, '23234', 'No', '2022/02/14', 'sdfs', '', '05/07/2022', '23234', '', '3', '', 'lechnerjamie@gmail.com', NULL, '--', NULL, NULL, NULL, NULL, 'Bill Client', '', '444', '', NULL, '', '18', '', '', '', '', '', '', '', NULL, NULL, ''),
('MRQ-72886', 'asdf', '6', '98765', '422', '12', NULL, NULL, '', NULL, '6', '1', NULL, NULL, '23', 'No', '2022/02/14', 'asdf', '', '03/09/2022', 'asdf', '', '4', '', 'kscott@gmail.com', NULL, '--', NULL, NULL, NULL, NULL, 'Bill Client', '', '765', '', NULL, '', '3', '', '', '', '', '', '', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`order_id`, `order_name`) VALUES
(5, 'Unused '),
(6, '1004 Single Family '),
(7, '2055 Exterior '),
(8, '2055 Exterior/Interior '),
(9, '1073 Condo '),
(10, '1025 Two-Four Unit '),
(14, '2075 '),
(15, 'Field Review 2000 '),
(16, 'Desk Review '),
(17, '1004 D'),
(18, 'Trip Fee '),
(19, '1075 Exterior Condo'),
(20, 'Land ');

-- --------------------------------------------------------

--
-- Table structure for table `status_info`
--

CREATE TABLE `status_info` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_info`
--

INSERT INTO `status_info` (`st_id`, `st_name`) VALUES
(6, 'Assigned'),
(7, 'Setting Appt '),
(8, 'Wait for Appt '),
(9, 'Being Typed '),
(10, 'On Hold '),
(11, 'Typed edit '),
(12, 'Being Reviewed '),
(13, 'Being Final Proofed '),
(14, 'QA Issues '),
(15, 'Complete '),
(16, 'Canceled '),
(17, 'Unassigned');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_app` varchar(10) NOT NULL,
  `user_lastlogin` varchar(250) DEFAULT NULL,
  `user_logintime` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_email`, `user_pass`, `user_role`, `user_app`, `user_lastlogin`, `user_logintime`) VALUES
(2, 'manager', 'manager@gmail.com', '123', 'manager', '', NULL, NULL),
(3, 'owner', 'owner@gmail.com', '123', 'owner', '', '::1', '02/14/2022 07:38:37am'),
(5, 'faraztest', 'qwe@qwe.com', '123', 'appraiser', '2', NULL, NULL),
(6, 'Kim Palmer', 'kimpalmer77@comcast.net', 'jaxson69', 'appraiser', '1', '::1', '02/08/2022 07:02:05am'),
(7, 'Katie Linthicum', 'mrq@marqueeappraisal.com', 'test', 'owner', '', NULL, NULL),
(8, 'Despina Gellios', 'dgellios@comcast.net', 'test', 'appraiser', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `v_id` int(11) NOT NULL,
  `v_number` varchar(50) NOT NULL,
  `v_cl_id` varchar(50) NOT NULL,
  `v_app_id` varchar(50) NOT NULL,
  `v_date` varchar(50) NOT NULL,
  `v_total` varchar(50) NOT NULL,
  `v_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `web_id` int(11) NOT NULL,
  `web_username` varchar(100) NOT NULL,
  `web_login` varchar(100) NOT NULL,
  `web_password` varchar(100) NOT NULL,
  `web_seclevel` varchar(100) NOT NULL,
  `web_description` varchar(100) NOT NULL,
  `web_lastloginip` varchar(100) NOT NULL,
  `web_lastlogindate` varchar(100) NOT NULL,
  `web_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`web_id`, `web_username`, `web_login`, `web_password`, `web_seclevel`, `web_description`, `web_lastloginip`, `web_lastlogindate`, `web_active`) VALUES
(2, 'username edit', 'login edit', 'pass edit', '3', '2qwdasdasd edcit', '', '', 'checked'),
(3, 'admin', 'abc123', 'abc123', '1', 'Description here', '', '', 'checked');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amc`
--
ALTER TABLE `amc`
  ADD PRIMARY KEY (`amc_id`);

--
-- Indexes for table `appraiser`
--
ALTER TABLE `appraiser`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `assignment_addon`
--
ALTER TABLE `assignment_addon`
  ADD PRIMARY KEY (`ao_id`);

--
-- Indexes for table `assignment_types`
--
ALTER TABLE `assignment_types`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `status_info`
--
ALTER TABLE `status_info`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amc`
--
ALTER TABLE `amc`
  MODIFY `amc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appraiser`
--
ALTER TABLE `appraiser`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignment_addon`
--
ALTER TABLE `assignment_addon`
  MODIFY `ao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignment_types`
--
ALTER TABLE `assignment_types`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status_info`
--
ALTER TABLE `status_info`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
