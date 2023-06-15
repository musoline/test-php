<?php

class HomeController extends Controller
{
    public function index(string $text = "", array $errors = [], array $messages = []): void
    {
        $this->view('home/index', ["content" => "", "CSRF" => CSRFUtil::createAndSet(), "errors" => $errors, "messages" => $messages]);
    }
}
