<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once PATH . '/libraries/mail/vendor/autoload.php';

class Email {

  public function send() {
    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
      $mail->SMTPDebug = 1;
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = TRUE;
      $mail->Username = "infomastercode@gmail.com";
      $mail->Password = "password";
      $mail->SMTPSecure = false;
      $mail->Port = 587;

      $mail->SetFrom("infomastercode@gmail.com", 'Test Lernt');
      $mail->addAddress('infomastercode@gmail.com');
      $mail->isHTML(true);
      $mail->Subject = "test mail aaaaaa";
      $mail->Body = "<i>this is your passworsd:ssssssssssssssssssssss</i>";
      $mail->AltBody = "This is the plain text version of the email content";

      $mail->addAttachment('C:\Users\user\Downloads\tax.pdf');

      if ($mail->send()) {
        echo 'Message has been sent';
      } else {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
    } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
  }

}
