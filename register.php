<!DOCTYPE html>
<html>
<head>
	<title>Register Account</title>
	<!-- links css-->

	<?php 
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
		$status = false;
		if (isset($_POST['register'])) {
			$username 	=	$_POST['username'];
			$pass 		=	$_POST['pass'];
			$role 		=	'user';

			// check if user exists
			$check_user_sql="SELECT * FROM user WHERE username='$username'";

			// query database
			$result = mysqli_query($conn,$check_user_sql);
				
			// count rows
			$row_cnt = mysqli_num_rows($result);

			if ($row_cnt == 0) {
				// if username does not exists
				// create insert statement
				$sql="INSERT INTO user (username,password,role) 
					VALUES('$username','$pass','$role')";

				// query the database
				if ($result = mysqli_query($conn,$sql)) {
					
					session_start();

					$_SESSION['username'] = $username ;
					$_SESSION['role']   = $role;

					header("Location:index.php");

				}else{
					// could not insert into database
					$status = "fail";
			        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}else{
				// username exists
				$status = "exists";
				$exists_msg = "Username Exists";
			}

		} // end if
	 ?>
</head>
<body>
<div class="container register-page">
	<div class="col-md-4 col-md-offset-4 login">
		<h4>REGISTER  </h4>
		<form class="" action="" method="post">
			<?php 
				if (isset($error)) {
					echo $error;
				}

				if ($status=='exists') {
					fail($exists_msg);
				}
			?>
		  <div class="form-group">
		    <label for="">Username</label>
		    <input type="text" name="username" class="form-control" id="" placeholder="username" 
		    	value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" required/>
		  </div>
		  <div class="form-group">
		    <label for="">Password</label>
		    <input type="password" name="pass" class="form-control" id="" placeholder="Password" pattern=".{3,}"  title="3 characters minimum" required>
		  </div>
		  <!-- <div class="form-group">
		    <label for="">Role</label>
		    <select class="form-control" name="role">
			  <option value="user">Choose Role</option>
			  <option value="admin">Administrator</option>
			  <option value="engineer">Engineer</option>
			  <option value="user">User</option>
			</select>

		  </div> -->
		  
		  
		  <button type="submit" name="register" class="form-control btn btn-primary">Register</button>
		</form>
	</div>
	</div>

</body>
</html>