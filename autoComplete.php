<?php
	include_once("conn.php");
	
	$regno = $_GET['q'];
	
	$query = $con->prepare("SELECT * FROM students WHERE firstName LIKE '%$regno%'");
	$query->execute();
	while($rows = $query->fetch())
	{
		print($rows['firstName']." ".$rows['middleName']." ".$rows['lastName']."");
	}
	//return json data
	//echo json_encode($data);
?>