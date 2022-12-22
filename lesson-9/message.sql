-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 22 2022 г., 14:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guestbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `user` varchar(30) NOT NULL,
  `message_text` varchar(2000) NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user`, `message_text`, `message_time`, `user_email`) VALUES
(1, '123123123', 'цуцкуцкцукцук', '2022-12-10 11:10:00', ''),
(2, 'fdsdg', 'цукцук4234234', '2022-12-10 11:10:17', ''),
(3, 'bcx', 'цувыамсчывак3242342', '2022-12-10 11:10:17', ''),
(4, 'dfgdfgdfg', 'исчыс232444', '2022-12-10 11:10:36', ''),
(5, 'bxe', 'ккккккккк', '2022-12-10 11:10:36', ''),
(6, '345555', 'аааааааааа', '2022-12-10 11:10:47', ''),
(7, 'bnht', 'иииииииииииииииии', '2022-12-10 11:10:47', ''),
(8, 'fdsfds', 'fdsfdsf', '2022-12-17 17:49:42', ''),
(9, 'dsfds', 'sdfds', '2022-12-17 17:55:32', ''),
(10, 'dsfds', 'sdfds', '2022-12-17 18:03:20', ''),
(11, 'dsfds', 'sdfds', '2022-12-17 18:03:41', ''),
(12, 'dsf', 'dsf', '2022-12-17 18:05:04', ''),
(13, 'dsf111', 'dsf111', '2022-12-17 18:05:15', ''),
(14, 'sdfds', 'dsfsdf', '2022-12-17 18:06:16', ''),
(15, 'sdfdsf', 'dsfdsf', '2022-12-17 18:07:27', ''),
(16, 'asdasd', 'asdasd', '2022-12-17 18:11:21', ''),
(17, 'asdasd', 'asdsad', '2022-12-17 18:11:26', ''),
(18, 'asdsad', 'asdasd', '2022-12-17 18:11:30', ''),
(19, 'ывавыа', 'выавыа', '2022-12-17 18:13:07', ''),
(20, 'reg', 'ergeg', '2022-12-17 18:31:50', ''),
(21, '', 'sdf', '2022-12-18 08:26:09', ''),
(22, 'sdfsd', 'fdsfdsfsdf', '2022-12-22 11:05:25', 'vova280297@mail.ru'),
(23, 'sdffsdf', 'fds', '2022-12-22 11:06:03', 'fds@fdsf.re'),
(24, 'sdf', 'fsdf', '2022-12-22 11:06:36', 'vova280297@gmail.com'),
(25, 'df', 'dfdsf', '2022-12-22 11:09:45', 'vova280297@gmail.com'),
(26, 'ds', 'fdf', '2022-12-22 11:10:56', 'sdf@fdf.re');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
