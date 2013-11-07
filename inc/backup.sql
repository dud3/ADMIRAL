-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2012 at 01:17 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `net2ftp_log_access`
--

CREATE TABLE IF NOT EXISTS `net2ftp_log_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `time` time NOT NULL DEFAULT '00:00:00',
  `remote_addr` text NOT NULL,
  `remote_port` text NOT NULL,
  `http_user_agent` text NOT NULL,
  `page` text NOT NULL,
  `datatransfer` int(10) unsigned DEFAULT '0',
  `executiontime` mediumint(8) unsigned DEFAULT '0',
  `ftpserver` text NOT NULL,
  `username` text NOT NULL,
  `state` text NOT NULL,
  `state2` text NOT NULL,
  `screen` text NOT NULL,
  `directory` text NOT NULL,
  `entry` text NOT NULL,
  `http_referer` text NOT NULL,
  KEY `index1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `net2ftp_log_access`
--


-- --------------------------------------------------------

--
-- Table structure for table `net2ftp_log_consumption_ftpserver`
--

CREATE TABLE IF NOT EXISTS `net2ftp_log_consumption_ftpserver` (
  `date` date NOT NULL DEFAULT '0000-00-00',
  `ftpserver` varchar(255) NOT NULL DEFAULT '0',
  `datatransfer` int(10) unsigned DEFAULT '0',
  `executiontime` mediumint(8) unsigned DEFAULT '0',
  PRIMARY KEY (`date`,`ftpserver`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `net2ftp_log_consumption_ftpserver`
--


-- --------------------------------------------------------

--
-- Table structure for table `net2ftp_log_consumption_ipaddress`
--

CREATE TABLE IF NOT EXISTS `net2ftp_log_consumption_ipaddress` (
  `date` date NOT NULL DEFAULT '0000-00-00',
  `ipaddress` varchar(15) NOT NULL DEFAULT '0',
  `datatransfer` int(10) unsigned DEFAULT '0',
  `executiontime` mediumint(8) unsigned DEFAULT '0',
  PRIMARY KEY (`date`,`ipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `net2ftp_log_consumption_ipaddress`
--


-- --------------------------------------------------------

--
-- Table structure for table `net2ftp_log_error`
--

CREATE TABLE IF NOT EXISTS `net2ftp_log_error` (
  `date` date NOT NULL DEFAULT '0000-00-00',
  `time` time NOT NULL DEFAULT '00:00:00',
  `ftpserver` text NOT NULL,
  `username` text NOT NULL,
  `message` text NOT NULL,
  `backtrace` text NOT NULL,
  `state` text NOT NULL,
  `state2` text NOT NULL,
  `directory` text NOT NULL,
  `remote_addr` text NOT NULL,
  `remote_port` text NOT NULL,
  `http_user_agent` text NOT NULL,
  KEY `index1` (`date`,`time`,`ftpserver`(100),`username`(50))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `net2ftp_log_error`
--


-- --------------------------------------------------------

--
-- Table structure for table `net2ftp_log_status`
--

CREATE TABLE IF NOT EXISTS `net2ftp_log_status` (
  `month` varchar(6) NOT NULL,
  `status` int(3) NOT NULL,
  `changelog` text NOT NULL,
  PRIMARY KEY (`month`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `net2ftp_log_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `net2ftp_users`
--

CREATE TABLE IF NOT EXISTS `net2ftp_users` (
  `ftpserver` varchar(255) NOT NULL DEFAULT '0',
  `username` text NOT NULL,
  `homedirectory` text NOT NULL,
  KEY `index1` (`ftpserver`,`username`(50))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `net2ftp_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `pfn_accesos`
--

CREATE TABLE IF NOT EXISTS `pfn_accesos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `estado` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `donde` varchar(50) NOT NULL DEFAULT '',
  `session` varchar(100) DEFAULT NULL,
  `data` int(10) unsigned NOT NULL DEFAULT '0',
  `ultimo` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `pfn_accesos`
--

INSERT INTO `pfn_accesos` (`id`, `login`, `ip`, `estado`, `donde`, `session`, `data`, `ultimo`) VALUES
(1, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353526312, 1353526312),
(2, 'admin', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353526449, 1353526449),
(3, 'yahaa', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353526461, 1353526461),
(4, 'yahaa', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353526486, 1353526486),
(5, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353526490, 1353526490),
(6, 'admin', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353526635, 1353526635),
(7, 'admin', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353621356, 1353621356),
(8, 'admin', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353621359, 1353621359),
(9, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353794677, 1353794677),
(10, 'admin', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353794906, 1353794906),
(11, 'john', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353794912, 1353794912),
(12, 'yahaa', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353794917, 1353794917),
(13, 'yahaa', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353794922, 1353794922),
(14, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353794935, 1353794935),
(15, 'test5', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353798614, 1353798614),
(16, 'test5', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353798618, 1353798618),
(17, 'test5', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353798668, 1353798668),
(18, 'test', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353798711, 1353798711),
(19, 'test', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353798716, 1353798716),
(20, 'test', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353798737, 1353798737),
(21, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353798740, 1353798740),
(22, '', '192.168.40.1', 0, 'vacios', '0db469ea8a8543b39add56edc3eb9055', 1353802865, 1353802865),
(23, 'test5', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353802873, 1353802873),
(24, 'admin', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353802876, 1353802876),
(25, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353802879, 1353802879),
(26, 'admin', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353802924, 1353802924),
(27, 'test5', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353802930, 1353802930),
(28, 'test5', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353802937, 1353802937),
(29, 'test', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353802942, 1353802942),
(30, 'test', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353802966, 1353802966),
(31, 'heybro', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353804041, 1353804041),
(32, 'dude22', '192.168.40.1', 0, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353804212, 1353804212),
(33, 'admin', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353804243, 1353804243),
(34, 'admin', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353804291, 1353804291),
(35, 'dude22', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353804295, 1353804295),
(36, 'dude22', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353804302, 1353804302),
(37, 'dude22', '192.168.40.1', 1, 'login', '0db469ea8a8543b39add56edc3eb9055', 1353804307, 1353804307),
(38, 'dude22', '192.168.40.1', 1, 'sair', '0db469ea8a8543b39add56edc3eb9055', 1353804319, 1353804319),
(39, 'admin', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924054, 1353924054),
(40, 'test5', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924122, 1353924122),
(41, 'heybro', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924133, 1353924133),
(42, 'dude22', '192.168.1.1', 1, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924142, 1353924142),
(43, 'dude22', '192.168.1.1', 1, 'sair', 'nr2fops6um1iv94qfssjg0rmu1', 1353924246, 1353924246),
(44, 'admin', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924252, 1353924252),
(45, 'admin', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924255, 1353924255),
(46, 'admin', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924258, 1353924258),
(47, 'admin', '192.168.1.1', 0, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924260, 1353924260),
(48, 'admin', '192.168.1.1', 1, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924306, 1353924306),
(49, 'admin', '192.168.1.1', 1, 'sair', 'nr2fops6um1iv94qfssjg0rmu1', 1353924398, 1353924398),
(50, 'heybro', '192.168.1.1', 1, 'login', 'nr2fops6um1iv94qfssjg0rmu1', 1353924403, 1353924403),
(51, 'heybro', '192.168.1.1', 1, 'sair', 'nr2fops6um1iv94qfssjg0rmu1', 1353924530, 1353924530),
(52, 'admin', '192.168.1.1', 1, 'login', '7ru9u50o3582ff5lgue3hh9q17', 1353924769, 1353924769),
(53, 'admin', '192.168.1.1', 1, 'sair', '7ru9u50o3582ff5lgue3hh9q17', 1353924780, 1353924780),
(54, 'dude6', '192.168.1.1', 0, 'login', '7ru9u50o3582ff5lgue3hh9q17', 1353924784, 1353924784),
(55, 'dude6', '192.168.1.1', 0, 'login', '7ru9u50o3582ff5lgue3hh9q17', 1353924806, 1353924806),
(56, 'dude6', '192.168.1.1', 0, 'login', '7ru9u50o3582ff5lgue3hh9q17', 1353924810, 1353924810);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_arquivos`
--

CREATE TABLE IF NOT EXISTS `pfn_arquivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(245) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `id_directorio` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `arquivo` (`arquivo`,`id_directorio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pfn_arquivos`
--

INSERT INTO `pfn_arquivos` (`id`, `arquivo`, `id_directorio`) VALUES
(1, 'LAB_1.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_arquivos_campos_palabras`
--

CREATE TABLE IF NOT EXISTS `pfn_arquivos_campos_palabras` (
  `id_arquivo` int(10) unsigned NOT NULL DEFAULT '0',
  `id_campo` smallint(6) unsigned NOT NULL DEFAULT '0',
  `id_palabra` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_arquivo`,`id_campo`,`id_palabra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pfn_arquivos_campos_palabras`
--


-- --------------------------------------------------------

--
-- Table structure for table `pfn_bloqueo_ip`
--

CREATE TABLE IF NOT EXISTS `pfn_bloqueo_ip` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pfn_bloqueo_ip`
--

INSERT INTO `pfn_bloqueo_ip` (`ip`) VALUES
('0.0.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `pfn_campos`
--

CREATE TABLE IF NOT EXISTS `pfn_campos` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `campo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `campo` (`campo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pfn_campos`
--

INSERT INTO `pfn_campos` (`id`, `campo`) VALUES
(1, 'titulo'),
(2, 'descricion');

-- --------------------------------------------------------

--
-- Table structure for table `pfn_configuracions`
--

CREATE TABLE IF NOT EXISTS `pfn_configuracions` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `conf` varchar(50) NOT NULL DEFAULT '',
  `vale` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pfn_configuracions`
--

INSERT INTO `pfn_configuracions` (`id`, `conf`, `vale`) VALUES
(1, 'basicas', 0),
(2, 'login', 0),
(3, 'default', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_configuracions_datos`
--

CREATE TABLE IF NOT EXISTS `pfn_configuracions_datos` (
  `campo` varchar(50) NOT NULL DEFAULT '',
  `valor` varchar(50) NOT NULL DEFAULT '',
  `id_conf` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_conf`,`campo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pfn_configuracions_datos`
--


-- --------------------------------------------------------

--
-- Table structure for table `pfn_directorios`
--

CREATE TABLE IF NOT EXISTS `pfn_directorios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `directorio` varchar(245) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `id_raiz` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `directorio` (`directorio`,`id_raiz`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pfn_directorios`
--

INSERT INTO `pfn_directorios` (`id`, `directorio`, `id_raiz`) VALUES
(1, './project/php-ssh2-1.1/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_grupos`
--

CREATE TABLE IF NOT EXISTS `pfn_grupos` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `id_conf` smallint(6) unsigned NOT NULL DEFAULT '0',
  `estado` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pfn_grupos`
--

INSERT INTO `pfn_grupos` (`id`, `nome`, `id_conf`, `estado`) VALUES
(1, 'Administrators', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_palabras`
--

CREATE TABLE IF NOT EXISTS `pfn_palabras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `palabra` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `palabra` (`palabra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pfn_palabras`
--


-- --------------------------------------------------------

--
-- Table structure for table `pfn_raices`
--

CREATE TABLE IF NOT EXISTS `pfn_raices` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `web` varchar(255) NOT NULL DEFAULT '',
  `host` varchar(255) NOT NULL DEFAULT '',
  `estado` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mantemento` date NOT NULL DEFAULT '0000-00-00',
  `peso_maximo` bigint(20) unsigned NOT NULL DEFAULT '0',
  `peso_actual` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pfn_raices`
--

INSERT INTO `pfn_raices` (`id`, `nome`, `path`, `web`, `host`, `estado`, `mantemento`, `peso_maximo`, `peso_actual`) VALUES
(1, 'ftp', '/var/www/', '/', '192.168.40.132', 1, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_raices_grupos_configuracions`
--

CREATE TABLE IF NOT EXISTS `pfn_raices_grupos_configuracions` (
  `id_raiz` smallint(6) unsigned NOT NULL DEFAULT '0',
  `id_grupo` smallint(6) unsigned NOT NULL DEFAULT '0',
  `id_conf` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_raiz`,`id_grupo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pfn_raices_grupos_configuracions`
--

INSERT INTO `pfn_raices_grupos_configuracions` (`id_raiz`, `id_grupo`, `id_conf`) VALUES
(1, 1, 3),
(0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_raices_usuarios`
--

CREATE TABLE IF NOT EXISTS `pfn_raices_usuarios` (
  `id_raiz` smallint(6) unsigned NOT NULL DEFAULT '0',
  `id_usuario` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_raiz`,`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pfn_raices_usuarios`
--

INSERT INTO `pfn_raices_usuarios` (`id_raiz`, `id_usuario`) VALUES
(0, 3),
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pfn_sesions`
--

CREATE TABLE IF NOT EXISTS `pfn_sesions` (
  `id` varchar(45) NOT NULL DEFAULT '',
  `tempo` int(10) unsigned NOT NULL DEFAULT '0',
  `contido` text NOT NULL,
  `ip` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pfn_sesions`
--


-- --------------------------------------------------------

--
-- Table structure for table `pfn_usuarios`
--

CREATE TABLE IF NOT EXISTS `pfn_usuarios` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `usuario` varchar(50) NOT NULL DEFAULT '',
  `contrasinal` varchar(50) NOT NULL DEFAULT '',
  `contrasinal_tmp` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `estado` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `id_grupo` smallint(6) unsigned NOT NULL DEFAULT '0',
  `mantemento` date NOT NULL DEFAULT '0000-00-00',
  `descargas_maximo` bigint(20) unsigned NOT NULL DEFAULT '0',
  `cambiar_datos` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `pfn_usuarios`
--

INSERT INTO `pfn_usuarios` (`id`, `nome`, `usuario`, `contrasinal`, `contrasinal_tmp`, `email`, `estado`, `admin`, `id_grupo`, `mantemento`, `descargas_maximo`, `cambiar_datos`) VALUES
(1, 'admin', 'admin', '4297f44b13955235245b2497399d7a93', '', 'dk18184@gmail.com', 1, 1, 1, '2012-11-24', 0, 1),
(2, 'test', 'test', 'aff7702b3ddda95f4c61c08d6c80d880', '', 'test@test2.com', 1, 0, 1, '2012-11-24', 524288000, 0),
(3, 'test5', 'test5', 'aff7702b3ddda95f4c61c08d6c80d880', '', 'test@test2.com', 1, 0, 1, '0000-00-00', 524288000, 0),
(4, 'heybro', 'heybro', '56d494667920111dce380bd61f03f2e8', '', 'test@test2.com', 1, 0, 1, '2012-11-26', 524288000, 0),
(5, 'dude22', 'dude22', '3b9914854424945c34f8539121cf2500', '', 'dk@msn.com', 1, 0, 1, '2012-11-24', 524288000, 1),
(6, 'john', 'john', 'e9b7150052ddd872ae15ddcbdd0540b1', '', 'dk18184@gmail.com', 1, 0, 1, '2012-11-25', 524288000, 0),
(7, 'heydude', 'heydude', '1c89d87fcb2b03ce84827a04869af332', '', 'dk18184@gmail.com', 1, 0, 1, '2012-11-26', 524288000, 0),
(8, 'dude6', 'dude6', '0724c4fb9782278f63512647e612675d', '', 'dude@gmail.com', 1, 0, 1, '2012-11-26', 524288000, 0),
(9, 'testlast', 'testlast', 'dd1f07ca0636e507061c8834e8c2edc9', '', 'test@test.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(10, 'mate123', 'mate123', 'e1ef8e83d7a03d69d18762b6caa2dc56', '', 'mate@mate.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(11, 'lolyeah', 'lolyeah', '8f71d2e38543ef319236478e854766d8', '', 'lol@haha.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(12, 'matemate123', 'matemate123', '0888e7185be1eb2f3b283212d4c9ebee', '', 'dk18184@gmail.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(13, 'yeahbro', 'yeahbro', 'd2aea815a83e6f233fa1320464454847', '', 'yeah@uhuu.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(14, 'lolyeahbro2', 'lolyeahbro2', '6bf73d101d180afbd1d0ab9e2f0ea711', '', 'lol@haha.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(15, 'lolyeahbro3', 'lolyeahbro3', '2f4cb3fa36cdbc942f8361b843695cbe', '', 'lol@haha.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(16, 'lolyeahbro4', 'lolyeahbro4', '1666695f08d90cb19ca91fbf201f62c4', '', 'lol@haha.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(17, 'lolyeahbro5', 'lolyeahbro5', '845323c0f71f54693a44791ac6191840', '', 'lolyeahbro@gmail.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(18, 'lolyeahbro6', 'lolyeahbro6', '56c291c6f22c65a30d12dd0db5d99e24', '', 'lol@haha.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(19, 'lolyeahbro7', 'lolyeahbro7', 'b5cfeedaccfc1b147dbb5123930aadb5', '', 'dk18184@gmail.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(20, 'lolyeahbro8', 'lolyeahbro8', '0be68e5a0da787c54a51533b21c0df79', '', 'lolyeahbro@gmail.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(21, 'matemate123123', 'matemate123123', '6cb6e7d28a20e2dbd76534332f96ab1b', '', 'mate@mate.com', 1, 0, 1, '2012-12-05', 524288000, 0),
(22, 'lolyeahbro9', 'lolyeahbro9', '98be1e4f9d3970bd443064d3666f590c', '', 'lolyeahbro@gmail.com', 1, 0, 1, '2012-12-05', 524288000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tz_members`
--

CREATE TABLE IF NOT EXISTS `tz_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `regIP` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `modified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usr` (`usr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tz_members`
--

INSERT INTO `tz_members` (`id`, `usr`, `pass`, `email`, `regIP`, `dt`, `password`, `admin`, `modified`) VALUES
(4, 'admin', 'e488fd271d02f720dea237e37ee9263a', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 09:54:20', '', 1, 0),
(3, 'root', 'fb3bf59a78e154292f715934d3475397', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 09:52:39', '', 0, 0),
(5, 'dude', 'f1955c907d476e49d7d5550b68889e41', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 09:55:53', '', 0, 0),
(6, 'dren2', '5e61bb905c34c65281e7b7743809edac', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 09:56:18', '', 0, 0),
(7, 'mister', 'dfa00ec8876e96dfe1cdbf899ee0f71b', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 09:57:29', '', 0, 0),
(8, 'balu', 'd93143dcf656c64befce352dc6509f5e', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 09:59:00', '', 0, 0),
(9, 'aaaa', '6a6e59df3c841669f43fab11a5e34342', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 10:00:53', '', 0, 0),
(10, 'kaka', 'd9ea99', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 10:02:11', '', 0, 0),
(11, 'yahaa', '7478964e096fe623546bbe5c86616c9e', 'dk18184@gmail.com', '192.168.1.1', '2012-11-20 10:03:03', '427ecc', 0, 0),
(12, 'joey', '12b40ae6f023103bef637561572112cc', 'dk18184@gmail.com', '192.168.40.1', '2012-11-22 14:36:34', 'aa41ce', 0, 0),
(13, 'test', '3d91f0e95a87fd66e9f54fb9ac5b524e', 'test@test2.com', '192.168.40.1', '2012-11-24 17:41:06', '9efc87', 0, 0),
(14, 'test2', 'a353042fc0881193780fcd7b2f888f25', 'test@test2.com', '192.168.40.1', '2012-11-24 17:41:12', '41d569', 0, 0),
(15, 'test3', '4fb4969cb16fa9898e0c2bedb0fdc788', 'test@test2.com', '192.168.40.1', '2012-11-24 17:41:18', '3fc4ba', 0, 0),
(16, 'test4', 'b3c2549ff8b9fa416dd717c77d65843a', 'test@msn.com', '192.168.40.1', '2012-11-24 17:44:16', 'c1d93c', 0, 0),
(17, 'test5', '749de6fdc9a22d81e5328000e2b4d686', 'test@test2.com', '192.168.40.1', '2012-11-24 18:07:50', 'bc3508', 0, 0),
(18, 'heybro', '56d494667920111dce380bd61f03f2e8', 'test@test2.com', '192.168.40.1', '2012-11-24 19:39:49', 'e94f432b52', 0, 0),
(19, 'dude22', '3b9914854424945c34f8539121cf2500', 'dk@msn.com', '192.168.40.1', '2012-11-24 19:43:00', '1356082923', 0, 0),
(20, 'john', 'e9b7150052ddd872ae15ddcbdd0540b1', 'dk18184@gmail.com', '192.168.40.1', '2012-11-25 10:56:36', 'cb27eaa39f', 0, 0),
(21, 'heydude', '1c89d87fcb2b03ce84827a04869af332', 'dk18184@gmail.com', '192.168.1.1', '2012-11-26 04:54:59', '9574b57096', 0, 0),
(22, 'dude6', '0724c4fb9782278f63512647e612675d', 'dude@gmail.com', '192.168.1.1', '2012-11-26 05:11:53', 'aba3776ab1', 0, 0),
(23, 'testlast', 'dd1f07ca0636e507061c8834e8c2edc9', 'test@test.com', '192.168.1.1', '2012-12-05 06:16:22', '43a2973843', 0, 0),
(24, 'mate123', 'e1ef8e83d7a03d69d18762b6caa2dc56', 'mate@mate.com', '192.168.1.1', '2012-12-05 07:38:20', '96ed35d6e9', 0, 0),
(25, 'lolyeah', '8f71d2e38543ef319236478e854766d8', 'lol@haha.com', '192.168.1.1', '2012-12-05 07:44:11', '2279b0488b', 0, 0),
(26, 'lolbroyeah', '62e150ee3b8f305ae30cf980cc4e5b27', 'lol@haha.com', '192.168.1.1', '2012-12-05 07:47:13', 'd1c89a5645', 0, 0),
(27, 'lolbro', 'c060eafc8a2b4bb0a4ff73a7219af0f9', 'dk18184@gmail.com', '192.168.1.1', '2012-12-05 07:47:59', '04f32da1be', 0, 0),
(28, 'lolyeahbro', '1fdbf670c3d9ad0ea8cec8af453a8fe3', 'dk18184@gmail.com', '192.168.1.1', '2012-12-05 07:48:59', '88abd0570d', 0, 0),
(29, 'mate123123', 'c91a1aa681cc8de60ab862c5601991f7', 'dk18184@gmail.com', '192.168.1.1', '2012-12-05 07:49:57', 'bfd7da217e', 0, 0),
(30, 'matemate123', '0888e7185be1eb2f3b283212d4c9ebee', 'dk18184@gmail.com', '192.168.1.1', '2012-12-05 07:52:19', 'dfff2a278b', 0, 0),
(31, 'yeahbro', 'd2aea815a83e6f233fa1320464454847', 'yeah@uhuu.com', '192.168.1.1', '2012-12-05 07:56:51', '9ae60fa609', 0, 0),
(32, 'lolyeahbro2', '6bf73d101d180afbd1d0ab9e2f0ea711', 'lol@haha.com', '192.168.1.1', '2012-12-05 07:59:34', '5575197c34', 0, 0),
(33, 'lolyeahbro3', '2f4cb3fa36cdbc942f8361b843695cbe', 'lol@haha.com', '192.168.1.1', '2012-12-05 08:00:41', '94beccd264', 0, 0),
(34, 'lolyeahbro4', '1666695f08d90cb19ca91fbf201f62c4', 'lol@haha.com', '192.168.1.1', '2012-12-05 08:01:17', 'a2bac6cbc4', 0, 0),
(35, 'lolyeahbro5', '845323c0f71f54693a44791ac6191840', 'lolyeahbro@gmail.com', '192.168.1.1', '2012-12-05 09:25:39', 'e68cf75623', 0, 0),
(36, 'lolyeahbro6', '56c291c6f22c65a30d12dd0db5d99e24', 'lol@haha.com', '192.168.1.1', '2012-12-05 09:58:06', '53ebd41fa5', 0, 0),
(37, 'lolyeahbro7', 'b5cfeedaccfc1b147dbb5123930aadb5', 'dk18184@gmail.com', '192.168.1.1', '2012-12-05 10:20:50', '6365ed6ebc', 0, 0),
(38, 'lolyeahbro8', '0be68e5a0da787c54a51533b21c0df79', 'lolyeahbro@gmail.com', '192.168.1.1', '2012-12-05 11:22:58', '222fad6c02', 0, 0),
(39, 'matemate123123', '6cb6e7d28a20e2dbd76534332f96ab1b', 'mate@mate.com', '192.168.1.1', '2012-12-05 11:27:53', '6b1e5d8e97', 0, 0),
(40, 'lolyeahbro9', '98be1e4f9d3970bd443064d3666f590c', 'lolyeahbro@gmail.com', '192.168.1.1', '2012-12-05 11:43:34', '2ffeda3307', 0, 0),
(43, 'fromadminpage', '4297f44b13955235245b2497399d7a93', 'lalal', '', '2012-12-11 09:10:22', '123123', 0, 0),
(44, 'fromadminpage1', '4297f44b13955235245b2497399d7a93', 'admindudde', '', '2012-12-11 09:10:40', '123123', 0, 0),
(45, 'lolyeahbro10', '74b87337454200d4d33f80c4663dc5e5', 'LOL', '', '2012-12-11 09:26:52', 'aaaa', 0, 0),
(46, 'meh', '4297f44b13955235245b2497399d7a93', 'kaka@mutu.com', '', '2012-12-11 09:45:33', '123123', 0, 0),
(47, 'meh1123', '4297f44b13955235245b2497399d7a93', 'kaka@mutu.com', '', '2012-12-11 09:45:54', '123123', 0, 0),
(48, 'cameadmin2', '2bd12a930c3012f9bb4e0ea9bec9a3fc', 'cameadmin@admin.com', '', '2012-12-11 14:34:24', '111222333', 0, 1),
(49, 'modified', '0ba4439ee9a46d9d9f14c60f88f45f87', 'dk18184@gmail.com', '', '2012-12-11 11:51:17', 'check', 0, 1),
(51, 'matemate2', '101193d7181cc88340ae5b2b17bba8a1', 'mate@gmail.com', '', '2012-12-12 10:34:14', '123123123123', 0, 0),
(52, 'dudedude2', 'e10adc3949ba59abbe56e057f20f883e', 'dk18184@gmail.com', '', '2012-12-12 10:40:02', '123456', 0, 0),
(53, 'dudedude23', '00b7691d86d96aebd21dd9e138f90840', 'dk18184@gmail.com', '192.168.40.1', '2012-12-12 10:41:26', '111222', 0, 1);
