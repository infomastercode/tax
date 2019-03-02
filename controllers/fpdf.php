<?php

require_once PATH . '/libraries/fpdf181/fpdf.php';

class DisplayPDF {

  public function display() {

    define('FPDF_FONTPATH', PATH . '/libraries/fonts/font/');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->AddFont('angsa', '', 'angsa.php');
    $pdf->SetFont('angsa', '', 16);

    $getw = $pdf->GetPageWidth();
    $geth = $pdf->GetPageHeight();

    //                         border 0 no 1 have     
    //                                    $ln 0 cont, 1 new linw     
    //                                            $align L C R
    // Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')


    $margin = 5;
    $padding = 10;
    $pdf->Rect($margin, $margin, $getw - $padding, $geth - $padding);
    $pdf->Cell(0, 0, iconv('UTF-8', 'TIS-620', 'หนังสือรับรองการหักภาษี ณ ที่จ่าย'), 0, 0, 'C');
    $pdf->Ln(10);

    $margin_in = 7;
    $padding_in = 12;
    $pdf->Rect($margin_in, 15, $getw - 15, 30);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ชื่อ'), 0, 0);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'เลข'), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ที่อยู่'), 0, 0);
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ลำดับที่'), 0, 0);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ชนิด'), 0, 0);
    
    $pdf->Ln(10);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'ประเภทเงิน'), 0, 0);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'วัน'), 0, 0);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'จำนวน'), 0, 0);
    $pdf->Cell($getw / 4, 0, iconv('UTF-8', 'TIS-620', 'หัก'), 0, 0);
    
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'รวมภาษีหักเงิน'), 0, 0);
    
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ผู้จ่ายเงิน'), 0, 0);
    
    $pdf->Ln(10);
    $pdf->Cell($getw / 2, 0, iconv('UTF-8', 'TIS-620', 'ลงชื่อ'), 0, 0);





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
    $pdf->Output();
  }

}
