<?php

class SMSTest
{
    private $message;
    private $client;
    public function __construct()
    {
        $this->client = new MessageBird\Client("Api Ket");
        $this->message = new MessageBird\Objects\Message;
        $this->message->originator = "Test User";
    }


    public function sendSms($recipient, $body)
    {
        $this->message->recipients = [$recipient];
        $this->message->body = $body;

        try {
            $res = $this->client->messages->create($this->message);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
