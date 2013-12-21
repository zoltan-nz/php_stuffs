-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2013 at 09:04 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `confectionary`
--
CREATE DATABASE IF NOT EXISTS `confectionary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `confectionary`;

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

DROP TABLE IF EXISTS `adminusers`;
CREATE TABLE IF NOT EXISTS `adminusers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`user_id`, `username`, `password`) VALUES
  (1, 'admin', 'letmein');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `updated_at`) VALUES
  (1, 'Ireland', '2013-12-21 13:18:16'),
  (2, 'UK', '2013-12-21 13:18:16'),
  (3, 'Hungary', '2013-12-21 13:18:46'),
  (4, 'France', '2013-12-21 13:18:46'),
  (5, 'Sweden', '2013-12-21 13:19:21'),
  (6, 'USA', '2013-12-21 13:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `mfs`
--

DROP TABLE IF EXISTS `mfs`;
CREATE TABLE IF NOT EXISTS `mfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mf_id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `mfs`
--

INSERT INTO `mfs` (`id`, `name`, `updated_at`) VALUES
  (1, 'Cheese Cake Factory Ltd.', '2013-12-21 21:00:52'),
  (2, 'Sweet Cake Factory Co.', '2013-12-21 21:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `taste` enum('Sweet','Sour','Savoury') NOT NULL,
  `description` varchar(300) NOT NULL,
  `imagefile_url` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `mf_id`, `country_id`, `name`, `price`, `taste`, `description`, `imagefile_url`, `updated_at`) VALUES
  (1, 1, 4, 'Cheese Cake', 4.5, 'Sweet', 'An amazing cheese cake from the Best.', '', '2013-12-21 21:02:57'),
  (2, 2, 3, 'Carrot Cake', 3.5, 'Savoury', 'This is different.', '', '2013-12-21 21:03:45');
