-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2013 at 07:08 AM
-- Server version: 5.1.63-0+squeeze1
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cw_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw_deleted_users`
--

CREATE TABLE IF NOT EXISTS `cw_deleted_users` (
  `deleted_id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `deleted_user_name` varchar(25) NOT NULL,
  `user_password_hash` char(60) NOT NULL,
  `deleted_user_first_name` varchar(25) NOT NULL,
  `deleted_user_last_name` varchar(25) NOT NULL,
  `deleted_user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`deleted_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_groups`
--

CREATE TABLE IF NOT EXISTS `cw_groups` (
  `group_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `grup_name` varchar(25) NOT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `grup_name` (`grup_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_login_attempts`
--

CREATE TABLE IF NOT EXISTS `cw_login_attempts` (
  `user_id` int(11) NOT NULL,
  `login_attempt_time` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_logs`
--

CREATE TABLE IF NOT EXISTS `cw_logs` (
  `log_id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `log_user_name` varchar(25) NOT NULL,
  `log_user_email` varchar(50) NOT NULL,
  `log_last_time` varchar(100) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cw_users`
--

CREATE TABLE IF NOT EXISTS `cw_users` (
  `user_id` int(25) NOT NULL AUTO_INCREMENT COMMENT 'users ID',
  `user_first_name` varchar(25) NOT NULL DEFAULT '' COMMENT 'users first name',
  `user_last_name` varchar(25) NOT NULL DEFAULT '' COMMENT 'users last name',
  `user_email` varchar(50) NOT NULL DEFAULT '' COMMENT 'users email',
  `user_name` varchar(25) NOT NULL DEFAULT '' COMMENT 'users unique username',
  `user_password_hash` char(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'password in hash',
  `user_info` varchar(50) NOT NULL COMMENT 'information around user',
  `user_last_loggedin` varchar(100) NOT NULL DEFAULT 'never' COMMENT 'users last loged in',
  `user_level` enum('1','2','3','4','5','666') NOT NULL DEFAULT '1' COMMENT 'priviledge level',
  `forgot` varchar(100) DEFAULT NULL COMMENT 'forgot the passowrd or not',
  `user_status` enum('live','suspended','pending') NOT NULL DEFAULT 'live' COMMENT 'if it''s alive or not',
  `user_workingspace` varchar(25) NOT NULL COMMENT 'users working space',
  `user_member_since` datetime NOT NULL COMMENT 'Users member since',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Membership Information' AUTO_INCREMENT=366 ;

--
-- Dumping data for table `cw_users`
--

INSERT INTO `cw_users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_name`, `user_password_hash`, `user_info`, `user_last_loggedin`, `user_level`, `forgot`, `user_status`, `user_workingspace`, `user_member_since`) VALUES
(307, 'testmore', 'testmore', 'testmore@gmail.com', 'testmore', '$2a$10$lG1n9HgLcNEp/WZpqwAM2e1Yu1JayvssHZ0CtZ0A6G5Li9jVji0OG', '', 'never', '1', NULL, 'suspended', '../testmore', '2013-06-03 18:57:11'),
(295, 'alexi', 'lahio', 'alexi@gmail.com', 'alexi', '$2a$10$tq/5aIQ.fhzpvNY3Yq3RleLTOPdHOkAhbNiRu3e3KbO9Q12leiSGy', '', '13/06/13 19:10:22', '5', NULL, 'live', '../alexi', '2013-05-16 17:15:53'),
(263, 'delfin', 'ajkulla', 'suspended@gmail.com', 'suspended', '$2a$10$/uMUJMeJHlpVNC6K9LetMOyOgg0UUkPzsuIH4E6xbyA4AnR0.eNQO', '', 'never', '5', NULL, 'suspended', '../suspended', '2013-05-13 00:00:00'),
(301, 'dren', 'kajmakqi', 'hey@gmail.com', 'heydude', '$2a$10$y2R8zFQCQjaQbk9/no8XTOK6yvl7J35YvGJHHWi9DY0LdC2vnNMk6', '', 'never', '5', NULL, 'live', '../heydude', '2013-06-03 12:48:39'),
(312, 'dren', 'kaka', 'croco@gmail.com', 'crocodile', '$2a$10$nPD1AVSoqlWpanVeXGoRG.ApD9wMPwxAMRz99iSDSrfyMONwGeI9K', '', '05/06/13 11:43:48', '5', NULL, 'live', '../crocodile', '2013-06-05 08:28:23'),
(267, 'dren', 'kajmakci', 'dude11223@gmail.com', 'dude11223', '$2a$10$s29wJj0je4gOL5VUQsqelOotpVWJlrEZRjNQXAWdp3nwSzesUNMUO', '', 'never', '5', NULL, 'live', '../dude11223', '2013-05-13 00:00:00'),
(282, 'dren', 'kajmakci', 'ssh@gmail.com', 'sshuser', '$2a$10$z0VkKJ3uyscFx9y88ww1OOBzJoeAU/WyGNU5H8Zpb.6bUuaYlqYE.', '', 'never', '1', NULL, 'suspended', '../sshuser', '2013-05-13 11:54:29'),
(292, 'dren', 'kajmakci', 'delfinf@gmail.com', 'delfin112233', '$2a$10$g37VqF/W7BGlNBHw/HhbTeq/9VcgH/lDAEcVqO91Fvq8jGvreMen.', '', 'never', '1', NULL, 'suspended', '../delfin112233', '2013-05-15 11:15:30'),
(262, 'dren', 'kajmakci', 'dren@gmail.com', 'dude11', '$2a$10$cJCqk3KHreMR5zPhg4Ion.0gzBjKNjgkoi6czrZKudKzCXVtAhgAi', '', 'never', '5', NULL, 'live', '../dude11', '2013-05-13 00:00:00'),
(258, 'dren', 'kajmakc', 'dk18184@gmail.com', 'dren', '$2a$10$ckcrr0MToqw/y.6SQahGh.eheM7OPPf5oWPxq1pD7lU.GUU0dqOOW', '', 'never', '5', NULL, 'live', '../dren', '2013-05-12 00:00:00'),
(254, 'delfin', 'ajkulla', 'delfin11@gmail.com', 'delfin11', '$2a$10$qo0Lz6cIDJ7CWpp/H99zgO.9e2Omffhan2yetcFDqhVjOw.4Ewk/m', '', 'never', '5', NULL, 'live', '../delfin11', '2013-05-12 00:00:00'),
(278, 'lasdlas', 'sadasd', 'asdsaasdasd@kaskdas.com', 'asdasdasd', '$2a$10$Gd0Bmt5pwCzI.MaZzn5F7u7Y/YMqcUke2ZOv310OQ9D6CRAhNE7cK', '', 'never', '5', NULL, 'live', '../asdasdasd', '2013-05-13 10:52:54'),
(237, 'dren', 'kajmakci', 'dud3@gmail.com', 'dud3', '$2a$10$3sdmO0lZEpCl13gtwOe7YumsyjfhNc25OpB5y3isnM2nTSe0/7C9a', '', 'never', '5', NULL, 'live', '../dud3', '2013-05-11 00:00:00'),
(236, 'elin', 'Jonsdottir', 'aesgadur@hotmail.com', 'aesa95', '$2a$10$zznYT7ZwXlgDSllEHarfPOju179BLLBKQ1ZmacctnLq8yQWI00cl6', '', '13/06/13 18:24:13', '5', NULL, 'live', '../aesa95', '2013-05-11 00:00:00'),
(257, 'dren', 'kaj', 'dkasd', 'dkas', '$2a$10$XPXIWZuKbMi8OihBenCWm.SZEIJmXkhYWeRphpb4whpbUKWeHFZpG', '', 'never', '5', NULL, 'suspended', '../dkas', '2013-05-12 00:00:00'),
(249, 'dren', 'kajmakci', 'dk@dude.com', 'drenkaka', '$2a$10$MMk2dyqoxVqfRorV3oUEverP97EnSQJJwtljEAfICv88dRhBBZyTK', '', 'never', '5', NULL, 'suspended', '../drenkaka', '2013-05-11 00:00:00'),
(234, 'dren', 'kajmakci', 'hopethisone@gmail.com', 'hopethisone', '$2a$10$wIORfDS9v66e/I6ygnfgoucoIVI/Efcte3.U8i4Vbx/7wVVWiblpS', '', 'never', '5', NULL, 'suspended', '../hopethisone', '2013-05-11 00:00:00'),
(246, 'dren', 'kajmakci', 'dk181814@gmail.com', 'delfin10', '$2a$10$teu3MUo5n9O.InTYtu1Zv.0pPECX4ygH.T0p1.hP9yOG40kVYn3Zq', '', 'never', '5', NULL, 'live', '../delfin10', '2013-05-11 00:00:00'),
(243, 'john', 'someonesson', 'john@gmail.is', 'john', '$2a$10$QGsUp/ghPebOBc266DKcduIRPhFL0kXIQgAVIdjBUqeW4FNmsYX5S', '', '02/06/13 21:12:15', '5', NULL, 'live', '../john', '2013-05-11 00:00:00'),
(247, 'dren', 'kajmakci', 'delfin7@gmail.com', 'delfin', '$2a$10$r9LC74uiVezc0ottucP1zOY7yif8HLo4MpHjFvQ1AbWcShDR6InOi', '', '21/06/13 7:04:00', '5', NULL, 'live', '../delfin', '2013-05-11 00:00:00'),
(277, 'dren', 'kajmakci', 'delfin7@gmail.com', 'delfin10', '$2a$10$YJC/BdxFE4Ne37N6QaDzVeeTxqAsYiLusfL3Bvf6P35OYRnEybrWm', '', 'never', '5', NULL, 'live', '../delfin10', '2013-05-13 10:46:44'),
(274, 'dren', 'kajmakci', 'dude@gmail.jp', 'dude', '$2a$10$/sL3a8pGgzOVQqwbJsmKEetcmLaTrs7u6TUT8hLzzI3XagBPQwZ02', '', 'never', '5', NULL, 'live', '../dude', '2013-05-13 10:20:41'),
(298, 'testwithme', 'test', 'testme@me.com', 'testme', '$2a$10$AyuhHj.ONra9E0SQ7O3TAeHkYqL.dxlNuMj2sFr74UMZULp7dC2gu', '', 'never', '1', NULL, 'suspended', '../testme', '2013-06-02 08:49:25'),
(300, 'admin', 'me', 'admin@gmail.com', 'admin2', '$2a$10$wZLlyp0scYoVHNxpv.dmsO1D2PapCPAxzzlfiWZLwWIOl783WoYvu', '', 'never', '5', NULL, 'live', '../admin2', '2013-06-02 13:44:40'),
(306, 'test', 'test2222', 'testt@gmail.com', 'testt', '$2a$10$AKaiOQHU9yrvB6hIBjBwKOtxNW/WrFlb6ogoIAI/Jvr46TIbL7KeG', '', '03/06/13 18:09:45', '1', NULL, 'live', '../testt', '2013-06-03 18:09:18'),
(303, 'test', 'tesdt2', 'hey@gm22ail.com', 'tesdt222', '$2a$10$n2rfIN9V2ZLgQYxc9A7Rh.uV743xomuQ4Eolx4eHC5dxGhkJF2CPm', '', 'never', '1', NULL, 'live', '../tesdt222', '2013-06-03 12:54:47'),
(341, 'elin', 'Jonsdottir', 'elin2@gmail.com', 'elin2', '$2a$10$EBY6LA.eHC6mR8/ERmOPFO4CGSE0/nyxRA/qHTtcFn8eAEcq/Lbq.', '', 'never', '1', NULL, 'live', '../elin2', '2013-06-09 20:31:32'),
(305, 'test', 'test2222', 'testaere@famsdas.com', 'test2323123', '$2a$10$jYpka0RjIXXUzGhtYmd7xOow8ypMe6zBInHxCnDuESJVP7BGRku7O', '', 'never', '1', NULL, 'live', '../test2323123', '2013-06-03 15:31:25'),
(308, 'testmore', 'testmore', 'tewwwst@gmail.com', 'tesdt', '$2a$10$VMc9wF/DLqLmlat5DJ4MZORgiOXC68AkRpA20MKC5x5nAjDT3pIsC', '', 'never', '1', NULL, 'live', '../tesdt', '2013-06-04 12:29:45'),
(309, 'test', 'test', 'testdudetest@gmail.com', 'testdudetest', '$2a$10$Pmp9xjAkqMAwSaC3xXHuP./77tDqMnVYbks6zmIkyiXnNevb0EoaC', '', 'never', '1', NULL, 'live', '../testdudetest', '2013-06-04 12:51:04'),
(310, 'test', 'test2', 'test222@gmail.com', 'test22', '$2a$10$vpiRDVqeSQVh.xvPDAisHOq5lDkVERZbKMotJdoyyXqiEHYODEeaa', '', 'never', '1', NULL, 'suspended', '../test22', '2013-06-04 15:04:58'),
(311, 'test', 'test', 'testyeah@gmail.com', 'testyeah', '$2a$10$aIHkODf/Grw5T70WtUb7WuiM9AVTo2sGwqUT220N.8WK8Szp5kKpK', '', 'never', '1', NULL, 'live', '../testyeah', '2013-06-04 15:06:35'),
(313, 'dren', 'kajmakci', 'heyddd@gmail.com', 'heydudde', '$2a$10$Ffo5cHyyZUBBFjHqYNlkwuolFf9xc7xwuwuMyBPKINqJRbAN0.aoW', '', 'never', '1', NULL, 'live', '../heydudde', '2013-06-05 11:41:25'),
(314, 'dren', 'kajmakci', 'dude1122@gmail.com', 'dude1122', '$2a$10$7YAry1zp7PnUfZVJCggZQeF3CuQfVInhva4p8qGRGLiqcB4E3.Yiy', '', '05/06/13 17:29:30', '5', NULL, 'live', '../dude1122', '2013-06-05 17:28:26'),
(315, 'dude', 'dude', 'dkqq@gmail.com', 'dkqq', '$2a$10$6/dj55mLghbhfVPII9yiKupvrBeaC5oDpfflLnahoq.yNugptWX8e', '', '05/06/13 17:32:58', '1', NULL, 'suspended', '../dkqq', '2013-06-05 17:32:44'),
(330, 'dren', 'kajmakci', 'heydude11@gmail.com', 'heydude11', '$2a$10$cyEJnuzTYfXJkejySMi2ve46W7awmbRTLHWlECI4s0bRtr67HTZSO', '', 'never', '5', NULL, 'live', '../heydude11', '2013-06-08 14:58:00'),
(317, 'john', 'test', 'matt@gmail.com', 'matt_Trivium', '$2a$10$6MLjpcoJH.LUDkXGGMjGZ.l80sJUN047USejNqIf6fciflDW/SVbe', '', '05/06/13 17:37:06', '5', NULL, 'live', '../matt_Trivium', '2013-06-05 17:36:25'),
(318, 'corey', 'balieu', 'corey@gmail.com', 'corey', '$2a$10$AaTk76q/XpGlCVi.ooUzke5Cc4mDEotGaSC2VHOyUJdxrQVoVwqbi', '', '05/06/13 17:39:06', '1', NULL, 'suspended', '../corey', '2013-06-05 17:38:44'),
(319, 'corey', 'bali', 'corey2@gmail.com', 'corey2', '$2a$10$MRlJQwmX5Nzpz6uK.3BSp.Pe8w0PFzfsCdo6gXdPxJ.t0W9c7hOD.', '', '08/06/13 8:15:27', '1', NULL, 'suspended', '../corey2', '2013-06-05 17:41:01'),
(336, 'dren', 'kajmakci', 'heydudedee@gmail.com', 'heyduded', '$2a$10$kuPIe7BE3gUuACrjm4Xv8Oe/chMRI9VFxe27UNjXM/Na9ms7jXxD.', '', 'never', '5', NULL, 'live', '../heyduded', '2013-06-09 18:11:39'),
(337, 'nego', 'kajmakci', 'nego@gmail.com', 'nego', '$2a$10$LcUVGmvbBTzxCKyw6864X.ugiPArVFBtnfaKy0hYqmgu2tAn35nRS', '', 'never', '5', NULL, 'live', '../nego', '2013-06-09 18:24:44'),
(338, 'dren', 'kajmakci', 'dk181814@gm2221ail.com', 'dude123', '$2a$10$AMcHOzOtrgeKxVFLSiiR2u2Df9qnU/zALofuhfZ5e8EUMyQvcoIXG', '', 'never', '1', NULL, 'live', '../dude123', '2013-06-09 20:17:58'),
(339, 'dude', 'jasdja', 'lalal@gmail.com', 'lalala', '$2a$10$ug1CtgbmLlJZRM6QqTrtGOwjtRF4qPhW.6ms0QpbXbGyoT6zLPcdG', '', 'never', '1', NULL, 'live', '../lalala', '2013-06-09 20:20:27'),
(331, 'dren', 'kajmacki', 'dudeee@gmail.com', 'dude112233', '$2a$10$id9hjERVgc84DQ4OVgTZbef7IGWxJ1EznorUAeumLeOSipe73oiye', '', 'never', '1', NULL, 'suspended', '../dude112233', '2013-06-08 15:00:31'),
(340, 'dren', 'kajmakci', 'heydddddd@gmail.com', 'heyduddd123', '$2a$10$LDrIK8asfJcV0ZktOhK4COv.eRKOBOUIM4Wvbhz3kDLbG058Dclme', '', 'never', '1', NULL, 'live', '../heyduddd123', '2013-06-09 20:26:47'),
(343, 'dren', 'kajmakci', 'dude112233@gmail.com', 'dude221122', '$2a$10$D2Z9E1ad7nELEAY5v7MM0..oXq28jwCZXEDUHbs5aAZpHxVhfvuU.', '', 'never', '1', NULL, 'suspended', '../dude221122', '2013-06-11 08:51:18'),
(344, 'dren', 'kajmakci', 'dudedue@gmail.com', 'dudeduded', '$2a$10$9EXkWV0GT2S3frnZfqcoCuxC3XxF6fuPPfPnZKOR6lUE2LqiaaKrC', '', 'never', '1', NULL, 'live', '../dudeduded', '2013-06-11 08:54:26'),
(345, 'dren', 'kajmakci', 'heydddddd@gm2ail.com', 'heydude21', '$2a$10$r7b.kUbAKhVCxlegnf/AYu0hnMFPgu2f51UxmNu4qmWqvavwJZO32', '', 'never', '1', NULL, 'live', '../heydude21', '2013-06-11 09:01:56'),
(346, 'adnan', 'jangjyt', 'adnan@gmail.com', 'adnanjangjyt', '$2a$10$588V.Zs/LBHBuAWH0W1rs.3eKE6Jl6qaCtNc4Kre1iAmMld3Mu22W', '', 'never', '1', NULL, 'suspended', '../adnanjangjyt', '2013-06-11 09:27:52'),
(347, 'dren', 'kajmakci', 'dudedudeddd@gmail.com', 'dudedudeddd', '$2a$10$k.zCqNF6XNiv1XfS/nzqYOg0w3b7oLIYrvughNw8nWhE0pYuLyWJe', '', 'never', '1', NULL, 'live', '../dudedudeddd', '2013-06-11 09:28:50'),
(348, 'john', 'dude', 'john31@gmail.com', 'john31', '$2a$10$EOGR4HW3OE8vdUsN73YWeeDp561snqrdllHWviIRxBz3ZK68ddMzq', '', 'never', '1', NULL, 'live', '../john31', '2013-06-11 09:32:47'),
(352, 'paulo', 'notsure', 'pauloTrivium@gmail.com', 'pauloTrivium', '$2a$10$KPt8DvD1GOMIndy3.QEmce.VG4a5AdljFzXbmJrJgxyL3TEKrN4Wa', '', 'never', '1', NULL, 'suspended', '../pauloTrivium', '2013-06-12 13:28:33'),
(353, 'travis', 'notsure', 'travis@gmail.com', 'travisTrivium', '$2a$10$/mJB0ArJ5sxfFuQ8DgnipuKdtGBOzGwiZh/iXcUV5edI00lwuCbEK', '', 'never', '1', NULL, 'live', '../travisTrivium', '2013-06-12 13:30:01'),
(354, 'trivium', 'me', 'trivium@gmail.com', 'trivium', '$2a$10$zwGYisoh3nv8gEh8x.8Zbe0B9iTv8FSZpQUNg6KMNG0BT6oEf8Kk2', '', '12/06/13 17:56:29', '1', NULL, 'live', '../trivium', '2013-06-12 17:47:14'),
(358, 'dren', 'kajmak', 'testsize@gmail.com', 'testsize', '$2a$10$31xbDzld.IWNdJ8X9GfNAuA9/zNQcpuCR1PB5ADjlRN/kL.P1Ky3m', '', '19/06/13 19:07:32', '1', NULL, 'live', '../testsize', '2013-06-17 09:55:59'),
(362, 'test', 'test', 'newuser2@gmail.com', 'newuser', '$2a$10$88CK6d/DXGIVALLHy2aiQOv9PJqMtCcVLXsEatb/o/mvLVu/B/ILK', '', '19/06/13 19:13:42', '1', NULL, 'live', '../newuser', '2013-06-19 19:12:33'),
(361, 'corey', 'smith', 'corey.smith@gmail.com', 'corey_me', '$2a$10$qa14jsN14BQz.d3f5EtiFuagEZkd0Mh9JQJumTb2olHePWYwg.rCO', '', 'never', '1', NULL, 'live', '../corey_me', '2013-06-18 14:14:23'),
(359, 'testnewsize', 'test', 'testnewsize@gmail.com', 'testnewsize', '$2a$10$gXbDhdokBcqewTFwBIJ4hO5vVBbJu4RTb4UuOV8Ub8RJhhz3oB3gS', '', '18/06/13 6:29:20', '1', NULL, 'live', '../testnewsize', '2013-06-17 10:20:11'),
(364, 'test', 'test', 'newmysql@gmail.com', 'newmysql', '$2a$10$MoFcVd/iUC47Ryith85eT.IJ.bTxqvSgdR.Xp7Exenau9awxfkefi', '', 'never', '1', NULL, 'live', '../newmysql', '2013-06-20 06:24:26'),
(360, 'edin', 'symbyl', 'ebinbabo@gmail.com', 'ebinsymbyl', '$2a$10$PQPz.5VFJxm48wSLh7V.Q.Lq4bd90b9iCOshV.NIcwPnGAme9EKcm', '', '17/06/13 21:02:25', '1', NULL, 'live', '../ebinsymbyl', '2013-06-17 18:09:01'),
(363, 'test', 'test', 'newuseruwer@gmail.com', 'newuseruser', '$2a$10$y7NZ3cgD4gNPQ7i0LjCgQuiVc3Yk60T4JZpRes.2Bh.dpWVAjR/ay', '', 'never', '1', NULL, 'live', '../newuseruser', '2013-06-19 19:16:15'),
(365, 'admiral', 'admiral', 'admiral@gmail.com', 'admiral', '$2a$10$Z5lg.hoTTgIIc9FEUkfq9uMEP4IIOFELJpth4J750DySJmfjVtcHK', '', '21/06/13 7:05:44', '5', NULL, 'live', '../admiral', '2013-06-20 11:30:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
