<?php 
session_start();
include("../db_config.php");

if(isset($_GET['id'])){
    $pk = $_GET['id'];
    // echo $_GET['id'];

    $strSQL = "Delete From student_paper WHERE pk = $pk";
	$objQuery = mysqli_query($objCon,$strSQL); 


	echo("<script>window.location = 'status.php';</script>"); 
}
