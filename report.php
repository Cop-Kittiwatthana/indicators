<?php

/**
 * PHPExcel -ดึงข้อมูลมาแสดง
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Bangkok');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
// require_once dirname(__FILE__) . 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
	->setLastModifiedBy("Maarten Balliauw")
	->setTitle("Office 2007 XLSX Test Document")
	->setSubject("Office 2007 XLSX Test Document")
	->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
	->setKeywords("office 2007 openxml php")
	->setCategory("Test result file");

include("connect.php");
$year = '2565';
// $year = $_GET['id'];
for ($x = 1; $x <= 4; $x++) {
	$query = "SELECT * FROM indicators_sum where indicators_year = '$year' and indicators_quarter = '$x'";
	$result = mysqli_query($conn, $query) or die("3.ไม่สามารถประมวลผลคำสั่งได้") . $mysqli_error;
	while ($row = mysqli_fetch_array($result)) {  // preparing an array
		$n1[$x] = "$row[n1]";
		$n2[$x] = "$row[n2]";
		$n3[$x] = "$row[n3]";
		$n4[$x] = "$row[n4]";
		$n5[$x] = "$row[n5]";
		$n6[$x] = "$row[n6]";
		$n7[$x] = "$row[n7]";
		$n8[$x] = "$row[n8]";
		$n9[$x] = "$row[n9]";
		$n10[$x] = "$row[n10]";
		$n11[$x] = "$row[n11]";
		$n12[$x] = "$row[n12]";
		$n13[$x] = "$row[n13]";
		$n14[$x] = "$row[n14]";
		$n15[$x] = "$row[n15]";
		$n16[$x] = "$row[n16]";
		$n17[$x] = "$row[n17]";
		$n18[$x] = "$row[n18]";
		$n19[$x] = "$row[n19]";
		$n20[$x] = "$row[n20]";
		$n21[$x] = "$row[n21]";
		$n22[$x] = "$row[n22]";
		$n23[$x] = "$row[n23]";
		$n24[$x] = "$row[n24]";
		$n25[$x] = "$row[n25]";
		$n26[$x] = "$row[n26]";
		$n27[$x] = "$row[n27]";
		$n28[$x] = "$row[n28]";
		$n29[$x] = "$row[n29]";
		$n30[$x] = "$row[n30]";
		$n31[$x] = "$row[n31]";
		$n32[$x] = "$row[n32]";
	}
}
// ขนาดของช่องในแถว
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
// ฟอนต์ และตัวหนา
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);

// $styleNormal2 = array(
// 	'alignment' => array(
// 		'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
// 	),
// 	'font' => array(
// 		'bold' => true,
// 		'size' => 15,
// 		'name' => 'TH SarabunPSK'
// 	)
// );
// Add some data
$style = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	)
);

$objPHPExcel->setActiveSheetIndex(0)
	// หัวข้อ
	->setCellValue('A1', 'แผนยุทธศาสตร์โรงพยาบาลค่ายพ่อขุนผาเมือง')
	->setCellValue('B1', 'ไตรมาสที่ 1')
	->setCellValue('C1', 'ไตรมาสที่ 2')
	->setCellValue('D1', 'ไตรมาสที่ 3')
	->setCellValue('E1', 'ไตรมาสที่ 4')
	->setCellValue('F1', 'เฉลี่ย / รวมรายปี');
$objPHPExcel->setActiveSheetIndex(0)
	// ข้อมูล
	->setCellValue('A2', '1. อัตราการควบคุมโรคของผู้ป่วยโรคเรื้อรังอยู่ในเกณฑ์ดี')
	->setCellValue('A3', '2. อัตราการดูแลผู้ป่วยกลุ่ม Emergency Fast-track ได้ตามมาตรฐานที่กำหนดไว้')
	->setCellValue('A4', '3. อุบัติการณ์การเสียชีวิตโดยไม่ได้คาดคิดในโรงพยาบาล')
	->setCellValue('A5', '4. อัตราการคัดกรองโรคเรื้อรังในชุมชน')
	->setCellValue('A6', '5. อัตราการเกิดโรคเรื้อรังของประชากรกลุ่มเสี่ยง')
	->setCellValue('A7', '6. อุบัติการณ์การเสียชีวิตและพิการ จาก Heat stroke ในหน่วยทหาร')
	->setCellValue('A8', '7. อุบัติการณ์การเสียชีวิตด้วยโรคไข้เลือดออกในชุมชนค่ายพ่อขุนผาเมือง')
	->setCellValue('A9', '8. อัตราโรคระบาดได้รับการควบคุมถูกต้องทันเวลา (TB, DF,Flu,โรคมือเท้าปาก,Diarrhea และโรคระบาดที่รุนแรงตามฤดูกาล )')
	->setCellValue('A10', '9. คะแนนคุณภาพชีวิตของผู้ป่วยโรคเรื้อรังที่ได้รับการเยี่ยมบ้าน > 80 คะแนน')
	->setCellValue('A11', '10. อัตราการเยี่ยมบ้านกลุ่มผู้ป่วยติดเตียง ผู้พิการและผู้ป่วย โรคเรื้อรังที่ควบคุมโรคไม่ได้')
	->setCellValue('A12', '11. อัตราความพึงพอใจของผู้รับบริการ')
	->setCellValue('A13', '12. อุบัติการณ์การเกิดข้อร้องเรียนเกี่ยวกับระบบบริการ')
	->setCellValue('A14', '13. ระยะเวลารอคอยของผู้รับบริการแผนกตรวจโรคผู้ป่วยนอก')
	->setCellValue('A15', '14. อัตราความผูกพันของผู้รับบริการที่มีต่อโรงพยาบาล')
	->setCellValue('A16', '15. ผลการประเมินการตรวจสอบภายในรายรับสถานพยาบาล (สตน.)')
	->setCellValue('A17', '16. อัตราความเสี่ยง ระดับ E และระดับ 2 ขึ้นไป ได้รับการทำ RCA')
	->setCellValue('A18', '17. อุบัติการณ์ความเสี่ยงระดับ Sentinel Event ไม่ได้รับการรายงานในเวลาที่กำหนด')
	->setCellValue('A19', '18. อัตราการเกิดความเสี่ยงซ้ำของความเสี่ยงที่ได้รับการแก้ไขแล้ว')
	->setCellValue('A20', '19. ร้อยละของหน่วยงานในโรงพยาบาลมีบุคลากรเพียงพอและเหมาะสมตามเกณฑ์')
	->setCellValue('A21', '20. อัตราการจัดทำ CQI และนวตกรรม ของหน่วยงานในองค์กร')
	->setCellValue('A22', '21. อุบัติการณ์การการทำผิดวินัยทางทหารร้ายแรงและ การทำผิด พรบ. วิชาชีพ')
	->setCellValue('A23', '22. ร้อยละความพึงพอใจในคุณภาพชีวิตต่อการทำงาน')
	->setCellValue('A24', '23. อุบัติการณ์เครื่องมือและอุปกรณ์ทางการแพทย์ที่มีความเสี่ยงสูงไม่พร้อมใช้งาน')
	->setCellValue('A25', '24. อัตราเครื่องมือทางการแพทย์ได้รับการสอบเทียบ')
	->setCellValue('A26', '25. ผ่านเกณฑ์รับรองคุณภาพการประเมินความเสี่ยงจากการทำงานของบุคลากรในระดับ ดี จากกระทรวงสาธารณสุข')
	->setCellValue('A27', '26. เป็นโรงพยาบาลน่าอยู่น่าทำงาน ตามเกณฑ์ของกรมแพทย์ทหารบก')
	->setCellValue('A28', '27. อุบัติการณ์การเกิด information systems downtime ของระบบ Hos-xp')
	->setCellValue('A29', '28. อัตราความเพียงพอของระบบคอมพิวเตอร์ และระบบเทคโนโลยีของหน่วยงานต่างๆ')
	->setCellValue('A30', '29. ระดับความสำเร็จการพัฒนาศูนย์ความเป็นเลิศทางการแพทย์/ศูนย์แพทย์เฉพาะทาง รพ.ทบ.ตามบริบทของหน่วยได้ตามเกณฑ์ที่กรมแพทย์กำหนด')
	->setCellValue('A31', '30. อัตราการตอบสนองต่อการขอรับการสนับสนุนทางการแพทย์ต่อหน่วยทหารในค่าย')
	->setCellValue('A32', '31. อัตรากำลังพลที่ปฏิบัติราชการสนามได้รับการตรวจสุขภาพ และคัดกรองสุขภาพจิต ก่อนออกปฏิบัติภารกิจชายแดน')
	->setCellValue('A33', '32. อัตรากำลังผลได้รับความรู้ในการดูแลสุขภาพเพื่อป้องกันโรคขณะออกปฏิบัติภารกิจชายแดน');
// ไตรมาสที่ 1
$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('B2', $n1[1])
	->setCellValue('B3', $n2[1])
	->setCellValue('B4', $n3[1])
	->setCellValue('B5', $n4[1])
	->setCellValue('B6', $n5[1])
	->setCellValue('B7', $n6[1])
	->setCellValue('B8', $n7[1])
	->setCellValue('B9', $n8[1])
	->setCellValue('B10', $n9[1])
	->setCellValue('B11', $n10[1])
	->setCellValue('B12', $n11[1])
	->setCellValue('B13', $n12[1])
	->setCellValue('B14', $n13[1])
	->setCellValue('B15', $n14[1])
	->setCellValue('B16', $n15[1])
	->setCellValue('B17', $n16[1])
	->setCellValue('B18', $n17[1])
	->setCellValue('B19', $n18[1])
	->setCellValue('B20', $n19[1])
	->setCellValue('B21', $n20[1])
	->setCellValue('B22', $n21[1])
	->setCellValue('B23', $n22[1])
	->setCellValue('B24', $n23[1])
	->setCellValue('B25', $n24[1])
	->setCellValue('B26', $n25[1])
	->setCellValue('B27', $n26[1])
	->setCellValue('B28', $n27[1])
	->setCellValue('B29', $n28[1])
	->setCellValue('B30', $n29[1])
	->setCellValue('B31', $n30[1])
	->setCellValue('B32', $n31[1])
	->setCellValue('B33', $n32[1]);

// ไตรมาสที่ 2
$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('C2', $n1[2])
	->setCellValue('C3', $n2[2])
	->setCellValue('C4', $n3[2])
	->setCellValue('C5', $n4[2])
	->setCellValue('C6', $n5[2])
	->setCellValue('C7', $n6[2])
	->setCellValue('C8', $n7[2])
	->setCellValue('C9', $n8[2])
	->setCellValue('C10', $n9[2])
	->setCellValue('C11', $n10[2])
	->setCellValue('C12', $n11[2])
	->setCellValue('C13', $n12[2])
	->setCellValue('C14', $n13[2])
	->setCellValue('C15', $n14[2])
	->setCellValue('C16', $n15[2])
	->setCellValue('C17', $n16[2])
	->setCellValue('C18', $n17[2])
	->setCellValue('C19', $n18[2])
	->setCellValue('C20', $n19[2])
	->setCellValue('C21', $n20[2])
	->setCellValue('C22', $n21[2])
	->setCellValue('C23', $n22[2])
	->setCellValue('C24', $n23[2])
	->setCellValue('C25', $n24[2])
	->setCellValue('C26', $n25[2])
	->setCellValue('C27', $n26[2])
	->setCellValue('C28', $n27[2])
	->setCellValue('C29', $n28[2])
	->setCellValue('C30', $n29[2])
	->setCellValue('C31', $n30[2])
	->setCellValue('C32', $n31[2])
	->setCellValue('C33', $n32[2]);

// ไตรมาสที่ 3
$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('D2', $n1[3])
	->setCellValue('D3', $n2[3])
	->setCellValue('D4', $n3[3])
	->setCellValue('D5', $n4[3])
	->setCellValue('D6', $n5[3])
	->setCellValue('D7', $n6[3])
	->setCellValue('D8', $n7[3])
	->setCellValue('D9', $n8[3])
	->setCellValue('D10', $n9[3])
	->setCellValue('D11', $n10[3])
	->setCellValue('D12', $n11[3])
	->setCellValue('D13', $n12[3])
	->setCellValue('D14', $n13[3])
	->setCellValue('D15', $n14[3])
	->setCellValue('D16', $n15[3])
	->setCellValue('D17', $n16[3])
	->setCellValue('D18', $n17[3])
	->setCellValue('D19', $n18[3])
	->setCellValue('D20', $n19[3])
	->setCellValue('D21', $n20[3])
	->setCellValue('D22', $n21[3])
	->setCellValue('D23', $n22[3])
	->setCellValue('D24', $n23[3])
	->setCellValue('D25', $n24[3])
	->setCellValue('D26', $n25[3])
	->setCellValue('D27', $n26[3])
	->setCellValue('D28', $n27[3])
	->setCellValue('D29', $n28[3])
	->setCellValue('D30', $n29[3])
	->setCellValue('D31', $n30[3])
	->setCellValue('D32', $n31[3])
	->setCellValue('D33', $n32[3]);

// ไตรมาสที่ 3
$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('E2', $n1[4])
	->setCellValue('E3', $n2[4])
	->setCellValue('E4', $n3[4])
	->setCellValue('E5', $n4[4])
	->setCellValue('E6', $n5[4])
	->setCellValue('E7', $n6[4])
	->setCellValue('E8', $n7[4])
	->setCellValue('E9', $n8[4])
	->setCellValue('E10', $n9[4])
	->setCellValue('E11', $n10[4])
	->setCellValue('E12', $n11[4])
	->setCellValue('E13', $n12[4])
	->setCellValue('E14', $n13[4])
	->setCellValue('E15', $n14[4])
	->setCellValue('E16', $n15[4])
	->setCellValue('E17', $n16[4])
	->setCellValue('E18', $n17[4])
	->setCellValue('E19', $n18[4])
	->setCellValue('E20', $n19[4])
	->setCellValue('E21', $n20[4])
	->setCellValue('E22', $n21[4])
	->setCellValue('E23', $n22[4])
	->setCellValue('E24', $n23[4])
	->setCellValue('E25', $n24[4])
	->setCellValue('E26', $n25[4])
	->setCellValue('E27', $n26[4])
	->setCellValue('E28', $n27[4])
	->setCellValue('E29', $n28[4])
	->setCellValue('E30', $n29[4])
	->setCellValue('E31', $n30[4])
	->setCellValue('E32', $n31[4])
	->setCellValue('E33', $n32[4]);

// เฉลี่ย / รวมรายปี
$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('F2', (($n1[1] + $n1[2] + $n1[3] + $n1[4]) / 4))
	->setCellValue('F3', (($n2[1] + $n2[2] + $n2[3] + $n2[4]) / 4))
	->setCellValue('F4', (($n3[1] + $n3[2] + $n3[3] + $n3[4]) / 4))
	->setCellValue('F5', (($n4[1] + $n4[2] + $n4[3] + $n4[4]) / 4))
	->setCellValue('F6', (($n5[1] + $n5[2] + $n5[3] + $n5[4]) / 4))
	->setCellValue('F7', (($n6[1] + $n6[2] + $n6[3] + $n6[4]) / 4))
	->setCellValue('F8', (($n7[1] + $n7[2] + $n7[3] + $n7[4]) / 4))
	->setCellValue('F9', (($n8[1] + $n8[2] + $n8[3] + $n8[4]) / 4))
	->setCellValue('F10', (($n9[1] + $n9[2] + $n9[3] + $n9[4]) / 4))
	->setCellValue('F11', (($n10[1] + $n10[2] + $n10[3] + $n10[4]) / 4))
	->setCellValue('F12', (($n11[1] + $n11[2] + $n11[3] + $n11[4]) / 4))
	->setCellValue('F13', (($n12[1] + $n12[2] + $n12[3] + $n12[4]) / 4))
	->setCellValue('F14', (($n13[1] + $n13[2] + $n13[3] + $n13[4]) / 4))
	->setCellValue('F15', (($n14[1] + $n14[2] + $n14[3] + $n14[4]) / 4))
	->setCellValue('F16', '')
	->setCellValue('F17', (($n16[1] + $n16[2] + $n16[3] + $n16[4]) / 4))
	->setCellValue('F18', (($n17[1] + $n17[2] + $n17[3] + $n17[4]) / 4))
	->setCellValue('F19', (($n18[1] + $n18[2] + $n18[3] + $n18[4]) / 4))
	->setCellValue('F20', (($n19[1] + $n19[2] + $n19[3] + $n19[4]) / 4))
	->setCellValue('F21', (($n20[1] + $n20[2] + $n20[3] + $n20[4]) / 4))
	->setCellValue('F22', (($n21[1] + $n21[2] + $n21[3] + $n21[4]) / 4))
	->setCellValue('F23', (($n22[1] + $n22[2] + $n22[3] + $n22[4]) / 4))
	->setCellValue('F24', (($n23[1] + $n23[2] + $n23[3] + $n23[4]) / 4))
	->setCellValue('F25', (($n24[1] + $n24[2] + $n24[3] + $n24[4]) / 4))
	->setCellValue('F26', '')
	->setCellValue('F27', '')
	->setCellValue('F28', (($n27[1] + $n27[2] + $n27[3] + $n27[4]) / 4))
	->setCellValue('F29', (($n28[1] + $n28[2] + $n28[3] + $n28[4]) / 4))
	->setCellValue('F30', '')
	->setCellValue('F31', (($n30[1] + $n30[2] + $n30[3] + $n30[4]) / 4))
	->setCellValue('F32', (($n31[1] + $n31[2] + $n31[3] + $n31[4]) / 4))
	->setCellValue('F33', (($n32[1] + $n32[2] + $n32[3] + $n32[4]) / 4));

// Miscellaneous glyphs, UTF-8
// $objPHPExcel->setActiveSheetIndex(0)
// 	->setCellValue('A4', 'Miscellaneous glyphs')
// 	->setCellValue('A5', 'ทดสอบ');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Report.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit();
