<?php include "includes/_sessions.php"; ?>
<?php
  include 'database.php';

  

  //add new facility
  if (isset($_POST['submitcc'])) {

     $cc         = $_POST['cc'];

    $sql="INSERT INTO cc (cc) 
    VALUES ('$cc')";
  
    if (mysqli_query($conn, $sql)) {

      $status = "success";

    } else {
        $status = "fail";
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

	$sql = "SELECT * FROM cc";

	$result = mysqli_query($conn,$sql) or die(mysqli_error());

	while ($row = mysqli_fetch_assoc($result)) {  
		$data[] = array(
		'cc' => $row['cc']
		);

	}

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>majis</title>

  	<!-- links css-->
 <?php include "includes/_csslinks.php"; ?>
  <!-- ... -->

  <body>
	<?php include 'includes/_header.php'; ?>
	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row">
			<?php include "includes/_sidebar.php"; ?>
			<div class="col-md-10">
				<h1 class="page-header">Add Community Comunity Contribution</h1>

				<?php 

	              if ( isset($status) && $status =="success" ) {
	                ?>

	                  <div class="alert alert-success" role="alert">
	                    Sucess.
	                  </div>

	                <?php
	              }

	              if ( isset($status) && $status =="fail" ) {
	                ?>

	                  <div class="alert alert-danger" role="alert">
	                    Error. Something went wrong. 
	                    PLease contact ur administrator. <br>
	                    <?php echo $error ?>
	                  </div>

	                <?php
	              }

	             ?>

		        <form class="form-inline" method="post" action="">
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail3">Community Contribution</label>
				    <input type="text" class="form-control" id="" name="cc" placeholder="Contribution">
				  </div>
				  <button type="submit" name="submitcc" class="btn btn-default">Add</button>
				</form>
		        <hr>
		        <div class="">
					<table class="hover row-border compact" id="faci-table">
			            <thead>
			                <tr>
			                    <th>id</th>
								<th>Community Contribution</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php 
			            		$i=1;
			            		if ($data):
			            			foreach ($data as $key => $value):
			            	?>
			            		<tr>
			            			<td><?php echo $i++; ?></td>
			            			<td><?php echo $value['cc'] ?></td>
			            		</tr>

			            	<?php
			            				# code...
			            			endforeach;
			            		endif;
			            	 ?>
			            </tbody>
			        </table>
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