-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 05:45 PM
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
-- Database: `mshs`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(535) NOT NULL,
  `id` varchar(20) NOT NULL,
  `address` varchar(535) NOT NULL,
  `classroom` varchar(535) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `CGPA` decimal(10,2) NOT NULL,
  `class_stream` varchar(525) NOT NULL,
  `email` varchar(525) NOT NULL,
  `BM` varchar(20) NOT NULL,
  `English` varchar(20) NOT NULL,
  `Sejarah` varchar(20) NOT NULL,
  `Maths` varchar(20) NOT NULL,
  `Science` varchar(20) NOT NULL,
  `Physical` int(11) NOT NULL,
  `Interests` varchar(535) NOT NULL,
  `Ambition` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `id`, `address`, `classroom`, `contact`, `CGPA`, `class_stream`, `email`, `BM`, `English`, `Sejarah`, `Maths`, `Science`, `Physical`, `Interests`, `Ambition`) VALUES
('Sofia', '012021090024', 'Ipoh', '3 - 2', '+601290704271', 2.85, 'N/A', 'sofia@mshs.com', 'Poor', 'Bad', 'Poor', 'Average', 'Good', 2, 'Art and Creative Expression;History and Social Studies;Literature and Language Arts;Mathematics;Physical Education and Sports;Science (Physics, Chemistry, Biology);Technology and Computer Science;Career and Vocational Interests', 'Engineer (e.g., Mechanical, Civil, Electrical)'),
('Ahmad', '012021090250', 'Selangor', '3 - 1', '+601110517048', 4.00, 'N/A', 'arief@mshs.com', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 5, 'Mathematics;Science (Physics, Chemistry, Biology);Technology and Computer Science', 'Computer Scientist or Software Developer'),
('Hana', '012021091014', 'Kuala Lumpur', '3 - 2', '+601797454204', 2.13, 'N/A', 'hana@mshs.com', 'Average', 'Average', 'Good', 'Poor', 'Average', 3, 'Art and Creative Expression;Physical Education and Sports;Science (Physics, Chemistry, Biology);Technology and Computer Science', 'Engineer (e.g., Mechanical, Civil, Electrical)'),
('Zainal', '012021091149', 'Ipoh', '3 - 5', '+601662320617', 2.54, 'N/A', 'zainal@mshs.com', 'Bad', 'Poor', 'Average', 'Bad', 'Average', 3, 'History and Social Studies;Science (Physics, Chemistry, Biology);Music and Performing Arts', 'Computer Scientist or Software Developer'),
('Razak', '012021091323', 'Kuching', '3 - 3', '+601362407460', 2.62, 'N/A', 'razak@mshs.com', 'Bad', 'Bad', 'Poor', 'Poor', 'Average', 4, 'Art and Creative Expression;History and Social Studies;Literature and Language Arts;Environmental Studies;Career and Vocational Interests', 'Engineer (e.g., Mechanical, Civil, Electrical)'),
('Yin', '012021091493', 'Kuching', '3 - 4', '+601374514373', 2.22, 'N/A', 'yin@mshs.com', 'Average', 'Average', 'Bad', 'Poor', 'Bad', 5, 'Art and Creative Expression;History and Social Studies;Physical Education and Sports;Science (Physics, Chemistry, Biology);Environmental Studies;Music and Performing Arts', 'Doctor or Healthcare Professional'),
('Aminah', '012021091495', 'Kota Kinabalu', '3 - 4', '+601904403335', 3.37, 'N/A', 'aminah@mshs.com', 'Poor', 'Good', 'Poor', 'Average', 'Bad', 3, 'Art and Creative Expression;Technology and Computer Science;Career and Vocational Interests;Music and Performing Arts', 'Doctor or Healthcare Professional'),
('Aisha', '012021092136', 'Malacca', '3 - 5', '+601346333416', 3.76, 'N/A', 'aisha@mshs.com', 'Good', 'Bad', 'Average', 'Average', 'Poor', 4, 'Art and Creative Expression;Literature and Language Arts;Mathematics;Physical Education and Sports;Music and Performing Arts', 'Athlete or Sports Coach'),
('Siti', '012021092275', 'Malacca', '3 - 1', '+601420295174', 3.71, 'N/A', 'siti@mshs.com', 'Good', 'Poor', 'Average', 'Good', 'Good', 3, 'Literature and Language Arts;Career and Vocational Interests', 'Entrepreneur or Business Owner'),
('Hussein', '012021092392', 'Shah Alam', '3 - 2', '+601642980660', 2.83, 'N/A', 'hussein@mshs.com', 'Average', 'Bad', 'Average', 'Average', 'Average', 2, 'Mathematics;Physical Education and Sports;Science (Physics, Chemistry, Biology);Technology and Computer Science;Career and Vocational Interests', 'Engineer (e.g., Mechanical, Civil, Electrical)'),
('Ling', '012021092395', 'Malacca', '3 - 2', '+601240801694', 2.96, 'N/A', 'ling@mshs.com', 'Average', 'Poor', 'Average', 'Average', 'Bad', 5, 'Literature and Language Arts;Physical Education and Sports;Technology and Computer Science;Environmental Studies;Music and Performing Arts', 'Lawyer or Legal Professional'),
('Inaz Nazifa', '012021093007', 'Kedah', '3 - 1', '+601110517048', 3.92, 'N/A', 'inaz@mshs.com', 'Good', 'Good', 'Good', 'Good', 'Good', 4, 'History and Social Studies;Physical Education and Sports;Environmental Studies;Career and Vocational Interests', 'Engineer (e.g., Mechanical, Civil, Electrical)'),
('Nur', '012021093824', 'Malacca', '3 - 1', '+601793083794', 2.03, 'N/A', 'nur@mshs.com', 'Average', 'Average', 'Bad', 'Bad', 'Average', 1, 'Art and Creative Expression;Literature and Language Arts;Physical Education and Sports;Science (Physics, Chemistry, Biology);Technology and Computer Science;Environmental Studies;Career and Vocational Interests', 'Computer Scientist or Software Developer'),
('Faisal', '012021094185', 'Penang', '3 - 4', '+601657461350', 3.77, 'N/A', 'faisal@mshs.com', 'Good', 'Poor', 'Good', 'Poor', 'Bad', 5, 'History and Social Studies;Technology and Computer Science', 'Artist or Creative Professional'),
('Farah', '012021094235', 'Petaling Jaya', '3 - 1', '+601118520581', 2.38, 'N/A', 'farah@mshs.com', 'Good', 'Bad', 'Average', 'Good', 'Good', 1, 'Art and Creative Expression;History and Social Studies;Mathematics;Environmental Studies;Career and Vocational Interests;Music and Performing Arts', 'Entrepreneur or Business Owner'),
('Jasmine', '012021094530', 'Malacca', '3 - 1', '+601455529773', 3.72, 'N/A', 'jasmine@mshs.com', 'Bad', 'Poor', 'Bad', 'Poor', 'Good', 3, 'Mathematics;Physical Education and Sports;Technology and Computer Science;Environmental Studies;Career and Vocational Interests', 'Athlete or Sports Coach'),
('Sumaiyah', '012021095112', 'Johor Bahru', '3 - 2', '+601315304856', 2.84, 'N/A', 'sumaiyah@mshs.com', 'Good', 'Average', 'Average', 'Average', 'Good', 4, 'Art and Creative Expression;Literature and Language Arts;Mathematics;Science (Physics, Chemistry, Biology);Technology and Computer Science;Environmental Studies', 'Doctor or Healthcare Professional'),
('Mira', '012021095339', 'Petaling Jaya', '3 - 2', '+601353337896', 3.18, 'N/A', 'mira@mshs.com', 'Good', 'Poor', 'Good', 'Poor', 'Good', 4, 'Art and Creative Expression;Physical Education and Sports;Music and Performing Arts', 'Lawyer or Legal Professional'),
('Kamal', '012021095643', 'Ipoh', '3 - 2', '+601852030398', 2.27, 'N/A', 'kamal@mshs.com', 'Excellent', 'Bad', 'Bad', 'Poor', 'Poor', 1, 'Literature and Language Arts;Physical Education and Sports;Career and Vocational Interests;Music and Performing Arts', 'Artist or Creative Professional'),
('Raihan', '012021096603', 'Petaling Jaya', '3 - 4', '+601979809770', 2.13, 'N/A', 'raihan@mshs.com', 'Poor', 'Excellent', 'Good', 'Poor', 'Poor', 1, 'Art and Creative Expression;History and Social Studies;Mathematics;Physical Education and Sports;Science (Physics, Chemistry, Biology);Environmental Studies;Career and Vocational Interests', 'Entrepreneur or Business Owner'),
('Mei Li', '012021096802', 'Penang', '3 - 5', '+601430271720', 3.95, 'N/A', 'mei@mshs.com', 'Bad', 'Poor', 'Good', 'Good', 'Poor', 3, 'Art and Creative Expression;Mathematics;Career and Vocational Interests;Music and Performing Arts', 'Entrepreneur or Business Owner'),
('Fakhrul', '012021097137', 'Ipoh', '3 - 3', '+601803469405', 2.82, 'N/A', 'fakhrul@mshs.com', 'Good', 'Average', 'Good', 'Good', 'Good', 1, 'History and Social Studies;Physical Education and Sports;Technology and Computer Science;Career and Vocational Interests;Music and Performing Arts', 'Doctor or Healthcare Professional'),
('Amir', '012021097236', 'Petaling Jaya', '3 - 1', '+601891187743', 2.43, 'N/A', 'amir@mshs.com', 'Average', 'Good', 'Poor', 'Poor', 'Poor', 2, 'History and Social Studies;Mathematics;Physical Education and Sports;Science (Physics, Chemistry, Biology);Technology and Computer Science;Music and Performing Arts', 'Athlete or Sports Coach'),
('Iskandar', '012021097437', 'Kota Kinabalu', '3 - 1', '+601732570097', 2.24, 'N/A', 'iskandar@mshs.com', 'Poor', 'Poor', 'Average', 'Good', 'Average', 3, 'Art and Creative Expression;Science (Physics, Chemistry, Biology);Environmental Studies', 'Computer Scientist or Software Developer'),
('Zainab', '012021097962', 'Kota Kinabalu', '3 - 1', '+601931867298', 3.52, 'N/A', 'zainab@mshs.com', 'Average', 'Average', 'Bad', 'Average', 'Poor', 1, 'Literature and Language Arts;Environmental Studies;Career and Vocational Interests', 'Athlete or Sports Coach'),
('Faris', '012021098181', 'Kuala Lumpur', '3 - 3', '+601814049960', 2.24, 'N/A', 'faris@mshs.com', 'Poor', 'Average', 'Poor', 'Poor', 'Average', 2, 'Mathematics;Physical Education and Sports;Science (Physics, Chemistry, Biology);Technology and Computer Science;Environmental Studies;Music and Performing Arts', 'Entrepreneur or Business Owner'),
('Nadia', '012021098252', 'Johor Bahru', '3 - 3', '+601862376382', 2.42, 'N/A', 'nadia@mshs.com', 'Poor', 'Bad', 'Average', 'Bad', 'Good', 5, 'History and Social Studies;Literature and Language Arts;Mathematics;Physical Education and Sports;Environmental Studies;Career and Vocational Interests', 'Artist or Creative Professional'),
('Ali', '012021098556', 'Malacca', '3 - 2', '+601493397014', 2.72, 'N/A', 'ali@mshs.com', 'Average', 'Bad', 'Average', 'Bad', 'Average', 2, 'Art and Creative Expression;Literature and Language Arts;Mathematics;Physical Education and Sports;Science (Physics, Chemistry, Biology);Career and Vocational Interests;Music and Performing Arts', 'Engineer (e.g., Mechanical, Civil, Electrical)'),
('Aina', '012021099174', 'Johor Bahru', '3 - 1', '+601315455685', 3.40, 'N/A', 'aina@mshs.com', 'Average', 'Good', 'Average', 'Average', 'Poor', 4, 'Art and Creative Expression;History and Social Studies;Literature and Language Arts;Environmental Studies;Career and Vocational Interests;Music and Performing Arts', 'Doctor or Healthcare Professional'),
('Wan', '012021099409', 'Shah Alam', '3 - 1', '+601440769496', 2.57, 'N/A', 'wan@mshs.com', 'Average', 'Average', 'Average', 'Poor', 'Bad', 5, 'Art and Creative Expression;Literature and Language Arts;Science (Physics, Chemistry, Biology);Technology and Computer Science;Career and Vocational Interests', 'Computer Scientist or Software Developer'),
('Kartinie', '012021099742', 'Kota Kinabalu', '3 - 1', '+601234187985', 2.29, 'N/A', 'kartinie@mshs.com', 'Poor', 'Bad', 'Bad', 'Bad', 'Average', 3, 'Art and Creative Expression;Literature and Language Arts;Physical Education and Sports;Science (Physics, Chemistry, Biology);Environmental Studies;Music and Performing Arts', 'Athlete or Sports Coach');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(535) NOT NULL,
  `name` varchar(535) NOT NULL,
  `id` bigint(20) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(535) NOT NULL,
  `picture` longblob NOT NULL,
  `position` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `id`, `birthdate`, `password`, `picture`, `position`) VALUES

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;