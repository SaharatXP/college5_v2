<?php
session_start();
$_SESSION["load"] = "6";
include('header.php');

$name = "";
$title = "";
$detail = "";



$searchname = "";
if (empty($_GET["searchname"])) {
} else {
	$searchname = $_GET["searchname"];
}



$sql = "SELECT * FROM classdata 
LEFT JOIN grade on grade.grade_id = classdata.grade
Where  pk = '" . $_GET["subject"] . "' ";
$query = mysqli_query($objCon, $sql);
while ($objResult = mysqli_fetch_array($query)) {
	$data1 = $objResult["data1"];
	$data2 = $objResult["data2"];
	$data3 = $objResult["data3"];
	$data4 = $objResult["data4"];
	$data5 = $objResult["data5"];
	$data6 = $objResult["data6"];
	$data7 = $objResult["data7"];
	$data8 = $objResult["data8"];
	$data9 = $objResult["data9"];
	$data10 = $objResult["data10"];
	$datafile = $objResult["datafile"];
	$data11 = $objResult["data11"];
	$data12 = $objResult["data12"];
	$data13 = $objResult["data13"];
	$data14 = $objResult["data14"];
	$data15 = $objResult["data15"];
	$data16 = $objResult["data16"];
	$chk1 = $objResult["chk1"];
	$chk2 = $objResult["chk2"];
	$startdate = $objResult["startdate"];
	$enddate = $objResult["enddate"];
	$data42 = $objResult["data42"];
	$data32 = $objResult["data32"];

	$chk3 = $objResult["chk3"];
	$datachk30 = $objResult["datachk30"];
	$datachk31 = $objResult["datachk31"];
	$chk4 = $objResult["chk4"];
	$datachk4 = $objResult["datachk4"];
	$datachk41 = $objResult["datachk41"];
	$chk5 = $objResult["chk5"];
	$datachk5 = $objResult["datachk5"];
	$datachk51 = $objResult["datachk51"];
	$chk6 = $objResult["chk6"];
	$datachk6 = $objResult["datachk6"];
	$datachk61 = $objResult["datachk61"];

	$a1 = $objResult["tri"];
	$a2 = $objResult["tri2"];
	$a3 = $objResult["tri3"];
	$a4 = $objResult["tri4"];
	$a5 = $objResult["tri5"];
	$b1 = $objResult["datatri"];
	$b2 = $objResult["datatri2"];
	$b3 = $objResult["datatri3"];
	$b4 = $objResult["datatri4"];
	$b5 = $objResult["datatri5"];
	$grade = $objResult["grade"];
	$grade_name = $objResult["grade_name"];
}



$create_save = "";
$pricesave = "";
$sql = "SELECT * FROM student_paper
LEFT JOIN grade on grade.grade_id = student_paper.grade
 Where  pk = '" . $_GET["CusID"] . "'  ";
$query = mysqli_query($objCon, $sql);
while ($objResult = mysqli_fetch_array($query)) {
	$create_save = $objResult["create_date"];
	$pricesave = $objResult["pricesave"];
	$status = $objResult["status"];
	$note_data = $objResult["note_data"];
	$note_data2 = $objResult["note_data2"];
	$student = $objResult["student"];
	$secg = substr($objResult["section_group"], 0, -1);
	$grade_p_name = $objResult["grade_name"];
}
$create_by = $_SESSION["UserID"];



$sql = "SELECT * FROM member Where  pk = '" . $student . "' ";
$query = mysqli_query($objCon, $sql);
while ($objResult = mysqli_fetch_array($query)) {
	$name = $objResult["name"];
	$address = $objResult["address"];
	$telphone = $objResult["telphone"];
	$email = $objResult["email"];
	$username = $objResult["username"];
	$password = $objResult["password"];
	$img = $objResult["img"];
	$codestudent = $objResult["codestudent"];
	$subject = $objResult["subject"];
	$major = $objResult["major"];
	$major2 = $objResult["major2"];
	$major3 = $objResult["major3"];
	$m_status = $objResult["status"];
}
?>
<style>
	/* The container */
	.container2 {
		display: block;
		position: relative;
		padding-left: 35px;
		margin-bottom: 12px;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	/* Hide the browser's default checkbox */
	.container2 input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
		height: 0;
		width: 0;
	}

	/* Create a custom checkbox */
	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 22px;
		width: 22px;
		background-color: #FFFFFF;
		border-radius: 5px;
		border: 2px solid #707070;
	}

	/* On mouse-over, add a grey background color */
	.container2:hover input~.checkmark {
		background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.container2 input:checked~.checkmark {
		background-color: #707070;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	/* Show the checkmark when checked */
	.container2 input:checked~.checkmark:after {
		display: block;
	}

	/* Style the checkmark/indicator */
	.container2 .checkmark:after {
		left: 7px;
		top: 3px;
		width: 5px;
		height: 10px;
		border: solid white;
		border-width: 0 3px 3px 0;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
	}
</style>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- page content -->
<div class="right_col" role="main" style="background-color: #F5FBFD; ">

	<div class="page-title">
		<div class=" ">
			<div class=" col-lg-12 " style="background-color: #A9C7FF;   margin-top: 20px;  " align="left">
				<font color="#000000" size="4px" class="serif2">
					<div style="margin-top: 10px;">
						<b> จัดการสถานะการสมัคร &nbsp; </b>
					</div>
				</font>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>
	<div class="row">
		<div class=" col-lg-12 ">
			<div class="x_panel" style="background-color: #FFFFFF; ">


				<?php if (empty($_GET["page"])) { ?>

					<!--- Action =  ไปยังไฟล์ที่ทำการเช็ค  --->
					<form role="form" name="frmMain" method="post" action="save_checkdata2_update.php" enctype="multipart/form-data">
						<input type="hidden" id="idupdate" name="idupdate" value="<?php echo $_GET["CusID"]; ?>">
						<input type="hidden" id="staff_up" name="staff_up" value="<?php echo $student; ?>">

						<div class="row">

							<div class="col-lg-12 ">
								<div class="form-group">


									<div class="row">
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> Username </font>
												<input type="text" name="username" id="username" class="form-control " value="<?php echo $username; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> รหัสนักศึกษา </font>
												<input type="text" name="title" id="title" class="form-control " value="<?php echo $codestudent; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ชื่อ-นามสกุล </font>
												<input type="text" name="title" id="title" class="form-control " value="<?php echo $name; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> Email </font>
												<input type="text" name="email" id="email" class="form-control " value="<?php echo $email; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ระดับการศึกษา </font>
												<select class="form-control" id="title" name="title" required style=" border-radius: 10px; margin-top: 10px; " readonly>
													<?php
													$sql = "SELECT * FROM drop_subject where name = '" . $subject . "' order by pk asc  ";
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
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> โครงการ(นักศึกษา) </font>
												<input type="text" name="major2" id="major2" class="form-control " value="<?php echo $major2; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> รหัสวิชา </font>
												<input type="text" name="data1" id="data1" class="form-control " value="<?php echo $data1; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ชื่อวิชาภาษาไทย </font>
												<input type="text" name="data2" id="data2" class="form-control " value="<?php echo $data2; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ชื่อวิชาภาษาอังกฤษ </font>
												<input type="text" name="data3" id="data3" class="form-control " value="<?php echo $data3; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>


										<div class="col-lg-12 "> </div>


										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ปีการศึกษา </font>
												<input type="text" name="data7" id="data7" class="form-control " value="<?php echo $data7; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " required readonly disabled>
											</div>
										</div>

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ภาคการศึกษา </font>
												<select class="form-control" id="data8" name="data8" style=" border-radius: 10px; margin-top: 10px; " readonly>
													<?php
													$sql = "SELECT * FROM drop_term where  name = '" . $data8 . "'  order by pk asc  ";
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

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> เกรดขั้นต่ำในการรับสมัคร </font>
												<input type="text" value="<?php echo $grade_name ?>" class="form-control" style=" border-radius: 10px; margin-top: 10px; " disabled>

											</div>
										</div>

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> เกรดที่นักศึกษาทำได้ </font>
												<input type="text" value="<?php echo $grade_p_name ?>" class="form-control" style=" border-radius: 10px; margin-top: 10px; " disabled>

											</div>
										</div>

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> มีความประสงค์เบิกค่าตอบแทน </font>
												<select class="form-control" id="data10" name="data10" style=" border-radius: 10px; margin-top: 10px; " readonly>
													<?php
													$sql = "SELECT * FROM drop_other where  name = '" . $data10 . "'  order by pk asc  ";
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

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> อาจารย์ประจำวิชา </font>
												<select class="form-control" id="data11" name="data11" style=" border-radius: 10px; margin-top: 10px; " readonly>
													<?php
													$sql = "SELECT * FROM member where status = 'AJ' and pk = '" . $data11 . "'  order by pk asc  ";
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

									</div>

									<div class="row">
										<div class="col-lg-12 ">

										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> เปิดรับสมัคร </font>
												<input type="text" name="data12" id="datepicker-th-2" class="form-control " value="<?php echo date('d/m') . "/" . (date('Y') + 543); ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> ปิดรับสมัคร </font>
												<input type="text" name="data13" id="datepicker-th-3" class="form-control " value="<?php echo date('d/m') . "/" . (date('Y') + 543); ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly disabled>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 " style="margin-top: 10px; margin-bottom: 10px; ">
											<font color="black" size="3px" class="serif"> <code> Section ที่สมัครเข้ามา </code></font>


											<table width="100%" border="1">


												<?php
												$sql_sec = "SELECT * FROM classdata_section
												LEFT JOIN section_type on section_type.section_type_id = classdata_section.section_type_id
												where classdata_pk = $_GET[subject] AND data14 IN ($secg)";
												// echo $sql_sec;
												$query_sec = mysqli_query($objCon, $sql_sec);
												while ($objResult_sec = mysqli_fetch_array($query_sec)) {
												?>
													<tr></tr>
													<td width="25%" align="center">
														<font color="black" size="3px" class="serif"> กลุ่มปฎิบัติงาน </font>
													</td>
													<td width="25%" align="center">
														<font color="black" size="3px" class="serif"> ภาค </font>
													</td>
													<td width="25%" align="center">
														<font color="black" size="3px" class="serif"> ระดับ </font>
													</td>
													<td width="25%" align="center">
														<font color="black" size="3px" class="serif"> จำนวนผู้ช่วยสอน </font>
													</td>





													<!-- <td rowspan="3" class="text-center"><a href="add_section.php" class="btn btn-outline-secondary ml-2"  >+</a></td> -->

													</tr>
													<tr>
														<td rowspan="2">
															<input disabled type="text" name="data14" id="data14" class="form-control " value="<?php echo $objResult_sec['data14']; ?>" placeholder=" กลุ่มที่ " autocomplete="off" style=" border-radius: 0px; ">
														</td>
														<td rowspan="2">
															<select class="form-control" disabled>
																<option value="<?php echo $objResult_sec["section_type_id"]; ?>"><?php echo $objResult_sec["section_type_name"]; ?></option>

															</select>

														</td>
														<td>
															<font color="black" size="3px" class="serif"> &nbsp; ปริญญาตรี </font>
														</td>
														<td>
															<input disabled type="text" name="data15" id="data15" class="form-control " value="<?php echo $objResult_sec['data15']; ?>" autocomplete="off" style=" border-radius: 0px; ">
														</td>


													</tr>
													<tr>
														<td>
															<font color="black" size="3px" class="serif"> &nbsp; ปริญญาโท-เอก </font>
														</td>
														<td>

															<input disabled type="text" name="data16" id="data16" class="form-control " value="<?php echo $objResult_sec['data16'];; ?>" autocomplete="off" style=" border-radius: 0px; ">

														</td>


													</tr>
												<?php
												}

												?>

											</table>

										</div>
									</div>

									<div class="row">
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> วันที่สมัคร </font>
												<input type="text" name="title" id="title" class="form-control " value="<?php echo $create_save; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; " readonly>
											</div>
										</div>

										<div class="col-lg-12 "> </div>

									</div>


									<div class="row" style="margin-top: 15px; ">
										<div class="col-lg-12 ">


										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> สถานะ </font><br>
												<select class="form-control" id="status" name="status" style=" border-radius: 10px; margin-top: 10px; ">
													<?php
													$sql = "SELECT * FROM drop_status where  status = '" . $status . "'  order by pk asc  ";
													$query = mysqli_query($objCon, $sql);
													while ($objResult = mysqli_fetch_array($query)) {
													?>
														<option value="<?php echo $objResult["status"]; ?>"><?php echo $objResult["name"]; ?></option>
													<?php
													}
													?>
													<?php
													$sql = "SELECT * FROM drop_status where  status != '" . $status . "'  order by pk asc  ";
													$query = mysqli_query($objCon, $sql);
													while ($objResult = mysqli_fetch_array($query)) {
													?>
														<option value="<?php echo $objResult["status"]; ?>"><?php echo $objResult["name"]; ?></option>
													<?php
													}
													?>
												</select>
												<font color="red" size="3px" class="serif">[ หากอนุมัติ จะเปลี่ยนสถานะผู้ใช้งาน<br>
													<font color="green" size="3px" class="serif">จากนักศึกษาเป็นผู้ช่วยอาจารย์</font> โดยอัตโนมัติ ]
												</font>
											</div>
										</div>
										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> เปลี่ยนสถานะ ผู้ใช้งานเว็บไซต์ </font>

												<select class="form-control" id="note_data2" name="note_data2" style=" border-radius: 10px; margin-top: 10px; ">
													<?php
													$sql = "SELECT * FROM drop_status2 where  status = '" . $m_status . "'  order by pk asc  ";
													$query = mysqli_query($objCon, $sql);
													while ($objResult = mysqli_fetch_array($query)) {
													?>
														<option value="<?php echo $objResult["status"]; ?>"><?php echo $objResult["name"]; ?></option>
													<?php
													}
													?>
													<?php
													$sql = "SELECT * FROM drop_status2 where  status != '" . $m_status . "'  order by pk asc  ";
													$query = mysqli_query($objCon, $sql);
													while ($objResult = mysqli_fetch_array($query)) {
													?>
														<option value="<?php echo $objResult["status"]; ?>"><?php echo $objResult["name"]; ?></option>
													<?php
													}
													?>
												</select>


											</div>
										</div>

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> หมายเหตุ </font>
												<input type="text" name="note_data" id="note_data" class="form-control " value="<?php echo $note_data; ?>" autocomplete="off" style=" border-radius: 10px; margin-top: 10px; ">
											</div>
										</div>

										<div class="col-lg-3 ">
											<div class="form-group"> <br>
												<font color="black" size="3px" class="serif"> เจ้าหน้าที่ตรวจสอบ </font>
												<select class="form-control" id="create_by" name="create_by" style=" border-radius: 10px; margin-top: 10px; " disabled>
													<?php
													$sql = "SELECT * FROM member where  pk = '" . $create_by . "'  order by pk asc  ";
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
									</div>


								</div>
							</div>

						</div>
						<br>
						<div class="row">
							<div class="col-lg-5 " align="left">
								<div class="form-group">
									<div align="left">
										<button type="submit" class="btn btn-primary" style="background-color: #A9C7FF; border-radius: 5px; width: 110px; border-color: white; ">
											<font color="white" size="3px" class="serif"> เพิ่มข้อมูล </font>
										</button>

										<a href="checkdata.php" <button type="reset" class="btn btn-danger" style="background-color: #FFFFFF; border-radius: 5px; width: 100px; border-color: white; border: 1px solid #A9C7FF; ">
											<font color="black" size="3px" class="serif"> ยกเลิก </font>
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>

					</form>




					<br><Br><br><Br>
				<?php } ?>


			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		//Triggering change event handler on element #stato
		$('#status').change(function() {
			var value = $(this).val(); //Getting selected value from #stato
			if (value != "1") {
				$('#note_data2').prop('disabled', false); //If value is empty then disable another field
			} else {
				$('#note_data2').prop('disabled', true); //Else enable another field
				selectElement('note_data2', 'SAJ');

			}
		});
	});

	function selectElement(id, valueToSelect) {
		let element = document.getElementById(id);
		element.value = valueToSelect;
	}
</script>



<?php
include('footer.php');
?>