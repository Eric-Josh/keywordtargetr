-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 12:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keyword_targetr2`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kt_google_countries`
--

CREATE TABLE `kt_google_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kt_google_countries`
--

INSERT INTO `kt_google_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'af', 'Afghanistan'),
(2, 'al', 'Albania'),
(3, 'dz', 'Algeria'),
(4, 'as', 'American Samoa'),
(5, 'ad', 'Andorra'),
(6, 'ao', 'Angola'),
(7, 'ai', 'Anguilla'),
(8, 'aq', 'Antarctica'),
(9, 'ag', 'Antigua and Barbuda'),
(10, 'ar', 'Argentina'),
(11, 'am', 'Armenia'),
(12, 'aw', 'Aruba'),
(13, 'au', 'Australia'),
(14, 'at', 'Austria'),
(15, 'az', 'Azerbaijan'),
(16, 'bs', 'Bahamas'),
(17, 'bh', 'Bahrain'),
(18, 'bd', 'Bangladesh'),
(19, 'bb', 'Barbados'),
(20, 'by', 'Belarus'),
(21, 'be', 'Belgium'),
(22, 'bz', 'Belize'),
(23, 'bj', 'Benin'),
(24, 'bm', 'Bermuda'),
(25, 'bt', 'Bhutan'),
(26, 'bo', 'Bolivia'),
(27, 'ba', 'Bosnia and Herzegovina'),
(28, 'bw', 'Botswana'),
(29, 'bv', 'Bouvet Island'),
(30, 'br', 'Brazil'),
(31, 'io', 'British Indian Ocean Territory'),
(32, 'bn', 'Brunei Darussalam'),
(33, 'bg', 'Bulgaria'),
(34, 'bf', 'Burkina Faso'),
(35, 'bi', 'Burundi'),
(36, 'kh', 'Cambodia'),
(37, 'cm', 'Cameroon'),
(38, 'ca', 'Canada'),
(39, 'cv', 'Cape Verde'),
(40, 'ky', 'Cayman Islands'),
(41, 'cf', 'Central African Republic'),
(42, 'td', 'Chad'),
(43, 'cl', 'Chile'),
(44, 'cn', 'China'),
(45, 'cx', 'Christmas Island'),
(46, 'cc', 'Cocos (Keeling) Islands'),
(47, 'co', 'Colombia'),
(48, 'km', 'Comoros'),
(49, 'cg', 'Congo'),
(50, 'cd', 'Congo, the Democratic Republic of the'),
(51, 'ck', 'Cook Islands'),
(52, 'cr', 'Costa Rica'),
(53, 'hr', 'Croatia'),
(54, 'cu', 'Cuba'),
(55, 'cy', 'Cyprus'),
(56, 'cz', 'Czech Republic'),
(57, 'dk', 'Denmark'),
(58, 'dj', 'Djibouti'),
(59, 'dm', 'Dominica'),
(60, 'do', 'Dominican Republic'),
(61, 'ec', 'Ecuador'),
(62, 'eg', 'Egypt'),
(63, 'sv', 'El Salvador'),
(64, 'gq', 'Equatorial Guinea'),
(65, 'er', 'Eritrea'),
(66, 'ee', 'Estonia'),
(67, 'et', 'Ethiopia'),
(68, 'fk', 'Falkland Islands (Malvinas)'),
(69, 'fo', 'Faroe Islands'),
(70, 'fj', 'Fiji'),
(71, 'fi', 'Finland'),
(72, 'fr', 'France'),
(73, 'gf', 'French Guiana'),
(74, 'pf', 'French Polynesia'),
(75, 'tf', 'French Southern Territories'),
(76, 'ga', 'Gabon'),
(77, 'gm', 'Gambia'),
(78, 'ge', 'Georgia'),
(79, 'de', 'Germany'),
(80, 'gh', 'Ghana'),
(81, 'gi', 'Gibraltar'),
(82, 'gr', 'Greece'),
(83, 'gl', 'Greenland'),
(84, 'gd', 'Grenada'),
(85, 'gp', 'Guadeloupe'),
(86, 'gu', 'Guam'),
(87, 'gt', 'Guatemala'),
(88, 'gn', 'Guinea'),
(89, 'gw', 'Guinea-Bissau'),
(90, 'gy', 'Guyana'),
(91, 'ht', 'Haiti'),
(92, 'hm', 'Heard Island and Mcdonald Islands'),
(93, 'va', 'Holy See (Vatican City State)'),
(94, 'hn', 'Honduras'),
(95, 'hk', 'Hong Kong'),
(96, 'hu', 'Hungary'),
(97, 'is', 'Iceland'),
(98, 'in', 'India'),
(99, 'id', 'Indonesia'),
(100, 'ir', 'Iran, Islamic Republic of'),
(101, 'iq', 'Iraq'),
(102, 'ie', 'Ireland'),
(103, 'il', 'Israel'),
(104, 'it', 'Italy'),
(105, 'jm', 'Jamaica'),
(106, 'jp', 'Japan'),
(107, 'jo', 'Jordan'),
(108, 'kz', 'Kazakhstan'),
(109, 'ke', 'Kenya'),
(110, 'ki', 'Kiribati'),
(111, 'kr', 'Korea, Republic of'),
(112, 'kw', 'Kuwait'),
(113, 'kg', 'Kyrgyzstan'),
(114, 'lv', 'Latvia'),
(115, 'lb', 'Lebanon'),
(116, 'ls', 'Lesotho'),
(117, 'lr', 'Liberia'),
(118, 'ly', 'Libyan Arab Jamahiriya'),
(119, 'li', 'Liechtenstein'),
(120, 'lt', 'Lithuania'),
(121, 'lu', 'Luxembourg'),
(122, 'mo', 'Macao'),
(123, 'mk', 'Macedonia, the Former Yugosalv Republic of'),
(124, 'mg', 'Madagascar'),
(125, 'mw', 'Malawi'),
(126, 'my', 'Malaysia'),
(127, 'mv', 'Maldives'),
(128, 'ml', 'Mali'),
(129, 'mt', 'Malta'),
(130, 'mh', 'Marshall Islands'),
(131, 'mq', 'Martinique'),
(132, 'mr', 'Mauritania'),
(133, 'mu', 'Mauritius'),
(134, 'yt', 'Mayotte'),
(135, 'mx', 'Mexico'),
(136, 'fm', 'Micronesia, Federated States of'),
(137, 'md', 'Moldova, Republic of'),
(138, 'mc', 'Monaco'),
(139, 'mn', 'Mongolia'),
(140, 'ms', 'Montserrat'),
(141, 'ma', 'Morocco'),
(142, 'mz', 'Mozambique'),
(143, 'mm', 'Myanmar'),
(144, 'na', 'Namibia'),
(145, 'nr', 'Nauru'),
(146, 'np', 'Nepal'),
(147, 'nl', 'Netherlands'),
(148, 'an', 'Netherlands Antilles'),
(149, 'nc', 'New Caledonia'),
(150, 'nz', 'New Zealand'),
(151, 'ni', 'Nicaragua'),
(152, 'ne', 'Niger'),
(153, 'ng', 'Nigeria'),
(154, 'nu', 'Niue'),
(155, 'nf', 'Norfolk Island'),
(156, 'mp', 'Northern Mariana Islands'),
(157, 'no', 'Norway'),
(158, 'om', 'Oman'),
(159, 'pk', 'Pakistan'),
(160, 'pw', 'Palau'),
(161, 'ps', 'Palestinian Territory, Occupied'),
(162, 'pa', 'Panama'),
(163, 'pg', 'Papua New Guinea'),
(164, 'py', 'Paraguay'),
(165, 'pe', 'Peru'),
(166, 'ph', 'Philippines'),
(167, 'pn', 'Pitcairn'),
(168, 'pl', 'Poland'),
(169, 'pt', 'Portugal'),
(170, 'pr', 'Puerto Rico'),
(171, 'qa', 'Qatar'),
(172, 're', 'Reunion'),
(173, 'ro', 'Romania'),
(174, 'ru', 'Russian Federation'),
(175, 'rw', 'Rwanda'),
(176, 'sh', 'Saint Helena'),
(177, 'kn', 'Saint Kitts and Nevis'),
(178, 'lc', 'Saint Lucia'),
(179, 'pm', 'Saint Pierre and Miquelon'),
(180, 'vc', 'Saint Vincent and the Grenadines'),
(181, 'ws', 'Samoa'),
(182, 'sm', 'San Marino'),
(183, 'st', 'Sao Tome and Principe'),
(184, 'sa', 'Saudi Arabia'),
(185, 'sn', 'Senegal'),
(186, 'rs', 'Serbia and Montenegro'),
(187, 'sc', 'Seychelles'),
(188, 'sl', 'Sierra Leone'),
(189, 'sg', 'Singapore'),
(190, 'sk', 'Slovakia'),
(191, 'si', 'Slovenia'),
(192, 'sb', 'Solomon Islands'),
(193, 'so', 'Somalia'),
(194, 'za', 'South Africa'),
(195, 'gs', 'South Georgia and the South Sandwich Islands'),
(196, 'es', 'Spain'),
(197, 'lk', 'Sri Lanka'),
(198, 'sd', 'Sudan'),
(199, 'sr', 'Suriname'),
(200, 'sj', 'Svalbard and Jan Mayen'),
(201, 'sz', 'Swaziland'),
(202, 'se', 'Sweden'),
(203, 'ch', 'Switzerland'),
(204, 'sy', 'Syrian Arab Republic'),
(205, 'tw', 'Taiwan, Province of China'),
(206, 'tj', 'Tajikistan'),
(207, 'tz', 'Tanzania, United Republic of'),
(208, 'th', 'Thailand'),
(209, 'tl', 'Timor-Leste'),
(210, 'tg', 'Togo'),
(211, 'tk', 'Tokelau'),
(212, 'to', 'Tonga'),
(213, 'tt', 'Trinidad and Tobago'),
(214, 'tn', 'Tunisia'),
(215, 'tr', 'Turkey'),
(216, 'tm', 'Turkmenistan'),
(217, 'tc', 'Turks and Caicos Islands'),
(218, 'tv', 'Tuvalu'),
(219, 'ug', 'Uganda'),
(220, 'ua', 'Ukraine'),
(221, 'ae', 'United Arab Emirates'),
(222, 'uk', 'United Kingdom'),
(223, 'gb', 'United Kingdom'),
(224, 'us', 'United States'),
(225, 'um', 'United States Minor Outlying Islands'),
(226, 'uy', 'Uruguay'),
(227, 'uz', 'Uzbekistan'),
(228, 'vu', 'Vanuatu'),
(229, 've', 'Venezuela'),
(230, 'vn', 'Viet Nam'),
(231, 'vg', 'Virgin Islands, British'),
(232, 'vi', 'Virgin Islands, U.S.'),
(233, 'wf', 'Wallis and Futuna'),
(234, 'eh', 'Western Sahara'),
(235, 'ye', 'Yemen'),
(236, 'zm', 'Zambia'),
(237, 'zw', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `kt_google_languages`
--

CREATE TABLE `kt_google_languages` (
  `id` int(11) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  `language_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kt_google_languages`
--

INSERT INTO `kt_google_languages` (`id`, `language_code`, `language_name`) VALUES
(1, 'af', 'Afrikaans'),
(2, 'ak', 'Akan'),
(3, 'sq', 'Albanian'),
(4, 'ws', 'Samoa'),
(5, 'am', 'Amharic'),
(6, 'ar', 'Arabic'),
(7, 'hy', 'Armenian'),
(8, 'az', 'Azerbaijani'),
(9, 'eu', 'Basque'),
(10, 'be', 'Belarusian'),
(11, 'bem', 'Bemba'),
(12, 'bn', 'Bengali'),
(13, 'bh', 'Bihari'),
(14, 'xx-bo', 'Bork, bork, bork!'),
(15, 'bs', 'Bosnian'),
(16, 'br', 'Breton'),
(17, 'bg', 'Bulgarian'),
(18, 'bt', 'Bhutanese'),
(19, 'km', 'Cambodian'),
(20, 'ca', 'Catalan'),
(21, 'chr', 'Cherokee'),
(22, 'ny', 'Chichewa'),
(23, 'zh-cn', 'Chinese (Simplified)'),
(24, 'zh-tw', 'Chinese (Traditional)'),
(25, 'co', 'Corsican'),
(26, 'hr', 'Croatian'),
(27, 'cs', 'Czech'),
(28, 'da', 'Danish'),
(29, 'nl', 'Dutch'),
(30, 'xx-el', 'Elmer Fudd'),
(31, 'en', 'English'),
(32, 'eo', 'Esperanto'),
(33, 'et', 'Estonian'),
(34, 'ee', 'Ewe'),
(35, 'fo', 'Faroese'),
(36, 'tl', 'Filipino'),
(37, 'fi', 'Finnish'),
(38, 'fr', 'French'),
(39, 'fy', 'Frisian'),
(40, 'gaa', 'Ga'),
(41, 'gl', 'Galician'),
(42, 'ka', 'Georgian'),
(43, 'de', 'German'),
(44, 'el', 'Greek'),
(45, 'kl', 'Greenlandic'),
(46, 'gn', 'Guarani'),
(47, 'gu', 'Gujarati'),
(48, 'xx-ha', 'Hacker'),
(49, 'ht', 'Haitian Creole'),
(50, 'ha', 'Hausa'),
(51, 'haw', 'Hawaiian'),
(52, 'iw', 'Hebrew'),
(53, 'hi', 'Hindi'),
(54, 'hu', 'Hungarian'),
(55, 'is', 'Icelandic'),
(56, 'ig', 'Igbo'),
(57, 'id', 'Indonesian'),
(58, 'ia', 'Interlingua'),
(59, 'ga', 'Irish'),
(60, 'it', 'Italian'),
(61, 'ja', 'Japanese'),
(62, 'jw', 'Javanese'),
(63, 'kn', 'Kannada'),
(64, 'kk', 'Kazakh'),
(65, 'rw', 'Kinyarwanda'),
(66, 'rn', 'Kirundi'),
(67, 'xx-kl', 'Klingon'),
(68, 'kg', 'Kongo'),
(69, 'ko', 'Korean'),
(70, 'kri', 'Krio (Sierra Leone)'),
(71, 'ku', 'Kurdish'),
(72, 'ckb', 'Kurdish (Soranî)'),
(73, 'ky', 'Kyrgyz'),
(74, 'lo', 'Laothian'),
(75, 'la', 'Latin'),
(76, 'lv', 'Latvian'),
(77, 'ln', 'Lingala'),
(78, 'lt', 'Lithuanian'),
(79, 'loz', 'Lozi'),
(80, 'lg', 'Luganda'),
(81, 'ach', 'Luo'),
(82, 'mk', 'Macedonian'),
(83, 'mg', 'Malagasy'),
(84, 'my', 'Malay'),
(85, 'ml', 'Malayalam'),
(86, 'mt', 'Maltese'),
(87, 'mv', 'Maldives'),
(88, 'mi', 'Maori'),
(89, 'mr', 'Marathi'),
(90, 'mfe', 'Mauritian Creole'),
(91, 'mo', 'Moldavian'),
(92, 'mn', 'Mongolian'),
(93, 'sr-me', 'Montenegrin'),
(94, 'ne', 'Nepali'),
(95, 'pcm', 'Nigerian Pidgin'),
(96, 'nso', 'Northern Sotho'),
(97, 'no', 'Norwegian'),
(98, 'nn', 'Norwegian (Nynorsk)'),
(99, 'oc', 'Occitan'),
(100, 'or', 'Oriya'),
(101, 'om', 'Oromo'),
(102, 'ps', 'Pashto'),
(103, 'fa', 'Persian'),
(104, 'xx-pi', 'Pirate'),
(105, 'pl', 'Polish'),
(106, 'pt', 'Portuguese'),
(107, 'pt-br', 'Portuguese (Brazil)'),
(108, 'pt-pt', 'Portuguese (Portugal)'),
(109, 'pa', 'Punjabi'),
(110, 'qu', 'Quechua'),
(111, 'ro', 'Romanian'),
(112, 'rm', 'Romansh'),
(113, 'nyn', 'Runyakitara'),
(114, 'ru', 'Russian'),
(115, 'gd', 'Scots Gaelic'),
(116, 'sr', 'Serbian'),
(117, 'sh', 'Serbo-Croatian'),
(118, 'st', 'Sesotho'),
(119, 'tn', 'Setswana'),
(120, 'crs', 'Seychellois Creole'),
(121, 'sn', 'Shona'),
(122, 'sd', 'Sindhi'),
(123, 'si', 'Sinhalese'),
(124, 'sk', 'Slovak'),
(125, 'sl', 'Slovenian'),
(126, 'so', 'Somali'),
(127, 'es', 'Spanish'),
(128, 'es-41', 'Spanish (Latin American)'),
(129, 'su', 'Sundanese'),
(130, 'sw', 'Swahili'),
(131, 'sv', 'Swedish'),
(132, 'tg', 'Tajik'),
(133, 'ta', 'Tamil'),
(134, 'tt', 'Tatar'),
(135, 'te', 'Telugu'),
(136, 'th', 'Thai'),
(137, 'ti', 'Tigrinya'),
(138, 'to', 'Tonga'),
(139, 'lua', 'Tshiluba'),
(140, 'tum', 'Tumbuka'),
(141, 'tr', 'Turkish'),
(142, 'tk', 'Turkmen'),
(143, 'tw', 'Twi'),
(144, 'ug', 'Uighur'),
(145, 'uk', 'Ukrainian'),
(146, 'ur', 'Urdu'),
(147, 'uz', 'Uzbek'),
(148, 'vu', 'Vanuatu'),
(149, 'vi', 'Vietnamese'),
(150, 'cy', 'Welsh'),
(151, 'wo', 'Wolof'),
(152, 'xh', 'Xhosa'),
(153, 'yi', 'Yiddish'),
(154, 'yo', 'Yoruba'),
(155, 'zu', 'Zulu');

-- --------------------------------------------------------

--
-- Table structure for table `kt_languages`
--

CREATE TABLE `kt_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kt_languages`
--

INSERT INTO `kt_languages` (`id`, `name`, `language_code`, `created_at`, `updated_at`) VALUES
(1, 'Albanian', 'sq', NULL, NULL),
(2, 'Amharic', 'sm', NULL, NULL),
(3, 'Afrikaans', 'af', NULL, NULL),
(4, 'Arabic', 'ar', NULL, NULL),
(5, 'Azerbaijani', 'az', NULL, NULL),
(6, 'Basque', 'eu', NULL, NULL),
(7, 'Belarusian', 'be', NULL, NULL),
(8, 'Bengali', 'bn', NULL, NULL),
(9, 'Bihari', 'bh', NULL, NULL),
(10, 'Bosnian', 'bs', NULL, NULL),
(11, 'Bulgarian', 'bg', NULL, NULL),
(12, 'Catalan', 'ca', NULL, NULL),
(13, 'Chinese (Simplified)', 'zh-CN', NULL, NULL),
(14, 'Chinese (Traditional)', 'zh-TW', NULL, NULL),
(15, 'Croatian', 'hr', NULL, NULL),
(16, 'Czech', 'cs', NULL, NULL),
(17, 'Danish', 'da', NULL, NULL),
(18, 'Dutch', 'nl', NULL, NULL),
(19, 'English', 'en', NULL, NULL),
(20, 'Esperanto', 'eo', NULL, NULL),
(21, 'Estonian', 'et', NULL, NULL),
(22, 'Faroese', 'fo', NULL, NULL),
(23, 'Finnish', 'fi', NULL, NULL),
(24, 'French', 'fr', NULL, NULL),
(25, 'Frisian', 'fy', NULL, NULL),
(26, 'Galician', 'gl', NULL, NULL),
(27, 'Georgian', 'ka', NULL, NULL),
(28, 'German', 'de', NULL, NULL),
(29, 'Greek', 'el', NULL, NULL),
(30, 'Gujarati', 'gu', NULL, NULL),
(31, 'Hebrew', 'iw', NULL, NULL),
(32, 'Hindi', 'hi', NULL, NULL),
(33, 'Hungarian', 'hu', NULL, NULL),
(34, 'Icelandic', 'is', NULL, NULL),
(35, 'Indonesian', 'id', NULL, NULL),
(36, 'Interlingua', 'ia', NULL, NULL),
(37, 'Irish', 'ga', NULL, NULL),
(38, 'Italian', 'it', NULL, NULL),
(39, 'Japanese', 'ja', NULL, NULL),
(40, 'Javanese', 'jw', NULL, NULL),
(41, 'Kannada', 'kn', NULL, NULL),
(42, 'Korean', 'ko', NULL, NULL),
(43, 'Latin', 'la', NULL, NULL),
(44, 'Latvian', 'lv', NULL, NULL),
(45, 'Lithuanian', 'lt', NULL, NULL),
(46, 'Macedonian', 'mk', NULL, NULL),
(47, 'Malay', 'ms', NULL, NULL),
(48, 'Malayam', 'ml', NULL, NULL),
(49, 'Maltese', 'mt', NULL, NULL),
(50, 'Marathi', 'mr', NULL, NULL),
(51, 'Nepali', 'ne', NULL, NULL),
(52, 'Norwegian', 'no', NULL, NULL),
(53, 'Norwegian (Nynorsk)', 'nn', NULL, NULL),
(54, 'Occitan', 'oc', NULL, NULL),
(55, 'Persian', 'fa', NULL, NULL),
(56, 'Polish', 'pl', NULL, NULL),
(57, 'Portuguese (Brazil)', 'pt-BR', NULL, NULL),
(58, 'Portuguese (Portugal)', 'pt-PT', NULL, NULL),
(59, 'Punjabi', 'pa', NULL, NULL),
(60, 'Romanian', 'ro', NULL, NULL),
(61, 'Russian', 'ru', NULL, NULL),
(62, 'Scots Gaelic', 'gd', NULL, NULL),
(63, 'Serbian', 'sr', NULL, NULL),
(64, 'Sinhalese', 'si', NULL, NULL),
(65, 'Slovak', 'sk', NULL, NULL),
(66, 'Slovenian', 'sl', NULL, NULL),
(67, 'Spanish', 'es', NULL, NULL),
(68, 'Sudanese', 'su', NULL, NULL),
(69, 'Swahili', 'sw', NULL, NULL),
(70, 'Swedish', 'sv', NULL, NULL),
(71, 'Tagalog', 'tl', NULL, NULL),
(72, 'Tamil', 'ta', NULL, NULL),
(73, 'Telugu', 'te', NULL, NULL),
(74, 'Thai', 'th', NULL, NULL),
(75, 'Tigrinya', 'ti', NULL, NULL),
(76, 'Turkish', 'tr', NULL, NULL),
(77, 'Ukrainian', 'uk', NULL, NULL),
(78, 'Urdu', 'ur', NULL, NULL),
(79, 'Uzbek', 'uz', NULL, NULL),
(80, 'Vietnamese', 'vi', NULL, NULL),
(81, 'Welsh', 'cy', NULL, NULL),
(82, 'Xhosa', 'xh', NULL, NULL),
(83, 'Zulu', 'zu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kt_list`
--

CREATE TABLE `kt_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kt_list_transactions`
--

CREATE TABLE `kt_list_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `list_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kt_twitter_languages`
--

CREATE TABLE `kt_twitter_languages` (
  `id` int(11) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  `language_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kt_twitter_languages`
--

INSERT INTO `kt_twitter_languages` (`id`, `language_code`, `language_name`) VALUES
(1, 'en', 'English'),
(2, 'ar', 'Arabic'),
(3, 'bn', 'Bengali'),
(4, 'cs', 'Czech'),
(5, 'da', 'Danish'),
(6, 'de', 'German'),
(7, 'el', 'Greek'),
(8, 'es', 'Spanish'),
(9, 'fa', 'Persian'),
(10, 'fi', 'Finnish'),
(11, 'fil', 'Filipino'),
(12, 'fr', 'French'),
(13, 'he', 'Hebrew'),
(14, 'hi', 'Hindi'),
(15, 'hu', 'Hungarian'),
(16, 'id', 'Indonesian'),
(17, 'it', 'Italian'),
(18, 'ja', 'Japanese'),
(19, 'ko', 'Korean'),
(20, 'msa', 'Malay'),
(21, 'nl', 'Dutch'),
(22, 'no', 'Norwegian'),
(23, 'pl', 'Polish'),
(24, 'pt', 'Portuguese'),
(25, 'ro', 'Romanian'),
(26, 'ru', 'Russian'),
(27, 'sv', 'Swedish'),
(28, 'th', 'Thai'),
(29, 'tr', 'Turkish'),
(30, 'uk', 'Ukrainian'),
(31, 'ur', 'Urdu'),
(32, 'vi', 'Vietnamese'),
(33, 'zh-cn', 'Chinese (Simplified)'),
(34, 'zh-tw', 'Chinese (Traditional)');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_03_122016_create_kt_languages_table', 1),
(6, '2022_02_06_175224_create_kt_list_table', 2),
(7, '2022_02_06_175402_create_kt_list_transactions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kt_google_countries`
--
ALTER TABLE `kt_google_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kt_google_languages`
--
ALTER TABLE `kt_google_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kt_languages`
--
ALTER TABLE `kt_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kt_list`
--
ALTER TABLE `kt_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kt_list_transactions`
--
ALTER TABLE `kt_list_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kt_twitter_languages`
--
ALTER TABLE `kt_twitter_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kt_google_countries`
--
ALTER TABLE `kt_google_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `kt_google_languages`
--
ALTER TABLE `kt_google_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `kt_languages`
--
ALTER TABLE `kt_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `kt_list`
--
ALTER TABLE `kt_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kt_list_transactions`
--
ALTER TABLE `kt_list_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kt_twitter_languages`
--
ALTER TABLE `kt_twitter_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
