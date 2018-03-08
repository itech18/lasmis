<?php
	include_once("conn.php");
	
	if(isset($_POST['btnLevel']))
	{
		$level = $_POST['lvlName'];
		$query = $con->prepare("INSERT INTO studylevel (studyLevelName) VALUES ('$level')");
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
	if(isset($_POST['btnClass']))
	{
		$class = $_POST['className'];
		$level = $_POST['studyLevel'];
		$query = $con->prepare("INSERT INTO classes (className,studyLevelID) VALUES ('$class','$level')") or die(mysql_error());
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
	if(isset($_POST['btnTerm']))
	{
		$term = $_POST['termName'];
		$query = $con->prepare("INSERT INTO terms (termName) VALUES ('$term')") or die(mysql_error());
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
	if(isset($_POST['btnAcademic']))
	{
		$academic = $_POST['academicyear'];
		$query = $con->prepare("INSERT INTO academicyears (academicYear) VALUES ('$academic')") or die(mysql_error());
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
	if(isset($_POST['btnFees']))
	{
		$level = $_POST['studyLevel'];
		$academic = $_POST['academicyear'];
		$amount = $_POST['amount'];
		$query = $con->prepare("INSERT INTO studylevelfees (studyLevelID,academicYearID,amount) VALUES ('$level','$academic','$amount')") or die(mysql_error());
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
	if(isset($_POST['btnOther']))
	{
		$level = $_POST['studyLevel'];
		$academic = $_POST['academicyear'];
		$amount = $_POST['amount'];
		$type = $_POST['feetype'];
		$query = $con->prepare("INSERT INTO otherfees (feetypeID,amount,studyLevelID,academicYearID) VALUES ('$type','$amount','$level','$academic')") or die(mysql_error());
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
	if(isset($_POST['doRegister']))
	{
		$fname = $_POST['firstname'];
		$mname = $_POST['middlename'];
		$lname = $_POST['lastname'];
		$regnumber = $_POST['regnumber'];
		$address = $_POST['physicaladdress'];
		$resident = $_POST['resident'];
		$dateofbirth = $_POST['dateofbirth'];
		$religion = $_POST['religion'];
		$national = $_POST['nationality'];
		$parentname = $_POST['parentname'];
		$parentoccupation = $_POST['parentoccupation'];
		$phonenumber = $_POST['phonenumber'];
		$query = $con->prepare("INSERT INTO students (firstName,middleName,lastName,physicalAddress,dateOfBirth,regNumber,resident,religion,parentName,parentOccupation,phoneNumber,nationality)	VALUES ('$fname','$mname','$lname','$address','$dateofbirth','$regnumber','$resident','$religion','$parentname','$parentoccupation','$phonenumber','$national')") or die(mysql_error());
		if($query->execute())
		{
			header('location:studentRegistration.php?continue=Ok&regNumber='.$regnumber);
			exit();
		}
	}
	if(isset($_POST['btnComplete']))
	{
		$student = $_POST['studentid'];
		$class = $_POST['classname'];
		$academic = $_POST['academicyear'];
		$query = $con->prepare("INSERT INTO studentclasses (studentID,classID,academicYearID) VALUES ('$student','$class','$academic')") or die(mysql_error());
		if($query->execute())
		{
			header('location:studentRegistration.php');
			exit();
		}
	}
	if(isset($_POST['btnView']))
	{
		$regno = $_POST['regNumber'];
		$query = $con->prepare("SELECT * FROM students WHERE regNumber='$regno'");
		$query->execute();
		console.log($query->execute());
		if($row = $query->fetch())
		{
			header("location:paymentForm.php?id=".$row['studentID']);
			exit();
		}else{
			header("location:studentPay.php?id=0");
			exit();
		}
	}
	if(isset($_POST['btnPay']))
	{
		$student = $_POST['studentid'];
		$class = $_POST['classid'];
		$academic = $_POST['acdemicid'];
		$term = $_POST['term'];
		$type = $_POST['type'];
		$amount = $_POST['amount'];
		$bank= $_POST['dateofbank'];
		
		$query = $con->prepare("INSERT INTO studentpayments (studentID,classID,academicYearID,termID,feetypeID,amount,dateOfBank) VALUES ('$student','$class','$academic','$term','$type','$amount','$bank')") or die(mysql_error());
		if($query->execute())
		{
			header('location:paymentForm.php?id='.$student);
			exit();
		}
	}
	if(isset($_POST['btnType']))
	{
		$name = $_POST['feename'];
		$des = $_POST['description'];
		
		$query = $con->prepare("INSERT INTO feetypes (feeName,description) VALUES ('$name','$des')") or die(mysql_error());
		if($query->execute())
		{
			header('location:systemConfig.php');
			exit();
		}
	}
?>	