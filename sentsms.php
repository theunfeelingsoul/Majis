<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 

// create my connection
include 'database.php';


// create sql statement
$sql = "SELECT * FROM sentsms ORDER BY id DESC";
// queried the database
$result = mysqli_query($conn,$sql) or die (mysqli_error());
$data = false;
while ($row = mysqli_fetch_assoc($result)) {

	$data[] = array(
					'to_who' 	=> $row['to_who'], 
					'from_who' 		=> $row['from_who'], 
					'message' 		=> $row['message'], 
					'date_sent' 		=> $row['date_sent'], 
					'id' 		=> $row['id'], 
				
				);

}


 ?>


<!DOCTYPE html>
<html>
<head>

	<title>Sent SMS</title>
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
				<!-- <div class="row"> -->
				<div class=" page-title">
				<h2 class="page-tite">Sent SMS</h2>
				</div>
				<!-- </div> -->
				<div class="row">
					<div class="col-md-2">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">SMS menu</div>
							
							<!-- List group -->
							<?php include "includes/_smsmenu.php" ?>
						</div>

					</div><!--/.col-md-12-->

					<div class="col-md-10">
						<?php if (isset($_GET['r'])): ?>
							<p class="bg-info">
								
							</p>
							<div class="alert alert-info alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Broadcast has been sent!</strong> 
							  <?php echo $_GET['r']; ?>
							</div>
						<?php endif; ?>

						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">Sent messages</div>
							<div class="table-responsive">
								<div class="white-data-table">
									<table  class="hover row-border compact" id="sms-table">
										<thead>
											<tr>
											    <th>No</th>
											    <th>Recipent</th>
											    <th>Message</th>
											    <th>Date</th>
											    <?php echo $_SESSION['role'] == 'user' ? '<th class="hidden">':'<th>' ?>Delete</th>
											</tr>
										</thead>
										<tbody>
										<?php 
					                        		$i = 1;
					                        		if ($data):
						                        		foreach ($data as $key => $value):
					                        	 ?>
											<tr>
												<td><?php echo $i ?></td>
												<td><?php echo $value['to_who'];?></td>
												<td><?php echo $value['message'];?></td>
												<td><?php echo $value['date_sent']? date("M j",$value['date_sent']):'';?></td>
												<?php echo $_SESSION['role'] == 'user' ? '<td class="hidden">':'<td>' ?>

													<a onclick='deleteItem(<?php echo $value['id'] ?>);return false;'  href="delete_sentsms.php?id=<?=$value['id'] ?>">
													<span class="glyphicon glyphicon-remove-circle"></span>
													</a>
												</td>
											</tr>
											 <?php   $i++;
														endforeach;
						                           	endif;
					                             ?>
										</tbody>
										
									</table>
								</div> <!-- /. table-responsive-->
							</div> <!-- /. white-data-table-->
						</div>
						
					</div><!--/.col-md-12-->
				</div><!--/.row-->

			</div>
		<!--.row -->
		</div> 
		 <?php include "includes/_footer.php"; ?>
	</div>
   
      
 
<script type="text/javascript">
	function deleteItem($v) {
		 var x = confirm("Are you sure you want to delete?");
	  if (x)
	  window.location.href = "delete_sentsms.php?id="+v;
	  else
	    return false;

    
}
</script>

































	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>