<?php

use MessageBird\Objects\Message;
use MessageBird\Client;

class SMSTest
{
    private Message $message;
    private Client $client;
    public function __construct()
    {
        $this->client = new Client("Api Ket");
        $this->message = new Message;
        $this->message->originator = "Test User";
    }


    public function sendSms(string $recipient, string $body): void
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
