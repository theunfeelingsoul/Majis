<?php 

// check if logged in
session_start();
include "includes/_permissions.php"; 

// create my connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "majis";
// made connection
$conn = mysqli_connect($servername,$username,$password,$dbname);
// check connection
if (!$conn) {
	die(mysql_connection_error());
}

// create sql statement
$sql = "SELECT * FROM faci ORDER BY id DESC";
// queried the database
$result = mysqli_query($conn,$sql) or die (mysqli_error());

// if there is any data 

$num_rows = mysqli_num_rows($result);

// if there is any record
// then fetch data
if ($num_rows > 0) {

	while ($row = mysqli_fetch_assoc($result)) {

		$data[] = array(
						'id' 				=> $row['id'], 
						'region' 			=> $row['region'], 
						'lga' 				=> $row['lga'], 
						'ward' 				=> $row['ward'], 
						'faci_num' 			=> $row['faci_num'], 
						'faci_name'			=> $row['faci_name'], 
						'faci_type'			=> $row['faci_type'], 
						'com_name' 			=> $row['com_name'], 
						'com_contrib' 		=> $row['com_contrib'],
						'source' 			=> $row['source'],
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
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10 main-content">
				<h2 class="page-title">Facilities 
					<?php echo $_SESSION['role'] == 'user' ? '<span class="hidden">':'<span>'; ?>
					<a href="addfacility.php"><span class="label label-default">Add new</span></a>
					</span>
				</h2>

				<div class="row">
					<div class="col-md-12">
						<div class="white-data-table">
							<table class="hover row-border compact" id="faci-table">
			                    <thead>
		                            <tr>
			                            <th>Region</th>
										<th>LGA</th>
										<th>Ward</th>
										<th>Facilities Number</th>
										<th>Facilities Name</th>
										<th>Facilities Type</th>
										<th>Community Name</th>
										<th>Community contribution</th>
										<th>Source</th>
										<?php echo $_SESSION['role'] == 'user' ? '<th class="hidden">':'<th>' ?>
										Edit</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <?php 
		                            	if ($data) {
		                            	
			                        		foreach ($data as $key => $value) {  ?>
				                            <tr>
				                                <td><?php echo $value['region'] ?></td>
				                                <td><?php echo $value['lga'] ?></td>
				                                <td><?php echo $value['ward'] ?></td>
				                                <td><?php echo $value['faci_num'] ?></td>
				                                <td><?php echo $value['faci_name'] ?></td>
				                                <td><?php echo $value['faci_type'] ?></td>
				                                <td><?php echo $value['com_name'] ?></td>
												<td><?php echo $value['com_contrib'] ?></td>
												<td><?php echo $value['source'] ?></td>
												<?php echo $_SESSION['role'] == 'user' ? '<td class="hidden">':'<td>'; ?>
												<a href="editfacility.php?id=<?php echo $value['id'] ?>">Edit</a></td>
				                             
				                            </tr>

			                            <?php 

			                           	 	} // end foreach

			                           	} // end if
		                             ?>
		                        </tbody>
		                    </table>
						</div><!--/.white-data-table-->
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