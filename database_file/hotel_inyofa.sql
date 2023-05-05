-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 05:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_inyofa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `hotel_size` varchar(255) DEFAULT '-',
  `hotel_rating` varchar(255) NOT NULL,
  `hotel_country` varchar(255) NOT NULL DEFAULT '-',
  `hotel_city` varchar(255) NOT NULL DEFAULT '-',
  `hotel_subcity` varchar(255) NOT NULL DEFAULT '-',
  `hotel_img1` varchar(255) NOT NULL DEFAULT '-',
  `hotel_img2` varchar(255) NOT NULL DEFAULT '-',
  `hotel_img3` varchar(255) NOT NULL DEFAULT '-',
  `about_the_area` varchar(255) NOT NULL DEFAULT '-',
  `about_the_property` varchar(255) NOT NULL DEFAULT '-',
  `hotel_amenities` varchar(255) NOT NULL DEFAULT '-',
  `clean_and_safety` varchar(255) NOT NULL DEFAULT '-',
  `arrival_and_leaving` varchar(255) NOT NULL DEFAULT '-',
  `restriction_related` varchar(255) NOT NULL DEFAULT '-',
  `special_checkin` varchar(255) NOT NULL DEFAULT '-',
  `required_documents` varchar(255) NOT NULL DEFAULT '-',
  `children_and_pet` varchar(255) NOT NULL DEFAULT '-',
  `internet_and_parking` varchar(255) NOT NULL DEFAULT '-',
  `fees_and_policies` varchar(255) NOT NULL DEFAULT '-',
  `transfer_and_others` varchar(255) NOT NULL DEFAULT '-',
  `hotel_map` varchar(2048) NOT NULL,
  `isApproved` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_admin`
--

CREATE TABLE `hotel_admin` (
  `hotel_admin_id` int(255) NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `hotel_admin_name` varchar(255) NOT NULL,
  `hotel_admin_email` varchar(255) NOT NULL,
  `hotel_admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rental_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `rental_type` varchar(255) NOT NULL,
  `rental_country` varchar(255) NOT NULL,
  `rental_city` varchar(255) NOT NULL,
  `rental_subcity` varchar(255) NOT NULL,
  `rental_area` varchar(255) NOT NULL,
  `rental_bed_no` varchar(255) NOT NULL,
  `rental_kitchen_no` varchar(255) NOT NULL,
  `rental_bath_no` varchar(255) NOT NULL,
  `rental_image1` varchar(255) NOT NULL,
  `rental_image2` varchar(255) NOT NULL,
  `rental_image3` varchar(255) NOT NULL,
  `rental_price` varchar(255) NOT NULL,
  `rental_contact` varchar(255) NOT NULL,
  `rental_detail` varchar(255) NOT NULL,
  `isApproved` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rental_reservation`
--

CREATE TABLE `rental_reservation` (
  `rental_reservation_id` int(255) NOT NULL,
  `rental_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(255) NOT NULL,
  `room_id` int(255) NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(255) NOT NULL,
  `room_type_id` varchar(255) NOT NULL,
  `hotel_id` varchar(255) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `room_floor` varchar(255) NOT NULL,
  `reserve_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(255) NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `room_type_name` varchar(255) NOT NULL,
  `room_type_max_guest` varchar(255) NOT NULL,
  `room_beds` varchar(255) NOT NULL,
  `room_type_size` varchar(255) NOT NULL,
  `room_type_price` int(255) NOT NULL,
  `room_amenities` varchar(255) NOT NULL,
  `room_type_description` varchar(255) NOT NULL,
  `room_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_birth_date` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_birth_date`, `user_phone`, `user_address`, `user_password`) VALUES
(11, 'Abdiwak Bekele', 'abdiwakbek3226@gmail.com', '2023-05-18', '23423', 'asdfsadf', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `user_id` int(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_birth_date` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`user_id`, `user_fullname`, `user_email`, `user_birth_date`, `user_phone`, `user_address`, `user_password`) VALUES
(1, 'Abdiwak Bekele', 'abdi@gmail.com', '2023-05-13', '2342423', 'asdfsadf', '1234'),
(3, 'Alemu', 'alemu@gmail.com', '2023-05-19', '23432', 'asdf', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_admin`
--
ALTER TABLE `hotel_admin`
  ADD PRIMARY KEY (`hotel_admin_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `rental_reservation`
--
ALTER TABLE `rental_reservation`
  ADD PRIMARY KEY (`rental_reservation_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hotel_admin`
--
ALTER TABLE `hotel_admin`
  MODIFY `hotel_admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rental_reservation`
--
ALTER TABLE `rental_reservation`
  MODIFY `rental_reservation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_customer`
--
ALTER TABLE `user_customer`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
