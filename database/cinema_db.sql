-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 01:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `DATE-TIME` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`bookingID`, `movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingEmail`, `amount`, `ORDERID`, `DATE-TIME`, `userid`) VALUES
(1, 1, '1', '3d', '2023-06-12', '12', 'Dipali', 'kaswala', '07575757575', '', 'Paid', 'ARVR6677923', '2023-06-11 16:53:18', 0);

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
  `image` varchar(150) NOT NULL,
  `movieName` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL,
  `mainhall` int(11) NOT NULL,
  `viphall` int(11) NOT NULL,
  `privatehall` int(11) NOT NULL,
  `htype` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mid`, `image`, `movieName`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`, `mainhall`, `viphall`, `privatehall`, `htype`, `userid`) VALUES
(1, 'img/movie-poster-1.jpg', 'Captain Marvel', ' Action, Adventure, Sci-Fi ', 220, '2018-10-18', 'Anna Boden, Ryan Fleck', 'Brie Larson, Samuel L. Jackson, Ben Mendelsohn', 0, 0, 0, 1, 0),
(2, 'img/RRR_Poster.jpg', 'RRR', 'Action', 220, '2022-03-25', 'S. S. Rajamouli', 'Ahmed Adam, Bayyumy Fouad, Salah Abdullah , Entsar, Dina Fouad N. T. Rama Rao Jr., Ram Charan, Ajay Devgn, Alia B...', 400, 500, 500, 2, 0),
(3, 'img/movie-poster-3.jpg', 'The Lego Movie', 'Animation, Action, Adventure', 110, '2014-02-07', 'Phil Lord, Christopher Miller', 'Chris Pratt, Will Ferrell, Elizabeth Banks', 0, 0, 0, 3, 0),
(4, 'img/movie-poster-4.jpg', 'Nadi Elregal Elserri ', 'Comedy', 105, '2019-01-23', ' Ayman Uttar', 'Karim Abdul Aziz, Ghada Adel, Maged El Kedwany, Nesreen Tafesh, Bayyumy Fouad, Moataz El Tony ', 0, 0, 0, 1, 0),
(5, 'img/movie-poster-5.jpg', 'VICE', 'Biography, Comedy, Drama', 132, '2018-12-25', 'Adam McKay', 'Christian Bale, Amy Adams, Steve Carell', 0, 0, 0, 2, 0),
(6, 'img/movie-poster-6.jpg', 'The Vanishing', 'Crime, Mystery, Thriller', 107, '2019-01-04', 'Kristoffer Nyholm', 'Gerard Butler, Peter Mullan, Connor Swindells', 0, 0, 0, 3, 0),
(70, 'img/RRR_Poster.jpg', 'RRR', 'Action', 220, '2022-03-25', 'S. S. Rajamouli', 'N. T. Rama Rao Jr., Ram Charan, Ajay Devgn, Alia Bhatt', 400, 500, 500, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_old`
--

CREATE TABLE `movie_old` (
  `mid` int(11) NOT NULL,
  `movieName` varchar(100) NOT NULL,
  `movieCast` varchar(100) NOT NULL,
  `facts` text NOT NULL,
  `description` text NOT NULL,
  `rating` int(30) NOT NULL,
  `image` text NOT NULL,
  `htype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(25, 32, 'A8,A9'),
(26, 33, 'E5,E6,E7,E8'),
(27, 34, 'E5,E6,E7,E8'),
(28, 37, 'C18,E18,F18,G18,H18,I18'),
(29, 38, 'C18,E18,F18,G18,H18,I18'),
(30, 43, 'A4,A5,A6,A7,A8,A9,A12'),
(31, 44, 'A4,A5,A6,A7,A8,A9,A12'),
(32, 45, 'A4,A5,A6,A7,A8,A9,A12'),
(33, 47, 'H3,H4'),
(34, 48, 'A6,A7,H3,H4'),
(35, 49, 'A1,A2,A3,A4,B1,B2,B3,B4,B5,B6'),
(37, 51, 'B7,B7,E9,F13,F13'),
(38, 53, 'F11,F12'),
(39, 54, 'A1,A2,A3,A4,A5,A6,A7,A10,A11,A12,A13,A14,A15'),
(40, 55, 'F18,F19,F20'),
(41, 56, 'J1,J2,J3,J4,J5,J6,J13 ,J14 ,J15 ,J16 ,J17 ,J18 ,J19 ,J20 ,J21 '),
(42, 57, 'J13 checked disabled,J14 checked disabled,J15 checked disabled,J16 checked disabled,J17 checked disabled,J18 checked disabled,J19 checked disabled,J20 checked disabled,J21 checked disabled'),
(43, 58, 'J13 checked disabled,J14 checked disabled,J15 checked disabled,J16 checked disabled,J17 checked disabled,J18 checked disabled,J19 checked disabled,J20 checked disabled,J21 checked disabled'),
(44, 59, 'H3,H4,H5,H6,H7'),
(45, 1, 'C1,C2,C3,C4,C5,C6,C7,C8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNum` varchar(100) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `name`, `password`, `email`, `phoneNum`, `address`) VALUES
(1, '123', '', 'john', '123', '123@gmail.com', '07579789654', ''),
(2, 'Shridhar', 'kaswala', '', '1234', 'shridharkaswla008@gmail.com', '07575757575', 'Sai Highets,Surat'),
(3, '', 'Kaswala', 'Dipali', '12345', 'dipaldonga@gmail.com', '07575757575', '21, abcd, london');

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
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `movieID` (`mid`);

--
-- Indexes for table `movie_old`
--
ALTER TABLE `movie_old`
  ADD PRIMARY KEY (`mid`);

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
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `movie_old`
--
ALTER TABLE `movie_old`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seats_booking`
--
ALTER TABLE `seats_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD CONSTRAINT `foreign_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movie` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
