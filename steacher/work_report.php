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
									
								</div>


								<div class="col-lg-12" align="left" style="margin-top: 15px; ">
									<div class="table-responsive">
										<table id="key_product" class=" table    tablemobile  " border="0">
											<thead>
												<tr>
													
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

												$sql2 = "  SELECT a.*, b.* , b.pk as classpk, a.student_paper as stdpp, m.* FROM work_time as a 
											left Join classdata as b On a.subject = b.pk
											left join member as m on m.pk = b.data11
											where a.student_paper != '' 
											and a.member = " . $_SESSION["UserID3"] . "   
											" . $addcode . $addcode2 . "  
											group by stdpp
											order by stdpp asc   limit {$start} , {$perpage}   ";
												// echo $sql2;
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
																	<a href="work_time.php?CusID=<?php echo $objResult2['stdpp'] ?>&page=" style="cursor: pointer; "> บันทึกการทำงาน คลิก </a>
																</font>
															</div>
														</td>



														<td align="center">
															<div align="center">
																

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