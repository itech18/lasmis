<?php
	$title = "Manage Students";
	include("header.php");
	
	if(isset($_GET['continue']))
	{
?>
</script>
<?php
	$regnumber = $_GET['regNumber'];
	$query = $con->prepare("SELECT * FROM students WHERE regNumber='$regnumber'")->errorCode();
	$query->execute();
	$row = $query->fetch();
?>
			<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Assign Student Class(Please not close thiss)</h4>
            </div>
            <div class="modal-body">
				<p>Assign a Student <strong><?= $row['firstName'] ?> <?= $row['middleName'] ?> <?= $row['lastName'] ?></strong> with registration number <strong><?= $row['regNumber'] ?></strong></p>
                <form method="post" action="doAction.php">
															
															<input type="hidden" name="studentid" value="<?= $row['studentID'] ?>">
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
															  <label for="inputEmail3"  class="col-sm-3 col-form-label">Class Name</label>
															  <div class="col-sm-9">
																	<select name="classname" class="form-control" required="required">
																		<option></option>
																	<?php
																	$qrycl = $con->prepare("SELECT * FROM classes") or die(mysql_error());
																	$qrycl->execute();
																	while($row = $qrycl->fetch())
																	{
																	?>
																		<option value="<?= $row['classID'] ?>"><?= $row['className'] ?></option>
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
																<input type="submit" class="btn btn-primary form-control" name="btnComplete" value="Save" />
															  </div>
															</div>
														</form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
				<div class="col-md-9" id="div4">
					<a href="studentRegistration.php" class="btn btn-primary btn-sm"> Register New Student</a>
					<div class="row">
					<div ng-controller="customersCrtl">

    <div class="row" style="padding:10px;">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
                <option value="100000">All</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
		<br>
            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total students</h5>
        </div>
    </div>
    <br/>
    <div class="row" style="padding:10px;">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
			<th>SN</td>
            <th>Full Name&nbsp;<a ng-click="sort_by('firstName');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Reg Number&nbsp;<a ng-click="sort_by('regNumber');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Date of Birth</th>
            <th>Study Class&nbsp;<a ng-click="sort_by('className');"><i class="glyphicon glyphicon-sort"></i></a></th>
			<th>Action</th>
            </thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{}}</td>
					<td>{{data.firstName}} {{data.middleName}} {{data.lastName}}</td>
                    <td>{{data.regNumber}}</td>
                    <td>{{data.dateOfBirth}}</td>
                    <td>{{data.className}}</td>
					<td> <a href="editLevel.php?id={{data.studentID}}">View Detail</a> | <a href="editLevel.php?id={{data.studentID}}">Modify</a> | <a href="editLevel.php?id={{data.studentID}}">Delete</a></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No customers found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">    
            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
    </div>
</div>
</div>
						
					
                </div>
				</div>
<script src="scripts/js/angular.min.js"></script>
<script src="scripts/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>

<?php
	
	include("footer.php");
?>