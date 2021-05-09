-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 11:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websecurity`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `post_date` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `author`, `post_date`, `content`) VALUES
(1, 'Corona Virus Melanda Russia', 'Dionysius Sentausa', 1583517990, 'Hari ini, Corona virus telah melanda berbagai daerah di Indonesia. Daerah-daerah tersebut sangat mengkhawatirkan'),
(4, 'Indonesia maju', 'Super Admin', 1583513638, 'berkembanglah sebenarnya'),
(5, 'STILL WORKING IN MIDNIGHT ?', 'Super Admin', 1583513821, 'WHATT STILL WORKING?'),
(15, 'Sabtu Pagi', 'Super Admin2', 1583567556, 'Sabtu pagiii harii lagii yay'),
(16, '[removed]HELLO', 'Super Admin2', 1583568481, '[removed][removed]'),
(22, 'Testing google', 'Dionysius Sentausa', 1583584071, 'google 1234'),
(23, '[removed]23', 'Dionysius Sentausa', 1583584115, '[removed]abc[removed]'),
(24, 'Testing twitter', 'Dionysius Sentausa', 1583584522, 'Twitter'),
(25, 'a', 'Dionysius Sentausa', 1583584624, 'b'),
(26, 'Jepri tes', 'Jepri', 1583584794, '123456'),
(33, 'asd', 'tes6', 1583591499, 'asd'),
(34, '', 'tes6', 1583591650, 'asd'),
(35, 't', 'tes6', 1583592434, '&lt;html&gt;alert&lt;/html&gt;'),
(36, 'alrtt', 'tes6', 1583592476, '[removed]alert&#40;\"Hello\"&#41;[removed]'),
(37, 'asbcsd', 'tes6', 1583592964, '<a href=\"admin/\">link</a>'),
(38, 'HTML INJECTION', 'tes6', 1583593411, '<a href=\"#\">HTML INJECTED!</a>'),
(39, 'HTMLSPECIALCHARS', 'tes6', 1583593584, '&lt;a&gt;Html Injected ! &lt;/a&gt;'),
(41, 'xss &amp; html inject 1', 'Super Admin', 1583594831, '[removed]alert&amp;#40;&quot;alert&quot;&amp;#41;[removed]\r\n&lt;a href = &quot;#&quot;&gt;link &lt;/a&gt;'),
(42, 'xss and html inject 2', 'Super Admin', 1583594961, '&lt;a href=&quot;#&quot;&gt;onclick()   &lt;/a&gt;\r\n[removed]\'\'\'[removed]'),
(43, 'session', 'Dionysius Sentausa', 1583650648, 'trying session'),
(44, 'abc', 'Dionysius Sentausa', 1583654092, 'def'),
(45, 'aaa', 'Dionysius Sentausa', 1583654234, 'bbb'),
(46, 'asd', 'Dionysius Sentausa', 1583655332, 'abc'),
(47, 'tessessio', 'Dionysius Sentausa', 1583655362, '1583655303'),
(48, 'xxxsss', 'Dionysius Sentausa', 1583655442, 'xss  1583655303'),
(49, 'abcdefghjzzz', 'Dionysius Sentausa', 1583655522, 'diodion'),
(50, 'abacascsabsabsagsa', 'Dionysius Sentausa', 1583655604, '12121221211221'),
(52, 'Kitatulis.com', 'coba123', 1583681788, 'Latihan menulis'),
(53, 'Penambahan Judul', 'Dionysius Sentausa', 1583688263, 'DiTambah Konten'),
(55, 'Udah kelar kelas', 'Pak benny', 1583728441, '1231456'),
(56, 'abc', 'Pak benny', 1583728472, '&lt;a href=&quot;#&quot;&gt;LINK&lt;/a&gt;'),
(57, 'def', 'Pak benny', 1583728515, '[removed]alert&amp;#40;&quot;Alert&quot;&amp;#41;[removed]');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `email`, `image`, `password`, `date_created`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'default.jpg', '$2y$12$6.gl.hg2rZaCDWS4RbtK/Ow2DnhLshhDrldB9Xa6x0E0bwQTxl6W6', 1583340413),
(2, 'Super Admin2', 'admin2@gmail.com', 'default1.jpg', '$2y$12$6.gl.hg2rZaCDWS4RbtK/Ow2DnhLshhDrldB9Xa6x0E0bwQTxl6W6', 1583340413);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Dionysius Sentausa', 'jayasentausa@gmail.com', 'default.jpg', '$2y$10$beIQKkNRc6C6NRabcYKrY.OvVaCCSGf1RKLcBKCPIFRtZ9eRGZYHK', 2, 1, 1583340413),
(10, 'Jepri', 'jeprisafsafsa@gmail.com', 'default.jpg', '$2y$10$PA1j63u8fKv82/V825TpYuEL9i9ukPmPMG.sJz2AOvqn7jaCfbsIy', 2, 2, 1583374873),
(11, 'Joshua', 'joshua@gmail.com', 'default.jpg', '$2y$10$VLSr.I.XVwTDHPqjuJckU.iTrlfjoYoa9h66X9E1Wzp7yfhZYouk.', 2, 0, 1583477204),
(13, 'Daniel', 'daniel@gmail.com', 'default.jpg', '$2y$10$RIOHG25GIWnE1Mjh4TObOucNeSsx8T7V1HyelR.vSzPECQkYwNHRa', 2, 2, 1583538044),
(14, 'Anggur Merah', 'anggur@gmail.com', 'default.jpg', '$2y$10$RDHG6aVBryhi3pEb0kUlnuf2a4N8ReHcDbS8HVDc0lyGI.bI36k0.', 2, 2, 1583557958),
(16, 'Test2', 'tes@gmail.com', 'default.jpg', '$2y$10$HGeX7.8l6s8xevY0A.refOaUERNv.2Y9pp5rTcHxwo06pSi0R.Z0.', 2, 0, 1583590876),
(17, 'tes3', 'tes3@gmail.com', 'default.jpg', '$2y$10$EFO9c.EU89cCco0VIndbyuxynVkkjUsRbrIfPt8GDIIREquNraz0W', 2, 0, 1583590955),
(18, 'tes5', 'tes5@gmail.com', 'default.jpg', '$2y$10$T8F4XiIsJDq7SeCRP59mw.M/s/NDcGBl.h9cQ36q6Xe/WS5.Qib1W', 2, 0, 1583591086),
(19, 'tes6', 'tes6@gmail.com', 'default.jpg', '$2y$10$KOyM2Y1Q80/O/28oD5.YzO9aSczk9axqh0CARqHsteg9Mk7rmbsHm', 2, 1, 1583591195),
(21, 'Tugas Kuliah', 'tugas@gmail.com', 'default.jpg', '$2y$10$TrxJjt.QofVSuWDSXQs4QepTIjgtMbe0LXVO3/q.8WgR6/KFfq.cq', 2, 2, 1583680269),
(23, 'Pak benny', 'benny@gmail.com', 'default.jpg', '$2y$10$r9l7svZpBV.GzcztA8OoQucGEC.E8pBks0r3YxgMHG2iEBmspb/fy', 2, 1, 1583727670),
(24, 'Anbang321', 'anbang321@gmail.com', 'default.jpg', '$2y$10$q7ZNseDcCqKheoXp3rIDneOfWvDI/l4/dNk6/UZ5o5y77vK/HKlzK', 2, 0, 1583916297);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
