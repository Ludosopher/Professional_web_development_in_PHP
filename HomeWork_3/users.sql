-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2020 г., 15:36
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_admin` varchar(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `login`, `password`, `date`) VALUES
(7, NULL, 'Валентин', 'Valik', '$2y$10$RMK4Q0NW8ew13VofN7f88ue62ox9XlIVukRobVM/P3sWxPKQ6FMCe', '1966-04-26 00:00:00'),
(9, NULL, 'Юлий', 'Yulik', '$2y$10$bywuG6Xs9zNWIrsUvcMbEuOHbxsS2xR9XZojI2GaEr20jrOjLG0Cu', '1999-07-23 00:00:00'),
(10, 'admin', 'Viktor Alikin', 'admin', '$2y$10$TOzEdE.9JbWx/G1PfgiueO94iGYGJcYjKxVb9N/HPQCZi8rMU7aSW', '2020-04-16 00:00:00'),
(11, NULL, 'Зосим', 'Zosik', '$2y$10$f9mZRDzdeKqaGon4RYSBk.msFvYqlHZ/G.jZtts0QbtktCVl3Of0K', '1988-07-29 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
