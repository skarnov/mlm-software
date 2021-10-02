-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2017 at 12:27 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_globalhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_balance` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_balance`) VALUES
(1, 'Admin', 'admin@me.com', '111111', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balance_withdrawal`
--

CREATE TABLE `tbl_balance_withdrawal` (
  `withdrawal_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `agent_id` int(10) DEFAULT NULL,
  `date` varchar(35) NOT NULL,
  `withdrawal_method` tinyint(1) NOT NULL COMMENT '1 For Agent 2 For Bank',
  `withdrawal_amount` float(10,2) NOT NULL,
  `transaction_fee` float(5,2) NOT NULL,
  `net_amount` float(10,2) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(3) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv`
--

CREATE TABLE `tbl_cv` (
  `cv_id` int(2) NOT NULL,
  `cv_amount` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cv`
--

INSERT INTO `tbl_cv` (`cv_id`, `cv_amount`) VALUES
(1, 200.00),
(2, 400.00),
(3, 800.00),
(4, 1500.00),
(5, 2500.00),
(6, 3000.00),
(7, 4000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cv_creation`
--

CREATE TABLE `tbl_cv_creation` (
  `cv_creation_id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `creation_time` varchar(35) NOT NULL,
  `cv_amount` float(10,2) NOT NULL,
  `remaining_pin` tinyint(1) DEFAULT NULL,
  `activation_status` tinyint(1) NOT NULL COMMENT '1 For Active 0 For Not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cv_creation`
--

INSERT INTO `tbl_cv_creation` (`cv_creation_id`, `user_id`, `creation_time`, `cv_amount`, `remaining_pin`, `activation_status`) VALUES
(1, 1, '30-01-2017', 200.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downline`
--

CREATE TABLE `tbl_downline` (
  `downline_id` int(4) NOT NULL,
  `user_id` int(7) NOT NULL,
  `downline_user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fundrequest`
--

CREATE TABLE `tbl_fundrequest` (
  `fundrequest_id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `user_uniqueId` varchar(10) NOT NULL,
  `request_amount` float(20,2) NOT NULL,
  `charge` float(5,2) NOT NULL,
  `net_amount` float(10,2) NOT NULL,
  `request_time` varchar(35) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fund_accept_bonus`
--

CREATE TABLE `tbl_fund_accept_bonus` (
  `bonus_id` int(10) NOT NULL,
  `agent_id` int(7) NOT NULL,
  `member_id` int(10) NOT NULL,
  `fundrequest_id` int(10) NOT NULL,
  `amount_withdrawn` float(10,2) NOT NULL,
  `bonus_amount` float(10,2) NOT NULL,
  `transaction_time` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interest`
--

CREATE TABLE `tbl_interest` (
  `interest_id` int(5) NOT NULL,
  `interest_month_year` varchar(7) NOT NULL,
  `interest_value` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_interest`
--

INSERT INTO `tbl_interest` (`interest_id`, `interest_month_year`, `interest_value`) VALUES
(1, '01-2017', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pin`
--

CREATE TABLE `tbl_pin` (
  `pin_id` int(10) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `date_of_purpose` varchar(35) NOT NULL,
  `date_of_expiration` varchar(35) NOT NULL,
  `cv_creation_id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `used_status` tinyint(1) NOT NULL COMMENT '1 For Unused 0 For Used'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pin_transaction`
--

CREATE TABLE `tbl_pin_transaction` (
  `transaction_id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `cv_creation_id` int(10) NOT NULL,
  `transaction_amount` float(10,2) NOT NULL,
  `transaction_time` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `ticket_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(10) NOT NULL,
  `cv_creation_id` int(10) NOT NULL,
  `rate_of_revenue` float(10,2) NOT NULL,
  `total_revenue` float(10,2) NOT NULL,
  `total_amount` float(10,2) NOT NULL,
  `declare_date` varchar(35) NOT NULL,
  `user_id` int(7) NOT NULL,
  `interest_month_year` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `cv_creation_id`, `rate_of_revenue`, `total_revenue`, `total_amount`, `declare_date`, `user_id`, `interest_month_year`) VALUES
(1, 1, 10.00, 20.00, 40.00, '08-02-2017', 1, '01-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(7) NOT NULL,
  `user_uniqueId` varchar(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_creation_date` varchar(20) NOT NULL,
  `user_balance` float(20,2) NOT NULL,
  `user_mobile` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_type` tinyint(1) NOT NULL COMMENT 'Agent 2 Member 1',
  `verification_status` tinyint(1) NOT NULL,
  `user_date_of_registration` varchar(35) NOT NULL,
  `agency_name` varchar(50) NOT NULL,
  `downline_id` int(3) NOT NULL,
  `pin_id` int(4) NOT NULL,
  `present_address_line_1` text NOT NULL,
  `present_address_line_2` text NOT NULL,
  `present_postal_code` varchar(10) NOT NULL,
  `present_city` varchar(50) NOT NULL,
  `present_country_id` int(3) NOT NULL,
  `permanent_address_line_1` text NOT NULL,
  `permanent_address_line_2` text NOT NULL,
  `permanent_postal_code` varchar(10) NOT NULL,
  `permanent_city` varchar(50) NOT NULL,
  `permanent_country_id` int(3) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `security_number` varchar(30) NOT NULL,
  `nominee_name` varchar(50) NOT NULL,
  `nominee_email` varchar(50) NOT NULL,
  `nominee_mobile` varchar(30) NOT NULL,
  `nominee_present_address_line_1` text NOT NULL,
  `nominee_present_address_line_2` text NOT NULL,
  `nominee_present_postal_code` varchar(50) NOT NULL,
  `nominee_present_city` varchar(50) NOT NULL,
  `nominee_present_country_id` int(3) NOT NULL,
  `nominee_permanent_address_line_1` text NOT NULL,
  `nominee_permanent_address_line_2` text NOT NULL,
  `nominee_permanent_postal_code` varchar(50) NOT NULL,
  `nominee_permanent_city` varchar(50) NOT NULL,
  `nominee_permanent_country_id` int(3) NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_uniqueId`, `user_name`, `user_image`, `user_creation_date`, `user_balance`, `user_mobile`, `user_email`, `user_password`, `user_type`, `verification_status`, `user_date_of_registration`, `agency_name`, `downline_id`, `pin_id`, `present_address_line_1`, `present_address_line_2`, `present_postal_code`, `present_city`, `present_country_id`, `permanent_address_line_1`, `permanent_address_line_2`, `permanent_postal_code`, `permanent_city`, `permanent_country_id`, `bank_name`, `branch_name`, `account_name`, `account_number`, `card_number`, `security_number`, `nominee_name`, `nominee_email`, `nominee_mobile`, `nominee_present_address_line_1`, `nominee_present_address_line_2`, `nominee_present_postal_code`, `nominee_present_city`, `nominee_present_country_id`, `nominee_permanent_address_line_1`, `nominee_permanent_address_line_2`, `nominee_permanent_postal_code`, `nominee_permanent_city`, `nominee_permanent_country_id`, `user_status`) VALUES
(1, '7777777', 'Main Agent', '', '', 140.00, '', 'main@me.com', '111111', 2, 1, '11-12-2014', 'New Agency', 1, 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 1),
(2, '1', 'Agent', '', '', 200.00, '', 'main@me.com', '111111', 1, 1, '', '', 1, 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdrawal_bonus`
--

CREATE TABLE `tbl_withdrawal_bonus` (
  `bonus_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `withdrawal_id` int(10) NOT NULL,
  `bonus_amount` float(5,2) NOT NULL,
  `date` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_balance_withdrawal`
--
ALTER TABLE `tbl_balance_withdrawal`
  ADD PRIMARY KEY (`withdrawal_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_cv`
--
ALTER TABLE `tbl_cv`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `tbl_cv_creation`
--
ALTER TABLE `tbl_cv_creation`
  ADD PRIMARY KEY (`cv_creation_id`);

--
-- Indexes for table `tbl_downline`
--
ALTER TABLE `tbl_downline`
  ADD PRIMARY KEY (`downline_id`);

--
-- Indexes for table `tbl_fundrequest`
--
ALTER TABLE `tbl_fundrequest`
  ADD PRIMARY KEY (`fundrequest_id`);

--
-- Indexes for table `tbl_fund_accept_bonus`
--
ALTER TABLE `tbl_fund_accept_bonus`
  ADD PRIMARY KEY (`bonus_id`);

--
-- Indexes for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `tbl_pin`
--
ALTER TABLE `tbl_pin`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `tbl_pin_transaction`
--
ALTER TABLE `tbl_pin_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_withdrawal_bonus`
--
ALTER TABLE `tbl_withdrawal_bonus`
  ADD PRIMARY KEY (`bonus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_balance_withdrawal`
--
ALTER TABLE `tbl_balance_withdrawal`
  MODIFY `withdrawal_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cv`
--
ALTER TABLE `tbl_cv`
  MODIFY `cv_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_cv_creation`
--
ALTER TABLE `tbl_cv_creation`
  MODIFY `cv_creation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_downline`
--
ALTER TABLE `tbl_downline`
  MODIFY `downline_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fundrequest`
--
ALTER TABLE `tbl_fundrequest`
  MODIFY `fundrequest_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_fund_accept_bonus`
--
ALTER TABLE `tbl_fund_accept_bonus`
  MODIFY `bonus_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_interest`
--
ALTER TABLE `tbl_interest`
  MODIFY `interest_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pin`
--
ALTER TABLE `tbl_pin`
  MODIFY `pin_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pin_transaction`
--
ALTER TABLE `tbl_pin_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `ticket_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_withdrawal_bonus`
--
ALTER TABLE `tbl_withdrawal_bonus`
  MODIFY `bonus_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
