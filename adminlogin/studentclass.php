<?php
session_start();
$_SESSION["load"] = "7";
include('header.php');
$whereId = "and c.data11 = $_SESSION[UserID3]";
$whereIdOption = "and data11 = '$_SESSION[UserID3]'";

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



// if (empty($_GET["searchname3"])) {

// 	$cut = explode("-", $searchname3);
// 	$date_income = $cut[0] . "-" . $cut[1] . "-" . ($cut[2]);
// 	$daystart_load = date("d-m-Y", strtotime($date_income));
// 	$daystart_load1 = date("Y-m-d", strtotime($date_income));
// } else {
// 	$searchname3 = $_GET["searchname3"];

// 	$cut = explode("/", $searchname3);
// 	$date_income = $cut[0] . "-" . $cut[1] . "-" . ($cut[2]);
// 	$daystart_load = date("d-m-Y", strtotime($date_income));
// 	$daystart_load1 = date("Y-m-d", strtotime($date_income));
// }
?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- page content -->
<div class="right_col" role="main" style="background-color: #F5FBFD; ">

	<div class="page-title">
		<div class=" ">
			<div class=" col-lg-12 " style="background-color: #A9C7FF;   margin-top: 20px;  " align="left">
				<font color="#000000" size="4px" class="serif2">
					<div style="margin-top: 10px;">
						<b> ตรวจสอบการทำงานของผู้ช่วยอาจารย์ &nbsp; </b>
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
					<Br>


					<!--- Action =  ไปยังไฟล์ที่ทำการเช็ค  --->
					<form role="form" name="frmMain" method="get" action="studentclass.php" enctype="multipart/form-data">
						<div class="row" style="margin-top: 10px; ">
							<div class="col-lg-12">
								<div class="col-lg-3 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> รหัสวิชา-ชื่อวิชา </font>
										<select class="form-control" id="data10" name="data10" style=" border-radius: 10px; ">
											<?php if (empty($searchname4)) { ?>
												<option value=""> รหัสวิชา-ชื่อวิชา </option>
											<?php } ?>
											<?php
											$sql = "SELECT * FROM classdata where pk = '" . $searchname4 . "'" . $whereIdOption  . "  order by pk asc  ";

											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["data1"] . " " . $objResult["data2"]; ?></option>
											<?php
											}
											?>
											<?php
											$sql = "SELECT * FROM classdata where  pk != '" . $searchname4 . "'" . $whereIdOption  . "  order by pk asc  ";

											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["data1"] . " " . $objResult["data2"]; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> ปีการศึกษา </font>
										<input type="text" name="searchname3" id="searchname3" class="form-control " value="<?php echo $daystart_load1; ?>" autocomplete="off" style=" border-radius: 10px; "> <br>
									</div>
								</div>

								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> เทอม </font>
										<select class="form-control" id="searchname2" name="searchname2" style=" border-radius: 10px;  ">

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
										</select> <br>
									</div>
								</div>
								<!-- <div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> section </font>
										<input type="number" name="secsearch" style=" border-radius: 10px; " class="form-control" min="1">
									</div>
								</div> -->
								<div class="col-lg-3 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> &nbsp;&nbsp; <br> </font>
										<button type="submit" class="btn btn-primary" style="background-color: #A9C7FF; border-radius: 10px; width: 80px; border-color: white; ">
											<font color="white" size="3px" class="serif"> ค้นหา </font>
										</button>

										<a href="studentclass.php?all=alldata">
											<button type="button" class="btn btn-primary" style="background-color: #A9C7FF; border-radius: 10px; width: 150px; border-color: white; ">
												<font color="white" size="3px" class="serif"> แสดงบันทึกทั้งหมด </font>
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</form>



					<div class="col-md-12" style="margin-top: 5px;">
						<style>
							.pagination {
								list-style-type: none;
								display: inline-flex;
								justify-content: space-between;
								box-sizing: border-box;
							}

							.pagination li {
								box-sizing: border-box;
								padding-right: 10px;
							}

							.pagination li a {
								box-sizing: border-box;
								background-color: #e2e6e6;
								padding: 8px;
								text-decoration: none;
								font-size: 12px;
								font-weight: bold;
								color: #616872;
								border-radius: 4px;
							}

							.pagination li a:hover {
								background-color: #d4dada;
							}

							.pagination .next a,
							.pagination .prev a {
								text-transform: uppercase;
								font-size: 12px;
							}

							.pagination .currentpage a {
								background-color: #518acb;
								color: #fff;
							}

							.pagination .currentpage a:hover {
								background-color: #518acb;
							}
						</style>

						<?php
						$perpage = 20;
						if (isset($_GET['page2'])) {
							$page = $_GET['page2'];
						} else {
							$page = 1;
						}

						if (empty($_GET['page2'])) {
							$page = 1;
						}
						$start = ($page - 1) * $perpage;



						$addcode = "";
						if (empty($_GET["searchname"])) {
						} else {
							$addcode = " and ( b.data1 like '%" . $searchname . "%' or b.data2 like '%" . $searchname . "%' ) ";
						}
						$addcode2 = "";
						if (empty($_GET["searchname2"])) {
						} else {
							$addcode2 = " and  c.data8 = '" . $searchname2 . "' ";
						}
						$addcode3 = "";
						if (empty($_GET["searchname3"])) {
							$addcode3 = " and  c.data7 = '' ";
						} else {
							$addcode3 = " and  c.data7 = '" . $_GET['searchname3'] . "' ";
						}


						if (!empty($_GET["all"])) {
							$addcode1 = "";
							$addcode2 = "";
							$addcode3 = "";
						}


						if (isset($_GET['searchname3']) && !empty($_GET['searchname3'])) {
							$savedata1 = "and c.data7 = '$_GET[searchname3]'";
						} else {
							$savedata1 = '';
						}
						if (isset($_GET['data10']) && !empty($_GET['data10'])) {
							$subject = "and a.subject = '$_GET[data10]'";
						} else {
							$subject = '';
						}

						if (isset($_GET['searchname2']) && !empty($_GET['searchname2'])) {
							$savedata4 = "and c.data8 = '$_GET[searchname2]'";
						} else {
							$savedata4 = '';
						}
						if (isset($_GET['secsearch']) && !empty($_GET['secsearch'])) {
							$secsearch = "and a.section = '$_GET[secsearch]'";
						} else {
							$secsearch = '';
						};



						// $sql2 = " SELECT a.*, b.data1, b.data2 FROM work_time a 
						// LEFT Join classdata b On a.subject = b.pk
						// where a.student_paper != '' 
						// and a.member = '".$_SESSION["UserID3"]."'   
						// ".$addcode.$addcode2.$addcode3."  
						// order by a.pk asc    "; 



						?>

					</div>


					<div class="col-lg-12" align="left" style="margin-top: 15px; ">
						<div class="table-responsive">
							<table id="key_product" class=" table    tablemobile  " border="0">
								<thead>
									<tr>
										<th width="40%" bgcolor="#A8DADC" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; ">
											<div align="center">
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> รหัสวิชา - ชื่อวิชา </font>
											</div>
										</th>
										<th width="20%" bgcolor="#A8DADC" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; ">
											<div align="center">
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> ปีการศึกษา </font>
											</div>
										</th>

										<th width="10%" bgcolor="#A8DADC" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; ">
											<div align="center">
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> เทอม </font>
											</div>
										</th>
										<th width="10%" bgcolor="#A8DADC" style="border: 0px solid #FFF; ">
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

									// $sql2 = "  SELECT a.*, b.data1, b.data2 FROM work_time a 
									// 	Inner Join classdata b On a.subject = b.pk
									// 	where a.student_paper != '' 
									// 	and a.member = '".$_SESSION["UserID3"]."'   

									// 	".$addcode.$addcode2.$addcode3."  
									// 	order by a.pk asc   limit {$start} , {$perpage}   ";  
									$sql2 = " SELECT * FROM work_time as a left join classdata as c on c.pk = a.subject where a.student_paper != '' 
											 $savedata1 $subject $savedata4 $whereId GROUP BY a.subject
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



										// $sql = "SELECT * FROM member where status = 'AJ' order by pk asc  ";
										// $query = mysqli_query($objCon, $sql);
										// while ($objResult = mysqli_fetch_array($query)) {
										// $name_teacher = $objResult["namem"];

									?>
										<tr style="background-color: <?php echo $bg; ?>; ">

											<td style=" border-left: 0px solid #F2F2F2; ">
												<div align="center">
													<font size="3px" color="Black" style=" font-size: 13px; "> <?php echo $data1 . " " . $data2; ?> </font>
												</div>
											</td>
											<td height="25px" style=" border-left: 0px solid #F2F2F2; ">
												<div align="center">
													<font size="3px" color="Black" style=" font-size: 13px; "> <?php
																												echo  $objResult2["data7"]; ?> </font>
												</div>
											</td>


											<td height="25px" style=" border-left: 0px solid #F2F2F2; ">
												<div align="center">
													<font size="3px" color="Black" style=" font-size: 13px; "> <?php
																												echo  $objResult2["data8"]; ?> </font>
												</div>
											</td>


											<!-- modal small -->
											<div class="modal fade" id="smallmodal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
												<div class="modal-dialog modal-md" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="smallmodalLabel"> ดูข้อมูล </h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<font size="3px" color="black">

																วันเดือนปี : <?php echo DateThai($objResult2["savedata1"]) . " " . DateThai2($objResult2["savedata1"]); ?> <br>

																ลงเวลาปฎิบัติงาน เริ่มต้น : <?php echo $objResult2["savedata2"]; ?> <br>

																ลงเวลาปฎิบัติงาน สิ้นสุด : <?php echo $objResult2["savedata3"]; ?> <br>

																โครงการ (ปกติ/พิเศษ) : <?php echo $objResult2["savedata4"]; ?> <br>

																จำนวนขั่วโมงปฎิบัติงาน <br>
																กลุ่มที่ ( section ) : <?php echo $objResult2["section"]; ?> <br>

																บรรยาย : <?php echo $objResult2["savedata5"]; ?> ชั่วโมง <br>

																ปฎิบัติงาน : <?php echo $objResult2["savedata6"]; ?> ชั่วโมง <br>

																งานที่ปฎิบัติ : <?php echo $objResult2["savedata7"]; ?> <br>

															</font>
														</div>
													</div>
												</div>
											</div>
											<!-- end modal small -->


											<td align="center">
												<div align="center">

													<a href="work_time_edit2.php?CusID=<?php echo $objResult2["student_paper"]; ?>&Idel=<?php echo $objResult2["pk"]; ?>&page=2">
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
				<?php } ?>


			</div>
		</div>
	</div>
</div>




<?php
include('footer.php');
?>