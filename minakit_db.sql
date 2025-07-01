-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 07:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minakit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `EmailId` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Name`, `EmailId`, `MobileNumber`, `Password`, `updationDate`) VALUES
(1, 'admin', 'Administrator', 'admin@gmail.com', 123456, '21232f297a57a5a743894a0e4a801fc3', '2024-01-10 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(8, 11, 'samson@gmail.com', '2025-01-23', '2025-01-24', 'nice', '2025-01-23 11:59:43', 2, 'a', '2025-01-23 15:52:48'),
(9, 11, 'samson@gmail.com', '2025-01-23', '2025-01-24', 'nice', '2025-01-23 13:43:56', 1, NULL, '2025-01-23 15:56:20'),
(10, 11, 'hello@gmail.com', '2025-01-23', '2025-01-24', 'no add ons', '2025-01-23 15:23:59', 1, NULL, '2025-01-23 15:56:17'),
(11, 11, 'hello@gmail.com', '2025-01-24', '2025-01-25', 'nak adds on glamping packages', '2025-01-24 06:54:17', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblissues`
--

CREATE TABLE `tblissues` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `Issue` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminremarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblissues`
--

INSERT INTO `tblissues` (`id`, `UserEmail`, `Issue`, `Description`, `PostingDate`, `AdminRemark`, `AdminremarkDate`) VALUES
(10, 'test@gmail.com', 'Other', 'Test Sample', '2024-01-31 05:24:40', NULL, NULL),
(13, 'garima12@gmail.com', 'Booking Issues', 'I want some information ragrding booking', '2024-02-03 13:06:00', 'Infromation provided', '2024-02-03 13:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`) VALUES
(1, 'terms', '																														<p>By booking or using the facilities and services of Minakit Campsite, you agree to the following terms and conditions:</p><hr><h4><strong>1. Booking and Payment</strong></h4><p>1.1. <strong>Reservation Confirmation</strong>:</p><ul><li>Reservations are confirmed only after receipt of full payment or a specified deposit as communicated during booking.</li></ul><p>1.2. <strong>Payment Methods</strong>:</p><ul><li>We accept online payments, credit/debit cards, and other specified payment methods.</li></ul><p>1.3. <strong>Group Discounts</strong>:</p><ul><li>Special discounts for groups may apply based on package selection and availability.</li></ul><hr><h4><strong>2. Cancellation and Refund Policy</strong></h4><p>2.1. <strong>Cancellation by Guests</strong>:</p><ul><li>Cancellations made 7 days or more before the booking date are eligible for a 70% refund.</li><li>No refunds will be provided for cancellations made within 7 days of the booking date.</li></ul><p>2.2. <strong>Cancellation by Minakit Campsite</strong>:</p><ul><li>In the event of unforeseen circumstances (e.g., extreme weather or natural disasters), Minakit Campsite reserves the right to cancel bookings. Guests will receive a full refund or the option to reschedule.</li></ul><hr><h4><strong>3. Guest Responsibilities</strong></h4><p>3.1. <strong>Respect for Nature</strong>:</p><ul><li>Guests must avoid littering, harming wildlife, or damaging plants. Waste should be disposed of in designated areas.</li></ul><p>3.2. <strong>Noise Control</strong>:</p><ul><li>Quiet hours are observed from 10:00 PM to 6:00 AM to ensure a peaceful experience for all.</li></ul><p>3.3. <strong>Personal Belongings</strong>:</p><ul><li>Guests are responsible for their personal belongings. Minakit Campsite is not liable for lost, stolen, or damaged items.</li></ul><p>3.4. <strong>Alcohol and Substance Use</strong>:</p><ul><li>Alcohol consumption is permitted only in designated areas. Illegal substances are strictly prohibited on the premises.</li></ul><hr><h4><strong>4. Activities and Safety</strong></h4><p>4.1. <strong>Participation in Activities</strong>:</p><ul><li>Guests participate in all activities (e.g., trekking, kayaking) at their own risk.</li><li>Minakit Campsite ensures all activities are conducted under professional supervision and safety measures.</li></ul><p>4.2. <strong>Injuries and Accidents</strong>:</p><ul><li>Minakit Campsite is not responsible for injuries or accidents resulting from negligence or failure to follow safety instructions.</li></ul><hr><h4><strong>5. Pets</strong></h4><ul><li>Pets are allowed but must be kept on a leash at all times. Owners are responsible for cleaning up after their pets and ensuring they do not disturb other guests.</li></ul><hr><h4><strong>6. Force Majeure</strong></h4><ul><li>Minakit Campsite is not liable for delays, disruptions, or cancellations caused by events beyond our control, including but not limited to natural disasters, strikes, or government actions.</li></ul><hr><h4><strong>7. Changes to Terms</strong></h4><ul><li>Minakit Campsite reserves the right to modify these terms and conditions at any time. Updated terms will be communicated on our website or during booking.</li></ul>\r\n										\r\n										\r\n										'),
(2, 'privacy', '										<h4><strong>Privacy Policy</strong></h4><ol><li><p><strong>Personal Information</strong>:</p><ul><li>We collect personal details such as name, contact information, and payment details for booking and communication purposes.</li><li>All personal information is securely stored and used only for internal purposes.</li></ul></li><li><p><strong>Data Sharing</strong>:</p><ul><li>Minakit Campsite does not share your personal data with third parties without your consent, except for compliance with legal requirements or safety concerns.</li></ul></li><li><p><strong>Cookies and Website Usage</strong>:</p><ul><li>If you visit our website, cookies may be used to enhance your browsing experience. This data is not linked to any personally identifiable information.</li></ul></li><li><p><strong>Photography and Media</strong>:</p><ul><li>Any photographs taken by our staff during activities will only be used for promotional purposes with prior consent from guests.</li></ul></li><li><p><strong>Data Protection</strong>:</p><ul><li>We implement stringent security measures to protect your information from unauthorized access or breaches.</li></ul></li></ol><h4><strong>Terms and Conditions</strong></h4><ol><li><p><strong>Booking and Cancellation</strong>:</p><ul><li>Full payment is required at the time of booking to confirm your reservation.</li><li>Cancellations made 7 days prior to the stay are eligible for a 70% refund. No refunds for cancellations made within 7 days of the stay.</li></ul></li><li><p><strong>Liability</strong>:</p><ul><li>Minakit Campsite is not responsible for any injuries, accidents, or loss of personal belongings during your stay. Guests are advised to follow safety guidelines provided by the staff.</li></ul></li><li><p><strong>Camp Rules</strong>:</p><ul><li>Respect the natural environment—no littering or harm to wildlife.</li><li>Noise should be kept to a minimum after 10:00 PM to ensure a peaceful experience for all guests.</li></ul></li><li><p><strong>Alcohol and Drugs</strong>:</p><ul><li>Consumption of alcohol is allowed only in designated areas. Illegal drugs are strictly prohibited.</li></ul></li><li><p><strong>Force Majeure</strong>:</p><ul><li>In the event of unforeseen circumstances such as natural disasters or extreme weather, Minakit Campsite reserves the right to cancel or reschedule bookings.</li></ul></li><li><p><strong>Pets</strong>:</p><ul><li>Pets are allowed but must be kept under control at all times. Owners are responsible for cleaning up after their pets.</li></ul></li></ol>\r\n										'),
(3, 'aboutus', '																														<div><h3><strong>About Us - Minakit Campsite</strong></h3>\r\n<p>Welcome to <strong>Minakit Campsite</strong>, your gateway to a serene and unforgettable outdoor experience. Nestled in the heart of nature, our campsite offers the perfect escape from the hustle and bustle of daily life. Whether you\'re seeking adventure, relaxation, or quality time with loved ones, Minakit Campsite is the ideal destination.</p>\r\n<h4><strong>Who We Are</strong></h4>\r\n<p>Minakit Campsite was established with a vision to connect people with nature while offering comfort and safety. We are a team of nature enthusiasts committed to creating unique and memorable experiences for our guests. Our goal is to foster a love for the outdoors, encourage sustainable practices, and build a community of like-minded adventurers.</p>\r\n<h4><strong>What We Offer</strong></h4>\r\n<ul>\r\n<li><strong>Diverse Camping Packages</strong>: Tailored experiences for couples, families, groups, and adventure seekers.</li>\r\n<li><strong>Scenic Locations</strong>: Choose from riverside, forest, or hilltop spots for your stay.</li>\r\n<li><strong>Activities for All</strong>: From adventurous treks and kayaking to peaceful bonfires and stargazing.</li>\r\n<li><strong>Comfort Meets Nature</strong>: Stay in well-equipped tents with essential amenities, blending modern comforts with the raw beauty of the wild.</li>\r\n</ul>\r\n<h4><strong>Our Values</strong></h4>\r\n<ul>\r\n<li><strong>Sustainability</strong>: We are committed to preserving the environment by promoting eco-friendly practices and minimizing our ecological footprint.</li>\r\n<li><strong>Community</strong>: We strive to create a welcoming atmosphere where guests can connect with each other and nature.</li>\r\n<li><strong>Safety</strong>: Your safety is our priority. Our team ensures all activities and facilities meet the highest safety standards.</li>\r\n</ul>\r\n<h4><strong>Why Choose Minakit Campsite?</strong></h4>\r\n<ul>\r\n<li>Professionally organized camping experiences.</li>\r\n<li>Customizable packages to suit your preferences.</li>\r\n<li>Friendly and knowledgeable staff always ready to assist.</li>\r\n<li>Unmatched scenic beauty and tranquil surroundings.</li>\r\n</ul>\r\n<h4><strong>Join Us</strong></h4>\r\n<p>At Minakit Campsite, every moment is an adventure waiting to unfold. Let us help you create memories that last a lifetime. Escape to nature with Minakit, where the great outdoors feels just like home.</p></div>\r\n										'),
(11, 'contact', '<p>For any concerns or queries regarding privacy or policies, please contact us at:</p><ul><li><strong>Email</strong>: <a rel=\"noopener\">support@minakitcampsite.com</a></li><li><strong>Phone</strong>: +1 (123) 456-7890</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(11, 'Romantic Riverside Retreat', 'Couple Package', 'Riverside Camping area', 200, 'Private tent with cozy interiors and lighting, Candlelit dinner by the river, Sunrise kayak experience, Couple\'s bonfire with snacks', 'Designed for couples, this package offers a romantic getaway in nature, complete with privacy and special moments under the stars.\r\n', 'pic1.jpg', '2025-01-23 11:22:09', '2025-01-23 11:27:27'),
(12, 'Family Adventure Fiesta', 'Family Package of 4', 'Forest Edge Campsite', 400, 'Spacious family tent with bedding, Guided nature walk and storytelling for kids, Group games and activities, BBQ dinner around the campfire', 'Ideal for families looking to bond in the great outdoors. This package combines fun activities for kids and adults with a comfortable stay.', 'pic3.jpg', '2025-01-23 11:23:46', '2025-01-23 11:27:38'),
(13, 'Friends\' Wilderness Getaway', 'Group Package', 'Hilltop Camping Zone', 600, 'Large shared tent or multiple small tents, Adventure activities like trekking and zip-lining, Evening group bonfire with music, Optional stargazing session', 'Perfect for groups of friends or colleagues, this package focuses on adventure and camaraderie, making it an unforgettable experience in nature.', 'pic2.jpg', '2025-01-23 11:25:47', '2025-01-23 11:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(12, 'samson', '123456', 'samson@gmail.com', '2242a97ea96f6a6d4c7d67c4ff194fd0', '2025-01-23 10:41:10', NULL),
(13, 'nur', '0111111111', 'hello@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2025-01-23 15:23:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `fk_tblbooking_PackageId` (`PackageId`),
  ADD KEY `fk_tblbooking_UserEmail` (`UserEmail`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblenquiry_EmailId` (`EmailId`);

--
-- Indexes for table `tblissues`
--
ALTER TABLE `tblissues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblissues`
--
ALTER TABLE `tblissues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD CONSTRAINT `fk_tblbooking_PackageId` FOREIGN KEY (`PackageId`) REFERENCES `tbltourpackages` (`PackageId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblbooking_UserEmail` FOREIGN KEY (`UserEmail`) REFERENCES `tblusers` (`EmailId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD CONSTRAINT `fk_tblenquiry_EmailId` FOREIGN KEY (`EmailId`) REFERENCES `tblusers` (`EmailId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
