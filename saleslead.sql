-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2014 at 11:36 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saleslead`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_grouptypes`
--

CREATE TABLE IF NOT EXISTS `address_grouptypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `grouptype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1637 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `province_id`) VALUES
(1, 'Bangued', 1),
(2, 'Boliney', 1),
(3, 'Bucay', 1),
(4, 'Bucloc', 1),
(5, 'Daguioman', 1),
(6, 'Danglas', 1),
(7, 'Dolores', 1),
(8, 'La Paz', 1),
(9, 'Lacub', 1),
(10, 'Lagangilang', 1),
(11, 'Lagayan', 1),
(12, 'Langiden', 1),
(13, 'Licuan-Baay', 1),
(14, 'Luba', 1),
(15, 'Malibcong', 1),
(16, 'Manabo', 1),
(17, 'Peñarrubia', 1),
(18, 'Pidigan', 1),
(19, 'Pilar', 1),
(20, 'Sallapadan', 1),
(21, 'San Isidro', 1),
(22, 'San Juan', 1),
(23, 'San Quintin', 1),
(24, 'Tayum', 1),
(25, 'Tineg', 1),
(26, 'Tubo', 1),
(27, 'Villaviciosa', 1),
(28, 'Butuan City', 2),
(29, 'Buenavista', 2),
(30, 'Cabadbaran', 2),
(31, 'Carmen', 2),
(32, 'Jabonga', 2),
(33, 'Kitcharao', 2),
(34, 'Las Nieves', 2),
(35, 'Magallanes', 2),
(36, 'Nasipit', 2),
(37, 'Remedios T. Romualdez', 2),
(38, 'Santiago', 2),
(39, 'Tubay', 2),
(40, 'Bayugan', 3),
(41, 'Bunawan', 3),
(42, 'Esperanza', 3),
(43, 'La Paz', 3),
(44, 'Loreto', 3),
(45, 'Prosperidad', 3),
(46, 'Rosario', 3),
(47, 'San Francisco', 3),
(48, 'San Luis', 3),
(49, 'Santa Josefa', 3),
(50, 'Sibagat', 3),
(51, 'Talacogon', 3),
(52, 'Trento', 3),
(53, 'Veruela', 3),
(54, 'Altavas', 4),
(55, 'Balete', 4),
(56, 'Banga', 4),
(57, 'Batan', 4),
(58, 'Buruanga', 4),
(59, 'Ibajay', 4),
(60, 'Kalibo', 4),
(61, 'Lezo', 4),
(62, 'Libacao', 4),
(63, 'Madalag', 4),
(64, 'Makato', 4),
(65, 'Malay', 4),
(66, 'Malinao', 4),
(67, 'Nabas', 4),
(68, 'New Washington', 4),
(69, 'Numancia', 4),
(70, 'Tangalan', 4),
(71, 'Legazpi City', 5),
(72, 'Ligao City', 5),
(73, 'Tabaco City', 5),
(74, 'Bacacay', 5),
(75, 'Camalig', 5),
(76, 'Daraga', 5),
(77, 'Guinobatan', 5),
(78, 'Jovellar', 5),
(79, 'Libon', 5),
(80, 'Malilipot', 5),
(81, 'Malinao', 5),
(82, 'Manito', 5),
(83, 'Oas', 5),
(84, 'Pio Duran', 5),
(85, 'Polangui', 5),
(86, 'Rapu-Rapu', 5),
(87, 'Santo Domingo', 5),
(88, 'Tiwi', 5),
(89, 'Anini-y', 6),
(90, 'Barbaza', 6),
(91, 'Belison', 6),
(92, 'Bugasong', 6),
(93, 'Caluya', 6),
(94, 'Culasi', 6),
(95, 'Hamtic', 6),
(96, 'Laua-an', 6),
(97, 'Libertad', 6),
(98, 'Pandan', 6),
(99, 'Patnongon', 6),
(100, 'San Jose', 6),
(101, 'San Remigio', 6),
(102, 'Sebaste', 6),
(103, 'Sibalom', 6),
(104, 'Tibiao', 6),
(105, 'Tobias Fornier', 6),
(106, 'Valderrama', 6),
(107, 'Calanasan', 7),
(108, 'Conner', 7),
(109, 'Flora', 7),
(110, 'Kabugao', 7),
(111, 'Luna', 7),
(112, 'Pudtol', 7),
(113, 'Santa Marcela', 7),
(114, 'Baler', 8),
(115, 'Casiguran', 8),
(116, 'Dilasag', 8),
(117, 'Dinalungan', 8),
(118, 'Dingalan', 8),
(119, 'Dipaculao', 8),
(120, 'Maria Aurora', 8),
(121, 'San Luis', 8),
(122, 'Isabela City', 9),
(123, 'Akbar', 9),
(124, 'Al-Barka', 9),
(125, 'Hadji Mohammad Ajul', 9),
(126, 'Hadji Muhtamad', 9),
(127, 'Lamitan', 9),
(128, 'Lantawan', 9),
(129, 'Maluso', 9),
(130, 'Sumisip', 9),
(131, 'Tabuan-Lasa', 9),
(132, 'Tipo-Tipo', 9),
(133, 'Tuburan', 9),
(134, 'Ungkaya Pukan', 9),
(135, 'Balanga City', 10),
(136, 'Abucay', 10),
(137, 'Bagac', 10),
(138, 'Dinalupihan', 10),
(139, 'Hermosa', 10),
(140, 'Limay', 10),
(141, 'Mariveles', 10),
(142, 'Morong', 10),
(143, 'Orani', 10),
(144, 'Orion', 10),
(145, 'Pilar', 10),
(146, 'Samal', 10),
(147, 'Basco', 11),
(148, 'Itbayat', 11),
(149, 'Ivana', 11),
(150, 'Mahatao', 11),
(151, 'Sabtang', 11),
(152, 'Uyugan', 11),
(153, 'Batangas City', 12),
(154, 'Lipa City', 12),
(155, 'Tanauan City', 12),
(156, 'Agoncillo', 12),
(157, 'Alitagtag', 12),
(158, 'Balayan', 12),
(159, 'Balete', 12),
(160, 'Bauan', 12),
(161, 'Calaca', 12),
(162, 'Calatagan', 12),
(163, 'Cuenca', 12),
(164, 'Ibaan', 12),
(165, 'Laurel', 12),
(166, 'Lemery', 12),
(167, 'Lian', 12),
(168, 'Lobo', 12),
(169, 'Mabini', 12),
(170, 'Malvar', 12),
(171, 'Mataas na Kahoy', 12),
(172, 'Nasugbu', 12),
(173, 'Padre Garcia', 12),
(174, 'Rosario', 12),
(175, 'San Jose', 12),
(176, 'San Juan', 12),
(177, 'San Luis', 12),
(178, 'San Nicolas', 12),
(179, 'San Pascual', 12),
(180, 'Santa Teresita', 12),
(181, 'Santo Tomas', 12),
(182, 'Taal', 12),
(183, 'Talisay', 12),
(184, 'Taysan', 12),
(185, 'Tingloy', 12),
(186, 'Tuy', 12),
(187, 'Baguio City', 13),
(188, 'Atok', 13),
(189, 'Bakun', 13),
(190, 'Bokod', 13),
(191, 'Buguias', 13),
(192, 'Itogon', 13),
(193, 'Kabayan', 13),
(194, 'Kapangan', 13),
(195, 'Kibungan', 13),
(196, 'La Trinidad', 13),
(197, 'Mankayan', 13),
(198, 'Sablan', 13),
(199, 'Tuba', 13),
(200, 'Tublay', 13),
(201, 'Almeria', 14),
(202, 'Biliran', 14),
(203, 'Cabucgayan', 14),
(204, 'Caibiran', 14),
(205, 'Culaba', 14),
(206, 'Kawayan', 14),
(207, 'Maripipi', 14),
(208, 'Naval', 14),
(209, 'Tagbilaran City', 15),
(210, 'Alburquerque', 15),
(211, 'Alicia', 15),
(212, 'Anda', 15),
(213, 'Antequera', 15),
(214, 'Baclayon', 15),
(215, 'Balilihan', 15),
(216, 'Batuan', 15),
(217, 'Bien Unido', 15),
(218, 'Bilar', 15),
(219, 'Buenavista', 15),
(220, 'Calape', 15),
(221, 'Candijay', 15),
(222, 'Carmen', 15),
(223, 'Catigbian', 15),
(224, 'Clarin', 15),
(225, 'Corella', 15),
(226, 'Cortes', 15),
(227, 'Dagohoy', 15),
(228, 'Danao', 15),
(229, 'Dauis', 15),
(230, 'Dimiao', 15),
(231, 'Duero', 15),
(232, 'Garcia Hernandez', 15),
(233, 'Getafe', 15),
(234, 'Guindulman', 15),
(235, 'Inabanga', 15),
(236, 'Jagna', 15),
(237, 'Lila', 15),
(238, 'Loay', 15),
(239, 'Loboc', 15),
(240, 'Loon', 15),
(241, 'Mabini', 15),
(242, 'Maribojoc', 15),
(243, 'Panglao', 15),
(244, 'Pilar', 15),
(245, 'President Carlos P. Garcia', 15),
(246, 'Sagbayan', 15),
(247, 'San Isidro', 15),
(248, 'San Miguel', 15),
(249, 'Sevilla', 15),
(250, 'Sierra Bullones', 15),
(251, 'Sikatuna', 15),
(252, 'Talibon', 15),
(253, 'Trinidad', 15),
(254, 'Tubigon', 15),
(255, 'Ubay', 15),
(256, 'Valencia', 15),
(257, 'Malaybalay City', 16),
(258, 'Valencia City', 16),
(259, 'Baungon', 16),
(260, 'Cabanglasan', 16),
(261, 'Damulog', 16),
(262, 'Dangcagan', 16),
(263, 'Don Carlos', 16),
(264, 'Impasug-ong', 16),
(265, 'Kadingilan', 16),
(266, 'Kalilangan', 16),
(267, 'Kibawe', 16),
(268, 'Kitaotao', 16),
(269, 'Lantapan', 16),
(270, 'Libona', 16),
(271, 'Malitbog', 16),
(272, 'Manolo Fortich', 16),
(273, 'Maramag', 16),
(274, 'Pangantucan', 16),
(275, 'Quezon', 16),
(276, 'San Fernando', 16),
(277, 'Sumilao', 16),
(278, 'Talakag', 16),
(279, 'Malolos City', 17),
(280, 'Meycauayan City', 17),
(281, 'San Jose del Monte City', 17),
(282, 'Angat', 17),
(283, 'Balagtas', 17),
(284, 'Baliuag', 17),
(285, 'Bocaue', 17),
(286, 'Bulacan', 17),
(287, 'Bustos', 17),
(288, 'Calumpit', 17),
(289, 'Doña Remedios Trinidad', 17),
(290, 'Guiguinto', 17),
(291, 'Hagonoy', 17),
(292, 'Marilao', 17),
(293, 'Norzagaray', 17),
(294, 'Obando', 17),
(295, 'Pandi', 17),
(296, 'Paombong', 17),
(297, 'Plaridel', 17),
(298, 'Pulilan', 17),
(299, 'San Ildefonso', 17),
(300, 'San Miguel', 17),
(301, 'San Rafael', 17),
(302, 'Santa Maria', 17),
(303, 'Tuguegarao City', 18),
(304, 'Abulug', 18),
(305, 'Alcala', 18),
(306, 'Allacapan', 18),
(307, 'Amulung', 18),
(308, 'Aparri', 18),
(309, 'Baggao', 18),
(310, 'Ballesteros', 18),
(311, 'Buguey', 18),
(312, 'Calayan', 18),
(313, 'Camalaniugan', 18),
(314, 'Claveria', 18),
(315, 'Enrile', 18),
(316, 'Gattaran', 18),
(317, 'Gonzaga', 18),
(318, 'Iguig', 18),
(319, 'Lal-lo', 18),
(320, 'Lasam', 18),
(321, 'Pamplona', 18),
(322, 'Peñablanca', 18),
(323, 'Piat', 18),
(324, 'Rizal', 18),
(325, 'Sanchez-Mira', 18),
(326, 'Santa Ana', 18),
(327, 'Santa Praxedes', 18),
(328, 'Santa Teresita', 18),
(329, 'Santo Niño', 18),
(330, 'Solana', 18),
(331, 'Tuao', 18),
(332, 'Basud', 19),
(333, 'Capalonga', 19),
(334, 'Daet', 19),
(335, 'Jose Panganiban', 19),
(336, 'Labo', 19),
(337, 'Mercedes', 19),
(338, 'Paracale', 19),
(339, 'San Lorenzo Ruiz', 19),
(340, 'San Vicente', 19),
(341, 'Santa Elena', 19),
(342, 'Talisay', 19),
(343, 'Vinzons', 19),
(344, 'Iriga City', 20),
(345, 'Naga City', 20),
(346, 'Baao', 20),
(347, 'Balatan', 20),
(348, 'Bato', 20),
(349, 'Bombon', 20),
(350, 'Buhi', 20),
(351, 'Bula', 20),
(352, 'Cabusao', 20),
(353, 'Calabanga', 20),
(354, 'Camaligan', 20),
(355, 'Canaman', 20),
(356, 'Caramoan', 20),
(357, 'Del Gallego', 20),
(358, 'Gainza', 20),
(359, 'Garchitorena', 20),
(360, 'Goa', 20),
(361, 'Lagonoy', 20),
(362, 'Libmanan', 20),
(363, 'Lupi', 20),
(364, 'Magarao', 20),
(365, 'Milaor', 20),
(366, 'Minalabac', 20),
(367, 'Nabua', 20),
(368, 'Ocampo', 20),
(369, 'Pamplona', 20),
(370, 'Pasacao', 20),
(371, 'Pili', 20),
(372, 'Presentacion', 20),
(373, 'Ragay', 20),
(374, 'Sagñay', 20),
(375, 'San Fernando', 20),
(376, 'San Jose', 20),
(377, 'Sipocot', 20),
(378, 'Siruma', 20),
(379, 'Tigaon', 20),
(380, 'Tinambac', 20),
(381, 'Catarman', 21),
(382, 'Guinsiliban', 21),
(383, 'Mahinog', 21),
(384, 'Mambajao', 21),
(385, 'Sagay', 21),
(386, 'Roxas City', 22),
(387, 'Cuartero', 22),
(388, 'Dao', 22),
(389, 'Dumalag', 22),
(390, 'Dumarao', 22),
(391, 'Ivisan', 22),
(392, 'Jamindan', 22),
(393, 'Ma-ayon', 22),
(394, 'Mambusao', 22),
(395, 'Panay', 22),
(396, 'Panitan', 22),
(397, 'Pilar', 22),
(398, 'Pontevedra', 22),
(399, 'President Roxas', 22),
(400, 'Sapi-an', 22),
(401, 'Sigma', 22),
(402, 'Tapaz', 22),
(403, 'Bagamanoc', 23),
(404, 'Baras', 23),
(405, 'Bato', 23),
(406, 'Caramoran', 23),
(407, 'Gigmoto', 23),
(408, 'Pandan', 23),
(409, 'Panganiban', 23),
(410, 'San Andres', 23),
(411, 'San Miguel', 23),
(412, 'Viga', 23),
(413, 'Virac', 23),
(414, 'Cavite City', 24),
(415, 'Dasmariñas City', 24),
(416, 'Tagaytay City', 24),
(417, 'Trece Martires City', 24),
(418, 'Alfonso', 24),
(419, 'Amadeo', 24),
(420, 'Bacoor', 24),
(421, 'Carmona', 24),
(422, 'General Mariano Alvarez', 24),
(423, 'General Emilio Aguinaldo', 24),
(424, 'General Trias', 24),
(425, 'Imus', 24),
(426, 'Indang', 24),
(427, 'Kawit', 24),
(428, 'Magallanes', 24),
(429, 'Maragondon', 24),
(430, 'Mendez', 24),
(431, 'Naic', 24),
(432, 'Noveleta', 24),
(433, 'Rosario', 24),
(434, 'Silang', 24),
(435, 'Tanza', 24),
(436, 'Ternate', 24),
(437, 'Bogo City', 25),
(438, 'Cebu City', 25),
(439, 'Carcar City', 25),
(440, 'Danao City', 25),
(441, 'Lapu-Lapu City', 25),
(442, 'Mandaue City', 25),
(443, 'Naga City', 25),
(444, 'Talisay City', 25),
(445, 'Toledo City', 25),
(446, 'Alcantara', 25),
(447, 'Alcoy', 25),
(448, 'Alegria', 25),
(449, 'Aloguinsan', 25),
(450, 'Argao', 25),
(451, 'Asturias', 25),
(452, 'Badian', 25),
(453, 'Balamban', 25),
(454, 'Bantayan', 25),
(455, 'Barili', 25),
(456, 'Boljoon', 25),
(457, 'Borbon', 25),
(458, 'Carmen', 25),
(459, 'Catmon', 25),
(460, 'Compostela', 25),
(461, 'Consolacion', 25),
(462, 'Cordoba', 25),
(463, 'Daanbantayan', 25),
(464, 'Dalaguete', 25),
(465, 'Dumanjug', 25),
(466, 'Ginatilan', 25),
(467, 'Liloan', 25),
(468, 'Madridejos', 25),
(469, 'Malabuyoc', 25),
(470, 'Medellin', 25),
(471, 'Minglanilla', 25),
(472, 'Moalboal', 25),
(473, 'Oslob', 25),
(474, 'Pilar', 25),
(475, 'Pinamungahan', 25),
(476, 'Poro', 25),
(477, 'Ronda', 25),
(478, 'Samboan', 25),
(479, 'San Fernando', 25),
(480, 'San Francisco', 25),
(481, 'San Remigio', 25),
(482, 'Santa Fe', 25),
(483, 'Santander', 25),
(484, 'Sibonga', 25),
(485, 'Sogod', 25),
(486, 'Tabogon', 25),
(487, 'Tabuelan', 25),
(488, 'Tuburan', 25),
(489, 'Tudela', 25),
(490, 'Compostela', 26),
(491, 'Laak', 26),
(492, 'Mabini', 26),
(493, 'Maco', 26),
(494, 'Maragusan', 26),
(495, 'Mawab', 26),
(496, 'Monkayo', 26),
(497, 'Montevista', 26),
(498, 'Nabunturan', 26),
(499, 'New Bataan', 26),
(500, 'Pantukan', 26),
(501, 'Kidapawan City', 27),
(502, 'Alamada', 27),
(503, 'Aleosan', 27),
(504, 'Antipas', 27),
(505, 'Arakan', 27),
(506, 'Banisilan', 27),
(507, 'Carmen', 27),
(508, 'Kabacan', 27),
(509, 'Libungan', 27),
(510, 'M''lang', 27),
(511, 'Magpet', 27),
(512, 'Makilala', 27),
(513, 'Matalam', 27),
(514, 'Midsayap', 27),
(515, 'Pigkawayan', 27),
(516, 'Pikit', 27),
(517, 'President Roxas', 27),
(518, 'Tulunan', 27),
(519, 'Panabo City', 28),
(520, 'Island Garden City of Samal', 28),
(521, 'Tagum City', 28),
(522, 'Asuncion', 28),
(523, 'Braulio E. Dujali', 28),
(524, 'Carmen', 28),
(525, 'Kapalong', 28),
(526, 'New Corella', 28),
(527, 'San Isidro', 28),
(528, 'Santo Tomas', 28),
(529, 'Talaingod', 28),
(530, 'Davao City', 29),
(531, 'Digos City', 29),
(532, 'Bansalan', 29),
(533, 'Don Marcelino', 29),
(534, 'Hagonoy', 29),
(535, 'Jose Abad Santos', 29),
(536, 'Kiblawan', 29),
(537, 'Magsaysay', 29),
(538, 'Malalag', 29),
(539, 'Malita', 29),
(540, 'Matanao', 29),
(541, 'Padada', 29),
(542, 'Santa Cruz', 29),
(543, 'Santa Maria', 29),
(544, 'Sarangani', 29),
(545, 'Sulop', 29),
(546, 'Mati City', 30),
(547, 'Baganga', 30),
(548, 'Banaybanay', 30),
(549, 'Boston', 30),
(550, 'Caraga', 30),
(551, 'Cateel', 30),
(552, 'Governor Generoso', 30),
(553, 'Lupon', 30),
(554, 'Manay', 30),
(555, 'San Isidro', 30),
(556, 'Tarragona', 30),
(557, 'Arteche', 31),
(558, 'Balangiga', 31),
(559, 'Balangkayan', 31),
(560, 'Borongan', 31),
(561, 'Can-avid', 31),
(562, 'Dolores', 31),
(563, 'General MacArthur', 31),
(564, 'Giporlos', 31),
(565, 'Guiuan', 31),
(566, 'Hernani', 31),
(567, 'Jipapad', 31),
(568, 'Lawaan', 31),
(569, 'Llorente', 31),
(570, 'Maslog', 31),
(571, 'Maydolong', 31),
(572, 'Mercedes', 31),
(573, 'Oras', 31),
(574, 'Quinapondan', 31),
(575, 'Salcedo', 31),
(576, 'San Julian', 31),
(577, 'San Policarpo', 31),
(578, 'Sulat', 31),
(579, 'Taft', 31),
(580, 'Buenavista', 32),
(581, 'Jordan', 32),
(582, 'Nueva Valencia', 32),
(583, 'San Lorenzo', 32),
(584, 'Sibunag', 32),
(585, 'Aguinaldo', 33),
(586, 'Alfonso Lista', 33),
(587, 'Asipulo', 33),
(588, 'Banaue', 33),
(589, 'Hingyon', 33),
(590, 'Hungduan', 33),
(591, 'Kiangan', 33),
(592, 'Lagawe', 33),
(593, 'Lamut', 33),
(594, 'Mayoyao', 33),
(595, 'Tinoc', 33),
(596, 'Batac City', 34),
(597, 'Laoag City', 34),
(598, 'Adams', 34),
(599, 'Bacarra', 34),
(600, 'Badoc', 34),
(601, 'Bangui', 34),
(602, 'Banna', 34),
(603, 'Burgos', 34),
(604, 'Carasi', 34),
(605, 'Currimao', 34),
(606, 'Dingras', 34),
(607, 'Dumalneg', 34),
(608, 'Marcos', 34),
(609, 'Nueva Era', 34),
(610, 'Pagudpud', 34),
(611, 'Paoay', 34),
(612, 'Pasuquin', 34),
(613, 'Piddig', 34),
(614, 'Pinili', 34),
(615, 'San Nicolas', 34),
(616, 'Sarrat', 34),
(617, 'Solsona', 34),
(618, 'Vintar', 34),
(619, 'Candon City', 35),
(620, 'Vigan City', 35),
(621, 'Alilem', 35),
(622, 'Banayoyo', 35),
(623, 'Bantay', 35),
(624, 'Burgos', 35),
(625, 'Cabugao', 35),
(626, 'Caoayan', 35),
(627, 'Cervantes', 35),
(628, 'Galimuyod', 35),
(629, 'Gregorio Del Pilar', 35),
(630, 'Lidlidda', 35),
(631, 'Magsingal', 35),
(632, 'Nagbukel', 35),
(633, 'Narvacan', 35),
(634, 'Quirino', 35),
(635, 'Salcedo', 35),
(636, 'San Emilio', 35),
(637, 'San Esteban', 35),
(638, 'San Ildefonso', 35),
(639, 'San Juan', 35),
(640, 'San Vicente', 35),
(641, 'Santa', 35),
(642, 'Santa Catalina', 35),
(643, 'Santa Cruz', 35),
(644, 'Santa Lucia', 35),
(645, 'Santa Maria', 35),
(646, 'Santiago', 35),
(647, 'Santo Domingo', 35),
(648, 'Sigay', 35),
(649, 'Sinait', 35),
(650, 'Sugpon', 35),
(651, 'Suyo', 35),
(652, 'Tagudin', 35),
(653, 'Iloilo City', 36),
(654, 'Passi City', 36),
(655, 'Ajuy', 36),
(656, 'Alimodian', 36),
(657, 'Anilao', 36),
(658, 'Badiangan', 36),
(659, 'Balasan', 36),
(660, 'Banate', 36),
(661, 'Barotac Nuevo', 36),
(662, 'Barotac Viejo', 36),
(663, 'Batad', 36),
(664, 'Bingawan', 36),
(665, 'Cabatuan', 36),
(666, 'Calinog', 36),
(667, 'Carles', 36),
(668, 'Concepcion', 36),
(669, 'Dingle', 36),
(670, 'Dueñas', 36),
(671, 'Dumangas', 36),
(672, 'Estancia', 36),
(673, 'Guimbal', 36),
(674, 'Igbaras', 36),
(675, 'Janiuay', 36),
(676, 'Lambunao', 36),
(677, 'Leganes', 36),
(678, 'Lemery', 36),
(679, 'Leon', 36),
(680, 'Maasin', 36),
(681, 'Miagao', 36),
(682, 'Mina', 36),
(683, 'New Lucena', 36),
(684, 'Oton', 36),
(685, 'Pavia', 36),
(686, 'Pototan', 36),
(687, 'San Dionisio', 36),
(688, 'San Enrique', 36),
(689, 'San Joaquin', 36),
(690, 'San Miguel', 36),
(691, 'San Rafael', 36),
(692, 'Santa Barbara', 36),
(693, 'Sara', 36),
(694, 'Tigbauan', 36),
(695, 'Tubungan', 36),
(696, 'Zarraga', 36),
(697, 'Cauayan City', 37),
(698, 'Santiago City', 37),
(699, 'Alicia', 37),
(700, 'Angadanan', 37),
(701, 'Aurora', 37),
(702, 'Benito Soliven', 37),
(703, 'Burgos', 37),
(704, 'Cabagan', 37),
(705, 'Cabatuan', 37),
(706, 'Cordon', 37),
(707, 'Delfin Albano', 37),
(708, 'Dinapigue', 37),
(709, 'Divilacan', 37),
(710, 'Echague', 37),
(711, 'Gamu', 37),
(712, 'Ilagan', 37),
(713, 'Jones', 37),
(714, 'Luna', 37),
(715, 'Maconacon', 37),
(716, 'Mallig', 37),
(717, 'Naguilian', 37),
(718, 'Palanan', 37),
(719, 'Quezon', 37),
(720, 'Quirino', 37),
(721, 'Ramon', 37),
(722, 'Reina Mercedes', 37),
(723, 'Roxas', 37),
(724, 'San Agustin', 37),
(725, 'San Guillermo', 37),
(726, 'San Isidro', 37),
(727, 'San Manuel', 37),
(728, 'San Mariano', 37),
(729, 'San Mateo', 37),
(730, 'San Pablo', 37),
(731, 'Santa Maria', 37),
(732, 'Santo Tomas', 37),
(733, 'Tumauini', 37),
(734, 'Tabuk', 38),
(735, 'Balbalan', 38),
(736, 'Lubuagan', 38),
(737, 'Pasil', 38),
(738, 'Pinukpuk', 38),
(739, 'Rizal', 38),
(740, 'Tanudan', 38),
(741, 'Tinglayan', 38),
(742, 'San Fernando City', 39),
(743, 'Agoo', 39),
(744, 'Aringay', 39),
(745, 'Bacnotan', 39),
(746, 'Bagulin', 39),
(747, 'Balaoan', 39),
(748, 'Bangar', 39),
(749, 'Bauang', 39),
(750, 'Burgos', 39),
(751, 'Caba', 39),
(752, 'Luna', 39),
(753, 'Naguilian', 39),
(754, 'Pugo', 39),
(755, 'Rosario', 39),
(756, 'San Gabriel', 39),
(757, 'San Juan', 39),
(758, 'Santo Tomas', 39),
(759, 'Santol', 39),
(760, 'Sudipen', 39),
(761, 'Tubao', 39),
(762, 'Biñan City', 40),
(763, 'Calamba City', 40),
(764, 'San Pablo City', 40),
(765, 'Santa Rosa City', 40),
(766, 'Alaminos', 40),
(767, 'Bay', 40),
(768, 'Cabuyao', 40),
(769, 'Calauan', 40),
(770, 'Cavinti', 40),
(771, 'Famy', 40),
(772, 'Kalayaan', 40),
(773, 'Liliw', 40),
(774, 'Los Baños', 40),
(775, 'Luisiana', 40),
(776, 'Lumban', 40),
(777, 'Mabitac', 40),
(778, 'Magdalena', 40),
(779, 'Majayjay', 40),
(780, 'Nagcarlan', 40),
(781, 'Paete', 40),
(782, 'Pagsanjan', 40),
(783, 'Pakil', 40),
(784, 'Pangil', 40),
(785, 'Pila', 40),
(786, 'Rizal', 40),
(787, 'San Pedro', 40),
(788, 'Santa Cruz', 40),
(789, 'Santa Maria', 40),
(790, 'Siniloan', 40),
(791, 'Victoria', 40),
(792, 'Iligan City', 41),
(793, 'Bacolod', 41),
(794, 'Baloi', 41),
(795, 'Baroy', 41),
(796, 'Kapatagan', 41),
(797, 'Kauswagan', 41),
(798, 'Kolambugan', 41),
(799, 'Lala', 41),
(800, 'Linamon', 41),
(801, 'Magsaysay', 41),
(802, 'Maigo', 41),
(803, 'Matungao', 41),
(804, 'Munai', 41),
(805, 'Nunungan', 41),
(806, 'Pantao Ragat', 41),
(807, 'Pantar', 41),
(808, 'Poona Piagapo', 41),
(809, 'Salvador', 41),
(810, 'Sapad', 41),
(811, 'Sultan Naga Dimaporo', 41),
(812, 'Tagoloan', 41),
(813, 'Tangcal', 41),
(814, 'Tubod', 41),
(815, 'Marawi City', 42),
(816, 'Bacolod-Kalawi', 42),
(817, 'Balabagan', 42),
(818, 'Balindong', 42),
(819, 'Bayang', 42),
(820, 'Binidayan', 42),
(821, 'Buadiposo-Buntong', 42),
(822, 'Bubong', 42),
(823, 'Bumbaran', 42),
(824, 'Butig', 42),
(825, 'Calanogas', 42),
(826, 'Ditsaan-Ramain', 42),
(827, 'Ganassi', 42),
(828, 'Kapai', 42),
(829, 'Kapatagan', 42),
(830, 'Lumba-Bayabao', 42),
(831, 'Lumbaca-Unayan', 42),
(832, 'Lumbatan', 42),
(833, 'Lumbayanague', 42),
(834, 'Madalum', 42),
(835, 'Madamba', 42),
(836, 'Maguing', 42),
(837, 'Malabang', 42),
(838, 'Marantao', 42),
(839, 'Marogong', 42),
(840, 'Masiu', 42),
(841, 'Mulondo', 42),
(842, 'Pagayawan', 42),
(843, 'Piagapo', 42),
(844, 'Poona Bayabao', 42),
(845, 'Pualas', 42),
(846, 'Saguiaran', 42),
(847, 'Sultan Dumalondong', 42),
(848, 'Picong', 42),
(849, 'Tagoloan II', 42),
(850, 'Tamparan', 42),
(851, 'Taraka', 42),
(852, 'Tubaran', 42),
(853, 'Tugaya', 42),
(854, 'Wao', 42),
(855, 'Ormoc City', 43),
(856, 'Tacloban City', 43),
(857, 'Abuyog', 43),
(858, 'Alangalang', 43),
(859, 'Albuera', 43),
(860, 'Babatngon', 43),
(861, 'Barugo', 43),
(862, 'Bato', 43),
(863, 'Baybay', 43),
(864, 'Burauen', 43),
(865, 'Calubian', 43),
(866, 'Capoocan', 43),
(867, 'Carigara', 43),
(868, 'Dagami', 43),
(869, 'Dulag', 43),
(870, 'Hilongos', 43),
(871, 'Hindang', 43),
(872, 'Inopacan', 43),
(873, 'Isabel', 43),
(874, 'Jaro', 43),
(875, 'Javier', 43),
(876, 'Julita', 43),
(877, 'Kananga', 43),
(878, 'La Paz', 43),
(879, 'Leyte', 43),
(880, 'Liloan', 43),
(881, 'MacArthur', 43),
(882, 'Mahaplag', 43),
(883, 'Matag-ob', 43),
(884, 'Matalom', 43),
(885, 'Mayorga', 43),
(886, 'Merida', 43),
(887, 'Palo', 43),
(888, 'Palompon', 43),
(889, 'Pastrana', 43),
(890, 'San Isidro', 43),
(891, 'San Miguel', 43),
(892, 'Santa Fe', 43),
(893, 'Sogod', 43),
(894, 'Tabango', 43),
(895, 'Tabontabon', 43),
(896, 'Tanauan', 43),
(897, 'Tolosa', 43),
(898, 'Tunga', 43),
(899, 'Villaba', 43),
(900, 'Cotabato City', 44),
(901, 'Ampatuan', 44),
(902, 'Barira', 44),
(903, 'Buldon', 44),
(904, 'Buluan', 44),
(905, 'Datu Abdullah Sangki', 44),
(906, 'Datu Anggal Midtimbang', 44),
(907, 'Datu Blah T. Sinsuat', 44),
(908, 'Datu Hoffer Ampatuan', 44),
(909, 'Datu Montawal', 44),
(910, 'Datu Odin Sinsuat', 44),
(911, 'Datu Paglas', 44),
(912, 'Datu Piang', 44),
(913, 'Datu Salibo', 44),
(914, 'Datu Saudi-Ampatuan', 44),
(915, 'Datu Unsay', 44),
(916, 'General Salipada K. Pendatun', 44),
(917, 'Guindulungan', 44),
(918, 'Kabuntalan', 44),
(919, 'Mamasapano', 44),
(920, 'Mangudadatu', 44),
(921, 'Matanog', 44),
(922, 'Northern Kabuntalan', 44),
(923, 'Pagalungan', 44),
(924, 'Paglat', 44),
(925, 'Pandag', 44),
(926, 'Parang', 44),
(927, 'Rajah Buayan', 44),
(928, 'Shariff Aguak', 44),
(929, 'Shariff Saydona Mustapha', 44),
(930, 'South Upi', 44),
(931, 'Sultan Kudarat', 44),
(932, 'Sultan Mastura', 44),
(933, 'Sultan sa Barongis', 44),
(934, 'Talayan', 44),
(935, 'Talitay', 44),
(936, 'Upi', 44),
(937, 'Boac', 45),
(938, 'Buenavista', 45),
(939, 'Gasan', 45),
(940, 'Mogpog', 45),
(941, 'Santa Cruz', 45),
(942, 'Torrijos', 45),
(943, 'Masbate City', 46),
(944, 'Aroroy', 46),
(945, 'Baleno', 46),
(946, 'Balud', 46),
(947, 'Batuan', 46),
(948, 'Cataingan', 46),
(949, 'Cawayan', 46),
(950, 'Claveria', 46),
(951, 'Dimasalang', 46),
(952, 'Esperanza', 46),
(953, 'Mandaon', 46),
(954, 'Milagros', 46),
(955, 'Mobo', 46),
(956, 'Monreal', 46),
(957, 'Palanas', 46),
(958, 'Pio V. Corpuz', 46),
(959, 'Placer', 46),
(960, 'San Fernando', 46),
(961, 'San Jacinto', 46),
(962, 'San Pascual', 46),
(963, 'Uson', 46),
(964, 'Caloocan', 47),
(965, 'Las Piñas', 47),
(966, 'Makati', 47),
(967, 'Malabon', 47),
(968, 'Mandaluyong', 47),
(969, 'Manila', 47),
(970, 'Marikina', 47),
(971, 'Muntinlupa', 47),
(972, 'Navotas', 47),
(973, 'Parañaque', 47),
(974, 'Pasay', 47),
(975, 'Pasig', 47),
(976, 'Quezon City', 47),
(977, 'San Juan City', 47),
(978, 'Taguig', 47),
(979, 'Valenzuela City', 47),
(980, 'Pateros', 47),
(981, 'Oroquieta City', 48),
(982, 'Ozamiz City', 48),
(983, 'Tangub City', 48),
(984, 'Aloran', 48),
(985, 'Baliangao', 48),
(986, 'Bonifacio', 48),
(987, 'Calamba', 48),
(988, 'Clarin', 48),
(989, 'Concepcion', 48),
(990, 'Don Victoriano Chiongbian', 48),
(991, 'Jimenez', 48),
(992, 'Lopez Jaena', 48),
(993, 'Panaon', 48),
(994, 'Plaridel', 48),
(995, 'Sapang Dalaga', 48),
(996, 'Sinacaban', 48),
(997, 'Tudela', 48),
(998, 'Cagayan de Oro', 49),
(999, 'Gingoog City', 49),
(1000, 'Alubijid', 49),
(1001, 'Balingasag', 49),
(1002, 'Balingoan', 49),
(1003, 'Binuangan', 49),
(1004, 'Claveria', 49),
(1005, 'El Salvador', 49),
(1006, 'Gitagum', 49),
(1007, 'Initao', 49),
(1008, 'Jasaan', 49),
(1009, 'Kinoguitan', 49),
(1010, 'Lagonglong', 49),
(1011, 'Laguindingan', 49),
(1012, 'Libertad', 49),
(1013, 'Lugait', 49),
(1014, 'Magsaysay', 49),
(1015, 'Manticao', 49),
(1016, 'Medina', 49),
(1017, 'Naawan', 49),
(1018, 'Opol', 49),
(1019, 'Salay', 49),
(1020, 'Sugbongcogon', 49),
(1021, 'Tagoloan', 49),
(1022, 'Talisayan', 49),
(1023, 'Villanueva', 49),
(1024, 'Barlig', 50),
(1025, 'Bauko', 50),
(1026, 'Besao', 50),
(1027, 'Bontoc', 50),
(1028, 'Natonin', 50),
(1029, 'Paracelis', 50),
(1030, 'Sabangan', 50),
(1031, 'Sadanga', 50),
(1032, 'Sagada', 50),
(1033, 'Tadian', 50),
(1034, 'Bacolod City', 51),
(1035, 'Bago City', 51),
(1036, 'Cadiz City', 51),
(1037, 'Escalante City', 51),
(1038, 'Himamaylan City', 51),
(1039, 'Kabankalan City', 51),
(1040, 'La Carlota City', 51),
(1041, 'Sagay City', 51),
(1042, 'San Carlos City', 51),
(1043, 'Silay City', 51),
(1044, 'Sipalay City', 51),
(1045, 'Talisay City', 51),
(1046, 'Victorias City', 51),
(1047, 'Binalbagan', 51),
(1048, 'Calatrava', 51),
(1049, 'Candoni', 51),
(1050, 'Cauayan', 51),
(1051, 'Enrique B. Magalona', 51),
(1052, 'Hinigaran', 51),
(1053, 'Hinoba-an', 51),
(1054, 'Ilog', 51),
(1055, 'Isabela', 51),
(1056, 'La Castellana', 51),
(1057, 'Manapla', 51),
(1058, 'Moises Padilla', 51),
(1059, 'Murcia', 51),
(1060, 'Pontevedra', 51),
(1061, 'Pulupandan', 51),
(1062, 'Salvador Benedicto', 51),
(1063, 'San Enrique', 51),
(1064, 'Toboso', 51),
(1065, 'Valladolid', 51),
(1066, 'Bais City', 52),
(1067, 'Bayawan City', 52),
(1068, 'Canlaon City', 52),
(1069, 'Guihulngan City', 52),
(1070, 'Dumaguete City', 52),
(1071, 'Tanjay City', 52),
(1072, 'Amlan', 52),
(1073, 'Ayungon', 52),
(1074, 'Bacong', 52),
(1075, 'Basay', 52),
(1076, 'Bindoy', 52),
(1077, 'Dauin', 52),
(1078, 'Jimalalud', 52),
(1079, 'La Libertad', 52),
(1080, 'Mabinay', 52),
(1081, 'Manjuyod', 52),
(1082, 'Pamplona', 52),
(1083, 'San Jose', 52),
(1084, 'Santa Catalina', 52),
(1085, 'Siaton', 52),
(1086, 'Sibulan', 52),
(1087, 'Tayasan', 52),
(1088, 'Valencia', 52),
(1089, 'Vallehermoso', 52),
(1090, 'Zamboanguita', 52),
(1091, 'Allen', 53),
(1092, 'Biri', 53),
(1093, 'Bobon', 53),
(1094, 'Capul', 53),
(1095, 'Catarman', 53),
(1096, 'Catubig', 53),
(1097, 'Gamay', 53),
(1098, 'Laoang', 53),
(1099, 'Lapinig', 53),
(1100, 'Las Navas', 53),
(1101, 'Lavezares', 53),
(1102, 'Lope de Vega', 53),
(1103, 'Mapanas', 53),
(1104, 'Mondragon', 53),
(1105, 'Palapag', 53),
(1106, 'Pambujan', 53),
(1107, 'Rosario', 53),
(1108, 'San Antonio', 53),
(1109, 'San Isidro', 53),
(1110, 'San Jose', 53),
(1111, 'San Roque', 53),
(1112, 'San Vicente', 53),
(1113, 'Silvino Lobos', 53),
(1114, 'Victoria', 53),
(1115, 'Cabanatuan City', 54),
(1116, 'Gapan City', 54),
(1117, 'Science City of Muñoz', 54),
(1118, 'Palayan City', 54),
(1119, 'San Jose City', 54),
(1120, 'Aliaga', 54),
(1121, 'Bongabon', 54),
(1122, 'Cabiao', 54),
(1123, 'Carranglan', 54),
(1124, 'Cuyapo', 54),
(1125, 'Gabaldon', 54),
(1126, 'General Mamerto Natividad', 54),
(1127, 'General Tinio', 54),
(1128, 'Guimba', 54),
(1129, 'Jaen', 54),
(1130, 'Laur', 54),
(1131, 'Licab', 54),
(1132, 'Llanera', 54),
(1133, 'Lupao', 54),
(1134, 'Nampicuan', 54),
(1135, 'Pantabangan', 54),
(1136, 'Peñaranda', 54),
(1137, 'Quezon', 54),
(1138, 'Rizal', 54),
(1139, 'San Antonio', 54),
(1140, 'San Isidro', 54),
(1141, 'San Leonardo', 54),
(1142, 'Santa Rosa', 54),
(1143, 'Santo Domingo', 54),
(1144, 'Talavera', 54),
(1145, 'Talugtug', 54),
(1146, 'Zaragoza', 54),
(1147, 'Alfonso Castaneda', 55),
(1148, 'Ambaguio', 55),
(1149, 'Aritao', 55),
(1150, 'Bagabag', 55),
(1151, 'Bambang', 55),
(1152, 'Bayombong', 55),
(1153, 'Diadi', 55),
(1154, 'Dupax del Norte', 55),
(1155, 'Dupax del Sur', 55),
(1156, 'Kasibu', 55),
(1157, 'Kayapa', 55),
(1158, 'Quezon', 55),
(1159, 'Santa Fe', 55),
(1160, 'Solano', 55),
(1161, 'Villaverde', 55),
(1162, 'Abra de Ilog', 56),
(1163, 'Calintaan', 56),
(1164, 'Looc', 56),
(1165, 'Lubang', 56),
(1166, 'Magsaysay', 56),
(1167, 'Mamburao', 56),
(1168, 'Paluan', 56),
(1169, 'Rizal', 56),
(1170, 'Sablayan', 56),
(1171, 'San Jose', 56),
(1172, 'Santa Cruz', 56),
(1173, 'Calapan City', 57),
(1174, 'Baco', 57),
(1175, 'Bansud', 57),
(1176, 'Bongabong', 57),
(1177, 'Bulalacao', 57),
(1178, 'Gloria', 57),
(1179, 'Mansalay', 57),
(1180, 'Naujan', 57),
(1181, 'Pinamalayan', 57),
(1182, 'Pola', 57),
(1183, 'Puerto Galera', 57),
(1184, 'Roxas', 57),
(1185, 'San Teodoro', 57),
(1186, 'Socorro', 57),
(1187, 'Victoria', 57),
(1188, 'Puerto Princesa City', 58),
(1189, 'Aborlan', 58),
(1190, 'Agutaya', 58),
(1191, 'Araceli', 58),
(1192, 'Balabac', 58),
(1193, 'Bataraza', 58),
(1194, 'Brooke''s Point', 58),
(1195, 'Busuanga', 58),
(1196, 'Cagayancillo', 58),
(1197, 'Coron', 58),
(1198, 'Culion', 58),
(1199, 'Cuyo', 58),
(1200, 'Dumaran', 58),
(1201, 'El Nido', 58),
(1202, 'Kalayaan', 58),
(1203, 'Linapacan', 58),
(1204, 'Magsaysay', 58),
(1205, 'Narra', 58),
(1206, 'Quezon', 58),
(1207, 'Rizal', 58),
(1208, 'Roxas', 58),
(1209, 'San Vicente', 58),
(1210, 'Sofronio Española', 58),
(1211, 'Taytay', 58),
(1212, 'Angeles City', 59),
(1213, 'City of San Fernando', 59),
(1214, 'Apalit', 59),
(1215, 'Arayat', 59),
(1216, 'Bacolor', 59),
(1217, 'Candaba', 59),
(1218, 'Floridablanca', 59),
(1219, 'Guagua', 59),
(1220, 'Lubao', 59),
(1221, 'Mabalacat', 59),
(1222, 'Macabebe', 59),
(1223, 'Magalang', 59),
(1224, 'Masantol', 59),
(1225, 'Mexico', 59),
(1226, 'Minalin', 59),
(1227, 'Porac', 59),
(1228, 'San Luis', 59),
(1229, 'San Simon', 59),
(1230, 'Santa Ana', 59),
(1231, 'Santa Rita', 59),
(1232, 'Santo Tomas', 59),
(1233, 'Sasmuan', 59),
(1234, 'Alaminos City', 60),
(1235, 'Dagupan City', 60),
(1236, 'San Carlos City', 60),
(1237, 'Urdaneta City', 60),
(1238, 'Agno', 60),
(1239, 'Aguilar', 60),
(1240, 'Alcala', 60),
(1241, 'Anda', 60),
(1242, 'Asingan', 60),
(1243, 'Balungao', 60),
(1244, 'Bani', 60),
(1245, 'Basista', 60),
(1246, 'Bautista', 60),
(1247, 'Bayambang', 60),
(1248, 'Binalonan', 60),
(1249, 'Binmaley', 60),
(1250, 'Bolinao', 60),
(1251, 'Bugallon', 60),
(1252, 'Burgos', 60),
(1253, 'Calasiao', 60),
(1254, 'Dasol', 60),
(1255, 'Infanta', 60),
(1256, 'Labrador', 60),
(1257, 'Laoac', 60),
(1258, 'Lingayen', 60),
(1259, 'Mabini', 60),
(1260, 'Malasiqui', 60),
(1261, 'Manaoag', 60),
(1262, 'Mangaldan', 60),
(1263, 'Mangatarem', 60),
(1264, 'Mapandan', 60),
(1265, 'Natividad', 60),
(1266, 'Pozzorubio', 60),
(1267, 'Rosales', 60),
(1268, 'San Fabian', 60),
(1269, 'San Jacinto', 60),
(1270, 'San Manuel', 60),
(1271, 'San Nicolas', 60),
(1272, 'San Quintin', 60),
(1273, 'Santa Barbara', 60),
(1274, 'Santa Maria', 60),
(1275, 'Santo Tomas', 60),
(1276, 'Sison', 60),
(1277, 'Sual', 60),
(1278, 'Tayug', 60),
(1279, 'Umingan', 60),
(1280, 'Urbiztondo', 60),
(1281, 'Villasis', 60),
(1282, 'Lucena City', 61),
(1283, 'Tayabas City', 61),
(1284, 'Agdangan', 61),
(1285, 'Alabat', 61),
(1286, 'Atimonan', 61),
(1287, 'Buenavista', 61),
(1288, 'Burdeos', 61),
(1289, 'Calauag', 61),
(1290, 'Candelaria', 61),
(1291, 'Catanauan', 61),
(1292, 'Dolores', 61),
(1293, 'General Luna', 61),
(1294, 'General Nakar', 61),
(1295, 'Guinayangan', 61),
(1296, 'Gumaca', 61),
(1297, 'Infanta', 61),
(1298, 'Jomalig', 61),
(1299, 'Lopez', 61),
(1300, 'Lucban', 61),
(1301, 'Macalelon', 61),
(1302, 'Mauban', 61),
(1303, 'Mulanay', 61),
(1304, 'Padre Burgos', 61),
(1305, 'Pagbilao', 61),
(1306, 'Panukulan', 61),
(1307, 'Patnanungan', 61),
(1308, 'Perez', 61),
(1309, 'Pitogo', 61),
(1310, 'Plaridel', 61),
(1311, 'Polillo', 61),
(1312, 'Quezon', 61),
(1313, 'Real', 61),
(1314, 'Sampaloc', 61),
(1315, 'San Andres', 61),
(1316, 'San Antonio', 61),
(1317, 'San Francisco', 61),
(1318, 'San Narciso', 61),
(1319, 'Sariaya', 61),
(1320, 'Tagkawayan', 61),
(1321, 'Tiaong', 61),
(1322, 'Unisan', 61),
(1323, 'Aglipay', 62),
(1324, 'Cabarroguis', 62),
(1325, 'Diffun', 62),
(1326, 'Maddela', 62),
(1327, 'Nagtipunan', 62),
(1328, 'Saguday', 62),
(1329, 'Antipolo City', 63),
(1330, 'Angono', 63),
(1331, 'Baras', 63),
(1332, 'Binangonan', 63),
(1333, 'Cainta', 63),
(1334, 'Cardona', 63),
(1335, 'Jalajala', 63),
(1336, 'Morong', 63),
(1337, 'Pililla', 63),
(1338, 'Rodriguez', 63),
(1339, 'San Mateo', 63),
(1340, 'Tanay', 63),
(1341, 'Taytay', 63),
(1342, 'Teresa', 63),
(1343, 'Alcantara', 64),
(1344, 'Banton', 64),
(1345, 'Cajidiocan', 64),
(1346, 'Calatrava', 64),
(1347, 'Concepcion', 64),
(1348, 'Corcuera', 64),
(1349, 'Ferrol', 64),
(1350, 'Looc', 64),
(1351, 'Magdiwang', 64),
(1352, 'Odiongan', 64),
(1353, 'Romblon', 64),
(1354, 'San Agustin', 64),
(1355, 'San Andres', 64),
(1356, 'San Fernando', 64),
(1357, 'San Jose', 64),
(1358, 'Santa Fe', 64),
(1359, 'Santa Maria', 64),
(1360, 'Calbayog City', 65),
(1361, 'Catbalogan City', 65),
(1362, 'Almagro', 65),
(1363, 'Basey', 65),
(1364, 'Calbiga', 65),
(1365, 'Daram', 65),
(1366, 'Gandara', 65),
(1367, 'Hinabangan', 65),
(1368, 'Jiabong', 65),
(1369, 'Marabut', 65),
(1370, 'Matuguinao', 65),
(1371, 'Motiong', 65),
(1372, 'Pagsanghan', 65),
(1373, 'Paranas', 65),
(1374, 'Pinabacdao', 65),
(1375, 'San Jorge', 65),
(1376, 'San Jose De Buan', 65),
(1377, 'San Sebastian', 65),
(1378, 'Santa Margarita', 65),
(1379, 'Santa Rita', 65),
(1380, 'Santo Niño', 65),
(1381, 'Tagapul-an', 65),
(1382, 'Talalora', 65),
(1383, 'Tarangnan', 65),
(1384, 'Villareal', 65),
(1385, 'Zumarraga', 65),
(1386, 'Alabel', 66),
(1387, 'Glan', 66),
(1388, 'Kiamba', 66),
(1389, 'Maasim', 66),
(1390, 'Maitum', 66),
(1391, 'Malapatan', 66),
(1392, 'Malungon', 66),
(1393, 'Enrique Villanueva', 67),
(1394, 'Larena', 67),
(1395, 'Lazi', 67),
(1396, 'Maria', 67),
(1397, 'San Juan', 67),
(1398, 'Siquijor', 67),
(1399, 'Sorsogon City', 68),
(1400, 'Barcelona', 68),
(1401, 'Bulan', 68),
(1402, 'Bulusan', 68),
(1403, 'Casiguran', 68),
(1404, 'Castilla', 68),
(1405, 'Donsol', 68),
(1406, 'Gubat', 68),
(1407, 'Irosin', 68),
(1408, 'Juban', 68),
(1409, 'Magallanes', 68),
(1410, 'Matnog', 68),
(1411, 'Pilar', 68),
(1412, 'Prieto Diaz', 68),
(1413, 'Santa Magdalena', 68),
(1414, 'General Santos City', 69),
(1415, 'Koronadal City', 69),
(1416, 'Banga', 69),
(1417, 'Lake Sebu', 69),
(1418, 'Norala', 69),
(1419, 'Polomolok', 69),
(1420, 'Santo Niño', 69),
(1421, 'Surallah', 69),
(1422, 'T''boli', 69),
(1423, 'Tampakan', 69),
(1424, 'Tantangan', 69),
(1425, 'Tupi', 69),
(1426, 'Maasin City', 70),
(1427, 'Anahawan', 70),
(1428, 'Bontoc', 70),
(1429, 'Hinunangan', 70),
(1430, 'Hinundayan', 70),
(1431, 'Libagon', 70),
(1432, 'Liloan', 70),
(1433, 'Limasawa', 70),
(1434, 'Macrohon', 70),
(1435, 'Malitbog', 70),
(1436, 'Padre Burgos', 70),
(1437, 'Pintuyan', 70),
(1438, 'Saint Bernard', 70),
(1439, 'San Francisco', 70),
(1440, 'San Juan', 70),
(1441, 'San Ricardo', 70),
(1442, 'Silago', 70),
(1443, 'Sogod', 70),
(1444, 'Tomas Oppus', 70),
(1445, 'Tacurong City', 71),
(1446, 'Bagumbayan', 71),
(1447, 'Columbio', 71),
(1448, 'Esperanza', 71),
(1449, 'Isulan', 71),
(1450, 'Kalamansig', 71),
(1451, 'Lambayong', 71),
(1452, 'Lebak', 71),
(1453, 'Lutayan', 71),
(1454, 'Palimbang', 71),
(1455, 'President Quirino', 71),
(1456, 'Senator Ninoy Aquino', 71),
(1457, 'Banguingui', 72),
(1458, 'Hadji Panglima Tahil', 72),
(1459, 'Indanan', 72),
(1460, 'Jolo', 72),
(1461, 'Kalingalan Caluang', 72),
(1462, 'Lugus', 72),
(1463, 'Luuk', 72),
(1464, 'Maimbung', 72),
(1465, 'Old Panamao', 72),
(1466, 'Omar', 72),
(1467, 'Pandami', 72),
(1468, 'Panglima Estino', 72),
(1469, 'Pangutaran', 72),
(1470, 'Parang', 72),
(1471, 'Pata', 72),
(1472, 'Patikul', 72),
(1473, 'Siasi', 72),
(1474, 'Talipao', 72),
(1475, 'Tapul', 72),
(1476, 'Surigao City', 73),
(1477, 'Alegria', 73),
(1478, 'Bacuag', 73),
(1479, 'Basilisa', 73),
(1480, 'Burgos', 73),
(1481, 'Cagdianao', 73),
(1482, 'Claver', 73),
(1483, 'Dapa', 73),
(1484, 'Del Carmen', 73),
(1485, 'Dinagat', 73),
(1486, 'General Luna', 73),
(1487, 'Gigaquit', 73),
(1488, 'Libjo', 73),
(1489, 'Loreto', 73),
(1490, 'Mainit', 73),
(1491, 'Malimono', 73),
(1492, 'Pilar', 73),
(1493, 'Placer', 73),
(1494, 'San Benito', 73),
(1495, 'San Francisco', 73),
(1496, 'San Isidro', 73),
(1497, 'San Jose', 73),
(1498, 'Santa Monica', 73),
(1499, 'Sison', 73),
(1500, 'Socorro', 73),
(1501, 'Tagana-an', 73),
(1502, 'Tubajon', 73),
(1503, 'Tubod', 73),
(1504, 'Bislig City', 74),
(1505, 'Tandag City', 74),
(1506, 'Barobo', 74),
(1507, 'Bayabas', 74),
(1508, 'Cagwait', 74),
(1509, 'Cantilan', 74),
(1510, 'Carmen', 74),
(1511, 'Carrascal', 74),
(1512, 'Cortes', 74),
(1513, 'Hinatuan', 74),
(1514, 'Lanuza', 74),
(1515, 'Lianga', 74),
(1516, 'Lingig', 74),
(1517, 'Madrid', 74),
(1518, 'Marihatag', 74),
(1519, 'San Agustin', 74),
(1520, 'San Miguel', 74),
(1521, 'Tagbina', 74),
(1522, 'Tago', 74),
(1523, 'Tarlac City', 75),
(1524, 'Anao', 75),
(1525, 'Bamban', 75),
(1526, 'Camiling', 75),
(1527, 'Capas', 75),
(1528, 'Concepcion', 75),
(1529, 'Gerona', 75),
(1530, 'La Paz', 75),
(1531, 'Mayantoc', 75),
(1532, 'Moncada', 75),
(1533, 'Paniqui', 75),
(1534, 'Pura', 75),
(1535, 'Ramos', 75),
(1536, 'San Clemente', 75),
(1537, 'San Jose', 75),
(1538, 'San Manuel', 75),
(1539, 'Santa Ignacia', 75),
(1540, 'Victoria', 75),
(1541, 'Bongao', 76),
(1542, 'Languyan', 76),
(1543, 'Mapun', 76),
(1544, 'Panglima Sugala', 76),
(1545, 'Sapa-Sapa', 76),
(1546, 'Sibutu', 76),
(1547, 'Simunul', 76),
(1548, 'Sitangkai', 76),
(1549, 'South Ubian', 76),
(1550, 'Tandubas', 76),
(1551, 'Turtle Islands', 76),
(1552, 'Olongapo City', 77),
(1553, 'Botolan', 77),
(1554, 'Cabangan', 77),
(1555, 'Candelaria', 77),
(1556, 'Castillejos', 77),
(1557, 'Iba', 77),
(1558, 'Masinloc', 77),
(1559, 'Palauig', 77),
(1560, 'San Antonio', 77),
(1561, 'San Felipe', 77),
(1562, 'San Marcelino', 77),
(1563, 'San Narciso', 77),
(1564, 'Santa Cruz', 77),
(1565, 'Subic', 77),
(1566, 'Dapitan City', 78),
(1567, 'Dipolog City', 78),
(1568, 'Bacungan', 78),
(1569, 'Baliguian', 78),
(1570, 'Godod', 78),
(1571, 'Gutalac', 78),
(1572, 'Jose Dalman', 78),
(1573, 'Kalawit', 78),
(1574, 'Katipunan', 78),
(1575, 'La Libertad', 78),
(1576, 'Labason', 78),
(1577, 'Liloy', 78),
(1578, 'Manukan', 78),
(1579, 'Mutia', 78),
(1580, 'Piñan', 78),
(1581, 'Polanco', 78),
(1582, 'President Manuel A. Roxas', 78),
(1583, 'Rizal', 78),
(1584, 'Salug', 78),
(1585, 'Sergio Osmeña Sr.', 78),
(1586, 'Siayan', 78),
(1587, 'Sibuco', 78),
(1588, 'Sibutad', 78),
(1589, 'Sindangan', 78),
(1590, 'Siocon', 78),
(1591, 'Sirawai', 78),
(1592, 'Tampilisan', 78),
(1593, 'Pagadian City', 79),
(1594, 'Zamboanga City', 79),
(1595, 'Aurora', 79),
(1596, 'Bayog', 79),
(1597, 'Dimataling', 79),
(1598, 'Dinas', 79),
(1599, 'Dumalinao', 79),
(1600, 'Dumingag', 79),
(1601, 'Guipos', 79),
(1602, 'Josefina', 79),
(1603, 'Kumalarang', 79),
(1604, 'Labangan', 79),
(1605, 'Lakewood', 79),
(1606, 'Lapuyan', 79),
(1607, 'Mahayag', 79),
(1608, 'Margosatubig', 79),
(1609, 'Midsalip', 79),
(1610, 'Molave', 79),
(1611, 'Pitogo', 79),
(1612, 'Ramon Magsaysay', 79),
(1613, 'San Miguel', 79),
(1614, 'San Pablo', 79),
(1615, 'Sominot', 79),
(1616, 'Tabina', 79),
(1617, 'Tambulig', 79),
(1618, 'Tigbao', 79),
(1619, 'Tukuran', 79),
(1620, 'Vincenzo A. Sagun', 79),
(1621, 'Alicia', 80),
(1622, 'Buug', 80),
(1623, 'Diplahan', 80),
(1624, 'Imelda', 80),
(1625, 'Ipil', 80),
(1626, 'Kabasalan', 80),
(1627, 'Mabuhay', 80),
(1628, 'Malangas', 80),
(1629, 'Naga', 80),
(1630, 'Olutanga', 80),
(1631, 'Payao', 80),
(1632, 'Roseller Lim', 80),
(1633, 'Siay', 80),
(1634, 'Talusan', 80),
(1635, 'Titay', 80),
(1636, 'Tungawan', 80);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4a2afa6b572e6819ad7c44be905c2325', '192.168.20.125', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1415179400, 'a:3:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:25:"rencie.bautista@yahoo.com";s:7:"user_id";s:1:"3";s:5:"admin";b:0;s:5:"group";a:1:{i:2;s:3:"BDO";}s:10:"privileges";a:7:{i:20;s:28:"ASSIGNED PROJECT MAINTENANCE";i:24;s:11:"CALL REPORT";i:12;s:19:"COMPANY MAINTENANCE";i:13;s:19:"CONTACT MAINTENANCE";i:18;s:27:"CREATED PROJECT MAINTENANCE";i:22;s:26:"JOINED PROJECT MAINTENANCE";i:21;s:26:"PUBLIC PROJECT MAINTENANCE";}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"40994d36e5cd5c7a36db18736aada9a43b97a822";}s:9:"back_link";s:16:"project/assigned";}'),
('7efbcd33ea17608a1b836449cf383bf9', '192.168.20.21', 'Mozilla/5.0 (Windows NT 6.2; rv:33.0) Gecko/20100101 Firefox/33.0', 1415183280, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";b:0;s:7:"user_id";b:0;s:5:"admin";b:0;s:5:"group";b:0;s:10:"privileges";b:0;s:22:"logged_in_via_password";b:0;s:19:"login_session_token";b:0;}}'),
('bc9f9a1de0d6a71caece53f157bc1202', '192.168.20.125', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1415183728, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:25:"rencie.bautista@yahoo.com";s:7:"user_id";s:1:"3";s:5:"admin";b:0;s:5:"group";a:1:{i:2;s:3:"BDO";}s:10:"privileges";a:7:{i:20;s:28:"ASSIGNED PROJECT MAINTENANCE";i:24;s:11:"CALL REPORT";i:12;s:19:"COMPANY MAINTENANCE";i:13;s:19:"CONTACT MAINTENANCE";i:18;s:27:"CREATED PROJECT MAINTENANCE";i:22;s:26:"JOINED PROJECT MAINTENANCE";i:21;s:26:"PUBLIC PROJECT MAINTENANCE";}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"12238cfb81c3c93687545e4187da3f4a26c1a3f1";}}'),
('bcb326f367c7665d27ffdac5c98a53e9', '192.168.20.51', 'Microsoft-WebDAV-MiniRedir/5.1.2600', 1415178727, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";b:0;s:7:"user_id";b:0;s:5:"admin";b:0;s:5:"group";b:0;s:10:"privileges";b:0;s:22:"logged_in_via_password";b:0;s:19:"login_session_token";b:0;}}'),
('db73f71c02dcfa2520ddc67f92a76981', '192.168.20.21', 'Mozilla/5.0 (Windows NT 6.2; rv:33.0) Gecko/20100101 Firefox/33.0', 1415182172, 'a:2:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:16:"daldea@yahoo.com";s:7:"user_id";s:1:"2";s:5:"admin";b:0;s:5:"group";a:1:{i:3;s:10:"SUPERVISOR";}s:10:"privileges";a:8:{i:20;s:28:"ASSIGNED PROJECT MAINTENANCE";i:24;s:11:"CALL REPORT";i:12;s:19:"COMPANY MAINTENANCE";i:13;s:19:"CONTACT MAINTENANCE";i:18;s:27:"CREATED PROJECT MAINTENANCE";i:22;s:26:"JOINED PROJECT MAINTENANCE";i:19;s:29:"PROJECT ASSIGNING MAINTENANCE";i:21;s:26:"PUBLIC PROJECT MAINTENANCE";}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"8bf6e3c009ee155841f288441e852ba8f9029b48";}}'),
('f16418262e50b7c911a2e79df99dbc10', '192.168.20.125', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36', 1415183480, 'a:3:{s:9:"user_data";s:0:"";s:10:"flexi_auth";a:7:{s:15:"user_identifier";s:16:"daldea@yahoo.com";s:7:"user_id";s:1:"2";s:5:"admin";b:0;s:5:"group";a:1:{i:3;s:10:"SUPERVISOR";}s:10:"privileges";a:8:{i:20;s:28:"ASSIGNED PROJECT MAINTENANCE";i:24;s:11:"CALL REPORT";i:12;s:19:"COMPANY MAINTENANCE";i:13;s:19:"CONTACT MAINTENANCE";i:18;s:27:"CREATED PROJECT MAINTENANCE";i:22;s:26:"JOINED PROJECT MAINTENANCE";i:19;s:29:"PROJECT ASSIGNING MAINTENANCE";i:21;s:26:"PUBLIC PROJECT MAINTENANCE";}s:22:"logged_in_via_password";b:1;s:19:"login_session_token";s:40:"7dd0781c576eb31a6f2fe66adad38d19046e9e81";}s:9:"back_link";s:16:"project/joined/3";}');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(250) NOT NULL,
  `lot` varchar(250) NOT NULL,
  `street` varchar(250) NOT NULL,
  `brgy` varchar(250) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company`, `lot`, `street`, `brgy`, `city_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'CHASE TECHNOLOGIES CORPORATION1', '5268', 'DIESEL ST.', 'PALANAN', 966, 3, '2014-08-29 07:55:57', '2014-09-17 21:29:34'),
(2, 'CHASE TECHNOLOGIES CORPORATION', '4998', 'ARNAIZ ST.1', 'PIO DEL PILAR', 966, 3, '2014-08-29 08:01:53', '2014-09-17 21:30:33'),
(3, 'ZAI FOO RESTUARANT', '45456', 'BAGOONG', 'PALANAN', 966, 3, '2014-09-02 12:46:08', '2014-09-02 12:46:08'),
(4, 'METRO MEDIA', '5268', 'DIESEL ST.', 'PALANAN', 966, 3, '2014-09-05 04:57:42', '2014-09-05 04:57:42'),
(8, 'CHASE TECHNOLOGIES CORPORATION', '5268', 'DIESEL ST.', 'PALANAN', 966, 4, '2014-09-16 15:46:56', '2014-09-16 15:46:56'),
(9, 'DONATO', '5268', 'DIESEL ST.', 'PALANAN', 966, 2, '2014-09-17 14:50:27', '2014-09-17 14:50:27'),
(10, 'NEW X', '5268', 'DIESEL', 'PALANAN', 966, 3, '2014-09-18 13:12:48', '2014-09-18 13:12:48'),
(12, 'NEW COMPANY', '123D', 'ALEJO AQUINO', '123', 966, 3, '2014-11-03 13:32:17', '2014-11-03 13:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `companytypes`
--

CREATE TABLE IF NOT EXISTS `companytypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companytype` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companytypes`
--

INSERT INTO `companytypes` (`id`, `companytype`) VALUES
(1, 'CONTRUCTOR'),
(2, 'DEVELOPER'),
(3, 'GENERAL CONTRUCTOR'),
(4, 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `company_typelist`
--

CREATE TABLE IF NOT EXISTS `company_typelist` (
  `company_id` int(11) NOT NULL,
  `companytype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_typelist`
--

INSERT INTO `company_typelist` (`company_id`, `companytype_id`) VALUES
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(10, 1),
(10, 1),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(11, 2),
(11, 3),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contactemails`
--

CREATE TABLE IF NOT EXISTS `contactemails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contactemails`
--

INSERT INTO `contactemails` (`id`, `created_by`, `contact_id`, `email_address`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'retailasia@demo.com', '2014-09-17 15:23:33', '2014-09-17 15:23:33'),
(2, 3, 1, 'rencie.bautista@yahoo.com', '2014-09-17 15:23:42', '2014-09-17 15:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `contactphones`
--

CREATE TABLE IF NOT EXISTS `contactphones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contactphones`
--

INSERT INTO `contactphones` (`id`, `created_by`, `contact_id`, `phone_number`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '8312977', 'office phone number', '2014-09-16 17:16:04', '2014-09-17 14:30:38'),
(2, 3, 1, '7991510', 'new phone number', '2014-09-16 17:48:37', '2014-09-16 17:48:37'),
(3, 3, 1, '8312977', 'sample', '2014-09-17 12:07:56', '2014-09-17 14:35:16'),
(8, 2, 5, '23232', '232', '2014-09-17 16:41:00', '2014-09-17 16:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_by`, `company_id`, `first_name`, `middle_name`, `last_name`, `title`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'JUAN', 'DE LA', 'CRUZ', 'PROGRAMMER1', '2014-09-02 12:55:08', '2014-09-30 09:55:14'),
(2, 3, 3, 'JOE', 'ADAM', 'SMITH', 'MANAGER', '2014-09-02 13:50:37', '2014-09-30 09:55:43'),
(4, 4, 8, 'JUAN', 'DELA', 'CRUZ', 'MANAGER', '2014-09-16 15:53:07', '2014-09-16 15:53:07'),
(5, 2, 9, 'DONATO', 'JAVID', 'ALDEA', 'MANAGER', '2014-09-17 14:50:55', '2014-09-17 14:50:55'),
(10, 3, 2, 'DAVID', 'ADAM', 'LAMBERT', 'PROGRAMMER', '2014-09-26 17:11:06', '2014-09-30 09:56:05'),
(11, 3, 12, 'BOB', 'SANTOS', 'POE', 'TITLE / POSITION', '2014-11-03 13:33:42', '2014-11-03 13:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(12, 'SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `grouptypes`
--

CREATE TABLE IF NOT EXISTS `grouptypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grouptype_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `grouptypes`
--

INSERT INTO `grouptypes` (`id`, `grouptype_desc`) VALUES
(1, 'DEVELOPER'),
(2, 'GENERAL CONTRACTOR'),
(3, 'PROJECT MANAGER'),
(4, 'PROJECT DESIGNER'),
(5, 'ARCHITECT'),
(6, 'APPLICATOR'),
(7, 'DEALER'),
(8, 'SUPPLIER'),
(9, 'PROJECT OWNER'),
(14, 'LOGISTIC');

-- --------------------------------------------------------

--
-- Table structure for table `notificationgroups`
--

CREATE TABLE IF NOT EXISTS `notificationgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notificationgroup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notificationgroups`
--

INSERT INTO `notificationgroups` (`id`, `notificationgroup`) VALUES
(1, 'DETAILS'),
(2, 'CLASSIFICATIONS'),
(3, 'CATEGORY'),
(4, 'STAGE'),
(5, 'STATUS'),
(6, 'SPECIFICATION');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `project_contact_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `project_contact_id`, `group_id`, `remarks`, `created_by`, `created_at`) VALUES
(2, 2, 40, 6, 'alert alert-danger alert-dismissable', 2, '2014-10-30 17:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `notificationtypes`
--

CREATE TABLE IF NOT EXISTS `notificationtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notificationtype` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `notificationtypes`
--

INSERT INTO `notificationtypes` (`id`, `notificationtype`) VALUES
(1, 'PROJECT COMMENT'),
(2, 'JOINED PROJECT');

-- --------------------------------------------------------

--
-- Table structure for table `paintspecifications`
--

CREATE TABLE IF NOT EXISTS `paintspecifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_contact_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `painttype_id` int(11) NOT NULL,
  `area` decimal(10,2) NOT NULL,
  `paint` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `paintspecifications`
--

INSERT INTO `paintspecifications` (`id`, `project_contact_id`, `created_by`, `painttype_id`, `area`, `paint`, `cost`, `details`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 2, 0.11, 0.11, 0.11, '11', '2014-11-03 10:56:58', '2014-11-03 10:56:58'),
(2, 8, 3, 2, 500.00, 600.00, 100000.00, 'details', '2014-11-03 13:56:27', '2014-11-03 18:01:12'),
(4, 23, 2, 3, 20.52, 25.00, 250.00, 'test', '2014-11-03 17:55:59', '2014-11-03 17:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `painttypes`
--

CREATE TABLE IF NOT EXISTS `painttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `painttype` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `painttypes`
--

INSERT INTO `painttypes` (`id`, `painttype`) VALUES
(1, 'EXTERIOR'),
(2, 'INTERIOR'),
(3, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `prjcategories`
--

CREATE TABLE IF NOT EXISTS `prjcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjcategory_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `prjcategories`
--

INSERT INTO `prjcategories` (`id`, `prjcategory_desc`) VALUES
(1, 'HIGH-RISE BUILDING (11 FLOOR ABOVE)'),
(2, 'MEDIUM-RISE BUILDING (4-10 FLOORS)'),
(3, 'COMMERCIAL BUILDING'),
(4, 'RESIDENTIAL (SINGLE DETACHED-BUNGALOW TO 3 FLOORS)'),
(5, 'TOWN HOUSE'),
(6, 'HOUSING (MASS HOUSING)'),
(7, 'INSTITUTIONAL'),
(8, 'INDUSTRIAL / WAREHOUSE'),
(9, 'GOVERNMENT'),
(10, 'FACILITIES');

-- --------------------------------------------------------

--
-- Table structure for table `prjclassifications`
--

CREATE TABLE IF NOT EXISTS `prjclassifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjclassification_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prjclassifications`
--

INSERT INTO `prjclassifications` (`id`, `prjclassification_desc`) VALUES
(1, 'NEW CONTRUCTION'),
(2, 'REPAINTING');

-- --------------------------------------------------------

--
-- Table structure for table `prjstages`
--

CREATE TABLE IF NOT EXISTS `prjstages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjstage_desc` varchar(250) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prjstages`
--

INSERT INTO `prjstages` (`id`, `prjstage_desc`, `remarks`) VALUES
(1, 'DESIGN & DOCUMENTATION', 'Schematic design and plans are being drafted for planning approval'),
(2, 'BIDDING', 'Bid are being called for Main Contractor'),
(3, 'CONSTRUCTION', 'Main Contractor has commenced work on site. Main Contract awarded for subcontract/s bidding or subcontract/s awarded - including painting');

-- --------------------------------------------------------

--
-- Table structure for table `prjstatuses`
--

CREATE TABLE IF NOT EXISTS `prjstatuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjstatus_desc` varchar(250) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prjstatuses`
--

INSERT INTO `prjstatuses` (`id`, `prjstatus_desc`, `remarks`) VALUES
(1, 'AWARDED', 'Projects awarded. Basically specified for the project.'),
(2, 'PAINTING STARTED', 'Painting has commenced work on site. Basis in reporting consummated amount.'),
(3, 'LOST', 'Name of competitor/paint company used in the project');

-- --------------------------------------------------------

--
-- Table structure for table `prjsubcategories`
--

CREATE TABLE IF NOT EXISTS `prjsubcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prjcategory_id` int(11) NOT NULL,
  `prjsubcategory_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `prjsubcategories`
--

INSERT INTO `prjsubcategories` (`id`, `prjcategory_id`, `prjsubcategory_desc`) VALUES
(2, 3, 'SHOPPING CENTRES'),
(3, 3, 'SUPERMARKETS'),
(4, 3, 'SHOPS'),
(5, 3, 'RESTUARANTS AND CAFES'),
(6, 5, 'APARTMENTS'),
(7, 5, 'ESTATES'),
(8, 5, 'HOUSES'),
(9, 7, 'HOTELS'),
(10, 7, 'SCHOOLS'),
(11, 7, 'HOSPITALS'),
(12, 7, 'CHURCHES'),
(13, 9, 'BUILDINGS'),
(14, 9, 'HOSPITALS'),
(15, 9, 'SCHOOLS'),
(16, 10, 'RECREATIONAL'),
(17, 10, 'TRANSPORT');

-- --------------------------------------------------------

--
-- Table structure for table `projectcontact_status`
--

CREATE TABLE IF NOT EXISTS `projectcontact_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projectcontact_status`
--

INSERT INTO `projectcontact_status` (`id`, `pc_status`) VALUES
(1, 'FOR APPROVAL'),
(2, 'APPROVED'),
(3, 'DENIED');

-- --------------------------------------------------------

--
-- Table structure for table `projectfiles`
--

CREATE TABLE IF NOT EXISTS `projectfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `remark_id` int(11) NOT NULL,
  `hashname` varchar(100) NOT NULL,
  `filename` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `projectfiles`
--

INSERT INTO `projectfiles` (`id`, `group_id`, `remark_id`, `hashname`, `filename`) VALUES
(1, 1, 3, 'da580cc905e84283c4189f9f10bba79a.jpg', 'babydedicationfeet.jpg'),
(2, 2, 4, '29ff2b71a28930b724e872b71c409280.jpg', 'babydedicationfeet.jpg'),
(3, 3, 5, '7bea942a07e52062c741d6e3e60e9fb7.jpg', 'christening-invitations-1.jpg'),
(4, 4, 6, 'f5352c9510150a6f1fe364ee035bee89.jpg', 'damask_baptism_christening_dedication_photo_invitation_pink_purple_any_color_84f45fb4.jpg'),
(5, 5, 7, 'fbb9ca280fd1029bbccab07b4b61675b.jpg', 'Baby Parker Baptism Invitation - ready for print.jpg'),
(6, 1, 18, '486ef7138aa1d9706eb32240fb92dc5d.txt', 'FOR TESTING.txt'),
(7, 2, 19, '6725e198e9c4dc0c77ccbded7635693c.docx', 'FOR TESTING.docx'),
(8, 3, 22, 'cb7ccd359a2835c9a43a13c2c2579e08.xlsx', 'FOR TESTING.xlsx'),
(9, 4, 23, '503136be62baf009a706bd3a64aed75a.pdf', 'FOR TESTING.pdf'),
(10, 5, 24, 'ac831fb8a217a6e09273a5e9b7af3d5a.xlsx', 'FOR TESTING.xlsx'),
(11, 5, 24, '7a7fea2cfca87be7a2a832f1e5d23a7d.pdf', 'FOR TESTING.pdf'),
(12, 5, 24, 'f13b93fa006acb46afb82622011878b6.docx', 'FOR TESTING.docx'),
(13, 5, 27, '43b1aac9d143a81b4ca6fde8c46339ac.docx', 'FOR TESTING.docx'),
(14, 1, 32, '66842e833268f8ee3807f0443800ebfe.txt', 'FOR TESTING.txt'),
(15, 5, 33, '9d2d07550ca8f85df1367101f503b291.pdf', 'FOR TESTING.pdf'),
(16, 2, 34, 'b854480f6f162695cc50a203e500f68b.docx', 'FOR TESTING.docx'),
(17, 5, 38, '6ee6a4af47c3e8469da08472c32277ae.xlsx', 'FOR TESTING.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `lot` varchar(100) NOT NULL,
  `street` varchar(200) NOT NULL,
  `brgy` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `sl_status_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  `assigned_viewed` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `created_by`, `project_name`, `lot`, `street`, `brgy`, `city_id`, `assigned_to`, `assigned_by`, `sl_status_id`, `status_id`, `assigned_viewed`, `created_at`, `updated_at`) VALUES
(1, 3, 'NEW PROJECT', '4998', 'ARNAIZ ST.', 'PIO DEL PILAR', 966, 2, 2, 1, 2, 1, '2014-11-03 10:15:30', '2014-11-03 10:33:52'),
(2, 2, 'TEST PROJECT', '4988', 'ARNAIZ ST.', 'PIO DEL PILAR', 966, 4, 2, 1, 2, 1, '2014-11-03 10:50:50', '2014-11-05 09:50:02'),
(3, 3, 'FOR TESTING', '2632B', 'ALEJO AQUINO', 'BRGY. 758 ZONE 82', 969, 3, 2, 1, 2, 1, '2014-11-03 13:15:16', '2014-11-03 13:49:59'),
(4, 3, 'PEPERO ALMOND', '4A 123', 'ARELLANO ST.', 'BRGY. 758 ZONE 82', 969, 4, 2, 1, 2, 1, '2014-11-04 15:51:08', '2014-11-05 09:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `project_contacts`
--

CREATE TABLE IF NOT EXISTS `project_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '1',
  `approved_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `project_contacts`
--

INSERT INTO `project_contacts` (`id`, `project_id`, `contact_id`, `type_id`, `created_by`, `approved`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 6, 3, 2, 3, '2014-11-03 10:15:30', '2014-11-03 10:15:30'),
(2, 1, 10, 6, 3, 2, 2, '2014-11-03 10:26:29', '2014-11-03 10:33:55'),
(3, 1, 4, 6, 4, 2, 2, '2014-11-03 10:36:28', '2014-11-03 10:40:10'),
(4, 1, 5, 6, 2, 2, 2, '2014-11-03 10:46:33', '2014-11-03 10:46:43'),
(5, 1, 2, 5, 3, 3, 2, '2014-11-03 10:47:28', '2014-11-03 10:48:01'),
(6, 2, 5, 6, 2, 2, 2, '2014-11-03 10:50:50', '2014-11-03 10:50:50'),
(7, 3, 2, 5, 3, 2, 3, '2014-11-03 13:15:16', '2014-11-03 13:15:16'),
(8, 3, 1, 6, 3, 2, 3, '2014-11-03 13:21:07', '2014-11-03 13:50:37'),
(9, 3, 10, 1, 3, 2, 3, '2014-11-03 13:21:37', '2014-11-03 13:50:34'),
(10, 3, 2, 14, 3, 2, 3, '2014-11-03 13:24:22', '2014-11-03 13:50:56'),
(11, 3, 1, 7, 3, 2, 3, '2014-11-03 13:24:44', '2014-11-03 13:50:48'),
(12, 3, 1, 2, 3, 2, 3, '2014-11-03 13:25:47', '2014-11-03 13:50:49'),
(13, 3, 2, 4, 3, 2, 3, '2014-11-03 13:25:59', '2014-11-03 13:51:00'),
(14, 3, 1, 3, 3, 2, 3, '2014-11-03 13:26:07', '2014-11-03 13:50:51'),
(15, 3, 11, 9, 3, 2, 3, '2014-11-03 13:34:32', '2014-11-03 13:50:52'),
(16, 3, 11, 8, 3, 2, 3, '2014-11-03 13:34:41', '2014-11-03 13:50:54'),
(17, 3, 11, 7, 3, 2, 3, '2014-11-03 13:42:08', '2014-11-03 13:50:55'),
(18, 1, 11, 3, 3, 3, 2, '2014-11-03 14:18:14', '2014-11-03 14:18:51'),
(19, 1, 2, 4, 3, 3, 2, '2014-11-03 17:15:15', '2014-11-03 17:17:07'),
(20, 3, 10, 14, 3, 3, 3, '2014-11-03 17:18:24', '2014-11-03 17:18:35'),
(21, 3, 2, 6, 3, 2, 3, '2014-11-03 17:29:41', '2014-11-03 17:29:51'),
(22, 2, 5, 3, 2, 3, 4, '2014-11-03 17:32:00', '2014-11-05 09:50:26'),
(23, 3, 5, 14, 2, 2, 3, '2014-11-03 17:32:58', '2014-11-03 17:33:15'),
(24, 4, 11, 1, 3, 2, 3, '2014-11-04 15:51:08', '2014-11-04 15:51:08'),
(25, 4, 2, 6, 3, 3, 4, '2014-11-05 09:41:04', '2014-11-05 09:51:27'),
(26, 4, 1, 6, 3, 2, 4, '2014-11-05 09:41:20', '2014-11-05 09:50:52'),
(27, 4, 11, 5, 3, 2, 4, '2014-11-05 09:41:38', '2014-11-05 09:52:02'),
(28, 4, 2, 7, 3, 2, 4, '2014-11-05 09:41:48', '2014-11-05 09:52:09'),
(29, 4, 1, 2, 3, 2, 4, '2014-11-05 09:42:00', '2014-11-05 09:51:01'),
(30, 4, 11, 2, 3, 3, 4, '2014-11-05 09:42:08', '2014-11-05 09:51:05'),
(31, 4, 11, 14, 3, 2, 4, '2014-11-05 09:42:32', '2014-11-05 09:52:05'),
(32, 4, 2, 14, 3, 2, 4, '2014-11-05 09:42:40', '2014-11-05 09:52:12'),
(33, 4, 11, 4, 3, 2, 4, '2014-11-05 09:42:57', '2014-11-05 09:52:06'),
(34, 4, 2, 3, 3, 2, 4, '2014-11-05 09:43:14', '2014-11-05 09:52:14'),
(35, 4, 1, 9, 3, 2, 4, '2014-11-05 09:43:23', '2014-11-05 09:51:58'),
(36, 4, 1, 8, 3, 2, 4, '2014-11-05 09:43:35', '2014-11-05 09:52:01'),
(37, 4, 4, 3, 4, 2, 4, '2014-11-05 17:14:25', '2014-11-05 17:14:33'),
(38, 4, 2, 2, 3, 3, 4, '2014-11-05 17:24:00', '2014-11-05 17:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE IF NOT EXISTS `project_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `project_contact_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `remarks` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `group_id`, `created_by`, `project_contact_id`, `details`, `remarks`, `created_at`) VALUES
(1, 1, 3, 1, 'tets', '', '2014-11-03 10:15:42'),
(2, 1, 2, 6, 'test', '', '2014-11-03 10:52:54'),
(3, 1, 2, 6, 'as', '', '2014-11-03 10:53:01'),
(4, 2, 2, 6, 'Project classification is updated to NEW CONTRUCTION.', '', '2014-11-03 10:56:26'),
(5, 3, 2, 6, 'Project category is updated to FACILITIES - TRANSPORT.', '', '2014-11-03 10:56:33'),
(6, 4, 2, 6, 'Project stage is updated to BIDDING<br><em>Bid are being called for Main Contractor</em>', '', '2014-11-03 10:56:40'),
(7, 5, 2, 6, 'Project status is updated to LOST<br><em>Name of competitor/paint company used in the project</em>', '', '2014-11-03 10:56:48'),
(8, 6, 2, 6, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>INTERIOR<br></td>\r\n														<td>11<br></td>\r\n														<td>0.11<br></td>\r\n														<td>0.11<br></td>\r\n														<td>0.11<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint specification added.', '2014-11-03 10:56:58'),
(9, 1, 3, 7, 'test', '', '2014-11-03 13:46:31'),
(10, 2, 3, 8, 'Project classification is updated to NEW CONTRUCTION.', '', '2014-11-03 13:54:40'),
(11, 3, 3, 8, 'Project category is updated to TOWN HOUSE - ESTATES.', '', '2014-11-03 13:55:06'),
(12, 4, 3, 8, 'Project stage is updated to CONSTRUCTION<br><em>Main Contractor has commenced work on site. Main Contract awarded for subcontract/s bidding or subcontract/s awarded - including painting</em>', '', '2014-11-03 13:55:22'),
(13, 5, 3, 8, 'Project status is updated to PAINTING STARTED<br><em>Painting has commenced work on site. Basis in reporting consummated amount.</em>', '', '2014-11-03 13:55:32'),
(14, 6, 3, 8, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>INTERIOR<br></td>\r\n														<td>details<br></td>\r\n														<td>500.00<br></td>\r\n														<td>600.00<br></td>\r\n														<td>100,000.00<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint specification added.', '2014-11-03 13:56:27'),
(15, 6, 3, 8, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>OTHERS<br></td>\r\n														<td>hvjnvmn<br></td>\r\n														<td>25.35<br></td>\r\n														<td>534,535.43<br></td>\r\n														<td>3,300.45<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint specification added.', '2014-11-03 13:58:46'),
(16, 6, 3, 8, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>OTHERS<br></td>\r\n														<td>hvjnvmnghngn<br></td>\r\n														<td>25.35<br></td>\r\n														<td>534,535.43<br></td>\r\n														<td>3,300.45<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->from<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>OTHERS<br></td>\r\n														<td>hvjnvmnghngn<br></td>\r\n														<td>25.35<br></td>\r\n														<td>534,535.43<br></td>\r\n														<td>3,300.45<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint updated to', '2014-11-03 13:58:53'),
(17, 6, 3, 8, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>OTHERS<br></td>\r\n														<td>hvjnvmnghngn<br></td>\r\n														<td>25.35<br></td>\r\n														<td>534,535.43<br></td>\r\n														<td>3,300.45<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint specification deleted.', '2014-11-03 13:59:10'),
(18, 1, 3, 8, 'test', '', '2014-11-03 14:02:06'),
(19, 2, 3, 8, 'Project classification is updated to NEW CONTRUCTION.', '', '2014-11-03 14:02:21'),
(20, 3, 3, 8, 'Project category is updated to FACILITIES - RECREATIONAL.', '', '2014-11-03 14:02:36'),
(21, 3, 3, 8, 'Project category is updated to FACILITIES - TRANSPORT.', '', '2014-11-03 14:03:02'),
(22, 3, 3, 8, 'Project category is updated to GOVERNMENT - SCHOOLS.', '', '2014-11-03 14:04:35'),
(23, 4, 3, 8, 'Project stage is updated to CONSTRUCTION<br><em>Main Contractor has commenced work on site. Main Contract awarded for subcontract/s bidding or subcontract/s awarded - including painting</em>', '', '2014-11-03 14:05:13'),
(24, 5, 3, 8, 'Project status is updated to PAINTING STARTED<br><em>Painting has commenced work on site. Basis in reporting consummated amount.</em>', '', '2014-11-03 14:05:32'),
(25, 1, 2, 23, 'update', '', '2014-11-03 17:47:43'),
(26, 4, 2, 23, 'Project stage is updated to CONSTRUCTION<br><em>Main Contractor has commenced work on site. Main Contract awarded for subcontract/s bidding or subcontract/s awarded - including painting</em>', '', '2014-11-03 17:53:44'),
(27, 5, 2, 23, 'Project status is updated to AWARDED<br><em>Projects awarded. Basically specified for the project.</em>', '', '2014-11-03 17:54:16'),
(28, 6, 2, 23, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>OTHERS<br></td>\r\n														<td>test<br></td>\r\n														<td>20.52<br></td>\r\n														<td>25.00<br></td>\r\n														<td>250.00<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint specification added.', '2014-11-03 17:55:59'),
(29, 6, 3, 8, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>INTERIOR<br></td>\r\n														<td>details<br></td>\r\n														<td>500.00<br></td>\r\n														<td>600.00<br></td>\r\n														<td>100,000.00<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->from<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>INTERIOR<br></td>\r\n														<td>details<br></td>\r\n														<td>500.00<br></td>\r\n														<td>600.00<br></td>\r\n														<td>100,000.00<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint updated to', '2014-11-03 17:58:37'),
(30, 6, 3, 8, '<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>INTERIOR<br></td>\r\n														<td>details<br></td>\r\n														<td>500.00<br></td>\r\n														<td>600.00<br></td>\r\n														<td>100,000.00<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->from<div class="row">\r\n									<div class="col-lg-12">\r\n										<div class="table-responsive">\r\n											<table class="table table-hover">\r\n												<thead>\r\n													<tr>\r\n														<th>Type</th>\r\n														<th>Details</th>\r\n														<th>Area<i>(SqM)</i></th>\r\n														<th>Paint Requirement<i>(Ltrs.)</i></th>\r\n														<th>Painting Cost<i>(Php)</i></th>\r\n													</tr>\r\n												</thead>\r\n												<tbody>\r\n													<tr>\r\n														<td>INTERIOR<br></td>\r\n														<td>details<br></td>\r\n														<td>500.00<br></td>\r\n														<td>600.00<br></td>\r\n														<td>100,000.00<br></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</div>\r\n									</div>\r\n									<!-- /.col-lg-12 -->			\r\n								</div>\r\n							<!-- /.row -->', 'Paint updated to', '2014-11-03 18:01:12'),
(31, 1, 3, 12, 'testing', '', '2014-11-03 18:03:54'),
(32, 1, 3, 26, 'test', '', '2014-11-05 09:58:08'),
(33, 5, 3, 26, 'Project status is updated to PAINTING STARTED<br><em>Painting has commenced work on site. Basis in reporting consummated amount.</em>', '', '2014-11-05 10:49:43'),
(34, 2, 3, 36, 'Project classification is updated to NEW CONTRUCTION.', '', '2014-11-05 10:50:25'),
(35, 4, 3, 31, 'Project stage is updated to DESIGN & DOCUMENTATION<br><em>Schematic design and plans are being drafted for planning approval</em>', '', '2014-11-05 10:50:52'),
(36, 3, 3, 32, 'Project category is updated to RESIDENTIAL (SINGLE DETACHED-BUNGALOW TO 3 FLOORS) - .', '', '2014-11-05 10:51:44'),
(37, 2, 4, 37, 'Project classification is updated to REPAINTING.', '', '2014-11-05 17:17:13'),
(38, 5, 4, 37, 'Project status is updated to PAINTING STARTED<br><em>Painting has commenced work on site. Basis in reporting consummated amount.</em>', '', '2014-11-05 17:17:35'),
(39, 5, 4, 37, 'Project status is updated to PAINTING STARTED<br><em>Painting has commenced work on site. Basis in reporting consummated amount.</em>', '', '2014-11-05 17:22:52'),
(40, 2, 4, 37, 'Project classification is updated to NEW CONTRUCTION.', '', '2014-11-05 17:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE IF NOT EXISTS `project_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`id`, `status`) VALUES
(1, 'FOR ASSIGNING'),
(2, 'ASSIGNED'),
(3, 'CLOSED');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `province` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `state_id`) VALUES
(1, 'Abra', 1),
(2, 'Agusan del Norte', 3),
(3, 'Agusan del Sur', 3),
(4, 'Aklan', 2),
(5, 'Albay', 1),
(6, 'Antique', 2),
(7, 'Apayao', 1),
(8, 'Aurora', 1),
(9, 'Basilan', 3),
(10, 'Bataan', 1),
(11, 'Batanes', 1),
(12, 'Batangas', 1),
(13, 'Benguet', 1),
(14, 'Biliran', 2),
(15, 'Bohol', 2),
(16, 'Bukidnon', 3),
(17, 'Bulacan', 1),
(18, 'Cagayan', 1),
(19, 'Camarines Norte', 1),
(20, 'Camarines Sur', 1),
(21, 'Camiguin', 3),
(22, 'Capiz', 2),
(23, 'Catanduanes', 1),
(24, 'Cavite', 1),
(25, 'Cebu', 2),
(26, 'Compostela Valley', 3),
(27, 'Cotabato', 3),
(28, 'Davao del Norte', 3),
(29, 'Davao del Sur', 3),
(30, 'Davao Oriental', 3),
(31, 'Eastern Samar', 2),
(32, 'Guimaras', 2),
(33, 'Ifugao', 1),
(34, 'Ilocos Norte', 1),
(35, 'Ilocos Sur', 1),
(36, 'Iloilo', 2),
(37, 'Isabela', 1),
(38, 'Kalinga', 1),
(39, 'La Union', 1),
(40, 'Laguna', 1),
(41, 'Lanao del Norte', 3),
(42, 'Lanao del Sur', 3),
(43, 'Leyte', 2),
(44, 'Maguindanao', 3),
(45, 'Marinduque', 1),
(46, 'Masbate', 1),
(47, 'Metro Manila', 1),
(48, 'Misamis Occidental', 3),
(49, 'Misamis Oriental', 3),
(50, 'Mountain Province', 1),
(51, 'Negros Occidental', 2),
(52, 'Negros Oriental', 2),
(53, 'Northern Samar', 2),
(54, 'Nueva Ecija', 1),
(55, 'Nueva Vizcaya', 1),
(56, 'Occidental Mindoro', 1),
(57, 'Oriental Mindoro', 1),
(58, 'Palawan', 1),
(59, 'Pampanga', 1),
(60, 'Pangasinan', 1),
(61, 'Quezon', 1),
(62, 'Quirino', 1),
(63, 'Rizal', 1),
(64, 'Romblon', 1),
(65, 'Samar', 2),
(66, 'Sarangani', 3),
(67, 'Siquijor', 2),
(68, 'Sorsogon', 1),
(69, 'South Cotabato', 3),
(70, 'Southern Leyte', 2),
(71, 'Sultan Kudarat', 3),
(72, 'Sulu', 3),
(73, 'Surigao del Norte', 3),
(74, 'Surigao del Sur', 3),
(75, 'Tarlac', 1),
(76, 'Tawi-Tawi', 3),
(77, 'Zambales', 1),
(78, 'Zamboanga del Norte', 3),
(79, 'Zamboanga del Sur', 3),
(80, 'Zamboanga Sibugay', 3);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_contact_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `requesttype_id` int(11) NOT NULL,
  `date_needed` date NOT NULL,
  `particular` text NOT NULL,
  `remarks` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `approved_amount` decimal(10,2) NOT NULL,
  `approval_remarks` text NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `project_contact_id`, `created_by`, `requesttype_id`, `date_needed`, `particular`, `remarks`, `amount`, `approved_amount`, `approval_remarks`, `updated_by`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 8, 3, 10, '2014-11-17', 'for painting and others', 'for painting and others', 20000.00, 15000.00, '15,000.00 only approved', 3, 2, '2014-11-03 13:58:14', '2014-11-05 16:37:01'),
(3, 26, 3, 1, '2014-11-05', 'for give-aways', 'for give-aways', 2000.00, 2000.00, 'okay', 4, 2, '2014-11-05 09:58:57', '2014-11-05 17:14:57'),
(4, 14, 3, 10, '2014-11-05', 'sample particulars', 'sample particulars', 11.11, 0.00, 'no money', 3, 3, '2014-11-05 14:18:01', '2014-11-05 16:40:51'),
(5, 26, 3, 10, '2014-11-05', 'sample particulars', 'sample particulars', 11.11, 0.00, '', 0, 1, '2014-11-05 14:18:44', '2014-11-05 14:18:44'),
(6, 8, 3, 10, '2014-11-05', '121', 'aaa', 0.00, 0.00, '1', 3, 3, '2014-11-05 15:25:29', '2014-11-05 17:19:13'),
(7, 37, 4, 1, '2014-11-05', 'for testing', 'for testing', 3000.00, 0.00, '', 0, 1, '2014-11-05 18:26:46', '2014-11-05 18:26:46'),
(8, 3, 4, 11, '2014-11-05', 'test', 'test', 500.00, 400.00, 'okay', 3, 2, '2014-11-05 18:29:52', '2014-11-05 18:30:19'),
(9, 3, 4, 11, '2014-11-05', 'testing', 'testing', 1000.00, 0.00, '', 0, 1, '2014-11-05 18:30:46', '2014-11-05 18:30:46'),
(10, 23, 2, 11, '2014-11-05', 'testing', 'testing', 0.00, 1000.00, 'testing', 3, 2, '2014-11-05 18:31:56', '2014-11-05 18:32:29'),
(11, 23, 2, 11, '2014-11-05', 'testing', 'testing', 0.00, 0.00, '', 0, 1, '2014-11-05 18:33:01', '2014-11-05 18:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `requesttypes`
--

CREATE TABLE IF NOT EXISTS `requesttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requesttype` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `requesttypes`
--

INSERT INTO `requesttypes` (`id`, `requesttype`) VALUES
(1, 'GIVE-AWAY ITEMS'),
(2, 'STORE/PROJECT SIGNS'),
(4, 'PAINT MATERIALS (FOR DEMO, FOC)'),
(5, 'RAFFLE ITEMS'),
(7, 'CHECK PAYMENT'),
(8, 'OTHERS'),
(10, 'CASH ADVANCE'),
(11, 'BROCHURE / COLOR CHARTS');

-- --------------------------------------------------------

--
-- Table structure for table `request_approvers`
--

CREATE TABLE IF NOT EXISTS `request_approvers` (
  `request_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_approvers`
--

INSERT INTO `request_approvers` (`request_type_id`, `user_id`, `type`) VALUES
(6, 2, 1),
(10, 2, 1),
(11, 3, 1),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_status`
--

CREATE TABLE IF NOT EXISTS `request_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`id`, `status`) VALUES
(1, 'FOR APPROVAL'),
(2, 'APPROVED'),
(3, 'DENIED');

-- --------------------------------------------------------

--
-- Table structure for table `sl_statuses`
--

CREATE TABLE IF NOT EXISTS `sl_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sl_statuses`
--

INSERT INTO `sl_statuses` (`id`, `sl_status`) VALUES
(1, 'NEW LEAD'),
(2, 'CLOSED LEAD'),
(3, 'COMPLETE LEAD'),
(4, 'LOST LEAD');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_desc` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_desc`) VALUES
(1, 'LUZON'),
(2, 'VISAYAS'),
(3, 'MINDANAO');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'FOR ASSIGNING'),
(2, 'ASSIGNED'),
(3, 'CLOSED');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_group_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`) VALUES
(2, 3, 'daldea@yahoo.com', 'donato', '$2a$08$tdBqVZceRX9Wi2y933H/nurJ2UyObGkdoaxD7NPurdc54VtbHkP1a', '192.168.20.125', '2VXTyfdbH8', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-11-05 18:34:48', '2014-08-14 11:49:07'),
(3, 2, 'rencie.bautista@yahoo.com', 'rencie', '$2a$08$ar.tq59G9wkEUOLSJzeG8OKo4VUvh5w9M/dJYDFpfI9G94MsHfDnS', '192.168.20.125', 'tPWtHYH7Bk', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-11-05 18:35:37', '2014-08-14 11:53:47'),
(4, 2, 'zyryn@yahoo.com', 'zyryn', '$P$BsijaTIMgoGf1sxD.4rIYzJjlzeps00', '192.168.20.125', 'PJbsCGVFF4', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-11-05 15:23:11', '2014-09-12 11:00:44'),
(6, 1, 'admin@yahoo.com', 'admin', '$2a$08$TDweofdlTC6opN0gD9UhXuxMlyc6gxBRTEfw/dxd1X2VC5NdKQ1gm', '192.168.20.125', 'PJbsCGVFF4', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2014-11-05 18:34:26', '2014-09-15 19:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uacc_id_fk` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `emp_id` varchar(200) NOT NULL,
  `department_id` int(11) NOT NULL,
  `bank_account` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `uacc_id_fk`, `first_name`, `middle_name`, `last_name`, `emp_id`, `department_id`, `bank_account`, `created_by`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 2, 'DONATO', 'JAVID', 'ALDEA', '4545645', 12, '1', 1, 'a80041270a860f7a38a59ae4614931d9.png', '2014-08-14 11:49:07', '2014-08-14 11:49:07'),
(2, 3, 'RENCIE', 'AGBIN', 'BAUTISTA', '4107m', 12, '831297987987', 1, '0bccddcb3f4d826e975bfbf15f0dd6c7.jpg', '2014-08-14 11:53:47', '2014-09-17 23:09:15'),
(3, 4, 'zyryn', 'Sereban', 'bautista', '123456', 12, '', 1, 'rencie.jpg', '2014-09-12 11:00:44', '2014-09-12 11:00:44'),
(5, 6, 'ADMIN', 'A', 'A', '1', 12, '1', 1, 'fd133b45b63a23754b7a87a83bd761d7.png', '2014-09-15 19:13:28', '2014-09-17 23:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`) VALUES
(1, 'ADMIN', '', 0),
(2, 'BDO', '', 0),
(3, 'SUPERVISOR', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_sessions`
--

CREATE TABLE IF NOT EXISTS `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_sessions`
--

INSERT INTO `user_login_sessions` (`usess_uacc_fk`, `usess_series`, `usess_token`, `usess_login_date`) VALUES
(3, '', '12238cfb81c3c93687545e4187da3f4a26c1a3f1', '2014-11-05 18:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(200) NOT NULL DEFAULT '',
  `upriv_desc` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`upriv_id`, `upriv_name`, `upriv_desc`) VALUES
(1, 'DEPARTMENTS MAINTENANCE', 'ALLOW USER ACCESS TO DEPARTMENTS MAINTENANCE'),
(2, 'GROUPS MAINTENANCE', 'ALLOW USER ACCESS TO GROUPS MAINTENANCE'),
(3, 'USERS MAINTENANCE', 'ALLOW USER ACCESS TO USERS MAINTENANCE'),
(4, 'PRIVILEGES MAINTENANCE', 'ALLOW USER ACCESS TO PRIVILEGES MAINTENANCE'),
(6, 'PROJECT CLASSIFICATION MAINTENANCE', 'ALLOW ACCESS TO PROJECT CLASSIFICATION MAINTENANCE'),
(7, 'PROJECT CATEGORY MAINTENANCE', 'ALLOW ACCESS TO PROJECT CATEGORY MAINTENANCE'),
(8, 'PROJECT STAGE MAINTENANCE', 'ALLOW ACCESS TO PROJECT STAGE MAINTENANCE'),
(9, 'PROJECT STATUS MAINTENANCE', 'ALLOW ACCESS TO PROJECT STATUS MAINTENANCE'),
(10, 'CONTACT TYPE STATUS MAINTENANCE', 'ALLOW ACCESS TO CONTACT TYPE STATUS MAINTENANCE'),
(11, 'COMPANY TYPE MAINTENANCE', 'ALLOW ACCESS TO COMPANY TYPE MAINTENANCE'),
(12, 'COMPANY MAINTENANCE', 'ALLOW ACCESS TO COMPANY MAINTENANCE'),
(13, 'CONTACT MAINTENANCE', 'ALLOW ACCESS TO CONTACT MAINTENANCE'),
(18, 'CREATED PROJECT MAINTENANCE', 'ALLOW ACCESS TO CREATED PROJECT MAINTENANCE'),
(19, 'PROJECT ASSIGNING MAINTENANCE', 'ALLOW ACCESS TO PROJECT ASSIGNING MAINTENANCE'),
(20, 'ASSIGNED PROJECT MAINTENANCE', 'ALLOW ACCESS TO ASSIGNED PROJECT MAINTENANCE'),
(21, 'PUBLIC PROJECT MAINTENANCE', 'ALLOW ACCESS TO PUBLIC PROJECT MAINTENANCE'),
(22, 'JOINED PROJECT MAINTENANCE', 'ALLOW ACCESS TO JOINED PROJECT MAINTENANCE'),
(23, 'REQUEST TYPE MAINTENANCE', 'ALLOW ACCESS TO REQUEST TYPE MAINTENANCE'),
(24, 'CALL REPORT', 'ALLOW ACCESS TO CALL REPORT');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_groups`
--

CREATE TABLE IF NOT EXISTS `user_privilege_groups` (
  `upriv_groups_id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `upriv_groups_ugrp_fk` bigint(5) unsigned NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` bigint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_groups_id`),
  UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=439 ;

--
-- Dumping data for table `user_privilege_groups`
--

INSERT INTO `user_privilege_groups` (`upriv_groups_id`, `upriv_groups_ugrp_fk`, `upriv_groups_upriv_fk`) VALUES
(302, 2, 20),
(303, 2, 24),
(304, 2, 12),
(305, 2, 13),
(306, 2, 18),
(307, 2, 22),
(308, 2, 21),
(420, 1, 11),
(421, 1, 10),
(422, 1, 1),
(423, 1, 2),
(424, 1, 4),
(425, 1, 7),
(426, 1, 6),
(427, 1, 8),
(428, 1, 9),
(429, 1, 23),
(430, 1, 3),
(431, 3, 20),
(432, 3, 24),
(433, 3, 12),
(434, 3, 13),
(435, 3, 18),
(436, 3, 22),
(437, 3, 19),
(438, 3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_users`
--

CREATE TABLE IF NOT EXISTS `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
