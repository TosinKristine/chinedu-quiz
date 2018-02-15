-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema qq
--

CREATE DATABASE IF NOT EXISTS qq;
USE qq;

--
-- Definition of table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`,`category_name`) VALUES 
 (1,'Sports'),
 (2,'HTML'),
 (3,'PHP'),
 (4,'CSS');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


--
-- Definition of table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL auto_increment,
  `question_name` text NOT NULL,
  `answer1` varchar(250) NOT NULL,
  `answer2` varchar(250) NOT NULL,
  `answer3` varchar(250) NOT NULL,
  `answer4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`,`question_name`,`answer1`,`answer2`,`answer3`,`answer4`,`answer`,`category_id`) VALUES 
 (1,'Who is the current world best?','Messi','Ronaldo','Harzard','Morata','2',1),
 (2,'Who won the last world cup?\r\n','Germany','Brazil','Spain','Argentina','1',1),
 (3,'Which Club won the last champions league?\r\n\r\n\r\n\r\n','Eyimba','Chelsea','Barcelona','Real Madrid','4',1),
 (4,'Which Club owns the alianz Arena ?\r\n\r\n\r\n\r\n\r\n','Chelsea','Mancheter United','Beryan Munich','Rangers','3',1),
 (5,'Which country hosted the last world cup ?\r\n\r\n\r\n\r\n\r\n','England','Brazil','Australia','India','2',1),
 (6,'What does HTML stand for?\r\n\r\n	\r\n	\r\n	','Hyper Text Markup Language','Hyperlinks and Text Markup Language','Home Tool Markup Language','Highly Text Markup Language','1',2),
 (7,'Who is making the Web standards?\r\n\r\n	\r\n	\r\n	\r\n	\r\n','Microsoft','Google','The World Wide Web Consortium','Mozilla','3',2),
 (8,'What is the correct HTML for creating a hyperlink?\r\n\r\n	\r\n	\r\n	\r\n	','&lt;a name=&quot;http://smarttutorials.net&quot;&gt;Smart Tutorials&lt;/a&gt;','&lt;a&gt;http://smarttutorials.net&lt;/a&gt;','&lt;a url=&quot;http://smarttutorials.net&quot;&gt;Smart Tutorials&lt;/a&gt;','&lt;a href=&quot;http://smarttutorials.net&quot;&gt;Smart Tutorials&lt;/a&gt;','4',2),
 (9,'What is the HTML element to bold a text?\r\n\r\n\r\n\r\n\r\n','&lt;b&gt;','&lt;bold&gt;','&lt;wide&gt;','&lt;big&gt;','1',2);
INSERT INTO `questions` (`id`,`question_name`,`answer1`,`answer2`,`answer3`,`answer4`,`answer`,`category_id`) VALUES 
 (10,'What is the HTML tag for a link?\r\n\r\n\r\n\r\n\r\n','&lt;link&gt;','&lt;ref&gt;','&lt;a&gt;','&lt;hper&gt;','3',2),
 (11,'What does CSS stand for?\r\n\r\n	\r\n	\r\n	\r\n	','Creative Style Sheets','Colorful Style Sheets','Computer Style Sheets','Cascading Style Sheets','4',4),
 (12,'Where in an HTML document is the correct place to refer to an external style sheet?\r\n\r\n	\r\n	\r\n	\r\n	','In the &lt;body&gt; section ','At the end of the document','At the top of the document','In the &lt;head&gt; section ','4',4),
 (13,'Which HTML tag is used to define an internal style sheet?\r\n\r\n	\r\n	\r\n	','&lt;script&gt;','&lt;css&gt;','&lt;style&gt;','&lt;link&gt;','3',4),
 (14,'Which is the correct CSS syntax?\r\n\r\n	\r\n	\r\n	\r\n	','body:color=black;','{body;color:black;}','body {color: black;}','{body:color=black;}','3',4),
 (15,'Which property is used to change the background color?\r\n\r\n	\r\n	\r\n	','background-color','color','bgcolor','bg-color','1',4),
 (16,'What does PHP stand for?\r\n\r\n	\r\n	\r\n	',' PHP: Hypertext Preprocessor','Personal Hypertext Processor','Personal Home Page','Private Home Page','1',3);
INSERT INTO `questions` (`id`,`question_name`,`answer1`,`answer2`,`answer3`,`answer4`,`answer`,`category_id`) VALUES 
 (17,'PHP server scripts are surrounded by delimiters, which?\r\n\r\n	\r\n	\r\n	\r\n	','&lt;?php&gt;...&lt;/?&gt;','&lt;?php ... ?&gt;','&lt;script&gt;...&lt;/script&gt;','&lt;&amp;&gt;...&lt;/&amp;&gt;','2',3),
 (18,'How do you write \"Hello World\" in PHP\r\n\r\n	\r\n	\r\n	','&quot;Hello World&quot;','echo &quot;Hello World&quot;','Document.Write(&quot;Hello World&quot;);','print_f(&quot;Hello World&quot;);','2',3),
 (19,' Which of the following is the way to create comments in PHP?\r\n\r\n\r\n	\r\n	\r\n	','// commented code to end of line','/* commented code here */','# commented code to end of line','all of the above - correct','4',3),
 (20,'What is the correct way to end a PHP statement?\r\n\r\n	\r\n	\r\n	\r\n	','&lt;/php&gt;','.',';','New line','3',3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `passport` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`user_name`,`score`,`category_id`,`passport`,`password`) VALUES 
 (1,'muni',0,2,'',''),
 (2,'muni2',0,3,'',''),
 (3,'muni16',0,1,'',''),
 (4,'muni55',0,1,'',''),
 (5,'muni17',5,2,'',''),
 (6,'MD. ROKONUZZAMAN',0,2,'',''),
 (7,'chinedu',1,1,'',''),
 (8,'markafi',0,1,'file_folder/chinedu.png','markafi'),
 (9,'yemi',0,2,'file_folder/google-Bot.jpg','yemi'),
 (10,'dami',0,1,'file_folder/Screenshot_20180111-070005.png','dami');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
