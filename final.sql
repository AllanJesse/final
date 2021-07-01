-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 30, 2021 at 09:11 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title_of_the_book` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `author_of_the_book` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `classification_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `assertion_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title_of_the_book`, `author_of_the_book`, `classification_number`, `assertion_number`) VALUES
(1, 'Principal of Physics', 'Chandi', '84557342849', '3470345596'),
(2, 'Principal of Biology', 'T. Candi', '483434734', '342345384'),
(3, 'Principal of Chemistry', 'Lambart', 'J824821391', '8734248');

-- --------------------------------------------------------

--
-- Table structure for table `cleared`
--

CREATE TABLE `cleared` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `clearanceStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `depart_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `comments` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'none',
  `status` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Pending...',
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `depart_name`, `comments`, `status`, `url`) VALUES
(1, 'HEAD OF DEPARTMENT', 'none', 'Pending...', 'includes/ict'),
(2, 'HEAD OF GENERAL DEPARTMENT', 'none', 'Pending...', 'includes/gst'),
(3, 'WORKSHOP MANAGERS', 'none', 'Pending...', 'includes/workshop'),
(4, 'CLASSMASTER', 'none', 'Pending...', 'includes/classmaster'),
(5, 'LIBRARIAN', 'none', 'Pending...', 'includes/library'),
(6, 'SPORTS MASTER', 'none', 'Pending...', 'includes/sports'),
(7, 'CATERESS', 'none', 'Pending...', 'includes/cateress'),
(8, 'WARDEN/MATRON', 'none', 'Pending...', 'includes/warden'),
(9, 'REGISTRAR', 'none', 'Pending...', 'includes/registrar'),
(10, 'BURSAR', 'none', 'Pending...', 'includes/accounts'),
(11, 'universal', 'none', 'Pending...', '');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `device_type` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_type`, `serial_number`) VALUES
(1, 'Cisco Router', 'Catalyst-R900', 'C6980R'),
(2, 'Cisco Switch', 'T251', 'C6980S'),
(3, 'Wifi-Extender', 'Extender', 'E12w1223234'),
(4, 'D-link', 'Network', 'D983link99'),
(5, 'Dell Xps', 'Laptop', 'D983X90p567s');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `cat`, `file`) VALUES
(1, 3, 'Final Report', 'uploads/finish.60d4abe87ba1e6.84817756.pdf'),
(2, 1, 'Examination Transcripts', 'uploads/finish.60d4ac6524f104.47730623.pdf'),
(3, 4, 'Office Document', 'uploads/finish.60d4b15499a754.22541273.pdf'),
(4, 26, 'Final Report', 'uploads/finish.60d4b20d7f7fe5.66200554.pdf'),
(5, 7, 'Office Document', 'uploads/finish.60d5a382e75a40.17696329.pdf'),
(6, 3, 'Examination Transcripts', 'uploads/finish.60d6e75950bcb6.70877283.pdf'),
(7, 9, 'Final Report', 'uploads/finish.60d73750640b15.64005302.pdf'),
(8, 12, 'Office Document', 'uploads/finish.60d74061c613f0.44879970.pdf'),
(9, 8, 'Scanned Image', 'uploads/finish.60d7418a87a189.39863700.pdf'),
(10, 5, 'Examination Transcripts', 'uploads/finish.60d75c55222f89.79685230.pdf'),
(11, 24, 'Scanned Image', 'uploads/finish.60d75e32510d60.18669226.pdf'),
(12, 1, 'Office Document', 'uploads/finish.60d7889986a554.28183827.doc'),
(13, 1, 'Scanned Image', 'uploads/finish.60d788fc768062.81920323.png');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first1` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `semester1` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `semester2` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `first3` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `semester3` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `user_id`, `first1`, `semester1`, `first2`, `semester2`, `first3`, `semester3`, `status`) VALUES
(1, 13, 'CRDB-753402435', 'CRDB-753402435', 'NMB-753402435', 'CRDB-753402435', 'ABSA-753402435', 'NCB-753402435', 'Cleared'),
(2, 14, 'CRDB-723483543', 'NMB-4724234535', 'ABSA-423474548', 'ABSA-412363247', 'NCB-3624735348', 'NCB-323743623', 'Cleared'),
(3, 27, 'CRDB-753402435', 'CRDB-753402435', 'NMB-753402435', 'CRDB-753402435', 'ABSA-753402435', 'NCB-753402435', 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `post_image`) VALUES
(1, 9, '27b54a02-4bfb-47f0-9270-0ef43a50d400.JPG'),
(2, 1, 'IMG_2885.JPG'),
(3, 11, 'PHOTO-2021-03-05-20-58-16.jpg'),
(4, 12, 'IMG_2896.JPG'),
(5, 3, 'IMG_2886.JPG'),
(6, 8, 'IMG_2894.JPG'),
(7, 2, 'IMG_2886.JPG'),
(8, 5, 'IMG_2884.JPG'),
(9, 24, 'IMG_2885.JPG'),
(10, 27, 'IMG_2885.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `lended_devices`
--

CREATE TABLE `lended_devices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `device_id` int(11) NOT NULL,
  `no_tools` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `returning_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Borrowed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lended_devices`
--

INSERT INTO `lended_devices` (`id`, `user_id`, `role`, `device_id`, `no_tools`, `date`, `returning_date`, `status`) VALUES
(1, 13, 'Class Representative', 1, '2', '2021-06-20', '2021-06-02', 'Cleared'),
(2, 14, 'Class Representative', 1, '2', '2021-06-20', '2021-06-20', 'Cleared'),
(3, 20, 'Class Representative', 2, '10', '2021-06-20', '2021-06-30', 'Cleared'),
(4, 22, 'Class Representative', 2, '22', '2021-06-20', '2021-07-11', 'Cleared'),
(5, 26, 'Class Representative', 4, '2', '2021-06-20', NULL, 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `lending`
--

CREATE TABLE `lending` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `return_date` date NOT NULL,
  `return_book` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0',
  `overdue_balance` int(255) NOT NULL DEFAULT '0',
  `receipt` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Borrowed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lending`
--

INSERT INTO `lending` (`id`, `user_id`, `book_id`, `date`, `return_date`, `return_book`, `overdue_balance`, `receipt`, `status`) VALUES
(1, 16, 3, '2021-04-01', '2021-06-23', '1', 0, 'CRDB-4686J90', 'Cleared'),
(2, 15, 3, '2021-05-19', '2021-06-24', '1', 11500, 'CRDB-4686J90', 'Cleared'),
(3, 15, 3, '2021-06-10', '2021-06-24', '1', 2500, 'CRDB-4686J90', 'Cleared'),
(4, 18, 2, '2021-06-17', '2021-06-24', '1', 0, 'ABSA-4686J90', 'Cleared'),
(5, 15, 1, '2021-04-01', '2021-06-24', '1', 37500, 'CRDB-4686J90', 'Cleared'),
(6, 18, 1, '2021-06-17', '2021-06-24', '1', 0, 'CRDB-4686J90', 'Cleared'),
(7, 20, 2, '2021-06-21', '2021-06-28', '1', 0, NULL, 'Borrowed'),
(8, 22, 3, '2021-06-13', '2021-06-28', '1', 1000, 'CRDB-4686J90', 'Cleared'),
(9, 23, 3, '2021-06-21', '2021-06-28', '1', 0, NULL, 'Cleared'),
(10, 25, 1, '2021-06-21', '2021-06-28', '1', 0, NULL, 'Borrowed'),
(11, 24, 2, '2021-06-22', '2021-06-29', '1', 0, NULL, 'Borrowed'),
(12, 21, 3, '2021-06-01', '2021-06-29', '1', 7000, 'ABSA-4686J90', 'Cleared'),
(13, 19, 2, '2021-06-22', '2021-06-29', '1', 0, NULL, 'Borrowed'),
(14, 18, 2, '2021-06-01', '2021-06-29', '1', 7500, 'CRDB-4686J90', 'Cleared'),
(15, 23, 2, '2021-06-23', '2021-06-30', '1', 0, 'CRDB-4686J90', 'Cleared'),
(16, 22, 2, '2021-06-30', '2021-07-07', '1', 0, NULL, 'Cleared');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `sport_tool` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `no_tools` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `date` date NOT NULL,
  `returning_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 DEFAULT 'Borrowed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `user_id`, `role`, `sport_tool`, `no_tools`, `date`, `returning_date`, `status`) VALUES
(1, 13, 'Team Captain', 'Ball', '2', '2021-06-04', '2021-06-10', 'Cleared'),
(2, 14, 'Team Captain', 'Ball', '2', '2021-06-20', '2021-06-20', 'Cleared'),
(3, 17, 'Team Captain', 'Ball', '2', '2021-06-20', '2021-07-11', 'Cleared'),
(4, 17, 'Player', 'Whitsle', '10', '2021-06-16', '2021-07-29', 'Cleared'),
(5, 18, 'Player', 'Ball', '2', '2021-06-20', NULL, 'Borrowed'),
(6, 19, 'Coach', 'Jersey', '22', '2021-06-20', NULL, 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'student',
  `status` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Active',
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `gender`, `level`, `dept_id`, `role`, `status`, `password`) VALUES
(1, 'John', 'Katele', 'john.katele@atc.ac.tz', 'Male', '', 1, 'admin', 'Active', '$2y$10$Ly6kayCz1A3tIVF2lwKTfuVOBEIFNFur5TeLE5l5ttD1KAghZmr7e'),
(2, 'Donald', 'Mwakatoga', 'donald.mwakatoga@atc.ac.tz', 'Male', 'Burser', 10, 'accountant', 'Active', '$2y$10$dK1AG7geuqtnu89LqvZg7ONjnt.6jfJhUfQbCS1h5D/3AqnFKazRW'),
(3, 'Rainhard', 'Ngambiye', 'rain.ngambiye@atc.ac.tz', 'Male', 'Librarian', 5, 'librarian', 'Active', '$2y$10$yE68ODwqaIekLuN4A0ptpuSRLKsfDdr/DOWV0dWEEiFFiNr5NS/MO'),
(4, 'Mohammed ', 'Mushi', 'mohammed.mushi@atc.ac.tz', 'Male', 'Warden', 8, 'warden', 'Active', '$2y$10$fJH3.kcwKjigP.4gCu5MUea0zKlcVjufDhBDjJ4fm89691cZ4PKHO'),
(5, 'Joachim', 'Kisoka', 'joachim.kisoka@atc.ac.tz', 'Male', 'Manager', 3, 'workshop-managers', 'Active', '$2y$10$Z0sZ4cu73sTICJBPiqpDPOBHnzpXgY7wfq4/Yarr9bjPKXXfAC1VW'),
(6, 'Ian', 'Welkings', 'ian.welkings@atc.ac.tz', 'Male', 'General Studies ', 2, 'Hod_GST', 'Active', '$2y$10$8kRHMcA2O.SjUYBPNtFJZ.gitqdLbUfAK1.nRAwZy.rclwj83z22G'),
(7, 'Abbakary', 'Ukwaju', 'abbakary.ukwaju@atc.ac.tz', 'Male', 'Head Of Department', 1, 'hod-ict', 'Active', '$2y$10$8nK3zSf3VbsKbbcxpX.cIeCi1AxwgId00cZZ/e6/o4LKGYYIvRauO'),
(8, 'Juma', 'Kobelo', 'juma.kobelo@atc.ac.tz', 'Male', 'Cateress', 7, 'cateress', 'Active', '$2y$10$FF8jrxSqc1MB6wjwXQKLj.JOIiczQTkWy6S6ctLiP8K3Z00Rz.GpW'),
(9, 'Allan', 'Nickson', 'allan.nickson@atc.ac.tz', 'Male', 'Registrar', 9, 'register', 'Active', '$2y$10$KBCdIrSfloovwoBFFL/Pe.iH53bFDuzmSJCV1F0kxS7b1JOymulNC'),
(10, 'Ritha', 'Michongwe', 'ritha.michongwe@atc.ac.tz', 'Female', 'Matron', 8, 'matron', 'Active', '$2y$10$USpVl732L1dwED8REZfleuwwFCpjak4J0Mtk/J9OFV3NzZr.CTCWm'),
(11, 'Fiona', 'Pierce', 'fyhupoha@mailinator.com', 'Male', 'Sport Master', 6, 'sports-master', 'Active', '$2y$10$pkf8EQskK3RSX/Zr7mtu5elkdNrModhySsIgfcdNn9Tg2g120v8fq'),
(12, 'Clementine', 'Hendrix', 'jutobofav@mailinator.com', 'Male', 'Classmaster', 4, 'classmaster', 'Active', '$2y$10$QbOyqKGRlJxOeRsgRpkVnOiue5Q76Lvb9EH/6waByiz/XRcjOWD76'),
(13, 'Aspen', 'Rosales', 'kiqafacin@mailinator.com', 'Female', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$ACiFosUZUlDSzlzVXDKC5OEddj5i8B1Qy5MPMidrEcf4NTD2TtOzK'),
(14, 'Naida', 'Knox', 'nopuzodeqy@mailinator.com', 'Male', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$yIWLUkgBtJsA6R/eDtI3JOR52DeuB1LF5zgiTYYOr/XL/VVfSRVlK'),
(15, 'Bevis', 'Hull', 'kasumovu@mailinator.com', 'Male', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$qohMGKjDudyuEByVOOkoROuHXXb8VheUIKEDWjuBUx.CpyagV9G42'),
(16, 'Nash', 'Bailey', 'cyqyzudako@mailinator.com', 'Others', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$v8h2Z6i/axmLwe4FwLHfIe6BBX1xuSDJAz//aH2deYQqGmenV92ke'),
(17, 'Alexandra', 'Mcclure', 'weve@mailinator.com', 'Male', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$99oNdtFYrpmnw81LxOJonO1FQjB1I4u7/kViO1f6kA4JVAR2f908G'),
(18, 'MacKenzie', 'Morton', 'gihofar@mailinator.com', 'Male', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$xRCZRbquCcC76tgnj.HZhe4J.KkC/iEPAz1cVBS1a3a.aynqJsfDG'),
(19, 'Micah', 'Little', 'gucekycywu@mailinator.com', 'Female', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$2kvcTLJOsQS8Zxrs7dklDubeK9eFjFuHfiwYocLq4uMI5f6e6CoGC'),
(20, 'Teegan', 'Oneal', 'jabecohyci@mailinator.com', 'Female', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$gwz4Ov7MzX5IgfWbrZ.cE.M.tqgBgFdconcuQ6M2pu7uAwLlBGeqi'),
(21, 'Emily', 'Barrett', 'bapyzytab@mailinator.com', 'Female', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$jQddoVBoKdDlDowRppETDOMuUxt7XlydClVMgTsJZHDZIIXcof0jO'),
(22, 'Jane', 'Charles', 'wakyl@mailinator.com', 'Female', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$4smjaumLnO7baZVo2LypRu1sO2osBJ7/eGO7dbpcn4EaMj19KmeAm'),
(23, 'Stephanie', 'Russo', 'defiri@mailinator.com', 'Male', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$0hcIPN1L9yyb22Fofqv3qu7aS9Nv1mGdyvGbYClJIwGowCA3lumjm'),
(24, 'Keegan', 'Fowler', 'jazygyf@mailinator.com', 'Male', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$voK0E6CwDrSNrcNsw76zEORWsUXX9vnSrsLA1LfLdpPmVgpj8kOMK'),
(25, 'Adele', 'Gonzales', 'xiroh@mailinator.com', 'Others', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$2b.tQ0hcOAV9dqjzt3nTE.k8Sd5niO2pchdoWZR5Cgt8adcOPzW8a'),
(26, 'Fritz', 'Owens', 'guwadyqos@mailinator.com', 'Male', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$AXnApX7Y/Hw8n6GTSmN9K.TggQ/Q1Tk.MrU9YjmY96ut7ATvT54qK'),
(27, 'Thomas', 'Mabhubha', 'thomas.mabhubha@atc.ac.tz', 'Male', 'NTA level 08', NULL, 'student', 'Active', '$2y$10$.FoKpUquUc0gVLfGgZfyaOP.qzO72DEXTvffthCzvOWartKzEt/PO'),
(28, 'Anna', 'Reynolds', 'wihusad@mailinator.com', 'Female', 'NTA level 06', NULL, 'student', 'Active', '$2y$10$rT6DSKBMRluFWlbQyrV1MuFeR5rO9HMI6NyWDNO2lWGEpqC98GuTy'),
(29, 'William', 'Washington', 'pinu@mailinator.com', 'Female', '', 1, 'student', 'Active', '$2y$10$mMvxls4id8HrKmiP/2a7TerCFz75wB2lxb5LCImBCawCdORDSdGcG'),
(32, 'Eugenia', 'Boyd', 'fogoti@mailinator.com', 'Male', 'NTA Level 06', 1, 'student', 'Active', '$2y$10$dkXDfWOHPvUOGtGQ5K/C0eUvv3D8EtkBjsJeTj2zD.M1MJTc22jAW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleared`
--
ALTER TABLE `cleared`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lended_devices`
--
ALTER TABLE `lended_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`device_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `lending`
--
ALTER TABLE `lending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cleared`
--
ALTER TABLE `cleared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lended_devices`
--
ALTER TABLE `lended_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lending`
--
ALTER TABLE `lending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cleared`
--
ALTER TABLE `cleared`
  ADD CONSTRAINT `cleared_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cleared_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lended_devices`
--
ALTER TABLE `lended_devices`
  ADD CONSTRAINT `lended_devices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lended_devices_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`);

--
-- Constraints for table `lending`
--
ALTER TABLE `lending`
  ADD CONSTRAINT `lending_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lending_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sports`
--
ALTER TABLE `sports`
  ADD CONSTRAINT `sports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
