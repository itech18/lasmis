<?php
	include_once("conn.php");
	session_start();
	$role = $_SESSION['role'];
	if(!isset($_SESSION['role']))
	{
		header('localhost:index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="myApp" ng-app lang="en">
<head>
    <title>SMS : <?= $title ?></title>
    <link rel="stylesheet" href="scripts/css/style.css" type="text/css" />
    <link rel="stylesheet" href="scripts/css/autoComplete.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <script src="scripts/js/jquery.js" type="text/JavaScript" language="javascript"></script>
	<script type="text/javascript" src="scripts/js/script.js"></script>


    <script src="scripts/js/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/loadimg.min.css">
	<style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
</head>
<body>
<div class="col-md-offset-1 col-md-10" id="main">
            <div class="navbar navbar-default row" id="main-header">
                <div class="container-fluid">
			        <div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-NCR-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				         </button>
						 <div class="col-md-3">
				         <img src="images/logo.jpg" width="150" height="120"/>
						 </div>
						 <div class="col-md-9" id="text">
							<span class="h1">School Management System</span><br />
							<span class="h2" id="h3">Growing with quality education!!</span>
						 </div>
			         </div>
                     <div class="collapse navbar-collapse navbar-right" id="bs-NCR-navbar-collapse-1">
                         <ul class="nav navbar-nav" style="margin-top:65px;">
				             <li class="dropdown "><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <span><?= $_SESSION['username'] ?></span> <i class="glyphicon glyphicon-user"> </i><b class="caret"></b></a>
					         <ul class="dropdown-menu">
						        <li ><a href="#"> <i class="glyphicon glyphicon-user"></i> <span>Profile</span></a></li>
						        <li ><a href="#"> <i class="glyphicon glyphicon-lock"></i> <span>Change Password</span></a></li>
						        <li ><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
					          </ul>
				             </li>
			              </ul>
                     </div>
                  </div>
             </div>
			 	<div class="row" style="margin-top:-17px;border:1px solid #71179C;">
               <div class="row col-md-3" >
                                <div class="sidebar-nav" >
                                     <div class="navbar navbar-default" role="navigation">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <span class="visible-xs navbar-brand">Main Menu</span>
                                        </div>
                                    
                                        <div class="navbar-collapse collapse sidebar-navbar-collapse" style="background-color:#ddddee;">
										<?php if($role =='Admin') { ?>
                                            <ul class="nav">
                                                <li class="active"><a href="adminHome.php">Home</a></li>
							                    <li><a href="systemConfig.php" >System Configuration</a></li>
							                    <li><a href="maganeStudent.php" >Student Registration</a></li>
							                    <li><a href="studentPay.php" >Student Payment</a></li>
							                    <li><a href="#" >Teacher Management</a></li>
							                    <li><a href="#" >Student Result</a></li>
							                    <li><a href="#" >User Management</a></li>
							                    <li><a href="logout.php" >Sign Out</a></li>
                                               
						                    </ul>
										<?php }else if($role =='Register'){ ?>
											<ul class="nav">
                                                <li class="active"><a href="RegisterHome.php" >Home</a></li>
							                    <li><a href="maganeStudent.php" >Manage Students</a></li>
							                    <li><a href="studentClass.php" >Student Class</a></li>
							                    <li><a href="logout.php" >Sign Out</a></li>
                                               
						                    </ul>
										<?php }else if($role =='Accountant'){ ?>
											<ul class="nav">
                                                <li class="active"><a href="AccountantHome.php" >Home</a></li>
							                    <li><a href="studentPay.php" >Student Payment</a></li>
							                    <li><a href="paymentReport.php" >Payment Report</a></li>
							                    <li><a href="logout.php" >Sign Out</a></li>
                                               
						                    </ul>
										<?php }else{
											header('location:index.php');
											
											}
										?>
                                        </div>
                                 </div>
                                </div>

                    
                    
                </div>
            
            
   