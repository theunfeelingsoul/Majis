<?php 
// check if logged in
session_start();
include "includes/_permissions.php"; 

// create my connection
include 'database.php';


 ?>


<!DOCTYPE html>
<html>
<head>

	<title>Broadcast SMS</title>
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
				<h2 class="page-tite">Broadcast SMS</h2>
				</div>
				<!-- </div> -->
				<div class="row">
					<div class="col-md-2">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">SMS menu</div>
							

							<!-- List group -->
								<?php include "includes/_smsmenu.php" ?>
						</div>

					</div><!--/.col-md-12-->

					<div class="col-md-10">
						<div class="panel panel-default">
							<div class="panel-heading">
								<!-- <h3 class="panel-title">Compose SMS</h3> -->
								Compose SMS
							</div>
							<div class="panel-body">
								<form class="form-horizontal" action="sendsms.php" method="post">
									<div class="form-group">
										<label for="r" class="col-sm-1 control-label">To:</label>
										<div class="col-sm-11">
											<input type="text" name="r" class="form-control" id="r" placeholder="Add recipients seperated by a comma">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<textarea name="m" class="form-control" rows="3" placeholder="Message"></textarea>
										</div>
									</div>
									
									<div class="form-group">

										<div class="col-md-12">
											<button type="button" value="dd" name="b" class="btn btn-default  form-control">Send</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						
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