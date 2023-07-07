<?php
session_start();
$_SESSION["load"] = "10";
include('header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $classdata = $_POST['classdata'];
    $data1 = $_POST['data1'];
    $data3 = $_POST['data3'];
    $data2 = $_POST['data2'];

    $data4 = $_POST['data4'];
    $data5 = $_POST['data5'];
    $data6 = $_POST['data6'];
    $type = $_POST['type'];
    $id =
        $_POST['id'];


    $sql_ins = "UPDATE data_class SET  
        data1 ='$data1', 
        data3 = '$data3', 
        data2 = '$data2',
        data4 = '$data4',
        data5 = '$data5',
        data6 = '$data6', 
        type = '$type'
         WHERE pk = $id";
    if ($objCon->query($sql_ins) === TRUE) {
        echo "<script> location.href='classtest.php?page=&classdata=" . $classdata . "'; </script>";
    } else {
        echo "Error: " . $sql_ins . "<br>" . $objCon->error;
    }
}
