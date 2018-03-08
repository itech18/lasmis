<?php
	$title = "Payment";
	include("header.php");
?>

				<div class="col-md-9" id="div4">
                    <p></p>
					<script>
						jQuery(function(){
							$('#regNumber').autocomplete("autoComplete.php");
						});
					</script>
                    <form method="post" action="doAction.php">
															
						<div class="form-group row col-sm-10">
							<label for="inputEmail3"  class="col-sm-3 col-form-label">Student Name</label>
							<div class="col-sm-9">
								<input type="text" name="regNumber" class="form-control" id="regNumber" placeholder="Student Name" required="required">
							</div>
						</div>
						<div class="form-group row col-sm-2">
							<div class="col-sm-12">
								<input type="submit" name="btnView" class="form-control btn btn-primary" value="View">
							</div>
						</div>
					</form>
                </div>

            </div>
<?php
	
	include("footer.php");
?>