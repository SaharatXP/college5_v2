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





<div id="wrapper" class="container">
	<h1 id="page-title"> สรุปการทำงาน </h1>
	<div class="row">

		<div class="row">
			<div class="col-md-12">
				<div class="announce-item">



					<div class="row">
						<div class="col-lg-12 ">
							<div class="form-group">


								<!--- Action =  ไปยังไฟล์ที่ทำการเช็ค  --->
								<form role="form" name="frmMain" method="get" action="work_report.php" enctype="multipart/form-data">
									<div class="row" style="margin-top: 10px; ">
										<div class="col-lg-12">
											<div class="col-lg-3 ">
												<div class="form-group">
													<font color="black" size="3px" class="serif"> วิชา </font>
													<input type="text" name="searchname" id="searchname" class="form-control " value="<?php echo $searchname; ?>" autocomplete="off" style=" border-radius: 10px; "> <br>
												</div>
											</div>
											<div class="col-lg-2 ">
												<div class="form-group">
													<font color="black" size="3px" class="serif"> โครงการ </font>
													<select class="form-control" id="searchname2" name="searchname2" style=" border-radius: 10px;  ">
														<?php if (empty($searchname2)) { ?>
															<option value=""> โครงการ </option>
														<?php } ?>
														<?php
														$sql = "SELECT * FROM drop_type where name = '" . $searchname2 . "'  order by pk asc  ";
														$query = mysqli_query($objCon, $sql);
														while ($objResult = mysqli_fetch_array($query)) {
														?>
															<option value="<?php echo $objResult["name"]; ?>"><?php echo $objResult["name"]; ?></option>
														<?php
														}
														?>
														<?php
														$sql = "SELECT * FROM drop_type where  name != '" . $searchname2 . "'  order by pk asc  ";
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

													<a href="work_report.php">
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
										$addcode2 = " and  a.savedata4 = '" . $searchname2 . "' ";
									}

									$sql2 = " SELECT a.*, b.data1, b.data2 FROM work_time a 
											Inner Join classdata b On a.subject = b.pk
											where a.student_paper != '' 
											and a.member = '" . $_SESSION["UserID3"] . "'   
											" . $addcode . $addcode2 . "  
											order by a.pk asc    ";
									$query2 = mysqli_query($objCon, $sql2);
									$total_record = mysqli_num_rows($query2);
									$total_page = ceil($total_record / $perpage);
									?>
									<?php if (ceil($total_record / $perpage) > 0) : ?>
										<ul class="pagination">
											<?php if ($page > 1) : ?>
												<li class="prev"><a href="work_report.php?page2=<?php echo $page - 1 ?>&CusID=<?php echo $_GET["CusID"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>">Prev</a></li>
											<?php endif; ?>

											<?php if ($page > 3) : ?>
												<li class="start"><a href="work_report.php?page2=1&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>">1</a></li>
												<li class="dots">...</li>
											<?php endif; ?>

											<?php if ($page - 2 > 0) : ?><li class="page"><a href="work_report.php?page2=<?php echo $page - 2 ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
											<?php if ($page - 1 > 0) : ?><li class="page"><a href="work_report.php?page2=<?php echo $page - 1 ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

											<li class="currentpage"><a href="work_report.php?page2=<?php echo $page ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>"><?php echo $page ?></a></li>

											<?php if ($page + 1 < ceil($total_record / $perpage) + 1) : ?><li class="page"><a href="work_report.php?page2=<?php echo $page + 1 ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
											<?php if ($page + 2 < ceil($total_record / $perpage) + 1) : ?><li class="page"><a href="work_report.php?page2=<?php echo $page + 2 ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

											<?php if ($page < ceil($total_record / $perpage) - 2) : ?>
												<li class="dots">...</li>
												<li class="end"><a href="work_report.php?page2=<?php echo ceil($total_record / $perpage) ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>"><?php echo ceil($total_record / $perpage) ?></a></li>
											<?php endif; ?>

											<?php if ($page < ceil($total_record / $perpage)) : ?>
												<li class="next"><a href="work_report.php?page2=<?php echo $page + 1 ?>&tablload1=<?php echo $_GET["tablload1"]; ?>&searchcustomer=<?php echo $_GET["searchcustomer"]; ?>&searchname2=<?php echo $_GET["searchname2"]; ?>&searchname=<?php echo $_GET["searchname"]; ?>&CusID=<?php echo $_GET["CusID"]; ?>">Next</a></li>
											<?php endif; ?>
										</ul>
									<?php endif; ?>

								</div>


								<div class="col-lg-12" align="left" style="margin-top: 15px; ">
									<div class="table-responsive">
										<table id="key_product" class=" table    tablemobile  " border="0">
											<thead>
												<tr>
													<!-- <th width="3%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; "  ><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; ">  วัน เดือน ปี    </font></div></th>    
												<th width="8%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; ">  รหัสวิชา  </font></div></th>  
												<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> โครงการ  </font></div></th>    
												<th width="2%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF; "><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> กลุ่มที่  </font></div></th>   
												<th width="6%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> อาจารย์ประจำวิชา  </font></div></th> 
												<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF;  border-right: 1px solid #FFF;  "><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; ">  ข้อมูลการทำงาน   </font></div></th>    
												<th width="3%" bgcolor="#BEC6CB" style="border: 0px solid #FFF; "><div align="center"> 
												<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; ">   ลบ-แก้ไข   </font></div></th>   -->
													<th width="25%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; ">
														<div align="center">
															<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> รหัสวิชา/ชื่อวิชา </font>
														</div>
													</th>
													<th width="25%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; ">
														<div align="center">
															<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> อาจารย์ประจำวิชา </font>
														</div>
													</th>
													<th width="25%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; ">
														<div align="center">
															<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> ข้อมูลการทำงาน </font>
														</div>
													</th>
													<th width="25%" bgcolor="#BEC6CB" height="35px;" style="border: 0px solid #FFF; border-right: 1px solid #FFF; ">
														<div align="center">
															<font size="3px" class="serif2" color="#FFF" style=" font-size: 13px; "> สรุปการทำงาน </font>
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

												$sql2 = "  SELECT a.*, b.* , b.pk as classpk, m.* FROM work_time a 
											left Join classdata b On a.subject = b.pk
											left join member m on m.pk = b.data11
											where a.student_paper != '' 
											and a.member = '" . $_SESSION["UserID3"] . "'   
											" . $addcode . $addcode2 . "  
											group by b.pk
											order by a.pk asc   limit {$start} , {$perpage}   ";

												$query2 = mysqli_query($con, $sql2);
												while ($objResult2 = mysqli_fetch_array($query2)) {
													if ($bg == "#FFF") {
														$bg = "#F8FAFD";
													} else {
														$bg = "#FFF";
													}

													$subject_save = $objResult2["subject"];


													$name_teacher = " - ";
													$sql = "SELECT * FROM member where status = 'AJ' and pk = '" . $data11 . "'  order by pk asc  ";
													$query = mysqli_query($objCon, $sql);
													while ($objResult = mysqli_fetch_array($query)) {
														$name_teacher = $objResult["name"];
													}
												?>
													<tr style="background-color: <?php echo $bg; ?>; ">

														
														<td style=" border-left: 0px solid #F2F2F2; ">
															<div align="center">
																<font size="3px" color="Black" style=" font-size: 13px; ">[ <?php echo  $objResult2['data1'] ?> ] <?php echo  $objResult2['data2'] ?> </font>
															</div>
														</td>


														<td style=" border-left: 0px solid #F2F2F2; ">
															<div align="center">
																<font size="3px" color="Black" style=" font-size: 13px; "> <?php echo $objResult2['name']; ?> </font>
															</div>
														</td>
														


														


														<td style=" border-left: 0px solid #F2F2F2; ">
															<div align="center">
																<font size="3px" color="Black" style=" font-size: 13px; ">
																	<a data-toggle="modal" data-target="#smallmodal<?php echo $i; ?>" style="cursor: pointer; "> ดูรายละเอียด </a>
																</font>
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
																			ชื่อวิชา : <?php echo $objResult2["data1"]; ?> :  <?php echo $objResult2["data2"]; ?><br>
																			ประเภท :  <?php echo $objResult2["data10"]; ?><br>
																			เทอม : <?php echo $objResult2["data8"]; ?><br>
																			โครงการ (ปกติ/พิเศษ) : <?php echo $objResult2["savedata4"]; ?> <br>

																		

																		</font>
																	</div>
																</div>
															</div>
														</div>
														<!-- end modal small -->


														<td align="center">
															<div align="center">
<!-- 
																<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"]; ?>?Action=Del2&CusID=<?php echo $objResult2["student_paper"]; ?>&Idel=<?php echo $objResult2["pk"]; ?>';}">
																	<button type="button" class="btn btn-sm btn-primary" style="background-color: #FD938F; border-radius: 5px;   border: 1px solid  #FD938F;   ">
																		<font color="#000000" size="2px" class="serif1"> ลบ </font>
																	</button>
																</a> -->

																<!-- <a href="work_time_edit2.php?CusID=<?php echo $objResult2["student_paper"]; ?>&Idel=<?php echo $objResult2["pk"]; ?>&page=2">
																	<button type="button" class="btn btn-sm btn-primary" style="background-color: #FFD45F; border-radius: 5px;   border: 1px solid  #FFD45F;   ">
																		<font color="#000000" size="2px" class="serif1"> เเก้ไข </font>
																	</button>
																</a> -->

																<font size="3px" color="Black" style=" font-size: 13px; "><a href="work_report_view.php?classdata=<?php echo $objResult2['classpk']; ?>"><b style="color: red;">ดูสรุปการทำงาน คลิก </b> </a></font>


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


							</div>
						</div>
					</div>


				</div>
			</div>
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