-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2016 at 11:07 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projekt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `application_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `application_firstname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `application_lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `application_pesel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `application_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `application_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `application_offer` int(10) unsigned NOT NULL,
  PRIMARY KEY (`application_id`),
  KEY `application_offer` (`application_offer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_firstname`, `application_lastname`, `application_pesel`, `application_email`, `application_phone`, `application_offer`) VALUES
(1, 'test', 'test', '92050307190', 'test@test.pl', '123', 2),
(2, 'test', 'test', '92050307190', 'test@test.pl', '123', 2),
(3, 'TEst', 'TEst', '87041502131', 'fsdf@wp.pl', '321899321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `offer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `offer_url` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `offer_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `offer_description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_url`, `offer_name`, `offer_description`) VALUES
(1, 'Test 1', 'test-1', 'desc1'),
(2, 'Test 2', 'test-2', 'desc2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`application_offer`) REFERENCES `offer` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
