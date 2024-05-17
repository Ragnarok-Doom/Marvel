-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2024 at 09:14 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marvel`
--
CREATE DATABASE IF NOT EXISTS `marvel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `marvel`;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(3) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `prod_list` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `quantity` varchar(2) NOT NULL,
  `price` varchar(10) NOT NULL,
  `del_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `fname`, `lname`, `email`, `contact`, `prod_list`, `add1`, `add2`, `city`, `country`, `pincode`, `quantity`, `price`, `del_date`) VALUES
(29, 'Srushti', 'Dave', 'sru@gmail.com', '1111111111', '                                marvel logo bag   ', 'mm', 'mm', 'Australia', 'mm', '1111111', '2', '126.50', '09 May 2024');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Movie'),
(2, 'Series'),
(3, 'Comic'),
(4, 'Game'),
(5, 'Culture');

-- --------------------------------------------------------

--
-- Table structure for table `character`
--

CREATE TABLE IF NOT EXISTS `character` (
  `char_id` int(3) NOT NULL AUTO_INCREMENT,
  `main_image` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `char_name` varchar(30) NOT NULL,
  `about_char` varchar(100) NOT NULL,
  `bio_image` varchar(100) NOT NULL,
  `bio_desc` varchar(256) NOT NULL,
  `movie_pur_image` varchar(100) NOT NULL,
  `movie_name` varchar(250) NOT NULL,
  PRIMARY KEY (`char_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comic`
--

CREATE TABLE IF NOT EXISTS `comic` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(15) NOT NULL,
  `pub_date` varchar(15) NOT NULL,
  `writer` varchar(25) NOT NULL,
  `penciler` varchar(25) NOT NULL,
  `cover_artist` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(6) NOT NULL,
  `year` varchar(4) NOT NULL,
  `author` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `comic`
--

INSERT INTO `comic` (`id`, `title`, `image`, `category`, `pub_date`, `writer`, `penciler`, `cover_artist`, `description`, `price`, `year`, `author`) VALUES
(4, 'A.X.E.: Judgment Day', 'comic1_20240202182553.jpg', '1', '2022-10-26', 'Kieron Gillen', 'Valerio Schiti', 'Mark Brooks', 'The apocalyptic finale of the event of the year. Its not that\r\nnothing will be the same again - its that unless heroes can find\r\na new way to be heroes, everything will be nothing forever.', '25.25', '2024', 'Curt Matheow'),
(5, 'Moon Knight Annual', 'comic2_20240202183315.jpg', '1', '2022-10-26', 'Jed Mackay', 'Federico Sabbatini', 'Rod Reis', 'In the Darkhold, there is a prophecy of how a god might die.\r\nJack Russell, more familiar with that cursed tome than most,\r\nwould like very much to kill a god and save his people, the\r\npeople bound in', '50.20', '2024', 'Curt Matheow'),
(6, 'Strange Academy: Finals', 'comic3_20240202183701.jpg', '1', '2024-06-05', 'Skottie Young', 'Humberto Ramos', 'Humberto Ramos', 'Freshmen Year is almost over! From day one, people have been\r\nwondering - who is the savior of Strange Academy, and who\r\ncan bring it all down? The future of Marvel Magic is going to be\r\ndecided here', '12.33', '2024', 'Curt Matheow'),
(7, 'X-Terminators', 'comic4_20240202183927.jpg', '1', '2024-02-02', 'Leah Williams', 'Carlos Gomez', 'Federico Vicentini', 'A NIGHT TO REMEMBER...When three explosive ladies hit the\r\ntown, they had no idea it was going to hit back so hardÃ¢â‚¬Â¦and\r\nshockingly, running into their stabby friend Wolverine hasnt\r\nmade the nig', '10.44', '2024', 'Curt Matheow'),
(8, 'The Amazing Spider-Man', 'comic5_20240202184252.jpg', '1', '2021-01-14', 'Zeb Wells', 'John Romita', 'Federico Vicentini', 'Glider vs. glider, bomb vs. bomb, Goblin vs. Spider?! Spideys\r\nnew costume is going to be tested in a horrifying crucible. If you\r\nthought the Tombstone and Vulture fights were rough, you aint\r\nseen n', '23.3', '2024', 'Curt Matheow'),
(9, 'Wolverine', 'comic6_20240202184600.jpg', '1', '2020-02-19', 'Benjamin Percy', 'Juan Jose Ryp', 'Leinil Francis Yu', 'The Mark of The Beast! On defense or offense, Wolverine is\r\nKrakoas weapon. But that doesnt mean he attacks where Beast\r\naims and Mc Coys latest ask is going to set Logan on a\r\nstartling and revelator', '9.9', '2024', 'Curt Matheow'),
(10, 'Doctor Strange', 'comic17_20240202184828.jpg', '1', '2024-02-23', 'Benjamin Percy', 'Juan Jose Ryp', 'Leinil Francis Yu', 'The Mark of The Beast! On defense or offense, Wolverine is\r\nKrakoas weapon. But that doesnt mean he attacks where Beast\r\naims and McCoys latest ask is going to set Logan on a\r\nstartling and revelatory', '4.5', '2024', 'Curt Matheow'),
(11, 'Ironcat', 'comic7_20240215121310.jpg', '2', '2024-02-02', 'Steve Hawkins', 'Alex Xendar', 'Warner', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '23.00', '2024', 'Curt Matheow'),
(12, 'Monster Hungers', 'comic8_20240215121643.jpg', '2', '2022-02-02', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '25', '2024', 'Curt Matheow'),
(13, 'Thanos Deatch note', 'comic9_20240215121739.jpg', '2', '2024-02-02', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '45', '2024', 'Curt Matheow'),
(14, 'Xtreme X-Men', 'comic10_20240215121817.jpg', '2', '2024-02-04', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '12', '2024', 'Curt Matheow'),
(15, 'Avengers Assemble', 'comic11_20240215121903.jpg', '2', '2024-02-01', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '19.2', '2024', 'Curt Matheow'),
(16, 'Strange Academy', 'comic12_20240215121944.jpg', '2', '2024-02-05', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '15.29', '2024', 'Curt Matheow'),
(17, 'Spiderman: Double Trouble', 'comic13_20240215122104.jpg', '2', '2024-02-04', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '13.20', '2024', 'Curt Matheow'),
(18, 'Captain America', 'comic14_20240215122356.jpg', '3', '2024-02-04', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '41', '2024', 'Curt Matheow'),
(19, 'New Mutants', 'comic15_20240215122429.jpg', '3', '2024-12-31', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '13.8', '2024', 'Curt Matheow'),
(20, 'Darth Vader', 'comic16_20240215122529.jpg', '3', '2024-12-31', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '16', '2024', 'Curt Matheow'),
(21, 'Xterminators', 'comic18_20240215122622.jpg', '2', '2024-12-29', 'Steve', 'Steve', 'Steve', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt porro maxime corporis nobis repudiandae temporibus autem, iusto unde non dolore distinctio vitae assumenda, expedita voluptates molestias', '17.23', '2024', 'Curt Matheow');

-- --------------------------------------------------------

--
-- Table structure for table `comic_category`
--

CREATE TABLE IF NOT EXISTS `comic_category` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(15) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comic_category`
--

INSERT INTO `comic_category` (`category_id`, `category_name`) VALUES
(1, 'NEW RELEASE'),
(2, 'BEST SELLING'),
(3, 'FREE');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `description` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `email`, `subject`, `description`) VALUES
(1, 'Cynthia', 'Chritie', 'asd@s.com', 'Loki', 'God of Mischief'),
(2, 'Manan', 'Patel', 'manan@gmail.com', 'Moonknight', 'God of Moon / Vengeance'),
(3, 'Srushti', 'Dave', 'sru@gmail.com', 'why', 'why');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `title_image` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `poster_image` varchar(100) NOT NULL,
  `main_image` varchar(100) NOT NULL,
  `button_name` varchar(20) NOT NULL,
  `button_link` varchar(40) NOT NULL,
  `trailer_link` varchar(50) NOT NULL,
  `description` varchar(256) NOT NULL,
  `director` varchar(20) NOT NULL,
  `writter` varchar(20) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `run_time` varchar(10) NOT NULL,
  `release_date` varchar(12) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `img5` varchar(100) NOT NULL,
  `img6` varchar(100) NOT NULL,
  `img7` varchar(100) NOT NULL,
  `img8` varchar(100) NOT NULL,
  `img9` varchar(100) NOT NULL,
  `img10` varchar(100) NOT NULL,
  `img11` varchar(100) NOT NULL,
  `img12` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `title_image`, `category`, `poster_image`, `main_image`, `button_name`, `button_link`, `trailer_link`, `description`, `director`, `writter`, `rating`, `run_time`, `release_date`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `img10`, `img11`, `img12`) VALUES
(12, 'Deadpool & Wolverine', '', '1', '34-deadpool-3_073346.jpg', '', '', '', '', '', '', '', '', '', '2024-02-01', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Captain America : Brave New World', '', '1', '35-captainn-america-4_073429.jpg', '', '', '', '', '', '', '', '', '', '2024-02-02', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'Fantastic Four', '', '1', '36-fantastic-four_073518.jpg', '', '', '', '', '', '', '', '', '', '2024-02-01', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Thunderbolts', '', '1', '37-thunderbols_073543.jpg', '', '', '', '', '', '', '', '', '', '2024-02-07', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Blade', '', '1', '38-blade_073559.jpg', '', '', '', '', '', '', '', '', '', '2024-02-04', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Avengers : The Kang Dynasty', '', '1', '39-avengers-5_073628.jpg', '', '', '', '', '', '', '', '', '', '2024-02-04', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Avengers : Secret War', '', '1', '40-avengers-6_073649.jpg', '', '', '', '', '', '', '', '', '', '2024-02-04', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Ironman', '1-ironman_090322.jpg', '2', '1-ironman-poster_090242.jpg', 'a6_085006.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'a1_085006.png', 'a2_085006.jpg', 'a3_085006.jpg', 'a4_085006.jpg', 'a5_085006.jpg', 'a6_085006.jpg', 'a7_085006.jpg', 'a8_085006.jpg', 'a9_085006.jpg', 'a11_085006.png', 'a12_085006.png', 'a10_091249.jpg'),
(24, 'The Incredible Hulk', '2-hulk_091513.jpg', '2', '2-incredible-hulk-poster_091513.jpg', 'b3_091513.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'b1_091513.jpg', 'b2_091513.jpg', 'b3_091513.jpg', 'b4_091513.jpg', 'b5_091513.jpg', 'b6_091513.jpg', 'b7_091513.jpg', 'b8_091513.jpg', 'b9_091513.jpg', 'b10_091513.jpg', 'b11_091513.jpg', 'b12_091513.jpg'),
(25, 'Ironman 2', '3-ironman-2_091740.png', '2', '3-ironman-2-poster_091740.jpg', 'f8_091740.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'f1_091740.jpg', 'f2_091740.jpg', 'f3_091740.jpg', 'f4_091740.jpg', 'f5_091740.jpg', 'f6_091740.jpg', 'f7_091740.jpg', 'f8_091740.jpg', 'f9_091740.jpg', 'f10_091740.jpg', 'f11_091740.jpg', 'f12_091740.jpg'),
(26, 'Thor', '4-thor_091935.jpg', '2', '4-thor-poster_091935.jpg', 'd3_091935.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'd1_091935.jpg', 'd2_091935.jpeg', 'd3_091935.jpg', 'd4_091935.jpg', 'd5_091935.jpg', 'd6_091935.jpg', 'd7_091935.jpg', 'd8_091935.jpg', 'd9_091935.jpg', 'd10_091935.jpg', 'd11_091935.jpg', 'd12_091935.jpg'),
(27, 'Captain America : The First Avenger', '5-captain-america_092052.png', '2', '5-captain-america-poster_092052.jpg', 'c5_092052.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'c1_092052.jpg', 'c2_092052.jpg', 'c3_092052.jpg', 'c4_092052.jpg', 'c5_092052.jpg', 'c6_092052.jpg', 'c7_092052.png', 'c8_092052.jpg', 'c9_092052.jpg', 'c10_092052.jpg', 'c11_092052.jpg', 'c12_092052.jpg'),
(28, 'The Avengers', '6-avengers_092224.jpg', '2', '6-avengers-poster_092224.jpg', 'e9_092224.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'e1_092224.jpg', 'e2_092224.jpg', 'e3_092224.jpg', 'e4_092224.jpg', 'e5_092224.jpg', 'e6_092224.jpg', 'e7_092224.jpg', 'e8_092224.jpg', 'e9_092224.jpg', 'e10_092224.jpg', 'e11_092224.jpg', 'e12_092224.jpg'),
(29, 'Ironman 3', '7-ironman-3_092524.png', '2', '7-ironman-3-poster_092524.jpg', 'g7_092524.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'g1_092524.jpg', 'g2_092524.jpg', 'g3_092524.jpg', 'g4_092524.jpg', 'g5_092524.jpg', 'g6_092524.jpg', 'g7_092524.jpg', 'g8_092524.jpg', 'g9_092524.jpg', 'g10_092524.jpg', 'g11_092524.jpg', 'g12_092524.jpg'),
(30, 'Thor : The Dark World', '8-thor-2_092746.png', '2', '8-thor-2-poster_092746.jpg', 'i10_092746.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'i1_092746.jpg', 'i2_092746.jpg', 'i3_092746.jpg', 'i4_092746.jpg', 'i5_092746.jpg', 'i6_092746.jpg', 'i7_092746.jpg', 'i8_092746.jpg', 'i9_092746.jpg', 'i10_092746.jpg', 'i11_092746.jpg', 'i12_092746.jpg'),
(31, 'Captain America : The Winter Soldier', '9-captain-america-2_092916.png', '2', '9-captain-america-2-poster_092916.jpg', 'h4_092916.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'h1_092916.jpg', 'h2_092916.jpg', 'h3_092916.jpg', 'h4_092916.jpg', 'h5_092916.jpg', 'h6_092916.jpg', 'h7_092916.jpg', 'h8_092916.jpg', 'h9_092916.jpg', 'h10_092916.jpg', 'h11_092916.jpg', 'h12_092916.jpg'),
(32, 'Guardians of The Galaxy', '10-guardians_093054.jpg', '2', '10-guardians-poster_093054.jpg', 'j1_093054.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'j1_093054.jpg', 'j2_093054.jpg', 'j3_093054.jpg', 'j4_093054.jpg', 'j5_093054.jpg', 'j6_093054.jpg', 'j7_093054.jpg', 'j8_093054.jpg', 'j9_093054.jpg', 'j10_093054.jpg', 'j11_093054.jpg', 'j12_093054.jpg'),
(33, 'Avengers : Age of Ultron', '11-avengers-2_093315.png', '2', '11-avengers-2-poster_093315.jpg', 'k12_093315.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'k1_093315.jpg', 'k2_093315.png', 'k3_093315.jpg', 'k4_093315.jpg', 'k5_093315.jpg', 'k6_093315.jpg', 'k7_093315.jpg', 'k8_093315.jpg', 'k9_093315.jpg', 'k10_093315.jpg', 'k11_093315.jpg', 'k12_093315.jpg'),
(34, 'Antman', '12-antman_093455.png', '2', '12-antman-poster_093455.jpg', 'l2_093455.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'l1_093455.jpg', 'l2_093455.jpg', 'l3_093455.jpg', 'l4_093455.jpg', 'l5_093455.jpg', 'l6_093455.jpg', 'l7_093455.jpg', 'l8_093455.jpg', 'l9_093455.jpg', 'l10_093455.jpg', 'l11_093455.jpg', 'l12_093455.jpg'),
(35, 'Captain America : Civil War', '12-captain-america-3_093631.jpg', '2', '13-captain-america-3-poster_093631.jpg', 'n12_093631.png', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'n1_093631.jpg', 'n2_093631.jpg', 'n3_093631.jpg', 'n4_093631.jpg', 'n5_093631.jpg', 'n6_093631.jpg', 'n7_093631.jpg', 'n8_093631.jpg', 'n9_093631.jpg', 'n10_093631.png', 'n11_093631.png', 'n12_093631.png'),
(36, 'Doctor Strange', '14-doctor-strange_093804.jpg', '2', '14-doctor-strange-poster_093804.jpg', 'm12_093804.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'm1_093804.png', 'm2_093804.jpg', 'm3_093804.jpg', 'm4_093804.jpg', 'm5_093804.jpg', 'm6_093804.jpg', 'm7_093804.jpg', 'm8_093804.jpg', 'm9_093804.jpg', 'm10_093804.jpg', 'm11_093804.jpg', 'm12_093804.jpg'),
(37, 'Guardians of The Galaxy Vol 2', '15-guardians-2_094025.jpg', '2', '15-guardians-2-poster_094025.jpg', 'q4_094025.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'q4_094025.jpg', 'q1_094025.jpg', 'q2_094025.jpg', 'q3_094025.jpg', 'q5_094025.jpg', 'q6_094025.jpg', 'q7_094025.jpg', 'q8_094025.png', 'q9_094025.jpeg', 'q10_094025.jpg', 'q11_094025.jpg', 'q12_094025.jpg'),
(38, 'Spiderman : Homecoming', '16-spiderman-1_094237.png', '2', '16-spiderman-1-poster_094237.jpg', 'o11_094237.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'o1_094237.png', 'o2_094237.jpg', 'o3_094237.jpg', 'o4_094237.jpg', 'o5_094237.jpg', 'o6_094237.jpg', 'o7_094237.jpg', 'o8_094237.jpg', 'o9_094237.jpg', 'o10_094237.jpg', 'o11_094237.jpg', 'o12_094237.jpg'),
(39, 'Thor : Ragnarok', '17-thor-3_094432.jpg', '2', '17-thor-3-poster_094432.jpg', 'r4_094432.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'r4_094432.jpg', 'r1_094432.jpg', 'r2_094432.jpg', 'r3_094432.jpg', 'r5_094432.jpg', 'r6_094432.jpeg', 'r7_094432.jpg', 'r8_094432.jpg', 'r9_094432.jpg', 'r10_094432.jpg', 'r11_094432.jpg', 'r12_094432.jpg'),
(40, 'Black Panther', '18-black-panther_094628.jpg', '2', '18-black-panther-poster_094628.jpg', 'p12_094628.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'p1_094628.jpg', 'p2_094628.jpg', 'p3_094628.jpg', 'p4_094628.jpg', 'p5_094628.jpg', 'p6_094628.jpg', 'p7_094628.jpg', 'p8_094628.jpg', 'p9_094628.jpg', 'p10_094628.jpg', 'p11_094628.jpg', 'p12_094628.jpg'),
(41, 'Avengers : Infinity War', '19-avengers-3_094829.jpg', '2', '19-avengers-3-poster_094829.jpg', 's8_094829.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 's1_094829.jpg', 's2_094829.jpg', 's3_094829.jpg', 's4_094829.jpg', 's5_094829.jpg', 's6_094829.jpg', 's7_094829.jpg', 's8_094829.jpg', 's9_094829.jpg', 's10_094829.png', 's11_094829.jpg', 's12_094829.png'),
(42, 'Antman and The Wasp', '20-antman-2_095038.jpg', '2', '20-antman-2-poster_095038.jpg', 't10_095038.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 't1_095038.jpg', 't2_095038.jpg', 't3_095038.jpg', 't4_095038.jpg', 't5_095038.jpg', 't6_095038.jpg', 't7_095038.jpg', 't8_095038.jpg', 't9_095038.jpg', 't11_095038.png', 't10_095038.jpg', 't12_095038.jpg'),
(43, 'Captain Marvel', '21-captain-marvel_095238.jpg', '2', '21-captain-marvel-poster_095238.jpg', 'u1_095238.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'u2_095238.jpg', 'u1_095238.jpg', 'u3_095238.jpg', 'u4_095238.jpg', 'u5_095238.jpg', 'u6_095238.jpg', 'u7_095238.jpg', 'u8_095238.jpg', 'u9_095238.jpg', 'u10_095238.jpg', 'u11_095238.jpg', 'u12_095238.jpg'),
(44, 'Avengers : Endgame', '22-avengers-4_095417.jpg', '2', '22-avengers-4-poster_095417.jpg', 'v9_095417.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'v1_095417.jpg', 'v2_095417.png', 'v3_095417.jpg', 'v4_095417.jpg', 'v5_095417.png', 'v6_095417.jpg', 'v7_095417.jpg', 'v8_095417.jpg', 'v9_095417.jpg', 'v10_095417.png', 'v11_095417.jpg', 'v12_095417.jpg'),
(45, 'Spiderman : Far From Home', '23-spiderman-2_095652.jpg', '2', '23-spiderman-2-poster_095652.jpg', 'w8_095652.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'w1_095652.jpg', 'w2_095652.jpg', 'w3_095652.jpg', 'w4_095652.jpg', 'w5_095652.jpg', 'w6_095652.jpg', 'w7_095652.jpg', 'w8_095652.jpg', 'w9_095652.jpg', 'w10_095652.jpg', 'w11_095652.jpg', 'w12_095652.jpg'),
(46, 'Black Widow', '24-black-widow_095935.png', '2', '24-black-widow-poster_095935.jpg', 'x11_095935.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'x1_095935.jpg', 'x2_095935.jpg', 'x3_095935.jpg', 'x4_095935.jpg', 'x5_095935.jpg', 'x6_095935.jpg', 'x7_095935.jpg', 'x8_095935.jpg', 'x9_095935.jpg', 'x10_095935.jpg', 'x11_095935.jpg', 'x12_095935.jpeg'),
(47, 'Shang Chi', '25-shang-chi_101713.jpg', '2', '25-shang-chi-poster_101713.jpg', 'y3_101713.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'y1_101713.jpg', 'y2_101713.jpg', 'y3_101713.jpg', 'y4_101713.jpg', 'y5_101713.jpg', 'y6_101713.jpg', 'y7_101713.jpg', 'y8_101713.jpg', 'y9_101713.jpg', 'y10_101713.jpg', 'y11_101713.jpg', 'y12_101713.jpg'),
(48, 'Eternals', '26-eternals_113048.jpg', '2', '26-eternals-poster_113048.jpg', 'z2_113048.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'z1_113048.jpg', 'z2_113048.jpg', 'z3_113048.jpg', 'z4_113048.jpeg', 'z5_113048.jpg', 'z6_113048.jpg', 'z8_113048.jpg', 'z9_113048.jpg', 'z10_113048.jpeg', 'z11_113048.jpg', 'z12_113048.jpg', 'z7_113048.jpg'),
(49, 'Spiderman : No Way Home', '27-spiderman-3_113320.jpg', '2', '27-spiderman-3-poster_113320.jpg', 'za10_113320.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'za1_113320.jpg', 'za2_113320.jpg', 'za3_113320.jpg', 'za4_113320.jpg', 'za5_113320.jpg', 'za6_113320.jpg', 'za7_113320.jpg', 'za8_113320.jpg', 'za9_113320.jpg', 'za10_113320.jpg', 'za11_113320.jpg', 'za12_113320.jpg'),
(50, 'Doctor Strange : Multiverse of Madness', '28-doctor-strange-2_113519.jpg', '2', '28-doctor-strange-2-poster_113519.jpg', 'zb11_113519.png', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zb1_113519.jpg', 'zb2_113519.jpg', 'zb3_113519.jpg', 'zb4_113519.jpg', 'zb5_113519.jpg', 'zb6_113519.jpg', 'zb7_113519.jpg', 'zb8_113519.jpg', 'zb9_113519.jpg', 'zb10_113519.jpg', 'zb11_113519.png', 'zb12_113519.jpg'),
(51, 'Thor : Love and Thunder', '29-thor-4_113741.png', '2', '29-thor-4-poster_113741.jpg', 'zc10_113741.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zc1_113741.jpeg', 'zc2_113741.jpg', 'zc3_113741.jpg', 'zc4_113741.jpg', 'zc5_113741.jpg', 'zc6_113741.jpg', 'zc7_113741.jpg', 'zc8_113741.jpg', 'zc9_113741.jpg', 'zc10_113741.jpg', 'zc11_113741.jpg', 'zc12_113741.jpg'),
(52, 'Black Panther : Wakanda Forever', '30-black-panther-2_113942.png', '2', '30-black-panther-2-poster_113942.jpg', 'zd8_113942.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zd1_113942.jpg', 'zd2_113942.jpg', 'zd3_113942.jpg', 'zd4_113942.jpg', 'zd5_113942.jpg', 'zd6_113942.jpg', 'zd7_113942.jpg', 'zd8_113942.jpg', 'zd9_113942.jpg', 'zd10_113942.jpg', 'zd11_113942.jpg', 'zd12_113942.jpg'),
(53, 'Antman & Wasp : Quantumania', '31-antman-3_114206.png', '2', '31-antman-3-poster_114206.jpg', 'ze11_114206.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'ze1_114206.png', 'ze2_114206.jpg', 'ze3_114206.jpg', 'ze4_114206.jpg', 'ze5_114206.jpg', 'ze6_114206.jpg', 'ze7_114206.jpg', 'ze8_114206.jpg', 'ze9_114206.jpg', 'ze10_114206.jpg', 'ze11_114206.jpg', 'ze12_114206.png'),
(54, 'Guardians of the Galaxy Vol 3', '32-guardians-3_114415.png', '2', '32-guardians-3-poster_114415.jpg', 'zf11_114415.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zf1_114415.jpg', 'zf2_114415.jpg', 'zf3_114415.jpg', 'zf4_114415.jpeg', 'zf6_114415.jpg', 'zf5_114415.jpg', 'zf7_114415.jpg', 'zf8_114415.jpg', 'zf9_114415.jpg', 'zf10_114415.jpg', 'zf11_114415.jpg', 'zf12_114415.jpg'),
(55, 'The Marvels', '33-captain-marvel-2_114612.png', '2', '33-captain-marvel-2-poster_114612.jpg', 'zg8_114612.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zg1_114612.jpg', 'zg2_114612.jpg', 'zg4_114612.jpg', 'zg3_114612.jpg', 'zg5_114612.jpg', 'zg6_114612.jpg', 'zg7_114612.jpg', 'zg9_114612.jpg', 'zg8_114612.jpg', 'zg10_114612.jpg', 'zg11_114612.jpg', 'zg12_114612.jpg'),
(56, 'X - Men', 'x-men-1_114730.jpg', '3', 'x-men-1-poster_114730.jpg', 'zx1_181935.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'X - Men 2', 'x-men-2_114755.jpg', '3', 'x-men-2-poster_114755.jpeg', 'zx2_181914.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'X - Men : The Last Stand', 'x-men-3_114823.jpg', '3', 'x-men-3-poster_114823.jpeg', 'zx3_181859.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, 'X - Men Origins Wolverine', 'x-men-4_114852.jpg', '3', 'x-men-4-poster_114852.jpg', 'zx4_181843.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 'X - Men First Class', 'x-men-5_114916.jpg', '3', 'x-men-5-poster_114916.jpg', 'zx5_181824.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 'The Wolverine', 'x-men-6_114936.jpg', '3', 'x-men-6-poster_114936.jpg', 'zx6_181759.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 'X - Men : Days of Future Past', 'x-men-7_115001.png', '3', 'x-men-7-poster_122039.jpg', 'zx7_181740.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 'X - Men : Apocalypse', 'x-men-8_115027.png', '3', 'x-men-8-poster_115027.jpeg', 'zx8_181722.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 'Logan', 'x-men-9_115046.png', '3', 'x-men-9-poster_115046.jpg', 'zx9_181703.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 'X - Men : Dark Phoenix', 'x-men-10_115122.png', '3', 'x-men-10-poster_115122.jpeg', '', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 'The New Mutants', 'x-men-11_115154.png', '3', 'x-men-11-poster_115154.jpeg', 'zx11_181624.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 'Deadpool', 'x-men-12_115215.png', '3', 'x-men-12-poster_115215.jpg', 'zx13_181556.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 'Deadpool 2', 'x-men-13_115230.png', '3', 'x-men-13-poster_115230.jpg', 'zx14_181427.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 'Spiderman', 'o-spiderman-1_115521.png', '4', 'o-spiderman-1-poster_115521.jpg', 'zj7_115521.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zj1_115521.jpg', 'zj2_115521.jpg', 'zj3_115521.jpg', 'zj4_115521.jpg', 'zj5_115521.jpg', 'zj6_115521.jpg', 'zj8_115521.jpg', 'zj7_115521.jpg', 'zj9_115521.jpg', 'zj10_115521.jpg', 'zj11_115521.jpg', 'zj12_115521.jpg'),
(70, 'Spiderman 2', 'o-spiderman-2_115705.png', '4', 'o-spiderman-2-poster_115705.jpg', 'zk11_115705.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zk1_115705.jpg', 'zk2_115705.jpg', 'zk3_115705.jpg', 'zk4_115705.jpg', 'zk5_115705.jpg', 'zk6_115705.jpg', 'zk7_115705.jpg', 'zk8_115705.jpg', 'zk9_115705.jpg', 'zk11_115705.jpg', 'zk10_115705.jpeg', 'zk12_115705.jpg'),
(71, 'Spiderman 3', 'o-spiderman-3_115831.png', '4', 'o-spiderman-3-poster_115831.jpg', 'zl6_115831.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zl1_115831.png', 'zl2_115831.jpg', 'zl3_115831.jpg', 'zl4_115831.jpg', 'zl5_115831.jpg', 'zl6_115831.jpg', 'zl7_115831.jpg', 'zl8_115831.jpg', 'zl9_115831.jpg', 'zl10_115831.jpg', 'zl11_115831.jpg', 'zl12_115831.jpg'),
(72, 'The Amazing Spiderman', 'o-amazing-spiderman-1_120001.png', '4', 'o-amazing-spiderman-1-poster_120001.jpg', 'zm1_120001.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zm1_120001.jpg', 'zm2_120001.jpg', '', 'zm4_120001.jpg', 'zm5_120001.jpg', 'zm6_120001.jpg', 'zm7_120001.jpg', 'zm8_120001.jpg', 'zm9_120001.jpg', 'zm10_120001.png', 'zm11_120001.jpg', 'zm12_120001.jpg'),
(73, 'The Amazing Spiderman 2', 'o-amazing-spiderman-2_120136.jpg', '4', 'o-amazing-spiderman-2-poster_120136.jpg', 'zn7_120136.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zn1_120136.jpg', 'zn2_120136.jpg', 'zn3_120136.jpg', 'zn4_120136.jpg', 'zn5_120136.jpg', 'zn6_120136.jpg', 'zn7_120136.jpg', 'zn8_120136.jpg', 'zn9_120136.jpg', 'zn10_120136.jpg', 'zn11_120136.jpg', 'zn12_120136.jpg'),
(74, 'Venom', 'o-venom-1_120311.png', '4', 'o-venom-1-poster_120311.jpg', 'zo9_120311.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zo1_120311.jpg', 'zo2_120311.jpg', 'zo3_120311.jpg', 'zo4_120311.jpg', 'zo5_120311.jpg', 'zo6_120311.jpg', 'zo7_120311.jpg', 'zo8_120311.jpg', 'zo9_120311.jpg', 'zo10_120311.jpg', 'zo11_120311.jpg', 'zo12_120311.jpg'),
(75, 'Venom : Let There Be Carnage', 'o-venom-2_120451.jpg', '4', 'o-venom-2-poster_120451.jpg', 'zp11_120451.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zp1_120451.jpg', 'zp2_120451.jpg', 'zp3_120451.jpg', 'zp4_120451.jpg', 'zp5_120451.jpg', 'zp6_120451.jpg', 'zp7_120451.jpg', 'zp8_120451.jpg', 'zp9_120451.jpg', 'zp10_120451.jpg', 'zp11_120451.jpg', 'zp12_120451.jpg'),
(76, 'Spiderman : Across The Spider-Verse', 'o-across-spiderverse_120707.jpg', '4', 'o-across-spiderverse-poster_120707.jpg', 'zi10_120707.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zi1_120707.jpg', 'zi2_120707.jpg', 'zi3_120707.jpg', 'zi4_120707.jpg', 'zi5_120707.jpg', 'zi6_120707.jpg', 'zi7_120707.jpg', 'zi8_120707.jpg', 'zi9_120707.jpg', 'zi10_120707.jpg', 'zi11_120707.jpg', 'zi12_120707.jpg'),
(77, 'Spiderman : Into The Spider-Verse', 'o-into-spiserverse_120932.jpg', '4', 'o-into-spiserverse-poster_120932.jpg', 'zh9_120932.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet doloribus laudantium doloremque consectetur unde dolorum repellat blanditiis asperiores, accusantium perspiciatis, non mollitia. Dolor maiores dignissimos expedita veritatis eligendi, mole', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'zh1_120932.jpg', 'zh2_120932.jpg', 'zh3_120932.jpg', 'zh4_120932.jpg', 'zh5_120932.jpg', 'zh6_120932.jpg', 'zh7_120932.jpg', 'zh8_120932.jpg', 'zh9_120932.jpg', 'zh10_120932.jpg', 'zh11_120932.jpg', 'zh12_120932.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE IF NOT EXISTS `movie_category` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`category_id`, `category_name`) VALUES
(1, 'Upcoming'),
(2, 'Phase Wise'),
(3, 'X - Men Series'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `movie_names`
--

CREATE TABLE IF NOT EXISTS `movie_names` (
  `only_movie_id` int(3) NOT NULL,
  `movie_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `navi_id` int(2) NOT NULL AUTO_INCREMENT,
  `navi_name` varchar(15) NOT NULL,
  `navi_link` varchar(20) NOT NULL,
  PRIMARY KEY (`navi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`navi_id`, `navi_name`, `navi_link`) VALUES
(1, 'NEWS', 'NEWS.PHP'),
(2, 'COMIC', 'COMIC.PHP'),
(3, 'CHARACTERS', 'character.php'),
(4, 'MOVIES', 'MOVIE.PHP'),
(5, 'TV SHOWS', 'tvshow.php'),
(6, 'SHOP', 'SHOP.PHP'),
(7, 'CONTACT', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `category` varchar(15) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `author` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `category`, `title`, `description`, `date`, `author`) VALUES
(33, 'movie1_20240206085355.jpg', '1', 'The Marvels Lands on', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(34, 'blads_20240206085635.jpg', '1', 'Role of Blade in MCU', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(35, 'bp_wakandaforever_book_card_20240206085815.jpg', '1', 'Ryan Cooglers Wakand', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(36, 'bp_wf_book_card_20240206090045.jpg', '1', 'Angela Evelyn Basset', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(37, 'echo_1_0 (1)_20240206090128.png', '2', 'Who is Echo?', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(38, 'Untitled2_20240206090249.png', '1', 'Untitled Deadpool 3', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(39, 'namor_20240206090412.jpg', '1', 'In Secret War : MCU ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(40, 'Untitled_20240206091902.png', '2', 'Moonknight : Jack Lo', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(41, 'bashenga_20240206091927.jpg', '2', 'Bashenga : The First', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(42, 'hr-image2_20240206092053.jpg', '2', 'WALEED CHARACTER REP', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(43, 'images_20240206092137.jpg', '2', 'Kingpin Is Alive', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(44, 'Untitled4_20240206092305.png', '2', 'Runaways', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(45, 'comics_category_bar-960x540_20240206092353.jpg', '3', 'Mutants Comic', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(46, 'incredible_hulk_8_card_20240206092702.jpg', '3', 'Ghost Rider And Incr', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(47, 'images (10)_20240206092848.jpg', '3', 'Phoneix : Jean Grey', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(48, 'what_if_3 (1)_20240206092944.png', '3', 'What if Season 2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(49, 'game1_20240206093011.jpg', '4', 'Spiderman Miles Mora', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(50, 'game2_20240206093037.jpg', '4', 'Champions', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(51, 'game3_20240206093057.jpg', '4', 'Strike Force', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(52, 'game4_20240206093154.jpg', '4', 'Marvels Champion', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(53, 'eq_20240206093339.png', '4', 'Guardian Fiht Strike', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(54, 'culture1_20240206093502.jpg', '5', 'Jeff the Land Shark ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(55, 'culture2_20240206093546.jpg', '5', 'Marvels Announce Spi', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(56, 'culture-image2_20240206093629.jpg', '5', 'First look And Exclu', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow'),
(57, 'culture-image3_20240206093701.jpg', '5', 'Thor Odinson and Hel', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, iste distinctio laborum harum quas d', '06 Feb 202', 'Curt Matheow');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `cpassword` varchar(8) NOT NULL,
  `country` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doj` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `username`, `password`, `cpassword`, `country`, `contact`, `doj`) VALUES
(27, 'Cynthia', 'Christie', 'cynthiachristie14@gmail.com', 'cynthia1', '11111111', '11111111', 'United Kingdom(UK)', '0000000000', '2024-04-02'),
(28, 'Manan', 'Patel', 'manan@gmail.com', 'manancyn', '11111111', '11111111', 'Australia', '7777777777', '2024-04-02'),
(32, 'cc', 'cc', 'patelmanan074@gmail.com', 'mmmmmmmm', 'mmmmmmmm', 'mmmmmmmm', 'India', '1111111111', '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(256) NOT NULL,
  `color` varchar(50) NOT NULL,
  `material` varchar(50) NOT NULL,
  `neccessities` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `author` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `image`, `title`, `description`, `color`, `material`, `neccessities`, `price`, `author`) VALUES
(2, 'shop1_20240324064609.jpg', 'marvel logo bag', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(4, 'shop5_20240324070358.png', 'Hawkeye black logo steel bottle', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(5, 'shop2_20240324070422.png', 'Ironman alluminium helmet', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(6, 'shop4_20240324070450.png', 'Kate Bishop Letther bag', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(7, 'shop6_20240324070506.png', 'Marvel red cap', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(8, 'shop3_20240324070528.png', 'Hawkeye black cap', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(9, 'ant8_20240324070606.png', 'antman lunchbox', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(10, 'c1_20240324070629.png', 'captain america shirt', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(11, 'a10_20240324070646.png', 'grey shirt', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(12, 'i2_20240324070713.png', 'ironman shirt', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(13, 's1_20240324070735.png', 'spider web shirt', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(14, 'cloth_20240324070751.jpg', 'black panther shirt', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(15, 'a6_20240324070810.png', 'mercentile bottle', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(16, 'bottle6_20240324071059.png', 'antman logo', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(17, 'bottle11_20240324071118.png', 'black bottle', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(18, 'cap15_20240324071149.png', 'thor cap', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(19, 'cap11_20240324071205.jpg', 'loki cap', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est at voluptatem, cum qui error facere mollitia laborum. Laudantium eius impedit neque hic velit repellat nemo. Hic asperiores minima qui, quo doloremque cupidi', 'Red,  Green,  Yellow', '84% staineless steel / 12% polypropylene / 2% ABS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla non eligendi labore, quasi sit est a', '63.25', 'Cynthia'),
(20, 'wallpaper2you_469159_20240509195758.png', 'aa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam numquam corrupti quam ratione nobis exercitationem natus eius quo accusamus, dolorem tenetur placeat recusandae minus reiciendis, quia fuga sed vero! Minima.', 'Red, Yellow, Green', 'Steel', 'Wash', '63.35', 'Cynthia');

-- --------------------------------------------------------

--
-- Table structure for table `show_category`
--

CREATE TABLE IF NOT EXISTS `show_category` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `show_category`
--

INSERT INTO `show_category` (`category_id`, `category_name`) VALUES
(1, 'Upcoming'),
(2, 'Phase Wise'),
(4, 'Hulu'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `main_image` varchar(100) NOT NULL,
  `logo_image` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `btn_name` varchar(25) NOT NULL,
  `btn_link` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `author` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `main_image`, `logo_image`, `title`, `description`, `btn_name`, `btn_link`, `date`, `author`) VALUES
(42, 'blade-pos_20240129120615.png', 'blade-name_29122024011506.png', 'ANNOUNCEMENT <br> TRAILER', 'Watch The Game Awards 2023 Trailer For Marvels Blade Now!', 'LOAD MORE', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(43, 'a_20240129121720.jpg', 'echo_29122024012017.png', 'STREAM THE 5 EPISODE <br> EVENT NOW', '', 'Watch Disney', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(44, 'what-if-pos_20240129122127.jpeg', 'whatif_29122024012721_29182024010154.png', 'THE WATCHERS NINE <br> DAY OF WHAT IF...?', 'Check Back Each Day At 9am PST For New Reveals And Exclusive <br>\r\nGifts As We Watch Season 2 Of Mar', 'Stream Disney+', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(45, 'whats-new_20240129122329.jpg', 'insider-logo_29182024015539.png', 'THIS WEEKS NEW <br> COMICS', 'Join Blade Fight For The Future, And More In This Weekss <br>\r\nComics!', 'SEE MORE', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(49, '6294738_20240129185237.jpg', 'marvel-studio_29122024013227.png', 'SPIDERMAN SINISTER SIX <br> VILLIANS CONFIRMED?', 'Recently Russo Brothers Post That, In Sinister Six Spiderman <br>\r\nWill Deal Against Mysterio, Rhino', 'LOAD MORE', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(50, 'F-tLbvTXIAAghf7_20240201080049.jpg', 'lokiname_01162024020310.png', 'GOD OF MISCHIEF BECOMES <BR> GOD OF MULTIVERSE', 'Loki is now become most powerfull character in the mcu', 'WATCH NOW', 'marvel.com', '01 Feb 202', 'Curt Matheow');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE IF NOT EXISTS `trailer` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `author` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`id`, `title`, `image`, `link`, `date`, `author`) VALUES
(1, 'Captain Marvel of1', 'download (4)_20240129125237.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(2, 'Secret Invasion', 'download (5)_20240129125251.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(3, 'Captain Marvel ft', 'download (2)_20240129125309.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(4, 'Ultimate Thor', 'images (1)_20240129125332.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(5, 'Captain Marvel tt', 'download (1)_20240129125347.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(6, 'Infinity War', 'download (3)_20240129125405.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(7, 'Endgame', 'download_20240129125416.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(8, 'Guardians Of the Galaxy', 'images (2)_20240129125432.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(9, 'Loki s2', 'images (3)_20240129125444.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(10, 'Thor', 'images (4)_20240129125501.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(11, 'Kraven', 'images (5)_20240129125510.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(12, 'Spiderman 2', 'images (6)_20240129125522.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(13, 'Lego', 'images (7)_20240129125538.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow'),
(14, 'Midnight', 'images (9)_20240129125554.jpg', 'marvel.com', '29 Jan 202', 'Curt Matheow');

-- --------------------------------------------------------

--
-- Table structure for table `tvshow`
--

CREATE TABLE IF NOT EXISTS `tvshow` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `title_image` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `poster_image` varchar(100) NOT NULL,
  `main_image` varchar(100) NOT NULL,
  `button_name` varchar(30) NOT NULL,
  `button_link` varchar(30) NOT NULL,
  `trailer_link` varchar(30) NOT NULL,
  `description` varchar(70) NOT NULL,
  `director` varchar(30) NOT NULL,
  `writter` varchar(30) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `run_time` varchar(10) NOT NULL,
  `release_date` varchar(12) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `img5` varchar(100) NOT NULL,
  `img6` varchar(100) NOT NULL,
  `img7` varchar(100) NOT NULL,
  `img8` varchar(100) NOT NULL,
  `img9` varchar(100) NOT NULL,
  `img10` varchar(100) NOT NULL,
  `img11` varchar(100) NOT NULL,
  `img12` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tvshow`
--

INSERT INTO `tvshow` (`id`, `title`, `title_image`, `category`, `poster_image`, `main_image`, `button_name`, `button_link`, `trailer_link`, `description`, `director`, `writter`, `rating`, `run_time`, `release_date`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `img8`, `img9`, `img10`, `img11`, `img12`) VALUES
(2, 'Ironheart ', '', '1', 'x16_121859.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Agatha : Coven of Chaos', '', '1', 'x17_121932.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Daredevil : Born Again', '', '1', 'x18_122010.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'X - Men 97', '', '1', 'x19_122026.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Spiderman : Freshman Year', '', '1', 'x20_122050.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Marvel Zombies', '', '1', 'x21_122107.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Echo ', 'echo_124357.png', '2', 'echo-poster_124357.jpg', 'echo_1_0_124357.png', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'n1_124357.jpg', 'n2_124357.jpg', 'n3_124357.jpg', 'n4_124357.jpg', 'n5_124357.jpg', 'n6_124357.jpg', 'n7_124357.jpg', 'n8_124357.jpg', 'n9_124357.jpg', 'n10_124357.jpg', 'n11_124357.jpg', 'n12_124357.jpg'),
(9, 'Loki Season 2', 'lokiname_124647.png', '2', 'loki-s2-poster_124647.jpg', 'loki-s2_124647.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'j1_124647.jpg', 'j2_124647.jpg', 'j3_124647.jpg', 'j4_124647.jpg', 'j5_124647.jpg', 'j6_124647.jpg', 'j7_124647.jpg', 'j8_124647.jpg', 'j9_124647.jpg', 'j10_124647.jpg', 'j11_124647.jpg', 'j12_124647.jpg'),
(10, 'Secret Invasion', 'secret_invasion_124822.png', '2', 'secret-invasion-poster_124823.jpg', 'secret-invasion_124823.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'l1_124823.jpg', 'l2_124823.jpg', 'l3_124823.jpg', 'l4_124823.jpg', 'l6_124823.jpg', 'l5_124823.jpg', 'l7_124823.jpg', 'l8_124823.jpg', 'l9_124823.jpg', 'l10_124823.jpg', 'l11_124823.jpg', 'l12_124823.jpg'),
(11, 'The Guardians of the Galaxy : Holiday Special', 'gogname_133411.png', '2', 'guardians-poster_125003.jpg', 'guardians_125003.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'I am Groot Season 2', 'grootname_125148.png', '2', 'i-groot-s2-poster_125148.jpg', 'i-groot-s2_125148.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'k1_125148.jpg', 'k2_125148.jpg', 'k3_125148.jpg', 'k4_125148.jpg', 'k5_125148.jpg', 'k6_125148.jpg', 'k7_125148.jpg', 'k8_125148.jpg', 'k9_125148.jpg', 'k10_125148.jpg', 'k11_125148.jpg', 'k12_125148.jpg'),
(13, 'She Hulk', 'shehulkname_125313.png', '2', 'she-hulk-poster_125313.jpg', 'she-hulk_125313.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'i1_125313.jpg', 'i2_125313.jpg', 'i3_125313.jpg', 'i4_125313.jpg', 'i5_125313.jpg', 'i6_125313.jpg', 'i8_125313.jpg', 'i7_125313.jpg', 'i9_125313.jpg', 'i10_125313.jpg', 'i11_125313.jpg', 'i12_125313.jpg'),
(14, 'What If ?', 'whatif_125542.png', '2', 'what-if-s1-poster_125542.jpg', 'what-if-s1_125542.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'd1_125542.jpg', 'd2_125542.jpg', 'd3_125542.jpg', 'd4_125542.jpg', 'd5_125542.jpg', 'd6_125542.jpg', 'd7_125542.jpg', 'd8_125542.jpg', 'd9_125542.jpg', 'd10_125542.jpg', 'd11_125542.jpg', 'd12_125542.jpg'),
(15, 'MoonKnight ', 'moonknightname_125634.png', '2', 'moonknight-poster_125634.jpg', 'moonknight_125634.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'a1_125634.jpg', 'a2_125634.jpg', 'a3_125634.jpg', 'a4_125634.jpg', 'a5_125634.jpg', 'a6_125634.jpg', 'a7_125634.jpg', 'a8_125634.jpg', 'a9_125634.jpg', 'a10_125634.jpg', 'a11_125634.jpg', 'a12_125634.jpg'),
(16, 'I am Groot', 'grootname_125759.png', '2', 'i-groot-s1-poster_125759.jpg', 'i-groot-s1_125759.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'h1_125759.jpg', 'h2_125759.jpg', 'h3_125759.jpg', 'h4_125759.jpg', 'h5_125759.jpg', 'h6_125759.jpg', 'h7_125759.jpg', 'h8_125759.jpg', 'h9_125759.jpg', 'h10_125759.jpg', 'h11_125759.jpg', 'h12_125759.jpg'),
(17, 'Ms Marvel', 'msmarvelname_125948.png', '2', 'ms-marvel-poster_125948.jpg', 'ms-marvel_125948.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'f1_125948.jpg', 'f2_125948.jpg', 'f3_125948.jpg', 'f4_125948.png', 'f5_125948.png', 'f6_125948.png', 'f7_125948.jpg', 'f8_125948.jpg', 'f9_125948.png', 'f10_125948.jpg', 'f11_125948.jpg', 'e12_125948.jpg'),
(18, 'Hawkeye', 'hawkeye_130046.png', '2', 'hawkeye-poster_130046.jpg', 'hawkeye_130046.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'e1_130046.png', 'e2_130046.png', 'e4_130046.jpg', 'e3_130046.jpg', 'e5_130046.jpg', 'e6_130046.jpg', 'e7_130046.png', 'e8_130046.png', 'e9_130046.jpg', 'e10_130046.jpg', 'e11_130046.jpg', 'e12_130046.jpg'),
(19, 'What If ? 2', 'whatif_130154.png', '2', 'what-if-s2-poster_130154.jpg', 'what-if-s2_130154.jpeg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'm1_130154.jpg', 'm2_130154.png', 'm3_130154.jpg', 'm4_130154.jpg', 'm5_130154.jpg', 'm6_130154.jpg', 'm7_130154.jpg', 'm9_130154.jpg', 'm8_130154.jpg', 'm10_130154.jpg', 'm11_130154.jpg', 'm12_130154.jpg'),
(20, 'WandaVision', 'wandavision_130321.png', '2', 'wanda-vision-poster_130321.jpg', 'wanda-vision_134021.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'b1_130321.jpg', 'b2_130321.jpg', 'b3_130321.jpg', 'b4_130321.jpg', 'b5_130321.jpg', 'b6_130321.jpg', 'b7_130321.jpg', 'b8_130321.jpg', 'b9_130321.jpg', 'b10_130321.jpg', 'b11_130321.jpg', 'b12_130321.jpg'),
(21, 'The Falcon and The Winter Soldier', 'falconwinsolname_130442.png', '2', 'winter-falcon-poster_130442.jpg', 'winter-falcon_130442.jpg', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'c1_130442.jpg', 'c2_130442.jpg', 'c3_130442.jpg', 'c4_130442.jpg', 'c5_130442.jpg', 'c6_130442.jpg', 'c7_130442.jpg', 'c8_130442.jpg', 'c10_130442.jpg', 'c9_130442.jpg', 'c11_130442.jpg', 'c12_130442.jpg'),
(22, 'Hit Monkey', '', '4', 'x8_130517.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Runaways', '', '4', 'x1_130539.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Gifted', '', '4', 'x2_130554.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'Cloak Dagger', '', '4', 'x5_130629.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Legion', '', '4', 'x6_130645.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Modok', '', '4', 'x7_130713.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Agent Carter', '', '5', 'x3_130745.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Agents of Shield', '', '5', 'x4_130825.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'Punisher', '', '5', 'x9_130840.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 'Daredevil ', '', '5', 'x10_130854.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Defenders', '', '5', 'x11_130916.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Inhumans', '', '5', 'x12_130928.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Ironfist', '', '5', 'x13_130946.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Jessica Jones', '', '5', 'x14_131003.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'Luck Cage', '', '5', 'x15_131022.jpg', '', 'WATCH NOW', 'marvel.com', 'marvel.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 'Loki ', 'lokiname_133809.png', '2', 'loki-s1-poster_133809.jpg', 'g1_133941.jpg', 'WATCH NOW', 'marvel.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum amet do', 'Joe Russo', 'Stan Lee', 'Lgt+5', '171mins', '2021-05-11', 'g2_133809.jpg', 'g1_133809.jpg', 'g3_133809.jpg', 'g4_133809.jpg', 'g5_133809.jpg', 'g6_133809.jpg', 'g7_133809.jpg', 'g8_133809.jpg', 'g9_133809.jpg', 'g10_133809.jpg', 'g11_133809.jpg', 'g12_133809.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `unlimited_comic`
--

CREATE TABLE IF NOT EXISTS `unlimited_comic` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `btn_name` varchar(25) NOT NULL,
  `btn_link` varchar(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `author` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `unlimited_comic`
--

INSERT INTO `unlimited_comic` (`id`, `image`, `title`, `description`, `btn_name`, `btn_link`, `date`, `author`) VALUES
(1, 'comic_20240129124120.jpg', 'NEW ON MARVEL <br> UNLIMITED', 'Read these plus 30,000+ digital comics for $9.99 a\r\nmonth!', 'GET MARVEL UNLIMITED', 'marvel.com', '09 May 202', 'cynthia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `c_password` varchar(8) NOT NULL,
  `contact` int(10) NOT NULL,
  `doj` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `image`, `fname`, `lname`, `email`, `username`, `password`, `c_password`, `contact`, `doj`) VALUES
(10, 'kate bishop_20240201060253.jpg', 'Cynthia', 'Patel', 'cyn@as.as', 'cynthia1', '11111111', '11111111', 1111111119, '01 Feb 202'),
(12, 'amazing-spiderman_20240509194305.jpg', 'Manan', 'Patel', 'manan@gmail.com', 'manancyn', '22222222', '22222222', 2147483647, '09 May 202');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
