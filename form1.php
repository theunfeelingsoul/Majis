
<?php 

// // create my connection

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "majis";
// // made connection
// $conn = mysqli_connect($servername,$username,$password,$dbname);
// // check connection
// if (!$conn) {
// 	die(mysql_connection_error());
// }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>majis</title>

  	<!-- links css-->
 <?php include "includes/_csslinks.php"; ?>
  <!-- ... -->

  <body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WMOS- Water Monitoring and Operation System</a>
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>
	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row">
			<?php include "includes/_sidebar.php"; ?>
			<div class="col-md-8">
				<h1 class="page-header">Update Status of Facilities</h1>
 			<form class="form-horizontal">
    <div class="form-group">
      <label class= "col-sm-2" control-label>Region:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>LGA:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>Ward:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>Facility name: </label>
        <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
            <!-- <input type="text" class="form-control" name="facility_name" placeholder="facility name"> -->
        </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>Facility number:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
       <!-- <input type="text" class="form-control" name="facility_number" placeholder="facility number"> -->
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>COWSO/WUA name:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
        <!-- <input type="text" class="form-control" name="cowso_name" placeholder="COWSO/WUA name"> -->
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label> Status:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="status" placeholder="Status">
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2">Comment:</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="comment" rows="4" placeholder="write your comment"></textarea></br>
    	</div>
	</div>
     <div class="form-group">
     	<label class= "col-sm-2">Date:</label>
        <div class= "col-sm-10">
          <input type="date" class="form-control" />
        </div>
      </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
   
  </form>

			</div>
		<!--.row -->
		</div> 
	</div>
   
	<!-- javascript links -->
<?php include "includes/_jslinks.php"; ?>


</body>
</html>