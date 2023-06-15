<?php
session_start();
require "../vendor/autoload.php";
require_once 'core/App.php';
require_once "core/Controller.php";
require_once "core/Database.php";
require_once "utils/CSRFUtil.php";
require_once "classes/MailTest.php";
require_once "classes/SMSTest.php";

$app  = new App;
