<?php
session_start();
$_SESSION["load"] = "2";
include('header.php');


$searchname = "";
if (empty($_GET["searchname"])) {
} else {
    $searchname = $_GET["searchname"];
}



?>

<div id="wrapper" class="container">
    <h1 id="page-title"> รายวิชาที่เปิดรับสมัคร </h1>
    <h1 id="page-title"> ***เช็ครายละเอียดก่อนสมัคร*** </h1>
    <div class="row">
        <div class="col-md-7" align="left">
            <div class="form-group">
                <form method="get" action="subject.php" enctype="multipart/form-data">

                    <input type="hidden" name="page" id="page" class="form-control " value="" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; ">

                    <table width="100%">
                        <tr>
                            <td width="35%">
                                <font color="black" size="3px" class="serif"> ปีการศึกษา </font>
                                <input type="text" name="searchname" id="searchname" class="form-control " value="<?php echo $searchname; ?>" autocomplete="off" autofocus style="  border-radius: 0px; width: 95%;   ">
                            </td>
                            <td width="35%">
                                <font color="black" size="3px" class="serif"> ภาคการศึกษา </font>
                                <select class="form-control" id="drop_term" name="drop_term" required style="border-radius: 0px;  width: 95%; ">
                                    <?php if (empty($_GET["drop_term"])) {   ?>
                                        <option value=""> ภาคการศึกษา </option>
                                    <?php } ?>
                                    <?php
                                    $sql = "SELECT * FROM drop_term where name = '" . $_GET["drop_term"] . "' order by pk asc  ";
                                    $query = mysqli_query($objCon, $sql);
                                    while ($objResult = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $sql = "SELECT * FROM drop_term where name != '" . $_GET["drop_term"] . "'   order by pk asc  ";
                                    $query = mysqli_query($objCon, $sql);
                                    while ($objResult = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                    <?php if (!empty($_GET["dropshow"])) {   ?>
                                        <option value=""> ประกาศทั้งหมด </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <div style="margin-top: 23px;"> </div>
                                <button type="submit" class="btn btn-primary btn-minwidth" style="  width: 110px;   ">
                                    <font color="white" size="3px" class="serif"> ค้นหา </font>
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $result_count_total = mysqli_query($objCon, "SELECT count(*) as total from student_paper where student = $_SESSION[UserID3] and is_active = 1 group by subject"); //เขียน query เพื่อนับจำนวนที่สมัครไปแล้ว
                    $data_count_total = mysqli_fetch_assoc($result_count_total);
                    $tt_count_total = $data_count_total['total'];

                    // if else เชื่อเช็คค่าที่เรา query ออกมาให้แสดงผล
                    if ($tt_count_total < 3) {
                        echo  '<h4> คุณสมัครไปแล้วทั้งหมด : ' . $tt_count_total . ' วิชา </h4>';
                    } else {
                        echo  '<h4 style="color:red"> คุณสมัครไปแล้วทั้งหมด : ' . $tt_count_total . ' วิชา หากต้องการสมัรวิชาอื่นๆ กรุณายกเลิกรายการ </h4>';
                    }

                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php
            $result_count_total = mysqli_query($objCon, "SELECT count(*) as total from student_paper where student = $_SESSION[UserID3] and is_active = 1 group by subject");
            $data_count_total = mysqli_fetch_assoc($result_count_total);
            $tt_count_total = $data_count_total['total'];
            // echo  'สมัครไปแล้วทั้งหมด -> ' . $tt_count_total;

            $i = 1;

            //// โหลดข้อมูลการเพิ่ม วิชา 
            $addcoe = "";
            if (empty($_GET["drop_term"])) {
            } else {
                $addcoe = " and data8 ='" . $_GET["drop_term"] . "' ";
            }
            $sql = "SELECT * FROM classdata  where data7 like '%" . $searchname . "%'  and (chk1 = '" . $studentsubject . "'  or   chk2 = '" . $studentsubject . "') " . $addcoe . " order by pk desc ";

            $query = mysqli_query($con, $sql);
            while ($objResult = mysqli_fetch_array($query)) {

                /// โหลดข้อมูลชื่อ อาจารย์ 
                $namedata5 = "";
                $sql4 = "SELECT * FROM member  where pk = '" . $objResult["data11"] . "' ";
                $query4 = mysqli_query($objCon, $sql4);
                while ($objResult4 = mysqli_fetch_array($query4)) {
                    $namedata5 = $objResult4["name"];
                }

            ?>

                <div class="col-xs-6 col-sm-6 col-md-4" style="border-radius: 10px;  ">
                    <div class="subject-item" style="border-radius: 10px;">
                        <div class="subject-item-title"> รหัสวิชา <?php echo $objResult["data1"]; ?><br>
                            <?php echo $objResult["data2"]; ?> </div>
                        <div class="subject-item-title" style="margin-top: 5px;"> <?php echo $objResult["data3"]; ?> </div>
                        <div class="subject-item-content" style="margin-top: 5px;"> อาจารย์ประจําวิชา :
                            <?php echo $namedata5; ?> </div>

                        <div class="row" style="margin-top: 5px;">
                            <div class="col-lg-6" align="left"> <b>
                                    <font size="3px"> <?php echo $objResult["data8"]; ?> </font>
                                </b> </div>
                            <div class="col-lg-6" align="right"> <b>
                                    <font size="3px"> ปีการศึกษา <?php echo $objResult["data7"]; ?></font>
                                </b> </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <?php
                                // สร้าง query เพื่อนับจำนวนคนที่ต้องการทั่งหมด 
                                $sql_ta = "SELECT SUM(data15) as sum_tree ,  SUM(data16) as sum_toh FROM classdata_section WHERE classdata_pk = $objResult[pk]";
                                $result_count_ta = mysqli_query($objCon, $sql_ta);
                                $r_ta = mysqli_fetch_assoc($result_count_ta);
                                $wanted = $r_ta['sum_tree'] + $r_ta['sum_toh'];

                                // สร้าง query เพื่อนับจำนวนคนที่สมัครมาแล้วการทั้งหมด 
                                $sql_regis = "SELECT count(student) as total_regis FROM student_paper WHERE subject = $objResult[pk]";
                                $result_count_regis = mysqli_query($objCon, $sql_regis);
                                $r_regis = mysqli_fetch_assoc($result_count_regis);
                                $regis = $r_regis['total_regis']
                                ?>

                                TA ที่ต้องการทั้งหมด : <?php echo $wanted; ?> คน <br>
                                <!-- TA ปตรีที่ต้องการ : <?php echo $r_ta['sum_tree'] ?> คน <br>  -->
                                TA สมัครไปแล้วทั้งหมด : <?php echo $regis; ?> คน <br>
                                <!-- แสดงผลว่าเหลือ TA กี่คน  -->
                                <b style="color: green;">คงเหลือ TA ที่สามารถสมัครได้ : <?php echo $wanted - $regis;  ?> คน</b> <br>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px; margin-bottom: 5px;">
                            <?php
                            $result = mysqli_query($objCon, "SELECT count(*) as total from student_paper 
							where subject = $objResult[pk] and student = $_SESSION[UserID3] and is_active = 1");
                            $data = mysqli_fetch_assoc($result);
                            $ttc = $data['total'];

                            $result_t = mysqli_query($objCon, "SELECT count(*) as total from student_paper 
							where student = $_SESSION[UserID3] and is_active = 1");
                            $data_t = mysqli_fetch_assoc($result_t);
                            $data_count_total = $data_t['total'];

                            $startDate = strtotime(date('Y-m-d', strtotime($objResult["enddate"])));
                            $currentDate = strtotime(date('Y-m-d'));
                            if ($startDate < $currentDate) {
                            ?>
                                <b style="color:red;">วิชานี้ได้ปิดรับสมัครแล้ว</b><br>
                                <a class="btn btn-primary btn-minwidth" style="width: 100%;  margin-top: 10px; " disabled>
                                    สมัคร
                                    <br>
                                </a>
                            <?php
                            } else if ($ttc > 0 || $data_count_total > 2) { //if else เพื่อ เช็ตปุ่มไม่ให้กดสมัคร ถ้าวิชาที่สมัครไปแล้ว มากกว่า 3 ให้ disable ปุ่ม
                            ?>
                                <b style="color:red;">คุณสมัครวิชานี้ไปแล้ว <br> หากต้องการสมัครใหม่
                                    ให้ยกเลิกใบสมัครก่อน</b><br>
                            <?php } else { ?>
                                <?php if ($objResult["chk1"] == $studentsubject) { ?>
                                    <div class="col-lg-12">
                                        <a href="view_subject3.php?CusID=<?php echo $objResult["pk"]; ?>" class="btn btn-primary btn-minwidth" style="width: 100%;  margin-top: 10px; "> สมัคร
                                            <br>
                                            (ปริญญาตรี) </a>
                                    </div>
                                <?php } ?>
                                <?php if ($objResult["chk2"] == $studentsubject) { ?>
                                    <div class="col-lg-12">
                                        <a href="view_subject.php?CusID=<?php echo $objResult["pk"]; ?>" class="btn btn-primary btn-minwidth" style="width: 100%;  margin-top: 10px; "> สมัคร
                                            <Br>
                                            (ปริญญาโท-เอก) </a>
                                    </div>
                            <?php }
                            } ?>
                            <div class="col-lg-12" style="margin-top: 10px; margin-bottom: 5px; display: none; ">
                                <a href="../img/<?php echo $objResult["datafile"]; ?>" class="btn btn-primary btn-minwidth" style="width: 100%;" download>
                                    ดาวน์โหลดฟอร์มสมัครผู้ช่วยสอน </a>
                            </div>

                            <!-- <?php if ($objResult["chk1"] == $studentsubject) { ?> 
				<div class="col-lg-12"  style="margin-top: 10px; margin-bottom: 5px;  "  >
				   <a href="view_subjectdetail.php?CusID=<?php echo $objResult["pk"]; ?>"class="btn btn-primary btn-minwidth" style="width: 100%;"   > รายละเอียด </a> 
				</div>
			  <?php } ?>
          <?php if ($objResult["chk2"] == $studentsubject) { ?> 
          	 
				<div class="col-lg-12"  style="margin-top: 10px; margin-bottom: 5px;  "  >
				   <a href="view_subjectdetail2.php?CusID=<?php echo $objResult["pk"]; ?>"class="btn btn-primary btn-minwidth" style="width: 100%;"   > รายละเอียด </a> 
				</div>
          	     
          	 <?php } ?>  -->
                        </div>

                        <div class="row">
                            <div class="col-lg-4" align="left"> <b>
                                    <font size="2px"> <?php echo $objResult["data14"]; ?> </font>
                                </b> </div>

                            <div class="col-lg-8" align="right"> <b>
                                    <font size="2px"> ปิดสมัครวันที่ <?php echo  Datethai2($objResult["enddate"]); ?>
                                    </font>
                                </b> </div>

                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>



    </div>
</div>

<?php
include('footer.php');
?>clude('footer.php');
?>