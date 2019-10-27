-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 10:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiu_student_communication_medium`
--

-- --------------------------------------------------------

--
-- Table structure for table `belongs_to`
--

CREATE TABLE `belongs_to` (
  `courseId` varchar(20) DEFAULT NULL,
  `bookName` varchar(255) DEFAULT NULL,
  `edition` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belongs_to`
--

INSERT INTO `belongs_to` (`courseId`, `bookName`, `edition`) VALUES
('CSE 225', 'A', '7th'),
('CSI 217', 'B', '6th'),
('CSI 218', 'B', '6th'),
('BUS 1102', 'C', '5th');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookName` varchar(255) NOT NULL,
  `edition` varchar(15) NOT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `uploadDate` datetime DEFAULT NULL,
  `studentId` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookName`, `edition`, `pdf`, `uploadDate`, `studentId`) VALUES
('A', '7th', NULL, '2017-12-13 00:00:00', '011152022'),
('B', '6th', NULL, '2017-12-20 00:00:00', '011152010'),
('C', '5th', NULL, '2017-12-20 00:00:00', '011152014');

-- --------------------------------------------------------

--
-- Table structure for table `book_writer_name`
--

CREATE TABLE `book_writer_name` (
  `writerName` varchar(100) NOT NULL,
  `bookName` varchar(255) DEFAULT NULL,
  `edition` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_writer_name`
--

INSERT INTO `book_writer_name` (`writerName`, `bookName`, `edition`) VALUES
('alpha', 'A', '7th'),
('Alpha2', 'A', '7th'),
('Bita', 'B', '6th'),
('sigma', 'C', '7th');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagoryId` int(11) NOT NULL,
  `catagoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagoryId`, `catagoryName`) VALUES
(1, 'Algorithm'),
(2, 'project'),
(3, 'thesis'),
(4, 'java'),
(5, 'c/c++'),
(6, 'php'),
(7, 'mysql'),
(8, 'python'),
(9, 'circuit'),
(10, 'others'),
(11, 'java script'),
(12, 'HTML'),
(13, 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL,
  `studentId` varchar(11) DEFAULT NULL,
  `postId` varchar(55) DEFAULT NULL,
  `dateAndtime` datetime DEFAULT NULL,
  `description` text,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `studentId`, `postId`, `dateAndtime`, `description`, `picture`) VALUES
(16, '011152010', '22-12-171513936294M6723%19041r37', '2017-12-22 15:57:24', 'How to learn javascript??', NULL),
(17, '011152018', '22-12-171513936675I6548+9528u43', '2017-12-22 16:02:15', 'you have to learn it by tourself', NULL),
(18, '011152018', '22-12-171513936675I6548+9528u43', '2017-12-22 16:02:16', 'you have to learn it by tourself', NULL),
(19, '011152022', '22-12-171513936882J7598v23738v118', '2017-12-22 16:06:35', 'php is a fantstic language', NULL),
(20, '011152022', '22-12-171513936675I6548+9528u43', '2017-12-22 16:07:40', 'By whome???\r\n', NULL),
(23, '011152022', '22-12-171513959337P7255,3441a44', '2017-12-22 22:24:14', 'yes', NULL),
(24, '011152018', '22-12-171513948006C4513w6648n119', '2017-12-24 03:36:08', '', 'upload/postComment/5a3ecc48e276f.jpg'),
(27, '011152018', '22-12-171513958695J3097K9895f75', '2017-12-25 12:28:56', 'hello world', 'upload/postComment/5a409aa88bcca.jpg'),
(29, '011152018', '22-12-171513936675I6548+9528u43', '2017-12-25 12:40:13', '', 'upload/postComment/5a409d4deb18c.jpg'),
(32, '011152018', '23-12-171514064608V7715*30375d42', '2017-12-25 21:24:53', 'osoijjo lage eta dekhle\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `completed_course`
--

CREATE TABLE `completed_course` (
  `studentId` varchar(11) NOT NULL,
  `courseId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completed_course`
--

INSERT INTO `completed_course` (`studentId`, `courseId`) VALUES
('011152018', 'CSE 225'),
('011152018', 'CSE 226'),
('011152018', 'CSI 121'),
('011152018', 'CSI 122'),
('011152022', 'BUS 1102'),
('011152018', 'CSI 217'),
('011152018', 'CSI 218'),
('011152018', 'CSI 217'),
('011152018', 'CSI 218'),
('011152010', 'CSE 225'),
('011152010', 'CSE 226'),
('011152010', 'PHY 105'),
('011152010', 'PHY 106'),
('011152010', 'CSI 121'),
('011152010', 'CSI 122'),
('011152010', 'CSI 217'),
('011152010', 'CSI 218'),
('011152010', 'ENG 005'),
('011152018', 'MATH 183'),
('011152018', 'PHY 106'),
('011152018', 'PHY 105'),
('011152018', 'ENG 101');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` varchar(55) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL,
  `deptName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `credit`, `deptName`) VALUES
('ACT 111', 'Financial and Managerial Accounting', 3, 'EEE'),
('BUS 1102', 'Introduction to Business', 3, 'BBA'),
('BUS 2112', 'Business Communications', 3, 'BBA'),
('CSE 225', 'Digital Logic Design', 3, 'CSE'),
('CSE 226', 'Digital Logic Design Lab', 1, 'CSE'),
('CSI 121', 'Structured Programming Language', 3, 'CSE'),
('CSI 122', 'Structured Programming Language Lab', 1, 'CSE'),
('CSI 124', 'Advanced Programming Lab', 1, 'CSE'),
('CSI 217', 'Data Structure', 3, 'CSE'),
('CSI 218', 'Data Structure Lab', 1, 'CSE'),
('CSI 219', 'Discrete Mathematics', 3, 'CSE'),
('ECN 2111', 'Microeconomics', 3, 'BBA'),
('ECN 2214', 'Macroeconomics', 3, 'BBA'),
('EEE 101', 'Electrical Circuits I', 3, 'EEE'),
('EEE 103', 'Electrical Circuits II', 3, 'EEE'),
('EEE 104', 'Electrical Circuits Lab', 1, 'EEE'),
('ENG 002', 'Pre-English', 3, 'ETE'),
('ENG 005', 'Spoken English', 3, 'CSE'),
('ENG 005', 'Spoken English', 3, 'EEE'),
('ENG 101', 'English I', 3, 'CSE'),
('ENG 101', 'English I', 3, 'EEE'),
('ENG 101', 'English I', 3, 'ETE'),
('ENG 103', 'English II', 3, 'EEE'),
('MATH 003', 'Elementary Calculus', 3, 'EEE'),
('MATH 003', 'Elementary Calculus', 3, 'ETE'),
('MATH 151', 'Differential and Integral Calculus', 3, 'EEE'),
('MATH 155', 'Ordinary and Partial Differential Equations', 3, 'EEE'),
('MATH 183', 'Linear Algebra, Ordinary and partial Differential Equations', 3, 'CSE'),
('PHY 101', 'Physics I', 3, 'EEE'),
('PHY 101', 'Physics I', 3, 'ETE'),
('PHY 103', 'Physics II', 3, 'EEE'),
('PHY 104', 'Physics Lab', 1, 'EEE'),
('PHY 105', 'Physics', 3, 'CSE'),
('PHY 106', 'Physics Lab', 1, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptName`) VALUES
('BBA'),
('CSE'),
('EEE'),
('ETE');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL,
  `messageDescription` text,
  `image` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `senderStudentId` varchar(11) DEFAULT NULL,
  `receiverStudentId` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageId`, `messageDescription`, `image`, `time`, `senderStudentId`, `receiverStudentId`) VALUES
(8, 'good morning!!!!!', NULL, '2017-12-27 06:15:32', '011152018', '011152022'),
(9, 'hmm....good morning.', NULL, '2017-12-27 06:16:11', '011152022', '011152018'),
(10, 'ki koro tumi eto shokale???', NULL, '2017-12-27 06:16:38', '011152022', '011152018'),
(11, 'ganja khai.....charos ganja..khaba?????????', NULL, '2017-12-27 06:17:18', '011152018', '011152022'),
(12, 'a tumieka khao.', NULL, '2017-12-27 06:18:06', '011152022', '011152018'),
(13, 'ganja khai.....charos ganja..khaba?????????', NULL, '2017-12-27 06:27:18', '011152018', '011152022'),
(14, 'ganja khai.....charos ganja..khaba?????????', NULL, '2017-12-27 06:29:12', '011152018', '011152022'),
(15, 'madam valo asen to???', NULL, '2017-12-27 11:45:32', '011152018', '011152090');

-- --------------------------------------------------------

--
-- Table structure for table `on_going_course`
--

CREATE TABLE `on_going_course` (
  `studentId` char(11) NOT NULL,
  `courseId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_going_course`
--

INSERT INTO `on_going_course` (`studentId`, `courseId`) VALUES
('011152018', 'CSE 225'),
('011152018', 'CSE 226'),
('011152018', 'CSI 124'),
('011152018', 'CSI 217'),
('011152018', 'CSI 218'),
('011152010', 'CSE 225');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` varchar(55) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `studentId` varchar(11) DEFAULT NULL,
  `courseId` varchar(20) DEFAULT NULL,
  `postTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `description`, `studentId`, `courseId`, `postTime`) VALUES
('22-12-171513936294M6723%19041r37', 'JavaScript is a scripting language that enables you to create dynamically updating content, control multimedia, animate images, and pretty much everything else. (Okay, not everything, but it is amazing what you can achieve with a few lines of JavaScript code.)', '011152018', NULL, '2017-12-22 15:51:34'),
('22-12-171513936675I6548+9528u43', 'HTML is the markup language that we use to structure and give meaning to our web content, for example defining paragraphs, headings, and data tables, or embedding images and videos in the page.\r\n\r\nCSS is a language of style rules that we use to apply styling to our HTML content, for example setting background colors and fonts, and laying out our content in multiple columns.', '011152010', 'PHY 101', '2017-12-22 15:57:55'),
('22-12-171513936675T5927v23412u118', 'HTML is the markup language that we use to structure and give meaning to our web content, for example defining paragraphs, headings, and data tables, or embedding images and videos in the page.\r\n\r\nCSS is a language of style rules that we use to apply styling to our HTML content, for example setting background colors and fonts, and laying out our content in multiple columns.', '011152010', NULL, '2017-12-22 15:57:55'),
('22-12-171513936882J7598v23738v118', 'What can PHP do?\r\nAnything. PHP is mainly focused on server-side scripting, so you can do anything any other CGI program can do, such as collect form data, generate dynamic page content, or send and receive cookies. But PHP can do much more.\r\n\r\nThere are three main areas where PHP scripts are used.\r\n\r\nServer-side scripting. This is the most traditional and main target field for PHP. You need three things to make this work: the PHP parser (CGI or server module), a web server and a web browser. You need to run the web server, with a connected PHP installation. You can access the PHP program output with a web browser, viewing the PHP page through the server. All these can run on your home machine if you are just experimenting with PHP programming. See the installation instructions section for more information.\r\nCommand line scripting. You can make a PHP script to run it without any server or browser. You only need the PHP parser to use it this way. This type of usage is ideal for scripts regularly executed using cron (on *nix or Linux) or Task Scheduler (on Windows). These scripts can also be used for simple text processing tasks. See the section about Command line usage of PHP for more information.\r\nWriting desktop applications. PHP is probably not the very best language to create a desktop application with a graphical user interface, but if you know PHP very well, and would like to use some advanced PHP features in your client-side applications you can also use PHP-GTK to write such programs. You also have the ability to write cross-platform applications this way. PHP-GTK is an extension to PHP, not available in the main distribution. If you are interested in PHP-GTK, visit Â» its own website.\r\nPHP can be used on all major operating systems, including Linux, many Unix variants (including HP-UX, Solaris and OpenBSD), Microsoft Windows, Mac OS X, RISC OS, and probably others. PHP also has support for most of the web servers today. This includes Apache, IIS, and many others. And this includes any web server that can utilize the FastCGI PHP binary, like lighttpd and nginx. PHP works as either a module, or as a CGI processor.\r\n\r\nSo with PHP, you have the freedom of choosing an operating system and a web server. Furthermore, you also have the choice of using procedural programming or object oriented programming (OOP), or a mixture of them both.\r\n\r\nWith PHP you are not limited to output HTML. PHP''s abilities includes outputting images, PDF files and even Flash movies (using libswf and Ming) generated on the fly. You can also output easily any text, such as XHTML and any other XML file. PHP can autogenerate these files, and save them in the file system, instead of printing it out, forming a server-side cache for your dynamic content.\r\n\r\nOne of the strongest and most significant features in PHP is its support for a wide range of databases. Writing a database-enabled web page is incredibly simple using one of the database specific extensions (e.g., for mysql), or using an abstraction layer like PDO, or connect to any database supporting the Open Database Connection standard via the ODBC extension. Other databases may utilize cURL or sockets, like CouchDB.\r\n\r\nPHP also has support for talking to other services using protocols such as LDAP, IMAP, SNMP, NNTP, POP3, HTTP, COM (on Windows) and countless others. You can also open raw network sockets and interact using any other protocol. PHP has support for the WDDX complex data exchange between virtually all Web programming languages. Talking about interconnection, PHP has support for instantiation of Java objects and using them transparently as PHP objects.\r\n\r\nPHP has useful text processing features, which includes the Perl compatible regular expressions (PCRE), and many extensions and tools to parse and access XML documents. PHP standardizes all of the XML extensions on the solid base of libxml2, and extends the feature set adding SimpleXML, XMLReader and XMLWriter support.\r\n\r\nAnd many other interesting extensions exist, which are categorized both alphabetically and by category. And there are additional PECL extensions that may or may not be documented within the PHP manual itself, like Â» XDebug.\r\n\r\nAs you can see this page is not enough to list all the features and benefits PHP can offer. Read on in the sections about installing PHP, and see the function reference part for explanation of the extensions mentioned here.', '011152018', NULL, '2017-12-22 16:01:22'),
('22-12-171513937226N3139^10311m94', 'Guides\r\nWhat is JavaScript?\r\nWelcome to the MDN beginner''s JavaScript course! In this first article we will look at JavaScript from a high level, answering questions such as "what is it?", and "what is it doing?", and making sure you are comfortable with JavaScript''s purpose.\r\nA first splash into JavaScript\r\nNow you''ve learned something about the theory of JavaScript, and what you can do with it, we are going to give you a crash course in the basic features of JavaScript via a completely practical tutorial. Here you''ll build up a simple "Guess the number" game, step by step.\r\nWhat went wrong? Troubleshooting JavaScript\r\nWhen you built up the "Guess the number" game in the previous article, you may have found that it didn''t work. Never fear â€” this article aims to save you from tearing your hair out over such problems by providing you with some simple tips on how to find and fix errors in JavaScript programs.\r\nStoring the information you need â€” Variables\r\nAfter reading the last couple of articles you should now know what JavaScript is, what it can do for you, how you use it alongside other web technologies, and what its main features look like from a high level. In this article we will get down to the real basics, looking at how to work with most basic building blocks of JavaScript â€” Variables.\r\nBasic math in JavaScript â€” numbers and operators\r\nAt this point in the course we discuss maths in JavaScript â€” how we can combine operators and other features to successfully manipulate numbers to do our bidding.\r\nHandling text â€” strings in JavaScript\r\nNext we''ll turn our attention to strings â€” this is what pieces of text are called in programming. In this article we''ll look at all the common things that you really ought to know about strings when learning JavaScript, such as creating strings, escaping quotes in string, and joining them together.\r\nUseful string methods\r\nNow we''ve looked at the very basics of strings, let''s move up a gear and start thinking about what useful operations we can do on strings with built-in methods, such as finding the length of a text string, joining and splitting strings, substituting one character in a string for another, and more.\r\nArrays\r\nIn the final article of this module, we''ll look at arrays â€” a neat way of storing a list of data items under a single variable name. Here we look at why this is useful, then explore how to create an array, retrieve, add, and remove items stored in an array, and more besides.', '011152022', 'PHY 101', '2017-12-22 16:07:06'),
('22-12-171513948006B6649(14782w40', 'heloo hello hello', '011152022', NULL, '2017-12-22 19:06:46'),
('22-12-171513948006C4513w6648n119', 'heloo hello hello', '011152022', 'ENG 101', '2017-12-22 19:06:46'),
('22-12-171513957837X7817N11694w78', 'dfjkgkodjgkdjgdfkgjdklflsdklfkglfkglfkglfdkgdflkgfldgkf', '011152022', 'CSI 217', '2017-12-22 21:50:37'),
('22-12-171513958695J3097K9895f75', 'Course id jhamela kortese', '011152022', 'CSI 219', '2017-12-22 22:04:55'),
('22-12-171513958695U6940y8075u121', 'Course id jhamela kortese', '011152022', 'PHY 101', '2017-12-22 22:04:55'),
('22-12-171513959337P7255,3441a44', 'i think now the problem will be solved', '011152018', NULL, '2017-12-22 22:15:37'),
('23-12-171514064608V7715*30375d42', '', '011152018', NULL, '2017-12-24 03:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `postcatagory`
--

CREATE TABLE `postcatagory` (
  `postId` varchar(55) NOT NULL,
  `catagoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcatagory`
--

INSERT INTO `postcatagory` (`postId`, `catagoryId`) VALUES
('22-12-171513936294M6723%19041r37', 11),
('22-12-171513936675I6548+9528u43', 12),
('22-12-171513936675I6548+9528u43', 13),
('22-12-171513936675T5927v23412u118', 12),
('22-12-171513936675T5927v23412u118', 13),
('22-12-171513936882J7598v23738v118', 2),
('22-12-171513936882J7598v23738v118', 6),
('22-12-171513937226N3139^10311m94', 11),
('22-12-171513948006B6649(14782w40', 6),
('22-12-171513948006B6649(14782w40', 10),
('22-12-171513948006C4513w6648n119', 6),
('22-12-171513948006C4513w6648n119', 10),
('22-12-171513957837X7817N11694w78', 5),
('22-12-171513957837X7817N11694w78', 6),
('22-12-171513957837X7817N11694w78', 10),
('22-12-171513958695J3097K9895f75', 2),
('22-12-171513958695J3097K9895f75', 6),
('22-12-171513958695J3097K9895f75', 10),
('22-12-171513958695J3097K9895f75', 12),
('22-12-171513958695J3097K9895f75', 13),
('22-12-171513958695U6940y8075u121', 2),
('22-12-171513958695U6940y8075u121', 6),
('22-12-171513958695U6940y8075u121', 10),
('22-12-171513958695U6940y8075u121', 12),
('22-12-171513958695U6940y8075u121', 13),
('22-12-171513959337P7255,3441a44', 4),
('22-12-171513959337P7255,3441a44', 13),
('23-12-171514064608V7715*30375d42', 7);

-- --------------------------------------------------------

--
-- Table structure for table `post_picture`
--

CREATE TABLE `post_picture` (
  `postId` varchar(55) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_picture`
--

INSERT INTO `post_picture` (`postId`, `picture`) VALUES
('22-12-171513936294M6723%19041r37', 'upload/post/5a3cd5a65d2e1.png'),
('22-12-171513936675I6548+9528u43', 'upload/post/5a3cd7237f174.jpg'),
('22-12-171513936675T5927v23412u118', 'upload/post/5a3cd72352b3f.jpg'),
('22-12-171513937226N3139^10311m94', 'upload/post/5a3cd94b07dec.png'),
('23-12-171514064608V7715*30375d42', 'upload/post/5a3ecae0c0f47.png');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `chapterNo` varchar(8) NOT NULL,
  `problemNo` varchar(8) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `edition` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solution_as_description`
--

CREATE TABLE `solution_as_description` (
  `sDescriptionId` int(11) NOT NULL,
  `chapterNo` varchar(8) NOT NULL,
  `problemNo` varchar(8) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `edition` varchar(15) NOT NULL,
  `sDescription` text,
  `studentId` varchar(11) DEFAULT NULL,
  `solutionDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solution_as_image`
--

CREATE TABLE `solution_as_image` (
  `sImageId` int(11) NOT NULL,
  `chapterNo` varchar(8) NOT NULL,
  `problemNo` varchar(8) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `edition` varchar(15) NOT NULL,
  `sImage` varchar(255) DEFAULT NULL,
  `studentId` varchar(11) DEFAULT NULL,
  `solutionDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` char(11) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birthDate` date NOT NULL,
  `profilePic` text NOT NULL,
  `idPic` text NOT NULL,
  `coverPic` varchar(255) NOT NULL,
  `gender` char(7) NOT NULL,
  `type` varchar(15) NOT NULL,
  `verCode` int(11) NOT NULL,
  `regDate` datetime NOT NULL,
  `deptName` varchar(55) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `firstName`, `lastName`, `email`, `password`, `birthDate`, `profilePic`, `idPic`, `coverPic`, `gender`, `type`, `verCode`, `regDate`, `deptName`, `active`) VALUES
('011152000', 'sazzad', 'hossain', 's.shazzad@yahoo.com', '123456789', '2017-12-13', 'upload/profile/defaultMen.jpg', 'upload/id/5a394f729bad1.jpg', 'upload/profile/defaultCover.png', 'male', 'unverified', 1410371925, '2017-12-19 23:42:10', 'CSE', 1),
('011152010', 'Fariha', 'Saki', 'saki@gmail.com', 'tttaaareq', '1995-06-23', 'upload/profile/defaultWomen.jpg', 'upload/id/5a2d32f3a4c6e.jpg', 'upload/profile/defaultCover.png', 'female', 'verified', 1661229331, '2017-12-10 19:13:23', 'CSE', 1),
('011152014', 'Shakil', 'Shahan', 'shahanVampire@gmail.com', 'red8hood', '1994-02-08', 'upload/profile/defaultMen.jpg', 'upload/id/5a2d2e5cb2ae4.jpg', 'upload/profile/defaultCover.png', 'male', 'unverified', 1953144207, '2017-12-10 18:53:48', 'CSE', 1),
('011152018', 'Sazzad', 'Hossain', 'prex.line001@gmail.com', '123456789', '1994-12-28', 'upload/profile/681.jpg', 'upload/id/5a3993b41ee1d.png', 'upload/profile/556.jpg', 'male', 'verified', 898599322, '2017-12-20 04:33:24', 'CSE', 1),
('011152022', 'Ashraf', 'Uddin Shahed', 'ashraf@gmail.com', 'urmiurmi', '1995-07-06', 'upload/profile/697.jpg', 'upload/id/5a2d39c0c6c49.jpg', 'upload/profile/defaultCover.png', 'male', 'verified', 1281072154, '2017-12-10 19:42:24', 'CSE', 1),
('011152090', 'Shamima', 'Ritu', 'shamima0626@gmail.com', 'manobShamima', '1995-07-04', 'upload/profile/defaultWomen.jpg', 'upload/id/5a2d24a9a3865.jpg', 'upload/profile/defaultCover.png', 'female', 'unverified', 179719476, '2017-12-10 18:12:25', 'CSE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_phone`
--

CREATE TABLE `student_phone` (
  `phoneNumber` varchar(12) NOT NULL,
  `studentId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD KEY `bookName` (`bookName`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `edition` (`edition`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookName`,`edition`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `edition` (`edition`),
  ADD KEY `edition_2` (`edition`),
  ADD KEY `edition_3` (`edition`);

--
-- Indexes for table `book_writer_name`
--
ALTER TABLE `book_writer_name`
  ADD KEY `bookName` (`bookName`),
  ADD KEY `edition` (`edition`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagoryId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `completed_course`
--
ALTER TABLE `completed_course`
  ADD KEY `courseId` (`courseId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`,`deptName`),
  ADD KEY `deptName` (`deptName`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptName`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `senderStudentId` (`senderStudentId`),
  ADD KEY `receiverStudentId` (`receiverStudentId`);

--
-- Indexes for table `on_going_course`
--
ALTER TABLE `on_going_course`
  ADD KEY `courseId` (`courseId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `postcatagory`
--
ALTER TABLE `postcatagory`
  ADD PRIMARY KEY (`postId`,`catagoryId`),
  ADD KEY `catagoryId` (`catagoryId`);

--
-- Indexes for table `post_picture`
--
ALTER TABLE `post_picture`
  ADD PRIMARY KEY (`postId`,`picture`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`chapterNo`,`problemNo`,`bookName`,`edition`),
  ADD KEY `bookName` (`bookName`),
  ADD KEY `edition` (`edition`),
  ADD KEY `problemNo` (`problemNo`),
  ADD KEY `chapterNo` (`chapterNo`);

--
-- Indexes for table `solution_as_description`
--
ALTER TABLE `solution_as_description`
  ADD PRIMARY KEY (`sDescriptionId`,`chapterNo`,`problemNo`,`bookName`,`edition`),
  ADD KEY `bookName` (`bookName`),
  ADD KEY `edition` (`edition`),
  ADD KEY `chapterNo` (`chapterNo`),
  ADD KEY `problemNo` (`problemNo`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `solution_as_image`
--
ALTER TABLE `solution_as_image`
  ADD PRIMARY KEY (`sImageId`,`chapterNo`,`problemNo`,`bookName`,`edition`),
  ADD KEY `bookName` (`bookName`),
  ADD KEY `edition` (`edition`),
  ADD KEY `chapterNo` (`chapterNo`),
  ADD KEY `problemNo` (`problemNo`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `deptName` (`deptName`);

--
-- Indexes for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD PRIMARY KEY (`studentId`,`phoneNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catagoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD CONSTRAINT `belongs_to_ibfk_1` FOREIGN KEY (`bookName`) REFERENCES `book` (`bookName`),
  ADD CONSTRAINT `belongs_to_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `belongs_to_ibfk_3` FOREIGN KEY (`edition`) REFERENCES `book` (`edition`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `book_writer_name`
--
ALTER TABLE `book_writer_name`
  ADD CONSTRAINT `book_writer_name_ibfk_1` FOREIGN KEY (`bookName`) REFERENCES `book` (`bookName`),
  ADD CONSTRAINT `book_writer_name_ibfk_2` FOREIGN KEY (`edition`) REFERENCES `book` (`edition`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`);

--
-- Constraints for table `completed_course`
--
ALTER TABLE `completed_course`
  ADD CONSTRAINT `completed_course_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `completed_course_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`deptName`) REFERENCES `department` (`deptName`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`senderStudentId`) REFERENCES `student` (`studentId`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiverStudentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `on_going_course`
--
ALTER TABLE `on_going_course`
  ADD CONSTRAINT `on_going_course_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `on_going_course_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseID`);

--
-- Constraints for table `postcatagory`
--
ALTER TABLE `postcatagory`
  ADD CONSTRAINT `postcatagory_ibfk_2` FOREIGN KEY (`catagoryId`) REFERENCES `catagory` (`catagoryId`),
  ADD CONSTRAINT `postcatagory_ibfk_3` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`);

--
-- Constraints for table `post_picture`
--
ALTER TABLE `post_picture`
  ADD CONSTRAINT `post_picture_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`);

--
-- Constraints for table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `solution_ibfk_1` FOREIGN KEY (`bookName`) REFERENCES `book` (`bookName`),
  ADD CONSTRAINT `solution_ibfk_2` FOREIGN KEY (`edition`) REFERENCES `book` (`edition`);

--
-- Constraints for table `solution_as_description`
--
ALTER TABLE `solution_as_description`
  ADD CONSTRAINT `solution_as_description_ibfk_1` FOREIGN KEY (`bookName`) REFERENCES `book` (`bookName`),
  ADD CONSTRAINT `solution_as_description_ibfk_2` FOREIGN KEY (`edition`) REFERENCES `book` (`edition`),
  ADD CONSTRAINT `solution_as_description_ibfk_3` FOREIGN KEY (`chapterNo`) REFERENCES `solution` (`chapterNo`),
  ADD CONSTRAINT `solution_as_description_ibfk_4` FOREIGN KEY (`problemNo`) REFERENCES `solution` (`problemNo`),
  ADD CONSTRAINT `solution_as_description_ibfk_5` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `solution_as_image`
--
ALTER TABLE `solution_as_image`
  ADD CONSTRAINT `solution_as_image_ibfk_1` FOREIGN KEY (`bookName`) REFERENCES `book` (`bookName`),
  ADD CONSTRAINT `solution_as_image_ibfk_2` FOREIGN KEY (`edition`) REFERENCES `book` (`edition`),
  ADD CONSTRAINT `solution_as_image_ibfk_3` FOREIGN KEY (`chapterNo`) REFERENCES `solution` (`chapterNo`),
  ADD CONSTRAINT `solution_as_image_ibfk_4` FOREIGN KEY (`problemNo`) REFERENCES `solution` (`problemNo`),
  ADD CONSTRAINT `solution_as_image_ibfk_5` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`deptName`) REFERENCES `department` (`deptName`);

--
-- Constraints for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD CONSTRAINT `student_phone_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
