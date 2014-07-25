<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <link rel="stylesheet" href="navigationbar_login.css" type="text/css" media="print, projection, screen" />
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>login</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

 <script src="js/jquery-1.11.1.min.js"></script> 
</head>

<body >
<div class="row">
	<div class="center-block" style="width:350px;" >
		<div class="panel panel-default">
  			<div class="panel-heading">
  				<h3 class="panel-title">
  					Sign in 
  					<a data-toggle="modal" data-target="#myModal" style="float: right; color: #86b91e; cursor:pointer;">
						or Sign Up
					</a>
  				</h3>
  				
  				<button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-play"></span> 
</button>
    			
			</div>
			<div class="panel-body">
	    			<form style="margin: auto" method="post" name="login_credentials" action="login_check.php">
			
			<div class="input-group input-group-lg">

            	<span class="input-group-addon">

             		 <span class="glyphicon glyphicon-envelope"></span>

           		</span>
			
				<input name="username" class="form-control" required="required" placeholder="Email"><br>
			</div>
			
			<br/>
			
			<div class="input-group input-group-lg">

            	<span class="input-group-addon">

              		<span class="glyphicon glyphicon-lock"></span>

            	</span>
				<input name="password" type="password" class="form-control" required="required" placeholder="Password">
				<br>
			</div> 
			<br/>
			
			<input type="checkbox" name="remember" value="remember">Remember me
			<input id="signup_button" name="login" value="Log in" type="submit" style="float: right;"><br>
			<br>
			<!--<a href="register.php">New user registration</a>-->
			
		</form>
		<a href="recover_passwd.php" style="color: #86b91e">Forgot your password?</a>

	  		</div>
		</div>
	</div>	
</div>
	
	<div class="row">
	<br/>
	<br/>
	<div class="center-block" style="width:300px;" >
		
		
		<!-- Button trigger modal -->
		
		

	</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">New User Registration</h4>
      </div>
      
      <div class="modal-body">
        
        <form name="login_credentials" style="margin: auto" method="post" action="#" onsubmit="return checkForm();">
			
						
			<input name="email" required="required" placeholder="Email"><br>
			<br>
			
			<input id="password_1" name="password_1" type="password" required="required" placeholder="Password"><br>
			<br>
			<input id="password_2" name="password_2" type="password" required="required" placeholder="Conf Password"><br>
			<br>
			<input id="signup_button"  name="signup" value="Sign Up" type="submit"  ><br>
			<br>
		</form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <button id="newuser" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


	<script type="text/javascript">
		function checkForm() {
			if (document.getElementById('password_1').value == document.getElementById('password_2').value) {
				return true;
			}
			else {
				alert("Passwords don't match");
				return false;
			}
		}
	</script>

	<script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<?

if(isset($_GET['status'])){
//status=2
	if($_GET['status'] == 2){
echo "<script>

    alert('Please, put Valid Username and Password');

</script>";
}

	if($_GET['status'] == 0){
echo "<script>

    alert('User registered successfully');

</script>";
}
}
?>
</body>
</html>
