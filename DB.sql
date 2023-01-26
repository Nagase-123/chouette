-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023-01-27 00:49:47
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `chouette`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(15) DEFAULT NULL,
  `user_kana` varchar(15) DEFAULT NULL,
  `user_tel` varchar(30) NOT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `contact_text` varchar(300) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `contact_flg` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`contact_id`, `user_name`, `user_kana`, `user_tel`, `user_mail`, `contact_text`, `created_at`, `updated_at`, `contact_flg`) VALUES
(1, '山田太郎', 'ナガ', 'なし', 'test10@mail', 'kgkgk<br />\r\nkkk', '2023-01-15 16:18:56', '2023-01-25 22:08:06', 1),
(2, '山田太郎', 'ナガ', 'なし', 'test10@mail', 'はじめまして。利用方法を教えてください。', '2023-01-15 18:30:48', '2023-01-16 22:12:53', 1),
(3, '山田花子', 'ハナコ', 'なし', 'oo@mail', 'ログインができません', '2023-01-15 18:52:00', '2023-01-15 18:53:07', 1),
(4, 'かか', 'カナ', 'なし', 'k@gmail.jp', 'ｌｌｌ<br />\r\nｌｌｌ', '2023-01-22 16:06:55', '2023-01-25 22:30:54', 1),
(5, 'かか', 'カナ', 'なし', 'k@gmail.jp', 'ｌｌｌ<br />\r\nｌｌｌ', '2023-01-22 16:09:38', '2023-01-26 19:37:24', 1),
(6, 'かか', 'カナ', 'なし', 'k@gmail.jp', 'ｌｌｌ<br />\r\nｌｌｌ', '2023-01-22 16:10:13', '2023-01-22 16:10:13', 0),
(7, 'y123&%ﾊﾟ', 'ヤア', 'なし', 'm@m.jp', 'f<br />\r\nalert( ポップ表示)', '2023-01-26 17:44:04', '2023-01-26 17:44:04', 0),
(8, 'y123&%ﾊﾟ', 'ヤア', 'なし', 'm@m.jp', 'f<br />\r\nalert( ポップ表示)', '2023-01-26 17:44:38', '2023-01-26 17:44:38', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `hairstylists`
--

CREATE TABLE `hairstylists` (
  `hairstylist_id` int(11) NOT NULL,
  `hairstylist_name` varchar(15) DEFAULT NULL,
  `hairstylist_kana` varchar(15) DEFAULT NULL,
  `hairstylist_tel` varchar(11) DEFAULT NULL,
  `hairstylist_mail` varchar(30) DEFAULT NULL,
  `hairstylist_address` varchar(100) DEFAULT NULL,
  `hairstylist_profile` varchar(500) DEFAULT NULL,
  `hairstylist_advantage` varchar(100) DEFAULT NULL,
  `hairstylist_flg` int(11) DEFAULT 1,
  `hairstylist_pass` varchar(500) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `hairstylists`
--

INSERT INTO `hairstylists` (`hairstylist_id`, `hairstylist_name`, `hairstylist_kana`, `hairstylist_tel`, `hairstylist_mail`, `hairstylist_address`, `hairstylist_profile`, `hairstylist_advantage`, `hairstylist_flg`, `hairstylist_pass`, `updated_at`, `created_at`) VALUES
(1, '美容師ハナコ', 'ビヨウシ', '00011112222', 'biyousi_1@m.com', '福岡市123', '5年目です。', 'ショートカットが得意です。', 1, '$2y$10$.JYltuIPXTLES2SF95I5xuqs2PSnUifsU7fdx.arSxtUbIAHtWD8S', '2023-01-03 01:58:14', '2022-12-18 06:40:11'),
(2, '長瀬', 'ナガ', '00011112222', 'biyousi_2@m.com', '福岡市123', '13年目です。', 'パーティーヘアセットが得意です。', 1, '$2y$10$ohF7f5JbHp8ueZloyaRPh.8VxnPt/Ryqwv68TscWgcn3PtwPls7dO', '2022-12-18 06:44:30', '2022-12-18 06:44:30'),
(3, '美容師', 'ビヨウシ', '0120441222', 'biyousi@test.com', '福岡市123', '10年目です。', 'モード系が得意です', 1, '$2y$10$xOcWyZuDgk9VrLWxILUwBeGC3gv4Ov3llvwetXPjA5vAsF3WHV9ba', '2023-01-27 00:42:07', '2022-12-18 06:58:02'),
(6, '山田太郎', 'ヤマダタロウ', '0120111222', 'biyousi2@test.com', '福岡市', '美容師歴１０年です、', '似合わせ得意です', 2, '$2y$10$Hm3JZ3IP0Dq6wCUdDeD8k.Pjtso8AFrdDoq/jwDQG5Fafd1QX/5B2', '2023-01-07 06:39:34', '2023-01-07 06:12:05'),
(7, '中山花子', 'ナカヤマハナコ', '00011113333', 'biyousi3@test.com', '福岡市', '特になし', '特になし', 1, '$2y$10$88Y7bqiWHS5kAKzSSur/O.9UrPSgnWrunxo6bjn9l8fLy6bpT58Au', '2023-01-07 06:41:26', '2023-01-07 06:41:26'),
(8, '美容師テスト', 'ビヨウシテスト', '00011112222', 'biyousi_5@mail', '福岡市111', '１０年やってます', 'ショートが得意です', 1, '$2y$10$b3L7xej.wEI4dsHA/UlWOOezfnNVPi1t.6LsFFiPQYn7UdpiIMTWO', '2023-01-16 22:11:53', '2023-01-16 22:11:53'),
(9, '美容師九', 'ビヨウシキュウ', '00011112222', 'test@mail', '福岡市', '５年目です。', '似合わせカット', 1, '$2y$10$T.NWVWhF7R1CVD4iRDt4HuYS3CU8NWr/8pcuLRVxupxCXsDaO3z/K', '2023-01-19 22:57:20', '2023-01-19 20:39:34'),
(10, '退会美容師', 'タイカイビヨウシ', '00000000000', 'x@x', '退会美容師', '退会済み', '退会済み', 2, '$2y$10$9sqcgRfyT4VFVcXgcjMLJuvaB/eIOQ4yeY70S283EhrgZa/IJY/4K', '2023-01-26 00:31:52', '2023-01-25 21:13:14'),
(11, '退会美容師', 'タイカイビヨウシ', '00000000000', 'x@x', '退会美容師', '退会済み', '退会済み', 2, '$2y$10$G1YpADKjuffy/S2mcpRDi.j1vC.jXdwme/AP35CAjB.X0ND9Uvx/G', '2023-01-26 00:31:23', '2023-01-25 21:13:49'),
(12, '退会美容師', 'タイカイビヨウシ', '00000000000', 'x@x', '退会美容師', '退会済み', '退会済み', 2, '$2y$10$AypxU0iMyBkiv1kqzD0ofOPXSM1sIyKKslqRZZfrGKc/NetM603de', '2023-01-26 19:35:38', '2023-01-26 19:28:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `reservation_request1` varchar(30) NOT NULL DEFAULT 'なし',
  `reservation_request2` varchar(30) NOT NULL DEFAULT 'なし',
  `reservation_request3` varchar(30) NOT NULL DEFAULT 'なし',
  `reservation_request4` varchar(30) NOT NULL DEFAULT 'なし',
  `reservation_request5` varchar(30) NOT NULL DEFAULT 'なし',
  `reservation_comment` varchar(700) NOT NULL DEFAULT 'なし',
  `reservation_fee` int(11) DEFAULT 5000,
  `user_id` int(11) NOT NULL,
  `hairstylist_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `cancel_message` varchar(300) NOT NULL DEFAULT 'なし',
  `reservation_flg` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `reservation_date`, `reservation_time`, `reservation_request1`, `reservation_request2`, `reservation_request3`, `reservation_request4`, `reservation_request5`, `reservation_comment`, `reservation_fee`, `user_id`, `hairstylist_id`, `updated_at`, `created_at`, `cancel_message`, `reservation_flg`) VALUES
(10, '2022-12-29', '13:00:00', 'なし', 'なし', 'なし', 'なし', 'なし', 'なし', 5000, 1, 3, '2022-12-29 02:37:55', '2022-12-29 02:37:55', '', 0),
(19, '2022-12-31', '14:00:00', 'なし', '話しながら過ごしたい', 'なし', 'なし', 'なし', 'ショートカットのデザインについてご相談させてください', 5000, 4, 3, '2023-01-02 02:50:21', '2022-12-30 04:48:50', '', 0),
(20, '2023-01-01', '16:00:00', 'なし', 'なし', 'なし', 'なし', 'お子様カット追加', 'なし', 6000, 4, 2, '2022-12-30 04:51:50', '2022-12-30 04:51:50', '', 0),
(21, '2023-01-15', '06:00:00', 'なし', '話しながら過ごしたい', 'なし', 'なし', 'なし', '初めて利用します', 5000, 4, 1, '2023-01-03 01:20:27', '2022-12-30 04:52:16', '空きがないため', 1),
(22, '2022-12-30', '21:00:00', '静かに過ごしたい', 'なし', 'なし', 'シャンプー追加', 'なし', 'よろしくお願いします', 6000, 4, 3, '2022-12-30 09:24:28', '2022-12-30 05:19:14', '', 0),
(23, '2023-01-15', '06:00:00', 'なし', 'なし', 'なし', 'なし', 'なし', 'コメント変更', 5000, 4, 3, '2023-01-07 06:42:22', '2022-12-30 08:04:47', '', 0),
(24, '2023-01-30', '11:00:00', '静かに過ごしたい', 'なし', 'なし', 'なし', 'お子様カット追加', 'よろしくお願いします', 6000, 4, 2, '2023-01-15 13:51:17', '2023-01-02 06:03:26', '実験用', 1),
(25, '2023-01-15', '06:00:00', 'なし', 'なし', 'なし', 'なし', 'お子様カット追加', 'なし', 6000, 4, 3, '2023-01-07 05:16:22', '2023-01-07 01:51:39', '', 0),
(26, '2023-01-30', '18:00:00', '静かに過ごしたい', 'なし', 'なし', 'なし', 'なし', 'なしからアリに変更', 5000, 4, 2, '2023-01-23 21:50:53', '2023-01-07 02:09:23', 'ユーザー側からのキャンセル', 1),
(27, '2023-01-30', '18:00:00', 'なし', '話しながら過ごしたい', 'なし', 'なし', 'なし', '完了画面からホーム画面への実験', 5000, 4, 2, '2023-01-26 19:29:52', '2023-01-07 02:27:36', 'なし', 1),
(28, '2023-01-16', '09:00:00', '静かに過ごしたい', 'なし', 'なし', 'なし', 'なし', 'ボブヘア希望です', 5000, 6, 3, '2023-01-08 12:20:27', '2023-01-08 12:20:04', 'なし', 0),
(29, '2023-01-16', '18:00:00', 'なし', '話しながら過ごしたい', 'なし', 'なし', 'なし', 'なし', 5000, 7, 3, '2023-01-16 22:06:59', '2023-01-08 12:23:27', '空きがないため', 1),
(30, '2023-01-15', '08:00:00', 'なし', 'なし', 'なし', 'なし', 'なし', 'なし', 5000, 4, 3, '2023-01-11 11:52:17', '2023-01-11 11:52:17', 'なし', 0),
(31, '2023-01-16', '12:00:00', '静かに過ごしたい', 'なし', 'なし', 'なし', 'なし', 'なし', 5000, 4, 3, '2023-01-15 13:54:50', '2023-01-15 01:18:07', '間違い', 1),
(32, '2023-01-31', '06:00:00', '静かに過ごしたい', 'なし', 'なし', 'なし', 'なし', 'なし', 5000, 9, 3, '2023-01-15 13:55:30', '2023-01-15 13:30:55', '間違い', 1),
(33, '2023-01-31', '06:00:00', '静かに過ごしたい', 'なし', 'なし', 'なし', 'なし', '1/31　6：00予約希望です', 5000, 9, 3, '2023-01-15 13:55:59', '2023-01-15 13:41:43', '退会のため', 1),
(34, '2023-01-20', '06:00:00', '静かに過ごしたい', 'なし', 'なし', 'シャンプー追加', 'お子様カット追加', '子供のみシャンプーも追加でお願いします。初めて利用します', 7000, 10, 3, '2023-01-16 22:05:32', '2023-01-16 22:04:58', 'ユーザー側からのキャンセル', 1),
(35, '2023-01-31', '06:00:00', '静かに過ごしたい', 'なし', 'ヘアセット追加', 'なし', 'お子様カット追加', '初めて利用します<br>よろしくお願いします', 9000, 4, 3, '2023-01-26 18:50:41', '2023-01-22 19:18:57', '空きがないため空きがないため空きがないためｖｖｖ空きがないため空きがないため空きがないため空きがないため空きがないため空きがないため空きがなｖｖｖ空きがないため空きがないため空きがないため空きがないため空きがないため空きがないため空きがないため', 1),
(36, '2023-01-31', '11:00:00', 'なし', 'なし', 'なし', 'シャンプー追加', 'なし', 'aiueo', 6000, 4, 3, '2023-01-24 21:10:27', '2023-01-23 23:15:39', '空きがないため', 1),
(37, '2023-01-31', '10:00:00', 'なし', 'なし', 'ヘアセット追加', 'なし', 'なし', 'ヘアセットは編み込みをお願いします。', 8000, 4, 3, '2023-01-26 15:04:21', '2023-01-26 15:03:24', 'なし', 0),
(38, '2023-02-01', '06:00:00', 'なし', 'なし', 'なし', 'なし', 'なし', '初めて利用します', 5000, 4, 3, '2023-01-26 19:30:59', '2023-01-26 18:06:42', 'なし', 1),
(39, '2023-01-31', '12:00:00', 'なし', 'なし', 'なし', 'なし', 'なし', '初めて利用します。<br />\r\nよろしくお願いします。<br />\r\n<br />\r\n  /*<br />\r\n  *メール送信完了<br />\r\n  */<br />\r\n  public function pass_mailsend_comp(){<br />\r\n    return view(\'rogin_rogout.pass_mailsend_comp\',[<br />\r\n    ]);<br />\r\n  }<br />\r\n<br />\r\n<br />\r\n}//クラス', 5000, 4, 3, '2023-01-26 18:15:12', '2023-01-26 18:12:36', 'ユーザー側からのキャンセル', 1),
(40, '2023-02-01', '08:00:00', '静かに過ごしたい', 'なし', 'なし', 'シャンプー追加', 'なし', '初めて利用します。', 6000, 14, 3, '2023-01-27 00:04:11', '2023-01-27 00:03:39', 'ユーザー側からのキャンセル', 1),
(41, '2023-02-21', '06:00:00', 'なし', '話しながら過ごしたい', 'なし', 'シャンプー追加', 'なし', '初めて利用します', 6000, 15, 3, '2023-01-27 00:15:47', '2023-01-27 00:15:07', 'ユーザー側からのキャンセル', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `hairstylist_id` int(11) DEFAULT NULL,
  `schedule_date` date DEFAULT NULL,
  `schedule_6` int(11) NOT NULL DEFAULT 0,
  `schedule_7` int(11) NOT NULL DEFAULT 0,
  `schedule_8` int(11) NOT NULL DEFAULT 0,
  `schedule_9` int(11) NOT NULL DEFAULT 0,
  `schedule_10` int(11) NOT NULL DEFAULT 0,
  `schedule_11` int(11) NOT NULL DEFAULT 0,
  `schedule_12` int(11) NOT NULL DEFAULT 0,
  `schedule_13` int(11) NOT NULL DEFAULT 0,
  `schedule_14` int(11) NOT NULL DEFAULT 0,
  `schedule_15` int(11) NOT NULL DEFAULT 0,
  `schedule_16` int(11) NOT NULL DEFAULT 0,
  `schedule_17` int(11) NOT NULL DEFAULT 0,
  `schedule_18` int(11) NOT NULL DEFAULT 0,
  `schedule_19` int(11) NOT NULL DEFAULT 0,
  `schedule_20` int(11) NOT NULL DEFAULT 0,
  `schedule_21` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `hairstylist_id`, `schedule_date`, `schedule_6`, `schedule_7`, `schedule_8`, `schedule_9`, `schedule_10`, `schedule_11`, `schedule_12`, `schedule_13`, `schedule_14`, `schedule_15`, `schedule_16`, `schedule_17`, `schedule_18`, `schedule_19`, `schedule_20`, `schedule_21`, `created_at`, `updated_at`) VALUES
(1, 3, '2022-12-31', 2, 1, 0, 1, 0, 1, 0, 1, 2, 1, 1, 1, 1, 1, 1, 1, '2022-12-25 04:01:45', '2023-01-02 10:00:07'),
(2, 3, '2023-01-01', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '2022-12-25 04:02:26', '2022-12-25 04:02:26'),
(3, 3, '2022-12-29', 0, 0, 0, 0, 0, 0, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, '2022-12-25 04:04:20', '2023-01-26 00:22:31'),
(8, 3, '2023-01-15', 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-29 06:55:42', '2023-01-11 11:52:17'),
(14, 3, '2023-01-07', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-29 07:19:49', '2022-12-29 10:59:54'),
(15, 4, '2023-01-07', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-29 11:01:02', '2022-12-29 11:01:02'),
(16, 1, '2023-01-07', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-29 11:01:02', '2023-01-07 06:29:32'),
(17, 1, '2023-01-15', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-12-29 11:01:02', '2023-01-03 01:20:27'),
(18, 2, '2023-01-01', 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 2, 1, 1, 0, 0, 0, '2022-12-29 11:01:02', '2022-12-30 04:51:50'),
(19, 2, '2023-01-30', 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, '2022-12-29 11:01:02', '2023-01-26 19:29:52'),
(20, 3, '2022-12-30', 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2022-12-30 05:18:29', '2023-01-26 00:24:07'),
(21, 3, '2023-01-16', 0, 0, 0, 2, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, '2023-01-07 04:31:22', '2023-01-16 22:06:59'),
(22, 3, '2023-01-08', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-07 05:13:20', '2023-01-07 05:13:20'),
(23, 3, '2023-01-11', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-08 02:37:16', '2023-01-08 02:37:16'),
(24, 3, '2023-01-31', 0, 1, 1, 1, 2, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, '2023-01-15 13:28:32', '2023-01-26 19:33:10'),
(25, 3, '2023-01-20', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, '2023-01-15 13:29:14', '2023-01-16 22:08:06'),
(26, 3, '2023-01-22', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, '2023-01-15 13:29:34', '2023-01-16 22:07:39'),
(27, 3, '2023-02-02', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-24 00:14:51', '2023-01-24 00:14:51'),
(28, 3, '2023-02-01', 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, '2023-01-24 21:39:54', '2023-01-27 00:12:04'),
(29, 3, '2021-12-21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-26 18:57:04', '2023-01-26 18:57:04'),
(30, 3, '2023-01-27', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-26 19:10:50', '2023-01-26 19:20:34'),
(31, 3, '2023-02-21', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-26 19:20:08', '2023-01-27 00:15:47'),
(32, 3, '2023-02-15', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-01-27 00:17:28', '2023-01-27 00:17:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) DEFAULT NULL,
  `user_kana` varchar(15) DEFAULT NULL,
  `user_tel` varchar(11) DEFAULT NULL,
  `user_mail` varchar(30) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `user_memo` varchar(500) NOT NULL,
  `user_flg` int(11) DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_kana`, `user_tel`, `user_mail`, `user_address`, `user_memo`, `user_flg`, `updated_at`, `created_at`, `password`) VALUES
(1, '長瀬', 'ナガセ', '08011112222', 'admin@test.com', '住所テスト', '管理者', 10, '2023-01-19 21:14:36', NULL, '$2y$10$eil1fRu6XDYzhvb//epk6u9wrUI.2BX5KDQgroTIl0amVIlThR6n2'),
(2, '実験', 'ジッケン', '00011112222', 'o@g.com', '福岡市', 'なし', 0, '2023-01-26 00:42:16', '2022-12-17 11:22:48', 'test_pass2'),
(3, '実験サンです', 'ジッケンサンデス', NULL, 'test3@mail', '福岡市博多区1-1-2マンション', 'なし', 0, '2023-01-26 19:31:50', '2022-12-17 12:20:58', 'test_pass3'),
(4, '会員四子', 'カイインヨンコ', '09011112222', 'test4@mail', '福岡市博多区博多駅前1丁目5-1', '少し潔癖気味かも', 0, '2023-01-27 00:17:05', '2022-12-18 02:23:02', '$2y$10$Cm9DDDA/suF0KyPe9J4EreKl9Bzc/OVcDhk5Wm8uTKWH/wcH4aKNy'),
(5, '退会ユーザー', 'タイカイユーザー', '00000000000', 'x@x', '退会ユーザー', '退会済み', 2, '2023-01-15 13:24:29', '2023-01-07 05:59:06', '$2y$10$1aeHIZoMMxDgPqx6G2k81OM7/msY8/V6MV83D5WKGM/1I5ekW5pwu'),
(6, '実験顧客', 'ジッケン', '00011112222', 'test6@mail', '福岡市平尾４丁目1-4', 'なし', 0, '2023-01-14 04:57:36', '2023-01-08 12:19:35', '$2y$10$pSVCMuIZ1dW/YVroGHOCt.m0Se7aJ3J4LwfqhoY6fWeoQPEbSMos6'),
(7, 'テスト顧客', 'テスト', '0339457890', 'test7@mail', '福岡市', 'なし', 0, '2023-01-09 09:00:46', '2023-01-08 12:22:52', '$2y$10$rIhnWZ1j1gAs.R2fXCMC6eb5WDoq4VBOoa78n7WDmfSQcyTSa.siu'),
(9, '退会ユーザー', 'タイカイユーザー', '00000000000', 'x@x', '退会ユーザー', '退会済み', 2, '2023-01-15 14:07:34', '2023-01-15 13:17:40', '$2y$10$CX1HJ6vBGzI6fR0SjekU8ez2sh5hFyBLYRjFJnC1.y50G3O7UKUhm'),
(10, '退会ユーザー', 'タイカイユーザー', '00000000000', 'x@x', '退会ユーザー', '退会済み', 2, '2023-01-16 22:09:55', '2023-01-16 22:03:35', '$2y$10$nk4MDfkv3Pp5038Iu2hRZOoAmBya3ZI6/QUdhiStif3Hs5z72vVwm'),
(11, 'テストカイイン', 'テストカイイン', '09012345789', 'test0122@mail', '福岡市中央区平尾１丁目', 'なし', 0, '2023-01-22 16:36:03', '2023-01-22 16:36:03', '$2y$10$P0R/mf2dQSx7C3FYBiLFzOkkzL6454K27C5vvgWLy22DBG4l3uJr6'),
(12, '退会ユーザー', 'タイカイユーザー', '00000000000', 'x@x', '退会ユーザー', '退会済み', 2, '2023-01-26 00:05:23', '2023-01-22 16:41:32', '$2y$10$GwEvqyI3dQQdiSSPZi6vNefNRYA9gK3buGhNJ7SJQL/V5Q01nkGdS'),
(13, '退会ユーザー', 'タイカイユーザー', '00000000000', 'x@x', '退会ユーザー', '退会済み', 2, '2023-01-26 19:32:23', '2023-01-26 17:47:04', '$2y$10$kg8EMHX6l2LNCyM.DwzRjuU2oYhPMVnjt0J3ImkN8lGlma9u1PBMO'),
(14, 'テストハナコ', 'テストハナコ', '00011112222', 'test@mail', '福岡市123', 'なし', 0, '2023-01-27 00:04:40', '2023-01-27 00:02:25', '$2y$10$oKppMfcAo6d1gc6wWcmBRuG8FqVNrimNUGKG7P2FlAgauoQiZvr0m'),
(15, 'テストハナコ', 'テストハナコ', '00011112222', 'user@g.com', '福岡市123', 'なし', 0, '2023-01-27 00:16:10', '2023-01-27 00:13:57', '$2y$10$UnAo.k2djfsC3Nryj42jxOCOMouD7RfFK88otQTzUg64KWK3y59zG');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- テーブルのインデックス `hairstylists`
--
ALTER TABLE `hairstylists`
  ADD PRIMARY KEY (`hairstylist_id`);

--
-- テーブルのインデックス `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- テーブルのインデックス `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `hairstylists`
--
ALTER TABLE `hairstylists`
  MODIFY `hairstylist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- テーブルの AUTO_INCREMENT `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
