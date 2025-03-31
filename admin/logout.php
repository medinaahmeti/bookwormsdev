<?php
ob_start();
include ("autoloader.php");
include_once('../../non-pages/urlQasja.php');

$session= new \Admin\Lib\Session();
$session->logout();
header("Location: login.php");


