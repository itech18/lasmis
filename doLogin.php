<?php
	session_start();
	include_once("conn.php");
	if(isset($_POST['doLogin']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = $con->prepare("SELECT * FROM users WHERE userName='$username' AND password='$password'");
		$query->execute();
		if($row = $query->fetch())
		{
			$_SESSION['username'] = $row['userName'];
			$_SESSION['role'] = $row['role'];
			if($row['role']=='Admin')
			{
			
				header("location:adminHome.php");
                exit();
			}
			else if($row['role']=='Register')
			{
			
				header("location:RegisterHome.php");
                exit();
			}
			else if($row['role']=='Accountant')
			{
				header("location:AccountantHome.php");
                exit();
			
			}else if($row['role']=='Examiner')
			{
			}
			else{
				header("location:index.php?lg=error");
				exit();
			}
		}
		else{
				header("location:index.php?lg=error");
				exit();
			}
	}else{
		header("location:index.php");
	}

?>