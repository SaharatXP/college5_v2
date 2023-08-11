<?php
session_start();
include("../db_config.php");

if (isset($_GET['id'])) {
    $pk = $_GET['id'];


    $strSQL = "update student_paper SET is_active = 0 
    WHERE pk = $pk";
    $objQuery = mysqli_query($objCon, $strSQL);


    echo ("<script>window.location = 'status.php';</script>");
}
