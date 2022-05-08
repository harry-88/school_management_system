--
-- Database: `eportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `assessment_name` varchar(30) DEFAULT NULL,
  `subject_title` varchar(30) DEFAULT NULL,
  `total_marks` float DEFAULT NULL,
  `obtained_marks` float DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_id`, `student_id`, `assessment_name`, `subject_title`, `total_marks`, `obtained_marks`, `date`) VALUES
(1, 1, 'Monthly Test # 1', 'English', 20, 18, '2021-07-04'),
(2, 1, 'Monthly Test # 2', 'Physics', 25, 25, '2021-07-04'),
(3, 1, 'Mid Exam', 'Physics', 60, 60, '2021-07-04'),
(4, 3, 'Monthly Test # 1', 'English', 20, 18, '2021-07-04'),
(5, 3, 'Monthly Test # 2', 'Mathematics', 20, 20, '2021-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_name` varchar(20) NOT NULL,
  `section` char(1) DEFAULT NULL,
  `incharge_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_name`, `section`, `incharge_id`) VALUES
('Eight', 'A', 9),
('Five', 'A', 5),
('Four', 'A', 1),
('Nine', 'A', 4),
('Nursery', NULL, NULL),
('One', 'A', 10),
('Prep', NULL, NULL),
('Seven', 'A', 3),
('Six', 'A', 8),
('Ten', 'A', 2),
('Three', 'A', 7),
('Two', 'A', 6);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `cnic` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `first_name`, `last_name`, `mobile_number`, `cnic`, `email`, `address`, `occupation`, `designation`) VALUES
(1, 'Shahid', 'Hussain', '03004629248', '3520115599783', 'shahid.hussain@gmail.com', 'Lahore Cantt.', 'Police Officer', 'Inspector'),
(2, 'Muhammad', 'Aslam', '03001234567', '3520115599456', 'muhammad.aslam@gmail.com', 'Lahore Cantt.', 'Police Officer', 'Officer'),
(3, 'Iqbal', 'Ahmad', '03004623248', '3520159599783', 'iqbal.ahmad@gmail.com', 'Lahore Cantt.', 'Teacher', NULL),
(4, 'Amjad', 'Ali', '03004623234', '3520159599744', 'amjad.ali@gmail.com', 'Lahore Cantt.', 'Enginner', NULL),
(5, 'Asghar', 'Awan', '03004623234', '3520159579745', 'asghar.awan@gmail.com', 'Lahore Cantt.', 'Mechanic', NULL),
(6, 'Shahid', 'Maqbool', '03004623234', '3520157599745', 'shahid.maqbool@gmail.com', 'Lahore Cantt.', 'Engineer', NULL),
(7, 'Ijaz', 'Shah', '03004623234', '3520159566745', 'ijaz.shah@gmail.com', 'Lahore Cantt.', 'Electrical Engineer', NULL),
(8, 'Unknown', 'Unknown', '11223344556', '3520115545783', 'unknown@gmail.com', 'Bata Colony', 'Bata Company', 'Manager'),
(9, 'Riaz', 'Ali', '11223344556', '3520133784673', 'riaz.shah@gmail.com', 'Multan Pakistan', 'Police', 'Inspector'),
(19, 'Ahmad', 'Rashid', '11223344556', '1234567890567', 'ahmad@gmail.com', 'Bata', 'Police', 'Inspector'),
(22, 'Muhammad', 'Habib', '03009876345', '3520144335673', 'muhammad.habib@gmail.com', 'Unknown Place', 'Unknown', 'Unknown'),
(23, 'Shafiq', 'Ahmad', '03214567834', '3520176123453', 'unknown.person@gmail.com', 'Lahore Pakistan', 'Unknown Occupation', 'NA'),
(24, 'Unknown', 'Person', '11223344557', '3520155667773', 'unknownperson@gmail.com', 'Mustafa Town, Lahore', 'sasad', 'adasd'),
(25, 'Sabir', 'Ali', '03001234876', '3520155443213', 'sabir.ali@gmail.com', 'Lahore Pakistan', 'Teacher', ''),
(26, 'Ahmad', 'Hassan', '22334455667', '3520188776543', 'ahmad.ali@gmail.com', 'Lahore Pakistan', 'Unknown', ''),
(27, 'Farooq', 'Ali', '03001234123', '3520113345183', 'farooq.ali@gmail.com', 'Lahore Pakistan', 'Police', ''),
(28, 'Abdul', 'Sattar', '03214532123', '3520152159993', 'abdul.sattar@gmail.com', 'Lahore Pakistan', 'Pilot', ''),
(29, 'Muhammad', 'Afzal', '03002134897', '3520144133183', 'muhammad.afzal@gmail.com', 'Faisalabad Pakistan', 'Army Officer', ''),
(30, 'Zakir', 'Ali', '03009123324', '3520159817773', 'zakir.ali@gmail.com', 'Lahore Pakistan', 'Police', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `class_name` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `cnic` varchar(13) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `blood_group` char(3) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `account_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `class_name`, `mobile_number`, `cnic`, `address`, `gender`, `blood_group`, `email`, `password`, `parent_id`, `account_status`) VALUES
(1, 'Jawad', 'Shah', 'Ten', '03003435432', '3520181602783', 'Lahore Cantt.', 'Male', 'B+', 'jawad.shah@gmail.com', '$2y$10$Xwxt5.qRcQ8DEAt2U5ctkOdRoH77uo/mK666Xmp5NstAnaeo6tcnu', 1, 1),
(2, 'Ammar', 'Shah', 'Nine', '03211234321', '3520159322763', 'Lahore Cantt.', 'Male', 'B+', 'ammar.shah@gmail.com', 'Ammar1234@', 1, 1),
(3, 'Hammad', 'Aslam', 'Nine', '03003456427', '3520133456783', 'Lahore Cantt.', 'Male', 'O-', 'hammad.aslam@gmail.com', '1122', 2, 1),
(4, 'Adil', 'Shahid', 'Nine', '03071256234', '3520167543783', 'Lahore Cantt.', 'Male', 'A-', 'adil.shahid@gmail.com', 'Adil1234@', 6, 0),
(19, 'Sheraz', 'Ali', 'Seven', '03001234567', '3520181505683', 'Multan Pakistan', 'Male', 'A+', 'sheraz.shah@gmail.com', 'Sheraz1234@', 9, 0),
(20, 'Namra', 'Habib', 'Ten', '03001122654', '3520155667893', 'Lahore Pakistan', 'Female', 'B+', 'namra.habib@gmail.com', '$2y$10$WIvftvUkNAXq9djZ6Vzwc.QD6yL48Cd6aZf5SAGBzKYPo.CNf5yKO', 22, 1),
(21, 'Muhammad', 'Azeem', 'Ten', '03102345746', '3520177445633', 'Lahore Pakistan', 'Male', 'A-', 'muhammad.azeem@gmail.com', '$2y$10$i5ecG.CIwQT7LMd2AXrqEesciqss9s9t/aZYrQbcmRMU1ZOMsAkNm', 23, 1),
(22, 'Syed Ali', 'Jawad Bukhari', 'Ten', '03214567843', '3520181502783', 'Lahore Pakistan', 'Male', 'B+', 'ali.jawad@gmail.com', '$2y$10$4DFCcjMRDfsczRdapkbqWuwoPbh/oTd5fG4RIo8UpRtM9qlvZsT8C', 1, 1),
(25, 'Mehroz', 'Mustafa', 'Ten', '11223344557', '3520152157863', 'Mustafa Town, Lahore', 'Male', 'B+', 'mehroz.mustafa@gmail.com', '$2y$10$HNAj2e7gFVytAMLCTo7J1u0iEzg0EK7xcOW6Gmi2Feh89.NJxxJc2', 24, 1),
(26, 'Fazila', 'Sabir', 'Ten', '03001243567', '3520144223453', 'Lahore Pakistan', 'Female', 'A+', 'fazila.sabir@gmail.com', '$2y$10$Qgeh.D843F2wIQWqWK7X6u7nfZoQDpIwamd4LzvEGMn0KNzWPsZYq', 25, 1),
(27, 'Umer', 'Farooq', 'Ten', '22334455666', '3520152133223', 'Lahore Pakistan', 'Male', 'A-', 'umer.farooq@gmail.com', '$2y$10$.BN/wlVQ3x.7Zi6Ni9KmhuMh3nXt2b7N101GRIYmLsKv2r6WvUtum', 27, 0),
(28, 'Amna', 'Sattar', 'Ten', '03214532123', '3520152159993', 'Lahore Pakistan', 'Female', 'A-', 'amna.sattar@gmail.com', '$2y$10$joXlJseP/r0fC64HYlaiAeQ4a4evcNYXD5T2TkOdrNHA1.abRG6PW', 28, 1),
(29, 'Anam', 'Afzal', 'Nine', '03002345768', '3520144122783', 'Faisalabad Pakistan', 'Female', 'A+', 'anam.afzal@gmail.com', '$2y$10$w3WkGuBIrK6U2rx9GiJuMe4YEGfDB/0zPNRJhfCsB6S89LBtu9FlO', 29, 1),
(30, 'Iqra', 'Zakir', 'Nine', '03009945324', '3520165523783', 'Lahore Pakistan', 'Female', 'B-', 'iqra.zakir@gmail.com', '$2y$10$Pn92.N/PR49rgOb1gwhfNON4sSpaWugrB0C45LCo9caRj8t6miHEW', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_title` varchar(30) DEFAULT NULL,
  `subject_type` varchar(20) DEFAULT NULL,
  `class_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_title`, `subject_type`, `class_name`) VALUES
(1, 'English', 'Compulsory', 'Ten'),
(2, 'Urdu', 'Compulsory', 'Ten'),
(3, 'Mathematics', 'Compulsory', 'Ten'),
(4, 'Biology', 'Compulsory', 'Ten'),
(5, 'Chemistry', 'Compulsory', 'Ten'),
(6, 'Physics', 'Compulsory', 'Ten'),
(7, 'Computer', 'Compulsory', 'Ten'),
(8, 'Islamiat', 'Compulsory', 'Ten'),
(9, 'Pak Studies', 'Compulsory', 'Ten'),
(10, 'English', 'Compulsory', 'Nine'),
(11, 'Urdu', 'Compulsory', 'Nine'),
(12, 'Mathematics', 'Compulsory', 'Nine'),
(13, 'Biology', 'Compulsory', 'Nine'),
(14, 'Chemistry', 'Compulsory', 'Nine'),
(15, 'Physics', 'Compulsory', 'Nine'),
(16, 'Computer', 'Compulsory', 'Nine'),
(17, 'Islamiat', 'Compulsory', 'Nine'),
(18, 'Pak Studies', 'Compulsory', 'Nine'),
(19, 'English', 'Compulsory', 'Eight'),
(20, 'Urdu', 'Compulsory', 'Eight'),
(21, 'Mathematics', 'Compulsory', 'Eight'),
(22, 'Science', 'Compulsory', 'Eight'),
(23, 'Computer', 'Compulsory', 'Eight'),
(24, 'Islamiat', 'Compulsory', 'Eight'),
(25, 'English', 'Compulsory', 'Six'),
(26, 'Urdu 6', 'Compulsory', 'Six'),
(27, 'Math 6', 'Compulsory', 'Six'),
(28, 'Science 6', 'Compulsory', 'Six'),
(29, 'Pak Studies 6', 'Compulsory', 'Six'),
(30, 'Islamiat 6', 'Compulsory', 'Six'),
(31, 'English 1', 'Compulsory', 'One'),
(32, 'Urdu 1', 'Compulsory', 'One'),
(33, 'Math 1', 'Compulsory', 'One'),
(34, 'Drawing 1', 'Compulsory', 'One'),
(35, 'Spoken English 1', 'Compulsory', 'One');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_registered`
--

CREATE TABLE `subjects_registered` (
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_teached`
--

CREATE TABLE `subject_teached` (
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(11) DEFAULT NULL,
  `cnic` varchar(13) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `qualification` varchar(30) DEFAULT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `first_name`, `last_name`, `mobile_number`, `cnic`, `address`, `gender`, `qualification`, `subject`, `joining_date`, `email`, `password`) VALUES
(1, 'Mustijab', 'Haider', '03001234567', '3520118192783', 'Lahore Pakistan', 'Male', 'Mechanical Enginnering', 'Physics', '2021-07-11 16:12:49', 'mustijab.haider@gmail.com', '$2y$10$KuyhEFrcBfhmTsIhgKWmcuVvk74iUkUhmqWwbpBU1JDYUIEq8HvIO'),
(2, 'Rana', 'Waqas', '03001234567', '3520181504563', 'Lahore Pakistan', 'Male', 'Software Engineering', 'Computer Science', '2021-07-12 07:09:20', 'rana.waqas@gmail.com', '$2y$10$ebvEWqp6XX1T5s0SPhEScORWNhrccq/fLFRjtYJbZItQBLSfE4Kfm'),
(3, 'Mehr', 'Nisa', '03214456789', '3520182909843', 'Lahore Pakistan', 'Female', 'BS Arts', 'Drawing', '2021-07-12 07:10:07', 'mehr.nisa@gmail.com', '$2y$10$nq6C5dnjkfMlejRt5bmTzukowrm9b4Zhh9V47aM/A8P6chorQ75uy@'),
(4, 'Rizwan', 'Bashir', '03001234567', '3520187342783', 'Lahore Pakistan', 'Male', 'M.Phil Urdu', 'Urdu', '2021-07-12 07:20:35', 'rizwan.bashir@gmail.com', '$2y$10$LnyDjfuQsFu6bJtOxUImHuPcdtw6iOdKj6yse1..bxERwXkTbKex6'),
(5, 'Mahmood', 'Ali', '03001234567', '3520140632783', 'Lahore Pakistan', 'Male', 'M.Phil Mathematics', 'Mathematics', '2021-07-11 16:12:56', 'mahmood.ali@gmail.com', 'MahmoodAli1234@'),
(6, 'Rehan', 'Ali', '03001234567', '3520184732783', 'Lahore Pakistan', 'Male', 'Calligraphy', 'Calligraphy', '2021-07-11 16:12:59', 'rehan.ali@gmail.com', 'RehanAli1234@'),
(7, 'Ammad', 'Uddin', '03001234567', '3520171402783', 'Lahore Pakistan', 'Male', 'M.Phil English', 'English', '2021-07-11 16:13:02', 'ammad.uddin@gmail.com', 'AmmadUddin1234@'),
(8, 'Jiger', 'Ali', '03001234567', '3520181604783', 'Lahore Pakistan', 'Male', 'M.Phil Chemistry', 'Chemistry', '2021-07-11 16:13:04', 'jiger.ali@gmail.com', 'JigerAli1234@'),
(9, 'Ishfaq', 'Ahmad', '03001234567', '3520188734783', 'Lahore Pakistan', 'Male', 'MS Biology', 'Biology', '2021-07-11 16:13:06', 'ishfaq.ahmad@gmail.com', 'IshfaqAhmad1234@'),
(10, 'Habib', 'Ali', '03001234567', '3520134502783', 'Lahore Pakistan', 'Male', 'MS Computer Science', 'Islamiat', '2021-07-11 16:13:09', 'habib.ali@gmail.com', 'HabibAli1234@'),
(11, 'Faheem', 'Alvi', '03001234567', '3520181832783', 'Lahore Pakistan', 'Male', 'MS Pak Studies', 'Pak Studies', '2021-07-11 16:13:11', 'faheem.alvi@gmail.com', 'FaheemAlvi1234@'),
(14, 'Hina', 'Alam', '03001234987', 'Lahore Pakist', '3520115161783', 'Female', 'BS English', 'English', '2021-07-12 18:15:28', 'hina.alam@gmail.com', '$2y$10$b0pnjfsarzVQsvytJkFA5OzYxXmm8U1b/xCRgI.bMpgCUDIf5RcG2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_name`),
  ADD KEY `incharge_id` (`incharge_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `class_name` (`class_name`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_name` (`class_name`);

--
-- Indexes for table `subjects_registered`
--
ALTER TABLE `subjects_registered`
  ADD PRIMARY KEY (`subject_id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `subject_teached`
--
ALTER TABLE `subject_teached`
  ADD PRIMARY KEY (`teacher_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`incharge_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `classes` (`class_name`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`parent_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `classes` (`class_name`);

--
-- Constraints for table `subjects_registered`
--
ALTER TABLE `subjects_registered`
  ADD CONSTRAINT `subjects_registered_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `subjects_registered_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `subject_teached`
--
ALTER TABLE `subject_teached`
  ADD CONSTRAINT `subject_teached_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `subject_teached_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);
COMMIT;

