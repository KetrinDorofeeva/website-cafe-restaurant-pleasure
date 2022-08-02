-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 01 2022 г., 21:20
-- Версия сервера: 5.7.29
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `caferestaurant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client_booking`
--

CREATE TABLE `client_booking` (
  `id_client_booking` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `booking_date` datetime NOT NULL,
  `number_client` int(2) NOT NULL,
  `wishes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client_booking`
--

INSERT INTO `client_booking` (`id_client_booking`, `id_user`, `fio`, `phone`, `mail`, `booking_date`, `number_client`, `wishes`) VALUES
(98, 1, 'Сидорова А.П', '+7 (653) 869-86-89', 'sidorov@yandex.ru', '2021-12-22 15:25:00', 3, ''),
(99, 3, 'Михайлова В.П', '+7 (921) 826-27-91', 'mival@yandex.ru', '2021-12-23 14:55:00', 2, ''),
(100, 2, 'Дорофеева Е.А', '+7 (981) 942-53-40', 'multiveb@yandex.ru', '2022-03-23 17:10:00', 1, 'Желательно возле окна'),
(101, 2, 'Дорофеева Е.А', '+7 (981) 942-53-40', 'multiveb@yandex.ru', '2022-03-12 11:55:00', 1, ''),
(102, 2, 'Дорофеева Е.А', '+7 (981) 942-53-40', 'multiveb@yandex.ru', '2022-03-13 16:15:00', 1, ''),
(104, 3, 'Золоткова А.Р', '+7 (854) 535-74-54', 'zolotko@yandex.ru', '2022-03-25 18:45:00', 4, ''),
(105, 1, 'Иванов И.И', '+7 (926) 019-24-41', 'ivanov@yandex.ru', '2022-05-12 19:25:00', 1, ''),
(106, 1, 'Петров П.П', '+7 (981) 972-65-12', 'petrov@yandex.ru', '2022-05-13 20:10:00', 3, ''),
(107, 1, 'Дорофеева Е.А', '+7 (981) 942-53-40', 'multiveb@yandex.ru', '2022-05-14 21:55:00', 2, ''),
(116, NULL, 'Носова И.П', '+7 (926) 019-24-41', 'nosova@gmail.com', '2022-05-19 13:45:00', 1, ''),
(117, NULL, 'Иванов И.И', '+7 (653) 869-86-89', 'ivanov@gmail.com', '2022-05-18 17:30:00', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `client_order`
--

CREATE TABLE `client_order` (
  `id_client_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `dop_info` text,
  `delivery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client_order`
--

INSERT INTO `client_order` (`id_client_order`, `id_user`, `fio`, `phone`, `mail`, `address`, `dop_info`, `delivery_date`) VALUES
(16, 2, 'Петров П.П', '+7 (644) 744-87-43', 'petrov@yandex.ru', 'Улица Набережная, дом 9, квартира 17', '', '2021-12-19 11:15:00'),
(17, 3, 'Зернов П.О', '+7 (457) 643-65-65', 'zenov@yandex.ru', 'Фрунзенский район, улица Яркая, дом 64, квартира 33', 'Побыстрее', '2022-03-25 20:55:00'),
(18, 2, 'Дорофеева Е.А', '+7 (981) 942-53-40', 'multiveb@yandex.ru', 'Улица Яркая, дом 65, квартира 32', '', '2022-05-11 12:10:00'),
(19, 1, 'Иванов И.И', '+7 (981) 762-79-30', 'ivanov@yandex.ru', 'Улица Такая та, дом 666, квартира 66', '', '2022-05-11 15:35:00'),
(20, 1, 'Колесов Р.Г', '+7 (642) 754-78-98', 'kolesov@yandex.ru', 'Ломоносовская улица, дом 56, квартира 21', '', '2022-05-11 18:30:00'),
(22, 1, 'Дорофеева Е.А', '+7 (981) 942-53-40', 'multiveb@yandex.ru', 'Фрунзенский район, улица Яркая, дом 6, квартира 20', 'Побыстрее, пожалуйста', '2022-05-13 22:10:00'),
(23, NULL, 'Иванов И.И', '+7 (644) 744-87-43', 'ivanov@gmail.com', 'Улица Такая та, дом 666, квартира 66', '', '2022-05-19 18:30:00'),
(24, NULL, 'Колесов Р.Г', '+7 (981) 762-79-30', 'kolesov@yandex.ru', 'Ломоносовская улица, дом 56, квартира 21', '', '2022-05-20 14:50:00'),
(25, 1, 'Золоткова А.П.', '+7 (653) 809-12-45', 'zolotkova@yandex.ru', 'Ленинградская область, Тосненский район, улица Комсомола, дом 65, квартира 12', '', '2022-06-08 15:55:00');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `text` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_and_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_comment`, `text`, `id_user`, `date_and_time`) VALUES
(1, 'Сегодня заказала пиццу Маргарита и на десерт мороженное Аффогато. Все очень вкусно!', 3, '2022-05-09 12:23:54'),
(2, 'Цыпленок качьятори и салат Цезарь просто улет! Вкусностища!', 2, '2022-05-09 13:10:16'),
(6, 'Отлично!', 3, '2022-05-09 20:35:57'),
(7, 'Супер вкусно!', 1, '2022-05-11 14:55:01');

-- --------------------------------------------------------

--
-- Структура таблицы `conditions`
--

CREATE TABLE `conditions` (
  `id_condition` int(11) NOT NULL,
  `name_condition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `conditions`
--

INSERT INTO `conditions` (`id_condition`, `name_condition`) VALUES
(1, 'Ожидают'),
(2, 'В процессе'),
(3, 'Готово');

-- --------------------------------------------------------

--
-- Структура таблицы `con_client_booking`
--

CREATE TABLE `con_client_booking` (
  `id_booking` int(11) NOT NULL,
  `id_client_booking` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_condition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `con_client_booking`
--

INSERT INTO `con_client_booking` (`id_booking`, `id_client_booking`, `id_user`, `id_condition`) VALUES
(81, 98, 1, 3),
(82, 99, 3, 3),
(83, 100, 2, 1),
(84, 101, 2, 1),
(85, 102, 2, 1),
(86, 104, 3, 2),
(87, 105, 1, 1),
(88, 106, 1, 1),
(89, 107, 1, 1),
(94, 116, NULL, 1),
(95, 117, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `con_client_order`
--

CREATE TABLE `con_client_order` (
  `id_order` int(11) NOT NULL,
  `id_client_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_condition` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `quantity` int(2) NOT NULL,
  `cost` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `con_client_order`
--

INSERT INTO `con_client_order` (`id_order`, `id_client_order`, `id_product`, `id_condition`, `id_user`, `quantity`, `cost`) VALUES
(27, 16, 14, 1, 2, 2, 1460),
(28, 16, 24, 1, 2, 1, 109),
(31, 17, 1, 1, 3, 1, 399),
(32, 17, 10, 1, 3, 3, 1410),
(33, 18, 4, 1, 2, 2, 718),
(34, 19, 21, 1, 1, 1, 1800),
(35, 20, 10, 1, 1, 1, 470),
(37, 22, 1, 1, 1, 1, 399),
(38, 23, 1, 1, NULL, 3, 1197),
(39, 23, 4, 1, NULL, 2, 718),
(40, 23, 10, 1, NULL, 1, 470),
(41, 24, 5, 1, NULL, 1, 439),
(42, 24, 10, 1, NULL, 1, 470),
(43, 25, 42, 1, 1, 2, 798);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imglink` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `cpfc` text NOT NULL COMMENT 'Калорийность, белки, жиры и углеводы',
  `id_product_categories` int(11) NOT NULL,
  `id_product_undercategories` int(11) DEFAULT NULL,
  `id_stock` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `imglink`, `description`, `parameter`, `cpfc`, `id_product_categories`, `id_product_undercategories`, `id_stock`, `quantity`, `price`) VALUES
(1, 'Пепперони', 'uploads/1635609168_product.png', 'Пикантная пепперони, томатный соус, моцарелла, томаты, свежий базилик', '25 см | 440 г', 'Калорийность: 1356 Ккал.<br> Б: 47 / Ж: 69 / У: 142.', 1, NULL, 1, 10, 399),
(2, 'Coca-cola', 'uploads/1635609169_product.png', 'Безалкогольный газированный напиток', '0,5 л | classic', 'Калорийность: 210 Ккал.<br> Б: 0 / Ж: 0 / У: 53.', 7, 3, 2, 20, 99),
(4, 'Маргарита', 'uploads/1635689460_product.png', 'Итальянская трава, томатный соус, моцарелла, томаты', '25 см | 350 г', 'Калорийность: 1058 Ккал.<br> Б: 40 / Ж: 42 / У: 143.', 1, NULL, 1, 7, 359),
(5, 'Карбонара', 'uploads/1635689461_product.png', 'Ветчина, итальянские травы, маринованная морковь', '30 см | 450 г', 'Калорийность: 1253 Ккал.<br> Б: 50 / Ж: 47 / У: 160.', 1, NULL, 1, 15, 439),
(6, 'Цыпленок барбекю', 'uploads/1635689462_product.png', 'Цыпленок, соус барбекю, томатный соус, красный лук, моцарелла', '30 см | 630 г', 'Калорийность: 1365 Ккал.<br> Б: 60 / Ж: 70 / У: 170.', 1, NULL, NULL, 25, 680),
(7, 'Fanta', 'uploads/1635609170_product.png', 'Максимально газированный, с ярко выраженным вкусом апельсина', '0,5 л | classic', 'Калорийность: 220 Ккал.<br> Б: 0 / Ж: 0 / У: 11.', 7, 3, 2, 15, 109),
(8, 'Морс', 'uploads/1635609171_product.png', 'Черная смородина, лимон', '1 л', 'Калорийность: 219 Ккал.<br> Б: 1 / Ж: 1 / У: 53.', 7, 3, NULL, 10, 112),
(9, 'Фадзолетти', 'uploads/1639823643_product.png', 'Соус “песто”,  свежий базилик, натертый сыр “пармиджано реджано”', '15 см | 250 г', 'Калорийность: 344 Ккал.<br> Б: 10 / Ж: 2 / У: 68.', 2, NULL, NULL, 30, 500),
(10, 'Конкильони', 'uploads/1639823803_product.png', 'Лумакони, фаршированные творогом\r\nс соусом “Болоньезе”', '15 см | 250 г', 'Калорийность: 360 Ккал.<br> Б: 12 / Ж: 3 / У: 62.', 2, NULL, NULL, 20, 470),
(11, 'Кампанелле', 'uploads/1639824187_product.png', 'Цуккини, маринованные острые перцы черри, томатная паста, свежий базилик, пармезан', '15 см | 250 г', 'Калорийность: 150 Ккал.<br> Б: 5 / Ж: 2 / У: 30.', 2, NULL, NULL, 45, 640),
(12, 'Минестроне', 'uploads/1639824380_product.png', 'Красный лук, сельдерей, базилик, помидоры пелати, розмарин, савойская капуста, тертый сыр пармезан', '15 см | 400 г', 'Калорийность: 410 Ккал.<br> Б: 27 / Ж: 29 / У: 12.', 3, NULL, NULL, 15, 210),
(13, 'Солянка мясная', 'uploads/1639824619_product.png', 'Свинина, вареная колбаса, ветчина, соленый огурец, томатная паста, маслины, лавровый лист, лимон', '15 см | 400 г', 'Калорийность: 280 Ккал.<br> Б: 16 / Ж: 23 / У: 20.', 3, NULL, NULL, 10, 179),
(14, 'Цыпленок качьятори', 'uploads/1639825044_product.png', 'Бекон, куриные бедра и голени, измельчанные томаты, шампиньоны, лавровый лист', '15 см | 400 г', 'Калорийность: 2042 Ккал.<br> Б: 75 / Ж: 188 / У: 11.', 4, NULL, 3, 12, 730),
(15, 'Рубец по-калабрийски', 'uploads/1639824877_product.png', 'Рубец под томатным соусом, сельдерей черешковый, красный острый перец чили', '15 см | 400 г', 'Калорийность: 1736 Ккал.<br> Б: 40 / Ж: 60 / У: 14.', 4, NULL, 3, 15, 780),
(16, 'Суффритт', 'uploads/1639825217_product.png', 'Томатная паста, острый перчик чили, лавровый лист, свинина', '15 см | 400 г', 'Калорийность: 980 Ккал.<br> Б: 36 / Ж: 55 / У: 19.', 4, NULL, NULL, 10, 660),
(17, 'Цезарь', 'uploads/1639825766_product.png', 'Зеленый салат, помидоры, куриное филе, белый хлеб, соус «Цезарь», сливочное масло, чеснок, сыр пармезан', '15 см | 400 г', 'Калорийность: 423 Ккал.<br> Б: 23 / Ж: 34 / У: 8.', 5, NULL, NULL, 20, 550),
(18, 'Аффогато', 'uploads/1639826352_product.png', 'Шоколадная стружка, взбитые сливки,\r\nпеченье', '100 г', 'Калорийность: 240 Ккал.<br> Б: 4 / Ж: 15 / У: 22.', 6, NULL, NULL, 25, 179),
(21, 'Бароло', 'uploads/1639829778_product.png', 'Сухое красное вино высшей категории (DOCG)', '0,75 л', 'Калорийность: 68 Ккал.<br> Б: 1 / Ж: 0 / У: 1.', 7, 1, NULL, 20, 1800),
(22, 'Беллини', 'uploads/1639830008_product.png', 'Слабоалкогольный коктейль, состоящий из игристого вина (просекко, асти, шампанское) и персикового пюре', '0,75 л', 'Калорийность: 59 Ккал.<br> Б: 1 / Ж: 0 / У: 7.', 7, 1, NULL, 7, 1100),
(23, 'Лимончелло', 'uploads/1639830231_product.png', 'Итальянский лимонный ликер', '0,75 л', 'Калорийность: 320 Ккал.<br> Б: 0 / Ж: 0 / У: 30.', 7, 1, NULL, 14, 1900),
(24, 'Латте', 'uploads/1639831179_product.png', 'Кофе (эспрессо), сахар, сироп, коровье молоко', '0,4 л', 'Калорийность: 132 Ккал.<br> Б: 8 / Ж: 4 / У: 12.', 7, 2, NULL, 30, 109),
(25, 'Кетчуп', 'uploads/1639834013_product.png', 'Томаты, уксус, сахар, специи', '25 г', 'Калорийность: 30 Ккал.<br> Б: 2 / Ж: 0 / У: 7.', 8, NULL, NULL, 30, 40),
(28, 'Морской салат', 'uploads/1639844418_product.png', 'Мидии, креветки, кальмар, яйцо куриное, огурец, майонез, горчица, черный молотый перец', '15 см | 400 г', 'Калорийность: 120 Ккал.<br> Б: 8 / Ж: 7 / У: 4.', 5, NULL, NULL, 30, 699),
(29, 'Четыре сезона', 'uploads/1635689463_product.png', 'Белый и красный соусы, шампиньоны, обжаренное филе цыпленка, свежие помидоры, красный лук', '30 см | 450 г', 'Калорийность: 1400 Ккал.<br>Б: 50 / Ж: 70 / У: 160.', 1, NULL, NULL, 40, 700),
(30, 'Итальянская', 'uploads/1635689464_product.png', 'Пикантная пепперони, ветчина, бекон, базилик, томаты, шампиньоны, оливки', '30 см | 450 г', 'Калорийность: 1200 Ккал.<br>Б: 77 / Ж: 55 / У: 155.', 1, NULL, NULL, 55, 550),
(31, 'Фейрверк', 'uploads/1635689465_product.png', 'Томаты, сладкий перец, красный лук, итальянские травы, бекон', '30 см | 450 г', 'Калорийность: 1460 Ккал.<br>Б: 70 / Ж: 55 / У: 135.', 1, NULL, NULL, 60, 610),
(32, 'Равиоли', 'uploads/1639824188_product.png', 'Свежий базилик, томатный соус, сыр моцарелла ', '20 см | 300 г', 'Калорийность: 240 Ккал.<br>Б: 20 / Ж: 3 / У: 40.', 2, NULL, NULL, 30, 450),
(33, 'Ризотто', 'uploads/1639824189_product.png', 'Морская капуста, мидии, креветки, свежие овощи', '20 см | 250 г', 'Калорийность: 344 Ккал.<br>Б: 8 / Ж: 2 / У: 58.', 2, NULL, NULL, 45, 610),
(35, 'Кьянти', 'uploads/1639830232_product.png', 'Итальянское сухое красное вино категории DOCG', '0,75 л', 'Калорийность: 84 Ккал.<br>Б: 7 / Ж: 0 / У: 3.', 7, 1, NULL, 15, 2450),
(36, 'Мартини', 'uploads/1639830233_product.png', 'Коктейль-аперитив, традиционно на основе джина и вермута', '0,75 л', 'Калорийность: 226 Ккал.<br>Б: 2 / Ж: 0 / У: 1.', 7, 1, NULL, 40, 1400),
(37, 'Чинотто', 'uploads/1639830234_product.png', 'Газированный безалкогольный напиток, получаемый из сока плодов апельсинового дерева с миртовыми листьями', '1 л', 'Калорийность: 50 Ккал.<br>Б: 0 / Ж: 0 / У: 7.', 7, 3, NULL, 50, 220),
(38, 'Кродино', 'uploads/1639830235_product.png', 'Итальянский безалкогольный напиток, напоминает вермут и содержит много сахара', '1 л', 'Калорийность: 50 Ккал.<br>Б: 1 / Ж: 0 / У: 15.', 7, 3, NULL, 50, 160),
(39, 'Сырный соус', 'uploads/1639834014_product.png', 'Сыр, сливки, черный перец, специи', '25 г', 'Калорийность: 80 Ккал.<br>Б: 6 / Ж: 10 / У: 5.', 8, NULL, NULL, 50, 40),
(40, 'Чесночный соус', 'uploads/1639834015_product.png', 'Чеснок, сливки, сметана, сыр, зелень, черный перец', '25 г', 'Калорийность: 70 Ккал.<br>Б: 1 / Ж: 7 / У: 6.', 8, NULL, NULL, 50, 40),
(41, 'Борщ холодный', 'uploads/1639824620_product.png', 'Ветчина, картофель отварной, свекла, яйцо, огурец, укроп, сметана', '15 см | 400 г', 'Калорийность: 120 Ккал.<br>\r\nБ: 4 / Ж: 4 / У: 12.', 3, NULL, NULL, 20, 199),
(42, 'Том ям', 'uploads/1639824621_product.png', 'Бульон том ям, креветка тигровая, шампиньоны, томаты черри, кинза, сливки', '15 см | 400 г', 'Калорийность: 370 Ккал.<br>Б: 36 / Ж: 16 / У: 8.', 3, NULL, NULL, 30, 399),
(43, 'Панна Котта', 'uploads/1639826353_product.png', 'Вишня, клубника, сахар, желатин, молоко, сливки, ванилин', '150 г', 'Калорийность: 160 Ккал.<br>Б: 6 / Ж: 20 / У: 25.', 6, NULL, NULL, 40, 149),
(44, 'Торт Павлова', 'uploads/1639826354_product.png', 'Клубника, черника, сахарная пудра, молоко, сливки, ваниль, творожный сыр', '300 г', 'Калорийность: 195 Ккал.<br>Б: 4 / Ж: 6 / У: 40.', 6, NULL, NULL, 20, 199),
(45, 'Горячий шоколад', 'uploads/1639831180_product.png', 'Черный шоколад, какао-порошок, молоко, сахар, взбитые сливки', '0,4 л', 'Калорийность: 148 Ккал.<br>Б: 4 / Ж: 8 / У: 14.', 7, 2, NULL, 25, 129),
(46, 'Капучино', 'uploads/1639831181_product.png', 'Кофе натуральный, молоко, сливки, сахар, ванилин', '0,4 л', 'Калорийность: 110 Ккал.<br>Б: 5 / Ж: 10 / У: 20.', 7, 2, NULL, 20, 115),
(47, 'Дракон', 'uploads/1635689466_product.png', 'Ветчина, пепперони, шампиньоны, паприка, лук красный, халапеньо, моцарелла, пармезан', '30 см | 670 г', 'Калорийность: 1690 Ккал.<br> Б: 76 / Ж: 56 / У: 220.', 1, NULL, NULL, 50, 599),
(48, 'Жульен', 'uploads/1635689467_product.png', 'Цыпленок копченый, яйцо, лук репчатый, моцарелла, соус грибной, сыр', '40 см | 900 г', 'Калорийность: 290 Ккал.<br>Б: 10 / Ж: 16 / У: 25.', 1, NULL, NULL, 45, 699),
(49, 'Тортеллини', 'uploads/1639824190_product.png', 'Свинина, сыр, шпинат, куриный бульон', '30 см | 300 г', 'Калорийность: 590 Ккал.<br>Б: 30 / Ж: 10 / У: 44.', 2, NULL, NULL, 40, 529),
(50, 'Паппарделле', 'uploads/1639824191_product.png', 'Сыр, томатный соус, грибы, пармезан, рагу', '30 см | 300 г', 'Калорийность: 480 Ккал.<br>Б: 25 / Ж: 8 / У: 45.', 2, NULL, NULL, 30, 469),
(51, 'Стриньоцци', 'uploads/1639824192_product.png', 'Спагетти, черные трюфели, мясное рагу, томатный соус', '20 см | 250 г', 'Калорийность: 490 Ккал.<br>Б: 20 / Ж: 12 / У: 50.', 2, NULL, NULL, 30, 510),
(52, 'Сырный суп', 'uploads/1639824622_product.png', 'Сливки, молоко, плавленый сыр, картофель, сухарики', '15 см | 400 г', 'Калорийность: 210 Ккал.<br>Б: 8 / Ж: 12 / У: 13.', 3, NULL, NULL, 25, 350),
(53, 'Гаспачо', 'uploads/1639824623_product.png', 'Томаты, сельдерей, чеснок, табаско, болгарский перец, сельдерей, оливковое масло', '15 см | 400 г', 'Калорийность: 210 Ккал.<br>Б: 35 / Ж: 14 / У: 10.', 3, NULL, NULL, 35, 299),
(54, 'Люля-кебаб', 'uploads/1639825218_product.png', 'Рубленая баранина, лук, курдюк, черный перец, томаты, петрушка', '15 см | 400 г', 'Калорийность: 1050 Ккал.<br>Б: 35 / Ж: 100 / У: 8.', 4, NULL, NULL, 45, 549),
(55, 'Французский омлет', 'uploads/1639825219_product.png', 'Яйца, сливочное масло, черный перец, петрушка, укроп', '15 см | 400 г', 'Калорийность: 355 Ккал.<br>Б: 22 / Ж: 28 / У: 4.', 4, NULL, NULL, 30, 399),
(56, 'Курзе', 'uploads/1639825220_product.png', 'Фарш говяжий, лук, черный перец, петрушка, сливочное масло, сметана', '15 см | 400 г', 'Калорийность: 200 Ккал.<br>Б: 9 / Ж: 7 / У: 28.', 4, NULL, NULL, 35, 420),
(57, 'Салат Нисуаз', 'uploads/1639844419_product.png', 'Картофель, фасоль стручковая, огурец, томаты красные, соус горчичный, лук, тунец в кунжуте, яйца', '15 см | 400 г', 'Калорийность: 500 Ккал.<br>Б: 27 / Ж: 37 / У: 14.', 5, NULL, NULL, 25, 599),
(58, 'Круасаны', 'uploads/1655704081_product.png', 'Небольшие булочки в форме полумесяца из слоёного теста с содержанием сливочного масла не менее 82% жирности', '100 г', 'Калорийность: 408 Ккал.<br>Б: 6 / Ж: 27 / У: 37.', 9, NULL, NULL, 30, 139);

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `id_product_categories` int(11) NOT NULL,
  `name_product_categories` varchar(255) NOT NULL,
  `imglink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`id_product_categories`, `name_product_categories`, `imglink`) VALUES
(1, 'Пиццы', 'uploads/1635609100_category.png'),
(2, 'Паста', 'uploads/1635609101_category.png'),
(3, 'Супы', 'uploads/1635609102_category.png'),
(4, 'Горячее', 'uploads/1635609103_category.png'),
(5, 'Салаты', 'uploads/1635609104_category.png'),
(6, 'Десерты', 'uploads/1635609105_category.png'),
(7, 'Напитки', 'uploads/1635609106_category.png'),
(8, 'Гарниры', 'uploads/1635609107_category.png'),
(9, 'Выпечка', 'uploads/1655702989_category.png');

-- --------------------------------------------------------

--
-- Структура таблицы `product_undercategories`
--

CREATE TABLE `product_undercategories` (
  `id_product_undercategories` int(11) NOT NULL,
  `name_product_undercategories` varchar(255) NOT NULL,
  `imglink` text NOT NULL,
  `id_product_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_undercategories`
--

INSERT INTO `product_undercategories` (`id_product_undercategories`, `name_product_undercategories`, `imglink`, `id_product_categories`) VALUES
(1, 'Алкоголь', 'uploads/1635609200_undercategory.png', 7),
(2, 'Горячее', 'uploads/1635609201_undercategory.png', 7),
(3, 'Холодное', 'uploads/1635609202_undercategory.png', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
  `id_stock` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imglink` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`id_stock`, `name`, `imglink`, `description`) VALUES
(1, 'НОВИНКИ ВЕСНЫ', 'uploads/1635609300_stocks.jpg', 'Новый сезон — новые блюда в меню!<br><br>\r\nНаши вкуснейшие новинки — отличная компания, чтобы встретить эту яркую весну!<br><br>\r\nПредлагаем вашему вниманию сезонные хиты:<br><br>\r\n1. Аппетитная пицца Пепперони с пикантной пепперони и смесью моцареллы и свежего базилика<br>\r\n2. Нежная пицца Маргарита с томатами, итальянскими травами и нашими фирменными соусами<br>\r\n3. Любимая Карбонара теперь и с ветчиной и маринованной морковью'),
(2, 'Дыхание весны', 'uploads/1635609302_stocks.png', 'Весна — это повод, чтобы встретить эту яркую пору освежающими и бодрящими напитками!<br><br>\r\nПредлагаем вашему вниманию сезонные хиты:<br><br>\r\n1. Всеми любимая Coca-cola настроит вас на достижение целей<br>\r\n2. Fanta с нотками апельсина сделает ваш день позитивным и насыщенным'),
(3, 'Горячее восстание!', 'uploads/1635609303_stocks.png', 'Ваш день не обходится без кусочка мяса?<br><br>\r\nТогда вы пришли по адресу! Ведь именно у нас вы найдете самое сочное и аппетитное горячее с мясом, которое не оставит вас равнодушным! <br><br>\r\nСделайте свой день мяснее!');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT 'Администратор - 1;\r\nПользователь - 2',
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role`, `auth_key`) VALUES
(1, 'admin', 'd2d6bc31f9420edba2219c61bc850140', 1, NULL),
(2, 'Ketdorf7', '641bc6f38098bb64654c94aef503b53a', 2, NULL),
(3, 'user', 'e46b68528982a4e71f26c3c82b7e7f8d', 2, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client_booking`
--
ALTER TABLE `client_booking`
  ADD PRIMARY KEY (`id_client_booking`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `client_order`
--
ALTER TABLE `client_order`
  ADD PRIMARY KEY (`id_client_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id_condition`);

--
-- Индексы таблицы `con_client_booking`
--
ALTER TABLE `con_client_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_client_booking` (`id_client_booking`),
  ADD KEY `id_condition` (`id_condition`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `con_client_order`
--
ALTER TABLE `con_client_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_client` (`id_client_order`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_condition` (`id_condition`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product_categories` (`id_product_categories`),
  ADD KEY `id_product_undercategories` (`id_product_undercategories`),
  ADD KEY `id_stock` (`id_stock`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id_product_categories`);

--
-- Индексы таблицы `product_undercategories`
--
ALTER TABLE `product_undercategories`
  ADD PRIMARY KEY (`id_product_undercategories`),
  ADD KEY `id_product_categories` (`id_product_categories`);

--
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id_stock`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client_booking`
--
ALTER TABLE `client_booking`
  MODIFY `id_client_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT для таблицы `client_order`
--
ALTER TABLE `client_order`
  MODIFY `id_client_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id_condition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `con_client_booking`
--
ALTER TABLE `con_client_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT для таблицы `con_client_order`
--
ALTER TABLE `con_client_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id_product_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product_undercategories`
--
ALTER TABLE `product_undercategories`
  MODIFY `id_product_undercategories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `client_booking`
--
ALTER TABLE `client_booking`
  ADD CONSTRAINT `client_booking_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `client_order`
--
ALTER TABLE `client_order`
  ADD CONSTRAINT `client_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `con_client_booking`
--
ALTER TABLE `con_client_booking`
  ADD CONSTRAINT `con_client_booking_ibfk_1` FOREIGN KEY (`id_client_booking`) REFERENCES `client_booking` (`id_client_booking`) ON DELETE CASCADE,
  ADD CONSTRAINT `con_client_booking_ibfk_2` FOREIGN KEY (`id_condition`) REFERENCES `conditions` (`id_condition`),
  ADD CONSTRAINT `con_client_booking_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `con_client_order`
--
ALTER TABLE `con_client_order`
  ADD CONSTRAINT `con_client_order_ibfk_1` FOREIGN KEY (`id_client_order`) REFERENCES `client_order` (`id_client_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `con_client_order_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `con_client_order_ibfk_3` FOREIGN KEY (`id_condition`) REFERENCES `conditions` (`id_condition`) ON DELETE CASCADE,
  ADD CONSTRAINT `con_client_order_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_product_categories`) REFERENCES `product_categories` (`id_product_categories`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_product_undercategories`) REFERENCES `product_undercategories` (`id_product_undercategories`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`id_stock`) REFERENCES `stocks` (`id_stock`);

--
-- Ограничения внешнего ключа таблицы `product_undercategories`
--
ALTER TABLE `product_undercategories`
  ADD CONSTRAINT `product_undercategories_ibfk_1` FOREIGN KEY (`id_product_categories`) REFERENCES `product_categories` (`id_product_categories`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
