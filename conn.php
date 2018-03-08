<?php
	$Db_user = "root";
	$Db_pass ="";
	$Db_host = "localhost";
	$Db_name = "sms";
	
	$con = new PDO("mysql:host=".$Db_host.";dbname=".$Db_name,$Db_user,$Db_pass);