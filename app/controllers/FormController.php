<?php


class FormController extends Controller
{
    public function index($text = "")
    {

        $text = isset($_POST["content"]) ? $_POST["content"] : "";
        $errors = [];

        if (isset($_POST["token"]) && CSRFUtil::check($_POST["token"])) {
            $content = $this->model("Content");
            $content->create($text);

            // In real project with be queued mail/sms sending for server worker 
            $mail = new MailTest();
            $sms = new SMSTest();
            $mail->sendMail("test@test.com", "recipient@test.com", "Test Email", $text);
            $sms->sendSms("123456789", $text);
        } else {
            $errors["form"] = "Not A Valid Request";
        }

        $this->view('home/index', ["content" => $text, "CSRF" => CSRFUtil::createAndSet(), "errors" => $errors]);
    }
}
