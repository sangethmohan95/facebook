-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2016 at 07:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `facebook`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `mem`(IN `id` INT, IN `f_name` CHAR(12), IN `s_name` CHAR(12), IN `email_id` VARCHAR(50), IN `pwd` VARCHAR(50), IN `date` INT, IN `month` CHAR(22), IN `year` INT, IN `gender` VARCHAR(6), IN `prfpic` VARCHAR(255), IN `hash` INT(32))
begin
  insert into  login(pk_int_user_id,password,vchr_prof_pic,f_name, L_name,email_id)values(id,pwd,prfpic,f_name,s_name,email_id);
  insert into signup(id, f_name, s_name,email_id,password,day,month,year,gender,
prof_pic,hash,active)values(id,f_name,s_name,email_id,pwd,day,month,year,gender,prfpic,hash,active);
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `memebs`(f_name char(12), s_name char(12),email_id varchar(50) ,pwd varchar(50),day int,month char(22) ,year int,gender varchar(6), prfpic char(254),hash char(32),active int(11))
begin
  insert into  login(password,vchr_prof_pic,f_name, l_name,email_id)values(pwd,prfpic,f_name,s_name,email_id);
  insert into signup(f_name, s_name,email_id,password,day,month,year,gender,
prof_pic,hash,active)values(f_name,s_name,email_id,pwd,day,month,year,gender,prfpic,hash,active);
  end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `memr`(IN `f_name` CHAR(12), IN `s_name` CHAR(12), IN `email_id` VARCHAR(50), IN `pwd` VARCHAR(50), IN `date` INT, IN `month` CHAR(22), IN `year` INT, IN `gender` VARCHAR(6), IN `prfpic` VARCHAR(250), IN `hash` CHAR(32))
begin
  insert into  login(password,vchr_prof_pic,f_name, l_name,email_id)values(pwd,prfpic,f_name,s_name,email_id);
  insert into signup(f_name, s_name,email_id,password,day,month,year,gender,
prof_pic,hash)values(f_name,s_name,email_id,pwd,date,month,year,gender,prfpic,hash);
  end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `pk_int_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) DEFAULT NULL,
  `vchr_prof_pic` varchar(250) DEFAULT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pk_int_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`pk_int_user_id`, `password`, `vchr_prof_pic`, `f_name`, `l_name`, `email_id`) VALUES
(1, 'Sangi!23456', '13.76.212.119/sangeeth/uploads/sangeethmohan95@hotmail.com.png', 'sangeeth', 'sangi', 'sangeethmohan95@hotmail.com'),
(2, 'Sangi!2345', 'http://13.76.212.119/sangeeth/uploads/sangeethmohan95@gmail.com.png', 'sangeeth', 'sangi', 'sangeethmohan95@gmail.com'),
(3, 'Sangi!23456', '13.76.212.119/sangeeth/uploads/sangi@mailinator.com.png', 'sangeeth', 'sangi', 'sangi@mailinator.com'),
(4, 'Royal!23456', 'http://13.76.212.119/sangeeth/uploads/royalrevengerscrew@gmail.com.png', 'royal', 'revengers', 'royalrevengerscrew@gmail.com'),
(5, 'Hzl!23456', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJlGp0sR8Me4gs9iV0nnmdOlfL1jDNs45axDIe6I6DR3wVbgAR', 'sangi', 'sangeeth', 'hzlobynon@gmail.com'),
(6, 'Sangi!23456', 'https://13.76.212.119/sangeeth/uploads/sangeeth@mailnator.com.png', 'sangi', 'sangi', 'sangeeth@mailnator.com'),
(7, 'Sangi!23456', 'https://13.76.212.119/sangeeth/uploads/sangi12@mailinator.com.png', 'sangi', 'sdfghjk', 'sangi12@mailinator.com'),
(8, 'Sangi!2345', 'https://13.76.212.119/sangeeth/uploads/nikhil123@gmail.com.png', 'niki', 'niki', 'nikhil123@gmail.com'),
(9, 'A1q^wdvdd', 'http://13.76.212.119/sangeeth/uploads/sanuraina1234@gmail.com.png', 'sanu', 'sanu', 'sanuraina1234@gmail.com'),
(10, 'Royal!23456A', 'http://13.76.212.119/sangeeth/uploads/royalrevengerscrew1@gmail.com.png', 'royal', 'revengers', 'royalrevengerscrew1@gmail.com'),
(11, 'Sangi!23456', 'http://13.76.212.119/sangeeth/uploads/sang123i@gmail.com.png', 'sangeeth', 'sangi', 'sang123i@gmail.com'),
(12, 'Lindamol!2345', 'http://13.76.212.119/sangeeth/uploads/sang123ixc@gmail.com.png', 'sangeeth', 'sangi', 'sang123ixc@gmail.com'),
(13, 'Royal!23456', 'http://13.76.212.119/sangeeth/uploads/sangi123456@gmail.com.png', 'sangi', 'sangi', 'sangi123456@gmail.com'),
(14, 'Sangi!2345', 'http://13.76.212.119/sangeeth/uploads/sangi1234567@gmail.com.png', 'sangi', 'sangi', 'sangi1234567@gmail.com'),
(15, 'Sangi!23456', 'http://13.76.212.119/sangeeth/uploads/sangi123@gmail.com.png', 'sangi', 'sasas', 'sangi123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) DEFAULT NULL,
  `s_name` varchar(40) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` varchar(13) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `prof_pic` varchar(250) NOT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `f_name`, `s_name`, `email_id`, `password`, `day`, `month`, `year`, `gender`, `prof_pic`, `hash`, `active`) VALUES
(1, 'sangeeth', 'sangi', 'sangeethmohan95@hotmail.com', 'Sangi!23456', NULL, 'apr', 2000, 'male', '13.76.212.119/sangeeth/uploads/sangeethmohan95@hotmail.com.png', 'eecca5b6365d9607ee5a9d336962c534', 0),
(2, 'sangeeth', 'sangi', 'sangeethmohan95@gmail.com', 'Sangi!2345', 9, 'apr', 1995, 'male', '13.76.212.119/sangeeth/uploads/sangeethmohan95@gmail.com.png', 'a3c65c2974270fd093ee8a9bf8ae7d0b', 1),
(3, 'sangeeth', 'sangi', 'sangi@mailinator.com', 'Sangi!23456', 18, 'dec', 1999, 'male', '13.76.212.119/sangeeth/uploads/sangi@mailinator.com.png', 'daca41214b39c5dc66674d09081940f0', 1),
(4, 'royal', 'revengers', 'royalrevengerscrew@gmail.com', 'Royal!23456', 18, 'dec', 1998, 'male', '13.76.212.119/sangeeth/uploads/royalrevengerscrew@gmail.com.png', 'cbcb58ac2e496207586df2854b17995f', 1),
(5, 'sangi', 'sangeeth', 'hzlobynon@gmail.com', 'Hzl!23456', 2, 'mar', 1994, 'male', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJlGp0sR8Me4gs9iV0nnmdOlfL1jDNs45axDIe6I6DR3wVbgAR', 'fghjkoiuytfd', 0),
(6, 'sangi', 'sangi', 'sangeeth@mailnator.com', 'Sangi!23456', 17, 'dec', 1999, 'male', 'https://13.76.212.119/sangeeth/uploads/sangeeth@mailnator.com.png', 'cbb6a3b884f4f88b3a8e3d44c636cbd8', 0),
(7, 'sangi', 'sdfghjk', 'sangi12@mailinator.com', 'Sangi!23456', 18, 'dec', 1998, 'male', 'https://13.76.212.119/sangeeth/uploads/sangi12@mailinator.com.png', '2bcab9d935d219641434683dd9d18a03', 1),
(8, 'niki', 'niki', 'nikhil123@gmail.com', 'Sangi!2345', 19, 'dec', 1998, 'male', 'https://13.76.212.119/sangeeth/uploads/nikhil123@gmail.com.png', 'a2557a7b2e94197ff767970b67041697', 0),
(9, 'sanu', 'sanu', 'sanuraina1234@gmail.com', 'A1q^wdvdd', 18, 'nov', 1998, 'male', 'http://13.76.212.119/sangeeth/uploads/sanuraina1234@gmail.com.png', '39461a19e9eddfb385ea76b26521ea48', 0),
(10, 'royal', 'revengers', 'royalrevengerscrew1@gmail.com', 'Royal!23456A', 18, 'dec', 1998, 'male', 'http://13.76.212.119/sangeeth/uploads/royalrevengerscrew1@gmail.com.png', 'fe73f687e5bc5280214e0486b273a5f9', 0),
(11, 'sangeeth', 'sangi', 'sang123i@gmail.com', 'Sangi!23456', 18, 'dec', 1998, 'male', 'http://13.76.212.119/sangeeth/uploads/sang123i@gmail.com.png', '02a32ad2669e6fe298e607fe7cc0e1a0', 0),
(12, 'sangeeth', 'sangi', 'sang123ixc@gmail.com', 'Lindamol!2345', 18, 'dec', 1998, 'male', 'http://13.76.212.119/sangeeth/uploads/sang123ixc@gmail.com.png', 'fe7ee8fc1959cc7214fa21c4840dff0a', 0),
(13, 'sangi', 'sangi', 'sangi123456@gmail.com', 'Royal!23456', 19, 'mar', 1999, 'male', 'http://13.76.212.119/sangeeth/uploads/sangi123456@gmail.com.png', '98dce83da57b0395e163467c9dae521b', 0),
(14, 'sangi', 'sangi', 'sangi1234567@gmail.com', 'Sangi!2345', 19, 'mar', 1999, 'male', 'http://13.76.212.119/sangeeth/uploads/sangi1234567@gmail.com.png', '47d1e990583c9c67424d369f3414728e', 0),
(15, 'sangi', 'sasas', 'sangi123@gmail.com', 'Sangi!23456', 19, 'dec', 1998, 'male', 'http://13.76.212.119/sangeeth/uploads/sangi123@gmail.com.png', 'dc82d632c9fcecb0778afbc7924494a6', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `signup`
--
ALTER TABLE `signup`
  ADD CONSTRAINT `signup_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`pk_int_user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
