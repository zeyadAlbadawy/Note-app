<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Sign up Form Horizontal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="signup-form">
	<?php
	   if(isset($_POST["submit"])) {

		 $fullName = $_POST['username'];
		 $email = $_POST['email'];
		 $password = $_POST['password'];
		 $passwordRepeat = $_POST['confirm_password'];
		//  $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
		 $errors = array();

		 if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
			array_push($errors, "All Fields Are Required");
		 }

		 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors, "Invalid Email Address");
		 }

		 if(strlen($password) < 8) {
			array_push($errors, "Password Must Be Greater Than 8 char");
		 }

		 if($password !== $passwordRepeat) {
			array_push($errors, "Passwords Doesn't Match !");
		 }

		 // To check if the emial already exists in database or not 
		 require_once "database.php";
		 $sql = "SELECT * FROM users WHERE email = '$email'";
		 $res = mysqli_query($connection, $sql);
		 if(mysqli_num_rows($res) > 0) {
			array_push($errors, "Email Already Exists");
		 }

		 if(count($errors) > 0) {
			foreach($errors as $error) {
				echo "<div class='alert alert-danger'> $error </div>"; 
			  }
			} else {
				$mySql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?) ";
				$stmt = mysqli_stmt_init($connection);
				$prep = mysqli_stmt_prepare($stmt, $mySql);
				if($prep) {
					mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $password);
					mysqli_stmt_execute($stmt);
					echo "<div class='alert alert-success'>Registeration Completed Successfully</div>";
				} else {
					die("SomeThing Went Wrong");
				}
			}
		}
	   
	?>
    <form action="register.php" method="post" class="form-horizontal">
      	<div class="row">
        	<div class="col-8 offset-4">
				<h2>Sign Up</h2>
			</div>	
      	</div>			
        <div class="form-group row">
			<label class="col-form-label col-4">Username</label>
			<div class="col-8">
                <input type="text" class="form-control" name="username" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Email Address</label>
			<div class="col-8">
                <input type="email" class="form-control" name="email" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Password</label>
			<div class="col-8">
                <input type="password" class="form-control" name="password" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<label class="col-form-label col-4">Confirm Password</label>
			<div class="col-8">
                <input type="password" class="form-control" name="confirm_password" required="required">
            </div>        	
        </div>
		<div class="form-group row">
			<div class="col-8 offset-4">
				<p><label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
				<button type="submit" class="btn btn-primary btn-lg" name="submit">Sign Up</button>
			</div>  
		</div>		      
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
</div>
</body>
</html>


