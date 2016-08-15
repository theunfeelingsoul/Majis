<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 
include 'database.php';
include 'functions/query.func.php';

// get the form data
$data = false;
$frm_date ="";
$to_date="";
$faci_status="";
if (isset($_POST['report_submit'])) {

	// change the string date to unixtime
	$frm_date 		= strtotime($_POST['frm_date']);
	$to_date 		= strtotime($_POST['to_date']);
	$faci_status 	= $_POST['faci_status'];

	$sql = "SELECT * FROM faci_status WHERE date_of_update BETWEEN '$frm_date' AND '$to_date' AND faci_con='$faci_status' GROUP BY faci_num";

	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	while ($row = mysqli_fetch_assoc($result)) {  

		$data[]= array(
			'region'		=> getSingle('faci','region','faci_num',$row['faci_num']),
			'lga'			=> getSingle('faci','lga','faci_num',$row['faci_num']),
			'ward'			=> getSingle('faci','ward','faci_num',$row['faci_num']),
			'faci_num'		=> getSingle('faci','faci_num','faci_num',$row['faci_num']),
			'faci_name'		=> getSingle('faci','faci_name','faci_num',$row['faci_num']),
			'date_of_update'=> $row['date_of_update'],
			'faci_con'=> $row['faci_con'],
		);

	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Status Report</title>
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
				<div class="page-header">
					<!-- <div class="page-header"> -->
						<div class="page-title">Status of Facilities report</div>
						<p>Shows a list of facilities by status</p>
						<hr/>
						<!-- <div class="alert alert-info" role="alert">...</div> -->
					<!-- </div> -->

					<form class="form-inline" action="" method="post" id="form_report_sf">
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputEmail3">From</label>
					    <input type="text"  name="frm_date" class="datepicker form-control" id="" placeholder="From" value="<?php echo $frm_date ==''?'':date('m/d/Y',$frm_date) ?>" required>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="">To</label>
					    <input type="text" name="to_date" class="datepicker form-control" id="" placeholder="To" value="<?php echo $to_date ==''?'':date('m/d/Y',$to_date) ?>" required>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="">Status</label>
					    <select class="form-control" name="faci_status" required>
						  <option value="" >Choose status</option>
						  <option value="1" <?php echo $faci_status =='1'?'selected':'' ?>>Working</option>
						  <option value="0" <?php echo $faci_status =='0'?'selected':'' ?>>Not working</option>
						</select>
					  </div>
					  <button type="submit" name="report_submit" class="btn btn-default">Create report</button>
					   <div class="form-group pdf_report_sf_link">
					    <label class="sr-only" for="">Status</label>
					    <a <?= $frm_date == ""?'disabled="disabled" onclick="return false"':''; ?> class="btn btn-primary" href="pdf_status_report.php?<?php echo "frm_date=$frm_date&to_date=$to_date& faci_status=$faci_status" ?>" target="_blank">Export PDF</a>
					  </div>
					</form>
				</div>
				

				<div class="row">
					<div class="col-md-12">
						<div class="white-data-table">
							<div class="table-responsive">
								<table class="hover row-border compact" id="faci-table">
				                    <thead>
			                            <tr>
				                            <th>Status</th>
				                            <th>Region</th>
											<th>LGA</th>
											<th>Ward</th>
											<th>Facilities Number</th>
											<th>Facilities Name</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	<?php if($data):?>
			                        		<?php foreach ($data as $key => $value):?>
					                        		<tr>
					                        			<td><?php echo $value['faci_con'] == 1? 'Working':'Not working'?></td>
					                        			<td><?php echo $value['region'] ?></td>
					                        			<td><?php echo $value['lga'] ?></td>
					                        			<td><?php echo $value['ward'] ?></td>
					                        			<td><?php echo $value['faci_num'] ?></td>
					                        			<td><?php echo $value['faci_name'] ?></td>
					                        		</tr>
			                        	<?php endforeach; ?>
			                        	<?php endif; ?>
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
   
      
 


































	<!-- javascript links -->
<?php include "includes/_jslinks.php"; ?>

</body>
</html>