-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2023 г., 17:12
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
-- База данных: `myReddit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accessRights`
--

CREATE TABLE `accessRights` (
  `idRigths` int NOT NULL,
  `rightsName` varchar(255) NOT NULL,
  `rights` int NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `accessRights`
--

INSERT INTO `accessRights` (`idRigths`, `rightsName`, `rights`) VALUES
(1, 'Полный доступ', 1),
(2, 'Чтение', 2),
(3, 'Чтение и добавление записей', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `idCategory` int NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`idCategory`, `categoryName`) VALUES
(1, 'JavaScript'),
(2, 'React.js'),
(3, 'PHP'),
(4, 'Базы данных');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `idComment` int NOT NULL,
  `idNews` int NOT NULL,
  `text` varchar(400) NOT NULL,
  `createdComment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `idNews` int NOT NULL,
  `idCategory` int NOT NULL,
  `theme` varchar(255) NOT NULL,
  `pictureLink` varchar(255) DEFAULT NULL,
  `textContent` varchar(2000) NOT NULL,
  `idUser` int NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changeDate` timestamp NULL DEFAULT NULL,
  `likeCount` int DEFAULT NULL,
  `moderationStatus` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`idNews`, `idCategory`, `theme`, `pictureLink`, `textContent`, `idUser`, `createDate`, `changeDate`, `likeCount`, `moderationStatus`) VALUES
(150, 1, 'уdfdgdbgdfbdfgdshуdfdgdbgdfbdfgdsh', '140d96c3105f7128e12d90098d0e6187.jpg', 'уdfdgdbgdfbdfgdshуdfdgdbgdfbdfgdshуdfdgdbgdfbdfgdsh', 28, '2023-02-16 14:02:08', NULL, NULL, 1),
(151, 3, 'fsdgsdg32423545346', '140d96c3105f7128e12d90098d0e6187.jpg', 'fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346', 28, '2023-02-16 14:02:23', NULL, NULL, 1),
(152, 1, 'fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346', NULL, 'fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346', 28, '2023-02-16 14:02:35', NULL, NULL, 1),
(153, 1, 'fsdgsdg32423545346fsdgsdg32423545346efsgfsdgsdg32423545346fsdgsdg32423545346', NULL, 'fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346', 28, '2023-02-16 14:02:46', NULL, NULL, 1),
(154, 1, 'fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346', '140d96c3105f7128e12d90098d0e6187.jpg', 'fsdgsdg32423545346fsdgsdg32423545346fsdgsdg32423545346', 28, '2023-02-16 14:02:58', NULL, NULL, 1),
(155, 1, 'fsdgsdg32423545346', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:11', NULL, NULL, 1),
(156, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:17', NULL, NULL, 1),
(157, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:23', NULL, NULL, 1),
(158, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:41', NULL, NULL, 1),
(159, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:55', NULL, NULL, 1),
(160, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', '140d96c3105f7128e12d90098d0e6187.jpg', 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:04', NULL, NULL, 1),
(161, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:17', NULL, NULL, 1),
(162, 3, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:33', NULL, NULL, 1),
(163, 4, 'fsdgsdg32423545346fsdgsdg54f654g65s4d6g4sd6g6jknj', '140d96c3105f7128e12d90098d0e6187.jpg', 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:56', NULL, NULL, 1),
(164, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:05:02', NULL, NULL, 1),
(165, 2, 'fgshbdfhbs', NULL, 'sdgasdgsdfhdsfhdghdfh', 28, '2023-02-16 14:05:09', NULL, NULL, 1),
(166, 3, 'dsfsdfsdfsdf', NULL, 'sdfsdfsdfsdfsdf', 28, '2023-02-16 14:05:16', NULL, NULL, 1),
(167, 3, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 26, '2023-02-16 14:07:38', NULL, NULL, 0),
(168, 2, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsfsfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 26, '2023-02-16 14:07:38', NULL, NULL, 0),
(169, 3, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 26, '2023-02-16 14:07:49', NULL, NULL, 0),
(170, 2, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsfsfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 26, '2023-02-16 14:07:49', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idgroup` int NOT NULL DEFAULT '1',
  `registrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `gender` enum('Мужчина','Женщина') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `name`, `email`, `idgroup`, `registrationDate`, `password`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', 1, '2023-02-05 14:39:29', 'admin', 'Мужчина'),
(26, 'Vova', 'vova2802@mail.ru', 3, '2023-02-12 10:12:02', 'b285a7886cfdfb797b0d57c9d053c3f2', 'Мужчина'),
(28, 'admin', 'admin@admin.ru', 1, '2023-02-13 08:35:50', 'a66abb5684c45962d887564f08346e8d', 'Мужчина');

-- --------------------------------------------------------

--
-- Структура таблицы `userGroup`
--

CREATE TABLE `userGroup` (
  `idGroup` int NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `idAaccessRights` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `userGroup`
--

INSERT INTO `userGroup` (`idGroup`, `groupName`, `idAaccessRights`) VALUES
(1, 'Администратор', 1),
(2, 'Неавторизованный пользователь ', 2),
(3, 'Авторизованный пользователь', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accessRights`
--
ALTER TABLE `accessRights`
  ADD PRIMARY KEY (`idRigths`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `FK_comments_users_idUser` (`idUser`),
  ADD KEY `FK_comments_news_idNews` (`idNews`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`),
  ADD KEY `FK_news_category_idCategory` (`idCategory`),
  ADD KEY `FK_news_users_idUser` (`idUser`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `FK_users_userGroup_idGroup` (`idgroup`);

--
-- Индексы таблицы `userGroup`
--
ALTER TABLE `userGroup`
  ADD PRIMARY KEY (`idGroup`),
  ADD KEY `FK_userGroup_accessRights_idRigths` (`idAaccessRights`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accessRights`
--
ALTER TABLE `accessRights`
  MODIFY `idRigths` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `userGroup`
--
ALTER TABLE `userGroup`
  MODIFY `idGroup` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comments_news_idNews` FOREIGN KEY (`idNews`) REFERENCES `news` (`idNews`),
  ADD CONSTRAINT `FK_comments_users_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_category_idCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`),
  ADD CONSTRAINT `FK_news_users_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_users_userGroup_idGroup` FOREIGN KEY (`idgroup`) REFERENCES `userGroup` (`idGroup`);

--
-- Ограничения внешнего ключа таблицы `userGroup`
--
ALTER TABLE `userGroup`
  ADD CONSTRAINT `FK_userGroup_accessRights_idRigths` FOREIGN KEY (`idAaccessRights`) REFERENCES `accessRights` (`idRigths`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
