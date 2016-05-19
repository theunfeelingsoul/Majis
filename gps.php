<!DOCTYPE html>
<?php 
		session_start();
		include "includes/_permissions.php"; 
	?>
<?php
	include 'database.php';

	$sql = "SELECT * FROM regions";

	$result = mysqli_query($conn,$sql) or die(mysqli_error());

	while ($row = mysqli_fetch_assoc($result)) {
		$regions[] = array(
			'region' => $row['region']
			);

	}

  ?>

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
				<h2 class="page-title"> Facility Location</h2>

				<div class="row">
					<div class="col-md-8">
						<form action="" method="get" id="admin_divsion">
							<div class="col-sm-3">
							<select id="region" name="name" class="form-control">
								<option>Choose region</option>
								<?php 
									foreach ($regions as  $region) {
										?>
											<option><?php echo $region['region'] ?></option>
										<?php
									}
								 ?>
								
							</select>
							</div>
							<div class="col-sm-3">
							<select id="lga" name="city" disabled="true" class="form-control">
								<option>select LGA</option>
							</select>
							</div>

							<div class="col-sm-3">
							<select id="ward" name="food" disabled="true" class="form-control">
								<option>select Ward</option>
								
							</select>
							</div>
							<div class="col-sm-2">
								<input class="form-control btn btn-primary" type="submit" name="submit" value="Search" />
							</div>
						</form>
					</div> <!-- close .col-md-12 -->
				</div> <!-- close .row -->
				<div class="row">
					<div class="col-md-12">
						<div id="map" class=""></div>
					</div>
				</div> <!-- close .row -->
			</div> <!-- close .col-md-10 -->
		</div> <!--.row -->
		 <?php include "includes/_footer.php"; ?>
	</div>
   
      
 


	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<script src="styles/js/waterpoints.js"></script>



</body>
</html>