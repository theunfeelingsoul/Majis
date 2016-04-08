<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 

// create my connection
include 'database.php';
include 'functions/query.func.php';

$u = getAll('user');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<!-- links css-->
	<?php include "includes/_csslinks.php"; ?>

</head>
<body>
	<?php include 'includes/_header.php'; ?>

	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10">
				<h1 class="page-header">Users</h1>

				<div class="row">
					<div class="col-md-12">
						<table class="hover row-border compact" id="sms-table">
		                    <thead>
	                            <tr>
	                                <th>ID</th>
	                                <th>Username</th>
	                                <th>Password</th>
	                                <th>Role</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php 
	                        		$i = 1;
	                        		if ($u):
		                        		foreach ($u as $key => $user):
	                        	 ?>
		                            <tr>
		                                <td><?php echo $i++ ?></td>
		                                <td><?php echo $user['username'] ?></td>
		                                <td><?php echo $user['password'] ?></td>
		                                <td><?php echo $user['role'] ?></td>
		                            </tr>

	                            <?php   
										endforeach;
		                           	endif;
	                             ?>
	                        </tbody>
	                    </table>
					</div>
				</div>

			</div>
		<!--.row -->
		</div> 
		 <?php include "includes/_footer.php"; ?>
	</div>
   
      
 


































	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>