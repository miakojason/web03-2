-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-03-12 03:57:45
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `web03-2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` tinyint(1) NOT NULL,
  `length` int(5) NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `rank` int(5) NOT NULL,
  `sh` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(1, '電影01', 1, 120, '2024-03-12', '發行商01', '導演01', '03B01}v.mp4', '03B01}.png', '院線片01簡介', 1, 1),
(2, '電影02', 1, 120, '2024-03-12', '發行商02', '導演02', '03B02}v.mp4', '03B02}.png', '院線片02簡介', 2, 1),
(3, '電影03', 1, 120, '2024-03-12', '發行商03', '導演03', '03B03}v.mp4', '03B03}.png', '院線片03簡介', 3, 1),
(4, '電影04', 1, 120, '2024-03-12', '發行商04', '導演04', '03B04}v.mp4', '03B04}.png', '院線片04簡介', 4, 1),
(5, '電影05', 1, 120, '2024-03-12', '發行商05', '導演05', '03B05}v.mp4', '03B05}.png', '院線片05簡介', 5, 1),
(6, '電影06', 1, 120, '2024-03-12', '發行商06', '導演06', '03B06}v.mp4', '03B06}.png', '院線片06簡介', 6, 1),
(7, '電影07', 1, 120, '2024-03-12', '發行商07', '導演07', '03B07}v.mp4', '03B07}.png', '院線片07簡介', 7, 1),
(8, '電影08', 1, 120, '2024-03-12', '發行商08', '導演08', '03B08}v.mp4', '03B08}.png', '院線片08簡介', 8, 1),
(9, '電影09', 1, 120, '2024-03-12', '發行商09', '導演09', '03B09}v.mp4', '03B09}.png', '院線片09簡介', 9, 1),
(10, '電影10', 1, 120, '2024-03-12', '發行商10', '導演10', '03B10}v.mp4', '03B10}.png', '院線片10簡介', 10, 1),
(11, '電影11', 1, 120, '2024-03-12', '發行商11', '導演11', '03B11}v.mp4', '03B11}.png', '院線片11簡介', 11, 1),
(12, '電影12', 1, 120, '2024-03-12', '發行商12', '導演12', '03B12}v.mp4', '03B12}.png', '院線片12簡介', 12, 1),
(13, '電影13', 1, 120, '2024-03-12', '發行商13', '導演13', '03B13}v.mp4', '03B13}.png', '院線片13簡介', 13, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` text NOT NULL,
  `movie` text NOT NULL,
  `date` date NOT NULL,
  `session` text NOT NULL,
  `qt` int(1) NOT NULL,
  `seat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `no`, `movie`, `date`, `session`, `qt`, `seat`) VALUES
(1, '202403120001', '電影01', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:2;i:1;i:3;}'),
(2, '202403120002', '電影02', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:4;i:1;i:5;}'),
(3, '202403120003', '電影03', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:6;i:1;i:7;}'),
(4, '202403120004', '電影04', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:8;i:1;i:9;}'),
(5, '202403120005', '電影05', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:10;i:1;i:11;}'),
(6, '202403120006', '電影06', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:12;i:1;i:13;}'),
(7, '202403120007', '電影07', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:14;i:1;i:15;}'),
(8, '202403120008', '電影08', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:16;i:1;i:17;}'),
(9, '202403120009', '電影09', '2023-03-12', '14:00~16:00', 2, 'a:2:{i:0;i:18;i:1;i:19;}');

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `name` text NOT NULL,
  `rank` int(5) NOT NULL,
  `ani` int(1) NOT NULL DEFAULT 1,
  `sh` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `rank`, `ani`, `sh`) VALUES
(1, '03A01.jpg', '預告片01', 1, 1, 1),
(2, '03A02.jpg', '預告片02', 2, 2, 1),
(3, '03A03.jpg', '預告片03', 3, 3, 1),
(4, '03A04.jpg', '預告片04', 4, 1, 1),
(5, '03A05.jpg', '預告片05', 5, 2, 1),
(6, '03A06.jpg', '預告片06', 6, 3, 1),
(7, '03A07.jpg', '預告片07', 7, 1, 1),
(8, '03A08.jpg', '預告片08', 8, 2, 1),
(9, '03A09.jpg', '預告片09', 9, 3, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
