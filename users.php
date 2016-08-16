<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 

// create my connection
include 'database.php';
include 'functions/query.func.php';

// make admin
$upgraded = false;
$degraded = false;

if (isset($_GET['upgrade'])) {
	
	$id=$_GET['upgrade'];
	$sql="UPDATE user SET role='admin' WHERE id=$id";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$upgraded = true;

	$up=getSingle('user','username','id',$_GET['upgrade']);

}
// if (isset($_GET['degrade'])) {
	
// 	$id=$_GET['id'];
// 	$sql="UPDATE users SET role='normal' WHERE id=$id";
// 	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
// 	$degraded = true;
// }

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
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10 content">
				<h1 class="page-title">Users</h1>

				<div class="row">
					<div class="col-md-12">
						<?php if (isset($_GET['d'])): ?>
							<p class="bg-info">
								
							</p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success </strong> : User deleted
							</div>
						<?php endif; ?>

						<?php if ($upgraded): ?>
							<p class="bg-info">
								
							</p>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success </strong>: <?= $up; ?> is now an administrator. 
							</div>
						<?php endif; ?>

						<div class="white-data-table">
							<div class="table-responsive">
								<table class="hover row-border compact" id="sms-table">
				                    <thead>
			                            <tr>
			                                <th>ID</th>
			                                <th>Username</th>
			                                <th>Role</th>
			                                <?php echo $_SESSION['role'] == 'user' ? '<th class="hidden">':'<th>' ?>
			                                Make Admin</th>
			                                <?php echo $_SESSION['role'] == 'user' ? '<th class="hidden">':'<th>' ?>
			                                Delete</th>
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
				                               
				                                <td> <?php echo $user['role'] ?> </td>
				                             
												<?php echo $_SESSION['role'] == 'user' ? '<td class="hidden">':'<td>' ?>

													<?php if ($user['role'] == 'user'): ?>
				                                		<a class="btn btn-default btn-xs" href="?upgrade=<?= $user['id'] ?>" role="button">Make admin
				                                		</a>
				                                	<?php endif ?>
													
												</td>
												<?php echo $_SESSION['role'] == 'user' ? '<td class="hidden">':'<td>' ?>

													<a onclick='deleteItem(<?php echo $user['id'] ?>);return false;'  href="delete_sentsms.php?userid=<?=$user['id'] ?>">
													<span class="glyphicon glyphicon-remove-circle"></span>
													</a>
												</td>
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
				</div>

			</div>
		<!--.row -->
		</div> 
		 <?php include "includes/_footer.php"; ?>
	</div>
   
      
 




<!-- delete user -->
<script type="text/javascript">
	function deleteItem($v) {
		 var x = confirm("Are you sure you want to delete?");
	  if (x)
	  window.location.href = "delete_sentsms.php?userid="+v;
	  else
	    return false;
}
</script>




	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>