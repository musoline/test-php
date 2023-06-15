<?php

class Controller
{
    public function model(string $model)
    {
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }

    public function view(string $view, array $data = []): void
    {
        require_once "../app/views/" . $view . ".php";
    }
}
