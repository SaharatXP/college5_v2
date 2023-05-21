<?php 
session_start();
include("../db_config.php");

if(isset($_GET['classdata_section_id'])){
    $classdata_section_id = $_GET['classdata_section_id'];
    echo $_GET['CusID'];

    $strSQL = "Delete From classdata_section WHERE classdata_section_id = $classdata_section_id";
	$objQuery = mysqli_query($objCon,$strSQL); 

    //echo("<script>alert('ทำการลบเรียบร้อย!!')</script>");
	echo("<script>window.location = 'add_sec.php?CusID=". $_GET['CusID'] ."';</script>"); 
}
