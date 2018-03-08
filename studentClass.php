<?php
	$title = "Administrator";
	include("header.php");
?>

				<div class="col-md-9" id="div4">
                    <p></p>
                   <form method="get" action="studentClass.php">
						<div class="form-group row col-sm-3">
							<div class="col-sm-12">
																	<select name="level" class="form-control" required="required">
																		<option>Study Level</option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM studylevel") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowte = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowte['studyLevelID'] ?>"><?= $rowte['studyLevelName'] ?></option>
																	<?php } ?>
																	</select>
																</div>
															</div>
															<div class="form-group row col-sm-3">
																<div class="col-sm-12">
																	<select name="class" class="form-control" required="required">
																		<option>Class</option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM classes") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowte = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowte['classID'] ?>"><?= $rowte['className'] ?></option>
																	<?php } ?>
																	</select>
																	</div>
															</div>
															
															<div class="form-group row col-sm-3">
															<div class="col-sm-12">
																	<select name="academic" class="form-control" required="required">
																		<option>Academic Year</option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM academicyears") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowte = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowte['academicYearID'] ?>"><?= $rowte['academicYear'] ?></option>
																	<?php } ?>
																	</select>
															</div>
															</div>
															<div class="form-group col-sm-2">
																<input type="submit" class="btn btn-primary form-control" name="btnStudentClass" value="Continue" />
															
															</div>
														</form>
														<?php
													if(isset($_GET['btnStudentClass']))
													{
														
												?>
											<div class="row col-sm-12 completeReport" >
												<div class="row">
												<center>
													<h3>BRILLIANT ACADEMY</h3>
													</h4>List of Students that payed Complete Tuition fees </h4>
												</center>
												</div>
												<table class="table table-striped table-hover">
													<thead>
														<tr>
															<th></th>
															<th>Student Name</th>
															<th>Reg Number</th>
															<th>Class</th>
															<th>Check/Uncheck</th>
														</tr>
													</thead>
													<tbody>
												<?php
														$academic = $_GET['academic'];
														$level = $_GET['level'];
														$class = $_GET['class'];
														$i=1;
														$qryRe = $con->prepare("SELECT * FROM classes cl, studentclasses stcl, students st WHERE stcl.classID = $class AND cl.classID= stcl.classID AND stcl.academicYearID=$academic AND stcl.studentID=st.studentID") or die(mysql_error());
														$qryRe->execute();
														while($rows = $qryRe->fetch())
														{
														
												?>
												<tr>
													<td><?= $i ?></td><td><?= $rows['firstName'] ?> <?= $rows['middleName'] ?> <?= $rows['lastName'] ?></td><td><?= $rows['regNumber'] ?></td><td><?= $rows['className'] ?></td>
													<td><input type="checkbox" class="form-control" checked="checked"/></td>
												</tr>
												<?php
														$i++;	}
													 ?>
													</tbody>
													</table>
													<div class="row">
													<div class="form-group row col-sm-3">
																<div class="col-sm-12">
																	<select name="class" class="form-control" required="required">
																		<option>Class</option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM classes WHERE studyLevelID= $level") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowte = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowte['classID'] ?>"><?= $rowte['className'] ?></option>
																	<?php } ?>
																	</select>
																	</div>
															</div>
															
															<div class="form-group row col-sm-3">
															<div class="col-sm-12">
																	<select name="academic" class="form-control" required="required">
																		<option>Academic Year</option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM academicyears") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowte = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowte['academicYearID'] ?>"><?= $rowte['academicYear'] ?></option>
																	<?php } ?>
																	</select>
															</div>
															</div>
															<div class="form-group col-sm-2">
																<input type="submit" class="btn btn-primary form-control" name="btnStudentClass" value="Continue" />
															
															</div>
													</div>
												
											</div>
											
											<?php
													}
												?>
                </div>

            </div>
<?php
	
	include("footer.php");
?>