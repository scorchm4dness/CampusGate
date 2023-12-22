-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 08:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_as` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role_as`, `created_at`) VALUES
(1, '', '', '', 1, '2023-12-03 16:56:36'),
(2, 'asd', 'nyrallehoran@gmail.com', 'nyrallehoran', 1, '2023-12-03 18:07:18'),
(3, 'fghj', 'as@gmail.com', 'a', 1, '2023-12-03 18:43:14'),
(5, 'af', 'oc@gmail.com', 'a', 1, '2023-12-03 18:49:15'),
(6, 'makulet', 'a@gmail.com', 'as', 1, '2023-12-03 18:49:57'),
(7, 'admin', 'admin@admin.com', 'adm', 1, '2023-12-03 18:51:33'),
(8, 'ad', 'ad@gmail.com', 'as', 1, '2023-12-03 18:52:26'),
(9, 'cs', 'cs@gmail.com', 's', 1, '2023-12-03 18:54:01'),
(10, 'asa', 'asa@gmail.com', 'a', 1, '2023-12-03 18:55:40'),
(11, 'xs', 'xs@gmail.com', 'a', 1, '2023-12-03 18:57:56'),
(12, 'awe', 'aw@gmail.com', 'a', 1, '2023-12-03 19:12:47'),
(13, 'scorchm4dness', 'ma@gmail.com', 'master', 1, '2023-12-03 20:08:58'),
(14, 'master', 'master@gmail.com', 'master', 1, '2023-12-04 02:55:27'),
(15, 'fast', 'fast@gmail.com', 'fast', 1, '2023-12-04 03:00:12'),
(16, 'kath', 'kath@gmail.com', 'asdfghjkk', 1, '2023-12-04 05:52:32'),
(17, 'miley', 'miley@gmail.com', 'mileyyyy', 1, '2023-12-04 14:50:11'),
(18, 'kath', 'katherine@gmail.com', 'kathhh', 1, '2023-12-05 01:51:55'),
(19, 'katherine', 'katherineoc@gmail.com', 'katherine', 1, '2023-12-05 04:35:02'),
(20, 'katherineee', 'kathy@gmail.com', 'kathy', 1, '2023-12-05 04:40:27'),
(21, 'florean', 'florean@gmail.com', '$2y$10$KuriMsmbHEMjXO1cR.JFcuHkr1sh', 1, '2023-12-08 15:32:59'),
(22, 'cass', 'cass@gmail.com', '$2y$10$bCMpP6RgC6NbiPxg3wD.A.nSni5m', 1, '2023-12-08 15:34:04'),
(23, 'dominic', 'dominic@gmail.com', '$2y$10$iUQ0uKmecSw2Z9tziOm3BeRfF70n90BLaqS6Xc0wRr/GQrm3vwq4e', 1, '2023-12-08 15:52:03'),
(24, 'ramon', 'ramon@gmail.com', '$2y$10$kUYmnjchXy51NLaTPv/zMeYi.64Wdi4HImiLdKl8pX/.CXY7yABr6', 1, '2023-12-08 15:54:36'),
(25, 'chloe', 'chloe@gmail.com', '$2y$10$4zq/ahgu6/19q499pKbYwemzfTvQk/66zu9Ma7qcTCnxq2eeskv9y', 1, '2023-12-08 16:17:43'),
(26, 'Scorchm4dness', 'krypto@gmail.com', '$2y$10$11GDcd3xZkrr.oTKRiHECe7.Qb0XdSpGu2O/k6nDyJhnr8KV5OPW2', 1, '2023-12-09 13:06:11'),
(27, 'florean_30', 'navarroflorea@gmail.com', '$2y$10$s0cnPHjSZbha5Tz7AEyOiuoYMuMMXJfF6Bw7K5QuAv6w1l2Z/eWJm', 1, '2023-12-10 05:37:23'),
(28, 'floreann', 'navarroflorean@gajhfgsy', '$2y$10$pSy8rC1IvFu/TxbWYATdneISQtxosFRwKVUeckQUG9RwQu9kHAPve', 1, '2023-12-10 07:56:59'),
(29, 'florean', 'navarroflorean@gmail.com', '$2y$10$s7PzENeMRgt4UVp24KD5euwWkWOqvKGOiSBkTHMYfq5DV.QgkcP1i', 1, '2023-12-10 08:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(100) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `attendance`, `status`, `created_at`, `updated_at`) VALUES
(11, 'BSOADSE', 'Bachelor of Science in Office Administration', 0, 1, '2023-06-24 11:38:49', '2023-12-04 15:11:39'),
(12, 'BSA', 'Bachelor of Science in Accountancy', 0, 0, '2023-06-24 11:39:11', '2023-11-22 01:33:11'),
(13, 'BSTM', 'Bachelor of Science in Tourism Management', 0, 1, '2023-06-24 11:39:34', '2023-12-04 15:11:53'),
(14, 'BSHM', 'Bachelor of Science in Hospitality Management', 0, 1, '2023-06-24 11:39:59', '2023-06-24 11:41:53'),
(15, 'BSBA-FMGT', 'Bachelor of Science in Business Administration Major in Financial Management', 0, 1, '2023-06-24 11:40:25', '2023-06-24 11:41:54'),
(16, 'BSBA-MKMGT', 'Bachelor of Science in Business Administration Major in Marketing Management', 0, 1, '2023-06-24 11:40:54', '2023-06-24 11:41:54'),
(17, 'BSEM', 'Bachelor of Science in Entrepreneurial Management', 0, 1, '2023-06-24 11:41:23', '2023-06-24 11:41:55'),
(18, 'BSBA-HRM', 'Bachelor of Science in Business Administration Major in Human Resource Management', 0, 1, '2023-06-24 11:41:47', '2023-06-24 11:41:56'),
(19, 'BEED Early Childhood Education', 'Bachelor in Elementary Education Major in Early Childhood Education', 0, 1, '2023-06-24 11:42:41', '2023-06-24 12:09:02'),
(20, 'BEED Special Education', 'Bachelor in Elementary Education Major in Special Education', 0, 1, '2023-06-24 11:43:09', '2023-06-24 12:09:14'),
(21, 'BSE TLE', 'Bachelor in Secondary Education Major in Technology and Livelihood Education', 0, 1, '2023-06-24 11:43:40', '2023-06-24 11:52:30'),
(22, 'BSE Science', 'Bachelor in Secondary Education Major in Science', 0, 1, '2023-06-24 11:44:04', '2023-06-24 11:52:30'),
(23, 'BSE English', 'Bachelor in Secondary Education Major in English', 0, 1, '2023-06-24 11:44:31', '2023-06-24 11:52:30'),
(24, 'BSE Chinese', 'Bachelor in Secondary Education Major in English - Chinese', 0, 1, '2023-06-24 11:45:41', '2023-06-24 11:52:31'),
(25, 'CPE', 'Certificate in Professional Education', 0, 1, '2023-06-24 11:45:59', '2023-06-24 11:52:31'),
(26, 'BS Criminology', 'Bachelor of Science in Criminology', 0, 1, '2023-06-24 11:47:22', '2023-06-24 11:52:31'),
(27, 'DPA', 'Doctor of Public Administration', 0, 1, '2023-06-24 11:48:32', '2023-06-24 11:52:32'),
(28, 'PhD Education Management', 'Doctor of Philosophy major in Education Management', 0, 1, '2023-06-24 11:49:32', '2023-06-24 11:52:32'),
(29, 'MPA', 'Master in Public Administration', 0, 1, '2023-06-24 11:49:46', '2023-06-24 11:52:33'),
(30, 'MBA', 'Master in Business Administration', 0, 1, '2023-06-24 11:49:56', '2023-06-24 11:52:33'),
(31, 'MAT in Early Grades', 'Master of Arts in Teaching in Early Grades', 0, 1, '2023-06-24 11:51:05', '2023-06-24 11:52:36'),
(32, 'MAT in Teaching Science', 'Master of Arts in Teaching Science', 0, 1, '2023-06-24 11:51:32', '2023-06-24 11:52:37'),
(33, 'MAED-EM', 'Master of Arts in Education major in Educational Management', 0, 1, '2023-06-24 11:52:03', '2023-06-24 11:52:37'),
(34, 'MS Criminology', 'Master of Science in Criminology', 0, 1, '2023-06-24 11:52:22', '2023-06-24 11:52:37'),
(35, 'BSCS', 'bachelor of sciences', 0, 0, '2023-11-21 04:35:05', '2023-11-21 04:35:40'),
(36, 'nyenye', 'nye', 0, 0, '2023-11-21 04:38:25', '2023-11-21 04:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `full_name` varchar(75) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `gender` varchar(75) NOT NULL,
  `age` int(3) NOT NULL,
  `reason` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_time_visited` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `full_name`, `contact_no`, `gender`, `age`, `reason`, `status`, `date_time_visited`) VALUES
(4, 'Gloria Arroyo', 2147483647, 'Female', 65, 'Educational Tour', 1, '2023-12-05 01:48:19'),
(7, 'Melchora Aquino', 2147483647, 'Female', 39, 'Government Officials and Inspections', 0, '2023-12-09 23:24:46'),
(8, 'avila', 12121212, 'Male', 12, 'Research and Academic Collaboration', 0, '2023-12-10 13:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `selectedDate` date NOT NULL,
  `student_no` int(13) NOT NULL,
  `full_name` varchar(75) NOT NULL,
  `year_level` varchar(11) NOT NULL,
  `course` varchar(75) NOT NULL,
  `section` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `selectedDate`, `student_no`, `full_name`, `year_level`, `course`, `section`) VALUES
(3, '2023-12-14', 20211045, 'Cyrille John Eleazar', '3rd Year', 'CLAS', 'C'),
(4, '2023-12-07', 20211019, 'Mila Sauro', '2nd Year', 'COE', 'A'),
(5, '2023-12-08', 0, 'sds', '2nd Year', 'Choose', 'A'),
(6, '2023-12-03', 20211045, 'Jeremie Canlas', '2nd Year', 'BSMath', 'A'),
(7, '2023-12-07', 20211045, 'Jeremie Canlas', '2nd Year', 'BSPsych', 'A'),
(8, '2023-12-10', 20211019, 'Mariel Cariaga', 'Choose', 'Choose', 'Choose'),
(9, '2023-12-13', 5555, 'rerere', 'Choose', 'Choose', 'Choose'),
(10, '2023-12-08', 0, 'df', 'Choose', 'Choose', 'Choose'),
(11, '2023-12-14', 0, 'Mariel Cariaga', 'Choose', 'Choose', 'Choose'),
(12, '2023-12-16', 0, 'c', 'Choose', 'Choose', 'Choose'),
(13, '2023-12-06', 2021047, 'Rusty Ramos', '3rd Year', 'BSCS', 'A'),
(14, '2023-12-01', 20211045, 'qw', '1st Year', 'BSMath', 'A'),
(15, '2023-12-08', 2301932, 'Cyrille John Eleazar', '2nd Year', 'BSPsych', 'A'),
(16, '2023-11-30', 20211045, 'sdsd', '4th Year', 'BSPsych', 'A'),
(17, '2023-12-10', 20211045, 'Mariel Cariaga', '1st Year', 'BSPsych', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `studnum` varchar(75) NOT NULL,
  `full_name` varchar(75) NOT NULL,
  `course` varchar(75) NOT NULL,
  `year` int(1) NOT NULL,
  `section` varchar(11) NOT NULL,
  `calDate` date NOT NULL DEFAULT current_timestamp(),
  `attendance` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studnum`, `full_name`, `course`, `year`, `section`, `calDate`, `attendance`, `status`) VALUES
(1, '20211045-N', 'Cyrille Johns', 'BSCS', 3, 'A', '2023-12-15', 1, 0),
(2, '20211015-N', 'Marie', 'BPA', 4, 'A', '2023-12-15', 0, 0),
(3, '20211067-N', 'John Mark', 'ABBS', 3, 'C', '2023-12-15', 0, 1),
(4, '20211069-N', 'Mark Angelo', 'BsPsych', 2, 'B', '2023-12-15', 1, 1),
(5, '20211067-N', 'Cyrille John', 'BsPsych', 3, 'B', '2023-12-15', 1, 0),
(7, '20211079-N', 'Marinelle Cariaga', 'PolSci', 3, 'A', '2023-12-15', 0, 0),
(8, '20211058-N', 'Coco Martin', 'BSIT', 3, 'C', '2023-12-15', 1, 0),
(9, '20221087-N', 'Gregorio Del Pilar', 'BSIS', 2, 'C', '2023-12-14', 1, 1),
(10, '20211768-N', 'Edcel Strout', 'BsPsych', 2, 'B', '2023-12-15', 0, 0),
(11, '20231045-N', 'Marina Summers', 'BSEMC', 1, 'A', '2023-12-15', 0, 0),
(13, '20211039=N', 'Marites Concierta', 'BAComm', 2, 'A', '2023-12-15', 0, 0),
(15, '20219079-N', 'Emman Flores', 'BSIS', 2, 'B', '2023-12-14', 0, 0),
(16, '20211987-N', 'Angelo Felagio', 'BAComm', 2, 'A', '2023-12-15', 0, 0),
(17, '20221026', 'adea', 'BsPsych', 2, 'B', '2023-12-15', 0, 0),
(18, '20211067-N', 'Katherine Ocares', 'BSCS', 3, 'A', '2023-12-15', 1, 0),
(19, '20211053-N', 'Florean Navarro', 'BSCS', 3, 'A', '2023-12-15', 0, 0),
(20, '20211101-N', 'Maria Vergara', 'BSIT', 4, 'A', '2023-12-15', 0, 0),
(21, '20211102-N', 'Felix Santos', 'BSIT', 4, 'B', '2023-12-15', 0, 0),
(22, '20211103-N', 'Frederico Ignacio', 'BSIT', 2, 'B', '2023-12-15', 0, 0),
(23, '20211201-N', 'Martin Gonzales', 'BSEMC', 1, 'B', '2023-12-15', 0, 0),
(24, '20211202-N', 'Celestina Cortez', 'BSEMC', 1, 'B', '2023-12-15', 0, 0),
(25, '20211203-N', 'Thalia Ramos', 'BSEMC', 4, 'A', '2023-12-15', 0, 0),
(26, '20211204-N', 'Fernando Dela Cruz', 'BSEMC', 3, 'A', '2023-12-15', 0, 0),
(27, '20211301-N', 'Danilo Torres', 'BsPsych', 3, 'B', '2023-12-15', 0, 0),
(28, '20211302-N', 'Isadora Mallari', 'BsPsych', 3, 'A', '2023-12-15', 0, 0),
(29, '20211303', 'Rowena Cruz', 'BsPsych', 3, 'A', '2023-12-15', 0, 0),
(30, '20211401-N', 'Selena Tolentino', 'BSMath', 2, 'A', '2023-12-15', 0, 0),
(31, '20211402-N', 'Lily Ponta', 'BSMath', 3, 'A', '2023-12-15', 0, 0),
(32, '20211403-N', 'Ramon Herrera', 'BSMath', 3, 'A', '2023-12-15', 0, 0),
(33, '20211501-N', 'Ashley Canagan', 'Polsci', 4, 'A', '2023-12-15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stud_signup`
--

CREATE TABLE `stud_signup` (
  `id` int(11) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `midname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `role_as` tinyint(1) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_signup`
--

INSERT INTO `stud_signup` (`id`, `fname`, `midname`, `lname`, `role_as`, `email`, `password`) VALUES
(1, 'userask', 'melom', 'koji', 0, 'userask@gmail.com', 'aaa'),
(2, 'Martin James', 'Macaspac', 'Razon', 0, 'maki@gmail.com', 'maki');

-- --------------------------------------------------------

--
-- Table structure for table `stud_violation`
--

CREATE TABLE `stud_violation` (
  `id` int(11) NOT NULL,
  `selectedDate` date NOT NULL,
  `stud_no` varchar(11) NOT NULL,
  `full_name` varchar(35) NOT NULL,
  `year_level` varchar(75) NOT NULL,
  `course` varchar(11) NOT NULL,
  `section` varchar(1) NOT NULL,
  `frequency` varchar(15) NOT NULL,
  `violation` text NOT NULL,
  `violation_type` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_violation`
--

INSERT INTO `stud_violation` (`id`, `selectedDate`, `stud_no`, `full_name`, `year_level`, `course`, `section`, `frequency`, `violation`, `violation_type`) VALUES
(1, '2023-12-15', '20211099-N', 'Melanie Buyo', '1st Year', 'BSCS', 'A', 'Second Offense', 'Long Hair', 'Minor Offense'),
(5, '2023-12-07', '20211045-N', 'Cyrille John Eleazar', '3rd Year', 'BSCS', 'A', '2nd Offense', 'Bullying', 'Minor Offense'),
(6, '2023-12-06', '20212017-N', 'Dianne Montecarlo', '3rd Year', 'BSPsych', 'A', '1st Offense', 'Not wearing uniform', 'Minor Offense'),
(7, '2023-12-04', '20201789-N', 'Joy Guio', '4th Year', 'BSEMC', 'A', '2nd Offense', 'Skipping Classes', 'Minor Offense'),
(8, '2023-12-01', '20191890-N', 'Sophia Dimaculauan', '4th Year', 'BSIT', 'B', '2nd Offense', 'Vandalism', 'Major Offense'),
(9, '2023-12-07', '20211056-N', 'Kris Valenzuela', '3rd Year', 'BAComm', 'A', '1st Offense', 'Skipping Classes', 'Minor Offense'),
(10, '2023-12-14', '20201067-N', 'Maricris Delgado', '4th Year', 'BSEMC', 'A', '1st Offense', 'Vandalism', 'Major Offense'),
(11, '2023-12-08', '20201098-N', 'Jazon Mrsa', '1st Year', 'BSMath', 'A', '1st Offense', 'Bullying', 'Minor Offense'),
(12, '2023-12-08', '20201045-N', 'Daniel Monk', '1st Year', 'BSPsych', 'A', '1st Offense', 'Bullying', 'Minor Offense'),
(13, '2023-12-07', '20191890-N', 'Jeremie Canlas', '1st Year', 'BSMath', 'A', '2nd Offense', 'Not wearing uniform', 'Minor Offense'),
(14, '2023-12-08', '202021077-N', 'Monica Cabacang', '2nd Year', 'BSCS', 'B', '1st Offense', 'Bullying', 'Minor Offense'),
(15, '2023-12-05', '20200910-N', 'Jackie Chan', '1st Year', 'BSCS', 'B', '1st Offense', 'Visible Piercings', 'Minor Offense'),
(16, '2023-12-01', '20201982-N', 'John Michael De Vera', '2nd Year', 'BSIT', 'B', '2nd Offense', 'Bullying', 'Minor Offense'),
(17, '2023-12-07', '20191067-N', 'Jasmine Forte', '1st Year', 'BSCS', 'A', '1st Offense', 'Bullying', 'Choose'),
(18, '2023-12-07', '20191890-N', 'Mariel Cariaga', '2nd Year', 'BSIT', 'B', '2nd Offense', 'Bullying', 'Minor Offense'),
(19, '2023-12-07', '20201098-N', 'Marinelle Cariaga', '1st Year', 'BSCS', 'B', '1st Offense', 'Bullying', 'Minor Offense'),
(20, '2023-12-08', '20191890-N', 'Cyrille John Eleazar', '1st Year', 'BSIT', 'B', '2nd Offense', 'Bullying', 'Minor Offense'),
(21, '2023-12-08', '20191890-N', 'Cyrille John Eleazar', '1st Year', 'BSIT', 'B', '2nd Offense', 'Bullying', 'Minor Offense'),
(22, '2023-12-07', '20211045-N', 'Mariel', '1st Year', 'BSCS', 'C', '2nd Offense', 'Bullying', 'Minor Offense'),
(23, '2023-12-08', '20211056-N', 'Crisalyn', '4th Year', 'BSPsych', 'B', '1st Offense', 'Vandalism', 'Major Offense'),
(24, '2023-12-08', '2021', 'Sophia Martini', '2nd Year', 'BSPsych', 'A', '2nd Offense', 'Visible Piercings', 'Minor Offense'),
(25, '2023-12-07', '20231067', 'Rogelio Beltran', '3rd Year', 'BSMath', 'A', '1st Offense', 'Skipping Classes', 'Minor Offense'),
(26, '2023-12-07', '20211045-N', 'Mariel Cariaga', '2nd Year', 'BSEMC', 'C', '1st Offense', 'Long Hair', 'Minor Offense'),
(27, '2023-12-07', '20211045-N', 'Mariel', '4th Year', 'BSIT', 'B', '2nd Offense', 'Skipping Classes', 'Choose'),
(28, '2023-12-15', '20211056-N', 'Mariel Belen', '1st Year', 'ABPolSci', 'A', '2nd Offense', 'Visible Piercings', 'Minor Offense'),
(29, '2023-12-10', '1212121', 'avila', '3rd Year', 'BSCS', 'A', '3rd Offense', 'Skipping Classes', 'Major Offense');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_signup`
--
ALTER TABLE `stud_signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_violation`
--
ALTER TABLE `stud_violation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stud_signup`
--
ALTER TABLE `stud_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stud_violation`
--
ALTER TABLE `stud_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
