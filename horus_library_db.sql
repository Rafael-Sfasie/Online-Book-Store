-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2023 at 01:49 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horus_library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `email`, `password`) VALUES
(6, 'Elias', 'eliasdante@gmail.com', 'e67f23'),
(3, 'Rafael S', 'rafs@gmail.com', '$2y$10$B5JnjXuJ/Zal6Oth2eeQIOG01MLSYkRV.7/XZcqIFqoht2srzBcmy'),
(1, 'Jason', 'redhood@gmail.com', '$2y$10$uDso.IVFp8TI1y0Exb8WpurwFo6o8EHtZTpyeDMm.RJgYG0Np0Tyu'),
(2, 'Chris ', 'chris45@gmail.com', '$2y$10$v9R/YqgEvHTVefIkZYoXsOMTIxXEDvpGC1xmOJlM0paI9jHtoEq7G'),
(4, 'Vergil', 'vergilalpha@gmail.com', '$2y$10$ZIAerSS1OAcWs1Nlx3svAe6qjIoCx4JaBbFcA959I92qIoAjzCMY6'),
(8, 'DAW 2', 'daw2@gmail.com', '$2y$10$dtwdnzNJQ48LXT2T5MX8u.n2ty0BKz96K7KjmrC7qJRkCNbXGFNRG '),
(9, 'DAW10', 'daw10@gmail.com', '$2y$10$IbvyaMqlwkV5P3kBrfsHbefVUpE9Fgty0RDpS55CiLXXmj4aWiE2m');

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

DROP TABLE IF EXISTS `autori`;
CREATE TABLE IF NOT EXISTS `autori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id`, `nume`) VALUES
(1, 'Kerri Maniscalco'),
(2, 'Lars Brownworth'),
(3, 'Stefan Tanase'),
(4, 'Andrzej Sapkowski'),
(5, 'Sven Hassel'),
(6, 'Mihaela Muresean'),
(7, 'Makoto Yukimura'),
(8, 'Lee Bermejo'),
(9, 'Andrew O Neill');

-- --------------------------------------------------------

--
-- Table structure for table `carti`
--

DROP TABLE IF EXISTS `carti`;
CREATE TABLE IF NOT EXISTS `carti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Titlu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_autor` int NOT NULL,
  `id_categorie` int NOT NULL,
  `Numarul_de_pagini` int NOT NULL,
  `Editura` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Limba` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Dimensiune` varchar(50) NOT NULL,
  `Pret` double NOT NULL,
  `Descriere` text NOT NULL,
  `Coperta` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carti`
--

INSERT INTO `carti` (`id`, `Titlu`, `id_autor`, `id_categorie`, `Numarul_de_pagini`, `Editura`, `Limba`, `Dimensiune`, `Pret`, `Descriere`, `Coperta`) VALUES
(2, 'Regatul celor malefici', 1, 4, 432, 'Leda', 'Romana', '20x13 cm', 50, 'Emilia ??i sora ei geam??n??, Vittoria, sunt streghe, vr??jitoare care tr??iesc ??n secret printre oameni, ??ncerc??nd din r??sputeri s?? treac?? neobservate ??i evit??nd astfel s?? fie persecutate. ??ntr-o noapte, Vittoria nu ajunge s?? serveasc?? cina la renumitul restaurant sicilian al familiei. La scurt timp dup??, Emilia g??se??te corpul iubitei sale surori profanat ??ntr-un mod barbar. Cu sufletul buc????i, porne??te pe urmele celui care i-a ucis geam??na, dornic?? s??-i r??zbune cu orice pre?? moartea, chiar dac?? asta ??nseamn?? s?? recurg?? la magia neagr??, care a fost de mult interzis??.', 'Regatul celor malefici.jpg'),
(3, 'Java de la 0 la expert', 3, 3, 864, 'Polirom', 'Romana', '16x23 cm', 134, 'Java este un limbaj de programare orientat obiect deja consacrat. Datorita dinamismului sau, este utilizat in scrierea celor mai multe aplicatii distribuite, noile evolutii tehnologice validind folosirea sa pentru software-ul dispozitivelor portabile (telefoane mobile, agende electronice, palmtop-uri). Cititorului i se ofera un ghid complet de invatare, volumul incluzind cunostinte de baza, dar si de nivel mediu si avansat referitoare la limbajul Java. Lucrarea este bogata in exemple de programe comentate, fiecare capitol terminindu-se cu realizarea unei aplicatii concrete, pentru a ilustra mai bine notiunile si instrumentele de programare puse la dispozitie de acest limbaj.', 'java-de-la-0-la-expert.jpg'),
(1, 'Lupii Marilor. O scurta istorie a vikingilor', 2, 2, 288, 'ALL', 'Romana', '20x13 cm', 39.9, 'Gra??ie document??rii riguroase ??i talentului de povestitor al autorului, Lupii m??rilor contureaz?? un tablou cuprinz??tor al epocii vikinge, adres??ndu-se tuturor iubitorilor istoriei ??i ai civiliza??iilor nordice.', 'lupii_marilor.webp'),
(4, 'Sangele elfilor. Volumul III din seria Witcher', 4, 1, 312, 'Armada', 'Romana', '130x200 cm', 34.9, 'De peste un secol, oamenii, gnomii si elfii au trait impreuna intr-o pace relativa. Dar timpurile s-au schimbat, pacea s-a incheiat, iar rasele sunt din nou in razboi. Geralt din Rivia, vanatorul de monstri, a asteptat decenii intregi nasterea copilului din profetie: Ciri, cea care va schimba lumea, fie in bine, fie in rau.Pe un taram aflat sub amenintarea razboiului total, copilul este vanat pentru puterile lui extraordinare si numai Geralt ii poate proteja pe toti ??? aceasta este misiunea pentru care s-a nascut.', 'Sangele elfilor.jpg'),
(5, 'Drum sangeros catre moarte', 5, 5, 512, 'Armada History', 'Romana', '130x200 cm', 35.99, 'Greselile costa. Cel mai mult costa nesupunerea si actiunile personale.??Candva, in anul 1944??? La Berlin si langa linia frontului, Curtile Martiale isi fac datoria: asteapta sa dea verdicte. Plutonul de executie e pregatit si el. Pusi la zid sau cu arma la ochi, soldatii mersesera pana la capat pe Drumul sangeros catre moarte?????Sven, Porta, Micutul au ajuns intr-un loc uitatde Dumnezeu, plin de serpi, scorpioni si furnici uriase. Un loc al mortii si al desertaciunii.??Orice greseala ii va costa.', 'Drum sangeros.jpg'),
(8, 'Saga Vinland. Volumul 1', 7, 6, 463, 'Kodansha', 'Engleza', '210x153 cm', 129.99, '??n copil??rie, Thorfinn st??tea la picioarele marelui Leif Ericson ??i era ??nc??ntat de pove??tile s??lbatice despre un ??inut departe de vest, dar fanteziile sale de tinere??e au fost spulberate de un raid mercenar. Crescut de vikingii care i-au ucis familia, Thorfinn a devenit un r??zboinic terifiant, c??ut??nd pentru totdeauna s??-l omoare pe liderul trupei, Askeladd, ??i s??-??i r??zbune tat??l.', 'Vinland_saga.jpg'),
(9, 'Batman: Noel', 8, 7, 112, 'Marvel', 'Engleza', '210x153 cm', 114.14, 'Inspirat de clasicul nemuritor al lui Charles Dickens A Christmas Carol, BATMAN: NOEL prezint?? diferite interpret??ri ale The Dark Knight, ??mpreun?? cu inamicii ??i alia??ii s??i, ??n diferite epoci. Pe parcurs, Batman trebuie s?? se ??mpace cu trecutul, prezentul ??i viitorul s??u ??n timp ce se lupt?? cu r??uf??c??torii din anii 1960 p??n?? la amenin????rile ??ntunecate ??i tulbur??toare ale zilelor noastre, ??n timp ce exploreaz?? ce ??nseamn?? s?? fii eroul care este. Membrii distribu??iei secundare a lui Batman interpreteaz?? roluri analoge cu cele din A Christmas Carol, cu Robin, Catwoman, Superman, The Joker ??i mai multe roluri care vor fi familiare oricui cunoa??te povestea original?? de vacan???? a lui Dickens.', 'batman.jpeg'),
(10, 'O istorie Heavy Metal', 9, 2, 360, 'Ideea Europeana', 'Romana', '130x200 cm', 40.99, 'Andrew O\'Neill ne poarta abil prin lumile mai mult sau mai putin umbrite ale culturii heavy metal. O face, fireste, pe etape istorice, pe segmente culturale si generatii. De la blues la rock-and-roll, de la rock-and-roll la formele artistice extreme, progresiv adunate in condica istoriei genului: thrash, black metal, death metal, grindcore, metalcore, grunge, rap metal etc.', 'Istoria_heavy_metal.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `categorii`
--

DROP TABLE IF EXISTS `categorii`;
CREATE TABLE IF NOT EXISTS `categorii` (
  `id` int NOT NULL AUTO_INCREMENT,
  `denumire` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorii`
--

INSERT INTO `categorii` (`id`, `denumire`) VALUES
(1, 'Fantasy '),
(2, 'Istorie'),
(3, 'IT si Calculatoare'),
(5, 'Memorii'),
(6, 'Manga'),
(7, 'Benzi desenate');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
