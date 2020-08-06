SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `cf_name` varchar(100) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `cin` varchar(20) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `w_start` datetime DEFAULT NULL,
  `w_end` datetime DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `c_address` varchar(400) DEFAULT NULL,
  `c_pass` varchar(30) DEFAULT NULL,
  `extra` varchar(300) DEFAULT NULL,
  `cin_file` varchar(100) DEFAULT NULL,
  `drive_license_file` varchar(100) DEFAULT NULL,
  `drive_license_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`c_id`, `vehicle_id`, `cf_name`, `cl_name`, `c_email`, `c_mobile`, `cin`, `nid`, `w_start`, `w_end`, `payment_type`, `invoice_id`, `c_address`, `c_pass`, `extra`, `cin_file`, `drive_license_file`, `drive_license_number`) VALUES
(17, NULL, 'Mohamed', 'Ettounssi', '0', '99123456', NULL, NULL, NULL, NULL, 'Cash', 135, NULL, '1234', NULL, NULL, NULL, ''),
(36, NULL, 'Saber', 'Gdawin', '0', '23659259', NULL, NULL, NULL, NULL, 'Cash', 136, NULL, '1234', NULL, NULL, NULL, ''),
(39, NULL, 'Hsin', 'Amar', '0', '22734978', NULL, NULL, NULL, NULL, 'Cash', 134, NULL, '1234', NULL, NULL, NULL, NULL),
(40, NULL, 'Hichem', 'Chamem', '', '24637778', '08666011', NULL, NULL, NULL, NULL, NULL, 'S3ED,MAHDIA', NULL, NULL, '', '', '16/69227'),
(43, NULL, 'Aymen', 'Hajri', '', '28713687', '06902634', NULL, NULL, NULL, 'Cash', 132, 'Chrahil,Moknin,Monastir', '1234', NULL, '', '', 'RG5206795U'),
(45, NULL, 'Bilel', 'Amara', '', '23707561', '06917394', NULL, NULL, NULL, NULL, NULL, 'sidi banour,moknin,monastir', NULL, NULL, '', '', '16/50239'),
(46, NULL, 'Kais', 'Lhaj', '', '92175476', '06896971', NULL, NULL, NULL, 'Cash', NULL, 'sidi banour,moknin,mounastir', '1234', NULL, '', '', 'u1y978512j'),
(47, NULL, 'Mouhamed', 'Mazrouii', '', '58648660', 'F724708', NULL, NULL, NULL, 'Cash', NULL, '', '1234', NULL, '', '', '14A071500'),
(48, NULL, 'Mouhamed', 'Ben Amar', '', '20782738', '03821123', NULL, NULL, NULL, 'Cash', NULL, 'Ksar-hlel,mounastir', '1234', NULL, '', '', '14/23329'),
(50, NULL, 'Jamel', 'Aziza', '', '25118248', 'E2679867', NULL, NULL, NULL, 'Cash', 64, 'Hiboun,Mahdia', '1234', NULL, '', '', '00274917700'),
(51, 46, 'Chokri ', 'Haj Fredj', '0', '29388645', NULL, NULL, '2018-12-25 00:00:00', '2019-01-15 00:00:00', 'Cash', NULL, NULL, '1234', NULL, NULL, NULL, NULL),
(52, 36, 'Hosni', 'Boubaker', '0', '98458409', NULL, NULL, '2018-12-20 00:00:00', '2019-01-05 00:00:00', 'Cash', NULL, NULL, '1234', NULL, NULL, NULL, NULL),
(54, NULL, 'Ridha', 'Hmaed', '', '20535383', '03996436', NULL, NULL, NULL, 'Cash', NULL, 'Zahra,Mahdia', '1234', NULL, '', '', '16/28961'),
(55, NULL, 'Zouhair', 'Nasser', '', '92933236', '09413156', NULL, NULL, NULL, 'Cash', 66, 'Ouled chemekh, Mahdia', '1234', NULL, '', '', '16/71430'),
(56, NULL, 'Mouhamed Amine', 'Hmida', '', '96353747', '06848376', NULL, NULL, NULL, 'Cash', NULL, 'Sidi Banour Moknin Mounastir', '1234', NULL, '', '', '1014414815'),
(58, NULL, 'Monsef', 'Slouma', '', '29306450', '03883359', NULL, NULL, NULL, 'Cash', NULL, 'jwewda,mahdia', '1234', NULL, '', '', '820183210542'),
(59, NULL, 'Mohamed ', 'Lhaj', '', '27365180', '04021177', NULL, NULL, NULL, 'Cash', 50, 'Sidi banour, Moknin,Mounastir', '1234', NULL, '', '', '16/1960'),
(60, NULL, 'Sabri', 'machfer', '', '', '11803122', NULL, NULL, NULL, NULL, NULL, 'ksour Sef, Mahdia', NULL, NULL, '', '', '1218340883'),
(61, NULL, 'test', 'test', '0', '22011523', NULL, NULL, NULL, NULL, 'Cash', NULL, NULL, '1234', NULL, NULL, NULL, NULL),
(62, NULL, 'Hassen', 'Kassem', '', '94478715', '0884346', NULL, NULL, NULL, 'Cash', 83, 'Mounastir', '1234', NULL, '', '', '390325A'),
(63, NULL, 'Cristine', 'Lamard', '', '50955146', '08A122189', NULL, NULL, NULL, 'Cash', 90, 'Hancha-Sfax', '1234', NULL, '', '', '178606'),
(64, NULL, 'Haithem', 'Wderni', '', '58964874', '11032061', NULL, NULL, NULL, 'Cash', 51, 'Hiboun-Mahdia', '1234', NULL, '', '', '15/86441'),
(65, NULL, 'Abedlahmid', 'Ben ali', '', '53244777', '08264259', NULL, NULL, NULL, 'Cash', 52, 'Jwewda-Mahdia', '1234', NULL, '', '', 'U18D22254W'),
(66, NULL, 'Wissem', 'Bannani', '', '51412099', '12604787', NULL, NULL, NULL, 'Cash', 72, 'Kasrin', '1234', NULL, '55539162_1510920412375299_6289020560269639680_n.jpg', '55575817_402196500610610_2004632975605497856_n.jpg', '1113791810'),
(67, NULL, 'Mohamed Ali', 'Manssour', '', '25846501', '08296928', NULL, NULL, NULL, 'Cash', 54, 'Essaad-Mahdia', '1234', NULL, '56422415_2015067575464399_2029877805528907776_n.jpg', '56330943_579340409237960_8131972743307460608_n.jpg', '5V5170722D'),
(68, NULL, 'Mostfa', 'Alwi', '', '99306874', '03903660', NULL, NULL, NULL, 'Cash', 71, 'Ksour-sef-Mahdia', '1234', NULL, '', '', '21/728'),
(70, NULL, 'Bilel', 'Lhaj', '', '', '14014512', NULL, NULL, NULL, 'Cash', 82, 'Moknin-Monastir', '1234', NULL, '', '', '16/92504'),
(71, NULL, 'Tarek', 'Moujehed', '', '93311835', '0938671', NULL, NULL, NULL, 'Cash', 59, 'Chiba -Mahdia', '1234', NULL, '', '', '16/86177'),
(72, NULL, 'Mohamed ', 'Hasseni', '', '21557860', '03950951', NULL, NULL, NULL, 'Cash', 121, 'Sidi-Alwen-Mahdia', '1234', NULL, '', '', 'RA5259892U'),
(73, NULL, 'Marwen', 'Zekri', '', '21878902', '17EA03698', NULL, NULL, NULL, 'Cash', 62, 'Awled-saleh-Mahdia', '1234', NULL, '', '', '19AB24398'),
(74, NULL, 'Rihab', 'Gharbi', '', '97913139', '06919320', NULL, NULL, NULL, 'Cash', 67, 'moknin-monastir', '1234', NULL, '', '', '09/161198'),
(75, NULL, 'Heni', 'Ben Amor', '', '24073012', '09408230', NULL, NULL, NULL, 'Cash', 70, 'Chebba-Mahdia', '1234', NULL, '', '', '3683856'),
(76, NULL, 'Ridha', 'Sessi', '', '94514455', '08293062', NULL, NULL, NULL, 'Cash', 69, 'Ouled chemekh-Mahdia', '1234', NULL, '', '', '52007-091080-01'),
(77, NULL, 'Makrem', 'Ben Nasser', '', '99408394', '0828484', NULL, NULL, NULL, 'Cash', 73, 'lahkaima-mahdia', '1234', NULL, '', '', '16/30767'),
(78, NULL, 'Wajdi', 'Sfar', '', '21718207', '09413622', NULL, NULL, NULL, 'Cash', 74, 'mahdia', '1234', NULL, '', '', '16/80223'),
(79, NULL, 'Pasquale', 'Valenza', '', '28683574', 'AA4689354', NULL, NULL, NULL, 'Cash', 152, 'Hiboun mahdia', '1234', NULL, '', '', 'U15K03618H'),
(80, NULL, 'Jeber', 'Amar', '', '24662401', '08695951', NULL, NULL, NULL, 'Cash', 76, 'jwewda-mahdia', '1234', NULL, '', '', '16/49387'),
(81, NULL, 'Akrem', 'bedwi', '', '22523044', '09408264', NULL, NULL, NULL, 'Cash', 96, 'Mahdia', '1234', NULL, '', '', '07/117569'),
(82, NULL, 'Rihab', 'Gharbi', '', '97913139', '06919320', NULL, NULL, NULL, 'Cash', 78, 'Moknin-Monastir', '1234', NULL, '', '', '09/161198'),
(84, NULL, 'Dalila', 'Gamoudi', '', '99270470', '08268089', NULL, NULL, NULL, 'Cash', 80, 'Borej Arif-mahdia', '1234', NULL, '', '', '16/47668'),
(85, NULL, 'Haithem', 'Wderni', '', '58964874', '11032061', NULL, NULL, NULL, 'Cash', 81, 'Hiboun -mahdia', '1234', NULL, '', '', '15/86441'),
(86, NULL, 'Chokri ', 'Maouii', '', '98327874', '03170397', NULL, NULL, NULL, 'Cash', 85, 'Ksour Sef-Mahdia', '1234', NULL, '', '', '09/57440'),
(87, NULL, 'Bilel ', 'Mansour', '', '', '12DA29955', NULL, NULL, NULL, 'Cash', 86, 'Sidi Banour-Moknin-Monastir', '1234', NULL, '', '', '19AE36681'),
(88, NULL, 'Mouhamed ', 'Aguerbi', '', '96523505', '03919703', NULL, NULL, NULL, 'Cash', 88, 'Ksour-Sef-Mahdia', '1234', NULL, '', '', '16/189'),
(89, NULL, 'Meher', 'Ben Abid', '', '27743750', '08674697', NULL, NULL, NULL, 'Cash', 89, 'Chiba-Mahdia', '1234', NULL, '', '', '04068321059'),
(90, NULL, 'Nasreddine', 'Mejri', '', '94767970', '08443083', NULL, NULL, NULL, 'Cash', 91, 'Sousse', '1234', NULL, '', '', '09/67750'),
(91, NULL, 'Houssem', 'Zowali', '', '97619388', '09414496', NULL, NULL, NULL, 'Cash', 92, 'Hiboun-mahdia', '1234', NULL, '', '', '16/67634'),
(92, NULL, 'Manssour', 'Attia', '', '', '03958995', NULL, NULL, NULL, NULL, NULL, 'Hiboun-Mahdia', NULL, NULL, '', '', '16/12443'),
(93, NULL, 'Abdalla', 'Khether', '', '23479704', '1001774', NULL, NULL, NULL, 'Cash', 166, 'Sidi-alwen-mahdia', '1234', NULL, '', '', '050583201520'),
(94, NULL, 'Jamel', 'gour', '', '53270777', '03983381', NULL, NULL, NULL, 'Cash', 98, 'Ouled chemekh-mahdia', '1234', NULL, '', '', '15A073903'),
(95, NULL, 'Salahdin', 'Chouket', '', '22199182', '08169819', NULL, NULL, NULL, 'Cash', 99, 'Skhira-Sfex', '1234', NULL, '', '', '15/71138'),
(96, NULL, 'Slim', 'Khether', '', '21421088', '03956112', NULL, NULL, NULL, 'Cash', 156, 'Sidi Oulwen-mahdia', '1234', NULL, '', '', 'AV5025942X'),
(97, NULL, 'Mohamed', 'Hsan', '', '27023352', '03937061', NULL, NULL, NULL, 'Cash', 108, 'Essaad-Mahdia', '1234', NULL, '', '', 'U1R717180J'),
(98, NULL, 'Mokhtar', 'Ben khether', '', '', 'F975945', NULL, NULL, NULL, 'Cash', 104, 'Sidi alwen-mahdia', '1234', NULL, '', '', '830483260255'),
(99, NULL, 'Sabri', 'Machfer', '', '', '11803122', NULL, NULL, NULL, 'Cash', 105, 'Kssour sef-mahdia', '1234', NULL, '42513301_358867601523127_4249501394974801920_n.jpg', '42557777_726030021066455_767155285906161664_n_(1).jpg', '1218340883'),
(100, NULL, 'Semi', 'Ben Fatma', '', '26979444', '08276132', NULL, NULL, NULL, 'Cash', 107, 'Chebba-Mahdia', '1234', NULL, '', '', 'U1P991532X'),
(101, NULL, 'Mouhamed', 'Gamri', '', '22553827', '08299983', NULL, NULL, NULL, 'Cash', 109, 'Chebba-mahdia', '1234', NULL, '', '', '16/31750'),
(102, NULL, 'Naceur', 'Sbaa', '', '25595558', '03852970', NULL, NULL, NULL, 'Cash', 120, 'Zahra-Mahdia', '1234', NULL, '', '', '16/3739'),
(103, NULL, 'Lassed', 'Bouzayen', '', '22644503', '08261724', NULL, NULL, NULL, 'Cash', 111, 'Mahdia', '1234', NULL, '', '', '16/66260'),
(104, NULL, 'Faouzi', 'Ghzel', '', '', '09384676', NULL, NULL, NULL, 'Cash', 113, 'chebba-mahdia', '1234', NULL, '', '', '16/74856'),
(106, NULL, 'Mohamed Amin', 'Gadour', '', '20904743', '06240673', NULL, NULL, NULL, 'Cash', 119, 'Mahdia', '1234', NULL, '', '', '16/93406'),
(107, NULL, 'Mohamed ', 'Mazrouii', '', '58648660', 'F724708', NULL, NULL, NULL, 'Cash', 122, '', '1234', NULL, '', '', ''),
(108, NULL, 'Hamza ', 'Chouchen', '', '', '08682476', NULL, NULL, NULL, 'Cash', 123, '', '1234', NULL, '', '', ''),
(109, NULL, 'Makrem', 'Bakouch', '', '23512960', '08299124', NULL, NULL, NULL, 'Cash', 124, 'Mahdia', '1234', NULL, '', '', '2425952500'),
(110, NULL, 'Hamza', 'Chouchen', '', '54684612', '08682476', NULL, NULL, NULL, 'Cash', 125, 'Zahra-Mahdia', '1234', NULL, '', '', '16/43408'),
(111, NULL, 'Rawya ', 'Abdalla', '', '54979140', '08675103', NULL, NULL, NULL, 'Cash', 130, 'Hiboun-Mahdia', '1234', NULL, '', '', '16/56259'),
(112, NULL, 'Faouzi', 'Bouchoucha', '', '55798410', 'F292060', NULL, NULL, NULL, 'Cash', 137, 'Soussa', '1234', NULL, '', '', '15AM55718'),
(113, NULL, 'Ali', 'Ben Belguecem', '', '22163425', 'x348320', NULL, NULL, NULL, 'Cash', 138, 'Boumardess-mahdia', '1234', NULL, '', '', '16/28648'),
(114, NULL, 'Adel ', 'Kraiem', '', '24346627', '09391968', NULL, NULL, NULL, 'Cash', 139, 'Hkaiema_Mahdia', '1234', NULL, '', '', '16AV89021'),
(115, NULL, 'Mehrez', 'Hamza', '', '94522744', '06874133', NULL, NULL, NULL, 'Cash', 140, 'Moknin_Monastir', '1234', NULL, '', '', '121291201328'),
(116, NULL, 'Faouzi', 'Hamza', '', '52888645', 'F359680', NULL, NULL, NULL, 'Cash', 141, 'Hkaiema_Mahdia', '1234', NULL, '', '', '14AZ14178'),
(117, NULL, 'Ridha', 'Chewech', '', '58816984', '04147685', NULL, NULL, NULL, NULL, NULL, 'Kssar Hlel_Monastir', NULL, NULL, '', '', '2034904975'),
(118, NULL, 'Besem', 'Hamza', '', '94355377', '09370987', NULL, NULL, NULL, 'Cash', 143, 'Bredaa_Kssour sef_Mahdia', '1234', NULL, '', '', 'VI5510285S'),
(119, NULL, 'Wisssem', 'Ben Fadhel', '', '98530472', '09405066', NULL, NULL, NULL, 'Cash', 144, 'Kssour Sef_Mahdia', '1234', NULL, '', '', '16/62410'),
(120, NULL, 'Joulian Mahdi', 'Ben njima', '', '23670217', '090334300348', NULL, NULL, NULL, 'Cash', 145, 'Kssour Sef_Mahdia', '1234', NULL, '', '', '11821175'),
(121, NULL, 'Kamel', 'Macherki', '', '25164886', '05034144', NULL, NULL, NULL, 'Cash', 146, 'Kssour Sef_Mahdia', '1234', NULL, '', '', ''),
(122, NULL, 'Rafik', 'Bouguera', '', '46302208', '04130089', NULL, NULL, NULL, 'Cash', 147, '', '1234', NULL, '', '', ''),
(123, NULL, 'Brahim', 'Abid', '', '20035078', '06842965', NULL, NULL, NULL, 'Cash', 148, 'Sidi Bannour_Moknin', '1234', NULL, '', '', 'SR5256561F'),
(124, NULL, 'Semi ', 'Ajmi', '', '', '09393414', NULL, NULL, NULL, 'Cash', 151, 'Kssour Sef_Mahdia', '1234', NULL, '66309397_430273420910343_423298928583114752_n.jpg', '66465980_2331962880251417_6361285841746132992_n.jpg', '100492300367'),
(125, NULL, 'Marwen', 'Dhaw', '', '55418464', 'f093186', NULL, NULL, NULL, 'Cash', 150, '', '1234', NULL, '', '', ''),
(126, NULL, 'Fethi ', 'Kraiem', '', '29101301', '03960407', NULL, NULL, NULL, 'Cash', 154, 'Hkaima-mahdia', '1234', NULL, '', '', 'U12G43392H'),
(127, NULL, 'Hedi', 'Mnasser', '', '98723586', '03912657', NULL, NULL, NULL, 'Cheque', 155, 'Mahdia', '1234', NULL, '', '', '16/6491'),
(128, NULL, 'Abou Lkassem', 'Mskini', '', '25678756', '08286481', NULL, NULL, NULL, 'Cash', 157, 'Saad Mahdia', '1234', NULL, '', '', 'LO5064798E'),
(129, NULL, 'Abed laali ', 'Brahim', '', '95922675', '08278569', NULL, NULL, NULL, 'Cash', 158, '', '1234', NULL, '', '', '14AX98163'),
(130, NULL, 'Mahmoud', 'Fourti', '', '24588966', 'E3027920', NULL, NULL, NULL, 'Cash', 159, 'Hiboun Mahdia', '1234', NULL, '', '', '006362279008'),
(131, NULL, 'Mourad', 'Rezgui', '', '97955942', '08294686', NULL, NULL, NULL, 'Cash', 160, 'Ouled Chemekh Mahdia', '1234', NULL, '', '', '05/48174'),
(132, NULL, 'Souhail', 'Ben Nasr', '', '21380840', '093858833', NULL, NULL, NULL, 'Cash', 161, 'Hkaima Mahdia', '1234', NULL, '', '', '16/57636'),
(133, NULL, 'Mouhib', 'Hssouna', '', '90215076', '09419940', NULL, NULL, NULL, 'Cheque', 162, '', '1234', NULL, '', '', '16/723589'),
(134, NULL, 'Banour', 'Haj massoud', '', '27781537', '11834205', NULL, NULL, NULL, 'Cash', 163, '', '1234', NULL, '', '', '16/93962'),
(135, NULL, 'Eskander ', 'hzemi', '', '21561275', '11813401', NULL, NULL, NULL, 'Cash', 164, '', '1234', NULL, '', '', '15AW24504'),
(136, NULL, 'Ali ', 'Dhaw', '', '', '06796889', NULL, NULL, NULL, 'Cash', 165, '', '1234', NULL, '', '', '22166755'),
(137, NULL, 'Hejer', 'Mefteh', '', '20878100', 'y028465', NULL, NULL, NULL, 'Cash', 167, 'moknin_monastir', '1234', NULL, 'Sans_titre.png', 'p.png', '4862443702'),
(138, 73, 'Najib', 'Chewech Ibrahim', '', '27702883', '11800972', NULL, '2020-06-12 11:00:00', '2020-06-17 00:00:00', 'Cash', 168, 'Sidi-Alwen Mahdia', '1234', NULL, '', '', '16/93065');

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_id`, `vehicle_id`) VALUES
(45, 42, 56),
(46, 42, 56),
(47, 17, 61),
(48, 62, 68),
(49, 63, 60),
(50, 59, 64),
(51, 64, 63),
(52, 65, 69),
(53, 66, 70),
(54, 67, 72),
(55, 68, 73),
(56, 68, 73),
(57, 69, 67),
(58, 70, 62),
(59, 71, 54),
(60, 72, 75),
(61, 36, 65),
(62, 73, 71),
(63, 0, 71),
(64, 50, 76),
(65, 0, 73),
(66, 55, 61),
(67, 74, 73),
(68, 17, 61),
(69, 76, 65),
(70, 75, 71),
(71, 68, 74),
(72, 66, 70),
(73, 77, 76),
(74, 78, 74),
(75, 79, 69),
(76, 80, 74),
(77, 81, 75),
(78, 82, 73),
(79, 83, 61),
(80, 84, 74),
(81, 85, 63),
(82, 70, 62),
(83, 62, 68),
(84, 81, 69),
(85, 86, 71),
(86, 87, 63),
(87, 81, 69),
(88, 88, 61),
(89, 89, 64),
(90, 63, 60),
(91, 90, 67),
(92, 91, 67),
(93, 72, 74),
(94, 93, 62),
(95, 93, 64),
(96, 81, 73),
(97, 72, 75),
(98, 94, 71),
(99, 95, 61),
(100, 96, 74),
(101, 72, 75),
(102, 97, 67),
(103, 79, 72),
(104, 98, 54),
(105, 99, 64),
(106, 72, 75),
(107, 100, 70),
(108, 97, 67),
(109, 101, 68),
(110, 102, 69),
(111, 103, 61),
(112, 104, 63),
(113, 104, 63),
(114, 105, 64),
(115, 72, 75),
(116, 105, 64),
(117, 105, 64),
(118, 105, 64),
(119, 106, 67),
(120, 102, 69),
(121, 72, 75),
(122, 107, 63),
(123, 108, 65),
(124, 109, 68),
(125, 110, 61),
(126, 111, 63),
(127, 111, 63),
(128, 111, 63),
(129, 111, 63),
(130, 111, 63),
(131, 17, 54),
(132, 43, 54),
(133, 36, 54),
(134, 39, 54),
(135, 17, 60),
(136, 36, 54),
(137, 112, 61),
(138, 113, 77),
(139, 114, 62),
(140, 115, 64),
(141, 116, 69),
(142, 96, 74),
(143, 118, 64),
(144, 119, 61),
(145, 120, 60),
(146, 121, 71),
(147, 122, 67),
(148, 123, 75),
(149, 124, 81),
(150, 125, 70),
(151, 124, 81),
(152, 79, 73),
(153, 96, 74),
(154, 126, 75),
(155, 127, 72),
(156, 96, 74),
(157, 128, 67),
(158, 129, 72),
(159, 130, 62),
(160, 131, 63),
(161, 132, 60),
(162, 133, 63),
(163, 134, 77),
(164, 135, 71),
(165, 136, 60),
(166, 93, 67),
(167, 137, 72),
(168, 138, 73);

-- --------------------------------------------------------

--
-- Structure de la table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer_name`, `manufacturer_logo`) VALUES
(66, 'HYUNDAI', ''),
(67, 'PEUGEOT', ''),
(68, 'RENAULT', ''),
(69, 'VOLKSWAGEN', ''),
(70, 'FORD', ''),
(71, 'SUZUKI', ''),
(72, 'Chevrolet', '');

-- --------------------------------------------------------

--
-- Structure de la table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `models`
--

INSERT INTO `models` (`id`, `manufacturer_id`, `model_name`, `model_description`) VALUES
(59, 66, 'Hyundai i10 ', '204 TN 1260'),
(60, 66, 'Hyundai i10 ', '204 TN 1265'),
(61, 66, 'Hyundai i20 ', '207 TN 5628'),
(62, 66, 'Hyundai Sedan', '204 TN 3613'),
(63, 66, 'Hyundai Sedan', '204 TN 3612'),
(64, 66, 'Hyunda Sedan', '204 TN 3614'),
(65, 66, 'Hyundai i10 ', '204 TN 6906'),
(66, 67, 'Peugeot 301 ', '205 TN 1572'),
(67, 67, 'Peugeot 301 ', '205 TN 8445'),
(68, 68, 'Symbol ', '204 TN 2636'),
(69, 69, 'Polo8 ', '206 TN 4586'),
(70, 69, 'Skoda Fabia ', '208 TN 3570'),
(71, 69, 'Siat Ibiza ', '204 TN 1311'),
(72, 70, 'Fored fiesta ', '204 TN 1315'),
(73, 66, 'Suzuki ', '204 TN 1321'),
(74, 66, 'Huyndai Sedan', '204 TN 4922'),
(75, 67, 'Peugeot 301 ', '209 TN 6575'),
(76, 67, 'Peugeot 301 ', '209 TN  6576'),
(77, 72, 'Chevrolet cruze', '209 TN 5360'),
(78, 69, 'Golf7', '210 TN 7250'),
(79, 69, 'Skoda Fabia', '211 TN 1726');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `su` int(11) DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `position` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `su`, `type`, `position`, `email`, `password`, `first_name`, `last_name`, `gender`, `birthday`, `mobile`, `address`) VALUES
(6, 1, 'admin', 'Super Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Mahdia', 'Rent a car', 'male', '2016-12-27', '15245645646', 'Mahdia rent a car'),
(7, 1, 'employee', 'Employee Super', 'employee@employee.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'EMPLOYEE', 'EDISON', 'male', '2015-11-30', '2323', 'qwsdasd');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `buying_price` double NOT NULL,
  `selling_price` double DEFAULT NULL,
  `mileage` int(11) NOT NULL,
  `mileage_counter` int(10) NOT NULL DEFAULT '0',
  `color` varchar(15) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sold_date` datetime DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'available',
  `registration_year` int(4) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `insurance_date` date DEFAULT NULL,
  `insurer` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gear` varchar(15) NOT NULL,
  `doors` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `tank` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `front_frame_image` varchar(255) DEFAULT NULL,
  `back_frame_image` varchar(255) DEFAULT NULL,
  `engine_no` varchar(50) DEFAULT NULL,
  `chesis_no` varchar(50) DEFAULT NULL,
  `featured` int(11) DEFAULT '0',
  `last_control_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `manufacturer_id`, `model_id`, `category`, `buying_price`, `selling_price`, `mileage`, `mileage_counter`, `color`, `add_date`, `sold_date`, `status`, `registration_year`, `insurance_id`, `insurance_date`, `insurer`, `user_id`, `gear`, `doors`, `seats`, `tank`, `image`, `front_frame_image`, `back_frame_image`, `engine_no`, `chesis_no`, `featured`, `last_control_at`) VALUES
(2, 16, 9, 'Subcompact', 12000100, 150, 55, 0, 'red', '2016-12-27 11:00:00', '2018-05-06 00:00:00', 'sold', 2010, 2147483647, NULL, NULL, 1, 'auto', 6, 2147483647, 25, '77303.jpg', NULL, NULL, '2147483647', '21231231', 1, NULL),
(5, 18, 9, 'Subcompact', 10000200, NULL, 25, 0, 'black', '2016-12-27 11:00:00', NULL, 'available', 2010, 4545656, NULL, NULL, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', NULL, NULL, '2147483647', '21231231', 1, NULL),
(7, 19, 10, 'Subcompact', 11000100, NULL, 25, 0, 'black', '2016-12-27 11:00:00', NULL, 'available', 2010, 4545656, NULL, NULL, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', NULL, NULL, '2147483647', '21231231', NULL, NULL),
(8, 20, 9, 'Compact', 10000100, 30, 556, 0, 'Yellow', '2016-12-28 11:00:00', '0000-00-00 00:00:00', 'sold', 2012, 2147483647, NULL, NULL, 1, 'auto', 4, 4, 25, 'yellow-lamborghini-gallardo-Wallpaper.jpg', NULL, NULL, '2147483647', '2147483647', NULL, NULL),
(12, 16, 9, 'Subcompact', 2000000, 40, 3, 0, 'Black', '2016-12-28 11:00:00', '2018-05-06 00:00:00', 'sold', 2001, 121212, NULL, NULL, 1, 'auto', 2, 3, 34, '7538.jpg', NULL, NULL, '23232', '232323', 1, NULL),
(13, 26, 14, 'Citadine', 36000, NULL, 100000, 0, 'Blanc', '2018-05-12 22:00:00', NULL, 'available', 2011, 0, NULL, NULL, 6, 'auto', 4, 5, 35, 'fiat500.jpg', NULL, NULL, '1265', '0', 1, NULL),
(14, 27, 15, 'Citadine', 45000, NULL, 100, 0, 'Bleu foncé', '2018-05-12 22:00:00', NULL, 'available', 2017, 0, NULL, NULL, 6, 'auto', 4, 5, 40, 'siat-ibeza.jpg', NULL, NULL, '1311', '0', 1, NULL),
(16, 28, 16, 'Berline', 36000, NULL, 1000, 0, 'Blanc', '2018-05-12 22:00:00', NULL, 'available', 2018, 0, NULL, NULL, 6, 'auto', 4, 5, 40, 'hyundaii101.jpg', NULL, NULL, '1260', '0', 1, NULL),
(20, 31, 18, 'Familiale', 60, NULL, 5000, 0, 'beige', '2018-05-13 22:00:00', NULL, 'available', 45824, 2, NULL, NULL, 6, 'manual', 4, 5, 2, '', NULL, NULL, '204', '2054158', 0, NULL),
(21, 32, 21, 'Economique', 0, 50, 205000, 0, 'ffff', '2018-05-21 22:00:00', '2018-10-17 00:00:00', 'sold', 4, 0, '2018-06-12', NULL, 6, 'auto', 0, -2, 8, '46032_(1).png', NULL, NULL, '0', '10', 0, '2018-06-12'),
(23, 32, 21, 'Citadine', 0, NULL, 125600, 5600, 'rouge', '2018-06-05 22:00:00', NULL, 'available', 2017, 0, '2018-05-08', 'qsqsqsq', 6, 'auto', 0, 5, 45, '17HyuI10Se5drGryFL1_800.jpg', NULL, NULL, '21zsd4z5s', '5qs54q54s5q5s4q', 1, NULL),
(24, 35, 23, 'Familiale', 0, 50, 12500, 0, 'bleu', '2018-06-06 22:00:00', '2018-06-07 00:00:00', 'sold', 5, 0, '2018-06-07', 'uuuuu', 6, 'manual', 0, 4, 100, '0293813400.jpg', NULL, NULL, '1222222', '5555', 1, NULL),
(25, 36, 24, 'Economique', 0, 50, 9999, 0, 'BLUE', '2018-06-06 22:00:00', '2018-06-07 00:00:00', 'sold', 2014, 0, '2018-06-07', 'makram', 6, 'manual', 0, 5, 100, '3072x1728-00122206.jpg.ximg_.l_12_m_.smart_.jpg', NULL, NULL, '204 TN 9602', 'MALA851CAJM774560', 1, NULL),
(26, 38, 25, 'Familiale', 0, 50, 2000, 0, 'BLUE', '2018-06-06 22:00:00', '2018-10-16 00:00:00', 'sold', -2, 0, '2019-04-11', 'makram', 6, 'manual', 0, 5, -1, '', NULL, NULL, '204 tn 2636', 'VF1ASRLP4JT178518', 0, NULL),
(27, 37, 25, 'Berline', 0, NULL, 125000, 0, 'bleu', '2018-10-15 22:00:00', NULL, 'available', 2016, 0, '2018-03-07', 'uuuuu', 6, 'auto', 0, 5, 10000, 'téléchargement.jpg', NULL, NULL, '1222222', '5555', 1, '2018-10-16'),
(28, 40, 27, 'Familiale', 0, NULL, 12000, 0, 'BLUE', '2018-10-15 22:00:00', NULL, 'available', 2016, 0, '2018-10-01', 'makram', 6, 'manual', 0, 5, 1205, '41992029_333588957213560_3992637435568717824_n.jpg', NULL, NULL, '204 TN 9602', 'MALA851CAJM774560', 1, '2018-10-16'),
(29, 42, 30, 'Luxe', 0, 50, 12000, 0, 'BLUE', '2018-10-16 22:00:00', '2018-10-17 00:00:00', 'sold', 2017, 0, '2018-06-12', 'makram', 6, 'auto', 0, 6, 2525, '42045026_2213167298929024_5873060334931017728_n.jpg', NULL, NULL, '204 TN 9602', 'MALA851CAJM774560', 1, '2018-10-17'),
(30, 32, 19, 'Berline', 0, NULL, 10001, 0, 'BLUE', '2018-10-16 22:00:00', NULL, 'available', 17102017, 0, '2018-10-17', 'makram', 6, 'auto', 0, 5, 1022, '41731259_2133814496858244_3454580150522347520_n.jpg', NULL, NULL, '204 TN 9602', 'MALA851CAJM774560', 0, '2018-10-17'),
(31, 33, 32, 'Economique', 0, NULL, 20000, 0, 'BLUE', '2018-10-16 22:00:00', NULL, 'available', 12122017, 0, '2018-06-12', 'makram', 6, 'manual', 0, 5, 122, '', NULL, NULL, '204 TN 9602', 'MALA851CAJM774560', 0, '2018-10-17'),
(32, 32, 34, 'Familiale', 0, 60, 20000, 0, 'NOIR', '2018-10-16 22:00:00', '2018-10-18 00:00:00', 'sold', 16042018, 0, '2019-04-04', 'makram', 6, 'manual', 0, 5, 6, '41952291_264487837598967_812381510576373760_n.jpg', NULL, NULL, '204TN3612', 'VF1ASRLP4JT178518', 0, '2018-10-17'),
(33, 46, 35, 'Familiale', 0, 60, 10000, 0, 'vert', '2018-10-16 22:00:00', '2018-10-17 00:00:00', 'sold', 6082018, 0, '2019-04-04', 'makram', 6, 'manual', 0, 5, 12562, 'Volkswagen_Polo_2017_8156b-520-360.jpg', NULL, NULL, '206TN4586', 'WVWZZZAWZJY217180', 0, '2018-10-17'),
(36, 53, 39, 'Familiale', 0, 60, 37228, 37191, 'Rouge', '2018-12-09 23:00:00', '2018-12-20 00:00:00', 'sold', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, 'hyundai-i10-facelift-cover-mobile2.jpg', NULL, NULL, '204TN3612', 'VF14SRLP4JT178518', 1, '2018-12-10'),
(37, 53, 44, 'Familiale', 0, NULL, 37782, 0, 'bleu', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, 'hyundai-i10-hyundai-i10-1-1i-lounge-bleu_6380269725.jpg', NULL, NULL, '204TN3613', 'VF14SRLP4JT178518', 1, '2018-12-10'),
(38, 53, 39, 'Familiale', 0, NULL, 34460, 52168, 'Gris', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '2018-12-10', 'MAKREM', 0, 'manual', 0, 5, 60, '48062819_778569815826002_7723018906708738048_n.jpg', NULL, NULL, '204TN1265', 'VF14SRLP4JT178518', 1, '2018-12-10'),
(39, 54, 38, 'Familiale', 0, NULL, 18855, 0, 'Gris', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, 'Photo.jpg', NULL, NULL, '205TN8445', 'VF14SRLP4JT178518', 1, '2018-12-10'),
(40, 56, 49, 'Familiale', 0, NULL, 38320, 0, 'bleu', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, '29926.jpg', NULL, NULL, '204TN2636', 'VF14SRLP4JT178518', 0, '2018-12-10'),
(41, 53, 39, 'Familiale', 0, NULL, 38180, 0, 'Rouge', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, 'hyundai-i10-facelift-cover-mobile3.jpg', NULL, NULL, '204TN1260', 'VF14SRLP4JT178518', 0, '2018-04-02'),
(42, 54, 42, 'Familiale', 0, NULL, 23480, 0, 'bleu', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '2017-12-15', 'MAKREM', 0, 'manual', 0, 5, 60, '47573809_2243089292681067_1446334836837974016_n.jpg', NULL, NULL, '205TN1572', 'VF14SRLP4JT178518', 0, '2018-06-27'),
(43, 55, 47, 'Familiale', 0, NULL, 17000, 0, 'Vert', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, '41992029_333588957213560_3992637435568717824_n1.jpg', NULL, NULL, '206TN4586', 'VF14SRLP4JT178518', 0, '2019-08-06'),
(44, 55, 50, 'Familiale', 0, NULL, 20000, 0, 'bleu', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, '47484862_284903488831093_6718720914269143040_n.jpg', NULL, NULL, '204TN1311', 'VF14SRLP4JT178518', 0, '2018-04-02'),
(45, 55, 51, 'Familiale', 0, NULL, 813, 543, 'bleu', '2018-12-09 23:00:00', NULL, 'available', 0, 0, '0000-00-00', 'MAKREM', 0, 'manual', 0, 5, 60, '47679750_2228562704130811_3520500317898670080_n.jpg', NULL, NULL, '208TN3570', '', 0, '2019-10-15'),
(46, 53, 39, 'Familiale', 0, 60, 29301, 1301, 'Blanc', '2018-12-09 23:00:00', '2018-12-25 00:00:00', 'sold', 0, 0, '0000-00-00', 'MAKREM', 0, 'auto', 0, 5, 60, 'location-voiture-guadeloupe_a1_JGP.jpg', NULL, NULL, '204TN6906', 'VF14SRLP4JT178518', 0, '2019-05-03'),
(47, 59, 53, 'Familiale', 0, 50, 45000, 0, 'Gris', '2018-12-17 23:00:00', '2018-12-17 00:00:00', 'sold', 0, 0, '2018-12-18', 'MAKREM', 0, 'manual', 0, 5, 60, '36479.jpg', NULL, NULL, '204TN1321', '', 0, '2018-12-18'),
(48, 54, 54, 'Familiale', 0, NULL, 40000, 0, 'bleu', '2019-01-30 23:00:00', NULL, 'available', 0, 0, '2019-04-04', 'Makram', 0, 'manual', 0, 5, 100, 'dacia-logan-cover-mobile.jpg', NULL, NULL, '204 tn 2636 ', '', 1, '2019-04-11'),
(49, 60, 56, 'Familiale', 0, NULL, 40000, 0, 'bleu', '2019-01-30 23:00:00', NULL, 'available', 0, 0, '2019-04-04', 'Makram', 0, 'manual', 0, 5, 1000, 'images.jpg', NULL, NULL, '204 tn 3613', '', 0, '2019-04-16'),
(54, 66, 59, 'Familiale', 0, NULL, 64146, 0, 'Rouge', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 54, 'manual', 0, 5, 10, 'hyundai-i10-facelift-cover-mobile5.jpg', NULL, NULL, '204 TN 1260', '492439N/1551178Z', 0, '2019-10-03'),
(60, 66, 59, 'Berline', 0, NULL, 92400, 0, 'Gris', '2019-02-11 23:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, '1385045203-i10galeri7.jpg', NULL, NULL, '204 TN 1265', '492439N/1551178Z', 0, '2020-06-11'),
(61, 66, 59, 'Familiale', 0, NULL, 88606, 9106, 'Blanc', '2019-02-11 23:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, 'S7-Essai-Hyundai-i10-1-0-pile-dans-le-mille-95101.jpg', NULL, NULL, '204 TN 6906', '492439N/1551178Z', 0, '2019-10-29'),
(62, 69, 71, 'Familiale', 0, NULL, 65000, 0, 'Bleu', '2019-02-11 23:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'auto', 0, 5, 10, '2017-seat-ibiza-16.jpg', NULL, NULL, '204 TN 1311', '587756X/1551178Z', 0, '2019-10-02'),
(63, 66, 61, 'Familiale', 0, NULL, 57572, 7672, 'NOIR', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 63, 'manual', 0, 5, 10, 'P1100830.jpg', NULL, NULL, '207 TN 5628', '766895F/1551178Z', 0, '2019-10-16'),
(64, 69, 70, 'Familiale', 0, NULL, 59260, 8560, 'Bleu', '2019-02-11 23:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, 'Skoda-Fabia-2016-Neuve-Maroc-17.jpg', NULL, NULL, '208 TN 3570', '492439N/1551178Z', 0, '2020-05-18'),
(65, 69, 69, 'Familiale', 0, NULL, 51565, 0, 'vert', '2019-02-11 23:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, '41992029_333588957213560_3992637435568717824_n2.jpg', NULL, NULL, '206TN4586', '0031041F/1551178Z', 0, '2020-02-08'),
(67, 67, 67, 'Familiale', 0, NULL, 88700, 8260, 'Maron', '2019-02-13 23:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, 'peugeot-301.jpg', NULL, NULL, '205 TN 8445', '492439N/1551178Z', 0, '2019-12-24'),
(68, 70, 72, 'Familiale', 0, NULL, 92607, 0, 'Maron', '2019-04-15 22:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, 'FordFiesta10EcoBoost0717(2).jpg', NULL, NULL, '204 TN 1315', 'WF0DXXGAKDHMO1680', 1, '2019-10-03'),
(69, 66, 62, 'Familiale', 0, NULL, 48597, 0, 'Gris', '2019-04-15 22:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, '20592.jpg', '52308650_350902862175932_720365328067985408_n.jpg', '52528725_1892537707538770_8344770458515668992_n.jpg', '209 TN 4922', 'MALA841CAK347251', 1, '2020-02-21'),
(70, 67, 66, 'Familiale', 0, NULL, 21787, 2887, 'Gris', '2019-04-15 22:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'auto', 0, 5, 10, 'Peugeot_301_1.6_HDi_Allure_2014_(19149680399)_.jpg', NULL, NULL, '209 TN 6576', 'VF3DDHMW0JJ845356', 1, '2020-02-29'),
(71, 67, 66, 'Familiale', 0, NULL, 40000, 0, 'Bleu', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 71, 'manual', 0, 5, 10, 'peugeot-301-16-allure-el-mejor-precio-vp-D_NQ_NP_627375-MLA26967309639_032018-F.jpg', NULL, NULL, '209 TN 6575', 'VF3DDHMW0JJ846508', 1, '2020-03-02'),
(72, 67, 66, 'Berline', 0, NULL, 90000, 0, 'Bleu', '2019-04-15 22:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, '47573809_2243089292681067_1446334836837974016_n2.jpg', NULL, NULL, '205 TN 1572', 'VF3DDHMW0JJ645883', 1, '2020-06-16'),
(73, 66, 59, 'Familiale', 0, 60, 98450, 0, 'Rouge', '0000-00-00 00:00:00', '2020-06-12 11:00:00', 'sold', 0, 0, '0000-00-00', 'makram', 73, 'auto', 0, 5, 10, '2560_3000.jpg', NULL, NULL, '204 TN 3612', 'MALA841CAJM297127', 1, '2020-06-11'),
(74, 66, 59, 'Familiale', 0, NULL, 115621, 18721, 'Bleu', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 74, 'manual', 0, 5, 10, '336033,xcitefun-hyundai-i10-sedan-2.jpg', NULL, NULL, '204 TN 3613', 'MALA841CAJM297110', 1, '2019-10-16'),
(75, 68, 68, 'Familiale', 0, NULL, 111000, 0, 'Bleu', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 75, 'manual', 0, 5, 10, 'renault-symbol-2016-front-2.JPG', NULL, NULL, '204 TN 2636', 'VF14SRLP4JT178518', 1, '2019-10-18'),
(77, 66, 59, 'Familiale', 0, NULL, 43670, 2453, 'Bleu', '2019-04-28 22:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, 'Hyundaigrand_i103.jpg', NULL, NULL, '210 TN 4451', 'MALA851CAKM913885', 1, '2020-05-18'),
(78, 69, 78, 'Familiale', 0, NULL, 200, 0, 'Blanc', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 78, 'auto', 0, 5, 10, '60350429_2345542492401840_7219124354175467520_o.jpg', NULL, NULL, '210 TN 7250', '587756X/1551178Z', 1, '2019-11-14'),
(80, 71, 73, 'Familiale', 0, NULL, 54800, 0, 'Gris', '2019-06-07 22:00:00', NULL, 'available', 0, 0, '2020-04-04', 'makram', 0, 'manual', 0, 5, 10, '22310069761_621bab1791_k.jpg', NULL, NULL, '204 TN 1321', '', 1, '2019-12-05'),
(81, 69, 70, 'Familiale', 0, NULL, 34600, 3800, 'Gris', '0000-00-00 00:00:00', NULL, 'available', 0, 0, '0000-00-00', 'makram', 81, 'manual', 0, 5, 9, '64458555_2368374740118615_3485387435540480000_n.jpg', NULL, NULL, '211 TN 1726', '', 1, '2019-12-24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_id` (`c_id`),
  ADD UNIQUE KEY `v_id_2` (`vehicle_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD KEY `c_id_2` (`c_id`),
  ADD KEY `cin` (`cin`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cutomer_id` (`customer_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Index pour la table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT pour la table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
