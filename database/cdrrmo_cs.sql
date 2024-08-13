-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 01:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdrrmo_cs`
--

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `id` int(11) NOT NULL,
  `brgy_id` varchar(11) NOT NULL,
  `inc_id` varchar(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cause_inc` varchar(255) NOT NULL,
  `inc_kind` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `img` varchar(255) NOT NULL,
  `report_by` varchar(255) NOT NULL,
  `inc_report_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `brgy_id`, `inc_id`, `fname`, `mname`, `lname`, `suffix`, `gender`, `age`, `address`, `cause_inc`, `inc_kind`, `date`, `time`, `img`, `report_by`, `inc_report_by`) VALUES
(31, '1', '5', 'bdjdjj', 'bzjsks', 'ddjd', 'dndnd', 'Male', '6', 'brgy1', 'gunshoot ', '12', '2023-01-31', '00:00:00', '16751381411554504294589719769719.jpg/', '0', '0'),
(33, '1', '5', 'Juan', 'C', 'Pablo', 'Jr.', 'Male', '18', 'Bgy1', 'Basketball injury', '16', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(34, '1', '5', 'Mark Jason', 'P', 'Alfonso', 'Sr.', 'Male', '43', 'So. Pamahawan brgy. Palampas', 'Lose break ', '13', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(35, '1', '5', 'Jessy', 'P', 'Santos', 'NONE', 'Male', '28', 'Brgy. Bagonbon', 'Explosion', '17', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(37, '1', '6', 'Cardo', 'M', 'Dalisay', 'Sr.', 'Male', '40', 'Sipaway', 'Diabetic after party', '21', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(38, '1', '6', 'Clara', 'D', 'Barba', 'NONE', 'Female', '26', 'Brgy1', 'N/A', '23', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(39, '1', '6', 'Monica', 'S', 'Pasko', 'NONE', 'Female', '25', 'Bgy1', 'Ashtmatic ', '18', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(40, '1', '7', 'Alyana', 'F', 'Talisay', 'NONE', 'Female', '18', 'Bgy1', 'Gas tank explosion', '24', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(42, '1', '7', 'Taguro', 'K.', 'Chau', 'Sr.', 'Male', '40', 'Brgy Palampas', 'Nayabo gasolina', '25', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(43, '1', '8', 'Alejandro', 'G.', 'Buhat', 'Jr.', 'Male', '20', 'Bgy1', 'Adik-adik', '31', '2023-01-01', '00:00:00', 'images.jpeg/', '0', '0'),
(44, '1', '8', 'Ivan', 'E.', 'Ortega', 'NONE', 'Male', '50', 'Bgy1', 'Akyat bahay or theif', '30', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(45, '1', '8', 'Matit ', 'M', 'Jacaban', 'NONE', 'Female', '18', 'Bgy1', 'Sexual Abuse', '30', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(46, '1', '8', 'Edeza', 'O', 'Lagosa', 'NONE', 'Female', '21', 'Bgy1', 'Sexual Abuse', '30', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(47, '1', '8', 'cardo', 'G.', 'Dela cruz', 'Sr.', 'Male', '40', 'Bgy1', 'Adikadik', '31', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(48, '1', '8', 'Mark Jason', 'M', 'Santos', 'Jr.', 'Male', '26', 'Bgy1', 'Ohms', '32', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(49, '1', '7', 'Juan', 'C', 'Dalisay', 'NONE', 'Male', '21', 'Bgy1', 'Lighter and gasoline', '24', '2023-02-01', '00:00:00', 'images.jpeg/', '0', '0'),
(51, '1', '7', 'Mark', 'corral', 'balinario', 'sr', 'Male', '34', 'Barangay 1', 'dsadsa', '25', '2023-02-02', '00:00:00', '312606303_1283738365711363_725573157818241507_n.jpg/', 'reymond hermoso', '09123456789'),
(52, '1', '6', 'raymund', 'hermoso', 'Lobaton', 'Sr', 'Male', '45', 'Barangay 1', 'dsads', '18', '2023-02-02', '00:00:00', '297786153_1222736501811550_6252034508501149649_n.jpg/', 'mark Balinario', '09123456789'),
(57, '1', '6', 'Hhhnj', 'Jjkk', 'Jkkgc', 'Jr', 'Male', '98', 'Hkk', 'Jjkk', '3', '2023-02-03', '00:00:00', 'FB_IMG_1657252512285.jpg/', 'Hjkk', '66558555'),
(58, '1', '5', 'Airon', 'V', 'Canabano', 'Canabano', 'Male', '21', 'Bgy1', 'Basketball injury', '16', '2023-02-06', '00:00:00', 'computer studies.jpg/', '', ''),
(59, '1', '5', 'Mark Jason', 'P', 'Dalisay', 'NONE', 'Male', '18', 'Bgy1', 'Lose break ', '13', '2023-02-06', '00:00:00', 'computer studies.jpg/', '', ''),
(60, '1', '5', 'Juan', 'O', 'Pablo', 'NONE', 'Male', '21', 'Bgy1', 'road crash', '13', '2023-02-06', '00:00:00', 'computer studies.jpg/', '', ''),
(61, '2', '6', 'Leah ', 'Bucar', 'Carbu', 'none', 'Female', '30', 'brgy2', 'high blood', '20', '2023-02-07', '00:00:00', 'my eight.jpg/', 'junior lagos', '09705639022'),
(62, '2', '5', 'Lester', 'M.', 'illaga', 'none', 'Male', '29', 'brgy2', 'football injury', '16', '2023-02-07', '00:00:00', 'be You-nique.png/', 'deliza mae lim', '09705639022'),
(63, '2', '8', 'cardo ', 'p.', 'dalisay', 'sr.', 'Male', '49', 'brgy2', 'adik adik', '31', '2023-02-07', '00:00:00', '4.jpg/', 'bpso delta2', '09705639022'),
(64, '2', '8', 'cardo', 'p', 'dalisay', 'none', 'Male', '30', 'brgy2', 'theif', '30', '2023-02-07', '00:00:00', '4.jpg/', 'bpso delta2', '09705639022'),
(65, '2', '5', 'cardo ', 'p', 'dalisay', 'none', 'Male', '49', 'brgy2', 'roadcrash', '13', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(66, '2', '5', 'cardo', 'p', 'dalisay', 'none', 'Male', '30', 'brgy2', 'lose break', '13', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(67, '2', '8', 'cardo', 'p', 'dalisay', 'none', 'Male', '30', 'brgy2', 'checkpoint', '31', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(68, '2', '8', 'cardo', 'p', 'dalisay', 'none', 'Male', '30', 'brgy2', 'buybust', '31', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(69, '2', '8', 'cardo', 'p', 'dalisay', 'none', 'Male', '30', 'brgy2', 'theif', '30', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(70, '2', '5', 'cardo', 'p', 'dalisay', 'none', 'Male', '30', 'brgy2', 'machine error', '13', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(71, '2', '6', 'cardo', 'p', 'dalisay', 'none', 'Female', '30', 'brgy2', 'ashtma', '18', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(72, '2', '6', 'cardo', 'p', 'dalisay', 'none', 'Male', '40', 'brgy2', 'diabetic', '21', '2023-02-07', '00:00:00', 'be You-nique.png/', 'bpso delta2', '09705639022'),
(73, '1', '5', 'mark', 'corral', 'balinario', 'jr', 'Male', '23', 'das', 'dsadas', '14', '2023-02-07', '00:00:00', 'DSC00002.JPG/', 'reymond hermoso', '09101234567'),
(75, '1', '6', 'dsada', 'corral', 'we', 'jr', 'Male', 'dsadsa', 'dsd', 'dasd', '20', '2023-02-09', '20:27:00', 'DSC00001.JPG/', 'dasda', '32131231321'),
(77, '1', '5', 'jjemon', 'coor', 'bals', 'dsa', 'Male', '23', 'dsd', 'dsadsa', '16', '2023-03-15', '10:45:00', 'DSC00003.JPG/', 'reymond hermoso', '44');

-- --------------------------------------------------------

--
-- Table structure for table `incident_type`
--

CREATE TABLE `incident_type` (
  `id` int(11) NOT NULL,
  `inc_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident_type`
--

INSERT INTO `incident_type` (`id`, `inc_type`) VALUES
(5, 'TRAUMA'),
(6, 'MEDICAL'),
(7, 'FIRE'),
(8, 'CRIME');

-- --------------------------------------------------------

--
-- Table structure for table `inc_kind`
--

CREATE TABLE `inc_kind` (
  `id` int(11) NOT NULL,
  `inc_type_id` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inc_kind`
--

INSERT INTO `inc_kind` (`id`, `inc_type_id`, `disc`) VALUES
(1, '5', 'nahulugan'),
(3, '6', 'dasdas'),
(4, '8', 'gng buno'),
(5, '8', 'gng tiro'),
(12, '5', 'dasdad'),
(13, '5', 'VA'),
(14, '5', 'Water'),
(15, '5', 'High Water'),
(16, '5', 'Sports'),
(17, '5', 'Heat Released'),
(18, '6', 'Respiratory'),
(19, '6', 'Cardiac'),
(20, '6', 'Blood Pressure'),
(21, '6', 'Diabetic'),
(22, '6', 'Chronic Ailment'),
(23, '6', 'H/R Pregnancy'),
(24, '7', 'Residential'),
(25, '7', 'Agricultural'),
(26, '7', 'Industrial'),
(27, '7', 'Commercial'),
(28, '7', 'Vehicular'),
(29, '7', 'Institutional'),
(30, '8', 'Domesitic'),
(31, '8', 'Shooting'),
(32, '8', 'Stabbling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brgy`
--

CREATE TABLE `tbl_brgy` (
  `id` int(11) NOT NULL,
  `brgy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brgy`
--

INSERT INTO `tbl_brgy` (`id`, `brgy`) VALUES
(1, 'Barangay 1'),
(2, 'Barangay 2'),
(3, 'Barangay 3'),
(10, 'Barangay 6'),
(13, 'Barangay Rizal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `brgy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `pass`, `pos`, `brgy_id`) VALUES
(1, 'admin', 'admin2022', 'admin', 0),
(14, 'das', '80db08913a59f629c45ff4502d4a834112ad9171eb8308f58fe56eac613af8aa', '', 0),
(15, 'dsa', '80db08913a59f629c45ff4502d4a834112ad9171eb8308f58fe56eac613af8aa', '', 0),
(31, 'mark', '470c47552d937ecc3c596b1a8a1ed966417c827238ae00821d6938f747544772', 'user', 1),
(32, 'mark', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user', 2),
(33, '@mark', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_type`
--
ALTER TABLE `incident_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inc_kind`
--
ALTER TABLE `inc_kind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brgy`
--
ALTER TABLE `tbl_brgy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `incident_type`
--
ALTER TABLE `incident_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inc_kind`
--
ALTER TABLE `inc_kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_brgy`
--
ALTER TABLE `tbl_brgy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
