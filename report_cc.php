<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 

include 'database.php';
include 'functions/query.func.php';
// get all community contrinutions form cc table


// filter by the cc
if (isset($_POST['getcc'])) {
	$cc = $_POST['ccopt'];
	$report = getWhere('faci','com_contrib',$cc);
}

$cc = getAll('cc');

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
				<div class="page-header">
					<div class="page-header">
						<h3 class="">Community Contribution report</h3>
						<h5 class="">Create report</h5>
					</div>

					<form class="form-inline" action="" method="post">
					  <div class="form-group">
					    <label class="sr-only" for="">Community Contribution</label>
					    <select class="form-control" name="ccopt">
						  <option>Choose Contribution</option>
						  <?php foreach($cc as $c): ?>
						  <option><?php echo $c['cc']; ?></option>
						<?php endforeach; ?>
						</select>
					  </div>
					  <button type="submit" name="getcc" class="btn btn-default">Create report</button>
					</form>
				</div>
				

				<div class="row">
					<div class="col-md-12">
						<table class="hover row-border compact" id="faci-table">
		                    <thead>
	                            <tr>
		                            <th>Region</th>
									<th>LGA</th>
									<th>Ward</th>
									<th>Facilities Number</th>
									<th>Facilities Name</th>
									<th>Community name</th>
									<th>Community Contribution</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php if(isset($report)): ?>
		                    		<?php foreach($report as $r): ?>
			                            <tr>
				                            <td><?php echo $r['region'] ?></td>
				                            <td><?php echo $r['lga'] ?></td>
				                            <td><?php echo $r['ward'] ?></td>
				                            <td><?php echo $r['faci_num'] ?></td>
				                            <td><?php echo $r['faci_name'] ?></td>
				                            <td><?php echo $r['com_name'] ?></td>
				                            <td><?php echo $r['com_contrib'] ?></td>
			                            </tr>
			                        <?php endforeach; ?>
		                        <?php endif; ?>
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