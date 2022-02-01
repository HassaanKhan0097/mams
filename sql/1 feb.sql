-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 08:04 PM
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
-- Database: `mams3`
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
(1, 'Guaranteed Rate', 'https://www.google.com/'),
(4, 'Loan Depot', 'https://www.yahoo.com/'),
(6, 'Mercury Network (Not an AMC)', 'https://vendors.mercuryvmp.com/'),
(7, 'New Amc 643', 'www.amc643.com');

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
(1, 'John Gilliard', 'farazahmed34296@gmail.com', 'Senior Appraiser', '1111', '5619485767', '222', '333', '4444', ' ', 'checked'),
(8, 'Jason Momoa', 'hunkyhunk@hotmale.com', 'Appraiser', '911', '8675309', '', '', '', '', 'checked'),
(9, 'New Appraiser 641', 'app641@gmail.com', 'Appraiser', '1111', '2222', '33333', '4444', '5', '', 'checked'),
(10, 'app 1237', 'asdjfkh@asdkfh.com', 'Senior Appraiser', '123123', '123123', '234234', '24', '34', '', 'checked'),
(12, 'Faraz testing', 'email@email.com', 'Senior Appraiser', '123', '123', '123', '123', '123', '', 'checked');

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
(420, 0, 'New City 641');

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
  `cl_amc_id` int(50) NOT NULL,
  `cl_amc_website` varchar(50) NOT NULL,
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
(21, 'loanDept.com, LLC', '', '', '15681 Hunton Lane', '', '3', 'Virginia', '20169', '7037547945', '', NULL, NULL, 4, 'www.appraisalport.com', 'kimpalmer77@comcast.net', '', 'kimpalmer77@comcast.net', 'Smoke and co commentary required', '', 'checked'),
(22, 'McLean Mortgage', '', '', '123 Main', '', '4', 'VA', '20169', '', '', NULL, NULL, 4, '', '', '', '', '', '', 'checked'),
(23, 'Home Savings & Trust Mortgage', '', 'Craig Cowen', '3701 Pender Dr #150', '', '3', 'VA', '22030', '7037664643', '', NULL, NULL, 4, '', 'ccowen@hstmortgage.com', 'https://vendors.mercuryvmp.com/', '', 'Testing, Testing 1, 2 3', '', 'checked'),
(24, 'Integrity Home Mortgage', '', 'Megan Babington', '122 Pilot Cir', '', '4', 'VA', '22602', '5408886402', '', NULL, NULL, 6, '', 'mbabington@ihmcloans.com', 'https://vendors.mercuryvmp.com/', '', 'IF the property is a PUD provide a comment regarding the subject PUDs common elements/amenities and ', '', 'checked'),
(28, 'Client Testing 1200', 'Client Testing 1200', '1111', 'Address', 'Address 2', '4', NULL, '2222', '3333', '4444', NULL, NULL, 4, '', 'email@email.com', 'www.website.com', 'email2@email.com', 'Special Instruction goes here', '213213088556051.pdf,large.jpg,pexels-ivan-samkov-5676744.jpg', 'checked'),
(29, 'New Client 643', 'New Client 643', '111111', '642 address', '642 address 2', '420', NULL, '1111', '222', '3333', NULL, NULL, 7, '', '642client@gmail.com', 'www.cl642.com', '642client@gmail2.com', 'Special Description goes here', 'd2_800x533.jpg,d3_800x553.jpg', 'checked'),
(31, 'Faraz testing Client', 'Faraz testing Client', '123', '3577  Pleasant Hill Road', 'sdaf', '420', NULL, '21153', '5619485767', '', NULL, NULL, 1, '', 'faraztesting@gmail.com', 'www.clienttesting.com', 'sekeyot620@bcpfm.com', 'Dont message. ', 'UI-47.png', 'checked');

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

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_zip`, `company_phone`, `company_fax`, `company_email`, `company_web`, `company_statement`) VALUES
(1, 'Company  Name edit 2', 'Company Addres edit', 'Conpany City edit', 'Compaby state edit', 'Company zp edit', '98798797978979999', '789456', 'email@emailedit.com', 'www.addressedit.com', 'statemente here edit');

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
(2, 'FHA', 'Fha Description Goes Here'),
(3, 'Conventional', 'Conventional Description Goes Here'),
(4, 'VHDA-FHA', ' VHDA-FHA Description Goes Here'),
(5, 'VHDA-Conventional', 'VHDA-Conventional Description Goes Here'),
(6, 'USDA', 'USDA Description Goes Here'),
(7, 'VA', 'Va Description Goes Here'),
(8, 'FHA-203K', 'FHA-203K Description Goes Here');

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
(1, '123', 2, 'Testing Subject 12 3 123', 'Testing notess123123', '2021/10/07 11:18:04am', 'off', 'on'),
(2, '123', 2, 'Testong 2 subject', 'Testing 2 notesasdfkljlasdfk', '2021/10/07 10:40:22am', 'on', 'off'),
(3, '123', 2, 'djkasfhkasdfj;klf', 'poqw;lk;dacvxczvwd', '2021/10/07 10:44:12am', 'off', 'on'),
(4, '1000', 2, 'new note3', 'Notes desc3\r\n', '2021/10/19 07:53:16am', 'off', 'on'),
(5, 'MRQ-1002', 2, 'VA', 'Va Description Goes Here ', '2021/10/19 02:08:24pm', 'off', 'off'),
(6, 'MRQ-1001', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/01 03:33:30pm', 'off', 'off'),
(7, 'MRQ-12345', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/05 06:04:13pm', 'off', 'off'),
(8, 'MRQ-12345', 2, 'Client Special Instruction', 'Smoke and co commentary required', '2021/11/05 06:04:13pm', 'off', 'off'),
(9, 'MRQ-12346', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/05 06:16:53pm', 'off', 'off'),
(10, 'MRQ-12346', 2, 'Client Special Instruction', '', '2021/11/05 06:16:53pm', 'off', 'off'),
(11, 'MRQ-12347', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/08 02:07:09pm', 'off', 'off'),
(12, 'MRQ-12347', 2, 'Client Special Instruction', 'Testing, Testing 1, 2 3', '2021/11/08 02:07:09pm', 'off', 'off'),
(13, 'MRQ-12347', 2, 'Update', 'Update 1, 2, 3', '2021/11/08 02:30:53pm', 'off', 'off'),
(14, 'MRQ-12348', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/18 03:30:38pm', 'off', 'on'),
(15, 'MRQ-12348', 2, 'Client Special Instruction', 'IF the property is a PUD provide a comment regarding the subject PUDs common elements/amenities and ', '2021/11/18 03:18:34pm', 'off', 'off'),
(16, 'MRQ-12348', 2, 'Test', 'Testing testing 1 2 3', '2021/11/18 03:35:30pm', 'off', 'on'),
(17, 'MRQ-12348', 2, 'Test', 'Testing testing 1 2 3 4', '2021/11/18 03:37:41pm', 'off', 'off'),
(18, 'MRQ-12349', 2, 'FHA', 'Fha Description Goes Here ', '2021/11/22 07:37:31pm', 'off', 'off'),
(19, 'MRQ-12349', 2, 'Client Special Instruction', 'Client is good.', '2021/11/22 07:37:31pm', 'off', 'off'),
(20, 'MRQ-12350', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/22 07:57:06pm', 'off', 'off'),
(21, 'MRQ-12350', 2, 'Client Special Instruction', 'asdasdasasdasd we rqwe rasd afd asdf grw r rerwsf ', '2021/11/22 07:57:06pm', 'off', 'off'),
(22, 'MRQ-12350', 2, 'VHDA-FHA', ' VHDA-FHA Description Goes Here ', '2021/11/22 08:03:45pm', 'off', 'off'),
(23, 'MRQ-12350', 2, 'Client Special Instruction', 'Special Instruction goes here', '2021/11/22 08:03:45pm', 'off', 'off'),
(24, 'MRQ-12351', 2, 'Conventional', 'Conventional Description Goes Here ', '2021/11/30 02:45:41pm', 'off', 'off'),
(25, 'MRQ-12351', 2, 'Client Special Instruction', 'Special Description goes here', '2021/11/30 02:45:41pm', 'off', 'off'),
(26, 'MRQ-12352', 2, 'FHA', 'Fha Description Goes Here ', '2021/11/30 04:14:53pm', 'off', 'off'),
(27, 'MRQ-12352', 2, 'Client Special Instruction', 'Smoke and co commentary required', '2021/11/30 04:14:53pm', 'off', 'off'),
(28, 'MRQ-12351', 1, 'Subject here App 2', 'Notes Here app 2', '2021/11/30 11:51:57pm', 'off', 'off'),
(31, 'MRQ-12355', 3, 'FHA', 'Fha Description Goes Here ', '2022/01/25 03:29:19pm', 'off', 'off'),
(32, 'MRQ-12355', 3, 'Client Special Instruction', 'Dont send a text message', '2022/01/25 03:29:19pm', 'off', 'off'),
(36, 'MRQ-12353', 3, 'Conventional', 'Conventional Description Goes Here ', '2022/01/25 04:14:43pm', 'off', 'off'),
(37, 'MRQ-12353', 3, 'Client Special Instruction', 'Dont message. ', '2022/01/25 04:14:43pm', 'off', 'off'),
(38, 'MRQ-12353', 3, 'New Subjet', 'Notes will gone here', '2022/01/25 05:07:31pm', 'off', 'off'),
(39, 'MRQ-12347', 3, 'New Subject ', 'New Notes', '2022/01/31 06:56:21pm', 'off', 'off'),
(40, 'MRQ-12347', 3, 'New Subject 2', 'New Notes 2', '01/31/2022 06:57:38pm', 'off', 'off');

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
('MRQ-12345', '1215 Heykens Lane', '6', '', '3', '8', NULL, NULL, '548-1234567', NULL, '7', '22', NULL, NULL, '20136', 'No', '2020/10/13', 'John Smith', 'Hane Smith', '2021/11/18', 'Agent', '1969/12/31', '1', '10', NULL, NULL, '9:00am', NULL, NULL, NULL, '1969/12/31', 'Bill Client', '', '500.25', '250', NULL, 'please call agent.', '3', 'Rent Comparable Schedule', '7034054381', '', '', 'test@test.com', 'test@test.com', '50mathistitle.com', 'mc-123', '', 'of_condo,754 Ash St.pdf|of_client,23622 Jayadev Ter.pdf'),
('MRQ-12346', '12345 king st', '6', '12345', '3', '8', NULL, NULL, '548-1234567', NULL, '10', '22', NULL, NULL, '20169', 'No', '2021/07/07', 'Kim P', '', '2022/01/31', 'Agent', '1969/12/31', '1', '', NULL, NULL, '9:00am', NULL, NULL, NULL, '1969/12/31', 'Bill Client', '', '500.35', '250', NULL, '', '3', '', '', '', '', '', '', '', 'QWE-1235', '', ''),
('MRQ-12347', '3915 Fairfax Pkwy', '6', '', '3', '8', NULL, NULL, '', NULL, '7', '22', NULL, '', '99999', 'No', '2021/11/08', 'Stephan Faherty', 'Stephanie Faherty', '2021/11/15', 'Sarah Reynolds', '1969/12/31', '8', '', NULL, NULL, '9:00am', NULL, NULL, NULL, '1969/12/31', 'Bill Client', NULL, '475', '270', NULL, '', '3', '', '', '', '5717660907', 'sarahreynolds@rtrsells.com', '', '', '', NULL, ''),
('MRQ-12348', '8310 Sunnyside Ct', '6', '21119973119', '4', '9', NULL, NULL, '', NULL, '17', '24', NULL, NULL, '20111', 'No', '2021/11/18', 'Leslie Cross', 'Katherine Cross', '2022/03/04', 'Same', '1969/12/31', '8', '1', NULL, NULL, '9:00am', NULL, NULL, NULL, '1969/12/31', 'Bill Client', '', '475', '270', NULL, '', '3', 'Rent Comparable Schedule', '7035937573', '7033988329', '', 'cckakee@verizon.net', 'cckakee@verizon.net', '200', NULL, NULL, 'of_contract,SC72-72-6-1209078.pdf|of_comparable,Comps.pdf'),
('MRQ-12349', 'Block 2', '5', '', '4', '9', NULL, NULL, '', NULL, '10', '22', NULL, NULL, '75950', 'No', '2021/12/14', 'asdf', '', '2022/09/21', 'wet', '2021/12/31', '1', '', NULL, NULL, '--', NULL, NULL, NULL, NULL, 'COD', '', '24', '200', NULL, '', '2', 'Rent Comparable Schedule', '+923232588758', '', '', 'farazahmed34296@gmail.com', 'farazahmed34296@gmail.com', '', 'mc-123', 'John Clear', 'of_plat,Zoom-background-white.png|of_plat,Zoom-background-transparent.png|of_plat,Logo-white.png|of_plat,Logo-transparent.png'),
('MRQ-12350', 'Property addresss', '6', '', '4', '9', NULL, NULL, '', NULL, '17', '28', NULL, NULL, '75950', 'Yes', '2021/11/28', 'bbbb', '', '2021/12/04', 'dfef', '2021/11/22', '1', '8', NULL, NULL, '--', NULL, NULL, NULL, NULL, 'Credit Card', '', '123', '100', NULL, 'Special Instruction goes here', '4', 'Operating Income Statement', '+923232588758', '', '', 'farazahmed34296@gmail.com', 'asdfasfd@gmail.com', '', NULL, 'John Clear', 'of_option,213213088556051.pdf|of_option,Faraz w8ben-02.jpg|of_plat,d4_800x533.jpg|of_condo,WhatsApp Image 2021-11-19 at 11.51.36 AM.jpeg|of_client,pexels-ivan-samkov-5676744.jpg'),
('MRQ-12351', 'Proporte 645', '9', '1111', '4', '10', NULL, NULL, '2222', NULL, '17', '29', NULL, NULL, '213', 'No', '2021/11/30', 'borrower', '', '2021/09/13', '1111', '2021/11/22', '1', '8', NULL, NULL, '9:30am', NULL, NULL, NULL, NULL, 'Credit Card', '', '213', '1232', NULL, 'Special Instruction goes here', '3', 'Operating Income Statement', '', '', '', '', '', '12', 'MQW-4567', 'John Clear', 'of_option,d4_800x533.jpg|of_option,d5_800x533.jpg'),
('MRQ-12352', 'Proportw', '6', '', '3', '9', NULL, NULL, '', NULL, '15', '21', NULL, NULL, '75950', 'No', '2021/11/30', 'sgf', '', '2021/09/13', 'erdfgzdv', '2021/11/22', '1', '', NULL, NULL, '9:30am', NULL, NULL, NULL, NULL, 'Credit Card', '', '500', '1222', NULL, '', '2', 'Operating Income Statement', '03232588758', '', '', 'farazahmed34296@gmail.com', 'farazahmed34296@gmail.com', '', NULL, 'John Clear', ''),
('MRQ-12353', 'Block 2', '5', '123', '4', '9', NULL, NULL, '123', NULL, '10', '31', NULL, NULL, '75950', 'No', '2022/01/25', 'Borrower Name', '', '2022/03/16', 'entry contact', '2022/01/31', '12', '8', NULL, NULL, '--', NULL, NULL, NULL, NULL, 'Bill Client', '1000000', '500', '200', NULL, 'Gone here', '3', 'Operating Income Statement', '+923232588758', '', '', 'test@gmail.com', 'test@gmail.com', '100', NULL, 'qwertyuio', 'of_option,UI-03.png|of_option,UI-04.png|of_option,UI-05.png|of_plat,UI-38.jpg|of_plat,UI-39.jpg');

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
(9, 'Condo '),
(10, '1025 Two-Four Unit '),
(11, '1025 Mixed Use '),
(12, '704 Drive-By '),
(13, '71B Multifamily '),
(14, '2075 '),
(15, 'Field Review 2000 '),
(16, 'Desk Review '),
(17, 'Recert '),
(18, 'Trip Fee '),
(19, '442 '),
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
(6, 'Unassigned'),
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
(17, 'Assigned');

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
(1, 'appraiser', 'appraiser@gmail.com', '123', 'appraiser', '1', NULL, NULL),
(2, 'manager', 'manager@gmail.com', '123', 'manager', '', '10.20.30.40', '02/01/2022 04:26:09am'),
(3, 'owner', 'owner@gmail.com', '123', 'owner', '', '::1', '02/01/2022 01:03:26pm'),
(5, 'faraztest', 'qwe@qwe.com', '123', 'appraiser', '12', NULL, NULL);

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

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`v_id`, `v_number`, `v_cl_id`, `v_app_id`, `v_date`, `v_total`, `v_desc`) VALUES
(6, 'MQW-4567', '29', '', '2021/12/21', '213', 'Payment Description goes here'),
(7, 'QWE-1235', '22', '', '2021/12/21', '500.35', 'Payment All '),
(16, 'mc-123', '22', '', '01/25/2022', '524.25', 'desc will be here'),
(17, 'qwertyuio', '', '12', '01/25/2022', '200', 'fghjkl'),
(18, 'John Clear', '', '1', '02/16/2022', '2754', 'Payment Desc here');

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
  MODIFY `amc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appraiser`
--
ALTER TABLE `appraiser`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assignment_types`
--
ALTER TABLE `assignment_types`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
