<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<!-- links css-->

	<?php 
		// include "includes/_sessions.php";
		session_start();
		if (isset($_SESSION['username'])) {
			header("Location:index.php");
			exit();
		}

		include 'database.php';
		include 'functions/error_msg.func.php';
		include "includes/_csslinks.php"; ?>

	<style type="">
	.center-block{
		float: none;
	}

	.login{
		padding-top: 200px;
	}
	</style>


	<?php 
		// instatiate the variable
		$status = FALSE;

		if (isset($_POST['login'])) {
			$username 	=	$_POST['username'];
			$pass 		=	$_POST['pass'];

			// check if username and password exist
			$sql="SELECT * FROM user WHERE username='$username' AND password='$pass' LIMIT 1";

			// query table
			if ($result = mysqli_query($conn,$sql)) {
				
				// countr rows
				$row_cnt = mysqli_num_rows($result);

				// if user exists log them in and redirect them to index page
				if ($row_cnt==1) {
					
					// get role form table
					while ($row = mysqli_fetch_assoc($result)) {
		    			$role=$row['role'];
					}

					$_SESSION['username'] 	= $username ;
					$_SESSION['role']   	= $role;

					header("Location:index.php");
					exit();
				}else{
					$status = "loginfail";
					$error = "Username or password does not exist";
				}

			}else{
				$status = "fail";
		        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}
	 ?>
</head>
<body>
<div class="container">
	<div class="col-md-4 col-md-offset-4 login">
		<h4>LOGIN</h4>
		<form class="" action="" method="post">
			<?php 
				if (isset($loginfail)) {
					echo $loginfail;
				}

				if ($status=='fail') {
					fail($error);
				}

				if ($status=='loginfail') {
					fail($error);
				}
			?>
		  <div class="form-group">
		    <label for="">Username</label>
		    <input type="text" name="username" class="form-control" id="" placeholder="username"
		    	value="<?php if(isset($_POST['username'])){echo $_POST['username'];}else{echo "administrator";} ?>" >
		  </div>
		  <div class="form-group">
		    <label for="">Password</label>
		    <input type="password" name="pass" value="123" class="form-control" id="" placeholder="Password">
		  </div>
		  
		  
		  <button type="submit" name="login" class="btn btn-default">Login</button>
		</form>
		<br/>
		<p>
			Dont have an account? <a href="register.php">Register</a>
		</p>
	</div>
	</div>

</body>
</html>