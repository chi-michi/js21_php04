-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 10 月 14 日 14:23
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `HWgantt`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Items2`
--

CREATE TABLE `Items2` (
  `id` int(11) NOT NULL,
  `housework` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `charge` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jikan` int(11) NOT NULL,
  `Indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `Items2`
--

INSERT INTO `Items2` (`id`, `housework`, `charge`, `jikan`, `Indate`) VALUES
(5, '朝食作り', 'みさえ', 15, '2021-10-14 22:42:16'),
(6, '子供に朝食を食べさせる', 'みさえ', 20, '2021-10-14 22:42:52'),
(7, '子供をおこす', 'ひろし', 10, '2021-10-14 22:43:31'),
(8, '子供を着替えさせる', 'ひろし', 10, '2021-10-14 22:43:41'),
(9, '連絡帳を書く', 'ひろし', 5, '2021-10-14 22:58:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `userlist`
--

INSERT INTO `userlist` (`id`, `name`, `email`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト太郎', 'test@gmail.com', 'testtest', 1, 0),
(2, 'テスト花子', 'test2@gmail.com', 'testtest2', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Items2`
--
ALTER TABLE `Items2`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `Items2`
--
ALTER TABLE `Items2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
