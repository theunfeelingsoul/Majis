<!DOCTYPE html>
<html>
<head>

	<?php 
		session_start();
		include "includes/_permissions.php"; 
		include "database.php"; 
		include "functions/query.func.php"; 

		$f_no_wor=countWhere('faci_problems','status',0);
		$f_yes_wor=countWhere('faci_problems','status',1);
		$prob_rptd=countAll('faci_problems');

		$sql = "SELECT * FROM faci_problems WHERE status = 0 AND prob_date <= (now() - interval 3 month)";

		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$data =FALSE;
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
	
	<title>majis</title>

	<!-- links css-->
	<?php include "includes/_csslinks.php"; ?>

</head>
<body>
	<input type="hidden" value="<?= $prob_rptd; ?>" id="prob_rptd" name="">
	<?php include 'includes/_header.php'; ?>

	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10">
				<h2 class="page-title"> Dash Board</h2>

			
                <div class="col-md-6">
                    <div class="row dash-row">
                    <!-- <div class="col-md-6"> -->
                        <div id="c"></div>
                    </div>
                    <div class="row dash-row">
                	  <div class="col-md-6d">
	                        <div id="dashboard-box">
	                        	<h3>Overdue problems</h3>
	                        	<table class="table">
				                    <thead>
			                            <tr>
			                                <th>Facility Name</th>
			                                <th>Problem(s)</th>
			                                <th>Status</th>
			                                <th>Status</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	<?php 
			                        		$i = 1;
			                        		if ($data):
				                        		foreach ($data as $key => $value):
			                        	 ?>
				                            <tr>
				                                <!-- <td><?php // echo $i ?></td> -->
				                                <td><?php echo $value['faci_name'] == ''? '<span class="label label-info">N/A</span>': $value['faci_name'] ?></td>
				                                <td><?php echo $value['problems'] ?></td>
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
	                        </div>
	                    </div>
                    </div>
                </div>
                <!-- <div class="row dash-row"> -->
                <div class="col-md-6">
	                <div class="row dash-row">
	                    <div id="dashboard-box">
			            	<div id="pp"></div>
			            	<thead>
			            			<th colspan="2"><h3>SUMMARY </h3></th>
			            		</thead>
			            	<table class="table">
			            		
			            		<tbody>
			            			<tr>
			            				<td>Number of problems reported</td>
			            				<td><b><?= $prob_rptd; ?></b></td>
			            			</tr>
			            			<tr>
			            				<td>Number of Not working facilities</td>
			            				<td><b><?= $f_yes_wor; ?></b></td>
			            			</tr>
			            			<tr>
			            				<td>Number of working facilities</td>
			            				<td><b><?= $f_no_wor; ?></b></td>
			            			</tr>
			            		</tbody>
			            	</table>
			            </div>
	                </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        <?php include "includes/_footer.php"; ?>
    </div> <!--/.container-fluid-->






















	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>