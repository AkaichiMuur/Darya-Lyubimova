-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2020 г., 13:31
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `book_of_recipes`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cooking`
--

CREATE TABLE `cooking` (
  `id_cooking` int(11) NOT NULL,
  `id_dish` int(11) NOT NULL,
  `id_stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cooking`
--

INSERT INTO `cooking` (`id_cooking`, `id_dish`, `id_stage`) VALUES
(44, 3, 44),
(45, 3, 45),
(46, 3, 46),
(47, 3, 47),
(48, 3, 48),
(49, 3, 49),
(50, 3, 50),
(51, 3, 51),
(53, 18, 53),
(54, 18, 54);

-- --------------------------------------------------------

--
-- Структура таблицы `cooking_stages`
--

CREATE TABLE `cooking_stages` (
  `id_stage` int(11) NOT NULL,
  `img_cooking_stage` varchar(5000) NOT NULL,
  `description_stage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cooking_stages`
--

INSERT INTO `cooking_stages` (`id_stage`, `img_cooking_stage`, `description_stage`) VALUES
(44, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_0_min.jpg', 'Подготовьте ингредиенты.'),
(45, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_1_min.jpg', 'Приготовьте бисквит. Сперва очень аккуратно разделите яйца на белки и желтки. К яичным желткам добавьте 100 г сахара.'),
(46, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_2_min.jpg', 'И хорошо взбейте их миксером. Взбивайте желтки около 5-7 минут на максимальной скорости, они должны превратиться в пышную и густую массу.'),
(47, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_3_min.jpg', 'Венчики миксера тщательно вымойте и обсушите. Яичные белки взбейте самостоятельно до получения легкой пены.'),
(48, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_4_min.jpg', 'Понемногу подсыпая оставшиеся 50 г сахара, взбейте белки до твердых пиков.'),
(49, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_5_min.jpg', 'Муку соедините с какао-порошком и просейте вместе 2-3 раза. Если будете добавлять разрыхлитель, то его также добавьте и просейте вместе с мукой и какао. Кстати, лучше всего сухие ингредиенты подготовить в самом начале. Также растопите в микроволновке (на плите) сливочное масло, дайте ему немного остыть.'),
(50, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_6_min.jpg', 'Итак, во взбитые желтки с помощью ручного венчика или лопатки вмешайте белки. Делайте это аккуратно, чтобы белки максимально сохранили свой объем.'),
(51, 'https://static.1000.menu/img/content/15692/tort-praga_1459664391_fe_7_min.jpg', 'Вот такая легкая и пышная масса должна получиться.'),
(53, 'https://img1.russianfood.com/dycontent/images_upl/257/sm_256058.jpg', '\r\nВсе ингредиенты рассчитаны на 2 пиццы.\r\nТесто для пиццы приготовлено по рецепту Джейми Оливера (ссылка на рецепт - в списке продуктов).\r\nТоматный соус у меня домашний, со сладким перцем и чесноком.'),
(54, 'https://img1.russianfood.com/dycontent/images_upl/257/sm_256007.jpg', 'Одну часть теста помещаем на лист, покрытый пергаментной бумагой, слегка смазанной маслом, и руками распределяем тесто по кругу диаметром 30 см.');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id_dish` int(11) NOT NULL,
  `title_dish` varchar(100) NOT NULL,
  `description_dish` text,
  `img_dish` varchar(5000) NOT NULL,
  `cooking_time` varchar(30) NOT NULL,
  `training_level` varchar(30) NOT NULL,
  `cooking_difficulty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id_dish`, `title_dish`, `description_dish`, `img_dish`, `cooking_time`, `training_level`, `cooking_difficulty`) VALUES
(3, 'Торт Прага', 'Вкусный шоколадный торт для праздников и будней! Торт Прага - это классика советской кухни. Торт невероятно вкусный, ароматный, нежный и очень шоколадный. ', 'https://smachno.ua/wp-content/uploads/2017/10/05/Depositphotos_157436554_m-2015.jpg', '2 часа', 'начинающий', 'легкий'),
(4, 'Салат Оливье', 'Салат Оливье занимает первое место практически у каждой хозяйки на праздничном столе. Во-первых, рецепт салата Оливье очень прост, его не забудешь, во-вторых, готовится салат легко и просто. Лично у меня не обходится ни один праздник без этого блюда.', 'https://www.gastronom.ru/binfiles/images/20180119/b17ee29a.jpg', '1 час', 'начинающий', 'легкий'),
(5, 'Жаркое', 'Одним из самых популярных блюд на наших столах является жаркое по-домашнему из свинины с картошкой. Сказочно ароматное, вкусное, сытное, красивое жаркое готовить очень легко!', 'https://img-global.cpcdn.com/recipes/3974273eb640b3059bf31e9771ffe7f7353727e8ff8145fb4831c1730192b676/751x532cq70/zharkoie-po-domashniemu-iz-svininy-s-kartoshkoi-основное-фото-рецепта.jpg', '1,5 часа', 'начинающий', 'средний'),
(18, 'Пицца', 'Пицца из дрожжевого теста с копченой колбасой и сыром. Рецепт легкий, пицца получается превосходной. Начинки довольно много, за счет помидоров пицца сочная, тонкое тесто под начинкой хорошо пропекается и остается мягким. Очень хороший рецепт как для большого застолья, так и для посиделок с друзьями. Такую пиццу можно приготовить в дорогу, она вкусна даже остывшая – хорошая альтернатива бутербродам.', 'https://cdn22.img.ria.ru/images/98976/61/989766135_0:100:2000:1233_600x0_80_0_0_6d6bae20fceb464509076685137302b6.jpg', '1 час', 'Начинающий', 'Средний');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cooking`
--
ALTER TABLE `cooking`
  ADD PRIMARY KEY (`id_cooking`),
  ADD KEY `id_dish` (`id_dish`),
  ADD KEY `id_stage` (`id_stage`);

--
-- Индексы таблицы `cooking_stages`
--
ALTER TABLE `cooking_stages`
  ADD PRIMARY KEY (`id_stage`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id_dish`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cooking`
--
ALTER TABLE `cooking`
  MODIFY `id_cooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `cooking_stages`
--
ALTER TABLE `cooking_stages`
  MODIFY `id_stage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id_dish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cooking`
--
ALTER TABLE `cooking`
  ADD CONSTRAINT `cooking_ibfk_1` FOREIGN KEY (`id_dish`) REFERENCES `dishes` (`id_dish`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cooking_ibfk_2` FOREIGN KEY (`id_stage`) REFERENCES `cooking_stages` (`id_stage`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
