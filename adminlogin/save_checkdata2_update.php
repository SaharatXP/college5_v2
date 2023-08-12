<?php
include("../db_config.php");
if ($_POST["status"]  == "1") {
	$status = 'SAJ';
} else {
	$status = $_POST["note_data2"];
}


$strSQL = "Update student_paper Set 
					pricesave = '" . $_POST["pricesave"] . "', 
					status = '" . $_POST["status"] . "', 
					create_by = '" . $_POST["create_by"] . "', 
					note_data = '" . $_POST["note_data"] . "', 
					note_data2 = '" . $status . "'  ";
$strSQL .= " WHERE pk = '" . $_POST["idupdate"] . "' ";

$objQuery = mysqli_query($objCon, $strSQL);

//echo $strSQL;


$strSQL = "Update member Set status = '" . $status . "'  ";
$strSQL .= " WHERE pk = '" . $_POST["staff_up"] . "' ";

$objQuery = mysqli_query($objCon, $strSQL);



//echo("<script>alert(' ข้อมูลอัพเดตเรียบร้อย !! ')</script>");
echo ("<script>window.location = 'checkdata.php';</script>");
