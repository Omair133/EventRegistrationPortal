-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 09:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msit_techxtra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mrd`
--

CREATE TABLE `mrd` (
  `gid` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `phno` varchar(10) DEFAULT NULL,
  `year` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `roll` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mrd`
--

INSERT INTO `mrd` (`gid`, `name`, `email`, `password`, `phno`, `year`, `dept`, `roll`, `created_at`, `updated_at`) VALUES
(1, 'Omair Shahid', 'omair.shahid@mailinator.com', '', '9999888888', '1st Year', '', 0, '2021-03-27 20:51:58', '2021-03-27 20:51:58'),
(2, 'John', 'john@mailinator.com', '', '8777777777', '3rd Year', '', 0, '2021-03-27 20:52:19', '2021-03-27 20:52:19'),
(3, 'Omair Check', 'shahid@mailinator.com', '', '7888888888', '3rd Year', '', 0, '2021-03-27 21:01:34', '2021-03-27 21:01:34'),
(4, 'Test user', 'user@mailinator.com', '', '8877448877', '3rd Year', '', 0, '2021-03-28 08:24:00', '2021-03-28 08:24:00'),
(5, 'Aquib Jawed', 'aquib@mailinator.com', '', '9898989898', '4th Year', 'IT', 99, '2021-07-07 19:10:33', '2021-07-07 19:10:33'),
(6, 'aiyan shahid', 'aiyan@gmail.com', '', '8908080090', '2nd Year', 'IT', 9, '2021-07-07 19:11:56', '2021-07-07 19:11:56'),
(7, 'SOTI SINGH', 'sot@gmail.com', '', '8768908990', '4th Year', 'CIVIL', 89, '2021-07-07 19:58:33', '2021-07-07 19:58:33'),
(8, 'Aquib Jawed', 'aui@gmail.com', '', '5647645556', '4th Year', 'IT', 99, '2021-07-08 07:09:21', '2021-07-08 07:09:21'),
(9, 'Aquib Jawed', 'aqu@gmail.com', '', '3254534634', '1st Year', 'IT', 4, '2021-07-08 07:11:40', '2021-07-08 07:11:40'),
(10, 'SHirt', 'a@gmail.com', 'aa', '3456636225', '1st Year', 'IT', 3, '2021-07-09 11:35:55', '2021-07-09 11:35:55'),
(11, 'i8989', 'b@gmail.com', 'qwe', '8989898898', '1st Year', 'IT', 34, '2021-07-09 11:36:55', '2021-07-09 11:36:55'),
(12, 'AiyanShahid2324', 'p@gmail.com', 'aa', '9090999900', '1st Year', 'IT', 34, '2021-07-09 11:42:00', '2021-07-09 11:42:00'),
(13, 'uiu08080', 'r@gmail.com', '000', '0980900988', '1st Year', 'IT', 0, '2021-07-09 11:44:41', '2021-07-09 11:44:41'),
(14, 'hey', 'shahid@gmail.com', '988', '3523626236', '1st Year', 'IT', 8, '2021-07-09 12:06:23', '2021-07-09 12:06:23'),
(15, 'adsd', 'c@gmail.com', '09', '9890080890', '1st Year', 'IT', 9, '2021-07-09 12:10:19', '2021-07-09 12:10:19'),
(16, 'ioio', 'q@gmail.com', '99', '9899999999', '1st Year', 'IT', 9, '2021-07-09 12:14:23', '2021-07-09 12:14:23'),
(17, 'Rahul Gupta', 'rahul@gmail.com', 'rahul123', '7689789988', '1st Year', 'IT', 69, '2021-07-09 19:05:37', '2021-07-09 19:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `rd`
--

CREATE TABLE `rd` (
  `gid` int(10) DEFAULT NULL,
  `domain` varchar(30) DEFAULT NULL,
  `evnt` varchar(30) DEFAULT NULL,
  `tid` varchar(30) DEFAULT NULL,
  `tname` varchar(30) DEFAULT NULL,
  `rd_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rd`
--

INSERT INTO `rd` (`gid`, `domain`, `evnt`, `tid`, `tname`, `rd_no`) VALUES
(1, 'Gaming', 'NFS', 'TID71240', 'DemoTeam', 1),
(2, 'Gaming', 'NFS', 'TID71240', 'DemoTeam', 2),
(3, 'Coding', 'Code Novice', 'TID17106', 'Sample Team', 3),
(3, 'Coding', 'Code Virtuso', 'TID17106', 'Sample Team', 4),
(3, 'Coding', 'Web O Mania', 'TID17106', 'Sample Team', 5),
(4, 'Civil', 'Setu Bandhan', 'TID43241', 'M7', 6),
(4, 'Coding', 'Code Virtuso', 'TID54675', 'Team Noob', 7),
(5, 'Gaming', 'FIFA 11', 'TID38842', 'Bad Boy', 8),
(6, 'Gaming', 'FIFA 11', 'TID38842', 'Bad Boy', 9),
(7, 'Civil', 'Videography', 'TID89429', 'Swati Team', 10),
(6, 'Gaming', 'NFS', 'TID55131', 'Aquib Team', 11),
(7, 'Gaming', 'NFS', 'TID55131', 'Aquib Team', 12),
(8, 'Gaming', 'NFS', 'TID55131', 'Aquib Team', 13),
(10, 'Coding', 'Code Novice', 'TID55721', 'Quartx', 14),
(11, 'Coding', 'Code Novice', 'TID55721', 'Quartx', 15),
(8, 'Robotics', 'Prisoner of Azkaban', 'TID94737', '', 16),
(10, 'Robotics', 'Prisoner of Azkaban', 'TID94737', '', 17),
(11, 'Robotics', 'Prisoner of Azkaban', 'TID94737', '', 18),
(8, 'Robotics', 'Knights Watch', 'TID94737', '', 19),
(10, 'Robotics', 'Knights Watch', 'TID94737', '', 20),
(11, 'Robotics', 'Knights Watch', 'TID94737', '', 21),
(8, 'Robotics', 'El Clasico', 'TID94737', '', 22),
(10, 'Robotics', 'El Clasico', 'TID94737', '', 23),
(11, 'Robotics', 'El Clasico', 'TID94737', '', 24),
(10, 'Civil', 'Setu Bandhan', 'TID12025', '', 25),
(5, 'Civil', 'Setu Bandhan', 'TID12025', '', 26),
(6, 'Civil', 'Setu Bandhan', 'TID12025', '', 27),
(2, 'Coding', 'Code Virtuso', 'TID59161', 'rahul team', 28),
(5, 'Coding', 'Code Virtuso', 'TID59161', 'rahul team', 29);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_no` int(10) NOT NULL,
  `tid` varchar(30) DEFAULT NULL,
  `tname` varchar(30) NOT NULL,
  `evnt` varchar(30) NOT NULL,
  `amount` int(3) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_no`, `tid`, `tname`, `evnt`, `amount`, `flag`) VALUES
(1, 'TID71240', 'DemoTeam', 'NFS', 60, 0),
(2, 'TID17106', 'Sample Team', 'Code Novice', 160, 1),
(3, 'TID17106', 'Sample Team', 'Code Virtuso', 160, 0),
(4, 'TID17106', 'Sample Team', 'Web O Mania', 160, 0),
(5, 'TID43241', 'M7', 'Setu Bandhan', 100, 1),
(6, 'TID54675', 'Team Noob', 'Code Virtuso', 60, 0),
(7, 'TID38842', 'Bad Boy', 'FIFA 11', 60, 1),
(8, 'TID89429', 'Swati Team', 'Videography', 50, 1),
(9, 'TID55131', 'Aquib Team', 'NFS', 60, 1),
(10, 'TID55721', 'Quartx', 'Code Novice', 60, 0),
(11, 'TID94737', '', 'Prisoner of Azkaban', 200, 0),
(12, 'TID94737', '', 'Knights Watch', 200, 0),
(13, 'TID94737', '', 'El Clasico', 200, 0),
(14, 'TID12025', '', 'Setu Bandhan', 100, 0),
(15, 'TID59161', 'rahul team', 'Code Virtuso', 60, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mrd`
--
ALTER TABLE `mrd`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `rd`
--
ALTER TABLE `rd`
  ADD PRIMARY KEY (`rd_no`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mrd`
--
ALTER TABLE `mrd`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rd`
--
ALTER TABLE `rd`
  MODIFY `rd_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
