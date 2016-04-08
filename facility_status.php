
<?php 

// create my connection
include 'database.php';

// create sql statement
$sql = "SELECT * FROM facility_status";
// query database
$result = mysqli_query($conn,$sql) or die (mysqli_error());

// check if there is any data 

$num_rows = mysqli_num_rows($result);

// if there is any record
// then fetch data
if ($num_rows > 0) {

	while ($row = mysqli_fetch_assoc($result)) {

		$data[] = array(
				'id' 		=> $row['id'], 
				'facil_id' 	=> $row['facil_id'], 
				'status' 	=> $row['status'], 
				'comment' 	=> $row['comment'], 
				'date' 		=> $row['date']
		);

	}
}else{
	$data = false;
}




// echo "<pre>";
// print_r($data);
// echo "</pre>";

// exit();


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>majis</title>
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
				<h3 class="page-header">Facilities <a href="addfacility.php"><span class="label label-default">Add new</span></a></h3>

				<div class="row">
					<div class="col-md-12">
						<table class="hover row-border compact" id="facilities-table">
		                    <thead>
	                            <tr>
		                            <th>Facility ID</th>
									<th>Status</th>
									<th>Comment</th>
									<th>Date</th>
									<th>Update</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php 
	                            	if ($data) {
	                            	
		                        		foreach ($data as $key => $value) {  ?>
			                            <tr>
			                                <td><?php echo $value['facil_id'] ?></td>
			                                <td><?php echo $value['status'] ?></td>
			                                <td><?php echo $value['comment'] ?></td>
			                                <td><?php echo $value['date'] ?></td>
											<td><a href="edit_facility_status.php?id=<?php echo $value['id'] ?>">View all updates</a></td>
			                             
			                            </tr>

		                            <?php 

		                           	 	} // end foreach

		                           	} // end if
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