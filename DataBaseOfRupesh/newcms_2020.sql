-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2023 at 11:09 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newcms_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtm_analytics_feed`
--

DROP TABLE IF EXISTS `dtm_analytics_feed`;
CREATE TABLE IF NOT EXISTS `dtm_analytics_feed` (
  `feed_id` varchar(100) NOT NULL,
  `profile_id` varchar(100) NOT NULL,
  `total_traffic` varchar(100) DEFAULT NULL,
  `new_traffic` varchar(100) DEFAULT NULL,
  `returning_traffic` varchar(100) DEFAULT NULL,
  `total_referral_traffic` varchar(100) DEFAULT NULL,
  `direct_traffic` varchar(100) DEFAULT NULL,
  `search_engine` varchar(100) DEFAULT NULL,
  `organic` varchar(100) DEFAULT NULL,
  `ppc` varchar(100) DEFAULT NULL,
  `australia_traffic` varchar(100) DEFAULT NULL,
  `total_page_views` varchar(100) DEFAULT NULL,
  `unique_visitors` varchar(100) DEFAULT NULL,
  `top_sources_referral` text,
  `top_organic_traffic` text,
  `top_keywords_organic` text,
  `top_keywords_ppc` text,
  `total_bounce_rate` varchar(100) DEFAULT NULL,
  `top_entry_page` text,
  `top_exit_page` text,
  `goal_data` text,
  `no_pages_index` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_analytics_feed`
--

INSERT INTO `dtm_analytics_feed` (`feed_id`, `profile_id`, `total_traffic`, `new_traffic`, `returning_traffic`, `total_referral_traffic`, `direct_traffic`, `search_engine`, `organic`, `ppc`, `australia_traffic`, `total_page_views`, `unique_visitors`, `top_sources_referral`, `top_organic_traffic`, `top_keywords_organic`, `top_keywords_ppc`, `total_bounce_rate`, `top_entry_page`, `top_exit_page`, `goal_data`, `no_pages_index`, `start_date`, `end_date`) VALUES
('39324598012015', '39324598', '66', '49', '17', '9', '17', '40', '40', '0', '52', '837', '61', 'semalt.semalt.com,rusk.com.au,buttons-for-website.com,datelinecity.com', 'google,bing,ask', '(not provided),hair health & beauty richmond,hair health and beauty,hair health and beauty sydney,hair warehouse bondi junction,hairdressing products wholesale', '', '33.3333333333', '/,/about-hhb,/authorised,/locations,/login,/brand-list/hair-dressing-industry/shampoo', '/,/login,/locations,/about-hhb,/authorised,/contact-us', '', '', '2015-01-01', '2015-01-31'),
('39324598122014', '39324598', '4965', '3205', '1760', '323', '1573', '3069', '3069', '0', '4454', '46359', '3356', 'semalt.semalt.com,buttons-for-website.com,make-money-online.7makemoneyonline.com,rusk.com.au,us2.campaign-archive2.com,hhb.us2.list-manage.com', 'google,bing,yahoo,ask,avg', '(not provided),hair health and beauty,hhb,hair health and beauty bondi junction,hair health and beauty parramatta,hair health & beauty', '', '33.4743202417', '/,/login,/locations,/product-list/beauty-industry/uv-gel-products/artistic-nail-design/artistic-colour-gloss-range,/contact-us,/authorised', '/,/locations,/login,/contact-us,/hair,/product-list/hair-dressing-industry', '', '', '2014-12-01', '2014-12-31'),
('39324598112014', '39324598', '965', '724', '241', '68', '300', '597', '597', '0', '831', '8508', '738', 'semalt.semalt.com,buttons-for-website.com,rusk.com.au,datelinecity.com,m.truelocal.com.au,mail.thehairrealm.com.au', 'google,bing,yahoo,avg', '(not provided),hair health and beauty,hhb,hair health and beauty bondi junction,bhair health and beauty bondi junction,hair health and beauty at parramatta', '', '32.2279792746', '/,/login,/locations,/contact-us,/authorised,/product-list/hair-dressing-industry', '/,/locations,/login,/contact-us,/product-list/hair-dressing-industry,/hair', '', '', '2014-11-01', '2014-11-30'),
('39324598102014', '39324598', '900', '400', '700', '85', '200', '350', '950', '0', '345', '456', '890', '', '', '', '', '32.2279792746', '', '', '', '', '2014-02-01', '2014-02-28'),
('39324598092014', '39324598', '560', '567', '500', '55', '345', '765', '456', '0', '567', '987', '786', '', '', '', '', '', '', '', '', '', '2013-09-01', '2013-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_analytics_goal`
--

DROP TABLE IF EXISTS `dtm_analytics_goal`;
CREATE TABLE IF NOT EXISTS `dtm_analytics_goal` (
  `profile_id` varchar(256) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `goal_name` varchar(256) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dtm_banner`
--

DROP TABLE IF EXISTS `dtm_banner`;
CREATE TABLE IF NOT EXISTS `dtm_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_title` varchar(200) DEFAULT NULL,
  `image_alt` varchar(200) DEFAULT NULL,
  `slug_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_banner`
--

INSERT INTO `dtm_banner` (`id`, `title`, `image_name`, `image_title`, `image_alt`, `slug_id`, `status`, `created_date`, `updated_date`, `deleted_date`) VALUES
(13, '', '', NULL, NULL, 99, '1', '2016-08-31 00:00:00', NULL, NULL),
(23, '', '', '', '', 101, '1', '2017-01-27 04:15:23', NULL, NULL),
(18, '', '', '', '', 88, '1', '2016-08-31 16:59:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dtm_block`
--

DROP TABLE IF EXISTS `dtm_block`;
CREATE TABLE IF NOT EXISTS `dtm_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `block_key` varchar(30) DEFAULT NULL,
  `module_key` varchar(30) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `access_type` enum('public','private') NOT NULL,
  `visible` enum('All','Selected','Exclude') DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `block_type` enum('front','admin') NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_block`
--

INSERT INTO `dtm_block` (`id`, `name`, `block_key`, `module_key`, `sort_order`, `status`, `access_type`, `visible`, `position`, `block_type`, `created_date`) VALUES
(2, 'Header', 'block_header', 'mod_admin', 2, '1', 'private', 'All', 'top', 'admin', '2012-12-21 14:46:51'),
(3, 'Left', 'block_left', 'mod_admin', 3, '1', 'private', 'All', 'left', 'admin', '2012-12-21 14:51:30'),
(4, 'Breadcrumb', 'block_breadcrumb', 'mod_admin', 4, '1', 'private', 'All', 'breadcrumb', 'admin', '2013-01-23 14:58:04'),
(5, 'Front Header', 'block_header', 'mod_front', 1, '1', 'public', 'All', 'top', 'front', '2014-09-09 00:00:00'),
(6, 'Front Footer', 'block_footer', 'mod_front', 3, '1', 'public', 'All', 'bottom', 'front', '2014-09-14 00:00:00'),
(7, 'Block Slider', 'block_slider', 'mod_slider', 2, '1', 'public', 'All', 'slider', 'front', '0000-00-00 00:00:00'),
(9, 'Header For Order', 'block_header_order', 'mod_order', 2, '1', 'private', 'Selected', 'top', 'front', '2023-02-14 14:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_block_action`
--

DROP TABLE IF EXISTS `dtm_block_action`;
CREATE TABLE IF NOT EXISTS `dtm_block_action` (
  `block_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_block_action`
--

INSERT INTO `dtm_block_action` (`block_id`, `action_id`, `position`) VALUES
(2, 1, 'top'),
(9, 98, 'top'),
(9, 99, 'top');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_configuration`
--

DROP TABLE IF EXISTS `dtm_configuration`;
CREATE TABLE IF NOT EXISTS `dtm_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `config_value` varchar(1000) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `config_key` (`config_key`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_configuration`
--

INSERT INTO `dtm_configuration` (`id`, `config_name`, `config_key`, `config_value`, `created_date`) VALUES
(1, 'Site Name', 'site_name', 'New Cms', '2013-02-26 14:00:55'),
(2, 'Site Address', 'site_address', 'Sydney Suburb', '2013-02-26 14:01:13'),
(3, 'Site Email', 'site_email', 'test.datatechmedia@gmail.com', '2013-02-26 14:01:24'),
(4, 'Enquiry Emails', 'enquiry_emails', 'test.datatechmedia@gmail.com', '2013-02-26 14:01:40'),
(5, 'Meta Title', 'site_meta_title', 'New Cms', '2013-02-26 14:02:07'),
(6, 'Meta Description', 'meta_description', 'New Cms', '2013-02-26 14:02:24'),
(7, 'Meta Keywords', 'meta_keyword', 'New Cms', '2013-02-26 14:02:37'),
(8, 'SEO Header Content', 'seo_header_content', '', '2013-02-26 14:03:06'),
(9, 'SEO Footer Content', 'seo_footer_content', '', '2013-02-26 14:03:17'),
(10, 'Site phone', 'site_phone', '1800156267', '2015-12-17 00:00:00'),
(11, 'Facebook Link', 'facebook', 'https://www.facebook.com/', '2016-04-17 00:00:00'),
(12, 'Youtube Link', 'youtube', 'https://www.youtube.com/?gl=IN', '2016-04-17 00:00:00'),
(13, 'Default Banner', 'flImage_hdn', 'default.jpg', '2016-05-10 00:00:00'),
(14, 'Google Analytic Code', 'google_analytic_code', 'UA-76546141-1', '2016-08-26 00:00:00'),
(15, 'Mailchimp API KEY', 'apikey', 'f5be306ee32c45f72509519aa1670638-us13', '2016-08-26 00:00:00'),
(16, 'Mailchimp List id', 'listid', '81be714a9e', '2016-08-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_contact_enquiry`
--

DROP TABLE IF EXISTS `dtm_contact_enquiry`;
CREATE TABLE IF NOT EXISTS `dtm_contact_enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `enquiry_type` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `enquiry_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_contact_enquiry`
--

INSERT INTO `dtm_contact_enquiry` (`id`, `title`, `first_name`, `last_name`, `email`, `phone`, `location`, `enquiry_type`, `msg`, `status`, `enquiry_date`) VALUES
(1, 'Ms', 'Khyati', 'Patel', 'admin@admin.com', '9999999999', 'Sydney', '', 'This is test message', '0', '2016-05-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_country`
--

DROP TABLE IF EXISTS `dtm_country`;
CREATE TABLE IF NOT EXISTS `dtm_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_country`
--

INSERT INTO `dtm_country` (`id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegowina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Cote D\'Ivoire'),
(53, 'Croatia'),
(54, 'Cuba'),
(55, 'Cyprus'),
(56, 'Czech Republic'),
(57, 'Denmark'),
(58, 'Djibouti'),
(59, 'Dominica'),
(60, 'Dominican Republic'),
(61, 'Timor-Leste'),
(62, 'Ecuador'),
(63, 'Egypt'),
(64, 'El Salvador'),
(65, 'Equatorial Guinea'),
(66, 'Eritrea'),
(67, 'Estonia'),
(68, 'Ethiopia'),
(69, 'Falkland Islands (Malvinas)'),
(70, 'Faroe Islands'),
(71, 'Fiji'),
(72, 'Finland'),
(73, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Indonesia'),
(101, 'Iran (Islamic Republic of)'),
(102, 'Iraq'),
(103, 'Ireland'),
(104, 'Israel'),
(105, 'Italy'),
(106, 'Jamaica'),
(107, 'Japan'),
(108, 'Jordan'),
(109, 'Kazakhstan'),
(110, 'Kenya'),
(111, 'Kiribati'),
(112, 'Korea, Democratic People\'s Republic of'),
(113, 'Korea, Republic of'),
(114, 'Kuwait'),
(115, 'Kyrgyzstan'),
(116, 'Lao People\'s Democratic Republic'),
(117, 'Latvia'),
(118, 'Lebanon'),
(119, 'Lesotho'),
(120, 'Liberia'),
(121, 'Libyan Arab Jamahiriya'),
(122, 'Liechtenstein'),
(123, 'Lithuania'),
(124, 'Luxembourg'),
(125, 'Macao'),
(126, 'Macedonia, The Former Yugoslav Republic of'),
(127, 'Madagascar'),
(128, 'Malawi'),
(129, 'Malaysia'),
(130, 'Maldives'),
(131, 'Mali'),
(132, 'Malta'),
(133, 'Marshall Islands'),
(134, 'Martinique'),
(135, 'Mauritania'),
(136, 'Mauritius'),
(137, 'Mayotte'),
(138, 'Mexico'),
(139, 'Micronesia, Federated States of'),
(140, 'Moldova'),
(141, 'Monaco'),
(142, 'Mongolia'),
(143, 'Montserrat'),
(144, 'Morocco'),
(145, 'Mozambique'),
(146, 'Myanmar'),
(147, 'Namibia'),
(148, 'Nauru'),
(149, 'Nepal'),
(150, 'Netherlands'),
(151, 'Netherlands Antilles'),
(152, 'New Caledonia'),
(153, 'New Zealand'),
(154, 'Nicaragua'),
(155, 'Niger'),
(156, 'Nigeria'),
(157, 'Niue'),
(158, 'Norfolk Island'),
(159, 'Northern Mariana Islands'),
(160, 'Norway'),
(161, 'Oman'),
(162, 'Pakistan'),
(163, 'Palau'),
(164, 'Panama'),
(165, 'Papua New Guinea'),
(166, 'Paraguay'),
(167, 'Peru'),
(168, 'Philippines'),
(169, 'Pitcairn'),
(170, 'Poland'),
(171, 'Portugal'),
(172, 'Puerto Rico'),
(173, 'Qatar'),
(174, 'Reunion'),
(175, 'Romania'),
(176, 'Russian Federation'),
(177, 'Rwanda'),
(178, 'Saint Kitts and Nevis'),
(179, 'Saint Lucia'),
(180, 'Saint Vincent and the Grenadines'),
(181, 'Samoa'),
(182, 'San Marino'),
(183, 'Sao Tome and Principe'),
(184, 'Saudi Arabia'),
(185, 'Senegal'),
(186, 'Seychelles'),
(187, 'Sierra Leone'),
(188, 'Singapore'),
(189, 'Slovakia (Slovak Republic)'),
(190, 'Slovenia'),
(191, 'Solomon Islands'),
(192, 'Somalia'),
(193, 'South Africa'),
(194, 'South Georgia and the South Sandwich Islands'),
(195, 'Spain'),
(196, 'Sri Lanka'),
(197, 'St. Helena'),
(198, 'St. Pierre and Miquelon'),
(199, 'Sudan'),
(200, 'Suriname'),
(201, 'Svalbard and Jan Mayen Islands'),
(202, 'Swaziland'),
(203, 'Sweden'),
(204, 'Switzerland'),
(205, 'Syrian Arab Republic'),
(206, 'Taiwan'),
(207, 'Tajikistan'),
(208, 'Tanzania, United Republic of'),
(209, 'Thailand'),
(210, 'Togo'),
(211, 'Tokelau'),
(212, 'Tonga'),
(213, 'Trinidad and Tobago'),
(214, 'Tunisia'),
(215, 'Turkey'),
(216, 'Turkmenistan'),
(217, 'Turks and Caicos Islands'),
(218, 'Tuvalu'),
(219, 'Uganda'),
(220, 'Ukraine'),
(221, 'UAE'),
(222, 'UK'),
(223, 'USA'),
(224, 'United States Minor Outlying Islands'),
(225, 'Uruguay'),
(226, 'Uzbekistan'),
(227, 'Vanuatu'),
(228, 'Vatican City State (Holy See)'),
(229, 'Venezuela'),
(230, 'Viet Nam'),
(231, 'Virgin Islands (British)'),
(232, 'Virgin Islands (U.S.)'),
(233, 'Wallis and Futuna Islands'),
(234, 'Western Sahara'),
(235, 'Yemen'),
(236, 'Serbia'),
(238, 'Zambia'),
(239, 'Zimbabwe'),
(240, 'Aaland Islands'),
(241, 'Palestinian Territory'),
(242, 'Montenegro'),
(243, 'Guernsey'),
(244, 'Isle of Man'),
(245, 'Jersey');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_country_content`
--

DROP TABLE IF EXISTS `dtm_country_content`;
CREATE TABLE IF NOT EXISTS `dtm_country_content` (
  `country_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `country_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_country_content`
--

INSERT INTO `dtm_country_content` (`country_id`, `lang_id`, `country_name`) VALUES
(1, 1, 'Afghanistan'),
(1, 2, 'अफगानिस्तान '),
(1, 3, 'અફઘાનિસ્તાન '),
(2, 1, 'Albania'),
(2, 2, 'अल्बानिया '),
(2, 3, 'અલ્બેનિયા '),
(3, 1, 'Algeria'),
(3, 2, 'अल्जीरिया '),
(3, 3, 'અલજીર્યા '),
(4, 1, 'American Samoa'),
(4, 2, 'अमेरिकन समोआ '),
(4, 3, 'અમેરિકન સમોઆ '),
(5, 1, 'Andorra'),
(5, 2, 'अंडोरा '),
(5, 3, 'ઍંડોરા '),
(6, 1, 'Angola'),
(6, 2, 'अंगोला '),
(6, 3, 'અંગોલા '),
(7, 1, 'Anguilla'),
(7, 2, 'एंगुइला '),
(7, 3, 'એન્ગુઇલા '),
(8, 1, 'Antarctica'),
(8, 2, 'अंटार्कटिका '),
(8, 3, 'એન્ટાર્કટિકા '),
(9, 1, 'Antigua and Barbuda'),
(9, 2, 'एंटीगुआ और बारबुडा '),
(9, 3, 'એન્ટિગુઆ અને બર્બુડા '),
(10, 1, 'Argentina'),
(10, 2, 'अर्जेंटीना '),
(10, 3, 'અર્જેન્ટીના '),
(11, 1, 'Armenia'),
(11, 2, 'आर्मेनिया '),
(11, 3, 'આર્મીનિયા '),
(12, 1, 'Aruba'),
(12, 2, 'अरूबा '),
(12, 3, 'અરુબા '),
(13, 1, 'Australia'),
(13, 2, 'ऑस्ट्रेलिया '),
(13, 3, 'ઓસ્ટ્રેલિયા '),
(14, 1, 'Austria'),
(14, 2, 'ऑस्ट्रिया '),
(14, 3, 'ઓસ્ટ્રિયા '),
(15, 1, 'Azerbaijan'),
(15, 2, 'अज़रबैजान '),
(15, 3, 'અઝરબૈજાન '),
(16, 1, 'Bahamas'),
(16, 2, 'बहामा '),
(16, 3, 'બહામાસ '),
(17, 1, 'Bahrain'),
(17, 2, 'बहरीन '),
(17, 3, 'બેહરીન '),
(18, 1, 'Bangladesh'),
(18, 2, 'बांग्लादेश '),
(18, 3, 'બાંગ્લાદેશ '),
(19, 1, 'Barbados'),
(19, 2, 'बारबाडोस '),
(19, 3, 'બાર્બાડોસ '),
(20, 1, 'Belarus'),
(20, 2, 'बेलारूस '),
(20, 3, 'બેલારુસ '),
(21, 1, 'Belgium'),
(21, 2, 'बेल्जियम '),
(21, 3, 'બેલ્જિયમ '),
(22, 1, 'Belize'),
(22, 2, 'बेलीज़ '),
(22, 3, 'બેલીઝ '),
(23, 1, 'Benin'),
(23, 2, 'बेनिन '),
(23, 3, 'બેનિન '),
(24, 1, 'Bermuda'),
(24, 2, 'बरमूडा '),
(24, 3, 'બર્મુડા '),
(25, 1, 'Bhutan'),
(25, 2, 'भूटान '),
(25, 3, 'ભૂટાન '),
(26, 1, 'Bolivia'),
(26, 2, 'बोलीविया '),
(26, 3, 'બોલિવિયા '),
(27, 1, 'Bosnia and Herzegowina'),
(27, 2, 'बोस्निया और हर्जेगोविना '),
(27, 3, 'બોસ્નિઆ અને હર્ઝેગોવિનિઆ'),
(28, 1, 'Botswana'),
(28, 2, 'बोत्सवाना '),
(28, 3, 'બોટ્સવાના '),
(29, 1, 'Bouvet Island'),
(29, 2, 'बुवेत आइलैंड '),
(29, 3, 'Bouvet આઇલેન્ડ '),
(30, 1, 'Brazil'),
(30, 2, 'ब्राजील '),
(30, 3, 'બ્રાઝીલ '),
(31, 1, 'British Indian Ocean Territory'),
(31, 2, 'ब्रिटिश हिंद महासागरीय क्षेत्र '),
(31, 3, 'બ્રિટિશ ઇન્ડિયન ઓસન ટેરીટરી '),
(32, 1, 'Brunei Darussalam'),
(32, 2, 'ब्रुनेई दारूस्सलाम '),
(32, 3, 'બ્રુનેઇ દારુસલામ '),
(33, 1, 'Bulgaria'),
(33, 2, 'बुल्गारिया '),
(33, 3, 'બલ્ગેરિયા '),
(34, 1, 'Burkina Faso'),
(34, 2, 'बुर्किना फासो '),
(34, 3, 'બુર્કિના ફાસો '),
(35, 1, 'Burundi'),
(35, 2, 'बुरुंडी '),
(35, 3, 'બરુન્ડી '),
(36, 1, 'Cambodia'),
(36, 2, 'अंगकोर '),
(36, 3, 'અંગકોર '),
(37, 1, 'Cameroon'),
(37, 2, 'कैमरून '),
(37, 3, 'કેમરૂન '),
(38, 1, 'Canada'),
(38, 2, 'कनाडा '),
(38, 3, 'કેનેડા '),
(39, 1, 'Cape Verde'),
(39, 2, 'केप वर्डे '),
(39, 3, 'કેપ વર્દ '),
(40, 1, 'Cayman Islands'),
(40, 2, 'केमैन आइलैंड्स '),
(40, 3, 'કેમેન ટાપુઓ '),
(41, 1, 'Central African Republic'),
(41, 2, 'मध्य अफ्रीकी गणराज्य '),
(41, 3, 'સેન્ટ્રલ આફ્રિકન રિપબ્લિક '),
(42, 1, 'Chad'),
(42, 2, 'चाड '),
(42, 3, 'ચાડ '),
(43, 1, 'Chile'),
(43, 2, 'चिली '),
(43, 3, 'ચીલી '),
(44, 1, 'China'),
(44, 2, 'चीन '),
(44, 3, 'ચાઇના '),
(45, 1, 'Christmas Island'),
(45, 2, 'क्रिसमस द्वीप '),
(45, 3, 'ક્રિસમસ આઇલેન્ડ '),
(46, 1, 'Cocos (Keeling) Islands'),
(46, 2, 'कोकोस (कीलिंग) द्वीप '),
(46, 3, 'કોકોસ (કીલીંગ) આઇલેન્ડ '),
(47, 1, 'Colombia'),
(47, 2, 'कोलम्बिया '),
(47, 3, 'કોલંબિયા '),
(48, 1, 'Comoros'),
(48, 2, 'कोमोरोस '),
(48, 3, 'કોમોરોસ '),
(49, 1, 'Congo'),
(49, 2, 'कांगो '),
(49, 3, 'કોંગો '),
(50, 1, 'Cook Islands'),
(50, 2, 'कुक आइलैंड्स '),
(50, 3, 'કુક આઇલેન્ડ '),
(51, 1, 'Costa Rica'),
(51, 2, 'कोस्टा रिका '),
(51, 3, 'કોસ્ટા રિકા '),
(0, 1, 'Cote D\'Ivoire'),
(0, 2, 'कोटे डी आइवर '),
(53, 1, 'Croatia'),
(53, 2, 'क्रोएशिया '),
(53, 3, 'ક્રોએશિયા '),
(54, 1, 'Cuba'),
(54, 2, 'क्यूबा '),
(54, 3, 'ક્યુબા '),
(55, 1, 'Cyprus'),
(55, 2, 'साइप्रस '),
(55, 3, 'સાયપ્રસ '),
(56, 1, 'Czech Republic'),
(56, 2, 'चेक रिपब्लिक '),
(56, 3, 'ઝેક રીપબ્લીક '),
(57, 1, 'Denmark'),
(57, 2, 'डेनमार्क '),
(57, 3, 'ડેનમાર્ક '),
(58, 1, 'Djibouti'),
(58, 2, 'जिबूती '),
(58, 3, 'જીબુટી '),
(59, 1, 'Dominica'),
(59, 2, 'डोमिनिका '),
(59, 3, 'ડોમિનિકા '),
(60, 1, 'Dominican Republic'),
(60, 2, 'डोमिनिकन गणराज्य '),
(60, 3, 'ડોમિનિકન રિપબ્લિક '),
(61, 1, 'Timor-Leste'),
(61, 2, 'तिमोर- लेस्ते '),
(61, 3, 'ટીમોર લેસ્ટ-'),
(62, 1, 'Ecuador'),
(62, 2, 'इक्वाडोर '),
(62, 3, 'ઇક્વેડોર '),
(63, 1, 'Egypt'),
(63, 2, 'मिस्र '),
(63, 3, 'ઇજીપ્ટ '),
(64, 1, 'El Salvador'),
(64, 2, 'अल साल्वाडोर '),
(64, 3, 'અલ સાલ્વાડોર '),
(65, 1, 'Equatorial Guinea'),
(65, 2, 'इक्वेटोरियल गिनी '),
(65, 3, 'એક્વીટોરીયલ ગીનીયા '),
(66, 1, 'Eritrea'),
(66, 2, 'इरिट्रिया '),
(66, 3, 'એરિટ્રીયા '),
(67, 1, 'Estonia'),
(67, 2, 'एस्टोनिया '),
(67, 3, 'એસ્ટોનિયા '),
(68, 1, 'Ethiopia'),
(68, 2, 'इथियोपिया '),
(68, 3, 'ઇથોપિયા '),
(69, 1, 'Falkland Islands (Malvinas)'),
(69, 2, 'फ़ॉकलैंड द्वीप (माल्विनास) '),
(69, 3, 'ફોકલેન્ડ આઇલેન્ડ (માલવિનસ) '),
(70, 1, 'Faroe Islands'),
(70, 2, 'फरो आइलैंड्स '),
(70, 3, 'ફેરો ટાપુઓ '),
(71, 1, 'Fiji'),
(71, 2, 'फिजी '),
(71, 3, 'ફીજી '),
(72, 1, 'Finland'),
(72, 2, 'फिनलैंड '),
(72, 3, 'ફિનલેન્ડ '),
(73, 1, 'France'),
(73, 2, 'फ्रांस '),
(73, 3, 'ફ્રાન્સ '),
(75, 1, 'French Guiana'),
(75, 2, 'फ्रेंच गयाना '),
(75, 3, 'ફ્રેન્ચ ગુયાના '),
(76, 1, 'French Polynesia'),
(76, 2, 'फ्रेंच पोलिनेशिया '),
(76, 3, 'ફ્રેન્ચ પોલીનેશિયા '),
(77, 1, 'French Southern Territories'),
(77, 2, 'फ़्रांसीसी दक्षिणी क्षेत्र '),
(77, 3, 'ફ્રેંચ સદર્ન ટેરિટરીઝ '),
(78, 1, 'Gabon'),
(78, 2, 'गैबॉन '),
(78, 3, 'ગાબોન '),
(79, 1, 'Gambia'),
(79, 2, 'गाम्बिया '),
(79, 3, 'ગેમ્બિયા '),
(80, 1, 'Georgia'),
(80, 2, 'जॉर्जिया '),
(80, 3, 'જ્યોર્જિયા '),
(81, 1, 'Germany'),
(81, 2, 'जर्मनी '),
(81, 3, 'જર્મની '),
(82, 1, 'Ghana'),
(82, 2, 'घाना '),
(82, 3, 'ઘાના '),
(83, 1, 'Gibraltar'),
(83, 2, 'जिब्राल्टर '),
(83, 3, 'જીબ્રાલ્ટર '),
(84, 1, 'Greece'),
(84, 2, 'ग्रीस '),
(84, 3, 'ગ્રીસ '),
(85, 1, 'Greenland'),
(85, 2, 'ग्रीनलैंड '),
(85, 3, 'ગ્રીનલેન્ડ '),
(86, 1, 'Grenada'),
(86, 2, 'ग्रेनाडा '),
(86, 3, 'ગ્રેનેડા '),
(87, 1, 'Guadeloupe'),
(87, 2, 'गुआदेलूप '),
(87, 3, 'ગ્વાડેલોપ '),
(88, 1, 'Guam'),
(88, 2, 'गुआम '),
(88, 3, 'ગ્વામ '),
(89, 1, 'Guatemala'),
(89, 2, 'ग्वाटेमाला '),
(89, 3, 'ગ્વાટેમાલા '),
(90, 1, 'Guinea'),
(90, 2, 'गिनी '),
(90, 3, 'ગિની '),
(91, 1, 'Guinea-bissau'),
(91, 2, 'गिनी बिसाऊ '),
(91, 3, 'ગિની-બિસુ '),
(92, 1, 'Guyana'),
(92, 2, 'गुयाना '),
(92, 3, 'ગયાના '),
(93, 1, 'Haiti'),
(93, 2, 'हैती '),
(93, 3, 'હૈતી '),
(94, 1, 'Heard and Mc Donald Islands'),
(94, 2, 'हर्ड और Mc डोनाल्ड द्वीप समूह '),
(94, 3, 'હર્ડ અને Mc ડોનાલ્ડ ટાપુઓ '),
(95, 1, 'Honduras'),
(95, 2, 'होंडुरास '),
(95, 3, 'હોન્ડુરાસ '),
(96, 1, 'Hong Kong'),
(96, 2, 'हांगकांग '),
(96, 3, 'હોંગ કોંગ '),
(97, 1, 'Hungary'),
(97, 2, 'हंगरी '),
(97, 3, 'હંગેરી '),
(98, 1, 'Iceland'),
(98, 2, 'आइसलैंड '),
(98, 3, 'આઇસલેન્ડ '),
(99, 1, 'India'),
(99, 2, 'भारत '),
(99, 3, 'ભારત '),
(100, 1, 'Indonesia'),
(100, 2, 'इंडोनेशिया '),
(100, 3, 'ઇન્ડોનેશિયા '),
(101, 1, 'Iran (Islamic Republic of)'),
(101, 2, 'ईरान (इस्लामी गणराज्य) '),
(101, 3, 'ઈરાન (ના ઇસ્લામિક રિપબ્લિક) '),
(102, 1, 'Iraq'),
(102, 2, 'इराक '),
(102, 3, 'ઇરાક '),
(103, 1, 'Ireland'),
(103, 2, 'आयरलैंड '),
(103, 3, 'આયર્લેન્ડ '),
(104, 1, 'Israel'),
(104, 2, 'इसराइल '),
(104, 3, 'ઇઝરાયેલ '),
(105, 1, 'Italy'),
(105, 2, 'इटली '),
(105, 3, 'ઇટાલી '),
(106, 1, 'Jamaica'),
(106, 2, 'जमैका '),
(106, 3, 'જમૈકા '),
(107, 1, 'Japan'),
(107, 2, 'जापान '),
(107, 3, 'જાપાન '),
(108, 1, 'Jordan'),
(108, 2, 'जॉर्डन '),
(108, 3, 'જોર્ડન '),
(109, 1, 'Kazakhstan'),
(109, 2, 'कजाखस्तान '),
(109, 3, 'કઝાકિસ્તાન '),
(110, 1, 'Kenya'),
(110, 2, 'केन्या '),
(110, 3, 'કેન્યા '),
(111, 1, 'Kiribati'),
(111, 2, 'किरिबाती '),
(111, 3, 'કિરિબૅતીના '),
(0, 1, 'Korea, Democratic People\'s Republic of'),
(0, 2, 'कोरिया, डेमोक्रेटिक पीपुल्स रिपब्लिक '),
(0, 3, 'ના કોરિયા, ડેમોક્રેટિક પીપલ્સ રિપબ્લિક '),
(113, 1, 'Korea, Republic of'),
(113, 2, 'कोरिया, गणराज्य '),
(113, 3, 'કોરિયા, ના રિપબ્લિક '),
(114, 1, 'Kuwait'),
(114, 2, 'कुवैत '),
(114, 3, 'કુવૈત '),
(115, 1, 'Kyrgyzstan'),
(115, 2, 'किर्गिस्तान '),
(115, 3, 'કીર્ઘીસ્તાન '),
(0, 1, 'Lao People\'s Democratic Republic'),
(0, 2, 'लाओ पीपुल्स डेमोक्रेटिक रिपब्लिक '),
(0, 3, 'લાઓ પીપલ્સ ડેમોક્રેટિક રિપબ્લિક '),
(117, 1, 'Latvia'),
(117, 2, 'लातविया '),
(117, 3, 'લેટવિયા '),
(118, 1, 'Lebanon'),
(118, 2, 'लेबनान '),
(118, 3, 'લેબનોન '),
(119, 1, 'Lesotho'),
(119, 2, 'लेसोथो '),
(119, 3, 'લેસોથો '),
(120, 1, 'Liberia'),
(120, 2, 'लाइबेरिया '),
(120, 3, 'લાઇબેરીયા '),
(121, 1, 'Libyan Arab Jamahiriya'),
(121, 2, 'लीबिया अरब जमहीरिया '),
(121, 3, 'લિબિયન આરબ Jamahiriya '),
(122, 1, 'Liechtenstein'),
(122, 2, 'लिकटेंस्टीन '),
(122, 3, 'લૈચટેંસ્ટેઇન '),
(123, 1, 'Lithuania'),
(123, 2, 'लिथुआनिया '),
(123, 3, 'લિથુઆનિયા '),
(124, 1, 'Luxembourg'),
(124, 2, 'लक्समबर्ग '),
(124, 3, 'લક્ઝમબર્ગ '),
(125, 1, 'Macao'),
(125, 2, 'मकाऊ '),
(125, 3, 'મકાઓ '),
(126, 1, 'Macedonia, The Former Yugoslav Republic of'),
(126, 2, 'मैसेडोनिया, पूर्व यूगोस्लाव गणराज्य से '),
(126, 3, 'મેસેડોનિયા, ભૂતપૂર્વ યુગોસ્લાવ રીપબ્લિક ઓફ '),
(127, 1, 'Madagascar'),
(127, 2, 'मेडागास्कर '),
(127, 3, 'મેડાગાસ્કર '),
(128, 1, 'Malawi'),
(128, 2, 'मलावी '),
(128, 3, 'મલાવી '),
(129, 1, 'Malaysia'),
(129, 2, 'मलेशिया '),
(129, 3, 'મલેશિયા '),
(130, 1, 'Maldives'),
(130, 2, 'मालदीव '),
(130, 3, 'માલદીવ '),
(131, 1, 'Mali'),
(131, 2, 'माली '),
(131, 3, 'માલી '),
(132, 1, 'Malta'),
(132, 2, 'माल्टा '),
(132, 3, 'માલ્ટા '),
(133, 1, 'Marshall Islands'),
(133, 2, 'मार्शल द्वीप '),
(133, 3, 'માર્શલ આઈલેન્ડ '),
(134, 1, 'Martinique'),
(134, 2, 'मार्टीनिक '),
(134, 3, 'માર્ટિનીક '),
(135, 1, 'Mauritania'),
(135, 2, 'मॉरिटानिया '),
(135, 3, 'મોરીશેનીયા '),
(136, 1, 'Mauritius'),
(136, 2, 'मॉरीशस '),
(136, 3, 'મોરિશિયસ '),
(137, 1, 'Mayotte'),
(137, 2, 'मैयट '),
(137, 3, 'મેયોટ '),
(138, 1, 'Mexico'),
(138, 2, 'मेक्सिको '),
(138, 3, 'મેક્સિકો '),
(139, 1, 'Micronesia, Federated States of'),
(139, 2, 'माइक्रोनेशिया, संघीय राज्य '),
(139, 3, 'માઇક્રોનેશિયા ની ફેડરેટેડ સ્ટેટ્સ '),
(140, 1, 'Moldova'),
(140, 2, 'मोल्दोवा '),
(140, 3, 'મોલ્ડોવા '),
(141, 1, 'Monaco'),
(141, 2, 'मोनाको '),
(141, 3, 'મોનાકો '),
(142, 1, 'Mongolia'),
(142, 2, 'मंगोलिया '),
(142, 3, 'મંગોલિયા '),
(143, 1, 'Montserrat'),
(143, 2, 'मोंटेसेराट '),
(143, 3, 'મોંટસેરાત '),
(144, 1, 'Morocco'),
(144, 2, 'मोरक्को '),
(144, 3, 'મોરોક્કો '),
(145, 1, 'Mozambique'),
(145, 2, 'मोजाम्बिक '),
(145, 3, 'મોઝામ્બિક '),
(146, 1, 'Myanmar'),
(146, 2, 'म्यांमार '),
(146, 3, 'મ્યાનમાર '),
(147, 1, 'Namibia'),
(147, 2, 'नामीबिया '),
(147, 3, 'નામિબિયા '),
(148, 1, 'Nauru'),
(148, 2, 'नाउरू '),
(148, 3, 'નૌરુ '),
(149, 1, 'Nepal'),
(149, 2, 'नेपाल '),
(149, 3, 'નેપાળ '),
(150, 1, 'Netherlands'),
(150, 2, 'नीदरलैंड '),
(150, 3, 'નેધરલેન્ડ '),
(151, 1, 'Netherlands Antilles'),
(151, 2, 'नीदरलैंड एंटिल्स '),
(151, 3, 'નેધરલેન્ડ્સ એન્ટીલ્સ '),
(152, 1, 'New Caledonia'),
(152, 2, 'न्यू कैलेडोनिया '),
(152, 3, 'ન્યુ કેલેડોનીયા '),
(153, 1, 'New Zealand'),
(153, 2, 'न्यूज़ीलैंड '),
(153, 3, 'ન્યુ ઝિલેન્ડ '),
(154, 1, 'Nicaragua'),
(154, 2, 'निकारागुआ '),
(154, 3, 'નિકારાગુઆ '),
(155, 1, 'Niger'),
(155, 2, 'नाइजर '),
(155, 3, 'નાઇજર '),
(156, 1, 'Nigeria'),
(156, 2, 'नाइजीरिया '),
(156, 3, 'નાઇજીરીયા '),
(157, 1, 'Niue'),
(157, 2, 'नियू '),
(157, 3, 'Niue '),
(158, 1, 'Norfolk Island'),
(158, 2, 'नारफोक द्वीप '),
(158, 3, 'નોર્ફોક આઇલેન્ડ '),
(159, 1, 'Northern Mariana Islands'),
(159, 2, 'उत्तरी मारियाना द्वीप '),
(159, 3, 'નોર્ધન મારિયાના આઇલેન્ડ '),
(160, 1, 'Norway'),
(160, 2, 'नॉर्वे '),
(160, 3, 'નોર્વે '),
(161, 1, 'Oman'),
(161, 2, 'ओमान '),
(161, 3, 'ઓમાન '),
(162, 1, 'Pakistan'),
(162, 2, 'पाकिस्तान '),
(162, 3, 'પાકિસ્તાન '),
(163, 1, 'Palau'),
(163, 2, 'पलाऊ '),
(163, 3, 'પલાઉ '),
(164, 1, 'Panama'),
(164, 2, 'पनामा '),
(164, 3, 'પનામા '),
(165, 1, 'Papua New Guinea'),
(165, 2, 'पापुआ न्यू गिनी '),
(165, 3, 'પપુઆ ન્યુ ગીની '),
(166, 1, 'Paraguay'),
(166, 2, 'पराग्वे '),
(166, 3, 'પેરાગ્વે '),
(167, 1, 'Peru'),
(167, 2, 'पेरू '),
(167, 3, 'પેરુ '),
(168, 1, 'Philippines'),
(168, 2, 'फिलीपींस '),
(168, 3, 'ફિલિપાઇન્સ '),
(169, 1, 'Pitcairn'),
(169, 2, 'पिटकेर्न '),
(169, 3, 'Pitcairn '),
(170, 1, 'Poland'),
(170, 2, 'पोलैंड '),
(170, 3, 'પોલેન્ડ '),
(171, 1, 'Portugal'),
(171, 2, 'पुर्तगाल '),
(171, 3, 'પોર્ટુગલ '),
(172, 1, 'Puerto Rico'),
(172, 2, 'प्यूर्टो रिको '),
(172, 3, 'પ્યુઅર્ટો રિકો '),
(173, 1, 'Qatar'),
(173, 2, 'कतर '),
(173, 3, 'કતાર '),
(174, 1, 'Reunion'),
(174, 2, 'रीयूनियन '),
(174, 3, 'રિયુનિયન '),
(175, 1, 'Romania'),
(175, 2, 'रोमानिया '),
(175, 3, 'રોમાનિયા '),
(176, 1, 'Russian Federation'),
(176, 2, 'रूसी संघ '),
(176, 3, 'રશિયન ફેડરેશન '),
(177, 1, 'Rwanda'),
(177, 2, 'रवांडा '),
(177, 3, 'રવાન્ડા '),
(178, 1, 'Saint Kitts and Nevis'),
(178, 2, 'सेंट किट्स और नेविस '),
(178, 3, 'સેન્ટ કિટ્સ અને નેવિસ '),
(179, 1, 'Saint Lucia'),
(179, 2, 'सेंट लूसिया '),
(179, 3, 'સેન્ટ લુસિયા '),
(180, 1, 'Saint Vincent and the Grenadines'),
(180, 2, 'सेंट विंसेंट और ग्रेनेडाइंस '),
(180, 3, 'સેન્ટ વિન્સેન્ટ અને ગ્રેનેડીન્સ '),
(181, 1, 'Samoa'),
(181, 2, 'समोआ '),
(181, 3, 'સમોઆ '),
(182, 1, 'San Marino'),
(182, 2, 'सैन मैरिनो '),
(182, 3, 'સૅન મેરિનો '),
(183, 1, 'Sao Tome and Principe'),
(183, 2, 'साओ टोम और प्रिंसिपे '),
(183, 3, 'સાઓ ટોમ અને પ્રિંસિપી '),
(184, 1, 'Saudi Arabia'),
(184, 2, 'सऊदी अरब '),
(184, 3, 'સાઉદી અરેબિયા '),
(185, 1, 'Senegal'),
(185, 2, 'सेनेगल '),
(185, 3, 'સેનેગલ '),
(186, 1, 'Seychelles'),
(186, 2, 'सेशेल्स '),
(186, 3, 'સીશલ્સ '),
(187, 1, 'Sierra Leone'),
(187, 2, 'सियरा लियोन '),
(187, 3, 'સીયેરા લીયોન '),
(188, 1, 'Singapore'),
(188, 2, 'सिंगापुर '),
(188, 3, 'સિંગાપુર '),
(189, 1, 'Slovakia (Slovak Republic)'),
(189, 2, 'स्लोवाकिया (स्लोवाक गणराज्य) '),
(189, 3, 'સ્લોવેકિયા (Slovak રિપબ્લિક) '),
(190, 1, 'Slovenia'),
(190, 2, 'स्लोवेनिया '),
(190, 3, 'સ્લોવેનીયા '),
(191, 1, 'Solomon Islands'),
(191, 2, 'सोलोमन द्वीप '),
(191, 3, 'સોલોમન આઇલેન્ડ '),
(192, 1, 'Somalia'),
(192, 2, 'सोमालिया '),
(192, 3, 'સોમાલિયા '),
(193, 1, 'South Africa'),
(193, 2, 'दक्षिण अफ्रीका '),
(193, 3, 'દક્ષિણ આફ્રિકા '),
(194, 1, 'South Georgia and the South Sandwich Islands'),
(194, 2, 'दक्षिण जॉर्जिया और साउथ सैंडविच आइलैंड्स '),
(194, 3, 'દક્ષિણ જ્યોર્જિયા અને દક્ષિણ સેન્ડવિચ ટાપુઓ '),
(195, 1, 'Spain'),
(195, 2, 'स्पेन '),
(195, 3, 'સ્પેઇન '),
(196, 1, 'Sri Lanka'),
(196, 2, 'श्रीलंका '),
(196, 3, 'શ્રિલંકા '),
(197, 1, 'St. Helena'),
(197, 2, 'सेंट हेलेना '),
(197, 3, 'સેન્ટ હેલેના '),
(198, 1, 'St. Pierre and Miquelon'),
(198, 2, 'सेंट पियरे और मिकेलॉन '),
(198, 3, 'સેન્ટ બાર્થેલેમી '),
(199, 1, 'Sudan'),
(199, 2, 'सूडान '),
(199, 3, 'સુદાન '),
(200, 1, 'Suriname'),
(200, 2, 'सूरीनाम '),
(200, 3, 'સુરીનામ '),
(201, 1, 'Svalbard and Jan Mayen Islands'),
(201, 2, 'सेंट किट्स और नेविस '),
(201, 3, 'સ્વલબર્ડ એન્ડ જાન માયેન ટાપુઓ '),
(202, 1, 'Swaziland'),
(202, 2, 'स्वाजीलैंड '),
(202, 3, 'સ્વાઝીલેન્ડ '),
(203, 1, 'Sweden'),
(203, 2, 'स्वीडन '),
(203, 3, 'સ્વીડન '),
(204, 1, 'Switzerland'),
(204, 2, 'स्विट्जरलैंड '),
(204, 3, 'સ્વિટ્ઝર્લૅન્ડ '),
(205, 1, 'Syrian Arab Republic'),
(205, 2, 'सीरियाई अरब गणराज्य '),
(205, 3, 'સીરીયન આરબ રીપબ્લીક '),
(206, 1, 'Taiwan'),
(206, 2, 'ताइवान '),
(206, 3, 'તાઇવાન '),
(207, 1, 'Tajikistan'),
(207, 2, 'ताजिकिस्तान '),
(207, 3, 'તાજિકિસ્તાન '),
(208, 1, 'Tanzania, United Republic of'),
(208, 2, 'तंजानिया, संयुक्त गणराज्य '),
(208, 3, 'તાંઝાનિયા, યુનાઈટેડ રિપબ્લિક '),
(209, 1, 'Thailand'),
(209, 2, 'थाईलैंड '),
(209, 3, 'થાઇલેન્ડ '),
(210, 1, 'Togo'),
(210, 2, 'टोगो '),
(210, 3, 'ટોગો '),
(211, 1, 'Tokelau'),
(211, 2, 'तोकेलाउ '),
(211, 3, 'ટોકેલાઉ '),
(212, 1, 'Tonga'),
(212, 2, 'टोंगा '),
(212, 3, 'ટોંગા '),
(213, 1, 'Trinidad and Tobago'),
(213, 2, 'त्रिनिदाद और टोबैगो '),
(213, 3, 'ટ્રિનીદાદ અને ટોબેગો '),
(214, 1, 'Tunisia'),
(214, 2, 'ट्यूनीशिया '),
(214, 3, 'ટ્યુનિશિયા '),
(215, 1, 'Turkey'),
(215, 2, 'तुर्की '),
(215, 3, 'તુર્કી '),
(216, 1, 'Turkmenistan'),
(216, 2, 'तुर्कमेनिस्तान '),
(216, 3, 'તુર્કમેનિસ્તાન '),
(217, 1, 'Turks and Caicos Islands'),
(217, 2, 'टर्क्स और कैकोस द्वीप '),
(217, 3, 'ટર્ક્સ એન્ડ કેઇકોસ આઇલેન્ડ '),
(218, 1, 'Tuvalu'),
(218, 2, 'तुवालू '),
(218, 3, 'તુવાલુ '),
(219, 1, 'Uganda'),
(219, 2, 'युगांडा '),
(219, 3, 'યુગાન્ડા '),
(220, 1, 'Ukraine'),
(220, 2, 'यूक्रेन '),
(220, 3, 'યુક્રેન '),
(221, 1, 'UAE'),
(221, 2, 'संयुक्त अरब अमीरात '),
(221, 3, 'યુએઈ '),
(222, 1, 'UK'),
(222, 2, 'ब्रिटेन '),
(222, 3, 'યુકે '),
(223, 1, 'USA'),
(223, 2, 'अमेरीका '),
(223, 3, 'યુએસએ '),
(224, 1, 'United States Minor Outlying Islands'),
(224, 2, 'संयुक्त राज्य अमेरिका माइनर आउटलाइंग द्वीप '),
(224, 3, 'યુનાઇટેડ સ્ટેટ્સ માઈનોર આઉટલાઈન્ગ ટાપુઓ '),
(225, 1, 'Uruguay'),
(225, 2, 'उरुग्वे '),
(225, 3, 'ઉરુગ્વે '),
(226, 1, 'Uzbekistan'),
(226, 2, 'उजबेकिस्तान '),
(226, 3, 'ઉઝબેકિસ્તાન '),
(227, 1, 'Vanuatu'),
(227, 2, 'वानुअतु '),
(227, 3, 'વેનૌતા '),
(228, 1, 'Vatican City State (Holy See)'),
(228, 2, 'वेटिकन सिटी राज्य (पवित्रा देखें) '),
(228, 3, 'વેટિકન સિટી રહે છે (હોલી સી) '),
(229, 1, 'Venezuela'),
(229, 2, 'वेनेजुएला '),
(229, 3, 'વેનેઝુએલા '),
(230, 1, 'Viet Nam'),
(230, 2, 'वियतनाम '),
(230, 3, 'વિયેતનામ '),
(231, 1, 'Virgin Islands (British)'),
(231, 2, 'वर्जिन द्वीप समूह (ब्रिटिश) '),
(231, 3, 'વર્જીન આઇલેન્ડ (બ્રિટીશ) '),
(232, 1, 'Virgin Islands (U.S.)'),
(232, 2, 'वर्जिन द्वीप समूह (संयुक्त राज्य अमेरिका) '),
(232, 3, 'વર્જીન આઇલેન્ડ (U.S.) '),
(233, 1, 'Wallis and Futuna Islands'),
(233, 2, 'वालिस और फ़्यूचूना द्वीप '),
(233, 3, 'વેલીસ એન્ડ ફ્યુટુના ટાપુઓ '),
(234, 1, 'Western Sahara'),
(234, 2, 'पश्चिमी सहारा '),
(234, 3, 'પશ્ચિમી સહારા '),
(235, 1, 'Yemen'),
(235, 2, 'यमन '),
(235, 3, 'યેમેન '),
(236, 1, 'Serbia'),
(236, 2, 'सर्बिया '),
(236, 3, 'સર્બીયા '),
(238, 1, 'Zambia'),
(238, 2, 'जाम्बिया '),
(238, 3, 'ઝામ્બિયા '),
(239, 1, 'Zimbabwe'),
(239, 2, 'जिम्बाब्वे '),
(239, 3, 'ઝિમ્બાબ્વે '),
(240, 1, 'Aaland Islands'),
(240, 2, 'Aaland द्वीपसमूह '),
(240, 3, 'Aaland ટાપુઓ '),
(241, 1, 'Palestinian Territory'),
(241, 2, 'फ़िलिस्तीन '),
(241, 3, 'પેલેસ્ટીનીયન ટેરીટરી '),
(242, 1, 'Montenegro'),
(242, 2, 'मोंटेनेग्रो '),
(242, 3, 'મોન્ટેનેગ્રો '),
(243, 1, 'Guernsey'),
(243, 2, 'ग्वेर्नसे '),
(243, 3, 'ગર્ન્જ઼ી '),
(244, 1, 'Isle of Man'),
(244, 2, 'आइल ऑफ मैन '),
(244, 3, 'ઇસ્લે ઓફ મૅન '),
(245, 1, 'Jersey'),
(245, 2, 'जर्सी'),
(245, 3, 'જર્સી');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_enquiries`
--

DROP TABLE IF EXISTS `dtm_enquiries`;
CREATE TABLE IF NOT EXISTS `dtm_enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_view` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_enquiries`
--

INSERT INTO `dtm_enquiries` (`id`, `form_title`, `name`, `email`, `phone`, `address`, `state`, `city`, `postcode`, `message`, `created_date`, `is_view`) VALUES
(1, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'G-15,krishna nagar naroda', 'South Australia', 'Ahmedabad', '3823', 'Hello', '2016-08-08 10:04:09', '1'),
(2, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'G-15,krishna nagar naroda', 'Queensland', 'Ahmedabad', '4654', 'fdfdfsd', '2016-08-08 11:06:13', '1'),
(3, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'fkdjfkjdskfjsd', 'New South Wales', 'Ahmedabad', '6546', 'dfsdfsdf', '2016-09-05 11:08:17', '1'),
(4, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'fkdjfkjdskfjsd', 'New South Wales', 'Ahmedabad', '6546', 'dfsdfsdf', '2016-11-10 12:01:36', '1'),
(5, 'Book a free consultation', 'vishal vasani', 'vishal.datatech@gmail.com', '9924 300 801', 'fkdjfkjdskfjsd', 'Tasmania', 'Ahmedabad', '4654', 'dfdfdfdf', '2016-11-18 11:58:45', '1'),
(6, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', '', 'Queensland', '', '', '', '2018-07-17 05:47:51', '1'),
(7, 'Book a free consultation', 'Jignesh Patel', 'vishal.datatech@gmail.com', '9924 300 801', 'G-15,krishna nagar naroda', 'New South Wales', 'Ahmedabad', '7788', 'fdfdf', '2017-03-15 08:44:43', '1'),
(8, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'G-15,krishna nagar naroda', 'Australian Capital Territory', 'Ahmedabad', '7788', '<ol>\r\n<li><em><strong>Vishal vasani</strong></em></li>\r\n<li><em><strong>Gopal vasani</strong></em></li>\r\n<li><em><strong>jayesh thakkar</strong></em></li>\r\n</ol>', '2016-11-18 11:58:54', '1'),
(9, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'fkdjfkjdskfjsd', 'Select State', 'Ahmedabad', '7788', '', '2016-07-11 18:30:00', '0'),
(10, 'Book a free consultation', 'nelson 4r', '4r@gmail.com', '7987 484 848', 'iam no', 'Queensland', 'sdf', '4848', 'dsfdsf', '2016-08-23 11:35:27', '1'),
(11, 'Book a free consultation', 'Vishal Vasani', 'vishal.datatech@gmail.com', '9924 300 801', 'Gopal bag society', 'Victoria', 'ahmedabad', '7788', 'hello', '2016-07-13 18:30:00', '0'),
(12, 'Book a free consultation', 'Vishal vasani', 'vishal.datatech@gmail.com', '9924 300 801', '', 'New South Wales', 'ahmedabad', '7778', '', '2016-07-14 04:55:57', '0'),
(13, 'Book a free consultation', 'pallvi', 'pallvi.datatech@gmail.com', '3800 013 254', 'Heritage, 3rd Floor, Near Gujarat Vidhyapith,', 'New South Wales', 'ahmedabad', '3800', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2016-11-24 09:04:18', '1'),
(14, 'Book a free consultation', 'rakesh', 'rakesh.datatech@gmail.com', '3821 854 685', '1st floor,kalpatru apartment,ahmedabad', 'Victoria', 'ahmedabad', '3821', 'testing', '2016-07-14 05:49:44', '0'),
(15, 'Book a free consultation', 'shyam', 'shyam.datatech@gmail.com', '2586 452 352', 'nime street near 2nd floor', 'Australian Capital Territory', 'Sydney', '3526', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2017-01-05 10:50:25', '1'),
(16, 'Book a free consultation', 'hitarth', 'hitarth.datatech@gmail.com', '9568 265 652', 'behind samrutdhi bulding', 'Select State', 'Melbourne', '9596', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2016-07-14 05:54:07', '0'),
(17, 'Book a free consultation', 'mehul', 'mehul.datatech@gmail.com', '9859 685 682', 'second floor near big bazar', 'Australian Capital Territory', 'Brisbane', '9655', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2016-07-14 05:56:15', '0'),
(18, 'Book a free consultation', 'Vishesh Patel', 'vishesh.datatech@gmail.com', '9565 555 555', 'sweet home,near megic park first gate', 'Queensland', 'Perth', '4565', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2016-11-24 09:04:09', '1'),
(19, 'Book a free consultation', 'Chetan Samkuniya', 'chetan.datatech@gmail.com', '5236 263 532', 'Adelaide', 'Western Australia', 'Gold Coast – Tweed Heads', '9566', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2016-08-22 06:08:42', '1'),
(20, 'Book a free consultation', 'Niraj Vaghasiya', 'niraj.datatech@gmail.com', '9856 565 624', 'top 8 apartment second floor no.35', 'Tasmania', 'Newcastle – Maitland', '9652', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2016-11-24 09:06:26', '1'),
(21, 'Book a free consultation', 'jignasa', 'jignasa.datatech@gmail.com', '9658 656 655', 'Central Coast', 'South Australia', 'Hobart', '4526', 'testing', '2016-07-14 06:01:34', '0'),
(22, 'Book a free consultation', 'Sanjay Parekh', 'sanjayp.datatech@gmail.com', '9586 442 256', 'sanman apartment 3rd floor', 'Tasmania', 'Geelong', '4563', 'testing', '2016-07-14 06:14:18', '0'),
(23, 'Book a free consultation', 'Hitendra', 'hitendra.seorank@gmail.com', '9856 858 585', 'near aakash apartment royal tenament', 'South Australia', 'Cairns', '8224', 'testing', '2016-11-24 08:56:12', '1'),
(24, 'Book a free consultation', 'Parth Parikh', 'parth.datatechmedia@gmail.com', '7624 188 555', 'peral area swagat banglos', 'Northern Territory', 'Darwin', '9586', 'testing', '2016-11-18 11:59:08', '1'),
(25, 'Book a free consultation', 'Dharti Patel', 'dharti.seorank@gmail.com', '9856 414 271', 'behind build school 3rd floor build apartment', 'South Australia', 'Hobart', '9852', 'testing', '2016-07-14 06:20:02', '0'),
(26, 'Book a free consultation', 'Dharmesh Gajjar', 'dharmeshg.seorank@gmail.com', '9856 856 989', 'crafers town near rasto park', 'South Australia', 'Hobart', '6563', 'testing', '2016-11-24 14:52:47', '1'),
(27, 'Book a free consultation', 'Hiren Akbari', 'hiren.datatech@gmail.com', '7452 523 641', 'dwanit 32 bulding', 'Western Australia', 'ahmedabad', '6525', 'testing', '2016-11-24 09:04:31', '1'),
(28, 'Book a free consultation', 'Keyur Mistry', 'keyur.datatech@gmail.com', '9564 258 755', 'steam house belgiym road', 'Northern Territory', 'Darwin', '5656', 'testing', '2016-07-14 06:24:28', '0'),
(29, 'Book a free consultation', 'Bhavik Parmar', 'bhavik.datatech@gmail.com', '6585 685 685', 'near bikaner store stret bapartment 32', 'Northern Territory', 'Darwin', '5434', 'testing', '2016-07-14 06:25:31', '0'),
(30, 'Book a free consultation', 'Addison Johnson', 'addison.seorank@gmail.com', '8564 545 232', 'parlament street brisbane house', 'Select State', 'ahmedabad', '8565', 'testing', '2016-08-22 05:52:44', '1'),
(31, 'Book a free consultation', 'Sandip Patel', 'sandip.datatech@gmail.com', '4857 596 859', 'green city road reech house', 'Select State', 'ahmedabad', '8566', 'testing', '2016-07-14 06:27:59', '0'),
(32, 'Book a free consultation', 'Dixit Panchal', 'dixit.datatech@gmail.com', '8565 968 566', 'luck house', 'Select State', 'ahmedabad', '5464', 'testing', '2016-11-24 08:55:44', '1'),
(33, 'Book a free consultation', 'Priyanka Patel', 'priyanka.patel.datatech@gmail.com', '5685 685 552', 'sweet home,near megic parkgate', 'Queensland', 'ahmedabad', '4565', 'testing', '2016-11-24 08:55:20', '1'),
(34, 'Book a free consultation', 'Love Shah', 'love.datatech@gmail.com', '9856 856 653', 'peral area swagat banglos', 'Northern Territory', 'ahmedabad', '9586', 'testing', '2016-07-14 06:30:46', '0'),
(35, 'Book a free consultation', 'Manish Rami', 'manish.seorank@gmail.com', '8568 522 345', 'peral area swgat hall', 'Northern Territory', 'surat', '2121', 'testing', '2016-11-24 08:55:23', '1'),
(36, 'Book a free consultation', 'Atit Dave', 'atit.seorank@gmail.com', '5326 262 552', 'sweet home,near megic park first gate', 'Australian Capital Territory', 'rajokot', '5225', 'testing', '2016-07-14 06:32:31', '0'),
(37, 'Book a free consultation', 'Gopal Vasani', 'gopal@gmail.com', '9924 300 801', '', '', 'ahmedabad', '7777', 'dfsdfsd', '2016-11-24 08:56:07', '1'),
(38, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'fkdjfkjdskfjsd', 'New South Wales', 'Ahmedabad', '7788', 'hello', '2016-07-15 08:15:45', '0'),
(39, 'Book a free consultation', 'Vishal', 'vishal.datatech@gmail.com', '9924 300 801', 'fkdjfkjdskfjsd', 'New South Wales', 'Ahmedabad', '4654', 'fdfsdf', '2016-07-15 08:17:27', '0'),
(40, 'Book a free consultation', 'love', 'l@gmail.com', '8642 896 080', '9 street', 'Victoria', 'NSW', '2000', 'hello this is testing enquiry', '2016-11-24 09:46:40', '1'),
(41, 'Book a free consultation', 'love', 'l@gmail.com', '8642 896 080', '9 street', 'Victoria', 'NSW', '2000', '', '2016-07-27 08:43:47', '0'),
(42, 'Book a free consultation', 'love', 'l@gmail.com', '8642 896 080', '9 street', 'Victoria', 'NSW', '2000', 'hello', '2016-07-27 08:44:02', '0'),
(43, 'Book a free consultation', 'love', 'l@gmail.com', '7080 890 764', '', '', '', '', 'This is test enquiry from datatechmedia please ignore it.', '2016-11-24 08:55:15', '1'),
(44, 'Book a free consultation', 'dharmesh', 'dhar@GMNAIL.COM', '5128 760 840', '9 street', '', 'NSW', '6560', 'dhar@GMNAIL.COM', '2016-07-27 09:29:12', '0'),
(45, 'Book a free consultation', 'dharmesh', 'dhar@GMNAIL.COM', '5128 760 840', '9 street', 'Australian Capital Territory', 'NSW', '6560', 'helo', '2016-11-24 09:06:21', '1'),
(46, 'Book a free consultation', 'love', 'l@gmail.com', '5128 760 840', '9 street', 'Northern Territory', 'NSW', '6560', 'testing enquiry', '2016-07-27 09:34:38', '0'),
(47, 'Book a free consultation', 'dharmesh', 'dhar@GMNAIL.COM', '1111 111 111', '9 street', 'South Australia', 'NSW', '6560', 'testing', '2016-11-24 08:56:03', '1'),
(48, 'Book a free consultation', 'dharmesh', 'dhar@GMNAIL.COM', '5128 760 840', '9 street', 'Western Australia', 'NSW', '6560', 'testing', '2016-11-24 10:09:17', '1'),
(49, 'Book a free consultation', 'love', 'l@gmail.com', '1111 111 111', '9 street', 'Northern Territory', 'NSW', '6560', 'testing', '2017-06-15 05:28:02', '1'),
(50, 'Book a free consultation', 'wadf', 'dhar@gmail.COM', '5128 760 840', '9 street', 'Australian Capital Territory', 'NSW', '6560', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-08-01 08:45:15', '0'),
(51, 'Book a free consultation', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'd@gmail.com', 'Lorem Ipsu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lore', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-08-22 06:09:19', '1'),
(52, 'Book a free consultation', 'love', 'l@gmail.com', '5128 760 840', '9 street', 'Northern Territory', 'NSW', '6560', '', '2016-08-01 09:14:07', '0'),
(53, 'Book a free consultation', 'love', 'l@gmail.com', '5128 760 840', '9 street', 'Northern Territory', 'NSW', '6560', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-08-16 03:05:30', '1'),
(54, 'Book a free consultation', 'love', 'l@gmail.com', '5128 760 840', '9 street', 'Northern Territory', 'NSW', '6560', '', '2017-01-12 03:23:24', '1'),
(55, 'Book a free consultation', 'dharmesh', 'dhar@GMNAIL.COM', '5128 760 840', '9 street', '', 'NSW', '6560', '', '2016-11-24 14:51:14', '1'),
(56, 'Book a free consultation', 'dixit', 'dhar@gmail.COM', '5128 760 840', '9 street', 'Australian Capital Territory', 'NSW', '6560', '', '2017-01-05 10:50:10', '1'),
(57, 'Book a free consultation', 'ms', 'mehul.datatech@gmail.com', '9999 989 222', 'hvjhvjh', 'Victoria', 'jkbhjkb', '9999', '15215151', '2016-08-29 05:21:11', '1'),
(58, 'Book a free consultation', 'asdasd', 'Testign@gmail.com', '2343 243 423', 'sdffdfdsfffsfs', 'New South Wales', 'fgdgfdgfdg', '3345', 'fdgdgdgdgdg', '2017-02-16 10:02:46', '0'),
(59, 'Book a free consultation', 'asdasd', 'Testign@gmail.com', '2343 243 423', 'sdffdfdsfffsfs', 'New South Wales', 'fgdgfdgfdg', '3345', 'fdgdgdgdgdg', '2017-11-09 09:36:06', '1'),
(60, 'Book a free consultation', 'asdasd', 'Testign@gmail.com', '2343 243 423', 'sdffdfdsfffsfs', 'New South Wales', 'fgdgfdgfdg', '3345', 'fdgdgdgdgdg', '2017-02-16 10:12:52', '0'),
(61, 'Book a free consultation', 'yguutyi', 'rasa2dg@sdf.com', '4564 454 646', 'hjhgjgj', 'Victoria', 'hgjgh', '4545', 'vhgfhfh', '2017-06-15 08:09:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_enquiry_log`
--

DROP TABLE IF EXISTS `dtm_enquiry_log`;
CREATE TABLE IF NOT EXISTS `dtm_enquiry_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_from` varchar(50) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `enquiry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_enquiry_log`
--

INSERT INTO `dtm_enquiry_log` (`id`, `enquiry_from`, `counter`, `enquiry_date`) VALUES
(1, 'enquiries', 2, '2017-01-02'),
(2, 'enquiries', 10, '2016-12-27'),
(3, 'enquiries', 6, '2016-12-01'),
(4, 'enquiries', 2, '2016-11-02'),
(5, 'enquiries', 1, '2016-11-16'),
(6, 'car', 5, '2016-12-09'),
(7, 'finance', 7, '2017-01-11'),
(8, 'car', 10, '2016-08-02'),
(9, 'finance', 4, '2016-12-06'),
(15, 'finance', 8, '2016-12-02'),
(10, 'car', 8, '2016-07-22'),
(16, 'car', 7, '2016-05-19'),
(11, 'car', 15, '2016-12-09'),
(12, 'car', 6, '2016-12-01'),
(13, 'car', 3, '2016-12-30'),
(14, 'finance', 2, '2016-12-12'),
(74, 'enquiries', 3, '2017-02-16'),
(75, 'enquiries', 1, '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_faq`
--

DROP TABLE IF EXISTS `dtm_faq`;
CREATE TABLE IF NOT EXISTS `dtm_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_faq`
--

INSERT INTO `dtm_faq` (`id`, `question`, `answer`, `sort_order`, `status`, `created_date`, `updated_date`) VALUES
(5, 'faq1', 'faq1', 1, '1', '2016-08-23 14:54:58', '2016-08-23 14:55:57'),
(6, 'faq2', 'faq2', 2, '1', '2016-08-23 14:55:23', '0000-00-00 00:00:00'),
(7, 'faq3', 'faq3', 3, '1', '2016-08-23 14:55:39', '2016-11-23 16:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_gallery`
--

DROP TABLE IF EXISTS `dtm_gallery`;
CREATE TABLE IF NOT EXISTS `dtm_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_alt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dtm_gallery`
--

INSERT INTO `dtm_gallery` (`id`, `name`, `image_name`, `image_title`, `image_alt`, `status`, `sort_order`, `created_date`, `updated_date`) VALUES
(20, 'Specials', '5.jpg', '', '', '1', 44, '2016-04-29 14:39:11', '2016-05-11 18:38:58'),
(21, 'Home Img', 'Lighthouse.jpg', '', '', '1', 10, '2016-06-09 20:55:59', '2016-06-09 20:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_language`
--

DROP TABLE IF EXISTS `dtm_language`;
CREATE TABLE IF NOT EXISTS `dtm_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL,
  `language_code` varchar(4) NOT NULL,
  `default_lang` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_language`
--

INSERT INTO `dtm_language` (`id`, `language`, `language_code`, `default_lang`) VALUES
(1, 'English', 'en', '1'),
(2, 'Hindi', 'hn', '0'),
(3, 'Gujarati', 'gj', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_log`
--

DROP TABLE IF EXISTS `dtm_log`;
CREATE TABLE IF NOT EXISTS `dtm_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `log_type` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `json_format` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_log`
--

INSERT INTO `dtm_log` (`id`, `user_id`, `user_name`, `user_type`, `job_id`, `log_type`, `description`, `json_format`, `created_date`) VALUES
(1, 1, 'p', NULL, NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:17:38'),
(2, 1, 'p', NULL, NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:18:31'),
(3, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:20:08'),
(4, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:20:55'),
(5, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:21:04'),
(6, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:30:37'),
(7, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:30:52'),
(8, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:31:19'),
(9, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 03:48:32'),
(10, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 04:29:41'),
(11, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-06 04:34:00'),
(12, 1, 'p', 'Administrator -  ???', NULL, 'Login success', 'p successfully logged In', '0', '2020-07-07 11:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_menu`
--

DROP TABLE IF EXISTS `dtm_menu`;
CREATE TABLE IF NOT EXISTS `dtm_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `delete` enum('0','1') NOT NULL,
  `deleted_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_menu`
--

INSERT INTO `dtm_menu` (`id`, `name`, `sort_order`, `delete`, `deleted_date`) VALUES
(1, 'Top Menu', 0, '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_menu_items`
--

DROP TABLE IF EXISTS `dtm_menu_items`;
CREATE TABLE IF NOT EXISTS `dtm_menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `action_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `external_link` varchar(300) NOT NULL,
  `is_home` enum('0','1') NOT NULL,
  `target_window` enum('blank','self') NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `deleted` enum('0','1') NOT NULL,
  `deleted_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_menu_items`
--

INSERT INTO `dtm_menu_items` (`id`, `menu_id`, `name`, `action_id`, `entity_id`, `external_link`, `is_home`, `target_window`, `sort_order`, `status`, `deleted`, `deleted_date`, `created_date`, `updated_date`) VALUES
(1, 1, 'About Company', 6, 1, '', '1', 'self', 1, '1', '0', '0000-00-00 00:00:00', '2012-12-18 11:49:37', '2012-12-18 11:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_modules`
--

DROP TABLE IF EXISTS `dtm_modules`;
CREATE TABLE IF NOT EXISTS `dtm_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `module_key` varchar(30) NOT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `module_table` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module_key` (`module_key`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_modules`
--

INSERT INTO `dtm_modules` (`id`, `name`, `module_key`, `icon_class`, `module_table`, `menu_order`, `created_date`) VALUES
(2, 'Users', 'mod_user', 'user', '', 0, '2012-11-22 11:32:02'),
(3, 'Error Manager', 'mod_error', NULL, '', 0, '2013-01-02 11:48:00'),
(5, 'Dashboard', 'mod_admin', 'dashboard', '', 0, '2013-01-21 10:54:09'),
(6, 'Site config', 'mod_config', NULL, '', 0, '2013-02-26 15:21:28'),
(7, 'SEO Manager', 'mod_seo', NULL, '', 0, '2013-03-01 16:27:48'),
(31, 'Testimonials', 'mod_testimonial', 'testimonial', '', 0, '2014-12-30 00:00:00'),
(22, 'Manage Pages', 'mod_page', 'pagelist', '', 0, '2014-07-04 00:00:00'),
(40, 'Banners', 'mod_banner', 'slider', '', 0, '2016-08-31 00:00:00'),
(26, 'Home Page Slider', 'mod_slider', 'slider', '', 0, '2014-10-07 00:00:00'),
(33, 'Enquiry Manager', 'mod_enquiry', 'enquiry', '', 0, '2014-12-31 00:00:00'),
(35, 'Sitemap', 'mod_sitemap', NULL, '', 0, '0000-00-00 00:00:00'),
(36, 'Galleries', 'mod_gallery', 'pagelist', '', 0, '0000-00-00 00:00:00'),
(39, 'FAQ Manager', 'mod_faq', 'comment-img', '', 0, '2016-08-22 00:00:00'),
(41, 'Order', 'mod_order', 'pagelist', '', 0, '2023-01-02 16:06:10'),
(42, 'Student', 'mod_student', 'user', '', 0, '2023-01-12 16:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_module_action`
--

DROP TABLE IF EXISTS `dtm_module_action`;
CREATE TABLE IF NOT EXISTS `dtm_module_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `module_key` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `parent_action` int(11) NOT NULL,
  `default_action` enum('front','admin') DEFAULT NULL,
  `action_type` enum('front','admin','both') DEFAULT NULL,
  `access_type` enum('public','private') NOT NULL,
  `admin_menu` enum('0','1') DEFAULT NULL,
  `admin_menu_label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_order` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(1000) NOT NULL,
  `meta_description` varchar(1000) NOT NULL,
  `related_actions` text NOT NULL,
  `field_variables` varchar(1000) NOT NULL,
  `created_date` datetime NOT NULL,
  `active_action` enum('0','1') NOT NULL,
  `active_module` enum('0','1') NOT NULL,
  `access_level` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_module_action`
--

INSERT INTO `dtm_module_action` (`id`, `name`, `module_key`, `action`, `parent_action`, `default_action`, `action_type`, `access_type`, `admin_menu`, `admin_menu_label`, `menu_order`, `meta_title`, `meta_keyword`, `meta_description`, `related_actions`, `field_variables`, `created_date`, `active_action`, `active_module`, `access_level`) VALUES
(1, 'Admin Login', 'mod_user', 'admin_login', 0, '', 'admin', 'public', NULL, NULL, 0, '', '', '', '', '', '0000-00-00 00:00:00', '1', '1', '0'),
(2, '404', 'mod_error', 'page_404', 0, NULL, 'both', 'public', NULL, NULL, 0, '', '', '', '', '', '2013-01-02 11:50:58', '0', '0', '0'),
(3, 'Error Page', 'mod_error', 'page_error', 0, NULL, 'both', 'public', NULL, NULL, 0, '', '', '', '', '', '2013-01-02 11:51:31', '0', '0', '0'),
(4, 'Dashboard', 'mod_admin', 'dashboard', 0, 'admin', 'admin', 'private', '1', 'Dashboard', 0, '', '', '', '', '', '2013-01-19 15:02:39', '1', '1', '1'),
(5, 'Testimonials', 'mod_testimonial', 'testimonial_list', 0, NULL, 'admin', 'private', '1', 'Testimonials', 2, '', '', '', 'Testimonials', '', '2014-10-07 00:00:00', '1', '1', '1'),
(6, 'Home Page', 'mod_page', 'home', 0, 'front', 'front', 'public', '0', NULL, 0, '', '', '', '', '', '2014-07-04 00:00:00', '1', '1', '0'),
(7, 'Manage Pages', 'mod_page', 'page_list', 0, NULL, 'admin', 'private', '1', 'Manage Pages', 0, '', '', '', 'CMS Pages', '', '2014-08-03 00:00:00', '1', '1', '1'),
(8, 'Upload Image', 'mod_admin', 'upload_image', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2013-02-20 11:21:07', '1', '1', '0'),
(9, 'User Logout', 'mod_user', 'user_logout', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2013-02-20 00:00:00', '1', '1', '0'),
(10, 'Update Profile', 'mod_user', 'update_profile', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2013-02-22 13:54:25', '1', '1', '0'),
(11, 'Site config', 'mod_config', 'site_config', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2013-02-26 15:21:08', '1', '1', '0'),
(12, 'SEO Page List', 'mod_seo', 'seo_list', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2013-03-01 16:29:06', '1', '1', '0'),
(13, 'Seo Edit', 'mod_seo', 'page_edit', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2013-03-01 16:29:45', '1', '1', '0'),
(14, 'Page Add/Edit', 'mod_page', 'page_edit', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-08-28 00:00:00', '1', '1', '1'),
(15, 'Change Page Status', 'mod_page', 'change_status', 0, '', 'admin', 'private', '0', '', 0, '', '', '', '', '', '2013-02-11 00:00:00', '1', '1', '1'),
(16, 'Delete Page', 'mod_page', 'delete_page', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2013-02-11 23:05:05', '1', '1', '1'),
(17, 'Delete Page File', 'mod_page', 'delete_file', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2014-09-10 00:00:00', '1', '1', '0'),
(18, 'Delete Page Gallery Image', 'mod_page', 'delete_gallery', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-09-12 00:00:00', '1', '1', '0'),
(19, 'Get Sitemap', 'mod_sitemap', 'get_sitemap', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2016-03-30 00:00:00', '0', '0', '0'),
(20, 'Home Page Slider', 'mod_slider', 'slider_list', 0, NULL, 'admin', 'private', '1', 'Home Page Slider', 1, '', '', '', '', '', '2014-10-07 00:00:00', '1', '1', '1'),
(21, 'View Page', 'mod_page', 'view_page', 0, NULL, 'front', 'public', '0', NULL, 0, '', '', '', '', '', '2014-12-31 00:00:00', '1', '1', '0'),
(22, 'Change Status', 'mod_banner', 'change_status', 0, NULL, 'admin', '', NULL, NULL, 0, '', '', '', '', '', '0000-00-00 00:00:00', '1', '1', '0'),
(23, 'Slider Edit', 'mod_slider', 'slider_edit', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-07 00:00:00', '1', '1', '1'),
(24, 'Save Sort Order', 'mod_page', 'save_sortorder', 0, '', 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2015-01-16 00:00:00', '1', '1', '1'),
(25, 'Change Status', 'mod_slider', 'change_status', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-09 00:00:00', '1', '1', '1'),
(26, 'Delete Slider', 'mod_slider', 'delete_slider', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-09 00:00:00', '1', '1', '1'),
(27, 'Delete Image', 'mod_slider', 'delete_file', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-09 00:00:00', '1', '1', '0'),
(28, 'Sitemap', 'mod_sitemap', 'sitemap', 0, NULL, 'front', 'public', NULL, NULL, 0, 'Best Buy Autos - Sitemap Page', '', '', '', '', '2016-03-30 00:00:00', '0', '0', '0'),
(29, 'Save Sort Order', 'mod_slider', 'save_sortorder', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-10 00:00:00', '1', '1', '1'),
(30, 'Banner Add', 'mod_banner', 'banner_edit', 0, NULL, 'admin', 'private', '0', '', 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(42, 'Enquiry View', 'mod_enquiry', 'enquiry_view_contact', 0, NULL, 'admin', 'private', NULL, '', 0, '', '', '', '', '', '2014-10-07 00:00:00', '0', '0', '0'),
(33, 'Banner Delete', 'mod_banner', 'delete_banner', 0, NULL, 'admin', '', NULL, NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(34, 'Delete Image', 'mod_banner', 'delete_image', 0, NULL, 'admin', '', NULL, NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(35, 'Delete file', 'mod_banner', 'delete_file', 0, NULL, 'admin', '', NULL, NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '0'),
(36, 'Banners', 'mod_banner', 'banner_list', 0, NULL, 'admin', 'private', '1', 'Banners', 3, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(37, 'Save Sort Order', 'mod_testimonial', 'save_sortorder', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-10 00:00:00', '1', '1', '1'),
(38, 'Delete Testimonial', 'mod_testimonial', 'delete_testimonial', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-09 00:00:00', '1', '1', '1'),
(39, 'Change Status', 'mod_testimonial', 'change_status', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-09 00:00:00', '1', '1', '1'),
(40, 'Testimonial Edit', 'mod_testimonial', 'testimonial_edit', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2014-10-07 00:00:00', '1', '1', '1'),
(43, 'Gallery List', 'mod_gallery', 'gallery_list', 0, NULL, 'admin', 'private', '0', 'Galleries', 2, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(44, 'Delete image', 'mod_gallery', 'delete_file', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '0'),
(45, 'Save Sort Order', 'mod_gallery', 'save_sortorder', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(46, 'Delete Gallery', 'mod_gallery', 'delete_gallery', 0, NULL, 'admin', 'private', '0', NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(47, 'Change Status', 'mod_gallery', 'change_status', 0, NULL, '', 'private', '0', NULL, 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(48, 'Gallery Edit', 'mod_gallery', 'gallery_edit', 0, NULL, 'admin', 'private', '0', '', 0, '', '', '', '', '', '2016-04-29 00:00:00', '1', '1', '1'),
(49, 'Enquiry Manager', 'mod_enquiry', 'contact_enquiry_list', 0, NULL, 'admin', 'private', '1', 'Contact enquiry', 5, '', '', '', '', '', '0000-00-00 00:00:00', '1', '1', '0'),
(69, 'Category List Product', 'mod_page', 'category_listing', 0, NULL, 'front', 'public', '0', 'Category List Product', 0, '', '', '', '', '', '2016-06-28 00:00:00', '1', '1', '0'),
(65, 'Delete Product Manager File', 'mod_product', 'delete_file', 0, NULL, NULL, '', '0', 'Delete Product Manager File', 0, '', '', '', '', '', '2016-06-27 00:00:00', '0', '0', '0'),
(72, 'Enquiry', 'mod_enquiry', 'enquiry', 0, NULL, 'front', 'public', NULL, NULL, 0, '', 'contact-enquiry Keyword', 'contact-enquiry Description', '', '', '0000-00-00 00:00:00', '1', '1', '0'),
(73, 'FAQ Edit', 'mod_faq', 'faq_edit', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-08-22 00:00:00', '1', '1', '1'),
(74, 'FAQ Manager', 'mod_faq', 'faq_list', 0, NULL, 'admin', 'private', '1', 'FAQ Manager', 4, '', '', '', '', '', '2016-08-22 00:00:00', '1', '1', '1'),
(75, 'FAQ Change Status', 'mod_faq', 'change_status', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-08-22 00:00:00', '1', '1', '1'),
(76, 'FAQ Delete', 'mod_faq', 'delete_faq', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-08-22 00:00:00', '1', '1', '1'),
(77, 'FAQ Save Sort Order', 'mod_faq', 'save_sortorder', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-08-23 00:00:00', '1', '1', '1'),
(78, 'SCSS Compiler', 'mod_error', 'scss_compile', 0, NULL, 'both', 'public', NULL, NULL, 0, '', '', '', '', '', '2016-08-30 00:00:00', '0', '0', '0'),
(79, 'Set Modules', 'mod_user', 'set_modules', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-09-07 00:00:00', '1', '1', '0'),
(80, 'Access edit', 'mod_user', 'access_edit', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-05-17 00:00:00', '0', '0', '0'),
(81, 'Access List', 'mod_user', 'access_list', 0, NULL, 'admin', 'private', '1', 'Rolls', 0, '', '', '', '', '', '0000-00-00 00:00:00', '1', '1', '0'),
(82, 'User Access Delete', 'mod_user', 'access_delete', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0', '0', '0'),
(83, 'User list', 'mod_user', 'user_list', 0, NULL, 'admin', 'private', '1', 'Users List', 0, '', '', '', '', '', '2016-06-22 00:00:00', '1', '1', '1'),
(84, 'User Edit', 'mod_user', 'user_edit', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-06-22 00:00:00', '1', '1', '1'),
(85, 'User Add', 'mod_user', 'user_add', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-10-03 00:00:00', '1', '1', '1'),
(86, 'User Status Change', 'mod_user', 'change_status', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-10-03 00:00:00', '1', '1', '1'),
(87, 'User Delete', 'mod_user', 'delete_user', 0, NULL, 'admin', 'private', NULL, NULL, 0, '', '', '', '', '', '2016-10-03 00:00:00', '1', '1', '1'),
(88, 'Check User Already Exist', 'mod_user', 'check_user', 0, NULL, 'admin', 'public', NULL, NULL, 0, '', '', '', '', '', '2016-10-04 00:00:00', '1', '1', '0'),
(89, 'Order', 'mod_order', 'order_list', 0, NULL, 'admin', 'public', '1', 'Order List', 0, '', '', '', '', '', '2023-01-02 16:51:27', '1', '1', '1'),
(90, 'Order Edit', 'mod_order', 'order_edit', 0, NULL, 'admin', 'public', '0', NULL, 0, '', '', '', '', '', '2023-01-02 16:51:27', '1', '1', '1'),
(91, 'Order Delete', 'mod_order', 'order_delete', 0, NULL, 'admin', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(92, 'Add Order', 'mod_order', 'add_order', 0, NULL, 'admin', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(93, 'Student', 'mod_student', 'student_list', 0, NULL, 'admin', 'public', '1', 'Student List', 0, '', '', '', '', '', '2023-01-12 16:51:27', '1', '1', '1'),
(94, 'Student Edit', 'mod_student', 'student_edit', 0, NULL, 'admin', 'public', '0', NULL, 0, '', '', '', '', '', '2023-01-12 16:51:27', '1', '1', '1'),
(95, 'Delete Student', 'mod_student', 'student_delete', 0, NULL, 'admin', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(96, 'Add Student', 'mod_student', 'add_student', 0, NULL, 'admin', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(97, 'Product', 'mod_order', 'order', 0, NULL, 'both', 'public', NULL, NULL, 0, '', '', '', '', '', '2023-01-16 14:57:12', '1', '1', '0'),
(98, 'View Order', 'mod_order', 'view_order', 0, NULL, 'both', 'public', '0', NULL, 0, '', '', '', '', '', '2023-01-18 00:00:00', '1', '1', '0'),
(99, 'User Login', 'mod_user', 'userLogin', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2023-01-18 15:57:09', '1', '1', '0'),
(100, 'User Logout', 'mod_user', 'userLogout', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2023-01-24 00:00:00', '1', '1', '0'),
(101, 'Wish List', 'mod_order', 'wishList', 0, NULL, 'front', 'public', '0', NULL, 0, '', '', '', '', '', '2023-01-18 00:00:00', '1', '1', '0'),
(102, 'Add Wish', 'mod_order', 'add_wish', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(103, 'Remove Wish', 'mod_order', 'removeWish', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(104, 'Add To Cart', 'mod_order', 'addToCart', 0, NULL, 'front', 'public', '0', NULL, 0, '', '', '', '', '', '2023-01-18 00:00:00', '1', '1', '0'),
(105, 'Add Cart', 'mod_order', 'add_cart', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2023-01-30 05:00:00', '1', '1', '1'),
(106, 'Remove Cart', 'mod_order', 'removeCart', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(107, 'Remove Cart From Listing Page', 'mod_order', 'removeCartFromList', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(108, 'Check Out', 'mod_order', 'checkOut', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1'),
(109, 'Change Quantity', 'mod_order', 'changeqty', 0, NULL, 'front', 'public', NULL, NULL, 0, '', '', '', '', '', '2018-08-14 00:00:00', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_order`
--

DROP TABLE IF EXISTS `dtm_order`;
CREATE TABLE IF NOT EXISTS `dtm_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_order`
--

INSERT INTO `dtm_order` (`id`, `product_name`, `created_date`, `user_email`, `qty`, `price`, `status`, `img`) VALUES
(1, 'Jacket', '2023-01-03 14:27:10', 'rcjadhav@gmail.com', 2, '1250.00', 1, 'denim_jacket.jpg'),
(2, 'Jeans', '2023-01-05 15:16:11', 'ashishpatel@gmail.com', 4, '850.00', 1, 'denim_jeans.jpg'),
(4, 't shirt', '2023-01-11 19:37:57', 'rcjadhav@gmail.com', 3, '500.00', 1, 't-shirt.jpg'),
(5, 'Sport Jacket', '2023-02-03 21:20:14', 'rcjadhav@gmail.com', 2, '1100.00', 1, 'sport.png'),
(6, 'Formal Pant', '2023-02-06 21:55:25', 'ashishpatel@gmail.com', 1, '950.00', 1, 'formal.png'),
(7, 'White Hoodie', '2023-02-06 22:06:58', 'rcjadhav@gmail.com', 3, '570.00', 1, 'hoodie.png');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_orderdetails`
--

DROP TABLE IF EXISTS `dtm_orderdetails`;
CREATE TABLE IF NOT EXISTS `dtm_orderdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postcode` int(6) NOT NULL,
  `namecard` varchar(255) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `expmonth` varchar(50) NOT NULL,
  `expyear` varchar(50) NOT NULL,
  `cvv` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_orderdetails`
--

INSERT INTO `dtm_orderdetails` (`id`, `name`, `email`, `address`, `city`, `state`, `postcode`, `namecard`, `cardnumber`, `expmonth`, `expyear`, `cvv`) VALUES
(2, 'Rupesh Jadhav', 'rcjadhav@gmail.com', 'Ahmedabad,India', 'Ahmedabad', 'GJ', 380001, 'Jadhav Rupesh Chandrakant', '7777-7777-7777-7777', 'May', '2028', 728),
(3, 'Rupesh', 'rupesh@gmail.com', '542 W. 15th Street', 'New York', 'NY', 10001, 'Jadhav Rupesh', '1111-2222-3333-4444', 'May', '2028', 148),
(4, 'Rupesh C  Jadhav', 'rupesh@gmail.com', '542 W. 15th Street', 'New York', 'NY', 10001, 'Jadhav Rupesh', '1111-2222-3333-4444', 'May', '2028', 148);

-- --------------------------------------------------------

--
-- Table structure for table `dtm_orderitem`
--

DROP TABLE IF EXISTS `dtm_orderitem`;
CREATE TABLE IF NOT EXISTS `dtm_orderitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderdetail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_orderitem`
--

INSERT INTO `dtm_orderitem` (`id`, `orderdetail_id`, `product_id`, `product_name`, `qty`, `price`, `total_price`) VALUES
(1, 2, 2, 'Jeans', 2, 850, 1700),
(2, 2, 4, 't shirt', 3, 500, 1500),
(3, 3, 1, 'Jacket', 2, 1250, 2500),
(4, 4, 7, 'White Hoodie', 2, 570, 1140);

-- --------------------------------------------------------

--
-- Table structure for table `dtm_page`
--

DROP TABLE IF EXISTS `dtm_page`;
CREATE TABLE IF NOT EXISTS `dtm_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `image_title` varchar(100) NOT NULL,
  `image_alt` varchar(100) NOT NULL,
  `gallery_image` text NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `image2` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_page`
--

INSERT INTO `dtm_page` (`id`, `slug`, `name`, `description`, `image_name`, `image_title`, `image_alt`, `gallery_image`, `meta_title`, `meta_description`, `meta_keyword`, `sort_order`, `status`, `created_date`, `updated_date`, `user_id`, `image2`) VALUES
(1, 'about-uss', 'About Us', '<div>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc</p>\r\n</div>', '', '', '', '[]', 'About Us', 'About Us', 'About Us', 1, '1', '2016-08-26 19:50:52', '2016-11-21 19:41:45', 1, ''),
(2, 'why-choose-us', 'Why Choose Us', 'Why Choose Us', '', '', '', '[]', '', '', '', 2, '1', '2016-08-31 16:16:25', '2017-04-27 15:18:49', 1, ''),
(3, 'page', 'page R1', '<img src=\"http://192.168.200.3/2016/newcms2016/templates/admin/js/kcfinder/upload/image/Penguins.jpg\" alt=\"pen\" width=\"200\" height=\"200\" /><br /><br />pengenus', '', '', '', '[{\"name\":\"Koala (10).jpg\",\"title\":\"\",\"alt\":\"\",\"sort_order\":\"0\"},{\"name\":\"Penguins (15).jpg\",\"title\":\"\",\"alt\":\"\",\"sort_order\":\"0\"},{\"name\":\"Tulips.jpeg\",\"title\":\"\",\"alt\":\"\",\"sort_order\":\"0\"},{\"name\":\"Screenshot_1.jpg\",\"title\":\"\",\"alt\":\"\",\"sort_order\":\"0\"},{\"name\":\"Screenshot_1.jpg\",\"title\":\"\",\"alt\":\"\",\"sort_order\":\"0\"},{\"name\":\"Screenshot_1.png\",\"title\":\"\",\"alt\":\"\",\"sort_order\":\"0\"}]', '', '', '', 3, '1', '2016-09-08 13:56:59', '2019-07-26 16:16:17', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_rolls`
--

DROP TABLE IF EXISTS `dtm_rolls`;
CREATE TABLE IF NOT EXISTS `dtm_rolls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `access_level` enum('all','front','admin') NOT NULL,
  `access_type` enum('all','selected','exclude') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_rolls`
--

INSERT INTO `dtm_rolls` (`id`, `name`, `access_level`, `access_type`, `created_date`, `updated_date`) VALUES
(1, 'Administrator -  管理员', 'all', 'all', '2013-01-03 15:09:43', '2013-01-03 15:09:46'),
(5, 'Operation Manager', 'admin', 'selected', '2017-05-11 21:36:10', '2017-05-11 21:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_roll_action`
--

DROP TABLE IF EXISTS `dtm_roll_action`;
CREATE TABLE IF NOT EXISTS `dtm_roll_action` (
  `roll_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_roll_action`
--

INSERT INTO `dtm_roll_action` (`roll_id`, `action_id`) VALUES
(5, 4),
(5, 36),
(5, 34),
(5, 33),
(5, 30),
(5, 7),
(5, 83),
(5, 85);

-- --------------------------------------------------------

--
-- Table structure for table `dtm_slider`
--

DROP TABLE IF EXISTS `dtm_slider`;
CREATE TABLE IF NOT EXISTS `dtm_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_alt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ipad_image_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ipad_image_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ipad_image_alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dtm_slider`
--

INSERT INTO `dtm_slider` (`id`, `title`, `image_name`, `image_title`, `image_alt`, `ipad_image_name`, `ipad_image_title`, `ipad_image_alt`, `short_description`, `status`, `sort_order`, `created_date`, `updated_date`, `user_id`, `is_deleted`) VALUES
(14, 'Test3', '2022-11-24 170411.png', '', '', '', '', '', '', '1', 3, '2016-08-22 15:03:07', '2023-01-10 20:15:07', 1, '0'),
(15, 'test', '', '', '', '', '', '', '', '1', 15, '2017-02-17 15:36:05', '2023-02-07 22:40:48', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_slug`
--

DROP TABLE IF EXISTS `dtm_slug`;
CREATE TABLE IF NOT EXISTS `dtm_slug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `module_key` varchar(30) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `old_slug` varchar(100) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `has_banner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_slug`
--

INSERT INTO `dtm_slug` (`id`, `entity_id`, `module_key`, `slug`, `old_slug`, `action_id`, `created_date`, `updated_date`, `has_banner`) VALUES
(88, 0, 'mod_enquiry', 'contact', 'contact-enquir-sluggg', 72, '0000-00-00 00:00:00', '2016-08-22 15:03:46', 1),
(100, 0, 'mod_sitemap', 'sitemap', '', 28, '2016-08-26 00:00:00', '0000-00-00 00:00:00', 0),
(99, 1, 'mod_page', 'about-uss', 'about-us', 21, '2016-08-26 19:50:52', '2016-11-21 19:41:45', 1),
(101, 2, 'mod_page', 'why-choose-us', '', 21, '2016-08-31 16:16:25', '2017-04-27 15:18:49', 1),
(102, 3, 'mod_page', 'page', '', 21, '2016-09-08 13:56:59', '2019-07-26 16:16:17', 0),
(103, 4, 'mod_page', 'testing-page', '', 21, '2016-09-13 20:32:45', '2017-02-23 17:16:44', 0),
(104, 5, 'mod_page', 'rwerwerwe', '', 21, '2016-11-23 19:14:33', '2016-11-23 19:14:33', 0),
(105, 6, 'mod_page', 'werrrtetert', '', 21, '2016-11-23 19:16:46', '2016-11-23 19:16:46', 0),
(106, 7, 'mod_page', 'stete', '', 21, '2016-11-23 20:42:49', '2016-11-23 20:42:49', 0),
(107, 4, 'mod_page', 'sdsa', '', 21, '2017-02-23 17:16:07', '2017-02-23 17:16:07', 0),
(108, 0, 'mod_order', 'order', '', 97, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(109, 0, 'mod_order', 'view-order', '', 98, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(110, 0, 'mod_user', 'userLogin', '', 99, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(111, 0, 'mod_user', 'userLogout', '', 100, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(112, 0, 'mod_order', 'add-wish', '', 102, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(113, 0, 'mod_order', 'wishList', '', 101, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(114, 0, 'mod_order', 'removeWish', '', 103, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(115, 0, 'mod_order', 'addToCart', '', 104, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(116, 0, 'mod_order', 'add-cart', '', 105, '2023-01-30 15:33:35', '2023-01-30 15:33:35', 0),
(117, 0, 'mod_order', 'removeCart', '', 106, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(118, 0, 'mod_order', 'removeCartFromList', '', 107, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(119, 0, 'mod_order', 'checkOut', '', 108, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0),
(120, 0, 'mod_order', 'changeqty', '', 109, '2023-01-16 15:33:35', '2023-01-16 15:33:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtm_student`
--

DROP TABLE IF EXISTS `dtm_student`;
CREATE TABLE IF NOT EXISTS `dtm_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `roll_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_student`
--

INSERT INTO `dtm_student` (`id`, `name`, `roll_id`, `email`, `phone`, `status`, `created_date`) VALUES
(1, 'Rupesh Chandrakant Jadhav', 1, 'rcjadhav@gmail.com', '7359608728', 1, '2023-01-12 16:14:26'),
(4, 'Ashish Patel', 2, 'ashish@gmail.com', '9998966916', 0, '2023-01-13 19:26:52'),
(5, 'Arvind', 3, 'arvindkumar@gmail.com', '7894560123', 1, '2023-01-13 21:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_testimonial`
--

DROP TABLE IF EXISTS `dtm_testimonial`;
CREATE TABLE IF NOT EXISTS `dtm_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dtm_testimonial`
--

INSERT INTO `dtm_testimonial` (`id`, `customer_name`, `description`, `status`, `sort_order`, `created_date`, `updated_date`) VALUES
(35, '2', '2', '1', 35, '2017-09-01 14:08:43', '2017-09-01 14:08:43'),
(36, '3', '3', '1', 36, '2017-09-01 14:08:50', '2017-09-01 14:08:50'),
(38, '3', '3', '1', 38, '2017-09-01 14:09:04', '2017-09-01 14:09:04'),
(39, '4', '4', '1', 39, '2017-09-01 14:09:11', '2017-09-01 14:09:11'),
(40, '5', '5', '1', 40, '2017-09-01 14:09:18', '2017-09-01 14:09:18'),
(41, '6', '6', '1', 41, '2017-09-01 14:09:26', '2017-09-01 14:09:26'),
(42, '7', '7', '1', 42, '2017-09-01 14:09:32', '2017-09-01 14:09:32'),
(43, '88', '8', '1', 43, '2017-09-01 14:09:39', '2017-09-01 14:09:39'),
(44, '9', '9', '1', 44, '2017-09-01 14:09:45', '2017-09-01 14:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `dtm_user`
--

DROP TABLE IF EXISTS `dtm_user`;
CREATE TABLE IF NOT EXISTS `dtm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `suburb` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fax` varchar(11) NOT NULL,
  `roll_id` int(11) NOT NULL,
  `active` enum('0','1') NOT NULL,
  `is_deleted` enum('0','1') NOT NULL,
  `deleted_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_user`
--

INSERT INTO `dtm_user` (`id`, `name`, `username`, `password`, `email`, `suburb`, `state`, `country`, `address`, `postcode`, `phone`, `mobile`, `fax`, `roll_id`, `active`, `is_deleted`, `deleted_date`, `created_date`, `updated_date`, `created_by`, `updated_by`) VALUES
(1, 'p', 'myAdmin', '6CD5zKeIjvdpJeCoF8FMNA==', 'admin@admin.com', 'sydney', 'NSW', 99, '1 street', '2000', '', '', '', 1, '1', '0', '0000-00-00 00:00:00', '2013-01-03 15:59:09', '2014-01-30 21:15:56', 1, 1),
(24, 'Test User', 'test.datatech', '6CD5zKeIjvdpJeCoF8FMNA==', 'test.datatechmedia4r@gmail.com', 'sydney', 'NSW', 0, 'new Address', '4848', '7777777777', '9999999999', '', 5, '1', '0', '0000-00-00 00:00:00', '2017-05-11 20:58:00', '2023-01-09 18:53:12', 1, 1),
(25, 'Peter Scren', 'myAdmin123', '6CD5zKeIjvdpJeCoF8FMNA==', 'Testign@gmail.com', 'gjgh', '', 0, 'GHFG, FGH', '2132', '3423343412', '3423343423', '3423343421', 5, '1', '0', '0000-00-00 00:00:00', '2017-08-04 15:08:44', '2017-08-04 15:08:44', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dtm_wishlist`
--

DROP TABLE IF EXISTS `dtm_wishlist`;
CREATE TABLE IF NOT EXISTS `dtm_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtm_wishlist`
--

INSERT INTO `dtm_wishlist` (`id`, `oid`, `uid`, `time`) VALUES
(40, 2, 1, '2023-02-14 20:43:35'),
(14, 4, 1, '2023-01-25 23:45:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
