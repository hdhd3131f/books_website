-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 05:13 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Author` varchar(30) NOT NULL,
  `Catid` int(11) NOT NULL,
  `Cover` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `Title`, `Description`, `Author`, `Catid`, `Cover`, `file`) VALUES
(1, 'The secret garden', ' The novel centres on Mary Len', 'Mohammadsaadi', 1, 'Images/Hadeaa.jpg', 'Books/Hadeaa.pdf'),
(2, 'كبرياء وهوى', 'ألكبرياء هو الروح', 'BaraaMarchoud', 2, 'Images/kebryaa.jpg', 'books/Kebryaa.pdf'),
(3, 'Blood Lust', 'JavaScript is JavaScript', 'MohammadElsaadi', 1, 'Images/blood.jpg', 'books/blood.pdf'),
(4, 'The History of the Universe in', 'JQuery is JQuery', 'MohammadNejim', 1, 'Images/Universe.jpg', 'books/Universe.pdf'),
(5, 'Swansea to Paddington', 'SASS is SASS', 'AhmadBarakeh', 2, 'Images/swansea.jpg', 'books/swansea.pdf'),
(6, 'World word', '100 world word', 'zahed', 2, 'Images/world.jpg', 'Books/world.pdf'),
(8, 'precious', 'precious', 'hadi', 1, 'Images/precious.jpg', 'Books/precious.pdf'),
(20, 'Toxic', 'Toxic relation is dangerous', 'fadi', 4, 'Images/toxic.jpg', 'Books/toxic.pdf'),
(66, 'Austin', 'Austin is jsar', 'hadi', 2, 'Images/Austin.jpg', 'Books/Austin.pdf'),
(100, 'Pony', 'pony is not pony and you know', 'khalid', 4, 'Images/pony.jpg', 'Books/boko.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `Description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Description`) VALUES
(1, 'Adventure'),
(2, 'Action'),
(3, 'love'),
(4, 'comedian');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `uid` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liked_books`
--

CREATE TABLE `liked_books` (
  `booksID` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `Likedbooks` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `id`, `Email`, `gender`, `Likedbooks`, `profile`) VALUES
('hadi', '$2y$10$SMkcvg7I/32Rw12mJPYDsORyGghH2tvYfbduSt.AE9bvI6BHGJeXC', 1, 3, 'hadifayez@gmail.com', 'on', 0, 'Images/tajrobe.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Catid` (`Catid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `liked_books`
--
ALTER TABLE `liked_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booksID` (`booksID`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `liked_books`
--
ALTER TABLE `liked_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`Catid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liked_books`
--
ALTER TABLE `liked_books`
  ADD CONSTRAINT `liked_books_ibfk_1` FOREIGN KEY (`booksID`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liked_books_ibfk_2` FOREIGN KEY (`Uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
