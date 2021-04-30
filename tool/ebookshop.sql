-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 03:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutdb`
--

CREATE TABLE `aboutdb` (
  `aboutdsc` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutdb`
--

INSERT INTO `aboutdb` (`aboutdsc`) VALUES
('Hey Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `book_image` varchar(200) NOT NULL,
  `book_file` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `description`, `author`, `publisher`, `price`, `categoryId`, `book_image`, `book_file`, `create_date`) VALUES
(64, 'Life for dummies', 'Born and raised in the Bay Area, Lauren found her passion for executive search early in her career and quickly rose to the top. Lauren&amp;amp;#039;s combination of vetting EQ and IQ has allowed her to assemble cohesive, diverse executive teams across all stages and functions', 'Jack Barret', 'Jack Barret Publication', '70', 6, 'http://localhost/PusatDialog-Ebookstore/uploads/image/587508.png', 'https://drive.google.com/file/d/1ZS6lmAeBPEj2yw7rxaQocyUZGQwKJvkK/view?usp=sharing', '2021-04-17 17:19:12'),
(66, 'Big O notation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Test auth', 'Test auth', '53', 1, 'http://localhost/PusatDialog-Ebookstore/uploads/image/big-o-cheat-sheet-poster.png', 'https://drive.google.com/file/d/1qwxwVF_J8BmYJYj-rqtCdZEMuq7BaV6n/view?usp=sharing', '2021-04-18 15:13:46'),
(67, 'All about Civil Engineering', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Nora Barret', 'Nora Barret Publication', '33', 2, 'http://localhost/PusatDialog-Ebookstore/uploads/image/Screenshot_132.jpg', 'https://drive.google.com/file/d/1fLI284Qvwga5DT2uR48FcxvY75y4MG4h/view?usp=sharing', '2021-04-18 15:15:55'),
(68, 'Confidential kings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Jack Barret', 'Jack Barret Publication', '95', 7, 'http://localhost/PusatDialog-Ebookstore/uploads/image/Screenshot_1141.jpg', 'https://drive.google.com/file/d/13LCudD7rG0KdJ_-MVBwIv-2OGTZ6GMl8/view?usp=sharing', '2021-04-18 15:17:29'),
(69, 'PHP made simple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Test auth', 'Test auth', '53', 1, 'http://localhost/PusatDialog-Ebookstore/uploads/image/book1.jpg', 'https://drive.google.com/file/d/1SnEfJsG4b4I0yuKdhECNOZsTgjgtY-ME/view?usp=sharing', '2021-04-18 15:25:27'),
(70, 'All about Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Jimmy Johnson', 'Jimmy Publication', '85', 1, 'http://localhost/PusatDialog-Ebookstore/uploads/image/book2.jpg', 'https://drive.google.com/file/d/1Em7wJ9erJihxEsRLN-Quk_F-rAotrroD/view?usp=sharing', '2021-04-18 15:27:57'),
(71, 'Operating Systems', 'I love operating systems. I love operating systems.I love operating systems.I love operating systems.I love operating systems.I love operating systems.I love operating systems.I love operating systems.I love operating systems.I love operating systems.', 'Test 2', 'Test pub', '87', 1, 'http://localhost/PusatDialog-Ebookstore/uploads/image/book3.jpg', 'https://drive.google.com/file/d/1wBVXyKqYLJLUFyrdfOzVhcS_dYfaWVSv/view?usp=sharing', '2021-04-21 18:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `booksborrow`
--

CREATE TABLE `booksborrow` (
  `id` int(11) NOT NULL,
  `book_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `author` varchar(200) CHARACTER SET latin1 NOT NULL,
  `publisher` varchar(200) CHARACTER SET latin1 NOT NULL,
  `price` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `book_image` varchar(200) NOT NULL,
  `book_file` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `description`, `tag`) VALUES
(1, 'Computer Science and Engineering', 'All the books from computer science and software engineering, and programming related books.', 'CSE'),
(2, 'Civil Engineering', 'All the books from Civil Engineering and environmental science department', 'CE'),
(3, 'Mechanical engineering', 'All the books from Mechanical engineering.', 'ME'),
(5, 'BBA', 'All the books from business administration.', 'BBA'),
(6, 'Literature', 'All the novels, drama, poems, story books, and any other books of literature.', 'Literature'),
(7, 'Others', 'Other types of books, except these category.', 'others');

-- --------------------------------------------------------

--
-- Table structure for table `contactdb`
--

CREATE TABLE `contactdb` (
  `contactdsc` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactdb`
--

INSERT INTO `contactdb` (`contactdsc`) VALUES
('heyBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruhBruh');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `ebook_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `book_file` varchar(500) NOT NULL,
  `book_image` varchar(500) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `ebook_name`, `description`, `author`, `book_file`, `book_image`, `categoryId`, `dateTime`) VALUES
(1, 'Concept of programming languages', 'This book describes the fundamental concepts of programming languages by \r\ndiscussing the design issues of the various language constructs, examining the \r\ndesign choices for these constructs in some of the most common languages, \r\nand critically comparing design alternatives.\r\nAny serious study of programming languages requires an examination of \r\nsome related topics, among which are formal methods of describing the syntax \r\nand semantics of programming languages, which are covered in Chapter 3.\r\n\r\nAlso, implementation techniques for various language constructs must be considered: Lexical and syntax analysis are discussed in Chapter 4, and implementation of subprogram linkage is covered in Chapter 10. Implementation of \r\n\r\nsome other language constructs is discussed in various other parts of the book. The following paragraphs outline the contents of the tenth edition', 'Robart W Sebesta', 'http://localhost/PusatDialog-Ebookstore/uploads/file/0152_T_Sebesta_programming.pdf', '', 1, '2019-04-12 14:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `footerdb`
--

CREATE TABLE `footerdb` (
  `footerdsc` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footerdb`
--

INSERT INTO `footerdb` (`footerdsc`) VALUES
('This E-book shop is operated by Pusat Dialog for publishing their own content. No third part vendors are affliated with this e-book store other than haha linus, University of Malaya.');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logoimg` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logoimg`) VALUES
('http://localhost/PusatDialog-Ebookstore/uploads/image/pdialogsmall1.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `paymentcheck` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bookId` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = accept | 0 = pending',
  `txn_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `total_price`, `paymentcheck`, `dateTime`, `bookId`, `status`, `txn_id`, `payment_status`) VALUES
(29, 24, '70', 1, '2021-04-17 17:21:29', '64', '0', '', ''),
(30, 25, '95', 1, '2021-04-18 15:43:12', '68', '0', '', ''),
(31, 25, '138', 1, '2021-04-18 15:49:42', '70, 69', '0', '', ''),
(32, 24, '87', 1, '2021-04-21 18:08:25', '71', '0', '', ''),
(33, 24, '138', 1, '2021-04-29 23:14:26', '70, 66', '0', '', ''),
(34, 25, '70', 1, '2021-04-30 00:21:28', '64', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orgnamedb`
--

CREATE TABLE `orgnamedb` (
  `orgname` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orgnamedb`
--

INSERT INTO `orgnamedb` (`orgname`) VALUES
('Dead Web');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `bookId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `bookId`, `userId`, `dateTime`) VALUES
(50, 'It\'s a great book!', 64, 24, '2021-04-29 23:21:59'),
(51, 'One of the best books for learning java. Highly recommended!', 70, 25, '2021-04-30 00:20:40'),
(52, 'Amazing thriller. Must buy!', 64, 25, '2021-04-30 00:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `termsdb`
--

CREATE TABLE `termsdb` (
  `termsdsc` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `termsdb`
--

INSERT INTO `termsdb` (`termsdsc`) VALUES
('hihihgeaiuhfg ieau faeiu haeibf aiuefaeibf alikf baefb akefbaeif gaegoisjpgheirg oews gsunjg;os ergsrdgvsdlvnsoigeo9rhg sb glsobgisurgvrogn bhsro;ugbdzkfj vsod;gn oer');

-- --------------------------------------------------------

--
-- Table structure for table `userorderviewonly`
--

CREATE TABLE `userorderviewonly` (
  `id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `book_Id` int(11) NOT NULL,
  `book_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_author` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_price` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_file` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorderviewonly`
--

INSERT INTO `userorderviewonly` (`id`, `user_Id`, `book_Id`, `book_name`, `book_author`, `book_price`, `book_image`, `book_file`) VALUES
(16, 24, 64, 'Life for dummies', 'Jack Barret', '70', 'http://localhost/PusatDialog-Ebookstore/uploads/image/587508.png', 'https://drive.google.com/file/d/1ZS6lmAeBPEj2yw7rxaQocyUZGQwKJvkK/view?usp=sharing'),
(17, 25, 68, 'Confidential kings', 'Jack Barret', '95', 'http://localhost/PusatDialog-Ebookstore/uploads/image/Screenshot_1141.jpg', 'https://drive.google.com/file/d/13LCudD7rG0KdJ_-MVBwIv-2OGTZ6GMl8/view?usp=sharing'),
(18, 25, 70, 'All about Java', 'Jimmy Johnson', '85', 'http://localhost/PusatDialog-Ebookstore/uploads/image/book2.jpg', 'https://drive.google.com/file/d/1Em7wJ9erJihxEsRLN-Quk_F-rAotrroD/view?usp=sharing'),
(19, 25, 69, 'PHP made simple', 'Test auth', '53', 'http://localhost/PusatDialog-Ebookstore/uploads/image/book1.jpg', 'https://drive.google.com/file/d/1SnEfJsG4b4I0yuKdhECNOZsTgjgtY-ME/view?usp=sharing'),
(20, 24, 71, 'Operating Systems', 'Test 2', '87', 'http://localhost/PusatDialog-Ebookstore/uploads/image/book3.jpg', 'https://drive.google.com/file/d/1wBVXyKqYLJLUFyrdfOzVhcS_dYfaWVSv/view?usp=sharing'),
(21, 24, 70, 'All about Java', 'Jimmy Johnson', '85', 'http://localhost/PusatDialog-Ebookstore/uploads/image/book2.jpg', 'https://drive.google.com/file/d/1Em7wJ9erJihxEsRLN-Quk_F-rAotrroD/view?usp=sharing'),
(22, 24, 66, 'Big O notation', 'Test auth', '53', 'http://localhost/PusatDialog-Ebookstore/uploads/image/big-o-cheat-sheet-poster.png', 'https://drive.google.com/file/d/1qwxwVF_J8BmYJYj-rqtCdZEMuq7BaV6n/view?usp=sharing'),
(23, 25, 64, 'Life for dummies', 'Jack Barret', '70', 'http://localhost/PusatDialog-Ebookstore/uploads/image/587508.png', 'https://drive.google.com/file/d/1ZS6lmAeBPEj2yw7rxaQocyUZGQwKJvkK/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'U',
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `type`, `createdate`) VALUES
(7, 'Admin', '+8801791029323', 'admin@gmail.com', '$2y$12$aLcimDnFdlf87UWrIvn5K.QkDq3oDiyCeyFF84OpkvXKYXkNC7/UK', 'A', '2019-04-21 10:54:26'),
(24, 'Faiyaz Khan', '+601156432430', 'faiyazkhanwif@gmail.com', '$2y$12$j/dWxmKSP6BmYPxOLPekX.QX1rR5HBuuSJST5GyI4C80Z/IfNKC.2', 'U', '2021-03-09 20:11:53'),
(25, 'usertest', '93861937419', 'user@gmail.com', '$2y$12$1C4.50mOMcKWdU.s6s6VF.xfLWo1HmbMjsuYENtAhTWaZRCxodnma', 'U', '2021-04-18 15:32:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booksborrow`
--
ALTER TABLE `booksborrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userorderviewonly`
--
ALTER TABLE `userorderviewonly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `userorderviewonly`
--
ALTER TABLE `userorderviewonly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
