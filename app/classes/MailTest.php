<?php

use PHPMailer\PHPMailer\PHPMailer;

class MailTest
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.test.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'test@example.com';
        $this->mail->Password = 'secret';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
    }


    public function sendMail($from, $to, $subject, $body)
    {
        $this->mail->setFrom($from, 'Test Name');
        $this->mail->addAddress($to, 'Recipient Test');
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        return;
        if ($this->mail->send()) {
            echo 'Email sent successfully!';
        } else {
            echo 'Error: ' . $this->mail->ErrorInfo;
        }
    }
}
