-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 06:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `user_id`, `hotel_name`, `contact_address`, `hotel_size`, `hotel_rating`, `hotel_country`, `hotel_city`, `hotel_subcity`, `hotel_img1`, `hotel_img2`, `hotel_img3`, `about_the_area`, `about_the_property`, `hotel_amenities`, `clean_and_safety`, `arrival_and_leaving`, `restriction_related`, `special_checkin`, `required_documents`, `children_and_pet`, `internet_and_parking`, `fees_and_policies`, `transfer_and_others`, `hotel_map`, `isApproved`) VALUES
(23, 8, 'Sheraton Addis Hotel', '+251912345678', '500', '5', '0', 'Addis Ababa', 'Arada', 'Sheraton Addis Hotel_1.jpg', 'Sheraton Addis Hotel_2.jpg', 'Sheraton Addis Hotel_3.jpg', '  This is sheraton  ', '    This is the property  ', 'hot_tube,free_shuttle,spa,seaview,petfriendly,kitchen,free_wifi,washer_and_dryer,parking,NaN,water_park,air_conditioned,electric_charge,NaN,NaN,NaN,NaN', '    Clean and Safety Practices  ', '    Arrival and Leaving  ', '    Restriction Related  ', '    Special Check in  ', '    Required Documents    ', '    Children and Pet  ', '    Internet and Parking  ', '    Fees and Policies  ', '    Transfer and Other info  ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31525.710103412952!2d38.7720082643759!3d8.99846436683708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85930b17ec2f%3A0x8a433f2230326db!2sSheraton%20Addis%2C%20a%20Luxury%20Collection%20Hotel%2C%20Addis%20Ababa!5e0!3m2!1sen!2sus!4v1679130386531!5m2!1sen!2sus', 1),
(24, 8, 'Capital Hotel', '+251912345678', '-', '5', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_admin`
--

INSERT INTO `hotel_admin` (`hotel_admin_id`, `hotel_id`, `hotel_admin_name`, `hotel_admin_email`, `hotel_admin_password`) VALUES
(12, 23, 'Solomon Kebede', 'sol@gmail.com', '11111111');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`rental_id`, `user_id`, `rental_type`, `rental_country`, `rental_city`, `rental_subcity`, `rental_area`, `rental_bed_no`, `rental_kitchen_no`, `rental_bath_no`, `rental_image1`, `rental_image2`, `rental_image3`, `rental_price`, `rental_contact`, `rental_detail`, `isApproved`) VALUES
(16, 6, 'Double', 'ET', 'Addis Ababa', 'Yeka', '100', '2', '1', '1', '2.jpg', '2.jpg', '1.jpg', '2000', '+251912345678', 'This is Rental 1', 1),
(21, 8, 'Apartment', 'ET', 'Addis Ababa', 'Yeka', '32132', '2', '2', '2', '2.jpg', '2.jpg', '2.jpg', '20000', '1234', ' This is Rental', 1),
(22, 8, 'Apartment', 'ET', 'Addis Ababa', 'Yeka', '123', '2', '3', '2', '2.jpg', '2.jpg', '2.jpg', '2000', '+251912345678', 'sdfgdwrfgsd', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_reservation`
--

INSERT INTO `rental_reservation` (`rental_reservation_id`, `rental_id`, `first_name`, `last_name`, `email`, `phone`, `checkin`, `checkout`) VALUES
(3, 16, 'Abdiwak', 'Bekele', 'abdiwakbek3226@gmail.com', '932265791', '2023-03-19', '2023-03-25'),
(4, 16, 'Abdiwak', 'Bekele', 'john@gmail.com', '6546546', '2023-03-16', '2023-03-17');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `hotel_id`, `room_no`, `room_floor`, `reserve_status`) VALUES
(20, '28', '23', '201', '2', 'NO'),
(21, '29', '23', '103', '1', 'NO');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `hotel_id`, `room_type_name`, `room_type_max_guest`, `room_beds`, `room_type_size`, `room_type_price`, `room_amenities`, `room_type_description`, `room_img`) VALUES
(28, 23, 'Special VIP', '2', '1', '30', 150, 'hot_tube,free_shuttle,spa,seaview,petfriendly,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN', 'This is the special room', 'Sheraton Addis Hotel_Special VIP.jpg'),
(29, 23, 'Standard Room', '2', '2', '15', 100, 'NaN,NaN,NaN,NaN,NaN,kitchen,free_wifi,washer_and_dryer,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN,NaN', 'This is the room', 'Sheraton Addis Hotel_Standard Room.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_birth_date`, `user_phone`, `user_address`, `user_password`) VALUES
(8, 'Abdiwak Bekele', 'abdiwakbek3226@gmail.com', '2023-03-07', '251932265791', 'Addis Ababa, Ethiopia', '11111111'),
(9, 'Bekele Aga', 'john@gmail.com', '2023-03-18', '123456789', 'Addis Ababa, Ethiopia', '11111111');

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
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
