-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `update1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL CHECK (`email` like '%_@__%.__%'),
  `password` varchar(20) NOT NULL,
  `house_no` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(35) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `house_no`, `street`, `city`, `DOB`) VALUES
('A001', 'Nimal Perera', 'nimal.perera@gmail.com', 'nimal@123!', '12', 'Galle Road', 'Colombo', '1995-05-15'),
('A002', 'Kamal Wijesinghe', 'kamalwijes@outlook.com', 'wij234!', '25', 'Flowers street', 'Colombo', '1992-11-25'),
('A003', 'Saman Jayasinghe', 'samankumara@gmail.com', 'Pass@weros', '30', 'Station Road', 'Galle', '1990-01-10'),
('A004', 'Ravindu Silva', 'ravindususal@outlook.com', 'PRavin@1988', '8', 'Fort Street', 'Negombo', '1988-07-30'),
('A005', 'Dinesh Gunawardena', 'dineshtharanga@gmail.com', 'GunDinesh45#', '45', 'Temple Road', 'Gampaha', '2000-03-20'),
('A006', 'Tharindu Fernando', 'tharindukalpage@outlook.com', 'AdminThari94', '50', 'Church Street', 'Colombo', '1994-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_telephone`
--

CREATE TABLE `admin_telephone` (
  `admin_id` varchar(10) NOT NULL,
  `telephone_num` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_telephone`
--

INSERT INTO `admin_telephone` (`admin_id`, `telephone_num`) VALUES
('A001', '0712345678'),
('A001', '0776543210'),
('A002', '0751122334'),
('A002', '0769876543'),
('A003', '0723456789'),
('A004', '0772233445'),
('A004', '0789123456'),
('A005', '0719988776');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `post_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `date_published` date NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `admin_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`post_id`, `title`, `description`, `image_path`, `date_published`, `tags`, `admin_id`) VALUES
(30, 'Join Us', 'You can now join the admin team if you are individuals with specific skills that we\'re looking for.', 'uploads/img4.jpg', '2024-10-05', NULL, 'A004'),
(31, 'Webinar', 'We have organized teacher training workshops and online webinars just for you! Opportunities for Professional Development that can help you enhance your skills and knowledge.', 'uploads/img3.jpg', '2024-10-05', NULL, 'A005'),
(32, 'Offers', 'We have new discounts for both teachers and trainers. Grab them before the season is over!', 'uploads/img1.jpg', '2024-10-05', NULL, 'A004'),
(33, 'New App', 'This is to inform that our upcoming mobile app is around the corner. Stay tuned for more updates and get ready to experience something amazing.', 'uploads/img2.jpg', '2024-10-05', NULL, 'A005'),
(34, 'Trends', 'Explore and discuss the latest Global trends in education from around the world, and how they can be adapted locally.', 'uploads/img5.jpg', '2024-10-05', NULL, 'A004');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `msg_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL CHECK (`email` like '%_@__%.__%'),
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `create_date` date NOT NULL,
  `response` text DEFAULT NULL,
  `response_status` enum('Pending','In Progress','Resolved') NOT NULL,
  `admin_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`msg_id`, `name`, `phone_number`, `email`, `subject`, `message`, `create_date`, `response`, `response_status`, `admin_id`) VALUES
(6, 'Teshan Perera', '0724574359', 'teshanperera@gmail.com', 'Profile Update Problem', 'I’m unable to update my profile details. Can someone please help me fix this?', '2024-10-06', NULL, 'Pending', 'A005'),
(7, 'Saman Edirimuni', '0764567892', 'samanedirimuni@gmail.com', 'Request for Extension', 'I need more time to complete my current course. Is it possible to get an extension?', '2024-10-06', 'Your extension request has been approved. Please check your course details.', 'Resolved', 'A006'),
(8, 'Leo Messi', '0724598801', 'leomessi@gmail.com', 'Course Certificate', 'I finished the course, but I haven’t received my certificate yet. Can you check?', '2024-10-06', 'Your certificate is being processed. It will be sent to your email shortly.', 'In Progress', 'A005'),
(9, 'Prasanna Perera', '+94763816587', 'prasannaperera@gmail.com', 'Wrong Course Enrolment', 'I accidentally enrolled in the wrong course. Can you switch me to the correct one?', '2024-10-06', NULL, 'Pending', 'A006'),
(10, 'Sadesh Premadasa', '0724501888', 'sadeshpremadasa24@gmail.com', 'Issue with Video Playback', 'The videos in my course are not loading properly. Can you fix this problem?', '2024-10-06', 'We are currently investigating the issue and will update you soon.', 'In Progress', 'A005');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `trainer_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `price`, `trainer_id`) VALUES
('C001', 'Advanced Mathematics', 'A comprehensive course on advanced mathematical concepts.', 8500.00, 'TR001'),
('C002', 'English Literature Essentials', 'An introduction to key themes and works in English Literature.', 9200.00, 'TR002'),
('C003', 'Fundamentals of Physics', 'Learn the basics of physics, including mechanics and thermodynamics.', 7500.00, 'TR003'),
('C004', 'Modern History Overview', 'An overview of key historical events in the modern era.', 8800.00, 'TR004'),
('C008', 'Quantum Mechanics', 'A course exploring the principles of quantum mechanics and their implications.', 8500.00, 'TR003');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` varchar(10) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `admin_id`, `question`, `answer`) VALUES
('F001', 'A001', 'What is TeachConnect?', 'TeachConnect serves as a comprehensive resource hub for educators and teachers, offering specialized courses and training in essential soft skills.'),
('F002', 'A002', 'Who can benefit from TeachConnect?', 'Both experienced educators and newcomers to the profession can benefit from our courses and professional development resources.'),
('F003', 'A001', 'How do I enroll in a course?', 'Simply create an account, select your course, and click Enroll.'),
('F004', 'A002', 'Are the courses certified?', 'Yes, all our courses offer certificates upon successful completion.'),
('F005', 'A001', 'How can I access my account?', 'You can access your account by logging in with your registered email and password from the homepage.'),
('F006', 'A002', 'Is there a refund policy?', 'Yes, for refund inquiries, please contact our support team through the \"Contact Us\" page.'),
('F007', 'A001', 'Can I access the courses on mobile?', 'Yes, TeachConnect is fully responsive and can be accessed on mobile devices.'),
('F008', 'A002', 'What payment methods are accepted?', 'We accept major credit cards and online payment services such as PayPal.'),
('F009', 'A001', 'How do I contact support?', 'You can contact support via the \"Contact Us\" page or email us at support@teachconnect.com.'),
('F010', 'A002', 'Do you offer discounts for bulk course registrations?', 'Yes, we offer discounts for institutions and groups registering in bulk. Contact our support team for more details.'),
('F011', 'A001', 'Can trainers teach on the platform?', 'Yes, trainers can teach on TeachConnect. You can select a trainer when registering for TeachConnect.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `feedback`, `rating`, `created_at`, `admin_id`) VALUES
(22, 'Shehan Perera', 'shehanperera@gmail.com', 'An exceptional platform that transformed my teaching skills!', 5, '2024-10-06 15:24:31', 'A003'),
(23, 'D Perera', 'dkperera@outlook.com', 'The courses are well-structured and engaging!', 4, '2024-10-06 15:24:31', 'A003'),
(24, 'Aarav Sharma', 'aarav12sharma@gmail.com', 'A fantastic learning experience that I highly recommend!', 5, '2024-10-06 15:24:31', 'A004'),
(25, 'Emily Brown', 'emilybrO@outlook.com', 'The UI is intuitive, and the learning material is top-notch.', 4, '2024-10-06 15:24:31', 'A004'),
(26, 'Michael Clark', 'michaelclark23@gmail.com', 'Best platform I’ve ever used for online learning!', 5, '2024-10-06 15:24:31', 'A003'),
(27, 'Deepal Iyer', 'deepaliye345r@gmail.com', 'Empowering courses that make learning enjoyable and effective!', 5, '2024-10-06 15:24:31', 'A004'),
(28, 'Chris Martin', 'chrismartinMaster@outlook.com', 'Very easy to navigate and full of useful features!', 5, '2024-10-06 15:24:31', 'A003'),
(29, 'Freya Johnson', 'freya.johnson@gmail.com', 'A brilliant experience; I\'ve gained so much from this platform!', 4, '2024-10-06 15:24:31', 'A004'),
(30, 'David Johnson', 'david.johnson@outlook.com', 'TeachConnect has been a valuable resource in my learning journey.', 5, '2024-10-06 15:24:31', 'A003'),
(31, 'Amanda Green', 'amanda.green@gmail.com', 'The platform is great, though I’d love to see more advanced courses.', 4, '2024-10-06 15:24:31', 'A004');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `method` enum('card','paypal') NOT NULL,
  `trainer_id` varchar(10) DEFAULT NULL,
  `teacher_id` varchar(10) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `name`, `country`, `method`, `trainer_id`, `teacher_id`, `amount`) VALUES
('P0002', 'Nimal Fernando', 'Sri Lanka', 'paypal', NULL, 'ST0001', 1500.00),
('P0003', 'Emily Brown', 'UK', 'card', 'TR002', NULL, 30200.00),
('P0004', 'Samantha Mendis', 'Sri Lanka', 'paypal', NULL, 'ST0002', 2800.00),
('P0005', 'Chris Martin', 'UK', 'card', 'TR004', NULL, 9700.00),
('P0006', 'Arjun Kumar', 'India', 'paypal', NULL, 'ST0003', 4300.00),
('P0007', 'Freya Johnson', 'Sri Lanka', 'card', 'TR005', NULL, 6600.00),
('P0008', 'Jane Doe', 'United States', 'paypal', NULL, 'ST0004', 4500.00),
('P0009', 'Rahul Sharma', 'India', 'card', 'TR003', NULL, 91000.00),
('P0010', 'Praveen Raj', 'India', 'paypal', NULL, 'ST0005', 700.00);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(10) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL CHECK (`email` like '%_@__%.__%'),
  `phone_number` varchar(15) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `fname`, `lname`, `email`, `phone_number`, `subject`, `country`, `password`) VALUES
('ST0001', 'Nimal', 'Fernando', 'nimal.fernando@gmail.com', '+94123456789', 'Mathematics', 'Sri Lanka', 'Pasvfdd234@'),
('ST0002', 'Samantha', 'Mendis', 'samantham23@outlook.com', '+94123456780', 'Physics', 'Sri Lanka', 'Physfff@78'),
('ST0003', 'Arjun', 'Kumar', 'arjun.kumar@gmail.com', '+919876543210', 'Computer Science', 'India', 'CSguru@2024'),
('ST0004', 'Jane', 'Doe', 'jane.doe@outlook.com', '+11234567890', NULL, 'United States', 'English123!'),
('ST0005', 'Praveen', 'Raj', 'praveen.raj@outlook.com', '+919876543211', 'Biology', 'India', 'BioKing#55'),
('ST0006', 'Isuru', 'Senanayake', 'isurusenanayakeJvib@gmail.com', '+94123456791', 'Chemistry', 'Sri Lanka', 'ISUJB!21'),
('ST0007', 'Emily', 'Johnson', 'emily.johnson@outlook.com', '+49123456789', 'History', 'Germany', 'HistMaster88'),
('ST0008', 'Liam', 'Brown', 'liammax23@outlook.com', '+44123456789', NULL, 'United Kingdom', 'Geo@man23'),
('ST0009', 'Shehan', 'Perera', 'shehanperera@gmail.com', '+94771234567', 'Mathematics', 'Sri Lanka', 'sdvsvsv232332!'),
('ST0010', 'D', 'Perera', 'dkperera@outlook.com', '+94782345678', 'Physics', 'Sri Lanka', 'qwexcc#$!'),
('ST0011', 'Aarav', 'Sharma', 'aarav12sharma@gmail.com', '+919876543210', 'Computer Science', 'India', 'AaravPass#2024'),
('ST0012', 'Michael', 'Clark', 'michaelclark23@gmail.com', '+441234567890', 'Biology', 'United Kingdom', 'pawpaw@567'),
('ST0013', 'Deepal', 'Iyer', 'deepaliye345r@gmail.com', '+919876543211', 'Chemistry', 'India', 'Deepal@pass12'),
('ST0014', 'David', 'Johnson', 'david.johnson@outlook.com', '+14155552671', NULL, 'United States', 'DavidPasds3'),
('ST0015', 'Amanda', 'Green', 'amanda.green@gmail.com', '+94715656422', 'History', 'Sri Lanka', 'vdvssijvks!');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` varchar(10) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL CHECK (`email` like '%_@__%.__%'),
  `phone_number` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `qualification_level` varchar(20) NOT NULL CHECK (`qualification_level` in ('Bachelor','Master','Doctorate')),
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `fname`, `lname`, `email`, `phone_number`, `country`, `subject`, `qualification_level`, `password`) VALUES
('TR001', 'Saman', 'Perera', 'samanPER2@gmail.com', '+9471341715', 'Sri Lanka', 'Mathematics', 'Master', 'SaMMA@123'),
('TR002', 'Emily', 'Brown', 'emilybrO@outlook.com', '+441234567890', 'UK', 'English Literature', 'Doctorate', 'Emily77456'),
('TR003', 'Rahul', 'Sharma', 'rahulsharma@gmail.com', '+919876543210', 'India', 'Physics', 'Bachelor', 'RahulJK@789'),
('TR004', 'Chris', 'Martin', 'chrismartinMaster@outlook.com', '+441234567891', 'UK', 'History', 'Master', 'Chrisat1'),
('TR005', 'Freya', 'Johnson', 'freya.johnson@gmail.com', '+94715656422', 'Sri Lanka', 'Biology', 'Doctorate', 'Freya@654'),
('TR006', 'Dinesh', 'Kumar', 'dineshku23mar@gmail.com', '+9199999345', 'India', 'Chemistry', 'Bachelor', 'Diinessssh@987'),
('TR007', 'Emily', 'Brown', 'emily.brown@gmail.com', '+441234567890', 'UK', 'English Literature', 'Doctorate', 'Emily77456'),
('TR008', 'Chris', 'Martin', 'chris.martin@martin.com', '+441234567891', 'UK', 'History', 'Master', 'Chri##sat1'),
('TR009', 'Freya', 'Johnson', 'freya.johnson@outlook.com', '+94715656422', 'Sri Lanka', 'Biology', 'Doctorate', 'frankyy@654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_telephone`
--
ALTER TABLE `admin_telephone`
  ADD PRIMARY KEY (`admin_id`,`telephone_num`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_blog_post_admin` (`admin_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `fk_admin` (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD KEY `fk_faq_admin` (`admin_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_feedbacktable` (`admin_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_telephone`
--
ALTER TABLE `admin_telephone`
  ADD CONSTRAINT `fk_admin_telephone` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `fk_blog_post_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `fk_faq_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedbacktable` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
