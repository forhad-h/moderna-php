-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 08:27 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moderna_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_banners`
--

CREATE TABLE `m_banners` (
  `b_id` int(11) NOT NULL,
  `b_heading` varchar(50) NOT NULL,
  `b_description` text NOT NULL,
  `b_img` varchar(50) NOT NULL,
  `b_cta` varchar(33) NOT NULL,
  `b_url` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_banners`
--

INSERT INTO `m_banners` (`b_id`, `b_heading`, `b_description`, `b_img`, `b_cta`, `b_url`) VALUES
(1, 'Clean & Fast', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit donec mer lacinia.', 'banner-1511273117-616401.jpg', 'LEARN MORE', '#'),
(2, 'Fully Responsive', 'Sodales neque vitae justo sollicitudin aliquet sit amet diam curabitur sed fermentum.', 'banner-1511273160-739130.jpg', 'LEARN MORE', '#'),
(3, 'Modern Design', 'Duis fermentum auctor ligula ac malesuada. Mauris et metus odio, in pulvinar urna', 'banner-1511273188-120215.jpg', 'LEARN MORE', '#');

-- --------------------------------------------------------

--
-- Table structure for table `m_cmessage`
--

CREATE TABLE `m_cmessage` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_subject` varchar(50) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_cmessage`
--

INSERT INTO `m_cmessage` (`c_id`, `c_name`, `c_email`, `c_subject`, `c_message`) VALUES
(1, 'Donec', 'donec@eget.com', 'Nulla tristique finibus aliquam.', 'Quisque finibus vulputate consectetur. Sed volutpat porttitor est aliquam feugiat. Aliquam nibh lectus, viverra ac ex ut, eleifend sollicitudin mauris. Sed eu rhoncus diam. Nullam orci odio, hendrerit molestie urna quis, dignissim pulvinar felis. Morbi mollis massa id augue pellentesque gravida.'),
(2, 'Pretium ', 'pretium@gmail.com', 'Nam pretium magna sed posuere iaculis.', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer leo urna, suscipit eget finibus eget, sollicitudin in sem. Duis sapien lorem, bibendum vitae elementum at, scelerisque ac purus. Donec consequat ante ac metus laoreet fermentum. Fusce placerat diam at pharetra rhoncus. Phasellus ac ultrices purus. Aenean vel lacus neque. In nec tristique neque. In in justo consequat felis facilisis ultrices. Morbi vel sapien est. Duis suscipit, sem non mattis porttitor, tellus lacus volutpat sem, non maximus risus orci ut mauris. Pellentesque lacus eros, euismod at tempus non, hendrerit ac nisl. Pellentesque eu imperdiet elit, eget blandit eros.');

-- --------------------------------------------------------

--
-- Table structure for table `m_features`
--

CREATE TABLE `m_features` (
  `f_id` int(11) NOT NULL,
  `f_heading` varchar(80) NOT NULL,
  `f_description` text NOT NULL,
  `f_icon` varchar(40) NOT NULL,
  `f_url` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_features`
--

INSERT INTO `m_features` (`f_id`, `f_heading`, `f_description`, `f_icon`, `f_url`) VALUES
(1, 'Valid HTML5', 'Voluptatem accusantium doloremque laudantium sprea totam rem aperiam. ', 'fa fa-code fa-3x', '#'),
(2, 'Customizable', 'Voluptatem accusantium doloremque laudantium sprea totam rem aperiam. ', 'fa fa-edit fa-3x', '#'),
(3, 'Modern Style', 'Voluptatem accusantium doloremque laudantium sprea totam rem aperiam. ', 'fa fa-pagelines fa-3x', '#'),
(4, 'Fully responsive', 'Voluptatem accusantium doloremque laudantium sprea totam rem aperiam. ', 'fa fa-desktop fa-3x', '#');

-- --------------------------------------------------------

--
-- Table structure for table `m_menus`
--

CREATE TABLE `m_menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(33) NOT NULL,
  `menu_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_menus`
--

INSERT INTO `m_menus` (`menu_id`, `menu_name`, `menu_url`) VALUES
(1, 'Home', 'index.php'),
(2, 'Features', 'features.php'),
(3, 'Portfolio', 'portfolio.php'),
(4, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `m_others`
--

CREATE TABLE `m_others` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(50) NOT NULL,
  `o_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_others`
--

INSERT INTO `m_others` (`o_id`, `o_name`, `o_value`) VALUES
(1, 'site-heading', '<span>Moderna</span> HTML Business Template.');

-- --------------------------------------------------------

--
-- Table structure for table `m_portfolio`
--

CREATE TABLE `m_portfolio` (
  `p_id` int(11) NOT NULL,
  `p_img` varchar(40) NOT NULL,
  `p_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_portfolio`
--

INSERT INTO `m_portfolio` (`p_id`, `p_img`, `p_url`) VALUES
(1, 'portfolio-1511273602-851537.jpg', '#'),
(2, 'portfolio-1511273628-27600.jpg', '#'),
(3, 'portfolio-1511273642-674955.jpg', '#'),
(4, 'portfolio-1511273651-767403.jpg', '#'),
(5, 'portfolio-1511273660-891983.jpg', '#'),
(6, 'portfolio-1511273664-685191.jpg', '#'),
(7, 'portfolio-1511273670-946643.jpg', '#'),
(8, 'portfolio-1511273675-739123.jpg', '#');

-- --------------------------------------------------------

--
-- Table structure for table `m_roles`
--

CREATE TABLE `m_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_roles`
--

INSERT INTO `m_roles` (`role_id`, `role_name`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `m_users`
--

CREATE TABLE `m_users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `user_website` varchar(80) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_avatar` varchar(50) NOT NULL,
  `reg_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_users`
--

INSERT INTO `m_users` (`user_id`, `user_firstname`, `user_lastname`, `user_username`, `user_password`, `user_email`, `user_website`, `role_id`, `user_gender`, `user_avatar`, `reg_time`) VALUES
(1, 'Forhad', 'Hosain', 'forhad', '1bbd886460827015e5d605ed44252251', 'forhad@gmail.com', '', 1, 'male', 'user-1511272374-96906.jpg', '21 Nov 2017 07:51:59pm'),
(2, 'Mr. A', 'Ahmed', 'ahmed', '1bbd886460827015e5d605ed44252251', 'ahmed@gmail.com', 'http://www.aahmed.com', 2, 'male', 'user-1511272680-639703.jpg', '21 Nov 2017 07:56:36pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_banners`
--
ALTER TABLE `m_banners`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `m_cmessage`
--
ALTER TABLE `m_cmessage`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `m_features`
--
ALTER TABLE `m_features`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `m_menus`
--
ALTER TABLE `m_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `m_others`
--
ALTER TABLE `m_others`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `m_portfolio`
--
ALTER TABLE `m_portfolio`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `m_roles`
--
ALTER TABLE `m_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_banners`
--
ALTER TABLE `m_banners`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_cmessage`
--
ALTER TABLE `m_cmessage`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_features`
--
ALTER TABLE `m_features`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_menus`
--
ALTER TABLE `m_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_others`
--
ALTER TABLE `m_others`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_portfolio`
--
ALTER TABLE `m_portfolio`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `m_roles`
--
ALTER TABLE `m_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_users`
--
ALTER TABLE `m_users`
  ADD CONSTRAINT `m_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `m_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
