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
					$error = "Username or password is incorrect";
				}

			}else{
				$status = "fail";
		        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}
	 ?>
</head>
<body class="ll">
<div id="login-back">
<div id="bi">
	<img src="styles/img/l.png" id="lb" class="img-responsive" alt="Responsive image">
</div>
	<div class="container">

		<div class="col-md-5 col-md-offset-6 login">
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
			    <input type="text" name="username" class="form-control input-lg" id="" placeholder="username"
			    	value="<?php if(isset($_POST['username'])){echo $_POST['username'];}else{echo "administrator";} ?>" >
			  </div>
			  <div class="form-group">
			    <label for="">Password</label>
			    <input type="password" name="pass" value="123" class="form-control input-lg" id="" placeholder="Password">
			  </div>
			  
			  
			  <button type="submit" name="login" class="btn btn-default input-lg">Login</button>
			</form>
			<br/>
			<p>
				Dont have an account? <a href="register.php">Register</a>
			</p>
		</div>
		</div>
	</div>

</body>
</html>