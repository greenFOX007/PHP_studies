-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2023 г., 17:37
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
(150, 1, 'LOLKEK', '140d96c3105f7128e12d90098d0e6187.jpg', 'LOLKEK', 28, '2023-02-16 14:02:08', NULL, NULL, 1),
(151, 3, 'LOLKEK1', '140d96c3105f7128e12d90098d0e6187.jpg', 'LOLKEK1', 28, '2023-02-16 14:02:23', NULL, NULL, 1),
(158, 1, 'f111', '', 'fsdgsdавыаываsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:41', '2023-02-23 12:00:50', NULL, 1),
(159, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:03:55', NULL, NULL, 1),
(160, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', '140d96c3105f7128e12d90098d0e6187.jpg', 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:04', NULL, NULL, 0),
(161, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:17', NULL, NULL, 1),
(163, 4, 'fsdgsdg32423545346fsdgsdg54f654g65s4d6g4sd6g6jknj', '140d96c3105f7128e12d90098d0e6187.jpg', 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:04:56', NULL, NULL, 1),
(164, 1, 'fsdgsdg32423545346fsdgsdg32423545346jknj', NULL, 'fsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknjfsdgsdg32423545346fsdgsdg32423545346jknj', 28, '2023-02-16 14:05:02', NULL, NULL, 1),
(165, 2, 'fgshbdfhbs', NULL, 'sdgasdgsdfhdsfhdghdfh', 28, '2023-02-16 14:05:09', NULL, NULL, 1),
(166, 3, 'dsfsdfsdfsdf', NULL, 'sdfsdfsdfsdfsdf', 28, '2023-02-16 14:05:16', NULL, NULL, 1),
(174, 1, '324', '140d96c3105f7128e12d90098d0e6187.jpg', '234324', 28, '2023-02-17 19:31:30', NULL, NULL, 1),
(175, 1, '111', '', '11111', 28, '2023-02-21 11:05:25', NULL, NULL, 1),
(176, 1, '222', '', '222', 28, '2023-02-21 11:56:54', NULL, NULL, 1),
(177, 1, 'c', '', '   d', 28, '2023-02-21 16:59:22', NULL, NULL, 1),
(178, 1, 'df22222', '', 'dfdf', 28, '2023-02-21 17:09:47', '2023-02-23 11:56:16', NULL, 1),
(179, 1, '1111', '', '11111', 28, '2023-02-21 17:09:57', NULL, NULL, 1),
(180, 4, '1111', '', '11111', 28, '2023-02-21 17:10:08', NULL, NULL, 0),
(181, 1, '5555556', '', '555555555', 28, '2023-02-21 18:37:32', '2023-02-23 11:38:28', NULL, 0),
(184, 1, 'sdf', '', 'sdfsdf', 28, '2023-02-21 18:40:59', NULL, NULL, 0),
(190, 1, 'привет', '', 'Мир', 26, '2023-02-24 11:32:01', NULL, NULL, 1),
(191, 1, 'вавыаы', '', 'ываываыва', 28, '2023-02-27 18:26:03', NULL, NULL, 1),
(192, 1, 'Привет мир', '', 'Для более продвинутого поиска, предусмотрены специальные полнотекстовые индексы (или full-text search индексы). Mysql поддерживает полнотекстовые индексы для таблиц MyISAM. Поддержка Innodb добавлена с версии 5.6.4.', 28, '2023-03-01 07:46:45', NULL, NULL, 1),
(193, 1, 'Описанная техника подсчета лучше всего работает для больших наборов текстов', '', 'Поиск по слову ``MySQL&#039;&#039; в предыдущем примере не приводит к каким-либо результатам, так как это слово присутствует более чем в половине строк. По существу, данное слово целесообразно трактовать как стоп-слово (т.е. слово с нулевой смысловой ценностью). Это наиболее приемлемое решение - запрос на естественном языке не должен возвращать каждую вторую строку из таблицы размером 1Гб.', 28, '2023-03-01 07:47:07', NULL, NULL, 1),
(194, 1, 'sdfsdf', '', 'sdfsdf', 28, '2023-03-01 08:06:18', NULL, NULL, 1),
(195, 1, 'Привет мир', '', '1111111111111111111', 28, '2023-03-01 08:12:47', NULL, NULL, 1),
(196, 1, 'Привет мир', '', '222222222222222', 28, '2023-03-01 08:12:54', NULL, NULL, 1),
(197, 1, '1111111', '', 'Привет мир', 28, '2023-03-01 08:13:06', NULL, NULL, 1),
(198, 1, 'эта версия MySQL поддерживает полнотекстовый поиск и индексацию', '', 'Что касается MySQL 3.23.23, то эта версия MySQL поддерживает полнотекстовый поиск и индексацию. Полнотекстовые индексы в MySQL обозначаются как индексы типа FULLTEXT. Эти индексы могут быть созданы в столбцах VARCHAR и TEXT во время создания таблицы командой CREATE TABLE или добавлены позже с помощью команд ALTER TABLE или CREATE INDEX. Загрузка больших массивов данных в таблицу будет происходить намного быстрее, если таблица не содержит индекс FULLTEXT, который затем создается командой ALTER TABLE (или CREATE INDEX). Загрузка данных в таблицу, уже имеющую индекс FULLTEXT, будет более медленной.', 28, '2023-03-01 08:16:18', NULL, NULL, 1),
(199, 1, 'Функция MATCH()', '', 'Функция MATCH() выполняет поиск в естественном языке, сравнивая строку с содержимым текста (совокупность одного или более столбцов, включенных в индекс FULLTEXT). Строка поиска задается как аргумент в выражении AGAINST(). Поиск выполняется без учета регистра символов. Для каждой строки столбца в заданной таблице команда MATCH() возвращает величину релевантности, т.е. степень сходства между строкой поиска и текстом, содержащимся в данной строке указанного в списке оператора MATCH() столбца.', 28, '2023-03-01 08:16:30', NULL, NULL, 1),
(200, 1, 'Когда команда MATCH() используется в выражении WHERE', '', 'Когда команда MATCH() используется в выражении WHERE (см. пример выше), возвращенные строки столбцов автоматически сортируются, начиная с наиболее релевантных. Величина релевантности представляет собой неотрицательное число с плавающей точкой. Релевантность вычисляется на основе количества слов в данной строке столбца, количества уникальных слов в этой строке, общего количества слов в тексте и числа документов (строк), содержащих отдельное слово.', 28, '2023-03-01 08:16:46', NULL, NULL, 1),
(201, 1, '1123', '', '324234', 31, '2023-03-02 14:31:47', NULL, NULL, 0),
(202, 1, '1111', '', '111111', 31, '2023-03-02 14:31:58', NULL, NULL, 0),
(203, 3, 'dsfsdfsdf', '', 'sdfsdfsdf', 31, '2023-03-02 14:32:17', NULL, NULL, 0),
(204, 3, '1111', '', '1111', 31, '2023-03-02 14:32:25', NULL, NULL, 0);

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
(1, 'admin', 'admin@gmail.com', 3, '2023-02-05 14:39:29', 'admin', 'Мужчина'),
(26, 'Vova', 'vova2802@mail.ru', 1, '2023-02-12 10:12:02', 'b285a7886cfdfb797b0d57c9d053c3f2', 'Мужчина'),
(28, 'admin', 'admin@admin.ru', 1, '2023-02-13 08:35:50', 'a66abb5684c45962d887564f08346e8d', 'Мужчина'),
(31, 'Vladimir', 'vova111@mail.ru', 3, '2023-03-02 14:31:00', 'fb38287352092f2d4b0437e1da3bd4ac', 'Мужчина');

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
ALTER TABLE `news` ADD FULLTEXT KEY `IDX_news` (`theme`,`textContent`);

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
  MODIFY `idNews` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
