-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-05-04: 08:52:11
-- 伺服器版本: 5.6.17
-- PHP 版本： 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `teacher`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `aid` int(32) NOT NULL AUTO_INCREMENT,
  `account` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 資料表的匯出資料 `admin_info`
--

INSERT INTO `admin_info` (`aid`, `account`, `password`, `email`) VALUES
(1, 'yamol', 'yamol', 'nemocandy5@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `class_info`
--

CREATE TABLE IF NOT EXISTS `class_info` (
  `cid` int(32) NOT NULL AUTO_INCREMENT,
  `className` varchar(32) NOT NULL,
  `gradeNumber` varchar(32) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- 資料表的匯出資料 `class_info`
--

INSERT INTO `class_info` (`cid`, `className`, `gradeNumber`) VALUES
(1, '101', '1'),
(2, '102', '1'),
(3, '103', '1'),
(4, '104', '1'),
(5, '105', '1'),
(6, '201', '2'),
(7, '202', '2'),
(8, '203', '2'),
(9, '204', '2'),
(10, '205', '2'),
(11, '206', '2'),
(12, '207', '2'),
(13, '301', '3'),
(14, '302', '3'),
(15, '303', '3'),
(16, '304', '3'),
(17, '305', '3'),
(18, '401', '4'),
(19, '402', '4'),
(20, '403', '4'),
(21, '404', '4'),
(22, '405', '4'),
(23, '406', '4'),
(24, '501', '5'),
(25, '502', '5'),
(26, '503', '5'),
(27, '504', '5'),
(28, '505', '5'),
(29, '601', '6'),
(30, '602', '6'),
(31, '603', '6'),
(32, '604', '6'),
(33, '605', '6');

-- --------------------------------------------------------

--
-- 資料表結構 `class_teacher_info`
--

CREATE TABLE IF NOT EXISTS `class_teacher_info` (
  `cteaid` int(32) NOT NULL AUTO_INCREMENT,
  `className` varchar(32) NOT NULL,
  `classTeacher` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`cteaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `class_time_info`
--

CREATE TABLE IF NOT EXISTS `class_time_info` (
  `ctid` int(32) NOT NULL AUTO_INCREMENT,
  `week` int(32) NOT NULL,
  `node` int(32) NOT NULL,
  `subjectNum` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `className` varchar(32) NOT NULL,
  PRIMARY KEY (`ctid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `course_info`
--

CREATE TABLE IF NOT EXISTS `course_info` (
  `coid` int(32) NOT NULL AUTO_INCREMENT,
  `cid` int(32) NOT NULL,
  `suid` int(32) NOT NULL,
  `tid` int(32) NOT NULL,
  `ctid` int(32) NOT NULL,
  `rid` int(32) NOT NULL,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `grade_info`
--

CREATE TABLE IF NOT EXISTS `grade_info` (
  `gradeNumber` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `gradeClassNum` int(32) NOT NULL,
  PRIMARY KEY (`gradeNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `grade_info`
--

INSERT INTO `grade_info` (`gradeNumber`, `gradeClassNum`) VALUES
('1', 5),
('2', 7),
('3', 5),
('4', 6),
('5', 5),
('6', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `grade_schema_info`
--

CREATE TABLE IF NOT EXISTS `grade_schema_info` (
  `gsid` int(32) NOT NULL AUTO_INCREMENT,
  `gradeNumber` varchar(32) NOT NULL,
  `subjectNum` varchar(32) NOT NULL,
  `gradeSubjectNum` int(32) NOT NULL,
  PRIMARY KEY (`gsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- 資料表的匯出資料 `grade_schema_info`
--

INSERT INTO `grade_schema_info` (`gsid`, `gradeNumber`, `subjectNum`, `gradeSubjectNum`) VALUES
(1, '1', '1', 4),
(2, '1', '4', 1),
(3, '1', '2', 3),
(4, '1', '7', 3),
(5, '1', '8', 2),
(7, '1', '16', 3),
(8, '1', '9', 4),
(9, '1', '12', 1),
(10, '1', '13', 1),
(11, '1', '14', 1),
(12, '2', '1', 4),
(13, '2', '4', 1),
(14, '2', '2', 3),
(15, '2', '7', 3),
(16, '2', '8', 2),
(17, '2', '16', 3),
(18, '2', '9', 4),
(19, '2', '12', 1),
(20, '2', '13', 1),
(21, '2', '14', 1),
(22, '3', '1', 4),
(23, '3', '4', 1),
(24, '3', '2', 3),
(25, '3', '7', 2),
(26, '3', '8', 3),
(27, '3', '6', 3),
(28, '3', '5', 3),
(29, '3', '3', 2),
(30, '3', '15', 1),
(31, '3', '13', 2),
(32, '3', '12', 1),
(33, '3', '14', 1),
(34, '3', '10', 1),
(35, '3', '11', 2),
(36, '4', '1', 4),
(37, '4', '4', 1),
(38, '4', '2', 3),
(39, '4', '7', 2),
(40, '4', '8', 3),
(41, '4', '6', 3),
(42, '4', '5', 3),
(43, '4', '3', 2),
(44, '4', '15', 1),
(45, '4', '13', 2),
(46, '4', '12', 1),
(47, '4', '14', 1),
(48, '4', '10', 1),
(49, '4', '11', 2),
(50, '5', '1', 5),
(51, '5', '4', 1),
(52, '5', '2', 4),
(53, '5', '7', 3),
(54, '5', '8', 3),
(55, '5', '6', 3),
(56, '5', '5', 3),
(57, '5', '3', 2),
(58, '5', '15', 1),
(59, '5', '13', 2),
(60, '5', '12', 1),
(61, '5', '14', 1),
(62, '5', '10', 1),
(63, '5', '11', 2),
(64, '6', '1', 5),
(65, '6', '4', 1),
(66, '6', '2', 4),
(67, '6', '7', 3),
(68, '6', '8', 3),
(69, '6', '6', 3),
(70, '6', '5', 3),
(71, '6', '3', 2),
(72, '6', '15', 1),
(73, '6', '13', 2),
(74, '6', '12', 1),
(75, '6', '14', 1),
(76, '6', '10', 1),
(77, '6', '11', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `room_info`
--

CREATE TABLE IF NOT EXISTS `room_info` (
  `rid` int(32) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(32) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `source_class_info`
--

CREATE TABLE IF NOT EXISTS `source_class_info` (
  `scid` int(32) NOT NULL AUTO_INCREMENT,
  `cid` int(32) NOT NULL,
  `coid` int(32) NOT NULL,
  `tid` int(32) NOT NULL,
  `people` int(32) NOT NULL,
  PRIMARY KEY (`scid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `subject_info`
--

CREATE TABLE IF NOT EXISTS `subject_info` (
  `suid` int(32) NOT NULL AUTO_INCREMENT,
  `subjectNum` int(32) NOT NULL,
  `subjectName` varchar(32) NOT NULL,
  PRIMARY KEY (`suid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 資料表的匯出資料 `subject_info`
--

INSERT INTO `subject_info` (`suid`, `subjectNum`, `subjectName`) VALUES
(1, 1, '國文'),
(2, 2, '數學'),
(3, 3, '英文'),
(4, 4, '閱讀'),
(5, 5, '自然'),
(6, 6, '社會'),
(7, 7, '彈性時間'),
(8, 8, '綜合活動'),
(9, 9, '生活B'),
(10, 10, '音樂'),
(11, 11, '美勞表演'),
(12, 12, '健康'),
(13, 13, '體育'),
(14, 14, '閩南語'),
(15, 15, '資訊'),
(16, 16, '生藝A');

-- --------------------------------------------------------

--
-- 資料表結構 `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `sid` int(32) NOT NULL AUTO_INCREMENT,
  `tid` int(32) NOT NULL,
  `exceedClass` int(32) NOT NULL,
  `totalClass` int(32) NOT NULL,
  `hope1` varchar(32) NOT NULL,
  `hope2` varchar(32) NOT NULL,
  `hope3` varchar(32) NOT NULL,
  `hope4` varchar(32) NOT NULL,
  `hope5` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 資料表的匯出資料 `survey`
--

INSERT INTO `survey` (`sid`, `tid`, `exceedClass`, `totalClass`, `hope1`, `hope2`, `hope3`, `hope4`, `hope5`) VALUES
(6, 6, 1, 12, '美勞表演', '閱讀', '健康', '閩南語', '無'),
(7, 7, 0, 7, '自然與生活科技', '社會', '無', '無', '無');

-- --------------------------------------------------------

--
-- 資料表結構 `teacher_info`
--

CREATE TABLE IF NOT EXISTS `teacher_info` (
  `tid` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `jobTitle` varchar(32) NOT NULL,
  `limit` varchar(32) NOT NULL,
  `jobClass` int(32) NOT NULL,
  `subClass` int(32) NOT NULL,
  `realClass` int(32) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 資料表的匯出資料 `teacher_info`
--

INSERT INTO `teacher_info` (`tid`, `name`, `jobTitle`, `limit`, `jobClass`, `subClass`, `realClass`) VALUES
(2, '蔡志華', '教師兼教務主任', '', 1, 0, 1),
(3, '林明輝', '教師兼學務主任', '', 1, 0, 1),
(4, '張錫傑', '教師兼總務主任', '', 1, 0, 1),
(5, '鄭玉敏', '教師兼輔導主任', '', 1, 0, 1),
(6, '蕭芝樺', '教師兼教學組長', '', 12, 1, 11),
(7, '陳錫川', '教師兼資訊設備組長', '', 12, 5, 7),
(8, '陳媄華', '教師兼註冊組長', '', 12, 0, 12),
(9, '陳文勤', '教師兼體育組長', '', 12, 1, 11),
(10, '趙秀貞', '教師兼活動組長', '', 12, 1, 11),
(11, '陳子蕙', '教師兼生教組長', '', 12, 1, 11),
(12, '許燕妮', '教師兼文書組長', '', 12, 1, 11),
(13, '謝世智', '級任教師兼出納組長', '', 12, 0, 12),
(14, '劉美貞', '教師兼輔導組長', '', 12, 1, 11),
(15, '林南彬', '教師兼資料組長', '', 12, 1, 11),
(16, '張智能', '科任教師', '', 20, 2, 18),
(17, '李降昌', '科任教師', '', 20, 1, 19),
(18, '賴韋秀', '代理老師', '', 20, 0, 20),
(19, '黃菁芳', '級任老師', '', 16, 1, 15),
(20, '黃靖芬', '級任教師', '', 16, 0, 16),
(21, '鍾宜凌', '級任教師', '', 16, 0, 16),
(22, '林秀娟', '級任教師', '', 16, 0, 16),
(23, '李淑娥', '級任教師', '', 16, 0, 16),
(24, '鄭碧雯', '代理老師', '', 16, 0, 16),
(25, '洪千媄', '級任教師', '', 16, 4, 12),
(26, '林綵婕', '級任教師', '', 16, 1, 15),
(27, '徐月貞', '級任教師', '', 16, 1, 15),
(28, '黃如瑾', '級任教師', '', 16, 1, 15),
(29, '廖文毅', '級任教師', '', 16, 1, 15),
(30, '許秀芬', '級任教師', '', 16, 0, 16),
(31, '郟天保', '級任教師', '', 16, 2, 14),
(32, '黃琬玲', '級任教師', '', 16, 0, 16),
(33, '陳昭永', '級任教師', '', 16, 1, 15),
(34, '陳旻芳', '代理老師', '', 16, 0, 16),
(35, '周學蕙', '級任教師', '', 16, 0, 16),
(36, '陳威男', '級任教師兼事務組長', '', 12, 0, 12),
(37, '林慧婷', '級任教師', '', 16, 1, 15),
(38, '王勝弘', '級任教師', '', 16, 0, 16),
(39, '陳胤百', '代理老師', '', 16, 0, 16),
(40, '吳宗弘', '級任教師', '', 16, 0, 16),
(41, '黃煥東', '級任教師兼衛教組長', '', 12, 0, 12),
(42, '范家強', '級任教師', '', 16, 0, 16),
(43, '朱恭慶', '級任教師', '', 16, 1, 15),
(44, '蘇永誠', '級任教師', '', 16, 0, 16),
(45, '郭軍豪', '級任教師', '', 16, 0, 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
