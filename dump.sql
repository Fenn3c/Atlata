-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 28 2022 г., 20:34
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `atlata`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(0, 'uploading'),
(1, 'Видеоигры'),
(2, 'Музыка'),
(3, 'Экшн и приключения'),
(4, 'Анимация'),
(5, 'Изобразительное искусство'),
(6, 'Кулинария'),
(8, 'Новости'),
(9, 'Спорт'),
(10, 'Фильмы');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_video`, `content`, `date`) VALUES
(13, 3, 63, 'Крутое видео!', '2022-06-26'),
(14, 3, 63, 'Дождик', '2022-06-26'),
(15, 3, 63, 'ывавыавыа', '2022-06-26'),
(16, 3, 62, 'Очень крутое видео!', '2022-06-27');

-- --------------------------------------------------------

--
-- Структура таблицы `comments_rating`
--

CREATE TABLE `comments_rating` (
  `id_comment_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments_rating`
--

INSERT INTO `comments_rating` (`id_comment_rating`, `id_user`, `id_comment`, `rating`) VALUES
(3, 3, 13, 0),
(4, 3, 14, 0),
(5, 3, 15, 0),
(6, 3, 16, 0);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `comments_with_data`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `comments_with_data` (
`id_comment` int(11)
,`id_user` int(11)
,`id_video` int(11)
,`content` text
,`date` date
,`rating` decimal(32,0)
,`login` varchar(256)
,`pfp` varchar(256)
);

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `event` varchar(256) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `user_agent` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`id_log`, `id_user`, `event`, `ip_address`, `user_agent`, `date`) VALUES
(4, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.2.615 Yowser/2.5 Safari/537.36', '2022-06-20'),
(5, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.2.615 Yowser/2.5 Safari/537.36', '2022-06-20'),
(6, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.2.615 Yowser/2.5 Safari/537.36', '2022-06-20'),
(7, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.2.615 Yowser/2.5 Safari/537.36', '2022-06-20'),
(8, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.2.615 Yowser/2.5 Safari/537.36', '2022-06-21'),
(9, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.2.615 Yowser/2.5 Safari/537.36', '2022-06-21'),
(10, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.3.684 Yowser/2.5 Safari/537.36', '2022-06-26'),
(11, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.3.684 Yowser/2.5 Safari/537.36', '2022-06-27'),
(12, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(13, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(14, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(15, 3, 'SEND_QUERY', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(16, 6, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(17, 7, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(18, 8, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(19, 9, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(20, 10, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(21, 11, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(22, 12, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(23, 9, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(24, 13, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(25, 14, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(26, 15, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(27, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(28, 3, 'SEND_QUERY', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(29, 3, 'SEND_QUERY', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(30, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(31, 6, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(32, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28'),
(33, 3, 'ENTER_TO_SITE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.160 YaBrowser/22.5.4.904 Yowser/2.5 Safari/537.36', '2022-06-28');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribes`
--

CREATE TABLE `subscribes` (
  `id_subscribe` int(11) NOT NULL,
  `id_channel` int(11) NOT NULL,
  `id_subscriber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subscribes`
--

INSERT INTO `subscribes` (`id_subscribe`, `id_channel`, `id_subscriber`) VALUES
(13, 3, 3),
(14, 3, 3),
(15, 3, 3),
(16, 3, 3),
(17, 3, 3),
(18, 3, 3),
(19, 3, 3),
(22, 9, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `birthday` date NOT NULL,
  `pfp` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `banner` varchar(256) NOT NULL,
  `permissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `email`, `password`, `birthday`, `pfp`, `description`, `date`, `banner`, `permissions`) VALUES
(1, 'admin', 'admin@admin', '', '2022-06-06', '', '', '2022-06-20', '', 0),
(2, 'test', 'test@test.test', '', '2022-06-05', '', '', '2022-06-20', '', 0),
(3, 'tester', 'test@test.test', '$2y$10$kXa.F2L8h0.eqtU7MKj9euFxcEkBxGFM6MWLxjg.CerSAAj6KnrN2', '0000-00-00', '62b80a4782eee.png', 'Lorem ipsum', '2022-06-20', '62b877b41e7b9.png', 3),
(6, 'kinomiraru', 'kinomiraru@mail.ru', '$2y$10$K.2w//QF9cFBLvj2qvveauNSvIYyzBtC7bQtxKLvWRM5WoJLnKjEK', '1985-06-11', '62bac9249848e.jpg', '', '2022-06-28', '', 0),
(7, 'Super Elevator', 'SuperElevator@mail.com', '$2y$10$yyGzgROwnumHR5Am1VqJj.2DkzY4G5daung8YkKpTK.n5R4BTSvB.', '1982-06-28', '62bad7de727bc.jpg', '', '2022-06-28', '', 0),
(8, 'voltNik', 'voltNik@mail.com', '$2y$10$x3ZBLXLUagvFuSRW/RXR2uu75EsReLkKHsWIq7q4CuHzMRvPVN3oW', '2005-02-28', '62bad93de1c2e.jpg', '', '2022-06-28', '', 0),
(9, ' PRO МЕТРО', ' PROМЕТРО@mail.com', '$2y$10$csG58r1kLDuqtMsPSApdrufKyNTtOoio6uFAhP9LkQDaCNPraZ42C', '1993-01-28', '62badc4365d14.jpg', '', '2022-06-28', '', 0),
(10, 'Алексей Столяров', 'alex@mail.com', '$2y$10$HB5eNB37CFzbvh9EcY2vQeFMD1./CWeckMBVa2yVfHIyYKo/lyeDq', '1982-10-28', '62badda1aa12b.jpg', '', '2022-06-28', '', 0),
(11, 'Анатомия Монстров', 'anatomymonster@mail.com', '$2y$10$ark.Z1RSFbqsouCONz2/A.Utgjr8mftOiFZU3Wocp4r3dwTyVTQ6G', '2011-06-28', '62badeb35304a.jpg', '', '2022-06-28', '', 0),
(12, 'Теперь я Знаю', 'ttt@mail.ru', '$2y$10$s30mHQksfso8We/dbAdGSOS4CEklUVF0t5ZIcV5eEe43AAb2xUes2', '1989-10-28', '62badfe29198b.jpg', '', '2022-06-28', '', 0),
(13, 'Onigiri', 'Onigiri@mail.ru', '$2y$10$1Wy09EHrAr8J2awDXw4kUOF5gdTl64Y02rFHYUpIc7zdQ6wHuTPOa', '1978-12-28', '62bae17c0de64.jpg', '', '2022-06-28', '', 0),
(14, 'Ulbi TV', 'UlbiTV@mail.com', '$2y$10$6vam1HaRfmuaHbbQdCt3YO4c5A4XvErI7iJOq157sI4Ru1h4VxS12', '1992-03-28', '62bae220b07fd.jpg', '', '2022-06-28', '', 0),
(15, 'Мерион Нетворкс', 'mn@mail.ru', '$2y$10$6cFxrlOULWbA4Om19isrC.EQAe/F4JIgdnjjr/GkciJ0sDOxfW.se', '2022-06-16', '62bae4443acde.jpg', '', '2022-06-28', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) DEFAULT 0,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `file` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `thumbnail` varchar(256) NOT NULL,
  `duration` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id_video`, `id_user`, `id_category`, `title`, `description`, `file`, `date`, `thumbnail`, `duration`) VALUES
(64, 6, 10, 'Все грехи фильма \"Обитель зла 4: Жизнь после смерти\"', 'Все грехи фильма \"Обитель зла 4: Жизнь после смерти\" \r\nСледующий выпуск: \"Падение Луны\" ', '62bac93ad635a.mp4', '2022-06-28', '62bac93c2099b.jpg', '00:04'),
(65, 7, NULL, 'Электрический лифт (КМЗ-1984,320кг,1м/с)', 'Микрорайон: ?\r\nАдрес: Проспект Космонавтов 26 п-5', '62bad83a49ffa.mp4', '2022-06-28', '62bad83b23814.jpg', '00:05'),
(66, 8, 5, 'МОИ 20 ПЕРВЫХ ЗАКАЗОВ НА 3D ПЕЧАТЬ', 'Заказывая 3Д печать вы увидите как это печаталось и окажете поддержку автору канала, подписчикам скидка! ', '62badbc81f4ef.mp4', '2022-06-28', '62badbc8ea090.jpg', '00:10'),
(67, 9, 3, 'Хулиганы в вагоне. Действия машиниста если в поезде едут хулиганы.', 'Представьте, вы едете в вагоне метро и видите хулиганские действия в вагоне вашего поезда. Что же делать пассажиру, если он увидел хулиганские действия. Что делает машинист в данной ситуации. Сегодня вы узнаете об этом в нашем новом видео. ', '62badc83c40cc.mp4', '2022-06-28', '62badca26938a.png', '08:07'),
(68, 10, 9, 'ВОСХОЖДЕНИЕ НА ЭЛЬБРУС! ВСЕ ПОШЛО НЕ ПО ПЛАНУ feat Масленников', 'За крутой снарягой, страховкой и сувенирами только в экипировочный центр Кошки ', '62baddae4ba1f.mp4', '2022-06-28', '62baddd4b318c.png', '00:04'),
(69, 11, 6, 'Взрывоопасное производство обычной жвачки // НЕпростые вещи', 'Эксперты считают, что известная всем польза от неё не более чем удачный рекламный ход. Но люди все равно продолжают её жевать. От добычи нефти до упаковки. Все секреты жевательной резинки - в проекте \"Непростые вещи\". ', '62badebfa0724.mp4', '2022-06-28', '62badf0591323.png', '00:05'),
(70, 12, NULL, 'Как делать поддельные доллары в домашних условиях НО ВЫ ТАК НЕ ДЕЛАЙТЕ!', 'Доллары, слово так желанное для каждого из нас. Знали ли вы из чего делают доллары, что бумага и которой делают баксы, на самом деле...как бы...НЕ БУМАГА!', '62badfeb52d9b.mp4', '2022-06-28', '62bae058d54e5.jpg', '00:04'),
(71, 9, NULL, 'Куда уходят поезда метро? Где ночуют поезда метро?', 'В этом выпуске вы узнаете, что не все поезда метро проводят ночь в депо. Некоторые поезда остаются в тоннелях, чтобы рано утром начать перевозить пассажиров. Для чего это сделано? Ответ в этом выпуске!\r\nПочта для связи: prometroo@gmail.com', '62bae0c99da5b.mp4', '2022-06-28', '62bae0e7e6762.png', '00:05'),
(72, 13, NULL, 'Делаю нейросеть с нуля', 'Код: https://github.com/ArtemOnigiri/SimpleNN\r\nДатасет с цифрами: https://github.com/pjreddie/mnist-csv...\r\n\r\nВ этом видео я делаю простую нейросеть с нуля с обучением обратным распространением ошибки.', '62bae1830cc19.mp4', '2022-06-28', '62bae1ae821de.png', '00:05'),
(74, 14, 3, 'РЕАЛЬНОЕ СОБЕСЕДОВАНИЕ НА FRONTEND РАЗРАБОТЧИКА. ПРИТВОРИЛСЯ ДЖУНОМ', 'Прохожу реальное техническое собеседование на JUNIOR FRONTEND разработчика. Вопросы на собеседование по React, javascript, frontend.', '62bae2617871c.mp4', '2022-06-28', '62bae2723f9c9.jpg', '00:05'),
(75, 15, 10, 'Что такое IP - адрес и можно ли по нему кого-то вычислить?', 'Наш большой курс по сетевым технологиям | Пройди бесплатный вводный урок!\r\nhttps://wiki.merionet.ru/merion-acade...\r\n\r\nЧто такое IP - адрес? Почему он так выглядит?\r\n В чем разница между статическим и динамическим адресом?\r\n Могут ли вас вычислить по IP?\r\n\r\nПосле просмотра этого видео вы сможете ответить на эти вопросы. Простыми словами рассказываем о технологии. ', '62bae44b39ccd.mp4', '2022-06-28', '62bae4723cafc.png', '00:04'),
(76, 15, NULL, 'FreePBX 13 настройка c нуля', 'Графический интерфейс администратора IP – АТС Asterisk – FreePBX, насчитывает огромное количество опций настройки, вариантов маршрутизации, подключения различного оборудования, начиная от телефонных аппаратов и заканчивая шлюзами. В видео мы расскажем о базовой настройке тринадцатой версии FreePBX сразу после установки дистрибутива FreePBX.', '62bae4e64d168.mp4', '2022-06-28', '62bae50266ddc.png', '00:05');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `videos_with_data`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `videos_with_data` (
`id_video` int(11)
,`id_user` int(11)
,`id_category` int(11)
,`title` varchar(256)
,`description` text
,`file` varchar(256)
,`thumbnail` varchar(256)
,`duration` varchar(16)
,`date` date
,`rating` decimal(32,0)
,`comments` bigint(21)
,`views` bigint(21)
,`subscribers` bigint(21)
,`login` varchar(256)
,`pfp` varchar(256)
);

-- --------------------------------------------------------

--
-- Структура таблицы `video_rating`
--

CREATE TABLE `video_rating` (
  `id_video_rating` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video_rating`
--

INSERT INTO `video_rating` (`id_video_rating`, `id_video`, `id_user`, `rating`) VALUES
(14, 67, 3, 1),
(15, 72, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE `views` (
  `id_view` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `views`
--

INSERT INTO `views` (`id_view`, `id_user`, `id_video`) VALUES
(17, 6, 64),
(18, 7, 65),
(19, 7, 65),
(20, 8, 64),
(21, 8, 65),
(22, 8, 65),
(23, 8, 66),
(24, 9, 67),
(25, 9, 67),
(26, 9, 67),
(27, 9, 67),
(28, 9, 67),
(29, 9, 67),
(30, 9, 67),
(31, 9, 67),
(32, 9, 67),
(33, 9, 67),
(34, 9, 67),
(35, 9, 67),
(36, 9, 65),
(37, 10, 67),
(38, 10, 68),
(39, 9, 64),
(40, 3, 67),
(41, 3, 67),
(42, 3, 67),
(43, 3, 66),
(44, 3, 64),
(45, 3, 64),
(46, 3, 67),
(47, 3, 64),
(48, 3, 67),
(49, 3, 67),
(50, 3, 67),
(51, 3, 67),
(52, 3, 67),
(53, 3, 67),
(54, 3, 67),
(55, 3, 67),
(56, 3, 67),
(57, 3, 67),
(58, 3, 67),
(59, 3, 67),
(60, 3, 67),
(61, 3, 67),
(62, 3, 67),
(63, 3, 67),
(64, 3, 72),
(65, 3, 72),
(66, 3, 72);

-- --------------------------------------------------------

--
-- Структура для представления `comments_with_data`
--
DROP TABLE IF EXISTS `comments_with_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comments_with_data`  AS SELECT `comments`.`id_comment` AS `id_comment`, `comments`.`id_user` AS `id_user`, `comments`.`id_video` AS `id_video`, `comments`.`content` AS `content`, `comments`.`date` AS `date`, (select coalesce(sum(`comments_rating`.`rating`),0) from `comments_rating` where `comments_rating`.`id_comment` = `comments`.`id_comment`) AS `rating`, `users`.`login` AS `login`, `users`.`pfp` AS `pfp` FROM (`comments` left join `users` on(`users`.`id_user` = `comments`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Структура для представления `videos_with_data`
--
DROP TABLE IF EXISTS `videos_with_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `videos_with_data`  AS SELECT `videos`.`id_video` AS `id_video`, `videos`.`id_user` AS `id_user`, `videos`.`id_category` AS `id_category`, `videos`.`title` AS `title`, `videos`.`description` AS `description`, `videos`.`file` AS `file`, `videos`.`thumbnail` AS `thumbnail`, `videos`.`duration` AS `duration`, `videos`.`date` AS `date`, (select coalesce(sum(`video_rating`.`rating`),0) from `video_rating` where `video_rating`.`id_video` = `videos`.`id_video`) AS `rating`, (select coalesce(count(0),0) from `comments` where `comments`.`id_video` = `videos`.`id_video`) AS `comments`, (select count(0) from `views` where `views`.`id_video` = `videos`.`id_video`) AS `views`, (select count(0) from `subscribes` where `videos`.`id_user` = `subscribes`.`id_channel`) AS `subscribers`, `users`.`login` AS `login`, `users`.`pfp` AS `pfp` FROM (`videos` left join `users` on(`users`.`id_user` = `videos`.`id_user`)) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- Индексы таблицы `comments_rating`
--
ALTER TABLE `comments_rating`
  ADD PRIMARY KEY (`id_comment_rating`),
  ADD KEY `id_comment` (`id_comment`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id_subscribe`),
  ADD KEY `id_channel` (`id_channel`),
  ADD KEY `id_subscriber` (`id_subscriber`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `video_rating`
--
ALTER TABLE `video_rating`
  ADD PRIMARY KEY (`id_video_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id_view`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `comments_rating`
--
ALTER TABLE `comments_rating`
  MODIFY `id_comment_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id_subscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `video_rating`
--
ALTER TABLE `video_rating`
  MODIFY `id_video_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id_view` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments_rating`
--
ALTER TABLE `comments_rating`
  ADD CONSTRAINT `comments_rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_rating_ibfk_2` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION,
  ADD CONSTRAINT `videos_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `video_rating`
--
ALTER TABLE `video_rating`
  ADD CONSTRAINT `video_rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_rating_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `views_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
