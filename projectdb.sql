-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 16 2015 г., 11:22
-- Версия сервера: 5.5.41-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `projectdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `question`, `answer`, `status`) VALUES
(1, 'PHP', 'Good', 1),
(2, 'PHP', 'Good', 1),
(3, 'PHP', 'Good', 1),
(4, 'PHP', 'Good', 1),
(5, 'PHP', 'Good', 1),
(6, 'PHP', 'Good', 1),
(7, 'PHP', 'Good', 1),
(8, 'PHP', 'Lalka', 1),
(9, 'PHP', 'Lalka', 1),
(10, 'PHP', 'Lalka', 1),
(11, 'How do you do?', NULL, 1),
(12, 'How do you do?', NULL, 1),
(13, 'Чи тяжко вступити в ХПК?', 'Якщо хоч трохи вчились в школі,ви вступите', 1),
(14, 'Які найкращі відділення в коледжі?', 'Всі відділення чудові', 1),
(15, 'Які докумнети потрібні при вступі?', 'Атесат, додаток до атестату,форма Н**', 1),
(16, 'Які екзамени при вступі потрібно здавати?', 'Українська мова і математика', 1),
(17, 'Скільки бюджетних місць на відділенні прогамування?', 'Цього року - 40 бюджетних місць', 1),
(18, 'Чи є в коледжі тренажерний зал?', 'Так, в коледжі є тренажерний зал', 1),
(19, 'Скільки комп*ютерних класів в коледжі?', '15', 1),
(20, 'Скільки викладачів вищої карегорії?', 'Близько 20', 1),
(21, 'Чи є на базі коледжу, якісь курси?', 'В коледжі є курси - водіння', 1),
(22, 'Чи є осінні канікули?', 'Ні, не має. Це для школярів', 1),
(23, 'Який розмір стипендії', 'Близько 700 грн', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
