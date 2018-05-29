-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 01:42 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thanzi`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `address` varchar(80) NOT NULL,
  `gender` char(1) NOT NULL,
  `age` int(3) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(30) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`name`, `surname`, `address`, `gender`, `age`, `phone_number`, `email`, `password`, `img`) VALUES
('ab', 'ab', 'ab', 'a', 1, 'ab', 'a@b.c', 'abc', 'img/dp1.png'),
('name', 'surname', 'no address', 'm', 27, '0000000000', 'me@mail.com', 'nopassword', 'img/dp1.png');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` varchar(30) NOT NULL,
  `user_1` varchar(30) NOT NULL,
  `user_2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `user_1`, `user_2`) VALUES
('a@b.c&c&my@mail.com', 'a@b.c', 'my@mail.com'),
('a@b.c@me@mail.com', 'a@b.c', 'me@mail.com'),
('me@mail.com&c&my@mail.com', 'me@mail.com', 'my@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_id` varchar(30) NOT NULL,
  `conversation_id` varchar(30) NOT NULL,
  `user_to` varchar(30) NOT NULL,
  `user_from` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_id`, `conversation_id`, `user_to`, `user_from`, `date`, `time`, `message`) VALUES
('543', '6756453', 'a@b.c', 'me@mail.com', '2018-03-22', '05:12:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `med_prac`
--

CREATE TABLE `med_prac` (
  `med_prac_id` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `home_address` varchar(35) NOT NULL,
  `operating_address` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `age` char(3) NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(40) NOT NULL,
  `rating` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_prac`
--

INSERT INTO `med_prac` (`med_prac_id`, `name`, `surname`, `home_address`, `operating_address`, `email`, `phone_number`, `age`, `gender`, `password`, `rating`, `img`) VALUES
('mp1', 'myname', 'mysurname', 'my address', 'my operating address', 'my@mail.com', '014523695', '29', 'f', 'qwertty', 4.5, 'img/dp1.png');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `med_prac_id` int(30) NOT NULL,
  `fee` float NOT NULL,
  `treatment_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `treatment_id` varchar(30) NOT NULL,
  `med_prac_id` varchar(30) NOT NULL,
  `treatment_title` text NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`treatment_id`, `med_prac_id`, `treatment_title`, `description`) VALUES
('my@mail.com2018-03-2742-42-06', 'my@mail.com', 'ekjr', 'elkjtl'),
('my@mail.com2018-03-2743-43-06', 'my@mail.com', 'jlf', 'ljr'),
('my@mail.com2018-03-2746-42-06', 'my@mail.com', 'kjer', 'ljeff'),
('my@mail.com2018-03-2805-32-09', 'my@mail.com', 'test', 'tester'),
('my@mail.com2018-03-2809-28-09', 'my@mail.com', 'ttle', 'descppxn'),
('my@mail.com2018-03-2824-28-09', 'my@mail.com', 'ttle', 'descppxn'),
('my@mail.com2018-03-2841-32-09', 'my@mail.com', 'test', 'tester'),
('t0001', 'm_p0001', 'first treatemnt', 'this is the frist treatment'),
('t0002', 'm_p0002', 'second treatment', 'this is the second treatment ...........'),
('t_005', 'm_p0003', 'som\'n', 'crazy stuff');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_history`
--

CREATE TABLE `treatment_history` (
  `treatment_id` varchar(30) NOT NULL,
  `client_condition` varchar(30) NOT NULL,
  `descritpion` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `completed?` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_requests`
--

CREATE TABLE `treatment_requests` (
  `client_id` varchar(30) NOT NULL,
  `client_condition` varchar(80) NOT NULL,
  `date_posted` date NOT NULL,
  `condition_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_requests`
--

INSERT INTO `treatment_requests` (`client_id`, `client_condition`, `date_posted`, `condition_id`) VALUES
('a@b.c', 'i am illllllll', '0000-00-00', 'a@b.c07-05-201802-20-55'),
('me@mail.com', 'i am not okayyyyy', '0000-00-00', 'me@mail.com07-05-201802-21-22'),
('me@mail.com', 'definitely not okay', '0000-00-00', 'me@mail.com07-05-201802-21-29'),
('a@b.c', 'i am sick illllllllll', '0000-00-00', 'a@b.c07-05-201802-23-11'),
('a@b.c', 'i have a flu or somethiong', '0000-00-00', 'a@b.c25-04-201801-20-52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`),
  ADD UNIQUE KEY `conversation_id` (`conversation_id`);

--
-- Indexes for table `med_prac`
--
ALTER TABLE `med_prac`
  ADD PRIMARY KEY (`med_prac_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `treatment_history`
--
ALTER TABLE `treatment_history`
  ADD PRIMARY KEY (`treatment_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
