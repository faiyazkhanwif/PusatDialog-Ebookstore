-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 12:21 PM
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
(54, 'Test 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'LP', 'lspo', '54', 5, 'http://localhost/PusatDialog-Ebookstore/uploads/image/big-o-cheat-sheet-poster.png', 'http://localhost/PusatDialog-Ebookstore/uploads/file/sample1.pdf', '2021-03-28 02:50:54');

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
(4, 'EEE', 'All the books from Electrical and Electronics Engineering Department.', 'EEE'),
(5, 'BBA', 'All the books from business administration.', 'BBA'),
(6, 'Literature', 'All the novels, drama, poems, story books, and any other books of literature.', 'Literature'),
(7, 'Others', 'Other types of books, except these category.', 'others');

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
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logoimg` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logoimg`) VALUES
('http://localhost/PusatDialog-Ebookstore/uploads/image/uglnjxmw40941.png');

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
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 = accept | 0 = pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'From New York Times bestselling author Catherine Bybee comes a new First Wives novel about wanting a family…and finding love. Shannon Wentworth’s biological clock is ticking, and she isn’t going to let her single status keep her from having a baby.', 27, 1, '2019-03-28 19:31:34'),
(19, 'This book serves as guide to prepare for interviews, exams, and campus work. In short, this book offers solutions to various complex data structures and algorithmic problems', 31, 1, '2019-03-28 19:32:06'),
(20, 'After a simple introduction to discrete math, it presents common algorithms and data structures. It also outlines the principles that make computers and programming languages work.', 29, 1, '2019-03-28 19:32:26'),
(21, 'The key to exercising regularly, losing weight, being more productive, and achieving success is understanding how habits work. As Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.', 32, 1, '2019-03-28 19:32:54'),
(22, 'In The Power of Habit, award-winning business reporter Charles Duhigg takes us to the thrilling edge of scientific discoveries that explain why habits exist and how they can be changed.', 32, 1, '2019-03-28 19:33:17'),
(23, 'Distilling vast amounts of information into engrossing narratives that take us from the boardrooms of Procter &amp;amp;amp; Gamble to the sidelines of the NFL to the front lines of the civil rights movement!', 32, 19, '2019-03-28 19:35:04'),
(24, 'They strike a deal: wait three months, cool off, and see if their tropical beach attraction is worth taking up when they go back home. Unfortunately, that’s just enough time for the past to come calling. All their best-laid plans are at risk. So is the last thing Shannon expected to matter the most: her heart.', 27, 19, '2019-03-28 19:35:34'),
(25, 'Data Structures and Algorithmic Puzzles is a solution bank for various complex problems related to data structures and algorithms.', 31, 19, '2019-03-28 19:36:14'),
(26, 'The key to exercising regularly, losing weight, being more productive, and achieving success is understanding how habits work. As Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.', 32, 7, '2019-03-28 19:37:33'),
(28, 'The key to exercising regularly, losing weight, being more productive, and achieving success is understanding how habits work. As Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.', 29, 7, '2019-03-28 19:38:11'),
(29, 'A data structure is a specialized format for organizing and storing data. General data structure types include the array, the file, the record, the table, the tree, and so on. Any data structure is designed to organize data to suit a specific purpose so that it can be accessed and worked with in appropriate ways.', 31, 7, '2019-03-28 19:39:41'),
(30, 'Etty and Dorothy survived the orphanage with the help of one another and neither sister can forget the awful betrayal of their mother, which has haunted them their whole lives. But when a shocking secret about their painful childhood comes to light, will the sisters ever be the same again?', 28, 7, '2019-03-28 19:40:49'),
(31, 'The Wall blends the most compelling issues of our time?rising waters, rising fear, rising political division?into a suspenseful story of love, trust, and survival.', 38, 7, '2019-03-29 06:18:24'),
(40, ' The Wall blends the most compelling issues of our time?rising waters, rising fear, rising political division?into a suspenseful story of love, trust, and survival.\r\n', 39, 7, '2019-03-29 11:19:18'),
(41, ' A dark part of him wonders whether it would be interesting if something did happen, if they came, if he had to fight for his life…', 39, 1, '2019-03-29 11:20:06'),
(42, 'This book is very useful for beginners, who want to be a successful programmer.', 30, 1, '2019-03-29 17:03:53'),
(43, 'You CAN learn to program professionally. The path is there. Will you take it?', 30, 21, '2019-03-30 18:23:19'),
(44, 'This book is awesome.', 39, 1, '2019-04-11 04:33:21'),
(45, 'A dark part of him wonders whether it would be interesting if something did happen, if they came, if he had to fight for his life…', 39, 1, '2019-04-15 04:44:11'),
(46, 'Victor Brooks never could have imagined that he’d be on a honeymoon for one. Only here he is, taking a hard look at his life after the younger women he thought he loved walked out. The woman who volunteers to help him reflect is the last person he expects to be attracted to.!', 27, 1, '2019-04-15 05:05:12'),
(47, 'In The Power of Habit, award-winning business reporter Charles Duhigg takes us to the thrilling edge of scientific discoveries that explain why habits exist and how they can be changed. Distilling vast amounts of information into engrossing narratives that take us from the boardrooms of Procter &amp;amp;amp;amp; Gamble to the sidelines of the NFL to the front lines of the civil rights movement, Duhigg presents a whole new understanding of human nature and its potential. At its core, The Power of Habit contains an exhilarating argument: The key to exercising regularly, losing weight, being more productive, and achieving success is understanding how habits work. As Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.', 32, 1, '2019-04-16 07:47:33'),
(48, 'PHP stands for Hypertext Preprocessor (no, the acronym doesn\'t follow the name). It\'s an open source, server-side, scripting language used for the development of web applications. By scripting language, we mean a program that is script-based (lines of code) written for the automation of tasks', 15, 1, '2019-04-21 07:05:41');

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
(7, 'Admin', '01683302276', 'admin@gmail.com', '$2y$12$9Xf9K.OHo9RPWuWZ8SEPTeSLRZH7ephme4oeZIQIG0TWi4K0.Q60K', 'A', '2019-04-21 10:54:26'),
(24, 'Faiyaz Khan', '+601156432430', 'faiyazkhanwif@gmail.com', '$2y$12$JTAoXM9ll0edrYgS.V1pw.2w2mp/rYSjM/r7zpM6XQum.arjUdOhO', 'U', '2021-03-09 20:11:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
