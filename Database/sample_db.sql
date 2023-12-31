-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 06, 2023 at 02:50 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `artistImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `description`, `artistImage`) VALUES
(1, 'New Jeans', 'NewJeans (Korean: 뉴진스; RR: Nyujinseu) is a South Korean girl group formed by ADOR. The group is composed of five members: Minji, Hanni, Danielle, Haerin and Hyein. ', 'newjeans.jpg'),
(2, 'Neck Deep', 'Neck Deep are a Welsh pop-punk band from Wrexham, formed in 2012. Founded after vocalist Ben Barlow met former lead guitarist Lloyd Roberts, the pair posted a song online under the name Neck Deep.', 'neckdeep.jpg'),
(3, 'Coldplay', 'Coldplay are a British rock band formed in London in 1997. They consist of vocalist and pianist Chris Martin, guitarist Jonny Buckland, bassist Guy Berryman, drummer Will Champion and manager Phil Harvey', 'coldplay.jpg'),
(4, 'Fujii Kaze', 'Fujii Kaze is a Japanese singer-songwriter and musician under Universal Music Japan. Raised in Satoshō, Okayama in Japan, he began uploading covers to YouTube since the age of 12', 'fujiikaze.jpg'),
(39, 'Frank Sinatra', 'Francis Albert Sinatra was an American singer and actor. Nicknamed the \"Chairman of the Board\" and later called \"Ol\' Blue Eyes\", he is regarded as one of the most popular entertainers of the mid-20th century.', 'franksinatra.jpg'),
(41, 'Frank Ocean', 'Christopher Francis Ocean is an American singer, songwriter, and rapper. His works are noted by music critics for featuring avant-garde styles and introspective, elliptical lyrics.', 'frankocean.jpg'),
(42, 'BLACKPINK', 'Blackpink is a South Korean girl group formed by YG Entertainment, consisting of members Jisoo, Jennie, Rosé, and Lisa. ', 'blackpink.jpg\r\n'),
(43, 'Atarashii Gakko!', 'Blackpink is a South Korean girl group formed by YG Entertainment, consisting of members Jisoo, Jennie, Rosé, and Lisa. ', 'atarashiigakko.jpg\r\n'),
(44, 'Tulus', 'Muhammad Tulus or better known by his mononym Tulus is an Indonesian singer and actor of Minangkabau descent.', 'tulus.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `likedSong`
--

CREATE TABLE `likedSong` (
  `userName` varchar(255) NOT NULL,
  `idSong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likedSong`
--

INSERT INTO `likedSong` (`userName`, `idSong`) VALUES
('test1234', 9),
('test1234', 11),
('test1234', 22);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `artistID` int NOT NULL,
  `genre` varchar(255) NOT NULL,
  `coverImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `title`, `artistID`, `genre`, `coverImage`, `audio`) VALUES
(1, 'Super duper Shy', 1, 'K-Pop', 'supershy.png', 'supershy-newjeans.mp3'),
(4, 'ASAP', 1, 'K-Pop', 'supershy.png', 'asap-newjeans.mp3'),
(5, 'December', 2, 'Alternative', 'december.jpg', 'december-neckdeep.mp3'),
(6, 'Everglow', 3, 'Alternative', 'everglow.jpg', 'everglow-coldplay.mp3'),
(7, 'Kirari', 4, 'J-Pop', 'kirari.jpg', 'fujiikaze-kirari.mp3'),
(9, 'Fix You', 3, 'Pop', 'fixyou.jpg', 'Coldplay - Fix You (Official Video).mp3'),
(10, 'Yellow', 3, 'Pop', 'yellow.jpg', 'Coldplay - Yellow (Official Video).mp3'),
(11, 'Viva La Vida', 3, 'Pop', 'vivalavida.jpg', 'Coldplay - Viva La Vida (Official Video).mp3'),
(19, 'Hymn For The Weekend', 3, 'Pop', 'everglow.jpg', 'Coldplay - Hymn For The Weekend (Official Video).mp3'),
(20, 'Fun', 3, 'Pop', 'everglow.jpg', 'Fun (feat. Tove Lo).mp3'),
(22, 'Pink White', 41, 'Pop', 'pinkwhite.jpg', 'Frank Ocean - Pink  White.mp3'),
(23, 'Ivy', 41, 'Pop', 'pinkwhite.jpg', 'Frank Ocean - Ivy.mp3'),
(24, 'Lost', 41, 'Alternative', 'lost.png', 'Frank Ocean - Lost (Lyrics).mp3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `displayName` varchar(255) NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'App/Public/image/profile/default.jpg',
  `role` varchar(255) NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `password`, `displayName`, `profilePicture`, `role`, `bio`) VALUES
('admin1234', '$2y$10$HytSKwY/PITCB0W8NjZ8gOBP4VWkrbG94/Lp/KxO9rDYMOYxz0y9O', 'admin1234', 'default.jpg', 'admin', NULL),
('test1234', '$2y$10$fwAwZYzdWrjyUHj4O5idyu259MYPd7hFZUY67z4uYeolnL3O.cdiy', 'Satria Octavianus Nababan', 'default.jpg', 'user', 'Teknik Informatika 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likedSong`
--
ALTER TABLE `likedSong`
  ADD PRIMARY KEY (`userName`,`idSong`),
  ADD KEY `idSong` (`idSong`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistID` (`artistID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likedSong`
--
ALTER TABLE `likedSong`
  ADD CONSTRAINT `likedSong_ibfk_1` FOREIGN KEY (`idSong`) REFERENCES `song` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likedSong_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`artistID`) REFERENCES `artist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
