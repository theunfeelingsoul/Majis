<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 
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
						<h3 class="">Status of Facilities report</h3>
						<h5 class="">Create report</h5>
					</div>

					<form class="form-inline">
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputEmail3">From</label>
					    <input type="text"  class="datepicker form-control" id="" placeholder="From">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputPassword3">To</label>
					    <input type="text" class="datepicker form-control" id="exampleInputPassword3" placeholder="To">
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="">Status</label>
					    <select class="form-control">
						  <option>Choose status</option>
						  <option>Working</option>
						  <option>Not working</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
					  </div>
					  <button type="submit" class="btn btn-default">Create report</button>
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
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	
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