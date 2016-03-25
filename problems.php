<?php 

// create my connection
include 'database.php';

// create sql statement
$sql = "SELECT * FROM faci_problems ORDER BY id DESC";
// queried the database
$result = mysqli_query($conn,$sql) or die (mysqli_error());
$data = false;
while ($row = mysqli_fetch_assoc($result)) {

	$data[] = array(
					'faci_name' 	=> $row['faci_name'], 
					'faci_num' 		=> $row['faci_num'], 
					'com_name' 		=> $row['com_name'], 
					'problems' 		=> $row['problems'], 
					'status' 		=> $row['status'], 
					'id' 			=> $row['id'], 
				);

}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>majis</title>
	<!-- links css-->
	<?php include "includes/_csslinks.php"; ?>

</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WMOS</a>
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>

	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10">
				<h1 class="page-header">Incoming Problems</h1>

				<div class="row">
					<div class="col-md-12">
						<table class="hover row-border compact" id="sms-table">
		                    <thead>
	                            <tr>
	                                <th>ID</th>
	                                <th>Facility Name</th>
	                                <th>Facility Number</th>
	                                <th>Problem(s)</th>
	                                <th>COWSO/WUA Name</th>
	                                <th>Status</th>
	                                <th>Update Status</th>
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
		                                <td><?php echo $value['faci_name'] ?></td>
		                                <td><?php echo $value['faci_num'] ?></td>
		                                <td><?php echo $value['problems'] ?></td>
		                                <td><?php echo $value['com_name'] ?></td>
		                                <td><?php echo $value['status'] == 0 ? 'Not working':'Working'; ?></td>
		                                <td><a href="edit_facility_status.php?id=<?php echo $value['facility_number'] ?>&prob_id= <?php echo $value['id'] ?>"> Update Status</a></td>
		                            </tr>

	                            <?php   $i++;
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
	</div>
   
      
 


































	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>