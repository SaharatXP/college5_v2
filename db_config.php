<?php
date_default_timezone_set("Asia/Bangkok");

ini_set('display_errors', 1);
error_reporting(~0);
error_reporting(E_ALL ^ E_NOTICE);
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);



//! Poom
$serverName = "localhost";
$userName = "root";
$userPassword = "root";
$dbName = "college5";


//! for dev
// $serverName = "localhost";
// $userName = "root"; //root //teachera_ssistant
// $userPassword = "root";
// $dbName = "college5"; //ablbotco_college //teachera_ssistant

$objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
$con = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_set_charset($objCon, "utf8");
mysqli_set_charset($con, "utf8");
