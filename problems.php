<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 

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
	<?php include 'includes/_header.php'; ?>

	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10">
				<!-- <div class="row"> -->
				<div class=" page-title">
				<h2 class="page-tite">Incoming Problems</h2>
				</div>
				<!-- </div> -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<div class="white-data-table">
								<table class="hover row-border compact" id="sms-table">
				                    <thead>
			                            <tr>
			                                <th>ID</th>
			                                <th>Facility Name</th>
			                                <th>Facility Number</th>
			                                <th>Problem(s)</th>
			                                <th>COWSO/WUA Name</th>
			                                <th>Status</th>

			                                <?php echo $_SESSION['role'] == 'user' ? '<th class="hidden">':'<th>' ?>
			                                Update Status</th>
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
				                                <td><?php echo $value['faci_name'] == ''? '<span class="label label-info">N/A</span>': $value['faci_name'] ?></td>
				                                <td><?php echo $value['faci_num'] == ''? '<span class="label label-info">N/A</span>': $value['faci_num'] ?></td>
				                                <td><?php echo $value['problems'] ?></td>
				                                <td><?php echo $value['com_name'] == ''? '<span class="label label-info">N/A</span>': $value['com_name'] ?></td>
				                                <td><?php echo $value['status'] == 0 ? ' <span class="label label-danger">Not working</span>':'<span class="label label-success">Working</span>'; ?></td>
				                                <?php echo $_SESSION['role'] == 'user' ? '<td class="hidden">':'<td>' ?>
				                                <a href="edit_facility_status.php?id=<?php echo $value['faci_num'] ?>&prob_id= <?php echo $value['id'] ?>"> Update Status</a></td>
				                            </tr>

			                            <?php   $i++;
												endforeach;
				                           	endif;
			                             ?>
			                        </tbody>
			                    </table>
							</div><!--/.white-data-table-->
						</div><!--/.table-responsive-->
					</div><!--/.col-md-12-->
				</div><!--/.row-->

			</div>
		<!--.row -->
		</div> 
		 <?php include "includes/_footer.php"; ?>
	</div>
   
      
 


































	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>