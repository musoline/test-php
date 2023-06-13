<?php

class HomeController extends Controller
{
    public function index($text = "", $errors = [], $messages = [])
    {
        $this->view('home/index', ["content" => "", "CSRF" => CSRFUtil::createAndSet(), "errors" => $errors, "messages" => $messages]);
    }
}
