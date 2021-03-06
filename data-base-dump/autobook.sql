-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:5890
-- Время создания: Фев 10 2018 г., 19:41
-- Версия сервера: 5.5.58-log
-- Версия PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autobook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `publishing_house_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) COLLATE ucs2_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci COMMENT='Таблица книг';

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `publishing_house_id`, `year`, `image`) VALUES
(1, 'ACURA MDX инструкция по эксплуатации', 1, 2000, 'img/book_cover/acura_mdx.jpg'),
(2, 'Honda Integra / Acura RSX (2001-2007гг.) с двигателем k20a (2.0 л.). Устройство, техническое обслуживание и ремонт ', 1, 2002, 'img/book_cover/acura_rsx.jpg'),
(3, 'Audi a1/ a1 sportback. Руководство по эксплуатации, ремонту и техническому обслуживанию', 3, 2010, 'img/book_cover/audi_a1.jpg'),
(4, 'Mitsubishi L200/Pajero Sport (2006, 2008 гг). Турбодизели 2,5л TDI, 3,2л TD. Пошаговый ремонт в фотографиях', 5, 2008, 'img/book_cover/4ac574a75fda111e2a98f001e671528d0_11663fa7182111e680fc000c292ed3da.jpg'),
(16, 'Служебные машины. Раскрашиваем и читаем по слогам', 23, 2005, 'img/book_cover/16big.jpg'),
(17, 'Great Wall Safe (2002-2009гг.)  / Deer (2001-2008гг.) бензиновый двигатель 2.2л (105 л.с.) ', 5, 2003, 'img/book_cover/176865.jpg'),
(19, ' Daewoo Nexia N100 / Daewoo Nexia N150 (1995 - 2008гг.). Бензиновые двигатели. Пошаговый ремонт в фотографиях. ', 5, 2000, 'img/book_cover/194307.jpg'),
(20, 'Hyundai santa fe (2006 - 2010гг.) Бензиновые двигатели 2.4л, 2.7л, дизельный двигатель 2.2л. Ремонт без проблем', 5, 2008, 'img/book_cover/202391.jpg'),
(21, 'Hyundai Accent. Руководство по эксплуатации, техническому обслуживанию и ремонту', 5, 2010, 'img/book_cover/214569.jpg'),
(23, 'KIA RIO 3 с 2011 г.в. Ремонт, эксплуатация и техническое обслуживание в цветных фотографиях', 5, 2011, 'img/book_cover/ 23_2659.jpg'),
(28, 'В шестой раз редактирую', 26, 2003, NULL),
(29, 'CITROEN C4 (Ситроен С4) 2004-2010 бензин Книга по ремонту и эксплуатации в цветных фотографиях', 5, 2012, 'img/book_cover/29906.jpg'),
(30, 'CITROEN C3 PICASSO (Ситроен С3 Пикассо) Книга по ремонту и эксплуатации', 25, 2012, 'img/book_cover/306640.jpg'),
(31, 'CITROEN JUMPER / FIAT DUCATO / PEUGEOT BOXER с 2006 дизель Пособие по ремонту и эксплуатации', 26, 2010, 'img/book_cover/316149.jpg'),
(32, 'HYUNDAI CRETA (Хендай Грета) с 2016 бензин Цветное в фотографиях руководство по ремонту', 24, 2017, 'img/book_cover/7797.jpg'),
(33, 'FORD FOCUS 3 (Форд Фокус 3) с 2011 бензин Книга по ремонту и эксплуатации в цветных фотографиях', 5, 2013, 'img/book_cover/6642.jpg'),
(34, 'DODGE NITRO (Додж Нитро) с 2006 Руководство по эксплуатации и техобслуживанию', 25, 2007, 'img/book_cover/34_5333.jpg'),
(35, 'DODGE CARAVAN, CHRYSLER VOYAGER, TOWN / COUNTRY 2003-2006 бензин Пособие по ремонту и эксплуатации', 27, 2009, 'img/book_cover/35_2497.jpg'),
(36, 'DODGE CARAVAN, PLYMOUTH VOYAGER, CHRYSLER TOWN / COUNTRY 1996-2002 бензин Пособие по ремонту и эксплуатации', 27, 2008, 'img/book_cover/36_1248.jpg'),
(37, 'DODGE CARAVAN / GRAND CARAVAN с 2004 Руководство по эксплуатации и техническому обслуживанию', 25, 2007, 'img/book_cover/37_1247.jpg'),
(38, 'DODGE GRAND CARAVAN / CARAVAN CHRYSLER GRAND VOYAGER / VOYAGER / TOWN / COUNTRY с 2007 бензин / дизель Пособие по ремонту и эксплуатации', 29, 2011, 'img/book_cover/38_5887.jpg'),
(39, 'HYUNDAI SOLARIS (Хундай Солярис) с 2011 + с 2014 рестайлинг бензин Инструкция по ремонту и эксплуатации. Ремонт в фотографиях', 24, 2012, 'img/book_cover/39_7865.jpg'),
(41, 'Новая книга', 7, 2000, NULL),
(42, 'CADILLAC ESCALADE 2002-2006 и с 2006 бензин Инструкция по ремонту и эксплуатации', 1, 2004, 'img/book_cover/42_6370.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `book_description`
--

CREATE TABLE `book_description` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `book_description`
--

INSERT INTO `book_description` (`id`, `book_id`, `description`) VALUES
(1, 17, 'Эта книга призвана помочь всем владельцам автомобилей Грейт Вол Сейф, Грейт Вол Дир экономить на ремонтных процедурах время и финансы, а работникам станций техобслуживания и сотрудникам из автосервисов пособие поможет поддерживать автомобиль в надлежащем рабочем состоянии, то есть оно окажется весьма кстати в повседневной работе.'),
(2, 19, 'Цветное справочно-информационное издание руководство по ремонту Daewoo Nexia N150 / Daewoo Nexia N100, руководство по эксплуатации и техническому обслуживанию автомобилей Daewoo Nexia N100 / Daewoo Nexia N150 с 2008 г. выпуска, оборудованных бензиновыми двигателями G15MF (1,5 л SOHC), A15SMS (1,5 л SOHC), A15MF (1,5 л DOHC) и F16MF (1,6 л DOHC).\r\nПособие поможет всем владельцам автомобилей Деу Нексия с кузовом седан, работникам СТО и автосервисов поддерживать автомобиль в надлежащем рабочем состоянии, экономить время и деньги.'),
(4, 2, 'В руководстве дается пошаговое описание процедур по эксплуатации, ремонту и техническому обслуживанию автомобилей Honda Integra и Acura RSX 2001-2007 гг. выпуска, оборудованных бензиновым двигателем K20A (2,0 л).\r\nИздание содержит руководство по эксплуатации, подробные сведения по техническому обслуживанию автомобиля, ремонту и регулировке элементов системы управления двигателем, в т. ч. системы (VTEC), автоматических коробок передач (АКПП), инструкции по использованию самодиагностики системы управления двигателем, АКПП и ABS, рекомендации по регулировке и ремонту АКПП, элементов тормозной системы (включая ABS), рулевого управления, подвески.\r\nПриведены процедуры проверки параметров в разъемах электронных блоков управления систем управления двигателем, АКПП и ABS.'),
(5, 2, 'В руководстве дается пошаговое описание процедур по эксплуатации, ремонту и техническому обслуживанию автомобилей Honda Integra и Acura RSX 2001-2007 гг. выпуска, оборудованных бензиновым двигателем K20A (2,0 л).\r\nИздание содержит руководство по эксплуатации, подробные сведения по техническому обслуживанию автомобиля, ремонту и регулировке элементов системы управления двигателем, в т. ч. системы (VTEC), автоматических коробок передач (АКПП), инструкции по использованию самодиагностики системы управления двигателем, АКПП и ABS, рекомендации по регулировке и ремонту АКПП, элементов тормозной системы (включая ABS), рулевого управления, подвески.\r\nПриведены процедуры проверки параметров в разъемах электронных блоков управления систем управления двигателем, АКПП и ABS.'),
(6, 20, 'Представленный автомануал включил в себя более 3-х тысяч оригинальных и великолепно отработанных цветных фото с ясными комментариями к каждой. Эти иллюстрации подробно отображают весь процесс пошагового ремонта Хенде Санта Фе. Рассмотрены в книге ремонтные операции от силового агрегата и его деталей до правки кузова кроссовера, представлены полные технические характеристики Хюндай Санта Фе, его конструктивные особенности, а также перечни возможных неполадок в различных системах этой модели и рекомендации от опытных механиков по их устранению.'),
(7, 21, 'Цветное в фотографиях руководство по ремонту Hyundai Accent, а также руководство по техническому обслуживанию и эксплуатации, устройство автомобилей Hyundai Accent с 2002 г. выпуска, оборудованных бензиновыми двигателями G4EB (1,5 л, SOHC), G4EC (1,5 л, DOHC). Мануал содержит более 2000 цветных фотографий, подробно отображающих весь процесс пошагового ремонта автомобиля.\r\n'),
(8, 16, 'Книга для юных автомехаников, которые только осваивают автомобили. Пусть пока по раскрашивают их, может потом станут автомалярами'),
(9, 23, 'Новое руководство по ремонту KIA RIO предоставляет исчерпывающие сведения о последнем поколении автомобилей данной марки, запущенном в 2017 году. Эти модели комплектуются бензиновыми силовыми агрегатами рабочим объемом 1.4 и 1.6 литра. Подробными сведениями по ремонту машины книга не ограничивается, пользователь найдет в ней и другую важную информацию, например, правила использования и технического обслуживания техники.\r\n'),
(10, 24, 'Эту книгу нужно удалить'),
(11, 3, 'Новинка от компании АРГО-АВТО (Атласы автомобилей) — руководство по ремонту и техническому обслуживанию автомобилей Audi A1/A1 Sportback с 2010 года выпуска с бензиновыми и дизельными моторами: 1.2, 1.4, 2.0, 1.6D, 2.0D. Подробное описание ремонтных операций и цветные схемы электрооборудования данных автомобилей найдет владелец в этом издании.'),
(14, 27, 'Изменить'),
(15, 28, 'Абсолютно новое описание \r\nДаже в две \r\nА нет в три строки\r\nВ третий раз редактирую\r\nВ пятый раз'),
(16, 28, 'Абсолютно новое описание \r\nДаже в две \r\nА нет в три строки\r\nВ третий раз редактирую\r\nВ пятый раз'),
(17, 29, 'Цветное иллюстрированное справочное пособие по ремонту Citroen C4, а также руководство по эксплуатации и техническому обслуживанию Citroen C4, устройство автомобилей Citroen C4 2004-2010 гг. выпуска (включая рестайлинг 2008). Ситроен С4 оснащались бензиновыми моторами рабочим объемом 1,6 л. (110 л.с., 120 л.с., 140 л.с., 150 л.с. turbo).\r\nПособие поможет владельцам автомобилей Ситроен Ц4 экономить на обслуживании машины время и деньги, а работникам СТО и сотрудникам придорожных автосервисов поддерживать транспорт в надлежащем рабочем состоянии.\r\nЭтот мануал содержит более 3000 цветных фотографий уникального исполнения, подробно отображающих весь пошаговый ремонт Ситроен С4, в том числе изучен ремонт двигателя этой модели, представлены полные технические характеристики и рассмотрены конструктивные детали и особенности автомобиля, приведен перечень возможных неисправностей и даны советы по их устранению.'),
(18, 29, 'Цветное иллюстрированное справочное пособие по ремонту Citroen C4, а также руководство по эксплуатации и техническому обслуживанию Citroen C4, устройство автомобилей Citroen C4 2004-2010 гг. выпуска (включая рестайлинг 2008). Ситроен С4 оснащались бензиновыми моторами рабочим объемом 1,6 л. (110 л.с., 120 л.с., 140 л.с., 150 л.с. turbo).\r\nПособие поможет владельцам автомобилей Ситроен Ц4 экономить на обслуживании машины время и деньги, а работникам СТО и сотрудникам придорожных автосервисов поддерживать транспорт в надлежащем рабочем состоянии.\r\nЭтот мануал содержит более 3000 цветных фотографий уникального исполнения, подробно отображающих весь пошаговый ремонт Ситроен С4, в том числе изучен ремонт двигателя этой модели, представлены полные технические характеристики и рассмотрены конструктивные детали и особенности автомобиля, приведен перечень возможных неисправностей и даны советы по их устранению.'),
(19, 29, 'Цветное иллюстрированное справочное пособие по ремонту Citroen C4, а также руководство по эксплуатации и техническому обслуживанию Citroen C4, устройство автомобилей Citroen C4 2004-2010 гг. выпуска (включая рестайлинг 2008). Ситроен С4 оснащались бензиновыми моторами рабочим объемом 1,6 л. (110 л.с., 120 л.с., 140 л.с., 150 л.с. turbo).\r\nПособие поможет владельцам автомобилей Ситроен Ц4 экономить на обслуживании машины время и деньги, а работникам СТО и сотрудникам придорожных автосервисов поддерживать транспорт в надлежащем рабочем состоянии.\r\nЭтот мануал содержит более 3000 цветных фотографий уникального исполнения, подробно отображающих весь пошаговый ремонт Ситроен С4, в том числе изучен ремонт двигателя этой модели, представлены полные технические характеристики и рассмотрены конструктивные детали и особенности автомобиля, приведен перечень возможных неисправностей и даны советы по их устранению.'),
(20, 30, 'Подробное, с большим количеством качественных иллюстраций руководство по ремонту Citroen C3 Picasso. Эта машина была представлена в 2009 году. В издание вошло также подробное руководство по обслуживанию Citroen C3 Picasso и пособие по эксплуатации Citroen C3 Picasso, изложено устройство Citroen C3 Picasso. На автомобили устанавливаются бензиновые моторы рабочим объемом 1,4 и 1,6 л. и дизели литражом 1,6. Тип силовых агрегатов EP3 / EP6 / DV6ATED4 / DV6TED4, их мощность составляет 90 / 95 / 112 и 120 л.с.'),
(21, 31, 'Иллюстрированное подробное справочно-информационное издание Инструкция по ремонту Citroen Jumper / Fiat Ducato / Peugeot Boxer, а также руководство по эксплуатации и техническому обслуживанию, устройство Citroen Jumper / Fiat Ducato / Peugeot Boxer. Эти модели выпускаются с 2006 года. Рассмотрены все модели, оборудованные дизельными двигателями рабочим объемом 2,2 и 3,0 л. Машины оснащаются 5-ти или 6-ти ступенчатой РКПП.\r\nВ представленное руководство, выпущенное известным питерским издательством автолитературы Арус, включена подробная информация и полезные данные, необходимые при обслуживании или ремонте агрегатов, узлов, механизмов и деталей микроавтобуса Ситроен Джампер, Фиат Дукато или Пежо Боксер.'),
(22, 1, 'Руководство на русском языке по ремонту и техническому обслуживанию Acura MDX 2001-2006, Honda Pilot 2003-2008, Honda Ridgeline с 2006 года выпуска. Модели с бензиновым двигателем J35 (3,5 л). Также в  руководство входят инструкция по эксплуатации и электросхемы.'),
(23, 4, 'Все подразделы, в которых описаны обслуживание и ремонт агрегатов и систем, содержат перечни возможных неисправностей и рекомендации по их устранению, а также указания по разборке, сборке, регулировке и ремонту узлов и систем автомобиля с использованием стандартного набора инструментов в условиях гаража.	\r\nОперации по регулировке, разборке, сборке и ремонту автомобиля снабжены пиктограммами, характеризующими сложность работы, число исполнителей, место проведения работы и время, необходимое для ее выполнения.	\r\nУказания по разборке, сборке, регулировке и ремонту узлов и систем автомобиля с использованием готовых запасных частей и агрегатов приведены пооперационно и подробно иллюстрированы цветными фотографиями и рисунками, благодаря которым даже начинающий автолюбитель легко разберется в ремонтных операциях.	\r\nСтруктурно все ремонтные работы разделены по системам и агрегат на которых они проводятся начиная с двигателя и заканчивая кузовом).	'),
(24, 32, 'Цветное в фотографиях руководство по ремонту Hyundai Creta, инструкция по эксплуатации Хендай Крета, книга по обслуживанию Хендай Грета с 2016 г. выпуска, оборудованных бензиновыми двигателями рабочим объемом 1,6 и 2,0 литра, и как автоматической, так и механической коробкой передач.\r\nПредлагаемое пособие описывает все основные аспекты по обслуживанию, техническому ремонту и правильной, безопасной эксплуатации автомобиля Hyundai Creta 2016 года выпуска. \r\nКроссовер на российском рынке представлен с возможностью оснащения двумя бензиновыми двигателями (Gamma G4FG и Nu G4NA на 123 и 149.6 лошадиных сил соответственно). \r\nМануал предлагает варианты обслуживания и пошаговые инструкции по ремонту для всех комплектаций модели с любыми силовыми агрегатами.'),
(25, 33, 'Справочное, со множеством цветных иллюстраций пособие руководство по ремонту Ford Focus 3, а также руководство по эксплуатации и техническому обслуживанию Ford Focus 3, устройство Ford Focus 3 с 2011 г. выпуска, оборудованных бензиновыми двигателями рабочим объемом 1,6 (105 и 125 л.с.) и 2,0 л. (150 л.с.). Рассмотрены все варианты кузова.\r\nДанное ремонтное издание призвано оказать в момент необходимости любую техническую поддержку каждому из владельцев легкового автомобиля Форд Фокус 3, а также поможет им поддерживать состояние своего автомобиля в надлежащем рабочем виде, значительно экономя при этом время, деньги и прочие ресурсы.\r\nВ мануале находится более трех тысяч оригинальных цветных фотографий великолепного качества, в подробностях отображающих весь процесс осуществления пошагового ремонта Форд Фокус III, в том числе диагностики неисправностей и последующего ремонта двигателя машины, исчерпывающие технические характеристики Ford Focus III, перечни возможных неполадок Ford Focus 3, советы и рекомендации по их ликвидации.\r\nТехнология работ в пособии выбрана авторами применительно к стандартным условиям гаражной мастерской с использованием при процедурах набора универсальных подручных приспособлений. Только в самых исключительных моментах приведены указания по применению какого-то особенного, но также имеющегося в свободной продаже ремонтного инструмента.\r\nОперации ремонта всех механизмов, систем, агрегатов и узлов в каждом параграфе книги распределены по принципу ведения работ от простейших процедур к постепенному усложнению задач: от зачастую элементарных операций по обслуживанию, регулировкам узлов и механизмов техники, замене деталей, наиболее часто выходящих из строя, до трудоемкого ремонта целых агрегатов. Практика показала, что подход подобного рода чрезвычайно удобен как для начинающих, так и для обладающих большим опытом автомобилистов. Также материалы руководства помогут водителям подбирать все необходимые запчасти Форд Фокус 3.'),
(26, 34, 'Инструкция по эксплуатации Dodge Nitro, а также руководство по техническому обслуживанию автомобилей Dodge Nitro выпуск которых начат в 2006 году. Автомобили комплектуются двигателями рабочим объемом 3,7 и 4,0 л.\r\nПредставленное пособие предназначено для оказания помощи пользователю в изучении устройства и функционирования различных систем автомобиля Додж Нитро, также брошюра является носителем необходимых сведений по техническому обслуживанию машины. Грамотная эксплуатация, в соответствии с рекомендациями завода-изготовителя, обеспечит технике долгосрочную службу и позволит Вам получать истинное удовольствие за рулем своего Dodge Nitro на протяжении всего срока эксплуатации.'),
(27, 35, 'Руководство по ремонту, эксплуатации  и техническому обслуживанию автомобилей Dodge Caravan, Chrysler Voyager, Town & Country с 2003 по 2006 гг. выпуска, оборудованных бензиновыми двигателями.\r\nПособие состоит из следующих разделов:\r\nТекущее обслуживание, регулировки, ремонт двигателя, охлаждение и обогрев, кондиционирование воздуха, топливная и выхлопная системы, управление выхлопом, зажигание, тормозная система, подвеска и рулевое управление, электрооборудование, электрические системы, схемы электрооборудования, руководство по эксплуатации.\r\nКнига содержит рекомендации опытных механиков по разборке и ремонту автомобилей Dodge Caravan, Chrysler Voyager, Town & Country, с использованием обычных инструментов.'),
(28, 36, 'Руководство по ремонту, техническому обслуживанию и эксплуатации автомобилей Dodge Caravan, Plymouth Voyager, Chrysler Town / Country. Мини-вэны моделей 1996-2002 годов выпуска, с бензиновыми двигателями рабочим объемом 2,4, 3,0, 3,3 и 3,8 л.\r\nИнформация о полноприводных моделях и моделях, использующих альтернативные виды топлива, не представлена.\r\nПособие состоит из следующих разделов - текущее обслуживание, процедуры регулировок, ремонт двигателя, охлаждение и отопление, кондиционер, топливная и выпускная системы, система контроля над вредными выбросами, зажигание, тормоза, подвеска и рулевое управление, электрооборудование.'),
(29, 37, 'Руководство по эксплуатации и техническому обслуживанию автомобилей Dodge Caravan / Dodge Grand Caravan с 2004 г. выпуска.\r\nИнструкция по эксплуатации и техническому обслуживанию автомобилей Dodge Caravan / Dodge Grand Caravan с 2004 г. выпуска.\r\nВ настоящем пособии Вы сможете найти описание всех основных и второстепенных технических характеристик автомобиля Додж Караван, Додж Гранд Караван, необходимые замечания и важную информацию касающиеся техники безопасности.'),
(30, 38, 'Справочное иллюстрированное издание руководство по ремонту Dodge Grand Caravan / Dodge Caravan, Chrysler Grand Voyager / Chrysler Voyager / Chrysler Town & Country, устройство Dodge Caravan / Dodge Grand Caravan, Chrysler Grand Voyager / Chrysler Voyager / Chrysler Town & Country, руководство по техническому обслуживанию и эксплуатации Dodge Caravan / Dodge Grand Caravan, Chrysler Grand Voyager / Chrysler Voyager / Chrysler Town & Country, которые выпускаются с 2007 года и оборудуются бензиновыми агрегатами рабочим объемом 3,3 (173 л.с.), 3,8 л. (201 л.с.), 4,0 л. (243 л.с.), а также дизелями рабочим объемом 2,8 л. (177 л.с.).'),
(31, 39, 'Инструкция по ремонту Hyundai Solaris, руководство по обслуживанию и эксплуатации Хендай Солярис, оборудованных бензиновыми двигателями рабочим объемом 1,4 и 1,6 литра.\r\nИллюстрированный мануал содержит детальную информацию по всем вопросам эксплуатации, сервисного обслуживания и ремонту автомобилей Хюндай Соларис выпуска с 2011 года, в том числе и рестайлинговых моделей с 2014 года.\r\nРемонт узлов и агрегатов. Рекомендации по эксплуатации. Цветные электросхемы.\r\nКнига содержит пошаговые детальные инструкции по диагностике и ремонту силового агрегата, механической и автоматической коробки передач, подвески, тормозной системы и других узлов и систем автомобиля. '),
(32, 40, '2007\r\nРено дастрер'),
(33, 41, 'Описание\r\nОписание\r\nОписание\r\nОписание\r\nОписание'),
(34, 42, 'Иллюстрированное подробнейшее информационно-справочное издание Руководство по ремонту Cadillac Escalade, устройство Кадиллак Эскалейд, пошаговое руководство по эксплуатации и процедурам относящимся к техническому обслуживанию Кадиллак Эскалейд платформы GMT800 и GMT900. Выпуск модели платформы GMT800 осуществлялся с 2002 по 2006 год и оборудовалась машина бензиновыми двигателями рабочим объемом 5,3 и 6,0 л. Выпуск модели платформы GMT900 производится с 2006 года, оборудуется автомобиль бензиновым двигателем литражом 6,2 л.\r\nВ наполненное по максимуму полезной технической информацией по Cadillac Escalade издание включены подробнейшие данные по ремонту, диагностике и регулировке элементов систем двигателя (запуска и зарядки, смазки, охлаждения, системы впрыска топлива, системы отключения цилиндров, изменения фаз газораспределения), рекомендации и советы по регулировке и ремонту АКПП, системы полного привода (Part Time, Full Time), элементов тормозной системы, включая антиблокировочную систему тормозов (ABS), систему электронного перераспределения тормозных усилий (EBD), противобуксовочную систему Кадиллак Ескалейд (TCS), систему курсовой устойчивости автомобиля (VSES), подвески (включая систему изменения жесткости амортизаторов (ESC), автоматическую систему выравнивания кузова (ALC)), рулевого управления. Также книга поспособствует грамотно подобрать запчасти Cadillac Escalade.');

-- --------------------------------------------------------

--
-- Структура таблицы `book_links`
--

CREATE TABLE `book_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `link` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `book_links`
--

INSERT INTO `book_links` (`id`, `book_id`, `link`) VALUES
(1, 3, 'http://autoinfo24.ru/rukovodstva-po-remontu/inomarki/audi/a1'),
(4, 28, 'http://www.google.com'),
(8, 29, 'http://avtoliteratura.ru/catalog/citroen/citroen-c4/citroen-c4-2004-2010-rukovodstvo-po-remontu.html'),
(9, 30, 'http://avtoliteratura.ru/catalog/citroen/citroen-c3-picasso/citroen-c3-picasso-remont.html'),
(10, 31, 'http://avtoliteratura.ru/catalog/citroen/citroen-jumper/citroen-jumper-06-arus.html'),
(11, 1, 'http://autoinfo24.ru/rukovodstva-po-remontu/inomarki/acura/mdx'),
(12, 2, 'http://ru.calameo.com/books/004324756f1d22df50bef'),
(13, 4, 'https://autodata.ru/catalog/mitsubishi_l200/kniga_mitsubishi_pajero_sport_s_2008_l_200_s_2006_remont_bez_problem_tsv_foto_/?shopid=mmc_manuals'),
(14, 17, 'https://www.bookvoed.ru/book?id=2573504#show_delivery'),
(15, 19, 'http://box-m.org/automoto/daewoo_nexia/9739-daewoo-nexia-rukovodstvo-po-yekspluatacii-texnicheskomu-obsluzhivaniyu-i-remontu-2009g.html'),
(16, 20, 'http://forum.santafe-autoclub.ru/index.php?showtopic=15017'),
(17, 21, 'https://www.ozon.ru/context/detail/id/4983048/'),
(18, 23, 'https://www.labirint.ru/books/332084/'),
(19, 32, 'http://avtoliteratura.ru/catalog/hyundai/hyundai-creta/hyundai-creta-rukovodstvo-po-remontu.html'),
(20, 33, 'http://avtoliteratura.ru/catalog/ford/ford-focus/ford-focus-iii-2011-posobie-po-remontu.html'),
(21, 34, 'http://avtoliteratura.ru/catalog/dodge/dodge-nitro/dodge-nitro-s-2006-rukovodstvo-po-ekspluatatsii-i-tehobsluzhivaniyu.html'),
(22, 35, 'http://avtoliteratura.ru/catalog/dodge/dodge-caravan/dodge-caravan-chrysler-voyager-town--country-2003-2006-benzin.html'),
(23, 36, 'http://avtoliteratura.ru/catalog/dodge/dodge-caravan/dodge-caravan-plymouth-voyager-chrysler-town--country-1996-2002-benzin.html'),
(24, 37, 'http://avtoliteratura.ru/catalog/dodge/dodge-caravan/dodge-caravan--grand-caravan-s-2004-rukovodstvo-po-ekspluatatsii-i-tehnicheskomu-obsluzhivaniyu.html'),
(25, 38, 'http://avtoliteratura.ru/catalog/dodge/dodge-caravan/dodge-grand-caravan-2007-posobie-po-remontu.html'),
(26, 39, 'http://avtoliteratura.ru/catalog/hyundai/hyundai-solaris/hyumsai-solaris-2011-2014-instrukcia-po-remontu.html'),
(27, 40, 'http://www.drive2.ru/'),
(28, 41, 'https://www.google.ru/?gfe_rd=cr&dcr=0&ei=u6xwWqy7N6uxX-i0gYgK'),
(29, 42, 'http://avtoliteratura.ru/catalog/cadillac/cadillac-escalade/cadillac-escalade-2002-2006-i-2006-kniga-po-remontu.html');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `book_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `actual` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `date`, `book_id`, `comment`, `actual`) VALUES
(3, 6, '2017-12-13 18:19:26', 1, 'Ну как то так средне', 1),
(4, 5, '2017-12-13 18:19:26', 2, 'Все расписано подробно и вообще как говорится Lorem Ipsum', 1),
(5, 7, '2017-12-13 18:19:26', 2, 'Без комментариев', 1),
(6, 5, '2018-01-23 17:58:41', 38, 'Привет\r\nМир\r\n123', 1),
(7, 7, '2018-01-28 16:02:01', 16, 'Скачаю позже, когда будет ссылка ', 1),
(11, 5, '2018-01-30 19:49:17', 40, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 1),
(12, 5, '2018-01-30 19:49:27', 40, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 1),
(13, 8, '2018-02-06 19:10:13', 39, 'Хорошая книга, все описано подробно\r\nКак владелец этой машины могу сказать, что она необходима всем владельцам солярисов ', 1),
(14, 5, '2018-02-10 13:21:51', 42, 'В мануале рассмотрены самые разные возможные неисправности Cadillac Escalade, изучены методы их устранения, представлены сопрягаемые размеры основных деталей и пределы их допустимого износа. Также здесь представлена важная информация по рекомендуемым смазочным материалам и рабочим жидкостям и каталожные номера, необходимые пользователю для техобслуживания Cadillac Escalade.\r\nУ всех технико-ремонтных руководств предназначение весьма определенное. Авторы популярнейшего издательства Легион Автодата выпустили книгу, в которую они собрали максимум сведений по ремонту Cadilac Escalade, и которая призвана на весь срок эксплуатации оставаться в бардачке Вашего Эскалейд и стать полезным и своевременным советчиком, постоянным попутчиком и верным помощником для каждого владельца этого роскошного внедорожника, в необходимом объеме в нужный момент указать своему хозяину на неисправность, подсказать самое быстрое и грамотное решение проблемы, а иногда и предотвратить на первый взгляд неизбежный дорогостоящий ремонт.\r\n', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `header_links`
--

CREATE TABLE `header_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `header_links`
--

INSERT INTO `header_links` (`id`, `name`, `url`) VALUES
(1, 'Главная страница', 'index.php'),
(2, 'Личный кабинет', 'area.php'),
(3, 'Лучшие 50 книг', 'top50.php'),
(4, 'Выход', 'exit.php');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_id` int(11) DEFAULT NULL,
  `actual` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `date`, `book_id`, `actual`) VALUES
(1, 1, '2018-01-04 10:31:05', 3, 1),
(2, 4, '2017-12-13 16:24:40', 3, 1),
(3, 2, '2017-12-13 18:06:44', 3, 0),
(4, 4, '2017-12-13 16:24:40', 2, 1),
(5, 5, '2017-12-13 16:24:40', 2, 1),
(7, 5, '2018-01-09 16:17:15', 23, 1),
(8, 3, '2018-01-09 15:49:53', 20, 1),
(9, 5, '2018-01-09 17:30:27', 20, 1),
(10, 5, '2018-01-10 17:08:17', 4, 1),
(11, 5, '2018-01-28 09:54:30', 28, 1),
(12, 5, '2018-01-16 16:18:05', 30, 1),
(13, 5, '2018-01-16 16:29:28', 29, 1),
(14, 5, '2018-01-19 20:01:14', 35, 1),
(15, 5, '2018-01-19 20:06:01', 33, 1),
(16, 5, '2018-01-23 17:42:12', 32, 1),
(17, 5, '2018-01-23 17:52:58', 38, 1),
(18, 5, '2018-01-27 18:25:50', 37, 0),
(19, 7, '2018-01-28 16:01:45', 16, 1),
(20, 5, '2018-01-30 16:10:02', 40, 1),
(21, 8, '2018-02-06 19:09:11', 39, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `publishing_houses`
--

CREATE TABLE `publishing_houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `house_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица издательств';

--
-- Дамп данных таблицы `publishing_houses`
--

INSERT INTO `publishing_houses` (`id`, `house_name`) VALUES
(1, 'Легион-автодата'),
(3, 'Арго-авто'),
(4, 'За рулем'),
(5, 'Третий Рим'),
(6, 'Мнемозина'),
(7, 'Автоэксперт'),
(12, 'Инпро'),
(13, 'Русский двор'),
(17, 'Издательство автомобильной литературы'),
(18, 'ИноКнига'),
(19, 'Книжный двор'),
(23, 'Литур'),
(24, 'Мир Автокниг'),
(25, 'Монолит'),
(26, 'Арус'),
(27, 'Алфамер Паблишинг'),
(29, 'Чижовка'),
(30, 'Книжное издательство Казани');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passHash` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Subname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rights` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `ban` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `passHash`, `Name`, `Subname`, `img`, `rights`, `ban`) VALUES
(3, 'someUser@yandex.ru', '5f4dcc3b5aa765d61d8327deb882cf99', 'Иван', 'Иванов', 'img/avatar/3_the-son-of-man-profile.jpg', 'admin', 1),
(5, 'Admin@admin.ru', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Артем', 'Ангаев', 'img/avatar/5_muki_tvorchestva.jpg', 'admin', 0),
(6, 'ban@ban.ru', '5f4dcc3b5aa765d61d8327deb882cf99', 'Забанненый', 'Пользователь', NULL, 'user', 1),
(7, 'try@try.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Петр', 'Петров', 'img/avatar/7_41182691_vud.jpg', 'user', 0),
(8, 'new@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Новый', 'Пользователь', NULL, 'user', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `book_description`
--
ALTER TABLE `book_description`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `book_links`
--
ALTER TABLE `book_links`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `header_links`
--
ALTER TABLE `header_links`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `publishing_houses`
--
ALTER TABLE `publishing_houses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `book_description`
--
ALTER TABLE `book_description`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `book_links`
--
ALTER TABLE `book_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `header_links`
--
ALTER TABLE `header_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `publishing_houses`
--
ALTER TABLE `publishing_houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
