<?php
session_start();
$_SESSION["load"] = "8";
include('header.php');



if (isset($_GET["Action"])) {

    if ($_GET["Action"] == "Del2") {
        $strSQL = "Delete From work_time  ";
        $strSQL .= "WHERE pk = '" . $_GET["Idel"] . "'  ";
        $objQuery = mysqli_query($objCon, $strSQL);

        //echo("<script>alert('ทำการลบเรียบร้อย!!')</script>");
        echo ("<script>window.location = 'work_report.php';</script>");
    }
}


$searchname = "";
if (empty($_GET["searchname"])) {
} else {
    $searchname = $_GET["searchname"];
}

$searchname2 = "";
if (empty($_GET["searchname2"])) {
} else {
    $searchname2 = $_GET["searchname2"];
}
?>
<style>
    @media print {
        body {
            visibility: hidden;
        }

        #section-to-print {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>





<div id="wrapper" class="container">
    <h1 id="page-title"> สรุปการทำงาน </h1>
    <div class="row">

        <div class="row">
            <div class="col-md-12">
                <div class="announce-item">



                    <div class="row">
                        <div class="col-lg-12 ">
                            <a href="./work_report.php" class="btn btn-secondary">
                                < กลับ</a>
                                    <!-- <input type="button" onclick="printDiv('printableArea')" value="พิมพ์" /> -->
                                    <div class="form-group " id="printableArea">


                                        <div class="col-lg-12 ">

                                            <div class="row">
                                                <div class="col-lg-12 text-center">
                                                    <h4>ตารางเรียนและตารางปฏิบัติงาน (TA) </h4>
                                                    <br>
                                                    หลักฐานการลงเวลาปฏิบัติงานผู้ช่วยสอนและผู้ช่วยปฏิบัติงาน <br>
                                                    ภาควิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น <br>

                                                </div>

                                                <?php
                                                function chkTerm2($str)
                                                {
                                                    if ($str == 'เทอมปลาย') {
                                                        $res1 = '( ✓ ) เทอมปลาย';
                                                    } else {
                                                        $res1 = '( &nbsp;  ) เทอมปลาย';
                                                    }
                                                    return $res1;
                                                }
                                                function chkTerm1($str)
                                                {
                                                    if ($str == 'เทอมต้น') {
                                                        $res2 = '( ✓ ) เทอมต้น';
                                                    } else {
                                                        $res2 = '( &nbsp;  ) เทอมต้น';
                                                    }
                                                    return $res2;
                                                }
                                                ?>

                                                <?php
                                                $sql = "SELECT a.* , u.* FROM classdata as a 
                                            left join member as u on u.pk = a.data11
                                            where a.pk = '$_GET[classdata]'";
                                                $query = mysqli_query($con, $sql);
                                                while ($objResult = mysqli_fetch_array($query)) {
                                                ?>
                                                    <div class="col-lg-12 text-center">ภาคการศึกษา <?php echo chkTerm1($objResult['data8']) ?> <?php echo chkTerm2($objResult['data8']) ?> ปีการศึกษา <?php echo $objResult['data7'] ?> </div><br><br>
                                                    <div class="col-lg-8 mt-3">
                                                        วิชา : <?php echo $objResult['data1'] ?> <?php echo $objResult['data2'] ?> <br>
                                                        อาจารย์ประจำวิชา : <?php echo $objResult['name'] ?> <br>
                                                        <?php
                                                        $sqlu = "SELECT *  FROM member 
                                                where pk = $_SESSION[UserID3]";
                                                        // echo  $sqlu;


                                                        $queryu = mysqli_query($con, $sqlu);
                                                        while ($objResultU = mysqli_fetch_array($queryu)) {
                                                            $rd = $objResultU['subject']; ?>
                                                            ชื่อ-สกุล : <?php echo $objResultU['name']; ?> <br>
                                                        <?php }
                                                        ?>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        หน่วยกิต : <?php echo $objResult['data6'] ?> <br>
                                                        <br>
                                                        ระดับ : <?php echo  $rd ?> <br>
                                                    </div>




                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" align="left" style="margin-top: 15px; ">
                                            <?php
                                            $t1 = 0;
                                            $t2 = 0;
                                            $sql_month = "SELECT a.*, b.* , m.*  , COUNT(a.pk) as total , MONTH(a.savedata1)  as monthToSearch FROM work_time a 
                                        left Join classdata b On a.subject = b.pk
                                        left join member m on m.pk = b.data11
                                        where a.student_paper != ''
                                        and a.member = $_SESSION[UserID3]
                                        and b.pk = $_GET[classdata]
                                        group by MONTH(a.savedata1)
                                        order by a.pk asc ";

                                            $query_month = mysqli_query($con, $sql_month);
                                            while ($objResultM = mysqli_fetch_array($query_month)) {
                                            ?>
                                                <h4><?php echo  'เดือน : ' . DateThai3($objResultM['savedata1']) ?></h4>
                                                <?php

                                                $sql_month_k = "SELECT a.*, b.* , m.*  , COUNT(a.pk) as total , MONTH(a.savedata1)  as monthToSearch FROM work_time a 
                                                left Join classdata b On a.subject = b.pk
                                                left join member m on m.pk = b.data11
                                                where a.student_paper != ''
                                                and a.member = $_SESSION[UserID3]
                                                and b.pk = $_GET[classdata]
                                                and MONTH(a.savedata1) = $objResultM[monthToSearch]
                                                group by a.savedata4
                                                order by a.pk asc ";
                                                $query_month_k = mysqli_query($con, $sql_month_k);
                                                while ($objResultMK = mysqli_fetch_array($query_month_k)) {



                                                ?>

                                                    <div class="table-responsive mt-3">

                                                        <table id="key_product" class="table tablemobile mt-3" border="1">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th class="text-center" rowspan="2" width="20%">วันเดือนปี</th>
                                                                    <th class="text-center" rowspan="2" width="20%">เวลาปฎิบัติงาน</th>
                                                                    <th class="text-center" rowspan="2" width="20%">กลุ่มการเรียน (พิเศษ / ปกติ)</th>
                                                                    <th class="text-center" colspan="2" width="20%">จำนวนขั่วโมงปฎิบัติงาน</th>
                                                                    <th class="text-center" rowspan="2" width="20%">งานที่ปฎิบัติ</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center"> บรรยาย </th>
                                                                    <th class="text-center"> ปฎิบัติการ </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                $sql2 = "SELECT a.*, b.* , m.*  , COUNT(a.pk) as total FROM work_time a 
											left Join classdata b On a.subject = b.pk
											left join member m on m.pk = b.data11
											where a.student_paper != ''
											and a.member = $_SESSION[UserID3]
                                            and b.pk = $_GET[classdata]
                                            and MONTH(a.savedata1) = $objResultM[monthToSearch]
                                            and a.savedata4 = '$objResultMK[savedata4]'
                                            group by a.savedata1
											order by a.pk asc ";

                                                                $query2 = mysqli_query($con, $sql2);
                                                                while ($objResult2 = mysqli_fetch_array($query2)) {

                                                                ?>
                                                                    <tr style="background-color: <?php echo $bg; ?>; ">

                                                                        <td style=" border-left: 0px solid #F2F2F2; " rowspan="<?php echo $objResult2['total'] + 1 ?>">
                                                                            <div align="center">
                                                                                <font size="3px" color="Black" style=" font-size: 13px; "> <?php echo  DateThai2($objResult2['savedata1']) ?> </font>
                                                                            </div>
                                                                        </td>




                                                                    </tr>
                                                                    <?php
                                                                    $sql_dt = "SELECT a.*  FROM work_time as a 
                                                            
                                                            where a.member = '$_SESSION[UserID3]'
                                                            and a.subject = '$_GET[classdata]'
                                                            and a.savedata1 = '$objResult2[savedata1]'
                                                            and a.savedata4 = '$objResultMK[savedata4]'
                                                            order by a.pk asc ";

                                                                    $query_dt = mysqli_query($con, $sql_dt);
                                                                    while ($objResultDt = mysqli_fetch_array($query_dt)) {

                                                                    ?>
                                                                        <tr>



                                                                            <td class="text-center">
                                                                                <?php echo $objResultDt['savedata2'] ?> - <?php echo $objResultDt['savedata3'] ?>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <?php echo $objResultDt['savedata4'] ?>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <?php if ($objResultDt['type'] == 'Lec') {
                                                                                    echo $objResultDt['savedata5'];
                                                                                    $t1 += $objResultDt['savedata5'];
                                                                                } else {
                                                                                    echo "-";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <?php if ($objResultDt['type'] == 'Lab') {
                                                                                    echo $objResultDt['savedata6'];
                                                                                    $t2 += $objResultDt['savedata6'];
                                                                                } else {
                                                                                    echo "-";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $objResultDt['savedata7'] ?>
                                                                            </td>



                                                                        </tr>

                                                                    <?php  } ?>


                                                                <?php

                                                                    $i++;
                                                                    // $t1 += (!$objResultDt['savedata5'] ? 0 : $objResultDt['savedata5']);
                                                                    // $t2 += (!$objResultDt['savedata6'] ? 0 : $objResultDt['savedata6']);
                                                                    // $t1 += $objResultDt['savedata5'];
                                                                    // $t2 += $objResultDt['savedata6'];
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <th colspan="3" class="text-center"> รวมเวลาปฎิบัติงาน </th>
                                                                    <th class="text-center"><?php echo $t1 ?></th>
                                                                    <th class="text-center"><?php echo $t2 ?></th>
                                                                    <th></th>

                                                                </tr>
                                                            </tbody>

                                                        </table>



                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-2">

                                                        </div>
                                                        <div class="col-lg-10">
                                                            <h4>สรุปเวลาปฏิบัติงาน</h4>

                                                        </div>
                                                        <div class="col-lg-3"></div>

                                                        <?php if ($objResultMK['savedata4'] == 'ปกติ') { ?>
                                                            <div class="col-lg-4">

                                                                &nbsp;&nbsp;&nbsp; <b> ภาค<?php echo $objResultMK['savedata4']; ?> <?php echo ($t1 + $t2) ?> ชั่วโมง</b> <br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - บรรยาย <?php echo ($t1) ?> ชั่วโมง <br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ปฏิบัติการ <?php echo ($t2) ?> ชั่วโมง 

                                                            </div>
                                                            <div class="col-lg-4">

                                                                &nbsp;&nbsp;&nbsp; <b> ภาคพิเศษ 0 ชั่วโมง </b><br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - บรรยาย 0 ชั่วโมง <br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ปฏิบัติการ 0 ชั่วโมง 
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col-lg-4">

                                                                &nbsp;&nbsp;&nbsp; <b> ภาคปกติ 0 ชั่วโมง </b><br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - บรรยาย 0 ชั่วโมง <br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ปฏิบัติการ 0 ชั่วโมง 
                                                            </div>
                                                            <div class="col-lg-4">

                                                                &nbsp;&nbsp;&nbsp; <b> ภาค<?php echo $objResultMK['savedata4']; ?> <?php echo ($t1 + $t2) ?> ชั่วโมง</b> <br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - บรรยาย <?php echo ($t1) ?> ชั่วโมง <br>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ปฏิบัติการ <?php echo ($t2) ?> ชั่วโมง 

                                                            </div>

                                                        <?php } ?>
                                                        <div class="col-lg-1"></div>
                                                        <h4>&nbsp;</h4>




                                                    </div>



                                                <?php $t1 = 0;
                                                    $t2 = 0;
                                                } ?>
                                                <hr>

                                            <?php

                                            } ?>

                                        </div>

                                        <div class="row-12">
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-2 text-end">
                                                <code>หมายเหตุ :-</code><br>
                                            </div>
                                            <div class="col-lg-9">
                                                1) บันทึกการลงเวลาปฏิบัติงาน TA 1 ใบ/วิชา/เดือน <br>
                                                2) แยกภาคปกติ โครงการพิเศษ คนละใบ <br>
                                                3) ระบุงานที่ปฏิบัติ ทุกครั้ง
                                            </div>
                                        </div>




                                    </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>






        <br><br><bR><br>
    </div>
</div>
</div>


</div>
</div>

<?php
include('footer.php');
?>