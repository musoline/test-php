<?php

class CSRFUtil
{
    public static function createAndSet(): string
    {
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        $token = $_SESSION['token'];
        return $token;
    }



    public static function check(string $token = ""): bool
    {

        if (isset($_SESSION["token"]) && ($_SESSION["token"] === $token)) {
            return true;
        } else {
            return false;
        }
    }
}
