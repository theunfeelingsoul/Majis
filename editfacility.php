<?php include "includes/_sessions.php"; ?>
<?php
  include 'database.php';

  $id = $_GET['id'];

  $sql = "SELECT * FROM faci WHERE id ='$id'";

  $result = mysqli_query($conn,$sql) or die(mysqli_error());

  while ($row = mysqli_fetch_assoc($result)) {  
    $data= array(
      'region'          => $row['region'],
      'lga'             => $row['lga'],
      'ward'            => $row['ward'],
      'faci_num'        => $row['faci_num'],
      'faci_name'       => $row['faci_name'],
      'faci_type'       => $row['faci_type'],
      'com_name'        => $row['com_name'],
      'com_contrib'     => $row['com_contrib'],
      'source'          => $row['source']
    );

  }

 

  //update facility
  if (isset($_POST['edit_facility'])) {

    $region         = $_POST['region'];
    $lga            = $_POST['lga'];
    $ward           = $_POST['ward'];
    $faci_num       = $_POST['faci_num'];
    $faci_name      = $_POST['faci_name'];
    $faci_type      = $_POST['faci_type'];
    $com_name       = $_POST['com_name'];
    $com_contrib    = $_POST['com_contrib'];
    $source         = $_POST['source'];

    $sql = "UPDATE faci
            SET region      = '$region',
                lga         = '$lga',
                ward        = '$ward',
                faci_num    = '$faci_num',
                faci_name   = '$faci_name',
                faci_type   = '$faci_type', com_name = '$com_name',
                com_contrib = '$com_contrib',
                source      = '$source' 
            WHERE id = '$id'";

  
    if (mysqli_query($conn, $sql)) {
      header("Location:editfacility.php?id=$id&status=success");
    } else {
        $status = "fail";
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit: Facility</title>

  	<!-- links css-->
 <?php include "includes/_csslinks.php"; ?>
  <!-- ... -->

  <body>
	<?php include 'includes/_header.php'; ?>
	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>
			<div class="col-md-8">
				<h1 class="page-header">Edit Facility</h1>
      		<form class="form-horizontal" method="POST" action="">
            <?php 

              if ( isset($_GET['status']) ) {
                ?>

                  <div class="alert alert-success" role="alert">
                    Sucess. View the facility <a href="facilities.php">here</a>
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
            <div class="form-group">
              <label class= "col-sm-2" control-label>Region:</label>
              <div class="col-sm-10">
                <input type="text" name="region" class="form-control" value="<?php echo $data['region'] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>LGA:</label>
              <div class="col-sm-10">
                  
                  <input type="text" name="lga" class="form-control" value="<?php echo $data['lga'] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>Ward:</label>
              <div class="col-sm-10">
                  <input type="text" name="ward" class="form-control" value="<?php echo $data['ward'] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>Facility number:</label>
              <div class="col-sm-10">
              <input type="text" name="faci_num" class="form-control" value="<?php echo $data['faci_num'] ?>" />

              </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>Facility name: </label>
                <div class="col-sm-10">
                   <input type="text" name="faci_name" class="form-control" value="<?php echo $data['faci_name'] ?>" />
                </div>
            </div>
          
           
            <div class="form-group">
              <label class= "col-sm-2" control-label>Facility type:</label>
              <div class="col-sm-10">
                   <input type="text" name="faci_type" class="form-control" value="<?php echo $data['faci_type'] ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class= "col-sm-2" control-label>Community Name:</label>
              <div class="col-sm-10">
                 <input type="text" name="com_name" class="form-control" value="<?php echo $data['com_name'] ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class= "col-sm-2" control-label>Community Contribution:</label>
              <div class="col-sm-10">
                   <input type="text" name="com_contrib" class="form-control" value="<?php echo $data['com_contrib'] ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class= "col-sm-2" control-label>Source:</label>
               <div class="col-sm-10">
                   <input type="text" name="source" class="form-control" value="<?php echo $data['source'] ?>" />
              </div>
            </div>
           <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="edit_facility" class="btn btn-primary">Submit</button>
              </div>
          </div>
         
        </form>

			</div>
		<!--.row -->
		</div> 
     <?php include "includes/_footer.php"; ?>
	</div>
   
	<!-- javascript links -->
<?php include "includes/_jslinks.php"; ?>

<script src="styles/js/waterpoints.js"></script>

</body>
</html>