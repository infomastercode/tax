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
      $mail->Username = STMP_EMAIL;
      $mail->Password = STMP_PASSWORD;
      $mail->SMTPSecure = false;
      $mail->Port = 587;

      $mail->SetFrom(EMAIL_SENDFROM, 'Test Lernt');
      $mail->addAddress(EMAIL_SENDTO);
      $mail->isHTML(true);
      $mail->Subject = "tax";
      $mail->Body = "<i>this is your passworsd:ssssssssssssssssssssss</i>";
      $mail->AltBody = "This is the plain text version of the email content";

      $mail->addAttachment(PATH . '/files/mytax.pdf');

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
