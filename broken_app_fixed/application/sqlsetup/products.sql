-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2013 at 10:32 PM
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
-- Table structure for table `mfs`
--

DROP TABLE IF EXISTS `mfs`;
CREATE TABLE IF NOT EXISTS `mfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mf_id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mfs`
--

INSERT INTO `mfs` (`id`, `name`, `updated_at`) VALUES
  (1, 'Sweet Cake Factory', '2013-12-20 22:26:27'),
  (2, 'Cheese Cake Factory', '2013-12-20 22:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mfs_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `taste` enum('Sweet','Sour','Savoury') NOT NULL,
  `description` varchar(300) NOT NULL,
  `imagefile_url` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `mfs_id`, `name`, `price`, `taste`, `description`, `imagefile_url`) VALUES
  (1, 1, 'Carrot Cake', 3, 'Sweet', 'Carrot cake is a cake which contains carrots mixed into the batter. The carrot softens in the cooking process, and the cake usually has a soft, dense texture.', ''),
  (2, 2, 'Cheese Cake', 45, 'Sweet', 'Cheesecake is a sweet dish consisting of two or more layers. The main, or thickest layer, consists of a mixture of soft, fresh cheese, eggs, and sugar; the bottom layer is often a crust or base made from crushed cookies, graham crackers, pastry, or sponge cake. It may be baked or unbaked. ', '');
