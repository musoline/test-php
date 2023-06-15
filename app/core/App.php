<?php


class App
{

    protected string $controllerName = "HomeController";
    protected string $method = "index";
    protected array $params = [];
    protected Controller $controller;
    public function __construct()
    {
        $url = $this->parseUrl();
        if (file_exists('../app/controllers/' . ucfirst($url[0]) . "Controller.php")) {
            $this->controllerName = ucfirst($url[0]) . "Controller";
            unset($url[0]);
        }

        require_once "../app/controllers/" . $this->controllerName . ".php";
        $this->controller = new $this->controllerName;


        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];


        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(rtrim($_GET["url"], '/'), FILTER_SANITIZE_URL));
        }
    }
}
