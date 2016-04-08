<?php include "includes/_sessions.php"; ?>
<?php
  include 'database.php';

  $sql = "SELECT * FROM regions";

  $result = mysqli_query($conn,$sql) or die(mysqli_error());

  while ($row = mysqli_fetch_assoc($result)) {  
    $regions[] = array(
      'region' => $row['region']
      );

  }

  //get facility type
  $ft_sql = "SELECT * FROM faci_type";

  $ft_result = mysqli_query($conn, $ft_sql) or die(mysqli_error());

  while ($row = mysqli_fetch_assoc($ft_result)) {
    $ft_data[] = array(
                        'id' =>$row['id'] , 
                        'facil_type' =>$row['type'] , 
                    );
  }

  //get water source
  $src_sql = "SELECT * FROM source";

  $src_result = mysqli_query($conn, $src_sql) or die(mysqli_error());

  while ($row = mysqli_fetch_assoc($src_result)) {
    
     $src_data[] = array('id' => $row['id'], 'src' => $row['src'] );

  }

  //add new facility
  if (isset($_POST['add_facility'])) {

    $region         = $_POST['region'];
    $lga            = $_POST['lga'];
    $ward           = $_POST['ward'];
    $facility_no    = $_POST['facilities_no'];
    $facility_name  = $_POST['facilities_name'];
    $facility_type  = $_POST['facilities_type'];
    $com_name       = $_POST['com_name'];
    $com_contrib    = $_POST['com_contrib'];
    $source         = $_POST['source'];


    $sql="INSERT INTO facilities (region, lga, ward, facilities_no, facilities_name, facilities_type, com_name, com_contrib, source) 
    VALUES ('$region', '$lga', '$ward', '$facility_no', '$facility_name', '$facility_type', '$com_name', '$com_contrib', '$source')";
  
    if (mysqli_query($conn, $sql)) {

      $status = "success";

    } else {
        $status = "fail";
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

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
			<div class="col-md-8">
				<h1 class="page-header">Add Facility</h1>

      		<form class="form-horizontal" method="POST" action="">
            <?php 

              if ( isset($status) && $status =="success" ) {
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
                  <select id="region" name="region" class="form-control">
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
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>LGA:</label>
              <div class="col-sm-10">
                  <select id="lga" name="lga" disabled="true" class="form-control">
                    <option>Select city</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>Ward:</label>
              <div class="col-sm-10">
                  <select id="ward" name="ward" disabled="true" class="form-control">
                    <option>select food</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>Facility number:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="facilities_no">
            </div>
            </div>
            <div class="form-group">
              <label class= "col-sm-2" control-label>Facility name: </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="facilities_name" placeholder="facility name">
                </div>
            </div>
          
           
            <div class="form-group">
              <label class= "col-sm-2" control-label>Facility type:</label>
              <div class="col-sm-10">
                  <select name="facilities_type" class="form-control">
                    <option>Choose facility type</option>
                    <?php 
                      foreach ($ft_data as $value) {

                        ?>

                          <option><?php echo $value['facil_type']; ?></option>

                        <?php
                       
                      }
                     ?>
                  </select>
              </div>
            </div>
             <div class="form-group">
              <label class= "col-sm-2" control-label>Community Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="com_name" placeholder="Community name">
              </div>
            </div>
             <div class="form-group">
              <label class= "col-sm-2" control-label>Community Contribution:</label>
              <div class="col-sm-10">
                  <select name="com_contrib" class="form-control">
                    <option>Choose contribution</option>
                    <option>pay</option>
                    <option>Not pay</option>
                  </select>
              </div>
            </div>
             <div class="form-group">
              <label class= "col-sm-2" control-label>Source:</label>
              <div class="col-sm-10">
                  <select name="source" class="form-control">
                    <option>Choose source</option>
                    <?php 
                      foreach ($src_data as $value) {
                        ?>
                          <option><?php echo $value['src'] ?></option>
                        <?php
                      }
                     ?>
                  </select>
              </div>
            </div>
           <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="add_facility" class="btn btn-primary">Submit</button>
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