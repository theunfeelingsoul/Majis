<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 
include 'database.php';
include 'functions/query.func.php';
// get the form data
$data = false;
if (isset($_POST['report_submit'])) {
	$frm_date 		= strtotime($_POST['frm_date']);
	$to_date 		= strtotime($_POST['to_date']);
	$faci_status 	= $_POST['faci_status'];

	$sql = "SELECT * FROM faci_status WHERE date_of_update BETWEEN '$frm_date' AND '$to_date' AND faci_con='$faci_status' GROUP BY faci_num";

	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	// echo "<pre>";
	// print_r($result);
	// echo "</pre>";
	while ($row = mysqli_fetch_assoc($result)) {  

		$data[]= array(
			'faci_num'     => getWhere('faci','faci_num',$row['faci_num']),
		);

	}

	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";
	// echo $timestamp = strtotime($_POST['frm_date']);
	// exit();
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
				<div class="page-header">
					<!-- <div class="page-header"> -->
						<h2 class="page-title">Comments on Facilities report</h2>
					<!-- </div> -->

					<form class="form-inline" action="" method="post">
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputEmail3">From</label>
					    <input type="text"  name="frm_date" class="datepicker form-control" id="" placeholder="From">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="">To</label>
					    <input type="text" name="to_date" class="datepicker form-control" id="" placeholder="To">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="">Status</label>
					    <select class="form-control" name="faci_status">
						  <option>Choose status</option>
						  <option value="1">Working</option>
						  <option value="0">Not working</option>
						</select>
					  </div>
					  <button type="submit" name="report_submit" class="btn btn-default">Create report</button>
					</form>
				</div>
				

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
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<?php if($data):?>
		                        		<?php foreach ($data as $key => $v):?>
			                        		<?php foreach ($v as $key => $value):?>
				                        		<tr>
				                        			<td><?php echo $value[0]['region'] ?></td>
				                        			<td><?php echo $value[0]['lga'] ?></td>
				                        			<td><?php echo $value[0]['ward'] ?></td>
				                        			<td><?php echo $value[0]['faci_num'] ?></td>
				                        			<td><?php echo $value[0]['faci_name'] ?></td>
				                        		</tr>
				                        	<?php endforeach; ?>
		                        	<?php endforeach; ?>
		                        	<?php endif; ?>
		                        </tbody>
		                    </table>
						</div>
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