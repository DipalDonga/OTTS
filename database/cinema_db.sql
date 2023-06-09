-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2023 at 08:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`) VALUES
(1, 'Dipali', 'D@123', 'dipaldonga28@gmail.com'),
(2, 'Cain', 'C@123', 'cain.atse3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `movie` int(11) DEFAULT NULL,
  `screen` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phoneNum` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `movie`, `screen`, `type`, `date`, `time`, `fname`, `lname`, `phoneNum`, `email`, `amount`, `date_time`) VALUES
(1, 1, '1', 'demo123456789', '12/2/2023', '23:23:24', 'Dipali', 'kaswala', '+44757027827', 'dipaldonga28@gmail.com', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieID` int(11) DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingType` varchar(100) DEFAULT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingLName` varchar(100) DEFAULT NULL,
  `bookingPNumber` varchar(12) NOT NULL,
  `bookingEmail` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `ORDERID` varchar(255) NOT NULL,
  `DATE-TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingEmail`, `amount`, `ORDERID`, `DATE-TIME`) VALUES
(1, 1, '', '2d', '2023-06-13', '12', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR35281077', '2023-06-05 20:28:39'),
(10, 1, '', '2d', '2023-06-13', '12', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR35281077', '2023-06-05 20:28:39'),
(11, 1, '1', '3d', '2023-06-13', '12', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR80301027', '2023-06-05 23:37:08'),
(13, 1, '1', '3d', '2023-06-12', '09', 'gaurav2', '222', '8866604285', '', 'Not Paid', 'ARVR59521449', '2023-06-05 23:40:10'),
(14, 1, '1', '2d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR35421679', '2023-06-05 23:43:16'),
(17, 1, '1', '3d', '2023-06-12', '09', 'gaurav', '10', '8866604285', '', 'Not Paid', 'ARVR44331308', '2023-06-06 21:53:44'),
(24, 1, '1', '3d', '2023-06-12', '09', 'gaurav', 'b', '8866604285', '', 'Not Paid', 'ARVR93630984', '2023-06-06 22:12:01'),
(25, 1, '1', '3d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR12278441', '2023-06-06 22:15:02'),
(26, 1, '1', '3d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR73549381', '2023-06-07 21:41:38'),
(27, 2, '2', '3d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR20881406', '2023-06-08 22:26:46'),
(28, 2, '2', '3d', '2023-06-12', '09', 'gaurav', 'patel2', '8866604285', '', 'Not Paid', 'ARVR24054888', '2023-06-08 22:44:35'),
(29, 3, '3', '3d', '2023-06-12', '09', 'gaurav', '3333', '8866604285', '', 'Not Paid', 'ARVR48589536', '2023-06-08 22:56:23'),
(30, 3, '3', '3d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR59374620', '2023-06-08 22:56:47'),
(31, 2, '2', '3d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR83562207', '2023-06-08 23:05:14'),
(32, 2, '2', '3d', '2023-06-12', '09', 'gaurav', 'patel', '8866604285', '', 'Not Paid', 'ARVR97098211', '2023-06-08 23:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacktable`
--

INSERT INTO `feedbacktable` (`msgID`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`) VALUES
(5, 'Dipali', 'kaswala', 'dipaldonga28@gmail.com', 'Contact Me!');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mid` int(11) NOT NULL,
  `movieName` varchar(100) NOT NULL,
  `movieCast` varchar(100) NOT NULL,
  `facts` text NOT NULL,
  `description` text NOT NULL,
  `rating` int(30) NOT NULL,
  `image` text NOT NULL,
  `htype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mid`, `movieName`, `movieCast`, `facts`, `description`, `rating`, `image`, `htype`) VALUES
(1, 'Captain Marvel', 'Zee', '-', 'Watching this watch is worth Watching', 5, 'movie-poster-1_jpg_1614127550.jpg', 1),
(2, 'YJHD', '-', '-', '-', 5, 'Yeh_jawani_hai_deewani_jpg_692881968.jpg', 2),
(3, 'RRR', 'R', 'R', 'R', 5, 'RRR_Poster_jpg_1484559942.jpg', 3),
(4, 'English-Vinglish', 'Gauri Shinde', 'demo', '-', 5, 'english-vinglish_jpg_2071886188.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(11) NOT NULL,
  `movieImg` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `mainhall` int(11) NOT NULL,
  `viphall` int(11) NOT NULL,
  `privatehall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `mainhall`, `viphall`, `privatehall`) VALUES
(1, 'img/movie-poster-1.jpg', 'Captain Marvel', ' Action, Adventure, Sci-Fi ', 220, '2018-10-18', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn', 0, 0, 0),
(2, 'img/movie-poster-2.jpg', 'Qarmat Bitamrmat  ', 'Comedy', 110, '2018-10-18', 'Assad Fouladkar', 'Ahmed Adam, Bayyumy Fouad, Salah Abdullah , Entsar, Dina Fouad ', 0, 0, 0),
(3, 'img/movie-poster-3.jpg', 'The Lego Movie', 'Animation, Action, Adventure', 110, '2014-02-07', 'Phil Lord, Christopher Miller', 'Chris Pratt, Will Ferrell, Elizabeth Banks', 0, 0, 0),
(4, 'img/movie-poster-4.jpg', 'Nadi Elregal Elserri ', 'Comedy', 105, '2019-01-23', ' Ayman Uttar', 'Karim Abdul Aziz, Ghada Adel, Maged El Kedwany, Nesreen Tafesh, Bayyumy Fouad, Moataz El Tony ', 0, 0, 0),
(5, 'img/movie-poster-5.jpg', 'VICE', 'Biography, Comedy, Drama', 132, '2018-12-25', 'Adam McKay', 'Christian Bale, Amy Adams, Steve Carell', 0, 0, 0),
(6, 'img/movie-poster-6.jpg', 'The Vanishing', 'Crime, Mystery, Thriller', 107, '2019-01-04', 'Kristoffer Nyholm', 'Gerard Butler, Peter Mullan, Connor Swindells', 0, 0, 0),
(69, 'img/colloborative software.png', 'demo', 'demo', 5, '2023-05-28', 'demo', 'demo', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `sid` int(11) NOT NULL,
  `screenName` varchar(100) NOT NULL,
  `seats` int(11) NOT NULL,
  `movie` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `htype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`sid`, `screenName`, `seats`, `movie`, `date`, `time`, `htype`) VALUES
(1, '1', 125, 1, '', '', 1),
(2, '2', 200, 2, '', '', 2),
(3, '3', 100, 3, '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seats_booking`
--

CREATE TABLE `seats_booking` (
  `id` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `seat_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seats_booking`
--

INSERT INTO `seats_booking` (`id`, `bookingID`, `seat_no`) VALUES
(1, 1, 'A1,A2,A3'),
(2, 10, 'B1,B2,B3'),
(4, 11, 'A15,A16,B19,B20,B21'),
(6, 13, 'A1,A2,A3,A9,A10,A11'),
(7, 14, 'A8'),
(10, 17, 'A4,A5,A6,A7'),
(17, 24, 'B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B11,B12,B13,B14,B15,B16'),
(18, 25, 'A15,A16'),
(19, 26, 'C1,C21,D1,D21,E1,E21'),
(20, 27, 'A1,A2,A3,A4,A12,A13,A14,A15'),
(21, 28, 'B1,B17,B1,B17,D1,D19,E1,E19,F1,F21,F1,F21,F1,F20'),
(22, 29, 'A1,B1,C1,D1,E1,F1,G1,H1'),
(23, 30, 'A2,A3,A4,A5'),
(24, 31, 'A5,A6,A7'),
(25, 32, 'A8,A9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `phoneNum`) VALUES
(1, '123', 'john', '123', '123@gmail.com', '07579789654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `foreign_key_movieID` (`movieID`),
  ADD KEY `foreign_key_ORDERID` (`ORDERID`);

--
-- Indexes for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `seats_booking`
--
ALTER TABLE `seats_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seats_booking`
--
ALTER TABLE `seats_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD CONSTRAINT `foreign_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movietable` (`movieID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
