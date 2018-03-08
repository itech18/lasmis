<?php
	$title = "Registration";
	include("header.php");
#if(isset($_GET['continue']))
	#{
	#$regnumber = $_GET['regNumber'];
	$regnumber = 'BA002';
	$query = mysql_query("SELECT * FROM students WHERE regNumber='$regnumber'") or die(mysql_error());
	$row = mysql_fetch_array($query);
?>
<div class="col-md-9" id="div4">
                    <p></p>
                    <div class="well well-sm">Assign a Student <strong><?= $row['firstName'] ?> <?= $row['middleName'] ?> <?= $row['lastName'] ?></strong> with registration number <strong><?= $row['regNumber'] ?></strong></div>
					<div class="row">
                <form method="post" action="doAction.php">
															
															<input type="hidden" name="studentid" value="<?= $row['studentID'] ?>">
															<div class="row" style="padding-left: 25px;">
								<legend>Class</legend>
															<div class="form-group col-sm-4">
															  <label for="inputEmail3"  class="col-form-label">Study Level</label>
																	<select name="studyLevel" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = mysql_query("SELECT * FROM studylevel") or die(mysql_error());
																	while($row = mysql_fetch_array($qrylvl))
																	{
																	?>
																		<option value="<?= $row['studyLevelID'] ?>"><?= $row['studyLevelName'] ?></option>
																	<?php } ?>
																	</select>
															</div>
															<div class="form-group col-sm-4">
															  <label for="inputEmail3"  class=" col-form-label">Class Name</label>
																	<select name="classname" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrycl = mysql_query("SELECT * FROM classes") or die(mysql_error());
																	while($row = mysql_fetch_array($qrycl))
																	{
																	?>
																		<option value="<?= $row['classID'] ?>"><?= $row['className'] ?></option>
																	<?php } ?>
																	</select>
															 
															</div>
															<div class="form-group col-sm-4">
															  <label for="inputEmail3"  class=" col-form-label">Academic Year</label>
																	<select name="academicyear" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qryacd = mysql_query("SELECT * FROM academicyears") or die(mysql_error());
																	while($row1 = mysql_fetch_array($qryacd))
																	{
																	?>
																		<option value="<?= $row1['academicYearID'] ?>"><?= $row1['academicYear'] ?></option>
																	<?php } ?>
																	</select>
															</div>
									</div>
								  <div class="row" style="padding-left: 25px;">
								<legend>Transport</legend>
									<p>Is the child use our transport <input type="radio" name="transport" checked="checked" onclick="showTransport(this.value)" value="No"> No <input type="radio" name="transport" onclick="showTransport(this.value)" value="Yes"> Yes</p>
									<div class="row" id="transport">
										<div class="form-group col-sm-6">
											<label for="diseasename" class="col-sm-4">Transport ID</label>
											<div class="col-sm-8">
											<input type="text" class="form-control" id="diseasename" name="diseasename"  />
											</div>
										  </div>
										  <div class="form-group col-sm-6">
											<label for="firstaid" class="col-sm-3">Root</label>
											<div class="col-sm-9">
											<input type="text" class="form-control" id="firstaid" name="firstaid"  />
											</div>
										  </div>
										  <div class="form-group col-sm-12">
											<label for="firstaid" class="col-sm-3">Mode of Payment</label>
											<div class="col-sm-3">
											<select class="form-control" id="firstaid" name="firstaid">
												<option></option>
												<option>Full</option>
												<option>One way</option>
											</select>
											</div>
										  </div>
										  <p style="padding-left: 25px;">Station</p>
										  <div class="form-group col-sm-6">
											<label for="physianname" class="col-sm-3">Arrival</label>
											<div class="col-sm-6">
											<input type="text" class="form-control" id="physianname" name="physianname"  />
											</div>
											<div class="col-sm-3">
											<input type="text" class="form-control" id="physianname" name="physianname" placeholder="Time"  />
											</div>
										  </div>
										  <div class="form-group col-sm-6">
											<label for="dphonenumber" class="col-sm-3">Departure</label>
											<div class="col-sm-6">
											<input type="text" class="form-control" id="dphonenumber" name="dphonenumber"  />
											</div>
											<div class="col-sm-3">
											<input type="text" class="form-control" id="physianname" name="physianname" placeholder="Time"  />
											</div>
										  </div>
										   <p style="padding-left: 25px;">Student Carry</p>
										  <div class="form-group col-sm-6">
											<label for="fullname" class="col-sm-5">Full Name</label>
											<div class="col-sm-7">
											<input type="text" class="form-control" id="fullname" name="fullname"  />
											</div>
										  </div>
										  <div class="form-group col-sm-6">
											<label for="phonenumber" class="col-sm-5">Phone Number</label>
											<div class="col-sm-7">
											<input type="text" class="form-control" id="phonenumber" name="phonenumber"  />
											</div>
										  </div>
									</div>
									
								</div>
							  <div class="form-group col-sm-12">
								<div class="col-sm-offset-4 col-sm-4">
							  <button type="submit" class="btn btn-primary form-control" name="doRegister">Save & Submit</button>
								</div>
							  </div>
							</form>
						  </div>
                </div>
				</div>
	<?php #} ?>

<?php
	
	include("footer.php");
?>