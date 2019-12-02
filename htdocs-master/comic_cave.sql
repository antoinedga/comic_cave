-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 12:04 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comic_cave`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='holds artist names';

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `first_name`, `last_name`) VALUES
(1, 'Doug', 'Mahnke'),
(2, 'Tim', 'Sale'),
(3, 'Andrea', 'Di Vito'),
(4, 'Osamu', 'Tezuka'),
(5, 'Kentaro', 'Miura'),
(6, 'Brian', 'Bolland'),
(7, 'Jeremy', 'Haun'),
(8, 'Jim', 'Lee'),
(9, 'David', 'Mazucchelli'),
(10, 'Marie', 'Severin'),
(11, 'Mark', 'Bagley'),
(12, 'David', 'Finch'),
(13, 'Akira', 'Himekawa'),
(14, 'Shotaro', 'Ishinomori'),
(15, 'Stephen', 'Bissette'),
(16, 'Andy', 'Kubert'),
(17, 'Lalit', 'Kumar Sharma'),
(18, 'Carlos', 'Pacheco');

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `comic_id` int(10) UNSIGNED NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL,
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `writer_id` int(10) UNSIGNED NOT NULL,
  `comic_name` varchar(60) NOT NULL,
  `price` decimal(6,2) UNSIGNED NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cover_image` varchar(60) NOT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `released` int(11) NOT NULL,
  `recommended` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='holds comic data';

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`comic_id`, `artist_id`, `publisher_id`, `writer_id`, `comic_name`, `price`, `description`, `cover_image`, `quantity`, `released`, `recommended`) VALUES
(1, 3, 4, 1, 'Dungeons & Dragons Shadowplague', '24.99', 'A tale of high adventure and deep secrets. Adric Fell leads a band of heroes in a world where civilization has been reduced to a few scattered points of light amid a rising tide of shadows.', 'APR110361.jpg', 25, 1, 1),
(2, 2, 2, 2, 'Batman Haunted Knight', '17.99', 'This graphic novel includes three dark tales of horror and intrigue featuring Batman facing off against his most demented and wicked foes. Taking place on the most evil of holidays, Halloween, the Darknight Detective confronts his deepest fears as he tries to stop the madness and horror created by Scarecrow, the Mad Hatter, the Penguin, Poison Ivy and the Joker.', 'APR058324.jpg', 30, 1, 1),
(3, 2, 2, 2, 'Batman The Long Halloween', '49.99', 'This landmark 14-issue epic is collected in a brand new noir edition that spotlights the artwork of Tim Sale, as the Dark Knight hunts a mysterious serial killer who strikes only on holidays. Includes appearances by Catwoman, Poison Ivy, Two-Face, The Joker and many of Batman\'s greatest foes!', 'JUL140253.jpg', 15, 1, 1),
(4, 2, 2, 2, 'Batman Dark Victory', '24.99', 'In this new edition of the sequel to BATMAN: THE LONG HALLOWEEN, Gotham City is overrun by freaks like Poison Ivy, Mr. Freeze and The Joker. To save his city, The Dark Knight investigates the seeming return of the serial killer called Holiday-and must learn who is committing crimes in his name! Collecting issues #0-13 of the hit series!', 'NOV130237.jpg', 30, 1, 1),
(5, 6, 2, 5, 'Batman The Killing Joke', '17.99', 'The classic Batman tale by Alan Moore and Brian Bolland returns in an all-new special edition! This edition - celebrating the 20th anniversary of the landmark work - features all-new coloring by Bolland, and includes the story \'An Innocent Guy,\' previously featured in BATMAN: BLACK AND WHITE!', 'NOV070226.jpg', 13, 1, 0),
(6, 1, 2, 6, 'Batman Under the Red Hood', '29.99', 'Batman is confronted with a hidden face from the past - it\'s the return of the vigilante Red Hood, who appears to be Batman\'s one-time partner, Jason Todd, the same Jason Todd who died many years ago. But the Red Hood\'s violent ways pit him against the Dark Knight in his hunt for the very person responsible for his death: The Joker.', 'MAY110241.jpg', 21, 1, 1),
(7, 7, 2, 6, 'Red Hood The Lost Days', '14.99', 'Jason Todd, the former Boy Wonder, returns to life and fights to rediscover his humanity in this exciting adventure from the 6-issue miniseries. Learn what secret events led him down the path of death and destruction as he tours the DC Universe in an effort to find his way in a world that left him behind.', 'MAR110343.jpg', 30, 1, 0),
(8, 8, 2, 2, 'Batman Hush', '49.99', 'Batman sets out to learn the identity of the mysterious villain known as Hush. But Batman ends up facing the most intense case of his life as secrets from his past flood into the present!', 'JUL170467.jpg', 8, 1, 0),
(9, 9, 2, 7, 'Batman Year One', '14.99', 'A new softcover edition of one of the most important and critically acclaimed Batman adventures eve! In addition to telling the entire dramatic story of Batman\'s first year fighting crime, this collection includes loads of reproductions of original pencils, script pages, promotional art, unseen Mazzucchelli Batman art and more!', 'OCT060163.jpg', 45, 1, 1),
(10, 10, 1, 8, 'Adventures Of Spider-Man', '12.99', 'Spider-Man takes on his classic rogues\' gallery in exciting adventures from the 1990s! Collecting material from SPIDER-MAN MAGAZINE #1-19 and SPIDER-MAN MAGAZINE SPECIAL #1-2. All Ages', 'SEP191018.jpg', 8, 1, 0),
(11, 12, 1, 9, 'Avengers Disassembled', '15.99', 'It begins with the return of a team member thought dead - and by the time it\'s over, everything you know about the Avengers will have changed! It\'s the worst day in team history, as Earth\'s Mightiest Heroes try to deal with the shocking tragedy around them. Who is behind this, and why? Will it tear the team apart? Who will fall at the hands of the Avengers\' greatest enemy?', 'NOV041837.jpg', 17, 0, 0),
(12, 11, 1, 9, 'Ultimate Spider-Man Vol 01', '19.99', 'High school, puberty, first dances - there are many pitfalls to being young. Compound these with intense personal tragedy and super-powers, and you can start to visualize the world of Peter Parker, a.k.a. Spider-Man! Witness the rebirth of a legend as Peter learns that with great power, there must also come great responsibility! Read the book that Entertainment Weekly calls \"One of the most emotionally resonant depictions of teendom in comics since Spider-Man\'s debut.\" Collecting ULTIMATE SPIDER', 'STAR13283.jpg', 14, 1, 0),
(13, 13, 5, 10, 'Legend Of Zelda Ocarina Of Time Pt 1', '9.99', 'In the mystical land of Hyrule, three spiritual stones hold the key to the Triforce, and whoever holds them will control the world. A boy named Link sets out on a quest to deliver the Emerald, the spiritual stone of the forest, to Zelda, Princess of the land of Hyrule. The journey will be long and perilous, and Link will need all his skill and courage to defeat evil. The battle for Hyrule and the Sacred Realm has begun! Based on Nintendo\'s hit video game! Rating: A', 'JUL084337.jpg', 15, 1, 0),
(14, 13, 5, 10, 'Legend Of Zelda Twilight Princess', '9.99', 'Link once trained in swordsmanship, hoping to protect the world of Hyrule. After a fateful meeting, he sought out the anonymity and peace of life in a small village. But danger and adventure always find heroes to set things right, and when the dark minions of the King of Shadows threaten his new home, Link answers the call!', 'JAN172159.jpg', 18, 1, 0),
(15, 14, 5, 11, 'Legend Of Zelda Link To The Past', '19.99', 'The Legend of Zelda: A Link to the Past is an adaptation of the beloved, internationally bestselling video game originally released for Nintendo\'s Super Entertainment System. This comic book version by Shotaro Ishinomori (Cyborg 009, Kamen Rider) was first serialized in Nintendo Power magazine and later collected into a graphic novel.', 'MAR151495.jpg', 30, 1, 1),
(16, 4, 3, 3, 'Astro Boy Vol 16', '9.95', NULL, 'STAR18861.jpg', 40, 1, 0),
(17, 5, 3, 4, 'Berserk Vol 05', '14.99', 'He is Guts, the Black Swordsman, a warrior of legendary prowess-relentless, fearless, merciless. As cold and brutal as the iron of the massive sword he wields. Bent on revenge against the unholy forces that have branded him for sacrifice, but especially on Griffith, one of the demon lords of the Godhand.', 'JUL040051.jpg', 60, 1, 0),
(18, 15, 2, 5, 'Absolute Swamp Thing HC Vol 01', '99.99', 'Alan Moore\'s legendary run of Swamp Thing tales is collected in Absolute format at last, completely recolored for this new edition! This first of three volumes includes Moore\'s first Swamp Thing story, issue #20\'s \'Loose Ends,\' a prelude to his haunting origin story, \'The Anatomy Lesson,\' which reshapes Swamp Thing\'s mythology with terrifying revelations. Collects Saga Of The Swamp Thing #20-34 and Swamp Thing Annual #2.', 'MAR190601.jpg', 60, 1, 1),
(19, 16, 2, 7, 'Absolute Dark Knight III The Master Race', '125.00', 'In a world gone awry, left in the aftermath of the toppling of Lex Luthor and the apparent death of Batman himself, who will save Gotham City and the rest of the planet from the mysterious Master Race?', 'STL121095.jpg', 100, 0, 0),
(20, 17, 1, 12, 'Daredevil Devils Only God', '15.99', 'The Man Without Fear is missing! Daredevil has disappeared from Hell\'s Kitchen - and in his absence, the real devils are starting to come out to play. Detective Cole North may think he\'s stopped Daredevil, but there are bigger problems coming his way! Meanwhile, Matt Murdock has emerged from his recent ordeals a changed man - but has he changed for better or worse?', 'daredevil-by-chip-zdarsky-tp-02-no-devils-only-god-62021-p[e', 80, 0, 0),
(21, 18, 2, 13, 'Final Crisis Omnibus', '150.00', 'The event that asked, \"What happens when evil wins?\" is collected in an omnibus edition that features every tie-in miniseries and chapter, as Superman, Batman and the Justice League must face this reality when Darkseid and his followers win the war between light and dark!', 'download.jpg', 50, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_email` varchar(60) NOT NULL,
  `total` decimal(10,2) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='holds customer and total data for order';

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `oi_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `comic_id` int(10) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(6,2) UNSIGNED NOT NULL,
  `ship_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='middleman between comics and orders';

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `publisher_name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='holds publisher names';

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `publisher_name`) VALUES
(1, 'Marvel'),
(2, 'DC'),
(3, 'Dark Horse'),
(4, 'IDW'),
(5, 'Viz Media');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `writer_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='holds writer names';

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`writer_id`, `first_name`, `last_name`) VALUES
(1, 'John', 'Rogers'),
(2, 'Jeph', 'Loeb'),
(3, 'Osamu', 'Tezuka'),
(4, 'Kentaro', 'Miura'),
(5, 'Alan', 'Moore'),
(6, 'Judd', 'Winick'),
(7, 'Frank', 'Miller'),
(8, 'Joey', 'Cavaleri'),
(9, 'Brian', 'Bendis'),
(10, 'Akira', 'Himekawa'),
(11, 'Shotaro', 'Ishinomori'),
(12, 'Chip', 'Zdarsky'),
(13, 'Grant', 'Morrison');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`),
  ADD UNIQUE KEY `last_name` (`last_name`),
  ADD UNIQUE KEY `first_name` (`first_name`,`last_name`);

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`comic_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `writer_id` (`writer_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_email`),
  ADD KEY `order_date` (`order_date`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`oi_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `comic_id` (`comic_id`),
  ADD KEY `ship_date` (`ship_date`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`),
  ADD UNIQUE KEY `publisher_name` (`publisher_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`,`pass`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`writer_id`),
  ADD UNIQUE KEY `last_name` (`last_name`),
  ADD UNIQUE KEY `first_name` (`first_name`,`last_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `comic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `oi_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `writer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
