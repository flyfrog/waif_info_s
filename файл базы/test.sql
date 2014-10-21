-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 15 2014 г., 20:18
-- Версия сервера: 5.6.16
-- Версия PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `body`
--

CREATE TABLE IF NOT EXISTS `body` (
  `id_mark` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_region` int(10) NOT NULL,
  `json_body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `hidden_flag` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mark`),
  UNIQUE KEY `id_mark` (`id_mark`),
  KEY `id_region` (`id_region`),
  KEY `id_mark_2` (`id_mark`),
  KEY `user_name` (`user_name`),
  KEY `status` (`status`),
  KEY `hidden_flag` (`hidden_flag`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `body`
--

INSERT INTO `body` (`id_mark`, `user_name`, `id_region`, `json_body`, `status`, `hidden_flag`, `date`) VALUES
('2573718_9351403', 'frog', 50, '{"id":"2573718_9351403","types":["3"],"names":"fdsa","region":"Московская область","phone":"fasd","site":"fads","e_mail":"dsfa","coord":[56.3436947283,35.644697484317],"times":"afds","detail":"adsf","myname":"frog","adress":"ads","hidden_flag":"0","delite":0,"p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 14:16:32'),
('280360_2031957', 'frog', 50, '{"id":"280360_2031957","types":["3"],"names":"221122221","region":"Москва","phone":"afads","site":"fdsasfdd","e_mail":"saf","coord":[55.745671966147,37.509537353516],"times":"dfas","detail":"adsf","myname":"frog","adress":"affds","hidden_flag":"0","delite":0,"p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 14:41:16'),
('2833109_1242551', 'frog', 50, '{"id":"2833109_1242551","types":["0"],"names":"2&quot;&quot;&quot;&quot;&quot;","region":"Москва","phone":"fad","site":"afds","e_mail":"sasfd","coord":[55.783610355526,37.362595214844],"times":"fads","detail":"fads","myname":"frog","adress":"fads","hidden_flag":"0","delite":"","p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 14:40:35'),
('2975330_9789609', 'admin', 50, '{"id":"2975330_9789609","types":["0"],"names":"afs","region":"Москва","phone":"dafs","site":"fads","e_mail":"adf","coord":[55.887942832033,37.832260742187],"times":"dfas","detail":"adfs","myname":"admin","adress":"dfsa","hidden_flag":"0","delite":0,"p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 19:28:48'),
('4126427_1578813', 'frog', 50, '{"id":"4126427_1578813","types":["0"],"names":"adsf","region":"Москва","phone":"dsfa","site":"dsfa","e_mail":"asdf","coord":[55.840062081647,37.31041015625],"times":"adfs","detail":"fd<br>sfdfsd","myname":"frog","adress":"dfas","hidden_flag":"0","delite":"","p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 14:23:39'),
('5752339_2135589', 'frog', 50, '{"id":"5752339_2135589","types":["10"],"names":"sdfasdf","region":"Москва","phone":"dsf","site":"dfsdsf","e_mail":"dsfds","coord":[55.787479535519,37.685318603516],"times":" ","detail":"sdf<br>sdf<br>sdf<br>sdf<br> ","myname":"frog","adress":"dsf","hidden_flag":"0","delite":"","p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 15:09:40'),
('5848656_3124055', 'admin', 50, '{"id":"5848656_3124055","types":["13",0,1,2],"names":"sadfs","region":"Московская область","phone":"afdsfasd","site":"afsdasd","e_mail":"fasdasdf","coord":[55.884071617657,37.552345409393],"times":"afsd","detail":"dafdaf","myname":"admin","adress":"af","hidden_flag":"0","delite":0,"p_duty":1,"delite_flag":""}', 0, 0, '2014-10-06 19:30:57'),
('7915637_2480864', 'frog', 69, '{"id":"7915637_2480864","types":["2"],"names":"fsda","region":"Тверская область","phone":"fda","site":"fda","e_mail":"fdas","coord":[56.80300078376,34.536393687011],"times":"adsf","detail":"sadf","myname":"frog","adress":"fads","hidden_flag":"0","delite":0,"p_duty":0,"delite_flag":""}', 0, 0, '2014-10-06 14:16:46'),
('8266319_474079', 'admin', 50, '{"id":"8266319_474079","types":["4"],"names":"dfsa","region":"Москва","phone":"dsf","site":"asfd","e_mail":"dsfa","coord":[55.876364214227,37.539749755859],"times":"dsfa","detail":"<img src=&quot;http://hsto.org/files/2f2/bdf/faa/2f2bdffaa03241f68c56cb1db165030a.jpg&quot;  />","myname":"admin","adress":"fdas","hidden_flag":"1","delite":"","p_duty":0,"delite_flag":""}', 0, 1, '2014-10-06 19:29:26');

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_region` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_name` (`city_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name_region`, `city_name`) VALUES
(1, 'Республика Адыгея', 'Майкоп'),
(2, 'Республика Башкортостан', 'Уфа'),
(3, 'Республика Бурятия', 'Улан-Удэ'),
(4, 'Республика Алтай', 'Горно-Алтайск'),
(5, 'Республика Дагестан', 'Махачкала'),
(6, 'Республика Ингушетия', 'Назрань'),
(7, 'Кабардино-Балкарская Республика', 'Нальчик'),
(8, 'Республика Калмыкия', 'Элиста'),
(9, 'Республика Карачаево-Черкессия', 'Черкесск'),
(10, 'Республика Карелия', 'Петрозаводск'),
(11, 'Республика Коми', 'Сыктывкар'),
(12, 'Республика Марий Эл', 'Йошкар-Ола'),
(13, 'Республика Мордовия', 'Саранск'),
(14, 'Республика Саха (Якутия)', 'Якутск'),
(15, 'Республика Северная Осетия-Алания', 'Владикавказ'),
(16, 'Республика Татарстан', 'Казань'),
(17, 'Республика Тыва', 'Кызыл'),
(18, 'Республика Удмуртия', 'Ижевск'),
(19, 'Республика Хакасия', 'Абакан'),
(20, 'Чеченская республика', 'Грозный'),
(21, 'Чувашская Республика', 'Чебоксары'),
(22, 'Алтайский край', 'Барнаул'),
(23, 'Краснодарский край', 'Краснодар'),
(24, 'Красноярский край', 'Красноярск'),
(25, 'Приморский край', 'Владивосток'),
(26, 'Ставропольский край', 'Ставрополь'),
(27, 'Хабаровский край', 'Хабаровск'),
(28, 'Амурская область', 'Благовещенск'),
(29, 'Архангельская область', 'Архангельск'),
(30, 'Астраханская область', 'Астрахань'),
(31, 'Белгородская область', 'Белгород'),
(32, 'Брянская область', 'Брянск'),
(33, 'Владимирская область', 'Владимир'),
(34, 'Волгоградская область', 'Волгоград'),
(35, 'Вологодская область', 'Вологда'),
(36, 'Воронежская область', 'Воронеж'),
(37, 'Ивановская область', 'Иваново'),
(38, 'Иркутская область', 'Иркутск'),
(39, 'Калининградская область', 'Калининград'),
(40, 'Калужская область', 'Калуга'),
(41, 'Камчатский край', 'Петропавловск-Камчатский'),
(42, 'Кемеровская область', 'Кемерово'),
(43, 'Кировская область', 'Киров'),
(44, 'Костромская область', 'Кострома'),
(45, 'Курганская область', 'Курган'),
(46, 'Курская область', 'Курск'),
(47, 'Ленинградская область', 'Санкт-Петербург'),
(48, 'Липецкая область', 'Липецк'),
(49, 'Магаданская область', 'Магадан'),
(50, 'Московская область', 'Москва'),
(51, 'Мурманская область', 'Мурманск'),
(52, 'Нижегородская область', 'Нижний Новгород'),
(53, 'Новгородская область', 'Новгород'),
(54, 'Новосибирская область', 'Новосибирск'),
(55, 'Омская область', 'Омск'),
(56, 'Оренбургская область', 'Оренбург'),
(57, 'Орловская область', 'Орел'),
(58, 'Пензенская область', 'Пенза'),
(59, 'Пермский край', 'Пермь'),
(60, 'Псковская область', 'Псков'),
(61, 'Ростовская область', 'Ростов-на-Дону'),
(62, 'Рязанская область', 'Рязань'),
(63, 'Самарская область', 'Самара'),
(64, 'Саратовская область', 'Саратов'),
(65, 'Сахалинская область', 'Южно-Сахалинск'),
(66, 'Свердловская область', 'Екатеринбург'),
(67, 'Смоленская область', 'Смоленск'),
(68, 'Тамбовская область', 'Тамбов'),
(69, 'Тверская область', 'Тверь'),
(70, 'Томская область', 'Томск'),
(71, 'Тульская область', 'Тула'),
(72, 'Тюменская область', 'Тюмень'),
(73, 'Ульяновская область', 'Ульяновск'),
(74, 'Челябинская область', 'Челябинск'),
(75, 'Забайкальский край', 'Чита'),
(76, 'Ярославская область', 'Ярославль'),
(77, 'Еврейская автономная область', 'Биробиджан'),
(78, 'Ненецкий автономный округ', 'Нарьян-Мар'),
(79, 'Ханты-Мансийский автономный округ - Югра', 'Ханты-Мансийск'),
(80, 'Чукотский автономный округ', 'Анадырь'),
(81, 'Ямало-Ненецкий автономный округ', 'Салехард'),
(82, 'Республика Крым', 'Севастополь');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rule` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `rule`) VALUES
(3, 'admin', 'fr', 3),
(4, 'frog', 'res', 1),
(5, 'adam', 'ttr', 1),
(6, 'eva', 'wwe', 2),
(7, 'vizor', 'qqw', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
