-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2022 at 02:09 PM
-- Server version: 5.7.37
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkpmhosp_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `indicators_sum`
--

CREATE TABLE `indicators_sum` (
  `indicators_id` int(11) NOT NULL COMMENT 'รหัสแผนยุทธศาสตร์',
  `indicators_name` text COLLATE utf8_unicode_ci COMMENT 'ชื่อชุดแผนยุทธศาสตร์',
  `indicators_year` int(4) DEFAULT NULL COMMENT 'ปี',
  `indicators_quarter` int(1) DEFAULT NULL COMMENT 'ไตรมาส',
  `n1` int(11) DEFAULT NULL COMMENT '1.อัตราการควบคุมโรคของผู้ป่วยโรคเรื้อรังอยู่ในเกณฑ์ดี',
  `n2` int(11) DEFAULT NULL COMMENT '2.อัตราการดูแลผู้ป่วยกลุ่ม Emergency Fast-track ได้ตามมาตรฐานที่กำหนดไว้',
  `n3` int(11) DEFAULT NULL COMMENT '3.อุบัติการณ์การเสียชีวิตโดยไม่ได้คาดคิดในโรงพยาบาล',
  `n4` int(11) DEFAULT NULL COMMENT '4.อัตราการคัดกรองโรคเรื้อรังในชุมชน',
  `n5` int(11) DEFAULT NULL COMMENT '5.อัตราการเกิดโรคเรื้อรังของประชากรกลุ่มเสี่ยง',
  `n6` int(11) DEFAULT NULL COMMENT '6.อุบัติการณ์การเสียชีวิตและพิการ จาก Heat stroke ในหน่วยทหาร',
  `n7` int(11) DEFAULT NULL COMMENT '7.อุบัติการณ์การเสียชีวิตด้วยโรคไข้เลือดออกในชุมชนค่ายพ่อขุนผาเมือง',
  `n8` int(11) DEFAULT NULL COMMENT '8.อัตราโรคระบาดได้รับการควบคุมถูกต้องทันเวลา (TB, DF,Flu,โรคมือเท้าปาก,Diarrhea และโรคระบาดที่รุนแรงตามฤดูกาล )',
  `n9` int(11) DEFAULT NULL COMMENT '9.คะแนนคุณภาพชีวิตของผู้ป่วยโรคเรื้อรังที่ได้รับการเยี่ยมบ้าน > 80 คะแนน',
  `n10` int(11) DEFAULT NULL COMMENT '10.อัตราการเยี่ยมบ้านกลุ่มผู้ป่วยติดเตียง ผู้พิการและผู้ป่วย โรคเรื้อรังที่ควบคุมโรคไม่ได้',
  `n11` int(4) DEFAULT NULL COMMENT '11.อัตราความพึงพอใจของผู้รับบริการ',
  `n12` int(4) DEFAULT NULL COMMENT '12.อุบัติการณ์การเกิดข้อร้องเรียนเกี่ยวกับระบบบริการ',
  `n13` int(4) DEFAULT NULL COMMENT '13.ระยะเวลารอคอยของผู้รับบริการแผนกตรวจโรคผู้ป่วยนอก	',
  `n14` int(4) DEFAULT NULL COMMENT '14.อัตราความผูกพันของผู้รับบริการที่มีต่อโรงพยาบาล',
  `n15` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '15.ผลการประเมินการตรวจสอบภายในรายรับสถานพยาบาล (สตน.)',
  `n16` int(4) DEFAULT NULL COMMENT '16.อัตราความเสี่ยง ระดับ E และระดับ 2 ขึ้นไป ได้รับการทำ RCA',
  `n17` int(4) DEFAULT NULL COMMENT '17.อุบัติการณ์ความเสี่ยงระดับ Sentinel Event ไม่ได้รับการรายงานในเวลาที่กำหนด',
  `n18` int(4) DEFAULT NULL COMMENT '18.อัตราการเกิดความเสี่ยงซ้ำของความเสี่ยงที่ได้รับการแก้ไขแล้ว ',
  `n19` int(4) DEFAULT NULL COMMENT '19.ร้อยละของหน่วยงานในโรงพยาบาลมีบุคลากรเพียงพอและเหมาะสมตามเกณฑ์',
  `n20` int(4) DEFAULT NULL COMMENT '20.อัตราการจัดทำ CQI และนวตกรรม  ของหน่วยงานในองค์กร',
  `n21` int(4) DEFAULT NULL COMMENT '21.อุบัติการณ์การการทำผิดวินัยทางทหารร้ายแรงและ การทำผิด พรบ. วิชาชีพ  ',
  `n22` int(4) DEFAULT NULL COMMENT '22.ร้อยละความพึงพอใจในคุณภาพชีวิตต่อการทำงาน ',
  `n23` int(4) DEFAULT NULL COMMENT '23.อัตราเครื่องมือทางการแพทย์ได้รับการสอบเทียบอัตราเครื่องมือทางการแพทย์ได้รับการสอบเทียบ',
  `n24` int(4) DEFAULT NULL COMMENT '24.อัตราเครื่องมือทางการแพทย์ได้รับการสอบเทียบ',
  `n25` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '25.ผ่านเกณฑ์รับรองคุณภาพการประเมินความเสี่ยงจากการทำงานของบุคลากร\r\n          ในระดับ ดี จากกระทรวงสาธารณสุข\r\n',
  `n26` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '26.เป็นโรงพยาบาลน่าอยู่น่าทำงาน ตามเกณฑ์ของกรมแพทย์ทหารบก',
  `n27` int(4) DEFAULT NULL COMMENT '27.อุบัติการณ์การเกิด information systems downtime ของระบบ Hos-xp',
  `n28` int(4) DEFAULT NULL COMMENT '28.อัตราความเพียงพอของระบบคอมพิวเตอร์ และระบบเทคโนโลยีของหน่วยงานต่างๆ',
  `n29` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '29.ระดับความสำเร็จการพัฒนาศูนย์ความเป็นเลิศทางการแพทย์/ศูนย์แพทย์เฉพาะทาง รพ.ทบ.ตามบริบทของหน่วยได้ตามเกณฑ์ที่กรมแพทย์กำหนด',
  `n30` int(4) DEFAULT NULL COMMENT '30.อัตราการตอบสนองต่อการขอรับการสนับสนุนทางการแพทย์ต่อหน่วยทหารในค่าย',
  `n31` int(4) DEFAULT NULL COMMENT '31.อัตรากำลังพลที่ปฏิบัติราชการสนามได้รับการตรวจสุขภาพ และคัดกรองสุขภาพจิต ก่อนออกปฏิบัติภารกิจชายแดน',
  `n32` int(4) DEFAULT NULL COMMENT '32.อัตรากำลังผลได้รับความรู้ในการดูแลสุขภาพเพื่อป้องกันโรคขณะออกปฏิบัติภารกิจชายแดน',
  `indicators_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `indicators_sum`
--

INSERT INTO `indicators_sum` (`indicators_id`, `indicators_name`, `indicators_year`, `indicators_quarter`, `n1`, `n2`, `n3`, `n4`, `n5`, `n6`, `n7`, `n8`, `n9`, `n10`, `n11`, `n12`, `n13`, `n14`, `n15`, `n16`, `n17`, `n18`, `n19`, `n20`, `n21`, `n22`, `n23`, `n24`, `n25`, `n26`, `n27`, `n28`, `n29`, `n30`, `n31`, `n32`, `indicators_user`) VALUES
(1, 'แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง', 2565, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', '-', 0, 0, '-', 0, 0, 0, NULL),
(2, 'แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง', 2565, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', '-', 0, 0, '-', 0, 0, 0, NULL),
(3, 'แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง', 2565, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', '-', 0, 0, '-', 0, 0, 0, NULL),
(4, 'แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง', 2565, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', '-', 0, 0, '-', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indicators_user`
--

CREATE TABLE `indicators_user` (
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้ตัวชี้วัด',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(97) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสผ่าน',
  `salt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'token',
  `status` int(2) DEFAULT NULL COMMENT 'สถานะ',
  `login_count_account` int(1) DEFAULT NULL COMMENT 'จำนวนครั้งที่ล็อกอิน	',
  `lock_account` int(1) DEFAULT NULL COMMENT 'นาทีที่ระงับบัญชี	',
  `ban_account` datetime DEFAULT NULL COMMENT 'วันเวลา'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `indicators_user`
--

INSERT INTO `indicators_user` (`id`, `name`, `username`, `password`, `salt`, `status`, `login_count_account`, `lock_account`, `ban_account`) VALUES
(1, 'Admin', 'Admin@pkpm', '1234', NULL, 0, NULL, NULL, NULL),
(2, 'User', 'User@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(3, 'RM', 'Rm@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(4, 'IM', 'Im@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(5, 'PCT', 'Pct@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(6, 'HR', 'Hr@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(7, 'ENV', 'Env@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(8, 'PTC', 'Ptc@pkpm', '1234', NULL, 1, NULL, NULL, NULL),
(9, 'test', 'Test@pkpm', '1234', NULL, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indicators_sum`
--
ALTER TABLE `indicators_sum`
  ADD PRIMARY KEY (`indicators_id`);

--
-- Indexes for table `indicators_user`
--
ALTER TABLE `indicators_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indicators_sum`
--
ALTER TABLE `indicators_sum`
  MODIFY `indicators_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแผนยุทธศาสตร์', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `indicators_user`
--
ALTER TABLE `indicators_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้ตัวชี้วัด', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
