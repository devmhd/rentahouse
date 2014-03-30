-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2014 at 04:29 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentahouse`
--
CREATE DATABASE IF NOT EXISTS `rentahouse` DEFAULT CHARACTER SET utf16 COLLATE utf16_unicode_ci;
USE `rentahouse`;

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `address` text COLLATE utf16_unicode_ci NOT NULL,
  `region` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `neigh` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `n_bed` int(11) NOT NULL,
  `n_bath` int(11) NOT NULL,
  `n_living` int(11) NOT NULL,
  `n_balcony` int(11) NOT NULL,
  `n_dining` int(11) NOT NULL,
  `description` text COLLATE utf16_unicode_ci NOT NULL,
  `sqft` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `availabledate` date NOT NULL,
  `contactno` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photos` text COLLATE utf16_unicode_ci NOT NULL,
  `n_view` int(11) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `real` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `slug`, `owner`, `title`, `address`, `region`, `area`, `neigh`, `lat`, `lng`, `n_bed`, `n_bath`, `n_living`, `n_balcony`, `n_dining`, `description`, `sqft`, `rent`, `availabledate`, `contactno`, `created`, `photos`, `n_view`, `visible`, `real`) VALUES
(1, '19-a-north-madartek-for-rent', 5, '19/A North Madartek', 'Full address sucks', 2, 6, 45, 23.72909766983454, 90.38682818412781, 2, 4, 3, 4, 1, 'wow', 4556, 3453534, '2014-03-19', '0112345677', '2014-03-08 18:01:34', '', 0, 1, b'0'),
(3, 'hola-senior-for-rent', 3, 'Hola Senior', '19/A North Madartek\nBasabor\nDhaka', 2, 6, 42, 23.72257582982215, 90.38893103599548, 1, 2, 3, 1, 2, '', 3444, 44000, '2014-03-21', '0112345677', '2014-03-09 11:31:04', '\n', 0, 1, b'0'),
(4, 'asdf-for-rent', 9, 'ASDF', '123/111 kalimuddi road', 2, 2, 113, 23.826944961312318, 90.39159178733826, 2, 2, 2, 2, 1, 'Nice description', 12345, 234444, '2014-03-19', '0112345677', '2014-03-13 15:50:43', '', 0, 1, b'0'),
(5, 'akkas-alir-basa-for-rent', 9, 'Akkas Alir Basa', 'Emavass', 2, 4, 80, 23.796948643125372, 90.41970133781433, 3, 2, 3, 5, 2, 'Desss', 5100, 12000, '2014-03-18', '0112345677', '2014-03-13 18:06:32', '', 0, 1, b'0'),
(7, '13-a-hhh-for-rent', 3, '13/A hhh', 'jsfdvnfgkjn', 2, 4, 76, 23.8, 90.35, 3, 1, 2, 4, 1, 'kjsdfn', 34535, 12345, '2014-03-11', '0112345677', '2014-03-15 06:30:18', '', 0, 1, b'0'),
(8, '18-a-north-madartek-for-rent', 3, '19/A North Madartek', '13/A Nobaber Gar\nNobabpur\nDhaka\nChittagong, Bangladesh', 2, 7, 93, 23.80933670615133, 90.34127354621887, 2, 3, 4, 5, 2, 'Woo Nice Place this one', 7777, 5656, '2014-04-01', '0112345677', '2014-03-15 18:03:15', '', 0, 1, b'0'),
(10, 'humayun-road-for-rent', 11, 'Humayun Road', '3/11 Humayun Road\nMohammedpur 1213\nDhaka', 2, 8, 107, 23.76939274787799, 90.36652520298958, 3, 2, 1, 3, 1, 'Nice place', 2000, 20000, '2014-04-01', '01918161757', '2014-03-20 12:14:30', '', 0, 1, b'0'),
(12, '13-a-ananda-bazar-for-rent', 3, '13/A Ananda Bazar', '13/A Ananda Bazar (2nd floor)\nSewrapara\nDhaka 1234', 2, 7, 98, 23.79256247532172, 90.37038087844849, 2, 3, 3, 5, 1, '', 1250, 15000, '2014-04-01', '0112345677', '2014-03-21 18:19:06', '[["7024dd1ac68e507bb06df7653481290b.jpg","Bedroom"],["d88ac725a0c95906db31c9c2b1573fb1.jpg","Kitchen"]]', 0, 1, b'0'),
(13, '12-north-basabo-for-rent', 3, '12 North Basabo', '12 North Basabo\nSabujhbag \nDhaka 1223', 2, 5, 69, 23.74590365463322, 90.43605208396912, 3, 1, 1, 2, 1, 'desc', 1400, 20000, '2014-04-01', '0112345677', '2014-03-21 18:36:09', '[["b3e87f8bce03b1315321eb1945bfc3e9.jpg","asdfas"],["d4e89d9d040f6460d77e6a635df83c73.jpg","ghjrtfjngtfhntyj"]]', 0, 1, b'0'),
(14, '12-shahid-sharani-for-rent', 12, '12 Shahid Sharani', '12 Shahid Sharani\nCMH Road, Cantonment,\nDhaka', 2, 2, 114, 23.81605050324914, 90.40002465248108, 3, 2, 1, 3, 1, 'Nice Place', 1300, 30000, '2014-05-01', '0112345677', '2014-03-22 03:01:03', '[["fefb51fc04f85d6920cdcb263ea1f34d.jpg","Lawn"],["9a671f7a5b8e825402ebc15090f7c335.jpg","Bedroom"],["1b6c8c3098be81512e5e7f537679abd4.jpg","Kitchen"]]', 0, 1, b'0'),
(15, '45-lake-road-for-rent', 12, '45 Lake Road', '45 Lake Road,\nBanani\nDhaka 1234', 2, 4, 74, 23.783096565402815, 90.40715396404266, 4, 5, 2, 2, 2, '', 1600, 44000, '2014-05-01', '09876543', '2014-03-22 03:06:47', '[["c952c14af9a2a0048b2b789adf76e632.jpg","Living Room"],["aa21afb504e28351f0bf9c391d65755c.jpg","Exterior"]]', 1, 1, b'0'),
(16, '13-3-gulshan-mosque-for-rent', 4, '13/3 Gulshan Mosque', '13/3 Embassy road\n(Opposite of the mosque)\nGulshan, Dhaka', 2, 4, 80, 23.797196023417268, 90.42319893836975, 3, 2, 3, 2, 1, 'Very close to the embassy. ', 1600, 45000, '2014-04-01', '0112345677', '2014-03-27 15:31:17', '[["19dd23c81f1e898284d2530bbd6a6845.jpg","Living Room"],["6e6c0907775bb4cf9fb34ab71a1d789c.jpg","Spacious Kitchen"]]', 0, 1, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `lat`, `lng`, `region_id`) VALUES
(1, 'Badda', 23.78446655730259, 90.4269683021546, 2),
(2, 'Cantonment', 23.832289226006118, 90.38849469604499, 2),
(3, 'Dhanmondi', 23.75068953964334, 90.37549134674079, 2),
(4, 'Gulshan', 23.794990625999908, 90.41649695816047, 2),
(5, 'Khilgaon', 23.75752420191015, 90.43810483398444, 2),
(6, 'Lalbagh', 23.722011472801427, 90.38643475952155, 2),
(7, 'Mirpur', 23.808576409379715, 90.36068555297858, 2),
(8, 'Mohammadpur', 23.768246828131858, 90.35682317199714, 2),
(9, 'Ramna', 23.736940569226324, 90.39793607177741, 2),
(10, 'Motijheel', 23.736940569227812, 90.4169904846192, 2),
(11, 'Tejgaon', 23.769621459881172, 90.39072629394538, 2),
(12, 'Uttara', 23.87703339137467, 90.39553281250006, 2);

-- --------------------------------------------------------

--
-- Table structure for table `erating`
--

CREATE TABLE IF NOT EXISTS `erating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rater` int(11) NOT NULL,
  `rater_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `rated` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf16_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `erating`
--

INSERT INTO `erating` (`id`, `rater`, `rater_name`, `rated`, `rating`, `review`, `created`) VALUES
(1, 4, 'AAA', 1, 4, 'Nice Electricity', '2014-03-28 09:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `grating`
--

CREATE TABLE IF NOT EXISTS `grating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rater` int(11) NOT NULL,
  `rater_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `rated` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf16_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `neigh`
--

CREATE TABLE IF NOT EXISTS `neigh` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `area_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `neigh`
--

INSERT INTO `neigh` (`id`, `name`, `lat`, `lng`, `area_id`, `region_id`) VALUES
(1, 'North South University', 23.81641125132503, 90.42620105370487, 1, 2),
(2, 'North Badda', 23.783033176052193, 90.42306300582892, 1, 2),
(3, 'Middle Badda', 23.779380927727992, 90.4247152465821, 1, 2),
(4, 'Merul Badda', 23.77706385678881, 90.42302009048468, 1, 2),
(5, 'DIT Project', 23.775271622243793, 90.42739391821895, 1, 2),
(6, 'Shahzadpur', 23.79196700694272, 90.42553063812262, 1, 2),
(7, 'Aftabnagar', 23.770426594596124, 90.42849179687506, 1, 2),
(8, 'Nurerchala', 23.79233474373153, 90.43818114953616, 1, 2),
(9, 'Kuril', 23.8227836232271, 90.42327396166988, 1, 2),
(10, 'Kalabagan', 23.750369979995888, 90.38286924857174, 3, 2),
(11, 'Dhanmondi Lake', 23.74652040512678, 90.37874937552486, 3, 2),
(12, 'Pilkhana', 23.735599563347453, 90.37595987814937, 3, 2),
(13, 'Kathalbagan', 23.747345323607174, 90.3877615978149, 3, 2),
(14, 'Hatirpool', 23.743692073527203, 90.38836241263424, 3, 2),
(15, 'New Market', 23.73438171490524, 90.38325548666988, 3, 2),
(16, 'BGB', 23.73469599946604, 90.37593842047725, 3, 2),
(17, 'Sheikh Kamal Road', 23.751744800587556, 90.37454367178951, 3, 2),
(18, 'Shahajahanpur', 23.74654535993719, 90.42372819366462, 10, 2),
(19, 'Shantibagh', 23.74652571895979, 90.41763421478278, 10, 2),
(20, 'Malibagh', 23.748057706201823, 90.41415807189948, 10, 2),
(21, 'Shahidbagh', 23.74357953899736, 90.41896459045417, 10, 2),
(22, 'Rajarbagh', 23.742204632208292, 90.41523095550544, 10, 2),
(23, 'Shantinagar', 23.739179786191652, 90.41420098724372, 10, 2),
(24, 'Bangabandhu National Stadium', 23.728474409964118, 90.41312810363776, 10, 2),
(25, 'Notre Dame College', 23.730556625421993, 90.42033788146979, 10, 2),
(26, 'Nayapaltan', 23.73548702182699, 90.4137289184571, 10, 2),
(27, 'Purana Paltan', 23.73336559922463, 90.41063901367194, 10, 2),
(28, 'Kamalapur', 23.734681671018667, 90.42565938415534, 10, 2),
(29, 'Sector 1', 23.859647801322655, 90.39999600830085, 12, 2),
(30, 'Sector 3', 23.866398239900892, 90.39712068023688, 12, 2),
(31, 'Sector 4', 23.863415531354924, 90.40424462738044, 12, 2),
(32, 'Sector 5', 23.86573106106144, 90.39042588653571, 12, 2),
(33, 'Sector 6', 23.872284963060153, 90.40411588134772, 12, 2),
(34, 'Sector 7', 23.872363450895108, 90.39694901885993, 12, 2),
(35, 'Sector 8', 23.878328387047265, 90.4042017120362, 12, 2),
(36, 'Sector 9', 23.87828914494357, 90.39712068023688, 12, 2),
(37, 'Sector 10', 23.884999371562753, 90.38948174896247, 12, 2),
(38, 'Sector 11', 23.878367629137312, 90.38982507171637, 12, 2),
(39, 'Sector 12', 23.872402694795184, 90.38046952667243, 12, 2),
(40, 'Sector 13', 23.87236345089464, 90.38789388122565, 12, 2),
(41, 'Sector 14', 23.86867447125747, 90.38725015106208, 12, 2),
(42, 'Bakshi Bazar', 23.720714917946754, 90.39239999237067, 6, 2),
(43, 'Dhakeswari', 23.723298192519024, 90.3901898521424, 6, 2),
(44, 'Dhaka Board', 23.722306142558157, 90.39206739845282, 6, 2),
(45, 'Eden College', 23.72819939788564, 90.3875076431275, 6, 2),
(46, 'Home Economics College', 23.731195033872684, 90.3863167423249, 6, 2),
(47, 'Azimpur Graveyard', 23.72973160063184, 90.38214322509772, 6, 2),
(48, 'Hussaini Dalan', 23.722571344774316, 90.39746400299079, 6, 2),
(49, 'Bangshal', 23.717149325634118, 90.4060041564942, 6, 2),
(51, 'SSMC', 23.710951052990975, 90.4010152477265, 6, 2),
(52, 'Lalbagh Fort', 23.71900580322248, 90.38854834022528, 6, 2),
(53, 'Babu Bazar', 23.714673981079386, 90.39488908233649, 6, 2),
(54, 'Moghbazar', 23.752584819592798, 90.408128466034, 9, 2),
(55, 'Paribagh', 23.745474922423618, 90.39304372253424, 9, 2),
(56, 'Shiddheswari', 23.746044514124737, 90.41010257186896, 9, 2),
(57, 'Madhubagh', 23.760165663457524, 90.41164752426154, 9, 2),
(58, 'Nayatola', 23.757023398328528, 90.40928718032843, 9, 2),
(59, 'Shahbagh', 23.740721680766967, 90.39420243682868, 9, 2),
(60, 'Kakrail', 23.737303953550136, 90.40426608505256, 9, 2),
(61, 'Shegunbagicha', 23.732511127592026, 90.40654059829718, 9, 2),
(62, 'BUET', 23.727069877926002, 90.39212104263312, 9, 2),
(63, 'Dhaka University Campus', 23.732481662954015, 90.39477106513984, 9, 2),
(64, 'Bangla Bazar', 23.723887525564436, 90.40590759696967, 9, 2),
(65, 'Ullan', 23.767422042090143, 90.41894313278205, 5, 2),
(66, 'Rampura', 23.762198275809, 90.42053100051886, 5, 2),
(67, 'Taltola', 23.75430331383102, 90.42192574920661, 5, 2),
(68, 'Tilpapara', 23.748175550638678, 90.42844888153083, 5, 2),
(69, 'Basabo', 23.745386537287793, 90.43655988159186, 5, 2),
(70, 'Goran', 23.75292852025965, 90.43398496093756, 5, 2),
(71, 'Madartek', 23.745347254984722, 90.44029351654059, 5, 2),
(72, 'Nandi Para', 23.75611016330644, 90.44688102188117, 5, 2),
(73, 'Tromohoni', 23.762276830242072, 90.4627167839051, 5, 2),
(74, 'Banani', 23.78440765154377, 90.4080211776734, 4, 2),
(75, 'Mohakhali', 23.778615120718108, 90.40538188400275, 4, 2),
(76, 'Niketon', 23.775002021669135, 90.41169043960578, 4, 2),
(77, 'Karail', 23.786233717927868, 90.41121837081916, 4, 2),
(78, 'Baridhara', 23.8007627942842, 90.42010184707648, 4, 2),
(79, 'Kalachandpur', 23.810735868329594, 90.41658278884894, 4, 2),
(80, 'Embassy', 23.79650240915437, 90.42263385238654, 4, 2),
(81, 'Tejkunipara', 23.7621589985811, 90.39224978866584, 11, 2),
(82, 'Ajantapara', 23.776455127925065, 90.39551135482795, 11, 2),
(83, 'West Nakhalpara', 23.771467371131656, 90.39495345535285, 11, 2),
(84, 'East Nakhalpara', 23.771192449841323, 90.39731379928595, 11, 2),
(85, 'Farngate', 23.757092136199137, 90.38709994735724, 11, 2),
(86, 'Kawran Bazar', 23.752496439285522, 90.39418097915656, 11, 2),
(87, 'Ser-e-bangla Nagar', 23.77319543450944, 90.37731524887091, 11, 2),
(88, 'Jatiyo Sangsad Bhaban', 23.762316107440657, 90.37710067214972, 11, 2),
(89, 'Begun Bari', 23.76451561154839, 90.40370818557746, 11, 2),
(90, 'Kunipara', 23.764319228766574, 90.40729161682135, 11, 2),
(91, 'Raja Bazar', 23.75414619530773, 90.38544770660407, 11, 2),
(92, 'National Zoo', 23.81395535861867, 90.34227487030036, 7, 2),
(93, 'Nobaberbag', 23.808890514746093, 90.34171697082526, 7, 2),
(94, 'Harirampur', 23.793105780839745, 90.34133073272712, 7, 2),
(95, 'Anandanagar', 23.78430947521516, 90.35004254760749, 7, 2),
(96, 'Kallyanpur', 23.783170624269196, 90.35931226196296, 7, 2),
(97, 'Paikpara', 23.785409045972866, 90.36476251068122, 7, 2),
(98, 'Sewrapara', 23.792084811619787, 90.37351724090583, 7, 2),
(99, 'Kazipara', 23.79899583124227, 90.36931153717047, 7, 2),
(100, 'Monipur', 23.80095912203803, 90.36656495513922, 7, 2),
(101, 'Ahmed Nagar', 23.795618901669716, 90.36167260589606, 7, 2),
(102, 'Mirpur - I', 23.79660057629223, 90.35347577514655, 7, 2),
(103, 'Rayerbazar', 23.744483041290675, 90.36175843658454, 8, 2),
(104, 'Shankar', 23.749746799470955, 90.35991307678229, 8, 2),
(105, 'Shyamoli', 23.7712709988459, 90.3640758651734, 8, 2),
(106, 'Adabar', 23.77720131131713, 90.3571235794068, 8, 2),
(107, 'Geneva Camp', 23.769582184907573, 90.36532041015631, 8, 2),
(108, 'Zafrabad', 23.75261427970087, 90.36128636779792, 8, 2),
(109, 'Ramchandrapur', 23.759370284783596, 90.34060117187506, 8, 2),
(110, 'Lalmatia', 23.756385116471638, 90.36918279113776, 8, 2),
(111, 'Balughat', 23.830326408997333, 90.3895246643067, 2, 2),
(112, 'Barontek', 23.83103302654087, 90.38699265899665, 2, 2),
(113, 'Manikdi', 23.82698955192753, 90.39179917755133, 2, 2),
(114, 'CMH', 23.816153989008832, 90.39772149505622, 2, 2),
(115, 'Damalkot', 23.80099838753158, 90.39012547912604, 2, 2),
(116, 'Bhasantek', 23.809047567117673, 90.38703557434089, 2, 2),
(117, 'Baigertek', 23.83707837484111, 90.3836881774903, 2, 2),
(118, 'Airport', 23.843201946837418, 90.4056608337403, 2, 2),
(119, 'Zia colony', 23.819451864800985, 90.40561791839606, 2, 2),
(120, 'Nikunja - I', 23.825419236553877, 90.41883584442145, 2, 2),
(121, 'Nikunja - II', 23.83283880944561, 90.4181062835694, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orating`
--

CREATE TABLE IF NOT EXISTS `orating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rater` int(11) NOT NULL,
  `rater_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `rated` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf16_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orating`
--

INSERT INTO `orating` (`id`, `rater`, `rater_name`, `rated`, `rating`, `review`, `created`) VALUES
(1, 4, '', 16, 4, 'wow', '2014-03-28 05:30:25'),
(2, 3, '', 1, 4, '', '2014-03-28 05:42:45'),
(3, 4, 'AAA', 1, 5, 'Awsome House', '2014-03-28 06:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `lat`, `lng`) VALUES
(2, 'Dhaka', 23.785600102888743, 90.40250293505855),
(3, 'Chittagong', 23, 90),
(4, 'Khulna', 23, 90),
(5, 'Rajshahi', 23, 90),
(6, 'Sylhet', 23, 90),
(7, 'Barisal', 23, 90),
(8, 'Bagerhat', 23, 90),
(9, 'Bandarban', 23, 90),
(10, 'Barguna', 23, 90),
(11, 'Bhola', 23, 90),
(12, 'Brahmanbaria', 23, 90),
(13, 'Bogra', 23, 90),
(14, 'Chandpur', 23, 90),
(15, 'Chuadanga', 23, 90),
(16, 'Comilla', 23, 90),
(17, 'Cox''s Bazar', 23, 90),
(18, 'Dinajpur', 23, 90),
(19, 'Feni', 23, 90),
(20, 'Faridpur', 23, 90),
(21, 'Gaibandha', 23, 90),
(22, 'Gazipur', 23, 90),
(23, 'Gopalganj', 23, 90),
(24, 'Habiganj', 23, 90),
(25, 'Jessore', 23, 90),
(26, 'Jhalakati', 23, 90),
(27, 'Jamalpur', 23, 90),
(28, 'Joypurhat', 23, 90),
(29, 'Jhenaidah', 23, 90),
(30, 'Kurigram', 23, 90),
(31, 'Khagrachari', 23, 90),
(32, 'Kustia', 23, 90),
(33, 'Kishorganj ', 23, 90),
(34, 'Laxmipur', 23, 90),
(35, 'Lalmonirhat', 23, 90),
(36, 'Madaripur', 23, 90),
(37, 'Magura', 23, 90),
(38, 'Meherpur', 23, 90),
(39, 'Moulvibazar', 23, 90),
(40, 'Mymensingh', 23, 90),
(41, 'Manikgonj', 23, 90),
(42, 'Munsiganj', 23, 90),
(43, 'Narail', 23, 90),
(44, 'Narayangonj', 23, 90),
(45, 'Noakhali', 23, 90),
(46, 'Naogaon', 23, 90),
(47, 'Narsingdi', 23, 90),
(48, 'Natore', 23, 90),
(49, 'Nawabgonj', 23, 90),
(50, 'Netrokona', 23, 90),
(51, 'Nilphamari', 23, 90),
(52, 'Pabna', 23, 90),
(53, 'Panchagarh', 23, 90),
(54, 'Patuakhali', 23, 90),
(55, 'Pirojpur', 23, 90),
(56, 'Rajbari', 23, 90),
(57, 'Rangamati', 23, 90),
(58, 'Rangpur', 23, 90),
(59, 'Shariatpur', 23, 90),
(60, 'Satkhira', 23, 90),
(61, 'Sherpur', 23, 90),
(62, 'Sirajganj', 23, 90),
(63, 'Sunamgonj', 23, 90),
(64, 'Tangail', 23, 90),
(65, 'Thakurgaon', 23, 90);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `contact` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `is_mod` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact`, `is_mod`) VALUES
(1, 'asd', 'asd@gmail.com', 'fgh', '456787', 0),
(2, 'qwe', 'qwe', 'rty', '09876', 0),
(3, 'Mehedee', 'devmhd@gmail.com', '123456', '0987675', 1),
(4, 'AAA', 'demo@example.com', '123456', 'BBB', 0),
(5, 'Ashfaq', 'ashfaq.mostahid@yahoo.com', '123456', 'qwqw', 0),
(6, 'aaa', 'asd@gmail.coma', 'aaa456', 'aaa', 0),
(7, 'aaa', 'asd@gmail.comaa', '123456', 'aaa', 0),
(8, 'aaa', 'asd@gmail.comaa', '123456', 'aaa', 0),
(9, 'aaa', 'ashfaq.mostahid@yahoo.coma', 'aaaaaa', 'aaaaaaa', 0),
(10, 'Modon Ali', 'devmhd@gmail.co', 'akkasali', '123456', 0),
(11, 'Akkas Ali', 'akkas@ak.assa', '123456', '1230987', 0),
(12, 'Alam Khan', 'aaa@example.com', '123456', '89764322', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wrating`
--

CREATE TABLE IF NOT EXISTS `wrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rater` int(11) NOT NULL,
  `rater_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `rated` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf16_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wrating`
--

INSERT INTO `wrating` (`id`, `rater`, `rater_name`, `rated`, `rating`, `review`, `created`) VALUES
(1, 3, '', 1, 5, '', '2014-03-28 06:33:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
