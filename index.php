<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SMS : Home</title>
    <link rel="stylesheet" href="scripts/css/style.css" type="text/css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
</head>
<body>
        <div class="col-md-12" id="header">
                <h3>School Management System (SMS)</h3>
        </div>
        <div class="col-md-12" id="login">
           
                <div class="col-md-6" id="logo">
                    <img src="images/logo.jpg" width="83%" height="200" />
                </div>
                
         
           
                <div id="loginform" class="col-md-6">
					<form method="post" action="doLogin.php">
						<div class="form-group inner-addon left-addon">
							<input type="text" class="form-control" name="username" placeholder="Username" required="required">
							<i class="glyphicon glyphicon-user"></i>
						</div>
						 <div class="form-group inner-addon left-addon">
							 <input type="password" class="form-control" name="password" placeholder="Password" required="required" >
							 <i class="glyphicon glyphicon-lock"></i>
						</div>
						<div class="form-group">
				  
							<button type="submit" class="btn btn-primary form-control" name="doLogin">Sign In</button>
						</div>
					</form>
                </div>
            
            </div>
</body>
</html>