<?php
session_start();
$_SESSION["load"] = "5";
include('header.php');

$name = "";
$title = "";
$detail = "";
$searchname = '';



$searchname = "";
if (empty($_GET["searchname"])) {
} else {
	$searchname = $_GET["searchname"];
}

$searchname2 = "";
if (empty($_GET["data8"])) {
} else {
	$searchname2 = $_GET["data8"];
}
$searchname3 = "";
if (empty($_GET["data9"])) {
} else {
	$searchname3 = $_GET["data9"];
}
$searchname4 = "";
if (empty($_GET["data10"])) {
} else {
	$searchname4 = $_GET["data10"];
}

?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- page content -->
<div class="right_col" role="main" style="background-color: #F5FBFD; ">

	<div class="page-title">
		<div class=" ">
			<div class=" col-lg-12 " style="background-color: #A9C7FF;   margin-top: 20px;  " align="left">
				<font color="#000000" size="4px" class="serif2">
					<div style="margin-top: 10px;">
						<b> ตรวจสอบสถานะการสมัครทุกระดับการศึกษา (จัดการสถานะแบบกลุ่ม) </b>
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
					<form role="form" name="frmMain" method="get" action="checkdata_group.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-12">
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> รหัสวิชา-ชื่อวิชา </font>
										<select class="form-control" id="data10" name="data10" style=" border-radius: 10px; ">
											<?php if (empty($searchname4)) { ?>
												<option value=""> รหัสวิชา-ชื่่อวิชา </option>
											<?php } ?>
											<?php
											$sql = "SELECT * FROM classdata where  pk = '" . $searchname4 . "'  order by pk asc  ";
											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["data1"] . " " . $objResult["data2"]; ?></option>
											<?php
											}
											?>
											<?php
											$sql = "SELECT * FROM classdata where  pk != '" . $searchname4 . "'  order by pk asc  ";
											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["pk"]; ?>"><?php echo $objResult["data1"] . " " . $objResult["data2"]; ?></option>
											<?php
											}
											?>
										</select> <br>
									</div>
								</div>
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> ระดับการศึกษา </font>
										<select class="form-control" id="data8" name="data8" style=" border-radius: 10px; ">
											<?php if (empty($searchname2)) { ?>
												<option value=""> ระดับการศึกษา </option>
											<?php } ?>
											<?php
											$sql = "SELECT * FROM drop_subject where name = '" . $searchname2 . "'  order by pk asc  ";
											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?></option>
											<?php
											}
											?>
											<?php
											$sql = "SELECT * FROM drop_subject where  name != '" . $searchname2 . "'  order by pk asc  ";
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
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> ปีการศึกษา </font>
										<input type="text" name="searchname" id="searchname" class="form-control " value="<?php echo $searchname; ?>" autocomplete="off" style=" border-radius: 10px; "> <br>
									</div>
								</div>
								<div class="col-lg-2 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> ภาคการศึกษา </font>
										<select class="form-control" id="data9" name="data9" style=" border-radius: 10px;  ">
											<?php if (empty($searchname3)) { ?>
												<option value=""> ภาคการศึกษา </option>
											<?php } ?>
											<?php
											$sql = "SELECT * FROM drop_term where name = '" . $searchname3 . "'  order by pk asc  ";
											$query = mysqli_query($objCon, $sql);
											while ($objResult = mysqli_fetch_array($query)) {
											?>
												<option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?></option>
											<?php
											}
											?>
											<?php
											$sql = "SELECT * FROM drop_term where  name != '" . $searchname3 . "'  order by pk asc  ";
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
								<div class="col-lg-3 ">
									<div class="form-group">
										<font color="black" size="3px" class="serif"> &nbsp;&nbsp; <br> </font>
										<button type="submit" class="btn btn-primary" style="background-color: #A9C7FF; border-radius: 10px; width: 80px; border-color: white; ">
											<font color="white" size="3px" class="serif"> ค้นหา </font>
										</button>

										<a href="checkdata.php">
											<button type="button" class="btn btn-primary" style="background-color: #A9C7FF; border-radius: 10px; width: 110px; border-color: white; ">
												<font color="white" size="3px" class="serif"> แสดงทั้งหมด </font>
											</button>
										</a>

									</div>
								</div>
								<div class="col-md-12">
									<a class="btn btn-warning	" href="checkdata.php">
										<< จัดการสถานะแบบรายคน</a>
								</div>
							</div>
						</div>
					</form>
					<div class="col-md-12" style="margin-top: 10px;">
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
						// $page = !isset($_GET['page']) ? 1 : $_GET['page'];
						$page = !isset($_GET['page2']) ? 1 : $_GET['page2'];

						// $page = 1;
						$perpage = 20;
						$start = ($page - 1) * $perpage;

						$sql2 =  "SELECT *, a.pk, a.subject, a.status, c.pk as classpk FROM student_paper a 
							Inner Join member b
							On a.student = b.pk
							left join classdata as c on c.pk = a.subject
							where a.is_active != 0 and a.status != 3 and c.data7 like '%" . (!$searchname ? '' : $searchname) . "%'   " . $addcode . $addcode3 . "
							
							order by a.pk desc ";


						$query2 = mysqli_query($objCon, $sql2);
						$total_record = mysqli_num_rows($query2);
						$total_page = ceil($total_record / $perpage);
						?>


						<?php if (ceil($total_record / $perpage) > 0) : ?>
							<ul class="pagination">
								<?php if ($page > 1) : ?>
									<li class="prev"><a href="checkdata.php?page2=<?php echo $page - 1 ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>">Prev</a></li>
								<?php endif; ?>

								<?php if ($page > 3) : ?>
									<li class="start"><a href="checkdata.php?page2=1&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>">1</a></li>
									<li class="dots">...</li>
								<?php endif; ?>

								<?php if ($page - 2 > 0) : ?><li class="page"><a href="checkdata.php?page2=<?php echo $page - 2 ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
								<?php if ($page - 1 > 0) : ?><li class="page"><a href="checkdata.php?page2=<?php echo $page - 1 ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

								<li class="currentpage"><a href="checkdata.php?page2=<?php echo $page ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>"><?php echo $page ?></a></li>

								<?php if ($page + 1 < ceil($total_record / $perpage) + 1) : ?><li class="page"><a href="checkdata.php?page2=<?php echo $page + 1 ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
								<?php if ($page + 2 < ceil($total_record / $perpage) + 1) : ?><li class="page"><a href="checkdata.php?page2=<?php echo $page + 2 ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

								<?php if ($page < ceil($total_record / $perpage) - 2) : ?>
									<li class="dots">...</li>
									<li class="end"><a href="checkdata.php?page2=<?php echo ceil($total_record / $perpage) ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
								<?php endif; ?>

								<?php if ($page < ceil($total_record / $perpage)) : ?>
									<li class="next"><a href="checkdata.php?page2=<?php echo $page + 1 ?>&major=<?php echo $major; ?>&searchname=<?php echo $searchname; ?>&search_start=<?php echo $search_start; ?>&come_in=<?php echo $come_in; ?>&come_down=<?php echo $come_down; ?>">Next</a></li>
								<?php endif; ?>
							</ul>
						<?php endif; ?>


						<form role="form" method="post" action="update_group_stdpp.php" enctype="multipart/form-data" onsubmit="return confirm('ยืนยันการแก้ไขข้อมูลทั้งหมด ?')">


							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th width="5%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black" color="black"> เลือก </font>
												</div>
											</th>
											<th width="5%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black" color="black"> ลำดับ </font>
												</div>
											</th>
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> รหัสนักศึกษา </font>
												</div>
											</th>
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> ชื่อ-นามสกุล </font>
												</div>
											</th>
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> ระดับการศึกษา </font>
												</div>
											</th>
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> วิชาที่สมัคร </font>
												</div>
											</th>
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> ภาคการศึกษา </font>
												</div>
											</th>
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> วันที่สมัคร </font>
												</div>
											</th>
											<!-- <th width="10%" bgcolor="#A8DADC">
											<div align="center">
												<font size="2px" color="black"> ขัอมูลที่สมัคร </font>
											</div>
										</th> -->
											<th width="10%" bgcolor="#A8DADC">
												<div align="center">
													<font size="2px" color="black"> สถานะ </font>
												</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;


										if (empty($_GET["data8"])) {
											$addcode = '';
										} else {
											$addcode = "and b.subject = '" . $_GET["data8"] . "'";
										}
										if (empty($_GET["searchname"])) {
											$addcode2 = '';
										} else {
											$addcode2 = "and b.codestudent like '%" . $_GET["searchname"] . "%' ";
										}
										if (empty($_GET["data10"])) {
											$addcode3 = '';
										} else {
											$addcode3 = "and a.subject = '" . $_GET["data10"] . "' ";
										}

										if (empty($_SESSION["subject"])) {
											$subject = '';
										} else {
											$subject = "$_SESSION[subject]";
										}

										$sql = "SELECT *, a.pk, a.subject, a.status, c.pk as classpk FROM student_paper a 
							Inner Join member b
							On a.student = b.pk
							left join classdata as c on c.pk = a.subject
							where a.is_active != 0 and a.status != 3 and c.data7 like '%" . (!$searchname ? '' : $searchname) . "%'   " . $addcode . $addcode3 . "
							
							order by a.pk desc limit {$start} , {$perpage}  ";

										// echo $sql;
										// and b.subject = '$_SESSION[subject]'
										$query = mysqli_query($con, $sql);
										while ($objResult = mysqli_fetch_array($query)) {
											/// โหลดข้อมูลชื่อ อาจารย์ 
											$namedatacodestudent = "";
											$namedata  = "";
											$sql4 = "SELECT * FROM member  where pk = '" . $objResult["student"] . "' ";
											$query4 = mysqli_query($objCon, $sql4);
											while ($objResult4 = mysqli_fetch_array($query4)) {
												$namedata = $objResult4["name"];
												$namedatacodestudent = $objResult4["codestudent"];
												$subject =
													$objResult4["subject"];
											}
											$namedatasubject  = "";
											$sql4 = "SELECT * FROM classdata  where pk = '" . $objResult["subject"] . "' ";
											$query4 = mysqli_query($objCon, $sql4);
											while ($objResult4 = mysqli_fetch_array($query4)) {
												$namedatasubject = $objResult4["data2"];

												$namedatasubject2  = "";
												$sql42 = "SELECT * FROM drop_term  where name = '" . $objResult4["data8"] . "' ";
												$query42 = mysqli_query($objCon, $sql42);
												while ($objResult42 = mysqli_fetch_array($query42)) {
													$namedatasubject2 = $objResult42["name"];
												}
											}
										?>
											<tr onMouseover="this.style.backgroundColor='yellow';" onMouseout="this.style.backgroundColor='white';">
												<td class="text-center">
													<input type="checkbox" class="form-control" id="group_pp[]" name="group_pp[]" value="<?php echo $objResult["pk"] ?>">
												</td>
												<td>
													<div align="center">
														<font size="2px" color="Black"> <?php echo $i; ?></font>
													</div>
												</td>
												<td>
													<div align="center">
														<font size="2px" color="Black"> <?php echo $namedatacodestudent; ?></font>
													</div>
												</td>
												<td>
													<div align="center">
														<input type="text" name="staff_up" id="staff_up" value="<?php echo $objResult['student'] ?>" hidden>
														<font size="2px" color="Black"> <?php echo $namedata; ?></font>
													</div>
												</td>
												<td>
													<div align="center">
														<font size="2px" color="Black"> <?php echo $subject; ?></font>
													</div>
												</td>
												<td>
													<div align="center">
														<font size="2px" color="Black"> <?php echo $namedatasubject; ?></font>
													</div>
												</td>
												<td>
													<div align="center">
														<font size="2px" color="Black"> <?php echo $namedatasubject2; ?></font>
													</div>
												</td>
												<td>
													<div align="center">
														<font size="2px" color="Black"> <?php echo DateThai($objResult["create_date"]) . " " . DateThai2($objResult["create_date"]); ?></font>
													</div>
												</td>
												<!-- <td>
												<div align="center">
													<font size="2px" color="Black">



														<a class="btn  btn-sm btn-warning" href="checkdata2.php?subject=<?php echo $objResult["subject"]; ?>&CusID=<?php echo $objResult["pk"]; ?>&page=">
															<font size="2px"> จัดการข้อมูล </font>
														</a>

													</font>
												</div>
											</td> -->
												<td>
													<div align="center">
														<font size="2px" color="Black">
															<?php

															if ($objResult["status"] == "0") {
																echo " <font color = '#FF8C00' > กำลังตรวจสอบ </fonnt> ";
															} else if ($objResult["status"] == "1") {
																echo " <font color = '#006400' > อนุมัติ </fonnt> ";
															} else if ($objResult["status"] == "2") {
																echo " <font color = 'red' > ไม่อนุมัติ </fonnt> ";
															}
															?>
														</font>
													</div>
												</td>
											</tr>
										<?php
											$i++;
										}
										?>
									</tbody>
								</table>

								<div class="row" style="margin-top: 15px; ">
									<div class="col-lg-12 ">


									</div>
									<div class="col-lg-3 ">
										<div class="form-group"> <br>
											<font color="black" size="3px" class="serif"> สถานะ </font>
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

									<div class="col-lg-3 " hidden>
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
									<div class="col-md-3 text-end">
										<div class="form-group"> <br>
											<label for="">-</label><br>
											<button type="submit" class="btn btn-success mt-1"> บันทึก</button>
											<a class="btn btn-warning mt-1" href="checkdata.php">ยกเลิก</a>

										</div>

									</div>
								</div>
							</div>
							<!-- <div class="row mt-3"> -->

							<!-- </div> -->

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