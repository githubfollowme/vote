-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021 年 12 月 23 日 18:34
-- 伺服器版本： 10.3.32-MariaDB-0ubuntu0.20.04.1
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `s1100417`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sh` tinyint(1) UNSIGNED NOT NULL,
  `intro` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `name`, `sh`, `intro`) VALUES
(8, 'image-06.jpg', 1, '準備睡覺的小花'),
(9, 'image-10.jpg', 1, '金針花海');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `opt` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `topic_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `opt`, `count`, `topic_id`) VALUES
(1, '贊成', 2, 5),
(2, '不贊成', 1, 5),
(3, '贊成', 4, 5),
(4, '贊成', 2, 5),
(9, '不贊成', 4, 1),
(10, '贊成', 3, 1),
(11, '沒意見', 5, 1),
(13, '不贊成', 2, 3),
(17, '贊成', 6, 3),
(21, '沒意見', 2, 2),
(22, '贊成', 5, 2),
(24, '不贊成', 1, 2),
(25, '贊成', 1, 2),
(27, '沒意見', 3, 6),
(28, '不贊成', 1, 6),
(29, '很贊成', 1, 6),
(30, '沒意見', 3, 6),
(31, '', 0, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(11) UNSIGNED NOT NULL,
  `topic` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `topic`, `img_url`) VALUES
(1, '題目一.公投結果你更支持重啓核電或不贊成重啓核電？？', 'image_3.jpg'),
(2, '題目二.就健康因素考量,是否反對萊豬進口？', 'image_5.jpg'),
(3, '題目三.是否贊成藻礁被保護而非開發用作再生電力能源？', 'image_13.jpg'),
(5, '題目五(社會時事).是否贊成王力宏先生主動承擔起其離婚後的房產轉移稅金?？', 'image_9.jpg'),
(6, '題目四.是否贊成公投綁大選,節省國家及政府消耗人力物力等場次資源？？', 'image_2.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(24) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `email`, `name`, `gender`, `birthday`) VALUES
(1, 'mack', '1234', 'macklun@ms7.hinet.net', '劉勤永', '男', '1974-10-07'),
(2, 'Keep', '1226', 'keephub@gmail.com', 'Keep', '男', '2021-12-25');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
