-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 04:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_storage`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `album_id` varchar(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `album_songs`
--

CREATE TABLE `album_songs` (
  `id` int(11) NOT NULL,
  `album_id` varchar(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `user_id`, `title`, `image`, `path`, `body`, `published`, `created_at`) VALUES
(1, 2, 'suppreme hela', 'DeadPool.png', '', 'helanova', 1, '2021-07-31 23:26:18'),
(2, 1, 'mjizo musik', 'Ant-Man.png', '', 'helanova', 1, '2021-07-31 23:28:49'),
(3, 3, 'Trace', 'IronMan.png', '', 'feelings', 1, '2021-07-31 23:28:49'),
(4, 1, 'suppreme', '70032.jpg', '', '&lt;p&gt;d&lt;/p&gt;', 0, '2021-08-13 18:01:30'),
(5, 1, 'mutshidza muenda', '20190618_154626 (1).jpg', '', '&lt;p&gt;thee best&lt;/p&gt;', 0, '2021-08-13 18:01:51'),
(6, 1, 'rendani', '20190618_174142.jpg', '', 'mued', 0, '2021-08-14 22:20:07'),
(7, 1, 'cass', '20210117_094220.jpg', '', '&lt;p&gt;is the best&lt;/p&gt;', 0, '2021-08-29 12:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`) VALUES
(1, 'Rap', '<p>a</p>'),
(2, 'Jazz', '<p>great</p>');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artist_id` varchar(255) DEFAULT NULL,
  `genre_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `user_id`, `artist_id`, `genre_id`, `album_id`, `image`, `path`, `body`, `published`, `created_at`) VALUES
(1, 1, '1', 1, 0, 'Malume Ep Cover Art.jpg', '02. Hezwi Ndi Nae [prod. SOTT].mp3', 'mk', 1, '2022-06-15 23:41:34'),
(2, 1, '1', 1, 0, 'Malume Ep Cover Art.jpg', '01. Memories Never End [prod. SOTT].mp3', '', 1, '2022-06-15 23:42:04'),
(3, 1, '1', 1, 0, 'Malume Ep Cover Art.jpg', '03. Be Mine [prod. SOTT].mp3', '', 1, '2022-06-15 23:42:20'),
(4, 1, '1', 1, 0, 'Malume Ep Cover Art.jpg', '04. Naledzi Masase [prod. SOTT].mp3', '', 1, '2022-06-15 23:42:35'),
(5, 1, '1', 1, 0, 'Malume Ep Cover Art.jpg', '05. No Pressure [prod. SOTT].mp3', '', 1, '2022-06-15 23:42:46'),
(6, 1, '1', 1, 0, 'Malume Ep Cover Art.jpg', '06. Zwoto Fhela [prod. SOTT].mp3', '', 1, '2022-06-15 23:42:57'),
(7, 1, '1', 1, 0, 'Cover Art the Blvck Moses ep.jpg', '01. Nimpha Lufuno (ft. Phophi x Pixey x Lee).mp3', '', 1, '2022-06-15 23:44:33'),
(8, 1, '1', 1, 0, 'Cover Art the Blvck Moses ep.jpg', '02. Slidin in yo DM.mp3', '', 1, '2022-06-15 23:44:47'),
(9, 1, '1', 1, 0, 'Cover Art the Blvck Moses ep.jpg', '03. Fed Up.mp3', '', 1, '2022-06-15 23:45:09'),
(10, 1, '1', 1, 0, 'Cover Art the Blvck Moses ep.jpg', '04. Naku Penda (ft. Missy Fab).mp3', '', 1, '2022-06-15 23:45:20'),
(11, 1, '1', 2, 0, '', '12. S.I.C.K.mp3', '', 1, '2022-06-16 00:00:45'),
(12, 1, '1', 2, 0, 'Tracklist the Blvck Moses.jpg', '13. Cheq Who\'s Baq (Bonus).mp3', '', 1, '2022-06-16 00:01:39'),
(13, 1, '1', 2, 0, '389631.jpg', '58b068985e9e4155bfffb14b119be9cb.mp4', '', 1, '2022-06-16 00:02:53'),
(14, 1, 'mojo', 1, 0, '203956.jpg', '01.Scorpion Kings - Ithemba\'lam ft Shasha.mp3', '&lt;p&gt;,,,&lt;/p&gt;', 1, '2022-06-16 10:34:16'),
(15, 1, 'mutshidza', 0, 0, '20190221_132537.jpg', '58b068985e9e4155bfffb14b119be9cb.mp4', '', 1, '2022-06-17 10:43:57'),
(16, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(17, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(18, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(19, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(20, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(21, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(22, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(23, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(24, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(25, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(26, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(27, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(28, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(29, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(30, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(31, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(32, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(33, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(34, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57'),
(35, 1, NULL, 0, 0, '', 'mojoojoj', '', 0, '2022-06-17 14:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `uid`, `title`) VALUES
(1, 1, 'mk'),
(2, 1, '&lt;p&gt;mk&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `admin`, `email`, `verified`, `token`, `password`, `image`) VALUES
(1, 'mutshidza', 1, 'Mchizakingsley@gmail.com', 1, 'df009547e3c4d07da00c6e846ec138cc2bfdf88ad6838cf7853ba7e6ae06199f0fd037d94ca532060d915b346f8a8f524868', '$2y$10$7LurBeNEhwre8fH3WBvJvus33CnFXGdvwvp.zP.eYTmM3lMktj3X6', '1628897060_20190620_171400.jpg'),
(2, 'muneiwa', 0, 'rendi@m.co', 0, '8a42e01dc6ca53517d3add4613a098f7851759ff41eb8fed61dbbc81deb11bfa24235464677290d21e904c2bc583711ae751', '$2y$10$/.3ROGX9N9cI/qjP5mYrOOTBX9E1xZqc44sjrzbvnSMkWcJq1FyPW', '1628993029_20190618_154626.jpg'),
(3, 'rendani', 0, 'rendi1@mk.com', 0, 'c6d2e099b117ddaf9c23dd8f8df90a1bfb36696939ad15386f0b4f23fa4b158a66a87d66051b7e198ec08973758d243abd8f', '$2y$10$PHYlCwm2xDHrtx5ga1IOD.H.tdccmdLWAALc.9W6ZswbTDoUk5spW', '1628995659_203956.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_songs`
--
ALTER TABLE `album_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`artist_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `album_songs`
--
ALTER TABLE `album_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
