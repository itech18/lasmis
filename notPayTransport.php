<?php
	$title = "Payment Report";
	include("header.php");
?>

				<div class="col-md-9" id="div4">
                    <p></p>
                    <nav class="navbar navbar-default">
						  <div class="container-fluid">
							<ul class="nav navbar-nav">
							  <li><a href="paymentReport.php">Complete</a></li>
							  <li><a href="paymentReportNotComplete.php">Not Complete</a></li>
							  <li><a href="paymentReportNotPay.php">Not Pay</a></li>
							  <li><a href="reportTransport.php">Transport Pay</a></li>
							  <li class="active"><a href="notPayTransport.php">Not Transport Pay</a></li>
							</ul>
						  </div>
						</nav>
					<div class="row" style="padding:10px;">
					<form method="get" action="paymentReportNotPay.php">
						<div class="form-group row col-sm-3">
							<div class="col-sm-12">
																	<select name="level" class="form-control" required="required">
																		<option>Study Level</option>
																	<?php
																	$qrylvl = mysql_query("SELECT * FROM studylevel") or die(mysql_error());
																	while($rowte = mysql_fetch_array($qrylvl))
																	{
																	?>
																		<option value="<?= $rowte['studyLevelID'] ?>"><?= $rowte['studyLevelName'] ?></option>
																	<?php } ?>
																	</select>
																</div>
															</div>
															<div class="form-group row col-sm-3">
																<div class="col-sm-12">
																	<select name="term" class="form-control" required="required">
																		<option>Class</option>
																	<?php
																	$qrylvl = mysql_query("SELECT * FROM classes") or die(mysql_error());
																	while($rowte = mysql_fetch_array($qrylvl))
																	{
																	?>
																		<option value="<?= $rowte['classID'] ?>"><?= $rowte['className'] ?></option>
																	<?php } ?>
																	</select>
																	</div>
															</div>
															<div class="form-group row col-sm-3">
															<div class="col-sm-12">
																	<select name="term" class="form-control" required="required">
																		<option>Term</option>
																	<?php
																	$qrylvl = mysql_query("SELECT * FROM terms") or die(mysql_error());
																	while($rowte = mysql_fetch_array($qrylvl))
																	{
																	?>
																		<option value="<?= $rowte['termID'] ?>"><?= $rowte['termName'] ?></option>
																	<?php } ?>
																	</select>
															</div>
															</div>
															<div class="form-group row col-sm-3">
															<div class="col-sm-12">
																	<select name="academic" class="form-control" required="required">
																		<option>Academic Year</option>
																	<?php
																	$qrylvl = mysql_query("SELECT * FROM academicyears") or die(mysql_error());
																	while($rowte = mysql_fetch_array($qrylvl))
																	{
																	?>
																		<option value="<?= $rowte['academicYearID'] ?>"><?= $rowte['academicYear'] ?></option>
																	<?php } ?>
																	</select>
															</div>
															</div>
															<div class="form-group row col-sm-12">
															<div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnReportComplete" value="Continue" />
															</div>
															</div>
														</form>
											<div class="row col-sm-12" >
												<?php
													if(isset($_GET['btnReportComplete']))
													{
														
												?>
												<table class="table table-striped table-hover">
													<caption>Student Course</caption>
													<thead>
														<tr>
															<th></th>
															<th>Student Name</th>
															<th>Reg Number</th>
															<th>Class</th>
															<th>Amount</th>
														</tr>
													</thead>
													<tbody>
												<?php
														$academic = $_GET['academic'];
														$level = $_GET['level'];
														$i=1;
														$qryRe = mysql_query("SELECT * FROM classes cl,studentclasses stcl, students st WHERE cl.studyLevelID=$level AND stcl.academicYearID=$academic AND stcl.classID=cl.classID AND stcl.studentID=st.studentID") or die(mysql_error());
														while($rows = mysql_fetch_array($qryRe))
														{
															$class = $rows['classID'];
															$student = $rows['studentID'];
															$qryaml = mysql_query("SELECT amount FROM studylevelfees WHERE studyLevelID=$level AND academicYearID=$academic");
															$rowaml = mysql_fetch_array($qryaml);
															$amountLevel = $rowaml['amount'];
															$qryam = mysql_query("SELECT SUM(amount) AS total FROM studentpayments WHERE studentID=$student AND academicYearID=$academic AND classID=$class AND feetypeID=3") or die(mysql_error());
															$rowam = mysql_fetch_array($qryam);
															$stpay = $rowam['total'];
															
															if($stpay < $amountLevel && $stpay != 130000)
															{
															
												?>
												<tr>
													<td><?= $i ?></td><td><?= $rows['firstName'] ?> <?= $rows['middleName'] ?> <?= $rows['lastName'] ?></td><td><?= $rows['regNumber'] ?></td><td><?= $rows['className'] ?></td>
													<td><?= $stpay ?></td>
												</tr>
												<?php
														$i++;	}
													 } ?>
													</tbody>
													</table>
														
												<?php
													}
												?>
											</div>
					</div>
                </div>

            </div>
<?php
	
	include("footer.php");
?>