<?php
foreach ($_POST['group_pp'] as $d) {
    // echo $d;

    include("../db_config.php");

    $strSQL = "Update student_paper Set 

    				status = '" . $_POST["status"] . "', 
    				create_by = '" . $_POST["create_by"] . "', 
    				note_data = '" . $_POST["note_data"] . "', 
    				note_data2 = '" . $_POST["note_data2"] . "'  ";
    $strSQL .= " WHERE pk = '" . $d . "' ";

    $objQuery = mysqli_query($objCon, $strSQL);


    $querySql = 'select student, pk from student_paper where  pk =' . $d;
    $Qstd = mysqli_query($objCon, $querySql);
    foreach ($Qstd as $q) {
        echo $q['student'];

        $strSQL = "Update member Set status = '" . $_POST["note_data2"] . "'  ";
        $strSQL .= " WHERE pk = '" . $q['student'] . "' ";

        $objQuery = mysqli_query($objCon, $strSQL);
    }


    echo ("<script>window.location = 'checkdata_group.php';</script>");
}
// echo '===>' . $_POST['group_pp'];
