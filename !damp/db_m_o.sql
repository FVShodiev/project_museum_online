CREATE DATABASE IF NOT EXISTS `db_m_o`;
USE `db_m_o`;

CREATE TABLE `activ-event` (
  `event_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `activ-event` (`event_id`, `user_id`) VALUES
(6, 28),
(5, 28),
(5, 1),
(5, 30);

CREATE TABLE `eksponats` (
  `id_eksponat` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `edu_name` text NOT NULL,
  `interesting facts_1` text NOT NULL,
  `interesting facts_2` text NOT NULL,
  `interesting facts_3` text NOT NULL,
  `img` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `3d_model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `eksponats` (`id_eksponat`, `name`, `description`, `edu_name`, `interesting facts_1`, `interesting facts_2`, `interesting facts_3`, `img`, `3d_model`) VALUES
(1, 'Чаронт', '— это редкий минерал, который представляет собой соединение марганца и железа. Он характеризуется уникальной кристаллической структурой и может иметь различные оттенки, включая фиолетовый и красный.', 'Название \"чаронт\" происходит от греческого слова \"charon\", что означает \"темный\". Это название связано с темным цветом минерала и его редкостью.', '- Чаронт был открыт в 20 веке и с тех пор стал объектом интереса для минералогов и коллекционеров.', '- Он часто встречается в осадочных породах и может быть найден в некоторых частях мира, включая Россию и Южную Америку.', '- На срезе чаронта образуются уникальные рисунки, закрученные, полосатые и перистые узоры. Они образованы в результате сложных переплетений кристаллов.', '1.jpg', 'https://prod.spline.design/SA6CdvlILuD0cXDi/scene.splinecode'),
(2, 'Изумруд', '— это драгоценный камень, являющийся разновидностью минерала берилла. Он известен своим ярким зеленым цветом, который обусловлен присутствием хрома и ванадия.', 'Название \"изумруд\" происходит от латинского слова \"esmaralda\", которое, в свою очередь, произошло от греческого \"smaragdos\", означающего \"зеленый камень\". Это название отражает характерный зеленый цвет этого драгоценного камня.', '- Изумруд является одним из четырех основных драгоценных камней, наряду с алмазом, рубином и сапфиром.', '- Изумрудные шахты находятся в нескольких странах, включая Колумбию, Бразилию и Замбию.', '- Этот камень часто используется в ювелирных изделиях и считается символом любви и процветания.', '2.jpg', 'https://prod.spline.design/DbMqUvJoVm54JX0a/scene.splinecode'),
(4, 'Базальт', ' — это магматическая порода, образующаяся в результате быстрого охлаждения лавы на поверхности Земли. Он имеет темный цвет и состоит в основном из пироксенов, оливина и полевого шпата.', 'Название \"базальт\" происходит от латинского слова \"basaltus\", которое, в свою очередь, происходит от греческого \"basilus\", что означает \"королевский\". Это название, вероятно, связано с тем, что базальт часто использовался в строительстве и архитектуре.', '- Базальт является самой распространенной магматической породой на Земле и составляет большую часть океанического дна.', '- Он часто используется в строительстве, в том числе для создания дорожных покрытий и в качестве декоративного камня.', '- Базальтовые образования, такие как столбы Гекла в Исландии или базальтовые колонны в Северной Ирландии (Гигантская дорога), являются известными геологическими памятниками.', '3.jpg', 'https://prod.spline.design/l7hZYLkLEkRvYQJr/scene.splinecode'),
(5, 'Кварц', ' — это один из самых распространенных минералов на Земле, состоящий из кремния и кислорода (SiO2). Он имеет широкий спектр форм и цветов, включая прозрачный, белый, розовый, фиолетовый (аметист) и многие другие.', ' Название \"кварц\" происходит от немецкого слова \"Quarz\", происхождение которого не совсем ясно, но возможно связано с древнегерманским словом, означающим \"твердость\". ', '- Кварц встречается в различных формах, включая кристаллы, агрегаты и микроскопические частицы.', '- Он используется в ювелирных изделиях, а также в промышленности (например, в производстве стекла и электроники).', '- Кварц имеет пьезоэлектрические свойства, что делает его полезным в таких устройствах, как кварцевые часы.', '4.jpg', 'https://prod.spline.design/AyH1zN9gaOv2NIZ0/scene.splinecode'),
(6, 'Крокоит', ' — это минерал, который представляет собой красный свинцовый минерал, состоящий из свинца, кислорода и углерода. Он имеет характерный ярко-красный цвет и кристаллическую структуру.', ' Название \"крокоит\" происходит от греческого слова \"krokos\", что означает \"шафран\". Это связано с его ярким красным цветом, который напоминает цвет шафрана.', '- Крокоит был впервые описан в 1836 году в Австралии. ', ' - Этот минерал часто встречается в виде кристаллов и используется в ювелирных изделиях, хотя из-за своей хрупкости и редкости не так распространён.', '- Крокоит боится солнечного света и быстро теряет свой алмазный блеск. Сделанные из крокоита украшения нуждаются в щадящем режиме эксплуатации, да и хранить их необходимо в полной темноте.', '5.jpg', 'https://prod.spline.design/jZsgtCOcprZ7vWFJ/scene.splinecode');

CREATE TABLE `events` (
  `event_id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `events` (`event_id`, `name`, `date`, `description`, `status`, `img`) VALUES
(3, 'День открытых дверей', '2025-05-31', 'Бесплатный вход для всех посетителей.', 'Скоро', 'День открытых дверей.jpg'),
(4, 'Мастер-класс по живописи', '2025-05-10', 'Мастер-класс для всех желающих научиться рисовать.', 'Активен', 'Мастер-класс по живописи.jpg'),
(5, 'Изготовление моделей', '2025-04-30', 'Мастер - класс по созданию геологических структур или минералов из глины или других материалов.', 'Активен', 'изготовление моделей.jpg'),
(6, 'Идентификация минералов', '2025-04-06', 'Обучение посетителей методам идентификации минералов и горных пород.', 'Скоро', 'Идентификация минералов.jpg'),
(8, 'Выставка древних артефактов', '2025-05-30', 'Выставка артефактов из древних цивилизаций.', 'Активен', 'Выставка древних артефактов.jpg');

CREATE TABLE `help` (
  `help_id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `help` (`help_id`, `user_id`, `text`, `status`) VALUES
(21, 28, '3D модели еще не добавлены', 'Новое'),
(22, 30, '3D модели не качественные!', 'Новое'),
(25, 28, '3D модели экспонатов не грузятся!', 'Важно');

CREATE TABLE `rehelp` (
  `rehelp_id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `rehelp` (`rehelp_id`, `user_id`, `text`) VALUES
(4, 28, '3D модели скоро добавим'),
(6, 30, 'Ваша запись отменена по той причине что вы ввели не правильное время наш музей открыт с 11 до 18!'),
(8, 28, 'Проблемы с серверами, скоро исправим');

CREATE TABLE `reservation` (
  `reservation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `day` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `reservation` (`reservation_id`, `user_id`, `day`, `time`, `status`, `message`) VALUES
(21, 1, '2025-04-01', '15:11:00', 'Отменен', ''),
(22, 1, '2025-03-30', '11:09:00', 'Отменен', ''),
(23, 28, '2025-04-20', '11:00:00', 'Подтвержден', ''),
(30, 28, '2025-06-19', '15:00:00', 'Отменен', ''),
(31, 28, '2025-06-20', '16:30:00', 'На рассмотрении', ''),
(32, 28, '2025-07-01', '12:00:00', 'Подтвержден', '');

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` char(17) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`user_id`, `surname`, `name`, `patronymic`, `login`, `email`, `phone`, `password`, `role`) VALUES
(1, ' ', 'Администратор', ' ', 'admin', ' ', '', '$2y$10$VVgkGucVUkMeUKB.kjv84exg.Ho4m6YAh/xjZvaaR5ozfngEdtnA6', 'Администратор'),
(28, 'Шодиев', 'Фаррух', 'Раджович', 'log', 'farrukh.shodiev18@mail.ru', '+7(222)-222-22-22', '$2y$10$PpVFq.A69lxgvifbFDrqmuxIuvwYlBBlpK0evQcNN0/XkXEC/TUF.', 'Пользователь'),
(30, 'Иванов', 'Иван', 'Иванович', 'ggs', 'Ivanov12345@mail.ru', '+79220222222', '$2y$10$xhvpfAI.ToOBnMGyRSthsuth2KjledVTc59zZsH2uK10bqoxor7A.', 'Пользователь');

ALTER TABLE `activ-event`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

ALTER TABLE `eksponats`
  ADD PRIMARY KEY (`id_eksponat`);

ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

ALTER TABLE `help`
  ADD PRIMARY KEY (`help_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `rehelp`
  ADD PRIMARY KEY (`rehelp_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `eksponats`
  MODIFY `id_eksponat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `events`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `help`
  MODIFY `help_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `rehelp`
  MODIFY `rehelp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `reservation`
  MODIFY `reservation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `activ-event`
  ADD CONSTRAINT `activ-event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `activ-event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

ALTER TABLE `help`
  ADD CONSTRAINT `help_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `rehelp`
  ADD CONSTRAINT `rehelp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;