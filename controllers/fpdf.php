<?php

require_once PATH . '/libraries/fpdf181/fpdf.php';

class DisplayPDF {

  public function display($b, $output_file = false) {
    //set_debug($b);
    define('FPDF_FONTPATH', PATH . '/libraries/fonts/font/');
    $pdf = new FPDF();
    $pdf->AddPage();
//    $pdf->AddFont('angsa', '', 'angsa.php');
//    $pdf->SetFont('angsa', '', 16);

    $getw = $pdf->GetPageWidth();
    $geth = $pdf->GetPageHeight();

    //                         border 0 no 1 have     
    //                                    $ln 0 cont, 1 new linw     
    //                                            $align L C R
    // Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')

    $pdf->AddFont('angsa', '', 'angsa.php');
    $pdf->SetFont('angsa', '', 16);
    $pdf->Cell(0, 0, name('ฉบับที่ 1 (สำหรับผู้ถูกหักภาษี ณ ที่จ่าย ใช้แนบพร้อมกับเป็นแบบแสดงรายการภาษี)'), 0, 1);
    $pdf->Ln(5);
    $pdf->Cell(0, 0, name('ฉบับที่ 2 (สำหรับผู้ถูกหักภาษี ณ ที่จ่าย เก็บไว้เป็นหลักฐาน'), 0, 1);

    $margin = 5;
    $padding = 10;
    $margin_top = 20;
    $pdf->Rect($margin, $margin_top, $getw - $padding, $geth - 30);
    $pdf->AddFont('angsab', '', 'angsab.php');
    $pdf->SetFont('angsab', '', 20);
    $pdf->Ln(10);
    $pdf->Cell(0, 0, name('หนังสือรับรองการหักภาษี ณ ที่จ่าย'), 0, 0, 'C');
    $pdf->Ln(5);

    $pdf->AddFont('angsa', '', 'angsa.php');
    $pdf->SetFont('angsa', '', 16);

    $pdf->Cell(0, 0, name('ตามมาตรา'), 0, 0, 'C');
    $pdf->Ln(15);

    $margin_in = 7;
    $padding_in = 12;
    $pdf->Rect($margin_in, $margin_top + 20, $getw - 15, 30);
    $pdf->Cell($getw / 2, 0, name('ชื่อ', $b['name']), 0, 0);
    $pdf->Cell($getw / 2, 0, name('เลขประจำตัวผู้เสียภาษีอากร', $b['card_tax']), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, name('ที่อยู่', $b['address']), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, name('ลำดับที่', $b['number']), 0, 0);
    $pdf->Cell($getw / 2, 0, name('ประเภท', get_tax_type($b['tax_type'])), 0, 0);

    $pdf->Ln(15);
    $pdf->Rect($margin_in, $margin_top + 55, $getw - 15, 10);
    $pdf->AddFont('angsab', '', 'angsab.php');
    $pdf->SetFont('angsab', '', 16);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'ประเภทเงินได้'), 0, 0);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'วัน ภาษีที่หักจ่าย'), 0, 0);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'จำนวนเงินที่จ่าย'), 0, 0);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'ภาษีหักและนำส่งไว้'), 0, 0);

    $pdf->AddFont('angsa', '', 'angsa.php');
    $pdf->SetFont('angsa', '', 16);
    $pdf->Rect($margin_in, $margin_top + 65, $getw - 15, 60);
    $pdf->Ln(10);
    $pdf->Cell($getw / 4, 0, name('1.เงินเดือน ค่าจ้าง'), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['S']['pay_date']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['S']['pay_total']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['S']['pay_tax']), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 4, 0, name('2.ค่าธรรมเนียม'), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['F']['pay_date']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['F']['pay_total']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['F']['pay_tax']), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 4, 0, name('3.ค่าลิขสิทธ์'), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['C']['pay_date']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['C']['pay_total']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['C']['pay_tax']), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 4, 0, name('4.การจ่ายเงิน'), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['I']['pay_date']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['I']['pay_total']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['I']['pay_tax']), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 4, 0, name('5.อื่นๆ'), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['O']['pay_date']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['O']['pay_total']), 0, 0);
    $pdf->Cell($getw / 4, 0, name($b['detail']['O']['pay_tax']), 0, 0);


    $pdf->Ln(92);
    $pdf->Rect($margin_in, $geth - 80, $getw - 15, 10);
    $pdf->Cell($getw / 2, 0, name('รวมเงินภาษีที่หักส่งหักส่ง (ตัวอักษร)', $b['total_charactor']), 0, 0);

    $pdf->Ln(12);
    $pdf->Rect($margin_in, $geth - 68, $getw - 15, 10);
    $pdf->Cell($getw / 2, 0, name('ผู้จ่ายเงิน', get_pay_type($b['pay_type'])), 0, 0);

    $pdf->Ln(20);

//    $pdf->Rect($margin_in, $geth - 50, $getw / 2 - 15, 30);
//    $pdf->Ln(5);
//    $pdf->Cell($getw / 2, 0, name('คำเตือน กกกกกกกกกกกกกกก'), 0, 0);
//    $pdf->Rect($getw / 2 - 5, $geth - 50, $getw / 2 - 2, 30);
//    $pdf->Cell($getw / 2, 0, name('ลงชื่อ'), 0, 0);

    $pdf->Rect($margin_in, $geth - 50, $getw - 15, 30);
    $pdf->Cell(0, 0, name('ขอรับรองว่าข้อความและตัวเลขดังกล่าวข้างต้นถูกต้องกับความจริงทุกประการ'), 0, 0, 'C');
    $pdf->Ln(5);
    $pdf->Cell(0, 0, name('ลงชื่อ.....', $b['signal_name']." .....ผู้จ่ายเงิน"), 0, 0, 'C');
    $pdf->Ln(5);
    $pdf->Cell(0, 0, name('วันที่', $b['date_upd'].""), 0, 0, 'C');


//    $pdf->Ln(10);
//    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'รวมภาษีหักเงิน'), 0, 0);
//
//    $pdf->Ln(10);
//    $pdf->Cell($getw / 2, 0, name('ผู้จ่ายเงิน', $b['pay_type']), 0, 0);
//
//    $pdf->Ln(10);
//    $pdf->Cell($getw / 2, 0, name('ลงชื่อ', $b['signal_name']), 0, 0);
//    define('FPDF_FONTPATH', PATH . '/libraries/fonts/font/');
//
//    $pdf = new FPDF();
//
//   
//
//    $pdf->AddPage();
//    //  $pdf->SetFont('Arial', 'B', 16);
//    //$pdf->SetFont('Times','B',16);
//    $pdf->AddFont('angsa', '', 'angsa.php');
//    $pdf->Cell(100, 100, 'หนังสือรับรองการหักภาษี ณ ที่จ่าย', 1, 0, 'C');
//    //$pdf->Cell(40, 10, 'Hello World!');
//    $pdf->Output();
    //  require('fpdf.php');
//    $pdf = new FPDF();
//    $pdf->AddPage();
//    $pdf->AddFont('angsa', '', 'angsa.php');
//    $pdf->SetFont('angsa', '', 36);
//    $pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'สวัสดี ชาวไทยครีเอท'), 1, 1, "C");
//    $pdf->Output();
//    $margin = 5;
//    $padding = 10;
//    $pdf->Rect($margin, $margin, $getw - $padding, $geth - $padding);
//    $pdf->Cell(0, 0, iconv('UTF-8', 'TIS-620', 'หนังสือรับรองการหักภาษี ณ ที่จ่าย'), 0, 0, 'C');
//    $pdf->Ln(10);
//
//    $pdf->Rect(50, 50, 50, 50);
//    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ชื่อ'), 1, 0);
//    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'เลข'), 1, 0);
//    $pdf->Ln(10);
//    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ที่อยู่'), 1, 0);
//    $pdf->Ln(10);
//    $pdf->Cell(5, 10, 'xxxxxxxxxxxxxxxxx', 'B', 0);
//
//    $pdf->Ln(10);
//    $pdf->Cell($margin, 6, 'sssssssss', 'LR');
//    $pdf->Cell($margin, 6, 'sssssssss', 'LR');
//    $pdf->Cell($margin, 6, 'sssssssss', 'LR', 0, 'R');
//    $pdf->Cell($margin, 6, 'sssssssss', 'LR', 0, 'R');
//    $pdf->Ln();
    // Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
//    $pdf->Cell(150, 10, 'hello"\n"s', 1, 1);
//    $pdf->Cell(150, 10, 'hello', 1, 1);
//
//    $str = <<<EOD
//Example of string
//spanning multiple lines
//using heredoc syntax.
//EOD;
//
//    $ss = "helloworl\nkjskssss";
//
//    $pdf->Cell(150, 10, $str, 1, 1);
//    $pdf->MultiCell(90, 10, $ss, 1);
    //$pdf->Cell(80);
//    $pdf->Cell(0, 0, '', 1);
//    $pdf->Ln(20);
//
//    $pdf->Cell(40, 10, 'Hello World !', 1);
//    $pdf->Ln(20);
//    $pdf->Cell(60, 10, 'Powered by FPDF.', 0, 1, 'C');

    if ($output_file) {
      $pdf->Output(PATH . '/files/mytax.pdf', "F");
    } else {
      $pdf->Output();
    }
  }

}
