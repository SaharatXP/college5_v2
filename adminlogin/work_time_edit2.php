<?php
session_start();
$_SESSION["load"] = "7";
include('header.php');



$sql2 = "SELECT * FROM student_paper where pk = '" . $_GET["CusID"] . "' ";
$query2 = mysqli_query($con, $sql2);
while ($objResult2 = mysqli_fetch_array($query2)) {
	$secg = substr($objResult2["section_group"], 0, -1);

	$subject_save = $objResult2["subject"];
	$sql = "SELECT * FROM classdata Where  pk = '" . $objResult2["subject"] . "' ";
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
		$datachk3 = $objResult["datachk3"];
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
	}
}

$savedata1 = "";
$savedata2 = "";
$savedata3 = "";
$savedata4 = "";
$savedata5 = "";
$savedata6 = "";
$savedata7 = "";
$img1 = "";
$img2 = "";

$sql2 = "SELECT * FROM work_time where pk = '" . $_GET["Idel"] . "' ";
$query2 = mysqli_query($con, $sql2);
while ($objResult2 = mysqli_fetch_array($query2)) {
	$savedata1 = $objResult2["savedata1"];
	$savedata2 = $objResult2["savedata2"];
	$savedata3 = $objResult2["savedata3"];
	$savedata4 = $objResult2["savedata4"];
	$savedata5 = $objResult2["savedata5"];
	$savedata6 = $objResult2["savedata6"];
	$savedata7 = $objResult2["savedata7"];
	$img1 = $objResult2["img1"];
	$img2 = $objResult2["img2"];
	$seco = $objResult2["section"];
}

?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- page content -->
<div class="right_col" role="main" style="background-color: #F5FBFD; ">
	<a href="./studentclass.php?searchname3=2023-05-06&data10=&searchname2=">
		< กลับ</a>
			<div class="page-title">
				<div class=" ">
					<div class=" col-lg-12 " style="background-color: #A9C7FF;   margin-top: 20px;  " align="left">
						<font color="#000000" size="4px" class="serif2">
							<div style="margin-top: 10px;">

								<b> ตรวจสอบการทำงานของผู้ช่วยสอน &nbsp; </b>
							</div>
						</font>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="row">
				<div class=" col-lg-12 ">
					<div class="x_panel" style="background-color: #FFFFFF; ">
						<?php
						$sqlSubject = " SELECT * FROM classdata as c 
										where c.pk = $_GET[Idel] ";
						$querySubject = mysqli_query($con, $sqlSubject);


						while ($objResultSubject = mysqli_fetch_array($querySubject)) { ?>

							<h4><b>บันทึกการทำงานภายในวิชา <?php echo $objResultSubject['data1'] ?>-<?php echo $objResultSubject['data2'] ?> ปีการศึกษา : <?php echo $objResultSubject['data7'] ?> <?php echo $objResultSubject['data8'] ?></b></h4>
						<?php } ?>
						<div class="col-lg-12" align="left" style="margin-top: 15px; ">
							<div class="table-responsive">
								<table id="key_product" class=" table    tablemobile  " border="0">
									<thead>
										<tr>
											<th width="3%" bgcolor="#A8DADC" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; ">
												<div align="center">
													<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> ชื่อ-นามสกุล ผู้ช่วยอาจารย์ </font>
												</div>
											</th>
											<th width="8%" bgcolor="#A8DADC" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; ">
												<div align="center">
													<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> รหัสนักศีกษา </font>
												</div>
											</th>
											<th width="2%" bgcolor="#A8DADC" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; ">
												<div align="center">
													<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> ระดับปริญญา </font>
												</div>
											</th>
											<th width="3%" bgcolor="#A8DADC" style="border: 0px solid #FFF; ">
												<div align="center">
													<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> ข้อมูลการทำงาน </font>
												</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$total = 0;


										if (empty($_GET['page2'])) {
											$i = 1;
										} else if (($_GET['page2'] == 1)) {
											$i = 1;
										} else {

											$i = (($_GET["page2"] - 1) * 20) + 1;
										}

										$sql2 = " SELECT a.* , c.* , m.*, m.pk as memberPk ,m.name as memberName FROM work_time as a 
										left join classdata as c on c.pk = a.subject 
										left join member as m on m.pk = a.member
										where a.student_paper != '' 
										
											 $subject $whereId GROUP BY a.member
											";
										// echo $sql2;
										$query2 = mysqli_query($con, $sql2);
										$bg = "#FFF";
										while ($objResult2 = mysqli_fetch_array($query2)) {


											if ($bg == "#FFF") {
												$bg = "#F8FAFD";
											} else {
												$bg = "#FFF";
											}


											$seco = $objResult2['section'];
											$subject_save = $objResult2["subject"];
											$sql = "SELECT * ,  member.name as namem FROM classdata 
										LEFT JOIN member on member.pk = classdata.data11
										Where  classdata.pk = '" . $objResult2["subject"] . "' ";
											// echo $sql;
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
												$data11 = (!$objResult["data11"] ? '' : $objResult["data11"]);
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
												$datachk3 = $objResult["datachk30"];
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
												$name_teacher = $objResult['namem'];
											}

										?>
											<tr style="background-color: <?php echo $bg; ?>; ">
												<td style=" border-left: 0px solid #F2F2F2; ">
													<div align="center">
														<font size="3px" color="Black" style=" font-size: 13px; "> <?php echo   $objResult2["memberName"]; ?> </font>
													</div>
												</td>

												<td height="25px" style=" border-left: 0px solid #F2F2F2; ">
													<div align="center">
														<font size="3px" color="Black" style=" font-size: 13px; "> <?php
																													echo  $objResult2["codestudent"]; ?> </font>
													</div>
												</td>

												<td height="25px" style=" border-left: 0px solid #F2F2F2; ">
													<div align="center">
														<font size="3px" color="Black" style=" font-size: 13px; "> <?php
																													echo  $objResult2["subject"]; ?> </font>
													</div>
												</td>


												<td align="center">
													<div align="center">

														<a href="work_repoer_view.php?memberId=<?php echo $objResult2['memberPk']; ?>&classdata=<?php echo
																																				$_GET['Idel'];  ?>&page=2">
															<button type="button" class="btn btn-sm btn-primary" style="background-color: #FFD45F; border-radius: 5px;   border: 1px solid  #FFD45F;   ">
																<font color="#000000" size="2px" class="serif1"> ดูข้อมูล คลิก </font>
															</button>
														</a>

													</div>
												</td>

											</tr>
										<?php
											$i++;
										}
										?>
									</tbody>

								</table>
							</div>
						</div>



						<br><Br><br><Br>



					</div>
				</div>
			</div>
</div>




<?php
include('footer.php');
?>