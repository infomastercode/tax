<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once PATH . '/libraries/mail/vendor/autoload.php';

class Email {

  public function send() {
    if (STMP_EMAIL == '' || STMP_PASSWORD == '' || EMAIL_SENDFROM == '' || EMAIL_SENDTO == '') {
      echo 'กรุณาตั้งค่าข้อมูลอีเมลในไฟล์ config.php';
      exit();
    }

    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
      $mail->SMTPDebug = 1;
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = TRUE;
      $mail->Username = STMP_EMAIL;
      $mail->Password = STMP_PASSWORD;
      $mail->SMTPSecure = false;
      $mail->Port = 587;

      $mail->SetFrom(EMAIL_SENDFROM, 'Test Lernt');
      $mail->addAddress(EMAIL_SENDTO);
      $mail->isHTML(true);
      $mail->Subject = "tax";
      $mail->Body = "This is the plain text version of the email content";
      $mail->AltBody = "This is the plain text version of the email content";

      $mail->addAttachment(PATH . '/files/mytax.pdf');

      if ($mail->send()) {
        echo 'ส่งอีเมลเรียบร้อยแล้ว';
      } else {
        echo 'เกิดข้อผิดพลาด: ', $mail->ErrorInfo;
      }
    } catch (Exception $e) {
      echo 'เกิดข้อผิดพลาด: ', $mail->ErrorInfo;
    }
  }

}
