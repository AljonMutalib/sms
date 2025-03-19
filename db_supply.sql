-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2025 at 01:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_supply`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `ID` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `employment` varchar(50) NOT NULL,
  `salary` double(10,2) NOT NULL,
  `province` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`ID`, `username`, `password`, `fname`, `lname`, `mname`, `position`, `employment`, `salary`, `province`, `division`, `date_created`) VALUES
(1, 'aljon.mutalib', '$2y$10$10kEWiL0/H1yp55K6jIzHuyypyzL3U45xgdy9UBqn/dKyb4ANPzFW', 'Aljon', 'Mutalib', 'Sugala', 'ITO I', 'Regular', 56000.00, 'Zamboanga City', 'ORD', '2025-02-26 14:26:43'),
(2, 'alrajhi.otoalih', '$2y$10$07CqPjVjhq/46o1KORmdnOkb.Es7ZTyUQmoscsYMPKxtJcDK4D5ea', 'Al-Rajhi', 'Otoalih', 'Totoh', 'ITO I', 'Regular', 56000.00, 'Zamboanga City', 'TOD', '2025-02-26 14:27:35'),
(3, 'jacob.mohammad', '$2y$10$KVlwTdsfHtUPLGXCvr3sp.Ad8.zp8B8lOxlB0ewgY88LFzQFmp4gG', 'Jacob', 'Mohammad', 'Flores', 'ITO III', 'Regular', 80000.00, 'Zamboanga City', 'TOD', '2025-02-27 08:36:46'),
(4, 'geoden.jalandoni', '$2y$10$LUwILtI8nUj2YI.7nRGqH.ZWO3a3cax.l9eZ1NHbZH/e6LanB33ji', 'Geoden', 'Jalandoni', 'Bautista', 'ENGR III', 'Regular', 56000.00, 'Zamboanga City', 'TOD', '2025-02-27 08:37:59'),
(5, 'edil.hairon', '$2y$10$jFher.tEVROs9lghbqOkK.dA6r5C6S8qL9rtoqp7hG0P19qOW/NN.', 'Edilwaleed', 'Hairon', 'Dalawis', 'ITO I', 'Regular', 56000.00, 'Zamboanga City', 'TOD', '2025-02-27 08:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `ID` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `page` varchar(150) NOT NULL,
  `transaction` varchar(300) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE `tbl_positions` (
  `ID` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `abbreviation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`ID`, `position`, `abbreviation`) VALUES
(1, 'Information Technology Officer I', 'ITO I'),
(2, 'Information Technology Officer II', 'ITO II'),
(3, 'Information Technology Officer III', 'ITO III'),
(4, 'Information System Researcher I', 'ISR I'),
(5, 'Information System Researcher II', 'ISR II'),
(6, 'Information System Researcher III', 'ISR III'),
(7, 'Information System Analyst I', 'ISA I'),
(8, 'Information System Analyst II', 'ISA II'),
(9, 'Information System Analyst III', 'ISA III'),
(10, 'Engineer I', 'ENGR I'),
(11, 'Engineer II', 'ENGR II'),
(12, 'Engineer III', 'ENGR III'),
(13, 'Project Development Officer I', 'PDO I'),
(14, 'Project Development Officer II', 'PDO II'),
(15, 'Project Development Officer III', 'PDO III'),
(16, 'Planning Officer I', 'PLO I'),
(17, 'Planning Officer II', 'PLO II'),
(18, 'Planning Officer III', 'PLO III'),
(19, 'Planning Assistant I', 'PLA I'),
(20, 'Planning Assistant II', 'PLA II'),
(21, 'Electronics and Communications Equipment Technician I', 'ECET I'),
(22, 'Electronics and Communications Equipment Technician II', 'ECET II'),
(23, 'Electronics and Communications Equipment Technician III', 'ECET III'),
(24, 'Administrative Officer I', 'AO I'),
(25, 'Administrative Officer II', 'AO II'),
(26, 'Administrative Officer III', 'AO III'),
(27, 'Administrative Officer IV', 'AO IV'),
(28, 'Administrative Officer V', 'AO V'),
(29, 'Administrative Officer VI', 'AO VI'),
(30, 'Accountant I', 'ACCT I'),
(31, 'Accountant II', 'ACCT II'),
(32, 'Accountant III', 'ACCT III'),
(33, 'Supervising Administrative Officer', 'SAO'),
(34, 'Chief Administrative Officer', 'CAO'),
(35, 'Computer Equipment Officer I', 'CEO I'),
(36, 'Computer Equipment Officer II', 'CEO II'),
(37, 'Computer Equipment Officer III', 'CEO III'),
(38, 'Administrative Aide I', 'AA I'),
(39, 'Administrative Aide II', 'AA II'),
(40, 'Administrative Aide III', 'AA III'),
(41, 'Administrative Aide IV', 'AA IV'),
(42, 'Administrative Aide V', 'AA V'),
(43, 'Administrative Aide VI', 'AA VI'),
(44, 'Regional Director', 'RD'),
(45, 'Assistant Regional Director', 'ARD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_properties`
--

CREATE TABLE `tbl_properties` (
  `ID` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
  `ics_no` varchar(100) NOT NULL,
  `ics_date` date NOT NULL,
  `property_no` varchar(100) NOT NULL,
  `asset_class` varchar(100) NOT NULL,
  `serial_no` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `unit_cost` double(10,2) NOT NULL,
  `cond` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_properties`
--

INSERT INTO `tbl_properties` (`ID`, `date_acquired`, `ics_no`, `ics_date`, `property_no`, `asset_class`, `serial_no`, `description`, `unit_cost`, `cond`, `date_created`) VALUES
(1, '2016-11-24', '23846y23', '2025-02-27', '2016-05-030-NBAS-A912080', 'Laptop', 'GAN0CV12S628425', 'ASUS X550ZE (Windows 10) with Asus carrying case (sling bag)', 35180.80, 'Good', '2025-02-27 11:08:52'),
(2, '2016-11-24', '23846y23', '2025-02-27', '2016-05-030-NBAS-A912080', 'Laptop', 'GAN0CV12S628425', 'ASUS X550ZE (Windows 10) with Asus carrying case (sling bag)', 35180.80, 'Good', '2025-02-27 11:08:52'),
(3, '2016-11-24', '23846y23', '2025-02-27', '2016-05-030-NBAS-A912080', 'Laptop', 'GAN0CV12S628425', 'ASUS X550ZE (Windows 10) with Asus carrying case (sling bag)', 35180.80, 'Good', '2025-02-27 11:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `ID` int(11) NOT NULL,
  `stock_no` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_cost` double(10,2) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_purchases`
--

INSERT INTO `tbl_purchases` (`ID`, `stock_no`, `qty`, `unit_cost`, `amount`, `month`, `year`, `date_created`) VALUES
(1, 'AAT327', 10, 100.00, 1000.00, 'January', 2025, '2025-03-03 13:59:59'),
(2, 'AAT327', 9, 101.00, 909.00, 'February', 2025, '2025-03-03 14:02:49'),
(3, 'AAT327', 5, 102.00, 510.00, 'March', 2025, '2025-03-03 14:03:07'),
(4, 'AFR150', 100, 98.00, 9800.00, 'January', 2025, '2025-03-03 14:07:14'),
(5, 'BAL2923', 200, 100.00, 20000.00, 'April', 2025, '2025-03-05 14:03:43'),
(6, 'BON42309', 9, 100.00, 900.00, 'February', 2025, '2025-03-05 14:04:08'),
(7, 'ALC004', 100, 39.00, 3900.00, 'March', 2025, '2025-03-17 08:58:33'),
(8, 'BCO353', 100, 100.00, 10000.00, 'March', 2025, '2025-03-17 08:58:57'),
(9, 'ADU001', 100, 10.00, 1000.00, 'January', 2025, '2025-03-17 17:35:54'),
(10, 'ADU001', 100, 100.00, 10000.00, 'January', 2025, '2025-03-19 10:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplies`
--

CREATE TABLE `tbl_supplies` (
  `ID` int(11) NOT NULL,
  `stock_no` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `baseline` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_supplies`
--

INSERT INTO `tbl_supplies` (`ID`, `stock_no`, `name`, `brand`, `description`, `category`, `unit`, `qty`, `baseline`, `date_created`) VALUES
(1, 'ADU001', 'ADAPTOR, Universal', 'ADAPTOR, Universal', 'ADAPTOR, Universal', 'Janitorial and Cleaning Supplies', 'Piece', 224, 20, '2025-03-17 08:53:32'),
(2, 'AAT327', 'AIRFRESHENER', 'AIRFRESHENER', 'AIRFRESHENER', 'Janitorial and Cleaning Supplies', 'Can', 100, 15, '2025-03-18 08:53:32'),
(3, 'AFR150', 'AIR FRESHENER, Aerosol type, 150g', 'AIR FRESHENER, Aerosol type, 150g', 'AIR FRESHENER, Aerosol type, 150g', 'Writing Instruments', 'can', 200, 30, '2025-03-19 08:53:32'),
(4, 'ACR204', 'ARE RING 2 HOLES', 'ARE RING 2 HOLES', 'ARE RING 2 HOLES', 'Office Stationery', 'piece', 9, 10, '2025-03-20 08:53:32'),
(5, 'ALC004', 'ALCOHOL ETHYL, 500ml', 'ALCOHOL ETHYL, 500ml', 'ALCOHOL ETHYL, 500ml', 'Office Stationery', 'Piece', 100, 10, '2025-03-21 08:53:32'),
(6, 'ALC005', 'ALCOHOL 1 GALLON', 'ALCOHOL 1 GALLON', 'ALCOHOL 1 GALLON', 'Office Stationery', 'box', 0, 30, '2025-03-22 08:53:32'),
(7, 'AVR045', 'AUTOMATIC VOLTAGE REGULATOR', 'AUTOMATIC VOLTAGE REGULATOR', 'AUTOMATIC VOLTAGE REGULATOR', '', 'piece', 0, 30, '2025-03-23 08:53:32'),
(8, 'BLS141', 'BALLAST, Flourescent 36-40 watts', 'BALLAST, Flourescent 36-40 watts', 'BALLAST, Flourescent 36-40 watts', '', 'piece', 0, 30, '2025-03-24 08:53:32'),
(9, 'BLP008', 'BALLPEN, Black & Blue', 'BALLPEN, Black & Blue', 'BALLPEN, Black & Blue', '', 'piece', 0, 30, '2025-03-25 08:53:32'),
(10, 'BLP009', 'BALLPEN, Green', 'BALLPEN, Green', 'BALLPEN, Green', '', 'piece', 0, 30, '2025-03-26 08:53:32'),
(11, 'BLP010', 'BALLPEN, Red', 'BALLPEN, Red', 'BALLPEN, Red', '', 'piece', 0, 30, '2025-03-27 08:53:32'),
(12, 'BNV327', 'BATTERY, 9 volts', 'BATTERY, 9 volts', 'BATTERY, 9 volts', '', 'piece', 0, 30, '2025-03-28 08:53:32'),
(13, 'B2A013', 'BATTERY, AA', 'BATTERY, AA', 'BATTERY, AA', '', 'piece', 0, 30, '2025-03-29 08:53:32'),
(14, 'B3A012', 'BATTERY, AAA', 'BATTERY, AAA', 'BATTERY, AAA', '', 'piece', 0, 30, '2025-03-30 08:53:32'),
(15, 'BCO353', 'BINDER CLIP, 19mm 3/4 mm', 'BINDER CLIP, 19mm 3/4 mm', 'BINDER CLIP, 19mm 3/4 mm', '', 'box', 100, 30, '2025-03-31 08:53:32'),
(16, 'BCP158', 'BINDER CLIP, 1 1/4\" 32mm', 'BINDER CLIP, 1 1/4\" 32mm', 'BINDER CLIP, 1 1/4\" 32mm', '', 'box', 0, 30, '2025-04-01 08:53:32'),
(17, 'BCP001', 'BINDER CLIP, 1\" 25mm', 'BINDER CLIP, 1\" 25mm', 'BINDER CLIP, 1\" 25mm', '', 'box', 0, 30, '2025-04-02 08:53:32'),
(18, 'BCP002', 'BINDER CLIP, 2\" 50mm', 'BINDER CLIP, 2\" 50mm', 'BINDER CLIP, 2\" 50mm', '', 'box', 0, 30, '2025-04-03 08:53:32'),
(19, 'BWL354', 'BOARDPAPER, A4, White', 'BOARDPAPER, A4, White', 'BOARDPAPER, A4, White', '', 'pack', 0, 30, '2025-04-04 08:53:32'),
(20, 'BBL278', 'BOARDPAPER, Long, White', 'BOARDPAPER, Long, White', 'BOARDPAPER, Long, White', '', 'pcs', 0, 30, '2025-04-05 08:53:32'),
(21, 'BEL276', 'BOARDPAPER, Short, White', 'BOARDPAPER, Short, White', 'BOARDPAPER, Short, White', '', 'pcs', 0, 30, '2025-04-06 08:53:32'),
(22, 'BND127', 'BOND,PAPER ONION SKIN', 'BOND,PAPER ONION SKIN', 'BOND,PAPER ONION SKIN', '', 'ream', 0, 30, '2025-04-07 08:53:32'),
(23, 'BKA021', 'BOOKPAPER, A4 Cactus', 'BOOKPAPER, A4 Cactus', 'BOOKPAPER, A4 Cactus', '', 'ream', 0, 30, '2025-04-08 08:53:32'),
(24, 'BKL022', 'BOOK PAPER,LONG', 'BOOK PAPER,LONG', 'BOOK PAPER,LONG', '', 'ream', 0, 30, '2025-04-09 08:53:32'),
(25, 'BWT001', 'BROOM, Soft / Walis Tambo', 'BROOM, Soft / Walis Tambo', 'BROOM, Soft / Walis Tambo', '', 'piece', 0, 30, '2025-04-10 08:53:32'),
(26, 'BWT307', 'BROOM, Stick / Walis Tingting', 'BROOM, Stick / Walis Tingting', 'BROOM, Stick / Walis Tingting', '', 'piece', 0, 30, '2025-04-11 08:53:32'),
(27, 'BLE113', 'BULB, ECO LUM LED 11w', 'BULB, ECO LUM LED 11w', 'BULB, ECO LUM LED 11w', '', 'piece', 0, 30, '2025-04-12 08:53:32'),
(28, 'CFA308', 'CARBON FILM, A4', 'CARBON FILM, A4', 'CARBON FILM, A4', '', 'pack', 0, 30, '2025-04-13 08:53:32'),
(29, 'CFL309', 'CARBON FILM, Long', 'CARBON FILM, Long', 'CARBON FILM, Long', '', 'pack', 0, 30, '2025-04-14 08:53:32'),
(30, 'CAC335', 'CARTOLINA, Assorted Colors', 'CARTOLINA, Assorted Colors', 'CARTOLINA, Assorted Colors', '', 'piece', 0, 30, '2025-04-15 08:53:32'),
(31, 'CLR267', 'CD Sticker/Label, Rough or Matte', 'CD Sticker/Label, Rough or Matte', 'CD Sticker/Label, Rough or Matte', '', 'pack', 0, 30, '2025-04-16 08:53:32'),
(32, 'CDR174', 'CD-R, 700mb 52x w/ soft casing', 'CD-R, 700mb 52x w/ soft casing', 'CD-R, 700mb 52x w/ soft casing', '', 'piece', 0, 30, '2025-04-17 08:53:32'),
(33, 'CEH210', 'CERTIFICATES HOLDER A4', 'CERTIFICATES HOLDER A4', 'CERTIFICATES HOLDER A4', '', 'piece', 0, 30, '2025-04-18 08:53:32'),
(34, 'CBA561', 'CLEAR BOOK, A4', 'CLEAR BOOK, A4', 'CLEAR BOOK, A4', '', 'piece', 0, 30, '2025-04-19 08:53:32'),
(35, 'CBL562', 'CLEAR BOOK, LONG', 'CLEAR BOOK, LONG', 'CLEAR BOOK, LONG', '', 'piece', 0, 30, '2025-04-20 08:53:32'),
(36, 'COK177', 'COMPUTER KEYBOARD, USB', 'COMPUTER KEYBOARD, USB', 'COMPUTER KEYBOARD, USB', '', 'piece', 0, 30, '2025-04-21 08:53:32'),
(37, 'CMP197', 'COMPUTER MOUSE PAD', 'COMPUTER MOUSE PAD', 'COMPUTER MOUSE PAD', '', 'piece', 0, 30, '2025-04-22 08:53:32'),
(38, 'CMO196', 'COMPUTER, Optical USB', 'COMPUTER, Optical USB', 'COMPUTER, Optical USB', '', 'piece', 0, 30, '2025-04-23 08:53:32'),
(39, 'CFW166', 'CORRECTION FLUID, Wipe-out', 'CORRECTION FLUID, Wipe-out', 'CORRECTION FLUID, Wipe-out', '', 'bot', 0, 30, '2025-04-24 08:53:32'),
(40, 'CTR357', 'CORRECTION TAPE, Refill', 'CORRECTION TAPE, Refill', 'CORRECTION TAPE, Refill', '', 'piece', 0, 30, '2025-04-25 08:53:32'),
(41, 'CTT355', 'CORRECTION TAPE, Whiper 5mmx12mm', 'CORRECTION TAPE, Whiper 5mmx12mm', 'CORRECTION TAPE, Whiper 5mmx12mm', '', 'piece', 0, 30, '2025-04-26 08:53:32'),
(42, 'CTF356', 'CORRECTION TAPE, Whiper', 'CORRECTION TAPE, Whiper', 'CORRECTION TAPE, Whiper', '', 'piece', 0, 30, '2025-04-27 08:53:32'),
(43, 'DMT552', 'CLEANER, TOILET ', 'CLEANER, TOILET ', 'CLEANER, TOILET ', '', 'box', 0, 30, '2025-04-28 08:53:32'),
(44, 'DFO323', 'Data file Organizer / Data Folder', 'Data file Organizer / Data Folder', 'Data file Organizer / Data Folder', '', 'piece', 0, 30, '2025-04-29 08:53:32'),
(45, 'DET553', 'DEODORIZER, TOILET \"Orchid\"', 'DEODORIZER, TOILET \"Orchid\"', 'DEODORIZER, TOILET \"Orchid\"', '', 'piece', 0, 30, '2025-04-30 08:53:32'),
(46, 'DST330', 'DISHWASHING LIQUID', 'DISHWASHING LIQUID', 'DISHWASHING LIQUID', '', 'pack', 0, 30, '2025-05-01 08:53:32'),
(47, 'DSF332', 'DISINFECTANT SPRAY', 'DISINFECTANT SPRAY', 'DISINFECTANT SPRAY', '', 'can', 0, 30, '2025-05-02 08:53:32'),
(48, 'DDV179', 'DVDR, 16x with soft casing', 'DVDR, 16x with soft casing', 'DVDR, 16x with soft casing', '', 'piece', 0, 30, '2025-05-03 08:53:32'),
(49, 'DRW180', 'DVD-RW, Recordable Enregistrable 4.7GB/120min./1-4x', 'DVD-RW, Recordable Enregistrable 4.7GB/120min./1-4x', 'DVD-RW, Recordable Enregistrable 4.7GB/120min./1-4x', '', 'piece', 0, 30, '2025-05-04 08:53:32'),
(50, 'DPP201', 'Dust Pan Plastic', 'Dust Pan Plastic', 'Dust Pan Plastic', '', 'piece', 0, 30, '2025-05-05 08:53:32'),
(51, 'EBL358', 'ENVELOPE BROWN, Long', 'ENVELOPE BROWN, Long', 'ENVELOPE BROWN, Long', '', 'piece', 0, 30, '2025-05-06 08:53:32'),
(52, 'EBS043', 'ENVELOPE BROWN, Short', 'ENVELOPE BROWN, Short', 'ENVELOPE BROWN, Short', '', 'piece', 0, 30, '2025-05-07 08:53:32'),
(53, 'EBA304', 'Envelop Brown A4', 'Envelop Brown A4', 'Envelop Brown A4', '', 'piece', 0, 30, '2025-05-08 08:53:32'),
(54, 'EUB308', 'ENVELOPE, EXPANDING, Legal, Brown', 'ENVELOPE, EXPANDING, Legal, Brown', 'ENVELOPE, EXPANDING, Legal, Brown', '', 'piece', 0, 30, '2025-05-09 08:53:32'),
(55, 'EEC045', 'ENVELOPE, EXPANDING w/ cosmic garter', 'ENVELOPE, EXPANDING w/ cosmic garter', 'ENVELOPE, EXPANDING w/ cosmic garter', '', 'piece', 0, 30, '2025-05-10 08:53:32'),
(56, 'EED051', 'ENVELOPE, EXPANDING with dividers, Red', 'ENVELOPE, EXPANDING with dividers, Red', 'ENVELOPE, EXPANDING with dividers, Red', '', 'piece', 0, 30, '2025-05-11 08:53:32'),
(57, 'EMW500', 'ENVELOPE MAILING WENDOW', 'ENVELOPE MAILING WENDOW', 'ENVELOPE MAILING WENDOW', '', 'pcs', 0, 30, '2025-05-12 08:53:32'),
(58, 'EBR359', 'ERASER for Pencil', 'ERASER for Pencil', 'ERASER for Pencil', '', 'piece', 0, 30, '2025-05-13 08:53:32'),
(59, 'EHD031', 'EXTERNAL HARD DRIVE 1TB', 'EXTERNAL HARD DRIVE 1TB', 'EXTERNAL HARD DRIVE 1TB', '', 'piece', 0, 30, '2025-05-14 08:53:32'),
(60, 'EOE201', 'EXTENSION CORD', 'EXTENSION CORD', 'EXTENSION CORD', '', 'piece', 0, 30, '2025-05-15 08:53:32'),
(61, 'EET204', 'EXTENSION CORD, 8 meters, 3 gang wire #10', 'EXTENSION CORD, 8 meters, 3 gang wire #10', 'EXTENSION CORD, 8 meters, 3 gang wire #10', '', 'piece', 0, 30, '2025-05-16 08:53:32'),
(62, 'SFM110', 'SURGICAL FACE MASK', 'SURGICAL FACE MASK', 'SURGICAL FACE MASK', '', 'box', 0, 30, '2025-05-17 08:53:32'),
(63, 'FST051', 'FASTENER, Metal', 'FASTENER, Metal', 'FASTENER, Metal', '', 'box', 0, 30, '2025-05-18 08:53:32'),
(64, 'FST050', 'FASTENENER, Plastic: Colored', 'FASTENENER, Plastic: Colored', 'FASTENENER, Plastic: Colored', '', 'box', 0, 30, '2025-05-19 08:53:32'),
(65, 'FPE287', 'FAX PAPER, 216 x 30 Eco', 'FAX PAPER, 216 x 30 Eco', 'FAX PAPER, 216 x 30 Eco', '', 'roll', 0, 30, '2025-05-20 08:53:32'),
(66, 'FDC288', 'FEATHER DUSTER, cloth-made', 'FEATHER DUSTER, cloth-made', 'FEATHER DUSTER, cloth-made', '', 'piece', 0, 30, '2025-05-21 08:53:32'),
(67, 'FOE201', 'FILE ORGANIZER, EXPANDING PLASTIC,LEGAL', 'FILE ORGANIZER, EXPANDING PLASTIC,LEGAL', 'FILE ORGANIZER, EXPANDING PLASTIC,LEGAL', '', 'piece', 0, 30, '2025-05-22 08:53:32'),
(68, 'FTD005', 'FILE TAB DIVIDER, A4 FIVE COLORS', 'FILE TAB DIVIDER, A4 FIVE COLORS', 'FILE TAB DIVIDER, A4 FIVE COLORS', '', 'set', 0, 30, '2025-05-23 08:53:32'),
(69, 'FTD006', 'FILE TAB DIVIDER, Legal/Long/Folio FIVE COLORS', 'FILE TAB DIVIDER, Legal/Long/Folio FIVE COLORS', 'FILE TAB DIVIDER, Legal/Long/Folio FIVE COLORS', '', 'set', 0, 30, '2025-05-24 08:53:32'),
(70, 'FDT200', 'FLASHDRIVE, 16GB', 'FLASHDRIVE, 16GB', 'FLASHDRIVE, 16GB', '', 'piece', 0, 30, '2025-05-25 08:53:32'),
(71, 'FDT202', 'FLASHDRIVE, 32GB', 'FLASHDRIVE, 32GB', 'FLASHDRIVE, 32GB', '', 'piece', 0, 30, '2025-05-26 08:53:32'),
(72, 'FDT264', 'Flash Drive 64GB', 'Flash Drive 64GB', 'Flash Drive 64GB', '', 'piece', 0, 30, '2025-05-27 08:53:32'),
(73, 'FDT268', 'Flash Drive 128GB', 'Flash Drive 128GB', 'Flash Drive 128GB', '', 'piece', 0, 30, '2025-05-28 08:53:32'),
(74, 'FCP032', 'Flip Chart Pad', 'Flip Chart Pad', 'Flip Chart Pad', '', 'pad', 0, 30, '2025-05-29 08:53:32'),
(75, 'FTF360', 'FLOURESCENT, TUBE, 36 watts / 40w', 'FLOURESCENT, TUBE, 36 watts / 40w', 'FLOURESCENT, TUBE, 36 watts / 40w', '', 'tube', 0, 30, '2025-05-30 08:53:32'),
(76, 'FVA501', 'FOLDER,BINDER,2-RING, HORIZONTAL, TOP CLIP, LONG', 'FOLDER,BINDER,2-RING, HORIZONTAL, TOP CLIP, LONG', 'FOLDER,BINDER,2-RING, HORIZONTAL, TOP CLIP, LONG', '', 'piece', 0, 30, '2025-05-31 08:53:32'),
(77, 'FPL361', 'FOLDER, CLEAR PLASTIC, Legal', 'FOLDER, CLEAR PLASTIC, Legal', 'FOLDER, CLEAR PLASTIC, Legal', '', 'piece', 0, 30, '2025-06-01 08:53:32'),
(78, 'FEW060', 'FOLDER, EXPANDING w/o Tab, Long (PRESSBOARD)', 'FOLDER, EXPANDING w/o Tab, Long (PRESSBOARD)', 'FOLDER, EXPANDING w/o Tab, Long (PRESSBOARD)', '', 'piece', 0, 30, '2025-06-02 08:53:32'),
(79, 'FET059', 'FOLDER, EXPANDING with Tab, Long (PRESSBOARD)', 'FOLDER, EXPANDING with Tab, Long (PRESSBOARD)', 'FOLDER, EXPANDING with Tab, Long (PRESSBOARD)', '', 'piece', 0, 30, '2025-06-03 08:53:32'),
(80, 'FMS271', 'FOLDER, FANCY with slider ', 'FOLDER, FANCY with slider ', 'FOLDER, FANCY with slider ', '', 'piece', 0, 30, '2025-06-04 08:53:32'),
(81, 'FLT496', 'FOLDER, L-TYPE, A4, Plastic', 'FOLDER, L-TYPE, A4, Plastic', 'FOLDER, L-TYPE, A4, Plastic', '', 'piece', 0, 30, '2025-06-05 08:53:32'),
(82, 'FLB412', 'FOLDER, L-TYPE, Long, Plastic', 'FOLDER, L-TYPE, Long, Plastic', 'FOLDER, L-TYPE, Long, Plastic', '', 'piece', 0, 30, '2025-06-06 08:53:32'),
(83, 'FMS272', 'FOLDER, A4 Morroco', 'FOLDER, A4 Morroco', 'FOLDER, A4 Morroco', '', 'piece', 0, 30, '2025-06-07 08:53:32'),
(84, 'FSW062', 'FOLDER, Short, Ordinary (TAG FOLDER)', 'FOLDER, Short, Ordinary (TAG FOLDER)', 'FOLDER, Short, Ordinary (TAG FOLDER)', '', 'piece', 0, 30, '2025-06-08 08:53:32'),
(85, 'FLW061', 'FOLDER,LONG', 'FOLDER,LONG', 'FOLDER,LONG', '', 'piece', 0, 30, '2025-06-09 08:53:32'),
(86, 'FTD495', 'FOLDER TAB DIVIDER', 'FOLDER TAB DIVIDER', 'FOLDER TAB DIVIDER', '', 'pack', 0, 30, '2025-06-10 08:53:32'),
(87, 'FPS298', 'FURNITURE POLISH 330ml', 'FURNITURE POLISH 330ml', 'FURNITURE POLISH 330ml', '', 'bottle', 0, 30, '2025-06-11 08:53:32'),
(88, 'GBB111', 'GARBAGE BAG, Medium', 'GARBAGE BAG, Medium', 'GARBAGE BAG, Medium', '', 'piece', 0, 30, '2025-06-12 08:53:32'),
(89, 'GBB112', 'GARBAGE BAG, Large 10 pcs per pack', 'GARBAGE BAG, Large 10 pcs per pack', 'GARBAGE BAG, Large 10 pcs per pack', '', 'pack', 0, 30, '2025-06-13 08:53:32'),
(90, 'GBB113', 'Garbage Bag, XL ', 'Garbage Bag, XL ', 'Garbage Bag, XL ', '', 'pack', 0, 30, '2025-06-14 08:53:32'),
(91, 'GLE340', 'GLOVES', 'GLOVES', 'GLOVES', '', 'pair', 0, 30, '2025-06-15 08:53:32'),
(92, 'GES066', 'GLUE', 'GLUE', 'GLUE', '', 'bottle', 0, 30, '2025-06-16 08:53:32'),
(93, 'HIG067', 'HIGHLIGHTER, Assorted colors', 'HIGHLIGHTER, Assorted colors', 'HIGHLIGHTER, Assorted colors', '', 'piece', 0, 30, '2025-06-17 08:53:32'),
(94, 'IDH364', 'ID JACKET Standard, HORIZONTAL type Ordinary', 'ID JACKET Standard, HORIZONTAL type Ordinary', 'ID JACKET Standard, HORIZONTAL type Ordinary', '', 'piece', 0, 30, '2025-06-18 08:53:32'),
(95, 'ILF001', 'ID Plastic Laminating Film, 75mmx105mmx125mm', 'ID Plastic Laminating Film, 75mmx105mmx125mm', 'ID Plastic Laminating Film, 75mmx105mmx125mm', '', 'box', 0, 30, '2025-06-19 08:53:32'),
(96, 'ICF310', 'INDEX CARD, 3 x 5, by 100s', 'INDEX CARD, 3 x 5, by 100s', 'INDEX CARD, 3 x 5, by 100s', '', 'pack', 0, 30, '2025-06-20 08:53:32'),
(97, 'ICB071', 'INDEX CARD, 5 x 8, by 100s', 'INDEX CARD, 5 x 8, by 100s', 'INDEX CARD, 5 x 8, by 100s', '', 'pack', 0, 30, '2025-06-21 08:53:32'),
(98, 'INT102', 'Index Tab self Adhesive', 'Index Tab self Adhesive', 'Index Tab self Adhesive', '', 'pad', 0, 30, '2025-06-22 08:53:32'),
(99, 'IBB232', 'INK, BROTHER BT6000- Black D60', 'INK, BROTHER BT6000- Black D60', 'INK, BROTHER BT6000- Black D60', '', 'bottle', 0, 30, '2025-06-23 08:53:32'),
(100, 'IBC231', 'INK, BROTHER, BT5000- Cyan', 'INK, BROTHER, BT5000- Cyan', 'INK, BROTHER, BT5000- Cyan', '', 'bottle', 0, 30, '2025-06-24 08:53:32'),
(101, 'IBM233', 'INK, BROTHER , BT5000, Magenta', 'INK, BROTHER , BT5000, Magenta', 'INK, BROTHER , BT5000, Magenta', '', 'bottle', 0, 30, '2025-06-25 08:53:32'),
(102, 'IBY234', 'INK, BROTHER BT5000, Yellow', 'INK, BROTHER BT5000, Yellow', 'INK, BROTHER BT5000, Yellow', '', 'bottle', 0, 30, '2025-06-26 08:53:32'),
(103, 'ICB318', 'INK, CANON PIXMA #35 Black', 'INK, CANON PIXMA #35 Black', 'INK, CANON PIXMA #35 Black', '', 'cartridge', 0, 30, '2025-06-27 08:53:32'),
(104, 'ICT319', 'INK, CANON PIXMA #36 Color', 'INK, CANON PIXMA #36 Color', 'INK, CANON PIXMA #36 Color', '', 'cartridge', 0, 30, '2025-06-28 08:53:32'),
(105, 'ICT320', 'INK, CANON PIXMA #40 Black', 'INK, CANON PIXMA #40 Black', 'INK, CANON PIXMA #40 Black', '', 'cartridge', 0, 30, '2025-06-29 08:53:32'),
(106, 'ICO321', 'INK, CANON PIXMA #41 Color', 'INK, CANON PIXMA #41 Color', 'INK, CANON PIXMA #41 Color', '', 'cartridge', 0, 30, '2025-06-30 08:53:32'),
(107, 'IBF305', 'INK, CANON CL-740 Black', 'INK, CANON CL-740 Black', 'INK, CANON CL-740 Black', '', 'cartridge', 0, 30, '2025-07-01 08:53:32'),
(108, 'ICF306', 'INK, CANON CL-741 Color', 'INK, CANON CL-741 Color', 'INK, CANON CL-741 Color', '', 'cartridge', 0, 30, '2025-07-02 08:53:32'),
(109, 'ICP179', 'INK, CANON CL-810 Black', 'INK, CANON CL-810 Black', 'INK, CANON CL-810 Black', '', 'cartridge', 0, 30, '2025-07-03 08:53:32'),
(110, 'ICP178', 'INK, CANON CL-811 Color', 'INK, CANON CL-811 Color', 'INK, CANON CL-811 Color', '', 'cartridge', 0, 30, '2025-07-04 08:53:32'),
(111, 'IEB164', 'INK, EPSON 664 BLACK', 'INK, EPSON 664 BLACK', 'INK, EPSON 664 BLACK', '', 'bottle', 0, 30, '2025-07-05 08:53:32'),
(112, 'IEC165', 'INK, EPSON 664 CYAN', 'INK, EPSON 664 CYAN', 'INK, EPSON 664 CYAN', '', 'bottle', 0, 30, '2025-07-06 08:53:32'),
(113, 'IEM166', 'INK, EPSON 664 MAGENTA', 'INK, EPSON 664 MAGENTA', 'INK, EPSON 664 MAGENTA', '', 'bottle', 0, 30, '2025-07-07 08:53:32'),
(114, 'IEY167', 'INK, EPSON 664 YELLOW', 'INK, EPSON 664 YELLOW', 'INK, EPSON 664 YELLOW', '', 'bottle', 0, 30, '2025-07-08 08:53:32'),
(115, 'IEB112', 'INK, EPSON 003 BLACK', 'INK, EPSON 003 BLACK', 'INK, EPSON 003 BLACK', '', 'bottle', 0, 30, '2025-07-09 08:53:32'),
(116, 'IEC113', 'INK, EPSON 003 CYAN', 'INK, EPSON 003 CYAN', 'INK, EPSON 003 CYAN', '', 'bottle', 0, 30, '2025-07-10 08:53:32'),
(117, 'IEM114', 'INK, EPSON 003 MAGENTA', 'INK, EPSON 003 MAGENTA', 'INK, EPSON 003 MAGENTA', '', 'bottle', 0, 30, '2025-07-11 08:53:32'),
(118, 'IEY115', 'INK, EPSON 033 YELLOW', 'INK, EPSON 033 YELLOW', 'INK, EPSON 033 YELLOW', '', 'bottle', 0, 30, '2025-07-12 08:53:32'),
(119, 'ITF263', 'INK, HP Laser 35A (Laser P1006)', 'INK, HP Laser 35A (Laser P1006)', 'INK, HP Laser 35A (Laser P1006)', '', 'toner', 0, 30, '2025-07-13 08:53:32'),
(120, 'ITF264', 'INK, HP Laser 36A', 'INK, HP Laser 36A', 'INK, HP Laser 36A', '', 'toner', 0, 30, '2025-07-14 08:53:32'),
(121, 'IBT279', 'INK, HP Laser CC530A Black, 304A', 'INK, HP Laser CC530A Black, 304A', 'INK, HP Laser CC530A Black, 304A', '', 'toner', 0, 30, '2025-07-15 08:53:32'),
(122, 'ICT280', 'INK, HP Laser CC531A Cyan, 304A', 'INK, HP Laser CC531A Cyan, 304A', 'INK, HP Laser CC531A Cyan, 304A', '', 'toner', 0, 30, '2025-07-16 08:53:32'),
(123, 'IYT281', 'INK, HP Laser CC532A Yellow, 304A', 'INK, HP Laser CC532A Yellow, 304A', 'INK, HP Laser CC532A Yellow, 304A', '', 'toner', 0, 30, '2025-07-17 08:53:32'),
(124, 'IMT282', 'INK, HP Laser CC533A Magenta, 304A', 'INK, HP Laser CC533A Magenta, 304A', 'INK, HP Laser CC533A Magenta, 304A', '', 'toner', 0, 30, '2025-07-18 08:53:32'),
(125, 'IJF323', 'INK, HP Laser Jet 05A (505A)', 'INK, HP Laser Jet 05A (505A)', 'INK, HP Laser Jet 05A (505A)', '', 'toner', 0, 30, '2025-07-19 08:53:32'),
(126, 'INO209', 'INK, HP#21', 'INK, HP#21', 'INK, HP#21', '', 'cartridge', 0, 30, '2025-07-20 08:53:32'),
(127, 'INC210', 'INK, HP#22 Tri Color', 'INK, HP#22 Tri Color', 'INK, HP#22 Tri Color', '', 'cartridge', 0, 30, '2025-07-21 08:53:32'),
(128, 'INB185', 'INK, HP#27, Black', 'INK, HP#27, Black', 'INK, HP#27, Black', '', 'cartridge', 0, 30, '2025-07-22 08:53:32'),
(129, 'INC186', 'INK, HP#28, Colored', 'INK, HP#28, Colored', 'INK, HP#28, Colored', '', 'cartridge', 0, 30, '2025-07-23 08:53:32'),
(130, 'ISB325', 'INK, HP#704, Black (HP 2010)', 'INK, HP#704, Black (HP 2010)', 'INK, HP#704, Black (HP 2010)', '', 'cartridge', 0, 30, '2025-07-24 08:53:32'),
(131, 'IST326', 'INK, HP#704, Colored (HP 2010)', 'INK, HP#704, Colored (HP 2010)', 'INK, HP#704, Colored (HP 2010)', '', 'cartridge', 0, 30, '2025-07-25 08:53:32'),
(132, 'IBN089', 'Ink, HP#900, Black', 'Ink, HP#900, Black', 'Ink, HP#900, Black', '', 'cartridge', 0, 30, '2025-07-26 08:53:32'),
(133, 'ITN088', 'Ink, HP#900, Tricolour', 'Ink, HP#900, Tricolour', 'Ink, HP#900, Tricolour', '', 'cartridge', 0, 30, '2025-07-27 08:53:32'),
(134, 'IHT450', 'Ink, HP#93, Tri Color', 'Ink, HP#93, Tri Color', 'Ink, HP#93, Tri Color', '', 'cartridge', 0, 30, '2025-07-28 08:53:32'),
(135, 'IHC245', 'Ink, HP#95, Tri Color', 'Ink, HP#95, Tri Color', 'Ink, HP#95, Tri Color', '', 'cartridge', 0, 30, '2025-07-29 08:53:32'),
(136, 'IHB087', 'Ink, HP#98, Black', 'Ink, HP#98, Black', 'Ink, HP#98, Black', '', 'cartridge', 0, 30, '2025-07-30 08:53:32'),
(137, 'IPP365', 'INK for STAMP PAD, Purple', 'INK for STAMP PAD, Purple', 'INK for STAMP PAD, Purple', '', 'bottle', 0, 30, '2025-07-31 08:53:32'),
(138, 'MPP083', 'MANILA PAPER, Folded', 'MANILA PAPER, Folded', 'MANILA PAPER, Folded', '', 'piece', 0, 30, '2025-08-01 08:53:32'),
(139, 'MPB444', 'MARKING PEN, BULLET Permanent, Black & Blue', 'MARKING PEN, BULLET Permanent, Black & Blue', 'MARKING PEN, BULLET Permanent, Black & Blue', '', 'piece', 0, 30, '2025-08-02 08:53:32'),
(140, 'MPB445', 'MARKING PEN, BULLET Permanent, Red', 'MARKING PEN, BULLET Permanent, Red', 'MARKING PEN, BULLET Permanent, Red', '', 'piece', 0, 30, '2025-08-03 08:53:32'),
(141, 'WBB314', 'MARKING PEN, Whiteboard, BULLET, Black & Blue', 'MARKING PEN, Whiteboard, BULLET, Black & Blue', 'MARKING PEN, Whiteboard, BULLET, Black & Blue', '', 'piece', 0, 30, '2025-08-04 08:53:32'),
(142, 'WBR315', 'MARKING PEN,Whiteboard, BULLET, Red', 'MARKING PEN,Whiteboard, BULLET, Red', 'MARKING PEN,Whiteboard, BULLET, Red', '', 'piece', 0, 30, '2025-08-05 08:53:32'),
(143, 'MOH087', 'MOPHEAD, Clothe', 'MOPHEAD, Clothe', 'MOPHEAD, Clothe', '', 'piece', 0, 30, '2025-08-06 08:53:32'),
(144, 'CMW198', 'Mouse Wireless usb A4 tech', 'Mouse Wireless usb A4 tech', 'Mouse Wireless usb A4 tech', '', 'piece', 0, 30, '2025-08-07 08:53:32'),
(145, 'UWM001', 'USB Wired Mouse', 'USB Wired Mouse', 'USB Wired Mouse', '', 'piece', 0, 30, '2025-08-08 08:53:32'),
(146, 'MKK342', 'Multi-Insect Killer,', 'Multi-Insect Killer,', 'Multi-Insect Killer,', '', 'can', 0, 30, '2025-08-09 08:53:32'),
(147, 'MUA302', 'Muriatic Acid', 'Muriatic Acid', 'Muriatic Acid', '', 'gallon', 0, 30, '2025-08-10 08:53:32'),
(148, 'PCB097', 'PAPER CLIP, Big 50mm', 'PAPER CLIP, Big 50mm', 'PAPER CLIP, Big 50mm', '', 'box', 0, 30, '2025-08-11 08:53:32'),
(149, 'PCS098', 'PAPER CLIP, Small 33mm', 'PAPER CLIP, Small 33mm', 'PAPER CLIP, Small 33mm', '', 'box', 0, 30, '2025-08-12 08:53:32'),
(150, 'PCB099', 'PAPERCUTTER, Big, Multifunction autoblade', 'PAPERCUTTER, Big, Multifunction autoblade', 'PAPERCUTTER, Big, Multifunction autoblade', '', 'piece', 0, 30, '2025-08-13 08:53:32'),
(151, 'PBB283', 'PAPERCUTTER BLADE, Big', 'PAPERCUTTER BLADE, Big', 'PAPERCUTTER BLADE, Big', '', 'tube', 0, 30, '2025-08-14 08:53:32'),
(152, 'PPY156', 'PAPER with lines, Yellow', 'PAPER with lines, Yellow', 'PAPER with lines, Yellow', '', 'pad', 0, 30, '2025-08-15 08:53:32'),
(153, 'PRS420', 'PASTE', 'PASTE', 'PASTE', '', 'jar', 0, 30, '2025-08-16 08:53:32'),
(154, 'PEM104', 'PENCIL', 'PENCIL', 'PENCIL', '', 'piece', 0, 30, '2025-08-17 08:53:32'),
(155, 'PES105', 'PENCIL SHAPENER', 'PENCIL SHAPENER', 'PENCIL SHAPENER', '', 'piece', 0, 30, '2025-08-18 08:53:32'),
(156, 'LFW100', 'Liquid Folish Floor Wax 250ML ZIM', 'Liquid Folish Floor Wax 250ML ZIM', 'Liquid Folish Floor Wax 250ML ZIM', '', 'bottle', 0, 30, '2025-08-19 08:53:32'),
(157, 'PUN021', 'PUNCHER, 2 Holes, Big', 'PUNCHER, 2 Holes, Big', 'PUNCHER, 2 Holes, Big', '', 'piece', 0, 30, '2025-08-20 08:53:32'),
(158, 'PPS108', 'PUSH PINS / Map pins by 100\'s, Flathead', 'PUSH PINS / Map pins by 100\'s, Flathead', 'PUSH PINS / Map pins by 100\'s, Flathead', '', 'pack', 0, 30, '2025-08-21 08:53:32'),
(159, 'RCT319', 'RAGS, cotton, 35 pcs/kilo', 'RAGS, cotton, 35 pcs/kilo', 'RAGS, cotton, 35 pcs/kilo', '', 'piece', 0, 30, '2025-08-22 08:53:32'),
(160, 'REB112', 'RECORD BOOK, 300p', 'RECORD BOOK, 300p', 'RECORD BOOK, 300p', '', 'piece', 0, 30, '2025-08-23 08:53:32'),
(161, 'REB111', 'RECORD BOOK, 500p', 'RECORD BOOK, 500p', 'RECORD BOOK, 500p', '', 'piece', 0, 30, '2025-08-24 08:53:32'),
(162, 'RCN113', 'REFILL, Course Notes / Binder Dynamic Filler 8-1/4 x 5-1/2 by 5 division', 'REFILL, Course Notes / Binder Dynamic Filler 8-1/4 x 5-1/2 by 5 division', 'REFILL, Course Notes / Binder Dynamic Filler 8-1/4 x 5-1/2 by 5 division', '', 'pack', 0, 30, '2025-08-25 08:53:32'),
(163, 'RBS281', 'RUBBER BOND (multipurpose)', 'RUBBER BOND (multipurpose)', 'RUBBER BOND (multipurpose)', '', 'box', 0, 30, '2025-08-26 08:53:32'),
(164, 'RPT282', 'RULER, Plastic', 'RULER, Plastic', 'RULER, Plastic', '', 'piece', 0, 30, '2025-08-27 08:53:32'),
(165, 'RST283', 'RULER, 30mm Steel', 'RULER, 30mm Steel', 'RULER, 30mm Steel', '', 'piece', 0, 30, '2025-08-28 08:53:32'),
(166, 'HSA003', 'Hand Sanitizer alcohol', 'Hand Sanitizer alcohol', 'Hand Sanitizer alcohol', '', 'bottle', 0, 30, '2025-08-29 08:53:32'),
(167, 'SCI158', 'SCISSORS, 6 stainless', 'SCISSORS, 6 stainless', 'SCISSORS, 6 stainless', '', 'pairs', 0, 30, '2025-08-30 08:53:32'),
(168, 'SSB322', 'SCOURING PAD', 'SCOURING PAD', 'SCOURING PAD', '', 'pack', 0, 30, '2025-08-31 08:53:32'),
(169, 'PSC304', 'PAPER SHEDDER cutting width 3mm-4mm', 'PAPER SHEDDER cutting width 3mm-4mm', 'PAPER SHEDDER cutting width 3mm-4mm', '', 'unit', 0, 30, '2025-09-01 08:53:32'),
(170, 'SMY122', 'SIGNPEN, Black & Blue', 'SIGNPEN, Black & Blue', 'SIGNPEN, Black & Blue', '', 'piece', 0, 30, '2025-09-02 08:53:32'),
(171, 'SMR124', 'SIGNPEN,  RED', 'SIGNPEN,  RED', 'SIGNPEN,  RED', '', 'piece', 0, 30, '2025-09-03 08:53:32'),
(172, 'SDP331', 'SOAP, DETERGENT POWDER,1 kg', 'SOAP, DETERGENT POWDER,1 kg', 'SOAP, DETERGENT POWDER,1 kg', '', 'pack', 0, 30, '2025-09-04 08:53:32'),
(173, 'SLH451', 'SOAP, HAND, Liquid', 'SOAP, HAND, Liquid', 'SOAP, HAND, Liquid', '', 'bottle', 0, 30, '2025-09-05 08:53:32'),
(174, 'SPW452', 'SOAP, POWDER, Zim', 'SOAP, POWDER, Zim', 'SOAP, POWDER, Zim', '', 'bottle', 0, 30, '2025-09-06 08:53:32'),
(175, 'SBS201', 'SPIRAL BINDER 7/16\", Black', 'SPIRAL BINDER 7/16\", Black', 'SPIRAL BINDER 7/16\", Black', '', 'roll', 0, 30, '2025-09-07 08:53:32'),
(176, 'DFS320', 'Diswashing Foam Sponge', 'Diswashing Foam Sponge', 'Diswashing Foam Sponge', '', 'pack', 0, 30, '2025-09-08 08:53:32'),
(177, 'SPJ373', 'STAMP PAD ', 'STAMP PAD ', 'STAMP PAD ', '', 'box', 0, 30, '2025-09-09 08:53:32'),
(178, 'SWS129', 'STAPLE WIRE #10', 'STAPLE WIRE #10', 'STAPLE WIRE #10', '', 'box', 0, 30, '2025-09-10 08:53:32'),
(179, 'SWB130', 'STAPLE WIRE #35', 'STAPLE WIRE #35', 'STAPLE WIRE #35', '', 'box', 0, 30, '2025-09-11 08:53:32'),
(180, 'SBD139', 'STAPLER with remover, standard', 'STAPLER with remover, standard', 'STAPLER with remover, standard', '', 'unit', 0, 30, '2025-09-12 08:53:32'),
(181, 'SN5020', 'STICK-ON NOTE 5 COLOURS', 'STICK-ON NOTE 5 COLOURS', 'STICK-ON NOTE 5 COLOURS', '', 'pad', 0, 30, '2025-09-13 08:53:32'),
(182, 'SNS377', 'STICKY NOTE PAD, 75mmx50mm 3X2', 'STICKY NOTE PAD, 75mmx50mm 3X2', 'STICKY NOTE PAD, 75mmx50mm 3X2', '', 'pad', 0, 30, '2025-09-14 08:53:32'),
(183, 'SNS378', 'STICKY NOTE PAD, 101mmX76mm /3x4', 'STICKY NOTE PAD, 101mmX76mm /3x4', 'STICKY NOTE PAD, 101mmX76mm /3x4', '', 'pad', 0, 30, '2025-09-15 08:53:32'),
(184, 'SNS379', 'STICKY NOTE PAD, 76x76mm/ 3x3', 'STICKY NOTE PAD, 76x76mm/ 3x3', 'STICKY NOTE PAD, 76x76mm/ 3x3', '', 'pad', 0, 30, '2025-09-16 08:53:32'),
(185, 'SNS376', 'STICKY NOTE PAD,73mmX123mm/3X5', 'STICKY NOTE PAD,73mmX123mm/3X5', 'STICKY NOTE PAD,73mmX123mm/3X5', '', 'pad', 0, 30, '2025-09-17 08:53:32'),
(186, 'SPL345', 'Sticker Paper', 'Sticker Paper', 'Sticker Paper', '', 'pack', 0, 30, '2025-09-18 08:53:32'),
(187, 'TDO320', 'TAPE DISPENSER, Table Top for 24mm, 1\"', 'TAPE DISPENSER, Table Top for 24mm, 1\"', 'TAPE DISPENSER, Table Top for 24mm, 1\"', '', 'roll', 0, 30, '2025-09-19 08:53:32'),
(188, 'TEO379', 'TAPE, ELECTRICAL, Croco 1 inch 4 mtrs.', 'TAPE, ELECTRICAL, Croco 1 inch 4 mtrs.', 'TAPE, ELECTRICAL, Croco 1 inch 4 mtrs.', '', 'roll', 0, 30, '2025-09-20 08:53:32'),
(189, 'TMT140', 'TAPE, MASKING, 1\" 30 mtrs', 'TAPE, MASKING, 1\" 30 mtrs', 'TAPE, MASKING, 1\" 30 mtrs', '', 'roll', 0, 30, '2025-09-21 08:53:32'),
(190, 'TMT168', 'TAPE, MASKING, 2\" 30 mtrs', 'TAPE, MASKING, 2\" 30 mtrs', 'TAPE, MASKING, 2\" 30 mtrs', '', 'roll', 0, 30, '2025-09-22 08:53:32'),
(191, 'TPT141', 'TAPE, PACKAGING, 2\" 50 mtrs ', 'TAPE, PACKAGING, 2\" 50 mtrs ', 'TAPE, PACKAGING, 2\" 50 mtrs ', '', 'roll', 0, 30, '2025-09-23 08:53:32'),
(192, 'TTO382', 'TAPE, TRANSPARENT, 1\" 24mm', 'TAPE, TRANSPARENT, 1\" 24mm', 'TAPE, TRANSPARENT, 1\" 24mm', '', 'roll', 0, 30, '2025-09-24 08:53:32'),
(193, 'TTT383', 'TAPE, TRANSPARENT, 2\" 48mm', 'TAPE, TRANSPARENT, 2\" 48mm', 'TAPE, TRANSPARENT, 2\" 48mm', '', 'roll', 0, 30, '2025-09-25 08:53:32'),
(194, 'TDF145', 'TAPE, DUCT, 2\" Green', 'TAPE, DUCT, 2\" Green', 'TAPE, DUCT, 2\" Green', '', 'roll', 0, 30, '2025-09-26 08:53:32'),
(195, 'TDS234', 'TAPE DOULBLE-SIDED, 1\"', 'TAPE DOULBLE-SIDED, 1\"', 'TAPE DOULBLE-SIDED, 1\"', '', 'roll', 0, 30, '2025-09-27 08:53:32'),
(196, 'THU147', 'THUMBTACKS', 'THUMBTACKS', 'THUMBTACKS', '', 'box', 0, 30, '2025-09-28 08:53:32'),
(197, 'TPJ344', 'TISSUE, PAPER, 2-ply', 'TISSUE, PAPER, 2-ply', 'TISSUE, PAPER, 2-ply', '', 'pack', 0, 30, '2025-09-29 08:53:32'),
(198, 'TUN345', 'TOILET BOWL CLEANSER, 900ml', 'TOILET BOWL CLEANSER, 900ml', 'TOILET BOWL CLEANSER, 900ml', '', 'bottle', 0, 30, '2025-09-30 08:53:32'),
(199, 'TBP315', 'TOILET BRUSH', 'TOILET BRUSH', 'TOILET BRUSH', '', 'piece', 0, 30, '2025-10-01 08:53:32'),
(200, 'TON149', 'TONER for copier KM 18-15 for 1510 & 18-10', 'TONER for copier KM 18-15 for 1510 & 18-10', 'TONER for copier KM 18-15 for 1510 & 18-10', '', 'cartridge', 0, 30, '2025-10-02 08:53:32'),
(201, 'TON291', 'TONER for TK-1147', 'TONER for TK-1147', 'TONER for TK-1147', '', 'cartridge', 0, 30, '2025-10-03 08:53:32'),
(202, 'TON290', 'TONER for TK-410', 'TONER for TK-410', 'TONER for TK-410', '', 'cartridge', 0, 30, '2025-10-04 08:53:32'),
(203, 'TOB448', 'TONER TN-3448 BROTHER', 'TONER TN-3448 BROTHER', 'TONER TN-3448 BROTHER', '', 'cartridge', 0, 30, '2025-10-05 08:53:32'),
(204, 'TON302', 'TONER HP 103AD Jet Toner', 'TONER HP 103AD Jet Toner', 'TONER HP 103AD Jet Toner', '', 'cartridge', 0, 30, '2025-10-06 08:53:32'),
(205, 'TPL152', 'TWINE, Plastic 1 kg', 'TWINE, Plastic 1 kg', 'TWINE, Plastic 1 kg', '', 'roll', 0, 30, '2025-10-07 08:53:32'),
(206, 'UPS650', 'UNINTERPTABLE POWER SUPPLY 650VA', 'UNINTERPTABLE POWER SUPPLY 650VA', 'UNINTERPTABLE POWER SUPPLY 650VA', '', 'piece', 0, 30, '2025-10-08 08:53:32'),
(207, 'IRB326', 'Universal Refilling Ink by 4s Black', 'Universal Refilling Ink by 4s Black', 'Universal Refilling Ink by 4s Black', '', 'bottle', 0, 30, '2025-10-09 08:53:32'),
(208, 'UNI001', 'Universal Refilling Ink by 4s Cyan', 'Universal Refilling Ink by 4s Cyan', 'Universal Refilling Ink by 4s Cyan', '', 'bottle', 0, 30, '2025-10-10 08:53:32'),
(209, 'UNI002', 'Universal Refilling Ink by 4s Magenta', 'Universal Refilling Ink by 4s Magenta', 'Universal Refilling Ink by 4s Magenta', '', 'bottle', 0, 30, '2025-10-11 08:53:32'),
(210, 'UNI003', 'Universal Refilling Ink by 4s Yellow', 'Universal Refilling Ink by 4s Yellow', 'Universal Refilling Ink by 4s Yellow', '', 'bottle', 0, 30, '2025-10-12 08:53:32'),
(211, 'WSB147', 'WASTE BASKET', 'WASTE BASKET', 'WASTE BASKET', '', 'piece', 0, 30, '2025-10-13 08:53:32'),
(212, 'WHE001', 'Whiteboard Eraser', 'Whiteboard Eraser', 'Whiteboard Eraser', '', 'piece', 0, 30, '2025-10-14 08:53:32'),
(213, 'BAL2923', 'test', 'test', 'test', 'Office Stationery', 'Piece', 0, 109, '2025-03-19 10:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfers`
--

CREATE TABLE `tbl_transfers` (
  `ID` int(11) NOT NULL,
  `entity_name` varchar(100) NOT NULL,
  `fund_cluster` varchar(100) NOT NULL,
  `from_account` varchar(100) NOT NULL,
  `to_account` varchar(100) NOT NULL,
  `ITR_no` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `transfer_type` varchar(100) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfers_dtl`
--

CREATE TABLE `tbl_transfers_dtl` (
  `ID` int(11) NOT NULL,
  `transfer_ID` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
  `ics_no` varchar(100) NOT NULL,
  `ics_date` date NOT NULL,
  `property_no` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `unit_cost` double(10,2) NOT NULL,
  `cond` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `username`, `password`, `fname`, `lname`, `mname`, `position`, `user_type`, `date_created`) VALUES
(1, 'super.admin', '$2y$10$9vYxQZsk/WGYVKe1ZixePOPwN8tPyPcANfmUiSoQFdOFq4xWMcxba', 'Aljon', 'Mutalib', 'Sugala', 'Information Technology Officer I', 'Admin', '2025-02-26 13:40:23'),
(2, 'supply.admin', '$2y$10$r4nb4n5.ekuXD5NTjC8sOOQZeWqStDZDF8N5pRqAEwJhw7DeiJRzS', 'Kristine Lorraine', 'Ariston', 'G', 'Administrative Officer IV', 'Supply', '2025-02-26 13:41:32'),
(3, 'ord.admin', '$2y$10$vy51s.1zkyk5DDjbL20Q2OzmVqOFusT.b01/NCMSoAT1RJWz5ZJUK', 'Cheryl', 'Ortega', 'Camenforte', 'Region Director', 'Director', '2025-02-26 13:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdrawals`
--

CREATE TABLE `tbl_withdrawals` (
  `ID` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `division` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `rcc` varchar(100) NOT NULL,
  `ris_no` varchar(100) DEFAULT NULL,
  `sai_no` varchar(100) DEFAULT NULL,
  `purpose` varchar(150) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_withdrawals`
--

INSERT INTO `tbl_withdrawals` (`ID`, `employee_ID`, `division`, `office`, `rcc`, `ris_no`, `sai_no`, `purpose`, `stat`, `date_created`) VALUES
(1, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-001', 'R9BST-SAI-2025-03-001', 'For MISS Training only.', 0, '2025-03-19 13:47:18'),
(2, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-002', 'R9BST-SAI-2025-03-002', '', 0, '2025-03-19 13:47:18'),
(3, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-003', 'R9BST-SAI-2025-03-003', '', 0, '2025-03-19 13:47:18'),
(4, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-004', 'R9BST-SAI-2025-03-004', '', 0, '2025-03-19 13:47:18'),
(5, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-005', 'R9BST-SAI-2025-03-005', 'For NICT Month.', 0, '2025-03-19 13:47:18'),
(6, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-006', 'R9BST-SAI-2025-03-006', 'Testing', 0, '2025-03-19 13:47:18'),
(7, 1, 'ORD', 'DICT Region IX and BASULTA', '100000100001000', 'R9BST-RIS-2025-03-007', 'R9BST-SAI-2025-03-007', 'Test', 0, '2025-03-19 13:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdrawals_dtl`
--

CREATE TABLE `tbl_withdrawals_dtl` (
  `ID` int(11) NOT NULL,
  `withdrawal_ID` int(11) NOT NULL DEFAULT 0,
  `userID` int(11) NOT NULL DEFAULT 0,
  `stock_no` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `requisition_qty` int(11) NOT NULL DEFAULT 0,
  `issuance_qty` int(11) NOT NULL DEFAULT 0,
  `issuance_remarks` varchar(11) DEFAULT NULL,
  `status_req` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_withdrawals_dtl`
--

INSERT INTO `tbl_withdrawals_dtl` (`ID`, `withdrawal_ID`, `userID`, `stock_no`, `unit`, `description`, `requisition_qty`, `issuance_qty`, `issuance_remarks`, `status_req`, `date_created`) VALUES
(1, 1, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 120, 120, NULL, 0, '2025-03-18 21:50:44'),
(2, 1, 1, 'AFR150', 'can', 'AIR FRESHENER, Aerosol type, 150g', 100, 10, NULL, 0, '2025-03-18 21:50:44'),
(3, 1, 1, 'AAT327', 'can', 'AIRFRESHENER', 90, 90, NULL, 0, '2025-03-18 21:50:52'),
(4, 1, 1, 'ALC004', 'Piece', 'ALCOHOL ETHYL, 500ml', 10, 10, NULL, 0, '2025-03-18 21:50:52'),
(5, 1, 1, 'ACR204', 'piece', 'ARE RING 2 HOLES', 9, 5, NULL, 0, '2025-03-18 21:55:33'),
(6, 2, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 20, 0, NULL, 0, '2025-03-19 04:56:33'),
(7, 2, 1, 'AFR150', 'can', 'AIR FRESHENER, Aerosol type, 150g', 30, 0, NULL, 0, '2025-03-19 04:56:33'),
(10, 3, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 30, 0, NULL, 0, '2025-03-19 05:00:21'),
(11, 3, 1, 'AFR150', 'can', 'AIR FRESHENER, Aerosol type, 150g', 40, 0, NULL, 0, '2025-03-19 05:00:21'),
(12, 4, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 0, 0, NULL, 0, '2025-03-19 05:06:05'),
(13, 5, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 0, 0, NULL, 0, '2025-03-19 05:08:53'),
(14, 5, 1, 'AFR150', 'can', 'AIR FRESHENER, Aerosol type, 150g', 0, 0, NULL, 0, '2025-03-19 05:08:53'),
(25, 6, 1, 'AAT327', 'can', 'AIRFRESHENER', 10, 0, NULL, 0, '2025-03-19 09:30:17'),
(28, 6, 1, 'AFR150', 'can', 'AIR FRESHENER, Aerosol type, 150g', 10, 0, NULL, 0, '2025-03-19 09:33:25'),
(29, 6, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 10, 0, NULL, 0, '2025-03-19 09:35:24'),
(30, 7, 1, 'ADU001', 'piece', 'ADAPTOR, Universal', 100, 0, NULL, 0, '2025-03-19 10:22:49'),
(31, 7, 1, 'AFR150', 'can', 'AIR FRESHENER, Aerosol type, 150g', 100, 0, NULL, 0, '2025-03-19 10:22:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_supplies`
--
ALTER TABLE `tbl_supplies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_transfers_dtl`
--
ALTER TABLE `tbl_transfers_dtl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_withdrawals`
--
ALTER TABLE `tbl_withdrawals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_withdrawals_dtl`
--
ALTER TABLE `tbl_withdrawals_dtl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_supplies`
--
ALTER TABLE `tbl_supplies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `tbl_transfers_dtl`
--
ALTER TABLE `tbl_transfers_dtl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_withdrawals`
--
ALTER TABLE `tbl_withdrawals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_withdrawals_dtl`
--
ALTER TABLE `tbl_withdrawals_dtl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
