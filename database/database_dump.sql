-- MariaDB dump 10.19  Distrib 10.8.4-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: practika
-- ------------------------------------------------------
-- Server version	10.8.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctor_visits`
--

DROP TABLE IF EXISTS `doctor_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor_visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `doctor_id` (`doctor_id`),
  CONSTRAINT `doctor_visits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `doctor_visits_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor_visits`
--

LOCK TABLES `doctor_visits` WRITE;
/*!40000 ALTER TABLE `doctor_visits` DISABLE KEYS */;
INSERT INTO `doctor_visits` VALUES
(1,7,3,'2024-01-05','Плановый осмотр кардиолога','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(2,12,8,'2024-01-10','Консультация дерматолога','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(3,3,5,'2024-01-15','Головные боли, назначено МРТ','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(4,9,12,'2024-01-20','Профилактический осмотр','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(5,5,7,'2024-01-25','Лечение кариеса','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(6,14,4,'2024-02-01','Прививка ребенку','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(7,2,9,'2024-02-05','Проблемы с ухом','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(8,11,1,'2024-02-10','Боли в сердце','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(9,8,14,'2024-02-15','Гинекологический осмотр','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(10,1,6,'2024-02-20','Проверка зрения','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(11,13,11,'2024-02-25','Проверка уровня сахара','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(12,4,2,'2024-03-01','ОРВИ, назначено лечение','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(13,10,13,'2024-03-05','Урологические проблемы','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(14,6,10,'2024-03-10','Боли в суставах','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(15,15,15,'2024-03-15','Аллергическая реакция','2025-06-24 05:45:01','2025-06-24 05:45:01'),
(16,7,3,'2024-01-05','Плановый осмотр кардиолога','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(17,12,8,'2024-01-10','Консультация дерматолога','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(18,3,5,'2024-01-15','Головные боли, назначено МРТ','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(19,9,12,'2024-01-20','Профилактический осмотр','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(20,5,7,'2024-01-25','Лечение кариеса','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(21,14,4,'2024-02-01','Прививка ребенку','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(22,2,9,'2024-02-05','Проблемы с ухом','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(23,11,1,'2024-02-10','Боли в сердце','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(24,8,14,'2024-02-15','Гинекологический осмотр','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(25,1,6,'2024-02-20','Проверка зрения','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(26,13,11,'2024-02-25','Проверка уровня сахара','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(27,4,2,'2024-03-01','ОРВИ, назначено лечение','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(28,10,13,'2024-03-05','Урологические проблемы','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(29,6,10,'2024-03-10','Боли в суставах','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(30,15,15,'2024-03-15','Аллергическая реакция','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(31,7,3,'2024-01-05','Плановый осмотр кардиолога','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(32,12,8,'2024-01-10','Консультация дерматолога','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(33,3,5,'2024-01-15','Головные боли, назначено МРТ','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(34,9,12,'2024-01-20','Профилактический осмотр','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(35,5,7,'2024-01-25','Лечение кариеса','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(36,14,4,'2024-02-01','Прививка ребенку','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(37,2,9,'2024-02-05','Проблемы с ухом','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(38,11,1,'2024-02-10','Боли в сердце','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(39,8,14,'2024-02-15','Гинекологический осмотр','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(40,1,6,'2024-02-20','Проверка зрения','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(41,13,11,'2024-02-25','Проверка уровня сахара','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(42,4,2,'2024-03-01','ОРВИ, назначено лечение','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(43,10,13,'2024-03-05','Урологические проблемы','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(44,6,10,'2024-03-10','Боли в суставах','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(45,15,15,'2024-03-15','Аллергическая реакция','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(46,7,5,'2025-06-29','Лечение зуба','2025-06-24 06:30:47','2025-06-24 06:30:47');
/*!40000 ALTER TABLE `doctor_visits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES
(1,'Иван','Петров','Кардиолог','89001234567','petrov@example.com','Москва, ул. Ленина, д.1','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(2,'Мария','Иванова','Терапевт','89101112233','ivanova@example.com','СПб, Невский пр., 10','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(3,'Алексей','Сидоров','Хирург','89223334455','sidorov@example.com','Казань, ул. Баумана, 5','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(4,'Ольга','Смирнова','Педиатр','89334445566','smirnova@example.com','Уфа, ул. Октября, 12','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(5,'Дмитрий','Кузнецов','Невролог','89445556677','kuznecov@example.com','Тула, пр-т Ленина, 3','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(6,'Наталья','Соколова','Офтальмолог','89556667788','sokolova@example.com','Омск, ул. Пушкина, 8','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(7,'Сергей','Попов','Стоматолог','89667778899','popov@example.com','Челябинск, ул. Кирова, 22','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(8,'Анна','Лебедева','Дерматолог','89778889900','lebedeva@example.com','Пермь, ул. Советская, 7','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(9,'Игорь','Новиков','Отоларинголог','89889990011','novikov@example.com','Владивосток, ул. Русская, 14','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(10,'Татьяна','Морозова','Ревматолог','89990001122','morozova@example.com','Краснодар, ул. Мира, 9','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(11,'Михаил','Фёдоров','Эндокринолог','89012345671','fedorov@example.com','Сочи, ул. Горького, 11','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(12,'Людмила','Беловa','Психиатр','89123456782','belova@example.com','Тверь, ул. Карла Маркса, 3','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(13,'Николай','Тихонов','Уролог','89234567893','tikhonov@example.com','Томск, ул. Лазо, 6','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(14,'Юлия','Громова','Гинеколог','89345678904','gromova@example.com','Барнаул, ул. Победы, 2','2025-06-05 16:43:39','2025-06-05 16:43:39'),
(15,'Артем','Егоров','Аллерголог','89456789015','egorov@example.com','Ярославль, ул. Чехова, 17','2025-06-05 16:43:39','2025-06-05 16:43:39');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab_results`
--

DROP TABLE IF EXISTS `lab_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `test_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_taken` date NOT NULL,
  `results` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `lab_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab_results`
--

LOCK TABLES `lab_results` WRITE;
/*!40000 ALTER TABLE `lab_results` DISABLE KEYS */;
INSERT INTO `lab_results` VALUES
(1,5,'Общий анализ крови','2024-01-06','Гемоглобин 140','Норма','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(2,9,'Биохимия крови','2024-01-11','Холестерин 5.2','Незначительно повышено','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(3,2,'Анализ мочи','2024-01-16','Белок отрицательный','Хорошие показатели','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(4,14,'Гормоны щитовидной железы','2024-01-21','ТТГ 2.1','В норме','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(5,7,'Глюкоза крови','2024-01-26','5.8 ммоль/л','Натощак','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(6,11,'Коагулограмма','2024-02-02','Протромбиновый индекс 95%','Норма','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(7,3,'Онкомаркеры','2024-02-06','ПСА 1.2','Без патологий','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(8,12,'Иммунограмма','2024-02-11','Лейкоциты 5.6','Норма','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(9,8,'Аллергопробы','2024-02-16','Реакция на пыльцу','Назначены антигистаминные','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(10,1,'ПЦР-тест','2024-02-21','Отрицательный','COVID-19 не обнаружен','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(11,13,'Липидный профиль','2024-02-26','ЛПНП 3.1','Рекомендована диета','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(12,4,'Анализ кала','2024-03-02','Яйца глист не обнаружены','Норма','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(13,10,'Спермограмма','2024-03-06','Концентрация 45 млн/мл','Хорошие показатели','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(14,6,'Генетический тест','2024-03-11','BRCA1 отрицательный','Риски в норме','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(15,15,'Анализ на витамины','2024-03-16','Витамин D 25 нг/мл','Недостаточность','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(16,5,'Общий анализ крови','2024-01-06','Гемоглобин 140','Норма','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(17,9,'Биохимия крови','2024-01-11','Холестерин 5.2','Незначительно повышено','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(18,2,'Анализ мочи','2024-01-16','Белок отрицательный','Хорошие показатели','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(19,14,'Гормоны щитовидной железы','2024-01-21','ТТГ 2.1','В норме','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(20,7,'Глюкоза крови','2024-01-26','5.8 ммоль/л','Натощак','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(21,11,'Коагулограмма','2024-02-02','Протромбиновый индекс 95%','Норма','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(22,3,'Онкомаркеры','2024-02-06','ПСА 1.2','Без патологий','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(23,12,'Иммунограмма','2024-02-11','Лейкоциты 5.6','Норма','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(24,8,'Аллергопробы','2024-02-16','Реакция на пыльцу','Назначены антигистаминные','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(25,1,'ПЦР-тест','2024-02-21','Отрицательный','COVID-19 не обнаружен','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(26,13,'Липидный профиль','2024-02-26','ЛПНП 3.1','Рекомендована диета','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(27,4,'Анализ кала','2024-03-02','Яйца глист не обнаружены','Норма','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(28,10,'Спермограмма','2024-03-06','Концентрация 45 млн/мл','Хорошие показатели','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(29,6,'Генетический тест','2024-03-11','BRCA1 отрицательный','Риски в норме','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(30,15,'Анализ на витамины','2024-03-16','Витамин D 25 нг/мл','Недостаточность','2025-06-24 05:46:14','2025-06-24 05:46:14');
/*!40000 ALTER TABLE `lab_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medication_logs`
--

DROP TABLE IF EXISTS `medication_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medication_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `dosage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_taken` datetime DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `medication_id` (`medication_id`),
  CONSTRAINT `medication_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `medication_logs_ibfk_2` FOREIGN KEY (`medication_id`) REFERENCES `medications` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medication_logs`
--

LOCK TABLES `medication_logs` WRITE;
/*!40000 ALTER TABLE `medication_logs` DISABLE KEYS */;
INSERT INTO `medication_logs` VALUES
(16,3,7,'500 мг 2 раза в день','2024-01-07 08:00:00','Ангина','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(17,10,10,'1 таблетка на ночь','2024-01-12 22:00:00','Аллергический ринит','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(18,6,5,'2 таблетки','2024-01-17 14:00:00','Боли в животе','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(19,1,12,'1 капсула утром','2024-01-22 07:30:00','Изжога','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(20,13,3,'1000 мг','2024-01-27 12:00:00','Температура 38.5','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(21,8,15,'30 капель','2024-02-03 09:00:00','Сердцебиение','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(22,4,2,'400 мг','2024-02-07 16:00:00','Головная боль','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(23,15,9,'2 мг','2024-02-12 18:00:00','Диарея','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(24,11,1,'325 мг','2024-02-17 10:00:00','Профилактика тромбов','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(25,2,14,'1 таблетка','2024-02-22 13:00:00','Тяжесть после еды','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(26,9,8,'500 мг 1 раз в день','2024-02-27 08:00:00','Бронхит','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(27,5,11,'10 мг','2024-03-03 20:00:00','Сезонная аллергия','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(28,12,6,'2 таблетки','2024-03-08 11:00:00','Мигрень','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(29,7,13,'1 таблетка 3 раза в день','2024-03-13 09:00:00','Панкреатит','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(30,14,4,'500 мг','2024-03-18 15:00:00','Зубная боль','2025-06-24 05:46:02','2025-06-24 05:46:02'),
(31,3,7,'500 мг 2 раза в день','2024-01-07 08:00:00','Ангина','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(32,10,10,'1 таблетка на ночь','2024-01-12 22:00:00','Аллергический ринит','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(33,6,5,'2 таблетки','2024-01-17 14:00:00','Боли в животе','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(34,1,12,'1 капсула утром','2024-01-22 07:30:00','Изжога','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(35,13,3,'1000 мг','2024-01-27 12:00:00','Температура 38.5','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(36,8,15,'30 капель','2024-02-03 09:00:00','Сердцебиение','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(37,4,2,'400 мг','2024-02-07 16:00:00','Головная боль','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(38,15,9,'2 мг','2024-02-12 18:00:00','Диарея','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(39,11,1,'325 мг','2024-02-17 10:00:00','Профилактика тромбов','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(40,2,14,'1 таблетка','2024-02-22 13:00:00','Тяжесть после еды','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(41,9,8,'500 мг 1 раз в день','2024-02-27 08:00:00','Бронхит','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(42,5,11,'10 мг','2024-03-03 20:00:00','Сезонная аллергия','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(43,12,6,'2 таблетки','2024-03-08 11:00:00','Мигрень','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(44,7,13,'1 таблетка 3 раза в день','2024-03-13 09:00:00','Панкреатит','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(45,14,4,'500 мг','2024-03-18 15:00:00','Зубная боль','2025-06-24 05:46:14','2025-06-24 05:46:14');
/*!40000 ALTER TABLE `medication_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medications`
--

DROP TABLE IF EXISTS `medications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medications`
--

LOCK TABLES `medications` WRITE;
/*!40000 ALTER TABLE `medications` DISABLE KEYS */;
INSERT INTO `medications` VALUES
(1,'Аспирин','Обезболивающее и жаропонижающее','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(2,'Ибупрофен','Противовоспалительное','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(3,'Парацетамол','Снижает температуру','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(4,'Анальгин','Обезболивающее','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(5,'Но-шпа','Спазмолитик','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(6,'Цитрамон','Головная боль','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(7,'Амоксициллин','Антибиотик','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(8,'Азитромицин','Широкий спектр антибиотика','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(9,'Лоперамид','От поноса','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(10,'Супрастин','От аллергии','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(11,'Кларитин','Антигистаминное','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(12,'Омепразол','Желудочные проблемы','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(13,'Фестал','Пищеварение','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(14,'Мезим','Панкреатическая недостаточность','2025-06-05 16:44:13','2025-06-05 16:44:13'),
(15,'Корвалол','Сердечное успокоительное','2025-06-05 16:44:13','2025-06-05 16:44:13');
/*!40000 ALTER TABLE `medications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacient`
--

DROP TABLE IF EXISTS `pacient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(255) NOT NULL,
  `updated_at` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacient`
--

LOCK TABLES `pacient` WRITE;
/*!40000 ALTER TABLE `pacient` DISABLE KEYS */;
INSERT INTO `pacient` VALUES
(1,'Петров','Иван','Андреевич',1750739891,1750739891,'petrov@example.com'),
(2,'Иванова','Мария','Александровна',1750739891,1750739891,'ivanova@example.com'),
(3,'Сидоров','Алексей','Юрьевич',1750739891,1750739891,'sidorov@example.com'),
(4,'Смирнова','Ольга','Вадимовна',1750739891,1750739891,'smirnova@example.com'),
(5,'Кузнецов','Дмитрий','Владимирович',1750739891,1750739891,'kuznecov@example.com'),
(6,'Соколова','Наталья','Романовна',1750739891,1750739891,'sokolova@example.com'),
(7,'Попов','Сергей','Анатольевич',1750739891,1750739891,'popov@example.com'),
(8,'Лебедева','Анна','Григорьевна',1750739891,1750739891,'lebedeva@example.com'),
(9,'Новиков','Игорь','Игоревич',1750739891,1750739891,'novikov@example.com'),
(10,'Морозова','Татьяна','Михайловна',1750739891,1750739891,'morozova@example.com'),
(11,'Фёдоров','Михаил','Алексанрович',1750739891,1750739891,'fedorov@example.com'),
(12,'Белова','Людмила','Дмитриевна',1750739891,1750739891,'belova@example.com'),
(13,'Тихонов','Николай','Никитич',1750739891,1750739891,'tikhonov@example.com'),
(14,'Громова','Юлия','Николаевна',1750739891,1750739891,'gromova@example.com'),
(15,'Егоров','Артем','Муратович',1750739891,1750739891,'egorov@example.com'),
(16,'Шишкина','Алина','Павловна',1750745254,1750745254,'artem@mail.ru');
/*!40000 ALTER TABLE `pacient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedures`
--

DROP TABLE IF EXISTS `procedures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `procedure_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_performed` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `procedures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedures`
--

LOCK TABLES `procedures` WRITE;
/*!40000 ALTER TABLE `procedures` DISABLE KEYS */;
INSERT INTO `procedures` VALUES
(1,8,'Физиотерапия','2024-01-08','Электрофорез с кальцием','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(2,15,'Массаж','2024-01-13','Шейно-воротниковая зона','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(3,4,'Инъекция','2024-01-18','Внутримышечно витамин B12','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(4,11,'Перевязка','2024-01-23','Послеоперационная рана','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(5,2,'Капельница','2024-01-28','Детоксикационная терапия','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(6,9,'УЗИ','2024-02-04','Органов брюшной полости','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(7,5,'Рентген','2024-02-08','Грудной клетки','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(8,12,'ЭКГ','2024-02-13','С нагрузкой','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(9,7,'ФГДС','2024-02-18','Гастроскопия','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(10,1,'Криотерапия','2024-02-23','Удаление бородавки','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(11,13,'Лазерная терапия','2024-02-28','Лечение артроза','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(12,3,'Иглоукалывание','2024-03-03','При остеохондрозе','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(13,10,'Гемодиализ','2024-03-08','Плановый сеанс','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(14,6,'Ингаляция','2024-03-13','С бронхолитиком','2025-06-24 05:46:14','2025-06-24 05:46:14'),
(15,14,'Биопсия','2024-03-18','Кожи','2025-06-24 05:46:14','2025-06-24 05:46:14');
/*!40000 ALTER TABLE `procedures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(255) NOT NULL,
  `updated_at` int(255) NOT NULL,
  `access_token` int(255) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'ipetrov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Петров','Иван','',1750739891,1750739891,NULL,'petrov@example.com',0),
(2,'mivanova','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Иванова','Мария','',1750739891,1750739891,NULL,'ivanova@example.com',0),
(3,'asidorov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Сидоров','Алексей','',1750739891,1750739891,NULL,'sidorov@example.com',0),
(4,'osmirnova','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Смирнова','Ольга','',1750739891,1750739891,NULL,'smirnova@example.com',0),
(5,'dkuznecov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Кузнецов','Дмитрий','',1750739891,1750739891,NULL,'kuznecov@example.com',0),
(6,'nsokolova','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Соколова','Наталья','',1750739891,1750739891,NULL,'sokolova@example.com',0),
(7,'spopov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Попов','Сергей','',1750739891,1750739891,NULL,'popov@example.com',0),
(8,'alebedeva','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Лебедева','Анна','',1750739891,1750739891,NULL,'lebedeva@example.com',0),
(9,'inovikov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Новиков','Игорь','',1750739891,1750739891,NULL,'novikov@example.com',0),
(10,'tmorozova','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Морозова','Татьяна','',1750739891,1750739891,NULL,'morozova@example.com',0),
(11,'mfedorov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Фёдоров','Михаил','',1750739891,1750739891,NULL,'fedorov@example.com',0),
(12,'lbelova','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Белова','Людмила','',1750739891,1750739891,NULL,'belova@example.com',0),
(13,'ntikhonov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Тихонов','Николай','',1750739891,1750739891,NULL,'tikhonov@example.com',0),
(14,'ygromova','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Громова','Юлия','',1750739891,1750739891,NULL,'gromova@example.com',0),
(15,'aegorov','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Егоров','Артем','',1750739891,1750739891,NULL,'egorov@example.com',0),
(22,'alina','$2y$13$qKOQHGpIaPLjzmLg025qV./Rj8r1P8uQy3GLQESgPERy5up4NzG7G','Шишкина','Алина',NULL,1750745254,1750745254,0,'artem@mail.ru',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-25  9:06:52
