-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 12:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

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
('In human history, civilisations, cultures and groups are compelled to relate to one another on a constant and continuous basis. Yet mutual ignorance exacerbated by mutual suspicion and hostility inhibit them from establishing ties that endure and flourish. Sadly, communal violence has become the bane of humankind at the end of the twentieth century and the beginning of the twenty-first. It is the magnitude of violence among different groups in a situation where societies everywhere are becoming multi-cultural that underscores the importance of intercommunity, intercultural and intercivilisational dialogue. Dialogue and mutual understanding are the prerequisites for building just and equitable relations between cultures and civilisations. Intercultural communication and civilisational dialogue could help strengthen relationship and improve understanding regarding the fundamental principles and practices that distinguish the various communities. It is important to understand these civilisational differences just as it is important to take cognizance of the affinities that exist between civilisations - especially in the context of the globalisation process. It is only when both the similarities and the differences between civilisations are celebrated can a truly just, humane and compassionate world civilisation evolve. Similarly, as Asia undergoes rapid economic and social transformation, the thinking segments of societies are beginning to realise that growth and prosperity would be meaningless unless founded upon, and shaped by universal spiritual and moral values as those being taught by all beliefs that lie at the heart of great civilisations which were all conceived in the womb of Asia. Therefore, if Asia wants to remain true to its multi-religious and multi-cultural civilisational heritage, it should not hesitate to incorporate spiritual and moral values into its development process through intercivilisational dialogue.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_isbn` varchar(200) NOT NULL,
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

INSERT INTO `books` (`id`, `book_name`, `book_isbn`, `description`, `author`, `publisher`, `price`, `categoryId`, `book_image`, `book_file`, `create_date`) VALUES
(73, 'TestISBN', '0-8488-4900-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Dr. Phineas', 'test pub', '63.5', 6, 'http://localhost/PusatDialog-Ebookstore/uploads/image/witcher_3_anniversary_edited.jpg', 'https://drive.google.com/file/d/12xDKJu4Z5JLvjp_M5mHP2Q4N0ifOvuF_/view?usp=sharing', '2021-05-30 12:15:45'),
(74, 'Dummy', '0-4969-8098-X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Test auth', 'test pub', '63', 7, 'http://localhost/PusatDialog-Ebookstore/uploads/image/pszQdhR2.jpg', 'https://drive.google.com/file/d/1kxENbU3J_rUBgN0ZwatfMsdZ0M5vQzhz/view?usp=sharing', '2021-05-31 18:34:03');

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
(1, 'Computer Science', 'lauren ipsum', 'CS'),
(6, 'Literature', 'lauren ipsum', 'Literature'),
(7, 'Others', 'lauren ipsum', 'others'),
(8, 'Test', 'lauren ipsum', 'Test');

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
('Email: pdg@gmail.com\r\n\r\nPhone: +60112192121');

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
('This E-book shop is operated by Pusat Dialog for publishing their own content. No third part vendors are affiliated with this E-book store other than Pusat Dialog, University of Malaya.');

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
('http://localhost/PusatDialog-Ebookstore/uploads/image/pdialogori1.png');

-- --------------------------------------------------------

--
-- Table structure for table `membershiptransactions`
--

CREATE TABLE `membershiptransactions` (
  `memtranID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `months` int(11) NOT NULL,
  `subscriptionfee` int(11) NOT NULL,
  `paymentcheck` int(11) NOT NULL,
  `transactiondate` varchar(200) CHARACTER SET latin1 NOT NULL,
  `expiredate` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `txn_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('Pusat Dialog');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `bookId` int(11) NOT NULL,
  `bookname` varchar(200) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('Please read this end user licence agreement (EULA) carefully. It is a legal agreement between you as a consumer and user of eSentral site and Pusat Dialog, the operator of pdgum. It contains the terms for using this portal in purchasing ePublication displayed in the portal and your use of related eSentral applications or software, to read your purchased ePublication. You have `Agreed` to these terms once you registe an account with valid email and details.\r\n1. About you\r\nYou must be an end user customer only, and of a legal age to form a binding contract with Xentral Methods in the country in which you upload your order for ePublication. You must be a law abiding citizen and does not attempt any illegal activities in this portal (eSentral) or with the contents purchase or subscribe from it.\r\n2. Order and Activation of eReader\r\n1. To acquire an ePublication, you must first submit an order for the content in eSentral through the described method via valid payment gateway method via Webcash or Credit card.\r\n2. eSentral will process the order, and once payment is clear, the ePublication will be deposited into your personal library panel.\r\n3. eSentral will also send you an activation key to use when you wish to reactivate the ePublication on your device.\r\n4. Occasionally, technical problems may delay or prevent your activation of an ePublication. In that case if you cannot activate the ePublication within a reasonable time, your sole remedy in relation to that ePublication is, to get in contact with eSentral administration.\r\n5. eSentral reserves the right to change, suspend, remove or disable access to an ePublication or the library panel at any time without notice and, to the extent permitted by applicable law, without liability to you or any third party.\r\n6. eSentral will use the details provided by you to send you a receipt for the ePublication and give you technical support (if required), by email.\r\n3. Your use of the ePublication acquired through eSentral\r\nYou may only:\r\n\r\n1. Activate any ePublication purchased through the portal on five (5) devices. The activation key provided by eSentral enables you to reactivate the ePublication on your device if it is lost, damaged or destroyed or if you upgrade your device so long as it is not more than five (5) times. You must not make any ePublication acquired from eSentral available over a network where it could be used by multiple devices or multiple computers at the same time.\r\n2. Use the ePublication for personal, non-commercial use. You must not, except to the extent permitted by applicable law, resell, redistribute, transfer, assign, sub-licence, modify, adapt or create derivative works of, any of the ePublication that you activate.\r\n4. Prices and taxes\r\nThe portal (eSentral) may change the prices of ePublication at any time. eSentral will charge you the price for an ePublication that you order under this EULA that is current at the date and time of your order. The price of the ePublication is bounded by local law includes goods and services taxes such as value added tax and other applicable taxes or payment gateway charges. If the applicable rate of these taxes changes before you purchase an ePublication, the new tax rate in effect at the time of activation applies.\r\nAll purchase of ebook(s) or digital content from e-sentral.com is non-refundable.\r\n5. Ownership\r\n1. You acknowledge that you do not own any copyright in the ePublication, or any other intellectual or other property in or related to the ePublication (or any of the other eSentral Services). You only have the right to activate and use the ePublication on a non-exclusive basis according to this EULA, and you agree that any other use of the ePublication and other materials in the other eSentral Services may constitute a copyright or other intellectual property infringement.\r\n2. You must inform eSentral of any unauthorised use of an ePublication and of any other infringement of eSentral`s or any other person`s intellectual property in relation to a ePublication that you become aware of, as soon as practicable.\r\n3. Xentral Methods through eSentral is authorised to license you the ePublicaton under this EULA by the publishers of the Titles or content aggregators as agent of distribution for the publisher or content aggregators.\r\n6. Content\r\neSentral has no editorial or other control over the content of the ePublication. You understand that, by accessing or activating an ePublication, you may encounter content that may be offensive, indecent or objectionable, whether because of language, nudity, violence or for other reasons.\r\n7. Security and copyright notices\r\n1. You acknowledge that the ePublication may contain digital rights management information and technological protection and other security measures. Except to the extent permitted by law, you must not, and must not encourage or assist anyone else to, violate or attempt to violate any security components of or related to the ePublication, whether by reverse-engineering, decompiling, disassembling, circumventing, modifying, interfering with, removing or altering, this information or these measures, or in any other way.\r\n2. You must not remove, obliterate or cancel from view any copyright, trade mark or other proprietary notice, mark or legend appearing on any ePublication and you must ensure that these notices appear on any backup copy of an ePublication that you make.\r\n8. Your responsibilities\r\nYou:\r\n\r\n1. Are responsible for any system requirements and fees that are necessary for you to order and activate ePublication.\r\n2. Must comply with all applicable laws relating to your order and activation of the ePublication.\r\n3. Agree to give eSentral accurate, current and complete information that is required for you to order and activate ePublication.\r\n9. Privacy\r\n1. In order to order and activate ePublication and use esentral Services, you may be required to provide information about yourself. eSentral is committed to protecting your privacy. All data with regards to your accounts and payment details are kept confidential by eSentral.\r\n2. You agree that eSentral may collect and use technical data and related information, including but not limited to technical information about your device, system and application software and peripherals, that is gathered periodically to facilitate the provision of ePublication to you, and related services. eSentral may use this information, as long as it is in a form that does not personally identify you, to improve its products or to provide services to you, and without liability to you, disclose any information about you to law enforcement authorities, government officials, a third party or any of them, as eSentral believes is reasonably necessary or appropriate to enforce or verify compliance with this EULA.\r\n10. eSentral`s exclusions and limitations of liability\r\n1. To the extent permitted by applicable law, titles are available on an &amp;quot;as is&amp;quot; and &amp;quot;as available&amp;quot; basis, and, except as expressly set out in this eula, esentral disclaims all warranties, representations, terms and conditions concerning the subject-matter of this eula, including but not limited to:\r\n\r\n1. Implied warranties of merchantability, fitness for a particular purpose.\r\n2. Representations and warranties that your use of the esentral services will be uninterrupted, or error free, or free from any security intrusion.\r\n2. To the extent permitted by applicable law, and except as expressly stated in this eula you expressly understand and agree that neither esentral nor its affiliates or licensors, nor any of their officers, employees, agents or contractors, is liable to you in connection with your orders and activation of epublications and other uses of the other esentral services for any direct, indirect, incidental, special, consequential, punitive or exemplary damages, including, but not limited to:\r\n\r\n1. For content that may be found offensive, indecent or objectionable.\r\n2. Any loss or damage that may be incurred by you as a result of esentral including hyperlinks to other web sites or other content on its websites, including any reliance placed by you on the completeness, accuracy or existence of any these hyperlinks or content.\r\n3. Damages for loss of profits, goodwill, data or other intangible losses, however caused, and whether arising under contract, tort (including but not limited to negligence) or otherwise, even if any of them have been advised of the possibility of these losses.\r\n3. Nothing in this eula excludes or limits esentral`s warranties or liability that may not lawfully be excluded or limited. without limiting this, consumers in malaysia and some other countries, may have the benefit of certain rights and remedies by reason of the trade practices act and similar state and territory laws, and other legislation, in respect of which liability may not be lawfully modified or excluded. if you purchase a title in malaysia and if esentral breaches an implied condition or warranty that cannot lawfully be modified or excluded by this eula then, to the extent permitted by law, esentral`s liability is limited, at esentral`s option to the resupply of the services or the cost of having the services resupplied.\r\n11. Changing this EULA\r\neSentral may change the terms of this EULA from time to time. If eSentral does this, it will post the revised terms on the portal. You agree that if you order and activate an ePublication after ePublication, has changed these terms, you are bound by the changed EULA.\r\n12. Terminating this EULA\r\neSentral may, at its option, terminate this EULA and all licences granted under it, or stop or limit access to the eSentral`s Services (or any of these things) if you fail, or eSentral suspects you have failed, to comply with any of your obligations under this EULA, or if eSentral is required to do so by applicable law. In that case, but without limitation, you are still liable for all amounts due to eSentral under this EULA to the date of termination.\r\n13. Cancelling the portal services\r\nThe portal may cancel eSentral Services at any time, without notice.');

-- --------------------------------------------------------

--
-- Table structure for table `userorderviewonly`
--

CREATE TABLE `userorderviewonly` (
  `id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `book_Id` int(11) NOT NULL,
  `book_isbn` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_author` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_price` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `book_file` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `membershipstatus` varchar(200) NOT NULL DEFAULT 'normal',
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `type`, `membershipstatus`, `createdate`) VALUES
(7, 'Main Admin', '+8801791029323', 'admin@gmail.com', '$2y$12$UIeiAEgVSmGN83b1l3PYpe8dauukuWNCLR5TplbU92yPKDJ4QaYHe', 'A', 'normal', '2020-04-21 10:54:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membershiptransactions`
--
ALTER TABLE `membershiptransactions`
  ADD PRIMARY KEY (`memtranID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membershiptransactions`
--
ALTER TABLE `membershiptransactions`
  MODIFY `memtranID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userorderviewonly`
--
ALTER TABLE `userorderviewonly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
