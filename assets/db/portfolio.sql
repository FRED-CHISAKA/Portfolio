-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2026 at 02:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `class`, `name`) VALUES
(1, 'filter-app', 'App'),
(2, 'filter-product', 'Product'),
(3, 'filter-branding', 'Branding'),
(4, 'filter-books', 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `issuer` varchar(255) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `credential_id` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `title`, `issuer`, `issue_date`, `credential_id`, `img`, `url`, `description`, `status`, `created_at`) VALUES
(1, 'Huawei Certified ICT Associate', 'Huawei', '2025-06-15', 'HCSA-XXXXX', 'assets/img/certifications/Huawei-Cloud-Basics.PNG', 'https://example.com/verify', 'Certification covering fundamental networking technologies and Huawei networking solutions.', 1, '2026-08-28 08:30:06'),
(2, 'Huawei Certified ICT Associate - Storage', 'Huawei', '2025-08-20', 'HCSA-STORAGE-XXXXX', 'assets/img/certifications/PLP-MERN-WEB.PNG', 'https://example.com/verify', 'Certification covering storage technologies and Huawei storage solutions.', 1, '2026-08-28 08:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Fred Chisaka', '4871.2022@students.ku.ac.ke', 'Software Service Requirement', 'Hello Fred,\r\n\r\nI am looking for a developer to build a management system for my business. The system should allow us to manage customers, products, sales, inventory, and generate reports. It should have an administrator dashboard where authorized users can log in and manage the system.\r\n\r\nI would also like the system to be accessible through a web browser and preferably include user roles and permissions, data backup, and basic security features.\r\n\r\nPlease let me know if this is something you can develop and provide an estimated cost and development timeline.\r\n\r\nKind regards,\r\nFred Chisaka', 0, '2026-08-28 09:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `pre` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `icon`, `pre`, `post`, `title`) VALUES
(1, 'bi bi-emoji-smile', 0, 365, 'Happy Clients'),
(2, 'bi bi-journal-richtext', 0, 673, 'Projects'),
(3, 'bi bi-headset', 600, 6578, 'Hours of Support'),
(4, 'bi bi-people', 0, 365, 'Our Team'),
(5, 'bi bi-emoji-smile', 0, 365, 'Happy Clients'),
(6, 'bi bi-journal-richtext', 0, 673, 'Projects'),
(7, 'bi bi-headset', 600, 6578, 'Hours of Support'),
(8, 'bi bi-people', 0, 365, 'Our Team');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `company`, `url`) VALUES
(1, 'TechDive', 'https://techdive.com');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `degree`, `institution`, `location`, `start_year`, `end_year`, `description`, `status`, `created_at`) VALUES
(1, 1, 'Bachelor of Science in Software Engineering', 'Kisii University', 'Kisii, Kenya', 2020, 2024, 'Graduated with a strong background in software engineering, databases, networking and cloud computing.', 1, '2026-08-13 08:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `is_present` tinyint(4) DEFAULT 0,
  `description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `job_title`, `company`, `location`, `start_year`, `end_year`, `is_present`, `description`, `status`, `created_at`) VALUES
(1, 1, 'ICT Intern', 'Example Company', 'Kakamega, Kenya', 2025, NULL, 1, 'Installed and configured LAN networks\nMaintained company computers and printers\nDeveloped internal inventory system\nProvided user technical support', 1, '2026-08-13 08:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` int(11) NOT NULL,
  `media_type` enum('image','video','document') NOT NULL DEFAULT 'image',
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `file_name`, `file_path`, `file_type`, `file_size`, `media_type`, `uploaded_at`) VALUES
(1, 'Clash', '1788513280_6a9a8c00840f6.png', 'assets/uploads/media/1788513280_6a9a8c00840f6.png', 'image/png', 91088, 'image', '2026-09-04 08:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `technology` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `category`, `client`, `project_date`, `img`, `url`, `description`, `technology`) VALUES
(1, 'Agriculture SmartFarming System', 'filter-app', 'Timeline Company', '2024-07-06', 'assets/img/projects/1.jpg', 'portfolio-details.php', 'Cloud-based Agricultural System', 'PHP . MySQL . Cloud'),
(2, 'Blog Platform', 'filter-product', 'Kelly Ovita', '2026-08-13', 'assets/img/projects/2.jpg', 'portfolio-details.php', 'React-based Content System', 'React Js . MySQL'),
(3, 'Agriculture SmartFarming System', 'filter-branding', 'Timeline Company', '2024-07-06', 'assets/img/projects/1.jpg', 'portfolio-details.php', 'Cloud-based Agricultural System', 'PHP . MySQL . Cloud'),
(4, 'Blog Platform', 'filter-books', 'Kelly Ovita', '2026-08-13', 'assets/img/projects/2.jpg', 'portfolio-details.php', 'React-based Content System', 'React Js . MySQL');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `img`, `name`, `title`, `company`) VALUES
(1, 'The Best solution engineer I have come across. His solution on cloud storage optimization has skyrocketed deliverability of my company to such astonishing levels.', 'assets/img/person/person-m-9.webp', 'Ski Cynthia', 'CEO', 'Huawei'),
(2, 'The Best solution engineer I have come across. His solution on cloud storage optimization has skyrocketed deliverability of my company to such astonishing levels.', 'assets/img/person/person-m-9.webp', 'Ski Cynthia', 'CEO', 'Huawei'),
(3, 'The Best solution engineer I have come across. His solution on cloud storage optimization has skyrocketed deliverability of my company to such astonishing levels.', 'assets/img/person/person-m-9.webp', 'Ski Cynthia', 'CEO', 'Huawei'),
(4, 'The Best solution engineer I have come across. His solution on cloud storage optimization has skyrocketed deliverability of my company to such astonishing levels.', 'assets/img/person/person-m-9.webp', 'Ski Cynthia', 'CEO', 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `url`, `icon`, `title`, `description`) VALUES
(1, 'software.php', 'bi bi-code-slash', 'Software Development', 'Custom, responsive, and visually striking designs that reflect your brand and engage your audience seamlessly across devices.'),
(2, 'mobile.php', 'bi bi-phone-fill', 'Web & Mobile Apps', 'Full-stack development using the latest technologies to build fast, secure, and scalable web applications tailored to your business needs.'),
(3, 'cloud.php', 'bi bi-cloud-fill', 'Cloud & DevOps', 'Intuitive user interfaces and engaging user experiences designed to increase satisfaction and drive conversions.'),
(4, 'security.php', 'bi bi-shield-lock', 'Cybersecurity', 'Full-stack development using the latest technologies to build fast, secure, and scalable web applications tailored to your business needs.'),
(5, 'consulting.php', 'bi bi-person-workspace', 'IT Consulting', 'Comprehensive online marketing strategies including SEO, social media, email campaigns, and paid advertising to grow your brand.'),
(6, 'iot.php', 'bi bi-cpu', 'IoT Solutions', 'Custom software development in multiple programming languages to build solutions that streamline operations and solve complex problems.');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `icon`, `title`, `color`) VALUES
(1, 'bi bi-filetype-js', 'JavaScript', '#ffbb2c;'),
(2, 'bi bi-filetype-php', 'PHP(Laravel)', '#777bb4'),
(3, 'bi bi-filetype-py', 'Python', '#3776ab'),
(4, 'bi bi-filetype-java', 'Java', '#ed8b00'),
(5, 'bi bi-database', 'MySQL', '#00758f'),
(6, 'bi bi-database-fill', 'PostgreSQL', '#336791'),
(7, 'bi bi-server', 'Oracle', '#f80000'),
(8, 'bi bi-diagram-3-fill', 'Kubernetes', '#326ce5'),
(9, 'bi bi-shield-lock-fill', 'Cybersecurity', '#16a34a'),
(10, 'bi bi-cloud-fill', 'Cloud Storage', '#0ea5e9'),
(11, 'bi bi-hdd-network-fill', 'Huawei Networks', '#cf0a2c'),
(12, 'bi bi-infinity', 'DevOps', '#7c3aed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `facebook` text NOT NULL,
  `x` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL,
  `linkedin` text NOT NULL,
  `github` text NOT NULL,
  `slogan` text NOT NULL,
  `birthday` date NOT NULL,
  `website` text NOT NULL,
  `phone` text NOT NULL,
  `city` text NOT NULL,
  `age` text NOT NULL,
  `degree` text NOT NULL,
  `freelance` int(11) NOT NULL,
  `certification` text NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `title`, `place`, `facebook`, `x`, `instagram`, `youtube`, `linkedin`, `github`, `slogan`, `birthday`, `website`, `phone`, `city`, `age`, `degree`, `freelance`, `certification`, `address`) VALUES
(1, 'Chisaka Fred', 'chisakafred', 'chisakafred@gmail.com', '1234', 'Software Engineer', 'Kenya', 'facebook', 'x', 'instagram', 'youtube', 'linkedin', 'github', 'Hello, I am Chisaka Fred, an experienced Software Engineer', '2001-07-31', 'https://techdive.com', '0796080271', 'Nairobi', '25', 'BSc. Software Engineering', 0, 'Huawei Cloud Storage', '982, Mumias, Kakamega County - Western Region, Kenya.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
