<?php
session_start();
$_SESSION["load"] = "10";
include('header.php');

$data1 = "";
$data2 = "";
$data3 = "";
$data4 = "";
$data5 = "";
$data6 = "";
$data7 = "";
$data8 = "";
$data9 = "";
$data10 = "";

$cusId = isset($_get["cusID"]) ? $_get["cusID"] : "";

$searchname = "";
$_SESSION["showclassdata"] = "";


?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- page content -->
<div class="right_col" role="main" style="background-color: #F5FBFD; ">

    <div class="page-title">
        <div class=" ">
            <div class=" col-lg-12 " style="background-color: #A9C7FF;   margin-top: 20px;  " align="left">
                <font color="#000000" size="4px" class="serif2">
                    <div style="margin-top: 10px;">
                        <b> จัดการตารางสอน (แก้ไข)&nbsp; </b>
                    </div>
                </font>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
        <div class=" col-lg-12 ">
            <div class="x_panel" style="background-color: #FFFFFF; ">

                <!--- โหลดข้อมูลจากฐานข้อมูล --->

                <hr style=" border: 1px solid #003566; ">

                <?php


                $sqlE = "SELECT dc.data2, dc.data3, dc.iddata,dc.pk,dc.data1, dc.data6 ,dc.data4,dc.data5 , dc.type,dd.name as day_name ,dts.name  as time_start, dtex.name as end_time , dc.type FROM data_class as dc
							left join dropday as dd ON dd.pk = dc.data1
							left join droptime as dts ON dts.pk = dc.data2 
							left join droptime as dtex ON dtex.pk = dc.data3 
                            -- left join classdata_section as cds ON dc.data4 = dc.data3 
                            Where dc.pk = " . $_GET['id'] . "";
                // echo $sqlE;
                $queryE = mysqli_query($objCon, $sqlE);
                while ($objResultE = mysqli_fetch_array($queryE)) {
                    // echo $objResultE["day_name"];

                ?>
                    <form method="post" action="classtest_dataclass_update.php" enctype="multipart/form-data">

                        <input type="text" value="<?php echo $_GET['id'] ?>" name="id" hidden>
                        <input type="text" value="<?php echo $_GET['classdata'] ?>" name="classdata" hidden>


                        <div class="row">
                            <div class="col-lg-2 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> เลือกวัน </font>
                                    <select class="form-control" id="data1" name="data1" style=" border-radius: 10px; margin-top: 10px; ">
                                        <option value="<?php echo $objResultE["data1"];  ?>"><?php echo $objResultE["day_name"];  ?></option>
                                        <?php
                                        $sql = "SELECT * FROM dropday order by pk asc  ";
                                        $query = mysqli_query($objCon, $sql);
                                        while ($objResult = mysqli_fetch_array($query)) {
                                            if ($objResult["pk"] != $objResultE["data1"]) {
                                        ?>
                                                <option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> เลือกเวลาเริ่ม </font>
                                    <select class="form-control" id="data2" name="data2" style=" border-radius: 10px; margin-top: 10px; ">
                                        <option value="<?php echo $objResultE["data2"];  ?>"><?php echo $objResultE["time_start"];  ?></option>
                                        <?php
                                        $sql = "SELECT * FROM droptime  order by pk asc  ";
                                        $query = mysqli_query($objCon, $sql);
                                        while ($objResult = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> เลือกเวลาสิ้นสุด </font>
                                    <select class="form-control" id="data3" name="data3" style=" border-radius: 10px; margin-top: 10px; ">
                                        <option value="<?php echo $objResultE["data3"];  ?>"><?php echo $objResultE["end_time"];  ?></option>
                                        <?php
                                        $sql = "SELECT * FROM droptime   order by pk asc  ";
                                        $query = mysqli_query($objCon, $sql);
                                        while ($objResult = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> กลุ่มที่ </font>
                                    <!-- <input type="text" name="data14" id="data14" class="form-control " value="<?php echo $data14; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " required> -->
                                    <select class="form-control" id="data6" name="data6" style=" border-radius: 10px; margin-top: 10px; ">
                                        <option value="<?php echo $objResultE["data6"];  ?>"><?php echo $objResultE["data6"];  ?></option>
                                        <?php
                                        $sql = "SELECT * FROM classdata_section where classdata_pk = $_GET[classdata] order by data14 asc";
                                        $query = mysqli_query($objCon, $sql);
                                        while ($objResult = mysqli_fetch_array($query)) {
                                            if ($objResultE["data6"] != $objResult["data14"]) {
                                        ?>
                                                <option value="<?php echo $objResult["data14"]; ?>"><?php echo $objResult["data14"]; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> ตึก </font>
                                    <select class="form-control" id="data4" name="data4" style=" border-radius: 10px; margin-top: 10px; ">
                                        <option value="<?php echo $objResultE["data4"];  ?>"><?php echo $objResultE["data4"];  ?></option>
                                        <?php
                                        $sql = "SELECT * FROM drop_build   order by pk asc  ";
                                        $query = mysqli_query($objCon, $sql);
                                        while ($objResult = mysqli_fetch_array($query)) {
                                            if ($objResultE["data4"] != $objResult["name"]) {
                                        ?>
                                                <option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> ห้อง </font>
                                    <input type="text" name="data5" id="data5" class="form-control " autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " value="<?php echo $objResultE["data5"];  ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-1 ">
                                <div class="form-group"> <br>
                                    <font color="black" size="3px" class="serif"> คาบเรียน </font>
                                    <select class="form-control" id="type" name="type" style=" border-radius: 10px; margin-top: 10px; ">
                                        <option value="<?php echo $objResultE["type"];  ?>"><?php echo $objResultE["type"];  ?></option>
                                        <option value="Lec">Lec</option>
                                        <option value="Lab">Lab</option>


                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 ">
                                <div class="form-group">
                                    <div class="downtopup2 mb-3"> </div>
                                    <br><br>
                                    <button type="submit" class="btn btn-primary form-control" style="background-color: #4e6cef; border-radius: 5px; width: 110px; border-color: white; ">
                                        <font color="white" size="3px" class="serif"> แก้ไข </font>
                                    </button>


                                </div>
                            </div>

                        </div>

                    </form>
                <?php
                }
                ?>






                <br><Br><br><Br>
            </div>
        </div>
    </div>
</div>




<?php
include('footer.php');
?>