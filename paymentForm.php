<?php
	include_once('conn.php');
	$title = "Payment Form";
	include("header.php");
	$id = $_GET['id'];
	$query = $con->prepare("SELECT * FROM students st,studentclasses stcl,classes cl,academicyears ac WHERE st.studentID=$id AND st.studentID=stcl.studentID AND stcl.classID=cl.classID AND stcl.academicYearID=ac.academicYearID AND ac.status='Active'");
	$query->execute();
	$row = $query->fetch();
?>

				<div class="col-md-9" id="div4">
                    <p>Payment for Student <strong><?= $row['firstName'] ?> <?= $row['middleName'] ?> <?= $row['lastName'] ?></strong> study Class <strong><?= $row['className'] ?></strong> for this <strong><?= $row['academicYear'] ?></strong> academic Year.</p>
                    <form method="post" action="doAction.php">
						<input type="hidden" name="studentid" value="<?= $row['studentID'] ?>" />
						<input type="hidden" name="classid" value="<?= $row['classID'] ?>" />
						<input type="hidden" name="acdemicid" value="<?= $row['academicYearID'] ?>" />
						<div class="form-group row col-sm-6">
															  <label for="inputEmail3"  class="col-sm-5 col-form-label">Paid For</label>
															  <div class="col-sm-7">
																	<select name="type" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM feetypes") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowf = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowf['feetypeID'] ?>"><?= $rowf['feeName'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															
															<div class="form-group row col-sm-6">
															  <label for="inputEmail3"  class="col-sm-5 col-form-label">Term Study</label>
															  <div class="col-sm-7">
																	<select name="term" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrylvl = $con->prepare("SELECT * FROM terms") or die(mysql_error());
																	$qrylvl->execute();
																	while($rowte = $qrylvl->fetch())
																	{
																	?>
																		<option value="<?= $rowte['termID'] ?>"><?= $rowte['termName'] ?></option>
																	<?php } ?>
																	</select>
															  </div>
															</div>
															<div class="form-group row col-sm-6">
															  <label for="inputEmail3"  class="col-sm-5 col-form-label">Payed Amount</label>
															  <div class="col-sm-7">
																<input type="text" name="amount" class="form-control" id="inputEmail3" placeholder="Amount" required="required">
															  </div>
															</div>
															<div class="form-group row col-sm-6">
															  <label for="inputEmail3"  class="col-sm-5 col-form-label">Date of Bank</label>
															  <div class="col-sm-7">
																<input type="date" name="dateofbank" class="form-control" id="inputEmail3" placeholder="Amount" required="required">
															  </div>
															</div>
															<div class="form-group row">
															  <div class="col-sm-offset-4 col-sm-4">
																<input type="submit" class="btn btn-primary form-control" name="btnPay" value="Save" />
															  </div>
															</div>
														</form>
					<div class="row">
					<?php 
						$qryterm = $con->prepare("SELECT * from terms");
						$qryterm->execute();
						while($rowt = $qryterm->fetch())
						{
					?>
						<div class="col-sm-4">
							<div class="well well-sm"><?= $rowt['termName'] ?> : <?= $row['academicYear'] ?></div>
								<table class="table table-striped">
							<?php
								$qrytype = $con->prepare("SELECT * FROM feetypes");
								$qrytype->execute();
								while($rowty = $qrytype->fetch())
								{
							?>
								<tr>
									<td><?= $rowty['feeName'] ?></td>
									<?php 
										$qryam = $con->prepare("SELECT SUM(amount) AS total FROM studentpayments WHERE studentID='".$row['studentID']."'AND academicYearID='".$row['academicYearID']."'AND classID='".$row['classID']."'AND termID='".$rowt['termID']."'AND feetypeID='".$rowty['feetypeID']."'") or die(mysql_error());
										$qryam->execute();
										$rowa = $qryam->fetch();
										if($rowa['total']>0)
										{
									?>
									<td>
										<?= number_format($rowa['total']); ?> /=
									</td>
									<?php }else{ ?>
										<td>
										-
									</td>
									<?php } ?>
								</tr>
							<?php
								}
							?>
								</table>
						</div>
						
					<?php
						}
					?>
					</div>
                </div>

            </div>
<?php
	
	include("footer.php");
?>