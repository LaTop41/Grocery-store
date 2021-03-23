-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 09:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodavnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `brojTelefona` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pol` enum('M','Ž') NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `password`, `brojTelefona`, `email`, `pol`, `usertype`) VALUES
(50125, 'Marko', 'Markovic', '7e6bfa0c97e0bc8c69bdc7dd4b172f39c74c3e71', '65546565', 'marko@gmail.com', 'M', 'user'),
(54656, 'Petar', 'Petrovic', 'petar2020', '6545656', 'petar@gmail.com', 'M', 'admin'),
(244833, 'daawe23', '45545ad', '349ee70c3f565017ff11ae5b1dcec66811aeff7f', '45a4da54d', 'd45a@dad', 'M', 'user'),
(255913, 'ad4a5', '45545ad', '0f158e648228a19cab5f23acfd6c36f716a702a9', '45a4da54d', 'd45a@dad', 'M', 'user'),
(266172, 'daawe23', '45545ad', 'fedd1d1122aa65028c81e16ceb85d9c73790a2fa', '45a4da54d', 'd45a@dad', 'M', 'user'),
(580151, 'daawe23', '45545ad', 'fedd1d1122aa65028c81e16ceb85d9c73790a2fa', '45a4da54d', 'd45a@dad', 'M', 'user'),
(669254, 'Luka', 'Topalovic', '349ee70c3f565017ff11ae5b1dcec66811aeff7f', '555555555', 'lukatopalovic4@gmail.com', 'M', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `idNarudzbenice` varchar(50) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `datumVreme` datetime NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `postanskiBroj` int(11) NOT NULL,
  `NarUkupnaCena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`idNarudzbenice`, `idKorisnik`, `datumVreme`, `adresa`, `grad`, `postanskiBroj`, `NarUkupnaCena`) VALUES
('203217', 50125, '0000-00-00 00:00:00', 'Prvomajska', 'Beograd', 45544, 4499),
('495326', 50125, '0000-00-00 00:00:00', 'Prvomajska', 'Zemun', 11245, 1804.05),
('530446', 50125, '2020-05-19 17:43:25', 'Prvomajska', 'Zemun', 11080, 1804.05),
('584875', 669254, '2020-05-13 21:06:34', 'Backa 33', 'Zwmun', 11080, 8998),
('649826', 50125, '0000-00-00 00:00:00', 'Prvomajska', 'Zemun', 22545, 4499),
('80325', 50125, '0000-00-00 00:00:00', 'Prvomajska', 'Beograd', 11050, 1804.05),
('812056', 50125, '2020-05-18 19:08:35', 'Backa', 'Zemun', 11080, 6303.05),
('829808', 50125, '2020-05-20 00:19:34', 'eqeqeq', 'Beograd', 1545, 1804.05),
('853491', 50125, '2020-05-18 18:30:03', 'Backa', 'Zemun', 11080, 21848.25),
('855863', 50125, '2020-06-04 13:56:30', 'Backa 33 ', 'Zemun', 11080, 4499),
('864885', 669254, '2020-05-14 18:14:31', 'Backa 33 ', 'Zemun', 11080, 9684.3),
('895135', 50125, '2020-05-19 18:27:42', 'Prvomajska', 'Zemun', 54554, 1804.05);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `imeIprezime` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefon` int(15) NOT NULL,
  `poruka` text NOT NULL,
  `naslov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`imeIprezime`, `email`, `telefon`, `poruka`, `naslov`) VALUES
('Luka Topalovic', 'luka@gmail.com', 4545445, 'dadadadada', 'Dokle vise'),
('Luka Topalovic', 'luka@gmail.com', 4545445, 'dadadadada', 'Dokle vise'),
('Luka Topalovic', 'luka@gmail.com', 4545445, 'dadadadada', 'Dokle vise'),
('Luka Topalovic', 'luka@gmail.com', 4545445, 'dadadadadadada', 'Dokle vise'),
('Luka Topalovic', 'luka@gmail.com', 4545445, 'dadadadadadada', 'Dokle vise');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `idProizvoda` varchar(30) NOT NULL,
  `naziv` varchar(120) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `opis` varchar(600) NOT NULL,
  `cena` int(11) NOT NULL,
  `popust` int(11) DEFAULT NULL,
  `slika` varchar(200) DEFAULT NULL,
  `ukupnaCena` double DEFAULT NULL,
  `stanje` enum('Na stanju','Nije na stanju') NOT NULL,
  `kategorija` enum('pice','meso','voce','zdrava','pekara','mleko','cokolada','smrznuto') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`idProizvoda`, `naziv`, `kolicina`, `opis`, `cena`, `popust`, `slika`, `ukupnaCena`, `stanje`, `kategorija`) VALUES
('ME211881', 'Juneća plećka 1kg', 0, 'Proizvođač                       LANZAR 2000 DOO', 2156, 5, 'juneca-plecka-bez-kostiju-1kg.jpg', 2048.2, 'Nije na stanju', 'meso'),
('P45524', 'Johnnie Walker-black 12 700ml', 35, 'Black label je jedan od svestski najpoznatijih tzv. mešanih (blended) viskija. Njegovu mešavinu čini oko 40 viskija\r\nrazličite starosti, koji su veoma dobro ukomponovani.\r\nNa mirisu je veoma bogat. Mogu se naći note zimskih začina i melase, naznake belog bibera i veoma malo citrusa.\r\nUkus je izrazito bogat i pun. Može se osetiti ukus dima i suvih začina, naznake ječma i žitarica sa tofi kremom\r\ni jasnim herbalnim notama.\r\nZavršnica je prilično voćna i duga sa notama suvog grožđa i mešanog voća.', 4499, 0, 'viski-johnnie-walker-black-12-700ml.jpg', 4499, 'Na stanju', 'pice'),
('PE24654', 'Integralni hleb 300gr', 37, 'Funkcionalni pekarski proizvodi se mogu proizvesti iz cijelog zrna žitarica, obogaćivanjem vlaknima, vitaminima i mineralnim tvarima, te bioaktivnim sastojcima kao što su fitosteroli i stanoli, omega-3 masne kiseline, lignani i biljni ekstrakti, ili dodatkom kiselog tijesta. U 2006. godini, od svih kategorija pekarskih proizvoda koji pogoduju zdravlju poput ekoloških, obogaćenih i funkcionalnih proizvoda te hrane za posebne potrebe (netolerancije na hranu), kategorija prirodno zdravih proizvoda bogatih vlaknima činila je 61 % Europskog tržišta sličnih proizvoda', 135, 0, 'hleb.jpg', 135, 'Na stanju', 'pekara'),
('PI697483', 'Viski JACK DANIELS 0.7l', 3, 'Tenesi viski', 1899, 5, 'viski-jack-daniels-0.7l.jpg', 1804.05, 'Na stanju', 'pice');

-- --------------------------------------------------------

--
-- Table structure for table `stavka_narudzbenice`
--

CREATE TABLE `stavka_narudzbenice` (
  `idNarudzbenice` varchar(50) NOT NULL,
  `idProizvoda` varchar(30) NOT NULL,
  `redniBroj` int(11) NOT NULL,
  `izabranaKolicina` int(11) NOT NULL,
  `ukupnaCena` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stavka_narudzbenice`
--

INSERT INTO `stavka_narudzbenice` (`idNarudzbenice`, `idProizvoda`, `redniBroj`, `izabranaKolicina`, `ukupnaCena`) VALUES
('203217', 'P45524', 1, 1, 4499),
('495326', 'PI697483', 1, 1, 1804.05),
('530446', 'PI697483', 1, 1, 1804.05),
('584875', 'P45524', 1, 2, 8998),
('649826', 'P45524', 1, 1, 4499),
('80325', 'PI697483', 1, 1, 1804.05),
('812056', 'P45524', 1, 1, 4499),
('812056', 'PI697483', 2, 1, 1804.05),
('829808', 'PI697483', 1, 1, 1804.05),
('853491', 'ME211881', 2, 1, 2048.2),
('853491', 'P45524', 1, 4, 17996),
('853491', 'PI697483', 3, 1, 1804.05),
('855863', 'P45524', 1, 1, 4499),
('864885', 'ME211881', 1, 6, 9684.3),
('895135', 'PI697483', 1, 1, 1804.05);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD PRIMARY KEY (`idNarudzbenice`),
  ADD KEY `idKorisnikConstraint` (`idKorisnik`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`idProizvoda`);

--
-- Indexes for table `stavka_narudzbenice`
--
ALTER TABLE `stavka_narudzbenice`
  ADD PRIMARY KEY (`idNarudzbenice`,`idProizvoda`),
  ADD KEY `idProizvoda` (`idProizvoda`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD CONSTRAINT `idKorisnikConstraint` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `stavka_narudzbenice`
--
ALTER TABLE `stavka_narudzbenice`
  ADD CONSTRAINT `stavka_narudzbenice_ibfk_1` FOREIGN KEY (`idNarudzbenice`) REFERENCES `narudzbenica` (`idNarudzbenice`),
  ADD CONSTRAINT `stavka_narudzbenice_ibfk_2` FOREIGN KEY (`idProizvoda`) REFERENCES `proizvod` (`idProizvoda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
