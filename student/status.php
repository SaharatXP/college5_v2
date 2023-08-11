<?php
session_start();
$_SESSION["load"] = "3";
include('header.php');
?>

<div id="wrapper" class="container">
	<h1 id="page-title"> ตรวจสอบสถานะของการสมัครเป็นผู้ช่วยอาจารย์ </h1>
	<div class="row">

		<div class="row">
			<div class="col-md-12">
				<div class="announce-item">
					<div class="row">
						<form role="form" method="get" action="status.php" enctype="multipart/form-data">

							<div class="col-md-12">
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> เทอม </font>
										<select class="form-control" id="term" name="term" style=" border-radius: 10px;  ">

											<option value=""> เลือกเทอม </option>

											<?php
											$sql = "SELECT * FROM drop_term where name = '" . $searchname2 . "'  order by pk asc  ";
											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?></option>
											<?php
											}
											?>
											<?php
											$sql = "SELECT * FROM drop_term where  name != '" . $searchname2 . "'  order by pk asc  ";
											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> ปีการศึกษา </font>
										<input type="text" name="year" id="year" class="form-control " value="<?php echo $daystart_load1; ?>" autocomplete="off" style=" border-radius: 10px; "> <br>
									</div>
								</div>
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> สถานะ </font>
										<select class="form-control" id="status" name="status" style=" border-radius: 10px;  ">

											<option value=""> เลือกสถานะ </option>

											<option value="0"> กำลังตรวจสอบ </option>
											<option value="1"> อนุมัติ </option>
											<option value="2"> ไม่อนุมัติ </option>
										</select>
									</div>
								</div>
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> &nbsp;&nbsp; <br> </font>
										<button type="submit" class="btn btn-primary" style="background-color: #A9C7FF; border-radius: 10px; width: 80px; border-color: white; ">
											<font color="white" size="3px" class="serif"> ค้นหา </font>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="table-responsive" style="margin-top: 15px;">
						<table class="table table-bordered tablemobile">
							<thead>
								<tr>
									<th width="4%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white" color="black"> ลำดับ </font>
										</div>
									</th>
									<th width="5%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> รหัสวิชา </font>
										</div>
									</th>
									<th width="20%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> ชื่อวิชา </font>
										</div>
									</th>
									<th width="7%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> ภาคการศึกษา </font>
										</div>
									</th>
									<th width="5%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> กลุ่มที่สมัคร </font>
										</div>
									</th>
									<th width="15%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> วันที่สมัคร </font>
										</div>
									</th>
									<th width="15%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> สถานะ </font>
										</div>
									</th>
									<th width="5%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> หมายเหตุ </font>
										</div>
									</th>
									<th width="5%" bgcolor="#FFF">
										<div align="center">
											<font size="2px" color="white"> ยกเลิกใบสมัคร </font>
										</div>
									</th>
									<font size="2px" color="white"> </font>
					</div>
					</th>
					</tr>
					</thead>
					<?php
					if (!isset($_GET['term']) || $_GET['term'] == '') {
						$term = '';
					} else {
						$term = 'and classdata.data8 = "' . $_GET['term'] . '"';
					}

					if (!isset($_GET['year']) || $_GET['year'] == '') {
						$y = '';
					} else {
						$y = 'and classdata.data7 = "' . $_GET['year'] . '"';
					}

					if (!isset($_GET['status']) || $_GET['status'] == '') {
						$status = '';
					} else {
						$status = 'and student_paper.status = ' . $_GET['status'];
					}
					$i = 1;

					$sql = "SELECT student_paper.pk as stdpp ,student_paper.* FROM student_paper 
					left join classdata on student_paper.subject = classdata.pk
					where student_paper.student != '' and student_paper.student = '" . $_SESSION["UserID2"] . "' $term $y $status order by classdata.pk desc ";
					$query = mysqli_query($con, $sql);
					while ($objResult = mysqli_fetch_array($query)) {
						$secg = $objResult["section_group"];
						$name_user = "-";
						$sql2 = "SELECT * FROM member Where  pk = '" . $objResult["student"] . "' ";
						$query2 = mysqli_query($objCon, $sql2);
						while ($objResult2 = mysqli_fetch_array($query2)) {
							$name_user = $objResult2["name"];
						}


						$sql2 = "SELECT * FROM classdata Where  pk = '" . $objResult["subject"] . "' ";
						$query2 = mysqli_query($objCon, $sql2);
						while ($objResult2 = mysqli_fetch_array($query2)) {
							$data1 = $objResult2["data1"];
							$data2 = $objResult2["data2"];
							$data3 = $objResult2["data3"];
							$data4 = $objResult2["data4"];
							$data5 = $objResult2["data5"];
							$data6 = $objResult2["data6"];
							$data7 = $objResult2["data7"];
							$data8 = $objResult2["data8"];
							$data9 = $objResult2["data9"];
							$data10 = $objResult2["data10"];
							$datafile = $objResult2["datafile"];
							$data11 = $objResult2["data11"];
							$data12 = $objResult2["data12"];
							$data13 = $objResult2["data13"];
							$data14 = $objResult2["data14"];
							$data15 = $objResult2["data15"];
							$data16 = $objResult2["data16"];
							$chk1 = $objResult2["chk1"];
							$chk2 = $objResult2["chk2"];
							$startdate = $objResult2["startdate"];
							$enddate = $objResult2["enddate"];
							$data42 = $objResult2["data42"];
							$data32 = $objResult2["data32"];
						}


						/// โหลดข้อมูล   
						$nameteacher = "";
						$sql2 = "SELECT * FROM member where status = 'AJ' and pk = '" . $data11 . "'  order by pk asc  ";
						$query2 = mysqli_query($objCon, $sql2);
						while ($objResult2 = mysqli_fetch_array($query2)) {
							$nameteacher = $objResult2["name"];
						}
						$namedrop_term = "";
						$sql2 = "SELECT * FROM drop_term where  name = '" . $data8 . "'  order by pk asc  ";
						$query2 = mysqli_query($objCon, $sql2);
						while ($objResult2 = mysqli_fetch_array($query2)) {
							$namedrop_term = $objResult2["name"];
						}
					?>
						<tr onMouseover="this.style.backgroundColor='yellow';" onMouseout="this.style.backgroundColor='white';">
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo $i; ?></font>
								</div>
							</td>
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo $data1; ?></font>
								</div>
							</td>
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo $data2; ?></font>
								</div>
							</td>
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo $namedrop_term; ?></font>
								</div>
							</td>
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo substr($secg, 0, -1); ?></font>
								</div>
							</td>
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo DateThai2($objResult["create_date"]); ?></font>
								</div>
							</td>




							<td>
								<div align="center">
									<font size="3px" color="Black">
										<?php
										if ($objResult["is_active"] == 0) {
											echo " <font color = '#FF0000' > ยกเลิกแล้ว </fonnt> ";
										} else {
											if ($objResult["status"] == "0") {
												echo " <font color = '#FF8C00' > กำลังตรวจสอบ </fonnt> ";
											} else if ($objResult["status"] == "1") {
												echo " <font color = '#006400' > อนุมัติ </fonnt> ";
											} else if ($objResult["status"] == "2") {
												echo " <font color = 'red' > ไม่อนุมัติ </fonnt> ";
											}
										}


										?>
									</font>
								</div>
							</td>
							<td>
								<div align="center">
									<font size="3px" class="serif2"><?php echo $objResult["note_data"]; ?></font>
								</div>
							</td>

							<?php
							if ($objResult['status'] == "0") {
								if ($objResult["is_active"] != 0) { ?>
									<td class="text-center"><a href="./del_student_paper.php?id=<?php echo $objResult['stdpp']; ?>" class="btn btn-danger mx-3" onclick="return confirm('ยืนยันการยกเลิก ?')">ยกเลิก</a></td>
							<?php } else {
									echo "<td></td>";
								}
							} ?>


						</tr>
					<?php $i++;
					} ?>
					</table>
				</div>


				<br><br><bR><br>
			</div>
		</div>
	</div>


</div>
</div>

<?php
include('footer.php');
?>