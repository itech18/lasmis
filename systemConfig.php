<?php
	$title = "System Configuration";
	include("header.php");
?>
				<div class="col-md-9" id="div4">
                   
	<div class="row" id="cont">
		                                <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#level" aria-controls="level" role="tab" data-toggle="tab">Study Levels</a></li>
                                        <li role="presentation"><a href="#class" aria-controls="class" role="tab" data-toggle="tab">Classes</a></li>
                                        <li role="presentation"><a href="#term" aria-controls="term" role="tab" data-toggle="tab">Terms</a></li>
                                        <li role="presentation"><a href="#year" aria-controls="year" role="tab" data-toggle="tab">Academic Years</a></li>
                                        <li role="presentation"><a href="#fee" aria-controls="fee" role="tab" data-toggle="tab">Study Level Fees</a></li>
                                        <li role="presentation"><a href="#other" aria-controls="other" role="tab" data-toggle="tab">Students Fees</a></li>
                                        <li role="presentation"><a href="#type" aria-controls="type" role="tab" data-toggle="tab">Fee Type</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="level">
										
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lvlModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="lvlModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title">Study Level Registration</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Level Name</label>
															  <div class="col-sm-9">
																<input type="text" name="lvlName" class="form-control" id="inputEmail3" placeholder="Level Name" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnLevel" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Level Name</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM studylevel");
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['studyLevelName'] ?></td><td><a href="editLevel.php?id=<?=$rows['studyLevelID'] ?>">Modify</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										 </div>
                                        <div role="tabpanel" class="tab-pane" id="class">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#classModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="classModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Study Level Registration</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Class Name</label>
															  <div class="col-sm-9">
																<input type="text" name="className" class="form-control" id="inputEmail3" placeholder="Level Name" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Study Level</label>
															  <div class="col-sm-9">
																	<select name="studyLevel" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM studylevel") or die(mysql_error());
																	$qrylvl->execute();
																	while($row = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $row['studyLevelID'] ?>"><?= $row['studyLevelName'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnClass" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Class Name</th><th>Study Level</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM classes, studylevel WHERE classes.studyLevelID=studylevel.studyLevelID") or die(mysql_error());
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['className'] ?></td><td><?= $rows['studyLevelName'] ?></td><td><a href="editLevel.php?id=<?=$rows['classID'] ?>">Modify</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
                                        <div role="tabpanel" class="tab-pane" id="term">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="termModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Term Registration</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Term Name</label>
															  <div class="col-sm-9">
																<input type="text" name="termName" class="form-control" id="inputEmail3" placeholder="Term Name" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnTerm" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Term Name</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM terms") or die(mysql_error());
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['termName'] ?></td><td><a href="editLevel.php?id=<?=$rows['termID'] ?>">Modify</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
                                        <div role="tabpanel" class="tab-pane" id="year">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#academicModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="academicModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Academic Year Registration</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Academic Year</label>
															  <div class="col-sm-9">
																<input type="text" name="academicyear" class="form-control" id="inputEmail3" placeholder="Term Name" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnAcademic" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Academic Year</th><th>Status</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM academicyears") or die(mysql_error());
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['academicYear'] ?></td><td><?= $rows['status'] ?></td><td><a href="editLevel.php?id=<?=$rows['academicYearID'] ?>">Modify</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
                                        <div role="tabpanel" class="tab-pane" id="fee">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feeModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="feeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Define Study Level Fees</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Study Level</label>
															  <div class="col-sm-9">
																	<select name="studyLevel" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM studylevel") or die(mysql_error());
																	$qrylvl->execute();
																	while($row = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $row['studyLevelID'] ?>"><?= $row['studyLevelName'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Academic Year</label>
															  <div class="col-sm-9">
																	<select name="academicyear" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qryacd = $con->prepare("SELECT * FROM academicyears") or die(mysql_error());
																	$qryacd->execute();
																	while($row1 = $qryacd->fetch())
																	{
																	?>
																		<option value="<?= $row1['academicYearID'] ?>"><?= $row1['academicYear'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Amount</label>
															  <div class="col-sm-9">
																<input type="text" name="amount" class="form-control" id="inputEmail3" placeholder="Amount" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnFees" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Study Level</th><th>Academic Year</th><th>Amount</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM studylevelfees stdf,academicyears acd,studylevel stdl WHERE stdf.studyLevelID=stdl.studyLevelID AND stdf.academicYearID=acd.academicYearID") or die(mysql_error());
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['studyLevelName'] ?></td><td><?= $rows['academicYear'] ?></td><td><?= number_format($rows['amount']) ?>/=</td><td><a href="editLevel.php?id=<?=$rows['studyLevelFeeID'] ?>">Modify</a> | <a href="editLevel.php?id=<?=$rows['studyLevelFeeID'] ?>">Delete</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
                                        <div role="tabpanel" class="tab-pane" id="other">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otherModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="otherModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Define Other Study Level Fees</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Study Level</label>
															  <div class="col-sm-9">
																	<select name="feetype" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM feetypes") or die(mysql_error());
																	$qrylvl->execute();
																	while($row = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $row['feetypeID'] ?>"><?= $row['feeName'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Amount</label>
															  <div class="col-sm-9">
																<input type="text" name="amount" class="form-control" id="inputEmail3" placeholder="Amount" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Study Level</label>
															  <div class="col-sm-9">
																	<select name="studyLevel" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM studylevel") or die(mysql_error());
																	$qrylvl->execute();
																	while($row = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $row['studyLevelID'] ?>"><?= $row['studyLevelName'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Academic Year</label>
															  <div class="col-sm-9">
																	<select name="academicyear" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qryacd = $con->prepare("SELECT * FROM academicyears") or die(mysql_error());
																	$qryacd->execute();
																	while($row1 = $qryacd->fetch())
																	{
																	?>
																		<option value="<?= $row1['academicYearID'] ?>"><?= $row1['academicYear'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnOther" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Fee Name</th><th>Amount</th><th>Study Level</th><th>Academic Year</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM otherfees othf,feetypes type,academicyears acd,studylevel stdl WHERE othf.feetypeID=type.feetypeID AND othf.studyLevelID=stdl.studyLevelID AND othf.academicYearID=acd.academicYearID") or die(mysql_error());
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['feeName'] ?></td><td><?= number_format($rows['amount']) ?>/=</td><td><?= $rows['studyLevelName'] ?></td><td><?= $rows['academicYear'] ?></td><td><a href="editLevel.php?id=<?=$rows['otherFeeID'] ?>">Modify</a> | <a href="editLevel.php?id=<?=$rows['otherFeeID'] ?>">Delete</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
										<div role="tabpanel" class="tab-pane" id="type">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#typeModel">
											  Add New
											</button>

											<!-- Modal -->
											<div class="modal fade" id="typeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Define Other Study Level Fees</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
														<form method="post" action="doAction.php">
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Fee Name</label>
															  <div class="col-sm-9">
																<input type="text" name="feename" class="form-control" id="inputEmail3" placeholder="Amount" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Amount</label>
															  <div class="col-sm-9">
																<textarea name="description" class="form-control" rows="4" required="required"></textarea>
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnType" value="Save" />
															  </div>
															</div>
														</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												  </div>
												</div>
											  </div>
											</div>
											<table class="table table-border">
												<thead>
													<tr>
														<th>SN</th><th>Fee Name</th><th>Description</th><th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$qrylvl = $con->prepare("SELECT * FROM feetypes") or die(mysql_error());
													$qrylvl->execute();
													$i = 1;
													while($rows = $qrylvl->fetch())
													{
												?>
													<tr>
														<td><?= $i ?></td><td><?= $rows['feeName'] ?></td><td><?= $rows['description'] ?></td><td><a href="editLevel.php?id=<?=$rows['feetypeID'] ?>">Modify</a> | <a href="editLevel.php?id=<?=$rows['feetypeID'] ?>">Delete</a></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
                                    </div>
</div>
                                </div>
	</div>
</div>
                </div>

          
<?php
	
	include("footer.php");
?>